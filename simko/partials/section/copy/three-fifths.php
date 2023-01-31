<section class="copy three-fifths<?= !empty($classes) ? ' '.implode(' ', $classes) : ''; ?>">
	<div class="content">
		<div class="inner-content">
			<article>
				<? if (!empty($h2)) : ?>
					<h2<?= !empty($h2_classes) ? ' class="'.implode(' ', $h2_classes).'"' : ''; ?>><?= $h2; ?></h2>
				<? endif; ?>
				<?= $column1; ?>
			</article>
			<aside>
				<?= $column2; ?>
			</aside>
		</div>
	</div>
</section>
