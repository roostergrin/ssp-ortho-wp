<section class="two-cols-with-image-popup-content<?= !empty($classes) ? ' ' . implode(' ', $classes) : '';?>">
    <div class="content">
        <div class="inner-content">
            <article>
                <?php if(!empty($article['heading'])): ?>
                <div class="heading desktop">
                    <h1 class="h2 primary"><?= $article['heading']; ?></h1>
                </div>
                <?php endif; ?>
                <?php if(!empty($article['copy'])): ?>
                    <?= apply_filters('the_content', $article['copy']); ?>
                <?php endif; ?>
                <? if(!empty($overlap_box)): ?>
                    <? if (!empty($overlap_box['mobile_copy'])) : ?>
                        <?= apply_filters('the_content', $overlap_box['mobile_copy']); ?>
                    <? endif; ?>
                <? endif; ?>
                <? if (!empty($overlay_content)) : ?>
                        <div class="mobile">
                            <?= apply_filters('the_content', $overlay_content); ?>
                        </div>
                        <? endif; ?>
            </article>
            <aside>
                <div class="heading mobile">
                    <h2><?= $article['heading']; ?></h2>
                </div>
                <div class="img-container desktop">
                    <? if (!empty($image)) : ?>
                        <img<?= !empty($image['style_desktop']) ? ' style="'.$image['style_desktop'].'"' : ''; ?><?= !empty($image['src']) ? ' src="'.($image['src']).'"' : ''; ?><?= !empty($image['width']) ? ' width="'.$image['width'].'"' : ''; ?><?= !empty($image['height']) ? ' height="'.$image['height'].'"' : ''; ?><?= !empty($image['srcset']) ? ' srcset="'.$image['srcset'].'"' : ''; ?><?= !empty($image['sizes']) ? ' sizes="'.$image['sizes'].'"' : ''; ?><?= !empty($image['alt']) ? ' alt="'.$image['alt'].'"' : ''; ?><?= !empty($image['classes']) ? ' class="'.str_replace('bg-img ', '', implode(' ', $image['classes'])).'"' : ''; ?> />
                    <? endif; ?>
                </div>
                <div class="img-container mobile">
                    <? if (!empty($mobile_image)) : ?>
                        <img<?= !empty($image['style_mobile']) ? ' style="'.$image['style_mobile'].'"' : ''; ?><?= !empty($mobile_image['src']) ? ' src="'.($mobile_image['src']).'"' : ''; ?><?= !empty($mobile_image['width']) ? ' width="'.$mobile_image['width'].'"' : ''; ?><?= !empty($mobile_image['height']) ? ' height="'.$mobile_image['height'].'"' : ''; ?><?= !empty($mobile_image['srcset']) ? ' srcset="'.$mobile_image['srcset'].'"' : ''; ?><?= !empty($mobile_image['sizes']) ? ' sizes="'.$mobile_image['sizes'].'"' : ''; ?><?= !empty($mobile_image['alt']) ? ' alt="'.$mobile_image['alt'].'"' : ''; ?><?= !empty($mobile_image['classes']) ? ' class="'.str_replace('bg-img ', '', implode(' ', $mobile_image['classes'])).'"' : ''; ?> />
                    <? endif; ?>
                </div>
                <? if(!empty($overlay_heading) || !empty($overlay_content)): ?>
                <div class="img-overlay-copy">
                    <div class="container">
                        <? if (!empty($overlay_heading)) : ?>
                            <h3><?= $overlay_heading; ?></h3>
                        <? endif; ?>
                        <? if (!empty($overlay_content)) : ?>
                        <div class="desktop">
                            <?= apply_filters('the_content', $overlay_content); ?>
                        </div>
                        <? endif; ?>
                    </div>
                </div>
                <? endif; ?>
            </aside>
        </div>
    </div>
</section>
