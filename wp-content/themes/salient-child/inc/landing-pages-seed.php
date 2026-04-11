<?php
/**
 * One-time seed: writes landing page defaults into wp_options (Meta Box storage shape).
 * After seed, front-end and admin read values from the database.
 */

define( 'SLINGSHOT_LP_SEED_VERSION', 5 );
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

/**
 * @return array<string, mixed>
 */
function slingshot_lp_build_teams_option() {
	return [
		'teams_hero_bc_parent'        => 'SERVICES',
		'teams_hero_bc_leaf'          => 'TEAMS',
		'teams_hero_heading'          => 'On-Demand Teams & Tech Talent',
		'teams_hero_subtext'          => 'Senior engineers and product leaders embedded in your team—no ramp-up, just results. Choose the model that fits your need.',
		'teams_hero_cta_text'         => 'Book a call',
		'teams_hero_cta_url'          => '/contact/?looking=Teams',
		'teams_intro_heading'         => 'On-Demand Teams & Tech Talent, Built to Scale',
		'teams_intro_desc'            => 'Whether you need a fully dedicated squad or flexible talent to fill skill gaps, Slingshot provides senior engineers, designers, and product leaders who hit the ground running.',
		'teams_intro_tagline'         => 'Two Models, One Strategic Partner',
		'teams_model_ded_tag'         => 'Dedicated Teams',
		'teams_model_ded_heading'     => 'A full-stack team, built for your product',
		'teams_model_ded_desc'        => 'A dedicated, managed team that works exclusively on your product — engineers, a tech lead, and a PM, all aligned to your goals.',
		'teams_model_ded_cta_text'    => 'Learn more',
		'teams_model_ded_cta_url'     => '/teams/dedicated/',
		'teams_model_aug_tag'         => 'Staff Augmentation',
		'teams_model_aug_heading'     => 'Elite talent, integrated in days',
		'teams_model_aug_desc'        => 'Plug senior engineers and specialists directly into your existing team, scaling up or down as your roadmap evolves.',
		'teams_model_aug_cta_text'    => 'Learn more',
		'teams_model_aug_cta_url'     => '/teams/staff-augmentation/',
		'teams_map_heading'           => 'Where Our Teams Work',
		'teams_map_desc'              => 'Our talent network spans Latin America and Eastern Europe, giving you access to senior engineers in time zones that work with yours.',
		'teams_map_logos'             => [
			[ 'name' => 'Google', 'logo' => '' ],
			[ 'name' => 'HealthVise', 'logo' => '' ],
			[ 'name' => 'PicLife', 'logo' => '' ],
			[ 'name' => 'Schneider', 'logo' => '' ],
		],
		'teams_skills_heading'        => 'Strategic Skills & Capabilities',
		'teams_skills_desc'           => 'Our teams bring deep expertise across the full modern stack.',
		'teams_skills_categories'     => [
			[
				'category_name' => 'AI & Intelligent Systems',
				'skills'        => [
					[ 'skill_name' => 'LLM Integration' ],
					[ 'skill_name' => 'ML Engineering' ],
					[ 'skill_name' => 'RAG Pipelines' ],
					[ 'skill_name' => 'AI Agents' ],
				],
			],
			[
				'category_name' => 'Cloud Native Engineering',
				'skills'        => [
					[ 'skill_name' => 'AWS / GCP / Azure' ],
					[ 'skill_name' => 'Kubernetes' ],
					[ 'skill_name' => 'Terraform' ],
					[ 'skill_name' => 'Serverless' ],
				],
			],
			[
				'category_name' => 'Front End & Mobile',
				'skills'        => [
					[ 'skill_name' => 'React / Next.js' ],
					[ 'skill_name' => 'React Native' ],
					[ 'skill_name' => 'TypeScript' ],
					[ 'skill_name' => 'iOS / Android' ],
				],
			],
			[
				'category_name' => 'Back End & Integrations',
				'skills'        => [
					[ 'skill_name' => 'Node.js / Python' ],
					[ 'skill_name' => 'Go / Java' ],
					[ 'skill_name' => 'REST / GraphQL' ],
					[ 'skill_name' => 'Data Engineering' ],
				],
			],
			[
				'category_name' => 'Product & Experience',
				'skills'        => [
					[ 'skill_name' => 'Product Management' ],
					[ 'skill_name' => 'UX / UI Design' ],
					[ 'skill_name' => 'QA Engineering' ],
					[ 'skill_name' => 'DevOps' ],
				],
			],
		],
		'teams_clients_label'         => 'Teams & Staffing Client Insights',
		'teams_clients_logos'         => [
			[ 'name' => 'Google' ],
			[ 'name' => 'HealthVise' ],
			[ 'name' => 'PicLife' ],
			[ 'name' => 'Schneider' ],
		],
		'teams_blog_title'            => "Insights That Move\nBusiness Forward",
		'teams_blog_desc'             => 'Actionable thinking on building high-performing distributed teams, hiring, and scaling tech talent.',
		'teams_blog_cta_text'         => 'All Insights →',
		'teams_blog_cta_url'          => '/blog',
		'teams_blog_posts'            => 3,
		'teams_cta_title'             => 'Ready to Move Faster?',
		'teams_cta_desc'              => 'Whether you need a full team or a few key engineers, Slingshot will find, vet, and embed the right people—fast.',
		'teams_cta_btn_text'          => 'Start the Conversation →',
		'teams_cta_btn_url'           => '/contact/?looking=Teams',
	];
}

