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
<?php screen_icon(); ?>
<h2>Artiss Content Reveal</h2>

<?php
// If options have been updated on screen, update the database
if ( ( !empty( $_POST ) ) && ( check_admin_referer( 'content-reveal-options', 'content_reveal_options_nonce' ) ) ) {

	$options[ 'editor_button' ] = $_POST[ 'content_reveal_editor_button' ];
	$options[ 'cookies' ] = $_POST[ 'content_reveal_cookies' ];
	$options[ 'time' ] = $_POST[ 'content_reveal_time' ];
	$options[ 'period' ] = $_POST[ 'content_reveal_period' ];

	// Update the options
	update_option( 'content_reveal_options', $options );

	echo '<div class="updated fade"><p><strong>' . __( 'Settings Saved.' ) . "</strong></p></div>\n";
}

// Get options
$options = acr_get_options();
?>

<p><?php _e( 'These are the general settings for Artiss Content Reveal.' ); ?></p>

<form method="post" action="<?php echo get_bloginfo( 'wpurl' ).'/wp-admin/admin.php?page=content-reveal-options' ?>">

<table class="form-table">

<tr>
<th scope="row"><?php _e( 'Show Editor Button' ); ?></th>
<td><input type="checkbox" name="content_reveal_editor_button" value="1"<?php if ( $options[ 'editor_button' ] == "1" ) { echo ' checked="checked"'; } ?>/>&nbsp;<span class="description"><?php _e( 'Show the Content Reveal button on the post editor' ); ?></span></td>
</tr>

<tr>
<th scope="row"><?php _e( 'Use Cookies' ); ?></th>
<td><input type="checkbox" name="content_reveal_cookies" value="1"<?php if ( $options[ 'cookies' ] == "1" ) { echo ' checked="checked"'; } ?>/>&nbsp;<span class="description"><?php _e( 'Cookies are used to store the state of content' ); ?></span></td>
</tr>

<tr>
<th scope="row"><?php _e( 'Cookie Retention' ); ?></th>
<td><input type="text" size="4" name="content_reveal_time" value="<?php echo $options[ 'time' ]; ?>"/>&nbsp;
<select name="content_reveal_period">
<option value="h"<?php if ( $options[ 'period' ] == "h" ) { echo " selected='selected'"; } ?>><?php _e ( 'Hours' ); ?></option>
<option value="d"<?php if ( $options[ 'period' ] == "d" ) { echo " selected='selected'"; } ?>><?php _e ( 'Days' ); ?></option>
</select>&nbsp;<span class="description"><?php _e( 'How long to retain the cookies for' ); ?></span></td>
</tr>

</table>

<?php wp_nonce_field( 'content-reveal-options','content_reveal_options_nonce', true, true ); ?>

<p class="submit"><input type="submit" name="Submit" class="button-primary" value="<?php _e( 'Save Settings' ); ?>"/></p>

</form>

<?php
_e( '<h3>Acknowledgements</h3>' );

_e( '<p>Images have been compressed with <a href="http://www.smushit.com/ysmush.it/">Smush.it</a>.</p>' );

_e( '<p>JavaScript has been compressed with <a href="http://javascriptcompressor.com/">JavaScript Compressor</a>.</p>' );

_e( '<p>CSS has been compressed with the <a href="http://www.artiss.co.uk/css-compression">Artiss CSS Compressor</a>.</p>' );

_e( '<h3>Support Information</h3>' );

_e( '<p>Useful support information and links can be found by clicking on the Help tab at the top of this screen.</p>' );

_e( '<h4>This plugin, and all support, is supplied for free, but <a title="Donate" href="http://artiss.co.uk/donate" target="_blank">donations</a> are always welcome.</h4>' );

_e( '<h3>Stay in Touch</h3>' );

_e( '<p><a href="http://www.artiss.co.uk/wp-plugins">See the full list</a> of Artiss plugins, including beta releases.</p>' );

_e( '<p><a href="http://www.twitter.com/artiss_tech">Follow Artiss.co.uk</a> on Twitter.</p>' );

_e( '<p><a href="http://www.artiss.co.uk/feed">Subscribe</a> to the Artiss.co.uk news feed.</p>' );
?>

</div>