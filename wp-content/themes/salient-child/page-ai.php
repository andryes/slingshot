<?php
/*
Template Name: Artificial Intelligence
 * Content: WordPress post editor.
 */

wp_enqueue_style(
	'ai-jakarta',
	'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap',
	array(),
	null
);
wp_enqueue_style( 'ai-style', get_stylesheet_directory_uri() . '/css/updated.css', array(), '1.1' );
wp_enqueue_style( 'home-style', get_stylesheet_directory_uri() . '/css/home.css', array(), '1.21' );
wp_enqueue_style( 'ai-page-style', get_stylesheet_directory_uri() . '/css/ai.css', array( 'ai-style', 'home-style' ), '1.2' );
wp_enqueue_script( 'ai-script', get_stylesheet_directory_uri() . '/js/updated.js', array( 'jquery' ), '1.2', true );
wp_enqueue_script( 'hp-script', get_stylesheet_directory_uri() . '/js/home.js', array( 'jquery' ), '1.7', true );

get_header();

$img_dir      = get_stylesheet_directory_uri() . '/img';
$contact_url  = slingshot_lp_h_attr( slingshot_pm( 'ai_hero_cta_url', '/contact/' ) );
$cta_mascot   = slingshot_pm_image( 'ai_cta_mascot', $img_dir . '/ai-cta-mascot.png' );
$impact_image = slingshot_pm_image( 'ai_impact_image', $img_dir . '/ai-impact.png' );
$clean_ai_cta_label = static function ( $value, $fallback ) {
	$value = trim( html_entity_decode( (string) $value, ENT_QUOTES, 'UTF-8' ) );
	$value = preg_replace( '/\s*(?:→|›|&rarr;|&#8594;|\?)+\s*$/u', '', $value );
	return $value !== '' ? $value : $fallback;
};
$ai_image_from_field = static function ( $value, $fallback = '' ) {
	if ( is_numeric( $value ) ) {
		return slingshot_lp_attachment_url( (int) $value, $fallback );
	}
	$value = trim( (string) $value );
	return $value !== '' ? $value : $fallback;
};
if ( ! $impact_image || $impact_image === $img_dir . '/ai-impact.png' ) {
	$impact_image = content_url( 'uploads/2025/06/4-Ways-to-Jumpstart-Real-AI-Product-Development_Featured-Image-LN-1000x500.png' );
}

$hero_subtext = slingshot_pm( 'ai_hero_subtext', 'Slingshot helps forward-thinking teams adopt AI that drives real business impact from strategy and use cases to prototypes and deployed solutions.' );
if ( false !== strpos( $hero_subtext, 'drives real business impact — from strategy' ) ) {
	$hero_subtext = 'Slingshot helps forward-thinking teams adopt AI that drives real business impact from strategy and use cases to prototypes and deployed solutions.';
}

$impact_heading = slingshot_pm( 'ai_impact_heading', "AI adoption shouldn't\nfeel risky or abstract." );
if ( false !== strpos( $impact_heading, 'Where AI makes' ) ) {
	$impact_heading = "AI adoption shouldn't\nfeel risky or abstract.";
}

$impact_text = slingshot_pm( 'ai_impact_text', 'Slingshot partners with innovation leaders to move from curiosity to clarity, and from pilot to production with real use cases, expert advice, and working software.' );
if ( false !== strpos( $impact_text, 'Harness the power of artificial intelligence' ) ) {
	$impact_text = 'Slingshot partners with innovation leaders to move from curiosity to clarity, and from pilot to production with real use cases, expert advice, and working software.';
}

$ai_faq_title = slingshot_pm( 'ai_faq_title', "Still wondering\nif AI is right for you?" );
if ( false !== strpos( $ai_faq_title, 'wonderingif' ) ) {
	$ai_faq_title = "Still wondering\nif AI is right for you?";
}

