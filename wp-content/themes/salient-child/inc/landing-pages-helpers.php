<?php
/**
 * Landing pages (Consulting / Bootcamp / AI) — helpers for Meta Box settings.
 */

define( 'SLINGSHOT_OPT_CONSULTING', 'slingshot_consulting_page' );
define( 'SLINGSHOT_OPT_BOOTCAMP', 'slingshot_bootcamp_page' );
define( 'SLINGSHOT_OPT_AI', 'slingshot_ai_page' );

// Teams section pages
define( 'SLINGSHOT_OPT_TEAMS', 'slingshot_teams_page' );
define( 'SLINGSHOT_OPT_TEAMS_DEDICATED', 'slingshot_teams_dedicated_page' );
define( 'SLINGSHOT_OPT_TEAMS_STAFFAUG', 'slingshot_teams_staffaug_page' );
define( 'SLINGSHOT_OPT_TEAMS_WHITEPAPER', 'slingshot_teams_whitepaper_page' );

/**
 * @param string $option_name Settings option id.
 * @param string $field       Field id.
 * @param mixed  $default     Fallback.
 * @return mixed
 */
function slingshot_lp_setting( $option_name, $field, $default = '' ) {
	$bag = get_option( $option_name, null );
	if ( is_array( $bag ) && array_key_exists( $field, $bag ) ) {
		$val = $bag[ $field ];
		if ( $val !== '' && $val !== null && $val !== false ) {
			return $val;
		}
	}
	if ( function_exists( 'rwmb_meta' ) ) {
		$val = call_user_func( 'rwmb_meta', $field, [ 'object_type' => 'setting' ], $option_name );
		if ( $val !== '' && $val !== null && $val !== false ) {
			return $val;
		}
	}
	return $default;
}

/**
 * Attachment URL from single_image field.
 *
 * @param string $option_name Settings option id.
 * @param string $field       Field id.
 * @param string $default_url Fallback URL.
 * @param string $size        Image size.
 * @return string
 */
function slingshot_lp_image_url( $option_name, $field, $default_url, $size = 'large' ) {
	$id = slingshot_lp_setting( $option_name, $field, 0 );
	if ( ! $id ) {
		return $default_url;
	}
	$url = wp_get_attachment_image_url( (int) $id, $size );
	return $url ? $url : $default_url;
}

/**
 * @param mixed  $id          Attachment ID.
 * @param string $default_url Fallback.
 * @param string $size        Image size.
 * @return string
 */
function slingshot_lp_attachment_url( $id, $default_url = '', $size = 'large' ) {
	if ( ! $id ) {
		return $default_url;
	}
	$url = wp_get_attachment_image_url( (int) $id, $size );
	return $url ? $url : $default_url;
}

/**
 * Turn relative paths into full URLs for href.
 *
 * @param string $url Stored URL or path.
 * @return string
 */
function slingshot_lp_link_href( $url ) {
	$url = trim( (string) $url );
	if ( $url === '' ) {
		return '';
	}
	if ( '#' === $url[0] ) {
		return preg_match( '/^#[\w.-]+$/', $url ) ? $url : '#';
	}
	if ( '/' === $url[0] && ( strlen( $url ) === 1 || '/' !== $url[1] ) ) {
		return esc_url( home_url( $url ) );
	}
	return esc_url( $url );
}

/**
 * Safe href attribute from stored URL, path, or hash.
 *
 * @param string $url Stored value.
 * @return string
 */
function slingshot_lp_h_attr( $url ) {
	$h = slingshot_lp_link_href( $url );
	if ( $h === '' ) {
		return '';
	}
	if ( '#' === $h[0] ) {
		return esc_attr( $h );
	}
	return esc_url( $h );
}

/**
 * Get a post meta field value (Teams pages — post-meta-based).
 *
 * @param string $field   Field id.
 * @param mixed  $default Fallback.
 * @return mixed
 */
function slingshot_pm( $field, $default = '' ) {
	global $post;
	$post_id = isset( $post->ID ) ? $post->ID : get_the_ID();
	if ( function_exists( 'rwmb_meta' ) ) {
		$val = rwmb_meta( $field, [], $post_id );
		if ( $val !== '' && $val !== null && $val !== false && $val !== [] ) {
			return $val;
		}
	}
	$val = get_post_meta( $post_id, $field, true );
	if ( $val !== '' && $val !== null && $val !== false ) {
		return $val;
	}
	return $default;
}

/**
 * Get image URL from a post meta single_image field.
 *
 * @param string $field       Field id.
 * @param string $default_url Fallback URL.
 * @param string $size        Image size.
 * @return string
 */
function slingshot_pm_image( $field, $default_url = '', $size = 'large' ) {
	$id = slingshot_pm( $field, 0 );
	if ( ! $id ) {
		return $default_url;
	}
	$url = wp_get_attachment_image_url( (int) $id, $size );
	return $url ? $url : $default_url;
}

/**
 * @param string $text Multiline bullets.
 * @return string[] Non-empty lines.
 */
function slingshot_lp_bullet_lines( $text ) {
	$lines = explode( "\n", (string) $text );
	$out   = [];
	foreach ( $lines as $line ) {
		$t = trim( $line );
		if ( $t !== '' ) {
			$out[] = $t;
		}
	}
	return $out;
}

