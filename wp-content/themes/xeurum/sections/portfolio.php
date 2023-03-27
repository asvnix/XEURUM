<?php

function xeu_render_portfolio($section_id = '') {

    $prefix = '_portfolio_' . $section_id . '_';
    $enable = get_post_meta(get_the_id(), $prefix . 'enable', true);
    if ($enable != true) {
        return;
    }

    $section_classes = 'section__portfolio';

    $args = [
        'post_type' => 'portfolio',
        'posts_per_page' => -1,
        'order' => 'DESC',
        'order_by' => 'ID'
    ];

    $query = new WP_Query( $args );

    ?>

    <section class="<?= $section_classes; ?>">

        <?php if ( $query->have_posts() ) : ?>
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                <?php get_template_part( 'components/portfolio', '', [
                    'post_id' => get_the_ID(),
                    'prefix' => '_xeu_portfolio_',
                    'technologies_int' => 5
                ] ); ?>

            <?php endwhile; ?>
        <?php endif; ?>

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
        ]
    ];

    return $meta_boxes;

}
