<?php
get_header();
?>

<section class="news-banner" style="background:url(<?= NOVUS_IMG . '/news-banner.webp' ?>) center center / cover no-repeat">
	<div class="container">
		<h1 class="clw">What’s new with GEM</h1>
		<p class="clw">Keep up with GEM’s latest news</p>
	</div>
</section>

<section class="news-items">
	<div class="container">
		<div class="row">
<?php
$count = 1;

while ( have_posts() ) : the_post();
	if ( $count === 1 ) :
?>
	<div class="col-12">
		<article class="news-item news--big">
			<a class="entry-thumbnail" href="<?php the_permalink(); ?>">
				<img src="<?= the_post_thumbnail_url() ?>" alt="<?= get_the_title() ?>">
			</a>

			<div class="entry-content">
				<a href="<?php the_permalink(); ?>">
					<h3><?= get_the_title() ?></h3>
				</a>

				<span><?php the_date() ?></span>
				
				<?php the_excerpt() ?>

				<a class="fw-5 cldark d-flex align-center readmore" href="<?php the_permalink(); ?>">
					Read more
					<img class="arrow-r" src="<?=  NOVUS_IMG . '/arrow-right-blue.svg' ?>">
				</a>
			</div>
		</article>
	</div>
<?php else : ?>
	<div class="col-4">
		<article class="news-item news--small">
			<a class="entry-thumbnail" href="<?php the_permalink(); ?>">
				<img src="<?= the_post_thumbnail_url() ?>" alt="<?= get_the_title() ?>">
			</a>

			<div class="entry-content">
				<span><?php the_date() ?></span>

				<a href="<?php the_permalink(); ?>">
					<h3 class="h4"><?= get_the_title() ?></h3>
				</a>

				<?php the_excerpt() ?>
			</div>
		</article>
	</div>
<?php
	endif;
	$count += 1;
endwhile;
?>
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