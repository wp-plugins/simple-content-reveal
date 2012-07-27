<?php
/**
* Content Reveal Options Page
*
* Screen for Content Reveal options
*
* @package	ContentReveal
* @since	2.0
*/

?>
<div class="wrap">
<div class="icon32"><img src="<?php echo plugins_url(); ?>/simple-content-reveal/images/screen_icon.png" alt="" title="" height="32px" width="32px"/><br /></div>

<h2>Artiss Content Reveal</h2>

<?php
// If options have been updated on screen, update the database
if ( ( !empty( $_POST ) ) && ( check_admin_referer( 'content-reveal-options', 'content_reveal_options_nonce' ) ) ) {

	$options[ 'editor_button' ] = $_POST[ 'content_reveal_editor_button' ];
	$options[ 'cookies' ] = $_POST[ 'content_reveal_cookies' ];
	$options[ 'time' ] = $_POST[ 'content_reveal_time' ];
	$options[ 'period' ] = $_POST[ 'content_reveal_period' ];
	$options[ 'donated' ] = $_POST[ 'content_reveal_donated' ];    

	// Update the options
	update_option( 'content_reveal_options', $options );

	echo '<div class="updated fade"><p><strong>' . __( 'Settings Saved.', 'content-reveal' ) . "</strong></p></div>\n";
}

// Get options

$options = acr_get_options();

// Display ads

if ( $options[ 'donated'] != 1 ) { artiss_plugin_ads( 'content-reveal' ); }
?>

<p><?php _e( 'These are the general settings for Artiss Content Reveal.', 'content-reveal' ); ?></p>

<form method="post" action="<?php echo get_bloginfo( 'wpurl' ).'/wp-admin/admin.php?page=acr-options' ?>">

<table class="form-table">

<tr>
<th scope="row"><?php _e( 'Show Editor Button', 'content-reveal' ); ?></th>
<td><input type="checkbox" name="content_reveal_editor_button" value="1"<?php if ( $options[ 'editor_button' ] == "1" ) { echo ' checked="checked"'; } ?>/>&nbsp;<span class="description"><?php _e( 'Show the Content Reveal button on the post editor', 'content-reveal' ); ?></span></td>
</tr>

<tr>
<th scope="row"><?php _e( 'Cookie Use', 'content-reveal' ); ?></th>
<td><select name="content_reveal_cookies">
<option value=""<?php if ( $options[ 'cookies' ] == '' ) { echo " selected='selected'"; } ?>><?php _e ( 'Do not store cookies', 'content-reveal' ); ?></option>
<option value="1"<?php if ( $options[ 'cookies' ] == '1' ) { echo " selected='selected'"; } ?>><?php _e ( 'Use cookies unless Do Not Track is active', 'content-reveal' ); ?></option>
<option value="2"<?php if ( $options[ 'cookies' ] == '2' ) { echo " selected='selected'"; } ?>><?php _e ( 'Use cookies and ignore Do Not Track', 'content-reveal' ); ?></option>
</select>&nbsp;<span class="description"><?php _e( 'Cookies are used to store the state of content.<br/><a href="http://donottrack.us/">Do Not Track</a> is a browser option that requests that information is not stored about that user.', 'content-reveal' ); ?></span></td>
</tr>

<tr>
<th scope="row"><?php _e( 'Cookie Retention', 'content-reveal' ); ?></th>
<td><input type="text" size="4" name="content_reveal_time" value="<?php echo $options[ 'time' ]; ?>"/>&nbsp;
<select name="content_reveal_period">
<option value="h"<?php if ( $options[ 'period' ] == "h" ) { echo " selected='selected'"; } ?>><?php _e ( 'Hours', 'content-reveal' ); ?></option>
<option value="d"<?php if ( $options[ 'period' ] == "d" ) { echo " selected='selected'"; } ?>><?php _e ( 'Days', 'content-reveal' ); ?></option>
</select>&nbsp;<span class="description"><?php _e( 'How long to retain the cookies for', 'content-reveal' ); ?></span></td>
</tr>

<tr>
<th scope="row"><?php _e( 'Remove Adverts', 'content-reveal' ); ?></th>
<td><input type="checkbox" name="content_reveal_donated" value="1"<?php if ( $options[ 'donated' ] == "1" ) { echo ' checked="checked"'; } ?>/>&nbsp;<span class="description"><?php _e( "If you've <a href=\"http://www.artiss.co.uk/donate\">donated</a>, tick here to remove the adverts in the administration screens.", 'content-reveal' ); ?></span></td>
</tr>

</table>

<?php wp_nonce_field( 'content-reveal-options', 'content_reveal_options_nonce', true, true ); ?>

<p class="submit"><input type="submit" name="Submit" class="button-primary" value="<?php _e( 'Save Settings', 'content-reveal' ); ?>"/></p>

</form>

</div>