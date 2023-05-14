<?php
/**
 * @var array $args
 */
?>
        </main>
        <footer id="footer__contacts" class="<?= (is_array($args) && count($args) > 0) ? $args['class'] : '' ; ?>">
            <?php get_template_part( 'components/contacts-form', '', []); ?>
		</footer>
        <div class="after__footer">
            <div class="container">
                <div class="row">
                    <div class="wrapper">
                        <div class="footer__menu-wrapper">
                            <div class="copyright__wrapper">
                                <p>© 2018 — <?= date('Y'); ?> XEURUM.com </p>
                            </div>
                            <div class="footer__menu_wrapper">
                                <?php wp_nav_menu(['theme_location'  => 'footerMenu']); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

	<?php wp_footer(); ?>

	</body>

</html>
