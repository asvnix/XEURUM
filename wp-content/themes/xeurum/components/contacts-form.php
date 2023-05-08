<?php

$prefix = '_xeu_footer_field_';
$settings = get_option('xeu_footer_settings');

$title = $settings[$prefix . 'contacts_title'];
$email = isset($settings[$prefix . 'contacts_email']) ? $settings[$prefix . 'contacts_email'] : false;
$phone = isset($settings[$prefix . 'contacts_phone']) ? $settings[$prefix . 'contacts_phone'] : false;
$address = isset($settings[$prefix . 'contacts_address']) ? $settings[$prefix . 'contacts_address'] : false;

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
                        <?php if($email) : ?>
                            <li class="contacts--item email--item"><a href="mailto:<?= $email; ?>"><?= $email; ?></a></li>
                        <?php endif; ?>
                        <?php if($phone) : ?>
                            <li class="contacts--item phone--item"><a href="tel:<?= $phone; ?>"><?= $phone; ?></a></li>
                        <?php endif; ?>
                        <?php if($address) : ?>
                            <li class="contacts--item address--item"><span><?= $address; ?></span></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

