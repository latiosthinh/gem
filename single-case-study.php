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

<?php
endwhile;

get_footer();