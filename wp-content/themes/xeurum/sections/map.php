<?php

function xeu_render_map($section_id = '') {

    $prefix = '_map_' . $section_id . '_';
    $enable = get_post_meta(get_the_id(), $prefix . 'enable', true);
    $map = get_post_meta(get_the_id(), $prefix . 'map', true);
    if ($enable != true || !$map) {
        return;
    }
    // meta fields
    $title = get_post_meta(get_the_id(), $prefix . 'title', true);

    $section_classes = 'section section__map';

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
                    <div class="section__map-wrapper">
                        <img src="<?= wp_get_attachment_image_url($map, 'full'); ?>">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
}

function xeu_metaboxes_map($section_id = '') {

    $prefix = '_map_' . $section_id . '_';

    $meta_boxes = [
        'id' => 'map_' . $section_id,
        'title' => 'Map section ' . $section_id,
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
                'name' => 'Section image',
                'id' => $prefix . 'map',
                'type' => 'single_image'
            ],
        ]
    ];

    return $meta_boxes;

}
