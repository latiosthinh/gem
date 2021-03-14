<?php
get_header();

while ( have_posts() ) : the_post();

get_template_part( 'template-parts/service/banner' );
?>

<section class="insights">
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
		$rls   = $wpdb->get_results( "SELECT * FROM $rls_table WHERE `to` = $id" );
		$count = 0;
		foreach ( $rls as $r ) {
			$count += 1;

			$pin = new WP_Query( [
				'post_type'   => 'post',
				'post_status' => 'publish',
				'p'           => intval( $r->from ),
			] );
			while ( $pin->have_posts() ) : $pin->the_post();
			?>
			<div class="col-4">
				<article class="news-item news--small">
					<a class="entry-thumbnail" href="<?php the_permalink(); ?>">
						<img src="<?= the_post_thumbnail_url() ?>" alt="<?= get_the_title() ?>">
					</a>

					<div class="entry-content">
						<div class="post-tags d-flex">
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
		<?php endwhile; ?>
		</div>

		<div class="col-12">
			<a class="btn-1 fw-5" href="<?= site_url( '/blog' ) ?>">
				<span>
					Explore more
					<img class="arrow-r" src="<?=  NOVUS_IMG . '/arrow-right.svg' ?>" alt="go to">
				</span>
			</a>
		</div>
	</div>
</section>

<section class="service-content">
	<div class="container">
		<h2 class="txt-center"><?= rwmb_meta( 'content_title', null, get_queried_object_id() ); ?></h2>
		<?= rwmb_meta( 'content_short', null, get_queried_object_id() ); ?>

		<div class="row tab-navs">
			<?php
			$tabs = rwmb_meta( 'tabs', null, get_queried_object_id() );
			$tab_id = 0;
			foreach ( $tabs as $t ) :
				$icon    = wp_get_attachment_url( $t[ 'icon' ] );
				$name    = $t[ 'name' ];
			?>
			<div class="col-3">
				<a class="tab-link h4 active" class="tab-link" data-href="tab-<?= ++ $tab_id ?>">
					<img src="<?= $icon ?>" alt="mobile">
					<span><?= $name ?></span>
				</a>
			</div>
			<?php endforeach; ?>
		</div>

		<div class="row">
			<div class="col-12">
				<?php
				$tab_content_id = 0;
				foreach ( $tabs as $t ) :
					$content = $t[ 'tab_content' ];
				?>
				<div id="tab-<?= ++ $tab_content_id ?>" class="tab-content <?= 1===$tab_content_id ? 'active':'' ?>">
					<div class="row">
						<?php foreach ( $content as $c ) : ?>
							<div class="<?= count( $t ) > 1 ? 'col-6' : 'col-12' ?>"><?= $c ?></div>
						<?php endforeach; ?>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>

	<div class="container gem-path">
		<h2 class="txt-center">GEM’s Project Management Framework</h2>
		<p class="txt-center">
		Feugiat volutpat sagittis donec quis dui egestas id in. <br>
		Amet sagittis a, orci ridiculus arcu habitant nulla eu.
		</p>

		<div class="splide">
			<div class="splide__track">
				<div class="splide__list">
					<div class="splide__slide txt-center">
						<img src="<?= NOVUS_IMG . '/settings.svg' ?>" alt="settings">
						<h4>PMI-based <br> PROCESSES & TOOLS</h4>
					</div>
					<div class="splide__slide txt-center">
						<img src="<?= NOVUS_IMG . '/human.svg' ?>" alt="team">
						<h4>WELL-TRAINED <br> TEAM</h4>
					</div>
					<div class="splide__slide txt-center">
						<img src="<?= NOVUS_IMG . '/checklist.svg' ?>" alt="feedback">
						<h4>REGULAR AUDIT & <br> FEEDBACK</h4>
					</div>
					<div class="splide__slide txt-center">
						<img src="<?= NOVUS_IMG . '/cloud.svg' ?>" alt="cloud">
						<h4>PMI-based <br> PROCESSES & TOOLS</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php endwhile; ?>

<section class="home-contact about-contact">
	<div class="container">
		<?= do_shortcode( '[contact-form-7 id="166" title="Send us a request"]' ) ?>
	</div>
</section>

<?php
get_footer();