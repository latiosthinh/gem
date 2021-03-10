<section class="home-testimonial">
	<div class="container">
		<h2 class="clw">
			What customers <br>
			say about us
		</h2>

		<div class="splide clw">
			<div class="splide__track">
				<div class="splide__list">
			<?php
			$testimonials = new WP_Query( [
				'post_type'      => 'testimonial',
				'posts_per_page' => '3'
			] );

			if ( $testimonials->have_posts() ) :
				while ( $testimonials->have_posts() ) :
					$testimonials->the_post();
			?>

				<article class="gem-item splide__slide">
					<img class="entry-thumbnail" src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title() ?>">

					<div class="entry-content">
						<h3><?php the_title() ?></h3>
						<?php the_content(); ?>

						<a class="btn-1 fw-5" href="">
							<span>
								Be our next proud client
								<img class="arrow-r" src="<?=  NOVUS_IMG . '/arrow-right.svg' ?>" alt="go to">
							</span>
						</a>
					</div>
				</article>

			<?php
				endwhile;
			endif;
			?>
				</div>
			</div>
		</div>
	</div>
</section>