<?php
/**
 * @var array $args
 */
?>
        </main>
        <footer class="<?= (is_array($args) && count($args) > 0) ? $args['class'] : '' ; ?>">
            <?php get_template_part( 'components/contacts-form', '', []); ?>
		</footer>

	<?php wp_footer(); ?>

	</body>

</html>
