<? wp_enqueue_script('internal-events-carousel'); ?>
<section class="event-ortho-treatment-carousel">
    <div class="content">
        <div class="inner-content">
            <? if (!empty($h3)) : ?>
            <div class="copy">                
                <h3<?= !empty($h3_classes) ? ' class="'.implode(' ', $h3_classes).'"' : ''; ?>><?= $h3; ?></h3>                
            </div>
            <? endif; ?>
        </div>
    </div>

	<div class="container">		
		<div class="owl-carousel owl-stage">         
			<? for ($i = 0; $i < $slides; $i++): ?>
                <?
					$icon = 'icon-'.(get_post_meta(get_the_ID(), 'confidence_counts_section_eight_slides_'.$i.'_slide_image_name', true));
					$heading = get_post_meta(get_the_ID(), 'confidence_counts_section_eight_slides_'.$i.'_slide_heading', true);
					$content = get_post_meta(get_the_ID(), 'confidence_counts_section_eight_slides_'.$i.'_slide_content', true);
				?>

				<div class="slide" data-icon-index="<?= $i+1; ?>" data-icon="<?= $icon; ?>">
                    <?	
						$slide_image_id = get_post_meta(get_the_ID(), 'confidence_counts_section_eight_slides_'.($i).'_slide_image', true);
						$slide_image = wp_get_attachment_image_src($slide_image_id, 'large');
						$slide_id = get_post_meta(get_the_ID(), 'confidence_counts_section_eight_slides_'.($i).'_slide_image_name', true);
						$width = $slide_image[1];
						$height = $slide_image[2];  
					?>

                    <div data-icon-index="<?= $i+1; ?>" class="img-container<?= !empty($slide_id) ? ' '.$slide_id : ''; ?>">
                        <img<?= !empty($slide_image[0]) ? ' src="'.$slide_image[0].'"' : ''; ?><?= !empty($width) ? ' width="'.($width).'"' : ''; ?><?= !empty($height) ? ' height="'.($height).'"' : ''; ?><?= !empty($image['srcset']) ? ' srcset="'.$image['srcset'].'"' : ''; ?><?= !empty($image['sizes']) ? ' sizes="'.$image['sizes'].'"' : ''; ?><?= !empty(get_post_meta($slide_image_id, '_wp_attachment_image_alt', true)) ? ' alt="'.get_post_meta($slide_image_id, '_wp_attachment_image_alt', true).'"' : ''; ?><?= !empty($slide_id) ? ' id="'.$slide_id.'"' : ''; ?><?= !empty($image['classes']) ? ' class="'.implode(' ', $image['classes']).'"' : ''; ?> loading="lazy" />
                    </div>

                    <div class="content-container">
                        <h4 class="h3"><?= $heading; ?></h4>
                        <div class="content">
                            <?= apply_filters('the_content', $content); ?>
                        </div>
                    </div>
				</div>
			<? endfor; ?>
		</div>

        <div class="pagination-container">
			<div class="pagination">
				<div class="page-left"><span>Previous</span><i class="icon-left-arrow-thick tri-carousel"></i></div>
				<div class="page-right"><i class="icon-right-arrow-thick tri-carousel"></i><span>Next</span></div>
			</div>
		</div>
	</div>
</section>
