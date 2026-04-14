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
	$figma_sp = [ 'post_types' => [ 'page' ], 'show' => [ 'template' => [ 'page-service-figma.php', 'page-careers-figma.php' ] ] ];

	$meta_boxes[] = $figma_sp + [
		'title'  => 'Figma Template · Fallback',
		'id'     => 'lp_figma_fallback',
		'fields' => [
			[ 'id' => 'sl_figma_mockup_url', 'name' => 'Mockup image URL', 'type' => 'text', 'desc' => 'Used only when page content is empty.' ],
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
		'title'  => 'Bootcamp · Why section',
		'id'     => 'lp_boot_why',
		'fields' => [
			[ 'id' => 'boot_why_eyebrow', 'name' => 'Eyebrow', 'type' => 'text' ],
			[ 'id' => 'boot_why_heading', 'name' => 'Heading', 'type' => 'textarea', 'rows' => 2 ],
			[ 'id' => 'boot_why_desc', 'name' => 'Description', 'type' => 'textarea' ],
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
		[ 'id' => 'price', 'name' => 'Price line', 'type' => 'text' ],
		[ 'id' => 'duration', 'name' => 'Duration line', 'type' => 'text' ],
		[ 'id' => 'intro', 'name' => 'Intro', 'type' => 'textarea' ],
		[ 'id' => 'bullets', 'name' => 'What you get (one per line)', 'type' => 'textarea', 'rows' => 8 ],
		[ 'id' => 'show_price_row', 'name' => 'Show price/duration row', 'type' => 'checkbox', 'std' => 1 ],
	];

	$ai_cap_fields = [
		[ 'id' => 'image', 'name' => 'Icon image', 'type' => 'single_image', 'force_delete' => false ],
		[ 'id' => 'title', 'name' => 'Title', 'type' => 'textarea', 'rows' => 2 ],
		[ 'id' => 'desc', 'name' => 'Description', 'type' => 'textarea' ],
	];

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
		'title'  => 'AI · Insights (blog)',
		'id'     => 'lp_ai_blog',
		'fields' => [
			[ 'id' => 'ai_blog_title', 'name' => 'Heading', 'type' => 'text' ],
			[ 'id' => 'ai_blog_cta_text', 'name' => 'Button label', 'type' => 'text' ],
			[ 'id' => 'ai_blog_cta_url', 'name' => 'Button URL', 'type' => 'text' ],
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
	];

	$feature_card_fields = [
		[ 'id' => 'icon_svg', 'name' => 'Icon SVG', 'type' => 'textarea', 'rows' => 3 ],
		[ 'id' => 'title', 'name' => 'Title', 'type' => 'text' ],
		[ 'id' => 'desc', 'name' => 'Description', 'type' => 'textarea', 'rows' => 3 ],
	];

	$whitepaper_section_fields = [
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
			[ 'id' => 'teams_model_ded_heading', 'name' => 'Dedicated Teams — heading', 'type' => 'text' ],
			[ 'id' => 'teams_model_ded_desc', 'name' => 'Dedicated Teams — description', 'type' => 'textarea' ],
			[ 'id' => 'teams_model_ded_cta_text', 'name' => 'Dedicated Teams — CTA label', 'type' => 'text', 'std' => 'Learn more' ],
			[ 'id' => 'teams_model_ded_cta_url', 'name' => 'Dedicated Teams — CTA URL', 'type' => 'text', 'std' => '/teams/dedicated/' ],
			[ 'id' => 'teams_model_ded_img', 'name' => 'Dedicated Teams — image', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'teams_model_aug_tag', 'name' => 'Staff Aug — tag', 'type' => 'text', 'std' => 'Staff Augmentation' ],
			[ 'id' => 'teams_model_aug_heading', 'name' => 'Staff Aug — heading', 'type' => 'text' ],
			[ 'id' => 'teams_model_aug_desc', 'name' => 'Staff Aug — description', 'type' => 'textarea' ],
			[ 'id' => 'teams_model_aug_cta_text', 'name' => 'Staff Aug — CTA label', 'type' => 'text', 'std' => 'Learn more' ],
			[ 'id' => 'teams_model_aug_cta_url', 'name' => 'Staff Aug — CTA URL', 'type' => 'text', 'std' => '/teams/staff-augmentation/' ],
			[ 'id' => 'teams_model_aug_img', 'name' => 'Staff Aug — image', 'type' => 'single_image', 'force_delete' => false ],
		],
	];

	$meta_boxes[] = $teams_pm + [
		'title'  => 'Teams · Where We Work (map section)',
		'id'     => 'lp_teams_map',
		'fields' => [
			[ 'id' => 'teams_map_heading', 'name' => 'Heading', 'type' => 'text', 'std' => 'Where Our Teams Work' ],
			[ 'id' => 'teams_map_desc', 'name' => 'Description', 'type' => 'textarea' ],
			[ 'id' => 'teams_map_img', 'name' => 'Map / Globe image', 'type' => 'single_image', 'force_delete' => false ],
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
					[ 'id' => 'category_name', 'name' => 'Category name', 'type' => 'text' ],
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
			[ 'id' => 'teams_cta_btn_text', 'name' => 'Button label', 'type' => 'text' ],
			[ 'id' => 'teams_cta_btn_url', 'name' => 'Button URL', 'type' => 'text' ],
		],
	];

	// ── Teams Dedicated ──────────────────────────────────────
	$meta_boxes[] = $ded_pm + [
		'title'  => 'Dedicated · Hero',
		'id'     => 'lp_ded_hero',
		'fields' => [
			[ 'id' => 'ded_hero_bc_parent', 'name' => 'Breadcrumb left', 'type' => 'text', 'std' => 'TEAMS' ],
			[ 'id' => 'ded_hero_bc_leaf', 'name' => 'Breadcrumb right', 'type' => 'text', 'std' => 'DEDICATED TEAMS' ],
			[ 'id' => 'ded_hero_heading', 'name' => 'Heading', 'type' => 'text' ],
			[ 'id' => 'ded_hero_subtext', 'name' => 'Subtext', 'type' => 'textarea' ],
			[ 'id' => 'ded_hero_cta_text', 'name' => 'CTA label', 'type' => 'text', 'std' => 'Build Your Team' ],
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
			[ 'id' => 'ded_get_team_img', 'name' => 'Team photo', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'ded_get_cta_text', 'name' => 'CTA label', 'type' => 'text', 'std' => 'Build Your Team' ],
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
			[ 'id' => 'ded_crosssell_cta_url', 'name' => 'CTA URL', 'type' => 'text', 'std' => '/teams/staff-augmentation/' ],
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
			[ 'id' => 'ded_cta_btn_text', 'name' => 'Button label', 'type' => 'text' ],
			[ 'id' => 'ded_cta_btn_url', 'name' => 'Button URL', 'type' => 'text' ],
		],
	];

	// ── Teams Staff Augmentation ─────────────────────────────
	$meta_boxes[] = $staug_pm + [
		'title'  => 'Staff Aug · Hero',
		'id'     => 'lp_staug_hero',
		'fields' => [
			[ 'id' => 'staug_hero_bc_parent', 'name' => 'Breadcrumb left', 'type' => 'text', 'std' => 'TEAMS' ],
			[ 'id' => 'staug_hero_bc_leaf', 'name' => 'Breadcrumb right', 'type' => 'text', 'std' => 'STAFF AUGMENTATION' ],
			[ 'id' => 'staug_hero_heading', 'name' => 'Heading', 'type' => 'text' ],
			[ 'id' => 'staug_hero_subtext', 'name' => 'Subtext', 'type' => 'textarea' ],
			[ 'id' => 'staug_hero_cta_text', 'name' => 'CTA label', 'type' => 'text', 'std' => 'Scale Your Team' ],
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
			[ 'id' => 'staug_why_img', 'name' => 'Side image', 'type' => 'single_image', 'force_delete' => false ],
			[
				'id'         => 'staug_why_points',
				'name'       => 'Points',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'add_button' => '+ Add point',
				'fields'     => [
					[ 'id' => 'title', 'name' => 'Point title', 'type' => 'text' ],
					[ 'id' => 'desc', 'name' => 'Point description', 'type' => 'textarea', 'rows' => 2 ],
				],
			],
		],
	];

	$meta_boxes[] = $staug_pm + [
		'title'  => 'Staff Aug · Roles We Have Staffed',
		'id'     => 'lp_staug_roles',
		'fields' => [
			[ 'id' => 'staug_roles_heading', 'name' => 'Heading', 'type' => 'text', 'std' => 'Roles We Have Staffed' ],
			[ 'id' => 'staug_roles_view_all_text', 'name' => 'View all label', 'type' => 'text', 'std' => 'View All' ],
			[ 'id' => 'staug_roles_view_all_url', 'name' => 'View all URL', 'type' => 'text' ],
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
			[ 'id' => 'staug_cta_btn_text', 'name' => 'Button label', 'type' => 'text' ],
			[ 'id' => 'staug_cta_btn_url', 'name' => 'Button URL', 'type' => 'text' ],
		],
	];

	// ── Teams Whitepaper ─────────────────────────────────────
	$meta_boxes[] = $wp_pm + [
		'title'  => 'Whitepaper · Hero',
		'id'     => 'lp_wp_hero',
		'fields' => [
			[ 'id' => 'wp_hero_bc_parent', 'name' => 'Breadcrumb left', 'type' => 'text', 'std' => 'TEAMS' ],
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
			[ 'id' => 'wp_dl_heading', 'name' => 'Heading', 'type' => 'text', 'std' => 'Download The Whitepaper' ],
			[ 'id' => 'wp_dl_desc', 'name' => 'Description', 'type' => 'textarea' ],
			[ 'id' => 'wp_dl_cover_img', 'name' => 'Cover / record image', 'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'wp_dl_file_url', 'name' => 'PDF download URL', 'type' => 'text' ],
			[ 'id' => 'wp_dl_btn_text', 'name' => 'Button label', 'type' => 'text', 'std' => 'Download Free Guide' ],
			[ 'id' => 'wp_dl_gravity_form_id', 'name' => 'Gravity Form ID (optional)', 'type' => 'number', 'min' => 0 ],
		],
	];

	// ── Service Figma pages (product / web / design / mobile) ────────────────
	$svc_sp  = [ 'post_types' => [ 'page' ], 'show' => [ 'template' => [ 'page-service-figma.php' ] ] ];
	$car_sp  = [ 'post_types' => [ 'page' ], 'show' => [ 'template' => [ 'page-careers-figma.php' ] ] ];
	$op_sp   = [ 'post_types' => [ 'page' ], 'show' => [ 'template' => [ 'page-open-position-figma.php' ] ] ];

	$svc_built_item_fields = [
		[ 'id' => 'icon_svg',  'name' => 'Icon SVG',    'type' => 'textarea', 'rows' => 3 ],
		[ 'id' => 'title',     'name' => 'Title',        'type' => 'text' ],
		[ 'id' => 'desc',      'name' => 'Description',  'type' => 'textarea', 'rows' => 2 ],
	];

	$svc_card_fields = [
		[ 'id' => 'image',    'name' => 'Image',        'type' => 'single_image', 'force_delete' => false ],
		[ 'id' => 'tag',      'name' => 'Tag / eyebrow', 'type' => 'text' ],
		[ 'id' => 'title',    'name' => 'Title',         'type' => 'text' ],
		[ 'id' => 'desc',     'name' => 'Description',   'type' => 'textarea', 'rows' => 3 ],
		[ 'id' => 'link_url', 'name' => 'Link URL',      'type' => 'text' ],
	];

	$svc_case_fields = [
		[ 'id' => 'image',    'name' => 'Image',   'type' => 'single_image', 'force_delete' => false ],
		[ 'id' => 'client',   'name' => 'Client',  'type' => 'text' ],
		[ 'id' => 'title',    'name' => 'Title',   'type' => 'text' ],
		[ 'id' => 'link_url', 'name' => 'Link URL','type' => 'text' ],
	];

	$meta_boxes[] = $svc_sp + [
		'title'  => 'Service · Hero',
		'id'     => 'lp_svc_hero',
		'fields' => [
			[ 'id' => 'svc_hero_bc_parent',  'name' => 'Breadcrumb left',  'type' => 'text', 'std' => 'SERVICES' ],
			[ 'id' => 'svc_hero_bc_leaf',    'name' => 'Breadcrumb right', 'type' => 'text' ],
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
			[
				'id'         => 'svc_built_items',
				'name'       => 'Feature items (4 recommended)',
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
				'desc'    => 'Grid works best for 3 equal cards. Alternating for image+text rows.',
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
			[ 'id' => 'svc_spotlight_article_img',   'name' => 'Article image',          'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'svc_spotlight_article_tag',   'name' => 'Article tag / eyebrow',  'type' => 'text' ],
			[ 'id' => 'svc_spotlight_article_title', 'name' => 'Article title',          'type' => 'text' ],
			[ 'id' => 'svc_spotlight_article_desc',  'name' => 'Article excerpt',        'type' => 'textarea', 'rows' => 2 ],
			[ 'id' => 'svc_spotlight_article_url',   'name' => 'Article link URL',       'type' => 'text' ],
		],
	];

	$meta_boxes[] = $svc_sp + [
		'title'  => 'Service · Blog',
		'id'     => 'lp_svc_blog',
		'fields' => [
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
			[ 'id' => 'svc_cta_btn_text', 'name' => 'Button label', 'type' => 'text', 'std' => 'Start the Conversation →' ],
			[ 'id' => 'svc_cta_btn_url',  'name' => 'Button URL',   'type' => 'text', 'std' => '/contact/' ],
		],
	];

	// ── Careers Figma ─────────────────────────────────────────────────────────
	$car_perk_fields = [
		[ 'id' => 'icon_svg', 'name' => 'Icon SVG',   'type' => 'textarea', 'rows' => 3 ],
		[ 'id' => 'title',    'name' => 'Title',       'type' => 'text' ],
		[ 'id' => 'desc',     'name' => 'Description', 'type' => 'textarea', 'rows' => 2 ],
	];

	$car_role_fields = [
		[ 'id' => 'title',    'name' => 'Job title', 'type' => 'text' ],
		[ 'id' => 'tags',     'name' => 'Tags (comma-separated)', 'type' => 'text', 'desc' => 'e.g. On-site, Full-time' ],
		[ 'id' => 'link_url', 'name' => 'Link URL',  'type' => 'text' ],
	];

	$meta_boxes[] = $car_sp + [
		'title'  => 'Careers · Hero',
		'id'     => 'lp_car_hero',
		'fields' => [
			[ 'id' => 'car_hero_bc_parent', 'name' => 'Breadcrumb left',  'type' => 'text', 'std' => 'COMPANY' ],
			[ 'id' => 'car_hero_bc_leaf',   'name' => 'Breadcrumb right', 'type' => 'text', 'std' => 'CAREERS' ],
			[ 'id' => 'car_hero_heading',   'name' => 'Heading (use \\n for line break)', 'type' => 'textarea', 'rows' => 2 ],
			[ 'id' => 'car_hero_subtext',   'name' => 'Subtext',          'type' => 'textarea' ],
			[ 'id' => 'car_hero_cta_text',  'name' => 'CTA label',        'type' => 'text', 'std' => 'See Open Roles' ],
			[ 'id' => 'car_hero_cta_url',   'name' => 'CTA URL',          'type' => 'text', 'std' => '#open-roles' ],
			[ 'id' => 'car_hero_img',       'name' => 'Hero photo',       'type' => 'single_image', 'force_delete' => false ],
			[ 'id' => 'car_hero_img_alt',   'name' => 'Photo alt text',   'type' => 'text' ],
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
			[ 'id' => 'op_job_title',    'name' => 'Job title (overrides page title)', 'type' => 'text' ],
			[ 'id' => 'op_job_tags',     'name' => 'Tags (comma-separated)',           'type' => 'text', 'std' => 'On-site, Louisville KY, Full-time' ],
			[ 'id' => 'op_bc_parent',    'name' => 'Breadcrumb parent label',          'type' => 'text', 'std' => 'Careers' ],
			[ 'id' => 'op_bc_parent_url','name' => 'Breadcrumb parent URL',            'type' => 'text', 'std' => '/careers/' ],
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

	return $meta_boxes;
} );
