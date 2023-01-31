<section class="copy full<?= !empty($classes) ? ' '.implode(' ', $classes) : ''; ?>">
	<div class="content">
		<div class="inner-content">
			<? if (!empty($h1_mobile)) : ?>
				<h2<?= !empty($h1_mobile_classes) ? ' class="'.implode(' ', $h1_mobile_classes).'"' : ''; ?>><?= $h1_mobile; ?></h2>
			<? endif; ?>
			<? if (!empty($h2)) : ?>
				<h2<?= !empty($h2_classes) ? ' class="'.implode(' ', $h2_classes).'"' : ''; ?>><?= $h2; ?></h2>
			<? endif; ?>
			<? if (!empty($h3)) : ?>
				<h3<?= !empty($h3_classes) ? ' class="'.implode(' ', $h3_classes).'"' : ''; ?>><?= $h3; ?></h3>
			<? endif; ?>
			<?= apply_filters('the_content', $content); ?>
		</div>
	</div>
</section>
