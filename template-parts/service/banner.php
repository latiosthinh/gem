<section class="about-banner clw" style="background-image:url(<?= rwmb_meta( 'banner', null, get_queried_object_id() ) ? rwmb_meta( 'banner', null, get_queried_object_id() )['full_url'] : NOVUS_IMG . '/banner.svg' ?>)">
	<div class="container">
		<h1><?= get_the_title( get_queried_object_id() ) ?></h1>
		<p><?= rwmb_meta( 'title_des', null, get_queried_object_id() ) ?></p>

		<a class="btn-1 fw-5" href="<?= get_permalink( get_page_by_path( 'contact-us' ) ) ?>">
			<span>
				Contact us
				<img class="arrow-r" src="<?=  NOVUS_IMG . '/arrow-right.svg' ?>" alt="go to">
			</span>
		</a>
	</div>
</section>