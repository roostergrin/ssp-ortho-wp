<div class="widget smiles">
	<div class="icon-smile-shine icon-container">
		<div class="path1"></div>
		<div class="path2"></div>
		<div class="path3"></div>
		<div class="path4"></div>
		<div class="path5"></div>
		<div class="path6"></div>
	</div>
	<div class="content">
		<h4>Beautiful, confident smiles</h4>
		<? if (!empty($content)): ?>
		<div class="copy">
			<?= apply_filters('the_content', $content); ?>
		</div>
		<? endif ?>
	</div>
</div>
