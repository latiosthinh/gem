<section class="about-people">
	<div class="container">
		<h2 class="txt-center">Meet our people</h2>
		<p class="txt-center">
		Our professional executive team averages many years of <br>
		experience with GEM
		</p>

		<div class="row">
			<div class="col-12">
				<h3>Our leadership team</h3>
			</div>

			<?php
			$leaders = rwmb_meta( 'leader' );

			foreach ( $leaders as $l ) :
			?>

			<div class="col-4">
				<div class="item">
					<img src="<?= wp_get_attachment_url( $l['leader_ava'] ) ?>" alt="<?= $l['leader_name'] ?>">
					<h4><?= $l['leader_name'] ?></h4>
					<p class="fw-5"><?= $l['leader_position'] ?></p>

					<p><?= $l['leader_description'] ?></p>
				</div>
			</div>

			<?php endforeach; ?>
		</div>

		<div class="row">
			<div class="col-12">
				<h3>Our advisors</h3>
			</div>

			<?php
			$advisors = rwmb_meta( 'leader' );

			foreach ( $advisors as $l ) :
			?>

			<div class="col-4">
				<div class="item">
					<img src="<?= wp_get_attachment_url( $l['leader_ava'] ) ?>" alt="<?= $l['leader_name'] ?>">
					<h4><?= $l['leader_name'] ?></h4>
					<p class="fw-5"><?= $l['leader_position'] ?></p>

					<p><?= $l['leader_description'] ?></p>
				</div>
			</div>

			<?php endforeach; ?>
		</div>
	</div>
</section>