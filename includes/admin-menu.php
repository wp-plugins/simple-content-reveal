<?php
/**
* Admin Menu Functions
*
* Various functions relating to the administration screens
*
* @package	ContentReveal
*/

/**
* Add Menu Option
*
* Add a new menu option to the adminstration screen. Also add contextual help.
*
* @since	2.0
*/

function content_reveal_menu() {

	$profile_slug = add_options_page( 'Artiss Content Reveal Options', 'Content Reveal', 10, 'content-reveal-options', 'content_reveal_options' );

	$help_text = '<p>This screen allows you to set default options for Artiss Content Reveal. Simply change the require options and then click the Save Settings button at the bottom of the screen for the new settings to take effect.</p>';
	$help_text .= '<p><strong>For more information:</strong></p><p><a href="http://www.artiss.co.uk/content-reveal">Artiss Content Reveal Plugin Documentation</a></p>';
	$help_text .= '<p><a href="http://www.artiss.co.uk/forum/specific-plugins-group2/artiss-content-reveal-forum4">Artiss Content Reveal Support Forum</a></p><h4>This plugin, and all support, is supplied for free, but <a title="Donate" href="http://artiss.co.uk/donate" target="_blank">donations</a> are always welcome.</h4>';

	add_contextual_help( $profile_slug, __( $help_text ) );

}
add_action( 'admin_menu', 'content_reveal_menu' );

/**
* Add Options Screen
*
* Define the option screen that the admin menu will link to
*
* @since	2.0
*/

function content_reveal_options() {
    include_once( WP_PLUGIN_DIR . '/simple-content-reveal/includes/options.php' );
}

/**
* Add CSS files
*
* Add stylesheets to the admin screen
*
* @since	2.0
*/

function acr_menu_css() {
	global $wp_version;
	if ( ( float ) $wp_version >= 3.2 ) { $version = ''; } else { $version = '-3.1'; }
	wp_enqueue_style( 'acr_tinymce_button', WP_PLUGIN_URL . '/simple-content-reveal/css/tinymce-button' . $version . '.css' );
}
add_action( 'admin_print_styles', 'acr_menu_css' );

/**
* Add Settings link to plugin list
*
* Add a Settings link to the options listed against this plugin
*
* @since	2.0
*
* @param	string  $links	Current links
* @param	string  $file	File in use
* @return   string			Links, now with settings added
*/

function acr_add_settings_link( $links, $file ) {

	static $this_plugin;

	if ( !$this_plugin ) { $this_plugin = plugin_basename( __FILE__ ); }

	if ( strpos( $file, 'content-reveal.php' ) !== false ) {
		$settings_link = '<a href="admin.php?page=content-reveal-options">' . __( 'Settings' ) . '</a>';
		array_unshift( $links, $settings_link );
	}

	return $links;
}
add_filter( 'plugin_action_links', 'acr_add_settings_link', 10, 2 );

/**
* Add meta to plugin details
*
* Add options to plugin meta line
*
* @since	2.0
*
* @param	string  $links	Current links
* @param	string  $file	File in use
* @return   string			Links, now with settings added
*/

function acr_set_plugin_meta( $links, $file ) {

	if ( strpos( $file, 'content-reveal.php' ) !== false ) {
		$links = array_merge( $links, array( '<a href="admin.php?page=content-reveal-options">' . __( 'Support' ) . '</a>' ) );
		$links = array_merge( $links, array( '<a href="http://www.artiss.co.uk/donate">' . __( 'Donate' ) . '</a>' ) );
	}

	return $links;
}
add_filter( 'plugin_row_meta', 'acr_set_plugin_meta', 10, 2 );
?>