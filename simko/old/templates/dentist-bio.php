<?
# Template Name: Dentist Bio
get_header();
partial('section.hero.carousel', [
	'h1' => 'Meet Dr. Jared Holloway',
	'h1_classes' => ['white'],
	'h2' => 'Orthodontist, Husband, Father, Cyclist',
	'h2_classes' => ['white'],
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
	'classes' => ['reverse'],
	'h2' => 'The true value I find in my work as an orthodontist is helping people and patients have positive treatment journeys and outcomes.',
	'h2_classes' => ['primary', 'mb-50'],
	'column1' => '<p>I strive every day to meet the individual needs of my patients, to ensure they have exceptional orthodontic experiences while developing beautiful, healthy smiles that build confidence and improve their lives.</p><p>While in dental school, I learned about the transformative impact that orthodontic therapy has on people’s lives, and I knew that I wanted to be a facilitator of those powerful changes. After my four years of dental school, I completed two additional years of specialized orthodontic training on the safe and healthy movement of teeth and jaws. I continually strive to stay on the leading edge of orthodontic treatment and care to provide my patients with the most advanced options available.</p><p>I’m proud and honored to provide top-quality orthodontic care and specialized orthodontic treatments including braces and Invisalign to people of all ages in Baldwin, New Richmond, Rice Lake, River Falls, and the surrounding communities in the St. Croix Valley.</p>',
	'column2' => '<div class="details"><h3 class="h2">Education</h3><ul class="triangles"><li>Orthodontic Residency, Marquette University, Milwaukee, WI</li><li>Doctorate of Medicine in Dentistry, Midwestern University, Downers Grove, IL</li><li>Bachelor of Science in Molecular Biology, Brigham Young University, Provo, UT</li></ul></div><div class="image-container"><img src="https://placekitten.com/370/370" width="370" height="370" alt="" class="" /></div>',
]);
partial('section.copy.four-cols', [
	'classes' => ['bg-gray'],
	'columns' => [
		'<h2>Professional associations</h2><p>Through my professional affiliations, I’m able to connect and collaborate with fellow orthodontists and dentists to allow for continued growth and sharing of knowledge, ensure we all provide quality care to the patients we serve. I’m proud to be a professional member of the following associations:</p>',
		'<img src="https://placekitten.com/210/73" width="210" height="73" alt="" />',
		'<img src="https://placekitten.com/189/130" width="189" height="130" alt="" />',
		'<img src="https://placekitten.com/230/160" width="230" height="160" alt="" />'
	]
]);
partial('section.copy.three-fifths', [
	'classes' => [],
	'h2' => 'Originally from Utah, growing up I celebrated the summers watching rodeos and the winters snowshoeing the slopes.',
	'h2_classes' => ['primary'],
	'column1' => '<p>My wife Alex and I met in college during a study abroad in Cambridge, England. We have two boys, Bruce and Will, and a large poodle named Hercules. Our family loves going on nature walks and visiting the beach, and you may see me cycling on my road bike around the St. Croix Valley. We enjoy being active in both our local community and church.</p>',
	'column2' => '<img src="https://via.placeholder.com/390x400" width="390" height="400" alt="" />',
]);
partial('section.copy.full', [
	'classes' => ['schedule'],
	'h2' => 'Schedule your free consultation with Dr. Jared Holloway in Baldwin!',
	'h2_classes' => ['h1', 'primary'],
	'content' => '<p>Your consultation will include a free orthodontic exam with photos, X-ray images, and customized information on treatment plans that include virtual dental monitoring technology.</p><div class="contact"><a href="tel:+17156845858" class="cta text">Call 715-684-5858</a><a href="/free-consultations/" class="cta text">Book online</a></div>',
]);
get_footer();
