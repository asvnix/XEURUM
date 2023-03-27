<?php

function xeu_render_our_services($section_id = '') {

    $prefix = '_our_services_' . $section_id . '_';
    $enable = get_post_meta(get_the_id(), $prefix . 'enable', true);
    $services_list = get_post_meta(get_the_id(), $prefix . 'services_list', true);
    if ($enable != true || !is_array($services_list) || count($services_list) === 0) {

        return;

    }
    // meta fields
    $title = get_post_meta(get_the_id(), $prefix . 'title', true);
    $description = get_post_meta(get_the_id(), $prefix . 'description', true);

    $section_classes = 'section section__our_services';

    ?>

    <section class="<?= $section_classes; ?>">
        <div class="container">
            <div class="row">
                <div class="wrapper">
                    <?php if($title || $description): ?>
                        <div class="section__title-wrapper">
                            <?php if($title): ?>
                                <h2 class="section-title"><?= $title; ?></h2>
                            <?php endif; ?>
                            <?php if($description): ?>
                                <p class="section-description"><?= $description; ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <div class="section__service-wrapper">
                        <?php foreach ($services_list as $service) : ?>
                            <div class="single__service">
                                <div class="single__service-icon">
                                    <img src="<?= wp_get_attachment_image_url($service['icon'], 'thumb'); ?>">
                                </div>
                                <p class="single__service-label"><?= $service['label'] ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
}

function xeu_metaboxes_our_services($section_id = '') {

    $prefix = '_our_services_' . $section_id . '_';

    $meta_boxes = [
        'id' => 'our_services_' . $section_id,
        'title' => 'Our services section ' . $section_id,
        'post_types' => 'page',
        'context' => 'normal',
        'priority' => 'high',
        'fields' => [
            [
                'name' => 'Display section',
                'id' => $prefix . 'enable',
                'type' => 'checkbox'
            ],
            [
                'name' => 'Section title',
                'id' => $prefix . 'title',
                'type' => 'text'
            ],
            [
                'name' => 'Section description',
                'id' => $prefix . 'description',
                'type' => 'textarea'
            ],
            [
                'name' => 'Services list',
                'id' => $prefix . 'services_list',
                'type' => 'group',
                'clone' => true,
                'sort_clone' => true,
                'fields' => [
                    [
                        'name' => 'Label',
                        'id' => 'label',
                        'type' => 'textarea'
                    ],
                    [
                        'name' => 'Icon',
                        'id' => 'icon',
                        'type' => 'single_image'
                    ],
                ]
            ],
        ]
    ];

    return $meta_boxes;

}
