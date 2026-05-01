<?php
/**
 * One-time seed: writes landing page defaults into wp_options (Meta Box storage shape).
 * After seed, front-end and admin read values from the database.
 */

define( 'SLINGSHOT_LP_SEED_VERSION', 6 );
define( 'SLINGSHOT_LP_SEED_OPTION', 'slingshot_lp_landing_seed_version' );

/**
 * @return array<string, mixed>
 */
function slingshot_lp_build_consulting_option() {
	return [
		'con_hero_bc_parent'   => 'SERVICES',
		'con_hero_bc_leaf'     => 'CONSULTING',
		'con_hero_heading'     => 'Strategic Technology Consulting',
		'con_hero_subtext'     => 'Expert guidance to solve challenges, modernize systems, and align tech with your business goals.',
		'con_hero_cta_text'    => 'Book a call',
		'con_hero_cta_url'     => '/contact/?looking=Consulting',
		'con_hero_img_a'       => '',
		'con_hero_img_b'       => '',
		'con_hero_img_a_alt'   => 'Slingshot consulting team',
		'con_hero_img_b_alt'   => 'Slingshot strategist at work',
		'con_stats_image'      => '',
		'con_stats_image_alt'  => 'Slingshot team collaborating',
		'con_stats_heading'    => "Built to Solve,\nScale, and Ship",
		'con_stats_desc'       => 'Harnessing deep technical expertise, cross-functional teams, and product thinking to every engagement, so you get outcomes, not just output.',
		'con_stats_items'      => slingshot_lp_default_consulting_stats(),
		'con_stats_cta_text'   => 'Explore Our Work',
		'con_stats_cta_url'    => '/work/',
		'con_help_heading'     => 'How Can We Help?',
		'con_help_services'    => slingshot_lp_default_consulting_help_services(),
		'con_events_title'     => 'Join the Conversation',
		'con_events_desc'      => "We don't just build — we share. Explore upcoming events for leaders navigating technology strategy, AI, and product development.",
		'con_events_all_text'  => 'All Events →',
		'con_events_all_url'   => '/events',
		'con_events_cards'     => slingshot_lp_default_consulting_events(),
		'con_clients_label'    => 'Our Trusted Clients',
		'con_clients_logos'    => slingshot_lp_default_consulting_clients(),
		'con_blog_title'       => "Insights That Move\nBusiness Forward",
		'con_blog_desc'        => 'Actionable thinking on software strategy, AI adoption, and how high-performing teams build and scale.',
		'con_blog_cta_text'    => 'All Insights →',
		'con_blog_cta_url'     => '/blog',
		'con_blog_posts'       => 3,
		'con_cta_title'        => "Let's Build What's Next",
		'con_cta_desc'         => 'Whether you need a smarter product, a faster team, or a modernized platform. Slingshot is the partner to help you move.',
		'con_cta_btn_text'     => 'Start the Conversation →',
		'con_cta_btn_url'      => '/contact/?looking=Consulting',
	];
}

/**
 * @return array<string, mixed>
 */
function slingshot_lp_build_bootcamp_option() {
	return [
		'boot_hero_bc_parent'     => 'SERVICES',
		'boot_hero_bc_mid'        => 'AI',
		'boot_hero_bc_leaf'       => 'BOOTCAMP',
		'boot_hero_heading'       => "Hands-On\nAI Bootcamps",
		'boot_hero_subtext'       => "Two immersive one-day bootcamps designed to help your team stop experimenting and start delivering with AI. Whether you're building multi-agent systems or launching faster with AI tools, you'll leave with real progress, not just notes.",
		'boot_hero_primary_text'  => 'Send Request',
		'boot_hero_primary_url'   => '/contact/?looking=Bootcamp',
		'boot_hero_secondary_text'=> 'See the Curriculum',
		'boot_hero_secondary_url' => '#boot-curriculum',
		'boot_hero_cards'         => slingshot_lp_default_bootcamp_hero_cards(),
		'boot_why_eyebrow'       => 'Why It Works',
		'boot_why_heading'        => "Why Teams Choose\nSlingshot's AI Bootcamps",
		'boot_why_desc'           => "Most AI training stays theoretical. Ours doesn't. Every bootcamp is built around your team's real goals — with outcomes you can ship.",
		'boot_why_cards'          => slingshot_lp_default_bootcamp_why_cards(),
		'boot_stats_heading'      => "Training That\nMoves the Needle",
		'boot_stats_desc'         => 'Slingshot has helped companies across industries build real AI capabilities. Our bootcamps are the fastest path from curiosity to production-ready results.',
		'boot_stats_cta_text'     => 'See Our Work',
		'boot_stats_cta_url'      => '/work/',
		'boot_stats_items'        => slingshot_lp_default_bootcamp_stats(),
		'boot_curriculum_eyebrow' => "What You'll Cover",
		'boot_curriculum_heading' => "A Curriculum Built\nfor Real-World AI",
		'boot_curriculum_desc'    => "Choose the track that fits your team's goals — or let us build a custom program around your specific use cases.",
		'boot_curriculum_tabs'    => slingshot_lp_default_bootcamp_curriculum(),
		'boot_how_eyebrow'        => 'The Process',
		'boot_how_heading'        => 'How It Works',
		'boot_how_steps'          => slingshot_lp_default_bootcamp_how(),
		'boot_events_title'       => 'Upcoming Bootcamps',
		'boot_events_desc'        => 'Join one of our public cohorts or bring a private bootcamp to your team. New dates added regularly.',
		'boot_events_all_text'    => 'All Events →',
		'boot_events_all_url'     => '/events',
		'boot_events_cards'       => slingshot_lp_default_bootcamp_events(),
		'boot_clients_label'      => "Teams We've Trained",
		'boot_clients_logos'      => slingshot_lp_default_bootcamp_clients(),
		'boot_blog_title'         => "AI Insights for\nModern Teams",
		'boot_blog_desc'          => 'Practical thinking on AI adoption, team enablement, and what it really takes to build AI capabilities inside an organization.',
		'boot_blog_cta_text'      => 'All Insights →',
		'boot_blog_cta_url'       => '/blog',
		'boot_blog_posts'         => 3,
		'boot_cta_title'          => "Bring a Bootcamp\nto Your Org",
		'boot_cta_desc'           => "Want to upskill your team in AI, fast? We offer private sessions tailored to your company's goals and team mix.",
		'boot_cta_primary_text'   => 'Request a Private Bootcamp →',
		'boot_cta_primary_url'    => '/contact/?looking=Bootcamp',
		'boot_cta_secondary_text' => 'Talk to Us First',
		'boot_cta_secondary_url'  => '/contact/?looking=Bootcamp+Custom',
	];
}

/**
 * @return array<string, mixed>
 */
function slingshot_lp_build_ai_option() {
	$steps = [];
	foreach ( slingshot_lp_default_ai_steps() as $row ) {
		$row['step_badge_img'] = isset( $row['step_badge_img'] ) ? $row['step_badge_img'] : '';
		$row['show_price_row'] = ! empty( $row['show_price_row'] ) ? 1 : 0;
		$steps[]               = $row;
	}

	$caps = [];
	foreach ( slingshot_lp_default_ai_capabilities() as $row ) {
		$caps[] = [
			'image' => '',
			'title' => $row['title'],
			'desc'  => $row['desc'],
		];
	}

	return [
		'ai_hero_bc_parent'    => 'SERVICES',
		'ai_hero_bc_leaf'      => 'AI',
		'ai_hero_heading'      => 'AI is Reshaping Business. Be the One Who Leads.',
		'ai_hero_subtext'      => 'Slingshot helps forward-thinking teams adopt AI that drives real business impact — from strategy and use cases to prototypes and deployed solutions.',
		'ai_hero_cta_text'     => 'Book a call',
		'ai_hero_cta_url'      => '/contact/',
		'ai_hero_img_left'     => '',
		'ai_hero_img_right'    => '',
		'ai_hero_img_left_alt' => 'Slingshot team collaborating on AI',
		'ai_hero_img_right_alt'=> 'Slingshot engineer working on AI solution',
		'ai_impact_image'      => '',
		'ai_impact_image_alt'  => '',
		'ai_impact_heading'    => "Where AI makes \n an impact",
		'ai_impact_text'       => 'Harness the power of artificial intelligence to revolutionize your business, elevate your team, and drive bold, measurable impact.',
		'ai_impact_cta_text'   => 'Get Started Now',
		'ai_impact_cta_url'    => '/contact/?looking=Artificial+Intelligence',
		'ai_steps'             => $steps,
		'ai_cap_title'         => 'AI Capabilities',
		'ai_capabilities'      => $caps,
		'ai_tools_title'       => 'Trusted Platforms We Build With',
		'ai_tools_logos'       => [],
		'ai_blog_title'        => 'Insights That Move Business Forward',
		'ai_blog_cta_text'     => 'All Insights →',
		'ai_blog_cta_url'      => '/blog/',
		'ai_blog_category'     => 'artificial-intelligence',
		'ai_blog_posts'        => 10,
		'ai_faq_title'         => "Still wondering\nif AI is right for you?",
		'ai_faq_items'         => slingshot_lp_default_ai_faq(),
		'ai_cta_title'         => "Start Smart. Move Fast.\nBuild What Matters",
		'ai_cta_desc'          => "Let's turn AI into something real, valuable, and aligned to your business.",
		'ai_cta_btn_text'      => 'Book a Free AI Discussion →',
		'ai_cta_btn_url'       => '/contact/',
	];
}

// Teams data is now stored per-post (post meta) — no seed functions needed.


/**
 * Writes default landing options once (per site). Bump SLINGSHOT_LP_SEED_VERSION to re-seed.
 */
function slingshot_lp_maybe_seed_landing_options() {
	if ( function_exists( 'ms_is_switched' ) && ms_is_switched() ) {
		return;
	}
	if ( (int) get_option( SLINGSHOT_LP_SEED_OPTION, 0 ) >= SLINGSHOT_LP_SEED_VERSION ) {
		return;
	}

	$con_id  = 455269;
	$boot_id = 455270;
	$ai_id   = 453386;

	foreach ( slingshot_lp_build_consulting_option() as $key => $val ) {
		update_post_meta( $con_id, $key, $val );
	}
	foreach ( slingshot_lp_build_bootcamp_option() as $key => $val ) {
		update_post_meta( $boot_id, $key, $val );
	}
	foreach ( slingshot_lp_build_ai_option() as $key => $val ) {
		update_post_meta( $ai_id, $key, $val );
	}
	update_option( SLINGSHOT_LP_SEED_OPTION, SLINGSHOT_LP_SEED_VERSION, true );
}

add_action( 'init', 'slingshot_lp_maybe_seed_landing_options', 5 );

define( 'SLINGSHOT_LP_FORCE_NEW_TEMPLATE_OPTION', 'slingshot_lp_force_new_template_v1' );

/**
 * Force redesigned templates for landing pages so legacy VC content is never rendered.
 * Keeps everything on the new 2.0 templates and editable from Edit Page meta fields.
 */
function slingshot_lp_maybe_force_new_landing_templates() {
	if ( get_option( SLINGSHOT_LP_FORCE_NEW_TEMPLATE_OPTION ) ) {
		return;
	}

	$map = array(
		'consulting'                  => 'page-consulting.php',
		'bootcamp'                    => 'page-bootcamp.php',
		'artifical-intelligence'      => 'page-ai.php',
		'artificial-intelligence'     => 'page-ai.php',
		'teams'                       => 'page-teams.php',
		'teams-dedicated'             => 'page-teams-dedicated.php',
		'dedicated-teams'             => 'page-teams-dedicated.php',
		'teams-staff-augmentation'    => 'page-teams-staffaug.php',
		'eu-staff-augmentation'       => 'page-teams-staffaug.php',
		'teams-offshoring-whitepaper' => 'page-teams-whitepaper.php',
		'selecting-offshoring-region-whitepaper' => 'page-teams-whitepaper.php',
	);

	foreach ( $map as $slug => $template_file ) {
		$page = get_page_by_path( $slug, OBJECT, 'page' );
		if ( ! $page instanceof WP_Post ) {
			continue;
		}
		update_post_meta( $page->ID, '_wp_page_template', $template_file );
	}

	// Ensure front page uses front-page.php (template "default"), not redesign builder override.
	$front_id = (int) get_option( 'page_on_front' );
	if ( $front_id ) {
		delete_post_meta( $front_id, '_wp_page_template' );
	}

	update_option( SLINGSHOT_LP_FORCE_NEW_TEMPLATE_OPTION, '1', true );
}

add_action( 'init', 'slingshot_lp_maybe_force_new_landing_templates', 8 );

define( 'SLINGSHOT_LP_FIGMA_SERVICE_PAGES_OPTION', 'slingshot_lp_figma_service_pages_v1' );

/**
 * Create service pages managed from Edit Page.
 */
function slingshot_lp_maybe_create_figma_service_pages() {
	if ( get_option( SLINGSHOT_LP_FIGMA_SERVICE_PAGES_OPTION ) ) {
		return;
	}

	$pages = array(
		'product' => array( 'title' => 'Product', 'mockup' => '/figma/product.png' ),
		'web'     => array( 'title' => 'Web', 'mockup' => '/figma/web.png' ),
		'design'  => array( 'title' => 'Design', 'mockup' => '/figma/design.png' ),
		'mobile'  => array( 'title' => 'Mobile', 'mockup' => '/figma/mobile.png' ),
	);

	foreach ( $pages as $slug => $cfg ) {
		$page = get_page_by_path( $slug, OBJECT, 'page' );

		if ( ! $page instanceof WP_Post ) {
			$page_id = wp_insert_post(
				array(
					'post_type'    => 'page',
					'post_status'  => 'publish',
					'post_title'   => $cfg['title'],
					'post_name'    => $slug,
					'post_content' => '',
				),
				true
			);

			if ( is_wp_error( $page_id ) ) {
				continue;
			}
		} else {
			$page_id = (int) $page->ID;
		}

		update_post_meta( (int) $page_id, '_wp_page_template', 'page-service-figma.php' );
		update_post_meta( (int) $page_id, 'sl_figma_mockup_url', $cfg['mockup'] );
	}

	update_option( SLINGSHOT_LP_FIGMA_SERVICE_PAGES_OPTION, '1', true );
}

add_action( 'init', 'slingshot_lp_maybe_create_figma_service_pages', 9 );

define( 'SLINGSHOT_LP_FIGMA_CAREERS_PAGES_OPTION', 'slingshot_lp_figma_careers_pages_v1' );

/**
 * Create careers pages managed from Edit Page.
 */
function slingshot_lp_maybe_create_figma_careers_pages() {
	if ( get_option( SLINGSHOT_LP_FIGMA_CAREERS_PAGES_OPTION ) ) {
		return;
	}

	$pages = array(
		'careers'       => array( 'title' => 'Careers', 'mockup' => '/figma/careers.png' ),
		'open-position' => array( 'title' => 'Open Position', 'mockup' => '/figma/open-position.png' ),
	);

	foreach ( $pages as $slug => $cfg ) {
		$page = get_page_by_path( $slug, OBJECT, 'page' );

		if ( ! $page instanceof WP_Post ) {
			$page_id = wp_insert_post(
				array(
					'post_type'    => 'page',
					'post_status'  => 'publish',
					'post_title'   => $cfg['title'],
					'post_name'    => $slug,
					'post_content' => '',
				),
				true
			);

			if ( is_wp_error( $page_id ) ) {
				continue;
			}
		} else {
			$page_id = (int) $page->ID;
		}

		update_post_meta( (int) $page_id, '_wp_page_template', 'page-careers-figma.php' );
		update_post_meta( (int) $page_id, 'sl_figma_mockup_url', $cfg['mockup'] );
	}

	update_option( SLINGSHOT_LP_FIGMA_CAREERS_PAGES_OPTION, '1', true );
}

add_action( 'init', 'slingshot_lp_maybe_create_figma_careers_pages', 10 );

define( 'SLINGSHOT_LP_FIGMA_EDITABLE_MIGRATION_OPTION', 'slingshot_lp_figma_editable_migration_v1' );

/**
 * Ensure existing figma pages are editable and have fallback mockup URLs.
 */
