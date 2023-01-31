<section class="image-copy-full <?= implode(' ', $classes) ?>">
	<div class="content">
		<div class="inner-content">
			<article>
				<h2><?= $heading ?></h2>
				<?= apply_filters('the_content', $copy) ?>
			</article>
			<aside>
				<img src="<?= $image_url ?>" alt="" class="inline-block" width="<?= intval($image_width) ?>" height="<?= intval($image_height) ?>">
			</aside>
		</div>
	</div>
</section>