<div class="widget temperature-gun">
	<div class="icon-container icon-preventive-maintenance">
		<div>
			<i class="icon-safety_temperature"></i></i>
		</div>
	</div>
	<div class="content">
		<h3>Have your temperature checked at the door</h3>
		<? if (!empty($content) || true): ?>
		<div class="copy">
			<?= apply_filters('the_content', "For your safety, no coffee or refreshments will be served at this time."); ?>
		</div>
		<? endif ?>
	</div>
</div>
