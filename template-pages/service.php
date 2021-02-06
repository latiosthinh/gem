<?php
/**
 * Template name: Service
 */
get_header();


get_template_part( 'template-parts/service/banner' );


?>


<section class="home-contact about-contact">
	<div class="container">
		<?= do_shortcode( '[contact-form-7 id="166" title="Send us a request"]' ) ?>
	</div>
</section>

<?php
get_footer();