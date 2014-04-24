<?php 

return array(
	 
	/** 
	 * Set Wordpress Memory Limits
	 */
	'WP_MEMORY_LIMIT' => '64M',
	'WP_MAX_MEMORY_LIMIT' => '256M',
	 
	/**
	 * Application Cache
	 *
	 * Allows for custom application cache by loading the advanced-cache.php in the WP_CONTENT_DIR
	 * Wordpress will also run wp_cache_postload() if object cache is enabled and the function exists.
	 *
	 */
	
	'WP_CACHE' => false,
	
	/**
	 * Must Use Plugins Directory
	 *
	 * Change the default location for mustuse plugins directory to allow
	 * allow global app plugins to be installed
	 *
	 * The 'WPMU_PLUGIN_URL' Constant will be automatically
	 *
	 */
	 'WPMU_PLUGIN_DIR' => realpath(__DIR__.'/../plugins'),
);