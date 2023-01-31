<div class="widget appointment-time">
	<div class="icon-container icon-preventive-maintenance">
		<div>
			<i class="icon-general_time"></i>
		</div>
	</div>
	<div class="content">
		<h3>Arrive to your appointment on time</h3>
		<? if (!empty($content) || true): ?>
		<div class="copy">
			<?= apply_filters('the_content', "On the day of your scheduled appointment, you’ll be instructed to arrive on time, rather than early, and wait in your car until we call you. This will minimize your exposure to other patients."); ?>
		</div>
		<? endif ?>
	</div>
</div>
