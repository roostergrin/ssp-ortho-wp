<? $content_classes = implode(' ', array_filter(array_unique(array_merge(['copy-container'], $content_classes ?? [])))); ?>
<section class="hero with-image">
	<div class="content">
		<? if (!empty($image)) : ?>
		<img src="<?= $image['src']; ?>" width="<?= !empty($image['width']) ? $image['width'] : ''; ?>" height="<?= !empty($image['height']) ? $image['height'] : ''; ?>" alt="<?= !empty($image['alt']) ? $image['alt'] : ''; ?>" class="<?= !empty($image['classes']) ? implode(' ', $image['classes']) : ''; ?>" loading="lazy">
		<? endif; ?>
		<div class="inner-content">
			<div class="<?= $content_classes ?>">
				<? if (!empty($heading)) : ?>
					<h1><?= $heading; ?></h1>
				<? endif; ?>
				<? if (!empty($content)) : ?>
					<?= $content; ?>
				<? endif; ?>
			</div>
		</div>
	</div>
</section>