/**
 * @param mixed $arr Array from Meta Box group.
 * @return bool
 */
function slingshot_lp_nonempty_group( $arr ) {
	return is_array( $arr ) && count( array_filter( $arr, static function ( $v ) {
		return $v !== '' && $v !== null && $v !== false;
	} ) ) > 0;
}

/** @return array<int, array<string, string>> */
function slingshot_lp_default_consulting_help_services() {
	return [
		[
			'service_key'        => 'ai-adoption',
			'accordion_label'    => 'AI Adoption',
			'icon_svg'           => '<svg width="20" height="20" viewBox="0 0 20 20" fill="none"><rect width="20" height="20" rx="5" fill="#6D44B7" fill-opacity=".15"/><path d="M10 4v12M4 10h12" stroke="#6D44B7" stroke-width="1.8" stroke-linecap="round"/></svg>',
			'featured_tag'       => 'AI Adoption',
			'featured_text'      => 'We help your team identify where AI fits, evaluate tools, and deploy solutions that actually work — from early pilots to full-scale rollouts.',
			'featured_cta_text'  => 'Get Started',
			'featured_cta_url'   => '/contact/?looking=AI+Adoption',
			'detail_title'       => 'AI Adoption',
			'detail_intro'       => 'We help your team identify where AI fits, evaluate the right tools, and deploy solutions that actually drive business value — from early pilots to full-scale rollouts.',
			'detail_bullets'     => "AI opportunity mapping & prioritization\nTool selection & architecture design\nPilot development & iterative delivery\nTeam enablement & change management",
			'detail_cta_text'    => "Let's Talk AI",
			'detail_cta_url'     => '/contact/?looking=AI+Adoption',
		],
		[
			'service_key'        => 'digital-transformation',
			'accordion_label'    => 'Digital Transformation',
			'icon_svg'           => '<svg width="20" height="20" viewBox="0 0 20 20" fill="none"><rect width="20" height="20" rx="5" fill="#23B7B4" fill-opacity=".15"/><path d="M6 14l4-8 4 8" stroke="#23B7B4" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>',
			'featured_tag'       => 'Digital Transformation',
			'featured_text'      => 'We modernize your business operations and technology stack so you can move faster, reduce costs, and deliver better experiences.',
			'featured_cta_text'  => 'Get Started',
			'featured_cta_url'   => '/contact/?looking=Digital+Transformation',
			'detail_title'       => 'Digital Transformation',
			'detail_intro'       => 'We modernize your business operations and technology stack so you can move faster, reduce costs, and deliver better experiences for your customers and teams.',
			'detail_bullets'     => "Digital strategy & roadmap development\nProcess automation & workflow redesign\nCloud migration & infrastructure modernization\nIntegration of disparate systems",
			'detail_cta_text'    => 'Start the Conversation',
			'detail_cta_url'     => '/contact/?looking=Digital+Transformation',
		],
		[
			'service_key'        => 'legacy-modernization',
			'accordion_label'    => 'Legacy System Modernization',
			'icon_svg'           => '<svg width="20" height="20" viewBox="0 0 20 20" fill="none"><rect width="20" height="20" rx="5" fill="#6D44B7" fill-opacity=".15"/><circle cx="10" cy="10" r="5" stroke="#6D44B7" stroke-width="1.8"/></svg>',
			'featured_tag'       => 'Legacy Modernization',
			'featured_text'      => 'We help you migrate away from brittle legacy systems without disrupting operations.',
			'featured_cta_text'  => 'Get Started',
			'featured_cta_url'   => '/contact/?looking=Legacy+System+Modernization',
			'detail_title'       => 'Legacy System Modernization',
			'detail_intro'       => 'We help you migrate away from brittle, expensive legacy systems without disrupting your operations — bringing you the agility and reliability of modern platforms.',
			'detail_bullets'     => "Legacy audit & technical debt assessment\nPhased migration planning\nRe-architecture & rebuild strategies\nData migration & validation",
			'detail_cta_text'    => "Let's Modernize",
			'detail_cta_url'     => '/contact/?looking=Legacy+System+Modernization',
		],
		[
			'service_key'        => 'team-scaling',
			'accordion_label'    => 'Team Scaling',
			'icon_svg'           => '<svg width="20" height="20" viewBox="0 0 20 20" fill="none"><rect width="20" height="20" rx="5" fill="#23B7B4" fill-opacity=".15"/><path d="M4 16c0-3.314 2.686-6 6-6s6 2.686 6 6" stroke="#23B7B4" stroke-width="1.8" stroke-linecap="round"/><circle cx="10" cy="7" r="3" stroke="#23B7B4" stroke-width="1.8"/></svg>',
			'featured_tag'       => 'Team Scaling',
			'featured_text'      => 'When you need to move fast, we embed experienced engineers, designers, and product managers.',
			'featured_cta_text'  => 'Get Started',
			'featured_cta_url'   => '/contact/?looking=Team+Scaling',
			'detail_title'       => 'Team Scaling',
			'detail_intro'       => "When you need to move fast and your current team can't keep up, we embed experienced engineers, designers, and product managers to amplify your capacity.",
			'detail_bullets'     => "Staff augmentation with senior talent\nRapid team ramp-up\nEngineering leadership support\nCross-functional squad builds",
			'detail_cta_text'    => 'Grow Your Team',
			'detail_cta_url'     => '/contact/?looking=Team+Scaling',
		],
		[
			'service_key'        => 'new-product',
			'accordion_label'    => 'New Product Launches',
			'icon_svg'           => '<svg width="20" height="20" viewBox="0 0 20 20" fill="none"><rect width="20" height="20" rx="5" fill="#6D44B7" fill-opacity=".15"/><path d="M10 3l1.9 5.8H18l-5 3.6 1.9 5.8L10 15l-5 3.4 1.9-5.8L2 9h6.1z" stroke="#6D44B7" stroke-width="1.5" stroke-linejoin="round"/></svg>',
			'featured_tag'       => 'New Product Launches',
			'featured_text'      => 'We partner with founders and product leaders to take ideas from concept to market.',
			'featured_cta_text'  => 'Get Started',
			'featured_cta_url'   => '/contact/?looking=New+Product+Launch',
			'detail_title'       => 'New Product Launches',
			'detail_intro'       => 'We partner with founders and product leaders to take ideas from concept to market — with the strategy, design, and engineering to make it happen.',
			'detail_bullets'     => "Product discovery & market validation\nUX/UI design & prototyping\nMVP development & launch\nPost-launch iteration & growth",
			'detail_cta_text'    => 'Build Your Product',
			'detail_cta_url'     => '/contact/?looking=New+Product+Launch',
		],
		[
			'service_key'        => 'ux-optimization',
			'accordion_label'    => 'UX Optimization',
			'icon_svg'           => '<svg width="20" height="20" viewBox="0 0 20 20" fill="none"><rect width="20" height="20" rx="5" fill="#23B7B4" fill-opacity=".15"/><rect x="4" y="4" width="5" height="5" rx="1.5" stroke="#23B7B4" stroke-width="1.5"/><rect x="11" y="4" width="5" height="5" rx="1.5" stroke="#23B7B4" stroke-width="1.5"/><rect x="4" y="11" width="5" height="5" rx="1.5" stroke="#23B7B4" stroke-width="1.5"/><rect x="11" y="11" width="5" height="5" rx="1.5" stroke="#23B7B4" stroke-width="1.5"/></svg>',
			'featured_tag'       => 'UX Optimization',
			'featured_text'      => 'We audit, redesign, and improve user experiences to reduce churn and increase engagement.',
			'featured_cta_text'  => 'Get Started',
			'featured_cta_url'   => '/contact/?looking=UX+Optimization',
			'detail_title'       => 'UX Optimization',
			'detail_intro'       => 'We audit, redesign, and improve user experiences to reduce churn, increase engagement, and make your product a joy to use.',
			'detail_bullets'     => "UX audits & heuristic reviews\nUser research & journey mapping\nInterface redesign & design systems\nUsability testing & iteration",
			'detail_cta_text'    => 'Improve Your UX',
			'detail_cta_url'     => '/contact/?looking=UX+Optimization',
		],
	];
}

