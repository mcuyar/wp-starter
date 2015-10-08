<?php namespace Foundation;

use Support\Base\Options;

class Security extends Options {

    /**
     * Run the links filter
     *
     * @var bool
     */
    public $links = true;

    /**
     * Run the version filter
     *
     * @var bool
     */
    public $version = true;

    /**
     * Run the script filter
     *
     * @var bool
     */
    public $scripts = true;

    /**
     * Set the login message filter
     *
     * @var string
     */
    public $login_message = 'the login information you have entered is incorrect.';

    /**
     * Run the file editor removal
     *
     * @var bool
     */
    public $file_editor = true;

    /**
     * Secure the wordpress site
     *
     * @param array $options
     */
    public static function secure(array $options = [])
    {
        $instance = new static($options);
        $instance->filter();
    }

    /**
     * return a filtered array
     *
     * @return array
     */
    protected function filter()
    {
        $filtered = array_filter($this->publicProperties());

        foreach(array_keys($filtered) as $filter => $value) {
            $this->{$filter}($value);
        }
    }

    /**
     * Remove uneeded links from the various places in Wordpress
     *
     * @return void
     */
    protected function links()
    {
        remove_action('wp_head', 'feed_links', 2);
        remove_action('wp_head', 'feed_links_extra', 3);
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'index_rel_link');
        remove_action('wp_head', 'parent_post_rel_link', 10);
        remove_action('wp_head', 'start_post_rel_link', 10);
        remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
        remove_action('wp_head', 'wp_shortlink_wp_head', 10);
    }

    /**
     * Remove the version number from the head
     * rss feed as well as the powered by link
     *
     * @return void
     */
    protected function version()
    {
        //Remove WP version from header
        remove_action('wp_head', 'wp_generator');

        //Remove WP version from RSS feed
        add_filter('the_generator', function() { return ''; });

        //Fingerprint source code and header removal
        header_remove('x-powered-by');
    }

    /**
     * Manage how specific scripts are used
     * throughout the site
     *
     * @return void
     */
    protected function scripts()
    {
        add_action('wp_enqueue_scripts', function() {

            // Remove swfobject script
            wp_deregister_script('swfobject');

            //Front End only
            if (!is_admin()) {
                wp_deregister_script('l10n');
            }

            //Load comments only when needed
            if ((is_page() || is_single()) && comments_open()) {
                wp_enqueue_script('comment-reply');
            }
        });

    }

    /**
     * Set the default login message to avoid
     * showing if the username or password is incorrect
     *
     * @param $message
     * @return void
     */
    protected function loginMessage($message)
    {
        add_filter ('login_errors', function() {
            return $this->login_message;
        });
    }

    /**
     * Remove file editing capabilities from
     * the wordpress admin
     *
     * @return void
     */
    protected function fileEditor()
    {
        define('DISALLOW_FILE_EDIT', true);
    }
}