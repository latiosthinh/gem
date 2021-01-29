<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package novus
 */

?>

<article id="post-<?php the_ID(); ?>" class="masonry--h masonry-brick--h works-item">
	<?php the_post_thumbnail( 'thumb-700' ); ?>

	<div class="works-item__content">
		<h3 class="entry-title">
			<?php the_title(); ?>
		</h3>


		<div class="entry-meta">
			<div class="tags"><?php the_tags( '', ', ', null ) ?></div>

			<p class="explore">Explore Project</p>
		</div>
	</div>

	<a href="<?= rwmb_meta( 'work_url' ); ?>" target="_blank"></a>
</article>
