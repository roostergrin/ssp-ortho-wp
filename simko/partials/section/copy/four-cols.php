<section class="copy four-cols<?= !empty($classes) ? ' '.implode(' ', $classes) : ''; ?>">
	<div class="content<?= !empty($content_classes) ? ' '.implode(' ', $content_classes) : ''; ?>">
		<div class="inner-content">
			<div class="content-container">
				<? if (!empty($h2)) : ?>
					<h2<?= !empty($h2_classes) ? ' class="'.implode(' ', $h2_classes).'"' : ''; ?>><?= $h2; ?></h2>
				<? endif; ?>
				<? if (!empty($h3)) : ?>
					<h3<?= !empty($h3_classes) ? ' class="'.implode(' ', $h3_classes).'"' : ''; ?>><?= $h3; ?></h3>
				<? endif; ?>
				<div class="columns">
					<? foreach ($columns as $column) : ?>
						<div class="column">
							<?= apply_filters('the_content', $column); ?>
						</div>
					<? endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>
