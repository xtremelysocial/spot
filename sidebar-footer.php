<?php
/**
 * Theme: Flat Bootstrap Spot
 * 
 * The "sidebar" for the widgetized footer area. If no widgets added AND just preivewing
 * the theme, then display some widgets as samples. Once the theme is actually in use,
 * it will be empty until the user adds some actual widgets.
 *
 * @package flat-bootstrap-pratt
 */
?>

<?php 
/* If footer "sidebar" has widgets, then display them */
$sidebar_footer = get_dynamic_sidebar( 'Footer' );
if ( $sidebar_footer ) :
?>
	<div class="sidebar-footer clearfix">
	<div class="container">
		<div class="row">
		<?php echo apply_filters( 'xsbf_footer', $sidebar_footer ); ?>
		</div><!-- .row -->
	</div><!-- .container -->
	</div><!-- .sidebar-footer -->

<?php
/* Otherwise, if user is previewing this theme, then show an example */
elseif ( xsbf_theme_preview() ) :
?>
	<div class="sidebar-footer clearfix">
	<div class="container">
		<div class="row">

			<aside id="sample-text" class="widget col-sm-12 clearfix widget_text">			
			<div class="textwidget">
			<center>
			<a href="#"><span class="fa fa-twitter icon-lg"></span></a> &nbsp;  &nbsp; 
			<a href="#"><span class="fa fa-facebook icon-lg"></span></a> &nbsp;  &nbsp; 
			<a href="#"><span class="fa fa-dribbble icon-lg"></span></a>
			</center>
			</div><!-- textwidget -->
			</aside>

		</div><!-- .row -->
	</div><!-- .container -->
	</div><!-- .sidebar-footer -->

<?php endif;?>