<?php /* Template Name: LandingPage */ ?>

<?php get_header(); ?>

<?php the_post();

$page_sections = get_post_meta($post->ID, '_xeu_page_sections', true);

if (!empty($page_sections)) {
    foreach ($page_sections as $section) {
        call_user_func('xeu_render_' . $section['type'], $section['id']);
    }
}
?>

<?php get_footer(); ?>