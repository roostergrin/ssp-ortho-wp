<div class="widget handy-hygiene">
	<div class="icon-container icon-preventive-maintenance">
		<div>
			<i class="icon-safety_hand-washing"></i></i>
		</div>
	</div>
	<div class="content">
		<h3>Handy hygiene</h3>
		<? if (!empty($content) || true): ?>
		<div class="copy">
			<?= apply_filters('the_content', "Staff hand hygiene includes a 20-second wash or sanitizer before and after PPE changes or adjustments and after all patient contact."); ?>
		</div>
		<? endif ?>
	</div>
</div>
