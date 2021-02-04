<section class="home-testimonial">
	<div class="container">
		<h2 class="clw">
			What customers <br>
			say about us
		</h2>

		<div class="gem-slider clw">
			<?php
			$testimonials = new WP_Query( [
				'post_type'      => 'testimonial',
				'posts_per_page' => '3'
			] );

			if ( $testimonials->have_posts() ) :
				while ( $testimonials->have_posts() ) :
					$testimonials->the_post();
			?>

				<article class="gem-item">
					<img class="entry-thumbnail" src="<?php the_post_thumbnail_url() ?>">

					<div class="entry-content">
						<h3><?php the_title() ?></h3>
						<?php the_content(); ?>

						<a class="btn-1 fw-5" href="">
							<span>
								Be our next proud client
								<img class="arrow-r" src="<?=  NOVUS_IMG . '/arrow-right.svg' ?>">
							</span>
						</a>
					</div>
				</article>

			<?php
				endwhile;
			endif;
			?>

			<a class="gem-arrow prev">
				<svg width="20" height="36" viewBox="0 0 20 36" fill="none" xmlns="http://www.w3.org/2000/svg">
				<g clip-path="url(#clip0)">
				<path d="M18.4687 1.90735e-05C18.6648 1.90735e-05 18.8609 0.0750809 19.0102 0.224445C19.3097 0.523933 19.3097 1.00802 19.0102 1.30751L2.70148 17.617L19.0102 33.9266C19.3097 34.2261 19.3097 34.7101 19.0102 35.0096C18.7115 35.3091 18.2267 35.3091 17.9272 35.0096L1.07689 18.1586C0.777395 17.8591 0.777395 17.375 1.07689 17.0755L17.9272 0.224445C18.0773 0.0750809 18.2726 1.90735e-05 18.4687 1.90735e-05Z" fill="white"/>
				</g>
				<defs>
				<clipPath id="clip0">
				<rect width="19.9149" height="36" fill="white" transform="translate(20 36) rotate(-180)"/>
				</clipPath>
				</defs>
				</svg>
			</a>
			<a class="gem-arrow next">
				<svg width="20" height="36" viewBox="0 0 20 36" fill="none" xmlns="http://www.w3.org/2000/svg">
				<g clip-path="url(#clip0)">
				<path d="M1.53104 36C1.33496 36 1.13887 35.9249 0.98951 35.7756C0.69002 35.4761 0.69002 34.992 0.98951 34.6925L17.2983 18.383L0.98951 2.07343C0.69002 1.77394 0.69002 1.28985 0.98951 0.990364C1.28823 0.690875 1.77308 0.690875 2.07257 0.990364L18.9229 17.8414C19.2224 18.1409 19.2224 18.625 18.9229 18.9245L2.07257 35.7756C1.92245 35.9249 1.72713 36 1.53104 36Z" fill="white"/>
				</g>
				<defs>
				<clipPath id="clip0">
				<rect width="19.9149" height="36" fill="white"/>
				</clipPath>
				</defs>
				</svg>
			</a>
		</div>
	</div>

	<div class="gem-dots">
		<a class="dot" data-gem="1"></a>
		<a class="dot" data-gem="2"></a>
		<a class="dot" data-gem="3"></a>
	</div>
</section>