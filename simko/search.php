<?
get_header();
partial('section.search.results');

partial('section.hero.full', [
	'classes' => ['search-page'],
    'content' => [
        'classes' => ['clear-with-gray-mobile'],
        'text' => '<h4>If you’re looking for answers, we can help. Come in for a free consultation today so we can get you started on the path to a beautiful, healthy smile.</h4>',
    ],
	'image' => [
		'src' => get_stylesheet_directory_uri().'/images/placeholder/graphics/search-results-bottom-hero.jpg',
		'srcset' => get_stylesheet_directory_uri().'/images/placeholder/graphics/search-results-bottom-hero.jpg 1x, '.get_stylesheet_directory_uri().'/images/placeholder/graphics/search-results-bottom-hero@2x.jpg 2x',
		'sizes' => '100vw',
		'alt' => '',
		'classes' => ['desktop'],
	],
	'mobile_image' => [
		'src' => get_stylesheet_directory_uri().'/images/placeholder/graphics/search-results-bottom-hero-mobile.jpg',
		'srcset' => get_stylesheet_directory_uri().'/images/placeholder/graphics/search-results-bottom-hero-mobile.jpg 1x, '.get_stylesheet_directory_uri().'/images/placeholder/graphics/search-results-bottom-hero-mobile@2x.jpg 2x',
		'sizes' => '100vw',
		'alt' => '',
		'classes' => ['mobile bg-img'],
	],
]);

get_footer();