$ai_cta_title = slingshot_pm( 'ai_cta_title', "Start Smart. Move Fast.\nBuild What Matters" );
if ( false !== strpos( $ai_cta_title, 'Fast.Build' ) ) {
	$ai_cta_title = str_replace( 'Fast.Build', "Fast.\nBuild", $ai_cta_title );
}

$ai_cta_btn_text  = $clean_ai_cta_label( slingshot_pm( 'ai_cta_btn_text', 'Book a Free AI Discussion' ), 'Book a Free AI Discussion' );
$ai_blog_cta_text = $clean_ai_cta_label( slingshot_pm( 'ai_blog_cta_text', 'All Insights' ), 'All Insights' );

$ai_steps = array(
	array(
		'title'    => 'Discovery Discussion',
		'best'     => 'Teams starting to explore how AI fits',
		'why'      => 'Get focused insight on where AI delivers impact in your workflows, products, or processes.',
		'bullets'  => "60-minute 1:1 strategy session\nReview of your systems and data\nBrainstormed opportunities with expert input\nClarity on next steps, with no commitment",
	),
	array(
		'title'    => 'AI Opportunity Assessment',
		'best'     => 'Teams with AI ideas who need clarity, focus, and a clear path forward',
		'why'      => 'Cut through the noise and identify the AI opportunities that actually move the needle so you can invest with confidence and momentum.',
		'bullets'  => "Executive and team alignment on AI goals and constraints\nMapped and prioritized AI opportunities across ops, product, and CX\nRisk, data readiness, and feasibility assessment\nClear build / buy / integrate recommendations ready for execution",
		'price'    => '$5,000',
		'duration' => '1 Week',
	),
	array(
		'title'    => 'AI Bootcamps: Hands-On AI Training in a Day',
		'best'     => 'Product, marketing, business, and technical teams ready to apply AI in real-world work',
		'why'      => 'Move from AI curiosity to real capability. Our immersive, one-day bootcamps give your team the skills, frameworks, and confidence to design, build, and deploy AI solutions without relying on outside vendors.',
		'bullets'  => "Hands-on training with modern AI tools, LLMs, and custom GPTs\nEnd-to-end chatbot, RAG, and AI agent development\nAI-assisted prototypes, landing pages, and internal tools\nReusable workflows and architecture patterns your team can apply immediately",
	),
	array(
		'title'    => 'Rapid Prototyping',
		'best'     => 'Innovation teams needing proof, fast',
		'why'      => 'Turn ideas into polished, clickable prototypes to de-risk investment and accelerate buy-in.',
		'bullets'  => "Functional prototype showing core AI interaction\nArchitecture recommendations\nUser flow interface and interaction mockups\nBuild strategy based on results",
		'price'    => '$25,000',
		'duration' => '1-2 Weeks',
	),
	array(
		'title'    => 'Full AI Implementation',
		'best'     => 'Companies ready to deploy AI features, tools, or assistants',
		'why'      => 'Move beyond planning and into real production - faster.',
		'bullets'  => "Technical discovery and integration planning\nModel/tooling selection aligned to your ecosystem\nAI-powered workflow or feature deployment\nTraining and support for long-term success",
	),
);
$ai_default_steps = $ai_steps;

$ai_caps = array(
	array( 'title' => "Operational Efficiency\n& Automation", 'desc' => 'Reduce manual work, lower costs, and speed up operations' ),
	array( 'title' => 'Intelligent Document Processing', 'desc' => "No theory, no fluff. You'll leave with working prototypes and skills." ),
	array( 'title' => 'Automated Workflows', 'desc' => 'Trigger system actions in real-time without human input' ),
	array( 'title' => "Language\n& Search Intelligence", 'desc' => 'Not just trainers, your instructors are hands-on AI experts.' ),
	array( 'title' => 'Process Intelligence', 'desc' => 'Uncover inefficiencies using AI-driven pattern recognition' ),
	array( 'title' => "Sentiment\n& Intent Analysis", 'desc' => 'Understand what customers really need, not just what they say' ),
);
$ai_default_caps = $ai_caps;

