<section class="image-copy">
	<div class="content">
		<div class="inner-content">
			<article>
				<img src="<?= $image_url ?>" alt="" class="bg-img">
			</article>
			<aside>
				<h2><?= $heading ?></h2>
				<?= apply_filters('the_content', $copy) ?>
				<? if(!empty($has_cta)): ?>
				<p><a href="<?= $cta_url ?>" class="<?= implode(' ', $cta_classes) ?>"><?= $cta_text ?></a></p>
				<? endif ?>
			</aside>
		</div>
	</div>
</section>