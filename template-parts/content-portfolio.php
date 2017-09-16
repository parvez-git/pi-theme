<?php
/**
 * Template part for displaying page content in single-{portfolio-items}.php
 * @package devcan-pitheme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <?php
		$page_banner_src = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' );
    $page_banner_pattern = get_template_directory_uri() .'/images/always_grey.png';
    $page_banner = ($page_banner_src) ? "background-image:url('$page_banner_src');height: 480px;background-size: cover;background-repeat: no-repeat;background-position: center top;" : "background-image:url('$page_banner_pattern');height:200px;" ;
	?>

		<header class="single-post-banner" style="<?php echo $page_banner; ?>"></header>

		<div class="container">

      <div class="page-content page-content-single">
    		<?php
          the_title( '<h1 class="entry-title">', '</h1>' );
          ?>
          <div class="entry-meta-single">
            <?php developercanvas_posted_on(); ?> - <?php developercanvas_entry_footer(); ?>
          </div><!-- .entry-meta -->

    			<div class="row">
    			  <div class="col-md-8">
              <div class="portfolio-gallery">
                <?php $gallery_images = get_post_meta( get_the_ID(), '_pitheme_portfolio_file_list', true ); ?>
                <?php if ( ! empty( $gallery_images ) ) : ?>
                	<?php foreach ( $gallery_images as $gallery_image ) : ?>
                    <div class="gallery-single">
                			<img src="<?php echo $gallery_image; ?>" alt="Gallery Image"/ class="img-responsive">
                    </div>
                	<?php endforeach; ?>
                <?php endif; ?>
              </div>
    			  </div>
    			  <div class="col-md-4">
              <?php
                the_title('<h3 class="portfolio-title">','</h3>');
                echo developercanvas_posted_on() . '<hr>';
                the_content();

                $portfolio_items = get_the_terms( get_the_ID(), 'category-portfolio' );
                $portfolio_items_name = array();

                foreach ($portfolio_items as $key=>$portfolio_category) {
                  $portfolio_items_name[] = $portfolio_category->name;
                }
                $portfolio_name = join(', ', $portfolio_items_name);

          			$portfolio_url = get_post_meta( get_the_ID(), '_pitheme_portfolio_url', 1 );
              ?>
              <table class="table">
                <tbody>
                  <tr>
                    <td><strong>Customer:</strong></td>
                    <td>Customer Name</td>
                  </tr>
                  <tr>
                    <td><strong>Live Website:</strong></td>
                    <td><a href="<?php echo $portfolio_url; ?>"><?php echo $portfolio_url; ?></a></td>
                  </tr>
                  <tr>
                    <td><strong>Categories:</strong></td>
                    <td><?php echo $portfolio_name; ?></td>
                  </tr>
                  <tr><td></td><td></td></tr>
                </tbody>
              </table>
    			  </div>
    			</div>

          <?php
      			wp_link_pages( array(
      				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pitheme' ),
      				'after'  => '</div>',
      			) );
          ?>

          <div class="single-post-navigation">
            <div class="alignleft">
              <?php previous_post_link( '%link', '<i class="fa fa-long-arrow-left"></i> %title' ); ?>
            </div>
            <div class="alignright">
              <?php next_post_link('%link', '%title <i class="fa fa-long-arrow-right"></i>'); ?>
            </div>
          </div> <!-- end navigation -->

          <?php

          if ( comments_open() || get_comments_number() ) :
            comments_template();
          endif;
    		?>
    	</div><!-- .page-content -->

    	<?php if ( get_edit_post_link() ) : ?>
    		<footer class="page-footer">
    			<?php
    				edit_post_link(
    					sprintf(
    						wp_kses(
    							__( 'Edit <span class="screen-reader-text">%s</span>', 'pitheme' ),
    							array(
    								'span' => array(
    									'class' => array(),
    								),
    							)
    						),
    						get_the_title()
    					),
    					'<span class="edit-link">',
    					'</span>'
    				);
    			?>
    		</footer><!-- .page-footer -->
      <?php endif; ?>

		</div> <!-- .container -->

</article><!-- #post-<?php the_ID(); ?> -->
