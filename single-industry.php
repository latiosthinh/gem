<?php
get_header();
$id = get_the_ID();

global $post;
$post_slug = $post->post_name;
?>

<section class="industry-banner clw" style="background:url(<?= the_post_thumbnail_url( 'full' ) ?>) center center / cover no-repeat">
	<div class="container">
		<h1><?= get_the_title() ?></h1>
		<?php the_content(); ?>

		<a class="btn-1 fw-5" href="<?= get_permalink( get_page_by_path( 'contact-us' ) ) ?>">
			<span>
				Talk to our experts
				<img class="arrow-r" src="<?=  NOVUS_IMG . '/arrow-right.svg' ?>">
			</span>
		</a>
	</div>
</section>

<section class="industry-insight">
	<div class="container">
		<h2>Insights</h2>
		<div class="row">
		<?php
		$pin = new WP_Query( [
			'post_type'      => 'post',
			'posts_per_page' => 1,
		] );

		while ( $pin->have_posts() ) : $pin->the_post();
		?>
			<div class="col-12">
				<article class="style-3">
					<a class="entry-thumbnail" href="<?php the_permalink(); ?>">
						<?= the_post_thumbnail( 'full' ) ?>
					</a>

					<div class="entry-title">
						<div class="post-tags">
						<?php
						$tags = get_the_terms( get_the_ID(), 'post_tag' );

						foreach ( $tags as $t ) :
						?>
							<a href="<?= get_term_link( $t->term_id ) ?>"><?= $t->name ?></a>
						<?php endforeach; ?>
						</div>

						<a href="<?php the_permalink(); ?>">
							<h3 class="h4 fw-5"><?= get_the_title() ?></h3>
						</a>
						<?php the_excerpt(); ?>
					</div>
				</article>
			</div>
		<?php endwhile; ?>

		<?php
		$pin = new WP_Query( [
			'post_type'      => 'post',
			'posts_per_page' => 3,
			'offset'         => 1
		] );

		while ( $pin->have_posts() ) : $pin->the_post();
		?>
			<div class="col-4">
				<article class="style-1">
					<a class="entry-thumbnail" href="<?php the_permalink(); ?>">
						<?= the_post_thumbnail( 'full' ) ?>
					</a>

					<div class="entry-title">
						<div class="post-tags">
						<?php
						$tags = get_the_terms( get_the_ID(), 'post_tag' );

						foreach ( $tags as $t ) :
						?>
							<a href="<?= get_term_link( $t->term_id ) ?>"><?= $t->name ?></a>
						<?php endforeach; ?>
						</div>

						<a href="<?php the_permalink(); ?>">
							<h3 class="h4 fw-5"><?= get_the_title() ?></h3>
							<?php the_excerpt(); ?>
						</a>
					</div>
				</article>
			</div>
		<?php
		endwhile;
		wp_reset_postdata();
		?>
		</div>
	</div>
</section>

<section class="industry-case-study">
	<div class="container">
		<h2>Case studies</h2>
		<div class="row">
		<?php
		$pin2 = new WP_Query( [
			'post_type'      => 'case-study',
			'posts_per_page' => 3,
			// 'tax_query'      => [
			// 	[
			// 		'taxonomy' => 'case-study-category',
			// 		'field'    => 'slug',
			// 		'term'     => [ $post_slug ]
			// 	]
			// ]
		] );

		while ( $pin2->have_posts() ) : $pin2->the_post();
		?>
			<div class="col-4">
				<article class="style-1">
					<a class="entry-thumbnail" href="<?php the_permalink(); ?>">
						<?= the_post_thumbnail( 'full' ) ?>
					</a>

					<div class="entry-title">
						<div class="post-tags">
						<?php
						$tags = get_the_terms( get_the_ID(), 'post_tag' );

						foreach ( $tags as $t ) :
						?>
							<a href="<?= get_term_link( $t->term_id ) ?>"><?= $t->name ?></a>
						<?php endforeach; ?>
						</div>

						<a href="<?php the_permalink(); ?>">
							<h3 class="h4 fw-5"><?= get_the_title() ?></h3>
							<?php the_excerpt(); ?>
						</a>
					</div>
				</article>
			</div>
		<?php endwhile; ?>
		</div>
		
		<div class="col-12">
			<a class="btn-1 fw-5" href="<?= get_post_type_archive_link( 'case-study' ); ?>">
				<span>
					Explore more
					<img class="arrow-r" src="<?=  NOVUS_IMG . '/arrow-right.svg' ?>">
				</span>
			</a>
		</div>
	</div>
</section>

<?php
get_footer();