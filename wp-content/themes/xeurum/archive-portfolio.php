<?php get_header();

$settings = get_option('xeu_site_settings');
$image_url = wp_get_attachment_image_url($settings['_xeu_site_field_portfolio_banner_image'], 'full');

?>
    <section class="section section__banner section__banner--archive" style="background-image: url('<?= $image_url; ?>')">
        <div class="container">
            <div class="row">
                <div class="wrapper">
                    <ul class="breadcrumbs">
                        <li class="breadcrumbs_item">
                            <a class="link" href="/">Home</a>
                        </li>
                        <span class="separator"> - </span>
                        <li class="breadcrumbs_item">
                            <span>Cases</span>
                        </li>
                    </ul>
                    <div class="description__wrapper description__wrapper--center">
                        <h1><?= post_type_archive_title(); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section__portfolio">
        <?php if (have_posts()): ?>
            <?php while (have_posts()): the_post(); ?>

                <?php get_template_part( 'components/portfolio', '', [
                    'post_id' => get_the_ID(),
                    'prefix' => '_xeu_portfolio_',
                    'technologies_int' => 5
                ] ); ?>

            <?php endwhile; ?>
        <?php endif; ?>

    </section>

<?php get_footer(); ?>