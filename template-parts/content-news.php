<section class="single-content news-content">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<img src="<?= the_post_thumbnail_url( 'full_url' ) ?>" alt="<?= get_the_title() ?>">

				<div class="post-tags d-flex">
				<?php
					$tags = get_the_terms( get_the_ID(), 'tag-news' );

					foreach ( $tags as $t ) :
				?>
					<a href="<?= get_term_link( $t->term_id ) ?>">#<?= $t->name ?></a>
				<?php endforeach; ?>
				</div>
			</div>

			<article class="col-8">
				<h1 class="h2"><?= get_the_title() ?></h1>

				<?php get_template_part( 'template-parts/entry', 'info' ) ?>

				<?php the_content(); ?>
			</article>

			<aside class="col-4">
				<h3>Recent news</h3>

				<?php
				$news = new WP_Query( [
					'post_type' => 'event',
					'posts_per_page' => 5,
					'post__not_in' => [ get_the_ID() ],
					'tax_query' => [
						[
							'taxonomy' => 'event-category',
							'field'    => 'slug',
							'terms'     => ['news']
						]
					]
				] );

				if ( $news->have_posts() ) :
					while ( $news->have_posts() ) : $news->the_post();
				?>

					<a href="<?= the_permalink() ?>">
						<img src="<?= the_post_thumbnail_url( 'full_url' ) ?>" alt="<?= get_the_title() ?>">

						<div class="entry-title">
							<span><?= get_the_date(); ?></span>
							<h4><?= get_the_title(); ?></h4>
						</div>
					</a>

				<?php
					endwhile;
				endif;
				?>
			</aside>
		</div>
	</div>
</section>