$ai_experiences = array(
	array(
		'title' => 'The Louisville AI Exchange',
		'desc'  => "A monthly meetup for real-world AI. Open mics, expert talks, and Louisville's AI conversation - no pitches, just ideas and connection.",
		'image' => $img_dir . '/ai-experience-louisville.png',
		'url'   => '/louisville-ai-exchange/',
	),
	array(
		'title' => 'Slingshot AI Bootcamps',
		'desc'  => 'Two immersive one-day bootcamps turning AI curiosity into capability. Build chatbots or AI products and leave with real prototypes and practical skills for teams ready to do.',
		'image' => $img_dir . '/ai-experience-bootcamps.png',
		'url'   => '/ai-bootcamp/',
	),
);
$ai_default_experiences = $ai_experiences;

$ai_work_cards = array(
	array(
		'title' => 'Horizon Engage',
		'desc'  => 'Developed a mobile app that simplifies insurance, enabling easy claims and reducing paperwork',
		'image' => $img_dir . '/ai-work-horizon.png',
		'tags'  => array( 'AI', 'Product', 'Mobile' ),
		'url'   => '/work/',
	),
	array(
		'title' => 'Southeast Christian Church',
		'desc'  => 'Developed a mobile app that simplifies insurance, enabling easy claims and reducing paperwork.',
		'image' => $img_dir . '/ai-work-southeast.png',
		'tags'  => array( 'AI', 'Product', 'Mobile' ),
		'url'   => '/work/',
	),
	array(
		'title' => 'Connected Caregiver',
		'desc'  => 'Developed a mobile app that simplifies insurance, enabling easy claims and reducing paperwork.',
		'image' => $img_dir . '/ai-work-caregiver.png',
		'tags'  => array( 'AI', 'Product', 'Mobile' ),
		'url'   => '/work/',
	),
	array(
		'title' => 'Southwest Airlines',
		'desc'  => 'Designed operational tools that make complex work easier for distributed teams.',
		'image' => $img_dir . '/ai-work-southeast.png',
		'tags'  => array( 'AI', 'Product', 'Web' ),
		'url'   => '/work/',
	),
);
$ai_default_work_cards = $ai_work_cards;

$ai_insights = array(
	array(
		'title' => '"AI is enterprise-ready and simplifies development"',
		'desc'  => 'David Galownia (CEO & President of Slingshot)',
		'image' => $img_dir . '/ai-insight-david.png',
		'tags'  => array( 'AI', 'Product', 'Mobile' ),
		'url'   => '/blog/',
		'video' => false,
	),
	array(
		'title' => 'How AI has rewired the hackathon',
		'desc'  => 'Developed a mobile app that simplifies insurance, enabling easy claims and reducing paperwork.',
		'image' => $img_dir . '/ai-insight-hackathon.png',
		'tags'  => array( 'AI', 'Product', 'Mobile' ),
		'url'   => '/blog/',
	),
	array(
		'title' => '4 Ways to jumpstart real AI product development',
		'desc'  => 'Developed a mobile app that simplifies insurance, enabling easy claims and reducing paperwork.',
		'image' => $img_dir . '/ai-insight-product.png',
		'tags'  => array( 'AI', 'Product', 'Mobile' ),
		'url'   => '/blog/',
	),
	array(
		'title' => 'How AI has rewired the hackathon',
		'desc'  => 'Developed a mobile app that simplifies insurance, enabling easy claims and reducing paperwork.',
		'image' => $img_dir . '/ai-work-southeast.png',
		'tags'  => array( 'AI', 'Product', 'Mobile' ),
		'url'   => '/blog/',
	),
);

$ai_default_insights = $ai_insights;

