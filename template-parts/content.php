<?php
/**
 * Template part for displaying posts
 *
 * @package devcan-pitheme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php developercanvas_posted_on(); ?>
			<?php developercanvas_entry_footer(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>

		<?php if (has_post_thumbnail()): ?>
			<div class="entry-post-thumbnail">
				<?php the_post_thumbnail('', array('class' => 'img-responsive') ); ?>
			</div>
		<?php endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			if ( is_singular() ) :

				the_content( sprintf(
					wp_kses(
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'pitheme' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pitheme' ),
					'after'  => '</div>',
				) );

			else:
				the_excerpt();
			endif;
		?>
	</div><!-- .entry-content -->

	<?php if ( !is_singular() ) : ?>
		<footer class="entry-footer">
			<a href="<?php the_permalink(); ?>">continuous reading &rarr;</a>
		</footer><!-- .entry-footer -->
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
