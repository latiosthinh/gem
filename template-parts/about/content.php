<section class="about-content">
	<div class="container">
		<div class="row">
			<div class="col-6">
				<?php the_content(); ?>

				<a class="btn-1 fw-5" href="<?= get_permalink( get_page_by_path( 'contact-us' ) ) ?>">
					<span>
						Talk with our experts
						<img class="arrow-r" src="<?=  NOVUS_IMG . '/arrow-right.svg' ?>">
					</span>
				</a>
			</div>

			<div class="col-6">
				<img src="<?= rwmb_meta( 'img' )['full_url']; ?>" alt="digital world">
			</div>
		</div>
	</div>
</section>

<section class="about-path">
	<div class="container">
		<div class="row">
			<div class="col-6">
				<h2>
				The things guide our works and <br>
				shape how we serve customers
				</h2>

				<div class="blk d-flex">
					<div>
						<img style="width:44px;height:44px;" src="<?= NOVUS_IMG . '/core.svg' ?>" alt="gem core value">
					</div>
					<div>
						<h3>Our core values</h3>
						<p><?= rwmb_meta( 'core' ) ?></p>
					</div>
				</div>

				<img src="<?= NOVUS_IMG . '/path.svg' ?>" alt="gem path">
			</div>

			<div class="col-6">
				<div class="blk d-flex">
					<div>
						<img style="width:55px;height:36px;" src="<?= NOVUS_IMG . '/vision.svg' ?>" alt="gem vision">
					</div>
					<div>
						<h3>Our vision</h3>
						<p><?= rwmb_meta( 'vision' ) ?></p>
					</div>
				</div>

				<div class="blk d-flex">
					<div>
						<img style="width:48px;height:43px;" src="<?= NOVUS_IMG . '/mission.svg' ?>" alt="gem mission">
					</div>
					<div>
						<h3>Our mission</h3>
						<p><?= rwmb_meta( 'mission' ) ?></p>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</section>