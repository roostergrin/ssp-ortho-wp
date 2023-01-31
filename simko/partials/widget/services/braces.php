<div class="widget braces content">
	<div class="inner-content">
		<div class="copy">
			<? if (!empty($h3)) : ?>
				<h3<?= !empty($h3_classes) ? ' class="'.implode(' ', $h3_classes).'"' : ''; ?>><?= $h3; ?></h3>
			<? endif; ?>
			<?= !empty($content) ? apply_filters('the_content', $content) : ''; ?>
		</div>
		<? if (!empty($slides)) : ?>
			<ul class="smile-icons images">
				<? for ($i = 0; $i < $slides; $i++) : ?>
					<?	if(!empty($from) && $from === 'why-orthodontic-treatment') {
						$slide_image_id = (!empty($from) && $from === 'why-orthodontic-treatment') ? get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_ten_slides_'.($i).'_slide_image', true) : '';
						$slide_image = wp_get_attachment_image_src($slide_image_id, 'large');
						$slide_id = (!empty($from) && $from === 'why-orthodontic-treatment') ? get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_ten_slides_'.($i).'_slide_image_name', true) : '';
						$width = (!empty($from) && $from === 'why-orthodontic-treatment') ? $slide_image[1] : 500;
						$height = (!empty($from) && $from === 'why-orthodontic-treatment') ? $slide_image[2] : 300;
					?>
					<li data-icon-index="<?= $i+1; ?>" class="img-container<?= !empty($slide_id) ? ' '.$slide_id : ''; ?>">
						<img<?= !empty($slide_image[0]) ? ' src="'.$slide_image[0].'"' : ''; ?><?= !empty($width) ? ' width="'.($width).'"' : ''; ?><?= !empty($height) ? ' height="'.($height).'"' : ''; ?><?= !empty($image['srcset']) ? ' srcset="'.$image['srcset'].'"' : ''; ?><?= !empty($image['sizes']) ? ' sizes="'.$image['sizes'].'"' : ''; ?><?= !empty(get_post_meta($slide_image_id, '_wp_attachment_image_alt', true)) ? ' alt="'.get_post_meta($slide_image_id, '_wp_attachment_image_alt', true).'"' : ''; ?><?= !empty($slide_id) ? ' id="'.$slide_id.'"' : ''; ?><?= !empty($image['classes']) ? ' class="'.implode(' ', $image['classes']).'"' : ''; ?> loading="lazy" />
					</li>
					<?	} else {	?>
					<? $widget = get_post_meta(get_the_ID(), 'braces_section_four_slides_slide_'.($i+1).'_icon', true); ?>
					<li data-icon-index="<?= $i+1; ?>" class="img-container<?= !empty($widget) ? ' '.$widget : ''; ?>">
					<?= get_template_part('images/svgs/inline', 'orthodontic-illustrations_' . $widget .'.svg'); ?>
					</li>
					<?	}	?>
				<? endfor; ?>
			</ul>
		<? endif; ?>
		<? if (!empty($smile_image)) : ?>
			<ul class="smile-icons">
				<li class="img-container">
					<?= get_template_part('images/svgs/inline', 'orthodontic-illustrations_' . $smile_image .'.svg');?>
				</li>
			</ul>
		<? endif; ?>
	</div>
</div>
