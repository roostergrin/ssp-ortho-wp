<div class="widget face-covering">
	<div class="icon-container icon-preventive-maintenance">
		<div>
			<i class="icon-safety_mask"></i></i>
		</div>
	</div>
	<div class="content">
		<h3>Wear a mask or other face covering</h3>
		<? if (!empty($content) || true): ?>
		<div class="copy">
			<?= apply_filters('the_content', "Anyone entering the clinic will be required to wear a cloth face covering or mask. We’re unable to provide masks if you forget to bring one."); ?>
		</div>
		<? endif ?>
	</div>
</div>