<div class="col-12 posts-pagination">
<?php
the_posts_pagination( [
	'screen_reader_text' => ' ', 
	'mid_size'  => 2,
	'prev_text' => __( '<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M8.12106 1.70703L6.70706 0.293031L6.29425e-05 7.00003L6.70706 13.707L8.12106 12.293L3.82806 8.00003H13.4141V6.00003H3.82806L8.12106 1.70703Z" fill="#181818"/>
						</svg>
						', 'gem' ),
	'next_text' => __( '<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M5.70706 12.293L7.12106 13.707L13.8281 6.99997L7.12106 0.292969L5.70706 1.70697L10.0001 5.99997H0.414062V7.99997H10.0001L5.70706 12.293Z" fill="#181818"/>
						</svg>
						', 'gem' ),
] );
?>
</div>