/**
 * @return array<int, array<string, mixed>>
 */
function slingshot_lp_consulting_help_services() {
	$raw = slingshot_pm( 'con_help_services' );
	if ( is_array( $raw ) && $raw ) {
		$clean = [];
		foreach ( $raw as $row ) {
			if ( is_array( $row ) && ! empty( $row['service_key'] ) && ! empty( $row['accordion_label'] ) ) {
				$clean[] = $row;
			}
		}
		if ( $clean ) {
			return $clean;
		}
	}
	return slingshot_lp_default_consulting_help_services();
}

/** @return array<int, array<string, mixed>> */
function slingshot_lp_default_bootcamp_curriculum() {
	return [
		[
			'tab_id'       => 'foundations',
			'tab_label'    => 'AI Foundations',
			'badge'        => '2 Days · On-site or Remote',
			'title'        => 'AI Foundations',
			'intro'        => 'The starting point for any team new to AI. Learn the core concepts, tools, and thinking frameworks needed to work confidently in an AI-enabled world.',
			'bullets'      => "How large language models work (no PhD required)\nPrompt engineering & AI communication patterns\nEvaluating AI tools for your business context\nEthics, bias, and responsible AI use\nHands-on exercises with real AI platforms",
			'cta_text'     => 'Book This Track',
			'cta_url'      => '/contact/?looking=AI+Bootcamp+Foundations',
			'panel_layout' => 'modules',
			'custom_text'  => '',
			'custom_btn'   => '',
			'custom_url'   => '',
			'modules'      => [
				[ 'day' => 'Day 1', 'name' => 'Understanding AI & LLMs' ],
				[ 'day' => 'Day 1', 'name' => 'Prompt Engineering Workshop' ],
				[ 'day' => 'Day 2', 'name' => 'Tool Evaluation & Selection' ],
				[ 'day' => 'Day 2', 'name' => 'Build Your First AI Workflow' ],
				[ 'day' => 'Capstone', 'name' => 'Team Prototype Presentation' ],
			],
		],
		[
			'tab_id'       => 'product',
			'tab_label'    => 'AI for Product Teams',
			'badge'        => '3 Days · On-site or Remote',
			'title'        => 'AI for Product Teams',
			'intro'        => 'Built for PMs, designers, and business leads who need to identify where AI creates value and how to spec AI-powered features their engineering teams can build.',
			'bullets'      => "AI opportunity mapping for your product\nWriting AI feature specs and user stories\nDesigning AI-augmented user experiences\nMeasuring AI feature success\nWorking with engineering on AI integration",
			'cta_text'     => 'Book This Track',
			'cta_url'      => '/contact/?looking=AI+Bootcamp+Product',
			'panel_layout' => 'modules',
			'modules'      => [
				[ 'day' => 'Day 1', 'name' => 'AI Product Strategy' ],
				[ 'day' => 'Day 1', 'name' => 'Opportunity Discovery Workshop' ],
				[ 'day' => 'Day 2', 'name' => 'UX & Design for AI' ],
				[ 'day' => 'Day 2', 'name' => 'Feature Spec Writing Lab' ],
				[ 'day' => 'Day 3', 'name' => 'Prototype & Roadmap Presentation' ],
			],
		],
		[
			'tab_id'       => 'engineering',
			'tab_label'    => 'AI Engineering',
			'badge'        => '3 Days · On-site or Remote',
			'title'        => 'AI Engineering',
			'intro'        => 'For software engineers ready to build with AI — from integrating LLM APIs to building agents, RAG pipelines, and production-grade AI features.',
			'bullets'      => "LLM API integration (OpenAI, Claude, Gemini)\nRAG: retrieval-augmented generation patterns\nBuilding and orchestrating AI agents\nEvaluating and testing AI outputs\nProduction deployment and cost management",
			'cta_text'     => 'Book This Track',
			'cta_url'      => '/contact/?looking=AI+Bootcamp+Engineering',
			'panel_layout' => 'modules',
			'modules'      => [
				[ 'day' => 'Day 1', 'name' => 'LLM APIs & Prompt Engineering' ],
				[ 'day' => 'Day 1', 'name' => 'RAG Architecture Deep Dive' ],
				[ 'day' => 'Day 2', 'name' => 'Agent Design & Orchestration' ],
				[ 'day' => 'Day 2', 'name' => 'Evals, Testing & Guardrails' ],
				[ 'day' => 'Day 3', 'name' => 'Ship an AI Feature End-to-End' ],
			],
		],
		[
			'tab_id'       => 'custom',
			'tab_label'    => 'Custom Program',
			'badge'        => 'Custom Duration & Format',
			'title'        => 'Custom Program',
			'intro'        => "Have a specific challenge or use case in mind? We'll design a bootcamp program around your team's exact context — your industry, your stack, your goals.",
			'bullets'      => "Discovery call to understand your team's needs\nTailored curriculum and exercises\nPre-built around your actual data and systems\nFlexible format: on-site, remote, or hybrid\nOngoing follow-up coaching available",
			'cta_text'     => 'Talk to Us',
			'cta_url'      => '/contact/?looking=AI+Bootcamp+Custom',
			'panel_layout' => 'custom',
			'custom_text'  => 'Every industry is different. Every team is different. Let\'s build something that actually fits.',
			'custom_btn'   => 'Schedule a Discovery Call &rarr;',
			'custom_url'   => '/contact/?looking=AI+Bootcamp+Custom',
			'modules'      => [],
		],
	];
}

