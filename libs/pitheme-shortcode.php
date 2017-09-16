<?php //global $pitheme;

/* ------------------------------------------------------------------------
** | Shortcode for Service Section
** ----------------------------------------------------------------------*/

function service_section_shortcode( $atts ){ ob_start(); global $pitheme; ?>

	<section id="services" class="services-area">
		<div class="container">
			<div class="service-inner section-inner">
				<div class="section-header">
					<?php
						$pitheme_options = get_option('pitheme_options');

						$service_title = isset($pitheme_options['pitheme_field_service_title']) ? $pitheme_options['pitheme_field_service_title'] : 'Our Services';
						echo '<h2 class="text-center">'.$service_title.'</h2>';

						$service_subtitle = $pitheme_options['pitheme_field_service_subtitle'];
						if($service_subtitle){
							echo '<p class="text-center">'.$service_subtitle.'</p>';
						}
					?>
				</div>

				<div class="service-items">

					<?php
					$args = array(
						'post_type' 			=> 'service_items',
						'order'           => 'DESC',
						'posts_per_page'  => -1,
					);

					$service_item = new WP_Query( $args );

					if($service_item->have_posts()): while($service_item->have_posts()):$service_item->the_post();

						$icon_fontawesome = get_post_meta( get_the_ID(), '_pitheme_service_icon', 1 );
					?>

					<div class="col-md-4">
						<div class="service_single">
							<div class="service_icon">
								<i class="fa fa-<?php echo $icon_fontawesome; ?>"></i>
							</div>
							<div class="service_content">
								<h3><?php the_title(); ?></h3>
								<p><?php echo wp_trim_words( get_the_content(), 20 ); ?></p>
							</div>
						</div>
					</div>

					<?php endwhile; wp_reset_postdata(); endif; ?>

				</div>

			</div>
		</div>
	</section>

<?php return ob_get_clean(); }
add_shortcode( 'services_section', 'service_section_shortcode' );


/* ------------------------------------------------------------------------
** | Shortcode for Portfolio Section
** ----------------------------------------------------------------------*/

function portfolio_section_shortcode( $atts ){ ob_start(); global $pitheme; ?>

	<section id="works" class="works_area section-padding">
		<div class="works-inner">
			<div class="container">

				<div class="section-header">
					<h2 class="text-center">Our Latest Works</h2>
				</div>

				<div class="work-category">
					<div class="filter" data-filter="all">Show All</div>

					<?php $terms = get_terms( 'category-portfolio' );

					if ( $terms && ! is_wp_error( $terms ) ) :

					foreach ( $terms as $term ) : ?>
						<div class="filter" data-filter=".<?php echo $term->slug ?>"><?php echo $term->name ?></div>
					<?php endforeach; endif; ?>

				</div>
			</div>
		</div>
		<div id="latest_works" class="works_items">

			<?php $portfolio_item= new WP_Query(array(
				'post_type' 		 => 'portfolio-items',
				'posts_per_page' => -1,
				'order' 				 => 'DESC'
			));

			if($portfolio_item->have_posts()) : while($portfolio_item->have_posts()) : $portfolio_item->the_post();
				$portfolio_items = get_the_terms( get_the_ID(), 'category-portfolio' );
				$portfolio_url = get_post_meta( get_the_ID(), '_pitheme_portfolio_url', 1 );

				if ( $portfolio_items && ! is_wp_error( $portfolio_items ) ) :
					$portfolio_items_slug = array();

				foreach ($portfolio_items as $portfolio_category) {
					$portfolio_items_slug[] = $portfolio_category->slug;
				}

				$portfolio_slug = join(' ', $portfolio_items_slug);
			?>
			    <div class="mix <?php echo $portfolio_slug ?>" data-my-order="<?php echo $portfolio_category->term_id; ?>">
					<?php the_post_thumbnail('portfolio-thumb', array('class'=>'img-responsive')); ?>

					<div class="overlay">
						<div class="overlay-content">
							<?php if($portfolio_url) : ?>
							<div class="icon">
								<a href="<?php echo $portfolio_url; ?>"><i class="fa fa-link"></i></a>
							</div>
							<?php endif; ?>
							<?php the_title('<h4><a href="'.get_the_permalink().'">','</a></h4>'); ?>
						</div>
						</div>
			    </div>

			<?php endif; ?>

			<?php endwhile; wp_reset_postdata(); ?>

		<?php endif; ?>

		</div>

	</section>

<?php return ob_get_clean(); }
add_shortcode( 'portfolio_section', 'portfolio_section_shortcode' );


