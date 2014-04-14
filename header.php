<?php
/**
 * Theme: Flat Bootstrap Spot
 * 
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package flat-bootstrap-spot
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<?php do_action( 'before' ); ?>
	
	<header id="masthead" class="site-header" role="banner"><!-- page-header -->

		<?php // Display the primary nav bar ?>	
		<nav id="site-navigation" class="main-navigation" role="navigation">

			<h1 class="menu-toggle sr-only screen-reader-text"><?php _e( 'Primary Menu', 'flat-bootstrap' ); ?></h1>
			<div class="skip-link"><a class="screen-reader-text sr-only" href="#content"><?php _e( 'Skip to content', 'flat-bootstrap' ); ?></a></div>

		<?php
		// Collapsed navbar menu toggle
		global $theme_options;
		$navbar = '<div class="navbar ' . $theme_options['navbar_classes'] . '">'
			.'<div class="container">'
        	.'<div class="navbar-header">'
          	.'<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">'
            .'<span class="icon-bar"></span>'
            .'<span class="icon-bar"></span>'
            .'<span class="icon-bar"></span>'
          	.'</button>';

		// Site title (Bootstrap "brand") in navbar. Shown by default. Customizer will
		// let you hide it if you want.
		$navbar .= '<a class="navbar-brand" href="'
			.esc_url( home_url( '/' ) )
			.'" rel="home">'
			.get_bloginfo( 'name' )
			.'</a>';
		
        $navbar .= '</div><!-- navbar-header -->';

		// Display the desktop navbar
		$navbar .= wp_nav_menu( 
			array(  'theme_location' => 'primary',
			'container_class' => 'navbar-collapse collapse navbar-right', //<nav> or <div> class
			'menu_class' => 'nav navbar-nav', //<ul> class
			'walker' => new wp_bootstrap_navwalker(),
			'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
			'echo'	=> false
			) 
		);
		echo apply_filters( 'xsbf_navbar', $navbar );
		?>

		</div><!-- .container -->
		</div><!-- .navbar -->
		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->

	<?php // Page Top (after header) widget area 
	get_sidebar( 'pagetop' ); 
	?>

	<?php // Set up the content area (but don't put it in a container) ?>	
	<div id="content" class="site-content">