/**
 * @return array<int, array<string, mixed>>
 */
function slingshot_lp_bootcamp_curriculum() {
	$raw = slingshot_pm( 'boot_curriculum_tabs' );
	if ( is_array( $raw ) && $raw ) {
		$clean = [];
		foreach ( $raw as $row ) {
			if ( is_array( $row ) && ! empty( $row['tab_id'] ) && ! empty( $row['tab_label'] ) ) {
				$clean[] = $row;
			}
		}
		if ( $clean ) {
			return $clean;
		}
	}
	return slingshot_lp_default_bootcamp_curriculum();
}

/** @return array<int, array<string, string>> */
function slingshot_lp_default_bootcamp_hero_cards() {
	return [
		[
			'title'    => 'Led by AI Practitioners',
			'subtitle' => 'Real projects, real experience',
			'icon_svg' => '<svg width="28" height="28" viewBox="0 0 28 28" fill="none"><circle cx="14" cy="14" r="14" fill="rgba(255,255,255,0.12)"/><path d="M9 14l3.5 3.5L19 10" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
		],
		[
			'title'    => 'Leave with Results',
			'subtitle' => 'Working prototypes from day one',
			'icon_svg' => '<svg width="28" height="28" viewBox="0 0 28 28" fill="none"><circle cx="14" cy="14" r="14" fill="rgba(255,255,255,0.12)"/><path d="M8 18V12l6-4 6 4v6" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><rect x="11" y="14" width="6" height="4" rx="1" stroke="#fff" stroke-width="2"/></svg>',
		],
		[
			'title'    => 'Cross-functional Impact',
			'subtitle' => 'Built for whole teams, not just devs',
			'icon_svg' => '<svg width="28" height="28" viewBox="0 0 28 28" fill="none"><circle cx="14" cy="14" r="14" fill="rgba(255,255,255,0.12)"/><circle cx="10" cy="11" r="3" stroke="#fff" stroke-width="2"/><circle cx="18" cy="11" r="3" stroke="#fff" stroke-width="2"/><path d="M5 20c0-2.761 2.239-5 5-5h8c2.761 0 5 2.239 5 5" stroke="#fff" stroke-width="2" stroke-linecap="round"/></svg>',
		],
	];
}

