<?php 

/**
 * Used to guarantee unique hash cookies
 *
 * @todo: need to figure out how to get this working
 */

return array(
	 
	'COOKIEHASH' 			=> md5( WP_SITEURL),
		
	'TEST_COOKIE' 			=> 'wordpress_test_cookie',
	
	'COOKIEPATH' 			=> preg_replace('|https?://[^/]+|i', '', WP_HOME . '/'),
	
	'SITECOOKIEPATH' 		=> preg_replace('|https?://[^/]+|i', '', WP_SITEURL . '/' ),

	'COOKIE_DOMAIN' 		=> false,

);