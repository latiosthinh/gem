<?php
get_header();

while ( have_posts() ) : the_post();
?>

<section class="news-banner" style="background:url(<?= get_the_post_thumbnail_url( 'full_url' ) ?>) center center / cover no-repeat">
	<div class="container">
		<h1 class="clw"><?= get_the_title() ?></h1>

		<div class="event-info d-flex clw">
			<p class="d-iflex">
				<img style="height:21px" src="<?= NOVUS_IMG . '/clock-w.svg' ?>">
				<?php rwmb_the_value( 'datetime', [ 'format' => 'H:i' ] ); ?>
			</p>
			<p class="d-iflex">
				<img style="height:21px" src="<?= NOVUS_IMG . '/calendar-w.svg' ?>">
				<?php rwmb_the_value( 'datetime', [ 'format' => 'F j, Y' ] ); ?>
			</p>

			<p class="d-flex">
				<img style="width:17px;height:21px" src="<?= NOVUS_IMG . '/pin-w.svg' ?>">
				<?= rwmb_meta( 'location' ) ?>
			</p>
		</div>
	</div>

	<p class="scroll-notice clw">Scroll down for more</p>
</section>

<section class="event-single-content">
	<div class="container">
		<div class="row">
			<article class="col-8">
				<h2>Overview</h2>
				<?php the_content(); ?>

				<h2>Agenda</h2>
				<table>
					<thead>
						<tr>
							<th width="20%">Time</th>
							<th width="33%">Presenter</th>
							<th>Topic</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$agenda = rwmb_meta( 'agenda' );

						foreach ( $agenda as $a ) :
						?>
						<tr>
							<td width="20%"><?= $a['time'] ?></td>
							<td width="33%">
								<span class="fw-5"><?= $a['presenter'] ?></span><br>
								<?= $a['position'] ?>
							</td>
							<td><span class="fw-5"><?= $a['topic'] ?></span></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</article>

			<aside class="col-4">
				<?= do_shortcode( '[contact-form-7 id="163" title="Sign up"]' ); ?>
			</aside>

			<div class="col-12 event-guest">
				<h2>Guest speakers</h2>
				<p>The experienced insiders</p>

				<div class="row">
					<?php
					$guests = rwmb_meta( 'guest' );

					foreach ( $guests as $a ) :
					?>
					<div class="col-2 guest-item">
						<img src="<?= wp_get_attachment_url( $a['image'] ) ?>" alt="<?= $a['name'] ?>">
						<h4><?= $a['name'] ?></h4>
						<p><?= $a['position'] ?></p>
					</div>
					<div class="col-6 guest-detail">
						<div class="row">
							<div class="col-2 clsecond fw-5">About</div>
							<div class="col-10">
								<?= $a[ 'about' ] ?>
							</div>

							<div class="col-2 clsecond fw-5">Education</div>
							<div class="col-10">
								<?= $a[ 'education' ] ?>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
endwhile;
get_footer();