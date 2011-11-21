<?php
/**
* Function Calls
*
* Content Reveal function calls
*
* @package	ContentReveal
*/

/**
* Content Reveal Function Call
*
* Function to add content reveal code, where requested
*
* @since	2.0
*
* @param	string	$heading	Content heading
* @param	string	$id			Unique ID
* @param	string	$default	Default state
* @param	string	$img_url	Image folder URL
* @param	string	$ext		Image extension
* @param	string	$cookie		How long to retain cookie
* @param	string	$title1		First title text
* @param	string	$title2		Alternative title text
*/

function content_reveal( $heading = '', $id = '', $default = '', $img_url = '', $ext = '', $cookie = '', $title1 = '', $title2 = '' ) {

    if ( $heading . $id . $default . $img_url . $ext . $cookie . $title1 . $title2 == '' ) {
        echo acr_end();
    } else {
        echo acr_start( $heading, $id, $default, $img_url, $ext, $cookie, false, $title1, $title2 );
    }
}

/**
* Content Reveal Link Function Call
*
* Function to add link that will hide/reveal section
*
* @since	2.0
*
* @param	string	$heading	Content heading
* @param	string	$id			Unique ID
* @param	string	$default	Default state
* @param	string	$img_url	Image folder URL
* @param	string	$ext		Image extension
* @param	string	$cookie		How long to retain cookie
* @param	string	$title1		First title text
* @param	string	$title2		Alternative title text
*/

function reveal_link( $heading = '', $id = '', $default = '', $img_url = '', $ext = '', $cookie = '', $title1 = '', $title2 = '' ) {

    echo acr_start( $heading, $id, $default, $img_url, $ext, $cookie, true, $title1, $title2 );
}
?>