<?
    $invisalign_section_seven_heading = get_post_meta(get_the_id(), 'invisalign_section_seven_heading', true);
    $invisalign_section_seven_step_1_heading = get_post_meta(get_the_id(), 'invisalign_section_seven_step_1_heading', true);
    $invisalign_section_seven_step_1_content = get_post_meta(get_the_id(), 'invisalign_section_seven_step_1_content', true);
    $invisalign_section_seven_step_1_icons_icon_1_icon = get_post_meta(get_the_id(), 'invisalign_section_seven_step_1_icons_icon_1_icon', true);
    $invisalign_section_seven_step_1_icons_icon_1_text = get_post_meta(get_the_id(), 'invisalign_section_seven_step_1_icons_icon_1_text', true);
    $invisalign_section_seven_step_1_icons_icon_2_icon = get_post_meta(get_the_id(), 'invisalign_section_seven_step_1_icons_icon_2_icon', true);
    $invisalign_section_seven_step_1_icons_icon_2_text = get_post_meta(get_the_id(), 'invisalign_section_seven_step_1_icons_icon_2_text', true);
    $invisalign_section_seven_step_1_icons_icon_3_icon = get_post_meta(get_the_id(), 'invisalign_section_seven_step_1_icons_icon_3_icon', true);
    $invisalign_section_seven_step_1_icons_icon_3_text = get_post_meta(get_the_id(), 'invisalign_section_seven_step_1_icons_icon_3_text', true);
    $invisalign_section_seven_step_2_heading = get_post_meta(get_the_id(), 'invisalign_section_seven_step_2_heading', true);
    $invisalign_section_seven_step_2_content = get_post_meta(get_the_id(), 'invisalign_section_seven_step_2_content', true);
    $invisalign_section_seven_step_2_icon = get_post_meta(get_the_id(), 'invisalign_section_seven_step_2_icon', true);

    $invisalign_toggle = get_post_meta(get_the_id(), 'invisalign_section_seven_step_2_point_five_toggle', true);
    $toggle_class = !empty($invisalign_toggle) ? 'show-two-point-five' : '';

    $invisalign_section_seven_step_2_point_five_heading = get_post_meta(get_the_id(), 'invisalign_section_seven_step_2_point_five_heading', true);
    $invisalign_section_seven_step_2_point_five_content = get_post_meta(get_the_id(), 'invisalign_section_seven_step_2_point_five_content', true);
    $invisalign_section_seven_step_2_point_five_icon = get_post_meta(get_the_id(), 'invisalign_section_seven_step_2_point_five_icon', true);
    $invisalign_section_seven_step_3_heading = get_post_meta(get_the_id(), 'invisalign_section_seven_step_3_heading', true);
    $invisalign_section_seven_step_3_content = get_post_meta(get_the_id(), 'invisalign_section_seven_step_3_content', true);
?>
<section class="steps-with-lines<?= !empty($classes) ? ' ' . implode(' ', $classes) : '';?><?= !empty($toggle_class) ? ' ' . $toggle_class : ''?>">
	<div class="content">
        <div class="inner-content">
            <div class="heading">
                <h2 class="h1"><?= $invisalign_section_seven_heading ?></h2>
            </div>

            <div class="circle-copy">
                <div class="circle">
                    <div class="small">Step</div>
                    <div class="large">one</div>
                </div>
                <div class="mobile vertical-pattern"></div>
                <div class="dash-pattern step-one"></div>
                <div class="copy">
                    <h3><?= $invisalign_section_seven_step_1_heading ?></h3>
                    <?= apply_filters('the_content', $invisalign_section_seven_step_1_content) ?>
                </div>
            </div>
            <div class="icons">
                <div class="dash-pattern"></div>
                <?php partial('widget.icons.'. $invisalign_section_seven_step_1_icons_icon_1_icon,['title' => $invisalign_section_seven_step_1_icons_icon_1_text]) ?>
                <?php partial('widget.icons.'. $invisalign_section_seven_step_1_icons_icon_2_icon,['title' => $invisalign_section_seven_step_1_icons_icon_2_text]) ?>
                <?php partial('widget.icons.'. $invisalign_section_seven_step_1_icons_icon_3_icon,['title' => $invisalign_section_seven_step_1_icons_icon_3_text]) ?>
            </div>

            <div class="circle-copy flex-end right">
                <?php partial('widget.icons.' . $invisalign_section_seven_step_2_icon,['classes'=> ['big']]) ?>
                <div class="copy">
                    <h3><?= $invisalign_section_seven_step_2_heading ?></h3>
                    <div class="description">
                    <?= apply_filters('the_content', $invisalign_section_seven_step_2_content) ?>
                    </div>
                </div>
                <div class="mobile vertical-pattern"></div>
                <div class="circle">
                    <div class="small">Step</div>
                    <div class="large">two</div>
                </div>
                <div class="dash-pattern step-two"></div>
            </div>
            <? if(!empty( $invisalign_toggle ) && $invisalign_toggle) :?>
            <div class="step-two-point-five">
                <div class="main-container bg-gray-2">
                    <div class="img-container"><i class="icon-<?=  !empty($invisalign_section_seven_step_2_point_five_icon) ? $invisalign_section_seven_step_2_point_five_icon : '';?>"></i></div>
                    <div class="content-container">
                        <? if(!empty($invisalign_section_seven_step_2_point_five_heading)) :?>
                    <h3><?= $invisalign_section_seven_step_2_point_five_heading; ?></h3>
                    <? endif; ?>
                    <?= !empty($invisalign_section_seven_step_2_point_five_content) ? apply_filters('the_content', $invisalign_section_seven_step_2_point_five_content) : '';?>
                    </div>
                </div>
                <div class="dash"></div>
            </div>
            <? endif; ?>
            <div class="circle-copy">
                <div class="circle">
                    <div class="small">step</div>
                    <div class="large">three</div>
                </div>
                <div class="mobile vertical-pattern"></div>
                <!-- <div class="dash-pattern step-three"></div> -->
                <div class="copy">
                    <h3><?= $invisalign_section_seven_step_3_heading ?></h3>
                    <?= apply_filters('the_content', $invisalign_section_seven_step_3_content) ?>
                </div>
            </div>
        </div>

	</div>
</section>
