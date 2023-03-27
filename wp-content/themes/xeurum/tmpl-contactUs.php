<?php /* Template Name: Contact Us */ ?>

<?php get_header(); ?>

<?php the_post(); ?>

<section class="section section--contacts_page">
    <div class="container">
        <div class="row">
            <div class="wrapper">
                <h1>Contact Us</h1>
            </div>
        </div>
    </div>
</section>

<?php get_footer('', ['class' => 'contacts']); ?>