<?
# Template Name: Biography
get_header();

$url = platform_url();
$relative_url = platform_url('relative');

$copy_two_cols_with_image_popup_content_article = [
	'heading' => 'Meet Dr. Jared Holloway',
	'copy' => '<p>The true value I find in my work as an orthodontist is helping people and patients have positive treatment journeys and outcomes. I strive every day to meet the individual needs of my patients, ensuring that they have exceptional orthodontic experiences while developing beautiful, healthy smiles that build confidence and improve their lives.</p>
				<p>While in dental school, I learned about the transformative impact that orthodontic therapy has on people’s lives, and I knew that I wanted to be a facilitator of those powerful changes. After my four years of dental school, I completed two additional years of specialized orthodontic training on the safe and healthy movement of teeth and jaws. I continually strive to stay on the leading edge of orthodontic treatment and care to provide my patients with the most advanced options available.</p>
				<p>I’m proud and honored to provide top-quality orthodontic care and specialized orthodontic treatments, including braces and Invisalign<sup>®</sup> clear aligners, to people of all ages in Baldwin, New Richmond, Amery, River Falls, and the surrounding communities in the St. Croix Valley.</p>',
];
$copy_two_cols_with_image_popup_content_image = [
	'src' => wp_get_attachment_image_src(1032, 'medium_large')[0],
	'srcset' => wp_get_attachment_image_src(1032, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(1032, '1536x1536')[0].' 2x',
	'width' => '705',
	'height' => '700',
	'alt' => 'Dr. Jared Holloway',
	'classes' => ['holloway'],
];
$copy_two_cols_with_image_popup_content_mobile_image = [
	'src' => wp_get_attachment_image_src(1032, 'medium_large')[0],
	'srcset' => wp_get_attachment_image_src(1032, 'medium_large')[0].' 1x',
	'width' => '705',
	'height' => '700',
	'alt' => 'Dr. Jared Holloway',
	'classes' => ['holloway'],
];
$copy_two_cols_with_image_popup_content_overlap_box = [
	'heading' => 'Jared R. Holloway, DMD',
	'copy' => ' <p class="desktop">Originally from Utah, growing up I celebrated the summers watching rodeos and the winters snowshoeing the slopes. My wife Alex and I met in college during a study abroad in Cambridge, England. We have two boys, Bruce and Will, and a large poodle named Hercules. Our family loves going on nature walks and visiting the beach, and you may see me cycling on my road bike around the St. Croix Valley. We enjoy being active in both our local community and church.</p>',
	'mobile_copy' => ' <p class="mobile">Originally from Utah, growing up I celebrated the summers watching rodeos and the winters snowshoeing the slopes. My wife Alex and I met in college during a study abroad in Cambridge, England. We have two boys, Bruce and Will, and a large poodle named Hercules. Our family loves going on nature walks and visiting the beach, and you may see me cycling on my road bike around the St. Croix Valley. We enjoy being active in both our local community and church.</p>'
];
$tri_carousel_images = [
	[
		'src' => wp_get_attachment_image_src(478, 'medium_large')[0],
		'srcset' => wp_get_attachment_image_src(478, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(478, '1536x1536')[0].' 2x',
		'sizes' => '100vw',
		'alt' => '',
		'classes' => []
	],
	[
		'src' => wp_get_attachment_image_src(479, 'medium_large')[0],
		'srcset' => wp_get_attachment_image_src(479, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(479, '1536x1536')[0].' 2x',
		'sizes' => '100vw',
		'alt' => '',
		'classes' => []
	],
	[
		'src' => wp_get_attachment_image_src(480, 'medium_large')[0],
		'srcset' => wp_get_attachment_image_src(480, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(480, '1536x1536')[0].' 2x',
		'sizes' => '100vw',
		'alt' => '',
		'classes' => []
	],
	[
		'src' => wp_get_attachment_image_src(481, 'medium_large')[0],
		'srcset' => wp_get_attachment_image_src(481, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(481, '1536x1536')[0].' 2x',
		'sizes' => '100vw',
		'alt' => '',
		'classes' => []
	],
	[
		'src' => wp_get_attachment_image_src(482, 'medium_large')[0],
		'srcset' => wp_get_attachment_image_src(482, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(482, '1536x1536')[0].' 2x',
		'sizes' => '100vw',
		'alt' => '',
		'classes' => []
	],
	[
		'src' => wp_get_attachment_image_src(483, 'medium_large')[0],
		'srcset' => wp_get_attachment_image_src(483, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(483, '1536x1536')[0].' 2x',
		'sizes' => '100vw',
		'alt' => '',
		'classes' => []
	],
	[
		'src' => wp_get_attachment_image_src(484, 'medium_large')[0],
		'srcset' => wp_get_attachment_image_src(484, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(484, '1536x1536')[0].' 2x',
		'sizes' => '100vw',
		'alt' => '',
		'classes' => []
	],
];
$professional_associations_logos_row1 = [
	[
		'image' => [
			'src' => wp_get_attachment_image_src(527, 'medium_large')[0],
			'srcset' => wp_get_attachment_image_src(527, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(527, '1536x1536')[0].' 2x',
			'sizes' => '40vw',
			'width' => '330',
			'height' => '200',
			'alt' => '',
			'classes' => [],
		],
		'heading' => 'Marquette University',
		'copy' => 'Orthodontic Residency<br>Marquette University<br>Milwaukee, WI'
	],
	[
		'image' => [
			'src' => wp_get_attachment_image_src(528, 'medium_large')[0],
			'srcset' => wp_get_attachment_image_src(528, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(528, '1536x1536')[0].' 2x',
			'sizes' => '40vw',
			'width' => '330',
			'height' => '200',
			'alt' => '',
			'classes' => [],
		],
		'heading' => 'Midwestern University',
		'copy' => 'Doctor of Dental Medicine<br/>Midwestern University College of Dental Medicine<br/>Downers Grove, IL'
	],
	[
		'image' => [
			'src' => wp_get_attachment_image_src(523, 'medium_large')[0],
			'srcset' => wp_get_attachment_image_src(523, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(523, '1536x1536')[0].' 2x',
			'sizes' => '40vw',
			'width' => '330',
			'height' => '200',
			'alt' => '',
			'classes' => [],
		],
		'heading' => 'Brigham Young University',
		'copy' => 'Bachelor of Science in Molecular Biology<br>Brigham Young University<br>Provo, UT'
	],
];
$professional_associations_logos_row2 = [
	[
		'image' => [
			'src' => wp_get_attachment_image_src(513, 'medium_large')[0],
			'srcset' => wp_get_attachment_image_src(513, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(513, '1536x1536')[0].' 2x',
			'sizes' => '40vw',
			'width' => '330',
			'height' => '200',
			'alt' => '',
			'classes' => [],
		],
		'heading' => 'American Association of Orthodontists',
		'copy' => 'Only dentists who successfully complete an accredited orthodontic residency program after dental school are accepted for membership in the American Association of Orthodontists.'
	],
	[
		'image' => [
			'src' => wp_get_attachment_image_src(522, 'medium_large')[0],
			'srcset' => wp_get_attachment_image_src(522, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(522, '1536x1536')[0].' 2x',
			'sizes' => '40vw',
			'width' => '330',
			'height' => '200',
			'alt' => '',
			'classes' => [],
		],
		'heading' => 'The Wisconsin Society of Orthodontists',
		'copy' => 'The Wisconsin Society of Orthodontists (WSO) is a non-profit corporation over 50 years old, with a membership of approximately 200 orthodontists. We’re recognized as a component of MSO & AAO.'
	],
	[
		'image' => [
			'src' => wp_get_attachment_image_src(521, 'medium_large')[0],
			'srcset' => wp_get_attachment_image_src(521, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(521, '1536x1536')[0].' 2x',
			'sizes' => '40vw',
			'width' => '330',
			'height' => '200',
			'alt' => '',
			'classes' => [],
		],
		'heading' => 'The Wisconsin Dental Association',
		'copy' => 'The Wisconsin Dental Association has 3,100 member dentists and a number of dental hygienists. The WDA is affiliated with the American Dental Association—the largest and oldest national dental association in the world.'
	],
];
$maps_bio_location_info_box_copy = 'Dr. Jared Holloway creates amazing smiles at these Kristo Orthodontics locations';
$hero_full_image = [
	'src' => wp_get_attachment_image_src(996, '1536x1536')[0],
	'srcset' => wp_get_attachment_image_src(996, '1536x1536')[0].' 1x, '.wp_get_attachment_image_src(996, '1536x1536')[0].' 2x',
	'sizes' => '100vw',
	'alt' => '',
	'width' => '1536',
	'height' => '864',
	'classes' => ['desktop', 'holloway'],
];
$hero_full_mobile_image =[
	'src' => wp_get_attachment_image_src(996, 'medium_large')[0],
	'srcset' => wp_get_attachment_image_src(996, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(996, '1536x1536')[0].' 2x',
	'sizes' => '100vw',
	'alt' => '',
	'width' => '768',
	'height' => '432',
	'classes' => ['mobile', 'holloway'],
];
$hero_full_class = ['bio'];
$selected_location = 17;

switch (str_replace('orthodontic-team/', '', $relative_url)) {
	case 'steve-kristo-dds':
		$copy_two_cols_with_image_popup_content_article = [
			'heading' => 'Meet Dr. Steve Kristo',
			'copy' => '<p>Seeing the joy and smiles on my patients’ faces is what motivates me to provide a truly special and extraordinary orthodontic experience for those in Eau Claire and the greater Chippewa Valley, just like my father when he started our family-owned practice in 1959. I care immensely about the health and wellbeing of the kids and adults in our community, and I’m dedicated to providing the highest-quality orthodontic care that creates healthy, amazing smiles that function well and build self-esteem.</p>
			<p>Witnessing the life-transforming impact that an improved smile has on people’s lives is remarkable, and that’s why I’m fully committed to providing care that is tailored to each patient’s unique needs and goals.</p>
			<p>The positive care and exceptional smile outcomes, combined with a super fun and energetic atmosphere, is what makes Kristo Orthodontics stand out as the area’s practice of choice.</p>',
		];
		$copy_two_cols_with_image_popup_content_image = [
			'src' => wp_get_attachment_image_src(760, 'medium_large')[0],
			'srcset' => wp_get_attachment_image_src(760, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(760, '1536x1536')[0].' 2x',
			'width' => '705',
			'height' => '700',
			'alt' => 'Dr. Steve Kristo',
			'classes' => ['kristo'],
		];
		$copy_two_cols_with_image_popup_content_mobile_image = [
			'src' => wp_get_attachment_image_src(760, 'medium_large')[0],
			'srcset' => wp_get_attachment_image_src(760, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(760, '1536x1536')[0].' 2x',
			'width' => '705',
			'height' => '700',
			'alt' => 'Dr. Steve Kristo',
			'classes' => ['kristo'],
		];
		$copy_two_cols_with_image_popup_content_overlap_box = [
			'heading' => 'Steve Kristo, DDS',
			'copy' => ' <p class="desktop">In addition to practicing orthodontics in the area for over 30 years, Eau Claire has always been home to my family. My children and I are deeply rooted in the area and enjoy being active members of the community. We love the many theaters and arts the Chippewa Valley has to offer, and as an avid sports fan, you’ll see my team colors on full display when our local teams, Packers, or Badgers are competing.</p>',
			'mobile_copy' => ' <p class="mobile">In addition to practicing orthodontics in the area for over 30 years, Eau Claire has always been home to my family. My children and I are deeply rooted in the area and enjoy being active members of the community. We love the many theaters and arts the Chippewa Valley has to offer, and as an avid sports fan, you’ll see my team colors on full display when our local teams, Packers, or Badgers are competing.</p>'
		];
		$tri_carousel_images = [
			[
				'src' => wp_get_attachment_image_src(485, 'medium_large')[0],
				'srcset' => wp_get_attachment_image_src(485, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(485, '1536x1536')[0].' 2x',
				'sizes' => '100vw',
				'alt' => '',
				'classes' => []
			],
			[
				'src' => wp_get_attachment_image_src(486, 'medium_large')[0],
				'srcset' => wp_get_attachment_image_src(486, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(486, '1536x1536')[0].' 2x',
				'sizes' => '100vw',
				'alt' => '',
				'classes' => []
			],
			[
				'src' => wp_get_attachment_image_src(487, 'medium_large')[0],
				'srcset' => wp_get_attachment_image_src(487, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(487, '1536x1536')[0].' 2x',
				'sizes' => '100vw',
				'alt' => '',
				'classes' => []
			],
			[
				'src' => wp_get_attachment_image_src(488, 'medium_large')[0],
				'srcset' => wp_get_attachment_image_src(488, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(488, '1536x1536')[0].' 2x',
				'sizes' => '100vw',
				'alt' => '',
				'classes' => []
			],
			[
				'src' => wp_get_attachment_image_src(489, 'medium_large')[0],
				'srcset' => wp_get_attachment_image_src(489, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(489, '1536x1536')[0].' 2x',
				'sizes' => '100vw',
				'alt' => '',
				'classes' => []
			],
			[
				'src' => wp_get_attachment_image_src(490, 'medium_large')[0],
				'srcset' => wp_get_attachment_image_src(490, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(490, '1536x1536')[0].' 2x',
				'sizes' => '100vw',
				'alt' => '',
				'classes' => []
			],
			[
				'src' => wp_get_attachment_image_src(491, 'medium_large')[0],
				'srcset' => wp_get_attachment_image_src(491, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(491, '1536x1536')[0].' 2x',
				'sizes' => '100vw',
				'alt' => '',
				'classes' => []
			],
			[
				'src' => wp_get_attachment_image_src(492, 'medium_large')[0],
				'srcset' => wp_get_attachment_image_src(492, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(492, '1536x1536')[0].' 2x',
				'sizes' => '100vw',
				'alt' => '',
				'classes' => []
			],
		];
		$professional_associations_logos_row1 = [
			[
				'image' => [
					'src' => wp_get_attachment_image_src(531, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(531, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(531, '1536x1536')[0].' 2x',
					'sizes' => '40vw',
					'width' => '330',
					'height' => '200',
					'alt' => '',
					'classes' => [],
				],
				'heading' => 'University of Minnesota',
				'copy' => 'Master of Science in Oral Biology, Doctor of Dental Surgery, and Certificate in Orthodontics<br/>University of Minnesota School of Dentistry<br/>Minneapolis, MN',
			],
		];
		$professional_associations_logos_row2 = [
			[
				'image' => [
					'src' => wp_get_attachment_image_src(513, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(513, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(513, '1536x1536')[0].' 2x',
					'sizes' => '40vw',
					'width' => '330',
					'height' => '200',
					'alt' => '',
					'classes' => [],
				],
				'heading' => 'American Association of Orthodontists',
				'copy' => 'Only dentists who successfully complete an accredited orthodontic residency program after dental school are accepted for membership in the American Association of Orthodontists.'
			],
			[
				'image' => [
					'src' => wp_get_attachment_image_src(522, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(522, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(522, '1536x1536')[0].' 2x',
					'sizes' => '40vw',
					'width' => '330',
					'height' => '200',
					'alt' => '',
					'classes' => [],
				],
				'heading' => 'The Wisconsin Society of Orthodontists',
				'copy' => 'The Wisconsin Society of Orthodontists (WSO) is a non-profit corporation over 50 years old, with a membership of approximately 200 orthodontists. We’re recognized as a component of MSO & AAO.'
			],
			[
				'image' => [
					'src' => wp_get_attachment_image_src(521, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(521, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(521, '1536x1536')[0].' 2x',
					'sizes' => '40vw',
					'width' => '330',
					'height' => '200',
					'alt' => '',
					'classes' => [],
				],
				'heading' => 'The Wisconsin Dental Association',
				'copy' => 'The Wisconsin Dental Association has 3,100 member dentists and a number of dental hygienists. The WDA is affiliated with the American Dental Association—the largest and oldest national dental association in the world.'
			],
			[
				'image' => [
					'src' => wp_get_attachment_image_src(514, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(514, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(514, '1536x1536')[0].' 2x',
					'sizes' => '40vw',
					'width' => '330',
					'height' => '200',
					'alt' => '',
					'classes' => [],
				],
				'heading' => 'The American Dental Association',
				'copy' => 'The American Dental Association (ADA) was established in 1859 and now has more than 163,000 members. As the world’s largest and oldest national dental association, the ADA exists to power the profession of dentistry and assist members in advancing the overall oral health of their patients.'
			],
		];
		$maps_bio_location_info_box_copy = 'Dr. Steve Kristo creates amazing smiles at these Kristo Orthodontics locations';
		$hero_full_image = [
			'src' => wp_get_attachment_image_src(999, '1536x1536')[0],
			'srcset' => wp_get_attachment_image_src(999, '1536x1536')[0].' 1x, '.wp_get_attachment_image_src(999, '1536x1536')[0].' 2x',
			'sizes' => '100vw',
			'alt' => '',
			'width' => '1536',
			'height' => '864',
			'classes' => ['desktop', 'kristo'],
		];
		$hero_full_mobile_image =[
			'src' => wp_get_attachment_image_src(999, 'medium_large')[0],
			'srcset' => wp_get_attachment_image_src(999, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(999, '1536x1536')[0].' 2x',
			'sizes' => '100vw',
			'alt' => '',
			'width' => '768',
			'height' => '432',
			'classes' => ['mobile', 'kristo'],
		];
		$hero_full_class = ['bio', 'kristo'];
		$selected_location = 6;
	break;
	case 'bob-bronski-dds':
		$copy_two_cols_with_image_popup_content_article = [
			'heading' => 'Meet Dr. Bob Bronski',
			'copy' => '<p>Providing the highest-quality orthodontic care to all my patients in the Chippewa Valley is my top priority, and I consider myself lucky to work in a profession where I have the opportunity to meet and get to know so many good people with such diverse interests and backgrounds. After being introduced to dentistry at a young age through my father and his work as a dental technician, I was drawn to the problem-solving, hands-on nature of the profession.</p>
			<p>Over the past 30+ years as an orthodontist, I’ve had the privilege to work alongside the most professional and caring staff. The fascination and satisfaction of transforming a patient’s smile into a healthy, functional smile they can be confident in continues to motivate me today! In a profession like orthodontics, you never stop learning, and I’m committed to advancing my practice and utilizing cutting-edge technology when it benefits patients and their care.</p>
            <p>I’m proud and honored to provide top-quality orthodontic care and specialized orthodontic treatments, including braces and Invisalign<sup>®</sup> clear aligners to people of all ages in Eau Claire, Chippewa Falls, Menomonie, and the surrounding communities in the Chippewa Valley.</p>',
		];
		$copy_two_cols_with_image_popup_content_image = [
			'src' => wp_get_attachment_image_src(705, 'medium_large')[0],
			'srcset' => wp_get_attachment_image_src(705, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(705, '1536x1536')[0].' 2x',
			'width' => '705',
			'height' => '700',
			'alt' => 'Dr. Robert Bronski',
			'classes' => ['bronski'],
		];
		$copy_two_cols_with_image_popup_content_mobile_image = [
			'src' => wp_get_attachment_image_src(705, 'medium_large')[0],
			'srcset' => wp_get_attachment_image_src(705, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(705, '1536x1536')[0].' 2x',
			'width' => '705',
			'height' => '700',
			'alt' => 'Dr. Robert Bronski',
			'classes' => ['bronski'],
		];
		$copy_two_cols_with_image_popup_content_overlap_box = [
			'heading' => 'Robert Bronski, DDS, MS',
			'copy' => ' <p class="desktop">My wife, Carol, and I live near Fall Creek with our labradoodles, Max and Charlie. We enjoy spending time with family, exploring Wisconsin and Minnesota, fishing, and bowling. In my free time, I enjoy collecting and restoring vintage John Deere farm machinery, as I farmed in Illinois for 20 years. I also enjoy studying history, listening to all genres of music from album rock to zydeco, and learning to play the Chemnitzer concertina in honor of my Polish and Czech heritage.</p>',
			'mobile_copy' => ' <p class="mobile">My wife, Carol, and I live near Fall Creek with our labradoodles, Max and Charlie. We enjoy spending time with family, exploring Wisconsin and Minnesota, fishing, and bowling. In my free time, I enjoy collecting and restoring vintage John Deere farm machinery, as I farmed in Illinois for 20 years. I also enjoy studying history, listening to all genres of music from album rock to zydeco, and learning to play the Chemnitzer concertina in honor of my Polish and Czech heritage.</p>'
		];
		$tri_carousel_images = [
			[
				'src' => wp_get_attachment_image_src(462, 'medium_large')[0],
				'srcset' => wp_get_attachment_image_src(462, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(462, '1536x1536')[0].' 2x',
				'sizes' => '100vw',
				'alt' => '',
				'classes' => []
			],
			[
				'src' => wp_get_attachment_image_src(463, 'medium_large')[0],
				'srcset' => wp_get_attachment_image_src(463, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(463, '1536x1536')[0].' 2x',
				'sizes' => '100vw',
				'alt' => '',
				'classes' => []
			],
			[
				'src' => wp_get_attachment_image_src(464, 'medium_large')[0],
				'srcset' => wp_get_attachment_image_src(464, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(464, '1536x1536')[0].' 2x',
				'sizes' => '100vw',
				'alt' => '',
				'classes' => []
			],
			[
				'src' => wp_get_attachment_image_src(465, 'medium_large')[0],
				'srcset' => wp_get_attachment_image_src(465, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(465, '1536x1536')[0].' 2x',
				'sizes' => '100vw',
				'alt' => '',
				'classes' => []
			],
			[
				'src' => wp_get_attachment_image_src(466, 'medium_large')[0],
				'srcset' => wp_get_attachment_image_src(466, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(466, '1536x1536')[0].' 2x',
				'sizes' => '100vw',
				'alt' => '',
				'classes' => []
			],
			[
				'src' => wp_get_attachment_image_src(468, 'medium_large')[0],
				'srcset' => wp_get_attachment_image_src(468, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(468, '1536x1536')[0].' 2x',
				'sizes' => '100vw',
				'alt' => '',
				'classes' => []
			],
			[
				'src' => wp_get_attachment_image_src(469, 'medium_large')[0],
				'srcset' => wp_get_attachment_image_src(469, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(469, '1536x1536')[0].' 2x',
				'sizes' => '100vw',
				'alt' => '',
				'classes' => []
			],
			[
				'src' => wp_get_attachment_image_src(470, 'medium_large')[0],
				'srcset' => wp_get_attachment_image_src(470, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(470, '1536x1536')[0].' 2x',
				'sizes' => '100vw',
				'alt' => '',
				'classes' => []
			],
			[
				'src' => wp_get_attachment_image_src(1055, 'medium_large')[0],
				'srcset' => wp_get_attachment_image_src(1055, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(1055, '1536x1536')[0].' 2x',
				'sizes' => '100vw',
				'alt' => '',
				'classes' => []
			],
		];
		$professional_associations_logos_row1 = [
			[
				'image' => [
					'src' => wp_get_attachment_image_src(531, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(531, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(531, '1536x1536')[0].' 2x',
					'sizes' => '40vw',
					'width' => '330',
					'height' => '200',
					'alt' => '',
					'classes' => [],
				],
				'heading' => 'University of Minnesota',
				'copy' => 'Master of Science in Oral Biology and Orthodontic Residency<br/>University of Minnesota School of Dentistry<br/>Minneapolis, MN'
			],
			[
				'image' => [
					'src' => wp_get_attachment_image_src(526, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(526, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(526, '1536x1536')[0].' 2x',
					'sizes' => '40vw',
					'width' => '330',
					'height' => '200',
					'alt' => '',
					'classes' => [],
				],
				'heading' => 'Loyola University',
				'copy' => 'Doctor of Dental Surgery<br>Loyola University<br>Chicago, IL'
			],
			[
				'image' => [
					'src' => wp_get_attachment_image_src(525, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(525, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(525, '1536x1536')[0].' 2x',
					'sizes' => '40vw',
					'width' => '330',
					'height' => '200',
					'alt' => '',
					'classes' => [],
				],
				'heading' => 'Iowa State University',
				'copy' => '	Bachelor of Science in Distributed Studies<br>Iowa State University<br>Ames, IA'
			],
		];
		$professional_associations_logos_row2 = [
			[
				'image' => [
					'src' => wp_get_attachment_image_src(513, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(513, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(513, '1536x1536')[0].' 2x',
					'sizes' => '40vw',
					'width' => '330',
					'height' => '200',
					'alt' => '',
					'classes' => [],
				],
				'heading' => 'American Association of Orthodontists',
				'copy' => 'Only dentists who successfully complete an accredited orthodontic residency program after dental school are accepted for membership in the American Association of Orthodontists.'
			],
			[
				'image' => [
					'src' => wp_get_attachment_image_src(522, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(522, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(522, '1536x1536')[0].' 2x',
					'sizes' => '40vw',
					'width' => '330',
					'height' => '200',
					'alt' => '',
					'classes' => [],
				],
				'heading' => 'The Wisconsin Society of Orthodontists',
				'copy' => 'The Wisconsin Society of Orthodontists (WSO) is a non-profit corporation over 50 years old, with a membership of approximately 200 orthodontists. We’re recognized as a component of MSO & AAO.'
			],
			[
				'image' => [
					'src' => wp_get_attachment_image_src(521, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(521, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(521, '1536x1536')[0].' 2x',
					'sizes' => '40vw',
					'width' => '330',
					'height' => '200',
					'alt' => '',
					'classes' => [],
				],
				'heading' => 'The Wisconsin Dental Association',
				'copy' => 'The Wisconsin Dental Association has 3,100 member dentists and a number of dental hygienists. The WDA is affiliated with the American Dental Association—the largest and oldest national dental association in the world.'
			],
			[
				'image' => [
					'src' => wp_get_attachment_image_src(514, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(514, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(514, '1536x1536')[0].' 2x',
					'sizes' => '40vw',
					'width' => '330',
					'height' => '200',
					'alt' => '',
					'classes' => [],
				],
				'heading' => 'The American Dental Association',
				'copy' => 'The American Dental Association (ADA) was established in 1859 and now has more than 163,000 members. As the world’s largest and oldest national dental association, the ADA exists to power the profession of dentistry and assist members in advancing the overall oral health of their patients.'
			],
		];
		$maps_bio_location_info_box_copy = 'Dr. Bob Bronski creates amazing smiles at these Kristo Orthodontics locations';
		$hero_full_image = [
			'src' => wp_get_attachment_image_src(538, '1536x1536')[0],
			'srcset' => wp_get_attachment_image_src(538, '1536x1536')[0].' 1x, '.wp_get_attachment_image_src(538, '1536x1536')[0].' 2x',
			'sizes' => '100vw',
			'alt' => '',
			'width' => '1536',
			'height' => '864',
			'classes' => ['desktop', 'bronski'],
		];
		$hero_full_mobile_image =[
			'src' => wp_get_attachment_image_src(538, 'medium_large')[0],
			'srcset' => wp_get_attachment_image_src(538, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(538, '1536x1536')[0].' 2x',
			'sizes' => '100vw',
			'alt' => '',
			'width' => '768',
			'height' => '432',
			'classes' => ['mobile', 'bronski'],
		];
		$hero_full_class = ['bio'];
		$selected_location = 6;
	break;
	case 'david-hamm-dds':
		$copy_two_cols_with_image_popup_content_article = [
			'heading' => 'Meet Dr. David Hamm',
			'copy' => '<p>Experiencing the improvement in my own self-esteem that resulted from straighter teeth and effective orthodontic treatment is what motivated me to pursue a career in orthodontics. I knew I wanted to change people’s lives one smile at a time. Orthodontics & Dentofacial Orthopedics is the perfect blend of science and artistry, where I can help patients achieve both a healthy, functional bite and a good-looking smile that will last them a lifetime.</p>
				<p>Each patient is unique, and providing individualized care and treatments that bring them one step closer to their best smile and bite is what I enjoy most about my work. I look forward to helping you achieve your orthodontic goals and improved self esteem with personalized care and braces or Invisalign<sup>®</sup> treatment.</p>',
		];
		$copy_two_cols_with_image_popup_content_image = [
			'src' => wp_get_attachment_image_src(508, 'medium_large')[0],
			'srcset' => wp_get_attachment_image_src(508, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(508, '1536x1536')[0].' 2x',
			'width' => '705',
			'height' => '700',
			'alt' => 'Dr. David Hamm',
			'classes' => ['hamm'],
		];
		$copy_two_cols_with_image_popup_content_mobile_image = [
			'src' => wp_get_attachment_image_src(508, 'medium_large')[0],
			'srcset' => wp_get_attachment_image_src(508, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(508, '1536x1536')[0].' 2x',
			'width' => '705',
			'height' => '700',
			'alt' => 'Dr. David Hamm',
			'classes' => ['hamm'],
		];
		$copy_two_cols_with_image_popup_content_overlap_box = [
			'heading' => 'David Hamm, DDS, MS',
			'copy' => ' <p class="desktop">In my free time, I enjoy spending time with my family and playing with my two dogs, Kobayashi (“Kobi”), a German Shorthaired Pointer/Terrier mix, and Boone, a Blue Heeler mix. When my dogs are tired, you’ll find me working on my Jeep Wrangler or attending concerts and music festivals.</p>',
			'mobile_copy' => ' <p class="mobile">In my free time, I enjoy spending time with my family and playing with my two dogs, Kobayashi (“Kobi”), a German Shorthaired Pointer/Terrier mix, and Boone, a Blue Heeler mix. When my dogs are tired, you’ll find me working on my Jeep Wrangler or attending concerts and music festivals.</p>'
		];
		$tri_carousel_images = [
			[
				'src' => wp_get_attachment_image_src(471, 'medium_large')[0],
				'srcset' => wp_get_attachment_image_src(471, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(471, '1536x1536')[0].' 2x',
				'width' => '',
				'height' => '',
				'alt' => '',
			],
			[
				'src' => wp_get_attachment_image_src(472, 'medium_large')[0],
				'srcset' => wp_get_attachment_image_src(472, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(472, '1536x1536')[0].' 2x',
				'width' => '',
				'height' => '',
				'alt' => '',
			],
			[
				'src' => wp_get_attachment_image_src(473, 'medium_large')[0],
				'srcset' => wp_get_attachment_image_src(473, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(473, '1536x1536')[0].' 2x',
				'width' => '',
				'height' => '',
				'alt' => '',
			],
			[
				'src' => wp_get_attachment_image_src(474, 'medium_large')[0],
				'srcset' => wp_get_attachment_image_src(474, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(474, '1536x1536')[0].' 2x',
				'width' => '',
				'height' => '',
				'alt' => '',
			],
			[
				'src' => wp_get_attachment_image_src(475, 'medium_large')[0],
				'srcset' => wp_get_attachment_image_src(475, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(475, '1536x1536')[0].' 2x',
				'width' => '',
				'height' => '',
				'alt' => '',
			],
			[
				'src' => wp_get_attachment_image_src(476, 'medium_large')[0],
				'srcset' => wp_get_attachment_image_src(476, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(476, '1536x1536')[0].' 2x',
				'width' => '',
				'height' => '',
				'alt' => '',
			],
			[
				'src' => wp_get_attachment_image_src(477, 'medium_large')[0],
				'srcset' => wp_get_attachment_image_src(477, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(477, '1536x1536')[0].' 2x',
				'width' => '',
				'height' => '',
				'alt' => '',
			],
		];
		$professional_associations_logos_row1 = [
			[
				'image' => [
					'src' => wp_get_attachment_image_src(527, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(527, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(527, '1536x1536')[0].' 2x',
					'width' => '',
					'height' => '',
					'alt' => 'Marquette University',
				],
				'heading' => 'Marquette University',
				'copy' => 'Bachelor of Science in Physiological Sciences and Doctor of Dental Surgery<br>Marquette University School of Dentistry<br>Milwaukee, WI'
			],
			[
				'image' => [
					'src' => wp_get_attachment_image_src(536, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(536, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(536, '1536x1536')[0].' 2x',
					'width' => '',
					'height' => '',
					'alt' => 'Icahn School of Medicine at Mount Sinai',
				],
				'heading' => 'Icahn School of Medicine at Mount Sinai',
				'copy' => 'Certificate in General Practice Residency<br>Icahn School of Medicine<br>New York, NY'
			],
			[
				'image' => [
					'src' => wp_get_attachment_image_src(532, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(532, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(532, '1536x1536')[0].' 2x',
					'width' => '',
					'height' => '',
					'alt' => 'University of Nebraska Medical Center',
				],
				'heading' => 'University of Nebraska Medical Center',
				'copy' => 'Master of Science in Oral Biology and Certificate in Orthodontics & Dentofacial&nbsp;Orthopedics<br>University of Nebraska Medical Center<br>Omaha, NE'
			],
		];
		$professional_associations_logos_row2 = [
			[
				'image' => [
					'src' => wp_get_attachment_image_src(513, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(513, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(513, '1536x1536')[0].' 2x',
					'sizes' => '40vw',
					'width' => '330',
					'height' => '200',
					'alt' => '',
					'classes' => [],
				],
				'heading' => 'American Association of Orthodontists',
				'copy' => 'Only dentists who successfully complete an accredited orthodontic residency program after dental school are accepted for membership in the American Association of Orthodontists.'
			],
			[
				'image' => [
					'src' => wp_get_attachment_image_src(522, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(522, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(522, '1536x1536')[0].' 2x',
					'sizes' => '40vw',
					'width' => '330',
					'height' => '200',
					'alt' => '',
					'classes' => [],
				],
				'heading' => 'The Wisconsin Society of Orthodontists',
				'copy' => 'The Wisconsin Society of Orthodontists (WSO) is a non-profit corporation over 50 years old, with a membership of approximately 200 orthodontists. We’re recognized as a component of MSO & AAO.'
			],
			[
				'image' => [
					'src' => wp_get_attachment_image_src(518, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(518, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(518, '1536x1536')[0].' 2x',
					'sizes' => '40vw',
					'width' => '330',
					'height' => '200',
					'alt' => '',
					'classes' => [],
				],
				'heading' => 'Midwestern Society of Orthodontics',
				'copy' => 'The Midwestern Society of Orthodontists (MSO) is a constituent of the American Association of Orthodontists (AAO) with over 1,460 members across Illinois, Iowa, Minnesota, Missouri, Nebraska, North Dakota, South Dakota, Wisconsin, and parts of Canada.'
			],
			[
				'image' => [
					'src' => wp_get_attachment_image_src(511, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(511, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(511, '1536x1536')[0].' 2x',
					'sizes' => '40vw',
					'width' => '330',
					'height' => '200',
					'alt' => '',
					'classes' => [],
				],
				'heading' => 'Academy of Laser Dentistry',
				'copy' => 'The Academy of Laser Dentistry (ALD) is the largest international organization devoted to laser dentistry. ALD is devoted to clinical education, research and the development of standards and guidelines for the safe and effective use of laser technology.'
			],
			[
				'image' => [
					'src' => wp_get_attachment_image_src(517, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(517, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(517, '1536x1536')[0].' 2x',
					'sizes' => '40vw',
					'width' => '330',
					'height' => '200',
					'alt' => '',
					'classes' => [],
				],
				'heading' => 'Delta Sigma Delta International Professional Dental Fraternity',
				'copy' => 'Delta Sigma Delta is an organization of dentists and dental students brought together with the common goal of promoting excellence in the dental profession. The organization currently has 33 dental school chapters and 42 alumni chapters.'
			],
		];
		$maps_bio_location_info_box_copy = 'Dr. David Hamm creates amazing smiles in Eau Claire';
		$hero_full_image = [
			'src' => wp_get_attachment_image_src(539, '1536x1536')[0],
			'srcset' => wp_get_attachment_image_src(539, '1536x1536')[0].' 1x, '.wp_get_attachment_image_src(539, '1536x1536')[0].' 2x',
			'sizes' => '100vw',
			'alt' => '',
			'width' => '1536',
			'height' => '864',
			'classes' => ['desktop', 'hamm'],
		];
		$hero_full_mobile_image =[
			'src' => wp_get_attachment_image_src(539, 'medium_large')[0],
			'srcset' => wp_get_attachment_image_src(539, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(539, '1536x1536')[0].' 2x',
			'sizes' => '100vw',
			'alt' => '',
			'width' => '768',
			'height' => '432',
			'classes' => ['mobile', 'hamm'],
		];
		$hero_full_class = ['bio'];
		$selected_location = 6;
	break;
	case 'kan-tsunoda-dmd':
		$copy_two_cols_with_image_popup_content_article = [
			'heading' => 'Meet Dr. Kan Tsunoda',
			'copy' => '<p>I immediately fell in love with orthodontics after visiting a friend’s practice where I witnessed the remarkable impact that orthodontic care has on people’s lives. At the time, I was a chiropractor, and I knew instantly that a career in orthodontics was right for me. My love of science and biomechanics is combined with an opportunity to be an agent of positive change in the lives of those around me, which makes my work as an orthodontist truly fulfilling.</p>
					   <p>I’m passionate about providing my patients with an exceptional orthodontic experience and effective treatment using braces and Invisalign<sup>®</sup> clear aligners, so they gain confidence, self-esteem, improved health and quality of life. My thirst for knowledge and improving patient outcomes drives me to continually pursue the latest advances in the field, and I enjoy being active and involved in orthodontic science and research. I look forward to partnering with you to achieve your ultimate smile goals.</p>',
		];
		$copy_two_cols_with_image_popup_content_image = [
			'src' => wp_get_attachment_image_src(510, 'medium_large')[0],
			'srcset' => wp_get_attachment_image_src(510, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(510, '1536x1536')[0].' 2x',
			'width' => '705',
			'height' => '700',
			'alt' => 'Dr. Kan Tsunoda',
			'classes' => ['tsunoda'],
		];
		$copy_two_cols_with_image_popup_content_mobile_image = [
			'src' => wp_get_attachment_image_src(510, 'medium_large')[0],
			'srcset' => wp_get_attachment_image_src(510, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(510, '1536x1536')[0].' 2x',
			'width' => '705',
			'height' => '700',
			'alt' => 'Dr. Kan Tsunoda',
			'classes' => ['tsunoda'],
		];
		$copy_two_cols_with_image_popup_content_overlap_box = [
			'heading' => 'Kan Tsunoda, DMD, MS, DC',
			'copy' => ' <p class="desktop">My wife and our four beautiful daughters love being a part of the local community. I was born in Japan, grew up in Ontario, Canada and Hawaii, and we’re proud to call Wausau our home. We enjoy family time exploring the outdoors, camping, fishing, skiing, and mountain biking. Some of my personal hobbies include basketball, hunting, playing my guitar, and golfing together with my wife. I also enjoy being active in our local community and organizations including the Central Wisconsin Down Syndrome Awareness Association, Green Heck Field House, and the Granite Peak Ski Team.</p>',
			'mobile_copy' => ' <p class="mobile">My wife and our four beautiful daughters love being a part of the local community. I was born in Japan, grew up in Ontario, Canada and Hawaii, and we’re proud to call Wausau our home. We enjoy family time exploring the outdoors, camping, fishing, skiing, and mountain biking. Some of my personal hobbies include basketball, hunting, playing my guitar, and golfing together with my wife. I also enjoy being active in our local community and organizations including the Central Wisconsin Down Syndrome Awareness Association, Green Heck Field House, and the Granite Peak Ski Team.</p>'
		];
		$tri_carousel_images = [
			[
				'src' => wp_get_attachment_image_src(499, 'medium_large')[0],
				'srcset' => wp_get_attachment_image_src(499, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(499, '1536x1536')[0].' 2x',
				'sizes' => '100vw',
				'alt' => '',
				'classes' => []
			],
			[
				'src' => wp_get_attachment_image_src(500, 'medium_large')[0],
				'srcset' => wp_get_attachment_image_src(500, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(500, '1536x1536')[0].' 2x',
				'sizes' => '100vw',
				'alt' => '',
				'classes' => []
			],
			[
				'src' => wp_get_attachment_image_src(501, 'medium_large')[0],
				'srcset' => wp_get_attachment_image_src(501, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(501, '1536x1536')[0].' 2x',
				'sizes' => '100vw',
				'alt' => '',
				'classes' => []
			],
			[
				'src' => wp_get_attachment_image_src(502, 'medium_large')[0],
				'srcset' => wp_get_attachment_image_src(502, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(502, '1536x1536')[0].' 2x',
				'sizes' => '100vw',
				'alt' => '',
				'classes' => []
			],
			[
				'src' => wp_get_attachment_image_src(503, 'medium_large')[0],
				'srcset' => wp_get_attachment_image_src(503, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(503, '1536x1536')[0].' 2x',
				'sizes' => '100vw',
				'alt' => '',
				'classes' => []
			],
			[
				'src' => wp_get_attachment_image_src(504, 'medium_large')[0],
				'srcset' => wp_get_attachment_image_src(504, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(504, '1536x1536')[0].' 2x',
				'sizes' => '100vw',
				'alt' => '',
				'classes' => []
			],
		];
		$professional_associations_logos_row1 = [
			[
				'image' => [
					'src' => wp_get_attachment_image_src(1053, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(1053, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(1053, '1536x1536')[0].' 2x',
					'sizes' => '40vw',
					'width' => '330',
					'height' => '200',
					'alt' => '',
					'classes' => [],
				],
				'heading' => 'University of Illinois',
				'copy' => 'Master of Science in Oral Science, Certificate in Orthodontics, and Orthodontic Residency
				University of Illinois Chicago Department of&nbsp;Orthodontics<br>Chicago, IL'
			],
			[
				'image' => [
					'src' => wp_get_attachment_image_src(528, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(528, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(528, '1536x1536')[0].' 2x',
					'sizes' => '40vw',
					'width' => '330',
					'height' => '200',
					'alt' => '',
					'classes' => [],
				],
				'heading' => 'Midwestern University',
				'copy' => 'Doctor of Dental Medicine<br/>Midwestern University College of Dental Medicine<br/>Downers Grove, IL'
			],
			[
				'image' => [
					'src' => wp_get_attachment_image_src(523, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(523, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(523, '1536x1536')[0].' 2x',
					'sizes' => '40vw',
					'width' => '330',
					'height' => '200',
					'alt' => '',
					'classes' => [],
				],
				'heading' => 'Brigham Young University',
				'copy' => 'Bachelor of Science in Neuroscience<br>Brigham Young University<br>Provo, UT'
			],
			[
				'image' => [
					'src' => wp_get_attachment_image_src(529, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(529, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(529, '1536x1536')[0].' 2x',
					'sizes' => '40vw',
					'width' => '330',
					'height' => '200',
					'alt' => '',
					'classes' => [],
				],
				'heading' => 'Palmer College',
				'copy' => 'Doctor of Chiropractic<br>Palmer College of Chiropractic<br>Davenport, IA'
			],
		];
		$professional_associations_logos_row2 = [
			[
				'image' => [
					'src' => wp_get_attachment_image_src(513, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(513, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(513, '1536x1536')[0].' 2x',
					'sizes' => '40vw',
					'width' => '330',
					'height' => '200',
					'alt' => '',
					'classes' => [],
				],
				'heading' => 'American Association of Orthodontists',
				'copy' => 'Only dentists who successfully complete an accredited orthodontic residency program after dental school are accepted for membership in the American Association of Orthodontists.'
			],
			[
				'image' => [
					'src' => wp_get_attachment_image_src(522, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(522, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(522, '1536x1536')[0].' 2x',
					'sizes' => '40vw',
					'width' => '330',
					'height' => '200',
					'alt' => '',
					'classes' => [],
				],
				'heading' => 'The Wisconsin Society of Orthodontists',
				'copy' => 'The Wisconsin Society of Orthodontists (WSO) is a non-profit corporation over 50 years old, with a membership of approximately 200 orthodontists. We’re recognized as a component of MSO & AAO.'
			],
			[
				'image' => [
					'src' => wp_get_attachment_image_src(521, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(521, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(521, '1536x1536')[0].' 2x',
					'sizes' => '40vw',
					'width' => '330',
					'height' => '200',
					'alt' => '',
					'classes' => [],
				],
				'heading' => 'The Wisconsin Dental Association',
				'copy' => 'The Wisconsin Dental Association has 3,100 member dentists and a number of dental hygienists. The WDA is affiliated with the American Dental Association—the largest and oldest national dental association in the world.'
			],
			[
				'image' => [
					'src' => wp_get_attachment_image_src(520, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(520, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(520, '1536x1536')[0].' 2x',
					'sizes' => '40vw',
					'width' => '330',
					'height' => '200',
					'alt' => '',
					'classes' => [],
				],
				'heading' => 'Marshfield SPEAR Innovative Dental Education Club',
				'copy' => 'Spear is one of the most respected companies in continuing education for dentists, leading the way with an exceptional curriculum, inspired faculty and on-demand learning.'
			],
			[
				'image' => [
					'src' => wp_get_attachment_image_src(515, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(515, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(515, '1536x1536')[0].' 2x',
					'sizes' => '40vw',
					'width' => '330',
					'height' => '200',
					'alt' => '',
					'classes' => [],
				],
				'heading' => 'Marathon County Dental Society',
				'copy' => 'The Marathon County Dental Society is the regional association of the Wisconsin Dental Association for Central Wisconsin.'
			],
			[
				'image' => [
					'src' => wp_get_attachment_image_src(512, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(512, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(512, '1536x1536')[0].' 2x',
					'sizes' => '40vw',
					'width' => '330',
					'height' => '200',
					'alt' => '',
					'classes' => [],
				],
				'heading' => 'American Association for Dental Research',
				'copy' => 'The American Association for Dental Research (AADR) is a nonprofit organization with over 3,100 individual members in the United States, dedicated to driving dental, oral and craniofacial research to advance health and well-being through discovery and dissemination.'
			],
		];
		$maps_bio_location_info_box_copy = 'Dr. Kan Tsunoda creates amazing smiles at these Kristo Orthodontics locations';
		$hero_full_image = [
			'src' => wp_get_attachment_image_src(994, '1536x1536')[0],
			'srcset' => wp_get_attachment_image_src(994, '1536x1536')[0].' 1x, '.wp_get_attachment_image_src(994, '1536x1536')[0].' 2x',
			'sizes' => '100vw',
			'alt' => '',
			'width' => '1536',
			'height' => '864',
			'classes' => ['desktop', 'tsunoda'],
		];
		$hero_full_mobile_image =[
			'src' => wp_get_attachment_image_src(994, 'medium_large')[0],
			'srcset' => wp_get_attachment_image_src(994, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(994, '1536x1536')[0].' 2x',
			'sizes' => '100vw',
			'alt' => '',
			'width' => '768',
			'height' => '432',
			'classes' => ['mobile', 'tsunoda'],
		];
		$hero_full_class = ['bio'];
		$selected_location = 14;
	break;
	case 'harrison-siu-dds':
		$copy_two_cols_with_image_popup_content_article = [
			'heading' => 'Meet Dr. Harrison Siu',
			'copy' => '<p>My goal is to provide exceptional orthodontic treatment for all my patients, while also ensuring that they have a fun and pleasurable experience. As an orthodontist, I can greatly improve the lives of my patients, and I love seeing the happiness and joy they have when they look into the mirror for the first time at their new smile. My experience with treating complex cases helped me realize that orthodontics is much more than just straightening teeth. It\'s about getting to know each of my patients and their needs, and holistically improving their tooth, jaw, and facial harmony for improved aesthetics, health, and quality of life.</p><p>My appreciation for dentistry began developing when I had braces as a teenager, and I realized the impact orthodontic treatment has on self-esteem and confidence. I find it extremely gratifying to be able to provide for others what my orthodontist gave to me! I continually strive to stay on the cutting edge of techniques and methods in the industry, and I\'m proud and honored to provide top-quality orthodontic care and specialized orthodontic treatments, including braces and Invisalign<sup>®</sup> clear aligners, to people of all ages in Marinette and the surrounding communities in Eastern Wisconsin.</p>',
		];
		$copy_two_cols_with_image_popup_content_image = [
			'src' => wp_get_attachment_image_src(509, 'medium_large')[0],
			'srcset' => wp_get_attachment_image_src(509, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(509, '1536x1536')[0].' 2x',
			'width' => '705',
			'height' => '700',
			'alt' => 'Dr. Harrison Siu',
			'classes' => ['siu'],
		];
		$copy_two_cols_with_image_popup_content_mobile_image = [
			'src' => wp_get_attachment_image_src(509, 'medium_large')[0],
			'srcset' => wp_get_attachment_image_src(509, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(509, '1536x1536')[0].' 2x',
			'width' => '705',
			'height' => '700',
			'alt' => 'Dr. Harrison Siu',
			'classes' => ['siu'],
		];
		$copy_two_cols_with_image_popup_content_overlap_box = [
			'heading' => 'Harrison Siu, DDS, MS',
			'copy' => ' <p class="desktop">In my free time, I love spending time outdoors and playing basketball, soccer, badminton, mountain biking in the summer, and snowboarding in the winter. My family and I are originally from Toronto, Canada, where I grew up playing the violin. I’ve now started teaching myself how to play the guitar, and it’s been quite the fun challenge! On the weekends, you can usually find me spending time at one of the awesome local coffee shops with even better company.</p>',
			'mobile_copy' => ' <p class="mobile">In my free time, I love spending time outdoors and playing basketball, soccer, badminton, mountain biking in the summer, and snowboarding in the winter. My family and I are originally from Toronto, Canada, where I grew up playing the violin. I’ve now started teaching myself how to play the guitar, and it’s been quite the fun challenge! On the weekends, you can usually find me spending time at one of the awesome local coffee shops with even better company.</p>'
		];
		$tri_carousel_images = [
			[
				'src' => wp_get_attachment_image_src(493, 'medium_large')[0],
				'srcset' => wp_get_attachment_image_src(493, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(493, '1536x1536')[0].' 2x',
				'sizes' => '100vw',
				'alt' => '',
				'classes' => []
			],
			[
				'src' => wp_get_attachment_image_src(494, 'medium_large')[0],
				'srcset' => wp_get_attachment_image_src(494, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(494, '1536x1536')[0].' 2x',
				'sizes' => '100vw',
				'alt' => '',
				'classes' => []
			],
			[
				'src' => wp_get_attachment_image_src(495, 'medium_large')[0],
				'srcset' => wp_get_attachment_image_src(495, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(495, '1536x1536')[0].' 2x',
				'sizes' => '100vw',
				'alt' => '',
				'classes' => []
			],
			[
				'src' => wp_get_attachment_image_src(496, 'medium_large')[0],
				'srcset' => wp_get_attachment_image_src(496, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(496, '1536x1536')[0].' 2x',
				'sizes' => '100vw',
				'alt' => '',
				'classes' => []
			],
			[
				'src' => wp_get_attachment_image_src(497, 'medium_large')[0],
				'srcset' => wp_get_attachment_image_src(497, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(497, '1536x1536')[0].' 2x',
				'sizes' => '100vw',
				'alt' => '',
				'classes' => []
			],
			[
				'src' => wp_get_attachment_image_src(498, 'medium_large')[0],
				'srcset' => wp_get_attachment_image_src(498, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(498, '1536x1536')[0].' 2x',
				'sizes' => '100vw',
				'alt' => '',
				'classes' => []
			],
		];
		$professional_associations_logos_row1 = [
			[
				'image' => [
					'src' => wp_get_attachment_image_src(530, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(530, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(530, '1536x1536')[0].' 2x',
					'sizes' => '40vw',
					'width' => '330',
					'height' => '200',
					'alt' => '',
					'classes' => [],
				],
				'heading' => 'University of Illinois at Chicago',
				'copy' => 'Master of Science in Oral Science And Certificate in Orthodontics<br>University of Illinois at Chicago College of Dentistry<br>Chicago, IL'
			],
			[
				'image' => [
					'src' => wp_get_attachment_image_src(533, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(533, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(533, '1536x1536')[0].' 2x',
					'sizes' => '40vw',
					'width' => '330',
					'height' => '200',
					'alt' => '',
					'classes' => [],
				],
				'heading' => 'University of Rochester',
				'copy' => 'General Dental Practice Residency<br>Eastman Institute for Oral Health<br>University of Rochester<br>Rochester, NY'
			],
			[
				'image' => [
					'src' => wp_get_attachment_image_src(535, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(535, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(535, '1536x1536')[0].' 2x',
					'sizes' => '40vw',
					'width' => '330',
					'height' => '200',
					'alt' => '',
					'classes' => [],
				],
				'heading' => 'University of Western Ontario',
				'copy' => 'Doctor of Dental Surgery<br>University of Western Ontario<br>London, Ontario, Canada'
			],
			[
				'image' => [
					'src' => wp_get_attachment_image_src(534, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(534, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(534, '1536x1536')[0].' 2x',
					'sizes' => '40vw',
					'width' => '330',
					'height' => '200',
					'alt' => '',
					'classes' => [],
				],
				'heading' => 'Life Sciences University of Toronto',
				'copy' => 'Honours Bachelor of Science<br>Life Sciences University of Toronto<br>Toronto, Ontario, Canada'
			],
		];
		$professional_associations_logos_row2 = [
			[
				'image' => [
					'src' => wp_get_attachment_image_src(513, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(513, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(513, '1536x1536')[0].' 2x',
					'sizes' => '40vw',
					'width' => '330',
					'height' => '200',
					'alt' => '',
					'classes' => [],
				],
				'heading' => 'American Association of Orthodontists',
				'copy' => 'Only dentists who successfully complete an accredited orthodontic residency program after dental school are accepted for membership in the American Association of Orthodontists.'
			],
			[
				'image' => [
					'src' => wp_get_attachment_image_src(522, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(522, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(522, '1536x1536')[0].' 2x',
					'sizes' => '40vw',
					'width' => '330',
					'height' => '200',
					'alt' => '',
					'classes' => [],
				],
				'heading' => 'The Wisconsin Society of Orthodontists',
				'copy' => 'The Wisconsin Society of Orthodontists (WSO) is a non-profit corporation over 50 years old, with a membership of approximately 200 orthodontists. We’re recognized as a component of MSO & AAO.'
			],
			[
				'image' => [
					'src' => wp_get_attachment_image_src(521, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(521, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(521, '1536x1536')[0].' 2x',
					'sizes' => '40vw',
					'width' => '330',
					'height' => '200',
					'alt' => '',
					'classes' => [],
				],
				'heading' => 'The Wisconsin Dental Association',
				'copy' => 'The Wisconsin Dental Association has 3,100 member dentists and a number of dental hygienists. The WDA is affiliated with the American Dental Association—the largest and oldest national dental association in the world.'
			],
			[
				'image' => [
					'src' => wp_get_attachment_image_src(514, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(514, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(514, '1536x1536')[0].' 2x',
					'sizes' => '40vw',
					'width' => '330',
					'height' => '200',
					'alt' => '',
					'classes' => [],
				],
				'heading' => 'The American Dental Association',
				'copy' => 'The American Dental Association (ADA) was established in 1859 and now has more than 163,000 members. As the world’s largest and oldest national dental association, the ADA exists to power the profession of dentistry and assist members in advancing the overall oral health of their patients.'
			],
			[
				'image' => [
					'src' => wp_get_attachment_image_src(516, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(516, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(516, '1536x1536')[0].' 2x',
					'sizes' => '40vw',
					'width' => '330',
					'height' => '200',
					'alt' => '',
					'classes' => [],
				],
				'heading' => 'Chicago Dental Society',
				'copy' => 'The Chicago Dental Society was organized in 1864 and incorporated in 1878 to encourage the improvement of the health of the public, to promote the art and science of dentistry and to represent the interest of the members of the profession and the public that it serves.'
			],
			[
				'image' => [
					'src' => wp_get_attachment_image_src(519, 'medium_large')[0],
					'srcset' => wp_get_attachment_image_src(519, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(519, '1536x1536')[0].' 2x',
					'sizes' => '40vw',
					'width' => '330',
					'height' => '200',
					'alt' => '',
					'classes' => [],
				],
				'heading' => 'Ontario Dental Association',
				'copy' => 'Founded on January 3, 1867, the Ontario Dental Association is committed to providing innovative, inspired leadership, delivering exceptional value, and being the most respected leader in the dental profession.'
			],
		];
		$maps_bio_location_info_box_copy = 'Dr. Harrison Siu creates amazing smiles in Marinette';
		$hero_full_image = [
			'src' => wp_get_attachment_image_src(935, '1536x1536')[0],
			'srcset' => wp_get_attachment_image_src(935, '1536x1536')[0].' 1x, '.wp_get_attachment_image_src(935, '1536x1536')[0].' 2x',
			'sizes' => '100vw',
			'alt' => '',
			'width' => '1536',
			'height' => '864',
			'classes' => ['desktop', 'siu'],
		];
		$hero_full_mobile_image =[
			'src' => wp_get_attachment_image_src(935, 'medium_large')[0],
			'srcset' => wp_get_attachment_image_src(935, 'medium_large')[0].' 1x, '.wp_get_attachment_image_src(935, '1536x1536')[0].' 2x',
			'sizes' => '100vw',
			'alt' => '',
			'width' => '768',
			'height' => '432',
			'classes' => ['mobile', 'siu'],
		];
		$hero_full_class = ['bio'];
		$selected_location = 16;
	break;
}

shuffle($tri_carousel_images);

partial('section.copy.two-cols-with-image-popup-content', [
	'article' => $copy_two_cols_with_image_popup_content_article,
	'image' => $copy_two_cols_with_image_popup_content_image,
	'mobile_image' => $copy_two_cols_with_image_popup_content_mobile_image,
	'overlap_box' => $copy_two_cols_with_image_popup_content_overlap_box,
]);
partial('section.tri-carousel', [
	'images' => $tri_carousel_images,
]);
partial('section.professional-associations', [
	'logos_row1' => $professional_associations_logos_row1,
	'logos_row2' => $professional_associations_logos_row2,
]);
partial('section.maps.bio-location',
	[
		'location_id' => get_the_id(),
		'info_box_copy' => $maps_bio_location_info_box_copy,
        'relative_url' => $relative_url,
        'selected_location' => $selected_location,
	]
);
partial('section.hero.full', [
	'image' => $hero_full_image,
	'mobile_image' => $hero_full_mobile_image,
	'classes' => $hero_full_class,
]);

get_footer();
