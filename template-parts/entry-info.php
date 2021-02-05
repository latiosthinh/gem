<div class="entry-info">
	<span><?= the_date(); ?></span>

	<ul class="social-share">
		<li>Share</li>
		<li>
			<a href="https://www.facebook.com/sharer/sharer.php?u=<?= the_permalink(); ?>&display=popup">
				<img style="width:9px;height:18px" src="<?= NOVUS_IMG . '/sc-1.svg' ?>" alt="facebook">
			</a>
		</li>

		<li>
			<a href="http://twitter.com/share?text=I found something quite hot over here&url=<?= the_permalink(); ?>&hashtags=gem">
				<img style="width:20px;height:16px" src="<?= NOVUS_IMG . '/sc-2.svg' ?>" alt="twitter">
			</a>
		</li>

		<li>
			<a href="https://www.linkedin.com/sharing/share-offsite/?url={<?= the_permalink(); ?>}">
				<img style="width:18px;height:13px" src="<?= NOVUS_IMG . '/sc-3.svg' ?>" alt="linkedin">
			</a>
		</li>

		<li>
			<a href="mailto:?subject=I wanted you to see this site&amp;body=Check out this site http://www.website.com." title="Share by Email">
				<img style="width:20px;height:16px" src="<?= NOVUS_IMG . '/sc-4.svg' ?>" alt="mail">
			</a>
		</li>
	</ul>
</div>