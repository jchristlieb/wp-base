<?php

namespace BaseTheme;

class AssetHandler
{
    public function __construct()
    {
        add_action('wp_enque_scripts', [$this, 'add_css']);
        add_action('wp_enque_scripts', [$this, 'add_js']);
    }

    public function add_js()
    {
        wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/assets/lib/bootstrap.min.js', ['jquery'], '1.0.0', true);
        wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], false, true);
    }

    public function add_css()
    {
        wp_enqueue_style('app', get_template_directory_uri() . '/assets/css/main.css');
    }
}