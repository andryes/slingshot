<?php
/**
 * Meta Box settings pages: Consulting, Bootcamp, AI landing templates.
 *
 * Depends on inc/landing-pages-helpers.php (constants).
 */

add_filter( 'rwmb_meta_boxes', function ( $meta_boxes ) {

	$con_sp  = [ 'post_types' => [ 'page' ], 'show' => [ 'template' => [ 'page-consulting.php' ] ] ];
	$boot_sp = [ 'post_types' => [ 'page' ], 'show' => [ 'template' => [ 'page-bootcamp.php' ] ] ];
	$ai_sp   = [ 'post_types' => [ 'page' ], 'show' => [ 'template' => [ 'page-ai.php' ] ] ];
	$figma_sp = [ 'post_types' => [ 'page' ], 'show' => [ 'template' => [ 'page-service-figma.php', 'page-careers-figma.php', 'page-redesign-builder.php' ] ] ];
	$all_redesign_templates = [
		'page-consulting.php',
		'page-bootcamp.php',
		'page-ai.php',
		'page-teams.php',
		'page-teams-dedicated.php',
		'page-teams-staffaug.php',
		'page-teams-whitepaper.php',
		'page-service-figma.php',
		'page-careers-figma.php',
		'page-open-position-figma.php',
		'page-contact-figma.php',
		'page-thank-you-figma.php',
		'page-work-figma.php',
		'page-case-study-figma.php',
		'page-legal-figma.php',
		'page-about-figma.php',
		'page-achievements-figma.php',
		'page-ambassadors-figma.php',
		'page-security-checklist-figma.php',
		'page-events-figma.php',
		'page-event-figma.php',
		'page-blog-figma.php',
		'page-modal-preview-figma.php',
		'page-internal-figma.php',
		'page-internal-blog-figma.php',
		'page-register-figma.php',
		'page-redesign-builder.php',
	];
	$all_redesign_sp = [ 'post_types' => [ 'page' ], 'show' => [ 'template' => $all_redesign_templates ] ];
	$all_redesign_post_sp = [ 'post_types' => [ 'post' ] ];
	$modal_preview_sp = [ 'post_types' => [ 'page' ], 'show' => [ 'template' => [ 'page-modal-preview-figma.php' ] ] ];

	$meta_boxes[] = $figma_sp + [
		'title'  => 'Figma Template · Fallback',
		'id'     => 'lp_figma_fallback',
		'fields' => [
			[ 'id' => 'sl_figma_mockup_url', 'name' => 'Mockup image URL', 'type' => 'text', 'desc' => 'Used only when page content is empty.' ],
		],
	];

	$global_modal_fields = [
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
		[ 'id' => 'sl_video_modal_url', 'name' => 'Video modal URL (YouTube/Vimeo/file)', 'type' => 'text', 'desc' => 'Used by play buttons when no per-button video URL is set.' ],
	];

	$meta_boxes[] = $all_redesign_sp + [
		'title'  => 'Global Modals · Contact / Subscribe / Video',
		'id'     => 'lp_global_modals',
		'fields' => $global_modal_fields,
	];

	$meta_boxes[] = $all_redesign_post_sp + [
		'title'  => 'Global Modals · Contact / Subscribe / Video',
		'id'     => 'lp_global_modals_post',
		'fields' => $global_modal_fields,
	];

	$meta_boxes[] = $modal_preview_sp + [
		'title'  => 'Modal Preview · Page shell',
		'id'     => 'lp_modal_preview_shell',
		'fields' => [
			[
				'id'      => 'mp_type',
				'name'    => 'Preview type',
				'type'    => 'select',
				'options' => [
					'subscribe' => 'Subscribe modal',
					'contact'   => 'Contact modal',
					'video'     => 'Video modal',
				],
				'std'     => 'subscribe',
			],
			[ 'id' => 'mp_label',       'name' => 'Page label', 'type' => 'text' ],
			[ 'id' => 'mp_heading',     'name' => 'Page heading', 'type' => 'text' ],
			[ 'id' => 'mp_desc',        'name' => 'Page description', 'type' => 'textarea', 'rows' => 3 ],
			[ 'id' => 'mp_button_text', 'name' => 'Button label', 'type' => 'text' ],
			[ 'id' => 'mp_auto_open',   'name' => 'Auto-open modal on page load', 'type' => 'checkbox', 'std' => 1 ],
		],
	];

	$help_service_fields = [
		[ 'id' => 'service_key', 'name' => 'Slug (e.g. ai-adoption)', 'type' => 'text', 'desc' => 'Lowercase, no spaces. Used in HTML ids and JS.' ],
		[ 'id' => 'accordion_label', 'name' => 'Accordion label', 'type' => 'text' ],
		[ 'id' => 'icon_svg', 'name' => 'Icon SVG', 'type' => 'textarea', 'rows' => 4 ],
		[ 'id' => 'featured_tag', 'name' => 'Featured card tag', 'type' => 'text' ],
		[ 'id' => 'featured_text', 'name' => 'Featured card text', 'type' => 'textarea' ],
		[ 'id' => 'featured_cta_text', 'name' => 'Featured CTA label', 'type' => 'text' ],
		[ 'id' => 'featured_cta_url', 'name' => 'Featured CTA URL', 'type' => 'text' ],
		[ 'id' => 'detail_title', 'name' => 'Detail column title', 'type' => 'text' ],
		[ 'id' => 'detail_intro', 'name' => 'Detail intro', 'type' => 'textarea' ],
		[ 'id' => 'detail_bullets', 'name' => 'Detail bullets (one per line)', 'type' => 'textarea', 'rows' => 6 ],
		[ 'id' => 'detail_cta_text', 'name' => 'Detail CTA label', 'type' => 'text' ],
		[ 'id' => 'detail_cta_url', 'name' => 'Detail CTA URL', 'type' => 'text' ],
	];

	$event_card_fields = [
		[ 'id' => 'image', 'name' => 'Image', 'type' => 'single_image', 'force_delete' => false ],
		[ 'id' => 'image_bg_css', 'name' => 'Or CSS background (if no image)', 'type' => 'text', 'desc' => 'e.g. linear-gradient(135deg,#2A1878,#4B23B0)' ],
		[ 'id' => 'tag', 'name' => 'Tag', 'type' => 'text' ],
		[ 'id' => 'title', 'name' => 'Title', 'type' => 'text' ],
		[ 'id' => 'date_location', 'name' => 'Date & location', 'type' => 'text' ],
		[ 'id' => 'url', 'name' => 'Link URL', 'type' => 'text' ],
		[ 'id' => 'register_label', 'name' => 'Button label', 'type' => 'text', 'std' => 'Register →' ],
	];

	$logo_text_fields = [
		[ 'id' => 'name', 'name' => 'Client name', 'type' => 'text' ],
	];

	$stat_fields = [
		[ 'id' => 'number', 'name' => 'Number', 'type' => 'text' ],
		[ 'id' => 'label', 'name' => 'Label', 'type' => 'text' ],
	];

	// ── Consulting ───────────────────────────────────────────────
	$meta_boxes[] = $con_sp + [
		'title'  => 'Consulting · Hero',
		'id'     => 'lp_con_hero',
		'fields' => [
			[ 'id' => 'con_hero_bc_parent', 'name' => 'Breadcrumb left', 'type' => 'text', 'std' => 'SERVICES' ],
			[ 'id' => 'con_hero_bc_leaf', 'name' => 'Breadcrumb right', 'type' => 'text', 'std' => 'CONSULTING' ],
			[ 'id' => 'con_hero_heading', 'name' => 'Heading', 'type' => 'text' ],
			[ 'id' => 'con_hero_subtext', 'name' => 'Subtext', 'type' => 'textarea' ],
			[ 'id' => 'con_hero_cta_text', 'name' => 'CTA label', 'type' => 'text', 'std' => 'Book a call' ],
			[ 'id' => 'con_hero_cta_url', 'name' => 'CTA URL', 'type' => 'text', 'std' => '/contact/?looking=Consulting' ],
			[ 'id' => 'con_hero_img_a', 'name' => 'Photo left', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'con_hero_img_b', 'name' => 'Photo right', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'con_hero_img_a_alt', 'name' => 'Photo left alt', 'type' => 'text' ],
			[ 'id' => 'con_hero_img_b_alt', 'name' => 'Photo right alt', 'type' => 'text' ],
		],
	];

	$meta_boxes[] = $con_sp + [
		'title'  => 'Consulting · Stats block',
		'id'     => 'lp_con_stats',
		'fields' => [
			[ 'id' => 'con_stats_image', 'name' => 'Side image', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'con_stats_image_alt', 'name' => 'Side image alt', 'type' => 'text' ],
			[ 'id' => 'con_stats_heading', 'name' => 'Heading', 'type' => 'textarea', 'rows' => 2 ],
			[ 'id' => 'con_stats_desc', 'name' => 'Description', 'type' => 'textarea' ],
			[
				'id'         => 'con_stats_items',
				'name'       => 'Stats',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add stat',
				'fields'     => $stat_fields,
			],
			[ 'id' => 'con_stats_cta_text', 'name' => 'CTA label', 'type' => 'text', 'std' => 'Explore Our Work' ],
			[ 'id' => 'con_stats_cta_url', 'name' => 'CTA URL', 'type' => 'text', 'std' => '/work/' ],
		],
	];

	$meta_boxes[] = $con_sp + [
		'title'  => 'Consulting · How we help',
		'id'     => 'lp_con_help',
		'fields' => [
			[ 'id' => 'con_help_heading', 'name' => 'Section heading', 'type' => 'text', 'std' => 'How Can We Help?' ],
			[
				'id'         => 'con_help_services',
				'name'       => 'Services',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add service',
				'fields'     => $help_service_fields,
			],
		],
	];

	$meta_boxes[] = $con_sp + [
		'title'  => 'Consulting · Events',
		'id'     => 'lp_con_events',
		'fields' => [
			[ 'id' => 'con_events_title', 'name' => 'Heading', 'type' => 'text' ],
			[ 'id' => 'con_events_desc', 'name' => 'Description', 'type' => 'textarea' ],
			[ 'id' => 'con_events_all_text', 'name' => 'All events link label', 'type' => 'text', 'std' => 'All Events →' ],
			[ 'id' => 'con_events_all_url', 'name' => 'All events URL', 'type' => 'text', 'std' => '/events' ],
			[
				'id'         => 'con_events_cards',
				'name'       => 'Event cards',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add card',
				'fields'     => $event_card_fields,
			],
		],
	];

	$meta_boxes[] = $con_sp + [
		'title'  => 'Consulting · Clients strip',
		'id'     => 'lp_con_clients',
		'fields' => [
			[ 'id' => 'con_clients_label', 'name' => 'Label', 'type' => 'text', 'std' => 'Our Trusted Clients' ],
			[
				'id'         => 'con_clients_logos',
				'name'       => 'Client names (marquee)',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add',
				'fields'     => $logo_text_fields,
			],
		],
	];

	$meta_boxes[] = $con_sp + [
		'title'  => 'Consulting · Blog',
		'id'     => 'lp_con_blog',
		'fields' => [
			[ 'id' => 'con_blog_title', 'name' => 'Heading', 'type' => 'textarea', 'rows' => 2 ],
			[ 'id' => 'con_blog_desc', 'name' => 'Description', 'type' => 'textarea' ],
			[ 'id' => 'con_blog_cta_text', 'name' => 'Link label', 'type' => 'text', 'std' => 'All Insights →' ],
			[ 'id' => 'con_blog_cta_url', 'name' => 'Link URL', 'type' => 'text', 'std' => '/blog' ],
			[ 'id' => 'con_blog_post_ids', 'name' => 'Post IDs, in display order', 'type' => 'text', 'desc' => 'Optional. Comma-separated post IDs override latest posts.' ],
			[ 'id' => 'con_blog_posts', 'name' => 'Number of posts', 'type' => 'number', 'std' => 3, 'min' => 1, 'max' => 12 ],
		],
	];

	$meta_boxes[] = $con_sp + [
		'title'  => 'Consulting · Bottom CTA',
		'id'     => 'lp_con_cta',
		'fields' => [
			[ 'id' => 'con_cta_title', 'name' => 'Heading', 'type' => 'text' ],
			[ 'id' => 'con_cta_desc', 'name' => 'Description', 'type' => 'textarea' ],
			[ 'id' => 'con_cta_btn_text', 'name' => 'Button label', 'type' => 'text' ],
			[ 'id' => 'con_cta_btn_url', 'name' => 'Button URL', 'type' => 'text' ],
		],
	];

	// ── Bootcamp ───────────────────────────────────────────────────
	$boot_hero_card_fields = [
		[ 'id' => 'title', 'name' => 'Title', 'type' => 'text' ],
		[ 'id' => 'subtitle', 'name' => 'Subtitle', 'type' => 'text' ],
		[ 'id' => 'icon_svg', 'name' => 'Icon SVG', 'type' => 'textarea', 'rows' => 4 ],
	];

	$boot_program_fields = [
		[ 'id' => 'icon', 'name' => 'Icon image', 'type' => 'single_image', 'force_delete' => false ],
		[ 'id' => 'title', 'name' => 'Title', 'type' => 'text' ],
		[ 'id' => 'subtitle', 'name' => 'Subtitle', 'type' => 'text' ],
		[ 'id' => 'desc', 'name' => 'Description', 'type' => 'textarea', 'rows' => 5 ],
		[ 'id' => 'gains', 'name' => 'What You\'ll Gain (one per line)', 'type' => 'textarea', 'rows' => 6 ],
		[ 'id' => 'ideal', 'name' => 'Ideal for', 'type' => 'textarea', 'rows' => 2 ],
		[ 'id' => 'instructor_avatar', 'name' => 'Instructor avatar', 'type' => 'single_image', 'force_delete' => false ],
		[ 'id' => 'instructor_name', 'name' => 'Instructor name', 'type' => 'text' ],
		[ 'id' => 'instructor_role', 'name' => 'Instructor role', 'type' => 'text' ],
		[ 'id' => 'instructor_bio', 'name' => 'Instructor bio', 'type' => 'textarea', 'rows' => 4 ],
		[ 'id' => 'cta_text', 'name' => 'CTA label', 'type' => 'text' ],
		[ 'id' => 'cta_url', 'name' => 'CTA URL', 'type' => 'text' ],
		[ 'id' => 'open', 'name' => 'Show expanded details', 'type' => 'checkbox' ],
	];

	$boot_why_fields = [
		[ 'id' => 'title', 'name' => 'Title', 'type' => 'text' ],
		[ 'id' => 'text', 'name' => 'Text', 'type' => 'textarea' ],
		[ 'id' => 'icon_svg', 'name' => 'Icon SVG', 'type' => 'textarea', 'rows' => 4 ],
		[ 'id' => 'style', 'name' => 'Card style', 'type' => 'select', 'options' => [ 'default' => 'Default', 'featured' => 'Featured (badge)' ], 'std' => 'default' ],
		[ 'id' => 'badge', 'name' => 'Badge (featured only)', 'type' => 'text', 'std' => 'Most Popular' ],
	];

	$boot_how_fields = [
		[ 'id' => 'num', 'name' => 'Step number', 'type' => 'text', 'std' => '01' ],
		[ 'id' => 'title', 'name' => 'Title', 'type' => 'text' ],
		[ 'id' => 'text', 'name' => 'Text', 'type' => 'textarea' ],
	];

	$curriculum_module_fields = [
		[ 'id' => 'day', 'name' => 'Day label', 'type' => 'text' ],
		[ 'id' => 'name', 'name' => 'Module name', 'type' => 'text' ],
	];

	$curriculum_tab_fields = [
		[ 'id' => 'tab_id', 'name' => 'Tab id (slug)', 'type' => 'text', 'desc' => 'e.g. foundations — used in HTML, must be unique.' ],
		[ 'id' => 'tab_label', 'name' => 'Tab button label', 'type' => 'text' ],
		[ 'id' => 'badge', 'name' => 'Badge', 'type' => 'text' ],
		[ 'id' => 'title', 'name' => 'Panel title', 'type' => 'text' ],
		[ 'id' => 'intro', 'name' => 'Intro', 'type' => 'textarea' ],
		[ 'id' => 'bullets', 'name' => 'Bullets (one per line)', 'type' => 'textarea', 'rows' => 8 ],
		[ 'id' => 'cta_text', 'name' => 'CTA label', 'type' => 'text' ],
		[ 'id' => 'cta_url', 'name' => 'CTA URL', 'type' => 'text' ],
		[
			'id'      => 'panel_layout',
			'name'    => 'Right column',
			'type'    => 'select',
			'options' => [ 'modules' => 'Module list', 'custom' => 'Custom card' ],
			'std'     => 'modules',
		],
		[ 'id' => 'custom_text', 'name' => 'Custom card text', 'type' => 'textarea' ],
		[ 'id' => 'custom_btn', 'name' => 'Custom button label', 'type' => 'text' ],
		[ 'id' => 'custom_url', 'name' => 'Custom button URL', 'type' => 'text' ],
		[
			'id'         => 'modules',
			'name'       => 'Modules',
			'type'       => 'group',
			'clone'      => true,
			'sort_clone' => true,
			'add_button' => '+ Module',
			'fields'     => $curriculum_module_fields,
		],
	];

	$meta_boxes[] = $boot_sp + [
		'title'  => 'Bootcamp · Hero',
		'id'     => 'lp_boot_hero',
		'fields' => [
			[ 'id' => 'boot_hero_bc_parent', 'name' => 'Breadcrumb left', 'type' => 'text', 'std' => 'SERVICES' ],
			[ 'id' => 'boot_hero_bc_leaf', 'name' => 'Breadcrumb right', 'type' => 'text', 'std' => 'BOOTCAMP' ],
			[ 'id' => 'boot_hero_heading', 'name' => 'Heading', 'type' => 'textarea', 'rows' => 2 ],
			[ 'id' => 'boot_hero_subtext', 'name' => 'Subtext', 'type' => 'textarea' ],
			[ 'id' => 'boot_hero_primary_text', 'name' => 'Primary CTA label', 'type' => 'text' ],
			[ 'id' => 'boot_hero_primary_url', 'name' => 'Primary CTA URL', 'type' => 'text' ],
			[ 'id' => 'boot_hero_secondary_text', 'name' => 'Secondary CTA label', 'type' => 'text', 'std' => 'See the Curriculum' ],
			[ 'id' => 'boot_hero_secondary_url', 'name' => 'Secondary CTA URL (or #anchor)', 'type' => 'text', 'std' => '#boot-curriculum' ],
			[ 'id' => 'boot_hero_img_left', 'name' => 'Photo left', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'boot_hero_img_right', 'name' => 'Photo right', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'boot_hero_img_left_alt', 'name' => 'Photo left alt', 'type' => 'text' ],
			[ 'id' => 'boot_hero_img_right_alt', 'name' => 'Photo right alt', 'type' => 'text' ],
			[
				'id'         => 'boot_hero_cards',
				'name'       => 'Stack cards',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Card',
				'fields'     => $boot_hero_card_fields,
			],
		],
	];

	$meta_boxes[] = $boot_sp + [
		'title'  => 'Bootcamp · Program cards',
		'id'     => 'lp_boot_programs',
		'fields' => [
			[ 'id' => 'boot_program_intro_image', 'name' => 'Left image', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'boot_program_intro_image_alt', 'name' => 'Left image alt', 'type' => 'text' ],
			[ 'id' => 'boot_program_intro_title', 'name' => 'Left card heading', 'type' => 'textarea', 'rows' => 2 ],
			[ 'id' => 'boot_program_intro_desc', 'name' => 'Left card text', 'type' => 'textarea', 'rows' => 4 ],
			[ 'id' => 'boot_program_intro_cta_text', 'name' => 'Left card CTA label', 'type' => 'text' ],
			[ 'id' => 'boot_program_intro_cta_url', 'name' => 'Left card CTA URL', 'type' => 'text' ],
			[
				'id'         => 'boot_program_cards',
				'name'       => 'Bootcamp cards',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Bootcamp card',
				'fields'     => $boot_program_fields,
			],
		],
	];

	$meta_boxes[] = $boot_sp + [
		'title'  => 'Bootcamp · Why section',
		'id'     => 'lp_boot_why',
		'fields' => [
			[ 'id' => 'boot_why_eyebrow', 'name' => 'Eyebrow', 'type' => 'text' ],
			[ 'id' => 'boot_why_heading', 'name' => 'Heading', 'type' => 'textarea', 'rows' => 2 ],
			[ 'id' => 'boot_why_desc', 'name' => 'Description', 'type' => 'textarea' ],
			[ 'id' => 'boot_why_cta_text', 'name' => 'Button label', 'type' => 'text' ],
			[ 'id' => 'boot_why_cta_url', 'name' => 'Button URL', 'type' => 'text' ],
			[
				'id'         => 'boot_why_cards',
				'name'       => 'Cards',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Card',
				'fields'     => $boot_why_fields,
			],
		],
	];

	$meta_boxes[] = $boot_sp + [
		'title'  => 'Bootcamp · Training stats',
		'id'     => 'lp_boot_stats',
		'fields' => [
			[ 'id' => 'boot_stats_heading', 'name' => 'Heading', 'type' => 'textarea', 'rows' => 2 ],
			[ 'id' => 'boot_stats_desc', 'name' => 'Description', 'type' => 'textarea' ],
			[ 'id' => 'boot_stats_cta_text', 'name' => 'CTA label', 'type' => 'text' ],
			[ 'id' => 'boot_stats_cta_url', 'name' => 'CTA URL', 'type' => 'text' ],
			[
				'id'         => 'boot_stats_items',
				'name'       => 'Stats grid',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Stat',
				'fields'     => $stat_fields,
			],
		],
	];

	$meta_boxes[] = $boot_sp + [
		'title'  => 'Bootcamp · Curriculum',
		'id'     => 'lp_boot_curriculum',
		'fields' => [
			[ 'id' => 'boot_curriculum_eyebrow', 'name' => 'Eyebrow', 'type' => 'text' ],
			[ 'id' => 'boot_curriculum_heading', 'name' => 'Heading', 'type' => 'textarea', 'rows' => 2 ],
			[ 'id' => 'boot_curriculum_desc', 'name' => 'Description', 'type' => 'textarea' ],
			[
				'id'         => 'boot_curriculum_tabs',
				'name'       => 'Tabs',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Tab',
				'fields'     => $curriculum_tab_fields,
			],
		],
	];

	$meta_boxes[] = $boot_sp + [
		'title'  => 'Bootcamp · How it works',
		'id'     => 'lp_boot_how',
		'fields' => [
			[ 'id' => 'boot_how_eyebrow', 'name' => 'Eyebrow', 'type' => 'text' ],
			[ 'id' => 'boot_how_heading', 'name' => 'Heading', 'type' => 'text' ],
			[
				'id'         => 'boot_how_steps',
				'name'       => 'Steps',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Step',
				'fields'     => $boot_how_fields,
			],
		],
	];

	$meta_boxes[] = $boot_sp + [
		'title'  => 'Bootcamp · Events',
		'id'     => 'lp_boot_events',
		'fields' => [
			[ 'id' => 'boot_events_title', 'name' => 'Heading', 'type' => 'text' ],
			[ 'id' => 'boot_events_desc', 'name' => 'Description', 'type' => 'textarea' ],
			[ 'id' => 'boot_events_all_text', 'name' => 'All events label', 'type' => 'text' ],
			[ 'id' => 'boot_events_all_url', 'name' => 'All events URL', 'type' => 'text' ],
			[
				'id'         => 'boot_events_cards',
				'name'       => 'Cards',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Card',
				'fields'     => $event_card_fields,
			],
		],
	];

	$meta_boxes[] = $boot_sp + [
		'title'  => 'Bootcamp · Clients',
		'id'     => 'lp_boot_clients',
		'fields' => [
			[ 'id' => 'boot_clients_label', 'name' => 'Label', 'type' => 'text' ],
			[
				'id'         => 'boot_clients_logos',
				'name'       => 'Names',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add',
				'fields'     => $logo_text_fields,
			],
		],
	];

	$meta_boxes[] = $boot_sp + [
		'title'  => 'Bootcamp · Blog',
		'id'     => 'lp_boot_blog',
		'fields' => [
			[ 'id' => 'boot_blog_title', 'name' => 'Heading', 'type' => 'textarea', 'rows' => 2 ],
			[ 'id' => 'boot_blog_desc', 'name' => 'Description', 'type' => 'textarea' ],
			[ 'id' => 'boot_blog_cta_text', 'name' => 'Link label', 'type' => 'text' ],
			[ 'id' => 'boot_blog_cta_url', 'name' => 'Link URL', 'type' => 'text' ],
			[ 'id' => 'boot_blog_posts', 'name' => 'Post count', 'type' => 'number', 'std' => 3, 'min' => 1, 'max' => 12 ],
		],
	];

	$meta_boxes[] = $boot_sp + [
		'title'  => 'Bootcamp · Bottom CTA',
		'id'     => 'lp_boot_cta',
		'fields' => [
			[ 'id' => 'boot_cta_title', 'name' => 'Heading', 'type' => 'textarea', 'rows' => 2 ],
			[ 'id' => 'boot_cta_desc', 'name' => 'Description', 'type' => 'textarea' ],
			[ 'id' => 'boot_cta_mascot', 'name' => 'Mascot image', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'boot_cta_primary_text', 'name' => 'Primary button', 'type' => 'text' ],
			[ 'id' => 'boot_cta_primary_url', 'name' => 'Primary URL', 'type' => 'text' ],
			[ 'id' => 'boot_cta_secondary_text', 'name' => 'Secondary button', 'type' => 'text' ],
			[ 'id' => 'boot_cta_secondary_url', 'name' => 'Secondary URL', 'type' => 'text' ],
		],
	];

	// ── AI ─────────────────────────────────────────────────────────
	$ai_step_fields = [
		[ 'id' => 'step_badge_img', 'name' => 'Step number image', 'type' => 'single_image', 'force_delete' => false ],
		[ 'id' => 'title', 'name' => 'Title', 'type' => 'text' ],
		[ 'id' => 'best', 'name' => 'Best for', 'type' => 'textarea', 'rows' => 2 ],
		[ 'id' => 'why', 'name' => 'Why it matters', 'type' => 'textarea', 'rows' => 3 ],
		[ 'id' => 'price', 'name' => 'Price line', 'type' => 'text' ],
		[ 'id' => 'duration', 'name' => 'Duration line', 'type' => 'text' ],
		[ 'id' => 'intro', 'name' => 'Legacy intro fallback', 'type' => 'textarea' ],
		[ 'id' => 'bullets', 'name' => 'What you get (one per line)', 'type' => 'textarea', 'rows' => 8 ],
		[ 'id' => 'show_price_row', 'name' => 'Show price/duration row', 'type' => 'checkbox', 'std' => 1 ],
	];

	$ai_cap_fields = [
		[ 'id' => 'image', 'name' => 'Icon image', 'type' => 'single_image', 'force_delete' => false ],
		[ 'id' => 'title', 'name' => 'Title', 'type' => 'textarea', 'rows' => 2 ],
		[ 'id' => 'desc', 'name' => 'Description', 'type' => 'textarea' ],
	];

	$ai_feature_card_fields = [
		[ 'id' => 'image', 'name' => 'Image', 'type' => 'single_image', 'force_delete' => false ],
		[ 'id' => 'title', 'name' => 'Title', 'type' => 'text' ],
		[ 'id' => 'desc', 'name' => 'Description', 'type' => 'textarea', 'rows' => 3 ],
		[ 'id' => 'url', 'name' => 'Link URL', 'type' => 'text' ],
	];

	$ai_case_card_fields = [
		[ 'id' => 'image', 'name' => 'Image', 'type' => 'single_image', 'force_delete' => false ],
		[ 'id' => 'title', 'name' => 'Title', 'type' => 'text' ],
		[ 'id' => 'desc', 'name' => 'Description', 'type' => 'textarea', 'rows' => 3 ],
		[ 'id' => 'tags', 'name' => 'Tags (comma-separated)', 'type' => 'text' ],
		[ 'id' => 'url', 'name' => 'Link URL', 'type' => 'text' ],
	];

	$ai_insight_card_fields = array_merge(
		$ai_case_card_fields,
		[
			[ 'id' => 'video', 'name' => 'Show video badge', 'type' => 'checkbox' ],
		]
	);

	$ai_faq_fields = [
		[ 'id' => 'question', 'name' => 'Question', 'type' => 'text' ],
		[ 'id' => 'answer', 'name' => 'Answer (HTML allowed)', 'type' => 'textarea', 'rows' => 10 ],
	];

	$meta_boxes[] = $ai_sp + [
		'title'  => 'AI · Hero',
		'id'     => 'lp_ai_hero',
		'fields' => [
			[ 'id' => 'ai_hero_bc_parent', 'name' => 'Breadcrumb left', 'type' => 'text', 'std' => 'SERVICES' ],
			[ 'id' => 'ai_hero_bc_leaf', 'name' => 'Breadcrumb right', 'type' => 'text', 'std' => 'AI' ],
			[ 'id' => 'ai_hero_heading', 'name' => 'Heading', 'type' => 'text' ],
			[ 'id' => 'ai_hero_subtext', 'name' => 'Subtext', 'type' => 'textarea' ],
			[ 'id' => 'ai_hero_cta_text', 'name' => 'CTA label', 'type' => 'text' ],
			[ 'id' => 'ai_hero_cta_url', 'name' => 'CTA URL', 'type' => 'text' ],
			[ 'id' => 'ai_hero_img_left', 'name' => 'Photo left', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'ai_hero_img_right', 'name' => 'Photo right', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'ai_hero_img_left_alt', 'name' => 'Photo left alt', 'type' => 'text' ],
			[ 'id' => 'ai_hero_img_right_alt', 'name' => 'Photo right alt', 'type' => 'text' ],
		],
	];

	$meta_boxes[] = $ai_sp + [
		'title'  => 'AI · Impact block',
		'id'     => 'lp_ai_impact',
		'fields' => [
			[ 'id' => 'ai_impact_image', 'name' => 'Image', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'ai_impact_image_alt', 'name' => 'Image alt', 'type' => 'text' ],
			[ 'id' => 'ai_impact_heading', 'name' => 'Heading', 'type' => 'textarea', 'rows' => 2 ],
			[ 'id' => 'ai_impact_text', 'name' => 'Text', 'type' => 'textarea' ],
			[ 'id' => 'ai_impact_cta_text', 'name' => 'CTA label', 'type' => 'text' ],
			[ 'id' => 'ai_impact_cta_url', 'name' => 'CTA URL', 'type' => 'text' ],
		],
	];

	$meta_boxes[] = $ai_sp + [
		'title'  => 'AI · Steps',
		'id'     => 'lp_ai_steps',
		'fields' => [
			[
				'id'         => 'ai_steps',
				'name'       => 'Steps',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Step',
				'fields'     => $ai_step_fields,
			],
		],
	];

	$meta_boxes[] = $ai_sp + [
		'title'  => 'AI · Capabilities',
		'id'     => 'lp_ai_cap',
		'fields' => [
			[ 'id' => 'ai_cap_title', 'name' => 'Section title', 'type' => 'text', 'std' => 'Capabilities' ],
			[
				'id'         => 'ai_capabilities',
				'name'       => 'Items',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Item',
				'fields'     => $ai_cap_fields,
			],
		],
	];

	$meta_boxes[] = $ai_sp + [
		'title'  => 'AI · Tools logos',
		'id'     => 'lp_ai_tools',
		'fields' => [
			[ 'id' => 'ai_tools_title', 'name' => 'Section title', 'type' => 'text' ],
			[
				'id'         => 'ai_tools_logos',
				'name'       => 'Logos',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Logo',
				'fields'     => [
					[ 'id' => 'image', 'name' => 'Image', 'type' => 'single_image', 'force_delete' => false ],
					[ 'id' => 'alt', 'name' => 'Alt text', 'type' => 'text', 'std' => 'logo' ],
				],
			],
		],
	];

	$meta_boxes[] = $ai_sp + [
		'title'  => 'AI · Experiences',
		'id'     => 'lp_ai_experiences',
		'fields' => [
			[ 'id' => 'ai_experiences_title', 'name' => 'Heading', 'type' => 'text', 'std' => 'Real-World AI Experiences' ],
			[ 'id' => 'ai_experiences_desc', 'name' => 'Intro text', 'type' => 'textarea' ],
			[
				'id'         => 'ai_experiences',
				'name'       => 'Cards',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Experience',
				'fields'     => $ai_feature_card_fields,
			],
		],
	];

	$meta_boxes[] = $ai_sp + [
		'title'  => 'AI · Work',
		'id'     => 'lp_ai_work',
		'fields' => [
			[ 'id' => 'ai_work_title', 'name' => 'Heading', 'type' => 'textarea', 'rows' => 2 ],
			[ 'id' => 'ai_work_cta_text', 'name' => 'Button label', 'type' => 'text' ],
			[ 'id' => 'ai_work_cta_url', 'name' => 'Button URL', 'type' => 'text' ],
			[
				'id'         => 'ai_work_cards',
				'name'       => 'Cards',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Work card',
				'fields'     => $ai_case_card_fields,
			],
		],
	];

	$meta_boxes[] = $ai_sp + [
		'title'  => 'AI · Insights (blog)',
		'id'     => 'lp_ai_blog',
		'fields' => [
			[ 'id' => 'ai_blog_title', 'name' => 'Heading', 'type' => 'text' ],
			[ 'id' => 'ai_insights_intro', 'name' => 'Intro text beside heading', 'type' => 'textarea', 'rows' => 2 ],
			[ 'id' => 'ai_blog_cta_text', 'name' => 'Button label', 'type' => 'text' ],
			[ 'id' => 'ai_blog_cta_url', 'name' => 'Button URL', 'type' => 'text' ],
			[
				'id'         => 'ai_insight_cards',
				'name'       => 'Cards',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Insight card',
				'fields'     => $ai_insight_card_fields,
			],
			[ 'id' => 'ai_blog_category', 'name' => 'Category slug', 'type' => 'text', 'std' => 'artificial-intelligence', 'desc' => 'Posts from this category slug.' ],
			[ 'id' => 'ai_blog_posts', 'name' => 'Post count', 'type' => 'number', 'std' => 10, 'min' => 1, 'max' => 24 ],
		],
	];

	$meta_boxes[] = $ai_sp + [
		'title'  => 'AI · FAQ',
		'id'     => 'lp_ai_faq',
		'fields' => [
			[ 'id' => 'ai_faq_title', 'name' => 'Section heading', 'type' => 'text' ],
			[
				'id'         => 'ai_faq_items',
				'name'       => 'Q&A',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Item',
				'fields'     => $ai_faq_fields,
			],
		],
	];

	$meta_boxes[] = $ai_sp + [
		'title'  => 'AI · Bottom CTA',
		'id'     => 'lp_ai_cta',
		'fields' => [
			[ 'id' => 'ai_cta_title', 'name' => 'Heading', 'type' => 'text' ],
			[ 'id' => 'ai_cta_desc', 'name' => 'Description', 'type' => 'textarea' ],
			[ 'id' => 'ai_cta_mascot', 'name' => 'Mascot image', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'ai_cta_btn_text', 'name' => 'Button label', 'type' => 'text' ],
			[ 'id' => 'ai_cta_btn_url', 'name' => 'Button URL', 'type' => 'text' ],
		],
	];

	// ── Teams post-meta base arrays (attached to specific page templates) ─────
	$teams_pm    = [ 'post_types' => [ 'page' ], 'show' => [ 'template' => [ 'page-teams.php' ] ] ];
	$ded_pm      = [ 'post_types' => [ 'page' ], 'show' => [ 'template' => [ 'page-teams-dedicated.php' ] ] ];
	$staug_pm    = [ 'post_types' => [ 'page' ], 'show' => [ 'template' => [ 'page-teams-staffaug.php' ] ] ];
	$wp_pm       = [ 'post_types' => [ 'page' ], 'show' => [ 'template' => [ 'page-teams-whitepaper.php' ] ] ];

	$skill_fields = [
		[ 'id' => 'skill_name', 'name' => 'Skill name', 'type' => 'text' ],
	];

	$testimonial_fields = [
		[ 'id' => 'company_name', 'name' => 'Company name (logo fallback)', 'type' => 'text' ],
		[ 'id' => 'photo', 'name' => 'Photo', 'type' => 'single_image', 'force_delete' => false ],
		[ 'id' => 'name', 'name' => 'Name', 'type' => 'text' ],
		[ 'id' => 'title', 'name' => 'Title / Company', 'type' => 'text' ],
		[ 'id' => 'quote', 'name' => 'Quote', 'type' => 'textarea', 'rows' => 4 ],
		[ 'id' => 'company_logo', 'name' => 'Company logo', 'type' => 'single_image', 'force_delete' => false ],
	];

	$role_fields = [
		[ 'id' => 'photo', 'name' => 'Photo', 'type' => 'single_image', 'force_delete' => false ],
		[ 'id' => 'name', 'name' => 'Name', 'type' => 'text' ],
		[ 'id' => 'role', 'name' => 'Role title', 'type' => 'text' ],
		[ 'id' => 'location', 'name' => 'Location', 'type' => 'text' ],
		[ 'id' => 'category', 'name' => 'Category / filter', 'type' => 'text' ],
		[ 'id' => 'experience', 'name' => 'Experience line', 'type' => 'text' ],
		[ 'id' => 'story', 'name' => 'Short result / story', 'type' => 'textarea', 'rows' => 3 ],
	];

	$feature_card_fields = [
		[ 'id' => 'icon_key', 'name' => 'Icon key (optional)', 'type' => 'text' ],
		[ 'id' => 'icon_svg', 'name' => 'Icon SVG', 'type' => 'textarea', 'rows' => 3 ],
		[ 'id' => 'title', 'name' => 'Title', 'type' => 'text' ],
		[ 'id' => 'desc', 'name' => 'Description', 'type' => 'textarea', 'rows' => 3 ],
	];

	$staug_region_fields = [
		[ 'id' => 'title', 'name' => 'Region title', 'type' => 'text' ],
		[ 'id' => 'body', 'name' => 'Bullets / description (one per line)', 'type' => 'textarea', 'rows' => 5 ],
		[ 'id' => 'featured', 'name' => 'Featured teal card', 'type' => 'checkbox' ],
	];

	$whitepaper_section_fields = [
		[ 'id' => 'icon_key', 'name' => 'Icon key (optional)', 'type' => 'text' ],
		[ 'id' => 'icon_svg', 'name' => 'Icon SVG', 'type' => 'textarea', 'rows' => 3 ],
		[ 'id' => 'title', 'name' => 'Section title', 'type' => 'text' ],
		[ 'id' => 'desc', 'name' => 'Description', 'type' => 'textarea', 'rows' => 3 ],
	];

	// ── Teams Generic ────────────────────────────────────────
	$meta_boxes[] = $teams_pm + [
		'title'  => 'Teams · Hero',
		'id'     => 'lp_teams_hero',
		'fields' => [
			[ 'id' => 'teams_hero_bc_parent', 'name' => 'Breadcrumb left', 'type' => 'text', 'std' => 'SERVICES' ],
			[ 'id' => 'teams_hero_bc_leaf', 'name' => 'Breadcrumb right', 'type' => 'text', 'std' => 'TEAMS' ],
			[ 'id' => 'teams_hero_heading', 'name' => 'Heading', 'type' => 'text' ],
			[ 'id' => 'teams_hero_subtext', 'name' => 'Subtext', 'type' => 'textarea' ],
			[ 'id' => 'teams_hero_cta_text', 'name' => 'CTA label', 'type' => 'text', 'std' => 'Book a call' ],
			[ 'id' => 'teams_hero_cta_url', 'name' => 'CTA URL', 'type' => 'text', 'std' => '/contact/?looking=Teams' ],
			[ 'id' => 'teams_hero_img_a', 'name' => 'Photo left', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'teams_hero_img_b', 'name' => 'Photo right', 'type' => 'single_image', 'force_delete' => false ],
		],
	];

	$meta_boxes[] = $teams_pm + [
		'title'  => 'Teams · Intro block',
		'id'     => 'lp_teams_intro',
		'fields' => [
			[ 'id' => 'teams_intro_heading', 'name' => 'Heading', 'type' => 'text' ],
			[ 'id' => 'teams_intro_desc', 'name' => 'Description', 'type' => 'textarea' ],
			[ 'id' => 'teams_intro_tagline', 'name' => 'Tagline (bold label)', 'type' => 'text', 'std' => 'Two Models, One Strategic Partner' ],
			[ 'id' => 'teams_intro_img', 'name' => 'Side image', 'type' => 'single_image', 'force_delete' => false ],
		],
	];

	$meta_boxes[] = $teams_pm + [
		'title'  => 'Teams · Model Cards (Dedicated Teams / Staff Aug)',
		'id'     => 'lp_teams_models',
		'fields' => [
			[ 'id' => 'teams_model_ded_tag', 'name' => 'Dedicated Teams — tag', 'type' => 'text', 'std' => 'Dedicated Teams' ],
			[ 'id' => 'teams_model_ded_icon_svg', 'name' => 'Dedicated Teams — icon SVG', 'type' => 'textarea', 'rows' => 3 ],
			[ 'id' => 'teams_model_ded_heading', 'name' => 'Dedicated Teams — heading', 'type' => 'text' ],
			[ 'id' => 'teams_model_ded_desc', 'name' => 'Dedicated Teams — description', 'type' => 'textarea' ],
			[ 'id' => 'teams_model_ded_bullets', 'name' => 'Dedicated Teams — bullets (one per line)', 'type' => 'textarea', 'rows' => 5 ],
			[ 'id' => 'teams_model_ded_cta_text', 'name' => 'Dedicated Teams — CTA label', 'type' => 'text', 'std' => 'Explore' ],
			[ 'id' => 'teams_model_ded_cta_url', 'name' => 'Dedicated Teams — CTA URL', 'type' => 'text', 'std' => '/dedicated-teams/' ],
			[ 'id' => 'teams_model_ded_img', 'name' => 'Dedicated Teams — image', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'teams_model_aug_tag', 'name' => 'Staff Aug — tag', 'type' => 'text', 'std' => 'Staff Augmentation' ],
			[ 'id' => 'teams_model_aug_icon_svg', 'name' => 'Staff Aug — icon SVG', 'type' => 'textarea', 'rows' => 3 ],
			[ 'id' => 'teams_model_aug_heading', 'name' => 'Staff Aug — heading', 'type' => 'text' ],
			[ 'id' => 'teams_model_aug_desc', 'name' => 'Staff Aug — description', 'type' => 'textarea' ],
			[ 'id' => 'teams_model_aug_bullets', 'name' => 'Staff Aug — bullets (one per line)', 'type' => 'textarea', 'rows' => 5 ],
			[ 'id' => 'teams_model_aug_cta_text', 'name' => 'Staff Aug — CTA label', 'type' => 'text', 'std' => 'Explore' ],
			[ 'id' => 'teams_model_aug_cta_url', 'name' => 'Staff Aug — CTA URL', 'type' => 'text', 'std' => '/eu-staff-augmentation/' ],
			[ 'id' => 'teams_model_aug_img', 'name' => 'Staff Aug — image', 'type' => 'single_image', 'force_delete' => false ],
		],
	];

	$meta_boxes[] = $teams_pm + [
		'title'  => 'Teams · Where We Work (map section)',
		'id'     => 'lp_teams_map',
		'fields' => [
			[ 'id' => 'teams_map_heading', 'name' => 'Heading', 'type' => 'text', 'std' => 'Where Our Teams Work' ],
			[ 'id' => 'teams_map_desc', 'name' => 'Description', 'type' => 'textarea' ],
			[ 'id' => 'teams_map_cta_text', 'name' => 'CTA label', 'type' => 'text', 'std' => 'Start Hiring Now' ],
			[ 'id' => 'teams_map_cta_url', 'name' => 'CTA URL', 'type' => 'text', 'std' => '/contact/?looking=Teams' ],
			[ 'id' => 'teams_map_img', 'name' => 'Map / Globe image', 'type' => 'single_image', 'force_delete' => false ],
			[
				'id'         => 'teams_map_regions',
				'name'       => 'Map region cards',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add region',
				'fields'     => [
					[ 'id' => 'name', 'name' => 'Region name', 'type' => 'text' ],
					[ 'id' => 'desc', 'name' => 'Description', 'type' => 'textarea', 'rows' => 3 ],
					[ 'id' => 'featured', 'name' => 'Featured green card', 'type' => 'checkbox' ],
				],
			],
			[
				'id'         => 'teams_map_logos',
				'name'       => 'Partner logos',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add logo',
				'fields'     => [
					[ 'id' => 'name', 'name' => 'Partner name', 'type' => 'text' ],
					[ 'id' => 'logo', 'name' => 'Logo image', 'type' => 'single_image', 'force_delete' => false ],
				],
			],
		],
	];

	$meta_boxes[] = $teams_pm + [
		'title'  => 'Teams · Skills & Capabilities',
		'id'     => 'lp_teams_skills',
		'fields' => [
			[ 'id' => 'teams_skills_heading', 'name' => 'Heading', 'type' => 'text', 'std' => 'Strategic Skills & Capabilities' ],
			[ 'id' => 'teams_skills_desc', 'name' => 'Description', 'type' => 'textarea' ],
			[
				'id'         => 'teams_skills_categories',
				'name'       => 'Skill categories',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add category',
				'fields'     => [
					[ 'id' => 'icon_key', 'name' => 'Icon key (optional)', 'type' => 'text' ],
					[ 'id' => 'icon_svg', 'name' => 'Icon SVG', 'type' => 'textarea', 'rows' => 3 ],
					[ 'id' => 'category_name', 'name' => 'Category name', 'type' => 'text' ],
					[ 'id' => 'desc', 'name' => 'Card description', 'type' => 'textarea', 'rows' => 2 ],
					[
						'id'         => 'skills',
						'name'       => 'Skills (one per item)',
						'type'       => 'group',
						'clone'      => true,
						'sort_clone' => true,
						'add_button' => '+ Add skill',
						'fields'     => $skill_fields,
					],
				],
			],
		],
	];

	$meta_boxes[] = $teams_pm + [
		'title'  => 'Teams · Client Insights',
		'id'     => 'lp_teams_clients',
		'fields' => [
			[ 'id' => 'teams_clients_label', 'name' => 'Label', 'type' => 'text', 'std' => 'Teams & Staffing Client Insights' ],
			[
				'id'         => 'teams_client_cards',
				'name'       => 'Client testimonial cards',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add client card',
				'fields'     => $testimonial_fields,
			],
			[
				'id'         => 'teams_clients_logos',
				'name'       => 'Client names (marquee)',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add',
				'fields'     => $logo_text_fields,
			],
		],
	];

	$meta_boxes[] = $teams_pm + [
		'title'  => 'Teams · Blog',
		'id'     => 'lp_teams_blog',
		'fields' => [
			[ 'id' => 'teams_blog_title', 'name' => 'Heading', 'type' => 'textarea', 'rows' => 2 ],
			[ 'id' => 'teams_blog_desc', 'name' => 'Description', 'type' => 'textarea' ],
			[ 'id' => 'teams_blog_cta_text', 'name' => 'Link label', 'type' => 'text', 'std' => 'All Insights →' ],
			[ 'id' => 'teams_blog_cta_url', 'name' => 'Link URL', 'type' => 'text', 'std' => '/blog' ],
			[ 'id' => 'teams_blog_posts', 'name' => 'Number of posts', 'type' => 'number', 'std' => 3, 'min' => 1, 'max' => 12 ],
		],
	];

	$meta_boxes[] = $teams_pm + [
		'title'  => 'Teams · Bottom CTA',
		'id'     => 'lp_teams_cta',
		'fields' => [
			[ 'id' => 'teams_cta_title', 'name' => 'Heading', 'type' => 'text' ],
			[ 'id' => 'teams_cta_desc', 'name' => 'Description', 'type' => 'textarea' ],
			[ 'id' => 'teams_cta_visual', 'name' => 'CTA visual image', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'teams_cta_btn_text', 'name' => 'Button label', 'type' => 'text' ],
			[ 'id' => 'teams_cta_btn_url', 'name' => 'Button URL', 'type' => 'text' ],
		],
	];

	// ── Teams Dedicated ──────────────────────────────────────
	$meta_boxes[] = $ded_pm + [
		'title'  => 'Dedicated · Hero',
		'id'     => 'lp_ded_hero',
		'fields' => [
			[ 'id' => 'ded_header_cta_text', 'name' => 'Header CTA label', 'type' => 'text', 'std' => "Let's talk" ],
			[ 'id' => 'ded_header_cta_url', 'name' => 'Header CTA URL', 'type' => 'text', 'std' => '/contact/?looking=Dedicated+Teams' ],
			[ 'id' => 'ded_hero_bc_parent', 'name' => 'Breadcrumb left', 'type' => 'text', 'std' => 'SERVICES / TEAMS' ],
			[ 'id' => 'ded_hero_bc_leaf', 'name' => 'Breadcrumb right', 'type' => 'text', 'std' => 'DEDICATED TEAMS' ],
			[ 'id' => 'ded_hero_heading', 'name' => 'Heading', 'type' => 'text' ],
			[ 'id' => 'ded_hero_subtext', 'name' => 'Subtext', 'type' => 'textarea' ],
			[ 'id' => 'ded_hero_cta_text', 'name' => 'CTA label', 'type' => 'text', 'std' => 'Book a call' ],
			[ 'id' => 'ded_hero_cta_url', 'name' => 'CTA URL', 'type' => 'text', 'std' => '/contact/?looking=Dedicated+Teams' ],
			[ 'id' => 'ded_hero_img_a', 'name' => 'Photo left', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'ded_hero_img_b', 'name' => 'Photo right', 'type' => 'single_image', 'force_delete' => false ],
		],
	];

	$meta_boxes[] = $ded_pm + [
		'title'  => 'Dedicated · Why Choose section',
		'id'     => 'lp_ded_why',
		'fields' => [
			[ 'id' => 'ded_why_eyebrow', 'name' => 'Eyebrow', 'type' => 'text', 'std' => 'Why Us' ],
			[ 'id' => 'ded_why_heading', 'name' => 'Heading', 'type' => 'text' ],
			[ 'id' => 'ded_why_desc', 'name' => 'Description', 'type' => 'textarea' ],
			[
				'id'         => 'ded_why_cards',
				'name'       => 'Feature cards',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add card',
				'fields'     => $feature_card_fields,
			],
		],
	];

	$meta_boxes[] = $ded_pm + [
		'title'  => 'Dedicated · What You Get',
		'id'     => 'lp_ded_get',
		'fields' => [
			[ 'id' => 'ded_get_heading', 'name' => 'Heading', 'type' => 'text', 'std' => 'What You Get' ],
			[ 'id' => 'ded_get_desc', 'name' => 'Description', 'type' => 'textarea' ],
			[ 'id' => 'ded_get_kicker', 'name' => 'Cards kicker label', 'type' => 'text', 'std' => 'Why Slingshot Global Talent Delivers' ],
			[ 'id' => 'ded_get_team_img', 'name' => 'Team photo', 'type' => 'single_image', 'force_delete' => false ],
			[
				'id'         => 'ded_get_cards',
				'name'       => 'What You Get cards',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add card',
				'fields'     => $feature_card_fields,
			],
			[ 'id' => 'ded_get_cta_text', 'name' => 'CTA label', 'type' => 'text', 'std' => 'Start Hiring Now' ],
			[ 'id' => 'ded_get_cta_url', 'name' => 'CTA URL', 'type' => 'text', 'std' => '/contact/?looking=Dedicated+Teams' ],
		],
	];

	$meta_boxes[] = $ded_pm + [
		'title'  => 'Dedicated · Cross-sell Staff Aug card',
		'id'     => 'lp_ded_crosssell',
		'fields' => [
			[ 'id' => 'ded_crosssell_tag', 'name' => 'Tag', 'type' => 'text', 'std' => 'Staff Augmentation' ],
			[ 'id' => 'ded_crosssell_heading', 'name' => 'Heading', 'type' => 'text' ],
			[ 'id' => 'ded_crosssell_desc', 'name' => 'Description', 'type' => 'textarea' ],
			[ 'id' => 'ded_crosssell_cta_text', 'name' => 'CTA label', 'type' => 'text', 'std' => 'Learn More' ],
			[ 'id' => 'ded_crosssell_cta_url', 'name' => 'CTA URL', 'type' => 'text', 'std' => '/eu-staff-augmentation/' ],
		],
	];

	$meta_boxes[] = $ded_pm + [
		'title'  => 'Dedicated · Testimonials',
		'id'     => 'lp_ded_testimonials',
		'fields' => [
			[ 'id' => 'ded_test_heading', 'name' => 'Heading', 'type' => 'text', 'std' => 'Client Testimonials' ],
			[
				'id'         => 'ded_test_items',
				'name'       => 'Testimonials',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add testimonial',
				'fields'     => $testimonial_fields,
			],
		],
	];

	$meta_boxes[] = $ded_pm + [
		'title'  => 'Dedicated · Where We Work',
		'id'     => 'lp_ded_map',
		'fields' => [
			[ 'id' => 'ded_map_heading', 'name' => 'Heading', 'type' => 'text', 'std' => 'Where Our Teams Work' ],
			[ 'id' => 'ded_map_img', 'name' => 'Map / Globe image', 'type' => 'single_image', 'force_delete' => false ],
			[
				'id'         => 'ded_map_logos',
				'name'       => 'Partner logos',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add logo',
				'fields'     => [
					[ 'id' => 'name', 'name' => 'Partner name', 'type' => 'text' ],
					[ 'id' => 'logo', 'name' => 'Logo image', 'type' => 'single_image', 'force_delete' => false ],
				],
			],
		],
	];

	$meta_boxes[] = $ded_pm + [
		'title'  => 'Dedicated · Skills & Capabilities',
		'id'     => 'lp_ded_skills',
		'fields' => [
			[ 'id' => 'ded_skills_heading', 'name' => 'Heading', 'type' => 'text', 'std' => 'Strategic Skills & Capabilities' ],
			[
				'id'         => 'ded_skills_categories',
				'name'       => 'Skill categories',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add category',
				'fields'     => [
					[ 'id' => 'category_name', 'name' => 'Category name', 'type' => 'text' ],
					[
						'id'         => 'skills',
						'name'       => 'Skills',
						'type'       => 'group',
						'clone'      => true,
						'sort_clone' => true,
						'add_button' => '+ Add skill',
						'fields'     => $skill_fields,
					],
				],
			],
		],
	];

	$meta_boxes[] = $ded_pm + [
		'title'  => 'Dedicated · Client Insights strip',
		'id'     => 'lp_ded_clients',
		'fields' => [
			[ 'id' => 'ded_clients_label', 'name' => 'Label', 'type' => 'text', 'std' => 'Teams & Staffing Client Insights' ],
			[
				'id'         => 'ded_clients_logos',
				'name'       => 'Client names (marquee)',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add',
				'fields'     => $logo_text_fields,
			],
		],
	];

	$meta_boxes[] = $ded_pm + [
		'title'  => 'Dedicated · Blog',
		'id'     => 'lp_ded_blog',
		'fields' => [
			[ 'id' => 'ded_blog_title', 'name' => 'Heading', 'type' => 'textarea', 'rows' => 2 ],
			[ 'id' => 'ded_blog_desc', 'name' => 'Description', 'type' => 'textarea' ],
			[ 'id' => 'ded_blog_cta_text', 'name' => 'Link label', 'type' => 'text', 'std' => 'All Insights →' ],
			[ 'id' => 'ded_blog_cta_url', 'name' => 'Link URL', 'type' => 'text', 'std' => '/blog' ],
			[ 'id' => 'ded_blog_posts', 'name' => 'Number of posts', 'type' => 'number', 'std' => 3, 'min' => 1, 'max' => 12 ],
		],
	];

	$meta_boxes[] = $ded_pm + [
		'title'  => 'Dedicated · Bottom CTA',
		'id'     => 'lp_ded_cta',
		'fields' => [
			[ 'id' => 'ded_cta_title', 'name' => 'Heading', 'type' => 'text' ],
			[ 'id' => 'ded_cta_desc', 'name' => 'Description', 'type' => 'textarea' ],
			[ 'id' => 'ded_cta_visual', 'name' => 'CTA visual image', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'ded_cta_btn_text', 'name' => 'Button label', 'type' => 'text' ],
			[ 'id' => 'ded_cta_btn_url', 'name' => 'Button URL', 'type' => 'text' ],
		],
	];

	// ── Teams Staff Augmentation ─────────────────────────────
	$meta_boxes[] = $staug_pm + [
		'title'  => 'Staff Aug · Hero',
		'id'     => 'lp_staug_hero',
		'fields' => [
			[ 'id' => 'staug_header_cta_text', 'name' => 'Header CTA label', 'type' => 'text', 'std' => "Let's talk" ],
			[ 'id' => 'staug_header_cta_url', 'name' => 'Header CTA URL', 'type' => 'text', 'std' => '/contact/?looking=Staff+Aug' ],
			[ 'id' => 'staug_hero_bc_parent', 'name' => 'Breadcrumb left', 'type' => 'text', 'std' => 'SERVICES / TEAMS' ],
			[ 'id' => 'staug_hero_bc_leaf', 'name' => 'Breadcrumb right', 'type' => 'text', 'std' => 'STAFF AUG' ],
			[ 'id' => 'staug_hero_heading', 'name' => 'Heading', 'type' => 'text' ],
			[ 'id' => 'staug_hero_subtext', 'name' => 'Subtext', 'type' => 'textarea' ],
			[ 'id' => 'staug_hero_cta_text', 'name' => 'CTA label', 'type' => 'text', 'std' => 'Start Building Your Team' ],
			[ 'id' => 'staug_hero_cta_url', 'name' => 'CTA URL', 'type' => 'text', 'std' => '/contact/?looking=Staff+Aug' ],
			[ 'id' => 'staug_hero_img_a', 'name' => 'Photo left', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'staug_hero_img_b', 'name' => 'Photo right', 'type' => 'single_image', 'force_delete' => false ],
		],
	];

	$meta_boxes[] = $staug_pm + [
		'title'  => 'Staff Aug · What We Offer',
		'id'     => 'lp_staug_offer',
		'fields' => [
			[ 'id' => 'staug_offer_heading', 'name' => 'Heading', 'type' => 'text', 'std' => 'What We Offer' ],
			[
				'id'         => 'staug_offer_cards',
				'name'       => 'Offer cards',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add card',
				'fields'     => $feature_card_fields,
			],
		],
	];

	$meta_boxes[] = $staug_pm + [
		'title'  => 'Staff Aug · Why Slingshot Delivers',
		'id'     => 'lp_staug_why',
		'fields' => [
			[ 'id' => 'staug_why_heading', 'name' => 'Heading', 'type' => 'text' ],
			[ 'id' => 'staug_why_desc', 'name' => 'Description', 'type' => 'textarea' ],
			[ 'id' => 'staug_why_kicker', 'name' => 'Cards kicker label', 'type' => 'text', 'std' => 'Why Slingshot Global Talent Delivers' ],
			[ 'id' => 'staug_why_cta_text', 'name' => 'CTA label', 'type' => 'text', 'std' => 'Start Hiring Now' ],
			[ 'id' => 'staug_why_cta_url', 'name' => 'CTA URL', 'type' => 'text', 'std' => '/contact/?looking=Staff+Aug' ],
			[ 'id' => 'staug_why_img', 'name' => 'Side image', 'type' => 'single_image', 'force_delete' => false ],
			[
				'id'         => 'staug_why_points',
				'name'       => 'Points',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add point',
				'fields'     => [
					[ 'id' => 'icon_key', 'name' => 'Icon key (optional)', 'type' => 'text' ],
					[ 'id' => 'icon_svg', 'name' => 'Icon SVG', 'type' => 'textarea', 'rows' => 3 ],
					[ 'id' => 'title', 'name' => 'Point title', 'type' => 'text' ],
					[ 'id' => 'desc', 'name' => 'Point description', 'type' => 'textarea', 'rows' => 2 ],
				],
			],
			[
				'id'         => 'staug_region_cards',
				'name'       => 'Map region cards',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add region',
				'fields'     => $staug_region_fields,
			],
		],
	];

	$meta_boxes[] = $staug_pm + [
		'title'  => 'Staff Aug · Roles We Have Staffed',
		'id'     => 'lp_staug_roles',
		'fields' => [
			[ 'id' => 'staug_roles_heading', 'name' => 'Heading', 'type' => 'text', 'std' => 'Roles We Have Staffed' ],
			[ 'id' => 'staug_roles_view_all_text', 'name' => 'View all label', 'type' => 'text', 'std' => 'Start Hiring Now' ],
			[ 'id' => 'staug_roles_view_all_url', 'name' => 'View all URL', 'type' => 'text' ],
			[ 'id' => 'staug_roles_filters', 'name' => 'Filter labels (one per line)', 'type' => 'textarea', 'rows' => 4, 'std' => "All Roles\nDevelopment\nProject Manager\nDesigners\nQA" ],
			[
				'id'         => 'staug_roles_items',
				'name'       => 'Role cards',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add role',
				'fields'     => $role_fields,
			],
		],
	];

	$meta_boxes[] = $staug_pm + [
		'title'  => 'Staff Aug · Testimonials',
		'id'     => 'lp_staug_testimonials',
		'fields' => [
			[ 'id' => 'staug_test_heading', 'name' => 'Heading', 'type' => 'text', 'std' => 'Client Testimonials' ],
			[
				'id'         => 'staug_test_items',
				'name'       => 'Testimonials',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add testimonial',
				'fields'     => $testimonial_fields,
			],
		],
	];

	$meta_boxes[] = $staug_pm + [
		'title'  => 'Staff Aug · Bottom CTA',
		'id'     => 'lp_staug_cta',
		'fields' => [
			[ 'id' => 'staug_cta_title', 'name' => 'Heading', 'type' => 'text' ],
			[ 'id' => 'staug_cta_desc', 'name' => 'Description', 'type' => 'textarea' ],
			[ 'id' => 'staug_cta_visual', 'name' => 'CTA visual image', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'staug_cta_btn_text', 'name' => 'Button label', 'type' => 'text' ],
			[ 'id' => 'staug_cta_btn_url', 'name' => 'Button URL', 'type' => 'text' ],
		],
	];

	// ── Teams Whitepaper ─────────────────────────────────────
	$meta_boxes[] = $wp_pm + [
		'title'  => 'Whitepaper · Hero',
		'id'     => 'lp_wp_hero',
		'fields' => [
			[ 'id' => 'wp_header_cta_text', 'name' => 'Header CTA label', 'type' => 'text', 'std' => "Let's talk" ],
			[ 'id' => 'wp_header_cta_url', 'name' => 'Header CTA URL', 'type' => 'text', 'std' => '/contact/?looking=Whitepaper' ],
			[ 'id' => 'wp_hero_bc_parent', 'name' => 'Breadcrumb left', 'type' => 'text', 'std' => 'SERVICES / TEAMS' ],
			[ 'id' => 'wp_hero_bc_leaf', 'name' => 'Breadcrumb right', 'type' => 'text', 'std' => 'WHITEPAPER' ],
			[ 'id' => 'wp_hero_heading', 'name' => 'Heading', 'type' => 'text' ],
			[ 'id' => 'wp_hero_subtext', 'name' => 'Subtext', 'type' => 'textarea' ],
			[ 'id' => 'wp_hero_cta_text', 'name' => 'CTA label', 'type' => 'text', 'std' => 'Download Now' ],
			[ 'id' => 'wp_hero_cta_url', 'name' => 'CTA URL (anchor)', 'type' => 'text', 'std' => '#wp-download' ],
			[ 'id' => 'wp_hero_img_a', 'name' => 'Photo left', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'wp_hero_img_b', 'name' => 'Photo right', 'type' => 'single_image', 'force_delete' => false ],
		],
	];

	$meta_boxes[] = $wp_pm + [
		'title'  => 'Whitepaper · What to Expect sections',
		'id'     => 'lp_wp_sections',
		'fields' => [
			[ 'id' => 'wp_sections_heading', 'name' => 'Heading', 'type' => 'text', 'std' => 'What to Expect in This Whitepaper' ],
			[
				'id'         => 'wp_sections_items',
				'name'       => 'Sections',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add section',
				'fields'     => $whitepaper_section_fields,
			],
		],
	];

	$meta_boxes[] = $wp_pm + [
		'title'  => 'Whitepaper · Download block',
		'id'     => 'lp_wp_download',
		'fields' => [
			[ 'id' => 'wp_dl_heading', 'name' => 'Heading', 'type' => 'text', 'std' => 'Download The Paper' ],
			[ 'id' => 'wp_dl_desc', 'name' => 'Description', 'type' => 'textarea' ],
			[ 'id' => 'wp_dl_cover_img', 'name' => 'Cover / record image', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'wp_dl_file_url', 'name' => 'PDF download URL', 'type' => 'text' ],
			[ 'id' => 'wp_dl_btn_text', 'name' => 'Button label', 'type' => 'text', 'std' => 'Download Now' ],
			[ 'id' => 'wp_dl_gravity_form_id', 'name' => 'Gravity Form ID (optional)', 'type' => 'number', 'min' => 0 ],
			[ 'id' => 'wp_dl_name_label', 'name' => 'Name label', 'type' => 'text', 'std' => 'Name' ],
			[ 'id' => 'wp_dl_email_label', 'name' => 'Email label', 'type' => 'text', 'std' => 'Email' ],
			[ 'id' => 'wp_dl_company_label', 'name' => 'Company label', 'type' => 'text', 'std' => 'Company' ],
		],
	];

	// ── Service Figma pages (product / web / design / mobile) ────────────────
	$svc_sp  = [ 'post_types' => [ 'page' ], 'show' => [ 'template' => [ 'page-service-figma.php' ] ] ];
	$car_sp  = [ 'post_types' => [ 'page' ], 'show' => [ 'template' => [ 'page-careers-figma.php' ] ] ];
	$op_sp   = [ 'post_types' => [ 'page' ], 'show' => [ 'template' => [ 'page-open-position-figma.php' ] ] ];
	$blg_sp  = [ 'post_types' => [ 'page' ], 'show' => [ 'template' => [ 'page-blog-figma.php' ] ] ];
	$ibl_sp  = [ 'post_types' => [ 'page' ], 'show' => [ 'template' => [ 'page-internal-blog-figma.php' ] ] ];
	$ibl_post_sp = [ 'post_types' => [ 'post' ] ];
	$int_sp  = [ 'post_types' => [ 'page' ], 'show' => [ 'template' => [ 'page-internal-figma.php' ] ] ];
	$reg_sp  = [ 'post_types' => [ 'page' ], 'show' => [ 'template' => [ 'page-register-figma.php' ] ] ];

	$svc_built_item_fields = [
		[ 'id' => 'icon_key',  'name' => 'Icon key (optional)', 'type' => 'text', 'desc' => 'Use one of: web, mobile, design, strategy, prototype, systems, planning, rocket, support, ai, cart, dashboard, human, integration, workflow, security.' ],
		[ 'id' => 'icon_svg',  'name' => 'Icon SVG',    'type' => 'textarea', 'rows' => 3 ],
		[ 'id' => 'title',     'name' => 'Title',        'type' => 'text' ],
		[ 'id' => 'desc',      'name' => 'Description',  'type' => 'textarea', 'rows' => 2 ],
		[ 'id' => 'cta_text',  'name' => 'Button label', 'type' => 'text' ],
		[ 'id' => 'cta_url',   'name' => 'Button URL',   'type' => 'text' ],
	];

	$svc_card_fields = [
		[ 'id' => 'image',    'name' => 'Image',        'type' => 'single_image', 'force_delete' => false ],
		[ 'id' => 'icon_key', 'name' => 'Icon key (optional)', 'type' => 'text', 'desc' => 'Used when Image is empty. Example: web, mobile, design, strategy, prototype, systems, ai, cart, dashboard, workflow.' ],
		[ 'id' => 'icon_svg', 'name' => 'Icon SVG',     'type' => 'textarea', 'rows' => 3 ],
		[ 'id' => 'tag',      'name' => 'Tag / eyebrow', 'type' => 'text' ],
		[ 'id' => 'title',    'name' => 'Title',         'type' => 'text' ],
		[ 'id' => 'desc',     'name' => 'Description',   'type' => 'textarea', 'rows' => 3 ],
		[ 'id' => 'link_url', 'name' => 'Link URL',      'type' => 'text' ],
	];

	$svc_case_fields = [
		[ 'id' => 'image',    'name' => 'Image',   'type' => 'single_image', 'force_delete' => false ],
		[ 'id' => 'client',   'name' => 'Client',  'type' => 'text' ],
		[ 'id' => 'title',    'name' => 'Title',   'type' => 'text' ],
		[ 'id' => 'desc',     'name' => 'Description', 'type' => 'textarea', 'rows' => 2 ],
		[ 'id' => 'tags',     'name' => 'Tags (comma-separated)', 'type' => 'text' ],
		[ 'id' => 'link_url', 'name' => 'Link URL','type' => 'text' ],
	];

	$meta_boxes[] = $svc_sp + [
		'title'  => 'Service · Hero',
		'id'     => 'lp_svc_hero',
		'fields' => [
			[
				'id'      => 'svc_theme',
				'name'    => 'Theme color',
				'type'    => 'select',
				'options' => [ 'product' => 'Product new look', 'web' => 'Web new look', 'design' => 'Design new look', 'mobile' => 'Mobile new look' ],
				'std'     => 'product',
			],
			[ 'id' => 'svc_header_cta_text', 'name' => 'Header CTA label', 'type' => 'text', 'std' => "Let's talk" ],
			[ 'id' => 'svc_header_cta_url',  'name' => 'Header CTA URL',   'type' => 'text', 'std' => '/contact/' ],
			[ 'id' => 'svc_hero_bc_parent',  'name' => 'Breadcrumb left',  'type' => 'text', 'std' => 'SERVICES' ],
			[ 'id' => 'svc_hero_bc_leaf',    'name' => 'Breadcrumb right', 'type' => 'text' ],
			[ 'id' => 'svc_hero_bc_extra',   'name' => 'Breadcrumb extra', 'type' => 'text' ],
			[ 'id' => 'svc_hero_heading',    'name' => 'Heading',          'type' => 'text' ],
			[ 'id' => 'svc_hero_subtext',    'name' => 'Subtext',          'type' => 'textarea' ],
			[ 'id' => 'svc_hero_cta_text',   'name' => 'CTA label',        'type' => 'text', 'std' => 'Book a call' ],
			[ 'id' => 'svc_hero_cta_url',    'name' => 'CTA URL',          'type' => 'text', 'std' => '/contact/' ],
			[ 'id' => 'svc_hero_img_a',      'name' => 'Photo left',       'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'svc_hero_img_b',      'name' => 'Photo right',      'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'svc_hero_img_a_alt',  'name' => 'Photo left alt',   'type' => 'text' ],
			[ 'id' => 'svc_hero_img_b_alt',  'name' => 'Photo right alt',  'type' => 'text' ],
		],
	];

	$meta_boxes[] = $svc_sp + [
		'title'  => 'Service · Built / Features',
		'id'     => 'lp_svc_built',
		'fields' => [
			[ 'id' => 'svc_built_heading_1', 'name' => 'Heading line 1', 'type' => 'text', 'std' => 'Built to Scale.' ],
			[ 'id' => 'svc_built_heading_2', 'name' => 'Heading line 2', 'type' => 'text', 'std' => 'Designed to Win.' ],
			[ 'id' => 'svc_built_desc',      'name' => 'Description',    'type' => 'textarea' ],
			[ 'id' => 'svc_built_grid_label','name' => 'Feature grid label (optional)', 'type' => 'text' ],
			[
				'id'         => 'svc_built_items',
				'name'       => 'Feature items',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add feature',
				'fields'     => $svc_built_item_fields,
			],
		],
	];

	$meta_boxes[] = $svc_sp + [
		'title'  => 'Service · Cards section',
		'id'     => 'lp_svc_cards',
		'fields' => [
			[ 'id' => 'svc_cards_eyebrow', 'name' => 'Eyebrow (optional)', 'type' => 'text' ],
			[ 'id' => 'svc_cards_heading', 'name' => 'Heading',            'type' => 'text' ],
			[ 'id' => 'svc_cards_desc',    'name' => 'Description',        'type' => 'textarea' ],
			[
				'id'      => 'svc_cards_layout',
				'name'    => 'Layout',
				'type'    => 'select',
				'options' => [ 'grid' => 'Grid (3 columns)', 'alternating' => 'Alternating rows (image + text)' ],
				'std'     => 'grid',
				'desc'    => 'Grid works best for icon cards. Alternating for image+text rows.',
			],
			[
				'id'         => 'svc_cards_items',
				'name'       => 'Cards',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add card',
				'fields'     => $svc_card_fields,
			],
		],
	];

	$meta_boxes[] = $svc_sp + [
		'title'  => 'Service · Case Studies',
		'id'     => 'lp_svc_cases',
		'fields' => [
			[ 'id' => 'svc_cases_heading',   'name' => 'Heading',        'type' => 'text', 'std' => 'From Solution to Success Stories' ],
			[ 'id' => 'svc_cases_link_text', 'name' => 'Link label',     'type' => 'text', 'std' => 'See All →' ],
			[ 'id' => 'svc_cases_link_url',  'name' => 'Link URL',       'type' => 'text', 'std' => '/work/' ],
			[
				'id'         => 'svc_cases_cards',
				'name'       => 'Case study cards',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add case study',
				'fields'     => $svc_case_fields,
			],
		],
	];

	$meta_boxes[] = $svc_sp + [
		'title'  => 'Service · Spotlight',
		'id'     => 'lp_svc_spotlight',
		'fields' => [
			[ 'id' => 'svc_spotlight_show',          'name' => 'Show spotlight section', 'type' => 'checkbox', 'std' => 0 ],
			[ 'id' => 'svc_spotlight_quote',         'name' => 'Quote text',             'type' => 'textarea', 'rows' => 4 ],
			[ 'id' => 'svc_spotlight_person_name',   'name' => 'Person name',            'type' => 'text' ],
			[ 'id' => 'svc_spotlight_person_role',   'name' => 'Person role / company',  'type' => 'text' ],
			[ 'id' => 'svc_spotlight_person_img',    'name' => 'Person photo',           'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'svc_spotlight_quote_img',     'name' => 'Quote card background',  'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'svc_spotlight_article_img',   'name' => 'Article image',          'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'svc_spotlight_article_tag',   'name' => 'Article tag / eyebrow',  'type' => 'text' ],
			[ 'id' => 'svc_spotlight_article_title', 'name' => 'Article title',          'type' => 'text' ],
			[ 'id' => 'svc_spotlight_article_desc',  'name' => 'Article excerpt',        'type' => 'textarea', 'rows' => 2 ],
			[ 'id' => 'svc_spotlight_detail_left_title',  'name' => 'Detail left title',   'type' => 'text' ],
			[ 'id' => 'svc_spotlight_detail_left_items',  'name' => 'Detail left bullets', 'type' => 'textarea', 'rows' => 3 ],
			[ 'id' => 'svc_spotlight_detail_right_title', 'name' => 'Detail right title',  'type' => 'text' ],
			[ 'id' => 'svc_spotlight_detail_right_items', 'name' => 'Detail right bullets','type' => 'textarea', 'rows' => 3 ],
			[ 'id' => 'svc_spotlight_article_url',   'name' => 'Article link URL',       'type' => 'text' ],
		],
	];

	$meta_boxes[] = $svc_sp + [
		'title'  => 'Service · Blog',
		'id'     => 'lp_svc_blog',
		'fields' => [
			[ 'id' => 'svc_blog_show',     'name' => 'Show blog section', 'type' => 'checkbox', 'std' => 0 ],
			[ 'id' => 'svc_blog_title',    'name' => 'Heading',        'type' => 'textarea', 'rows' => 2, 'std' => "Insights That Move\nBusiness Forward" ],
			[ 'id' => 'svc_blog_desc',     'name' => 'Description',    'type' => 'textarea' ],
			[ 'id' => 'svc_blog_cta_text', 'name' => 'Link label',     'type' => 'text', 'std' => 'All Insights →' ],
			[ 'id' => 'svc_blog_cta_url',  'name' => 'Link URL',       'type' => 'text', 'std' => '/blog/' ],
			[ 'id' => 'svc_blog_posts',    'name' => 'Number of posts','type' => 'number', 'std' => 3, 'min' => 1, 'max' => 12 ],
		],
	];

	$meta_boxes[] = $svc_sp + [
		'title'  => 'Service · Bottom CTA',
		'id'     => 'lp_svc_cta',
		'fields' => [
			[ 'id' => 'svc_cta_title',    'name' => 'Heading',      'type' => 'text', 'std' => "Let's Build What's Next" ],
			[ 'id' => 'svc_cta_desc',     'name' => 'Description',  'type' => 'textarea' ],
			[ 'id' => 'svc_cta_visual',   'name' => 'CTA visual',   'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'svc_cta_btn_text', 'name' => 'Button label', 'type' => 'text', 'std' => 'Start the Conversation →' ],
			[ 'id' => 'svc_cta_btn_url',  'name' => 'Button URL',   'type' => 'text', 'std' => '/contact/' ],
		],
	];

	// ── Careers Figma ─────────────────────────────────────────────────────────
	$car_perk_fields = [
		[
			'id'      => 'icon_key',
			'name'    => 'Icon preset',
			'type'    => 'select',
			'options' => [
				'globe'     => 'Globe',
				'briefcase' => 'Briefcase',
				'health'    => 'Healthcare',
				'savings'   => 'Savings',
			],
		],
		[ 'id' => 'icon_svg', 'name' => 'Icon SVG',   'type' => 'textarea', 'rows' => 3 ],
		[ 'id' => 'title',    'name' => 'Title',       'type' => 'text' ],
		[ 'id' => 'desc',     'name' => 'Description', 'type' => 'textarea', 'rows' => 2 ],
	];

	$car_role_fields = [
		[ 'id' => 'title',    'name' => 'Job title', 'type' => 'text' ],
		[ 'id' => 'type',     'name' => 'Employment type', 'type' => 'text', 'std' => 'Full-time' ],
		[ 'id' => 'location', 'name' => 'Location', 'type' => 'text', 'std' => 'Louisville, KY' ],
		[ 'id' => 'link_text','name' => 'Link label', 'type' => 'text', 'std' => 'Details' ],
		[ 'id' => 'tags',     'name' => 'Legacy tags (comma-separated)', 'type' => 'text', 'desc' => 'Used as fallback only.' ],
		[ 'id' => 'link_url', 'name' => 'Link URL',  'type' => 'text' ],
	];

	$meta_boxes[] = $car_sp + [
		'title'  => 'Careers · Hero',
		'id'     => 'lp_car_hero',
		'fields' => [
			[ 'id' => 'car_header_cta_text','name' => 'Header CTA label', 'type' => 'text', 'std' => "Let's talk" ],
			[ 'id' => 'car_header_cta_url', 'name' => 'Header CTA URL',   'type' => 'text', 'std' => '/contact/' ],
			[ 'id' => 'car_hero_bc_parent', 'name' => 'Breadcrumb left (optional)',  'type' => 'text', 'std' => '' ],
			[ 'id' => 'car_hero_bc_leaf',   'name' => 'Breadcrumb right (optional)', 'type' => 'text', 'std' => '' ],
			[ 'id' => 'car_hero_heading',   'name' => 'Heading (use \\n for line break)', 'type' => 'textarea', 'rows' => 2 ],
			[ 'id' => 'car_hero_subtext',   'name' => 'Subtext',          'type' => 'textarea' ],
			[ 'id' => 'car_hero_cta_text',  'name' => 'CTA label',        'type' => 'text', 'std' => 'Open Roles' ],
			[ 'id' => 'car_hero_cta_url',   'name' => 'CTA URL',          'type' => 'text', 'std' => '#open-roles' ],
			[ 'id' => 'car_hero_img_a',     'name' => 'Hero photo A',     'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'car_hero_img_a_alt', 'name' => 'Hero photo A alt text', 'type' => 'text' ],
			[ 'id' => 'car_hero_img_b',     'name' => 'Hero photo B',     'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'car_hero_img_b_alt', 'name' => 'Hero photo B alt text', 'type' => 'text' ],
			[ 'id' => 'car_hero_img',       'name' => 'Legacy hero photo', 'type' => 'single_image', 'force_delete' => false ],
		],
	];

	$meta_boxes[] = $car_sp + [
		'title'  => 'Careers · What It\'s Like',
		'id'     => 'lp_car_wtl',
		'fields' => [
			[ 'id' => 'car_wtl_heading', 'name' => 'Heading',                    'type' => 'text' ],
			[ 'id' => 'car_wtl_text',    'name' => 'Text (blank line = paragraph)', 'type' => 'textarea', 'rows' => 8 ],
			[ 'id' => 'car_wtl_img',     'name' => 'Side photo',                 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'car_wtl_img_alt', 'name' => 'Photo alt text',             'type' => 'text' ],
		],
	];

	$meta_boxes[] = $car_sp + [
		'title'  => 'Careers · Perks & Benefits',
		'id'     => 'lp_car_perks',
		'fields' => [
			[ 'id' => 'car_perks_heading', 'name' => 'Heading', 'type' => 'text', 'std' => 'Perks & Benefits' ],
			[
				'id'         => 'car_perks_items',
				'name'       => 'Perks (4 recommended)',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add perk',
				'fields'     => $car_perk_fields,
			],
			[ 'id' => 'car_perks_img',     'name' => 'Side photo',     'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'car_perks_img_alt', 'name' => 'Photo alt text', 'type' => 'text' ],
		],
	];

	$meta_boxes[] = $car_sp + [
		'title'  => 'Careers · Open Roles',
		'id'     => 'lp_car_roles',
		'fields' => [
			[ 'id' => 'car_roles_heading', 'name' => 'Section heading', 'type' => 'text', 'std' => 'Open Roles' ],
			[
				'id'         => 'car_roles_items',
				'name'       => 'Roles',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add role',
				'fields'     => $car_role_fields,
			],
		],
	];

	$meta_boxes[] = $car_sp + [
		'title'  => 'Careers · Contact Form',
		'id'     => 'lp_car_form',
		'fields' => [
			[ 'id' => 'car_form_heading',  'name' => 'Heading',            'type' => 'text', 'std' => 'Hit us up' ],
			[ 'id' => 'car_form_subtext',  'name' => 'Subtext',            'type' => 'textarea' ],
			[ 'id' => 'car_form_gf_id',   'name' => 'Gravity Forms ID',   'type' => 'number', 'min' => 0, 'desc' => 'Leave 0 to show the built-in HTML form.' ],
		],
	];

	// ── Open Position Figma ───────────────────────────────────────────────────
	$op_section_fields = [
		[
			'id'      => 'section_type',
			'name'    => 'Type',
			'type'    => 'select',
			'options' => [ 'text' => 'Paragraph text', 'list' => 'Bullet list' ],
			'std'     => 'text',
		],
		[ 'id' => 'title', 'name' => 'Section heading', 'type' => 'text' ],
		[ 'id' => 'body',  'name' => 'Content (one paragraph or bullet per line)', 'type' => 'textarea', 'rows' => 8 ],
	];

	$meta_boxes[] = $op_sp + [
		'title'  => 'Open Position · Header',
		'id'     => 'lp_op_header',
		'fields' => [
			[ 'id' => 'op_header_cta_text', 'name' => 'Header CTA label', 'type' => 'text', 'std' => "Let's talk" ],
			[ 'id' => 'op_header_cta_url',  'name' => 'Header CTA URL',   'type' => 'text', 'std' => '/contact/' ],
			[ 'id' => 'op_job_title',    'name' => 'Job title (overrides page title)', 'type' => 'text' ],
			[ 'id' => 'op_job_type',     'name' => 'Employment type',                  'type' => 'text', 'std' => 'Full-time' ],
			[ 'id' => 'op_job_location', 'name' => 'Location',                         'type' => 'text', 'std' => 'Louisville, KY' ],
			[ 'id' => 'op_job_tags',     'name' => 'Legacy tags (comma-separated)',    'type' => 'text', 'std' => 'On-site, Louisville KY, Full-time' ],
			[ 'id' => 'op_bc_parent',    'name' => 'Back button label',                'type' => 'text', 'std' => 'Open Positions' ],
			[ 'id' => 'op_bc_parent_url','name' => 'Back button URL',                 'type' => 'text', 'std' => '/careers/#open-roles' ],
		],
	];

	$meta_boxes[] = $op_sp + [
		'title'  => 'Open Position · Content sections',
		'id'     => 'lp_op_sections',
		'fields' => [
			[
				'id'         => 'op_sections',
				'name'       => 'Sections',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add section',
				'desc'       => 'Add structured sections here. Alternatively, use WPBakery editor for full layout control.',
				'fields'     => $op_section_fields,
			],
		],
	];

	$meta_boxes[] = $op_sp + [
		'title'  => 'Open Position · Contact Form',
		'id'     => 'lp_op_form',
		'fields' => [
			[ 'id' => 'op_form_heading', 'name' => 'Heading',          'type' => 'text', 'std' => 'Hit us up' ],
			[ 'id' => 'op_form_subtext', 'name' => 'Subtext',          'type' => 'textarea' ],
			[ 'id' => 'op_form_gf_id',  'name' => 'Gravity Forms ID', 'type' => 'number', 'min' => 0, 'desc' => 'Leave 0 to show the built-in HTML form.' ],
		],
	];

	// ── Blog Figma ─────────────────────────────────────────────────────────────
	$meta_boxes[] = $blg_sp + [
		'title'  => 'Blog · Hero',
		'id'     => 'lp_blg_hero',
		'fields' => [
			[ 'id' => 'blg_hero_label',    'name' => 'Label', 'type' => 'text', 'std' => 'INSIGHTS' ],
			[ 'id' => 'blg_hero_heading',  'name' => 'Heading', 'type' => 'text', 'std' => 'Daredevil Diaries' ],
			[ 'id' => 'blg_hero_desc',     'name' => 'Description', 'type' => 'textarea' ],
			[ 'id' => 'blg_hero_cta_text', 'name' => 'CTA label', 'type' => 'text', 'std' => 'Read More' ],
			[ 'id' => 'blg_hero_cta_url',  'name' => 'CTA URL', 'type' => 'text', 'std' => '#blog-grid' ],
			[ 'id' => 'blg_hero_img_a',    'name' => 'Hero image A', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'blg_hero_img_b',    'name' => 'Hero image B', 'type' => 'single_image', 'force_delete' => false ],
		],
	];

	$meta_boxes[] = $blg_sp + [
		'title'  => 'Blog · Feed Controls',
		'id'     => 'lp_blg_feed',
		'fields' => [
			[ 'id' => 'blg_filter_tabs',    'name' => 'Filter tabs (one per line)', 'type' => 'textarea', 'rows' => 6, 'std' => "All\nAI\nProduct\nEngineering\nDesign\nBusiness" ],
			[ 'id' => 'blg_posts_per_page', 'name' => 'Posts per page', 'type' => 'number', 'std' => 12, 'min' => 6, 'max' => 48 ],
			[ 'id' => 'blg_initial_visible','name' => 'Initial visible cards', 'type' => 'number', 'std' => 12, 'min' => 6, 'max' => 48 ],
		],
	];

	$meta_boxes[] = $blg_sp + [
		'title'  => 'Blog · Podcast',
		'id'     => 'lp_blg_podcast',
		'fields' => [
			[ 'id' => 'blg_podcast_show',    'name' => 'Show podcast section', 'type' => 'checkbox', 'std' => 1 ],
			[ 'id' => 'blg_podcast_heading', 'name' => 'Heading', 'type' => 'text', 'std' => "The Founders' Fable Podcast" ],
			[ 'id' => 'blg_podcast_desc',    'name' => 'Description', 'type' => 'textarea' ],
			[ 'id' => 'blg_podcast_img',     'name' => 'Podcast image', 'type' => 'single_image', 'force_delete' => false ],
			[
				'id'         => 'blg_podcast_links',
				'name'       => 'Podcast links',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add link',
				'fields'     => [
					[ 'id' => 'label', 'name' => 'Label', 'type' => 'text' ],
					[ 'id' => 'url',   'name' => 'URL', 'type' => 'text' ],
				],
			],
		],
	];

	$meta_boxes[] = $blg_sp + [
		'title'  => 'Blog · Bottom CTA',
		'id'     => 'lp_blg_cta',
		'fields' => [
			[ 'id' => 'blg_cta_heading',  'name' => 'Heading', 'type' => 'text', 'std' => 'Ready to Launch Something Bold?' ],
			[ 'id' => 'blg_cta_desc',     'name' => 'Description', 'type' => 'textarea' ],
			[ 'id' => 'blg_cta_btn_text', 'name' => 'Button label', 'type' => 'text', 'std' => "Let's Talk" ],
			[ 'id' => 'blg_cta_btn_url',  'name' => 'Button URL', 'type' => 'text', 'std' => '/contact/' ],
		],
	];

	// ── Internal Blog Figma ───────────────────────────────────────────────────
	foreach ( array( 'page' => $ibl_sp, 'post' => $ibl_post_sp ) as $ibl_target_key => $ibl_target_sp ) {
		$ibl_box_suffix = 'post' === $ibl_target_key ? '_post' : '';

		$meta_boxes[] = $ibl_target_sp + [
			'title'  => 'Internal Blog · Header',
			'id'     => 'lp_ibl_header' . $ibl_box_suffix,
			'fields' => [
				[ 'id' => 'ibl_label',     'name' => 'Label', 'type' => 'text', 'std' => 'INSIGHTS' ],
				[ 'id' => 'ibl_title',     'name' => 'Title (overrides page title)', 'type' => 'text' ],
				[ 'id' => 'ibl_author',    'name' => 'Author', 'type' => 'text' ],
				[ 'id' => 'ibl_date',      'name' => 'Published date', 'type' => 'text' ],
				[ 'id' => 'ibl_read_time', 'name' => 'Read time', 'type' => 'text', 'std' => '5 min read' ],
				[ 'id' => 'ibl_hero_img',  'name' => 'Hero image', 'type' => 'single_image', 'force_delete' => false ],
			],
		];

		$meta_boxes[] = $ibl_target_sp + [
			'title'  => 'Internal Blog · Intro Block',
			'id'     => 'lp_ibl_intro' . $ibl_box_suffix,
			'fields' => [
				[ 'id' => 'ibl_intro_bullets',       'name' => 'Key takeaway bullets (one per line)', 'type' => 'textarea', 'rows' => 5, 'desc' => 'Leave empty to hide the intro card entirely.' ],
				[ 'id' => 'ibl_intro_subscribe_desc', 'name' => 'Subscribe blurb text', 'type' => 'text', 'std' => 'Get practical updates from the Slingshot team.' ],
			],
		];

		$meta_boxes[] = $ibl_target_sp + [
			'title'  => 'Internal Blog · Bottom CTA',
			'id'     => 'lp_ibl_cta' . $ibl_box_suffix,
			'fields' => [
				[ 'id' => 'ibl_cta_heading',  'name' => 'Heading', 'type' => 'text', 'std' => 'Ready to Launch Something Bold?' ],
				[ 'id' => 'ibl_cta_desc',     'name' => 'Description', 'type' => 'textarea' ],
				[ 'id' => 'ibl_cta_btn_text', 'name' => 'Button label', 'type' => 'text', 'std' => "Let's Talk" ],
				[ 'id' => 'ibl_cta_btn_url',  'name' => 'Button URL', 'type' => 'text', 'std' => '/contact/' ],
			],
		];
	}

	// ── Internal Figma ────────────────────────────────────────────────────────
	$meta_boxes[] = $int_sp + [
		'title'  => 'Internal · Hero',
		'id'     => 'lp_int_hero',
		'fields' => [
			[ 'id' => 'int_label',     'name' => 'Label', 'type' => 'text', 'std' => 'INTERNAL' ],
			[ 'id' => 'int_heading',   'name' => 'Heading', 'type' => 'text', 'std' => 'Inside Slingshot' ],
			[ 'id' => 'int_desc',      'name' => 'Description', 'type' => 'textarea' ],
			[ 'id' => 'int_btn_text',  'name' => 'Button label', 'type' => 'text', 'std' => 'Get in Touch' ],
			[ 'id' => 'int_btn_url',   'name' => 'Button URL', 'type' => 'text', 'std' => '/contact/' ],
			[ 'id' => 'int_hero_img',  'name' => 'Hero image', 'type' => 'single_image', 'force_delete' => false ],
		],
	];

	// ── Register Figma ────────────────────────────────────────────────────────
	$meta_boxes[] = $reg_sp + [
		'title'  => 'Register · Hero',
		'id'     => 'lp_reg_hero',
		'fields' => [
			[ 'id' => 'reg_label',    'name' => 'Label', 'type' => 'text', 'std' => 'EVENT REGISTRATION' ],
			[ 'id' => 'reg_heading',  'name' => 'Heading', 'type' => 'text', 'std' => 'Register' ],
			[ 'id' => 'reg_desc',     'name' => 'Description', 'type' => 'textarea' ],
			[ 'id' => 'reg_hero_img', 'name' => 'Hero image', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'reg_event_title', 'name' => 'Event title', 'type' => 'text', 'std' => 'Louisville AI Exchange - January 2025' ],
			[ 'id' => 'reg_event_meta', 'name' => 'Event date/time', 'type' => 'text', 'std' => 'Thursday, January 15 · 4 - 6pm EST' ],
		],
	];

	$meta_boxes[] = $reg_sp + [
		'title'  => 'Register · Form',
		'id'     => 'lp_reg_form',
		'fields' => [
			[ 'id' => 'reg_form_heading', 'name' => 'Form heading', 'type' => 'text', 'std' => 'Complete Your Registration' ],
			[ 'id' => 'reg_form_gf_id',   'name' => 'Gravity Forms ID (0 = static HTML)', 'type' => 'number', 'std' => 0 ],
			[ 'id' => 'reg_submit_text',  'name' => 'Submit button label', 'type' => 'text', 'std' => 'Register →' ],
			[ 'id' => 'reg_ticket_title', 'name' => 'Ticket title', 'type' => 'text', 'std' => 'General Admission' ],
			[ 'id' => 'reg_ticket_price', 'name' => 'Ticket price', 'type' => 'text', 'std' => 'Free' ],
			[ 'id' => 'reg_ticket_note', 'name' => 'Ticket note', 'type' => 'text', 'std' => 'Sales end on Jan 15, 2026' ],
			[ 'id' => 'reg_order_title', 'name' => 'Order summary title', 'type' => 'text', 'std' => 'Order summary' ],
			[ 'id' => 'reg_order_line', 'name' => 'Order line text', 'type' => 'text', 'std' => '1 x General Admission' ],
			[ 'id' => 'reg_order_total', 'name' => 'Order total text', 'type' => 'text', 'std' => '$0.00' ],
			[ 'id' => 'reg_side_img', 'name' => 'Right column image', 'type' => 'single_image', 'force_delete' => false ],
		],
	];

	// ── Contact Figma ─────────────────────────────────────────────────────────
	$cnt_sp = [ 'post_types' => [ 'page' ], 'show' => [ 'template' => [ 'page-contact-figma.php' ] ] ];

	$cnt_office_fields = [
		[ 'id' => 'label',        'name' => 'City label',   'type' => 'text' ],
		[ 'id' => 'address_1',   'name' => 'Address line 1','type' => 'text' ],
		[ 'id' => 'address_2',   'name' => 'Address line 2 (optional)', 'type' => 'text' ],
		[ 'id' => 'city_state_zip', 'name' => 'City, State ZIP', 'type' => 'text' ],
	];

	$meta_boxes[] = $cnt_sp + [
		'title'  => 'Contact · Hero',
		'id'     => 'lp_cnt_hero',
		'fields' => [
			[ 'id' => 'cnt_heading', 'name' => 'Heading',     'type' => 'text',     'std' => 'Ready To Get Started?' ],
			[ 'id' => 'cnt_desc',    'name' => 'Description', 'type' => 'textarea', 'std' => 'Have questions about pricing, projects, or Slingshot? Fill out the form below and a Slingshot representative will be in touch shortly.' ],
		],
	];

	$meta_boxes[] = $cnt_sp + [
		'title'  => 'Contact · Details',
		'id'     => 'lp_cnt_details',
		'fields' => [
			[ 'id' => 'cnt_phone', 'name' => 'Phone number', 'type' => 'text', 'std' => '502.254.6150' ],
			[ 'id' => 'cnt_email', 'name' => 'Email address', 'type' => 'text', 'std' => 'hello@Yslingshot.com' ],
			[
				'id'         => 'cnt_offices',
				'name'       => 'Office locations',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add office',
				'fields'     => $cnt_office_fields,
			],
		],
	];

	$meta_boxes[] = $cnt_sp + [
		'title'  => 'Contact · Form',
		'id'     => 'lp_cnt_form',
		'fields' => [
			[ 'id' => 'cnt_form_heading',      'name' => 'Form heading',                         'type' => 'text',     'std' => 'Hit us up' ],
			[ 'id' => 'cnt_form_gf_id',        'name' => 'Gravity Forms ID',                     'type' => 'number',   'min' => 0, 'desc' => 'Leave 0 to show the built-in HTML form.' ],
			[ 'id' => 'cnt_looking_options',   'name' => '"What are you looking for?" options (one per line)', 'type' => 'textarea', 'rows' => 8,
			  'std' => "General Inquiry\nProduct Development\nMobile App Development\nWeb Development\nDesign\nAI / Machine Learning\nTeam Augmentation\nConsulting" ],
		],
	];

	// ── Thank You Figma ───────────────────────────────────────────────────────
	$ty_sp = [ 'post_types' => [ 'page' ], 'show' => [ 'template' => [ 'page-thank-you-figma.php' ] ] ];

	$ty_next_fields = [
		[ 'id' => 'icon_svg', 'name' => 'Icon SVG', 'type' => 'textarea', 'rows' => 3 ],
		[ 'id' => 'title',    'name' => 'Title',    'type' => 'text' ],
		[ 'id' => 'desc',     'name' => 'Description', 'type' => 'textarea', 'rows' => 3 ],
	];

	$meta_boxes[] = $ty_sp + [
		'title'  => 'Thank You · Hero',
		'id'     => 'lp_ty_hero',
		'fields' => [
			[ 'id' => 'ty_hero_label',     'name' => 'Eyebrow label', 'type' => 'text', 'std' => 'MESSAGE SENT' ],
			[ 'id' => 'ty_hero_heading',   'name' => 'Heading',       'type' => 'text', 'std' => 'Thank You!' ],
			[ 'id' => 'ty_hero_desc',      'name' => 'Description',   'type' => 'textarea' ],
			[ 'id' => 'ty_primary_text',   'name' => 'Primary button label', 'type' => 'text', 'std' => 'Back to Home' ],
			[ 'id' => 'ty_primary_url',    'name' => 'Primary button URL',   'type' => 'text', 'std' => '/' ],
			[ 'id' => 'ty_secondary_text', 'name' => 'Secondary button label', 'type' => 'text', 'std' => 'Explore Our Work' ],
			[ 'id' => 'ty_secondary_url',  'name' => 'Secondary button URL',   'type' => 'text', 'std' => '/our-work/' ],
		],
	];

	$meta_boxes[] = $ty_sp + [
		'title'  => 'Thank You · Confirmation Card',
		'id'     => 'lp_ty_card',
		'fields' => [
			[ 'id' => 'ty_card_eyebrow', 'name' => 'Card eyebrow', 'type' => 'text', 'std' => 'Ready, aimed, fired' ],
			[ 'id' => 'ty_card_heading', 'name' => 'Card heading', 'type' => 'textarea', 'rows' => 2 ],
			[ 'id' => 'ty_card_desc',    'name' => 'Card description', 'type' => 'textarea', 'rows' => 2 ],
			[ 'id' => 'ty_mascot_img',   'name' => 'Card image / mascot', 'type' => 'single_image', 'force_delete' => false ],
		],
	];

	$meta_boxes[] = $ty_sp + [
		'title'  => 'Thank You · Next Steps',
		'id'     => 'lp_ty_next',
		'fields' => [
			[ 'id' => 'ty_next_heading', 'name' => 'Heading', 'type' => 'text', 'std' => 'What Happens Next' ],
			[
				'id'         => 'ty_next_items',
				'name'       => 'Next step cards',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add step',
				'fields'     => $ty_next_fields,
			],
		],
	];

	$meta_boxes[] = $ty_sp + [
		'title'  => 'Thank You · Contact Band',
		'id'     => 'lp_ty_contact',
		'fields' => [
			[ 'id' => 'ty_contact_heading', 'name' => 'Heading', 'type' => 'text', 'std' => 'Need something urgent?' ],
			[ 'id' => 'ty_contact_desc',    'name' => 'Description', 'type' => 'textarea' ],
			[ 'id' => 'ty_contact_phone',   'name' => 'Phone number', 'type' => 'text', 'std' => '502.254.6150' ],
			[ 'id' => 'ty_contact_email',   'name' => 'Email address', 'type' => 'text', 'std' => 'hello@yslingshot.com' ],
		],
	];

	// ── Work Figma ────────────────────────────────────────────────────────────
	$wrk_sp = [ 'post_types' => [ 'page' ], 'show' => [ 'template' => [ 'page-work-figma.php' ] ] ];

	$wrk_project_fields = [
		[ 'id' => 'image',      'name' => 'Project image', 'type' => 'single_image', 'force_delete' => false ],
		[ 'id' => 'image_url',  'name' => 'Project image URL fallback', 'type' => 'text', 'desc' => 'Used when no media-library image is selected.' ],
		[ 'id' => 'title',      'name' => 'Project title', 'type' => 'text' ],
		[ 'id' => 'subtitle',   'name' => 'Subtitle (optional)', 'type' => 'text' ],
		[ 'id' => 'tags',       'name' => 'Display tags (comma-separated)', 'type' => 'text', 'desc' => 'e.g. Mobile, iOS' ],
		[ 'id' => 'categories', 'name' => 'Filter categories (comma-separated slugs)', 'type' => 'text', 'desc' => 'e.g. mobile, web, design, ai — must match filter tab names (lowercase)' ],
		[ 'id' => 'link_url',   'name' => 'Link URL', 'type' => 'text' ],
	];

	$meta_boxes[] = $wrk_sp + [
		'title'  => 'Work · Hero',
		'id'     => 'lp_wrk_hero',
		'fields' => [
			[ 'id' => 'wrk_hero_heading', 'name' => 'Heading',        'type' => 'text',         'std' => 'Explore Our Work' ],
			[ 'id' => 'wrk_hero_eyebrow', 'name' => 'Eyebrow text',   'type' => 'text' ],
			[ 'id' => 'wrk_hero_desc',    'name' => 'Description',    'type' => 'textarea' ],
			[ 'id' => 'wrk_hero_cta_text', 'name' => 'CTA label',      'type' => 'text',         'std' => 'Book a call' ],
			[ 'id' => 'wrk_hero_cta_url',  'name' => 'CTA URL',        'type' => 'text',         'std' => '/contact/' ],
			[ 'id' => 'wrk_hero_img_a',   'name' => 'Hero photo A',   'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'wrk_hero_img_b',   'name' => 'Hero photo B',   'type' => 'single_image', 'force_delete' => false ],
		],
	];

	$meta_boxes[] = $wrk_sp + [
		'title'  => 'Work · Projects',
		'id'     => 'lp_wrk_projects',
		'fields' => [
			[ 'id' => 'wrk_filter_tabs',    'name' => 'Filter tabs (one per line)',  'type' => 'textarea', 'rows' => 5,
			  'std' => "All\nMobile\nWeb\nDesign\nAI",
			  'desc' => 'First tab is always "All". Remaining tabs must match category slugs (case-insensitive).' ],
			[ 'id' => 'wrk_initial_visible', 'name' => 'Cards visible before Load More', 'type' => 'number', 'std' => 9, 'min' => 3, 'max' => 48 ],
			[
				'id'         => 'wrk_projects',
				'name'       => 'Projects',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add project',
				'fields'     => $wrk_project_fields,
			],
		],
	];

	$meta_boxes[] = $wrk_sp + [
		'title'  => 'Work · Bottom CTA',
		'id'     => 'lp_wrk_cta',
		'fields' => [
			[ 'id' => 'wrk_cta_heading',  'name' => 'Heading',      'type' => 'text',     'std' => 'Ready to Launch Something Bold?' ],
			[ 'id' => 'wrk_cta_desc',     'name' => 'Description',  'type' => 'textarea' ],
			[ 'id' => 'wrk_cta_btn_text', 'name' => 'Button label', 'type' => 'text',     'std' => "Let's Talk" ],
			[ 'id' => 'wrk_cta_btn_url',  'name' => 'Button URL',   'type' => 'text',     'std' => '/contact/' ],
			[ 'id' => 'wrk_cta_mascot',   'name' => 'Mascot image', 'type' => 'single_image', 'force_delete' => false ],
		],
	];

	// ── Case Study Figma ──────────────────────────────────────────────────────
	$cs_sp      = [ 'post_types' => [ 'page' ], 'show' => [ 'template' => [ 'page-case-study-figma.php' ] ] ];
	$cs_port_sp = [ 'post_types' => [ 'portfolio' ] ];

	$cs_section_fields = [
		[ 'id' => 'label',     'name' => 'Eyebrow label',   'type' => 'text', 'desc' => 'Small uppercase label above heading (optional)' ],
		[ 'id' => 'heading',   'name' => 'Section heading', 'type' => 'text' ],
		[ 'id' => 'desc',      'name' => 'Description',     'type' => 'textarea', 'rows' => 4 ],
		[ 'id' => 'bullets',   'name' => 'Bullet points (one per line)', 'type' => 'textarea', 'rows' => 5 ],
		[ 'id' => 'image',     'name' => 'Section image',  'type' => 'single_image', 'force_delete' => false ],
		[ 'id' => 'image_url', 'name' => 'Section image URL fallback', 'type' => 'text', 'desc' => 'Used when no media-library image is selected.' ],
		[
			'id'      => 'image_side',
			'name'    => 'Image position',
			'type'    => 'select',
			'options' => [ 'right' => 'Image on right', 'left' => 'Image on left' ],
			'std'     => 'right',
		],
		[
			'id'   => 'dark_bg',
			'name' => 'Dark background',
			'type' => 'checkbox',
			'desc' => 'Enable dark/navy section background',
		],
	];

	$meta_boxes[] = $cs_sp + [
		'title'  => 'Case Study · Hero',
		'id'     => 'lp_cs_hero',
		'fields' => [
			[ 'id' => 'cs_hero_client',  'name' => 'Client name', 'type' => 'text', 'desc' => 'Shown in breadcrumb and below heading' ],
			[ 'id' => 'cs_hero_title',   'name' => 'Project title (overrides page title)', 'type' => 'text' ],
			[ 'id' => 'cs_hero_tags',    'name' => 'Tags (comma-separated)', 'type' => 'text', 'desc' => 'e.g. Mobile App, iOS, UX Design' ],
			[ 'id' => 'cs_hero_desc',    'name' => 'Hero description', 'type' => 'textarea', 'rows' => 3 ],
			[ 'id' => 'cs_hero_img',     'name' => 'Hero image (device mockup etc.)', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'cs_hero_img_url', 'name' => 'Hero image URL fallback', 'type' => 'text' ],
		],
	];

	$meta_boxes[] = $cs_sp + [
		'title'  => 'Case Study · Challenge',
		'id'     => 'lp_cs_challenge',
		'fields' => [
			[ 'id' => 'cs_challenge_label',   'name' => 'Eyebrow label', 'type' => 'text',     'std' => 'Challenge' ],
			[ 'id' => 'cs_challenge_heading', 'name' => 'Heading',       'type' => 'text' ],
			[ 'id' => 'cs_challenge_text',    'name' => 'Text (blank line = new paragraph)', 'type' => 'textarea', 'rows' => 6 ],
		],
	];

	$meta_boxes[] = $cs_sp + [
		'title'  => 'Case Study · Feature Sections',
		'id'     => 'lp_cs_sections',
		'fields' => [
			[
				'id'         => 'cs_sections',
				'name'       => 'Sections',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add section',
				'fields'     => $cs_section_fields,
			],
		],
	];

	$meta_boxes[] = $cs_sp + [
		'title'  => 'Case Study · Bottom CTA',
		'id'     => 'lp_cs_cta',
		'fields' => [
			[ 'id' => 'cs_cta_heading',  'name' => 'Heading',      'type' => 'text',     'std' => 'Ready to Launch Something Bold?' ],
			[ 'id' => 'cs_cta_desc',     'name' => 'Description',  'type' => 'textarea' ],
			[ 'id' => 'cs_cta_btn_text', 'name' => 'Button label', 'type' => 'text',     'std' => "Let's Talk" ],
			[ 'id' => 'cs_cta_btn_url',  'name' => 'Button URL',   'type' => 'text',     'std' => '/contact/' ],
		],
	];

	$cs_gallery_fields = [
		[ 'id' => 'image',     'name' => 'Image', 'type' => 'single_image', 'force_delete' => false ],
		[ 'id' => 'image_url', 'name' => 'Image URL fallback', 'type' => 'text' ],
		[ 'id' => 'alt',       'name' => 'Alt text', 'type' => 'text' ],
	];

	$meta_boxes[] = $cs_port_sp + [
		'title'  => 'Portfolio Case Study · Display',
		'id'     => 'lp_cs_port_display',
		'fields' => [
			[ 'id' => 'cs_figma_enabled', 'name' => 'Use Figma case study template', 'type' => 'checkbox', 'desc' => 'Enable the redesigned Work internal page for this portfolio item.' ],
		],
	];

	$meta_boxes[] = $cs_port_sp + [
		'title'  => 'Portfolio Case Study · Hero',
		'id'     => 'lp_cs_port_hero',
		'fields' => [
			[ 'id' => 'cs_hero_client',  'name' => 'Client name', 'type' => 'text', 'desc' => 'Shown in the Work breadcrumb.' ],
			[ 'id' => 'cs_hero_title',   'name' => 'Hero title', 'type' => 'text' ],
			[ 'id' => 'cs_hero_desc',    'name' => 'Hero description', 'type' => 'textarea', 'rows' => 3 ],
			[ 'id' => 'cs_hero_img',     'name' => 'Hero visual', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'cs_hero_img_url', 'name' => 'Hero visual URL fallback', 'type' => 'text' ],
		],
	];

	$meta_boxes[] = $cs_port_sp + [
		'title'  => 'Portfolio Case Study · Intro',
		'id'     => 'lp_cs_port_intro',
		'fields' => [
			[ 'id' => 'cs_intro_heading', 'name' => 'Intro heading', 'type' => 'textarea', 'rows' => 3 ],
			[ 'id' => 'cs_intro_text',    'name' => 'Intro text', 'type' => 'textarea', 'rows' => 4 ],
			[ 'id' => 'cs_services',      'name' => 'Services tags (one per line or comma-separated)', 'type' => 'textarea', 'rows' => 3 ],
			[ 'id' => 'cs_technology',    'name' => 'Technology tags (one per line or comma-separated)', 'type' => 'textarea', 'rows' => 4 ],
		],
	];

	$meta_boxes[] = $cs_port_sp + [
		'title'  => 'Portfolio Case Study · Media',
		'id'     => 'lp_cs_port_media',
		'fields' => [
			[ 'id' => 'cs_media_top_img',        'name' => 'Top full-width media', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'cs_media_top_img_url',    'name' => 'Top media URL fallback', 'type' => 'text' ],
			[ 'id' => 'cs_media_middle_img',     'name' => 'Middle full-width media', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'cs_media_middle_img_url', 'name' => 'Middle media URL fallback', 'type' => 'text' ],
			[ 'id' => 'cs_media_bottom_img',     'name' => 'Bottom full-width media', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'cs_media_bottom_img_url', 'name' => 'Bottom media URL fallback', 'type' => 'text' ],
		],
	];

	$meta_boxes[] = $cs_port_sp + [
		'title'  => 'Portfolio Case Study · Solution',
		'id'     => 'lp_cs_port_solution',
		'fields' => [
			[ 'id' => 'cs_solution_heading', 'name' => 'Solution section heading', 'type' => 'textarea', 'rows' => 3 ],
			[ 'id' => 'cs_solution_text',    'name' => 'Solution section text', 'type' => 'textarea', 'rows' => 4 ],
			[ 'id' => 'cs_challenges',       'name' => 'Challenges (one per line)', 'type' => 'textarea', 'rows' => 7 ],
			[ 'id' => 'cs_solutions',        'name' => 'Solutions (one per line)', 'type' => 'textarea', 'rows' => 7 ],
			[
				'id'         => 'cs_gallery',
				'name'       => 'Two-column image gallery',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add gallery image',
				'fields'     => $cs_gallery_fields,
			],
			[ 'id' => 'cs_onboarding_img',     'name' => 'Onboarding framed media', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'cs_onboarding_img_url', 'name' => 'Onboarding media URL fallback', 'type' => 'text' ],
		],
	];

	$meta_boxes[] = $cs_port_sp + [
		'title'  => 'Portfolio Case Study · Admin Tools',
		'id'     => 'lp_cs_port_admin',
		'fields' => [
			[ 'id' => 'cs_admin_heading',         'name' => 'Admin tools heading', 'type' => 'textarea', 'rows' => 3 ],
			[ 'id' => 'cs_admin_text',            'name' => 'Admin tools text', 'type' => 'textarea', 'rows' => 4 ],
			[ 'id' => 'cs_admin_img',             'name' => 'Admin tools framed media', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'cs_admin_img_url',         'name' => 'Admin tools media URL fallback', 'type' => 'text' ],
			[ 'id' => 'cs_design_system_img',     'name' => 'Design system media', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'cs_design_system_img_url', 'name' => 'Design system media URL fallback', 'type' => 'text' ],
		],
	];

	$meta_boxes[] = $cs_port_sp + [
		'title'  => 'Portfolio Case Study · Sidebar CTA',
		'id'     => 'lp_cs_port_sidebar',
		'fields' => [
			[ 'id' => 'cs_side_avatar',     'name' => 'Person avatar', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'cs_side_avatar_url', 'name' => 'Person avatar URL fallback', 'type' => 'text' ],
			[ 'id' => 'cs_side_name',       'name' => 'Person name', 'type' => 'text' ],
			[ 'id' => 'cs_side_role',       'name' => 'Person role', 'type' => 'text' ],
			[ 'id' => 'cs_side_title',      'name' => 'CTA heading', 'type' => 'textarea', 'rows' => 2 ],
			[ 'id' => 'cs_side_text',       'name' => 'CTA text', 'type' => 'textarea', 'rows' => 3 ],
			[ 'id' => 'cs_side_btn_text',   'name' => 'Button label', 'type' => 'text', 'std' => 'Request a quote' ],
			[ 'id' => 'cs_side_btn_url',    'name' => 'Button URL', 'type' => 'text', 'std' => '/contact/' ],
		],
	];

	$meta_boxes[] = $cs_port_sp + [
		'title'  => 'Portfolio Case Study · Client Review',
		'id'     => 'lp_cs_port_review',
		'fields' => [
			[ 'id' => 'cs_review_label',      'name' => 'Label', 'type' => 'text', 'std' => 'Client Review' ],
			[ 'id' => 'cs_review_quote',      'name' => 'Quote heading', 'type' => 'textarea', 'rows' => 3 ],
			[ 'id' => 'cs_review_stars',      'name' => 'Star count', 'type' => 'number', 'min' => 0, 'max' => 5, 'std' => 5 ],
			[ 'id' => 'cs_review_text',       'name' => 'Review text', 'type' => 'textarea', 'rows' => 4 ],
			[ 'id' => 'cs_review_name',       'name' => 'Reviewer name', 'type' => 'text' ],
			[ 'id' => 'cs_review_role',       'name' => 'Reviewer role', 'type' => 'text' ],
			[ 'id' => 'cs_review_avatar',     'name' => 'Reviewer avatar', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'cs_review_avatar_url', 'name' => 'Reviewer avatar URL fallback', 'type' => 'text' ],
			[ 'id' => 'cs_review_img',        'name' => 'Review image', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'cs_review_img_url',    'name' => 'Review image URL fallback', 'type' => 'text' ],
		],
	];

	$meta_boxes[] = $cs_port_sp + [
		'title'  => 'Portfolio Case Study · Bottom CTA',
		'id'     => 'lp_cs_port_cta',
		'fields' => [
			[ 'id' => 'cs_cta_heading',    'name' => 'Heading', 'type' => 'textarea', 'rows' => 2, 'std' => 'Ready to Launch Something Bold?' ],
			[ 'id' => 'cs_cta_desc',       'name' => 'Description', 'type' => 'textarea', 'rows' => 3 ],
			[ 'id' => 'cs_cta_btn_text',   'name' => 'Button label', 'type' => 'text', 'std' => "Let's Talk" ],
			[ 'id' => 'cs_cta_btn_url',    'name' => 'Button URL', 'type' => 'text', 'std' => '/contact/' ],
			[ 'id' => 'cs_cta_mascot',     'name' => 'Mascot image', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'cs_cta_mascot_url', 'name' => 'Mascot image URL fallback', 'type' => 'text' ],
		],
	];

	// ── Legal Figma ───────────────────────────────────────────────────────────
	$leg_sp = [ 'post_types' => [ 'page' ], 'show' => [ 'template' => [ 'page-legal-figma.php' ] ] ];

	$meta_boxes[] = $leg_sp + [
		'title'  => 'Legal · Header',
		'id'     => 'lp_leg_header',
		'fields' => [
			[ 'id' => 'leg_header_cta_text', 'name' => 'Header CTA label',                 'type' => 'text', 'std' => "Let's talk" ],
			[ 'id' => 'leg_header_cta_url',  'name' => 'Header CTA URL',                   'type' => 'text', 'std' => '/contact/' ],
			[ 'id' => 'leg_title',        'name' => 'Page title (overrides page title)', 'type' => 'text', 'desc' => 'Leave blank to use the WordPress page title.' ],
			[ 'id' => 'leg_last_updated', 'name' => 'Last updated date',                 'type' => 'text', 'desc' => 'e.g. January 14, 2025' ],
		],
	];

	// ── About Us Figma ───────────────────────────────────────────────────────
	$abt_sp = [ 'post_types' => [ 'page' ], 'show' => [ 'template' => [ 'page-about-figma.php' ] ] ];

	$meta_boxes[] = $abt_sp + [
		'title'  => 'About · Hero',
		'id'     => 'lp_abt_hero',
		'fields' => [
			[ 'id' => 'abt_hero_label',    'name' => 'Label',        'type' => 'text',         'std' => 'ABOUT US' ],
			[ 'id' => 'abt_hero_heading',  'name' => 'Heading',      'type' => 'text',         'std' => 'For Big Kids & Daredevils' ],
			[ 'id' => 'abt_hero_desc',     'name' => 'Description',  'type' => 'textarea',     'std' => 'Embrace the big kid and daredevil inside. Release your curiosity, take the leap, and build software with people who care about impact.' ],
			[ 'id' => 'abt_hero_btn_text', 'name' => 'Button label', 'type' => 'text',         'std' => 'Meet the Team' ],
			[ 'id' => 'abt_hero_btn_url',  'name' => 'Button URL',   'type' => 'text',         'std' => '#team' ],
			[ 'id' => 'abt_hero_img_a',    'name' => 'Photo left',   'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'abt_hero_img_b',    'name' => 'Photo right',  'type' => 'single_image', 'force_delete' => false ],
		],
	];

	$meta_boxes[] = $abt_sp + [
		'title'  => 'About · Stats',
		'id'     => 'lp_abt_stats',
		'fields' => [
			[ 'id' => 'abt_stats_heading', 'name' => 'Heading',     'type' => 'text',     'std' => '20 Years of Software & Tech Expertise' ],
			[ 'id' => 'abt_stats_desc',    'name' => 'Description', 'type' => 'textarea', 'std' => "Two decades of helping ambitious companies move faster, build smarter, and grow stronger. Here's what that looks like in numbers." ],
			[
				'id'         => 'abt_stats_items',
				'name'       => 'Stats',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add stat',
				'fields'     => [
					[ 'id' => 'number', 'name' => 'Number', 'type' => 'text' ],
					[ 'id' => 'label',  'name' => 'Label',  'type' => 'text' ],
				],
			],
		],
	];

	$meta_boxes[] = $abt_sp + [
		'title'  => 'About · Story section',
		'id'     => 'lp_abt_story',
		'fields' => [
			[ 'id' => 'abt_story_heading', 'name' => 'Heading', 'type' => 'text', 'std' => 'The Story' ],
			[ 'id' => 'abt_story_text',    'name' => 'Text (paragraphs separated by blank line)', 'type' => 'textarea', 'rows' => 6, 'std' => "In 2005, a big kid with big dreams founded the company he wanted to work for. He built Slingshot on the idea that creating impactful software comes from being intensely inquisitive while remaining adventurous.\n\nToday, that dream thrives in Slingshot's culture of creativity, curiosity, fun, and exploration. With age comes wisdom, but the spirit of adventure is still alive. Most importantly, Slingshot still defines success as building software that has a profound impact for clients." ],
			[ 'id' => 'abt_story_img_a',   'name' => 'Photo 1 (tall left)',   'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'abt_story_img_b',   'name' => 'Photo 2 (top right)',   'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'abt_story_img_c',   'name' => 'Photo 3 (bottom right)','type' => 'single_image', 'force_delete' => false ],
		],
	];

	$meta_boxes[] = $abt_sp + [
		'title'  => 'About · Values',
		'id'     => 'lp_abt_values',
		'fields' => [
			[ 'id' => 'abt_values_heading', 'name' => 'Heading',     'type' => 'text',     'std' => 'The Values That Keep Us Moving' ],
			[ 'id' => 'abt_values_desc',    'name' => 'Description', 'type' => 'textarea', 'std' => 'We keep the work grounded in curiosity, honesty, courage, and a little bit of play.' ],
			[
				'id'         => 'abt_values_items',
				'name'       => 'Values',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add value',
				'fields'     => [
					[ 'id' => 'icon_svg', 'name' => 'Icon SVG',    'type' => 'textarea', 'rows' => 3 ],
					[ 'id' => 'heading',  'name' => 'Heading',     'type' => 'text' ],
					[ 'id' => 'desc',     'name' => 'Description', 'type' => 'textarea' ],
				],
			],
		],
	];

	$meta_boxes[] = $abt_sp + [
		'title'  => 'About · Team grid',
		'id'     => 'lp_abt_team',
		'fields' => [
			[ 'id' => 'abt_team_heading', 'name' => 'Heading',     'type' => 'text', 'std' => 'Meet the Team That Makes it Happen' ],
			[ 'id' => 'abt_team_desc',    'name' => 'Description', 'type' => 'textarea', 'std' => 'Product thinkers, designers, engineers, strategists, and operators working together across the U.S. and Europe.' ],
			[
				'id'         => 'abt_team_members',
				'name'       => 'Team members',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add member',
				'fields'     => [
					[ 'id' => 'photo', 'name' => 'Photo',     'type' => 'single_image', 'force_delete' => false ],
					[ 'id' => 'name',  'name' => 'Full name', 'type' => 'text' ],
					[ 'id' => 'role',  'name' => 'Role/Title','type' => 'text' ],
				],
			],
		],
	];

	$meta_boxes[] = $abt_sp + [
		'title'  => 'About · Testimonials',
		'id'     => 'lp_abt_testimonials',
		'fields' => [
			[ 'id' => 'abt_test_heading', 'name' => 'Heading', 'type' => 'text', 'std' => 'Our Clients Are the Best Stories' ],
			[
				'id'         => 'abt_test_items',
				'name'       => 'Testimonials',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add testimonial',
				'fields'     => [
					[ 'id' => 'quote',   'name' => 'Quote',         'type' => 'textarea' ],
					[ 'id' => 'name',    'name' => 'Person name',   'type' => 'text' ],
					[ 'id' => 'company', 'name' => 'Company/Title', 'type' => 'text' ],
					[ 'id' => 'avatar',  'name' => 'Avatar photo',  'type' => 'single_image', 'force_delete' => false ],
				],
			],
		],
	];

	$meta_boxes[] = $abt_sp + [
		'title'  => 'About · Bottom CTA',
		'id'     => 'lp_abt_cta',
		'fields' => [
			[ 'id' => 'abt_cta_heading',  'name' => 'Heading',      'type' => 'text',     'std' => 'Ready to Launch Something Bold?' ],
			[ 'id' => 'abt_cta_desc',     'name' => 'Description',  'type' => 'textarea', 'std' => "We partner with ambitious companies to design and build products people love. Let's talk." ],
			[ 'id' => 'abt_cta_btn_text', 'name' => 'Button label', 'type' => 'text',     'std' => "Let's Talk" ],
			[ 'id' => 'abt_cta_btn_url',  'name' => 'Button URL',   'type' => 'text',     'std' => '/contact/' ],
		],
	];

	// ── Achievements Figma ───────────────────────────────────────────────────
	$achv_sp = [ 'post_types' => [ 'page' ], 'show' => [ 'template' => [ 'page-achievements-figma.php' ] ] ];

	$meta_boxes[] = $achv_sp + [
		'title'  => 'Achievements · Hero',
		'id'     => 'lp_achv_hero',
		'fields' => [
			[ 'id' => 'achv_hero_heading',  'name' => 'Heading',      'type' => 'text',         'std' => 'Achievements' ],
			[ 'id' => 'achv_hero_desc',     'name' => 'Description',  'type' => 'textarea',     'std' => "Our team's hard work and passion pays off. We're proud of the awards, recognition, and media moments they've earned." ],
			[ 'id' => 'achv_hero_btn_text', 'name' => 'Button label', 'type' => 'text',         'std' => 'See Our Work' ],
			[ 'id' => 'achv_hero_btn_url',  'name' => 'Button URL',   'type' => 'text',         'std' => '/work/' ],
			[ 'id' => 'achv_hero_img_a',    'name' => 'Photo left',   'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'achv_hero_img_b',    'name' => 'Photo right',  'type' => 'single_image', 'force_delete' => false ],
		],
	];

	$meta_boxes[] = $achv_sp + [
		'title'  => 'Achievements · Why section',
		'id'     => 'lp_achv_why',
		'fields' => [
			[ 'id' => 'achv_why_heading', 'name' => 'Heading', 'type' => 'text', 'std' => 'Recognition Built on Real Outcomes' ],
			[
				'id'         => 'achv_why_cards',
				'name'       => 'Cards',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add card',
				'fields'     => [
					[ 'id' => 'icon_svg', 'name' => 'Icon SVG',   'type' => 'textarea', 'rows' => 3 ],
					[ 'id' => 'heading',  'name' => 'Heading',     'type' => 'text' ],
					[ 'id' => 'desc',     'name' => 'Description', 'type' => 'textarea' ],
				],
			],
		],
	];

	$meta_boxes[] = $achv_sp + [
		'title'  => 'Achievements · Credentials list',
		'id'     => 'lp_achv_creds',
		'fields' => [
			[ 'id' => 'achv_creds_heading', 'name' => 'Heading', 'type' => 'text', 'std' => 'Awards & Recognition' ],
			[
				'id'         => 'achv_creds_items',
				'name'       => 'Credential items',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add credential',
				'fields'     => [
					[ 'id' => 'badge_img', 'name' => 'Badge image (overrides SVG)', 'type' => 'single_image', 'force_delete' => false ],
					[ 'id' => 'badge_svg', 'name' => 'Badge SVG (fallback)',        'type' => 'textarea', 'rows' => 3 ],
					[ 'id' => 'heading',   'name' => 'Credential name',             'type' => 'text' ],
					[ 'id' => 'desc',      'name' => 'Description',                 'type' => 'textarea' ],
					[ 'id' => 'url',       'name' => 'External URL',                'type' => 'text' ],
				],
			],
		],
	];

	$meta_boxes[] = $achv_sp + [
		'title'  => 'Achievements · Featured On',
		'id'     => 'lp_achv_featured',
		'fields' => [
			[ 'id' => 'achv_featured_heading', 'name' => 'Label', 'type' => 'text', 'std' => 'Featured On' ],
			[
				'id'         => 'achv_featured_logos',
				'name'       => 'Logos',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add logo',
				'fields'     => [
					[ 'id' => 'image', 'name' => 'Logo image', 'type' => 'single_image', 'force_delete' => false ],
					[ 'id' => 'name',  'name' => 'Alt text',   'type' => 'text' ],
					[ 'id' => 'url',   'name' => 'External URL', 'type' => 'text' ],
				],
			],
		],
	];

	$meta_boxes[] = $achv_sp + [
		'title'  => 'Achievements · Bottom CTA',
		'id'     => 'lp_achv_cta',
		'fields' => [
			[ 'id' => 'achv_cta_heading',  'name' => 'Heading',      'type' => 'text',     'std' => 'Want to Build Something Worth Recognizing?' ],
			[ 'id' => 'achv_cta_desc',     'name' => 'Description',  'type' => 'textarea', 'std' => "Let's talk about the product, platform, or team you want to bring to life next." ],
			[ 'id' => 'achv_cta_btn_text', 'name' => 'Button label', 'type' => 'text',     'std' => "Let's Talk" ],
			[ 'id' => 'achv_cta_btn_url',  'name' => 'Button URL',   'type' => 'text',     'std' => '/contact/' ],
		],
	];

	// ── Ambassadors Figma ────────────────────────────────────────────────────
	$amb_sp = [ 'post_types' => [ 'page' ], 'show' => [ 'template' => [ 'page-ambassadors-figma.php' ] ] ];

	$meta_boxes[] = $amb_sp + [
		'title'  => 'Ambassadors · Hero',
		'id'     => 'lp_amb_hero',
		'fields' => [
			[ 'id' => 'amb_hero_label',    'name' => 'Label (eyebrow)',  'type' => 'text',         'std' => 'SLINGSHOT AMBASSADORS' ],
			[ 'id' => 'amb_hero_heading',  'name' => 'Heading',          'type' => 'text',         'std' => "Be the Voice of What's Next" ],
			[ 'id' => 'amb_hero_desc',     'name' => 'Description',      'type' => 'textarea',     'std' => 'Slingshot Ambassadors are innovation champions, leaders, founders, product owners, and bold thinkers helping shape the future of tech, strategy, and business outcomes.' ],
			[ 'id' => 'amb_hero_btn_text', 'name' => 'Button label',     'type' => 'text',         'std' => 'Join the Ambassador Circle' ],
			[ 'id' => 'amb_hero_btn_url',  'name' => 'Button URL',       'type' => 'text',         'std' => '#ambassador-form' ],
			[ 'id' => 'amb_hero_img',      'name' => 'Hero photo left',  'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'amb_hero_img_b',    'name' => 'Hero photo right', 'type' => 'single_image', 'force_delete' => false ],
		],
	];

	$meta_boxes[] = $amb_sp + [
		'title'  => 'Ambassadors · Benefits',
		'id'     => 'lp_amb_benefits',
		'fields' => [
			[ 'id' => 'amb_ben_heading', 'name' => 'Heading',     'type' => 'text',     'std' => "You've Helped Build What's Next—Now Help Amplify It" ],
			[ 'id' => 'amb_ben_desc',    'name' => 'Description', 'type' => 'textarea', 'rows' => 7, 'std' => "As a Slingshot Ambassador, you've seen firsthand what's possible when vision meets capability. Now, you can amplify that momentum, helping more people bring big ideas to life.\n\nThis isn't about being a fan. It's about being part of a forward-looking group of product-minded, change-focused professionals who want to influence what innovation looks like across industries.\n\nWhether you're a CEO, a product leader, or a strategic partner, you belong here." ],
			[
				'id'         => 'amb_ben_cards',
				'name'       => 'Benefit cards',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add benefit',
				'fields'     => [
					[ 'id' => 'icon_svg', 'name' => 'Icon SVG',   'type' => 'textarea', 'rows' => 3 ],
					[ 'id' => 'heading',  'name' => 'Heading',     'type' => 'text' ],
					[ 'id' => 'desc',     'name' => 'Description', 'type' => 'textarea' ],
				],
			],
		],
	];

	$meta_boxes[] = $amb_sp + [
		'title'  => 'Ambassadors · How You Contribute',
		'id'     => 'lp_amb_contribute',
		'fields' => [
			[ 'id' => 'amb_con_heading', 'name' => 'Heading',     'type' => 'text', 'std' => 'How You Contribute' ],
			[
				'id'         => 'amb_con_cards',
				'name'       => 'Contribution cards',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add card',
				'fields'     => [
					[ 'id' => 'icon_svg', 'name' => 'Icon SVG',   'type' => 'textarea', 'rows' => 3 ],
					[ 'id' => 'heading',  'name' => 'Heading',     'type' => 'text' ],
					[ 'id' => 'desc',     'name' => 'Description', 'type' => 'textarea' ],
				],
			],
			[ 'id' => 'amb_con_img', 'name' => 'Side image', 'type' => 'single_image', 'force_delete' => false ],
		],
	];

	$meta_boxes[] = $amb_sp + [
		'title'  => 'Ambassadors · Form CTA',
		'id'     => 'lp_amb_form',
		'fields' => [
			[ 'id' => 'amb_form_heading',      'name' => 'Section heading',   'type' => 'text',     'std' => "Become Part of a Circle That's Building Bold" ],
			[ 'id' => 'amb_form_desc',         'name' => 'Section description','type' => 'textarea', 'std' => "We're inviting advocates, leaders, and innovators to help shape the next generation of digital impact together." ],
			[ 'id' => 'amb_form_who_label',    'name' => '"Who Should Join?" label', 'type' => 'text', 'std' => 'Who Should Join?' ],
			[ 'id' => 'amb_form_who_bullets',  'name' => 'Who bullets (one per line)', 'type' => 'textarea', 'rows' => 5, 'std' => "You've worked with Slingshot as a client, collaborator, or strategic partner.\nYou're leading, building, or influencing technology, product, or business decisions.\nYou care about solving real problems, building smart, and sharing what works.\nYou want to help shape innovation, not just react to it." ],
			[ 'id' => 'amb_form_card_heading', 'name' => 'Form card heading', 'type' => 'text', 'std' => 'Request a Speaker' ],
			[ 'id' => 'amb_form_gf_id',        'name' => 'Gravity Form ID (0 = static HTML)', 'type' => 'number', 'std' => 0 ],
			[ 'id' => 'amb_form_action_url',   'name' => 'Static form action URL', 'type' => 'text', 'std' => '#' ],
			[ 'id' => 'amb_form_name_placeholder',    'name' => 'Name field label',         'type' => 'text', 'std' => 'Name*' ],
			[ 'id' => 'amb_form_org_placeholder',     'name' => 'Organization field label', 'type' => 'text', 'std' => 'Organization' ],
			[ 'id' => 'amb_form_email_placeholder',   'name' => 'Email field label',        'type' => 'text', 'std' => 'Email*' ],
			[ 'id' => 'amb_form_phone_placeholder',   'name' => 'Phone field label',        'type' => 'text', 'std' => 'Phone*' ],
			[ 'id' => 'amb_form_event_placeholder',   'name' => 'Event field label',        'type' => 'text', 'std' => 'Event*' ],
			[ 'id' => 'amb_form_message_placeholder', 'name' => 'Message field label',      'type' => 'text', 'std' => 'What are you looking for?' ],
			[ 'id' => 'amb_form_submit',              'name' => 'Submit button label',      'type' => 'text', 'std' => 'Submit Request' ],
		],
	];

	// ── Technologies Figma ───────────────────────────────────────────────────
	$tech_sp = [ 'post_types' => [ 'page' ], 'show' => [ 'template' => [ 'page-technologies-figma.php' ] ] ];

	$meta_boxes[] = $tech_sp + [
		'title'  => 'Technologies · Hero',
		'id'     => 'lp_tech_hero',
		'fields' => [
			[ 'id' => 'tech_hero_label',          'name' => 'Label (eyebrow)',       'type' => 'text',     'std' => 'TECHNOLOGIES' ],
			[ 'id' => 'tech_hero_heading',        'name' => 'Heading',               'type' => 'text',     'std' => 'Technologies We Use' ],
			[ 'id' => 'tech_hero_desc',           'name' => 'Description',           'type' => 'textarea', 'std' => 'We provide full-stack development services across web, mobile, and desktop, utilizing an expansive set of technologies.' ],
			[ 'id' => 'tech_hero_btn_text',       'name' => 'Primary button label',  'type' => 'text',     'std' => 'Talk Tech With Us' ],
			[ 'id' => 'tech_hero_btn_url',        'name' => 'Primary button URL',    'type' => 'text',     'std' => '/contact/?looking=Technology' ],
			[ 'id' => 'tech_hero_secondary_text', 'name' => 'Secondary link label',  'type' => 'text',     'std' => 'See Our Work' ],
			[ 'id' => 'tech_hero_secondary_url',  'name' => 'Secondary link URL',    'type' => 'text',     'std' => '/work/' ],
		],
	];

	$meta_boxes[] = $tech_sp + [
		'title'  => 'Technologies · Intro',
		'id'     => 'lp_tech_intro',
		'fields' => [
			[ 'id' => 'tech_intro_heading', 'name' => 'Heading',     'type' => 'text',     'std' => 'The Right Stack for the Job' ],
			[ 'id' => 'tech_intro_desc',    'name' => 'Description', 'type' => 'textarea', 'std' => "We are tool-agnostic and outcome-focused. The stack is chosen around your product, team, data, scale, and long-term maintainability, not around what's fashionable this week." ],
		],
	];

	$meta_boxes[] = $tech_sp + [
		'title'  => 'Technologies · Categories',
		'id'     => 'lp_tech_categories',
		'fields' => [
			[
				'id'         => 'tech_categories',
				'name'       => 'Technology categories',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add category',
				'fields'     => [
					[ 'id' => 'kicker', 'name' => 'Kicker / number', 'type' => 'text' ],
					[ 'id' => 'title',  'name' => 'Title',           'type' => 'text' ],
					[ 'id' => 'desc',   'name' => 'Description',     'type' => 'textarea', 'rows' => 3 ],
					[
						'id'   => 'items',
						'name' => 'Technology items',
						'type' => 'textarea',
						'rows' => 10,
						'desc' => 'One per line: Name|Attachment ID or image URL|Optional note',
					],
				],
			],
		],
	];

	$meta_boxes[] = $tech_sp + [
		'title'  => 'Technologies · CTA',
		'id'     => 'lp_tech_cta',
		'fields' => [
			[ 'id' => 'tech_cta_heading',  'name' => 'Heading',      'type' => 'text',     'std' => 'Want to See Our Work?' ],
			[ 'id' => 'tech_cta_desc',     'name' => 'Description',  'type' => 'textarea', 'std' => 'Explore case studies showing how strategy, design, engineering, and modern platforms come together.' ],
			[ 'id' => 'tech_cta_btn_text', 'name' => 'Button label', 'type' => 'text',     'std' => "Let's Go!" ],
			[ 'id' => 'tech_cta_btn_url',  'name' => 'Button URL',   'type' => 'text',     'std' => '/work/' ],
		],
	];

	// ── Security Checklist Figma ──────────────────────────────────────────────
	$ldmg_sp = [ 'post_types' => [ 'page' ], 'show' => [ 'template' => [ 'page-security-checklist-figma.php' ] ] ];

	$meta_boxes[] = $ldmg_sp + [
		'title'  => 'Lead Magnet · Hero',
		'id'     => 'lp_ldmg_hero',
		'fields' => [
			[ 'id' => 'ldmg_hero_label',    'name' => 'Label (eyebrow)',  'type' => 'text',         'std' => 'RESOURCES / SECURITY' ],
			[ 'id' => 'ldmg_hero_heading',  'name' => 'Heading',          'type' => 'text',         'std' => 'The Security Checklist' ],
			[ 'id' => 'ldmg_hero_desc',     'name' => 'Description',      'type' => 'textarea' ],
			[ 'id' => 'ldmg_hero_btn_text', 'name' => 'Button label',     'type' => 'text',         'std' => 'Download Now' ],
			[ 'id' => 'ldmg_hero_img_a',    'name' => 'Photo left (tall)','type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'ldmg_hero_img_b',    'name' => 'Photo right',      'type' => 'single_image', 'force_delete' => false ],
		],
	];

	$meta_boxes[] = $ldmg_sp + [
		'title'  => 'Lead Magnet · What to Expect',
		'id'     => 'lp_ldmg_expect',
		'fields' => [
			[ 'id' => 'ldmg_expect_heading', 'name' => 'Heading', 'type' => 'text', 'std' => 'What to Expect in This Checklist' ],
			[
				'id'         => 'ldmg_expect_cards',
				'name'       => 'Feature cards',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add card',
				'fields'     => [
					[ 'id' => 'icon_svg', 'name' => 'Icon SVG',   'type' => 'textarea', 'rows' => 3 ],
					[ 'id' => 'heading',  'name' => 'Heading',     'type' => 'text' ],
					[ 'id' => 'desc',     'name' => 'Description', 'type' => 'textarea' ],
				],
			],
		],
	];

	$meta_boxes[] = $ldmg_sp + [
		'title'  => 'Lead Magnet · Download Form',
		'id'     => 'lp_ldmg_form',
		'fields' => [
			[ 'id' => 'ldmg_form_heading',             'name' => 'Form heading',       'type' => 'text', 'std' => 'Download The Checklist' ],
			[ 'id' => 'ldmg_form_name_placeholder',    'name' => 'Name field label',   'type' => 'text', 'std' => 'Name*' ],
			[ 'id' => 'ldmg_form_email_placeholder',   'name' => 'Email field label',  'type' => 'text', 'std' => 'Email*' ],
			[ 'id' => 'ldmg_form_company_placeholder', 'name' => 'Company field label','type' => 'text', 'std' => 'Company' ],
			[ 'id' => 'ldmg_form_submit',              'name' => 'Submit button label','type' => 'text', 'std' => 'Download Now' ],
			[ 'id' => 'ldmg_form_gf_id',               'name' => 'Gravity Form ID (0 = static HTML)', 'type' => 'number', 'std' => 0 ],
			[ 'id' => 'ldmg_form_dl_url',              'name' => 'PDF download URL (static fallback action)', 'type' => 'text' ],
		],
	];

	// ── Events Figma (listing) ────────────────────────────────────────────────
	$evts_sp = [ 'post_types' => [ 'page' ], 'show' => [ 'template' => [ 'page-events-figma.php' ] ] ];

	$meta_boxes[] = $evts_sp + [
		'title'  => 'Events · Hero',
		'id'     => 'lp_evts_hero',
		'fields' => [
			[ 'id' => 'evts_hero_heading',  'name' => 'Heading',      'type' => 'text',         'std' => 'Bring Slingshot to Your Stage' ],
			[ 'id' => 'evts_hero_desc',     'name' => 'Description',  'type' => 'textarea' ],
			[ 'id' => 'evts_hero_btn_text', 'name' => 'Button label', 'type' => 'text',         'std' => 'Request a Speaker' ],
			[ 'id' => 'evts_hero_btn_url',  'name' => 'Button URL',   'type' => 'text',         'std' => '#request-speaker' ],
			[ 'id' => 'evts_hero_img_a',    'name' => 'Photo left',   'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'evts_hero_img_b',    'name' => 'Photo right',  'type' => 'single_image', 'force_delete' => false ],
		],
	];

	$meta_boxes[] = $evts_sp + [
		'title'  => 'Events · Upcoming engagements',
		'id'     => 'lp_evts_upcoming',
		'fields' => [
			[ 'id' => 'evts_upcoming_heading', 'name' => 'Heading', 'type' => 'text', 'std' => 'Upcoming Speaking Engagements' ],
			[
				'id'         => 'evts_upcoming_cards',
				'name'       => 'Events',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add event',
				'fields'     => [
					[ 'id' => 'image',    'name' => 'Photo',          'type' => 'single_image', 'force_delete' => false ],
					[ 'id' => 'img_bg',   'name' => 'Gradient (no photo)', 'type' => 'text', 'desc' => 'e.g. linear-gradient(135deg,#2A1878,#6D44B7)' ],
					[ 'id' => 'date',     'name' => 'Date (label)',   'type' => 'text' ],
					[ 'id' => 'title',    'name' => 'Title',          'type' => 'text' ],
					[ 'id' => 'desc',     'name' => 'Short description', 'type' => 'textarea' ],
					[ 'id' => 'location', 'name' => 'Location',       'type' => 'text' ],
					[ 'id' => 'url',      'name' => 'Link URL',       'type' => 'text' ],
					[ 'id' => 'cta',      'name' => 'CTA label',      'type' => 'text', 'std' => 'Register' ],
				],
			],
		],
	];

	$meta_boxes[] = $evts_sp + [
		'title'  => 'Events · Past events',
		'id'     => 'lp_evts_past',
		'fields' => [
			[ 'id' => 'evts_past_heading', 'name' => 'Heading',                         'type' => 'text',     'std' => "Where We've Shared Our Expertise" ],
			[ 'id' => 'evts_past_tabs',    'name' => 'Filter tabs (one per line, first = All)', 'type' => 'textarea', 'std' => "All\nConferences\nWorkshops\nMeetups" ],
			[
				'id'         => 'evts_past_cards',
				'name'       => 'Past events',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add past event',
				'fields'     => [
					[ 'id' => 'image',         'name' => 'Photo',     'type' => 'single_image', 'force_delete' => false ],
					[ 'id' => 'img_bg',        'name' => 'Gradient',  'type' => 'text' ],
					[ 'id' => 'title',         'name' => 'Title',     'type' => 'text' ],
					[ 'id' => 'date_location', 'name' => 'Date & location', 'type' => 'text' ],
					[ 'id' => 'desc',          'name' => 'Short description', 'type' => 'textarea' ],
					[ 'id' => 'url',           'name' => 'Link URL',  'type' => 'text' ],
					[ 'id' => 'category',      'name' => 'Category (must match a filter tab)', 'type' => 'text' ],
				],
			],
		],
	];

	$meta_boxes[] = $evts_sp + [
		'title'  => 'Events · Speaker spotlights',
		'id'     => 'lp_evts_speakers',
		'fields' => [
			[ 'id' => 'evts_speak_heading', 'name' => 'Heading', 'type' => 'text', 'std' => 'Speaker Spotlights' ],
			[
				'id'         => 'evts_speak_featured',
				'name'       => 'Featured speakers (dark card)',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add featured speaker',
				'fields'     => [
					[ 'id' => 'avatar', 'name' => 'Avatar', 'type' => 'single_image', 'force_delete' => false ],
					[ 'id' => 'name',   'name' => 'Name',   'type' => 'text' ],
					[ 'id' => 'role',   'name' => 'Role',   'type' => 'text' ],
					[ 'id' => 'bio',    'name' => 'Bio',    'type' => 'textarea' ],
				],
			],
			[
				'id'         => 'evts_speak_rows',
				'name'       => 'Additional speakers (rows)',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add speaker row',
				'fields'     => [
					[ 'id' => 'avatar', 'name' => 'Avatar', 'type' => 'single_image', 'force_delete' => false ],
					[ 'id' => 'name',   'name' => 'Name',   'type' => 'text' ],
					[ 'id' => 'role',   'name' => 'Role',   'type' => 'text' ],
					[ 'id' => 'desc',   'name' => 'Short description', 'type' => 'textarea' ],
				],
			],
		],
	];

	$meta_boxes[] = $evts_sp + [
		'title'  => 'Events · Request Speaker form',
		'id'     => 'lp_evts_form',
		'fields' => [
			[ 'id' => 'evts_form_heading',      'name' => 'Section heading',    'type' => 'text',     'std' => 'Bring Slingshot to Your Audience' ],
			[ 'id' => 'evts_form_desc',         'name' => 'Section description','type' => 'textarea' ],
			[ 'id' => 'evts_form_card_heading', 'name' => 'Form card heading',  'type' => 'text',     'std' => 'Request a Speaker' ],
			[ 'id' => 'evts_form_gf_id',        'name' => 'Gravity Form ID (0 = static HTML)', 'type' => 'number', 'std' => 0 ],
			[ 'id' => 'evts_form_action_url',   'name' => 'Static form action URL', 'type' => 'text', 'std' => '#' ],
			[ 'id' => 'evts_form_first_placeholder', 'name' => 'First name placeholder', 'type' => 'text', 'std' => 'First Name*' ],
			[ 'id' => 'evts_form_last_placeholder',  'name' => 'Last name placeholder',  'type' => 'text', 'std' => 'Last Name*' ],
			[ 'id' => 'evts_form_email_placeholder', 'name' => 'Email placeholder',      'type' => 'text', 'std' => 'Email*' ],
			[ 'id' => 'evts_form_org_placeholder',   'name' => 'Organization placeholder','type' => 'text', 'std' => 'Organization' ],
			[ 'id' => 'evts_form_message_placeholder','name' => 'Message placeholder',   'type' => 'textarea', 'std' => "Tell us about your event and what you're looking for..." ],
			[ 'id' => 'evts_form_submit_text',       'name' => 'Submit button label',    'type' => 'text', 'std' => 'Request a Speaker' ],
		],
	];

	// ── Event Figma (single event series) ────────────────────────────────────
	$evt_sp = [ 'post_types' => [ 'page' ], 'show' => [ 'template' => [ 'page-event-figma.php' ] ] ];

	$meta_boxes[] = $evt_sp + [
		'title'  => 'Event · Hero',
		'id'     => 'lp_evt_hero',
		'fields' => [
			[ 'id' => 'evt_hero_label',    'name' => 'Label (eyebrow)',  'type' => 'text' ],
			[ 'id' => 'evt_hero_heading',  'name' => 'Heading',          'type' => 'text', 'desc' => 'Leave blank to use page title' ],
			[ 'id' => 'evt_hero_desc',     'name' => 'Description',      'type' => 'textarea' ],
			[ 'id' => 'evt_hero_btn_text', 'name' => 'Button label',     'type' => 'text', 'std' => 'Register Now' ],
			[ 'id' => 'evt_hero_btn_url',  'name' => 'Button URL',       'type' => 'text', 'std' => '#next-meetup' ],
			[ 'id' => 'evt_hero_img',      'name' => 'Hero image',       'type' => 'single_image', 'force_delete' => false ],
		],
	];

	$meta_boxes[] = $evt_sp + [
		'title'  => 'Event · What It Is',
		'id'     => 'lp_evt_what',
		'fields' => [
			[ 'id' => 'evt_what_heading', 'name' => 'Heading',     'type' => 'text' ],
			[ 'id' => 'evt_what_desc',    'name' => 'Description', 'type' => 'textarea' ],
			[
				'id'         => 'evt_what_cards',
				'name'       => 'Topic cards',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add topic',
				'fields'     => [
					[ 'id' => 'icon_svg', 'name' => 'Icon SVG',   'type' => 'textarea', 'rows' => 3 ],
					[ 'id' => 'heading',  'name' => 'Heading',     'type' => 'text' ],
					[ 'id' => 'desc',     'name' => 'Description', 'type' => 'textarea' ],
				],
			],
		],
	];

	$meta_boxes[] = $evt_sp + [
		'title'  => 'Event · Next Meetup',
		'id'     => 'lp_evt_next',
		'fields' => [
			[ 'id' => 'evt_next_label',        'name' => 'Label',           'type' => 'text', 'std' => 'NEXT MEETUP' ],
			[ 'id' => 'evt_next_date',         'name' => 'Date & time',     'type' => 'text' ],
			[ 'id' => 'evt_next_heading',      'name' => 'Talk title',      'type' => 'text' ],
			[ 'id' => 'evt_next_desc',         'name' => 'Description',     'type' => 'textarea' ],
			[ 'id' => 'evt_next_btn_text',     'name' => 'Button label',    'type' => 'text', 'std' => 'Register Now' ],
			[ 'id' => 'evt_next_btn_url',      'name' => 'Button URL',      'type' => 'text' ],
			[ 'id' => 'evt_next_speaker_img',  'name' => 'Speaker photo',   'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'evt_next_speaker_name', 'name' => 'Speaker name',    'type' => 'text' ],
			[ 'id' => 'evt_next_speaker_role', 'name' => 'Speaker role',    'type' => 'text' ],
		],
	];

	$meta_boxes[] = $evt_sp + [
		'title'  => 'Event · Past Topics',
		'id'     => 'lp_evt_topics',
		'fields' => [
			[ 'id' => 'evt_topics_heading', 'name' => 'Heading', 'type' => 'text', 'std' => 'Past Topics' ],
			[
				'id'         => 'evt_topics_items',
				'name'       => 'Past topics',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add topic',
				'fields'     => [
					[ 'id' => 'image', 'name' => 'Photo',   'type' => 'single_image', 'force_delete' => false ],
					[ 'id' => 'date',  'name' => 'Date',    'type' => 'text' ],
					[ 'id' => 'title', 'name' => 'Title',   'type' => 'text' ],
					[ 'id' => 'desc',  'name' => 'Excerpt', 'type' => 'textarea' ],
					[ 'id' => 'url',   'name' => 'Link URL','type' => 'text' ],
				],
			],
		],
	];

	$meta_boxes[] = $evt_sp + [
		'title'  => 'Event · Partner & Sponsor',
		'id'     => 'lp_evt_partner',
		'fields' => [
			[ 'id' => 'evt_partner_eyebrow',      'name' => 'Partner section eyebrow', 'type' => 'text', 'std' => 'Get Involved' ],
			[ 'id' => 'evt_partner_heading',      'name' => 'Partner section heading',  'type' => 'text' ],
			[ 'id' => 'evt_partner_desc',         'name' => 'Partner section description', 'type' => 'textarea' ],
			[ 'id' => 'evt_partner_form_heading', 'name' => 'Form card heading', 'type' => 'text', 'std' => 'Request a Speaker' ],
			[ 'id' => 'evt_partner_gf_id',        'name' => 'Gravity Form ID (0 = static HTML)', 'type' => 'number', 'std' => 0 ],
			[ 'id' => 'evt_partner_form_action_url', 'name' => 'Static form action URL', 'type' => 'text', 'std' => '#' ],
			[ 'id' => 'evt_partner_first_placeholder', 'name' => 'First name placeholder', 'type' => 'text', 'std' => 'First Name*' ],
			[ 'id' => 'evt_partner_last_placeholder',  'name' => 'Last name placeholder', 'type' => 'text', 'std' => 'Last Name*' ],
			[ 'id' => 'evt_partner_email_placeholder', 'name' => 'Email placeholder', 'type' => 'text', 'std' => 'Email*' ],
			[ 'id' => 'evt_partner_org_placeholder',   'name' => 'Organization placeholder', 'type' => 'text', 'std' => 'Organization' ],
			[ 'id' => 'evt_partner_message_placeholder', 'name' => 'Message placeholder', 'type' => 'textarea', 'std' => 'How would you like to get involved?' ],
			[ 'id' => 'evt_partner_submit_text', 'name' => 'Submit button label', 'type' => 'text', 'std' => 'Send Message' ],
			[ 'id' => 'evt_sponsor_label',        'name' => 'Sponsors label', 'type' => 'text', 'std' => 'Sponsored By' ],
			[
				'id'         => 'evt_sponsor_logos',
				'name'       => 'Sponsor logos',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add sponsor',
				'fields'     => [
					[ 'id' => 'image', 'name' => 'Logo image',  'type' => 'single_image', 'force_delete' => false ],
					[ 'id' => 'name',  'name' => 'Alt text',    'type' => 'text' ],
					[ 'id' => 'url',   'name' => 'Website URL', 'type' => 'text' ],
				],
			],
		],
	];

	return $meta_boxes;
} );
