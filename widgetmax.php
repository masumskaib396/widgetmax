<?php 
/*
Plugin Name: WidgetMax For Elementor
Plugin URI: https://github.com/masumskaib396/widgetmax
Description: The Widgetmax is an Elementor helping plugin that will make your designing work easier.
Our specialities are custom CSS, Nested section, Contact form 7, Creative Buttons.
Version: 1.0
Author: msakib
Author URI: https://profiles.wordpress.org/msakib/
License: GPLv2 or later
Text Domain: widgetmax
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//Set plugin version constant.
define( 'WIDGETMAX_VERSION', '1.1.1');
/* Set constant path to the plugin directory. */
define( 'WIDGETMAX_WIDGET', trailingslashit( plugin_dir_path( __FILE__ ) ) );
// Plugin Function Folder Path
define( 'WIDGETMAX_WIDGET_INC', plugin_dir_path( __FILE__ ) . 'inc/' );

// Plugin Extensions Folder Path
define( 'WIDGETMAX_WIDGET_EXTENSIONS', plugin_dir_path( __FILE__ ) . 'extensions/' );

// Plugin Widget Folder Path
define( 'WIDGETMAX_WIDGET_DIR', plugin_dir_path( __FILE__ ) . 'widgets/' );

// Assets Folder URL
define( 'WIDGETMAX_ASSETS_PUBLIC', plugins_url( 'assets', __FILE__ ) );

// Assets Folder URL
define( 'WIDGETMAX_ASSETS_VERDOR', plugins_url( 'assets/vendor', __FILE__ ) );


require_once(WIDGETMAX_WIDGET_INC . 'helper-function.php');
require_once(WIDGETMAX_WIDGET_INC . 'Classes/breadcrumb-class.php');
require_once( WIDGETMAX_WIDGET . 'base.php' );

?>
