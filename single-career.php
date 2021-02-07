<?php
get_header();
?>

<section class="single-career-banner" style="background:url(<?= the_post_thumbnail_url( 'full' ) ?>) center center / cover no-repeat">
	<div class="container">
		<h1 class="clw"><?= get_the_title() ?></h1>
		<p class="clw fw-5">
			Updated: <span><?= get_the_date() ?></span>
			Deadline to apply: <span><?= rwmb_meta( 'deadline' ) ?></span>
		</p>
	</div>
</section>

<section class="single-career-content">
	<div class="container">
		<div class="row">
			<div class="col-4">
				<h4>Description:</h4>
			</div>
			<div class="col-8">
				<?= rwmb_meta( 'description' ) ?>
			</div>

			<div class="col-4">
				<h4>Requirements:</h4>
			</div>
			<div class="col-8">
				<?= rwmb_meta( 'requirements' ) ?>
			</div>

			<div class="col-4">
				<h4>Salary:</h4>
			</div>
			<div class="col-8">
				<?= rwmb_meta( 'salary' ) ?>
			</div>
		</div>

		<div class="col-12">
			<a class="btn-1 fw-5" href="<?= get_permalink( get_page_by_path( 'contact-us' ) ) ?>">
				<span>
					Apply now
					<img class="arrow-r" src="<?=  NOVUS_IMG . '/arrow-right.svg' ?>">
				</span>
			</a>
		</div>
	</div>
</section>

<?php
get_footer();