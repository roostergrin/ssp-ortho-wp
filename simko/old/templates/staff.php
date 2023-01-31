<?
# Template Name: Staff
get_header();
partial('section.hero.carousel', [
	'h1' => 'Meet the team dedicated to brighter smiles',
	'content' => '<p>At Kristo Orthodontics, we’re grateful for the opportunity to care for and serve our patients and communities. We’re proud to support a variety of events and organizations that are important to our patients and align with our core values, including:</p>',
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
partial('section.copy.three-fifths', [
	'h2' => 'This is where our team philosophy will be highlighted. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.',
	'h2_classes' => ['primary'],
	'column1' => '<p>Each one of the team members has been hand-picked for their ability to contribute to their patients’ orthodontic process. From the first initial phone call to the final retainer check, the Kristo team works together to produce a successful orthodontic experience. Their teamwork, in conjunction with the most technologically advanced orthodontic treatment available, ensures our patients receive the highest quality orthodontic results!</p><p>Our doctors’ leadership begins with the powerful example of professionalism they set for the team. Their high energy and positive outlook on life is contagious! Each team member is committed to providing clinical excellence in a warm, friendly and fun environment.</p>',
	'column2' => '&nbsp;',
]);
partial('section.providers.carousel');
partial('section.staff');
partial('section.appointments');
get_footer();
