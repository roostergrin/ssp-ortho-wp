<section class="copy two-cols-with-cta<?= !empty($classes) ? ' '.implode(' ', $classes) : ''; ?>">
	<div class="content<?= !empty($content_classes) ? ' '.implode(' ', $content_classes) : ''; ?>">
		<div class="inner-content">
			<div class="content-container">
				<div class="columns">
                    <div class="column">
                        <?= apply_filters('the_content', $content); ?>
                    </div>
				    <div class="column patient-care-philosophy">
                        <? partial('widget.schedule-consultation', [
							'cta' => $cta,
							'widget_classes' => $widget_classes
							]); ?>
                    </div>
				</div>
			</div>
		</div>
	</div>
</section>