/**
 * @param array<int, array<string, mixed>> $raw
 * @param callable $is_valid_row
 * @return array<int, array<string, mixed>>
 */
function slingshot_lp_filter_group( $raw, $is_valid_row ) {
	if ( ! is_array( $raw ) || ! $raw ) {
		return [];
	}
	$clean = [];
	foreach ( $raw as $row ) {
		if ( is_array( $row ) && $is_valid_row( $row ) ) {
			$clean[] = $row;
		}
	}
	return $clean;
}

/** @return array<int, array<string, string>> */
function slingshot_lp_bootcamp_hero_cards() {
	$raw = slingshot_pm( 'boot_hero_cards' );
	$clean = slingshot_lp_filter_group(
		$raw,
		static function ( $row ) {
			return ! empty( $row['title'] );
		}
	);
	return $clean ? $clean : slingshot_lp_default_bootcamp_hero_cards();
}

/** @return array<int, array<string, string>> */
function slingshot_lp_default_bootcamp_why_cards() {
	return [
		[
			'title'    => 'Led by AI Practitioners',
			'text'     => "Our instructors aren't academics — they're engineers and product leads who've shipped AI in production. Every lesson draws from real-world experience.",
			'icon_svg' => '<svg width="36" height="36" viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="10" fill="#6D44B7" fill-opacity=".12"/><path d="M12 24V18l6-4 6 4v6" stroke="#6D44B7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><rect x="15" y="18" width="6" height="6" rx="1" stroke="#6D44B7" stroke-width="2"/><circle cx="18" cy="12" r="2" stroke="#6D44B7" stroke-width="2"/></svg>',
			'style'    => 'default',
			'badge'    => '',
		],
		[
			'title'    => 'Leave with Results',
			'text'     => "Participants don't just learn concepts — they build working AI prototypes during the program, so your team leaves with something tangible on day one.",
			'icon_svg' => '<svg width="36" height="36" viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="10" fill="#23B7B4" fill-opacity=".12"/><path d="M10 26l4-8 4 4 4-10 4 8" stroke="#23B7B4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
			'style'    => 'featured',
			'badge'    => 'Most Popular',
		],
		[
			'title'    => 'Cross-functional Impact',
			'text'     => 'Designed for mixed teams — engineers, PMs, designers, and business leads — so AI adoption becomes an organization-wide capability, not just a dev skill.',
			'icon_svg' => '<svg width="36" height="36" viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="10" fill="#6D44B7" fill-opacity=".12"/><circle cx="14" cy="14" r="4" stroke="#6D44B7" stroke-width="2"/><circle cx="22" cy="14" r="4" stroke="#6D44B7" stroke-width="2"/><path d="M8 28c0-3.314 2.686-6 6-6h8c3.314 0 6 2.686 6 6" stroke="#6D44B7" stroke-width="2" stroke-linecap="round"/></svg>',
			'style'    => 'default',
			'badge'    => '',
		],
	];
}

/** @return array<int, array<string, string>> */
function slingshot_lp_bootcamp_why_cards() {
	$raw   = slingshot_pm( 'boot_why_cards' );
	$clean = slingshot_lp_filter_group(
		$raw,
		static function ( $row ) {
			return ! empty( $row['title'] );
		}
	);
	return $clean ? $clean : slingshot_lp_default_bootcamp_why_cards();
}

/** @return array<int, array<string, string>> */
function slingshot_lp_default_bootcamp_stats() {
	return [
		[ 'number' => '500+', 'label' => 'Professionals trained' ],
		[ 'number' => '40+', 'label' => 'Enterprise clients' ],
		[ 'number' => '15+', 'label' => 'Industries served' ],
		[ 'number' => '92%', 'label' => 'Satisfaction rate' ],
	];
}

/** @return array<int, array<string, string>> */
function slingshot_lp_bootcamp_stats() {
	$raw   = slingshot_pm( 'boot_stats_items' );
	$clean = slingshot_lp_filter_group(
		$raw,
		static function ( $row ) {
			return ! empty( $row['number'] ) && ! empty( $row['label'] );
		}
	);
	return $clean ? $clean : slingshot_lp_default_bootcamp_stats();
}

/** @return array<int, array<string, string>> */
function slingshot_lp_default_bootcamp_how() {
	return [
		[ 'num' => '01', 'title' => 'Assess', 'text' => "We start with a discovery call to understand your team's current AI knowledge, your tech environment, and the outcomes you're aiming for." ],
		[ 'num' => '02', 'title' => 'Design', 'text' => "We tailor the curriculum, exercises, and real-world scenarios to match your team's role and business context — nothing generic." ],
		[ 'num' => '03', 'title' => 'Learn & Build', 'text' => 'Hands-on sessions where your team learns concepts and immediately applies them — building real AI tools and workflows throughout.' ],
		[ 'num' => '04', 'title' => 'Embed', 'text' => 'Participants leave with working prototypes, playbooks, and optionally access to Slingshot coaches for ongoing support as they implement.' ],
	];
}

