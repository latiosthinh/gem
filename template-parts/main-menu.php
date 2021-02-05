<?php
$services = get_terms( [
	'taxonomy' => 'services-category',
	'hide_empty' => 0
] );

$cases = get_terms( [
	'taxonomy' => 'case-study-category',
	'hide_empty' => 0
] );

$events = get_terms( [
	'taxonomy' => 'event-category',
	'hide_empty' => 0
] );
?>
<nav class="main-menu">
	<div class="menu-parent">
		<ul class="container">
			<li><a class="menu-parent__item" data-href="menu-services">Services</a><img src="<?= NOVUS_IMG . '/arrow-right-cyan.svg' ?>"></li>
			<li><a class="menu-parent__item" data-href="menu-case-studies">Case Studies</a><img src="<?= NOVUS_IMG . '/arrow-right-cyan.svg' ?>"></li>
			<li><a class="menu-parent__item" data-href="menu-event">News</a><img src="<?= NOVUS_IMG . '/arrow-right-cyan.svg' ?>"></li>
			<li><a class="menu-parent__item" data-href="menu-resource-center">Resource Center</a><img src="<?= NOVUS_IMG . '/arrow-right-cyan.svg' ?>"></li>
			<li><a href="<?= home_url( '/career' ) ?>">Career</a><img src="<?= NOVUS_IMG . '/arrow-right-cyan.svg' ?>"></li>
			<li><a href="<?= home_url( '/about-us' ) ?>">About Us</a><img src="<?= NOVUS_IMG . '/arrow-right-cyan.svg' ?>"></li>
			<li><a href="<?= home_url( '/contact-us' ) ?>">Contact Us</a><img src="<?= NOVUS_IMG . '/arrow-right-cyan.svg' ?>"></li>
		</ul>
	</div>

	<div id="menu-services" class="menu-children">
		<h3>Explore our services</h3>
		<?php foreach ( $services as $s ) : ?>

		<ul class="d-flex">
			<?php if ( 'special' !== $s->slug ) : ?>
				<li class="fw-5"><?= $s->name ?></li>
			<?php endif; ?>

			<?php
			$s_posts = new WP_Query( [
				'post_type' => 'service',
				'tax_query' => [
					[
						'taxonomy' => 'services-category',
						'field'    => 'slug',
						'terms'    => [ $s->slug ],
						'operator' => 'IN'
					]
				]
			] );

			while ( $s_posts->have_posts() ) :
				$s_posts->the_post();
			?>
			<li>
				<a class="<?= 'special' !== $s->slug ?: 'fw-5' ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
				<img src="<?= NOVUS_IMG . '/arrow-right-cyan.svg' ?>" />
			</li>
			<?php endwhile; ?>
		</ul>

		<?php endforeach; ?>
	</div>

	<div id="menu-case-studies" class="menu-children menu-second">
		<h3>Insights & How we help clients</h3>

		<ul class="d-flex">
			<?php foreach ( $cases as $s ) : ?>
				<li>
					<a class="fw-5" href="<?= get_term_link( $s->term_id ) ?>"><?= $s->name; ?></a>
					<img src="<?= NOVUS_IMG . '/arrow-right-cyan.svg' ?>" />
				</li>
			<?php endforeach; ?>
		</ul>
		
		<p>FEATURED</p>
		<ul class="d-flex">
			<?php
			$c_posts = new WP_Query( [
				'post_type'      => 'case-study',
				'posts_per_page' => 2,
			] );
			
			while ( $c_posts->have_posts() ) :
				$c_posts->the_post();
			?>
			<li>
				<a class="fw-5" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
			</li>
			<?php endwhile; ?>
		</ul>
	</div>

	<div id="menu-event" class="menu-children menu-second">
		<h3>Explore lastest news</h3>

		<ul class="d-flex">
			<?php foreach ( $events as $s ) : ?>
				<li>
					<a class="fw-5" href="<?= get_term_link( $s->term_id ) ?>"><?= $s->name; ?></a>
					<img src="<?= NOVUS_IMG . '/arrow-right-cyan.svg' ?>" />
				</li>
			<?php endforeach; ?>
		</ul>
		
		<p>FEATURED</p>
		<ul class="d-flex">
			<?php
			$c_posts = new WP_Query( [
				'post_type'      => 'case-study',
				'posts_per_page' => 2,
			] );
			
			while ( $c_posts->have_posts() ) :
				$c_posts->the_post();
			?>
			<li>
				<a class="fw-5" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
				<?php the_excerpt(); ?>
			</li>
			<?php endwhile; ?>
		</ul>
	</div>

	<div id="menu-resource-center" class="menu-children menu-second">
		<h3>Our Resource Center</h3>

		<ul class="d-flex">
			<li>
				<a class="fw-5" href="<?= home_url( '/blog' ) ?>">Blog</a>
				<img src="<?= NOVUS_IMG . '/arrow-right-cyan.svg' ?>" />
			</li>

			<li>
				<a class="fw-5" href="<?= home_url( '/blog' ) ?>">Industries</a>
				<img src="<?= NOVUS_IMG . '/arrow-right-cyan.svg' ?>" />
			</li>
		</ul>
		
		<p>FEATURED</p>
		<ul class="d-flex">
			<?php
			$b_posts = new WP_Query( [
				'post_type'      => 'post',
				'posts_per_page' => 2,
			] );
			
			while ( $b_posts->have_posts() ) :
				$b_posts->the_post();
			?>
			<li>
				<a class="fw-5" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
				<?php the_excerpt(); ?>
			</li>
			<?php endwhile; ?>
		</ul>
	</div>
</nav>