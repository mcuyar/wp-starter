<?php
// Don't load directly
if ( !defined('ABSPATH') ) { die('-1'); }

/**
 * Update the home url after the site has been installed
 *
 * @return void
 */
add_action('wp_install', function() {
    $url = get_option('site_url');
    update_option('home', str_replace('/wp', '', $url));
}, 9999);