<?php
/**
 * Template name: Career
 */
get_header();
$tempID = get_the_ID();
?>

<section class="career-banner" style="background:url(<?= the_post_thumbnail_url( 'full' ) ?>) center center / cover no-repeat">
	<div class="container">
		<h1 class="clw">Why GEM</h1>
		<p class="clw">
		If you enjoy facing challenges and strive to go over <br>
		your limitations we want to talk to you!
		</p>

		<a class="btn-1 fw-5" href="<?= get_permalink( get_page_by_path( 'about-us' ) ) ?>">
			<span>
				See opportunities
				<img class="arrow-r" src="<?=  NOVUS_IMG . '/arrow-right.svg' ?>">
			</span>
		</a>
	</div>
</section>

<section class="section career-posts">
	<div class="container">
		<h2>Explore Opportunities</h2>
		<?php the_content(); ?>

		<div class="row">
			<?php
			$career = new WP_Query( [
				'post_type'      => 'career',
				'posts_per_page' => -1,
			] );

			while ( $career->have_posts() ) : $career->the_post();
			?>
			<div class="col-3">
				<article>
					<a href="<?= the_permalink() ?>">
						<h3><?= get_the_title() ?></h3>
						<div class="entry-icon">
							<img src="<?= wp_get_attachment_url( rwmb_meta( 'icon' )['ID'] ) ?>">
						</div>
					</a>
				</article>
			</div>
			<?php
			endwhile;
			// wp_reset_postdata();
			?>
		</div>
	</div>
</section>

<section class="career-people">
	<div class="container">
		<?php
		$people = rwmb_meta( 'people', null, $tempID );

		foreach ( $people as $p ) :
		?>
		<div class="row">
			<div class="col-6">
				<img src="<?= wp_get_attachment_url( $p[ 'image' ], 'full' ) ?>">
			</div>
			<div class="col-6 content">
				<h3><?= $p[ 'quote' ] ?></h3>
				<h4><span class="fw-5"><?= $p[ 'name' ] ?></span> - <?= $p[ 'position' ] ?></h4>
				<p><?= $p[ 'description' ] ?></p>
					
				<a class="fw-5 cldark d-flex align-center" href="<?= $p[ 'url_1' ] ?>">
					Meet <?= $p[ 'name' ] ?>
					<img class="arrow-r" src="<?=  NOVUS_IMG . '/arrow-right-blue.svg' ?>">
				</a>
				<a class="fw-5 cldark d-flex align-center" href="<?= $p[ 'url_2' ] ?>">
					Find a job like <?= $p[ 'name' ] ?>'s
					<img class="arrow-r" src="<?=  NOVUS_IMG . '/arrow-right-blue.svg' ?>">
				</a>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</section>

<?php
get_footer();