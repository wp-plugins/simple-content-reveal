<?php
/**
* README Page
*
* Display the README instructions
*
* @package	ContentReveal
* @since	2.1
*/
?>
<div class="wrap">
<div class="icon32" id="icon-edit-pages"></div>

<h2><?php _e( 'Artiss Content Reveal README', 'content-reveal' ); ?></h2>

<?php

// Get options

$options = acr_get_options();

// Display ads

if ( $options[ 'donated'] != 1 ) { artiss_plugin_ads( 'content-reveal' ); }

if ( !function_exists( 'readme_parser' ) ) {
    echo '<p>You shouldn\'t be able to see this but I guess that odd things can happen!<p>';
    echo '<p>To display the README you must install the <a href="http://wordpress.org/extend/plugins/wp-readme-parser/">README Parser plugin</a>.</p>';
} else {
    echo readme_parser( array( 'exclude' => 'meta,upgrade notice,screenshots,support,changelog,links,installation,licence', 'ignore' => 'For help with this plugin,,for more information and advanced options ' ), 'http://plugins.svn.wordpress.org/simple-content-reveal/tags/' . content_reveal_version . '/readme.txt' );
}
?>
</div>