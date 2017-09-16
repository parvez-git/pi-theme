<?php
/**
 * Template part for displaying page content in page.php
 * @package devcan-pitheme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <?php
		$page_banner_src = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' );
		$page_banner_pattern = get_template_directory_uri() .'/images/always_grey.png';
		$page_banner = ($page_banner_src) ? "background-image:url('$page_banner_src');background-size: cover;" : "background-image:url('$page_banner_pattern')" ;

		$page_subtitle = get_post_meta( get_the_ID(), '_pitheme_page_subtitle', 1 );
	?>

		<header class="page-banner" style="<?php echo $page_banner; ?>">
			<div class="container">
				<?php the_title('<h1 class="page-title">', '</h1>'); ?>
				<p><?php echo $page_subtitle; ?></p>
			</div>
		</header>

		<div class="container">
      <div class="page-content">
    		<?php
    			the_content();

    			wp_link_pages( array(
    				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pitheme' ),
    				'after'  => '</div>',
    			) );
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
