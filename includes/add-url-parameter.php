<?php
/**
* Add URL Parameter
*
* Add a filter to WordPress to allow a new URL parameter
*
* @package	ContentReveal
* @since	2.0
*
* @param	string	$url_vars	Array of allowed parameters
* @return	string				Array of allowed parameter - new parameter added
*/

function acr_add_url_para( $url_vars ) {
	$url_vars[] = 'acr_state';
	$url_vars[] = 'acr_cookies';	
	return $url_vars;
}
add_filter( 'query_vars', 'acr_add_url_para' );
?>