function slingshot_lp_maybe_migrate_figma_pages_editable() {
	if ( get_option( SLINGSHOT_LP_FIGMA_EDITABLE_MIGRATION_OPTION ) ) {
		return;
	}

	$pages = array(
		'product'       => array( 'template' => 'page-service-figma.php', 'mockup' => '/figma/product.png' ),
		'web'           => array( 'template' => 'page-service-figma.php', 'mockup' => '/figma/web.png' ),
		'design'        => array( 'template' => 'page-service-figma.php', 'mockup' => '/figma/design.png' ),
		'mobile'        => array( 'template' => 'page-service-figma.php', 'mockup' => '/figma/mobile.png' ),
		'careers'       => array( 'template' => 'page-careers-figma.php', 'mockup' => '/figma/careers.png' ),
		'open-position' => array( 'template' => 'page-careers-figma.php', 'mockup' => '/figma/open-position.png' ),
	);

	foreach ( $pages as $slug => $cfg ) {
		$page = get_page_by_path( $slug, OBJECT, 'page' );
		if ( ! $page instanceof WP_Post ) {
			continue;
		}
		update_post_meta( (int) $page->ID, '_wp_page_template', $cfg['template'] );
		update_post_meta( (int) $page->ID, 'sl_figma_mockup_url', $cfg['mockup'] );
	}

	update_option( SLINGSHOT_LP_FIGMA_EDITABLE_MIGRATION_OPTION, '1', true );
}

add_action( 'init', 'slingshot_lp_maybe_migrate_figma_pages_editable', 11 );

// ── Correct open-position template + assign new page-open-position-figma.php ─
define( 'SLINGSHOT_LP_FIGMA_OPEN_POS_TEMPLATE_OPTION', 'slingshot_lp_figma_open_pos_template_v1' );

function slingshot_lp_maybe_fix_open_position_template() {
	if ( get_option( SLINGSHOT_LP_FIGMA_OPEN_POS_TEMPLATE_OPTION ) ) {
		return;
	}
	$page = get_page_by_path( 'open-position', OBJECT, 'page' );
	if ( $page instanceof WP_Post ) {
		update_post_meta( (int) $page->ID, '_wp_page_template', 'page-open-position-figma.php' );
	}
	update_option( SLINGSHOT_LP_FIGMA_OPEN_POS_TEMPLATE_OPTION, '1', true );
}
add_action( 'init', 'slingshot_lp_maybe_fix_open_position_template', 12 );

// ── Seed default content for service + careers + open-position pages ──────────
define( 'SLINGSHOT_LP_FIGMA_CONTENT_SEED_OPTION', 'slingshot_lp_figma_content_seed_v4' );

/** @return array<string,mixed> */
function slingshot_lp_build_service_product_meta() {
	$icon_web    = '<svg width="22" height="22" viewBox="0 0 22 22" fill="none"><rect width="22" height="22" rx="6" fill="#4B23B0" fill-opacity=".12"/><rect x="5" y="7" width="12" height="9" rx="2" stroke="#4B23B0" stroke-width="1.6"/><path d="M8 7V6a3 3 0 0 1 6 0v1" stroke="#4B23B0" stroke-width="1.6" stroke-linecap="round"/></svg>';
	$icon_mobile = '<svg width="22" height="22" viewBox="0 0 22 22" fill="none"><rect width="22" height="22" rx="6" fill="#23B7B4" fill-opacity=".12"/><rect x="7" y="4" width="8" height="14" rx="2" stroke="#23B7B4" stroke-width="1.6"/><circle cx="11" cy="15" r="1" fill="#23B7B4"/></svg>';
	$icon_design = '<svg width="22" height="22" viewBox="0 0 22 22" fill="none"><rect width="22" height="22" rx="6" fill="#4B23B0" fill-opacity=".12"/><circle cx="11" cy="11" r="5" stroke="#4B23B0" stroke-width="1.6"/><path d="M11 6v2M11 14v2M6 11h2M14 11h2" stroke="#4B23B0" stroke-width="1.6" stroke-linecap="round"/></svg>';
	$icon_ai     = '<svg width="22" height="22" viewBox="0 0 22 22" fill="none"><rect width="22" height="22" rx="6" fill="#23B7B4" fill-opacity=".12"/><path d="M11 5v3M11 14v3M5 11h3M14 11h3M7.1 7.1l2.1 2.1M12.8 12.8l2.1 2.1M14.9 7.1l-2.1 2.1M9.2 12.8l-2.1 2.1" stroke="#23B7B4" stroke-width="1.5" stroke-linecap="round"/></svg>';

	return [
		'svc_theme'            => 'product',
		'svc_hero_bc_parent'  => 'SERVICES',
		'svc_hero_bc_leaf'    => 'PRODUCT',
		'svc_hero_heading'    => 'From Vision to Velocity',
		'svc_hero_subtext'    => 'Slingshot combines product strategy, user insight, and full-stack execution to help leaders launch smarter, scale faster, and build the right thing.',
		'svc_hero_cta_text'   => 'Book a call',
		'svc_hero_cta_url'    => '/contact/?looking=Product',
		'svc_built_heading_1' => 'Built to Scale.',
		'svc_built_heading_2' => 'Designed to Win.',
		'svc_built_desc'      => 'Your product is just the start. The real value is the business it unlocks. Here\'s where we help clients move with confidence.',
		'svc_built_items'     => [
			[ 'icon_svg' => $icon_web,    'title' => 'Web Solutions',  'desc' => 'Scalable web applications built for performance and growth.' ],
			[ 'icon_svg' => $icon_mobile, 'title' => 'Mobile Apps',    'desc' => 'Native and cross-platform mobile experiences that delight users.' ],
			[ 'icon_svg' => $icon_design, 'title' => 'Design',         'desc' => 'UX-first design that turns complexity into clarity.' ],
			[ 'icon_svg' => $icon_ai,     'title' => 'AI Solutions',   'desc' => 'Intelligent features that create competitive advantage.' ],
		],
		'svc_cards_eyebrow'  => 'What We Do',
		'svc_cards_heading'  => 'We Build High-Impact Digital Products',
		'svc_cards_desc'     => 'From ideation to launch, we partner with you at every phase — strategy, design, engineering, and beyond.',
		'svc_cards_layout'   => 'grid',
		'svc_cards_items'    => [
			[ 'image' => '', 'tag' => 'Strategy & Discovery', 'title' => 'Business Process & Product Strategy', 'desc' => 'We help you map the problem, define the solution, and plan the build — so every decision is grounded in real business outcomes.', 'link_url' => '/contact/?looking=Product+Strategy' ],
			[ 'image' => '', 'tag' => 'Design & Engineering',  'title' => 'Custom Solutions & Technology',       'desc' => 'Full-stack engineering and design working in lockstep to deliver products that are fast, reliable, and built to scale.', 'link_url' => '/contact/?looking=Product+Engineering' ],
			[ 'image' => '', 'tag' => 'AI & Data',             'title' => 'AI-Powered Product Features',         'desc' => 'From recommendation engines to intelligent automation, we embed AI where it drives the most value for your users.', 'link_url' => '/contact/?looking=AI+Product' ],
		],
		'svc_cases_heading'   => 'From Solution to Success Stories',
		'svc_cases_link_text' => 'See All →',
		'svc_cases_link_url'  => '/work/',
		'svc_cases_cards'     => [
			[ 'image' => '', 'client' => 'Slingshot Client', 'title' => 'Modernizing a Legacy Platform for 10× Growth', 'link_url' => '/work/' ],
			[ 'image' => '', 'client' => 'Slingshot Client', 'title' => 'Shipping a Multi-Tenant SaaS MVP in 10 Weeks',  'link_url' => '/work/' ],
			[ 'image' => '', 'client' => 'Slingshot Client', 'title' => 'AI-Powered Features That Doubled Engagement',   'link_url' => '/work/' ],
		],
		'svc_spotlight_show'          => 1,
		'svc_spotlight_quote'         => 'Working with Slingshot was transformational. They didn\'t just build software — they became an extension of our team and helped us think through problems we didn\'t even know we had.',
		'svc_spotlight_person_name'   => 'James Whitfield',
		'svc_spotlight_person_role'   => 'CTO, FinTech Startup',
		'svc_spotlight_article_tag'   => 'Product Strategy',
		'svc_spotlight_article_title' => 'How to Choose the Right Tech Stack for Your Next Product',
		'svc_spotlight_article_desc'  => 'Frameworks come and go. The decisions that matter most are the ones you make before you write a single line of code.',
		'svc_spotlight_article_url'   => '/blog/',
		'svc_blog_title'      => "Insights That Move\nBusiness Forward",
		'svc_blog_desc'       => 'Actionable thinking on software strategy, AI adoption, and how high-performing teams build and scale.',
		'svc_blog_cta_text'   => 'All Insights →',
		'svc_blog_cta_url'    => '/blog/',
		'svc_blog_posts'      => 3,
		'svc_cta_title'       => "Let's Build What's Next",
		'svc_cta_desc'        => "Whether you need a smarter product, a faster team, or a modernized platform — Slingshot is the partner to help you move.",
		'svc_cta_btn_text'    => 'Start the Conversation →',
		'svc_cta_btn_url'     => '/contact/?looking=Product',
	];
}

/** @return array<string,mixed> */
function slingshot_lp_build_service_web_meta() {
	$icon_ecosystem   = '<svg width="22" height="22" viewBox="0 0 22 22" fill="none"><rect width="22" height="22" rx="6" fill="#4B23B0" fill-opacity=".12"/><circle cx="11" cy="11" r="6" stroke="#4B23B0" stroke-width="1.6"/><path d="M5 11h12M11 5c-2 2-3 4-3 6s1 4 3 6M11 5c2 2 3 4 3 6s-1 4-3 6" stroke="#4B23B0" stroke-width="1.4"/></svg>';
	$icon_templates   = '<svg width="22" height="22" viewBox="0 0 22 22" fill="none"><rect width="22" height="22" rx="6" fill="#23B7B4" fill-opacity=".12"/><rect x="4" y="4" width="14" height="14" rx="2" stroke="#23B7B4" stroke-width="1.6"/><path d="M4 8h14M8 8v10" stroke="#23B7B4" stroke-width="1.5"/></svg>';
	$icon_integration = '<svg width="22" height="22" viewBox="0 0 22 22" fill="none"><rect width="22" height="22" rx="6" fill="#4B23B0" fill-opacity=".12"/><path d="M6 11h10M13 8l3 3-3 3" stroke="#4B23B0" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>';
	$icon_support     = '<svg width="22" height="22" viewBox="0 0 22 22" fill="none"><rect width="22" height="22" rx="6" fill="#23B7B4" fill-opacity=".12"/><path d="M11 6a5 5 0 0 1 5 5v2a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-2a5 5 0 0 1 5-5z" stroke="#23B7B4" stroke-width="1.6"/><path d="M9 15v1a2 2 0 0 0 4 0v-1" stroke="#23B7B4" stroke-width="1.5"/></svg>';

	return [
		'svc_theme'            => 'web',
		'svc_hero_bc_parent'  => 'SERVICES',
		'svc_hero_bc_leaf'    => 'WEB',
		'svc_hero_heading'    => 'Web Products Built to Scale and Convert',
		'svc_hero_subtext'    => 'From custom web apps to e-commerce platforms — we build digital experiences that grow with your business.',
		'svc_hero_cta_text'   => 'Book a call',
		'svc_hero_cta_url'    => '/contact/?looking=Web',
		'svc_built_heading_1' => 'Built for Speed.',
		'svc_built_heading_2' => 'Designed for Growth.',
		'svc_built_desc'      => 'Every web product we ship is optimized for performance, SEO, and conversion from day one.',
		'svc_built_items'     => [
			[ 'icon_svg' => $icon_ecosystem,   'title' => 'Ecosystem-First Design',  'desc' => 'We build with your full tech stack in mind — not just a single page.' ],
			[ 'icon_svg' => $icon_templates,   'title' => 'Custom Templates',        'desc' => 'Bespoke designs tailored to your brand, not off-the-shelf themes.' ],
			[ 'icon_svg' => $icon_integration, 'title' => 'Integration Testing',     'desc' => 'End-to-end QA across all connected services before every release.' ],
			[ 'icon_svg' => $icon_support,     'title' => 'Support',                 'desc' => 'Dedicated post-launch support so your team is never left guessing.' ],
		],
		'svc_cards_eyebrow'  => 'What We Build',
		'svc_cards_heading'  => 'What We Build With Web',
		'svc_cards_desc'     => 'From complex SaaS platforms to marketing sites, we cover the full spectrum of web development.',
		'svc_cards_layout'   => 'grid',
		'svc_cards_items'    => [
			[ 'image' => '', 'tag' => 'Web Applications',      'title' => 'Custom Web Applications',       'desc' => 'Bespoke platforms built to your exact spec — scalable, fast, and maintainable.', 'link_url' => '' ],
			[ 'image' => '', 'tag' => 'E-Commerce',            'title' => 'E-Commerce Platforms',          'desc' => 'High-converting stores built on Shopify, WooCommerce, or fully custom stacks.', 'link_url' => '' ],
			[ 'image' => '', 'tag' => 'CMS',                   'title' => 'WordPress & Webflow Sites',     'desc' => 'Beautiful, editor-friendly sites your marketing team can update without a developer.', 'link_url' => '' ],
		],
		'svc_cases_heading'   => 'From Solution to Success Stories',
		'svc_cases_link_text' => 'See All →',
		'svc_cases_link_url'  => '/work/',
		'svc_cases_cards'     => [],
		'svc_blog_title'      => "Insights That Move\nBusiness Forward",
		'svc_blog_desc'       => 'Actionable thinking on web strategy, performance, and how high-performing teams build and scale.',
		'svc_blog_cta_text'   => 'All Insights →',
		'svc_blog_cta_url'    => '/blog/',
		'svc_blog_posts'      => 3,
		'svc_cta_title'       => "Let's Build the Web Product\nYour Business Deserves",
		'svc_cta_desc'        => "Whether you're launching from scratch or rebuilding what's holding you back — we're ready to ship.",
		'svc_cta_btn_text'    => 'Start the Conversation →',
		'svc_cta_btn_url'     => '/contact/?looking=Web',
	];
}

/** @return array<string,mixed> */
function slingshot_lp_build_service_design_meta() {
	$icon_future = '<svg width="22" height="22" viewBox="0 0 22 22" fill="none"><rect width="22" height="22" rx="6" fill="#4B23B0" fill-opacity=".12"/><path d="M11 5l1.5 4.5H17l-3.8 2.8 1.4 4.4L11 14l-4.6 3.2 1.4-4.4L4 10h4.5z" stroke="#4B23B0" stroke-width="1.4" stroke-linejoin="round"/></svg>';
	$icon_coloc  = '<svg width="22" height="22" viewBox="0 0 22 22" fill="none"><rect width="22" height="22" rx="6" fill="#23B7B4" fill-opacity=".12"/><circle cx="8" cy="9" r="3" stroke="#23B7B4" stroke-width="1.6"/><circle cx="14" cy="9" r="3" stroke="#23B7B4" stroke-width="1.6"/><path d="M4 18c0-2.2 1.8-4 4-4h6c2.2 0 4 1.8 4 4" stroke="#23B7B4" stroke-width="1.5" stroke-linecap="round"/></svg>';
	$icon_factory= '<svg width="22" height="22" viewBox="0 0 22 22" fill="none"><rect width="22" height="22" rx="6" fill="#4B23B0" fill-opacity=".12"/><rect x="5" y="10" width="12" height="8" rx="1.5" stroke="#4B23B0" stroke-width="1.6"/><path d="M8 10V8a3 3 0 0 1 6 0v2" stroke="#4B23B0" stroke-width="1.6" stroke-linecap="round"/></svg>';

	return [
		'svc_theme'            => 'design',
		'svc_hero_bc_parent'  => 'SERVICES',
		'svc_hero_bc_leaf'    => 'DESIGN',
		'svc_hero_heading'    => 'UX Design That Gets Built',
		'svc_hero_subtext'    => 'We design with engineers — so every screen, flow, and interaction is built exactly as intended.',
		'svc_hero_cta_text'   => 'Book a call',
		'svc_hero_cta_url'    => '/contact/?looking=Design',
		'svc_built_heading_1' => 'Why Teams Bring',
		'svc_built_heading_2' => 'Slingshot In.',
		'svc_built_desc'      => 'Most design agencies hand off files. We stay through shipping — so the design actually ships.',
		'svc_built_items'     => [
			[ 'icon_svg' => $icon_future,  'title' => 'Future Proof Foundation', 'desc' => 'Design systems that grow with your product, not against it.' ],
			[ 'icon_svg' => $icon_coloc,   'title' => 'Co-location Design',      'desc' => 'Designers embedded with your engineering team for real-time iteration.' ],
			[ 'icon_svg' => $icon_factory, 'title' => 'Design Factory Built',    'desc' => 'High-velocity output without sacrificing quality or consistency.' ],
		],
		'svc_cards_eyebrow'  => 'Built to Scale',
		'svc_cards_heading'  => 'What We Design',
		'svc_cards_desc'     => 'From rapid prototypes to enterprise design systems, we cover every phase of UX.',
		'svc_cards_layout'   => 'alternating',
		'svc_cards_items'    => [
			[ 'image' => '', 'tag' => 'Prototyping',     'title' => 'Rapid Prototyping',              'desc' => 'From rough idea to clickable prototype in days — so you can validate before you build.', 'link_url' => '' ],
			[ 'image' => '', 'tag' => 'Systems & Audits','title' => 'Design Systems & UX Audits',     'desc' => "We audit what you have, fix what's broken, and build a system your whole team can use.", 'link_url' => '' ],
			[ 'image' => '', 'tag' => 'AI & Data',       'title' => 'AI-Powered Dashboards',          'desc' => 'Complex data made simple — dashboards that help users make better decisions faster.', 'link_url' => '' ],
			[ 'image' => '', 'tag' => 'Mobile & Portals','title' => 'Customer Portals and Mobile Apps','desc' => 'Polished, intuitive interfaces for your customers and internal teams.', 'link_url' => '' ],
		],
		'svc_cases_heading'   => 'From Solution to Success Stories',
		'svc_cases_link_text' => 'See All →',
		'svc_cases_link_url'  => '/work/',
		'svc_cases_cards'     => [],
		'svc_blog_title'      => "Insights That Move\nBusiness Forward",
		'svc_blog_desc'       => 'Actionable thinking on UX strategy, design systems, and how great design drives product outcomes.',
		'svc_blog_cta_text'   => 'All Insights →',
		'svc_blog_cta_url'    => '/blog/',
		'svc_blog_posts'      => 3,
		'svc_cta_title'       => "Let's Build What's Next",
		'svc_cta_desc'        => "Great design doesn't just look good — it ships, it converts, and it scales. Let's get started.",
		'svc_cta_btn_text'    => 'Start the Conversation →',
		'svc_cta_btn_url'     => '/contact/?looking=Design',
	];
}

