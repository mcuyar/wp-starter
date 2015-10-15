<?php

/**
 * Register the default wordpress theme directory
 * 
 * @return void
 */

add_action('muplugins_loaded', function(){
	register_theme_directory( trailingslashit(ABSPATH).'wp-content/themes' );
});