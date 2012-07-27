<?php
/**
* Support Page
*
* Support for the plugin
*
* @package	ContentReveal
* @since	2.1
*/
?>
<div class="wrap">
<div class="icon32"><img src="<?php echo plugins_url(); ?>/simple-content-reveal/images/screen_icon.png" alt="" title="" height="32px" width="32px"/><br /></div>

<h2><?php _e( 'Artiss Content Reveal Support'); ?></h2>

<?php

// Get options

$options = acr_get_options();

// Display ads

if ( $options[ 'donated'] != 1 ) { artiss_plugin_ads( 'content-reveal' ); }
?>

<p><?php echo sprintf( __( 'You are using Artiss Content Reveal version %s. It was written by David Artiss.' ), content_reveal_version ); ?></p>

<?php

// Plugin Support information

echo '<h3>' . __( 'Plugin Support Information' ) . "</h3>\n";
echo '<p><a href="http://www.artiss.co.uk/content-reveal">' . __( 'Artiss Content Reveal plugin documentation' ) . "</a></p>\n";
echo '<p><a href="http://www.artiss.co.uk/forum/specific-plugins-group2/artiss-content-reveal-forum4">' . __( 'Artiss Content Reveal support forum' ) . "</a></p>\n";
echo '<h4>' . __( 'This plugin, and all support, is supplied for free, but <a title="Donate" href="http://artiss.co.uk/donate" target="_blank">donations</a> are always welcome.' ) . "</h4>\n";

// Acknowledgements

echo '<h3>' . __( 'Acknowledgements' ) . "</h3>\n";
echo '<p>' . sprintf( __( 'Images have been compressed with %s.' ), '<a href="http://www.smushit.com/ysmush.it/">Smush.it</a>' ) . "</p>\n";
echo '<p>' . sprintf( __( 'JavaScript has been compressed with %s.' ), '<a href="http://javascriptcompressor.com/">JavaScript Compressor</a>' ) . "</p>\n";
echo '<p>' . sprintf( __( 'CSS has been compressed with the %s.' ), '<a href="http://www.artiss.co.uk/css-compression">Artiss CSS Compressor</a>' ) . "</p>\n";
echo '<p>' . sprintf( __( 'JavaScript cookie code was suppled by %s.' ), '<a href="http://www.quirksmode.org/js/cookies.html">QuirksMode</a>' ) . "</p>\n";

// Stay in touch

echo '<h3>' . __( 'Stay in Touch' ) . "</h3>\n";
echo '<p>' . __( '<a href="http://www.artiss.co.uk/wp-plugins">See the full list</a> of Artiss plugins, including beta releases.' ) . "</p>\n";
echo '<p>' . __( '<a href="http://www.twitter.com/artiss_tech">Follow Artiss.co.uk</a> on Twitter.' ) . "</p>\n";
echo '<p>' . __( '<a href="http://www.artiss.co.uk/feed">Subscribe</a> to the Artiss.co.uk news feed.' ) . "</p>\n";

?>
</div>