<?
$invisalign_virtual_care_heading = get_post_meta(get_the_id(), 'invisalign_virtual_care_section_three_heading', true);
$invisalign_virtual_care_step_1_heading = get_post_meta(get_the_id(), 'invisalign_virtual_care_section_three_step_1_heading', true);
$invisalign_virtual_care_step_1_content = get_post_meta(get_the_id(), 'invisalign_virtual_care_section_three_step_1_copy', true);
$invisalign_virtual_care_step_1_image = get_post_meta(get_the_id(), 'invisalign_virtual_care_section_three_step_1_image', true);
$invisalign_virtual_care_step_2_heading = get_post_meta(get_the_id(), 'invisalign_virtual_care_section_three_step_2_heading', true);
$invisalign_virtual_care_step_2_content = get_post_meta(get_the_id(), 'invisalign_virtual_care_section_three_step_2_copy', true);
$invisalign_virtual_care_step_2_image = get_post_meta(get_the_id(), 'invisalign_virtual_care_section_three_step_2_image', true);
$invisalign_virtual_care_step_3_heading = get_post_meta(get_the_id(), 'invisalign_virtual_care_section_three_step_3_heading', true);
$invisalign_virtual_care_step_3_content = get_post_meta(get_the_id(), 'invisalign_virtual_care_section_three_step_3_copy', true);
$invisalign_virtual_care_step_3_image = get_post_meta(get_the_id(), 'invisalign_virtual_care_section_three_step_3_image', true);
$invisalign_virtual_care_step_4_heading = get_post_meta(get_the_id(), 'invisalign_virtual_care_section_three_step_4_heading', true);
$invisalign_virtual_care_step_4_content = get_post_meta(get_the_id(), 'invisalign_virtual_care_section_three_step_4_copy', true);
$invisalign_virtual_care_step_4_image = get_post_meta(get_the_id(), 'invisalign_virtual_care_section_three_step_4_image', true);
?>

<section class="steps-with-lines dental-monitoring four-steps">
    <div class="content">
        <div class="inner-content">
            <div class="heading">
                <h2 class="h1"><?= $invisalign_virtual_care_heading;?></h2>
            </div>
            <div class="circle-copy step-one">
                <div class="image animate-left mobile">
                    <img src="<?= wp_get_attachment_image_src($invisalign_virtual_care_step_1_image, 'medium_large')[0]; ?>" alt="<?= get_post_meta($invisalign_virtual_care_step_1_image, '_wp_attachment_image_alt'); ?>" class="bg-img">
                </div>
                <div class="circle">
                    <div class="small">Step</div>
                    <div class="large">one</div>
                </div>
                <div class="mobile vertical-pattern"></div>
                <div class="dash-pattern step-one"></div>
                <div class="copy">
                    <h3 class="h3"><?= $invisalign_virtual_care_step_1_heading; ?></h3>
                    <?= apply_filters('the_content', $invisalign_virtual_care_step_1_content); ?>
                </div>
                <div class="image animate-left desktop">
                    <img src="<?= wp_get_attachment_image_src($invisalign_virtual_care_step_1_image, 'medium_large')[0]; ?>" alt="<?= get_post_meta($invisalign_virtual_care_step_1_image, '_wp_attachment_image_alt'); ?>" class="bg-img">
                </div>
            </div>
            <div class="circle-copy step-two flex-end right">
                <div class="dash-pattern step-two"></div>
                <div class="image animate-right desktop">
                    <img src="<?= wp_get_attachment_image_src($invisalign_virtual_care_step_2_image, 'medium_large')[0]; ?>" alt="<?= get_post_meta($invisalign_virtual_care_step_2_image, '_wp_attachment_image_alt'); ?>" class="bg-img">
                </div>
                <div class="copy">
                    <h3 class="h3">Send us selfies of your teeth</h3>
                    <div class="description">
                    <?= apply_filters('the_content', $invisalign_virtual_care_step_2_content); ?>
                    </div>
                </div>
                <div class="mobile vertical-pattern"></div>
                <div class="circle">
                    <div class="small">Step</div>
                    <div class="large">two</div>
                </div>
                <div class="dash-pattern step-two"></div>
                <div class="image animate-right mobile">
                    <img src="<?= wp_get_attachment_image_src($invisalign_virtual_care_step_2_image, 'medium_large')[0]; ?>" alt="<?= get_post_meta($invisalign_virtual_care_step_2_image, '_wp_attachment_image_alt'); ?>" class="bg-img">
                </div>
            </div>
            <div class="circle-copy step-three">
                <div class="image animate-left mobile">
                    <img src="<?= wp_get_attachment_image_src($invisalign_virtual_care_step_3_image, 'medium_large')[0]; ?>" alt="<?= get_post_meta($invisalign_virtual_care_step_3_image, '_wp_attachment_image_alt'); ?>" class="bg-img">
                </div>
                <div class="circle">
                    <div class="small">step</div>
                    <div class="large">three</div>
                </div>
                <div class="mobile vertical-pattern"></div>
                <div class="dash-pattern step-three"></div>
                <div class="copy">
                    <h3 class="h3"><?= $invisalign_virtual_care_step_3_heading; ?></h3>
                    <?= apply_filters('the_content', $invisalign_virtual_care_step_3_content); ?>
                </div>
                <div class="image animate-left desktop">
                    <img src="<?= wp_get_attachment_image_src($invisalign_virtual_care_step_3_image, 'medium_large')[0]; ?>" alt="<?= get_post_meta($invisalign_virtual_care_step_3_image, '_wp_attachment_image_alt'); ?>" class="bg-img">
                </div>
            </div>
            <div class="circle-copy step-four flex-end right">
                <div class="dash-pattern step-four"></div>
                <div class="image animate-right desktop">
                    <img src="<?= wp_get_attachment_image_src($invisalign_virtual_care_step_4_image, 'medium_large')[0]; ?>" alt="<?= get_post_meta(11121, '_wp_attachment_image_alt'); ?>" class="bg-img">
                </div>
                <div class="copy">
                    <h3 class="h3"><?= $invisalign_virtual_care_step_4_heading; ?></h3>
                    <div class="description">
				        <?= apply_filters('the_content', $invisalign_virtual_care_step_4_content); ?>
                    </div>
                </div>
                <div class="mobile vertical-pattern"></div>
                <div class="circle">
                    <div class="small">Step</div>
                    <div class="large">four</div>
                </div>
                <div class="image animate-right mobile">
                    <img src="<?= wp_get_attachment_image_src($invisalign_virtual_care_step_4_image, 'medium_large')[0]; ?>" alt="<?= get_post_meta($invisalign_virtual_care_step_4_image, '_wp_attachment_image_alt'); ?>" class="bg-img">
                </div>
            </div>
        </div>
    </div>
</section>
