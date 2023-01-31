<?
wp_enqueue_style('lib-owl-carousel');
wp_enqueue_script('internal-icons-carousel');
?>
<section class="icons carousel two-cols">
	<div class="content">
		<div class="inner-content mobile-reverse">
			<div class="container">
				<? if (!empty($h3)) : ?>
					<h3<?= !empty($h3_classes) ? ' class="'.implode(' ', $h3_classes).'"' : ''; ?>><?= $h3; ?></h3>
				<? endif; ?>
				<? if (!empty($content)) { echo apply_filters('the_content', $content); } ?>
			</div>
			<? if (!empty($carousel)) : ?>
				<div class="two-cols owl-carousel">
					<? foreach ($carousel as $icon) : ?>
						<? partial($icon[0]); ?>
					<? endforeach; ?>
				</div>
			<? endif; ?>
		</div>
	</div>
</section>
