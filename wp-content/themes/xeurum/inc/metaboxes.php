<?php

/* define the settings pages */
add_filter('mb_settings_pages', 'xeu_options_pages');

function xeu_options_pages($settings_pages) {

    $settings_pages[] = array(
        'id'          => 'xeu-site-settings',
        'option_name' => 'xeu_site_settings',
        'menu_title'  => 'Site settings',
        'icon_url'      => 'dashicons-edit-large',
        'submenu_title' => 'Site Settings',
    );
    $settings_pages[] = [
        'id'          => 'xeu-footer-settings',
        'option_name' => 'xeu_footer_settings',
        'menu_title'  => 'Footer Options',
        'parent'      => 'xeu-site-settings',
    ];

    return $settings_pages;

}

// Register the footer settings
add_filter( 'rwmb_meta_boxes', 'xeu_register_settings_meta_boxes' );

function xeu_register_settings_meta_boxes( $meta_boxes ) {

    /* define site setting prefixes */
    $site_prefix = '_xeu_site_field_';
    $footer_prefix = '_xeu_footer_field_';

    // all site setting fields
    $meta_boxes[] = [
        'title' => 'Site Settings',
        'settings_pages' => 'xeu-site-settings',
        'fields' => [
            [
                'name' => 'Portfolio banner image',
                'id' => $site_prefix . 'portfolio_banner_image',
                'type' => 'single_image'
            ],
        ],
    ];

    // footer setting fields
    $meta_boxes[] = [
        'title' => 'Footer Settings',
        'settings_pages' => 'xeu-footer-settings',
        'fields' => [
            [
                'name' => 'Contacts title',
                'id' => $footer_prefix . 'contacts_title',
                'type' => 'text'
            ],
            [
                'name' => 'Contacts email',
                'id' => $footer_prefix . 'contacts_email',
                'type' => 'text'
            ],
            [
                'name' => 'Contacts phone',
                'id' => $footer_prefix . 'contacts_phone',
                'type' => 'text'
            ],
            [
                'name' => 'Contacts address',
                'id' => $footer_prefix . 'contacts_address',
                'type' => 'text'
            ],
        ],
    ];

    // Portfolio setting fields
    $portfolio_prefix = '_xeu_portfolio_';
    $meta_boxes[] = [
        'id' => 'portfolio_',
        'title' => 'Portfolio section',
        'post_types' => 'portfolio',
        'fields' => [
            [
                'name' => 'Portfolio image on main/archive pages',
                'id' => $portfolio_prefix . 'archive_image',
                'type' => 'single_image'
            ],
            [
                'name' => 'Portfolio description',
                'id' => $portfolio_prefix . 'description',
                'type' => 'wysiwyg'
            ],
            [
                'name' => 'Portfolio description short',
                'id' => $portfolio_prefix . 'description_short',
                'type' => 'text'
            ],
            [
                'name' => 'About project',
                'id' => $portfolio_prefix . 'about_project',
                'type' => 'group',
                'clone' => true,
                'sort_clone' => true,
                'max_clone' => 4,
                'fields' => [
                    [
                        'name' => 'Icon',
                        'id' => 'icon',
                        'type' => 'single_image'
                    ],
                    [
                        'name' => 'Label',
                        'id' => 'label',
                        'type' => 'text'
                    ],
                    [
                        'name' => 'Description',
                        'id' => 'description',
                        'type' => 'text'
                    ],
                ]
            ],
            [
                'name' => 'Description project',
                'id' => $portfolio_prefix . 'description_project',
                'type' => 'group',
                'clone' => true,
                'sort_clone' => true,
                'fields' => [
                    [
                        'name' => 'Description',
                        'id' => 'description',
                        'type' => 'wysiwyg'
                    ],
                ]
            ],
            [
                'name' => 'Technologies',
                'id' => $portfolio_prefix . 'technologies',
                'type' => 'image_advanced',
                'image_size' => 'thumbnail'
            ],
        ]
    ];

    return $meta_boxes;
}