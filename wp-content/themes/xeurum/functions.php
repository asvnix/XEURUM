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

    wp_enqueue_style( 'xeurum-style', get_template_directory_uri() . '/css/styles.css', array(), '1.0.3' );
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

add_filter('gutenberg_can_edit_post', '__return_false', 10);
add_filter('use_block_editor_for_post', '__return_false', 10);

// Disable Gutenberg on the back end.
add_filter( 'use_block_editor_for_post', '__return_false', 10);

// Disable Gutenberg for widgets.
add_filter( 'use_widgets_block_editor', '__return_false', 10);

add_action( 'wp_enqueue_scripts', function() {
    // Remove CSS on the front end.
    wp_dequeue_style( 'wp-block-library' );

    // Remove Gutenberg theme.
    wp_dequeue_style( 'wp-block-library-theme' );

    // Remove inline global CSS on the front end.
    wp_dequeue_style( 'global-styles' );
}, 20 );

function codextent_ssl_srcset( $sources ) {
    foreach ( $sources as &$source ) {
        $source['url'] = set_url_scheme( $source['url'], 'https' );
    }
    return $sources;
}
add_filter( 'wp_calculate_image_srcset', 'codextent_ssl_srcset', 10);
