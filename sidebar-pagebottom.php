<?php
/**
 * Theme: Flat Bootstrap Spot
 * 
 * The "sidebar" for the bottom of the page (before the widgetized footer area). If no 
 * widgets added, then display some widgets as samples. Once the user adds actual widgets,
 * those will display instead.
 *
 * @package flat-bootstrap-spot
 */
?>

<?php 
/* If page bottom "sidebar" has widgets, then retrieve them */
$sidebar_pagebottom = get_dynamic_sidebar( 'Page Bottom' );

/* If not, then display sample widgets unless turned off in theme options */
global $theme_options;
if ( $theme_options['sample_widgets'] != false AND ! $sidebar_pagebottom ) {
	$sidebar_pagebottom = '<aside id="sample-text" class="widget widget_text section bg-red centered clearfix">'
		.'<div class="container">'
		.'<h2 class="widget-title">' . _x( 'WE ARE STORYTELLERS. BRANDS ARE OUR SUBJECTS. DESIGN IS OUR VOICE.', null, 'flat-bootstrap' ) . '</h2>'
		.'<div class="textwidget">'
		.'<div class="row">'
		.'<div class="col-lg-8 col-lg-offset-2">'
		.'<p>' . _x( "We believe ideas come from everyone, everywhere. At ", null, 'flat-bootstrap' ) 
		.get_bloginfo('name') 
		._x( ", everyone within our agency walls is a designer in their own right. And there are a few principles we believe about our design craft. These truths drive us, motivate us, and ultimately help us redefine the power of design. This is just a sample text widget, add your own in Admin -> Widgets.", null, 'flat-bootstrap' ) . '</p>'
		.'<p><button type="button" class="btn btn-hollow btn-lg">' 
		._x( 'Call To Action Button', null, 'flat-bootstrap' ) . '</button></p>'
		.'</div><!-- col-lg-8 -->'
		.'</div><!-- row -->'
		.'</div><!-- textwidget -->'
		.'</div><!-- container -->'
		.'</aside>';
}

/* Apply filters and display the footer widgets */
if ( $sidebar_pagebottom ) :
?>
	<div id="sidebar-pagebottom" class="sidebar-pagebottom">
		<?php echo apply_filters( 'xsbf_pagebottom', $sidebar_pagebottom ); ?>
	</div><!-- .sidebar-pagebottom -->
<?php endif;?>
