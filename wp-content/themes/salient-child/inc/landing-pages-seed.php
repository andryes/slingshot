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
		'teams-staff-augmentation'    => 'page-teams-staffaug.php',
		'teams-offshoring-whitepaper' => 'page-teams-whitepaper.php',
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
		'op_job_title'    => 'Senior AI Developer',
		'op_job_tags'     => 'On-site, Louisville KY, Full-time',
		'op_bc_parent'    => 'Careers',
		'op_bc_parent_url'=> '/careers/',
		'op_sections'     => [
			[
				'section_type' => 'text',
				'title'        => 'About this Role',
				'body'         => "We're looking for a Senior AI Developer to join our growing engineering team. In this role, you'll work closely with our product and delivery teams to design, build, and deploy AI solutions that create real value for our clients.\n\nYou'll have the opportunity to work on a wide range of AI challenges — from building and fine-tuning language models to designing multi-agent systems and integrating AI into production applications.",
			],
			[
				'section_type' => 'list',
				'title'        => 'Your focus will include',
				'body'         => "Designing and building AI-powered features and services\nFine-tuning and deploying large language models\nBuilding multi-agent orchestration systems\nCollaborating with product and engineering teams on architecture decisions\nConducting code reviews and mentoring junior developers\nStaying current with the rapidly evolving AI/ML landscape",
			],
			[
				'section_type' => 'list',
				'title'        => "We're looking for someone who",
				'body'         => "Has 4+ years of software development experience, with at least 2 in AI/ML\nIs proficient in Python and has experience with LLM frameworks (LangChain, LlamaIndex, etc.)\nHas built and deployed production AI systems\nUnderstands prompt engineering, RAG patterns, and vector databases\nCommunicates clearly and thrives in a collaborative, fast-paced environment",
			],
			[
				'section_type' => 'list',
				'title'        => 'Why you want to work here',
				'body'         => "Meaningful work on real client products — not internal tooling\nA team that values craft, ownership, and honest feedback\nFlexible hybrid culture with great benefits\nOpportunity to grow fast in a company that's growing fast",
			],
			[
				'section_type' => 'list',
				'title'        => 'Some cool benefits',
				'body'         => "Unlimited PTO\nComprehensive health, dental & vision\nMatching 401(k)\nAnnual learning & development budget\nFlexible hybrid work",
			],
			[
				'section_type' => 'text',
				'title'        => 'Who is Slingshot?',
				'body'         => "Slingshot is a software and app development company based in Louisville, KY. We build digital products for ambitious companies across the US — from startups to Fortune 500s.\n\nWe believe great software comes from great teams. That means hiring people who care about their craft, giving them the autonomy to do great work, and building a culture where everyone can thrive.",
			],
		],
		'op_form_heading' => 'Hit us up',
		'op_form_subtext' => 'Think this could be a great fit? Tell us a bit about yourself.',
		'op_form_gf_id'   => 0,
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
			[ 'label' => 'Louisville', 'address_1' => '100 N Hurstbourne Pkwy #120', 'address_2' => '', 'city_state_zip' => 'Louisville, KY 40222' ],
			[ 'label' => 'Chicago',    'address_1' => '15 North Watson Ave #3108',   'address_2' => '', 'city_state_zip' => 'Chicago, IL 60602' ],
			[ 'label' => 'Nashville',  'address_1' => '6339 Charlottesville #701',   'address_2' => '', 'city_state_zip' => 'Nashville, TN 37205' ],
		],
		'cnt_form_heading'     => 'Hit us up',
		'cnt_form_gf_id'       => 0,
		'cnt_looking_options'  => "General Inquiry\nProduct Development\nMobile App Development\nWeb Development\nDesign\nAI / Machine Learning\nTeam Augmentation\nConsulting",
	];
}

/** @return array<string,mixed> */
function slingshot_lp_build_work_meta() {
	return [
		'wrk_hero_heading'     => 'Explore Our Work',
		'wrk_hero_eyebrow'     => '',
		'wrk_hero_desc'        => 'From mobile apps to enterprise platforms — real products built for ambitious clients.',
		'wrk_filter_tabs'      => "All\nMobile\nWeb\nDesign\nAI",
		'wrk_initial_visible'  => 9,
		'wrk_projects'         => [
			[ 'title' => 'Horizon Engage',  'subtitle' => '', 'tags' => 'Mobile', 'categories' => 'mobile', 'link_url' => '/work/horizon-engage/' ],
			[ 'title' => 'Horizon Engage',  'subtitle' => '', 'tags' => 'Web',    'categories' => 'web',    'link_url' => '/work/horizon-engage/' ],
			[ 'title' => 'Horizon Engage',  'subtitle' => '', 'tags' => 'Design', 'categories' => 'design', 'link_url' => '/work/horizon-engage/' ],
			[ 'title' => 'Horizon Engage',  'subtitle' => '', 'tags' => 'Mobile', 'categories' => 'mobile', 'link_url' => '/work/horizon-engage/' ],
			[ 'title' => 'Horizon Engage',  'subtitle' => '', 'tags' => 'Web',    'categories' => 'web',    'link_url' => '/work/horizon-engage/' ],
			[ 'title' => 'Horizon Engage',  'subtitle' => '', 'tags' => 'AI',     'categories' => 'ai',     'link_url' => '/work/horizon-engage/' ],
			[ 'title' => 'Horizon Engage',  'subtitle' => '', 'tags' => 'Mobile', 'categories' => 'mobile', 'link_url' => '/work/horizon-engage/' ],
			[ 'title' => 'Horizon Engage',  'subtitle' => '', 'tags' => 'Design', 'categories' => 'design', 'link_url' => '/work/horizon-engage/' ],
			[ 'title' => 'Horizon Engage',  'subtitle' => '', 'tags' => 'Web',    'categories' => 'web',    'link_url' => '/work/horizon-engage/' ],
		],
		'wrk_cta_heading'      => 'Ready to Launch Something Bold?',
		'wrk_cta_desc'         => "We partner with ambitious companies to design and build products people love. Let's talk.",
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

/**
 * Seed post meta for service + careers + open-position figma pages.
 */
function slingshot_lp_maybe_seed_figma_content() {
	if ( get_option( SLINGSHOT_LP_FIGMA_CONTENT_SEED_OPTION ) ) {
		return;
	}

	$pages = array(
		'product'       => 'slingshot_lp_build_service_product_meta',
		'web'           => 'slingshot_lp_build_service_web_meta',
		'design'        => 'slingshot_lp_build_service_design_meta',
		'mobile'        => 'slingshot_lp_build_service_mobile_meta',
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
