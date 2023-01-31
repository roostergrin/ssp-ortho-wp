<?
$virtual_monitoring_section_five_heading = get_post_meta(get_the_id(), 'virtual_monitoring_section_five_heading', true);
$virtual_monitoring_section_five_step_1_heading = get_post_meta(get_the_id(), 'virtual_monitoring_section_five_step_1_heading', true);
$virtual_monitoring_section_five_step_1_content = get_post_meta(get_the_id(), 'virtual_monitoring_section_five_step_1_content', true);
$virtual_monitoring_section_five_step_1_image = get_post_meta(get_the_id(), 'virtual_monitoring_section_five_step_1_image', true);
$virtual_monitoring_section_five_step_2_heading = get_post_meta(get_the_id(), 'virtual_monitoring_section_five_step_2_heading', true);
$virtual_monitoring_section_five_step_2_content = get_post_meta(get_the_id(), 'virtual_monitoring_section_five_step_2_content', true);
$virtual_monitoring_section_five_step_2_image = get_post_meta(get_the_id(), 'virtual_monitoring_section_five_step_2_image', true);
$virtual_monitoring_section_five_step_3_heading = get_post_meta(get_the_id(), 'virtual_monitoring_section_five_step_3_heading', true);
$virtual_monitoring_section_five_step_3_content = get_post_meta(get_the_id(), 'virtual_monitoring_section_five_step_3_content', true);
$virtual_monitoring_section_five_step_3_image = get_post_meta(get_the_id(), 'virtual_monitoring_section_five_step_3_image', true);
?>

<section class="steps-with-lines dental-monitoring">
    <div class="content">
        <div class="inner-content">
            <div class="heading">
                <h2 class="h1"><?= $virtual_monitoring_section_five_heading; ?></h2>
            </div>
            <div class="circle-copy step-one">
                <div class="image animate-left mobile">
                    <img src="<?= wp_get_attachment_image_src($virtual_monitoring_section_five_step_1_image, 'medium_large')[0]; ?>" alt="<?= get_post_meta($virtual_monitoring_section_five_step_1_image, '_wp_attachment_image_alt'); ?>" class="bg-img">
                </div>
                <div class="circle">
                    <div class="small">Step</div>
                    <div class="large">one</div>
                </div>
                <div class="mobile vertical-pattern"></div>
                <div class="dash-pattern step-one"></div>
                <div class="copy">
                    <h3 class="h3"><?= $virtual_monitoring_section_five_step_1_heading; ?></h3>
                    <?= apply_filters('the_content', $virtual_monitoring_section_five_step_1_content); ?>
                </div>
                <div class="image animate-left desktop">
                    <img src="<?= wp_get_attachment_image_src($virtual_monitoring_section_five_step_1_image, 'medium_large')[0]; ?>" alt="<?= get_post_meta($virtual_monitoring_section_five_step_1_image, '_wp_attachment_image_alt'); ?>" class="bg-img">
                </div>
            </div>
            <div class="circle-copy step-two flex-end right">
                <div class="dash-pattern step-two"></div>
                <div class="image animate-right desktop">
                    <img src="<?= wp_get_attachment_image_src($virtual_monitoring_section_five_step_2_image, 'medium_large')[0]; ?>" alt="<?= get_post_meta($virtual_monitoring_section_five_step_1_image, '_wp_attachment_image_alt'); ?>" class="bg-img">
                </div>
                <div class="copy">
                    <h3 class="h3"><?= $virtual_monitoring_section_five_step_2_heading; ?></h3>
                    <div class="description">
                    <?= apply_filters('the_content', $virtual_monitoring_section_five_step_2_content); ?>
                    </div>
                </div>
                <div class="mobile vertical-pattern"></div>
                <div class="circle">
                    <div class="small">Step</div>
                    <div class="large">two</div>
                </div>
                <div class="dash-pattern step-two"></div>
                <div class="image animate-right mobile">
                    <img src="<?= wp_get_attachment_image_src($virtual_monitoring_section_five_step_2_image, 'medium_large')[0]; ?>" alt="<?= get_post_meta($virtual_monitoring_section_five_step_1_image, '_wp_attachment_image_alt'); ?>" class="bg-img">
                </div>
            </div>
            <div class="circle-copy step-three">
                <div class="image animate-left mobile">
                    <img src="<?= wp_get_attachment_image_src($virtual_monitoring_section_five_step_3_image, 'medium_large')[0]; ?>" alt="<?= get_post_meta($virtual_monitoring_section_five_step_1_image, '_wp_attachment_image_alt'); ?>" class="bg-img">
                </div>
                <div class="circle">
                    <div class="small">step</div>
                    <div class="large">three</div>
                </div>
                <div class="mobile vertical-pattern"></div>
                <div class="dash-pattern step-three"></div>
                <div class="copy">
                    <h3 class="h3"><?= $virtual_monitoring_section_five_step_3_heading; ?></h3>
                    <?= apply_filters('the_content', $virtual_monitoring_section_five_step_3_content); ?>
                </div>
                <div class="image animate-left desktop">
                    <img src="<?= wp_get_attachment_image_src($virtual_monitoring_section_five_step_3_image, 'medium_large')[0]; ?>" alt="<?= get_post_meta($virtual_monitoring_section_five_step_1_image, '_wp_attachment_image_alt'); ?>" class="bg-img">
                </div>
            </div>
        </div>
    </div>
</section>
