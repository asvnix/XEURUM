<?php

/* running theme setup functions, such as enabling support for the title tag and so on */
add_action('after_setup_theme', 'xeurum_theme_setup');

function xeurum_theme_setup() {

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

}

// add scripts and styles

add_action('wp_enqueue_scripts', 'xeurum_scripts');
add_action('wp_enqueue_scripts', 'xeurum_styles');

function xeurum_styles() {
    
    wp_enqueue_style( 'xeurum-style', get_template_directory_uri() . '/css/styles.css', array(), '1.0.0' );
    wp_enqueue_style( 'xeurum-media-style', get_template_directory_uri() . '/css/media.css', array(), '1.0.0' );

}
function xeurum_scripts() {

    wp_enqueue_script('xeurum-scripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0', true);
    wp_localize_script('xeurum-scripts', 'generalData', ['ajaxurl' => admin_url('admin-ajax.php')]);

}

// Register  navigation menus
add_action( 'after_setup_theme', function(){
    register_nav_menus( [
        'headerMenu' => 'Header Menu'
    ] );
} );

function register_options_pages($settings_pages) {

    $settings_pages[] = array(
        'id'          => 'site-settings-main',
        'option_name' => 'site_settings_main',
        'menu_title'  => 'Site Settings',
        'icon_url'    => 'dashicons-edit',
        'style'       => 'boxes',
        'columns'     => 1,
        'position'    => 68,
    );

    return $settings_pages;

}

include 'inc/sections_handler.php';
include 'inc/metaboxes.php';
include 'inc/post_types.php';
