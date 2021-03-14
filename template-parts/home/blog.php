<section class="home-blog">
	<?php
	$seminar = new WP_Query( [
		'post_type'      => 'event',
		'posts_per_page' => 1
	] );

	if ( $seminar->have_posts() ) :
		while( $seminar->have_posts() ) :
			$seminar->the_post();
	?>
		<article class="container home-blog__seminar">
			<div class="row">
				<div class="col-6">
					<img class="thumbnail" src="<?= the_post_thumbnail_url( 'full' ) ?>" alt="<?= get_the_title(); ?>">
				</div>

				<div class="col-6 seminar-content">
					<p class="clsecond fw-5">Ongoing Seminar</p>

					<h3><?= get_the_title() ?></h3>
					<p><?= rwmb_meta( 'description' ) ?></p>

					<div class="seminar-info">
						<p class="d-iflex">
							<img style="height:21px" src="<?= NOVUS_IMG . '/clock.svg' ?>" alt="time">
							<?php rwmb_the_value( 'datetime', [ 'format' => 'H:i' ] ); ?>
						</p>
						<p class="d-iflex">
							<img style="height:21px" src="<?= NOVUS_IMG . '/calendar.svg' ?>" alt="date">
							<?php rwmb_the_value( 'datetime', [ 'format' => 'F j, Y' ] ); ?>
						</p>

						<p class="d-flex">
							<img style="width:16px;height:21px" src="<?= NOVUS_IMG . '/pin.svg' ?>" alt="location">
							<?= rwmb_meta( 'location' ) ?>
						</p>
					</div>

					<a class="clw fw-5 d-flex align-center" href="<?php the_permalink(); ?>">
						Sign up your team now
						<img class="arrow-r" src="<?=  NOVUS_IMG . '/arrow-right.svg' ?>" alt="go to">
					</a>
				</div>
			</div>
		</article>
	<?php
		endwhile;
	endif;
	?>
	

	<!-- news -->
	<?php
	$blogs = new WP_Query( [
		'post_type'      => 'post',
		'posts_per_page' => 2
	] );

	if ( $blogs->have_posts() ) :
		while( $blogs->have_posts() ) :
			$blogs->the_post();
	?>
		<article class="container home-blog__post">
			<div class="row">
				<div class="col-6 post-content">
					<span class="txt-12"><?= get_the_date( 'F j, Y' ); ?></span>

					<h3><?= get_the_title() ?></h3>
					<p><?= get_the_excerpt() ?></p>

					<a class="fw-5 cldark d-flex align-center readmore" href="<?php the_permalink(); ?>">
						Learn more detail
						<img class="arrow-r" src="<?=  NOVUS_IMG . '/arrow-right-blue.svg' ?>" alt="read more">
					</a>

					<a class="fw-5 cldark d-flex align-center readmore" href="<?php the_permalink(); ?>">
						Stay current with new tech insights
						<img class="arrow-r" src="<?=  NOVUS_IMG . '/arrow-right-blue.svg' ?>" alt="read more">
					</a>
				</div>

				<div class="col-6 p-0">
					<img class="thumbnail" src="<?= the_post_thumbnail_url( 'full' ) ?>" alt="<?= get_the_title(); ?>">
				</div>
			</div>
		</article>
	<?php
		endwhile;
	endif;
	?>
</section>

<section class="home-experts">
	<div class="container">
		<h3><?= rwmb_meta( 'case_studyies_title', null, get_queried_object_id() ) ?></h3>

		<a class="btn-1 fw-5" href="<?= get_permalink( get_page_by_path( 'about-us' ) ) ?>">
			<span>
				Talk with our Experts
				<img class="arrow-r" src="<?=  NOVUS_IMG . '/arrow-right.svg' ?>" alt="go to">
			</span>
		</a>
	</div>
</section>