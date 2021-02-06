<?php
get_header();

get_template_part( 'template-parts/service/banner' );
?>

<section class="insights">
	<div class="container">
		<h2>Insights</h2>

		<div class="row">
		<?php
		$blogs = new WP_Query( [
			'post_type'      => 'post',
			'posts_per_page' => 3,
			'category_name'  => 'featured-insights'
		] );

		if ( $blogs->have_posts() ) :
			while( $blogs->have_posts() ) :
				$blogs->the_post();
		?>
			<div class="col-4">
				<article class="news-item news--small">
					<a class="entry-thumbnail" href="<?php the_permalink(); ?>">
						<img src="<?= the_post_thumbnail_url() ?>" alt="<?= get_the_title() ?>">
					</a>

					<div class="entry-content">
						<div class="post-category d-flex">
						<?php
							$tags = get_the_terms( get_the_ID(), 'post_tag' );

							foreach ( $tags as $t ) :
						?>
							<a href="<?= get_term_link( $t->term_id ) ?>"><?= $t->name ?></a>
						<?php endforeach; ?>
						</div>

						<a href="<?php the_permalink(); ?>">
							<h3 class="h4"><?= get_the_title() ?></h3>
						</a>

						<?php the_excerpt() ?>
					</div>
				</article>
			</div>
		<?php
			endwhile;
		endif;
		?>
		</div>

		<div class="col-12">
			<a class="btn-1 fw-5" href="<?= site_url( '/blog' ) ?>">
				<span>
					Explore more
					<img class="arrow-r" src="<?=  NOVUS_IMG . '/arrow-right.svg' ?>">
				</span>
			</a>
		</div>
	</div>
</section>