/** @return array<string,mixed> */
function slingshot_lp_build_service_mobile_meta() {
	$icon_cx   = '<svg width="22" height="22" viewBox="0 0 22 22" fill="none"><rect width="22" height="22" rx="6" fill="#4B23B0" fill-opacity=".12"/><circle cx="11" cy="9" r="4" stroke="#4B23B0" stroke-width="1.6"/><path d="M4 18c0-3.3 3.1-6 7-6s7 2.7 7 6" stroke="#4B23B0" stroke-width="1.5" stroke-linecap="round"/></svg>';
	$icon_ops  = '<svg width="22" height="22" viewBox="0 0 22 22" fill="none"><rect width="22" height="22" rx="6" fill="#23B7B4" fill-opacity=".12"/><path d="M6 12l3 3 7-7" stroke="#23B7B4" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>';
	$icon_scale= '<svg width="22" height="22" viewBox="0 0 22 22" fill="none"><rect width="22" height="22" rx="6" fill="#4B23B0" fill-opacity=".12"/><path d="M5 17l4-8 4 5 2-3 3 6" stroke="#4B23B0" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>';
	$icon_incl = '<svg width="22" height="22" viewBox="0 0 22 22" fill="none"><rect width="22" height="22" rx="6" fill="#23B7B4" fill-opacity=".12"/><circle cx="11" cy="11" r="6" stroke="#23B7B4" stroke-width="1.6"/><path d="M8 11l2 2 4-4" stroke="#23B7B4" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>';

	return [
		'svc_theme'            => 'mobile',
		'svc_hero_bc_parent'  => 'SERVICES',
		'svc_hero_bc_leaf'    => 'MOBILE',
		'svc_hero_heading'    => 'Mobile App Development',
		'svc_hero_subtext'    => 'iOS, Android, and cross-platform apps built for performance, usability, and scale.',
		'svc_hero_cta_text'   => 'Book a call',
		'svc_hero_cta_url'    => '/contact/?looking=Mobile',
		'svc_built_heading_1' => 'Built for Impact.',
		'svc_built_heading_2' => 'Designed to Scale.',
		'svc_built_desc'      => 'Mobile is often the first touchpoint for your users. We make it count.',
		'svc_built_items'     => [
			[ 'icon_svg' => $icon_cx,    'title' => 'Customer Experience', 'desc' => 'Apps your users love — intuitive, fast, and beautiful on every screen.' ],
			[ 'icon_svg' => $icon_ops,   'title' => 'Operational Efficiency', 'desc' => 'Internal tools and field apps that streamline how your team works.' ],
			[ 'icon_svg' => $icon_scale, 'title' => 'Built to Scale',       'desc' => 'Architecture designed for growth — from 100 to 1,000,000 users.' ],
			[ 'icon_svg' => $icon_incl,  'title' => 'Inclusion & Reach',    'desc' => 'Accessible design that ensures your app works for everyone.' ],
		],
		'svc_cards_eyebrow'  => 'Built for Business Mobility',
		'svc_cards_heading'  => 'Apps Built for Business Mobility',
		'svc_cards_desc'     => 'Whether consumer-facing or internal, we build mobile apps that move your business forward.',
		'svc_cards_layout'   => 'alternating',
		'svc_cards_items'    => [
			[ 'image' => '', 'tag' => 'Customer Experience',    'title' => 'Customer-Facing Apps',   'desc' => 'Polished consumer apps that build loyalty and drive engagement.', 'link_url' => '' ],
			[ 'image' => '', 'tag' => 'Operational Efficiency', 'title' => 'Field & Internal Tools', 'desc' => 'Empower your workforce with mobile tools that eliminate paperwork and manual steps.', 'link_url' => '' ],
			[ 'image' => '', 'tag' => 'Cross-Platform',         'title' => 'React Native & Flutter', 'desc' => 'One codebase, two platforms — without sacrificing the native experience.', 'link_url' => '' ],
		],
		'svc_cases_heading'   => 'From Solution to Success Stories',
		'svc_cases_link_text' => 'See All →',
		'svc_cases_link_url'  => '/work/',
		'svc_cases_cards'     => [],
		'svc_blog_title'      => "Insights That Move\nBusiness Forward",
		'svc_blog_desc'       => 'Actionable thinking on mobile strategy, UX, and how the best apps get built and scaled.',
		'svc_blog_cta_text'   => 'All Insights →',
		'svc_blog_cta_url'    => '/blog/',
		'svc_blog_posts'      => 3,
		'svc_cta_title'       => "Let's Build a Great\nMobile App",
		'svc_cta_desc'        => "Tell us about your app idea — we'll help you figure out the fastest path to launch.",
		'svc_cta_btn_text'    => 'Start the Conversation →',
		'svc_cta_btn_url'     => '/contact/?looking=Mobile',
	];
}

/** @return array<string,mixed> */
function slingshot_lp_build_careers_meta() {
	return [
		'car_header_cta_text' => "Let's talk",
		'car_header_cta_url'  => '/contact/',
		'car_hero_bc_parent'  => '',
		'car_hero_bc_leaf'    => '',
		'car_hero_heading'    => "Built for Big Kids\n& Daredevils",
		'car_hero_subtext'    => 'The curious. The bold. The ones who care deeply about building great software.',
		'car_hero_cta_text'   => 'Open Roles',
		'car_hero_cta_url'    => '#open-roles',
		'car_wtl_heading'     => "What It’s Like\nto Work Here",
		'car_wtl_text'        => "At Slingshot, we hire for mindset as much as skill. We’re a team of thinkers and makers who love the challenge, own our craft, and build software that actually makes a difference.\n\nYou’ll collaborate with designers, developers, and product managers to solve real problems. You’ll speak up, challenge ideas, and be heard. You’ll learn, build, break, and ship, without the politics or micromanagement.\n\nWe’re Big Kids and Daredevils who take our work seriously, but not ourselves.",
		'car_perks_heading'   => 'Perks & Benefits',
		'car_perks_items'     => [
			[ 'icon_key' => 'globe',     'title' => 'Flexible Hybrid Culture',    'desc' => 'Work from home, the office, or a mix of both. We trust you to get the job done from wherever you work best.' ],
			[ 'icon_key' => 'briefcase', 'title' => 'Unlimited PTO',              'desc' => 'Take time when you need it. No counting days, just open communication and real recharge.' ],
			[ 'icon_key' => 'health',    'title' => 'Comprehensive Healthcare',   'desc' => 'You’ve got options with medical, dental, and vision plans, plus optional add-ons for what matters most.' ],
			[ 'icon_key' => 'savings',   'title' => '401(k) with Company Match',  'desc' => 'We’ll help you build for the future with a competitive retirement savings plan and matching contributions.' ],
		],
		'car_roles_heading'   => 'Open Roles',
		'car_roles_items'     => [
			[ 'title' => 'Senior .NET Developer', 'type' => 'Full-time', 'location' => 'Louisville, KY', 'link_text' => 'Details', 'link_url' => '/careers/senior-net-developer-p3/' ],
			[ 'title' => '.NET Developer',        'type' => 'Full-time', 'location' => 'Louisville, KY', 'link_text' => 'Details', 'link_url' => '/careers/net-developer/' ],
			[ 'title' => 'Senior AI Developer',   'type' => 'Full-time', 'location' => 'Louisville, KY', 'link_text' => 'Details', 'link_url' => '/careers/senior-ai-developer/' ],
			[ 'title' => 'Senior .NET Developer', 'type' => 'Full-time', 'location' => 'Louisville, KY', 'link_text' => 'Details', 'link_url' => '/careers/senior-developer/' ],
		],
		'car_form_heading'    => 'Hit us up',
		'car_form_subtext'    => '',
		'car_form_gf_id'      => 3,
	];
}

/** @return array<string,mixed> */
function slingshot_lp_build_open_position_meta() {
	return [
		'op_header_cta_text' => "Let's talk",
		'op_header_cta_url'  => '/contact/',
		'op_job_title'       => 'Senior AI Developer',
		'op_job_type'        => 'Full-time',
		'op_job_location'    => 'Louisville, KY',
		'op_job_tags'        => 'On-site, Louisville KY, Full-time',
		'op_bc_parent'       => 'Open Positions',
		'op_bc_parent_url'   => '/careers/#open-roles',
		'op_sections'        => [
			[
				'section_type' => 'text',
				'title'        => 'About this Role',
				'body'         => "Slingshot is on the hunt for a talented and passionate Senior AI Developer who thrives at the intersection of full-stack development and artificial intelligence. You’ll be helping us push the envelope of what’s possible by building modern software with AI-first principles in mind. We’re not just adding AI to projects, we’re fundamentally changing how software is designed and delivered.\n\nYou’ll serve as both architect and hands-on developer, leveraging your full-stack experience (ideally in Node.js, React, React Native but not required) and your AI toolbelt (think Cursor, Claude Code, GitHub Copilot, etc.) to lead projects from discovery to deployment. You’ll also collaborate closely with our design team and product managers to shape intelligent, intuitive user experiences.\n\nYou’ll help Slingshot, and our clients, stay ahead of the curve by architecting scalable, secure cloud applications (web and mobile apps), mentoring devs on your team, and continually exploring how new AI capabilities can accelerate delivery and enhance user outcomes.",
			],
			[
				'section_type' => 'list',
				'title'        => 'Your focus will include',
				'body'         => "Designing full-stack applications and architectures that leverage modern web, mobile, and cloud technologies\nLeading projects as the technical head, managing code quality and mentoring teammates\nApplying AI-first development practices, using tools like Cursor, Claude Code, ChatGPT, Copilot, and others\nRapidly building prototypes and proof-of-concepts using AI tools to shorten development cycles\nPrimarily working on Node.js, React, React Native, PostgreSQL while sometimes working with .NET Core, C#, Angular, and Vue.js, depending on the project\nCreating robust APIs, and cloud-native backends primarily in AWS and Azure\nActing as an internal evangelist for AI innovation, helping Slingshot continuously evolve how we build software",
			],
			[
				'section_type' => 'list',
				'title'        => "We’re looking for someone who:",
				'body'         => "Has deep full-stack experience with modern web and mobile frameworks\nIs genuinely excited about how AI is transforming software development\nPassionate about learning and using emerging tools (Cursor, Claude Code, Copilot) to accelerate development and enhance workflows\nKnows how to build for scale and reliability in a cloud environment (especially AWS)\nWrites clean, testable, and well-documented code\nCan clearly communicate architecture and technical decisions\nIs infinitely curious and not afraid to experiment or fail fast\nWants to work with a team of driven, creative, passionate humans who take pride in their craft",
			],
			[
				'section_type' => 'list',
				'title'        => 'Why you want to work here',
				'body'         => "You believe AI is more than a buzzword – it’s a catalyst for building better software\nYou like autonomy and want to be trusted for your judgment and skill\nYou like helping businesses reach new heights through technology\nYou thrive in a no-BS, high-integrity, fun-loving work culture\nYou want to work at a place where developers are respected, empowered, and constantly learning",
			],
			[
				'section_type' => 'list',
				'title'        => 'Some cool benefits',
				'body'         => "Generous PTO and Holiday time off including your birthday\n401(k) with company match\nQuarterly bonuses\nValentine’s Day office fairy (it’s a thing)\nFlexible hours and remote-friendly culture\nNo dress code (except when needed for clients)\nGreenfield project opportunities with a chance to leave your mark\nZero politics. Just solid people building great things.",
			],
			[
				'section_type' => 'text',
				'title'        => 'Who is Slingshot?',
				'body'         => "Slingshot is a pretty awesome software development shop in Louisville, Kentucky. We’re smart, passionate, creative, and modest ;). We’ve been solving real-world problems with software since 2005, helping companies across industries go further, faster, and smarter. We value curiosity, craftsmanship, and collaboration – and we’re not afraid to challenge the status quo.\n\nCurious about this role? Apply for this job by sending your email to . Hope to hear from you soon!",
			],
		],
		'op_form_heading' => 'Hit us up',
		'op_form_subtext' => '',
		'op_form_gf_id'   => 3,
	];
}

/** @return array<string,mixed> */
function slingshot_lp_build_contact_meta() {
	return [
		'cnt_heading'          => 'Ready To Get Started?',
		'cnt_desc'             => 'Have questions about pricing, projects, or Slingshot? Fill out the form below and a Slingshot representative will be in touch shortly.',
		'cnt_phone'            => '502.254.6150',
		'cnt_email'            => 'hello@Yslingshot.com',
		'cnt_offices'          => [
			[ 'label' => 'Louisville', 'address_1' => '700 N Hurstbourne Pkwy #120', 'address_2' => '', 'city_state_zip' => 'Louisville, KY 40222' ],
			[ 'label' => 'Chicago',    'address_1' => '111 North Wabash Ave #3106',  'address_2' => '', 'city_state_zip' => 'Chicago, IL 60602' ],
			[ 'label' => 'Nashville',  'address_1' => '6339 CharlottePike #781',    'address_2' => '', 'city_state_zip' => 'Nashville, TN 37209' ],
		],
		'cnt_form_heading'     => 'Hit us up',
		'cnt_form_gf_id'       => 0,
		'cnt_looking_options'  => "General Inquiry\nProduct Development\nMobile App Development\nWeb Development\nDesign\nAI / Machine Learning\nTeam Augmentation\nConsulting",
	];
}

