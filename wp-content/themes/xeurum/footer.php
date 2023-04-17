<?php
/**
 * @var array $args
 */
?>
        </main>
        <footer id="footer__contacts" class="<?= (is_array($args) && count($args) > 0) ? $args['class'] : '' ; ?>">
            <?php get_template_part( 'components/contacts-form', '', []); ?>
		</footer>

	<?php wp_footer(); ?>

	</body>

</html>
