<div class="widget hand-sanitizer">
	<div class="icon-container icon-preventive-maintenance">
		<div>
			<i class="icon-safety_hand-sanitizer active"></i></i>
		</div>
	</div>
	<div class="content">
		<h3>Hand sanitizer use required</h3>
		<? if (!empty($content) || true): ?>
		<div class="copy">
			<?= apply_filters('the_content', "We’ve made hand sanitizer available and require it for anyone entering the clinic."); ?>
		</div>
		<? endif ?>
	</div>
</div>