$ai_step_rows = slingshot_lp_filter_group(
	slingshot_pm( 'ai_steps' ),
	static function ( $row ) {
		return ! empty( $row['title'] );
	}
);
if ( $ai_step_rows && count( $ai_step_rows ) >= 5 && ! empty( $ai_step_rows[0]['best'] ) ) {
	$ai_steps = array_map(
		static function ( $row ) {
			return array(
				'step_badge_img' => $row['step_badge_img'] ?? 0,
				'title'          => $row['title'] ?? '',
				'best'           => $row['best'] ?? '',
				'why'            => $row['why'] ?? ( $row['intro'] ?? '' ),
				'bullets'        => $row['bullets'] ?? '',
				'price'          => $row['price'] ?? '',
				'duration'       => $row['duration'] ?? '',
				'show_price_row' => $row['show_price_row'] ?? 1,
			);
		},
		$ai_step_rows
	);
}

$ai_cap_rows = slingshot_lp_filter_group(
	slingshot_pm( 'ai_capabilities' ),
	static function ( $row ) {
		return ! empty( $row['title'] );
	}
);
if ( $ai_cap_rows && count( $ai_cap_rows ) >= 6 ) {
	$ai_caps = $ai_cap_rows;
}

$ai_experience_rows = slingshot_lp_filter_group(
	slingshot_pm( 'ai_experiences' ),
	static function ( $row ) {
		return ! empty( $row['title'] );
	}
);
if ( $ai_experience_rows ) {
	$ai_experiences = $ai_experience_rows;
}
foreach ( $ai_experiences as $idx => &$experience ) {
	$experience['image'] = $ai_image_from_field( $experience['image'] ?? '', $ai_default_experiences[ $idx ]['image'] ?? '' );
	$experience['url']   = $experience['url'] ?? ( $ai_default_experiences[ $idx ]['url'] ?? '#' );
	$experience['desc']  = $experience['desc'] ?? '';
}
unset( $experience );

$ai_work_rows = slingshot_lp_filter_group(
	slingshot_pm( 'ai_work_cards' ),
	static function ( $row ) {
		return ! empty( $row['title'] );
	}
);
if ( $ai_work_rows ) {
	$ai_work_cards = $ai_work_rows;
}
foreach ( $ai_work_cards as $idx => &$card ) {
	$card['image'] = $ai_image_from_field( $card['image'] ?? '', $ai_default_work_cards[ $idx ]['image'] ?? '' );
	$card['url']   = $card['url'] ?? ( $ai_default_work_cards[ $idx ]['url'] ?? '#' );
	$card['desc']  = $card['desc'] ?? '';
	$card['tags']  = is_array( $card['tags'] ?? null ) ? $card['tags'] : slingshot_lp_bullet_lines( str_replace( ',', "\n", (string) ( $card['tags'] ?? '' ) ) );
}
unset( $card );

$ai_insight_rows = slingshot_lp_filter_group(
	slingshot_pm( 'ai_insight_cards' ),
	static function ( $row ) {
		return ! empty( $row['title'] );
	}
);
if ( $ai_insight_rows ) {
	$ai_insights = $ai_insight_rows;
}
foreach ( $ai_insights as $idx => &$card ) {
	$card['image'] = $ai_image_from_field( $card['image'] ?? '', $ai_default_insights[ $idx ]['image'] ?? '' );
	$card['url']   = $card['url'] ?? ( $ai_default_insights[ $idx ]['url'] ?? '#' );
	$card['desc']  = $card['desc'] ?? '';
	$card['tags']  = is_array( $card['tags'] ?? null ) ? $card['tags'] : slingshot_lp_bullet_lines( str_replace( ',', "\n", (string) ( $card['tags'] ?? '' ) ) );
	$card['video'] = ! empty( $card['video'] );
}
unset( $card );