/** @return array<string,mixed> */
function slingshot_lp_build_work_meta() {
	$img_base = '/wp-content/themes/salient-child/img/';

	return [
		'wrk_hero_heading'     => 'Explore Our Work',
		'wrk_hero_eyebrow'     => '',
		'wrk_hero_desc'        => 'From innovation to implementation, the proof is in the practice. Our expertise in delivering custom solutions has driven results across industries.',
		'wrk_hero_cta_text'    => 'Book a call',
		'wrk_hero_cta_url'     => '/contact/',
		'wrk_filter_tabs'      => "All\nConsulting\nAI\nTeams\nProduct",
		'wrk_initial_visible'  => 12,
		'wrk_projects'         => [
			[
				'image_url'  => $img_base . 'ai-work-caregiver.png',
				'title'      => 'Connected Caregiver',
				'subtitle'   => 'A mobile experience that helps families stay informed while caring for aging loved ones.',
				'tags'       => 'Product, Mobile, UX',
				'categories' => 'product',
				'link_url'   => '/work/connected-caregiver/',
			],
			[
				'image_url'  => $img_base . 'ai-work-southeast.png',
				'title'      => 'Southeast Christian Church',
				'subtitle'   => 'AI-enabled translation and community tools that help refugee support teams scale their impact.',
				'tags'       => 'Consulting, AI, Mobile',
				'categories' => 'consulting, ai',
				'link_url'   => '/work/southeast/',
			],
			[
				'image_url'  => $img_base . 'ai-work-horizon.png',
				'title'      => 'Horizon',
				'subtitle'   => 'Digital product strategy and implementation for a healthcare engagement platform.',
				'tags'       => 'Product, AI, Web',
				'categories' => 'product, ai',
				'link_url'   => '/work/horizon/',
			],
			[
				'image_url'  => $img_base . 'ai-insight-product.png',
				'title'      => 'DFS Dashboard',
				'subtitle'   => 'A data-rich dashboard experience built to make operational decisions easier.',
				'tags'       => 'Consulting, Product, Data',
				'categories' => 'consulting, product',
				'link_url'   => '/work/dfs/',
			],
			[
				'image_url'  => $img_base . 'teams-dedicated-team-photo.png',
				'title'      => 'Schneider Electric',
				'subtitle'   => 'Dedicated delivery support for complex enterprise product work.',
				'tags'       => 'Teams, Product',
				'categories' => 'teams, product',
				'link_url'   => '/work/schneider-electric/',
			],
			[
				'image_url'  => $img_base . 'ai-work-horizon.png',
				'title'      => 'Document Classification',
				'subtitle'   => 'AI-assisted document workflows that reduce manual review and speed up routing.',
				'tags'       => 'AI, Consulting',
				'categories' => 'ai, consulting',
				'link_url'   => '/work/document-classification-ai/',
			],
			[
				'image_url'  => $img_base . 'ai-work-southeast.png',
				'title'      => 'Zoeller Voice Technology',
				'subtitle'   => 'Voice-enabled product tools designed around field teams and real customer workflows.',
				'tags'       => 'AI, Product',
				'categories' => 'ai, product',
				'link_url'   => '/work/zoeller-voice/',
			],
			[
				'image_url'  => $img_base . 'ai-work-caregiver.png',
				'title'      => 'MetLife Pets',
				'subtitle'   => 'A product experience that simplifies insurance workflows for customers and teams.',
				'tags'       => 'Product, Mobile',
				'categories' => 'product',
				'link_url'   => '/work/metlife/',
			],
			[
				'image_url'  => $img_base . 'ai-insight-hackathon.png',
				'title'      => 'Customer Support Automation',
				'subtitle'   => 'AI workflow support that helps teams answer faster and resolve requests with less friction.',
				'tags'       => 'AI, Consulting',
				'categories' => 'ai, consulting',
				'link_url'   => '/work/ai-customer-support/',
			],
			[
				'image_url'  => $img_base . 'ai-work-horizon.png',
				'title'      => 'Levee',
				'subtitle'   => 'Product design and engineering for a platform built around clear daily operations.',
				'tags'       => 'Product, Web',
				'categories' => 'product',
				'link_url'   => '/work/levee/',
			],
			[
				'image_url'  => $img_base . 'ai-work-southeast.png',
				'title'      => 'CheckBAC',
				'subtitle'   => 'A mobile-first product experience for regulated, high-trust workflows.',
				'tags'       => 'Product, Mobile',
				'categories' => 'product',
				'link_url'   => '/work/checkbac/',
			],
			[
				'image_url'  => $img_base . 'teams-dedicated-team-photo.png',
				'title'      => 'HealthRev',
				'subtitle'   => 'A collaborative team engagement focused on shipping product improvements quickly.',
				'tags'       => 'Teams, Product',
				'categories' => 'teams, product',
				'link_url'   => '/work/healthrev/',
			],
			[
				'image_url'  => $img_base . 'ai-work-caregiver.png',
				'title'      => 'Thrive Mobile',
				'subtitle'   => 'A mobile product build shaped around usability, reliability, and repeat engagement.',
				'tags'       => 'Product, Mobile',
				'categories' => 'product',
				'link_url'   => '/work/thrive-mobile/',
			],
			[
				'image_url'  => $img_base . 'ai-insight-product.png',
				'title'      => 'Corrisoft',
				'subtitle'   => 'Enterprise product work for operational teams with complex real-world constraints.',
				'tags'       => 'Consulting, Product',
				'categories' => 'consulting, product',
				'link_url'   => '/work/corrisoft/',
			],
			[
				'image_url'  => $img_base . 'ai-work-horizon.png',
				'title'      => 'NASCEND',
				'subtitle'   => 'A product engagement focused on workflow clarity and technical execution.',
				'tags'       => 'Product, Web',
				'categories' => 'product',
				'link_url'   => '/work/nascend/',
			],
		],
		'wrk_cta_heading'      => 'Ready to Launch Something Bold?',
		'wrk_cta_desc'         => "Let's talk about how we help teams like yours bring new products to life—and make them work in the real world.",
		'wrk_cta_btn_text'     => "Let's Talk",
		'wrk_cta_btn_url'      => '/contact/',
	];
}

/** @return array<string,mixed> */
function slingshot_lp_build_case_study_meta() {
	return [
		'cs_hero_client'      => 'Southwest Christian Church',
		'cs_hero_title'       => 'A Digital Platform That Connects a Community',
		'cs_hero_tags'        => 'Mobile App, iOS, Android, UX Design',
		'cs_challenge_label'  => 'Challenge',
		'cs_challenge_heading'=> 'Replacing a fragmented communication experience',
		'cs_challenge_text'   => "Southwest Christian Church needed a unified mobile experience that could replace a patchwork of email lists, bulletin PDFs, and disconnected systems — without alienating a diverse congregation that ranged from tech-savvy young adults to older members less comfortable with new technology.\n\nThe existing app was outdated and rarely used. They needed something that would become part of weekly life for thousands of members.",
		'cs_sections'         => [
			[
				'label'      => 'Solution',
				'heading'    => 'A native app built around their community',
				'desc'       => "We designed and built a native iOS and Android app centered on simplicity and habit-forming features — event listings, sermon streams, giving, and group communication all in one place.",
				'bullets'    => "Custom event and sermon discovery\nIn-app giving with saved payment methods\nSmall group messaging and member directories\nPush notifications for services and announcements",
				'image'      => '',
				'image_side' => 'right',
				'dark_bg'    => '',
			],
			[
				'label'      => 'Design System',
				'heading'    => 'Slingshot Design Tools to Serve Their Team',
				'desc'       => "We delivered a full design system alongside the app — giving their internal communications team the ability to update content, create new event pages, and maintain visual consistency without needing a developer.",
				'bullets'    => '',
				'image'      => '',
				'image_side' => 'left',
				'dark_bg'    => '1',
			],
		],
		'cs_cta_heading'      => 'Ready to Launch Something Bold?',
		'cs_cta_desc'         => "We partner with ambitious companies to design and build products people love. Let's talk.",
		'cs_cta_btn_text'     => "Let's Talk",
		'cs_cta_btn_url'      => '/contact/',
	];
}

/** @return array<string,mixed> */
function slingshot_lp_build_work_internal_product_meta() {
	$img_base    = '/wp-content/themes/salient-child/img/';
	$upload_base = '/wp-content/uploads/';
	$phone_pair  = $upload_base . '2023/01/CCG-Two-phones-left-twist-right-bsck.png';
	$phone_stack = $upload_base . '2023/01/Four-Phones-left-side-two-right-side-CCG.png';
	$logo        = $upload_base . '2024/05/Gray-Logos-CCG-.png';

	return [
		'cs_figma_enabled'         => '1',
		'cs_hero_client'           => 'Connected Caregiver',
		'cs_hero_title'            => 'Connected Caregiver',
		'cs_hero_desc'             => 'Helping family caregivers stay informed about their loved ones through a secure and user-friendly senior health monitoring app.',
		'cs_hero_img_url'          => $phone_pair,
		'cs_intro_heading'         => 'Connected Caregiver gives families a clearer way to coordinate care and stay informed.',
		'cs_intro_text'            => 'Connected Caregiver is a branch within Verustat with a mission to make taking care of loved ones easier and simpler. Slingshot helped the team rethink the mobile app experience around daily clarity, important alerts, and a more intuitive path through the product.',
		'cs_services'              => "Product Strategy\nUX/UI Design\nMobile Development",
		'cs_technology'            => "Figma\nWhimsical\nJira\nMobile Prototyping",
		'cs_media_top_img_url'     => $phone_stack,
		'cs_solution_heading'      => 'A mobile prototype built around caregiver confidence',
		'cs_solution_text'         => 'We started with stakeholder alignment and user interviews, then brought the Connected Caregiver team into a collaborative design workshop. The result was a larger, clickable prototype that could support user testing, internal demos, and development handoff.',
		'cs_challenges'            => "The original app was built quickly and was difficult for caregivers to use\nFamilies needed clearer access to vitals, alerts, and daily care context\nThe team needed a prototype large enough for testing, demos, and internal handoff\nThe experience had to support a freemium path without confusing users",
		'cs_solutions'             => "Conducted stakeholder and user interviews to refine the product scope\nFacilitated a design workshop with the Connected Caregiver team\nDesigned a simpler mobile prototype around daily caregiver tasks\nCreated a clickable Figma prototype for user testing and internal demos",
		'cs_gallery'               => [
			[ 'image_url' => $phone_pair, 'alt' => 'Connected Caregiver mobile screens' ],
			[ 'image_url' => $phone_stack, 'alt' => 'Connected Caregiver app flow' ],
		],
		'cs_onboarding_img_url'    => $phone_stack,
		'cs_media_middle_img_url'  => $phone_pair,
		'cs_admin_heading'         => 'Product Direction the Internal Team Could Build From',
		'cs_admin_text'            => 'The redesigned prototype gave Connected Caregiver a clear UX direction and a practical artifact their internal development team could use. Every major screen, flow, and product decision stayed editable through the case study fields in WordPress.',
		'cs_admin_img_url'         => $phone_pair,
		'cs_design_system_img_url' => $phone_stack,
		'cs_media_bottom_img_url'  => $phone_stack,
		'cs_side_avatar_url'       => $logo,
		'cs_side_name'             => 'Slingshot Team',
		'cs_side_role'             => 'Product Strategy and UX',
		'cs_side_title'            => 'Ready to shape your next product experience?',
		'cs_side_text'             => 'Let us talk about how we can turn product uncertainty into a clearer path for design, validation, and delivery.',
		'cs_side_btn_text'         => 'Request a quote',
		'cs_side_btn_url'          => '/contact/',
		'cs_review_label'          => 'Project Outcome',
		'cs_review_quote'          => 'A clearer path from product idea to usable prototype.',
		'cs_review_stars'          => 5,
		'cs_review_text'           => 'The work helped the team align around the next version of the app, validate key flows, and move forward with a prototype designed for real caregiver needs.',
		'cs_review_name'           => 'Connected Caregiver',
		'cs_review_role'           => 'Product engagement',
		'cs_review_avatar_url'     => $logo,
		'cs_review_img_url'        => $phone_pair,
		'cs_cta_heading'           => 'Ready to Launch Something Bold?',
		'cs_cta_desc'              => "Let's talk about how we help teams like yours bring new products to life and make them work in the real world.",
		'cs_cta_btn_text'          => "Let's Talk",
		'cs_cta_btn_url'           => '/contact/',
		'cs_cta_mascot_url'        => $img_base . 'cta-mascot.png',
	];
}

/** @return array<string,mixed> */
function slingshot_lp_build_work_internal_meta() {
	$img_base = '/wp-content/themes/salient-child/img/';

	return [
		'cs_figma_enabled'         => '1',
		'cs_hero_client'           => 'Southeast Christian Church',
		'cs_hero_title'            => 'Southeast Christian Church',
		'cs_hero_desc'             => 'Helping refugees and immigrants acclimate to new cities with live native language translation and community guide chats.',
		'cs_hero_img_url'          => $img_base . 'case-southeast-hero-visual.png',
		'cs_intro_heading'         => 'Southeast Christian Church works with numerous disadvantaged communities in and around Louisville, including refugees trying to acclimate to the area.',
		'cs_intro_text'            => 'We build mobile products that solve complex problems and deliver measurable results. Our cross-functional teams pair user-focused design with high-performance development to create apps that are fast, intuitive, and secure.',
		'cs_services'              => "AI\nUX/UI Design\nMobile Dev",
		'cs_technology'            => "Azure AI\nAzure Cloud\nMAUI\nReact\n.NET\nDocker",
		'cs_media_top_img_url'     => $img_base . 'case-southeast-media-top.png',
		'cs_solution_heading'      => 'Solutions to Support Immigrants and Volunteers',
		'cs_solution_text'         => 'We broke down language barriers and improved access to resources using AI and auto-translation. The app makes it easier to connect with experts, provide training, and scale the program to new communities.',
		'cs_challenges'            => "Language barriers between volunteers and refugees/immigrants, especially for less common languages\nDifficulty connecting immigrants with local experts and resources\nLack of centralized resources for common issues faced\nConcerns with relationship building without in-person communication\nLimitations in the church's ability to expand the program beyond Louisville",
		'cs_solutions'             => "Leveraged Azure AI to enable real-time language translation between users' native languages and English\nIncorporated features for volunteers to build profiles highlighting their areas of expertise\nCreated auto-translated resources for daily issues like schools, healthcare, and more\nAdded onboarding videos with local immigrants speaking in their native language\nDesigned the app for multi-tenancy to allow easy expansion to other communities",
		'cs_gallery'               => [
			[ 'image_url' => $img_base . 'case-southeast-gallery-a.png', 'alt' => 'HelloCity resources screen' ],
			[ 'image_url' => $img_base . 'case-southeast-gallery-b.png', 'alt' => 'HelloCity chats screen' ],
		],
		'cs_onboarding_img_url'    => $img_base . 'case-southeast-onboarding.png',
		'cs_media_middle_img_url'  => $img_base . 'case-southeast-media-middle.png',
		'cs_admin_heading'         => 'Powerful Admin Tools for Better User Support',
		'cs_admin_text'            => 'The admin panel lets administrators easily manage users, track activity, and offer real-time assistance. It simplifies onboarding, resolves issues faster, and ensures smooth use of the app for all communities.',
		'cs_admin_img_url'         => $img_base . 'case-southeast-admin-panel.png',
		'cs_design_system_img_url' => $img_base . 'case-southeast-design-system.png',
		'cs_media_bottom_img_url'  => $img_base . 'case-southeast-media-bottom.png',
		'cs_side_avatar_url'       => $img_base . 'case-southeast-avatar-savannah.png',
		'cs_side_name'             => 'Savannah Cherry',
		'cs_side_role'             => 'Director of marketing and new business',
		'cs_side_title'            => 'Ready to discuss your project with us?',
		'cs_side_text'             => 'Let us talk about how we can craft a user experience that not only looks great but drives real growth for you.',
		'cs_side_btn_text'         => 'Request a quote',
		'cs_side_btn_url'          => '/contact/',
		'cs_review_label'          => 'Client Review',
		'cs_review_quote'          => 'Slingshot understood our unique vision.',
		'cs_review_stars'          => 5,
		'cs_review_text'           => 'It was clear they had a high level of expertise. They came up with a solution that fit our needs, and we felt involved during the entire process. We plan on working with Slingshot again, and see them as partners rather than another software vendor.',
		'cs_review_name'           => 'Maria Doe',
		'cs_review_role'           => '(CEO & Co-Founder)',
		'cs_review_avatar_url'     => $img_base . 'case-southeast-avatar-maria.png',
		'cs_review_img_url'        => $img_base . 'case-southeast-review-visual.png',
		'cs_cta_heading'           => 'Ready to Launch Something Bold?',
		'cs_cta_desc'              => "Let's talk about how we help teams like yours bring new products to life--and make them work in the real world.",
		'cs_cta_btn_text'          => "Let's Talk",
		'cs_cta_btn_url'           => '/contact/',
		'cs_cta_mascot_url'        => $img_base . 'cta-mascot.png',
	];
}

/**
 * Seed post meta for service + careers + open-position figma pages.
 */
