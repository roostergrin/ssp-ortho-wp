<section class="copy copy-with-wide-image">
	<div class="content">
		<div class="inner-content">
			<article class="light">
				<? if (!empty($eyebrow)) : ?>
					<p class="eyebrow"><?= $eyebrow; ?></p>
				<? endif; ?>
				<? if (!empty($h1)) : ?>
					<h1<?= !empty($h1_classes) ? ' class="'.implode(' ', $h1_classes).'"' : ''; ?>><?= $h1; ?></h1>
				<? endif; ?>
				<? if (!empty($h2)) : ?>
					<h2<?= !empty($h2_classes) ? ' class="'.implode(' ', $h2_classes).'"' : ''; ?>><?= $h2; ?></h2>
				<? endif; ?>
				<?= apply_filters('the_content', $content); ?>
				<? if (!empty($cta)) : ?>
				<p><a class="<?= implode(' ', $cta['classes']); ?>" href="<?= $cta['href']; ?>"><?= $cta['text'] ?></a></p>
				<? endif; ?>
			</article>
			<? if (!empty($image)) : ?>
			<aside>
				<div class="image-container">
					<img src="<?= $image['src']; ?>" alt="<?= $image['alt']; ?>" class="<?= implode(' ', $image['classes']); ?>" width="<?= $image['width']; ?>" height="<?= $image['height']; ?>"/>
				</div>
			</aside>
			<? endif; ?>
		</div>
	</div>
</section>
