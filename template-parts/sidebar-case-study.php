<aside class="col-3 sidebar-case-study">
	<h4 class="clw fw-5">INDUSTRIES</h4>
	<?php
	$cats = get_terms( [
		'taxonomy'   => 'case-study-category',
		'hide_empty' => false,
	] );

	foreach ( $cats as $c ) :
	?>
	<a class="fw-5" href="<?= get_term_link( $c->slug, 'case-study-category' ) ?>"><?= $c->name ?></a>
	<?php endforeach; ?>
</aside>