$ai_tool_logos = slingshot_lp_filter_group(
	slingshot_pm( 'ai_tools_logos' ),
	static function ( $row ) {
		return ! empty( $row['image'] );
	}
);
if ( ! $ai_tool_logos ) {
	$ai_tool_names = array( 'Copilot', 'OpenAI', 'Azure AI', 'Claude', 'Amazon Bedrock', 'LangChain', 'Model Context Protocol', 'Windsurf', 'GPT Builder', 'Gemini', 'Perplexity' );
	$ai_tool_logos = array();
	foreach ( range( 1, 11 ) as $tool_idx ) {
		$ai_tool_logos[] = array(
			'image' => $img_dir . '/tools-' . $tool_idx . '.png',
			'alt'   => $ai_tool_names[ $tool_idx - 1 ] ?? 'AI platform logo',
		);
	}
} else {
	foreach ( $ai_tool_logos as &$logo ) {
		$logo['image'] = $ai_image_from_field( $logo['image'] ?? '', '' );
		$logo['alt']   = $logo['alt'] ?? 'AI platform logo';
	}
	unset( $logo );
}
?>

<style id="dynamic-css-inline-css" type="text/css">
	body{overflow:visible}.no-rgba #header-space{display:none;}@media only screen and (max-width:999px){body #header-space[data-header-mobile-fixed="1"]{display:none;}#header-outer[data-mobile-fixed="false"]{position:absolute;}}@media only screen and (min-width:1000px){#header-space{display:none;}.nectar-slider-wrap.first-section,.parallax_slider_outer.first-section,.full-width-content.first-section{margin-top:0!important;}body #page-header-bg,body #page-header-wrap{height:142px;}body #search-outer{z-index:100000;}}
	body.page-template-page-ai #header-outer,
	body.page-template-page-ai #header-space { display:none !important; }
