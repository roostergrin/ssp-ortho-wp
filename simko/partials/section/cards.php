<section class="cards<?= !empty($classes) ? ' '.implode(' ', $classes) : ''; ?>">
	<div class="content">
		<div class="inner-content">
			<? if (!empty($h2)) : ?>
				<h2<?= !empty($h2_classes) ? ' class="'.implode(' ', $h2_classes).'"' : ''; ?>><?= $h2; ?></h2>
			<? endif; ?>
			<? if (!empty($h3)) : ?>
				<h3<?= !empty($h3_classes) ? ' class="'.implode(' ', $h3_classes).'"' : ''; ?>><?= $h3; ?></h3>
			<? endif; ?>
			<div class="cards-container">
				<? foreach ($cards as $card) : ?>
					<div class="card<?= !empty($card['classes']) ? ' '.implode(' ', $card['classes']) : ''; ?>">
						<? if (!empty($card['h2'])) : ?>
							<h2<?= !empty($card['h2_classes']) ? ' class="'.implode(' ', $card['h2_classes']).'"' : ''; ?>><?= $card['h2']; ?></h2>
						<? endif; ?>
						<? if (!empty($card['icon'])) : ?>
							<i class="<?= $card['icon']; ?>"></i>
						<? endif; ?>
						<? if (!empty($card['title'])) : ?>
							<p class="title"><?= $card['title']; ?></p>
						<? endif; ?>
						<?= apply_filters('the_content', $card['content']); ?>
					</div>
				<? endforeach; ?>
			</div>
		</div>
	</div>
</section>
