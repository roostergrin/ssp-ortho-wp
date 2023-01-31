<div class="widget refreshment">
	<div class="icon-container icon-preventive-maintenance">
		<div>
			<i class="icon-safety_refreshments"></i></i>
		</div>
	</div>
	<div class="content">
		<h3>Temporarily suspended refreshments</h3>
		<? if (!empty($content) || true): ?>
		<div class="copy">
			<?= apply_filters('the_content', "For your safety, no coffee or refreshments will be served at this time."); ?>
		</div>
		<? endif ?>
	</div>
</div>
