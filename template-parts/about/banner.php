<section class="about-banner clw" style="background-image:url(<?= rwmb_meta( 'banner' )['full_url'] ?>)">
	<div class="container">
		<h1><?= rwmb_meta( 'title' ) ?></h1>
		<p><?= rwmb_meta( 'title_des' ) ?></p>

		<a class="btn-1 fw-5" href="<?= get_permalink( get_page_by_path( 'contact-us' ) ) ?>">
			<span>
				Contact us
				<img class="arrow-r" src="<?=  NOVUS_IMG . '/arrow-right.svg' ?>" alt="contact">
			</span>
		</a>
	</div>
</section>