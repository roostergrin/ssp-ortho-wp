<div class="widget seating">
	<div class="icon-container icon-preventive-maintenance">
		<div>
			<i class="icon-safety_seating"></i></i>
		</div>
	</div>
	<div class="content">
		<h3>Limited, socially distanced seating</h3>
		<? if (!empty($content) || true): ?>
		<div class="copy">
			<?= apply_filters('the_content', "We have limited our seating accommodations and spaced the remaining seating further apart to aid social distancing."); ?>
		</div>
		<? endif ?>
	</div>
</div>
