<? if (!empty($icon['title']) && !empty($icon['copy'])) : ?>
	<div class="widget folding-icons<?= !empty($classes) ? ' '.implode(' ', $classes) : ''; ?>">
		<div class="icon-container">
			<? if( !empty( $icon['multi_color_svg'] ) ): ?>
			<img src="<?= get_stylesheet_directory_uri()."/images/icons/".$icon['img_src'].".svg" ?>">
			<? else: ?>
			<i class="<?= $icon['class']; ?>"></i>
			<? endif; ?>
		</div>
		<div class="content-container">
			<p class="title"><?= $icon['title']; ?></p>
			<p class="copy"><?= $icon['copy']; ?></p>
		</div>
	</div>
<? endif; ?>
