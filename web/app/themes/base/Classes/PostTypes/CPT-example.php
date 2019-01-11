<?php

namespace Base\PostTypes;

class CPT_name_singular
{
    public function __construct()
    {
        add_action('init', [$this, 'add_custom_post_type']);

    }

    // Register CPT
    public function add_custom_post_type()
    {
        $labels = [
            'name'                  => _x('CPT_name_plural', 'Post Type General Name', 'base'),
            'singular_name'         => _x('CPT_name_singular', 'Post Type Singular Name', 'base'),
            'menu_name'             => __('CPT_name_plural', 'base'),
            'name_admin_bar'        => __('CPT_name_plural', 'base'),
            'archives'              => __('CPT_name_singular Archives', 'base'),
            'attributes'            => __('CPT_name_singular Attributes', 'base'),
            'parent_item_colon'     => __('Parent Item:', 'base'),
            'all_items'             => __('All CPT_name_plural', 'base'),
            'add_new_item'          => __('Add New CPT_name_singular', 'base'),
            'add_new'               => __('Add New', 'base'),
            'new_item'              => __('New CPT_name_singular', 'base'),
            'edit_item'             => __('Edit CPT_name_singular', 'base'),
            'update_item'           => __('Update CPT_name_singular', 'base'),
            'view_item'             => __('View CPT_name_singular', 'base'),
            'view_items'            => __('View CPT_name_plural', 'base'),
            'search_items'          => __('Search CPT_name_singular', 'base'),
            'not_found'             => __('Not found', 'base'),
            'not_found_in_trash'    => __('Not found in Trash', 'base'),
            'featured_image'        => __('Featured Image', 'base'),
            'set_featured_image'    => __('Set featured image', 'base'),
            'remove_featured_image' => __('Remove featured image', 'base'),
            'use_featured_image'    => __('Use as featured image', 'base'),
            'insert_into_item'      => __('Insert into CPT_name_singular', 'base'),
            'uploaded_to_this_item' => __('Uploaded to this item', 'base'),
            'items_list'            => __('CPT_name_plural list', 'base'),
            'items_list_navigation' => __('CPT_name_plural list navigation', 'base'),
            'filter_items_list'     => __('Filter CPT_name_plural list', 'base'),
        ];

        $args = [
            'label'               => __('CPT_name_singular', 'base'),
            'description'         => __('Custom Post Type for the CPT_name_plural', 'base'),
            'labels'              => $labels,
            'supports'            => ['title'],
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 5,
            'show_in_admin_bar'   => true,
            'show_in_nav_menus'   => true,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
        ];

        register_post_type('CPT_name_singular', $args);
    }
    
}