/** @return array<int, array<string, string>> */
function slingshot_lp_bootcamp_how_steps() {
	$raw   = slingshot_pm( 'boot_how_steps' );
	$clean = slingshot_lp_filter_group(
		$raw,
		static function ( $row ) {
			return ! empty( $row['title'] );
		}
	);
	return $clean ? $clean : slingshot_lp_default_bootcamp_how();
}

/** @return array<int, array<string, string>> */
function slingshot_lp_default_bootcamp_events() {
	return [
		[
			'image'          => '',
			'image_bg_css'   => 'linear-gradient(135deg,#1B1060,#6D44B7)',
			'tag'            => 'AI Foundations',
			'title'          => 'AI Foundations Bootcamp — Public Cohort',
			'date_location'  => 'May 14–15, 2025 · Online',
			'url'            => '#',
			'register_label' => 'Register →',
		],
		[
			'image'          => '',
			'image_bg_css'   => 'linear-gradient(135deg,#0d6e6b,#23B7B4)',
			'tag'            => 'AI Engineering',
			'title'          => 'AI Engineering Bootcamp — Louisville, KY',
			'date_location'  => 'June 4–6, 2025 · Louisville, KY',
			'url'            => '#',
			'register_label' => 'Register →',
		],
		[
			'image'          => '',
			'image_bg_css'   => 'linear-gradient(135deg,#2A1878,#4B23B0)',
			'tag'            => 'Custom',
			'title'          => 'Private Bootcamp — Bring It to Your Team',
			'date_location'  => 'Flexible dates · On-site or Remote',
			'url'            => '#',
			'register_label' => 'Contact Us →',
		],
	];
}

/** @return array<int, array<string, string>> */
function slingshot_lp_bootcamp_events_cards() {
	$raw   = slingshot_pm( 'boot_events_cards' );
	$clean = slingshot_lp_filter_group(
		$raw,
		static function ( $row ) {
			return ! empty( $row['title'] );
		}
	);
	return $clean ? $clean : slingshot_lp_default_bootcamp_events();
}

/** @return array<int, array<string, string>> */
function slingshot_lp_default_bootcamp_clients() {
	$names = [ 'Churchill Downs', 'Schneider Electric', 'MetLife', 'Univ. of Louisville', 'HealthRev', 'Paysign', 'ProjectTeam', 'Zoeller', 'Equibase', 'Connected Caregiver' ];
	$out   = [];
	foreach ( $names as $n ) {
		$out[] = [ 'name' => $n ];
	}
	return $out;
}

/** @return array<int, array<string, string>> */
function slingshot_lp_bootcamp_clients() {
	$raw   = slingshot_pm( 'boot_clients_logos' );
	$clean = slingshot_lp_filter_group(
		$raw,
		static function ( $row ) {
			return ! empty( $row['name'] );
		}
	);
	return $clean ? $clean : slingshot_lp_default_bootcamp_clients();
}

/** @return array<int, array<string, string>> */
function slingshot_lp_default_consulting_stats() {
	return [
		[ 'number' => '15+', 'label' => 'Industry focus' ],
		[ 'number' => '250+', 'label' => 'Projects launched' ],
		[ 'number' => '20+', 'label' => 'Team members' ],
		[ 'number' => '40+', 'label' => 'Clients served' ],
	];
}

/** @return array<int, array<string, string>> */
function slingshot_lp_consulting_stats() {
	$raw   = slingshot_pm( 'con_stats_items' );
	$clean = slingshot_lp_filter_group(
		$raw,
		static function ( $row ) {
			return ! empty( $row['number'] ) && ! empty( $row['label'] );
		}
	);
	return $clean ? $clean : slingshot_lp_default_consulting_stats();
}

/** @return array<int, array<string, string>> */
function slingshot_lp_default_consulting_events() {
	return [
		[
			'image'          => '',
			'image_bg_css'   => '',
			'tag'            => 'Conference',
			'title'          => 'Louisville IA Exchange and TechFest',
			'date_location'  => 'October 21, 2025 · Louisville, KY',
			'url'            => '#',
			'register_label' => 'Register →',
		],
		[
			'image'          => '',
			'image_bg_css'   => '',
			'tag'            => 'Conference',
			'title'          => 'Louisville IA Exchange and TechFest',
			'date_location'  => 'October 21, 2025 · Louisville, KY',
			'url'            => '#',
			'register_label' => 'Register →',
		],
		[
			'image'          => '',
			'image_bg_css'   => 'linear-gradient(135deg,#2A1878,#4B23B0)',
			'tag'            => 'Workshop',
			'title'          => 'AI Product Development Bootcamp',
			'date_location'  => 'November 14, 2025 · Online',
			'url'            => '#',
			'register_label' => 'Register →',
		],
	];
}

/** @return array<int, array<string, string>> */
function slingshot_lp_consulting_events_cards() {
	$raw   = slingshot_pm( 'con_events_cards' );
	$clean = slingshot_lp_filter_group(
		$raw,
		static function ( $row ) {
			return ! empty( $row['title'] );
		}
	);
	return $clean ? $clean : slingshot_lp_default_consulting_events();
}

/** @return array<int, array<string, string>> */
function slingshot_lp_default_consulting_clients() {
	$names = [ 'Connected Caregiver', 'Churchill Downs', 'HealthRev', 'Paysign', 'ProjectTeam', 'Schneider Electric', 'Zoeller', 'Univ. of Louisville', 'MetLife', 'Equibase' ];
	$out   = [];
	foreach ( $names as $n ) {
		$out[] = [ 'name' => $n ];
	}
	return $out;
}

