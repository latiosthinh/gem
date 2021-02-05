<?php
/**
 * Template name: Contact
 */
get_header();
?>

<section class="contact-banner clw" style="background:url(<?= rwmb_meta( 'banner' )['full_url'] ?>) center center / cover no-repeat">
	<div class="container">
		<h1><?= rwmb_meta( 'title' ) ?></h1>
		<h4><?= rwmb_meta( 'subtitle' ) ?></h4>
		<p><?= rwmb_meta( 'ttile_des' ) ?></p>
	</div>
</section>

<section class="home-contact about-contact" style="background:#fff">
	<div class="container">
		<?= do_shortcode( '[contact-form-7 id="129" title="Become Gem Partner"]' ) ?>
	</div>
</section>

<?php
get_footer();