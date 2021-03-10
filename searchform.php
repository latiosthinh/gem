<div class="header-search__wrapper">
	<button id="btn-search-close" class="btn1 btn--search-close" aria-label="Close search form">
		<svg class="icon icon--cross">
			<use xlink:href="#icon-cross">
				
			</use>
			<svg id="icon-cross" viewBox="0 0 24 24">
					<title>close</title>
					<path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path>
				</svg>	
		</svg>
	</button>
	<div class="search-inner search-inner--up">
		<form role="search" method="get" class="search-form" action="<?php echo site_url('/'); ?>">
			<label>
				<input type="search" class="search__input" placeholder="What are you looking for?" value="" name="s">
				<input type="hidden" name="post_type" value="post" />
			</label>
			<span class="search__info">Hit enter to search or ESC to close</span>
			<button type="submit" class="search-submit">
				<img src="<?= NOVUS_IMG . '/search.svg' ?>" alt="search">
			</button>
		</form>
	</div>

	<div class="search-inner search-inner--down">
		<div class="search__related row"></div>
	</div>
</div>