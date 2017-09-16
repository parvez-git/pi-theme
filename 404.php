<?php get_header(); ?>

	<section class="error-404 not-found">
		<header class="page-banner-bg">
      <div class="container">
        <h1 class="page-title-404"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'developercanvas' ); ?></h1>
      </div>
		</header><!-- .page-header -->

		<div class="page-content container">

			<div class="col-md-8">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'developercanvas' ); ?></p>

				<?php get_search_form(); ?>
			</div>

			<div class="col-md-4">
			     <?php get_sidebar(); ?>
			</div>

		</div><!-- .page-content -->
	</section><!-- .error-404 -->

<?php
get_footer();
