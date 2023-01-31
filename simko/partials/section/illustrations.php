<section class="illustrations<? if(!empty($classes)): ?> <?= implode(' ', $classes) ?><? endif ?>">
	<div class="content">
		<div class="inner-content">
			<div class="container">
				<? if (!empty($column1)) : ?>
					<div class="column">
						<?= !empty($column1['image']) ? partial('widget.icons.'. $column1['image']) : ''; ?>
						<? if (!empty($column1['h3'])) : ?>
							<h3<?= !empty($column1['h3_classes']) ? ' class="'.implode(' ', $column1['h3_classes']).'"' : ''; ?>><?= $column1['h3']; ?></h3>
						<? endif; ?>
						<?= !empty($column1['content']) ? apply_filters('the_content', $column1['content']) : ''; ?>
					</div>
				<? endif; ?>
				<? if (!empty($column2)) : ?>
					<div class="column">
						<h3<?= !empty($column2['h3_classes']) ? ' class="'.implode(' ', $column2['h3_classes']).'"' : ''; ?>><?= $column2['h3']; ?></h3>
						<?= !empty($column2['content']) ? apply_filters('the_content', $column2['content']) : ''; ?>
						<?= !empty($column2['image']) ? partial('widget.icons.'. $column2['image']) : ''; ?>
					</div>
				<? endif; ?>
			</div>
		</div>
	</div>
</section>