/**
 * @return array<string, mixed>
 */
function slingshot_lp_build_teams_dedicated_option() {
	return [
		'ded_hero_bc_parent'        => 'TEAMS',
		'ded_hero_bc_leaf'          => 'DEDICATED TEAMS',
		'ded_hero_heading'          => 'Dedicated Teams That Deliver',
		'ded_hero_subtext'          => 'A fully managed, embedded squad — engineers, a tech lead, and a PM — built around your product and working exclusively for you.',
		'ded_hero_cta_text'         => 'Build Your Team',
		'ded_hero_cta_url'          => '/contact/?looking=Dedicated+Teams',
		'ded_why_eyebrow'           => 'Why Us',
		'ded_why_heading'           => 'Why Companies Choose Slingshot Teams',
		'ded_why_desc'              => "Most outsourcing burns time and trust. We're different — you get a team that acts like it's yours, because it is.",
		'ded_why_cards'             => [
			[
				'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0z"/></svg>',
				'title'    => 'Smarter Hiring',
				'desc'     => 'We source and vet senior talent so you never compromise on quality or speed.',
			],
			[
				'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 0 0-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 0 1 5.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 0 1 9.288 0M15 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/></svg>',
				'title'    => 'Real Leadership',
				'desc'     => 'Every team includes a seasoned tech lead who owns delivery and keeps quality high.',
			],
			[
				'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M9 3H5a2 2 0 0 0-2 2v4m6-6h10a2 2 0 0 1 2 2v4M9 3v18m0 0h10a2 2 0 0 0 2-2V9M9 21H5a2 2 0 0 1-2-2V9m0 0h18"/></svg>',
				'title'    => 'Deep Skill Coverage',
				'desc'     => 'Full-stack teams spanning frontend, backend, cloud, and data engineering.',
			],
			[
				'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>',
				'title'    => 'Built-in Quality',
				'desc'     => 'QA is embedded from day one — no retrofitting, no quality debt.',
			],
		],
		'ded_get_heading'           => 'What You Get',
		'ded_get_desc'              => 'A cross-functional, dedicated squad that slots into your workflow and starts shipping in weeks, not months.',
		'ded_get_cta_text'          => 'Build Your Team',
		'ded_get_cta_url'           => '/contact/?looking=Dedicated+Teams',
		'ded_crosssell_tag'         => 'Staff Augmentation',
		'ded_crosssell_heading'     => 'Need individual contributors instead?',
		'ded_crosssell_desc'        => 'If you have an existing team and just need to fill specific skill gaps, our Staff Augmentation model lets you add senior talent in days.',
		'ded_crosssell_cta_text'    => 'Learn More →',
		'ded_crosssell_cta_url'     => '/teams/staff-augmentation/',
		'ded_test_heading'          => 'Client Testimonials',
		'ded_test_items'            => [
			[
				'name'  => 'Sarah Chen',
				'title' => 'CTO, HealthVise',
				'quote' => 'Slingshot gave us a team that felt like they had been working with us for years. The ramp-up was unbelievably fast and the quality was exceptional.',
			],
			[
				'name'  => 'Marcus Reyes',
				'title' => 'VP Engineering, Schneider Digital',
				'quote' => 'We went from requirements to a production-grade MVP in 14 weeks. The dedicated team model was exactly what we needed.',
			],
		],
		'ded_map_heading'           => 'Where Our Teams Work',
		'ded_map_logos'             => [
			[ 'name' => 'Google', 'logo' => '' ],
			[ 'name' => 'HealthVise', 'logo' => '' ],
			[ 'name' => 'PicLife', 'logo' => '' ],
			[ 'name' => 'Schneider', 'logo' => '' ],
		],
		'ded_skills_heading'        => 'Strategic Skills & Capabilities',
		'ded_skills_categories'     => [
			[
				'category_name' => 'AI & Intelligent Systems',
				'skills'        => [
					[ 'skill_name' => 'LLM Integration' ],
					[ 'skill_name' => 'ML Engineering' ],
					[ 'skill_name' => 'RAG Pipelines' ],
				],
			],
			[
				'category_name' => 'Cloud Native Engineering',
				'skills'        => [
					[ 'skill_name' => 'AWS / GCP / Azure' ],
					[ 'skill_name' => 'Kubernetes' ],
					[ 'skill_name' => 'Terraform' ],
				],
			],
			[
				'category_name' => 'Front End & Mobile',
				'skills'        => [
					[ 'skill_name' => 'React / Next.js' ],
					[ 'skill_name' => 'React Native' ],
					[ 'skill_name' => 'TypeScript' ],
				],
			],
			[
				'category_name' => 'Back End & Integrations',
				'skills'        => [
					[ 'skill_name' => 'Node.js / Python' ],
					[ 'skill_name' => 'Go / Java' ],
					[ 'skill_name' => 'Data Engineering' ],
				],
			],
			[
				'category_name' => 'Product & Experience',
				'skills'        => [
					[ 'skill_name' => 'Product Management' ],
					[ 'skill_name' => 'UX / UI Design' ],
					[ 'skill_name' => 'QA Engineering' ],
				],
			],
		],
		'ded_clients_label'         => 'Teams & Staffing Client Insights',
		'ded_clients_logos'         => [
			[ 'name' => 'Google' ],
			[ 'name' => 'HealthVise' ],
			[ 'name' => 'PicLife' ],
			[ 'name' => 'Schneider' ],
		],
		'ded_blog_title'            => "Insights That Move\nBusiness Forward",
		'ded_blog_desc'             => 'Actionable thinking on building high-performing distributed teams, hiring, and scaling tech talent.',
		'ded_blog_cta_text'         => 'All Insights →',
		'ded_blog_cta_url'          => '/blog',
		'ded_blog_posts'            => 3,
		'ded_cta_title'             => 'Ready to Build?',
		'ded_cta_desc'              => "Tell us what you're building and we'll put together the right team — fast.",
		'ded_cta_btn_text'          => 'Start the Conversation →',
		'ded_cta_btn_url'           => '/contact/?looking=Dedicated+Teams',
	];
}

