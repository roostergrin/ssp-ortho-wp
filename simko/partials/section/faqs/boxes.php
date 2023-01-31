<?
$invisalign_section_ten_heading = get_post_meta(get_the_id(), 'invisalign_section_ten_heading', true);
$invisalign_section_ten_content = get_post_meta(get_the_id(), 'invisalign_section_ten_content', true);
wp_enqueue_script('internal-invisalign-faq-boxes');
?>
<section class="faq-boxes">
    <div class="content">
        <div class="inner-content">
            <div class="intro">
                <h3 class="primary h2"><?= $invisalign_section_ten_heading ?></h3>
                <?= apply_filters("the_content", $invisalign_section_ten_content) ?>
            </div>
            <div class="boxes">
            <? for( $i = 1; $i < 7; $i++) { ?>
                <div class="box">
                    <span class="icon-<?= get_post_meta(get_the_id(), 'invisalign_section_ten_faqs_faq_'. $i .'_icon', true);?>"></span>
                    <h4 class="heading h2"><?= get_post_meta(get_the_id(), 'invisalign_section_ten_faqs_faq_'. $i .'_question', true);?></h4>
                    <a href="#" class="cta text white mobile">Learn more</a>
                    <div class="content">
                    <?
                    $box_content = get_post_meta(get_the_id(), 'invisalign_section_ten_faqs_faq_'. $i .'_answer', true);
                    echo apply_filters('the_content', $box_content);
                    ?>
                    </div>
                    <a href="#" class="cta text white mobile hide">Close</a>
                </div>
                <? } ?>
            </div>
        </div>
    </div>
</section>
