<?php
/**
 * Meta Box settings pages: Consulting, Bootcamp, AI landing templates.
 *
 * Depends on inc/landing-pages-helpers.php (constants).
 */

add_filter( 'mb_aio_extensions', function ( $extensions ) {
	$extensions[] = 'mb-settings-page';
	$extensions[] = 'meta-box-group';
	return array_unique( $extensions );
} );

add_filter( 'mb_settings_pages', function ( $pages ) {
	$pages[] = [
		'id'          => 'slingshot_consulting_page',
		'option_name' => SLINGSHOT_OPT_CONSULTING,
		'menu_title'  => 'Consulting Page',
		'parent'      => 'themes.php',
		'capability'  => 'manage_options',
		'icon_url'    => 'dashicons-businessman',
	];
	$pages[] = [
		'id'          => 'slingshot_bootcamp_page',
		'option_name' => SLINGSHOT_OPT_BOOTCAMP,
		'menu_title'  => 'Bootcamp Page',
		'parent'      => 'themes.php',
		'capability'  => 'manage_options',
		'icon_url'    => 'dashicons-welcome-learn-more',
	];
	$pages[] = [
		'id'          => 'slingshot_ai_page',
		'option_name' => SLINGSHOT_OPT_AI,
		'menu_title'  => 'AI Page',
		'parent'      => 'themes.php',
		'capability'  => 'manage_options',
		'icon_url'    => 'dashicons-art',
	];
	return $pages;
} );

add_filter( 'rwmb_meta_boxes', function ( $meta_boxes ) {

	$con_sp = [ 'settings_pages' => [ 'slingshot_consulting_page' ] ];
	$boot_sp = [ 'settings_pages' => [ 'slingshot_bootcamp_page' ] ];
	$ai_sp = [ 'settings_pages' => [ 'slingshot_ai_page' ] ];

	$help_service_fields = [
		[ 'id' => 'service_key', 'name' => 'Slug (e.g. ai-adoption)', 'type' => 'text', 'desc' => 'Lowercase, no spaces. Used in HTML ids and JS.' ],
		[ 'id' => 'accordion_label', 'name' => 'Accordion label', 'type' => 'text' ],
		[ 'id' => 'icon_svg', 'name' => 'Icon SVG', 'type' => 'textarea', 'rows' => 4 ],
		[ 'id' => 'featured_tag', 'name' => 'Featured card tag', 'type' => 'text' ],
		[ 'id' => 'featured_text', 'name' => 'Featured card text', 'type' => 'textarea' ],
		[ 'id' => 'featured_cta_text', 'name' => 'Featured CTA label', 'type' => 'text' ],
		[ 'id' => 'featured_cta_url', 'name' => 'Featured CTA URL', 'type' => 'url' ],
		[ 'id' => 'detail_title', 'name' => 'Detail column title', 'type' => 'text' ],
		[ 'id' => 'detail_intro', 'name' => 'Detail intro', 'type' => 'textarea' ],
		[ 'id' => 'detail_bullets', 'name' => 'Detail bullets (one per line)', 'type' => 'textarea', 'rows' => 6 ],
		[ 'id' => 'detail_cta_text', 'name' => 'Detail CTA label', 'type' => 'text' ],
		[ 'id' => 'detail_cta_url', 'name' => 'Detail CTA URL', 'type' => 'url' ],
	];

	$event_card_fields = [
		[ 'id' => 'image', 'name' => 'Image', 'type' => 'single_image', 'force_delete' => false ],
		[ 'id' => 'image_bg_css', 'name' => 'Or CSS background (if no image)', 'type' => 'text', 'desc' => 'e.g. linear-gradient(135deg,#2A1878,#4B23B0)' ],
		[ 'id' => 'tag', 'name' => 'Tag', 'type' => 'text' ],
		[ 'id' => 'title', 'name' => 'Title', 'type' => 'text' ],
		[ 'id' => 'date_location', 'name' => 'Date & location', 'type' => 'text' ],
		[ 'id' => 'url', 'name' => 'Link URL', 'type' => 'url' ],
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
			[ 'id' => 'con_hero_cta_url', 'name' => 'CTA URL', 'type' => 'url', 'std' => '/contact/?looking=Consulting' ],
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
			[ 'id' => 'con_stats_cta_url', 'name' => 'CTA URL', 'type' => 'url', 'std' => '/work/' ],
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
			[ 'id' => 'con_events_all_url', 'name' => 'All events URL', 'type' => 'url', 'std' => '/events' ],
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
			[ 'id' => 'con_blog_cta_url', 'name' => 'Link URL', 'type' => 'url', 'std' => '/blog' ],
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
			[ 'id' => 'con_cta_btn_url', 'name' => 'Button URL', 'type' => 'url' ],
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
		[ 'id' => 'cta_url', 'name' => 'CTA URL', 'type' => 'url' ],
		[
			'id'      => 'panel_layout',
			'name'    => 'Right column',
			'type'    => 'select',
			'options' => [ 'modules' => 'Module list', 'custom' => 'Custom card' ],
			'std'     => 'modules',
		],
		[ 'id' => 'custom_text', 'name' => 'Custom card text', 'type' => 'textarea' ],
		[ 'id' => 'custom_btn', 'name' => 'Custom button label', 'type' => 'text' ],
		[ 'id' => 'custom_url', 'name' => 'Custom button URL', 'type' => 'url' ],
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
			[ 'id' => 'boot_hero_primary_url', 'name' => 'Primary CTA URL', 'type' => 'url' ],
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
			[ 'id' => 'boot_stats_cta_url', 'name' => 'CTA URL', 'type' => 'url' ],
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
			[ 'id' => 'boot_events_all_url', 'name' => 'All events URL', 'type' => 'url' ],
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
			[ 'id' => 'boot_blog_cta_url', 'name' => 'Link URL', 'type' => 'url' ],
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
			[ 'id' => 'boot_cta_primary_url', 'name' => 'Primary URL', 'type' => 'url' ],
			[ 'id' => 'boot_cta_secondary_text', 'name' => 'Secondary button', 'type' => 'text' ],
			[ 'id' => 'boot_cta_secondary_url', 'name' => 'Secondary URL', 'type' => 'url' ],
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
			[ 'id' => 'ai_hero_cta_url', 'name' => 'CTA URL', 'type' => 'url' ],
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
			[ 'id' => 'ai_impact_cta_url', 'name' => 'CTA URL', 'type' => 'url' ],
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
			[ 'id' => 'ai_blog_cta_url', 'name' => 'Button URL', 'type' => 'url' ],
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
			[ 'id' => 'ai_cta_btn_url', 'name' => 'Button URL', 'type' => 'url' ],
		],
	];

	return $meta_boxes;
} );