/** @return array<int, array<string, string>> */
function slingshot_lp_consulting_clients() {
	$raw   = slingshot_pm( 'con_clients_logos' );
	$clean = slingshot_lp_filter_group(
		$raw,
		static function ( $row ) {
			return ! empty( $row['name'] );
		}
	);
	return $clean ? $clean : slingshot_lp_default_consulting_clients();
}

/** @return array<int, array<string, mixed>> */
function slingshot_lp_default_ai_steps() {
	return [
		[
			'title'            => 'AI Discovery Discussion',
			'price'            => 'Free',
			'duration'         => '60 minutes',
			'intro'            => "For leaders and teams exploring where AI fits in. You're curious about AI but unsure where to start; this session brings clarity without commitment.",
			'bullets'          => "1:1 session with Slingshot AI experts\nReview of your tools, teams, and goals\nBrainstorming of real-world use cases\nLive Q&A with actionable next steps",
			'show_price_row'   => 1,
		],
		[
			'title'            => 'AI Opportunity Assessment',
			'price'            => '$ 5.000',
			'duration'         => '1 week',
			'intro'            => 'For organizations with AI ideas needing focus, prioritization, and a clear plan. You\'ll quickly move from "ideas" to concrete, high-impact plans ready for execution — accelerating your AI initiatives with confidence.',
			'bullets'          => "Executive & team alignment\nAI opportunity mapping (ops, product, CX)\nRisk & feasibility assessment\nPrioritized use case shortlist\nConcrete Build/Buy/Integrate recommendations, ready for execution",
			'show_price_row'   => 1,
		],
		[
			'title'            => 'AI Rapid Prototyping',
			'price'            => '$ 25.000',
			'duration'         => '1-2 weeks',
			'intro'            => 'For teams with AI concepts who need quick validation and stakeholder buy-in. De-risk big investments by testing concepts quickly — get a functional prototype in weeks to refine direction and accelerate decision-making.',
			'bullets'          => "Ideation & use case framing workshop\nPOC architecture with high-level AI and data flow\nClickable interface of core user flows\nPolished prototype to spark buy-in and speed decisions\nBuild plan with strategic recs: build, buy, or pivot",
			'show_price_row'   => 1,
		],
		[
			'title'            => 'Full AI Implementation',
			'price'            => '',
			'duration'         => '',
			'intro'            => 'Organizations ready to implement AI tools, features, or workflows that drive measurable business value. We help design, build, and deploy AI solutions while enabling your team for long-term success.',
			'bullets'          => "Deep-dive technical discovery\nModel and tooling selection\nUX & integration planning\nBuild & deployment of early-stage pilots",
			'show_price_row'   => 0,
		],
	];
}

/** @return array<int, array<string, mixed>> */
function slingshot_lp_ai_steps() {
	$raw   = slingshot_pm( 'ai_steps' );
	$clean = slingshot_lp_filter_group(
		$raw,
		static function ( $row ) {
			return ! empty( $row['title'] );
		}
	);
	return $clean ? $clean : slingshot_lp_default_ai_steps();
}

/** @return array<int, array<string, string>> */
function slingshot_lp_default_ai_capabilities() {
	return [
		[ 'title' => "Operational Efficiency\n& Automation", 'desc' => 'Cut manual work, reduce costs, and free your team for high-impact tasks' ],
		[ 'title' => 'Intelligent Document Processing', 'desc' => 'Extract and process data from PDFs, forms, and images automatically.' ],
		[ 'title' => "Language, Search\n& Understanding", 'desc' => 'Bridge gaps across communication, systems, and user needs.' ],
		[ 'title' => 'Process Intelligence', 'desc' => 'Detect inefficiencies with AI-driven pattern recognition and reporting.' ],
		[ 'title' => 'Automated Workflows', 'desc' => 'Trigger real-time actions based on live system inputs, no humans needed.' ],
		[ 'title' => 'Sentiment & Intent Analysis', 'desc' => 'Know what users mean, not just what they say' ],
	];
}

/** @return array<int, array<string, mixed>> */
function slingshot_lp_ai_capabilities() {
	$raw   = slingshot_pm( 'ai_capabilities' );
	$clean = slingshot_lp_filter_group(
		$raw,
		static function ( $row ) {
			return ! empty( $row['title'] );
		}
	);
	return $clean ? $clean : slingshot_lp_default_ai_capabilities();
}

