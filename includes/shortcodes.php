<?php
/**
* Shortcodes
*
* Content Reveal shortcode functions
*
* @package	ContentReveal
*/

/**
* Content Reveal Shortcode
*
* Shortcode to add reveal functionality in posts/pages
*
* @since	2.0
*
* @param	string	$paras		Shortcode parameters
* @param	string	$content	Page content
* @return	string				Page content
*/

function sc_content_reveal( $paras = '', $content = '' ) {

	extract( shortcode_atts( array( 'heading' => '', 'id' => '', 'default' => '', 'img_url' => '', 'ext' => '', 'cookie' => '', 'title1' => '', 'title2' => '' ), $paras ) );

    if ( $content == '' ) {

		// If no content used, default to old method of requiring 2 shortcode calls
        if ( $heading . $id . $default . $img_url . $ext . $cookie == "") {
            return acr_end();
        } else {
            return acr_start( $heading, $id, $default, $img_url, $ext, $cookie, '', $title1, $title2 );
        }

    } else {

		// If content specified, wrap start and end of content reveal code around it
		return  acr_start( $heading, $id, $default, $img_url, $ext, $cookie, '', $title1, $title2 ) . $content . acr_end();
    }
}
add_shortcode( 'reveal', 'sc_content_reveal' );

/**
* Content Reveal Link Shortcode
*
* Shortcode to add link to hide/reveal section
*
* @since	2.0
*
* @param	string	$paras		Shortcode parameters
* @param	string	$content	Not used
* @return	string				Page content
*/

function sc_content_link( $paras = '', $content = '' ) {

	extract( shortcode_atts( array( 'heading' => '', 'id' => '', 'default' => '', 'img_url' => '', 'ext' => '', 'cookie' => '' ), $paras ) );

    return acr_start( $heading, $id, $default, $img_url, $ext, $cookie, true );
}
add_shortcode( 'reveal_link', 'sc_content_link' );
?>