/* ------------------------------------------------------------------------
** | Shortcode for Testimonial Section
** ----------------------------------------------------------------------*/

function testimonial_section_shortcode( $atts ){ ob_start(); global $pitheme; ?>

	<section id="testimonials" class="testimonials_area_sc section-padding">
		<div class="testimonials-inner">
			<div class="container">

				<div class="section-header">
					<?php if (isset($pitheme['opt-text-title-testimonial']) && !empty($pitheme['opt-text-title-testimonial'])) : ?>
						<h2 class="text-center"><?php echo $pitheme['opt-text-title-testimonial']; ?></h2>
					<?php else: ?>
						<h2 class="text-center">Happy Client</h2>
					<?php endif; ?>
					<?php
						if (isset($pitheme['opt-textarea-subtitle-testimonial']) && !empty($pitheme['opt-textarea-subtitle-testimonial'])) {
							$testimonial = $pitheme['opt-textarea-subtitle-testimonial'];
							echo '<p class="text-center">' .$testimonial. '</p>';
						}
					?>
				</div>

				<div class="testimonials-slider">

					<?php if (isset($pitheme['opt-slides-testimonials']) && !empty($pitheme['opt-slides-testimonials'])){
						$testimonials_slider = $pitheme['opt-slides-testimonials'];
					}else{
						$testimonials_slider = array();
					}
					foreach ($testimonials_slider as $value) : ?>
						<div class="slngle_testimonial">
							<div class="client-img" style="background-image:url('<?php echo $value['image']; ?>')"></div>
							<p><?php echo $value['description']; ?></p>
							<h3>- <?php echo $value['title']; ?></h3>
						</div>
					<?php endforeach; ?>

				</div>

			</div>
		</div>
	</section>

<?php return ob_get_clean(); }
add_shortcode( 'testimonial_section', 'testimonial_section_shortcode' );


/* ------------------------------------------------------------------------
** | Shortcode for Pricing Section
** ----------------------------------------------------------------------*/

function pricing_section_shortcode( $atts ){ ob_start(); global $pitheme; ?>

	<section id="pricing" class="pricing_area">
		<div class="pricing-inner section-inner">
			<div class="container">

				<div class="section-header">
				<?php
					$pitheme_options_pricing = get_option('pitheme_options_pricing');
					$pricing_title = isset($pitheme_options_pricing['pitheme_field_pricing_title']) ? $pitheme_options_pricing['pitheme_field_pricing_title'] : 'Our Plans';
					echo '<h2 class="text-center">'.$pricing_title.'</h2>';

					$pricing_subtitle = isset($pitheme_options_pricing['pitheme_field_pricing_subtitle']) ? $pitheme_options_pricing['pitheme_field_pricing_subtitle'] : '';
					if($pricing_subtitle){
						echo '<p class="text-center">'.$pricing_subtitle.'</p>';
					}
				?>
				</div>

				<div class="row">
					<div class="pricing-table-inner">

					<?php $pricing_table = new WP_Query(array(
						'post_type' 			=> 'pi_theme_pricing',
						'posts_per_page' 	=> -1
					));
					if($pricing_table->have_posts()):while($pricing_table->have_posts()):$pricing_table->the_post();
						$price = get_post_meta( get_the_ID(), '_pitheme_price', true);
						$trial  = get_post_meta( get_the_ID(), '_pitheme_trial', true );
						$hosting  = get_post_meta( get_the_ID(), '_pitheme_hosting', true );
						$quality  = get_post_meta( get_the_ID(), '_pitheme_quality', true );
						$update  = get_post_meta( get_the_ID(), '_pitheme_update', true );
						$supports  = get_post_meta( get_the_ID(), '_pitheme_supports', true );
					?>
						<div class="col-md-4">
							<div class="single-pricing">
								<h4><?php the_title(); ?></h4>
								<p><span class="amount"><?php echo $price; ?></span><span class="sign">$</span></p>
								<ul>
									<?php if($trial) : ?>
										<li><?php echo $trial; ?></li>
									<?php endif ?>

									<?php if($hosting) : ?>
										<li><?php echo $hosting; ?></li>
									<?php endif ?>

									<?php if($quality) : ?>
										<li><?php echo $quality; ?></li>
									<?php endif ?>

									<?php if($update) : ?>
										<li><?php echo $update; ?></li>
									<?php endif ?>

									<?php if($supports) : ?>
										<li><?php echo $supports; ?></li>
									<?php endif ?>
								</ul>
								<a href="#">order now</a>
							</div>
						</div>

					<?php endwhile; wp_reset_postdata(); endif; ?>

					</div>
				</div>
			</div>
		</div>
	</section>

<?php return ob_get_clean(); }
add_shortcode( 'pricing_section', 'pricing_section_shortcode' );