function slingshot_lp_maybe_seed_figma_content() {
	if ( get_option( SLINGSHOT_LP_FIGMA_CONTENT_SEED_OPTION ) ) {
		return;
	}

	$pages = array(
		'product'       => 'slingshot_lp_build_service_product_meta',
		'services'      => 'slingshot_lp_build_service_product_meta',
		'web'           => 'slingshot_lp_build_service_web_meta',
		'web-development' => 'slingshot_lp_build_service_web_meta',
		'design'        => 'slingshot_lp_build_service_design_meta',
		'mobile'        => 'slingshot_lp_build_service_mobile_meta',
		'mobile-app-development' => 'slingshot_lp_build_service_mobile_meta',
		'careers'       => 'slingshot_lp_build_careers_meta',
		'open-position' => 'slingshot_lp_build_open_position_meta',
		'contact'       => 'slingshot_lp_build_contact_meta',
		'work'          => 'slingshot_lp_build_work_meta',
		'our-work'      => 'slingshot_lp_build_work_meta',
	);

	foreach ( $pages as $slug => $builder ) {
		$page = get_page_by_path( $slug, OBJECT, 'page' );
		if ( ! $page instanceof WP_Post ) {
			continue;
		}
		$meta = call_user_func( $builder );
		foreach ( $meta as $key => $value ) {
			update_post_meta( (int) $page->ID, $key, $value );
		}
	}

	update_option( SLINGSHOT_LP_FIGMA_CONTENT_SEED_OPTION, '1', true );
}
add_action( 'init', 'slingshot_lp_maybe_seed_figma_content', 13 );

define( 'SLINGSHOT_LP_CONTACT_CONTENT_FIX_OPTION_V1', 'slingshot_lp_contact_content_fix_v1' );

/**
 * Keep existing staging DBs aligned with the current contact Figma copy.
 */
function slingshot_lp_maybe_seed_contact_content_fix_v1() {
	if ( get_option( SLINGSHOT_LP_CONTACT_CONTENT_FIX_OPTION_V1 ) ) {
		return;
	}

	$page = get_page_by_path( 'contact', OBJECT, 'page' );
	if ( $page instanceof WP_Post ) {
		foreach ( slingshot_lp_build_contact_meta() as $key => $value ) {
			update_post_meta( (int) $page->ID, $key, $value );
		}
	}

	update_option( SLINGSHOT_LP_CONTACT_CONTENT_FIX_OPTION_V1, '1', true );
}
add_action( 'init', 'slingshot_lp_maybe_seed_contact_content_fix_v1', 13 );

define( 'SLINGSHOT_LP_FIGMA_REDESIGN_BUILDER_PAGES_OPTION', 'slingshot_lp_figma_redesign_builder_pages_v1' );

/**
 * Create additional redesign pages managed from Edit Page / WPBakery.
 */
function slingshot_lp_maybe_create_figma_redesign_builder_pages() {
	if ( get_option( SLINGSHOT_LP_FIGMA_REDESIGN_BUILDER_PAGES_OPTION ) ) {
		return;
	}

	$pages = array(
		'contact'              => array( 'title' => 'Contact', 'mockup' => '/figma/contact.png' ),
		'contact-form-modal'   => array( 'title' => 'Contact Form Modal', 'mockup' => '/figma/contact-form-modal.png' ),
		'work'                 => array( 'title' => 'Work', 'mockup' => '/figma/work.png' ),
		'internal'             => array( 'title' => 'Internal', 'mockup' => '/figma/internal.png' ),
		'privacy-policy'       => array( 'title' => 'Privacy Policy', 'mockup' => '/figma/privacy-policy.png' ),
		'terms-and-conditions' => array( 'title' => 'Terms and Conditions', 'mockup' => '/figma/terms-and-conditions.png' ),
	);

	foreach ( $pages as $slug => $cfg ) {
		$page = get_page_by_path( $slug, OBJECT, 'page' );

		if ( ! $page instanceof WP_Post ) {
			$page_id = wp_insert_post(
				array(
					'post_type'    => 'page',
					'post_status'  => 'publish',
					'post_title'   => $cfg['title'],
					'post_name'    => $slug,
					'post_content' => '',
				),
				true
			);

			if ( is_wp_error( $page_id ) ) {
				continue;
			}
		} else {
			$page_id = (int) $page->ID;
		}

		update_post_meta( (int) $page_id, '_wp_page_template', 'page-redesign-builder.php' );
		update_post_meta( (int) $page_id, 'sl_figma_mockup_url', $cfg['mockup'] );
		update_post_meta( (int) $page_id, 'slingshot_rb_skin', 'home' );
	}

	update_option( SLINGSHOT_LP_FIGMA_REDESIGN_BUILDER_PAGES_OPTION, '1', true );
}

add_action( 'init', 'slingshot_lp_maybe_create_figma_redesign_builder_pages', 14 );

define( 'SLINGSHOT_LP_FIGMA_REDESIGN_BUILDER_PAGES_OPTION_V2', 'slingshot_lp_figma_redesign_builder_pages_v2' );

/**
 * Create additional redesign pages (batch 2) managed from Edit Page / WPBakery.
 */
function slingshot_lp_maybe_create_figma_redesign_builder_pages_v2() {
	if ( get_option( SLINGSHOT_LP_FIGMA_REDESIGN_BUILDER_PAGES_OPTION_V2 ) ) {
		return;
	}

	$pages = array(
		'blog'               => array( 'title' => 'Blog', 'mockup' => '/figma/blog.png' ),
		'internal-blog'      => array( 'title' => 'Internal Blog', 'mockup' => '/figma/internal-blog.png' ),
		'register'           => array( 'title' => 'Register', 'mockup' => '/figma/register.png' ),
		'event'              => array( 'title' => 'Event', 'mockup' => '/figma/event.png' ),
		'events'             => array( 'title' => 'Events', 'mockup' => '/figma/events.png' ),
		'about-us'           => array( 'title' => 'About Us', 'mockup' => '/figma/about-us.png' ),
		'achievements'       => array( 'title' => 'Achievements', 'mockup' => '/figma/achievements.png' ),
		'ambassadors'        => array( 'title' => 'Ambassadors', 'mockup' => '/figma/ambassadors.png' ),
		'security-checklist' => array( 'title' => 'Security Checklist', 'mockup' => '/figma/security-checklist.png' ),
		'subscribe'          => array( 'title' => 'Subscribe', 'mockup' => '/figma/subscribe.png' ),
		'video-modal'        => array( 'title' => 'Video Modal', 'mockup' => '/figma/video-modal.png' ),
	);

	foreach ( $pages as $slug => $cfg ) {
		$page = get_page_by_path( $slug, OBJECT, 'page' );

		if ( ! $page instanceof WP_Post ) {
			$page_id = wp_insert_post(
				array(
					'post_type'    => 'page',
					'post_status'  => 'publish',
					'post_title'   => $cfg['title'],
					'post_name'    => $slug,
					'post_content' => '',
				),
				true
			);

			if ( is_wp_error( $page_id ) ) {
				continue;
			}
		} else {
			$page_id = (int) $page->ID;
		}

		update_post_meta( (int) $page_id, '_wp_page_template', 'page-redesign-builder.php' );
		update_post_meta( (int) $page_id, 'sl_figma_mockup_url', $cfg['mockup'] );
		update_post_meta( (int) $page_id, 'slingshot_rb_skin', 'home' );
	}

	update_option( SLINGSHOT_LP_FIGMA_REDESIGN_BUILDER_PAGES_OPTION_V2, '1', true );
}

add_action( 'init', 'slingshot_lp_maybe_create_figma_redesign_builder_pages_v2', 15 );

define( 'SLINGSHOT_LP_FIGMA_TEMPLATE_RETARGET_OPTION_V1', 'slingshot_lp_figma_template_retarget_v1' );

/**
 * Retarget selected figma slugs to dedicated templates.
 */
function slingshot_lp_maybe_retarget_figma_templates_v1() {
	if ( get_option( SLINGSHOT_LP_FIGMA_TEMPLATE_RETARGET_OPTION_V1 ) ) {
		return;
	}

	$map = array(
		'internal'      => 'page-internal-figma.php',
		'internal-blog' => 'page-internal-blog-figma.php',
		'register'      => 'page-register-figma.php',
	);

	foreach ( $map as $slug => $template ) {
		$page = get_page_by_path( $slug, OBJECT, 'page' );
		if ( ! $page instanceof WP_Post ) {
			continue;
		}
		update_post_meta( (int) $page->ID, '_wp_page_template', $template );
	}

	update_option( SLINGSHOT_LP_FIGMA_TEMPLATE_RETARGET_OPTION_V1, '1', true );
}
add_action( 'init', 'slingshot_lp_maybe_retarget_figma_templates_v1', 16 );

define( 'SLINGSHOT_LP_FIGMA_TEMPLATE_RETARGET_OPTION_V2', 'slingshot_lp_figma_template_retarget_v2' );

/**
 * Retarget remaining figma slugs to their dedicated templates.
 * Covers pages that were initially created with page-redesign-builder.php.
 */
function slingshot_lp_maybe_retarget_figma_templates_v2() {
	if ( get_option( SLINGSHOT_LP_FIGMA_TEMPLATE_RETARGET_OPTION_V2 ) ) {
		return;
	}

	$map = array(
		'contact'              => 'page-contact-figma.php',
		'work'                 => 'page-work-figma.php',
		'our-work'             => 'page-work-figma.php',
		'privacy-policy'       => 'page-legal-figma.php',
		'terms-and-conditions' => 'page-legal-figma.php',
		'blog'                 => 'page-blog-figma.php',
		'events'               => 'page-events-figma.php',
		'event'                => 'page-event-figma.php',
		'about-us'             => 'page-about-figma.php',
		'achievements'         => 'page-achievements-figma.php',
		'ambassadors'          => 'page-ambassadors-figma.php',
		'security-checklist'   => 'page-security-checklist-figma.php',
	);

	foreach ( $map as $slug => $template ) {
		$page = get_page_by_path( $slug, OBJECT, 'page' );
		if ( ! $page instanceof WP_Post ) {
			continue;
		}
		update_post_meta( (int) $page->ID, '_wp_page_template', $template );
	}

	update_option( SLINGSHOT_LP_FIGMA_TEMPLATE_RETARGET_OPTION_V2, '1', true );
}
add_action( 'init', 'slingshot_lp_maybe_retarget_figma_templates_v2', 17 );

define( 'SLINGSHOT_LP_FIGMA_TEMPLATE_RETARGET_OPTION_V3', 'slingshot_lp_figma_template_retarget_v3' );

/**
 * Retarget pages added after the first Figma template batches.
 */
function slingshot_lp_maybe_retarget_figma_templates_v3() {
	if ( get_option( SLINGSHOT_LP_FIGMA_TEMPLATE_RETARGET_OPTION_V3 ) ) {
		return;
	}

	$map = array(
		'technologies'               => 'page-technologies-figma.php',
		'edits_technologies-we-use'  => 'page-technologies-figma.php',
	);

	foreach ( $map as $slug => $template ) {
		$page = get_page_by_path( $slug, OBJECT, 'page' );
		if ( ! $page instanceof WP_Post ) {
			continue;
		}
		update_post_meta( (int) $page->ID, '_wp_page_template', $template );
	}

	update_option( SLINGSHOT_LP_FIGMA_TEMPLATE_RETARGET_OPTION_V3, '1', true );
}
add_action( 'init', 'slingshot_lp_maybe_retarget_figma_templates_v3', 18 );

define( 'SLINGSHOT_LP_FIGMA_TEMPLATE_RETARGET_OPTION_V4', 'slingshot_lp_figma_template_retarget_v4' );

/**
 * Retarget live legacy URLs that differ from the figma builder slugs.
 */
function slingshot_lp_maybe_retarget_figma_templates_v4() {
	if ( get_option( SLINGSHOT_LP_FIGMA_TEMPLATE_RETARGET_OPTION_V4 ) ) {
		return;
	}

	$map = array(
		'about'    => 'page-about-figma.php',
		'about-us' => 'page-about-figma.php',
	);

	foreach ( $map as $slug => $template ) {
		$page = get_page_by_path( $slug, OBJECT, 'page' );
		if ( ! $page instanceof WP_Post ) {
			continue;
		}
		update_post_meta( (int) $page->ID, '_wp_page_template', $template );
	}

	update_option( SLINGSHOT_LP_FIGMA_TEMPLATE_RETARGET_OPTION_V4, '1', true );
}
add_action( 'init', 'slingshot_lp_maybe_retarget_figma_templates_v4', 19 );

define( 'SLINGSHOT_LP_FIGMA_TEMPLATE_RETARGET_OPTION_V5', 'slingshot_lp_figma_template_retarget_v5' );

/**
 * Retarget event aliases that are blocked by The Events Calendar archive slug.
 */
function slingshot_lp_maybe_retarget_figma_templates_v5() {
	if ( get_option( SLINGSHOT_LP_FIGMA_TEMPLATE_RETARGET_OPTION_V5 ) ) {
		return;
	}

	$map = array(
		'events-old' => 'page-events-figma.php',
	);

	foreach ( $map as $slug => $template ) {
		$page = get_page_by_path( $slug, OBJECT, 'page' );
		if ( ! $page instanceof WP_Post ) {
			continue;
		}
		update_post_meta( (int) $page->ID, '_wp_page_template', $template );
	}

	update_option( SLINGSHOT_LP_FIGMA_TEMPLATE_RETARGET_OPTION_V5, '1', true );
}
add_action( 'init', 'slingshot_lp_maybe_retarget_figma_templates_v5', 20 );

if ( ! function_exists( 'slingshot_lp_seed_missing_post_meta' ) ) {
	/**
	 * Seed defaults without overwriting values already managed from the admin.
	 *
	 * @param int                  $post_id  Post ID.
	 * @param array<string, mixed> $defaults Meta defaults.
	 */
	function slingshot_lp_seed_missing_post_meta( $post_id, $defaults ) {
		foreach ( $defaults as $key => $value ) {
			if ( metadata_exists( 'post', $post_id, $key ) && '' !== get_post_meta( $post_id, $key, true ) ) {
				continue;
			}
			update_post_meta( $post_id, $key, $value );
		}
	}
}

if ( ! function_exists( 'slingshot_lp_theme_image_attachment_id' ) ) {
	/**
	 * Import a committed child-theme image into the media library once.
	 *
	 * @param string $relative_path Path relative to the child theme directory.
	 * @param string $title         Attachment title.
	 * @return int Attachment ID, or 0 when the source is unavailable.
	 */
	function slingshot_lp_theme_image_attachment_id( $relative_path, $title = '' ) {
		$relative_path = ltrim( (string) $relative_path, '/' );
		if ( '' === $relative_path ) {
			return 0;
		}

		$existing = get_posts(
			array(
				'post_type'      => 'attachment',
				'post_status'    => 'inherit',
				'posts_per_page' => 1,
				'fields'         => 'ids',
				'meta_key'       => '_slingshot_theme_source',
				'meta_value'     => $relative_path,
			)
		);
		if ( ! empty( $existing ) ) {
			return (int) $existing[0];
		}

		$source = trailingslashit( get_stylesheet_directory() ) . $relative_path;
		if ( ! file_exists( $source ) || ! is_readable( $source ) ) {
			return 0;
		}

		$bits = file_get_contents( $source );
		if ( false === $bits ) {
			return 0;
		}

		$filename = wp_basename( $source );
		$upload   = wp_upload_bits( $filename, null, $bits );
		if ( ! empty( $upload['error'] ) || empty( $upload['file'] ) ) {
			return 0;
		}

		$filetype = wp_check_filetype( $filename, null );
		$attachment_id = wp_insert_attachment(
			array(
				'post_mime_type' => $filetype['type'] ? $filetype['type'] : 'image/png',
				'post_title'     => $title ? $title : preg_replace( '/\.[^.]+$/', '', $filename ),
				'post_content'   => '',
				'post_status'    => 'inherit',
			),
			$upload['file']
		);

		if ( is_wp_error( $attachment_id ) ) {
			return 0;
		}

		require_once ABSPATH . 'wp-admin/includes/image.php';
		$metadata = wp_generate_attachment_metadata( $attachment_id, $upload['file'] );
		if ( ! is_wp_error( $metadata ) && ! empty( $metadata ) ) {
			wp_update_attachment_metadata( $attachment_id, $metadata );
		}
		update_post_meta( $attachment_id, '_slingshot_theme_source', $relative_path );

		return (int) $attachment_id;
	}
}

define( 'SLINGSHOT_LP_FIGMA_LIVE_URL_RETARGET_OPTION_V1', 'slingshot_lp_figma_live_url_retarget_v1' );

/**
 * Retarget the real public URLs from the project spreadsheet.
 *
 * Earlier seed passes created design-preview slugs such as /web/ and /mobile/.
 * This pass attaches the same admin-managed templates to the live legacy URLs.
 */
