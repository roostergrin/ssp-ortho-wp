<div class="widget palatal-expanders <?= !empty($classes) ? implode(' ', $classes) : '' ?>">
    <div class="icon-container">
        <!-- <img src="<?//= get_stylesheet_directory_uri(); ?>/images/svgs/orthodontic-illustrations_palatal-expander.svg" alt="Expanders, separators, and headgear" width="220" height="100" class="traditional-braces"> -->
        <?= get_template_part('images/svgs/inline', 'orthodontic-illustrations_palatal-expander.svg')?>
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
