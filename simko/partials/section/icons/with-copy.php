<section class="icons with-copy<?= !empty($classes) ? ' '.implode(' ', $classes) : ''; ?>" id="<?= !empty($section_id) ? $section_id : ''; ?>">
	<div class="content">
		<div class="inner-content">
			<?= $heading ?? '' ?>
            <?= $content ?? '' ?>
			<ul class="icons cols-<?= count($icons) ?>">
			<? foreach ($icons as $partial => $content): ?>
				<li>
					<? partial($partial, ['content' => $content]); ?>
				</li>
			<? endforeach ?>
			</ul>
		</div>
	</div>
</section>