function slingshot_lp_maybe_retarget_live_urls_v1() {
	if ( get_option( SLINGSHOT_LP_FIGMA_LIVE_URL_RETARGET_OPTION_V1 ) ) {
		return;
	}

	$template_map = array(
		'dedicated-teams'                         => 'page-teams-dedicated.php',
		'eu-staff-augmentation'                  => 'page-teams-staffaug.php',
		'selecting-offshoring-region-whitepaper' => 'page-teams-whitepaper.php',
		'security-checklist-software'            => 'page-security-checklist-figma.php',
		'slingshot-ambassadors'                  => 'page-ambassadors-figma.php',
		'technologies'                           => 'page-technologies-figma.php',
		'achievements'                           => 'page-achievements-figma.php',
		'about'                                  => 'page-about-figma.php',
		'contact'                                => 'page-contact-figma.php',
		'thank-you'                              => 'page-thank-you-figma.php',
		'our-work'                               => 'page-work-figma.php',
		'terms'                                  => 'page-legal-figma.php',
		'privacy'                                => 'page-legal-figma.php',
	);

	foreach ( $template_map as $slug => $template ) {
		$page = get_page_by_path( $slug, OBJECT, 'page' );
		if ( ! $page instanceof WP_Post ) {
			continue;
		}
		update_post_meta( (int) $page->ID, '_wp_page_template', $template );
	}

	$service_pages = array(
		'services'               => 'slingshot_lp_build_service_product_meta',
		'web-development'        => 'slingshot_lp_build_service_web_meta',
		'design'                 => 'slingshot_lp_build_service_design_meta',
		'mobile-app-development' => 'slingshot_lp_build_service_mobile_meta',
	);

	foreach ( $service_pages as $slug => $builder ) {
		$page = get_page_by_path( $slug, OBJECT, 'page' );
		if ( ! $page instanceof WP_Post || ! function_exists( $builder ) ) {
			continue;
		}

		$page_id = (int) $page->ID;
		update_post_meta( $page_id, '_wp_page_template', 'page-service-figma.php' );
		slingshot_lp_seed_missing_post_meta( $page_id, call_user_func( $builder ) );
	}

	$link_fixes = array(
		'teams' => array(
			'teams_model_ded_cta_url' => array( '/teams-dedicated/', '/dedicated-teams/' ),
			'teams_model_aug_cta_url' => array( '/teams-staff-augmentation/', '/eu-staff-augmentation/' ),
		),
		'dedicated-teams' => array(
			'ded_crosssell_cta_url' => array( '/teams/staff-augmentation/', '/eu-staff-augmentation/' ),
		),
	);

	foreach ( $link_fixes as $slug => $fixes ) {
		$page = get_page_by_path( $slug, OBJECT, 'page' );
		if ( ! $page instanceof WP_Post ) {
			continue;
		}
		foreach ( $fixes as $key => $pair ) {
			$current = (string) get_post_meta( (int) $page->ID, $key, true );
			if ( $current === $pair[0] ) {
				update_post_meta( (int) $page->ID, $key, $pair[1] );
			}
		}
	}

	$portfolio = get_page_by_path( 'connected-caregiver', OBJECT, 'portfolio' );
	if ( $portfolio instanceof WP_Post && ! metadata_exists( 'post', (int) $portfolio->ID, 'cs_figma_enabled' ) ) {
		update_post_meta( (int) $portfolio->ID, 'cs_figma_enabled', 1 );
	}

	update_option( SLINGSHOT_LP_FIGMA_LIVE_URL_RETARGET_OPTION_V1, '1', true );
}
add_action( 'init', 'slingshot_lp_maybe_retarget_live_urls_v1', 22 );

if ( ! function_exists( 'slingshot_lp_default_ambassadors_meta' ) ) {
	function slingshot_lp_default_ambassadors_meta() {
		$defaults = array(
			'amb_hero_label'    => 'SLINGSHOT AMBASSADORS',
			'amb_hero_heading'  => "Be the Voice of What's Next",
			'amb_hero_desc'     => 'Slingshot Ambassadors are innovation champions, leaders, founders, product owners, and bold thinkers helping shape the future of tech, strategy, and business outcomes.',
			'amb_hero_btn_text' => 'Join the Ambassador Circle',
			'amb_hero_btn_url'  => '#ambassador-form',

			'amb_ben_heading' => "You've Helped Build What's Next—Now Help Amplify It",
			'amb_ben_desc'    => "As a Slingshot Ambassador, you've seen firsthand what's possible when vision meets capability. Now, you can amplify that momentum, helping more people bring big ideas to life.\n\nThis isn't about being a fan. It's about being part of a forward-looking group of product-minded, change-focused professionals who want to influence what innovation looks like across industries.\n\nWhether you're a CEO, a product leader, or a strategic partner, you belong here.",
			'amb_ben_cards'   => array(
				array(
					'icon_svg' => '<svg width="44" height="44" viewBox="0 0 44 44" fill="none"><circle cx="22" cy="13" r="3" stroke="#23B7B4" stroke-width="2"/><circle cx="13" cy="29" r="3" stroke="#23B7B4" stroke-width="2"/><circle cx="31" cy="29" r="3" stroke="#23B7B4" stroke-width="2"/><path d="M20.5 15.8 14.6 26M23.5 15.8 29.4 26M16 29h12" stroke="#23B7B4" stroke-width="2" stroke-linecap="round"/></svg>',
					'heading'  => 'Early Access to Innovation',
					'desc'     => 'Be first to explore new Slingshot tech pilots, design tools, and product launches',
				),
				array(
					'icon_svg' => '<svg width="44" height="44" viewBox="0 0 44 44" fill="none"><circle cx="22" cy="22" r="14" stroke="#7A4FEB" stroke-width="2"/><path d="M22 14v16M18 18.5c0-1.9 1.7-3 4.1-3 2.1 0 3.8.8 4.5 2.2M17.8 26.5c.9 1.5 2.6 2.3 4.8 2.3 2.5 0 4.2-1.1 4.2-3 0-1.6-1.3-2.6-4.2-3.1-2.9-.6-4.5-1.6-4.5-3.3" stroke="#7A4FEB" stroke-width="2" stroke-linecap="round"/></svg>',
					'heading'  => '$1K Referral Bonus + Public Recognition',
					'desc'     => 'Your intros matter—and when they lead to partnerships, we celebrate them (and you)',
				),
				array(
					'icon_svg' => '<svg width="44" height="44" viewBox="0 0 44 44" fill="none"><path d="M15 27c-2.3-2.2-3.4-4.7-3.4-7.6 0-5.6 4.5-10.1 10.1-10.1 4.5 0 8.3 2.8 9.6 6.8" stroke="#EF6D63" stroke-width="2" stroke-linecap="round"/><path d="M28.5 22.5l2 1.1 2.1-1.1 1.3 2-1.8 1.6.2 2.4-2.3.5-1-2.1-2.4-.2-.5-2.3 2.1-1 .3-2.4z" stroke="#EF6D63" stroke-width="1.8" stroke-linejoin="round"/><path d="M17 31c1.1-2.6 2.8-3.9 5-3.9 1.4 0 2.6.5 3.6 1.5" stroke="#EF6D63" stroke-width="2" stroke-linecap="round"/></svg>',
					'heading'  => 'Innovation Peer Circle',
					'desc'     => 'Connect with a network of visionaries across industries, roles, and disciplines',
				),
				array(
					'icon_svg' => '<svg width="44" height="44" viewBox="0 0 44 44" fill="none"><path d="M11 31c1.5-4.2 4.1-6.4 7.8-6.4M18.8 22.4a4.6 4.6 0 1 0 0-9.2 4.6 4.6 0 0 0 0 9.2zM27 31V16h7v15M24 31h13M30.5 16v-5" stroke="#4D86D9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
					'heading'  => 'Direct Access to Slingshot Leaders',
					'desc'     => 'Influence our direction through strategic feedback and idea exchanges',
				),
			),

			'amb_con_heading' => 'How You Contribute',
			'amb_con_cards'   => array(
				array(
					'icon_svg' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><rect width="42" height="42" rx="12" fill="#fff"/><circle cx="16" cy="17" r="4" stroke="#7A4FEB" stroke-width="2"/><circle cx="28" cy="16" r="3" stroke="#26B4B0" stroke-width="2"/><path d="M9 31c1.5-4.2 3.9-6.3 7-6.3s5.5 2.1 7 6.3M24 29c1.1-2.6 2.5-3.9 4.2-3.9 1.8 0 3.3 1.3 4.4 3.9" stroke="#282828" stroke-width="2" stroke-linecap="round"/></svg>',
					'heading'  => 'Introduce Forward - Thinking Leaders',
					'desc'     => 'Connect your network to a partner who can deliver on big ideas',
				),
				array(
					'icon_svg' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><rect width="42" height="42" rx="12" fill="#fff"/><path d="M13 15h16M13 21h16M13 27h10" stroke="#7A4FEB" stroke-width="2" stroke-linecap="round"/><path d="M29 27l3 3 5-6" stroke="#26B4B0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
					'heading'  => 'Share What Works',
					'desc'     => "Your wins help others see what's possible—and how to get there faster",
				),
				array(
					'icon_svg' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><rect width="42" height="42" rx="12" fill="#fff"/><path d="M21 11v20M11 21h20" stroke="#7A4FEB" stroke-width="2" stroke-linecap="round"/><circle cx="21" cy="21" r="12" stroke="#26B4B0" stroke-width="2"/></svg>',
					'heading'  => "Shape What's Next",
					'desc'     => 'Help guide future services and priorities through honest, strategic feedback',
				),
				array(
					'icon_svg' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><rect width="42" height="42" rx="12" fill="#fff"/><path d="M21 12l2.8 7.1 7.6.5-5.9 4.8 1.9 7.4-6.4-4.1-6.4 4.1 1.9-7.4-5.9-4.8 7.6-.5L21 12z" stroke="#7A4FEB" stroke-width="2" stroke-linejoin="round"/></svg>',
					'heading'  => 'Champion Innovation in Your Space',
					'desc'     => "Whether it's in healthcare, fintech, logistics, or SaaS—your voice matters",
				),
			),

			'amb_form_heading'             => "Become Part of a Circle That's Building Bold",
			'amb_form_desc'                => "We're inviting advocates, leaders, and innovators to help shape the next generation of digital impact together.",
			'amb_form_who_label'           => 'Who Should Join?',
			'amb_form_who_bullets'         => "You've worked with Slingshot as a client, collaborator, or strategic partner.\nYou're leading, building, or influencing technology, product, or business decisions.\nYou care about solving real problems, building smart, and sharing what works.\nYou want to help shape innovation, not just react to it.",
			'amb_form_card_heading'        => 'Request a Speaker',
			'amb_form_gf_id'               => 0,
			'amb_form_action_url'          => '#',
			'amb_form_name_placeholder'    => 'Name*',
			'amb_form_org_placeholder'     => 'Organization',
			'amb_form_email_placeholder'   => 'Email*',
			'amb_form_phone_placeholder'   => 'Phone*',
			'amb_form_event_placeholder'   => 'Event*',
			'amb_form_message_placeholder' => 'What are you looking for?',
			'amb_form_submit'              => 'Submit Request',
		);

		$image_map = array(
			'amb_hero_img'   => array( 'img/ambassadors-hero-a.png', 'Ambassadors hero photo left' ),
			'amb_hero_img_b' => array( 'img/ambassadors-hero-b.png', 'Ambassadors hero photo right' ),
			'amb_con_img'    => array( 'img/ambassadors-contribute.png', 'Ambassadors contribution image' ),
		);

		foreach ( $image_map as $field => $image ) {
			$attachment_id = slingshot_lp_theme_image_attachment_id( $image[0], $image[1] );
			if ( $attachment_id ) {
				$defaults[ $field ] = $attachment_id;
			}
		}

		return $defaults;
	}
}

define( 'SLINGSHOT_LP_FIGMA_AMBASSADORS_META_OPTION_V1', 'slingshot_lp_figma_ambassadors_meta_v1' );

/**
 * Seed the live ambassador pages with editable admin metadata.
 */
function slingshot_lp_maybe_seed_ambassadors_meta_v1() {
	if ( get_option( SLINGSHOT_LP_FIGMA_AMBASSADORS_META_OPTION_V1 ) ) {
		return;
	}

	foreach ( array( 'slingshot-ambassadors', 'ambassadors' ) as $slug ) {
		$page = get_page_by_path( $slug, OBJECT, 'page' );
		if ( ! $page instanceof WP_Post ) {
			continue;
		}

		$page_id = (int) $page->ID;
		update_post_meta( $page_id, '_wp_page_template', 'page-ambassadors-figma.php' );
		slingshot_lp_seed_missing_post_meta( $page_id, slingshot_lp_default_ambassadors_meta() );
	}

	update_option( SLINGSHOT_LP_FIGMA_AMBASSADORS_META_OPTION_V1, '1', true );
}
add_action( 'init', 'slingshot_lp_maybe_seed_ambassadors_meta_v1', 24 );

if ( ! function_exists( 'slingshot_lp_default_security_checklist_meta' ) ) {
	function slingshot_lp_default_security_checklist_meta() {
		$defaults = array(
			'ldmg_hero_label'    => 'RESOURCES / SECURITY',
			'ldmg_hero_heading'  => 'The Security Checklist',
			'ldmg_hero_desc'     => 'Your checklist to comprehensive software security, from secure coding practices to incident response and continuous improvement.',
			'ldmg_hero_btn_text' => 'Download Now',

			'ldmg_expect_heading' => 'What to Expect in This Checklist',
			'ldmg_expect_cards'   => array(
				array(
					'icon_svg' => '<svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.5 14.5v-3h3M30.5 14.5v-3h-3M13.5 29.5v3h3M30.5 29.5v3h-3" stroke="#8B52F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><circle cx="22" cy="22" r="8" stroke="#8B52F6" stroke-width="2"/></svg>',
					'heading'  => 'Six Focus Areas',
					'desc'     => 'including secure coding practices, authentication and authorization, data protection, security testing, infrastructure security, and incident response and monitoring.',
				),
				array(
					'icon_svg' => '<svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="22" cy="22" r="19" stroke="#F04A6B" stroke-width="2"/><rect x="14.5" y="20" width="15" height="11" rx="3" stroke="#F04A6B" stroke-width="2"/><path d="M18 20v-4a4 4 0 0 1 8 0v4" stroke="#F04A6B" stroke-width="2" stroke-linecap="round"/></svg>',
					'heading'  => 'Security Quiz',
					'desc'     => 'Complete the security rating to see how you compare: are you a Malware Magnet or a Cybersecurity Champion?',
				),
				array(
					'icon_svg' => '<svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M26.5 3.5C36.5 8.5 39 21 32 31.5C25.2 41.7 12.5 39.5 7.8 29.5C3.3 20 7.6 9.2 17.5 5.2" stroke="#2D7DFF" stroke-width="2" stroke-linecap="round"/><path d="M15.5 23.5l4.5 4.5 9-13" stroke="#2D7DFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
					'heading'  => 'Safety Rating',
					'desc'     => "Learn the security best practices you should use to improve your security, allowing you to focus on what's important.",
				),
			),

			'ldmg_form_heading'             => 'Download The Checklist',
			'ldmg_form_name_placeholder'    => 'Name*',
			'ldmg_form_email_placeholder'   => 'Email*',
			'ldmg_form_company_placeholder' => 'Company',
			'ldmg_form_submit'              => 'Download Now',
			'ldmg_form_gf_id'               => 0,
			'ldmg_form_dl_url'              => '',
		);

		$image_map = array(
			'ldmg_hero_img_a' => array( 'img/security-checklist-hero-a.png', 'Security checklist hero photo left' ),
			'ldmg_hero_img_b' => array( 'img/security-checklist-hero-b.png', 'Security checklist hero photo right' ),
		);

		foreach ( $image_map as $field => $image ) {
			$attachment_id = slingshot_lp_theme_image_attachment_id( $image[0], $image[1] );
			if ( $attachment_id ) {
				$defaults[ $field ] = $attachment_id;
			}
		}

		$uploads  = wp_upload_dir();
		$pdf_file = trailingslashit( $uploads['basedir'] ) . '2024/06/Security-Checklist-for-Software.pdf';
		if ( file_exists( $pdf_file ) ) {
			$defaults['ldmg_form_dl_url'] = trailingslashit( $uploads['baseurl'] ) . '2024/06/Security-Checklist-for-Software.pdf';
		}

		return $defaults;
	}
}

define( 'SLINGSHOT_LP_FIGMA_SECURITY_CHECKLIST_META_OPTION_V1', 'slingshot_lp_figma_security_checklist_meta_v1' );

/**
 * Seed the live security checklist pages with editable admin metadata.
 */
