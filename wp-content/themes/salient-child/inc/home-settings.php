<?php
/**
 * Home Page – Meta Box field definitions.
 * All sections of front-page.php are editable from the WordPress post editor for page ID 2.
 */

/* ── Fields ──────────────────────────────────────────────────────────────── */
add_filter( 'rwmb_meta_boxes', function ( $meta_boxes ) {

	$sp = [ 'post_types' => ['page'], 'include' => [ 'ID' => [ (int) get_option('page_on_front') ] ] ];

	$note_field = static function ( $html ) {
		return [
			'type' => 'custom_html',
			'std'  => $html,
		];
	};

	$safe_note = $note_field(
		'<div class="sl-home-admin-note sl-home-admin-note--normal"><strong>Safe editing mode.</strong><br>' .
		'Edit the visible text, video, and selected Work / Events / Blog posts here. Layout, icons, logos, fixed buttons, and fallback data are locked away to protect the page design.</div>'
	);

	$advanced_note = $note_field(
		'<div class="sl-home-admin-note sl-home-admin-note--advanced"><strong>Advanced / fallback, better not to touch.</strong><br>' .
		'These fields are safety nets or technical overrides. They are hidden in normal editing mode.</div>'
	);

	// ── Safe editor guide ────────────────────────────────────────────────
	$meta_boxes[] = $sp + [
		'title'  => 'Home Page · Safe editing',
		'id'     => 'home_editor_guide_mb',
		'fields' => [ $safe_note ],
	];

	// ── Hero ─────────────────────────────────────────────────────────────
	$meta_boxes[] = $sp + [
		'title'  => 'Hero',
		'id'     => 'home_hero',
		'fields' => [
			[ 'id' => 'home_hero_title',      'name' => 'Heading',             'type' => 'text',         'std' => 'For Big Kids &amp; Daredevils' ],
			[ 'id' => 'home_hero_subtitle',   'name' => 'Sub-heading',         'type' => 'text',         'std' => 'A Tech Consultancy &amp; Creation Studio' ],
			[ 'id' => 'home_hero_card_image', 'name' => 'Video card photo',    'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'home_hero_card_text',  'name' => 'Video card text',     'type' => 'text',         'std' => '20 Years of Software &amp; Tech Expertise, at Your Service' ],
			[ 'id' => 'sl_video_modal_url',   'name' => 'Video URL',           'type' => 'text',         'std' => '/wp-content/uploads/2019/12/Slingshot-1.mp4', 'desc' => 'YouTube, Vimeo, or direct video file URL opened by the hero play button.' ],
		],
	];

	// ── Services section ─────────────────────────────────────────────────
	$meta_boxes[] = $sp + [
		'title'  => 'Services',
		'id'     => 'home_services_mb',
		'fields' => [
			[ 'id' => 'home_services_title', 'name' => 'Section heading', 'type' => 'textarea', 'std' => 'We help companies move faster, think bigger, and build smarter with modern solutions that drive real business momentum.' ],
			[
				'id'            => 'home_services',
				'name'          => 'Service cards',
				'type'          => 'group',
				'class'         => 'sl-admin-fixed-service-cards',
				'clone'         => true,
				'sort_clone'    => true,
				'collapsible'   => true,
				'default_state' => 'collapsed',
				'group_title'   => [ 'field' => 'title' ],
				'add_button'    => '+ Add service card',
				'desc'          => 'Four fixed cards. Edit title, description, and link only.',
				'fields'        => [
					[ 'id' => 'title',    'name' => 'Title',       'type' => 'text' ],
					[ 'id' => 'desc',     'name' => 'Description', 'type' => 'textarea' ],
					[ 'id' => 'url',      'name' => 'Link URL',    'type' => 'text' ],
					[
						'id'      => 'style',
						'name'    => 'Card style',
						'type'    => 'select',
						'class'   => 'sl-admin-keep-hidden',
						'options' => [
							'featured' => 'Featured (purple)',
							'dark'     => 'Dark',
							'light'    => 'Light',
						],
						'std'     => 'light',
					],
					[ 'id' => 'icon_svg', 'name' => 'Icon SVG code', 'type' => 'textarea', 'rows' => 4, 'class' => 'sl-admin-keep-hidden' ],
				],
			],
		],
	];

	// ── About copy ───────────────────────────────────────────────────────
	$meta_boxes[] = $sp + [
		'title'  => 'About Copy',
		'id'     => 'home_about_mb',
		'fields' => [
			[ 'id' => 'home_about_title',   'name' => 'Heading',     'type' => 'text',     'std' => 'Built for Real-World Delivery' ],
			[ 'id' => 'home_about_desc',    'name' => 'Description', 'type' => 'textarea', 'std' => 'Slingshot was built by a collective of strategists, creatives, and data scientists who care deeply about outcomes.' ],
			[ 'id' => 'home_about_tagline', 'name' => 'Tagline',     'type' => 'textarea', 'std' => 'Slingshot helps organizations launch smarter products, modernize systems, and solve real-world challenges faster.' ],
		],
	];

	// ── Dynamic post selections ──────────────────────────────────────────
	$meta_boxes[] = $sp + [
		'title'  => 'Featured Work / Events / Blog',
		'id'     => 'home_featured_content_mb',
		'fields' => [
			[
				'id'         => 'home_work_posts',
				'name'       => 'Work posts',
				'type'       => 'post',
				'post_type'  => 'portfolio',
				'field_type' => 'select_advanced',
				'multiple'   => true,
				'query_args' => [
					'post_status'    => 'publish',
					'posts_per_page' => -1,
				],
				'desc'       => 'Portfolio posts shown in the Work carousel.',
			],
			[
				'id'         => 'home_events_posts',
				'name'       => 'Event posts',
				'type'       => 'post',
				'post_type'  => 'tribe_events',
				'field_type' => 'select_advanced',
				'multiple'   => true,
				'query_args' => [
					'post_status'    => 'publish',
					'posts_per_page' => -1,
				],
				'desc'       => 'Event posts shown in the Events section.',
			],
			[
				'id'         => 'home_blog_posts',
				'name'       => 'Blog posts',
				'type'       => 'post',
				'post_type'  => 'post',
				'field_type' => 'select_advanced',
				'multiple'   => true,
				'query_args' => [
					'post_status'    => 'publish',
					'posts_per_page' => -1,
				],
				'desc'       => 'Blog / Insight posts shown on Home.',
			],
		],
	];

	// ── Advanced fixed content ───────────────────────────────────────────
	$meta_boxes[] = $sp + [
		'title'          => 'Advanced / fallback · Fixed content and labels',
		'id'             => 'home_fixed_content_advanced_mb',
		'closed'         => true,
		'default_hidden' => true,
		'fields'         => [
			$advanced_note,
			[ 'id' => 'home_header_logo', 'name' => 'Header logo image (fixed)', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'home_header_logo_alt', 'name' => 'Header logo alt text', 'type' => 'text', 'std' => 'Slingshot' ],
			[ 'id' => 'home_header_cta_text', 'name' => 'Header CTA label', 'type' => 'text', 'std' => "Let's talk" ],
			[ 'id' => 'home_header_cta_url',  'name' => 'Header CTA URL',   'type' => 'text',  'std' => '/contact' ],
			[ 'id' => 'home_header_mobile_menu_label', 'name' => 'Mobile menu label', 'type' => 'text', 'std' => 'Menu' ],
			[ 'id' => 'home_hero_cta_text',   'name' => 'Hero CTA label', 'type' => 'text', 'std' => 'Book a call' ],
			[ 'id' => 'home_hero_cta_url',    'name' => 'Hero CTA URL',   'type' => 'text', 'std' => '/contact' ],
			[ 'id' => 'home_services_label',    'name' => 'Services label',    'type' => 'text', 'std' => 'What We Do' ],
			[ 'id' => 'home_services_cta_text', 'name' => 'Services CTA label','type' => 'text', 'std' => 'Our Services' ],
			[ 'id' => 'home_services_cta_url',  'name' => 'Services CTA URL',  'type' => 'text', 'std' => '/services' ],
			[ 'id' => 'home_about_image',    'name' => 'About photo',        'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'home_about_btn_text', 'name' => 'About button label', 'type' => 'text',         'std' => 'Get in Touch' ],
			[ 'id' => 'home_about_btn_url',  'name' => 'About button URL',   'type' => 'text',         'std' => '/contact' ],
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
			[ 'id' => 'home_work_title',        'name' => 'Work heading (HTML allowed, use &lt;br&gt; for line break)', 'type' => 'textarea', 'rows' => 2, 'std' => 'From Solution<br>to Success Stories' ],
			[ 'id' => 'home_work_cta_text',     'name' => 'Work CTA label',       'type' => 'text', 'std' => 'All Work' ],
			[ 'id' => 'home_work_cta_url',      'name' => 'Work CTA URL',         'type' => 'text', 'std' => '/work' ],
			[ 'id' => 'home_events_title',   'name' => 'Events heading', 'type' => 'text',     'std' => 'Join the Conversation' ],
			[ 'id' => 'home_events_desc',    'name' => 'Events description', 'type' => 'textarea', 'std' => "We don't just build, we share. Explore upcoming events for leaders building in AI, product, and tech strategy." ],
			[ 'id' => 'home_events_cta_text','name' => 'All Events label','type' => 'text',     'std' => 'All Events' ],
			[ 'id' => 'home_events_cta_url', 'name' => 'All Events URL',  'type' => 'text',     'std' => '/events' ],
			[ 'id' => 'home_events_register_text', 'name' => 'Register label', 'type' => 'text', 'std' => 'Register' ],
			[ 'id' => 'home_blog_title', 'name' => 'Blog heading',     'type' => 'text',     'std' => 'Insights That Move Business Forward' ],
			[ 'id' => 'home_blog_desc',  'name' => 'Blog description', 'type' => 'textarea', 'std' => 'Get actionable ideas on software strategy, AI adoption, and scaling product delivery—straight from the minds of our team.' ],
			[ 'id' => 'home_blog_cta_text', 'name' => 'Blog CTA label', 'type' => 'text',     'std' => 'All Insights' ],
			[ 'id' => 'home_blog_cta_url',  'name' => 'Blog CTA URL',   'type' => 'text',     'std' => '/blog' ],
			[ 'id' => 'home_cta_mascot',   'name' => 'CTA mascot image', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'home_cta_title',    'name' => 'CTA heading',       'type' => 'text',     'std' => 'Ready to Launch Something Bold?' ],
			[ 'id' => 'home_cta_desc',     'name' => 'CTA description',   'type' => 'textarea', 'std' => "Let's talk about how we help teams like yours bring new products to life—and make them work in the real world." ],
			[ 'id' => 'home_cta_btn_text', 'name' => 'CTA button label',  'type' => 'text',     'std' => "Let's talk" ],
			[ 'id' => 'home_cta_btn_url',  'name' => 'CTA button URL',    'type' => 'text',     'std' => '/contact' ],
		],
	];

	// ── Advanced logos ──────────────────────────────────────────────────
	$meta_boxes[] = $sp + [
		'title'          => 'Advanced / fallback · Logos',
		'id'             => 'home_logos_advanced_mb',
		'closed'         => true,
		'default_hidden' => true,
		'fields'         => [
			[
				'id'   => 'home_logos_html',
				'name' => 'Live logos HTML list',
				'type' => 'textarea',
				'rows' => 8,
				'desc' => 'Raw live slider markup. Leave untouched unless rebuilding the logo strip.',
			],
			[
				'id'         => 'home_logos',
				'name'       => 'Generated logo rows',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add logo',
				'desc'       => 'Backup data for generating the strip if the live Logos HTML list is empty.',
				'fields'     => [
					[ 'id' => 'text',  'name' => 'Company name',        'type' => 'text' ],
					[ 'id' => 'image', 'name' => 'Logo image (optional)', 'type' => 'single_image', 'force_delete' => false ],
				],
			],
		],
	];

	// ── Advanced fallback cards ──────────────────────────────────────────
	$meta_boxes[] = $sp + [
		'title'          => 'Advanced / fallback · Fallback cards',
		'id'             => 'home_fallback_cards_advanced_mb',
		'closed'         => true,
		'default_hidden' => true,
		'fields'         => [
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
			[
				'id'         => 'home_events',
				'name'       => 'Manual event cards',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add event',
				'desc'       => 'Used only as a fallback when Event posts are not selected / available.',
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
				'name'       => 'Deep event fallback cards',
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
			[
				'id'         => 'home_blog_fallback',
				'name'       => 'Fallback blog cards (used when no Blog posts exist)',
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

	// ── Advanced modal labels ────────────────────────────────────────────
	$meta_boxes[] = $sp + [
		'title'          => 'Advanced / fallback · Global modal labels',
		'id'             => 'home_global_modals_mb',
		'closed'         => true,
		'default_hidden' => true,
		'fields'         => [
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
			[ 'id' => 'sl_subscribe_modal_gf_id', 'name' => 'Subscribe modal Gravity Form ID', 'type' => 'number', 'min' => 0, 'std' => 0, 'desc' => 'Leave 0 to use the editable fallback fields.' ],
		],
	];

	return $meta_boxes;
} );

add_action( 'admin_enqueue_scripts', function ( $hook_suffix ) {
	if ( ! in_array( $hook_suffix, [ 'post.php', 'post-new.php' ], true ) ) {
		return;
	}

	$screen = function_exists( 'get_current_screen' ) ? get_current_screen() : null;
	if ( ! $screen || 'page' !== $screen->post_type ) {
		return;
	}

	$post_id  = isset( $_GET['post'] ) ? (int) $_GET['post'] : 0;
	$front_id = (int) get_option( 'page_on_front' );
	if ( ! $front_id || $post_id !== $front_id ) {
		return;
	}

	$show_advanced = isset( $_GET['sl_home_advanced'] ) && current_user_can( 'manage_options' );

	wp_register_style( 'sl-home-admin-fields', false, [], null );
	wp_enqueue_style( 'sl-home-admin-fields' );

	$advanced_box_selectors = '
		#home_fixed_content_advanced_mb,
		#home_logos_advanced_mb,
		#home_fallback_cards_advanced_mb,
		#home_global_modals_mb';

	$advanced_visibility_css = $show_advanced
		? ''
		: $advanced_box_selectors . ' { display: none !important; }';

	wp_add_inline_style(
		'sl-home-admin-fields',
		'
		.sl-home-admin-note {
			border-radius: 8px;
			font-size: 14px;
			line-height: 1.5;
			margin: 4px 0;
			padding: 12px 14px;
		}
		.sl-home-admin-note--normal {
			background: #f0f6fc;
			border: 1px solid #c5d9ed;
			color: #1d2327;
		}
		.sl-home-admin-note--advanced {
			background: #fcf0f1;
			border: 1px solid #facfd2;
			color: #1d2327;
		}
		.sl-admin-keep-hidden {
			display: none !important;
		}
		.sl-admin-fixed-service-cards .add-clone,
		.sl-admin-fixed-service-cards .remove-clone,
		.sl-admin-fixed-service-cards .rwmb-clone-icon,
		.sl-admin-fixed-service-cards .rwmb-group-remove {
			display: none !important;
		}
		.sl-admin-fixed-service-cards .rwmb-group-title-wrapper {
			margin-top: 8px;
		}
		.sl-admin-fixed-service-cards .rwmb-group-title {
			font-size: 14px;
			font-weight: 600;
		}
		' . $advanced_box_selectors . ' {
			border-left: 4px solid #d63638;
		}
		' . $advanced_box_selectors . ' .hndle {
			color: #8a2424;
		}
		' . $advanced_visibility_css
	);
} );
