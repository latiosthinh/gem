<?php
get_header();

while ( have_posts() ) :
	the_post();
?>

<section class="case-study-banner" style="background:url(<?php the_post_thumbnail_url( 'full' ) ?>) center center / cover no-repeat">
	<div class="container">
		<h1 class="clw"><?= get_the_title() ?></h1>
		<div class="d-flex clw">
			<span><?= get_the_date() ?></span>
			
			<p class="post-tags">
			<?php
			$tags = get_the_terms( get_the_ID(), 'post_tag' );

			foreach ( $tags as $t ) :
			?>
				<a href="<?= get_term_link( $t->term_id ) ?>"><?= $t->name ?></a>
			<?php endforeach; ?>
			</p>
		</div>
	</div>
</section>

<section class="single-content case-study-content">
	<div class="container">
		<div class="row">
			<article class="col-8">
				<?php get_template_part( 'template-parts/entry', 'social' ) ?>

				<?php the_content(); ?>

				<div class="row">
					<h4 class="col-3">Background</h4>

					<div class="col-9">
						<p><?= rwmb_meta( 'background' ); ?></p>
					</div>
				</div>
				<div class="row">
					<h4 class="col-3">Challenge</h4>

					<div class="col-9">
						<p><?= rwmb_meta( 'challenge' ); ?></p>
					</div>
				</div>
				<div class="row">
					<h4 class="col-3">Solution</h4>

					<div class="col-9">
						<p><?= rwmb_meta( 'solution' ); ?></p>
					</div>
				</div>
			</article>

			<?php get_template_part( 'template-parts/sidebar', 'case-study' ) ?>
		</div>
	</div>
</section>

<?php endwhile; ?>

<section class="case-study-related case-studies">
	<div class="container">
		<h4>More case studies</h4>
		<div class="row">
			<?php
			$related = new WP_Query( [
				'post_type'      => 'case-study',
				'posts_per_page' => 4,
				'tax_query'      => [
					[
						'taxonomy' => 'case-study-category',
						'field'    => 'slug',
						'term'     => [ get_the_terms( get_the_ID(), 'case-study-category' ) ]
					]
				]
			] );

			while ( have_posts() ) : the_post();
			?>

			<div class="col-3">
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
							<h2 class="h4 fw-5"><?= get_the_title() ?></h2>
							<?php the_excerpt(); ?>
						</a>
					</div>
				</article>
			</div>

			<?php endwhile; ?>
		</div>
	</div>
</section>

<?php
get_footer();