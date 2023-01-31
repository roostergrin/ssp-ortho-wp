<?
# Template Name: Smile Gallery Landing Page
global $reviews;

get_header('simple');
partial('section.smile-gallery-page', [
	'h1' => get_post_meta(get_the_ID(), 'smilegallery_section_one_heading', true),
	'classes' => ['no-padding'],
	'h1_classes' => ['primary'],
	'is_landing_page' => true,
	'content' => '<p class="lp-copy">'.(get_post_meta(get_the_ID(), 'smilegallery_section_one_content', true)).'</p>',
]);
$testimonials = array_filter($reviews->reviews, function($review) {
	$relationships = unserialize($review->relationships);
	return is_array($relationships) ? in_array(get_the_ID(), $relationships) : get_the_ID() == $relationships;
});
partial('section.testimonials.carousel', [
	'noctabox' => true,
	'htag' => 'h2',
	'heading_classes' => ['h3', 'primary'],
	'heading' => get_post_meta(get_the_ID(), 'smilegallery_section_two_heading', true),
	'reviews_left_border' => $testimonials,
]);
get_footer('simple');
