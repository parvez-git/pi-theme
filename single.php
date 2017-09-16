<?php get_header(); ?>

<section class="single-page-section">

	<?php
	while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/content', 'single' );

	endwhile; 
	?>

</section>

<?php get_footer(); ?>
