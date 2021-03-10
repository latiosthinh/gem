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
<section class="news-banner" style="background:url(<?= get_the_post_thumbnail_url( 'full_url' ) ?>) center center / cover no-repeat">
	<div class="container">
		<h1 class="clw"><?= get_the_title() ?></h1>

		<div class="event-info d-flex clw">
			<p class="d-iflex">
				<img style="height:21px" src="<?= NOVUS_IMG . '/clock-w.svg' ?>" alt="time">
				<?php rwmb_the_value( 'datetime', [ 'format' => 'H:i' ] ); ?>
			</p>
			<p class="d-iflex">
				<img style="height:21px" src="<?= NOVUS_IMG . '/calendar-w.svg' ?>" alt="date">
				<?php rwmb_the_value( 'datetime', [ 'format' => 'F j, Y' ] ); ?>
			</p>

			<p class="d-flex">
				<img style="width:19px;height:23px" src="<?= NOVUS_IMG . '/pin-w.svg' ?>" alt="location">
				<?= rwmb_meta( 'location' ) ?>
			</p>
		</div>

		<a class="btn-1 fw-5" href="<?= the_permalink() ?>">
			<span>
				Sign up now
				<img class="arrow-r" src="<?=  NOVUS_IMG . '/arrow-right.svg' ?>" alt="go to">
			</span>
		</a>
	</div>
</section>
<?php endwhile; ?>

<section class="event-items">
	<div class="container">
		<form class="gem-select" method="GET">
			<span>Filter by</span>

			<div class="custom-select">
				<select name="orderby" id="orderby">
					<option value="0">Select</option>
					<option value="date">Date</option>
					<option value="title">Name</option>
				</select>
			</div>
		</form>

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

	<?php get_template_part( 'template-parts/pagination' ); ?>
</section>

<?php
get_footer();