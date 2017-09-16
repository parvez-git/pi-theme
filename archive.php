<?php get_header(); ?>


<section class="page-section">

	<header class="page-banner-bg">
		<div class="container">
		<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="archive-description">', '</div>' );
		?>
		</div><!-- .container -->
	</header><!-- .page-header -->

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
			</div> <!-- .col-md-8 -->

			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div>

		</div> <!-- .row -->
	</div> <!-- .container -->

</section>


<?php get_footer(); ?>
