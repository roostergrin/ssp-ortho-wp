<?php
global $brands;
$brand = is_brand();
$brand_colors = 'brand-palette-' . sanitize_title( $brands->brand_color_options[$brand->colors] );
?>

<section class="confidence-count-module<?= !empty($classes) ? ' ' . implode(' ', $classes) : '';?>">
    <div class="content">
        <div class="inner-content">
            <article>
                <h2 class="h3 white">Calling all kids ages 6 and up</h2>

                <? if( is_page('free-orthodontic-consultation') ): ?>
                <p class="copy white">A healthy, confident smile starts with joining the Confidence Counts Club at <?= do_shortcode( '[BRAND_TITLE]' ); ?>! Designed for children ages six and up, our kids club is FREE to join and comes with lots of great perks including FREE annual orthodontic exams with a doctor, plus access to super fun activities, events, and educational tools!</p>    
                <?= do_shortcode( '[confidence_counts_club_link text="Learn more" class="cta text white" title="Learn more" target="_self"]' ); ?>
                <? else: ?>
                <p class="copy white">A healthy, confident smile starts with joining the Confidence Counts Club at <?= do_shortcode( '[BRAND_TITLE]' ); ?>! Designed for children ages six and up, our kids club is FREE to join and comes with lots of great perks including FREE annual orthodontic exams with a doctor, plus access to super fun activities, events, and educational tools. Schedule your child’s orthodontic evaluation to join today!</p>
                <?= do_shortcode( '[free_orthodontic_consultation_link text="Book online" class="cta text white" title="Book online" target="_self"]' ); ?>
                <? endif; ?>                                
            </article>
            <aside>
                <? if($brand_colors == 'brand-palette-default-blue'): ?>
                <img src="<?= get_stylesheet_directory_uri(); ?>/images/placeholder/graphics/confidence-counts-club/sim-ccc-module-confetti-logo-kristo.svg" alt="Confidence Counts logo">
                <? endif; ?>

                <? if($brand_colors == 'brand-palette-prairie-grove'): ?>
                <img src="<?= get_stylesheet_directory_uri(); ?>/images/placeholder/graphics/confidence-counts-club/sim-ccc-module-confetti-logo-prairie.svg" alt="Confidence Counts logo">
                <? endif; ?>

                <? if($brand_colors == 'brand-palette-dietmeier'): ?>
                <img src="<?= get_stylesheet_directory_uri(); ?>/images/placeholder/graphics/confidence-counts-club/sim-ccc-module-confetti-logo-dtm.svg" alt="Confidence Counts logo">
                <? endif; ?>
            </aside>
        </div>
    </div>
</section>