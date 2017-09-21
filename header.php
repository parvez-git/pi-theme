<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
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
				<?php
					global $pitheme;
					if ($pitheme['opt-media-logo']['url']) {
						$logotype = 'logoimage';
					}else{
						$logotype = 'logotext';
					}
				?>
	      <a class="navbar-brand <?php echo $logotype; ?>" href="<?php bloginfo( 'url' ); ?>">
					<?php
						if ($pitheme['opt-media-logo']['url']) { ?>
							<img src="<?php echo $pitheme['opt-media-logo']['url']; ?>" alt="<?php bloginfo( 'name' ); ?>" height="40px"/>
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
