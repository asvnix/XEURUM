<?php

function xeu_render_portfolio($section_id = '') {

    $prefix = '_portfolio_' . $section_id . '_';
    $enable = get_post_meta(get_the_id(), $prefix . 'enable', true);
    if ($enable != true) {
        return;
    }
    $select_projects = get_post_meta(get_the_id(), $prefix . 'select_projects', true);

    $section_classes = 'section__portfolio';

    ?>

    <section class="<?= $section_classes; ?>">
        <div class="container">
            <div class="row">
                <div class="wrapper">

                        <?php foreach ($select_projects as $project) : ?>

                            <?php get_template_part( 'components/portfolio', '', [
                                'post_id' => $project['project'],
                                'prefix' => '_xeu_portfolio_',
                                'technologies_int' => 5
                            ] ); ?>

                        <?php endforeach; ?>

                </div>
            </div>
        </div>
    </section>

    <?php
}

function xeu_metaboxes_portfolio($section_id = '') {

    $prefix = '_portfolio_' . $section_id . '_';

    $meta_boxes = [
        'id' => 'portfolio_' . $section_id,
        'title' => 'Portfolio section ' . $section_id,
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
                'name'        => 'Select projects',
                'id'          => $prefix . 'select_projects',
                'type'        => 'group',
                'clone'       => true,
                'sort_clone'  => true,
                'fields' => [
                    [
                        'name'        => 'Project',
                        'id'          => 'project',
                        'type'        => 'post',
                        'post_type'   => 'portfolio',
                        'ajax'        => false,
                        'multiple'    => false
                    ],
                ]
            ],
        ]
    ];

    return $meta_boxes;

}