/** @return array<int, array<string, string>> */
function slingshot_lp_default_ai_faq() {
	$u = home_url( '/' );
	return [
		[
			'question' => 'How do I get started with AI?',
			'answer'   => '<p>The right starting point depends on your team\'s clarity and urgency.</p><p>If you\'re exploring where AI fits in your organization, our free 60-minute <a href="\' . esc_url( $u ) . \'contact/?looking=Artificial+Intelligence&ai-service=AI+Discovery+Discussion">AI Discovery Discussion</a> is the fastest way to uncover possibilities and get expert guidance, with no commitment. We\'ll review your tools, goals, and brainstorm practical use cases.</p><p>If you already have ideas but need focus and prioritization, the <a href="\' . esc_url( $u ) . \'contact/?looking=Artificial+Intelligence&ai-service=AI+Opportunity+Assessment">AI Opportunity Assessment</a> turns concepts into an actionable strategy in just one week. You\'ll walk away with executive alignment, a prioritized shortlist of use cases, and clear recommendations to move forward.</p><p>If you\'re ready to bring a specific AI idea to life, our <a href="\' . esc_url( $u ) . \'contact/?looking=Artificial+Intelligence&ai-service=AI+Rapid+Prototyping">AI Rapid Prototyping</a> service transforms your idea into a tangible prototype in just 1 to 2 weeks. We frame the concept, shape the user experience, and deliver an interactive prototype that fosters buy-in and builds momentum quickly.</p>',
		],
		[
			'question' => 'How do I know if AI will work for my business?',
			'answer'   => '<p>You don\'t need perfect data to start. In many cases, valid results can come from documents, PDFs, or existing records using retrieval-based methods or lightweight models.</p><p>We can help assess where AI can move the needle and where it won\'t. If there\'s no fit, we\'ll say so directly.</p>',
		],
		[
			'question' => 'How do I know if my data is "good enough"?',
			'answer'   => '<p>AI works when the problem is clear, the data is usable, and the value is real. It\'s not about checking a tech box but identifying opportunities where automation, prediction, or insight can drive results.</p><p>It\'s essential to start by assessing what you have and flagging gaps. Then you can determine if your data is ready to support your desired outcomes. We can make that part of the roadmap if cleanup or enrichment is needed.</p>',
		],
		[
			'question' => 'How does Slingshot handle data security in AI projects?',
			'answer'   => '<p>Security is at the core of every AI project we deliver. We know that using AI means entrusting tools with sensitive data, and not all tools treat that data equally. That is why we help you navigate the privacy landscape from day one.</p><p>When evaluating AI solutions, we look closely at how each tool stores and processes your data, what information (if any) is shared or retained, and how it aligns with your privacy and compliance requirements. We provide clear, expert recommendations on which tools meet your standards, giving you full transparency and control over how your data is managed at every step.</p>',
		],
		[
			'question' => 'How do I know if my organization is ready for AI?',
			'answer'   => '<p>AI readiness depends on leadership alignment, access to usable data and a clear problem to solve. We can help assess your organization and provide a structured view of your current state. You\'ll get clarity on what\'s viable now, what needs to change, and how to move forward. If you\'re not ready, we\'ll tell you and outline how you can get there.</p>',
		],
		[
			'question' => 'How do I best leverage AI in my organization if I don\'t have a specific idea yet?',
			'answer'   => '<p>Start with a conversation. Our <a href="\' . esc_url( $u ) . \'contact/?looking=Artificial+Intelligence&ai-service=AI+Discovery+Discussion">AI Discovery Discussion</a> is designed for leaders who are curious about AI but unsure where it fits. In just 60 minutes, we\'ll explore your goals, tools, and team structure to identify real opportunities.</p><p>If you\'re looking to go deeper, the <a href="\' . esc_url( $u ) . \'contact/?looking=Artificial+Intelligence&ai-service=AI+Opportunity+Assessment">AI Opportunity Assessment</a> helps turn early ideas into a clear, prioritized roadmap tailored to your organization. Both offerings are built to bring clarity and momentum, even if you\'re starting from zero.</p>',
		],
		[
			'question' => 'How can I quickly validate an AI idea before making a larger investment?',
			'answer'   => '<p>If you\'re ready to move beyond theory and see your idea in action, our <a href="\' . esc_url( $u ) . \'contact/?looking=Artificial+Intelligence&ai-service=AI+Rapid+Prototyping">AI Rapid Prototyping</a> service helps turn concepts into something tangible, fast. In just 1 to 2 weeks, we\'ll help frame your idea, shape a user experience, and deliver a wokring prototype that shows what the solution could be.</p><p>You\'ll walk away with a functional, interactive model that brings the concept to life and helps you communicate it clearly to stakeholders. Whether you\'re building buy-in or making key decisions, it\'s the fastest way to go from vision to momentum.</p>',
		],
		[
			'question' => 'What if I\'m ready to fully implement an AI solution in my business?',
			'answer'   => '<p>If you\'re ready to move from strategy to execution, our <a href="\' . esc_url( $u ) . \'contact/?looking=Artificial+Intelligence&ai-service=Full+AI+Implementation">Full AI Implementation</a> offering is built to take your AI vision all the way to launch. We help you design, build, and deploy real solutions that deliver measurable business impact. This could include automating workflows, enhancing customer experience, or embedding AI into your product.</p><p>Beyond just building, we help you make the right foundational decisions. We recommend tools and models based on your specific needs, and we guide you through critical decisions like build versus buy versus integrate. From technical architecture to user experience, we cover every angle to ensure a successful launch.</p>',
		],
	];
}

/** @return array<int, array<string, string>> */
function slingshot_lp_ai_faq_items() {
	$raw   = slingshot_pm( 'ai_faq_items' );
	$clean = slingshot_lp_filter_group(
		$raw,
		static function ( $row ) {
			return ! empty( $row['question'] );
		}
	);
	return $clean ? $clean : slingshot_lp_default_ai_faq();
}

