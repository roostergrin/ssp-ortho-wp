<? 
$brand = is_brand();

if( !isset($_SESSION['interstitial-closed']) ) : ?>
<section id="interstitial" class="interstitial-banner"> 
    <div class="content">
        <div class="inner-content">
            <? $has_cta = get_post_meta($brand->ID, 'brand_interstitial_banner_learn_more_btn', true); ?>
            <div class="<?= ($has_cta ? 'almost-full-width' : 'full-width'); ?>">
                <? if( !empty( get_post_meta($brand->ID, 'brand_interstitial_banner_heading', true) )): ?>
                <p class="h1"><?= get_post_meta($brand->ID, 'brand_interstitial_banner_heading', true); ?></p>
                <? endif ?>            
                
                <? if( !empty( get_post_meta($brand->ID, 'brand_interstitial_banner_body', true) )): ?>
                <p><?= get_post_meta($brand->ID, 'brand_interstitial_banner_body', true); ?></p>
                <? endif; ?>
            </div>
            
            <? if(get_post_meta($brand->ID, 'brand_interstitial_banner_learn_more_btn', true)) :  ?>
                <a href="<?= get_post_meta($brand->ID, 'brand_interstitial_banner_link_url', true) ?>">Learn more</a>
            <? endif ?>
        </div>
    </div>
    
    <span class="close-icon">&times;</span>
</section>
<? endif; ?>