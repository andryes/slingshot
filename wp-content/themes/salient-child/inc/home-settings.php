<?php
/**
 * Home Page – Meta Box settings page + field definitions.
 * All sections of front-page.php are editable from Appearance → Home Page.
 */

/* ── Enable required extensions ─────────────────────────────────────────── */
add_filter( 'mb_aio_extensions', function ( $extensions ) {
	$extensions[] = 'mb-settings-page';
	$extensions[] = 'meta-box-group';
	return array_unique( $extensions );
} );

/* ── Settings page ───────────────────────────────────────────────────────── */
add_filter( 'mb_settings_pages', function ( $pages ) {
	$pages[] = [
		'id'          => 'slingshot_home',
		'option_name' => 'slingshot_home',
		'menu_title'  => 'Home Page',
		'parent'      => 'themes.php',
		'capability'  => 'manage_options',
		'icon_url'    => 'dashicons-admin-home',
	];
	return $pages;
} );

/* ── Fields ──────────────────────────────────────────────────────────────── */
add_filter( 'rwmb_meta_boxes', function ( $meta_boxes ) {

	$sp = [ 'settings_pages' => [ 'slingshot_home' ] ];

	// ── Hero ─────────────────────────────────────────────────────────────
	$meta_boxes[] = $sp + [
		'title'  => '1 · Hero',
		'id'     => 'home_hero',
		'fields' => [
			[ 'id' => 'home_hero_title',      'name' => 'Heading',             'type' => 'text',         'std' => 'For Big Kids &amp; Daredevils' ],
			[ 'id' => 'home_hero_subtitle',   'name' => 'Sub-heading',         'type' => 'text',         'std' => 'A Tech Consultancy &amp; Creation Studio' ],
			[ 'id' => 'home_hero_cta_text',   'name' => 'CTA label',           'type' => 'text',         'std' => 'Book a call' ],
			[ 'id' => 'home_hero_cta_url',    'name' => 'CTA URL',             'type' => 'url',          'std' => '/contact' ],
			[ 'id' => 'home_hero_card_image', 'name' => 'Card photo',          'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'home_hero_card_text',  'name' => 'Card overlay text',   'type' => 'text',         'std' => '20 Years of Software &amp; Tech Expertise, at Your Service' ],
		],
	];

	// ── Logos strip ──────────────────────────────────────────────────────
	$meta_boxes[] = $sp + [
		'title'  => '2 · Logos Strip',
		'id'     => 'home_logos_mb',
		'fields' => [
			[
				'id'         => 'home_logos',
				'name'       => 'Client logos',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add logo',
				'fields'     => [
					[ 'id' => 'text', 'name' => 'Company name', 'type' => 'text' ],
				],
			],
		],
	];

	// ── Services section ─────────────────────────────────────────────────
	$meta_boxes[] = $sp + [
		'title'  => '3 · Services Section',
		'id'     => 'home_services_mb',
		'fields' => [
			[ 'id' => 'home_services_label',    'name' => 'Label',    'type' => 'text',     'std' => 'What We Do' ],
			[ 'id' => 'home_services_title',    'name' => 'Heading',  'type' => 'textarea', 'std' => 'We help companies move faster, think bigger, and build smarter with modern solutions that drive real business momentum.' ],
			[ 'id' => 'home_services_cta_text', 'name' => 'CTA label','type' => 'text',     'std' => 'Our Services' ],
			[ 'id' => 'home_services_cta_url',  'name' => 'CTA URL',  'type' => 'url',      'std' => '/services' ],
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
					[ 'id' => 'url',      'name' => 'Link URL',    'type' => 'url' ],
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
		'title'  => '4 · About &amp; Stats',
		'id'     => 'home_about_mb',
		'fields' => [
			[ 'id' => 'home_about_image',    'name' => 'Photo',        'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'home_about_title',    'name' => 'Heading',      'type' => 'text',         'std' => 'Built for Real-World Delivery' ],
			[ 'id' => 'home_about_desc',     'name' => 'Description',  'type' => 'textarea',     'std' => 'Slingshot was built by a collective of strategists, creatives, and data scientists who care deeply about outcomes.' ],
			[ 'id' => 'home_about_btn_text', 'name' => 'Button label', 'type' => 'text',         'std' => 'Get in Touch' ],
			[ 'id' => 'home_about_btn_url',  'name' => 'Button URL',   'type' => 'url',          'std' => '/contact' ],
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

	// ── Events section ───────────────────────────────────────────────────
	$meta_boxes[] = $sp + [
		'title'  => '5 · Events Section',
		'id'     => 'home_events_mb',
		'fields' => [
			[ 'id' => 'home_events_title',   'name' => 'Section heading', 'type' => 'text',     'std' => 'Join the Conversation' ],
			[ 'id' => 'home_events_desc',    'name' => 'Description',     'type' => 'textarea', 'std' => "We don't just build, we share. Explore upcoming events for leaders building in AI, product, and tech strategy." ],
			[ 'id' => 'home_events_cta_url', 'name' => 'All Events URL',  'type' => 'url',      'std' => '/events' ],
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
					[ 'id' => 'url',           'name' => 'Link URL',         'type' => 'url' ],
				],
			],
		],
	];

	// ── Blog / Insights section ──────────────────────────────────────────
	$meta_boxes[] = $sp + [
		'title'  => '6 · Blog / Insights Section',
		'id'     => 'home_blog_mb',
		'fields' => [
			[ 'id' => 'home_blog_title', 'name' => 'Heading',     'type' => 'text',     'std' => 'Insights That Move Business Forward' ],
			[ 'id' => 'home_blog_desc',  'name' => 'Description', 'type' => 'textarea', 'std' => 'Get actionable ideas on software strategy, AI adoption, and scaling product delivery—straight from the minds of our team.' ],
		],
	];

	// ── CTA section ──────────────────────────────────────────────────────
	$meta_boxes[] = $sp + [
		'title'  => '7 · CTA Section',
		'id'     => 'home_cta_mb',
		'fields' => [
			[ 'id' => 'home_cta_mascot',   'name' => 'Mascot image',  'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'home_cta_title',    'name' => 'Heading',       'type' => 'text',         'std' => 'Ready to Launch Something Bold?' ],
			[ 'id' => 'home_cta_desc',     'name' => 'Description',   'type' => 'textarea',     'std' => "Let's talk about how we help teams like yours bring new products to life—and make them work in the real world." ],
			[ 'id' => 'home_cta_btn_text', 'name' => 'Button label',  'type' => 'text',         'std' => "Let's talk" ],
			[ 'id' => 'home_cta_btn_url',  'name' => 'Button URL',    'type' => 'url',          'std' => '/contact' ],
		],
	];

	return $meta_boxes;
} );
