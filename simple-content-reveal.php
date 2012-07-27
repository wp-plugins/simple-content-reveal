<?php
/*
Plugin Name: Artiss Content Reveal
Plugin URI: http://www.artiss.co.uk/content-reveal
Description: Easily hide and reveal WordPress content
Version: 2.1.1
Author: David Artiss
Author URI: http://www.artiss.co.uk
*/

/**
* Artiss Content Reveal
*
* Main code - include various functions
*
* @package	ContentReveal
*/

define( 'content_reveal_version', '2.1.1' );

/**
* Plugin initialisation
*
* Loads the plugin's translated strings and the plugins' JavaScript
*
* @since	2.1
*/

function acr_plugin_init() {

    $language_dir = plugin_basename( dirname( __FILE__ ) ) . '/languages/';

	load_plugin_textdomain( 'content-reveal', false, $language_dir );

    wp_enqueue_script( 'swap_display', WP_PLUGIN_URL . '/' . str_replace( basename( __FILE__ ), '', plugin_basename( __FILE__ ) ) . 'js/acr-swap-display.js');

}

add_action( 'init', 'acr_plugin_init' );

/**
* Main Includes
*
* Include all the plugin's functions
*
* @since	2.0
*/

$functions_dir = WP_PLUGIN_DIR . '/simple-content-reveal/includes/';

// Include all the various functions

include_once( $functions_dir . 'acr-set-defaults.php' );						        // Set default options

if ( is_admin() ) {

    if ( !function_exists( 'artiss_plugin_ads' ) ) {

        include_once( $functions_dir . 'artiss-plugin-ads.php' );                       // Option screen ads

    }

	include_once( $functions_dir . 'acr-admin-config.php' );					        // Administration menus

	include_once( $functions_dir . 'acr-mcebutton.php' );						        // Editor button

} else {

    include_once( $functions_dir . 'acr-add-url-parameter.php' );				        // Add new URL parameter

	include_once( $functions_dir . 'acr-shortcodes.php' );					        	// Shortcodes

}

include_once( $functions_dir . 'acr-shared-functions.php' );                            // Shared functions

include_once( $functions_dir . 'acr-generate-reveal-code.php' );        		        // Generate the code

include_once( $functions_dir . 'acr-function-calls.php' );	        				    // Function calls

include_once( $functions_dir . 'acr-deprecated.php' );		        				    // Deprecated options
?>