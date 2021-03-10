<?php
/**
 * Template name: Blog
 */
get_header();
?>

<section class="blog-banner" style="background:url(<?= get_the_post_thumbnail_url( get_queried_object_id(), 'full' ) ?>) center center / cover no-repeat">
	<div class="container">
		<h1 class="clw h2">Explore our <br> trending insights</h1>
		<p class="clw">Bring deeper understanding of business and technology trends</p>
	</div>
</section>

<section class="blog-posts">
	<div class="container">
		<?php
		$pin = new WP_Query( [
			'post_type'      => 'post',
			'posts_per_page' => 1,
		] );

		while ( $pin->have_posts() ) : $pin->the_post();
		?>

		<article class="style-3">
			<a class="entry-thumbnail" href="<?= the_permalink() ?>">
				<?php the_post_thumbnail( 'full' ) ?>
			</a>

			<div class="entry-title">
				<a href="<?= the_permalink() ?>">
					<h2 class="h3"><?= get_the_title() ?></h2>
				</a>

				<span><?= get_the_date(); ?></span>

				<?php the_excerpt() ?>

				<a class="fw-5 cldark d-flex align-center" href="<?= the_permalink() ?>">
					Readmore
					<img class="arrow-r" src="<?=  NOVUS_IMG . '/arrow-right-blue.svg' ?>" alt="read more">
				</a>
			</div>
		</article>

		<?php endwhile; ?>
	</div>

	<div class="container feature">
		<h2 class="txt-center">Featured Insights</h2>
		<p class="txt-center">Our latest thinking on the issues that matter most in business and management.</p>

		<div class="row">
		<?php
		$pin = new WP_Query( [
			'post_type'      => 'post',
			'posts_per_page' => 4,
			'offset'         => 1,
		] );

		while ( $pin->have_posts() ) : $pin->the_post();
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

		<a class="fw-5 txt-center blog-url" href="<?= get_permalink( get_option( 'page_for_posts' ) ) ?>">See all articles</a>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-6">
				<?php
				$pin = new WP_Query( [
					'post_type'      => 'post',
					'posts_per_page' => 4,
					'offset'         => 5,
				] );

				while ( $pin->have_posts() ) : $pin->the_post();
				?>
					<article class="style-1 style-2">
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
				<?php endwhile; ?>
			</div>

			<aside class="col-6">
				<form role="search" method="get" class="search-form" action="<?php echo site_url('/'); ?>">
					<label>
						<input class="h4" type="search" class="search__input" placeholder="Type here to search this site..." value="" name="s">
						<input type="hidden" name="post_type" value="post" />
					</label>
				</form>

				<h4>CATEGORIES</h4>
				<ul>
					<?php
					$cats = get_terms( [
						'taxonomy'   => 'category',
						'hide_empty' => false,
					] );

					foreach ( $cats as $c ) :
					?>
					<li><a class="fw-5" href="<?= get_term_link( $c->slug, 'category' ) ?>"><?= $c->name ?> (<?= $c->count ?>)</a></li>
					<?php endforeach; ?>
				</ul>
			</aside>
		</div>
	</div>
</section>

<?php
get_footer();