function slingshot_lp_maybe_seed_security_checklist_meta_v1() {
	if ( get_option( SLINGSHOT_LP_FIGMA_SECURITY_CHECKLIST_META_OPTION_V1 ) ) {
		return;
	}

	foreach ( array( 'security-checklist-software', 'security-checklist' ) as $slug ) {
		$page = get_page_by_path( $slug, OBJECT, 'page' );
		if ( ! $page instanceof WP_Post ) {
			continue;
		}

		$page_id = (int) $page->ID;
		update_post_meta( $page_id, '_wp_page_template', 'page-security-checklist-figma.php' );
		slingshot_lp_seed_missing_post_meta( $page_id, slingshot_lp_default_security_checklist_meta() );
	}

	update_option( SLINGSHOT_LP_FIGMA_SECURITY_CHECKLIST_META_OPTION_V1, '1', true );
}
add_action( 'init', 'slingshot_lp_maybe_seed_security_checklist_meta_v1', 25 );

if ( ! function_exists( 'slingshot_lp_default_technologies_meta' ) ) {
	function slingshot_lp_default_technologies_meta() {
		return array(
			'tech_hero_label'          => 'TECHNOLOGIES',
			'tech_hero_heading'        => 'Technologies We Use',
			'tech_hero_desc'           => 'We provide full-stack development services across web, mobile, and desktop, utilizing an expansive set of technologies.',
			'tech_hero_btn_text'       => 'Talk Tech With Us',
			'tech_hero_btn_url'        => '/contact/?looking=Technology',
			'tech_hero_secondary_text' => 'See Our Work',
			'tech_hero_secondary_url'  => '/work/',
			'tech_intro_heading'       => 'The Right Stack for the Job',
			'tech_intro_desc'          => "We are tool-agnostic and outcome-focused. The stack is chosen around your product, team, data, scale, and long-term maintainability, not around what's fashionable this week.",
			'tech_categories'          => array(
				array(
					'kicker' => '01',
					'title'  => 'Mobile',
					'desc'   => 'Cross-platform and native mobile technologies for iOS, Android, and shared-code product teams.',
					'items'  => "Apple|5223\nAndroid|5219\n.NET MAUI|453947\nFlutter|453956\nReact Native|453940\nXamarin|5253\nSwift|453937\nObjective-C|453946\nJava|453953\nKotlin|453952",
				),
				array(
					'kicker' => '02',
					'title'  => 'Web',
					'desc'   => 'Modern frontend and backend frameworks for products, portals, platforms, and operational systems.',
					'items'  => ".NET Core|453950\nReact|453981\nAngular|453962\nNode.js|453945\nPHP|453943\nC#|453960\nVue.js|453934\nPython|453941\nDjango|453930",
				),
				array(
					'kicker' => '03',
					'title'  => 'Cloud',
					'desc'   => 'Cloud services and infrastructure patterns that help products scale, integrate, and stay resilient.',
					'items'  => "AWS|453965\nAzure AI|453961",
				),
				array(
					'kicker' => '04',
					'title'  => 'Database',
					'desc'   => 'Relational, document, and cloud-native data stores selected around product needs and operating models.',
					'items'  => "DynamoDB|453957\nMicrosoft SQL Server|453951\nAmazon DocumentDB|453963\nMySQL|453949\nMongoDB|453948\nPostgreSQL|453942",
				),
				array(
					'kicker' => '05',
					'title'  => 'Content Management Systems',
					'desc'   => 'Flexible CMS platforms for marketing sites, content operations, and structured digital experiences.',
					'items'  => "WordPress|453931\nWebflow|453933\nSanity.io|453938",
				),
				array(
					'kicker' => '06',
					'title'  => 'Artificial Intelligence',
					'desc'   => 'AI platforms, model providers, and tooling for practical automation, insight, and product intelligence.',
					'items'  => "OpenAI|453944\nAzure AI|453958\nTensorFlow|453936\nGemini|453955\nAmazon Bedrock|453964\nLlama|454017",
				),
				array(
					'kicker' => '07',
					'title'  => 'DevOps',
					'desc'   => 'Deployment, automation, and infrastructure tools that make software delivery more reliable.',
					'items'  => "Docker|453932\nTerraform|453935\nGitHub Actions|453954",
				),
			),
			'tech_cta_heading'  => 'Want to See Our Work?',
			'tech_cta_desc'     => 'Explore case studies showing how strategy, design, engineering, and modern platforms come together.',
			'tech_cta_btn_text' => "Let's Go!",
			'tech_cta_btn_url'  => '/work/',
		);
	}
}

define( 'SLINGSHOT_LP_FIGMA_TECHNOLOGIES_META_OPTION_V1', 'slingshot_lp_figma_technologies_meta_v1' );

/**
 * Seed the live technologies pages with editable admin metadata.
 */
function slingshot_lp_maybe_seed_technologies_meta_v1() {
	if ( get_option( SLINGSHOT_LP_FIGMA_TECHNOLOGIES_META_OPTION_V1 ) ) {
		return;
	}

	foreach ( array( 'technologies', 'edits_technologies-we-use' ) as $slug ) {
		$page = get_page_by_path( $slug, OBJECT, 'page' );
		if ( ! $page instanceof WP_Post ) {
			continue;
		}

		$page_id = (int) $page->ID;
		update_post_meta( $page_id, '_wp_page_template', 'page-technologies-figma.php' );
		slingshot_lp_seed_missing_post_meta( $page_id, slingshot_lp_default_technologies_meta() );
	}

	update_option( SLINGSHOT_LP_FIGMA_TECHNOLOGIES_META_OPTION_V1, '1', true );
}
add_action( 'init', 'slingshot_lp_maybe_seed_technologies_meta_v1', 26 );

if ( ! function_exists( 'slingshot_lp_default_thank_you_meta' ) ) {
	function slingshot_lp_default_thank_you_meta() {
		return array(
			'ty_hero_label'     => 'MESSAGE SENT',
			'ty_hero_heading'   => 'Thank You!',
			'ty_hero_desc'      => 'Your message landed with our team. We will review it and get back to you soon.',
			'ty_primary_text'   => 'Back to Home',
			'ty_primary_url'    => '/',
			'ty_secondary_text' => 'Explore Our Work',
			'ty_secondary_url'  => '/our-work/',
			'ty_card_eyebrow'  => 'Ready, aimed, fired',
			'ty_card_heading'  => 'Your question is ready, aimed, and fired our way.',
			'ty_card_desc'     => "We'll get back to you soon.",
			'ty_next_heading'  => 'What Happens Next',
			'ty_next_items'    => array(
				array(
					'icon_svg' => '<svg viewBox="0 0 44 44" fill="none" aria-hidden="true"><rect width="44" height="44" rx="14" fill="#F1EEFF"/><path d="M14 17h16M14 22h12M14 27h9" stroke="#6D44B7" stroke-width="2" stroke-linecap="round"/></svg>',
					'title'    => 'We review the details',
					'desc'     => 'A Slingshot team member looks over your message and routes it to the right person.',
				),
				array(
					'icon_svg' => '<svg viewBox="0 0 44 44" fill="none" aria-hidden="true"><rect width="44" height="44" rx="14" fill="#EAF8F8"/><path d="M14 28c2.4-4 5.1-6 8-6s5.6 2 8 6M18 17a4 4 0 1 0 8 0 4 4 0 0 0-8 0Z" stroke="#23B7B4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
					'title'    => 'We follow up',
					'desc'     => 'You will hear from us with next steps, answers, or a time to talk through your project.',
				),
				array(
					'icon_svg' => '<svg viewBox="0 0 44 44" fill="none" aria-hidden="true"><rect width="44" height="44" rx="14" fill="#F5F7FF"/><path d="M15 28l6-13 4 8 2-4 3 9H15Z" stroke="#4D86D9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
					'title'    => 'You keep moving',
					'desc'     => 'Explore our work and services while we get the right context together.',
				),
			),
			'ty_contact_heading' => 'Need something urgent?',
			'ty_contact_desc'    => 'You can reach us directly while your message is making its way through our team.',
			'ty_contact_phone'   => '502.254.6150',
			'ty_contact_email'   => 'hello@yslingshot.com',
		);
	}
}

define( 'SLINGSHOT_LP_FIGMA_THANK_YOU_OPTION_V1', 'slingshot_lp_figma_thank_you_v1' );

/**
 * Attach the live confirmation page to the admin-managed thank-you template.
 */
function slingshot_lp_maybe_seed_thank_you_page_v1() {
	if ( get_option( SLINGSHOT_LP_FIGMA_THANK_YOU_OPTION_V1 ) ) {
		return;
	}

	$page = get_page_by_path( 'thank-you', OBJECT, 'page' );
	if ( $page instanceof WP_Post ) {
		$page_id = (int) $page->ID;
		update_post_meta( $page_id, '_wp_page_template', 'page-thank-you-figma.php' );
		slingshot_lp_seed_missing_post_meta( $page_id, slingshot_lp_default_thank_you_meta() );
	}

	update_option( SLINGSHOT_LP_FIGMA_THANK_YOU_OPTION_V1, '1', true );
}
add_action( 'init', 'slingshot_lp_maybe_seed_thank_you_page_v1', 23 );

if ( ! function_exists( 'slingshot_lp_default_laix_meta' ) ) {
	function slingshot_lp_default_laix_meta() {
		return array(
			'evt_hero_label'    => 'EVENTS / LOUISVILLE',
			'evt_hero_heading'  => 'Louisville AI Exchange',
			'evt_hero_desc'     => 'Join our monthly meetups for real-world insights, shared learning, and community-driven AI conversations.',
			'evt_hero_btn_text' => 'Register for This Month',
			'evt_hero_btn_url'  => '#next-meetup',
			'evt_hero_img'      => '455176',

			'evt_what_heading' => 'Explore Real-World AI in Action',
			'evt_what_desc'    => "Louisville AI Exchange is a monthly gathering where the tech community comes together to talk about AI in practice. It is candid, practical, and built for people who want to learn what is working now.",
			'evt_what_cards'   => array(
				array(
					'icon_svg' => '<svg width="44" height="44" viewBox="0 0 44 44" fill="none"><rect width="44" height="44" rx="12" fill="#F2EEFF"/><path d="M15 22l4 4 10-10" stroke="#7A4FEB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
					'heading'  => 'Strategic AI',
					'desc'     => 'How executives and product leaders think about AI at the strategy and organizational level.',
				),
				array(
					'icon_svg' => '<svg width="44" height="44" viewBox="0 0 44 44" fill="none"><rect width="44" height="44" rx="12" fill="#EAF8F8"/><path d="M22 12v20M12 22h20" stroke="#23B7B4" stroke-width="2" stroke-linecap="round"/></svg>',
					'heading'  => 'AI at Scale',
					'desc'     => 'Real stories about moving AI beyond pilots and into production-minded workflows.',
				),
				array(
					'icon_svg' => '<svg width="44" height="44" viewBox="0 0 44 44" fill="none"><rect width="44" height="44" rx="12" fill="#F1F6FF"/><rect x="13" y="14" width="18" height="16" rx="4" stroke="#4D86D9" stroke-width="1.8"/><path d="M18 22h8M22 18v8" stroke="#4D86D9" stroke-width="1.5" stroke-linecap="round"/></svg>',
					'heading'  => 'AI in Practice',
					'desc'     => 'Practitioners share the useful, messy, and honest parts of building with AI.',
				),
			),

			'evt_next_label'        => 'NEXT MEETUP',
			'evt_next_btn_text'     => 'Register Now',
			'evt_next_btn_url'      => '/event/louisville-ai-exchange-techfest/',
			'evt_next_speaker_img'  => '455236',
			'evt_next_speaker_name' => 'Louisville AI Exchange',
			'evt_next_speaker_role' => 'Monthly AI meetup',

			'evt_topics_heading' => 'Past Topics',
			'evt_topics_items'   => array(
				array( 'image' => '455236', 'date' => 'April 2026', 'title' => 'AI Builders Session: Build and Learn, Together', 'desc' => 'A practical meetup for teams experimenting with real AI projects and sharing what they are learning.', 'url' => '#next-meetup' ),
				array( 'image' => '455177', 'date' => 'March 2026', 'title' => 'Finding Balance in the Power, Possibility, and Peril of AI', 'desc' => 'A community conversation about responsible AI adoption and the tradeoffs leaders should not ignore.', 'url' => '#next-meetup' ),
				array( 'image' => '455088', 'date' => 'February 2026', 'title' => 'AI in Product and Operations', 'desc' => 'Real-world examples from operators turning AI curiosity into useful workflow improvements.', 'url' => '#next-meetup' ),
				array( 'image' => '454983', 'date' => 'January 2026', 'title' => 'From Experiment to Execution', 'desc' => 'Lessons for teams moving beyond demos and into production-minded AI work.', 'url' => '#next-meetup' ),
			),

			'evt_partner_eyebrow'      => 'Get Involved',
			'evt_partner_heading'      => 'Partner With Us',
			'evt_partner_desc'         => "We are looking for businesses and organizations to join us in building Louisville's thriving tech ecosystem. Interested in sponsoring, speaking, or becoming a community partner? Let's connect.",
			'evt_partner_form_heading' => 'Get Involved',
			'evt_partner_gf_id'        => 0,
			'evt_partner_form_action_url' => '#',
			'evt_partner_first_placeholder' => 'First Name*',
			'evt_partner_last_placeholder'  => 'Last Name*',
			'evt_partner_email_placeholder' => 'Email*',
			'evt_partner_org_placeholder'   => 'Organization',
			'evt_partner_message_placeholder' => 'How would you like to get involved?',
			'evt_partner_submit_text' => 'Send Message',
			'evt_sponsor_label'       => 'Sponsored By',
			'evt_sponsor_logos'       => array(
				array( 'image' => '/wp-content/uploads/2020/02/logo-dark.svg', 'name' => 'Slingshot', 'url' => '/' ),
				array( 'image' => '4288', 'name' => 'University of Louisville', 'url' => 'https://louisville.edu/' ),
			),
		);
	}
}

define( 'SLINGSHOT_LP_FIGMA_LAIX_PAGE_OPTION_V1', 'slingshot_lp_figma_laix_page_v1' );

/**
 * Seed the live Louisville AI Exchange page into the dedicated event-series template.
 */
function slingshot_lp_maybe_seed_laix_page_v1() {
	if ( get_option( SLINGSHOT_LP_FIGMA_LAIX_PAGE_OPTION_V1 ) ) {
		return;
	}

	$page = get_page_by_path( 'louisville-ai-exchange', OBJECT, 'page' );
	if ( $page instanceof WP_Post ) {
		$page_id = (int) $page->ID;
		wp_update_post(
			array(
				'ID'         => $page_id,
				'post_title' => 'Louisville AI Exchange',
			)
		);
		update_post_meta( $page_id, '_wp_page_template', 'page-event-figma.php' );
		foreach ( slingshot_lp_default_laix_meta() as $key => $value ) {
			update_post_meta( $page_id, $key, $value );
		}
	}

	update_option( SLINGSHOT_LP_FIGMA_LAIX_PAGE_OPTION_V1, '1', true );
}
add_action( 'init', 'slingshot_lp_maybe_seed_laix_page_v1', 21 );

