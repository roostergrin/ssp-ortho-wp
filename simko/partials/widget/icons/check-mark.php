<div class="widget check-marks">
	<div class="content">
        <span class="icon-checkmark"></span>
        <? if (!empty($heading)): ?>
			<h3><?= $heading ?></h3>
        <?php endif; ?>
		<? if (!empty($content)): ?>
			<div class="copy">
				<?= apply_filters('the_content', $content); ?>
			</div>
		<? endif ?>
	</div>
</div>
