<div class="widget mandatory-temperature-check">
	<div class="icon-container icon-preventive-maintenance">
		<div>
			<i class="icon-safety_temperature"></i></i>
		</div>
	</div>
	<div class="content">
		<h3>Mandatory temperature check</h3>
		<? if (!empty($content) || true): ?>
		<div class="copy">
			<?= apply_filters('the_content', "Employees are required to check their temperature twice daily. Anyone with a temperature of 99.6˚ F degrees or above will be instructed to stay home."); ?>
		</div>
		<? endif ?>
	</div>
</div>