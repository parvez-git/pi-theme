<?php get_header();
/**
 * Blog Template
 * @package devcan-pitheme
**/
?>

<section id="blogposts" class="blogposts-area">

	<?php
		if ( is_home() && ! is_front_page() ) : ?>
		<header class="home-page-blog page-banner-bg">
			<div class="container">
				<div class="testimonials-header section-header">
					<h1 class="page-title text-center"><?php single_post_title(); ?></h1>
				</div>
			</div>
		</header>
		<?php
		endif;
	?>

	<div class="container">
		<div class="row">
			<div class="col-md-8">

			<?php
			if ( have_posts() ) :

				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', get_post_format() );

				endwhile;

				the_posts_navigation();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>
			</div>

			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div>

		</div> <!-- .row -->
	</div> <!-- .container -->
</section>

<?php get_footer(); ?>
