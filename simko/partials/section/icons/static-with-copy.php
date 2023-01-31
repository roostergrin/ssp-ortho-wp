<section class="icons static with-copy <?= !empty($classes) ? implode(' ', $classes) : '' ?>">
	<div class="content">
		<div class="inner-content">
			<?= $heading ?? '' ?>
            <?= $content ? apply_filters('the_content', $content) : '' ?>
            <? if (!empty($icons)): ?>
			<ul class="icons cols-<?= count($icons) ?>">
			
			<? foreach ($icons as $content): ?>
				<li>					
					<? partial($content['widget_partial'], [
						'content' => !empty($content['widget_content']) ? $content['widget_content'] : '',
						'heading' => !empty($content['widget_heading']) ? $content['widget_heading'] : '',
						'classes' => !empty($content['widget_classes']) ? $content['widget_classes'] : '',
						'link' => !empty($content['widget_link']) ? $content['widget_link'] : '',
                    ]); ?>
				</li>
			<? endforeach ?>
			</ul>
            <? endif; ?>
		</div>
	</div>
</section>
