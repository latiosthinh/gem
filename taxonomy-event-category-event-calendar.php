<?php
get_header();
?>

<?php
$event = new WP_Query( [
	'post_type'      => 'event',
	'posts_per_page' => 1,
	'tax_query'     => [
		[
			'taxonomy' => 'event-category',
			'field'    => 'slug',
			'terms'     => ['event-calendar']
		]
	]
] );

while ( $event->have_posts() ) : $event->the_post();
?>
<section class="news-banner" style="background:url(<?= get_the_post_thumbnail_url( 'full_url' ) ?: NOVUS_IMG . '/event-banner.webp' ?>) center center / cover no-repeat">
	<div class="container">
		<h1 class="clw"><?= get_the_title() ?></h1>

		<div class="event-info d-flex clw">
			<p class="d-iflex">
				<img style="height:21px" src="<?= NOVUS_IMG . '/clock-w.svg' ?>">
				<?php rwmb_the_value( 'datetime', [ 'format' => 'H:i' ] ); ?>
			</p>
			<p class="d-iflex">
				<img style="height:21px" src="<?= NOVUS_IMG . '/calendar-w.svg' ?>">
				<?php rwmb_the_value( 'datetime', [ 'format' => 'F j, Y' ] ); ?>
			</p>

			<p class="d-flex">
				<img style="width:17px;height:21px" src="<?= NOVUS_IMG . '/pin-w.svg' ?>">
				<?= rwmb_meta( 'location' ) ?>
			</p>
		</div>

		<a class="btn-1 fw-5" href="<?= the_permalink() ?>">
			<span>
				Sign up now
				<img class="arrow-r" src="<?=  NOVUS_IMG . '/arrow-right.svg' ?>">
			</span>
		</a>
	</div>
</section>
<?php endwhile; ?>

<section class="event-items">
	<div class="container">
		<div class="row">
<?php while ( have_posts() ) : the_post();?>
	<div class="col-4">
		<a class="event-item" href="<?php the_permalink(); ?>">
			<img src="<?= the_post_thumbnail_url() ?>" alt="<?= get_the_title() ?>">

			<div class="entry-content">
				<h3 class="clw"><?= get_the_title() ?></h3>

				<span class="clsecond"><?= get_the_date() ?></span>
			</div>
		</a>
	</div>
<?php endwhile; ?>
		</div>
	</div>

	<div class="col-12 posts-pagination">
	<?php
	the_posts_pagination( [
		'screen_reader_text' => ' ', 
		'mid_size'  => 2,
		'prev_text' => __( '<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M8.12106 1.70703L6.70706 0.293031L6.29425e-05 7.00003L6.70706 13.707L8.12106 12.293L3.82806 8.00003H13.4141V6.00003H3.82806L8.12106 1.70703Z" fill="#181818"/>
							</svg>
							', 'gem' ),
		'next_text' => __( '<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M5.70706 12.293L7.12106 13.707L13.8281 6.99997L7.12106 0.292969L5.70706 1.70697L10.0001 5.99997H0.414062V7.99997H10.0001L5.70706 12.293Z" fill="#181818"/>
							</svg>
							', 'gem' ),
	] );
	?>
	</div>
</section>

<?php
get_footer();