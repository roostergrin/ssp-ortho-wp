<? wp_enqueue_style('lib-owl-carousel'); ?>
<? wp_enqueue_script('internal-all-ages-carousel'); ?>
<section class="smile-confidently bg-gray-2">
	<div class="content">
		<? partial('widget.all-ages', [
			'h4' => $h4,
			'h4_classes' => $h4_classes,
			'slides' => $slides
		]); ?>
	</div>
</section>
