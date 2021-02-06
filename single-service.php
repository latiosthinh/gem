<?php
get_header();


get_template_part( 'template-parts/service/banner' );
?>

<section class="insights">
	<div class="container">
		<h2>Insights</h2>

		<div class="row">
		<?php
		$blogs = new WP_Query( [
			'post_type'      => 'post',
			'posts_per_page' => 3
		] );

		if ( $blogs->have_posts() ) :
			while( $blogs->have_posts() ) :
				$blogs->the_post();
		?>
			<div class="col-4">
				<article class="news-item news--small">
					<a class="entry-thumbnail" href="<?php the_permalink(); ?>">
						<img src="<?= the_post_thumbnail_url() ?>" alt="<?= get_the_title() ?>">
					</a>

					<div class="entry-content">
						<div class="post-category d-flex">
						<?php
							$tags = get_the_terms( get_the_ID(), 'post_tag' );

							foreach ( $tags as $t ) :
						?>
							<a href="<?= get_term_link( $t->term_id ) ?>"><?= $t->name ?></a>
						<?php endforeach; ?>
						</div>

						<a href="<?php the_permalink(); ?>">
							<h3 class="h4"><?= get_the_title() ?></h3>
						</a>

						<?php the_excerpt() ?>
					</div>
				</article>
			</div>
		<?php
			endwhile;
		endif;
		?>
		</div>

		<div class="col-12">
			<a class="btn-1 fw-5" href="<?= site_url( '/blog' ) ?>">
				<span>
					Explore more
					<img class="arrow-r" src="<?=  NOVUS_IMG . '/arrow-right.svg' ?>">
				</span>
			</a>
		</div>
	</div>
</section>

<section class="service-content">
	<div class="container">

	</div>
</section>

<section class="home-contact about-contact">
	<div class="container">
		<?= do_shortcode( '[contact-form-7 id="166" title="Send us a request"]' ) ?>
	</div>
</section>

<?php
get_footer();


get_footer();