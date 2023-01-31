<?
# Template Name: Dentist Referral
$brand = is_brand();
$orthodontic_referral_hero_heading = get_post_meta(get_the_id(), 'orthodontic_referral_hero_heading', true);
$orthodontic_referral_hero_content = get_post_meta(get_the_id(), 'orthodontic_referral_hero_content', true);
$orthodontic_referral_hero_desktop_image = get_post_meta(get_the_id(), 'orthodontic_referral_hero_desktop_image', true);
$orthodontic_referral_hero_mobile_image = get_post_meta(get_the_id(), 'orthodontic_referral_hero_mobile_image', true);

get_header();
partial('section.form', [
	'form' => 'orthodontic-referral',
	'classes' => [sanitize_title($brand->post_title)],
	'content' => '<h1>'. $orthodontic_referral_hero_heading .'</h1>' .
				  apply_filters('the_content', $orthodontic_referral_hero_content)
				  . '<div class="img-wrapper-left">
				    <img src="'. wp_get_attachment_image_src($orthodontic_referral_hero_desktop_image, 'large')[0] .'" alt="'. get_post_meta($orthodontic_referral_hero_desktop_image, '_wp_attachment_image_alt', true).'" class="border-radius-right" />
				  </div>',
]);
get_footer();
