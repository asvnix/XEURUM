<?php

function xeu_render_banner($section_id = '') {

    $prefix = '_banner_' . $section_id . '_';
    $enable = get_post_meta(get_the_id(), $prefix . 'enable', true);
    if ($enable != true) {

        return;

    }
    // meta fields
    $section_type = get_post_meta(get_the_id(), $prefix . 'section_type', true);
    $image_id = get_post_meta(get_the_id(), $prefix . 'image', true);
    $image_url = wp_get_attachment_image_url($image_id, 'full');
    $description_center = get_post_meta(get_the_id(), $prefix . 'description_center', true);
    $title = get_post_meta(get_the_id(), $prefix . 'title', true);
    $description = get_post_meta(get_the_id(), $prefix . 'description', true);
    $button_label = get_post_meta(get_the_id(), $prefix . 'button_label', true);
    $button_url = get_post_meta(get_the_id(), $prefix . 'button_url', true);

    $section_classes = 'section section__banner section__type-' . $section_type;
    if(!$description || strlen($description) === 0) {
        $section_classes .= ' without_description';
    }

    ?>

    <section class="<?= $section_classes; ?>" style="background-image: url('<?= $image_url; ?>')">
        <?php if($section_type === 'image_right'): ?>
            <span class="section__bg--left"></span>
        <?php endif; ?>
        <div class="container">
            <div class="row">
                <div class="wrapper">
                    <div class="description__wrapper <?= ($description_center)? 'description__wrapper--center' : '' ;?>">
                        <h1><?= $title;?></h1>
                        <?php if($description) : ?>
                            <div class="description">
                                <?= apply_filters('the_content', $description); ?>
                            </div>
                        <?php endif; ?>
                        <?php if($button_url && $button_label) : ?>
                            <a href="<?= $button_url; ?>"><?= $button_label; ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
}

function xeu_metaboxes_banner($section_id = '') {

    $prefix = '_banner_' . $section_id . '_';

    $meta_boxes = [
        'id' => 'banner_' . $section_id,
        'title' => 'Banner section ' . $section_id,
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
                'name' => 'Banner section background type',
                'id' => $prefix . 'section_type',
                'type' => 'select',
                'options'         => [
                    'image'       => 'Only image',
                    'image_right' => 'Image right'
                ],
                'std' => 'image'
            ],
            [
                'name' => 'Section image',
                'id' => $prefix . 'image',
                'type' => 'single_image'
            ],
            [
                'name' => 'Section description center',
                'id' => $prefix . 'description_center',
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
                'type' => 'wysiwyg'
            ],
            [
                'name' => 'Section button (label)',
                'id' => $prefix . 'button_label',
                'type' => 'text'
            ],
            [
                'name' => 'Section button (url)',
                'id' => $prefix . 'button_url',
                'type' => 'text'
            ],
        ]
    ];

    return $meta_boxes;

}