if ( ! function_exists( 'slingshot_lp_default_legal_content' ) ) {
	/**
	 * Default editor content for Figma legal pages.
	 *
	 * @return string
	 */
	function slingshot_lp_default_legal_content() {
		return <<<HTML
<h2>Legal Agreement</h2>
<p>We are Slingshot (&ldquo;Company,&rdquo; &ldquo;we,&rdquo; &ldquo;us,&rdquo; &ldquo;our&rdquo;), a company registered in Kentucky, United States at 700 N Hurstbourne Pkwy, #120, Louisville, KY 40222.</p>
<p>We operate the website <a href="https://www.yslingshot.com">https://www.yslingshot.com</a> (the &ldquo;Site&rdquo;), as well as any other related products and services that refer or link to these legal terms (the &ldquo;Legal Terms&rdquo;) (collectively, the &ldquo;Services&rdquo;).</p>
<p>Slingshot is a software and app development company specializing in taking your vision from idea to launch. Whether you&rsquo;re a small company or Fortune 50, our blend of strategy, design, and development allow us to deliver impactful, elegant, and built-to-last solutions.</p>
<p>You can contact us by phone at 502.254.6150, email at hello@yslingshot.com, or by mail to 700 N Hurstbourne Pkwy, #120, Louisville, KY 40222, United States.</p>
<p>These Legal Terms constitute a legally binding agreement made between you, whether personally or on behalf of an entity (&ldquo;you&rdquo;), and Slingshot, concerning your access to and use of the Services. You agree that by accessing the Services, you have read, understood, and agreed to be bound by all of these Legal Terms. IF YOU DO NOT AGREE WITH ALL OF THESE LEGAL TERMS, THEN YOU ARE EXPRESSLY PROHIBITED FROM USING THE SERVICES AND YOU MUST DISCONTINUE USE IMMEDIATELY.</p>
<p>Supplemental terms and conditions or documents that may be posted on the Services from time to time are hereby expressly incorporated herein by reference. We reserve the right, in our sole discretion, to make changes or modifications to these Legal Terms at any time and for any reason. We will alert you about any changes by updating the &ldquo;Last updated&rdquo; date of these Legal Terms, and you waive any right to receive specific notice of each such change. It is your responsibility to periodically review these Legal Terms to stay informed of updates. You will be subject to, and will be deemed to have been made aware of and to have accepted, the changes in any revised Legal Terms by your continued use of the Services after the date such revised Legal Terms are posted.</p>
<p>All users who are minors in the jurisdiction in which they reside (generally under the age of 18) must have the permission of, and be directly supervised by, their parent or guardian to use the Services. If you are a minor, you must have your parent or guardian read and agree to these Legal Terms prior to you using the Services.</p>
<p>We recommend that you print a copy of these Legal Terms for your records.</p>
<h2>Table of Contents</h2>
<ul>
<li><a href="#section-1">Section 1</a></li>
<li><a href="#section-2">Link 2</a></li>
<li><a href="#section-3">Link 3</a></li>
<li><a href="#section-4">Link 4</a></li>
<li><a href="#section-5">Link 5</a></li>
</ul>
<h2 id="section-1">Section 1</h2>
<p>These Legal Terms constitute a legally binding agreement made between you, whether personally or on behalf of an entity (&ldquo;you&rdquo;), and Slingshot, concerning your access to and use of the Services. You agree that by accessing the Services, you have read, understood, and agreed to be bound by all of these Legal Terms. IF YOU DO NOT AGREE WITH ALL OF THESE LEGAL TERMS, THEN YOU ARE EXPRESSLY PROHIBITED FROM USING THE SERVICES AND YOU MUST DISCONTINUE USE IMMEDIATELY.</p>
<p>Supplemental terms and conditions or documents that may be posted on the Services from time to time are hereby expressly incorporated herein by reference. We reserve the right, in our sole discretion, to make changes or modifications to these Legal Terms at any time and for any reason. We will alert you about any changes by updating the &ldquo;Last updated&rdquo; date of these Legal Terms, and you waive any right to receive specific notice of each such change. It is your responsibility to periodically review these Legal Terms to stay informed of updates. You will be subject to, and will be deemed to have been made aware of and to have accepted, the changes in any revised Legal Terms by your continued use of the Services after the date such revised Legal Terms are posted.</p>
<h2 id="section-2">Section 2</h2>
<p>These Legal Terms constitute a legally binding agreement made between you, whether personally or on behalf of an entity (&ldquo;you&rdquo;), and Slingshot, concerning your access to and use of the Services. You agree that by accessing the Services, you have read, understood, and agreed to be bound by all of these Legal Terms. IF YOU DO NOT AGREE WITH ALL OF THESE LEGAL TERMS, THEN YOU ARE EXPRESSLY PROHIBITED FROM USING THE SERVICES AND YOU MUST DISCONTINUE USE IMMEDIATELY.</p>
<p>Supplemental terms and conditions or documents that may be posted on the Services from time to time are hereby expressly incorporated herein by reference. We reserve the right, in our sole discretion, to make changes or modifications to these Legal Terms at any time and for any reason. We will alert you about any changes by updating the &ldquo;Last updated&rdquo; date of these Legal Terms, and you waive any right to receive specific notice of each such change. It is your responsibility to periodically review these Legal Terms to stay informed of updates. You will be subject to, and will be deemed to have been made aware of and to have accepted, the changes in any revised Legal Terms by your continued use of the Services after the date such revised Legal Terms are posted.</p>
<h2 id="section-3">Section 3</h2>
<ul>
<li>You believe AI is more than a buzzword &ndash; it&rsquo;s a catalyst for building better software</li>
<li>You like autonomy and want to be trusted for your judgment and skill</li>
<li>You like helping businesses reach new heights through technology</li>
<li>You thrive in a no-BS, high-integrity, fun-loving work culture</li>
<li>You want to work at a place where developers are respected, empowered, and constantly learning</li>
</ul>
<h2 id="section-4">Section 4</h2>
<ul>
<li>Generous PTO and Holiday time off including your birthday</li>
<li>401(k) with company match</li>
<li>Quarterly bonuses</li>
<li>Valentine&rsquo;s Day office fairy (it&rsquo;s a thing)</li>
<li>Flexible hours and remote-friendly culture</li>
<li>No dress code (except when needed for clients)</li>
<li>Greenfield project opportunities with a chance to leave your mark</li>
<li>Zero politics. Just solid people building great things.</li>
</ul>
<h2 id="section-5">Section 5</h2>
<p>Slingshot is a pretty awesome software development shop in Louisville, Kentucky. We&rsquo;re smart, passionate, creative, and modest ;). We&rsquo;ve been solving real-world problems with software since 2005, helping companies across industries go further, faster, and smarter. We value curiosity, craftsmanship, and collaboration &ndash; and we&rsquo;re not afraid to challenge the status quo.</p>
<p>Curious about this role? Apply for this job by sending your email to . Hope to hear from you soon!</p>
HTML;
	}
}

define( 'SLINGSHOT_LP_FIGMA_LEGAL_CONTENT_OPTION_V2', 'slingshot_lp_figma_legal_content_v2' );

/**
 * Seed legal Figma pages with editable content and header metadata.
 */
function slingshot_lp_maybe_seed_legal_pages_v2() {
	if ( get_option( SLINGSHOT_LP_FIGMA_LEGAL_CONTENT_OPTION_V2 ) ) {
		return;
	}

	$pages = array(
		'terms-and-conditions' => array(
			'title'          => 'Terms and Conditions',
			'replace_legacy' => false,
		),
		'terms'                => array(
			'title'          => 'Terms and Conditions',
			'replace_legacy' => true,
		),
		'privacy-policy'       => array(
			'title'          => 'Privacy Policy',
			'replace_legacy' => false,
		),
		'privacy'              => array(
			'title'          => 'Privacy Policy',
			'replace_legacy' => true,
		),
	);

	foreach ( $pages as $slug => $cfg ) {
		$title = $cfg['title'];
		$page = get_page_by_path( $slug, OBJECT, 'page' );

		if ( ! $page instanceof WP_Post ) {
			$page_id = wp_insert_post(
				array(
					'post_type'    => 'page',
					'post_status'  => 'publish',
					'post_title'   => $title,
					'post_name'    => $slug,
					'post_content' => slingshot_lp_default_legal_content(),
				),
				true
			);
			if ( is_wp_error( $page_id ) ) {
				continue;
			}
		} else {
			$page_id = (int) $page->ID;
			$is_legacy_builder_content = ! empty( $cfg['replace_legacy'] ) && false !== strpos( $page->post_content, '[vc_row' );
			if ( '' === trim( $page->post_content ) || $is_legacy_builder_content ) {
				wp_update_post(
					array(
						'ID'           => $page_id,
						'post_title'   => $title,
						'post_content' => slingshot_lp_default_legal_content(),
					)
				);
			}
		}

		update_post_meta( $page_id, '_wp_page_template', 'page-legal-figma.php' );
		update_post_meta( $page_id, 'leg_header_cta_text', "Let's talk" );
		update_post_meta( $page_id, 'leg_header_cta_url', '/contact/' );
		update_post_meta( $page_id, 'leg_title', $title );
		update_post_meta( $page_id, 'leg_last_updated', 'June 18, 2024' );
	}

	update_option( SLINGSHOT_LP_FIGMA_LEGAL_CONTENT_OPTION_V2, '1', true );
}
add_action( 'init', 'slingshot_lp_maybe_seed_legal_pages_v2', 18 );

define( 'SLINGSHOT_LP_FIGMA_WORK_CONTENT_OPTION_V2', 'slingshot_lp_figma_work_content_v2' );

/**
 * Seed the Work page aliases with editable Figma project data.
 */
function slingshot_lp_maybe_seed_work_page_v2() {
	if ( get_option( SLINGSHOT_LP_FIGMA_WORK_CONTENT_OPTION_V2 ) ) {
		return;
	}

	$meta = slingshot_lp_build_work_meta();
	foreach ( array( 'work', 'our-work' ) as $slug ) {
		$page = get_page_by_path( $slug, OBJECT, 'page' );
		if ( ! $page instanceof WP_Post ) {
			continue;
		}

		wp_update_post(
			array(
				'ID'         => (int) $page->ID,
				'post_title' => 'Work',
			)
		);
		update_post_meta( (int) $page->ID, '_wp_page_template', 'page-work-figma.php' );
		foreach ( $meta as $key => $value ) {
			update_post_meta( (int) $page->ID, $key, $value );
		}
	}

	update_option( SLINGSHOT_LP_FIGMA_WORK_CONTENT_OPTION_V2, '1', true );
}
add_action( 'init', 'slingshot_lp_maybe_seed_work_page_v2', 19 );

define( 'SLINGSHOT_LP_FIGMA_WORK_INTERNAL_OPTION_V1', 'slingshot_lp_figma_work_internal_v1' );

/**
 * Seed the first redesigned Work internal page into the existing portfolio item.
 */
function slingshot_lp_maybe_seed_work_internal_v1() {
	if ( get_option( SLINGSHOT_LP_FIGMA_WORK_INTERNAL_OPTION_V1 ) ) {
		return;
	}

	$post = get_page_by_path( 'connected-caregiver', OBJECT, 'portfolio' );
	if ( $post instanceof WP_Post ) {
		foreach ( slingshot_lp_build_work_internal_product_meta() as $key => $value ) {
			update_post_meta( (int) $post->ID, $key, $value );
		}
	}

	update_option( SLINGSHOT_LP_FIGMA_WORK_INTERNAL_OPTION_V1, '1', true );
}
add_action( 'init', 'slingshot_lp_maybe_seed_work_internal_v1', 20 );

define( 'SLINGSHOT_LP_FIGMA_WORK_INTERNAL_OPTION_V2', 'slingshot_lp_figma_work_internal_v2' );

/**
 * Align both Work internal rows: product case and consulting case.
 */
function slingshot_lp_maybe_seed_work_internal_v2() {
	if ( get_option( SLINGSHOT_LP_FIGMA_WORK_INTERNAL_OPTION_V2 ) ) {
		return;
	}

	$cases = array(
		'connected-caregiver' => 'slingshot_lp_build_work_internal_product_meta',
		'southeast'           => 'slingshot_lp_build_work_internal_meta',
	);

	foreach ( $cases as $slug => $builder ) {
		$post = get_page_by_path( $slug, OBJECT, 'portfolio' );
		if ( ! $post instanceof WP_Post || ! is_callable( $builder ) ) {
			continue;
		}

		foreach ( call_user_func( $builder ) as $key => $value ) {
			delete_post_meta( (int) $post->ID, $key );
			update_post_meta( (int) $post->ID, $key, $value );
		}
	}

	update_option( SLINGSHOT_LP_FIGMA_WORK_INTERNAL_OPTION_V2, '1', true );
}
add_action( 'init', 'slingshot_lp_maybe_seed_work_internal_v2', 21 );

define( 'SLINGSHOT_LP_FIGMA_WORK_CONTENT_OPTION_V3', 'slingshot_lp_figma_work_content_v3' );

/**
 * Replace early placeholder Work cards only when the page still has the duplicated seed.
 */
function slingshot_lp_maybe_seed_work_page_v3() {
	if ( get_option( SLINGSHOT_LP_FIGMA_WORK_CONTENT_OPTION_V3 ) ) {
		return;
	}

	$meta = slingshot_lp_build_work_meta();
	foreach ( array( 'work', 'our-work' ) as $slug ) {
		$page = get_page_by_path( $slug, OBJECT, 'page' );
		if ( ! $page instanceof WP_Post ) {
			continue;
		}

		$current_projects = get_post_meta( (int) $page->ID, 'wrk_projects', true );
		$should_update    = empty( $current_projects );

		if ( is_array( $current_projects ) && ! empty( $current_projects[0] ) ) {
			$first_title    = (string) ( $current_projects[0]['title'] ?? '' );
			$first_subtitle = (string) ( $current_projects[0]['subtitle'] ?? '' );
			$should_update  = ( 'Horizon Engage' === $first_title && false !== strpos( $first_subtitle, 'paperwork.gcc' ) );
		}

		if ( ! $should_update ) {
			continue;
		}

		wp_update_post(
			array(
				'ID'         => (int) $page->ID,
				'post_title' => 'Work',
			)
		);
		update_post_meta( (int) $page->ID, '_wp_page_template', 'page-work-figma.php' );
		foreach ( $meta as $key => $value ) {
			update_post_meta( (int) $page->ID, $key, $value );
		}
	}

	update_option( SLINGSHOT_LP_FIGMA_WORK_CONTENT_OPTION_V3, '1', true );
}
add_action( 'init', 'slingshot_lp_maybe_seed_work_page_v3', 22 );

if ( ! function_exists( 'slingshot_lp_default_modal_preview_meta' ) ) {
	/**
	 * Defaults for the three modal review pages from the spreadsheet.
	 *
	 * @param string $type Modal type.
	 * @return array<string, mixed>
	 */
	function slingshot_lp_default_modal_preview_meta( $type ) {
		$defaults = array(
			'subscribe' => array(
				'mp_type'        => 'subscribe',
				'mp_label'       => 'NEWSLETTER MODAL',
				'mp_heading'     => 'Subscribe',
				'mp_desc'        => 'A live, editable preview of the newsletter subscription modal.',
				'mp_button_text' => 'Open Subscribe Modal',
				'mp_auto_open'   => 1,
			),
			'contact'   => array(
				'mp_type'        => 'contact',
				'mp_label'       => 'CONTACT MODAL',
				'mp_heading'     => 'Contact Form',
				'mp_desc'        => 'A live, editable preview of the contact form modal.',
				'mp_button_text' => 'Open Contact Modal',
				'mp_auto_open'   => 1,
			),
			'video'     => array(
				'mp_type'            => 'video',
				'mp_label'           => 'VIDEO MODAL',
				'mp_heading'         => 'Video Player',
				'mp_desc'            => 'A live, editable preview of the video modal.',
				'mp_button_text'     => 'Open Video Modal',
				'mp_auto_open'       => 1,
				'sl_video_modal_url' => 'https://www.youtube.com/watch?v=eR21Z82VNqA',
			),
		);

		return isset( $defaults[ $type ] ) ? $defaults[ $type ] : $defaults['subscribe'];
	}
}

define( 'SLINGSHOT_LP_FIGMA_MODAL_PREVIEW_OPTION_V1', 'slingshot_lp_figma_modal_preview_v1' );

/**
 * Replace missing Figma-image fallback pages with live, admin-managed modal previews.
 */
function slingshot_lp_maybe_seed_modal_preview_pages_v1() {
	if ( get_option( SLINGSHOT_LP_FIGMA_MODAL_PREVIEW_OPTION_V1 ) ) {
		return;
	}

	$pages = array(
		'subscribe'          => array( 'title' => 'Subscribe', 'type' => 'subscribe' ),
		'contact-form-modal' => array( 'title' => 'Contact Form Modal', 'type' => 'contact' ),
		'video-modal'        => array( 'title' => 'Video Modal', 'type' => 'video' ),
	);

	foreach ( $pages as $slug => $cfg ) {
		$page = get_page_by_path( $slug, OBJECT, 'page' );
		if ( ! $page instanceof WP_Post ) {
			$page_id = wp_insert_post(
				array(
					'post_type'    => 'page',
					'post_status'  => 'publish',
					'post_title'   => $cfg['title'],
					'post_name'    => $slug,
					'post_content' => '',
				),
				true
			);
			if ( is_wp_error( $page_id ) ) {
				continue;
			}
		} else {
			$page_id = (int) $page->ID;
			wp_update_post(
				array(
					'ID'         => $page_id,
					'post_title' => $cfg['title'],
				)
			);
		}

		update_post_meta( $page_id, '_wp_page_template', 'page-modal-preview-figma.php' );
		slingshot_lp_seed_missing_post_meta( $page_id, slingshot_lp_default_modal_preview_meta( $cfg['type'] ) );
	}

	update_option( SLINGSHOT_LP_FIGMA_MODAL_PREVIEW_OPTION_V1, '1', true );
}
add_action( 'init', 'slingshot_lp_maybe_seed_modal_preview_pages_v1', 24 );
