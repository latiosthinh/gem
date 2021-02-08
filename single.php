<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package novus
 */

get_header();

while ( have_posts() ) : the_post();
?>

<section class="single-content single-blog-content">
	<div class="container">
		<div class="row">
			<article class="col-8">
				<div class="post-tags">
				<?php
				$tags = get_the_terms( get_the_ID(), 'post_tag' );

				foreach ( $tags as $t ) :
				?>
					<a href="<?= get_term_link( $t->term_id ) ?>">#<?= $t->name ?></a>
				<?php endforeach; ?>
				</div>

				<h1><?= get_the_title() ?></h1>

				<?php get_template_part( 'template-parts/entry', 'info' ) ?>

				<?php the_content(); ?>
			</article>

			<aside class="col-4">
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

				<h3>Recent news</h3>
				<?php
				$news = new WP_Query( [
					'post_type'      => 'post',
					'posts_per_page' => 5,
					'post__not_in'   => [ get_the_ID() ],
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

<?php endwhile; ?>

<section class="case-study-related case-studies">
	<div class="container">
		<h4>Related Posts</h4>
		<div class="row">
			<?php
			$related = new WP_Query( [
				'post_type'      => 'post',
				'posts_per_page' => 4,
				'tax_query'      => [
					[
						'taxonomy' => 'category',
						'field'    => 'slug',
						'term'     => [ get_the_terms( get_the_ID(), 'category' ) ]
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
