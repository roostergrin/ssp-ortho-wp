<?
# Template Name: Reviews
get_header();
partial('section.hero.with-image', [
	'image' => [
		'src' => 'https://via.placeholder.com/1410x590',
		'alt' => '',
		'classes' => [
			'bg-img',
			'bg-img-top-center'
		],
	],
	'content_classes' => [
		'short'
	],
	'heading' => 'Something to smile about',
	'content' => apply_filters('the_content', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem'),
]);
partial('section.testimonials.list');
partial('section.appointments');
get_footer();
