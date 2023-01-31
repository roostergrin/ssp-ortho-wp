<div class="widget clear-aligners <?= !empty($classes) ? implode(' ', $classes) : '' ?>">
    <div class="icon-container">
        <?= get_template_part('images/svgs/inline', 'orthodontic-illustrations_clear-aligners.svg')?>
    </div>
    <? if(!empty($heading)) :?>
    <div class="heading-container">
        <h4><?= $heading ;?></h4>
    </div>
    <? endif ;?>
    <? if(!empty($link)) :?>
        <div class="link-container">
            <a href="<?= $link['href'] ;?>" target="_blank"><?= $link['text'] ;?></a>
        </div>
    <? endif ;?>
</div>