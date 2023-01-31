<div class="widget improved-oral-health">
	<div class="icon-container icon-improved-oral-health">
		<div class="path1"></div>
		<div class="path2"></div>
		<div class="path3"></div>
		<div class="path4"></div>
	</div>
	<div class="content">
		<h4>Improved oral health</h4>
		<? if (!empty($content)): ?>
		<div class="copy">
			<?= apply_filters('the_content', $content); ?>
		</div>
		<? endif ?>
	</div>
</div>