/**
 * @return array<string, mixed>
 */
function slingshot_lp_build_teams_staffaug_option() {
	return [
		'staug_hero_bc_parent'    => 'TEAMS',
		'staug_hero_bc_leaf'      => 'STAFF AUGMENTATION',
		'staug_hero_heading'      => 'Scale Smarter with Global Talent',
		'staug_hero_subtext'      => 'Plug senior engineers and specialists into your team in days. No long recruitment cycles, no quality compromise.',
		'staug_hero_cta_text'     => 'Scale Your Team',
		'staug_hero_cta_url'      => '/contact/?looking=Staff+Aug',
		'staug_offer_heading'     => 'What We Offer',
		'staug_offer_cards'       => [
			[
				'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>',
				'title'    => 'Tech Expertise',
				'desc'     => 'Access senior engineers across frontend, backend, cloud, data, and AI — vetted for real-world delivery.',
			],
			[
				'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0 1 12 2.944a11.955 11.955 0 0 1-8.618 3.04A12.02 12.02 0 0 0 3 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>',
				'title'    => 'Hassle-Free Hiring',
				'desc'     => 'We handle sourcing, vetting, and onboarding so you skip straight to productive collaboration.',
			],
			[
				'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>',
				'title'    => 'Results That Scale',
				'desc'     => 'Flexible engagement — add or adjust team members as your priorities shift, with no lock-in.',
			],
		],
		'staug_why_heading'       => 'Why Slingshot Global Talent Delivers',
		'staug_why_desc'          => 'Our talent network spans Latin America and Eastern Europe — giving you time-zone-aligned, culturally compatible senior engineers who integrate seamlessly.',
		'staug_why_points'        => [
			[ 'title' => 'Pre-vetted senior talent', 'desc' => 'Every engineer goes through a rigorous multi-stage technical and cultural assessment.' ],
			[ 'title' => 'Time-zone aligned', 'desc' => 'LatAm and Eastern European talent that overlaps with US working hours.' ],
			[ 'title' => 'Dedicated success management', 'desc' => 'A Slingshot PM monitors performance and keeps your team accountable.' ],
			[ 'title' => 'Scale up or down instantly', 'desc' => 'Flexible contracts let you right-size as your roadmap evolves.' ],
		],
		'staug_roles_heading'     => 'Roles We Have Staffed',
		'staug_roles_view_all_text' => 'View All',
		'staug_roles_view_all_url'  => '/contact/?looking=Staff+Aug',
		'staug_roles_items'       => [
			[ 'name' => 'Maria G.', 'role' => 'Senior React Engineer', 'location' => 'Buenos Aires, AR' ],
			[ 'name' => 'Carlos M.', 'role' => 'Cloud Architect', 'location' => 'Bogotá, CO' ],
			[ 'name' => 'Anya K.', 'role' => 'ML Engineer', 'location' => 'Warsaw, PL' ],
			[ 'name' => 'Diego R.', 'role' => 'Full-Stack Engineer', 'location' => 'Medellín, CO' ],
			[ 'name' => 'Elena V.', 'role' => 'Product Manager', 'location' => 'Kyiv, UA' ],
			[ 'name' => 'Lucas B.', 'role' => 'iOS Engineer', 'location' => 'São Paulo, BR' ],
		],
		'staug_test_heading'      => 'Client Testimonials',
		'staug_test_items'        => [
			[
				'name'  => 'Jennifer Park',
				'title' => 'Director of Engineering, PicLife',
				'quote' => "We needed senior React engineers fast. Slingshot placed two in under two weeks — both were immediately productive. I can't recommend them enough.",
			],
			[
				'name'  => 'David Osei',
				'title' => 'CTO, FinBridge',
				'quote' => "The engineers Slingshot provided felt like employees from day one. They were opinionated, proactive, and genuinely cared about the product.",
			],
		],
		'staug_cta_title'         => 'Ready to Move Faster?',
		'staug_cta_desc'          => "Tell us the roles you need and we'll have qualified candidates in front of you within 48 hours.",
		'staug_cta_btn_text'      => 'Start the Conversation →',
		'staug_cta_btn_url'       => '/contact/?looking=Staff+Aug',
	];
}

