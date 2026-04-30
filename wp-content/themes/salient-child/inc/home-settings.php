<?php
/**
 * Home Page – Meta Box field definitions.
 * All sections of front-page.php are editable from the WordPress post editor for page ID 2.
 */

/* ── Fields ──────────────────────────────────────────────────────────────── */
add_filter( 'rwmb_meta_boxes', function ( $meta_boxes ) {

	$sp = [ 'post_types' => ['page'], 'include' => [ 'ID' => [ (int) get_option('page_on_front') ] ] ];

	// ── Header ───────────────────────────────────────────────────────────
	$meta_boxes[] = $sp + [
		'title'  => '1 · Header',
		'id'     => 'home_header_mb',
		'fields' => [
			[ 'id' => 'home_header_logo', 'name' => 'Header logo (light)', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'home_header_logo_alt', 'name' => 'Header logo alt text', 'type' => 'text', 'std' => 'Slingshot' ],
			[ 'id' => 'home_header_cta_text', 'name' => 'CTA label', 'type' => 'text', 'std' => "Let's talk" ],
			[ 'id' => 'home_header_cta_url',  'name' => 'CTA URL',   'type' => 'text',  'std' => '/contact' ],
			[ 'id' => 'home_header_mobile_menu_label', 'name' => 'Mobile menu label', 'type' => 'text', 'std' => 'Menu' ],
		],
	];

	// ── Hero ─────────────────────────────────────────────────────────────
	$meta_boxes[] = $sp + [
		'title'  => '2 · Hero',
		'id'     => 'home_hero',
		'fields' => [
			[ 'id' => 'home_hero_title',      'name' => 'Heading',             'type' => 'text',         'std' => 'For Big Kids &amp; Daredevils' ],
			[ 'id' => 'home_hero_subtitle',   'name' => 'Sub-heading',         'type' => 'text',         'std' => 'A Tech Consultancy &amp; Creation Studio' ],
			[ 'id' => 'home_hero_cta_text',   'name' => 'CTA label',           'type' => 'text',         'std' => 'Book a call' ],
			[ 'id' => 'home_hero_cta_url',    'name' => 'CTA URL',             'type' => 'text',          'std' => '/contact' ],
			[ 'id' => 'home_hero_card_image', 'name' => 'Card photo',          'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'home_hero_card_text',  'name' => 'Card overlay text',   'type' => 'text',         'std' => '20 Years of Software &amp; Tech Expertise, at Your Service' ],
		],
	];

	// ── Logos strip ──────────────────────────────────────────────────────
	$meta_boxes[] = $sp + [
		'title'  => '3 · Logos Strip',
		'id'     => 'home_logos_mb',
		'fields' => [
			[
				'id'   => 'home_logos_html',
				'name' => 'Logos strip HTML',
				'type' => 'textarea',
				'rows' => 8,
				'desc' => 'Optional. Paste ready slider markup here, e.g. <span class="logo-item"><img src="..." alt="..."></span>. When filled, this HTML is used instead of the logo rows below.',
			],
			[
				'id'         => 'home_logos',
				'name'       => 'Client logos',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add logo',
				'fields'     => [
					[ 'id' => 'text',  'name' => 'Company name',        'type' => 'text' ],
					[ 'id' => 'image', 'name' => 'Logo image (optional)', 'type' => 'single_image', 'force_delete' => false ],
				],
			],
		],
	];

	// ── Services section ─────────────────────────────────────────────────
	$meta_boxes[] = $sp + [
		'title'  => '4 · Services Section',
		'id'     => 'home_services_mb',
		'fields' => [
			[ 'id' => 'home_services_label',    'name' => 'Label',    'type' => 'text',     'std' => 'What We Do' ],
			[ 'id' => 'home_services_title',    'name' => 'Heading',  'type' => 'textarea', 'std' => 'We help companies move faster, think bigger, and build smarter with modern solutions that drive real business momentum.' ],
			[ 'id' => 'home_services_cta_text', 'name' => 'CTA label','type' => 'text',     'std' => 'Our Services' ],
			[ 'id' => 'home_services_cta_url',  'name' => 'CTA URL',  'type' => 'text',      'std' => '/services' ],
			[
				'id'         => 'home_services',
				'name'       => 'Service cards',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add service card',
				'fields'     => [
					[ 'id' => 'title',    'name' => 'Title',       'type' => 'text' ],
					[ 'id' => 'desc',     'name' => 'Description', 'type' => 'textarea' ],
					[ 'id' => 'url',      'name' => 'Link URL',    'type' => 'text' ],
					[
						'id'      => 'style',
						'name'    => 'Card style',
						'type'    => 'select',
						'options' => [
							'featured' => 'Featured (purple)',
							'dark'     => 'Dark',
							'light'    => 'Light',
						],
						'std'     => 'light',
					],
					[ 'id' => 'icon_svg', 'name' => 'Icon SVG code (optional)', 'type' => 'textarea', 'rows' => 4 ],
				],
			],
		],
	];

	// ── About / Stats ────────────────────────────────────────────────────
	$meta_boxes[] = $sp + [
		'title'  => '5 · About &amp; Stats',
		'id'     => 'home_about_mb',
		'fields' => [
			[ 'id' => 'home_about_image',    'name' => 'Photo',        'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'home_about_title',    'name' => 'Heading',      'type' => 'text',         'std' => 'Built for Real-World Delivery' ],
			[ 'id' => 'home_about_desc',     'name' => 'Description',  'type' => 'textarea',     'std' => 'Slingshot was built by a collective of strategists, creatives, and data scientists who care deeply about outcomes.' ],
			[ 'id' => 'home_about_btn_text', 'name' => 'Button label', 'type' => 'text',         'std' => 'Get in Touch' ],
			[ 'id' => 'home_about_btn_url',  'name' => 'Button URL',   'type' => 'text',          'std' => '/contact' ],
			[ 'id' => 'home_about_tagline',  'name' => 'Tagline',      'type' => 'textarea',     'std' => 'Slingshot helps organizations launch smarter products, modernize systems, and solve real-world challenges faster.' ],
			[
				'id'         => 'home_stats',
				'name'       => 'Stats',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add stat',
				'fields'     => [
					[ 'id' => 'number', 'name' => 'Number (e.g. 15+)', 'type' => 'text' ],
					[ 'id' => 'label',  'name' => 'Label',             'type' => 'text' ],
				],
			],
		],
	];

	// ── Work portfolio section ───────────────────────────────────────────
	$meta_boxes[] = $sp + [
		'title'  => '6 · Work Portfolio Section',
		'id'     => 'home_work_mb',
		'fields' => [
			[ 'id' => 'home_work_title',        'name' => 'Section heading (HTML allowed, use &lt;br&gt; for line break)', 'type' => 'textarea', 'rows' => 2, 'std' => 'From Solution<br>to Success Stories' ],
			[ 'id' => 'home_work_cta_text',     'name' => 'CTA label',       'type' => 'text', 'std' => 'All Work' ],
			[ 'id' => 'home_work_cta_url',      'name' => 'CTA URL',         'type' => 'text',  'std' => '/work' ],
			[
				'id'         => 'home_work_posts',
				'name'       => 'Featured portfolio posts',
				'type'       => 'post',
				'post_type'  => 'portfolio',
				'field_type' => 'select_advanced',
				'multiple'   => true,
				'query_args' => [
					'post_status'    => 'publish',
					'posts_per_page' => -1,
				],
				'desc'       => 'Optional. If empty, Home uses design-matched featured portfolio defaults, then falls back to latest portfolio posts.',
			],
			[ 'id' => 'home_work_empty_notice', 'name' => 'Fallback text when no portfolio items (optional)', 'type' => 'text', 'std' => '' ],
			[
				'id'         => 'home_work_fallback',
				'name'       => 'Fallback project cards (used when no Portfolio posts exist)',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add project card',
				'fields'     => [
					[ 'id' => 'image',    'name' => 'Project image',     'type' => 'single_image', 'force_delete' => false ],
					[ 'id' => 'title',    'name' => 'Project title',      'type' => 'text' ],
					[ 'id' => 'subtitle', 'name' => 'Short description',  'type' => 'text' ],
					[ 'id' => 'tags',     'name' => 'Tags (comma-separated)', 'type' => 'text' ],
					[ 'id' => 'url',      'name' => 'Link URL',           'type' => 'text' ],
				],
			],
		],
	];

	// ── Events section ───────────────────────────────────────────────────
	$meta_boxes[] = $sp + [
		'title'  => '7 · Events Section',
		'id'     => 'home_events_mb',
		'fields' => [
			[ 'id' => 'home_events_title',   'name' => 'Section heading', 'type' => 'text',     'std' => 'Join the Conversation' ],
			[ 'id' => 'home_events_desc',    'name' => 'Description',     'type' => 'textarea', 'std' => "We don't just build, we share. Explore upcoming events for leaders building in AI, product, and tech strategy." ],
			[ 'id' => 'home_events_cta_text','name' => 'All Events label','type' => 'text',     'std' => 'All Events' ],
			[ 'id' => 'home_events_cta_url', 'name' => 'All Events URL',  'type' => 'text',      'std' => '/events' ],
			[ 'id' => 'home_events_register_text', 'name' => 'Register label', 'type' => 'text', 'std' => 'Register' ],
			[
				'id'         => 'home_events_posts',
				'name'       => 'Featured event posts',
				'type'       => 'post',
				'post_type'  => 'tribe_events',
				'field_type' => 'select_advanced',
				'multiple'   => true,
				'query_args' => [
					'post_status'    => 'publish',
					'posts_per_page' => -1,
				],
				'desc'       => 'Optional. If empty, Home shows upcoming Events posts automatically.',
			],
			[
				'id'         => 'home_events',
				'name'       => 'Event cards',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add event',
				'fields'     => [
					[ 'id' => 'image',         'name' => 'Photo',            'type' => 'single_image', 'force_delete' => false ],
					[ 'id' => 'tag',           'name' => 'Tag (e.g. Conference)', 'type' => 'text' ],
					[ 'id' => 'title',         'name' => 'Title',            'type' => 'text' ],
					[ 'id' => 'date_location', 'name' => 'Date &amp; location', 'type' => 'text' ],
					[ 'id' => 'url',           'name' => 'Link URL',         'type' => 'text' ],
				],
			],
			[
				'id'         => 'home_events_fallback',
				'name'       => 'Fallback cards (used when no Event cards exist)',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add fallback card',
				'fields'     => [
					[ 'id' => 'image',         'name' => 'Photo',            'type' => 'single_image', 'force_delete' => false ],
					[ 'id' => 'tag',           'name' => 'Tag',              'type' => 'text' ],
					[ 'id' => 'title',         'name' => 'Title',            'type' => 'text' ],
					[ 'id' => 'date_location', 'name' => 'Date & location',  'type' => 'text' ],
					[ 'id' => 'url',           'name' => 'Link URL',         'type' => 'text' ],
				],
			],
		],
	];

	// ── Blog / Insights section ──────────────────────────────────────────
	$meta_boxes[] = $sp + [
		'title'  => '8 · Blog / Insights Section',
		'id'     => 'home_blog_mb',
		'fields' => [
			[ 'id' => 'home_blog_title', 'name' => 'Heading',     'type' => 'text',     'std' => 'Insights That Move Business Forward' ],
			[ 'id' => 'home_blog_desc',  'name' => 'Description', 'type' => 'textarea', 'std' => 'Get actionable ideas on software strategy, AI adoption, and scaling product delivery—straight from the minds of our team.' ],
			[ 'id' => 'home_blog_cta_text', 'name' => 'CTA label', 'type' => 'text',     'std' => 'All Insights' ],
			[ 'id' => 'home_blog_cta_url',  'name' => 'CTA URL',   'type' => 'text',      'std' => '/blog' ],
			[
				'id'         => 'home_blog_posts',
				'name'       => 'Featured blog posts',
				'type'       => 'post',
				'post_type'  => 'post',
				'field_type' => 'select_advanced',
				'multiple'   => true,
				'query_args' => [
					'post_status'    => 'publish',
					'posts_per_page' => -1,
				],
				'desc'       => 'Optional. If empty, Home uses design-matched featured insight defaults, then falls back to latest posts.',
			],
			[
				'id'         => 'home_blog_fallback',
				'name'       => 'Fallback cards (used when no Blog posts exist)',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add fallback card',
				'fields'     => [
					[ 'id' => 'tag',        'name' => 'Tag',           'type' => 'text' ],
					[ 'id' => 'title',      'name' => 'Title',         'type' => 'text' ],
					[ 'id' => 'desc',       'name' => 'Description',   'type' => 'textarea' ],
					[ 'id' => 'url',        'name' => 'Link URL',      'type' => 'text' ],
					[ 'id' => 'badge_text', 'name' => 'Badge text',    'type' => 'text' ],
					[ 'id' => 'image',      'name' => 'Photo',         'type' => 'single_image', 'force_delete' => false ],
					[ 'id' => 'bg_style',   'name' => 'Background CSS (optional if no image)', 'type' => 'text' ],
				],
			],
		],
	];

	// ── CTA section ──────────────────────────────────────────────────────
	$meta_boxes[] = $sp + [
		'title'  => '9 · CTA Section',
		'id'     => 'home_cta_mb',
		'fields' => [
			[ 'id' => 'home_cta_mascot',   'name' => 'Mascot image',  'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'home_cta_title',    'name' => 'Heading',       'type' => 'text',         'std' => 'Ready to Launch Something Bold?' ],
			[ 'id' => 'home_cta_desc',     'name' => 'Description',   'type' => 'textarea',     'std' => "Let's talk about how we help teams like yours bring new products to life—and make them work in the real world." ],
			[ 'id' => 'home_cta_btn_text', 'name' => 'Button label',  'type' => 'text',         'std' => "Let's talk" ],
			[ 'id' => 'home_cta_btn_url',  'name' => 'Button URL',    'type' => 'text',          'std' => '/contact' ],
		],
	];

	$meta_boxes[] = $sp + [
		'title'  => '10 · Global Modals (Contact / Subscribe / Video)',
		'id'     => 'home_global_modals_mb',
		'fields' => [
			[ 'id' => 'sl_contact_modal_heading', 'name' => 'Contact modal heading', 'type' => 'text', 'std' => 'Hit us up' ],
			[ 'id' => 'sl_contact_modal_looking_options', 'name' => 'Contact modal "What are you looking for?" options (one per line)', 'type' => 'textarea', 'rows' => 8, 'std' => "General Inquiry\nProduct Development\nMobile App Development\nWeb Development\nDesign\nAI / Machine Learning\nTeam Augmentation\nConsulting" ],
			[ 'id' => 'sl_contact_modal_submit', 'name' => 'Contact modal submit label', 'type' => 'text', 'std' => "Let's Talk →" ],
			[ 'id' => 'sl_contact_modal_gf_id', 'name' => 'Contact modal Gravity Form ID', 'type' => 'number', 'min' => 0, 'std' => 0, 'desc' => 'Leave 0 to use the editable fallback fields below.' ],
			[ 'id' => 'sl_contact_modal_select_placeholder', 'name' => 'Contact modal select placeholder', 'type' => 'text', 'std' => 'What are you looking for?' ],
			[ 'id' => 'sl_contact_modal_first_placeholder', 'name' => 'Contact modal first name placeholder', 'type' => 'text', 'std' => 'First Name*' ],
			[ 'id' => 'sl_contact_modal_last_placeholder', 'name' => 'Contact modal last name placeholder', 'type' => 'text', 'std' => 'Last Name*' ],
			[ 'id' => 'sl_contact_modal_company_placeholder', 'name' => 'Contact modal company placeholder', 'type' => 'text', 'std' => 'Company' ],
			[ 'id' => 'sl_contact_modal_email_placeholder', 'name' => 'Contact modal email placeholder', 'type' => 'text', 'std' => 'Email*' ],
			[ 'id' => 'sl_contact_modal_phone_placeholder', 'name' => 'Contact modal phone placeholder', 'type' => 'text', 'std' => 'Phone*' ],
			[ 'id' => 'sl_contact_modal_message_placeholder', 'name' => 'Contact modal message placeholder', 'type' => 'textarea', 'rows' => 3, 'std' => "How can we help?\nTell us a little bit about what you have going on!" ],
			[ 'id' => 'sl_subscribe_modal_heading', 'name' => 'Subscribe modal heading', 'type' => 'textarea', 'rows' => 3, 'std' => 'Get the latest news from Slingshot with our bi-weekly newsletter.' ],
			[ 'id' => 'sl_subscribe_modal_first_placeholder', 'name' => 'Subscribe first name placeholder', 'type' => 'text', 'std' => 'First Name*' ],
			[ 'id' => 'sl_subscribe_modal_last_placeholder', 'name' => 'Subscribe last name placeholder', 'type' => 'text', 'std' => 'Last Name*' ],
			[ 'id' => 'sl_subscribe_modal_email_placeholder', 'name' => 'Subscribe email placeholder', 'type' => 'text', 'std' => 'Email*' ],
			[ 'id' => 'sl_subscribe_modal_submit', 'name' => 'Subscribe modal submit label', 'type' => 'text', 'std' => 'Subscribe →' ],
			[ 'id' => 'sl_video_modal_url', 'name' => 'Video modal URL (YouTube/Vimeo/file)', 'type' => 'text', 'desc' => 'Used by the home hero play button.' ],
		],
	];

	return $meta_boxes;
} );
