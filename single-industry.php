<?php
get_header();
$id = get_the_ID();

global $post;
$post_slug = $post->post_name;
?>

<section class="industry-banner clw" style="background:url(<?= the_post_thumbnail_url( 'full' ) ?>) center center / cover no-repeat">
	<div class="container">
		<h1><?= get_the_title() ?></h1>
		<?php the_content(); ?>

		<a class="btn-1 fw-5" href="<?= get_permalink( get_page_by_path( 'contact-us' ) ) ?>">
			<span>
				Talk to our experts
				<img class="arrow-r" src="<?=  NOVUS_IMG . '/arrow-right.svg' ?>" alt="go to">
			</span>
		</a>
	</div>
</section>

<section class="industry-insight">
	<div class="container">
		<h2>Insights</h2>
		<div class="row">
		<?php
		global $wpdb;

		$rls_table = 'mb_relationships';
		$tables = $wpdb->get_results( "SHOW TABLES" );
		foreach ( $tables as $table ) {
			foreach ( $table as $t ) {
				if ( strpos( $t, 'mb_relationships' ) ) {
					$rls_table = $t;
				}
			}
		}
		$rls        = $wpdb->get_results( "SELECT * FROM $rls_table WHERE `to` = $id" );
		$count = 0;
		foreach ( $rls as $r ) {
			$count += 1;

			$pin = new WP_Query( [
				'post_type'   => 'post',
				'post_status' => 'publish',
				'p'           => intval( $r->from ),
			] );
			while ( $pin->have_posts() ) : $pin->the_post();
				if ( $count < 2 ) {
				?>
					<div class="col-12">
						<article class="style-3" id="<?= get_the_ID() ?>">
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
									<h3 class="h4 fw-5"><?= get_the_title() ?></h3>
								</a>
								<?php the_excerpt(); ?>
							</div>
						</article>
					</div>
				<?php
				} // endif
				else {
				?>
					<div class="col-4">
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
									<h3 class="h4 fw-5"><?= get_the_title() ?></h3>
									<?php the_excerpt(); ?>
								</a>
							</div>
						</article>
					</div>
				<?php
				}
			endwhile;
			wp_reset_postdata();
		}
		?>
		</div>
	</div>
</section>

<section class="industry-case-study">
	<div class="container">
		<h2>Case studies</h2>
		<div class="row">
		<?php
		$pin2 = new WP_Query( [
			'post_type'      => 'case-study',
			'posts_per_page' => 3,
			// 'tax_query'      => [
			// 	[
			// 		'taxonomy' => 'case-study-category',
			// 		'field'    => 'slug',
			// 		'term'     => [ $post_slug ]
			// 	]
			// ]
		] );

		while ( $pin2->have_posts() ) : $pin2->the_post();
		?>
			<div class="col-4">
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
							<h3 class="h4 fw-5"><?= get_the_title() ?></h3>
							<?php the_excerpt(); ?>
						</a>
					</div>
				</article>
			</div>
		<?php
		endwhile;
		wp_reset_postdata();
		?>
		</div>
		
		<div class="col-12">
			<a class="btn-1 fw-5" href="<?= get_post_type_archive_link( 'case-study' ); ?>">
				<span>
					Explore more
					<img class="arrow-r" src="<?=  NOVUS_IMG . '/arrow-right.svg' ?>" alt="go to">
				</span>
			</a>
		</div>
	</div>
</section>

<section class="industry-offer">
	<div class="container">
		<div class="row">
			<div class="col-3">
				<h2>What we offer</h2>
				<p><?= rwmb_meta( 'offer_content', null, $id ) ?></p>

				<a class="btn-1 fw-5" href="<?= rwmb_meta( 'url', null, $id ) ?>">
					<span>
						Download Services Offering
						<img class="arrow-r" src="<?=  NOVUS_IMG . '/arrow-right.svg' ?>" alt="go to">
					</span>
				</a>
			</div>

			<div class="col-9">
				<div class="splide">
					<div class="splide__track">
						<div class="splide__list">
							<?php
							$offer_items = rwmb_meta( 'offer_item', null, $id );

							foreach ( $offer_items as $item ) :
							?>
							<div class="splide__slide offer-content">
								<h3><?= $item[ 'title' ]; ?></h3>
								<p><?= $item[ 'content' ] ?></p>

								<img src="<?= wp_get_attachment_url( $item[ 'image' ] ); ?>" alt="<?= $item[ 'title' ]; ?>">
							</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="industry-why-us">
	<div class="container">
		<h2>Why us</h2>

		<div class="row">
			<div class="col-4">
				<div class="why-content">
					<img src="<?= rwmb_meta( 'why_us_1_image', null, $id )[ 'full_url' ]; ?>" alt="why us">

					<h4><?= rwmb_meta( 'why_us_1_title', null, $id ) ?></h4>
					<p><?= rwmb_meta( 'why_us_1_content', null, $id ) ?></p>
				</div>
			</div>

			<div class="col-4">
				<div class="why-content">
					<img src="<?= rwmb_meta( 'why_us_2_image', null, $id )[ 'full_url' ]; ?>" alt="why us">

					<h4><?= rwmb_meta( 'why_us_2_title', null, $id ) ?></h4>
					<p><?= rwmb_meta( 'why_us_2_content', null, $id ) ?></p>
				</div>
			</div>

			<div class="col-4">
				<div class="why-content">
					<img src="<?= rwmb_meta( 'why_us_3_image', null, $id )[ 'full_url' ]; ?>" alt="why us">

					<h4><?= rwmb_meta( 'why_us_3_title', null, $id ) ?></h4>
					<p><?= rwmb_meta( 'why_us_3_content', null, $id ) ?></p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="home-contact about-contact industry-contact">
	<div class="container">
		<?= do_shortcode( '[contact-form-7 id="166" title="Send us a request"]' ) ?>
	</div>
</section>

<?php
get_footer();