<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package novus
 */

get_header();
?>

<section class="blog-banner" style="background:url(<?= get_the_post_thumbnail_url( get_queried_object_id(), 'full' ) ?>) center center / cover no-repeat">
	<div class="container">
		<h2 class="clw">Explore our <br> trending insights</h2>
		<p class="clw">Bring deeper understanding of business and technology trends</p>
	</div>
</section>

<section class="blog-posts">
	<div class="container"></div>
</section>

<?php
get_footer();
