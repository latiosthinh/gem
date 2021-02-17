<?php get_header(); ?>

<section class="blog-posts">
	<div class="container">
		<div class="row">
			<aside class="col-3">
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

			<div class="col-9">
				<div class="row">
					<?php while ( have_posts() ): the_post() ?>
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
									<h2 class="h4 fw-5"><?= get_the_title() ?></h2>
									<?php the_excerpt(); ?>
								</a>
							</div>
						</article>
					</div>
					<?php endwhile; ?>
				</div>

				<?php get_template_part( 'template-parts/pagination' ) ?>
			</div>
			
		</div>
	</div>
</section>

<?php
get_footer();