/**
 * @return array<string, mixed>
 */
function slingshot_lp_build_teams_whitepaper_option() {
	return [
		'wp_hero_bc_parent'      => 'TEAMS',
		'wp_hero_bc_leaf'        => 'WHITEPAPER',
		'wp_hero_heading'        => 'A Complete Guide to Selecting An Offshoring Region',
		'wp_hero_subtext'        => 'Everything you need to know before choosing where to build your global team — from regional analysis to cultural fit.',
		'wp_hero_cta_text'       => 'Download Now',
		'wp_hero_cta_url'        => '#wp-download',
		'wp_sections_heading'    => 'What to Expect in This Whitepaper',
		'wp_sections_items'      => [
			[
				'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 0 1 2 2v1a2 2 0 0 0 2 2 2 2 0 0 1 2 2v2.945M8 3.935V5.5A2.5 2.5 0 0 0 10.5 8h.5a2 2 0 0 1 2 2 2 2 0 0 0 4 0 2 2 0 0 1 2-2h1.064M15 20.488V18a2 2 0 0 1 2-2h3.064M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0z"/></svg>',
				'title'    => 'Introduction to Offshoring',
				'desc'     => 'The strategic case for building teams in global markets, and what makes it work.',
			],
			[
				'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 0 1 3 16.382V5.618a1 1 0 0 1 1.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0 0 21 18.382V7.618a1 1 0 0 0-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>',
				'title'    => 'Regional Analysis',
				'desc'     => 'A deep dive into Latin America, Eastern Europe, and Southeast Asia — talent, cost, and culture.',
			],
			[
				'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M3 6l3 1m0 0-3 9a5.002 5.002 0 0 0 6.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1-3 9a5.002 5.002 0 0 0 6.001 0M18 7l3 9m-3-9-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/></svg>',
				'title'    => 'Pros and Cons',
				'desc'     => 'Honest tradeoffs across time zones, IP protection, communication, and total cost of ownership.',
			],
			[
				'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636-.707.707M21 12h-1M4 12H3m3.343-5.657-.707-.707m2.828 9.9a5 5 0 1 1 7.072 0l-.548.547A3.374 3.374 0 0 0 14 18.469V19a2 2 0 1 1-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>',
				'title'    => 'Expert Recommendations',
				'desc'     => 'Actionable frameworks for choosing the right region for your specific needs and team size.',
			],
		],
		'wp_dl_heading'          => 'Download The Whitepaper',
		'wp_dl_desc'             => 'Get instant access to our complete guide — no fluff, just the research and frameworks you need to make a confident offshoring decision.',
		'wp_dl_btn_text'         => 'Download Free Guide',
		'wp_dl_gravity_form_id'  => 0,
	];
}

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

	update_option( SLINGSHOT_OPT_CONSULTING, slingshot_lp_build_consulting_option(), false );
	update_option( SLINGSHOT_OPT_BOOTCAMP, slingshot_lp_build_bootcamp_option(), false );
	update_option( SLINGSHOT_OPT_AI, slingshot_lp_build_ai_option(), false );
	update_option( SLINGSHOT_OPT_TEAMS, slingshot_lp_build_teams_option(), false );
	update_option( SLINGSHOT_OPT_TEAMS_DEDICATED, slingshot_lp_build_teams_dedicated_option(), false );
	update_option( SLINGSHOT_OPT_TEAMS_STAFFAUG, slingshot_lp_build_teams_staffaug_option(), false );
	update_option( SLINGSHOT_OPT_TEAMS_WHITEPAPER, slingshot_lp_build_teams_whitepaper_option(), false );
	update_option( SLINGSHOT_LP_SEED_OPTION, SLINGSHOT_LP_SEED_VERSION, true );
}

add_action( 'init', 'slingshot_lp_maybe_seed_landing_options', 5 );
