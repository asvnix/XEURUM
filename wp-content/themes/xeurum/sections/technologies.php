<?php

function xeu_render_technologies($section_id = '') {

    $prefix = '_technologies_' . $section_id . '_';

    $enable = get_post_meta(get_the_id(), $prefix . 'enable', true);

    if ($enable != true) {

        return;

    }

    ?>

    <section>
        <div class="container">



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
        ]
    ];

    return $meta_boxes;

}
