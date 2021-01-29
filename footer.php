<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package novus
 */

?>

	<footer id="colophon" class="site-footer">
			<p class="site-info">&copy; Copyright <?= the_date( 'Y' ) ?> by <a href="<?= home_url(); ?>">NOVUS</a></p>
	</footer>
</main>

<?php wp_footer(); ?>

</body>
</html>
