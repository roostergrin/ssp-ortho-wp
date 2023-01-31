<div class="widget bandaid">
	<div class="icon-container">
		<div>
			<!-- <img src="<?//= get_stylesheet_directory_uri(); ?>/images/svgs/orthodontic-emergency_injury.svg" alt="Bandaid" width="100" height="80" class="tilt-right"> -->
			<!-- <img src="<?//= get_stylesheet_directory_uri(); ?>/images/svgs/orthodontic-emergency_injury.svg" alt="Bandaid" width="100" height="80" class="tilt-left"> -->
	<div class="tilt-right">
		<?= get_template_part('images/svgs/inline', 'orthodontic-emergency_injury.svg'); ?>
	</div>
	<div class="tilt-left">
		<?= get_template_part('images/svgs/inline', 'orthodontic-emergency_injury.svg'); ?>
	</div>
		</div>
    </div>
    <? if (!empty($content)): ?>
        <p><?= apply_filters('the_content', $content); ?></p>
    <? endif ?>
</div>