<section class="service-content">
	<div class="container">
		<h2 class="txt-center">See how we help clients</h2>
		<p class="txt-center">
		We work shoulder-to-shoulder with our clients—remotely as needed in this time <br>
		of crisis—to achieve and sustain transformational impact over time
		</p>

		<div class="row tab-navs">
			<div class="col-3">
				<a class="tab-link h4 active" class="tab-link" data-href="mobile">
					<img src="<?= NOVUS_IMG . '/mobile.svg' ?>">
					Mobile Application <br>
					Development
				</a>
			</div>
			<div class="col-3">
				<a class="tab-link h4" data-href="enterprise">
					<img src="<?= NOVUS_IMG . '/enterprise.svg' ?>">
					Enterprise Application <br>
					Development
				</a>
			</div>
			<div class="col-3">
				<a class="tab-link h4" data-href="maintain">
					<img src="<?= NOVUS_IMG . '/maintain.svg' ?>">
					Maintenance and <br>
					Support
				</a>
			</div>
			<div class="col-3">
				<a class="tab-link h4" data-href="maintain-2">
					<img src="<?= NOVUS_IMG . '/maintain-2.svg' ?>">
					Maintenance and <br>
					Support
				</a>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<div id="mobile" class="tab-content active">
					<div class="row">
						<div class="col-6">
							<h4>UI/UX enhancement</h4>
							<ul>
								<li>
								User-centered designs and effective graphical interfaces for engaging visuals with excellent user experience
								</li>
								<li>Lean and effective framework to meet your unique demand</li>
								<li>Quickly-delivered project thanks to GEM’s rich knowledge and ready libraries</li>
							</ul>
						</div>

						<div class="col-6">
							<h4>Widely-covered Mobile <br>Tech stack</h4>
							<p>GEM helps you choose the right framework based on your own needs</p>
							<ul>
								<li>iOS app native</li>
								<li>Android app native</li>
								<li>Windows app native</li>
								<li>Hybrid framework (Ionic)</li>
								<li>Cross-platform React Native app</li>
							</ul>
						</div>

						<div class="col-6">
							<h4>Software Development Life Cycle <br> best practices</h4>
							<ul>
								<li>Eliminate unnecessary costs</li>
								<li>Avoid redundant work</li>
								<li>Reduce later fixes to a minimum</li>
							</ul>

							<p>Get your mobile application developed in the shortest possible time, with the highest possible quality, and at reasonable costs.</p>
						</div>

						<div class="col-6 img">
							<img src="<?= NOVUS_IMG . '/map.png' ?>">
							<img src="<?= NOVUS_IMG . '/map-2.png' ?>">
						</div>
					</div>
				</div>
				<div id="enterprise" class="tab-content">
					<div class="row">
						<div class="col-6">
							<h4>Multiple-platform solutions development</h4>
							<ul>
								<li>
								User-centered designs and effective graphical interfaces for engaging visuals with excellent user experience
								</li>
								<li>Lean and effective framework to meet your unique demand</li>
								<li>Quickly-delivered project thanks to GEM’s rich knowledge and ready libraries</li>
							</ul>
						</div>

						<div class="col-6">
							<h4>Use of Software Development Life Cycle best practices</h4>
							<p>Get your mobile application developed in the shortest possible time, with the highest possible quality, and at reasonable costs</p>
							<ul>
								<li>Windows app native</li>
								<li>Hybrid framework (Ionic)</li>
								<li>Cross-platform React Native app</li>
							</ul>
						</div>

						<div class="col-6">
							<h4>Design for scalability and performance</h4>
							<p>GEM helps you choose the right framework based on your own needs</p>
							<ul>
								<li>iOS app native</li>
								<li>Android app native</li>
								<li>Windows app native</li>
								<li>Hybrid framework (Ionic)</li>
								<li>Cross-platform React Native app</li>
							</ul>
						</div>

						<div class="col-6">
							<h4>Experience in various industries</h4>
							<div class="img">
								<img src="<?= NOVUS_IMG . '/map.png' ?>">
								<img src="<?= NOVUS_IMG . '/map-2.png' ?>">
							</div>
						</div>
					</div>
				</div>
				<div id="maintain" class="tab-content">
					<div class="row">
						<div class="col-6">
							<ul>
								<li>Fix inefficiencies in your business processes</li>
								<li>Increase transparency over your operations</li>
								<li>Better manage your company resources</li>
								<li>Better motivate and engage with your employees</li>
								<li>Increase your business revenue</li>
							</ul>
						</div>

						<div class="col-6">
							<ul>
								<li>A well-developed website aligns with your brand language and engages your audience. Our approach is to learn about your brand and listen to your ideas first. Based on this received information, we will create a compelling website that will follow your specific requirements. Whether you are a small business that wants a simple but professional looking website, or an enterprise in need of a complex website, we can help.</li>
							</ul>
						</div>
					</div>
				</div>
				<div id="maintain-2" class="tab-content">
					<div class="row">
						<div class="col-12">
							<ul>
								<li>Enterprise applications provide your business with end-to-end mobility and high-level accessibility. We will help you create the perfect mix of people, processes, and technology to enhance your business development.</li>
								<li>By applying the best practices of the custom software development, we produce an enterprise application that is specifically tailored to maximize your customer reach and enable the effortless flow of your business operations.</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container gem-path">
		<h2 class="txt-center">GEM’s Project Management Framework</h2>
		<p class="txt-center">
		Feugiat volutpat sagittis donec quis dui egestas id in. <br>
		Amet sagittis a, orci ridiculus arcu habitant nulla eu.
		</p>

		<div class="row">
			<div class="col-3 txt-center">
				<img src="<?= NOVUS_IMG . '/settings.svg' ?>">
				<h4>PMI-based <br> PROCESSES & TOOLS</h4>
			</div>

			<div class="col-3 txt-center">
				<img src="<?= NOVUS_IMG . '/human.svg' ?>">
				<h4>WELL-TRAINED <br> TEAM</h4>
			</div>

			<div class="col-3 txt-center">
				<img src="<?= NOVUS_IMG . '/checklist.svg' ?>">
				<h4>REGULAR AUDIT & <br> FEEDBACK</h4>
			</div>

			<div class="col-3 txt-center">
				<img src="<?= NOVUS_IMG . '/cloud.svg' ?>">
				<h4>PMI-based <br> PROCESSES & TOOLS</h4>
			</div>
		</div>
	</div>
</section>

<section class="home-contact about-contact">
	<div class="container">
		<?= do_shortcode( '[contact-form-7 id="166" title="Send us a request"]' ) ?>
	</div>
</section>

<?php
get_footer();


get_footer();