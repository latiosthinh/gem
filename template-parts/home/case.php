<section class="home-case-study">
	<?php
	$cases_1 = new WP_Query( [
		'post_type'      => 'case-study',
		'posts_per_page' => 1
	] );

	if ( $cases_1->have_posts() ) :
		while( $cases_1->have_posts() ) :
			$cases_1->the_post();
	?>

		<article>
			<img class="thumbnail-big" src="<?php the_post_thumbnail_url( 'full' ) ?>" alt="<?= get_the_title() ?>">

			<div class="entry-content">
				<h2 class="clw"><?= get_the_title() ?></h2>
				<p class="clw"><?= get_the_excerpt() ?></p>

				<a class="btn-1 fw-5" href="">
					<span>
						Explore our case studies
						<img class="arrow-r" src="<?=  NOVUS_IMG . '/arrow-right.svg' ?>" alt="go to">
					</span>
				</a>
			</div>
		</article>

	<?php
		endwhile;
	endif;
	?>

	<?php
	$cases_2 = new WP_Query( [
		'post_type'      => 'case-study',
		'posts_per_page' => 4,
		'offset'         => 1,
	] );

	if ( $cases_2->have_posts() ) :
		while( $cases_2->have_posts() ) :
			$cases_2->the_post();
	?>

		<article>
			<a href="<?php the_permalink() ?>">
				<div class="thumbnail">
					<img src="<?php the_post_thumbnail_url( 'full' ) ?>" alt="<?= get_the_title() ?>">
				</div>
				
				<div class="entry-content">
					<h2><?= get_the_title() ?></h2>
					<p><?= get_the_excerpt() ?></p>
				</div>
			</a>
		</article>

	<?php
		endwhile;
	endif;
	?>
</section>