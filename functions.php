<?php
/**
 * Theme: Spot
 * 
 * Functions file to make changes to the parent theme's functions. 
 *
 * @package spot
 */
 
/**
 * SET THEME OPTIONS HERE
 *
 * Theme options can be overriden here. These are all set the same defaults as in the 
 * parent theme except for the navbar_classes. You can change whatever you want.
 * 
 * Parameters:
 * background_color - Hex code for default background color without the #. eg) ffffff
 *
 * content_width - Only for determining "full width" image. Actual width in Bootstrap.css.
 * 		1170 for screens over 1200px resolution, otherwise 970.
 *
 * embed_video_width - Sets the width of videos that use the <embed> tag. This defaults
 * 		to the smallest width of content with a sidebar before the sidebar collapses.
 *		The height is automatically set at a 16:9 ratio unless overridden.
 *
 * embed_video_height - Leave empty to automatically set at a 16:9 ratio to the width
 *
 * post_formats - WordPress extra post formats. i.e. 'aside', 'image', 'video', 'quote',
 * 		'link'
 *
 * touch_support - Whether to load touch support for carousels (sliders)
 *
 * fontawesome - Whether to load font-awesome font set or not
 *
 * bootstrap_gradients - Whether to load Bootstrap "theme" CSS for gradients
 *
 * navbar_classes - One or more of navbar-default, navbar-inverse, navbar-fixed-top, etc.
 *
 * custom_header_location - If 'header', displays the custom header above the navbar. If
 * 		'content-header', displays it below the navbar in place of the colored content-
 *		header section.
 *
 * image_keyboard_nav - Whether to load javascript for using the keyboard to navigate
 		image attachment pages
 *
 * sample_widgets - Whether to display sample widgets in the footer and page-bottom widet
 		areas.
 *
 * sample_footer_menu - Whether to display sample footer menu with Top and Home links
 * 
 * testimonials - Whether to activate testimonials custom post type if Jetpack plugin is 
 * 		active
 *
 * NOTE: THIS VARIABLE HAS BEEN RENAMED FROM $THEME_OPTIONS. PLEASE UPDATE YOUR CHILD THEMES.
 */
$xsbf_theme_options = array(
	//'background_color' 		=> 'f2f2f2',
	//'content_width' 			=> 1170,
	//'embed_video_width' 		=> 1170,
	//'embed_video_height' 		=> null, // i.e. calculate it automatically
	//'post_formats' 			=> '',
	//'touch_support' 			=> true,
	//'fontawesome' 			=> true,
	//'bootstrap_gradients' 	=> false,
	'navbar_classes'			=> 'navbar-inverse navbar-fixed-top', // Different than parent
	'custom_header_location' 	=> 'content-header',
	//'image_keyboard_nav' 		=> true,
	//'sample_widgets' 			=> true,
	//'sample_footer_menu'		=> true,
	//'testimonials'			=> true // requires Jetpack
);

/**
 * Force the site title to display in the navbar and add our custom header images
 */
add_action( 'after_setup_theme', 'xsbf_spot_after_setup_theme' ); 
function xsbf_spot_after_setup_theme() {

	// These args will override the ones in the parent theme
	$args = array(
		'header-text' => false, // doesn't allow user to turn off header text
		'default-text-color'     => 'fff',
		'default-image' => get_stylesheet_directory_uri() . '/images/headers/notepad-blue.jpg',
		'width' => 1600,
		'height' => 900
	);
	add_theme_support( 'custom-header', $args );

	//The %2$s references the child theme directory (ie the stylesheet directory), use 
	// %s to reference the parent directory.
	register_default_headers( array(
		'abstract' => array(
			'url'           => '%2$s/images/headers/abstract-blue.jpg',
			'thumbnail_url' => '%2$s/images/headers/abstract-blue-thumbnail.jpg',
			'description'   => __( 'Abstract', 'flat-bootstrap' )
		),
		'book' => array(
			'url'           => '%2$s/images/headers/book-blue.jpg',
			'thumbnail_url' => '%2$s/images/headers/book-blue-thumbnail.jpg',
			'description'   => __( 'Book', 'flat-bootstrap' )
		),
		'briefcase' => array(
			'url'           => '%2$s/images/headers/briefcase-blue.jpg',
			'thumbnail_url' => '%2$s/images/headers/briefcase-blue-thumbnail.jpg',
			'description'   => __( 'Briefcase', 'flat-bootstrap' )
		),
		'camera' => array(
			'url'           => '%2$s/images/headers/camera-blue.jpg',
			'thumbnail_url' => '%2$s/images/headers/camera-blue-thumbnail.jpg',
			'description'   => __( 'Camera', 'flat-bootstrap' )
		),
		'city' => array(
			'url'           => '%2$s/images/headers/city-blue.jpg',
			'thumbnail_url' => '%2$s/images/headers/city-blue-thumbnail.jpg',
			'description'   => __( 'City', 'flat-bootstrap' )
		),
		'desk' => array(
			'url'           => '%2$s/images/headers/desk-blue.jpg',
			'thumbnail_url' => '%2$s/images/headers/desk-blue-thumbnail.jpg',
			'description'   => __( 'Desk', 'flat-bootstrap' )
		),
		'guitar' => array(
			'url'           => '%2$s/images/headers/guitar-blue.jpg',
			'thumbnail_url' => '%2$s/images/headers/guitar-blue-thumbnail.jpg',
			'description'   => __( 'Guitar', 'flat-bootstrap' )
		),
		'notepad' => array(
			'url'           => '%2$s/images/headers/notepad-blue.jpg',
			'thumbnail_url' => '%2$s/images/headers/notepad-blue-thumbnail.jpg',
			'description'   => __( 'Guitar', 'flat-bootstrap' )
		),
		'skyline' => array(
			'url'           => '%2$s/images/headers/skyline-blue.jpg',
			'thumbnail_url' => '%2$s/images/headers/skyline-blue-thumbnail.jpg',
			'description'   => __( 'Skyline', 'flat-bootstrap' )			
		),
	) );
}