</style>
<?php
slingshot_render_redesign_header(
	array(
		'variant' => 'light',
		'cta_url' => $contact_url,
	)
);
?>
<div class="bg-color-stripe"></div>
<div id="ajax-content-wrap" class="ai-page-wrap">

	<section class="ai-hero-section">
		<div class="ai-hero-inner">
			<div class="ai-hero-content">
				<div class="ai-hero-breadcrumb">
					<span><?php echo esc_html( slingshot_pm( 'ai_hero_bc_parent', 'SERVICES' ) ); ?></span>
					<span class="ai-hero-breadcrumb-sep">/</span>
					<span><?php echo esc_html( slingshot_pm( 'ai_hero_bc_leaf', 'AI' ) ); ?></span>
				</div>
				<h1 class="ai-hero-heading"><?php echo esc_html( slingshot_pm( 'ai_hero_heading', 'AI is Reshaping Business. Be the One Who Leads.' ) ); ?></h1>
				<p class="ai-hero-subtext"><?php echo esc_html( $hero_subtext ); ?></p>
				<a href="<?php echo $contact_url; ?>" class="ai-pill-btn ai-hero-cta-btn"><?php echo esc_html( slingshot_pm( 'ai_hero_cta_text', 'Book a call' ) ); ?> <span>&rarr;</span></a>
			</div>

			<div class="ai-hero-photos-wrap">
				<div class="ai-hero-photo ai-hero-photo-left">
					<img src="<?php echo esc_url( slingshot_pm_image( 'ai_hero_img_left', $img_dir . '/ai-hero-left.png' ) ); ?>" alt="<?php echo esc_attr( slingshot_pm( 'ai_hero_img_left_alt', 'Slingshot team collaborating on AI' ) ); ?>"/>
				</div>
				<div class="ai-hero-photo ai-hero-photo-right">
					<img src="<?php echo esc_url( slingshot_pm_image( 'ai_hero_img_right', $img_dir . '/ai-hero-right.png' ) ); ?>" alt="<?php echo esc_attr( slingshot_pm( 'ai_hero_img_right_alt', 'Slingshot engineer working on AI solution' ) ); ?>"/>
				</div>
			</div>
		</div>
	</section>

	<section class="hero-block ai-steps-section" id="ai-services">
		<div class="hero-block-step ai-steps-inner">
			<div class="main-block-step">
				<img src="<?php echo esc_url( $impact_image ); ?>" alt="<?php echo esc_attr( slingshot_pm( 'ai_impact_image_alt', '' ) ); ?>"/>
				<div class="main-block-step-content">
					<h2><?php echo nl2br( esc_html( $impact_heading ) ); ?></h2>
					<span><?php echo esc_html( $impact_text ); ?></span>
					<a href="<?php echo slingshot_lp_h_attr( slingshot_pm( 'ai_impact_cta_url', '/contact/?looking=Artificial+Intelligence' ) ); ?>"><?php echo esc_html( slingshot_pm( 'ai_impact_cta_text', 'Get Started Now' ) ); ?> <span>&rarr;</span></a>
				</div>
			</div>

			<div class="block-steps">
				<?php
				$si = 0;
				foreach ( $ai_steps as $step ) :
					$si++;
					$badge_src = $ai_image_from_field( $step['step_badge_img'] ?? 0, $img_dir . '/ai-step-' . min( $si, 5 ) . '.png' );
					$show_price_row = ! array_key_exists( 'show_price_row', $step ) || ! empty( $step['show_price_row'] );
					?>
				<div class="block-step">
					<div class="block-step-title">
						<span class="ai-step-icon"><img src="<?php echo esc_url( $badge_src ); ?>" alt=""/></span>
						<div class="block-step-content">
							<h4><?php echo esc_html( $step['title'] ?? '' ); ?></h4>
						</div>
					</div>
					<div class="block-step-text">
						<div class="ai-step-copy">
							<strong>Best for:</strong>
							<p><?php echo esc_html( $step['best'] ?? '' ); ?></p>
							<strong>Why it matters:</strong>
							<p><?php echo esc_html( $step['why'] ?? '' ); ?></p>
							<strong>What you get:</strong>
							<ul>
								<?php foreach ( slingshot_lp_bullet_lines( $step['bullets'] ?? '' ) as $li ) : ?>
								<li><?php echo esc_html( $li ); ?></li>
								<?php endforeach; ?>
							</ul>
						</div>
						<?php if ( $show_price_row && ( ! empty( $step['price'] ) || ! empty( $step['duration'] ) ) ) : ?>
						<div class="block-step-price">
							<?php if ( ! empty( $step['price'] ) ) : ?>
							<img src="<?php echo esc_url( $img_dir . '/coin.png' ); ?>" alt=""/>
							<p><?php echo esc_html( $step['price'] ); ?></p>
							<?php endif; ?>
							<?php if ( ! empty( $step['price'] ) && ! empty( $step['duration'] ) ) : ?>
							<span class="separator"></span>
							<?php endif; ?>
							<?php if ( ! empty( $step['duration'] ) ) : ?>
							<img src="<?php echo esc_url( $img_dir . '/time.png' ); ?>" alt=""/>
							<p><?php echo esc_html( $step['duration'] ); ?></p>
							<?php endif; ?>
						</div>
						<?php endif; ?>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="ai-experience-section">
		<div class="ai-experience-inner">
			<div class="ai-section-header">
				<h2><?php echo esc_html( slingshot_pm( 'ai_experiences_title', 'Real-World AI Experiences' ) ); ?></h2>
				<p><?php echo esc_html( slingshot_pm( 'ai_experiences_desc', 'Real conversations, hands-on learning, and practical AI experience for builders, teams, and leaders.' ) ); ?></p>
			</div>
			<div class="ai-experience-grid">
				<?php foreach ( $ai_experiences as $experience ) : ?>
				<a class="ai-experience-card" href="<?php echo slingshot_lp_h_attr( $experience['url'] ); ?>">
					<img src="<?php echo esc_url( $experience['image'] ); ?>" alt="<?php echo esc_attr( $experience['title'] ); ?>">
					<div class="ai-experience-body">
						<div>
							<h3><?php echo esc_html( $experience['title'] ); ?></h3>
							<p><?php echo esc_html( $experience['desc'] ); ?></p>
						</div>
						<span class="ai-outline-btn">Explore <span>&rarr;</span></span>
					</div>
				</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="capabilities-block-bg">
		<div class="capabilities-block">
			<div class="capabilities-title">
				<h2><?php echo esc_html( slingshot_pm( 'ai_cap_title', 'AI Capabilities' ) ); ?></h2>
				<a href="<?php echo $contact_url; ?>" class="ai-outline-btn ai-outline-btn-light">Book a call <span>&rarr;</span></a>
			</div>
			<div class="capabilities-content">
				<?php
				$ci = 0;
				foreach ( $ai_caps as $cap ) :
					$ci++;
					$icon = $ai_image_from_field( $cap['image'] ?? 0, $img_dir . '/capabilities-' . $ci . '.png' );
					?>
				<div class="capabilitie-item">
					<img src="<?php echo esc_url( $icon ); ?>" alt="">
					<h4><?php echo nl2br( esc_html( $cap['title'] ?? '' ) ); ?></h4>
					<p><?php echo esc_html( $cap['desc'] ?? '' ); ?></p>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="tools-block-bg">
		<div class="tools-block">
			<div class="tools-title">
				<h2><?php echo esc_html( slingshot_pm( 'ai_tools_title', 'Trusted Platforms We Build With' ) ); ?></h2>
			</div>
		</div>
		<div class="tools-content">
			<?php foreach ( $ai_tool_logos as $logo ) : ?>
			<div class="tools-item"><img src="<?php echo esc_url( $logo['image'] ); ?>" alt="<?php echo esc_attr( $logo['alt'] ?? 'AI platform logo' ); ?>"></div>
			<?php endforeach; ?>
		</div>
	</section>

	<section class="ai-work-section">
		<div class="ai-work-inner">
			<div class="ai-section-header">
				<h2><?php echo nl2br( esc_html( slingshot_pm( 'ai_work_title', "From Solution\nto Success Stories" ) ) ); ?></h2>
				<a href="<?php echo slingshot_lp_h_attr( slingshot_pm( 'ai_work_cta_url', '/work/' ) ); ?>" class="ai-outline-btn"><?php echo esc_html( $clean_ai_cta_label( slingshot_pm( 'ai_work_cta_text', 'All Work' ), 'All Work' ) ); ?> <span>&rarr;</span></a>
			</div>
			<div class="ai-card-track" id="aiWorkTrack">
				<?php foreach ( $ai_work_cards as $card ) : ?>
				<a href="<?php echo slingshot_lp_h_attr( $card['url'] ); ?>" class="ai-case-card">
					<img src="<?php echo esc_url( $card['image'] ); ?>" alt="<?php echo esc_attr( $card['title'] ); ?>">
					<div class="ai-case-body">
						<h3><?php echo esc_html( $card['title'] ); ?></h3>
						<p><?php echo esc_html( $card['desc'] ); ?></p>
						<div class="ai-tags">
							<?php foreach ( $card['tags'] as $tag ) : ?>
							<span><?php echo esc_html( $tag ); ?></span>
							<?php endforeach; ?>
						</div>
					</div>
				</a>
				<?php endforeach; ?>
			</div>
			<div class="ai-carousel-footer">
				<div class="ai-carousel-progress"><span></span></div>
				<div class="ai-slider-arrows">
					<button type="button" data-ai-scroll="#aiWorkTrack" data-direction="-1" aria-label="Previous">&lsaquo;</button>
					<button type="button" data-ai-scroll="#aiWorkTrack" data-direction="1" aria-label="Next">&rsaquo;</button>
				</div>
			</div>
		</div>
	</section>

	<section class="innovations-block-bg ai-insights-section">
		<div class="innovations-block">
			<div class="innovations-title">
				<h2><?php echo esc_html( slingshot_pm( 'ai_blog_title', 'Insights That Move Business Forward' ) ); ?></h2>
				<div class="ai-insights-kicker">
					<p><?php echo esc_html( slingshot_pm( 'ai_insights_intro', 'AI-powered legal assistant that streamlined paralegal workflows by 60 percent' ) ); ?></p>
					<a class="ai-outline-btn" role="button" href="<?php echo slingshot_lp_h_attr( slingshot_pm( 'ai_blog_cta_url', '/blog/' ) ); ?>"><?php echo esc_html( $ai_blog_cta_text ); ?> <span>&rarr;</span></a>
				</div>
			</div>
			<div class="innovations-content" id="aiInsightsTrack">
				<?php foreach ( $ai_insights as $card ) : ?>
				<a href="<?php echo slingshot_lp_h_attr( $card['url'] ); ?>">
					<div class="innovations-item">
						<div class="ai-insight-image">
							<img src="<?php echo esc_url( $card['image'] ); ?>" alt="<?php echo esc_attr( $card['title'] ); ?>"/>
							<?php if ( ! empty( $card['video'] ) ) : ?>
							<span class="ai-video-badge"><span>&#9654;</span> Video</span>
							<?php endif; ?>
						</div>
						<div class="innovation-content">
							<h4><?php echo esc_html( $card['title'] ); ?></h4>
							<span><?php echo esc_html( $card['desc'] ); ?></span>
							<div class="ai-tags">
								<?php foreach ( $card['tags'] as $tag ) : ?>
								<em><?php echo esc_html( $tag ); ?></em>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</a>
				<?php endforeach; ?>
			</div>
			<div class="slider-arrows">
				<button type="button" class="prev" aria-label="Previous">&lsaquo;</button>
				<button type="button" class="next" aria-label="Next">&rsaquo;</button>
			</div>
		</div>
	</section>

	<section class="answers-block-bg">
		<div class="answers-block">
			<div class="answers-title">
				<h2><?php echo nl2br( esc_html( $ai_faq_title ) ); ?></h2>
				<p>If you didn't find the answer you were looking for, please reach out. We pride ourselves on providing not just excellent care, but also extraordinary service. All questions are welcome.</p>
				<a class="ai-outline-btn" href="/contact/">Contact us <span>&rarr;</span></a>
			</div>
			<div class="answers-content">
				<?php foreach ( slingshot_lp_ai_faq_items() as $faq ) : ?>
				<div class="item-answer">
					<div class="row">
						<h3><?php echo esc_html( $faq['question'] ?? '' ); ?></h3>
						<div class="circle-plus"></div>
					</div>
					<div class="answer-text">
						<?php echo wp_kses_post( $faq['answer'] ?? '' ); ?>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="ai-cta-section">
		<div class="ai-cta-inner">
			<div class="home-cta-mascot">
				<img src="<?php echo esc_url( $cta_mascot ); ?>" alt="Slingshot mascot">
			</div>
			<div class="ai-cta-card">
				<h2 class="ai-cta-title"><?php echo nl2br( esc_html( $ai_cta_title ) ); ?></h2>
				<p class="ai-cta-desc"><?php echo esc_html( slingshot_pm( 'ai_cta_desc', "Let's turn AI into something real, valuable, and aligned to your business" ) ); ?></p>
				<a href="<?php echo slingshot_lp_h_attr( slingshot_pm( 'ai_cta_btn_url', '/contact/' ) ); ?>" class="ai-cta-btn"><?php echo esc_html( $ai_cta_btn_text ); ?> <span>&rarr;</span></a>
			</div>
		</div>
	</section>
</div>

<?php get_footer(); ?>
