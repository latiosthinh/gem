<?php get_header(); ?>

<section class="case-study-banner" style="background:url(<?= NOVUS_IMG . '/banner-1.webp' ?>) center center / cover no-repeat">
	<div class="container">
		<h1 class="h2 clw">
		See how our customers enhance <br> their business faster
		</h1>
		<p class="clw">Egestas ipsum id arcu gravida consequat etiam. Et enim vel vitae turpis quis nec at odio.</p>
	</div>
</section>

<section class="case-study-description">
	<div class="container">
		<p class="txt-center">Our customers span every sector, from small application vendors to large enterprises in the financial services and automotive industries to federal government agencies. But all have one thing in common—they want to build secure, high-quality software faster. In development and through deployment, our customers use smart, comprehensive solutions to build application security testing into their environments.</p>
	</div>
</section>

<section class="case-study-posts">
	<div class="container">
		<div class="row">
			<?php get_template_part( 'template-parts/sidebar-case-study' ) ?>

			<div class="col-9 case-studies">
				<div class="row">
					<?php while ( have_posts() ) : the_post(); ?>
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

					<?php get_template_part( 'template-parts/pagination' ); ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();