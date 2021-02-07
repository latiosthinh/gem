<section class="home-banner clw" style="background-image:url(<?= rwmb_meta( 'banner' )['full_url'] ?>)">
	<div class="container home-banner__content">
		<p class="d-flex fw-5">
			<img src="<?= NOVUS_IMG . '/it.svg' ?>" style="width:46px;object-fit:contain;margin-right:13px">
			IT Delivery Services
		</p>

		<h1><?= rwmb_meta( 'banner_title' ) ?></h1>
		<p><?= rwmb_meta( 'banner_des' ) ?></p>

		<a class="btn-1 fw-5" href="<?= get_permalink( get_page_by_path( 'contact-us' ) ) ?>">
			<span>
				Contact us
				<img class="arrow-r" src="<?=  NOVUS_IMG . '/arrow-right.svg' ?>">
			</span>
		</a>
	</div>

	<div class="container home-banner__about">
		<h2><?= rwmb_meta( 'about_titile' ) ?></h2>
		<p><?= rwmb_meta( 'about_des' ) ?></p>

		<a class="btn-1 fw-5" href="<?= get_permalink( get_page_by_path( 'about-us' ) ) ?>">
			<span>
				Learn more about us
				<img class="arrow-r" src="<?=  NOVUS_IMG . '/arrow-right.svg' ?>">
			</span>
		</a>
	</div>
</section>