/* ------------------------------------------------------------------------
** | Shortcode for Blog Section
** ----------------------------------------------------------------------*/

function blog_section_shortcode( $atts ){ ob_start(); global $pitheme; ?>

	<section id="ourblog" class="blog_area section-padding">
		<div class="blog-inner">
			<div class="container">
				<div class="section-header">
					<h2 class="text-center">Our Blog</h2>
					<p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor, aut modi exercitationem voluptatum!</p>
				</div>

				<?php $query = new WP_Query( array('post_type' => 'post') ); if ( $query->have_posts() ) : ?>
				<div class="row">
					<div class="blog-slider">
		 				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
							<div class="single_blog">
								<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
								<p class="postmeta"><?php developercanvas_posted_on(); ?> - <i class="fa fa-folder-open-o"></i> <?php the_category( ', ' ); ?></p>
								<p><?php echo wp_trim_words( get_the_content(), 30 ); ?></p>
							<footer class="entry-footer">
								<a href="<?php the_permalink(); ?>">continuous reading →</a>
							</footer>
						</div>
					<?php endwhile; wp_reset_postdata(); ?>

					</div>
				</div>
				<?php endif; ?>

			</div>
		</div>
	</section>

<?php return ob_get_clean(); }
add_shortcode( 'blog_section', 'blog_section_shortcode' );


/* ------------------------------------------------------------------------
** | Shortcode for Partner Slider
** ----------------------------------------------------------------------*/

function partner_slider_shortcode( $atts ){ ob_start(); global $pitheme; ?>

	<section id="client-area" class="client_area">
		<div class="client_inner section-inner">
			<div class="container">

				<div class="section-header">
					<?php if (isset($pitheme['opt-text-title-partner']) && !empty($pitheme['opt-text-title-partner'])) : ?>
						<h2 class="text-center"><?php echo $pitheme['opt-text-title-partner']; ?></h2>
					<?php else: ?>
						<h2 class="text-center">Our Partnars</h2>
					<?php endif; ?>
					<?php
						if (isset($pitheme['opt-textarea-subtitle-partner-logo']) && !empty($pitheme['opt-textarea-subtitle-partner-logo'])) {
							$partner_logo = $pitheme['opt-textarea-subtitle-partner-logo'];
							echo '<p class="text-center">' .$partner_logo. '</p>';
						}
					?>
				</div>

				<div class="partner-slider">

				<?php if (isset($pitheme['opt-slides-client']) && !empty($pitheme['opt-slides-client'])){
					$slider_client = $pitheme['opt-slides-client'];
				}else{
					$slider_client = array();
				}
				foreach ($slider_client as $value) : ?>
					<div class="slngle_partner">
						<img src="<?php echo $value['image']; ?>" alt="client image">
					</div>
				<?php endforeach; ?>

				</div>
			</div>
		</div>
	</section>

<?php return ob_get_clean(); }
add_shortcode( 'partner_slider', 'partner_slider_shortcode' );
