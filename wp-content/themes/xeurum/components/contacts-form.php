<?php

$prefix = '_xeu_footer_field_';
$settings = get_option('xeu_footer_settings');

$title = $settings[$prefix . 'contacts_title'];
$email = $settings[$prefix . 'contacts_email'];
$phone = $settings[$prefix . 'contacts_phone'];
$address = $settings[$prefix . 'contacts_address'];

?>

<section class="section section__contacts">
    <div class="container">
        <div class="row">
            <div class="wrapper">
                <h2 class="contacts--title mobile_show"><?= $title; ?></h2>
                <div class="form--wrapper">
                    <?= do_shortcode('[contact-form-7 id="5" title="Contacts"]'); ?>
                </div>
                <div class="contacts--wrapper">
                    <h2 class="contacts--title"><?= $title; ?></h2>
                    <ul class="contacts--list">
                        <li class="contacts--item email--item"><a href="mailto:<?= $email; ?>"><?= $email; ?></a></li>
                        <li class="contacts--item phone--item"><a href="tel:<?= $phone; ?>"><?= $phone; ?></a></li>
                        <li class="contacts--item address--item"><span><?= $address; ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

