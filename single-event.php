<?php
get_header();

while ( have_posts() ) : the_post();

if ( 'news' === get_the_terms( get_the_ID(), 'event-category' )[0]->slug ) {
	get_template_part( 'template-parts/content', 'news' );
}

endwhile;

get_footer();