/**
 * ADD A THIRD MENU FOR SOCIAL MEDIA ICONS TO BE ADDED TO THE OFFCANVAS MENU
 * NOTE: THIS IS FROM JUSTIN TADLOCK
 */
/*
add_action( 'init', 'xsbf_spot_register_menus' );
function xsbf_spot_register_menus() {
	register_nav_menus(
		array(
			'social' 	=> __( 'Social Menu', 'flat-bootstrap' ),
		)
	);
}
*/

/*
 * Set the CSS for the Appearance > Header admin panel 
 */
 function xsbf_admin_header_style() {
	$header_image = get_header_image();
?>
	<style type="text/css" id="xsbf-admin-header-css">

	.appearance_page_custom-header #headimg {
		border: none;
		-webkit-box-sizing: border-box;
		-moz-box-sizing:    border-box;
		box-sizing:         border-box;
		<?php
		if ( ! empty( $header_image ) ) {
			echo 'background: url(' . esc_url( $header_image ) . ') no-repeat scroll center center; background-size: 1600px auto; background-position: center center;';
			echo 'height: 480px;';
		} else {
			echo 'height: 200px;';
		}
		?>
		padding: 0 40px;
	}
	#headimg .home-link {
		-webkit-box-sizing: border-box;
		-moz-box-sizing:    border-box;
		box-sizing:         border-box;
		margin: 0 auto;
		max-width: 1040px;
		<?php
		if ( ! empty( $header_image ) ) {
			echo 'height: 480px;';
		} else {
			echo 'height: 200px;';
		}
		?>
		width: 100%;
	}

	#headimg h1 {
		font: 700 41px/45px Raleway, Arial, 'Helvetica Neue', sans-serif;
		<?php
		if ( ! empty( $header_image ) ) {
			echo 'margin: 200px 0 11px;';
		} else {
			echo 'margin: 50px 0 11px;';
		}
		?>
		text-align: center;
	}
	#headimg h2 {
		font: 300 24px/26px Raleway, Arial, 'Helvetica Neue', sans-serif;
		margin: 10px 0 25px;
		text-align: center;
		/*text-shadow: none;*/
	}

	<?php // If text color not overriden, use white (assume dark background) ?>
	<?php if ( HEADER_TEXTCOLOR == get_header_textcolor() OR HEADER_TEXTCOLOR == 'blank') : ?>
	#headimg h1, #headimg h2 {
		color: white !important;
	}

	<?php // Otherwise, set the text color to what the user selected ?>
	<?php else : ?>
	#headimg h1, #headimg h2 {
		color: <?php get_header_textcolor(); ?> !important;
	}	
	<?php endif; ?>

	</style>
<?php
}

/* 
 * Display the header image in the Appearance > Header and Appearance > Customize
 */
function xsbf_admin_header_image() {
	?>
	<div id="headimg" style="background: #34495e url(<?php header_image(); ?>) no-repeat scroll top; background-size: 1600px auto; background-position: center center;">
	<div class="section-image-overlay">
		<?php $style = ' style="color:#' . get_header_textcolor() . ';"'; ?>
		<div class="home-link">
			<h1 class="displaying-header-text" <?php echo $style; ?>><?php bloginfo('name'); ?></h1>
			<h2 id="desc" class="displaying-header-text"<?php echo $style; ?>><?php bloginfo('description'); ?></h2>
		</div>
	</div>
	</div>
<?php 
} 

/*
 * Hook into navbar HTML to shift the menu items to the right and just for fun replace any "O"
 * found in the site name with a red dot.
 */
add_filter( 'xsbf_navbar', 'xsbf_spot_navbar' );
function xsbf_spot_navbar ( $navbar ) {
	$navbar = str_ireplace( 'navbar-collapse collapse', 'navbar-collapse collapse navbar-right', $navbar ); 
	//$navbar = str_ireplace( 'O', '<i class="fa fa-circle"></i>', $navbar ); 
	$navbar = str_ireplace ( 'rel="home">' . get_bloginfo('name') . '</a>', 'rel="home">' . xsbf_spot_replace_oh_with_dot ( get_bloginfo('name') ) . '</a>', $navbar ); 
	return $navbar;
}

/*
add_filter( 'wp_nav_menu_args', 'xsbf_modify_nav_menu_args' );
function xsbf_modify_nav_menu_args( $args )
{
	if( 'primary' == $args['theme_location'] )
	{
		//$args['depth'] = -1;
		//$args['container_id'] = 'my_primary_menu';
		$args['container_class'] .= 'navbar-right';
	}
	return $args;
}
*/

/*
 * Just for fun, helper function to replace "O" with a red dot. Used by header.php.
 */
//add_filter('option_blogname','xsbf_spot_replace_oh_with_dot');
function xsbf_spot_replace_oh_with_dot ( $text ) {
	//print_r ( $text ); //TEST
	$text = str_ireplace( 'O', '<i class="fa fa-circle color-red"></i>', $text ); 
	return $text;
}
