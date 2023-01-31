<?php
wp_enqueue_style('lib-owl-carousel');
wp_enqueue_script('internal-icons-carousel');
?>

<section class="copy two-cols-with-image-and-icons-carousel <?= !empty($section_classes) ? ' ' . implode(' ', $section_classes) : ''; ?>">
    <div class="content<?= !empty($content_classes) ? ' ' . implode(' ', $content_classes) : ''; ?>">
        <div class="inner-content">
            <div class="container <?= !empty($container_classes) ? implode(' ', $container_classes) : '' ?>">
                <article class="copy">
                    <?= apply_filters('the_content', implode("\n\n", $article)); ?>
                    <? if (!empty($carousel)) : ?>
						<div class="two-cols owl-carousel mobile">
							<? foreach ($carousel as $icon) : ?>
								<? partial('widget.folding-icons', ['icon' => $icon]); ?>
							<? endforeach; ?>
						</div>
						<div class="desktop icon-wrapper">
							<? foreach ($carousel as $icon) : ?>
								<? partial('widget.folding-icons', ['icon' => $icon]); ?>
							<? endforeach; ?>
						</div>
					<? endif; ?>
                </article>
                <aside>
                    <div class="aside-container">
                        <div class="top-img-container">
                            <? if (!empty($aside['image'])) : ?>
                                <img<?= !empty($aside['image']['src']) ? ' src="' . $aside['image']['src'] . '"' : ''; ?><?= !empty($aside['image']['width']) ? ' width="' . $aside['image']['width'] . '"' : ''; ?><?= !empty($aside['image']['height']) ? ' height="' . $aside['image']['height'] . '"' : ''; ?><?= !empty($aside['image']['srcset']) ? ' srcset="' . $aside['image']['srcset'] . '"' : ''; ?><?= !empty($aside['image']['sizes']) ? ' sizes="' . $aside['image']['sizes'] . '"' : ''; ?><?= !empty($aside['image']['alt']) ? ' alt="' . $aside['image']['alt'] . '"' : ''; ?><?= !empty($aside['image']['classes']) ? ' class="' . implode(' ', $aside['image']['classes']) . '"' : ''; ?> />
                            <? endif; ?>
                        </div>
                        <div class="content">
                            <?= !empty($aside['heading']) ? $aside['heading'] : '' ?>
                            <?= !empty($aside['content']) ? $aside['content'] : '' ?>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>