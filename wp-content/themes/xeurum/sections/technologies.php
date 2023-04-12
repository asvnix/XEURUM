<?php

function xeu_render_technologies($section_id = '') {

    $prefix = '_technologies_' . $section_id . '_';
    $enable = get_post_meta(get_the_id(), $prefix . 'enable', true);
    if ($enable != true) {
        return;
    }
    // meta fields
    $title = get_post_meta(get_the_id(), $prefix . 'title', true);
    $icons = get_post_meta(get_the_id(), $prefix . 'icons');

    $section_classes = 'section section__technologies';


    ?>

    <section class="<?= $section_classes; ?>">
        <div class="container">
            <div class="row">
                <div class="wrapper">
                    <?php if($title): ?>
                        <div class="section__title-wrapper">
                            <h2 class="section-title"><?= $title; ?></h2>
                        </div>
                    <?php endif; ?>
                    <div class="section__icons-mobile-wrapper">
                        <div class="section__icons-wrapper">
                            <?php foreach ($icons as $index => $icon) : ?>
                                <div class="single__icon single__icon-<?= ceil(($index+1) / 7); ?>">
                                    <img src="<?= wp_get_attachment_image_url($icon, 'thumb'); ?>">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
}

function xeu_metaboxes_technologies($section_id = '') {

    $prefix = '_technologies_' . $section_id . '_';

    $meta_boxes = [
        'id' => 'technologies_' . $section_id,
        'title' => 'Technologies section ' . $section_id,
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
                'name' => 'Section icons',
                'id' => $prefix . 'icons',
                'type' => 'image_advanced',
                'image_size' => 'thumbnail'
            ],
        ]
    ];

    return $meta_boxes;

}
