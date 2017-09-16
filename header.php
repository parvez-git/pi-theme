<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header id="header" class="header-area">
	<nav class="navbar-default">
	  <div class="container">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#pi-theme-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="<?php bloginfo( 'url' ); ?>">
					<?php
						global $pitheme;
						if ($pitheme['opt-media-logo']['thumbnail']) { ?>
							<img src="<?php echo $pitheme['opt-media-logo']['thumbnail']; ?>" alt="<?php bloginfo( 'name' ); ?>" height="40px"/>
						<?php }else{
							bloginfo( 'name' );
						}
					?>
				</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <?php
			$primary = array(
				'theme_location' 	=> 'primary',
				'container' 			=> 'div',
				'container_class' => 'collapse navbar-collapse',
				'container_id' 		=> 'pi-theme-collapse-1',
				'menu_class' 			=> 'nav navbar-nav navbar-right',
			);

			wp_nav_menu( $primary );
	    ?>

	  </div><!-- /.container-fluid -->
	</nav>
</header>
