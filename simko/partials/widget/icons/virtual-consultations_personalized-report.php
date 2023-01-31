<div class="widget-container">
    <div class="img-container"><i class="icon-virtual-consultations_personalized-report"></i></div>
    <? if( !empty($content)) : ?>
        <?= apply_filters('the_content', $content); ?>
    <? endif; ?>
</div>