<?
# Template Name: Brand Home
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
	'heading' => 'Welcome to <br class="desktop" />Kristo Orthdontics',
	'content' => '<p><a href="/free-consultations/" class="cta primary">Free consultation</a></p><p class="cta-text"><a href="#">Learn more about how we’re keeping <br class="desktop" />our patients and staff safe.</a></p>'
]);
partial('section.appointments');
partial('section.copy.with-wide-image', [
	'h2' => 'Welcome to Kristo Orthodontics',
	'h2_classes' => ['h1'],
	'content' => 'When you visit Kristo Orthodontics in Chippewa Falls, you can count on our experienced and friendly team to provide you with the highest-quality, comprehensive orthodontic treatment to meet your individual needs. We’re dedicated to providing exceptional customer service and personalized braces and Invisalign treatments in a fun and family-oriented environment.

	Our practice welcomes new patients of all ages, starting around age 7. We care for many students from local schools including Parkview, Halmstad, Southview, Hillcrest, McDonell, Jim Falls, Stillson, and Cadott.',
	'cta' => [
		'text' => 'About us',
		'href' => '#',
		'classes' => ['cta', 'text'],
	],
	'image' => [
		'src' => 'https://via.placeholder.com/570x420',
		'alt' => '',
		'classes' => [],
		'width' => '570',
		'height' => '420',
	],
]);
partial('section.benefits');
partial('section.providers.carousel');
partial('section.service.categories', [
	'h2' => 'Specialized orthodontic treatments for all ages',
	'h2_classes' => ['h1'],
	'categories' => [
		[
			'href' => '#',
			'name' => 'Children',
			'content' => 'Metus vulputate eu scelerisque felis imperdiet proin fermentum leo vel',
			'cta' => [
				'text' => 'Learn more',
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
			'name' => 'Teens',
			'content' => 'Metus vulputate eu scelerisque felis imperdiet proin fermentum leo vel',
			'cta' => [
				'text' => 'Learn more',
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
			'name' => 'Adults',
			'content' => 'Metus vulputate eu scelerisque felis imperdiet proin fermentum leo vel',
			'cta' => [
				'text' => 'Learn more',
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
partial('section.smile-gallery');
partial('section.testimonial-carousel');
partial('section.copy.full-two-columns', [
	'classes' => ['bg-grey'],
	'h2' => 'We’ve made quality dental care easy for you.',
	'column1' => '<p>Risus pretium quam vulputate dignissim suspendisse in est ante in nibh mauris cursus mattis molestie a iaculis at erat pellentesque adipiscin.commodo elit at imperdiet dui accumsan sit amet nulla facilisi morbi tempus iaculis urna id volutpat lacus laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean et tortor Aat risus viverra adipiscing at in tellus integer feugiat scelerisque varius morbi enim nunc faucibus a pellentesque sit amet porttitor eget dolor morbi non arcu risus quis varius quam quisque id diam vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus interdum posuere lorem ipsum</p><p>Risus pretium quam vulputate dignissim suspendisse in est ante in nibh mauris cursus mattis molestie a iaculis at erat pellentesque adipiscin.commodo elit at imperdiet dui accumsan sit amet nulla facilisi morbi tempus iaculis urna id volutpat lacus laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean et tortor Aat risus viverra adipiscing at in tellus integer feugiat scelerisque varius morbi enim nunc faucibus a pellentesque sit amet porttitor eget dolor morbi non arcu risus quis varius quam quisque id diam vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus interdum posuere lorem ipsum</p>',
	'column2' => '<p>Risus pretium quam vulputate dignissim suspendisse in est ante in nibh mauris cursus mattis molestie a iaculis at erat pellentesque adipiscin.commodo elit at imperdiet dui accumsan sit amet nulla facilisi morbi tempus iaculis urna id volutpat lacus laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean et tortor Aat risus viverra adipiscing at in tellus integer feugiat scelerisque varius morbi enim nunc faucibus a pellentesque sit amet porttitor eget dolor morbi non arcu risus quis varius quam quisque id diam vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus interdum posuere lorem ipsum</p><p>Risus pretium quam vulputate dignissim suspendisse in est ante in nibh mauris cursus mattis molestie a iaculis at erat pellentesque adipiscin.commodo elit at imperdiet dui accumsan sit amet nulla facilisi morbi tempus iaculis urna id volutpat lacus laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean et tortor Aat risus viverra adipiscing at in tellus integer feugiat scelerisque varius morbi enim nunc faucibus a pellentesque sit amet porttitor eget dolor morbi non arcu risus quis varius quam quisque id diam vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus interdum posuere lorem ipsum</p>'
]);
partial('section.appointments');
get_footer();
