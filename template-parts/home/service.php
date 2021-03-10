<section class="home-service-header">
	<div class="container">
		<h2>
		We are committed to take your business <br>
		in leaps and bounds
		</h2>

		<p>
		Magna diam facilisis scelerisque et aliquam orci condimentum. Ultricies at pellentesque <br>
		risus risus, lorem sed. Arcu, malesuada laoreet urna id turpis consequat.
		</p>
	</div>
</section>

<section class="home-service-content">
	<?php
	$services = new WP_Query( [
		'post_type'      => 'service',
		'posts_per_page' => 3,
		'tax_query'      => [
			[
				'taxonomy' => 'services-category',
				'field'    => 'slug',
				'terms'    => [ 'special' ],
				'operator' => 'IN'
			]
		]
	] );

	if ( $services->have_posts() ) :
		while( $services->have_posts() ) :
			$services->the_post();
	?>

		<article>
			<img src="<?php the_post_thumbnail_url( 'full' ) ?>" alt="<?= get_the_title() ?>">

			<div class="entry-content">
				<h3><?= wordwrap( get_the_title(), 25, "<br>\n" ) ?></h3>
				<p><?= get_the_excerpt() ?></p>

				<a class="fw-5 cldark d-flex align-center" href="#">
					Request a demo
					<img class="arrow-r" src="<?=  NOVUS_IMG . '/arrow-right-blue.svg' ?>" alt="request">
				</a>
			</div>
		</article>

	<?php
		endwhile;
	endif;
	?>
</section>