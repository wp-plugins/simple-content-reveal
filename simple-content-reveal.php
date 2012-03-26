<?php
/*
Plugin Name: Artiss Content Reveal
Plugin URI: http://www.artiss.co.uk/artiss-content-reveal
Description: Easily hide and reveal WordPress content
Version: 2.0.4
Author: David Artiss
Author URI: http://www.artiss.co.uk
*/

/**
* Artiss Content Reveal
*
* Main code - include various functions
*
* @package	ContentReveal
* @since	2.0
*/

define( 'content_reveal_version', '2.0.4' );

wp_enqueue_script( 'swap_display', WP_PLUGIN_URL . '/' . str_replace( basename( __FILE__ ), '', plugin_basename( __FILE__ ) ) . 'js/simple-content-reveal.js');

$functions_dir = WP_PLUGIN_DIR . '/simple-content-reveal/includes/';

// Include all the various functions

include_once( $functions_dir . 'set-option-defaults.php' );						// Set default options

if ( is_admin() ) {

	include_once( $functions_dir . 'admin-menu.php' );							// Administration menus

	include_once( $functions_dir . 'mcebutton.php' );							// Editor button

} else {

	include_once( $functions_dir . 'add-url-parameter.php' );					// Add new URL parameter

	include_once( $functions_dir . 'generate-content-reveal-code.php' );		// Generate the code

	include_once( $functions_dir . 'function-calls.php' );						// Function calls

	include_once( $functions_dir . 'shortcodes.php' );							// Shortcodes

	include_once( $functions_dir . 'deprecated.php' );							// Deprecated options

}
?>