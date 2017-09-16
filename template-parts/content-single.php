<?php
/**
 * Template part for displaying page content in single.php
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

          <?php
    			the_content();

    			wp_link_pages( array(
    				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pitheme' ),
    				'after'  => '</div>',
    			) );
          ?>

          <div class="single-post-navigation">
            <div class="alignleft">
              <?php previous_post_link( '%link', '<i class="fa fa-long-arrow-left"></i> %title', TRUE ); ?>
            </div>
            <div class="alignright">
              <?php next_post_link('%link', '%title <i class="fa fa-long-arrow-right"></i>', TRUE); ?>
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
