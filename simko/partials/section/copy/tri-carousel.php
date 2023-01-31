<?
wp_enqueue_style('lib-owl-carousel');
wp_enqueue_script('internal-copy-tri-carousel');
?>
<section class="copy-tri-carousel">
	<div class="main-container">
		<? if (!empty($slides)) : ?>
			<div class="copy-tri-carousel owl-carousel">
				<? foreach ($slides as $slide) : ?>
					<div class="slide">
						<? if (!empty($slide['h3'])) : ?>
							<h3<?= !empty($slide['h3_classes']) ? ' class="'.implode(' ', $slide['h3_classes']).'"' : ''; ?>><?= $slide['h3']; ?></h3>
						<? endif; ?>
						<? if (!empty($slide['content'])) : ?>
							<div class="content">
								<?= $slide['content']; ?>
							</div>
						<? endif; ?>
					</div>
				<? endforeach; ?>
			</div>
			<div class="pagination-container">
				<div class="pagination">
					<div class="page-left"><span>Previous</span><i class="icon-left-arrow-thick tri-carousel"></i></div>
					<div class="page-right"><i class="icon-right-arrow-thick tri-carousel"></i><span>Next</span></div>
				</div>
			</div>
		<? endif; ?>
	</div>
</section>
