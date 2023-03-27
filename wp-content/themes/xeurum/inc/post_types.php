<?php
add_action( 'init', 'register_post_types' );

function register_post_types(){

    register_post_type( 'portfolio', [
        'label'  => null,
        'labels' => [
            'name'               => 'Portfolio',
            'singular_name'      => 'Project',
            'add_new'            => 'Add new project',
            'add_new_item'       => 'Add new item',
            'edit_item'          => 'Edit project',
            'new_item'           => 'New project',
            'view_item'          => 'View project',
            'search_items'       => 'Search project',
            'not_found'          => 'Project not found',
            'not_found_in_trash' => 'Not found project in trash',
            'menu_name'          => 'Portfolio',
        ],
        'public'                 => true,
        'publicly_queryable'     => true,
        'show_ui'                => true,
        'show_in_menu'           => true,
        'capability_type'        => 'page',
        'show_in_rest'           => null,
        'rest_base'              => null,
        'menu_position'          => 5,
        'menu_icon'              => 'dashicons-open-folder',
        'hierarchical'           => true,
        'supports'               => [ 'title', 'editor', 'thumbnail' ],
        'taxonomies'             => [],
        'has_archive'            => true,
        'rewrite'                => true,
        'query_var'              => true,
    ] );

    register_post_type( 'services', [
        'label'  => null,
        'labels' => [
            'name'               => 'Services',
            'singular_name'      => 'Service',
            'add_new'            => 'Add new service',
            'add_new_item'       => 'Add new service',
            'edit_item'          => 'Edit service',
            'new_item'           => 'New service',
            'view_item'          => 'View service',
            'search_items'       => 'Search service',
            'not_found'          => 'Service not found',
            'not_found_in_trash' => 'Not found service in trash',
            'menu_name'          => 'Service',
        ],
        'description'            => '',
        'public'                 => true,
        'publicly_queryable'     => true,
        'show_in_menu'           => true,
        'show_in_rest'           => null,
        'rest_base'              => null,
        'menu_position'          => null,
        'menu_icon'              => 'dashicons-layout',
        'hierarchical'           => false,
        'supports'               => [ 'title', 'editor', 'author', 'thumbnail' ],
        'taxonomies'             => [],
        'has_archive'            => true,
        'rewrite'                => true,
        'query_var'              => true,
    ] );
}