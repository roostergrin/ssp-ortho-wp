<div class="widget preventative-maintenance">
	<div class="icon-container icon-preventive-maintenance">
		<div class="path1"></div>
		<div class="path2"></div>
		<div class="path3"></div>
	</div>
	<div class="content">
		<h4>Preventative maintenance</h4>
		<? if (!empty($content)): ?>
		<div class="copy">
			<?= apply_filters('the_content', $content); ?>
		</div>
		<? endif ?>
	</div>
</div>
