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
