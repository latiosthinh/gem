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
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

while ( have_posts() ) : the_post();
	if ( $paged === 1 ) :
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

						<span><?= get_the_date() ?></span>
						
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
						<span><?= get_the_date() ?></span>

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
	else :
	?>
			<div class="col-4">
				<article class="news-item news--small">
					<a class="entry-thumbnail" href="<?php the_permalink(); ?>">
						<img src="<?= the_post_thumbnail_url() ?>" alt="<?= get_the_title() ?>">
					</a>

					<div class="entry-content">
						<span><?= get_the_date() ?></span>

						<a href="<?php the_permalink(); ?>">
							<h3 class="h4"><?= get_the_title() ?></h3>
						</a>

						<?php the_excerpt() ?>
					</div>
				</article>
			</div>
	<?php
	endif;
endwhile;
?>
		</div>
	</div>

	<?php get_template_part( 'template-parts/pagination' ); ?>
</section>

<?php
get_footer();