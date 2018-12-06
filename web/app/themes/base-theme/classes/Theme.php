<?php

namespace BaseTheme;

class Theme
{
    // add actions for all functions
    public function __construct()
    {
        add_action('after_setup_theme', [$this, 'setup']);
        add_action('init', [$this, 'cleanup_wphead']);
        add_action('after_setup_theme', [$this, 'remove_jason_api']);
        add_action('init', [$this, 'remove_emoji']);
        add_action('init', [$this, 'remove_tinymce_emoji']);
    }

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */

    public function setup()
    {
        /*
           * Make theme available for translation.
           * Translations can be filed in the /languages/ directory.
           * If you're building a theme based on _s, use a find and replace
           * to change 'escape' to the name of your theme in all the template files.
           */
        load_theme_textdomain('base-theme', get_template_directory() . '/languages');


        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');


        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');
        add_image_size('400x225', 400, 225, ['center', 'center']);
        add_image_size('600x450', 600, 450, ['center', 'center']);
        add_image_size('800x450', 800, 450, ['center', 'center']);
        add_image_size('700x360', 700, 360, ['center', 'center']);
        add_image_size('1200x800', 1200, 800, ['center', 'center']);
        add_image_size('1900x450', 1900, 450, ['center', 'center']);


        // This theme uses wp_nav_menu() in one location.
        register_nav_menus([
            'nav__main'   => esc_html__('Main Navigation', 'base-theme'),
            'nav__footer' => esc_html__('Footer Navigation', 'base-theme'),
        ]);


        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ]);
    }


    public function cleanup_wphead()
    {
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wp_generator');
        remove_action('wp_head', 'index_rel_link');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'feed_links', 2);
        remove_action('wp_head', 'feed_links_extra', 3);
        remove_action('wp_head', 'parent_post_rel_link', 10, 0);
        remove_action('wp_head', 'start_post_rel_link', 10, 0);
        remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
        remove_action('wp_head', 'wp_shortlink_header', 10, 0);
        remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
        remove_action('wp_head', 'rel_canonical');
        remove_action('wp_head', 'wp_resource_hints', 2);
    }

    public function remove_json_api()
    {
        // Remove the REST API lines from the HTML Header
        remove_action('wp_head', 'rest_output_link_wp_head', 10);
        remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
        // Remove the REST API endpoint.
        remove_action('rest_api_init', 'wp_oembed_register_route');
        // Turn off oEmbed auto discovery.
        add_filter('embed_oembed_discover', '__return_false');
        // Don't filter oEmbed results.
        remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
        // Remove oEmbed discovery links.
        remove_action('wp_head', 'wp_oembed_add_discovery_links');
        // Remove oEmbed-specific JavaScript from the front-end and back-end.
        remove_action('wp_head', 'wp_oembed_add_host_js');
        // Remove all embeds rewrite rules.
        //add_filter('rewrite_rules_array', 'disable_embeds_rewrites');
        // Remove template redirect
        remove_action('template_redirect', 'rest_output_link_header', 11, 0);
    }

    function remove_emoji()
    {
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('admin_print_styles', 'print_emoji_styles');
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_filter('the_content_feed', 'wp_staticize_emoji');
        remove_filter('comment_text_rss', 'wp_staticize_emoji');
        remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
        add_filter('tiny_mce_plugins', [$this, 'remove_tinymce_emoji']);
    }

    function remove_tinymce_emoji($plugins)
    {
        if (!is_array($plugins)) {
            return [];
        }
        return array_diff($plugins, [
            'wpemoji',
        ]);
    }


}