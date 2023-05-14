<?php get_header('',['classes' => 'default']); ?>

<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
        <section class="section section--default">
            <div class="container">
                <div class="row">
                    <div class="wrapper">
                        <div class="default--description__wrapper">
                            <h1 class="section-title"><?php the_title();?></h1>
                            <div class="post__description">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>