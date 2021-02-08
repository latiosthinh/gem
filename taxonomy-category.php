<?php get_header(); ?>

<section class="blog-posts">
	<div class="container">
		<div class="row">
			<?php while ( have_posts() ): the_post() ?>
			<div class="col-3">
				<article>
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