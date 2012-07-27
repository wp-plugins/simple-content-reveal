<?php
/**
* Deprecated Code
*
* Various pieces of code, now deprecated, but kept here for backwards compatibility
*
* @package	ContentReveal
* @since	2.0
*/

/**
* Content Reveal Start
*
* Function to write out initial script around content
* Old name - no longer used by this plugin, but is by others
*
* @deprecated	2.0				Use acr_start instead.
* @since		2.0
*
* @uses			acr_start		Content Reveal start
*
* @param		string			$heading	Content heading
* @param		string			$id			Unique ID
* @param		string			$default	Default state
* @param		string			$img_url	Image folder URL
* @param		string			$ext		Image extension
* @return		string						Code to output
*/

function return_scr_start( $heading = '', $id = '', $default = '', $img_url = '', $ext = '' ) {
	return acr_start( $heading, $id, $default, $img_url, $ext );
}

/**
* Content Reveal End
*
* Function to write out final bit of script around content
* Old name - no longer used by this plugin, but is by others
*
* @deprecated	2.0				Use acr_end instead.
* @since		2.0
*
* @uses			acr_end			Content Reveal end
*
* @return		string						Code to output
*/

function return_scr_end() {
	return acr_end();
}

/**
* Content Reveal Function Call
*
* Function to add content reveal code, where requested
* Old name - no longer documented
*
* @deprecated	2.0				Use content_reveal instead.
* @since		2.0
*
* @uses			content_reveal	Content Reveal Function Call
*
* @param		string			$heading	Content heading
* @param		string			$id			Unique ID
* @param		string			$default	Default state
* @param		string			$img_url	Image folder URL
* @param		string			$ext		Image extension
*/

function simple_content_reveal( $heading = '', $id = '', $default = '', $img_url = '', $ext = '' ) {
	content_reveal( $heading, $id, $default, $img_url, $ext );
}
?>