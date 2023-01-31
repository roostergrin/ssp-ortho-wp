<?
global $platform_entity;
# Template Name: Dental Monitoring
get_header();
partial('section.hero.with-image', [
	'image' => [
		'src' => 'https://via.placeholder.com/1410x590',
		'alt' => '',
		'classes' => [
			'bg-img',
			'bg-img-top-center'
		],
	]
]);
partial('section.copy.with-wide-image', [
	'h1' => 'Virtual orthodontic monitoring',
	'content' => 'The innovative team at Kristo Orthodontics is always on the leading edge of technology when it benefits our patients’ experience and quality of care.

	As a truly patient-centered practice, we utilize advanced virtual monitoring technology to make orthodontic treatment more predictable and convenient than ever before!

	Using the revolutionary dental monitoring technology and a mobile app on your phone, your doctor will monitor your orthodontic treatment progress virtually between in-office appointments to ensure tooth movement is perfectly controlled and treatment progress is just as prescribed!

	Better communication with your orthodontic team equals faster treatment results!',

	'image' => [
		'src' => 'https://via.placeholder.com/570x420',
		'alt' => '',
		'classes' => [],
		'width' => '570',
		'height' => '420',
	],
]);
partial('section.cards', [
	'classes' => ['four-columns'],
	'cards' => [
		[
			'classes' => ['bg-gray-2'],
			'icon' => 'icon-open',
			'title' => 'Remote Care',
			'content' => '<p>You’ll receive the highest quality of care by connecting with your doctor and orthodontic team more frequently about your treatment.</p>'
		],
		[
			'classes' => ['bg-gray-2'],
			'icon' => 'icon-open',
			'title' => 'Updates',
			'content' => '<p>Receive weekly feedback on your treatment progress right on your mobile device. If an issue is detected, you’ll be alerted and provided with timely instructions on next steps.</p>'
		],
		[
			'classes' => ['bg-gray-2'],
			'icon' => 'icon-financing',
			'title' => 'Control',
			'content' => '<p>Gain greater control over your treatment to ensure that you are perfectly on track to achieve your healthy, confident, beautiful smile just as prescribed.</p>'
		],
		[
			'classes' => ['bg-gray-2'],
			'icon' => 'icon-exam',
			'title' => 'Optimized treatment',
			'content' => '<p>Optimized treatment progressions often lead to fewer in-office visits and shorter overall treatment time. Enjoy less time out of school and away from work, and more time enjoying your favorite activities!</p>'
		]
	],
]);
partial('section.copy.three-cols', [
	'classes' => ['bg-gray'],
	'images' => [
		[
			'src' => 'https://placekitten.com/370/400',
			'alt' => '',
			'classes' => [],
			'width' => '370',
			'height' => '400',
		],
		[
			'src' => 'https://placebear.com/370/400',
			'alt' => '',
			'classes' => [],
			'width' => '370',
			'height' => '400',
		],
		[
			'src' => 'https://BaconMockup.com/370/400',
			'alt' => '',
			'classes' => [],
			'width' => '370',
			'height' => '400',
		]
	],
	'h2' => 'Just three easy steps to a straighter, healthier smile',
	'columns' => [
		[
			'h3' => 'One',
			'sub-heading' => 'Send us selfies of your teeth',
			'content' => 'When prescribed for your treatment, from the comfort of your home on a set schedule (typically weekly), use your smartphone, a ScanBox, and the secure Dental Monitoring App to connect with your doctor and the Kristo Orthodontics team. In about two minutes time, you’ll easily send us “selfies” of your teeth sharing the position and alignment of your teeth with your orthodontic team.'
		],
		[
			'h3' => 'Two',
			'sub-heading' => 'Your doctor reviews your progress',
			'content' => 'Using advanced technology and their orthodontic expertise, your doctor and orthodontic team use your scanned photos to monitor your precise tooth movement, brushing, elastic wear, and more to closely guide every stage of your orthodontic journey to a perfectly straight, beautiful smile.'
		],
		[
			'h3' => 'Three',
			'sub-heading' => 'Receive feedback on next steps',
			'content' => 'You’ll have more control over your treatment when you receive timely feedback on your progress, treatment updates, and advice right on your mobile phone. By ensuring that you are doing everything possible to keep your treatment on track, the frequency of in-office visits and the overall treatment time often decreases! Plus, in the mobile app you’ll see how your smile is changing every time you take a new scan…how cool is that?'
		]


	],
]);
partial('section.copy.full', [
	'h2' => 'Schedule your free consultation today!',
	'h2_classes' => ['primary'],
	'content' => '<p>Your consultation will include a free orthodontic exam with photos, X-ray images, and customized information on treatment plans that include virtual dental monitoring technology.</p><div class="contact"><a href="tel:+17158355182" class="cta text">Call 715-835-5182</a><a href="'. $platform_entity->get_url('free-consultations/" class="cta text') . '">Book online</a></div>'
]);
get_footer();
