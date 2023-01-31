<? wp_enqueue_script('internal-braces-carousel'); ?>
<section class="braces-carousel">
	<? partial('widget.services.braces', [
		'h3' => $h3,
		'h3_classes' => $h3_classes,
		'content' => $content,
		'from' => $from,
		'slides' => $slides,
	]); ?>
	<div class="container">
		<div class="pagination-container">
			<div class="pagination">
				<div class="page-left"><span>Previous</span><i class="icon-left-arrow-thick tri-carousel"></i></div>
				<div class="page-right"><i class="icon-right-arrow-thick tri-carousel"></i><span>Next</span></div>
			</div>
		</div>
		<div class="owl-carousel owl-stage">
			<? for ($i = 0; $i < $slides; $i++): ?>
				<?
					$icon = (!empty($from) && $from === 'why-orthodontic-treatment') ? get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_ten_slides_'.($i).'_slide_image_name', true) : 'icon-'.(get_post_meta(get_the_ID(), 'braces_section_four_slides_slide_'.($i+1).'_icon', true));
					$heading = (!empty($from) && $from === 'why-orthodontic-treatment') ? get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_ten_slides_'.($i).'_slide_heading', true) : get_post_meta(get_the_ID(), 'braces_section_four_slides_slide_'.($i+1).'_heading', true);
					$content = (!empty($from) && $from === 'why-orthodontic-treatment') ? get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_ten_slides_'.($i).'_slide_content', true) : get_post_meta(get_the_ID(), 'braces_section_four_slides_slide_'.($i+1).'_content', true);
				?>
				<? if(!empty($icon) && !empty($heading) && !empty($content)): ?>
				<div class="slide" data-icon-index="<?= $i+1; ?>" data-icon="<?= $icon; ?>">
					<h4 class="h3"><?= $heading; ?></h4>
					<div class="content">
						<?= apply_filters('the_content', $content); ?>
					</div>
				</div>
				<? endif; ?>
			<? endfor; ?>
		</div>
	</div>
</section>
