<?php
/**
 * @var array $args
 * $args = ['post_id' => int, 'prefix' => string, 'technologies_int' => int]
 */
$post_id = $args['post_id'];
$prefix = $args['prefix'];
$technologies_int = $args['technologies_int'];

$post_image = get_post_meta($post_id, $prefix . 'archive_image', true);
$post_image_url = $post_image ? wp_get_attachment_image_url($post_image, 'large') : get_the_post_thumbnail_url($post_id, 'large');
$post_description = get_post_meta($post_id, $prefix . 'description_short', true);
$technologies = get_post_meta($post_id, $prefix . 'technologies');

?>

<div class="post__item--wrapper">
    <div class="post__item--image">
        <img src="<?= $post_image_url; ?>">
    </div>
    <div class="post__item--description-wrapper">
        <h2 class="post__item--title"><?= get_the_title($post_id); ?></h2>
        <p class="post__item--description"><?= $post_description; ?></p>
        <div class="post__item--technologies-wrapper">
            <?php foreach ($technologies as $index => $icon) : ?>
                <?php if($technologies_int > $index) : ?>
                    <div class="post__item--technologies-icon">
                        <img src="<?= wp_get_attachment_image_url($icon, 'thumb'); ?>">
                    </div>
                <?php endif; ?>
            <?php endforeach; wp_reset_postdata();?>
        </div>
        <a class="post__item--technologies-btn button" href="<?= get_permalink($post_id) ?>">Case Study</a>
    </div>
</div>
