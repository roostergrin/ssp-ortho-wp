<section class="copy three-cols<?= !empty($classes) ? ' '.implode(' ', $classes) : ''; ?>">
	<div class="content">
		<div class="inner-content">
			<? if (!empty($h2)) : ?>
				<h2<?= !empty($h2_classes) ? ' class="'.implode(' ', $h2_classes).'"' : ''; ?>><?= $h2; ?></h2>
			<? endif; ?>
			<? if (!empty($images)) : ?>
				<div class="images-container">
					<? foreach ($images as $image) : ?>
						<div class="img-container">
							<img src="<?= $image['src']; ?>" width="<?= $image['width']; ?>" height="<?= $image['height']; ?>" alt="<?= $image['alt']; ?>" class="<?= !empty($classes) ? implode(' ', $classes) : ''; ?>" />
						</div>
					<? endforeach; ?>
				</div>
			<? endif; ?>
			<div class="content-container">
				<? if (!empty($h3)) : ?>
					<h3<?= !empty($h3_classes) ? ' class="'.implode(' ', $h3_classes).'"' : ''; ?>><?= $h3; ?></h3>
				<? endif; ?>
				<? if (!empty($content)) echo apply_filters('the_content', $content); ?>
				<div class="columns">
					<? foreach ($columns as $column) : ?>
						<div class="column">
							<? if (!empty($column['image'])) : ?>
								<div class="img-container">
									<img src="<?= $column['image']['src']; ?>" alt="<?= $column['image']['alt']; ?>" class="<?= !empty($column['image']['classes']) ? implode(' ', $column['image']['classes']) : ''; ?>" />
								</div>
							<? endif; ?>
							<? if (!empty($column['h3'])) : ?>
								<h3 class="h2 primary"><?= $column['h3']; ?></h3>
							<? endif; ?>
							<? if (!empty($column['sub-heading'])) : ?>
								<p class="title"><?= $column['sub-heading']; ?></p>
							<? endif; ?>
							<? if (!empty($column['content'])) : ?>
								<p<?= !empty($column['content_classes']) ? ' class="'.(implode(' ', $column['content_classes'])).'"' : ''; ?>><?= $column['content']; ?></p>
							<? endif; ?>
						</div>
					<? endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>
