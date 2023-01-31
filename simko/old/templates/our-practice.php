<?
# Template Name: Our Practice
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
	'heading' => 'Our approach to orthodontics is what sets us apart',
]);
partial('section.copy.full-two-columns', [
	'column1' => '<p>At Kristo Orthodontics, we create amazing smiles, one person at a time. Our Doctors have more than 100 years of combined experience in orthodontics, and they understand the importance of having a healthy, beautiful, and confident smile.</p><p>Our Orthodontists will spend time with you, starting at your complimentary consultation, to learn about your goals and lifestyle. Then, using that information and the results of their clinical findings, they’ll create a treatment plan that’s right for your unique situation.</p>',
	'column2' => '<p>At Kristo Orthodontics, we create amazing smiles, one person at a time. Our Doctors have more than 100 years of combined experience in orthodontics, and they understand the importance of having a healthy, beautiful, and confident smile.</p><p>Our Orthodontists will spend time with you, starting at your complimentary consultation, to learn about your goals and lifestyle. Then, using that information and the results of their clinical findings, they’ll create a treatment plan that’s right for your unique situation.</p>'
]);
partial('section.our-promise');
partial('section.copy.with-image', [
	'heading' => 'Our commitment to service',
	'heading_classes' => ['h1'],
	'content' => '<p>Kristo Orthodontics has been serving Wisconsin communities for many years. We’re known for our gentle approach to orthodontic care, and our commitment to ensuring that every patient has a great orthodontic experience.</p><p>We offer flexible payment options, and we’ll work with you to find a payment plan that fits with your budget. We also have numerous satellite office locations, which make it easy for you to come in for your regular visit. And we offer early morning appointment hours during the summer, too.</p><p>We’re pleased to offer patient reward opportunities, where you earn can earn prizes for fun activities and success throughout treatment. Patient giveaways, including Packers and Badgers tickets, are very popular!</p><p>Contact us to schedule a FREE consultation at one of our orthodontic offices in Black River Falls, Bloomer, Chippewa Falls, Eau Claire, Menomonie, Rice Lake, Stanley, Amery, Baldwin, or New Richmond.</p>',
	'image' => [
		'src' => 'https://via.placeholder.com/585x560',
		'alt' => '',
		'classes' => [],
		'width' => '585',
		'height' => '560',
	],
]);
partial('section.copy.full', [
	'classes' => ['bg-green'],
	'h3' => 'Our mission',
	'content' => '<p>At Kristo Orthodontics, we’re dedicated to offering the highest-quality orthodontic care to create beautiful smiles that enhance self-esteem, self-confidence and overall dental health. Our experienced team is committed to superior customer service and individualized care in a family-friendly atmosphere that is enjoyable, caring, and fun. We strive to improve orthodontic treatment by utilizing the latest technology available, and by recruiting and retaining orthodontists that fit our standards. We recognize the importance of serving our communities and giving back generously.</p>',
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
	'h3' => 'Dental care in a great environment',
	'columns' => [
		[
			'content' => 'Our office is a fun and happy environment for your orthodontic journey. Our team wants you to enjoy your time in our care, and we go out of our way to ensure that you’re smiling during your visits with us. Our reception area offers a coffee bar with beverages for patients and family members.'
		],
		[
			'content' => 'When you walk through our doors you’ll hear a lot of laughter and see an abundance of smiles, from your fellow patients and our team members. We’re genuinely glad to see you and enjoy watching the transformation that you’re undergoing.'
		],
		[
			'content' => 'While our office uses the most advanced technology and treatment processes to create healthy smiles, we never neglect the essential human connection we have with those we serve. Each of us is people-oriented and we look forward to learning about your life, your family, and hobbies.'
		],
	],
]);
partial('section.testimonial-carousel');
partial('section.appointments');
get_footer();
