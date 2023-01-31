<section class="copy full-two-columns<?= !empty($classes) ? ' '.implode(' ', $classes) : ''; ?>">
	<div class="content">
		<? if (!empty($h2)) : ?>
			<h2<?= !empty($h2_classes) ? ' class="'.implode(' ', $h2_classes).'"' : ''; ?>><?= $h2; ?></h2>
		<? endif; ?>
		<div class="inner-content">
			<div class="col"><?= $column1; ?></div>
			<div class="col"><?= $column2; ?></div>
		</div>
	</div>
</section>
