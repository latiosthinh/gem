<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package novus
 */

get_header();
?>

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<div class="container">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
				</div>
			</header><!-- .page-header -->

			<section class="blog-posts">
				<div class="container">
					<div class="row">
						<?php while ( have_posts() ): the_post() ?>
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
						<?php
							get_template_part( 'template-parts/content', get_post_type() );
						endwhile;
						?>
					</div>
					<?php get_template_part( 'template-parts/pagination' ); ?>
				</div>
			</section>
			<?php
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>

<?php
get_footer();
