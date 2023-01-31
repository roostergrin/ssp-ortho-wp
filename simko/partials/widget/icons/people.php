<div class="widget people">
	<div class="icon-container icon-preventive-maintenance">
		<div>
			<i class="icon-safety_limit-people"></i></i>
		</div>
	</div>
	<div class="content">
		<h3>Limit the number of people with you</h3>
		<? if (!empty($content) || true): ?>
		<div class="copy">
			<?= apply_filters('the_content', "Please limit the number of people you bring with you to your visit. In most cases, we can follow-up with parents afterward."); ?>
		</div>
		<? endif ?>
	</div>
</div>