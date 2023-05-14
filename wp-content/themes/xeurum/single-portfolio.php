<?php get_header();

$prefix = '_xeu_portfolio_';

$title = get_the_title();
$image_url = get_the_post_thumbnail_url();
$description = get_post_meta(get_the_id(), $prefix . 'description', true);
$about_project_arr = get_post_meta(get_the_id(), $prefix . 'about_project', true);
$technologies = get_post_meta(get_the_id(), $prefix . 'technologies');
$description_project = get_post_meta(get_the_id(), $prefix . 'description_project', true);
?>

<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
        <section class="section section__banner section__banner--project_page" style="background-image: url('<?= $image_url; ?>')">
            <div class="container">
                <div class="row">
                    <div class="wrapper">
                        <div class="description__wrapper description__wrapper--center">
                            <h1><?= $title; ?></h1>
                            <?php if($description) : ?>
                                <div class="description">
                                    <?= apply_filters('the_content', $description); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php if(is_array($about_project_arr) && count($about_project_arr) > 0): ?>
            <section class="section section__about_project">
                <div class="container">
                    <div class="row">
                        <div class="wrapper">
                            <div class="about_project--wrapper">
                                <?php foreach ($about_project_arr as $about_project_item) : ?>
                                    <div class="about_project--item">
                                        <div class="about_project--icon">
                                            <img src="<?= wp_get_attachment_image_url($about_project_item['icon'], 'thumb'); ?>">
                                        </div>
                                        <div class="about_project--description">
                                            <span class="label"><?= $about_project_item['label']; ?></span>
                                            <span class="description"><?= $about_project_item['description']; ?></span>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <?php if(is_array($description_project) && count($description_project) > 0): ?>
            <section class="section section__content">
                <div class="container">
                    <div class="row">
                        <div class="wrapper">
                            <div class="section__content--wrapper">
                                <?php foreach ($description_project as $description) : ?>
                                    <div class="content--description">
                                        <?= apply_filters('the_content', $description['description']); ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <section class="section section__technologies portfolio--section__technologies">
            <div class="container">
                <div class="row">
                    <div class="wrapper">
                        <div class="section__title-wrapper">
                            <h2 class="section-title">The technologies we have used:</h2>
                        </div>
                        <div class="section__icons-wrapper">
                            <?php foreach ($technologies as $index => $icon) : ?>
                                <div class="single__icon single__icon-<?= ceil(($index+1) / 7); ?>">
                                    <img src="<?= wp_get_attachment_image_url($icon, 'thumb'); ?>">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>