<?php
/**
* Admin Menu Functions
*
* Various functions relating to the various administration screens
*
* @package	ContentReveal
*/

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
		$settings_link = '<a href="admin.php?page=acr-options">' . __( 'Settings', 'content-reveal' ) . '</a>';
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
		$links = array_merge( $links, array( '<a href="admin.php?page=acr-support"">' . __( 'Support', 'content-reveal' ) . '</a>' ) );
		$links = array_merge( $links, array( '<a href="http://www.artiss.co.uk/donate">' . __( 'Donate', 'content-reveal' ) . '</a>' ) );
	}

	return $links;
}
add_filter( 'plugin_row_meta', 'acr_set_plugin_meta', 10, 2 );

/**
* Administration Menu
*
* Add a new option to the Admin menu and context menu
*
* @since	2.1
*
* @uses acr_help		Return help text
*/

function acr_menu() {

    // Depending on WordPress version and available functions decide which (if any) contextual help system to use

    $contextual_help = acr_contextual_help_type();

    // Add main admin option

	add_menu_page( 'Artiss Content Reveal Settings', 'Content Reveal', 'edit_posts', 'acr-options', 'acr_options', plugins_url() . '/simple-content-reveal/images/menu_icon.png' );

    // Add search sub-menu

    if ( $contextual_help == 'new' ) { global $acr_options_hook; }

	$acr_options_hook = add_submenu_page( 'acr-options', 'Artiss Content Reveal Options', 'Options', 'edit_posts', 'acr-options', 'acr_options' );

    if ( $contextual_help == 'new' ) { add_action( 'load-' . $acr_options_hook, 'acr_add_options_help' ); }

    if ( $contextual_help == 'old' ) { add_contextual_help( $acr_options_hook, acr_options_help() ); }

    // Add readme sub-menu

    if ( function_exists( 'readme_parser' ) ) {
        add_submenu_page( 'acr-options', 'Artiss Content Reveal README', 'README', 'edit_posts', 'acr-readme', 'acr_readme' );
    }

    // Add support sub-menu

    add_submenu_page( 'acr-options', 'Artiss Content Reveal Support', 'Support', 'edit_posts', 'acr-support', 'acr_support' );

}
add_action( 'admin_menu','acr_menu' );

/**
* Get contextual help type
*
* Return whether this WP installation requires the new or old contextual help type, or none at all
*
* @since	2.1
*
* @return   string			Contextual help type - 'new', 'old' or false
*/

function acr_contextual_help_type() {

    global $wp_version;

    $type = false;

    if ( ( float ) $wp_version >= 3.3 ) {
        $type = 'new';
    } else {
        if ( function_exists( 'add_contextual_help' ) ) {
            $type = 'old';
        }
    }

    return $type;
}

/**
* Add Options Help
*
* Add help tab to options screen
*
* @since	2.1
*
* @uses     acr_options_help    Return help text
*/

function acr_add_options_help() {

    global $acr_options_hook;
    $screen = get_current_screen();

    if ( $screen->id != $acr_options_hook ) { return; }

    $screen -> add_help_tab( array( 'id' => 'acr-options-help-tab', 'title'	=> __( 'Help', 'content-reveal' ), 'content' => acr_options_help() ) );
}

/**
* Options screen
*
* Define an option screen
*
* @since	2.1
*/

function acr_options() {

	include_once( WP_PLUGIN_DIR . '/' . str_replace( basename( __FILE__ ), '', plugin_basename( __FILE__ ) ) . 'acr-options.php' );

}

/**
* README screen
*
* Define the README screen
*
* @since	2.1
*/

function acr_readme() {

	include_once( WP_PLUGIN_DIR . '/' . str_replace( basename( __FILE__ ), '', plugin_basename( __FILE__ ) ) . 'acr-readme.php' );

}

/**
* Support screen
*
* Define the support screen
*
* @since	2.1
*/

function acr_support() {

	include_once( WP_PLUGIN_DIR . '/' . str_replace( basename( __FILE__ ), '', plugin_basename( __FILE__ ) ) . 'acr-support.php' );

}

/**
* Options Help
*
* Return help text for options screen
*
* @since	2.1
*
* @return	string	Help Text
*/

function acr_options_help() {

	$help_text = '<p>' . __( 'This screen allows you to set default options for Artiss Content Reveal. Simply change the require options and then click the Save Settings button at the bottom of the screen for the new settings to take effect.', 'content-reveal' ) . '</p>';
	$help_text .= '<p><strong>' . __( 'For more information:', 'content-reveal' ) . '</strong></p><p><a href="http://www.artiss.co.uk/content-reveal">' . __( 'Artiss Content Reveal Plugin Documentation', 'content-reveal' ) . '</a></p>';
	$help_text .= '<p><a href="http://www.artiss.co.uk/forum/specific-plugins-group2/artiss-content-reveal-forum4">' . __( 'Artiss Content Reveal Support Forum', 'content-reveal' ) . '</a></p>';    
	$help_text .= '<h4>' . __( 'This plugin, and all support, is supplied for free, but <a title="Donate" href="http://artiss.co.uk/donate" target="_blank">donations</a> are always welcome.', 'content-reveal' ) . '</h4>';  

	return $help_text;
}

/**
* Detect plugin activation
*
* Upon detection of activation set an option
*
* @since	2.1
*/

function acr_plugin_activate() {

	update_option( 'artiss_content_reveal_activated', true );

}
register_activation_hook( WP_PLUGIN_DIR . "/simple-content-reveal/simple-content-reveal.php", 'acr_plugin_activate' );

// If plugin activated, run activation commands and delete option

global $wp_version;

if ( get_option( 'artiss_content_reveal_activated' ) ) {

    if ( ( float ) $wp_version >= 3.3 ) {

        add_action( 'admin_enqueue_scripts', 'acr_admin_enqueue_scripts' );

    }

    delete_option( 'artiss_content_reveal_activated' );
}

/**
* Enqueue Feature Pointer files
*
* Add the required feature pointer files
*
* @since	2.1
*/

function acr_admin_enqueue_scripts() {

    wp_enqueue_style( 'wp-pointer' );
    wp_enqueue_script( 'wp-pointer' );

    add_action( 'admin_print_footer_scripts', 'acr_admin_print_footer_scripts' );
}

/**
* Show Feature Pointer
*
* Display feature pointer
*
* @since	2.1
*/

function acr_admin_print_footer_scripts() {

    $pointer_content = '<h3>' . __( 'Welcome to Artiss Content Reveal', 'content-reveal' ) . '</h3>';
    $pointer_content .= '<p style="font-style:italic;">' . __( 'Thank you for installing this plugin.', 'content-reveal' ) . '</p>';
    $pointer_content .= '<p>' . __( 'A new menu has been added to the sidebar. This will allow you to change the default options (recommended!) and find useful support information.', 'content-reveal' );
?>
<script>
jQuery(function () {
	var body = jQuery(document.body),
	menu = jQuery('#toplevel_page_acr-options'),
	collapse = jQuery('#collapse-menu'),
	pluginmenu = menu.find("a[href='admin.php?page=acr-options']"),
	options = {
		content: '<?php echo $pointer_content; ?>',
		position: {
			edge: 'left',
			align: 'center',
			of: menu.is('.wp-menu-open') && !menu.is('.folded *') ? pluginmenu : menu
		},
		close: function() {
		}};

	if ( !pluginmenu.length )
		return;

	body.pointer(options).pointer('open');
});
</script>
<?php
}
?>