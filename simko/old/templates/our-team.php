<?
# Template Name: Our Team
get_header();
partial('section.hero.with-image', [
	'image' => [
		'src' => 'https://via.placeholder.com/1410x590',
		'width' => '1410',
		'height' => '590',
		'alt' => '',
		'classes' => [
			'bg-img',
			'bg-img-top-center'
		],
	],
	'heading' => 'Meet the Chippewa Falls team',
]);
partial('section.copy.full', [
	'classes' => [],
	'h3' => 'Together, we set everything straight',
	'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>',
]);
partial('section.service.categories', [
	'categories' => [
		[
			'href' => '#',
			'name' => 'Dr. Steven Kristo',
			'content' => 'Orthodontic & Invisalign<sup>®</sup> specialist',
			'cta' => [
				'text' => 'View bio',
				'href' => '#',
				'classes' => ['cta', 'text', 'white'],
			],
			'image' => [
				'src' => 'https://placekitten.com/370/370',
				'alt' => '',
				'classes' => ['bg-img'],
				'width' => '370',
				'height' => '370',
			],
		],
		[
			'href' => '#',
			'name' => 'Dr. Bob Bronski',
			'content' => 'Orthodontic & Invisalign<sup>®</sup> specialist',
			'cta' => [
				'text' => 'View bio',
				'href' => '#',
				'classes' => ['cta', 'text', 'white'],
			],
			'image' => [
				'src' => 'https://placebear.com/370/370',
				'alt' => '',
				'classes' => ['bg-img'],
				'width' => '370',
				'height' => '370',
			],
		],
		[
			'href' => '#',
			'name' => 'Our team',
			'content' => 'Get to know our highly knowledgable staff',
			'cta' => [
				'text' => 'Meet the team',
				'href' => '#',
				'classes' => ['cta', 'text', 'white'],
			],
			'image' => [
				'src' => 'https://baconmockup.com/370/370',
				'alt' => '',
				'classes' => ['bg-img'],
				'width' => '370',
				'height' => '370',
			],
		]
	],
]);
partial('section.hero.carousel', [
	'h2' => 'Our dedicated team at work',
	'h2_classes' => ['h1 white'],
	'content' => '<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>',
	'images' => [
		[
			'src' => 'https://placekitten.com/705/590',
			'width' => '705',
			'height' => '590',
			'alt' => '',
			'classes' => [],
		],
		[
			'src' => 'https://placebear.com/705/590',
			'width' => '705',
			'height' => '590',
			'alt' => '',
			'classes' => [],
		],
		[
			'src' => 'https://BaconMockup.com/705/590',
			'width' => '705',
			'height' => '590',
			'alt' => '',
			'classes' => [],
		],
		[
			'src' => 'https://placekitten.com/705/590',
			'width' => '705',
			'height' => '590',
			'alt' => '',
			'classes' => [],
		],
		[
			'src' => 'https://placebear.com/705/590',
			'width' => '705',
			'height' => '590',
			'alt' => '',
			'classes' => [],
		],
	],
]);
partial('section.copy.with-wide-image', [
	'h2' => 'Feel better about your smile',
	'h2_classes' => ['h1'],
	'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>',
	'image' => [
		'src' => 'https://via.placeholder.com/570x420',
		'alt' => '',
		'classes' => [],
		'width' => '570',
		'height' => '420',
	],
]);
partial('section.copy.full', [
	'classes' => ['schedule'],
	'h2' => 'Schedule your free consultation today!',
	'h2_classes' => ['h1', 'primary'],
	'content' => '<p>Your consultation will include a free orthodontic exam with photos, X-ray images, and customized information on treatment plans that include virtual dental monitoring technology.</p><div class="contact"><a href="tel:+17158355182" class="cta text">Call 715-835-5182</a><a href="/free-consultations/" class="cta text">Book online</a></div>',
]);
get_footer();
