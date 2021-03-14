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
		<div class="container">
			<div class="row newsletter">
				<div class="col-6 clw">
					<h3>Newsletter subscription</h3>
					<p>Get the latest insights and new tech event straight to your inbox</p>
				</div>

				<div class="col-6">
					<?= do_shortcode( '[contact-form-7 id="91" title="Subcribe"]' ) ?>
				</div>
			</div>

			<div class="row footer-widget">
				<div class="col-6">
					<a class="logo" href="<?= home_url() ?>">
						<img src="<?= NOVUS_IMG . '/logo-big.png' ?>" alt="<?= bloginfo() ?>">
					</a>

					<?php dynamic_sidebar( 'sidebar-2' ); ?>

					<p class="social">
						Connect to us via:
						<a href="https://www.facebook.com/gemvietnam/" target="_blank"><img src="<?= NOVUS_IMG . '/linkedin.svg' ?>" alt="Gem Facebook"></a>
						<a href="https://www.linkedin.com/company/gemcorporation/" target="_blank"><img src="<?= NOVUS_IMG . '/facebook.svg' ?>" alt="Gem LinkedIn"></a>
					</p>
				</div>

				<div class="col-6">
					<?php dynamic_sidebar( 'sidebar-3' ); ?>
				</div>
			</div>
		</div>
	</footer>
</main>

<?php wp_footer(); ?>

</body>
</html>
