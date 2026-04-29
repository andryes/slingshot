<?php
/*
Template Name: Bootcamp
 * Content: WordPress post editor.
 */

wp_enqueue_style(
	'bootcamp-jakarta',
	'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap',
	array(), null
);
wp_enqueue_style( 'home-style', get_stylesheet_directory_uri() . '/css/home.css', array(), '1.18' );
wp_enqueue_style( 'bootcamp-style', get_stylesheet_directory_uri() . '/css/bootcamp.css', array(), '1.2' );
wp_enqueue_script( 'bootcamp-script', get_stylesheet_directory_uri() . '/js/bootcamp.js', array( 'jquery' ), '1.0', true );
wp_enqueue_script( 'hp-script', get_stylesheet_directory_uri() . '/js/home.js', array( 'jquery' ), '1.6', true );

get_header();

$img_dir = get_stylesheet_directory_uri() . '/img';

$clean_boot_label = static function ( $value, $fallback ) {
	$value = trim( html_entity_decode( (string) $value, ENT_QUOTES, 'UTF-8' ) );
	$value = preg_replace( '/\s*(?:→|›|&rarr;|&#8594;|\?)+\s*$/u', '', $value );
	return $value !== '' ? $value : $fallback;
};

$boot_image_from_field = static function ( $value, $fallback = '' ) {
	if ( is_numeric( $value ) ) {
		return slingshot_lp_attachment_url( (int) $value, $fallback );
	}
	$value = trim( (string) $value );
	return $value !== '' ? $value : $fallback;
};

$boot_hero_img_left  = slingshot_pm_image( 'boot_hero_img_left', $img_dir . '/ai-hero-left.png' );
$boot_hero_img_right = slingshot_pm_image( 'boot_hero_img_right', $img_dir . '/ai-hero-right.png' );
$boot_intro_image    = slingshot_pm_image( 'boot_program_intro_image', $img_dir . '/bg-first-block.png' );
$cta_mascot          = slingshot_pm_image( 'boot_cta_mascot', $img_dir . '/bootcamp-cta-visual.png' );

$boot_program_cards = array(
	array(
		'title'           => 'AI Developer Bootcamp',
		'subtitle'        => 'Chatbots, RAG, and Agents in a Day',
		'desc'            => "A hands-on, full-day session for developers and architects who want to move beyond AI concepts and start building real functionality. You'll design and deploy intelligent agents, implement RAG pipelines, and explore Model Context Protocol for tool coordination.",
		'gains'           => "A functional AI chatbot built from scratch\nA RAG system for chatting with your own data\nAn AI agent capable of taking actions through tool execution",
		'ideal'           => 'Software engineers, solution architects, AI-leaning devs',
		'instructor_name' => 'Doug Compton',
		'instructor_role' => 'Principal AI Developer',
		'instructor_avatar' => content_url( 'uploads/2022/05/Doug-01.png' ),
		'instructor_bio'  => 'Doug brings 20+ years of experience in systems architecture and AI product development. His bootcamps focus on building stable, scalable, and usable AI systems with modern tools.',
		'cta_text'        => 'View Upcoming Dates',
		'cta_url'         => '#boot-programs',
		'open'            => 1,
	),
	array(
		'title'           => 'AI Product Bootcamp',
		'subtitle'        => 'One-Day, Hands-On AI Experience',
		'desc'            => 'This one-day bootcamp gives product managers, marketers, designers, and business leaders a practical foundation in using AI tools to create faster, smarter outcomes. From designing GPTs to launching live prototypes, your team will learn how to apply AI in meaningful ways.',
		'gains'           => "Your own custom GPT built and deployed.\nA live landing page created using AI and no-code tools.\nA prototype product you designed using AI-assisted workflows.",
		'ideal'           => 'Product managers, marketing teams, innovation leaders',
		'instructor_name' => 'Sarah Bhatia',
		'instructor_role' => 'Director of AI Product Innovation',
		'instructor_avatar' => content_url( 'uploads/2022/05/Sarah-B-01.png' ),
		'instructor_bio'  => '',
		'cta_text'        => 'View Upcoming Dates',
		'cta_url'         => '#boot-programs',
		'open'            => 0,
	),
);

$boot_program_rows = slingshot_lp_filter_group(
	slingshot_pm( 'boot_program_cards' ),
	static function ( $row ) {
		return ! empty( $row['title'] );
	}
);
if ( $boot_program_rows ) {
	$boot_program_cards = $boot_program_rows;
}
foreach ( $boot_program_cards as $idx => &$program ) {
	$program['icon']              = $boot_image_from_field( $program['icon'] ?? 0, $img_dir . '/ai-step-' . min( $idx + 1, 5 ) . '.png' );
	$program['instructor_avatar'] = $boot_image_from_field( $program['instructor_avatar'] ?? 0, '' );
	if ( empty( $program['instructor_avatar'] ) && ! empty( $program['instructor_name'] ) ) {
		$name = strtolower( (string) $program['instructor_name'] );
		if ( false !== strpos( $name, 'doug' ) ) {
			$program['instructor_avatar'] = content_url( 'uploads/2022/05/Doug-01.png' );
		} elseif ( false !== strpos( $name, 'sarah' ) ) {
			$program['instructor_avatar'] = content_url( 'uploads/2022/05/Sarah-B-01.png' );
		}
	}
	$program['cta_text']          = $clean_boot_label( $program['cta_text'] ?? 'View Upcoming Dates', 'View Upcoming Dates' );
	$program['cta_url']           = $program['cta_url'] ?? '#boot-programs';
	$program['open']              = ! empty( $program['open'] );
}
unset( $program );

$boot_why_cards = slingshot_lp_bootcamp_why_cards();
if ( count( $boot_why_cards ) < 4 ) {
	$boot_why_cards[] = array(
		'title'    => 'Private, custom options',
		'text'     => 'Tailored sessions built around your goals and roles.',
		'icon_svg' => '<svg width="36" height="36" viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="10" fill="rgba(255,255,255,.12)"/><circle cx="14" cy="14" r="4" stroke="#fff" stroke-width="2"/><circle cx="23" cy="15" r="3" stroke="#fff" stroke-width="2"/><path d="M8 27c0-4 3-7 7-7h3c4 0 7 3 7 7" stroke="#fff" stroke-width="2" stroke-linecap="round"/></svg>',
		'style'    => 'default',
		'badge'    => '',
	);
}

$blog_n = (int) slingshot_pm( 'boot_blog_posts', 3 );
$blog_n = max( 1, min( 12, $blog_n ) );

$blog_query = new WP_Query(
	array(
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'posts_per_page' => $blog_n,
		'orderby'        => 'date',
		'order'          => 'DESC',
	)
);

$curriculum = slingshot_lp_bootcamp_curriculum();
?>

<style id="dynamic-css-inline-css" type="text/css">
	body{overflow:visible}.no-rgba #header-space{display:none;}@media only screen and (max-width:999px){body #header-space[data-header-mobile-fixed="1"]{display:none;}#header-outer[data-mobile-fixed="false"]{position:absolute;}}@media only screen and (min-width:1000px){#header-space{display:none;}.nectar-slider-wrap.first-section,.parallax_slider_outer.first-section,.full-width-content.first-section{margin-top:0!important;}body #page-header-bg,body #page-header-wrap{height:142px;}body #search-outer{z-index:100000;}}
	body.page-template-page-bootcamp #header-outer,
	body.page-template-page-bootcamp #header-space { display:none !important; }
</style>

<?php
slingshot_render_redesign_header(
	array(
		'variant' => 'light',
		'cta_url' => slingshot_lp_h_attr( slingshot_pm('boot_hero_primary_url', '/contact/?looking=Bootcamp' ) ),
	)
);
?>

<div class="bootcamp-page-wrapper">

	<section class="boot-hero">
		<div class="boot-hero-blob boot-hero-blob-1"></div>
		<div class="boot-hero-blob boot-hero-blob-2"></div>
		<div class="boot-hero-blob boot-hero-blob-3"></div>

		<div class="boot-hero-inner">
			<div class="boot-hero-content">
				<div class="boot-hero-breadcrumb">
					<span><?php echo esc_html( slingshot_pm('boot_hero_bc_parent', 'SERVICES' ) ); ?></span>
					<span class="boot-hero-sep">/</span>
					<span><?php echo esc_html( slingshot_pm('boot_hero_bc_mid', 'AI' ) ); ?></span>
					<span class="boot-hero-sep">/</span>
					<span><?php echo esc_html( slingshot_pm('boot_hero_bc_leaf', 'BOOTCAMP' ) ); ?></span>
				</div>
				<h1 class="boot-hero-heading"><?php echo nl2br( esc_html( slingshot_pm('boot_hero_heading', "Hands-On\nAI Bootcamps" ) ) ); ?></h1>
				<p class="boot-hero-subtext"><?php echo esc_html( slingshot_pm('boot_hero_subtext', 'Two immersive one-day bootcamps designed to help your team stop experimenting and start delivering with AI. Whether you\'re building multi-agent systems or launching faster with AI tools, you\'ll leave with real progress, not just notes.' ) ); ?></p>
				<div class="boot-hero-actions">
					<a href="<?php echo slingshot_lp_h_attr( slingshot_pm('boot_hero_primary_url', '/contact/?looking=Bootcamp' ) ); ?>" class="boot-hero-btn boot-hero-btn-primary"><?php echo esc_html( $clean_boot_label( slingshot_pm('boot_hero_primary_text', 'Send Request' ), 'Send Request' ) ); ?> <span>&#8594;</span></a>
				</div>
			</div>

			<div class="boot-hero-visual">
				<div class="boot-hero-photo boot-hero-photo-left">
					<img src="<?php echo esc_url( $boot_hero_img_left ); ?>" alt="<?php echo esc_attr( slingshot_pm( 'boot_hero_img_left_alt', 'Slingshot team collaborating on AI' ) ); ?>">
				</div>
				<div class="boot-hero-photo boot-hero-photo-right">
					<img src="<?php echo esc_url( $boot_hero_img_right ); ?>" alt="<?php echo esc_attr( slingshot_pm( 'boot_hero_img_right_alt', 'Slingshot engineer working on AI solution' ) ); ?>">
				</div>
			</div>
		</div>
	</section>

	<section class="boot-programs-section" id="boot-programs">
		<div class="boot-programs-inner">
			<div class="boot-program-feature">
				<img src="<?php echo esc_url( $boot_intro_image ); ?>" alt="<?php echo esc_attr( slingshot_pm( 'boot_program_intro_image_alt', 'Slingshot AI bootcamp team session' ) ); ?>">
				<div class="boot-program-feature-content">
					<h2><?php echo nl2br( esc_html( slingshot_pm( 'boot_program_intro_title', "Build real skills.\nCreate Real Outcomes" ) ) ); ?></h2>
					<p><?php echo esc_html( slingshot_pm( 'boot_program_intro_desc', slingshot_pm('boot_hero_subtext', "Two immersive one-day bootcamps designed to help your team stop experimenting and start delivering with AI. Whether you're building multi-agent systems or launching faster with AI tools, you'll leave with real progress, not just notes." ) ) ); ?></p>
					<a href="<?php echo slingshot_lp_h_attr( slingshot_pm( 'boot_program_intro_cta_url', '/contact/?looking=Bootcamp' ) ); ?>" class="boot-program-feature-btn"><?php echo esc_html( $clean_boot_label( slingshot_pm( 'boot_program_intro_cta_text', 'Request a Private Bootcamp' ), 'Request a Private Bootcamp' ) ); ?> <span>&#8594;</span></a>
				</div>
			</div>
			<div class="boot-program-list">
				<?php foreach ( $boot_program_cards as $program ) : ?>
				<article class="boot-program-card<?php echo ! empty( $program['open'] ) ? ' is-open' : ''; ?>">
					<header class="boot-program-card-header">
						<span class="boot-program-icon"><img src="<?php echo esc_url( $program['icon'] ); ?>" alt=""></span>
						<div>
							<h2><?php echo esc_html( $program['title'] ?? '' ); ?></h2>
							<p><?php echo esc_html( $program['subtitle'] ?? '' ); ?></p>
						</div>
					</header>
					<div class="boot-program-rule"></div>
					<p class="boot-program-desc"><?php echo esc_html( $program['desc'] ?? '' ); ?></p>
					<div class="boot-program-gains">
						<strong>What You'll Gain:</strong>
						<ul>
							<?php foreach ( slingshot_lp_bullet_lines( $program['gains'] ?? '' ) as $gain ) : ?>
							<li><?php echo esc_html( $gain ); ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
					<div class="boot-program-ideal">
						<strong>Ideal for:</strong>
						<p><?php echo esc_html( $program['ideal'] ?? '' ); ?></p>
					</div>
					<div class="boot-program-rule"></div>
					<div class="boot-program-instructor">
						<strong>Instructor:</strong>
						<div class="boot-program-instructor-row">
							<?php if ( ! empty( $program['instructor_avatar'] ) ) : ?>
							<img src="<?php echo esc_url( $program['instructor_avatar'] ); ?>" alt="<?php echo esc_attr( $program['instructor_name'] ?? 'Instructor' ); ?>">
							<?php else : ?>
							<span class="boot-program-avatar"><?php echo esc_html( strtoupper( substr( (string) ( $program['instructor_name'] ?? 'AI' ), 0, 1 ) ) ); ?></span>
							<?php endif; ?>
							<div>
								<p><?php echo esc_html( $program['instructor_name'] ?? '' ); ?></p>
								<span><?php echo esc_html( $program['instructor_role'] ?? '' ); ?></span>
							</div>
						</div>
						<?php if ( ! empty( $program['instructor_bio'] ) ) : ?>
						<p class="boot-program-bio"><?php echo esc_html( $program['instructor_bio'] ); ?></p>
						<?php endif; ?>
					</div>
					<a href="<?php echo slingshot_lp_h_attr( $program['cta_url'] ?? '#' ); ?>" class="boot-program-card-btn"><?php echo esc_html( $program['cta_text'] ?? 'View Upcoming Dates' ); ?> <span>&#8594;</span></a>
				</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="boot-why-section">
		<div class="boot-why-inner">
			<div class="boot-why-header">
				<p class="boot-why-eyebrow"><?php echo esc_html( slingshot_pm('boot_why_eyebrow', 'Why It Works' ) ); ?></p>
				<h2 class="boot-why-heading"><?php echo nl2br( esc_html( slingshot_pm('boot_why_heading', "Why Teams Choose\nSlingshot's AI Bootcamps" ) ) ); ?></h2>
				<p class="boot-why-desc"><?php echo esc_html( slingshot_pm('boot_why_desc', "Most AI training stays theoretical. Ours doesn't. Every bootcamp is built around your team's real goals — with outcomes you can ship." ) ); ?></p>
				<a href="<?php echo slingshot_lp_h_attr( slingshot_pm( 'boot_why_cta_url', '/contact/?looking=Bootcamp' ) ); ?>" class="boot-why-cta"><?php echo esc_html( $clean_boot_label( slingshot_pm( 'boot_why_cta_text', 'Book a call' ), 'Book a call' ) ); ?> <span>&#8594;</span></a>
			</div>

			<div class="boot-why-cards">
				<?php foreach ( $boot_why_cards as $wc ) : ?>
				<div class="boot-why-card<?php echo ( isset( $wc['style'] ) && 'featured' === $wc['style'] ) ? ' boot-why-card-featured' : ''; ?>">
					<div class="boot-why-card-icon <?php echo ( isset( $wc['style'] ) && 'featured' === $wc['style'] ) ? 'boot-why-card-icon-teal' : 'boot-why-card-icon-purple'; ?>">
						<?php echo $wc['icon_svg']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</div>
					<h3 class="boot-why-card-title"><?php echo esc_html( $wc['title'] ); ?></h3>
					<p class="boot-why-card-text"><?php echo esc_html( $wc['text'] ); ?></p>
					<?php if ( ! empty( $wc['badge'] ) && isset( $wc['style'] ) && 'featured' === $wc['style'] ) : ?>
					<div class="boot-why-card-badge"><?php echo esc_html( $wc['badge'] ); ?></div>
					<?php endif; ?>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="boot-stats-section">
		<div class="boot-stats-inner">
			<div class="boot-stats-content">
				<h2 class="boot-stats-heading"><?php echo nl2br( esc_html( slingshot_pm('boot_stats_heading', "Training That\nMoves the Needle" ) ) ); ?></h2>
				<p class="boot-stats-desc"><?php echo esc_html( slingshot_pm('boot_stats_desc', 'Slingshot has helped companies across industries build real AI capabilities. Our bootcamps are the fastest path from curiosity to production-ready results.' ) ); ?></p>
				<a href="<?php echo slingshot_lp_h_attr( slingshot_pm('boot_stats_cta_url', '/work/' ) ); ?>" class="boot-stats-cta"><?php echo esc_html( slingshot_pm('boot_stats_cta_text', 'See Our Work' ) ); ?> <span>&#8594;</span></a>
			</div>
			<div class="boot-stats-grid">
				<?php foreach ( slingshot_lp_bootcamp_stats() as $st ) : ?>
				<div class="boot-stat">
					<span class="boot-stat-num"><?php echo esc_html( $st['number'] ); ?></span>
					<span class="boot-stat-label"><?php echo esc_html( $st['label'] ); ?></span>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="boot-curriculum-section" id="boot-curriculum">
		<div class="boot-curriculum-inner">
			<div class="boot-curriculum-header">
				<p class="boot-curriculum-eyebrow"><?php echo esc_html( slingshot_pm('boot_curriculum_eyebrow', "What You'll Cover" ) ); ?></p>
				<h2 class="boot-curriculum-heading"><?php echo nl2br( esc_html( slingshot_pm('boot_curriculum_heading', "A Curriculum Built\nfor Real-World AI" ) ) ); ?></h2>
				<p class="boot-curriculum-desc"><?php echo esc_html( slingshot_pm('boot_curriculum_desc', "Choose the track that fits your team's goals — or let us build a custom program around your specific use cases." ) ); ?></p>
			</div>

			<div class="boot-curriculum-body">
				<div class="boot-tabs">
					<?php foreach ( $curriculum as $ti => $tab ) : ?>
					<button type="button" class="boot-tab<?php echo 0 === $ti ? ' active' : ''; ?>" data-tab="<?php echo esc_attr( $tab['tab_id'] ); ?>"><?php echo esc_html( $tab['tab_label'] ); ?></button>
					<?php endforeach; ?>
				</div>

				<div class="boot-tab-panels">
					<?php foreach ( $curriculum as $ti => $tab ) : ?>
					<?php
					$layout = isset( $tab['panel_layout'] ) ? $tab['panel_layout'] : 'modules';
					$mods   = isset( $tab['modules'] ) && is_array( $tab['modules'] ) ? $tab['modules'] : [];
					?>
					<div class="boot-tab-panel<?php echo 0 === $ti ? ' active' : ''; ?>" id="boot-tab-<?php echo esc_attr( $tab['tab_id'] ); ?>">
						<div class="boot-tab-panel-grid">
							<div class="boot-tab-info">
								<div class="boot-tab-badge"><?php echo esc_html( $tab['badge'] ); ?></div>
								<h3><?php echo esc_html( $tab['title'] ); ?></h3>
								<p><?php echo esc_html( $tab['intro'] ); ?></p>
								<ul>
									<?php foreach ( slingshot_lp_bullet_lines( $tab['bullets'] ?? '' ) as $li ) : ?>
									<li><?php echo esc_html( $li ); ?></li>
									<?php endforeach; ?>
								</ul>
								<a href="<?php echo slingshot_lp_h_attr( $tab['cta_url'] ?? '#' ); ?>" class="boot-tab-cta"><?php echo esc_html( $tab['cta_text'] ?? '' ); ?> <span>&#8594;</span></a>
							</div>
							<div class="boot-tab-visual<?php echo 'custom' === $layout ? ' boot-tab-visual-custom' : ''; ?>">
								<?php if ( 'custom' === $layout ) : ?>
								<div class="boot-custom-card">
									<div class="boot-custom-icon">
										<svg width="48" height="48" viewBox="0 0 48 48" fill="none"><circle cx="24" cy="24" r="24" fill="rgba(109,68,183,0.1)"/><path d="M16 32V24l8-6 8 6v8" stroke="#6D44B7" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/><rect x="20" y="24" width="8" height="8" rx="1.5" stroke="#6D44B7" stroke-width="2.5"/><path d="M24 16v-4M18 18l-3-3M30 18l3-3" stroke="#23B7B4" stroke-width="2" stroke-linecap="round"/></svg>
									</div>
									<p class="boot-custom-text"><?php echo esc_html( $tab['custom_text'] ?? '' ); ?></p>
									<a href="<?php echo slingshot_lp_h_attr( $tab['custom_url'] ?? '#' ); ?>" class="boot-custom-btn"><?php echo wp_kses_post( $tab['custom_btn'] ?? '' ); ?></a>
								</div>
								<?php else : ?>
								<div class="boot-module-cards">
									<?php foreach ( $mods as $mi => $mod ) : ?>
										<?php
										if ( empty( $mod['day'] ) && empty( $mod['name'] ) ) {
											continue;
										}
										$cap_class = '';
										$day_s     = (string) ( $mod['day'] ?? '' );
										$name_s    = (string) ( $mod['name'] ?? '' );
										if ( stripos( $day_s, 'capstone' ) !== false || stripos( $name_s, 'End-to-End' ) !== false ) {
											$cap_class = ' boot-module-capstone';
										}
										?>
									<div class="boot-module<?php echo esc_attr( $cap_class ); ?>">
										<span class="boot-module-day"><?php echo esc_html( $mod['day'] ?? '' ); ?></span>
										<span class="boot-module-name"><?php echo esc_html( $mod['name'] ?? '' ); ?></span>
									</div>
									<?php endforeach; ?>
								</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>

	<section class="boot-how-section">
		<div class="boot-how-inner">
			<div class="boot-how-header">
				<p class="boot-how-eyebrow"><?php echo esc_html( slingshot_pm('boot_how_eyebrow', 'The Process' ) ); ?></p>
				<h2 class="boot-how-heading"><?php echo esc_html( slingshot_pm('boot_how_heading', 'How It Works' ) ); ?></h2>
			</div>
			<div class="boot-how-steps">
				<?php foreach ( slingshot_lp_bootcamp_how_steps() as $si => $step ) : ?>
					<?php if ( $si > 0 ) : ?>
				<div class="boot-how-connector"></div>
					<?php endif; ?>
				<div class="boot-how-step">
					<div class="boot-how-step-num"><?php echo esc_html( $step['num'] ?? '' ); ?></div>
					<div class="boot-how-step-content">
						<h3><?php echo esc_html( $step['title'] ?? '' ); ?></h3>
						<p><?php echo esc_html( $step['text'] ?? '' ); ?></p>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="home-events-section boot-events-section">
		<div class="home-events-inner">
			<div class="home-events-header">
				<h2 class="home-events-title"><?php echo esc_html( slingshot_pm('boot_events_title', 'Upcoming Bootcamps' ) ); ?></h2>
				<div class="home-events-meta">
					<p class="home-events-desc"><?php echo esc_html( slingshot_pm('boot_events_desc', 'Join one of our public cohorts or bring a private bootcamp to your team. New dates added regularly.' ) ); ?></p>
					<a href="<?php echo slingshot_lp_h_attr( slingshot_pm('boot_events_all_url', '/events' ) ); ?>" class="home-section-link"><?php echo esc_html( slingshot_pm('boot_events_all_text', 'All Events →' ) ); ?></a>
				</div>
			</div>
			<div class="home-events-cards">
				<?php foreach ( slingshot_lp_bootcamp_events_cards() as $ev ) : ?>
					<?php
					$ev_url = ! empty( $ev['url'] ) ? $ev['url'] : '#';
					$img_u  = ! empty( $ev['image'] ) ? slingshot_lp_attachment_url( $ev['image'], '', 'large' ) : '';
					$reg    = ! empty( $ev['register_label'] ) ? $ev['register_label'] : 'Register →';
					?>
				<a href="<?php echo slingshot_lp_h_attr( $ev_url ); ?>" class="event-card">
					<div class="event-card-image"<?php echo ! empty( $ev['image_bg_css'] ) ? ' style="background:' . esc_attr( $ev['image_bg_css'] ) . ';"' : ''; ?>>
						<?php if ( $img_u && empty( $ev['image_bg_css'] ) ) : ?>
						<img src="<?php echo esc_url( $img_u ); ?>" alt="<?php echo esc_attr( $ev['title'] ?? '' ); ?>" loading="lazy">
						<?php endif; ?>
					</div>
					<div class="event-card-body">
						<div class="event-card-info">
							<span class="event-card-tag"><?php echo esc_html( $ev['tag'] ?? '' ); ?></span>
							<h3 class="event-card-title"><?php echo esc_html( $ev['title'] ?? '' ); ?></h3>
							<p class="event-card-date"><?php echo esc_html( $ev['date_location'] ?? '' ); ?></p>
						</div>
						<span class="event-register-btn"><?php echo esc_html( $reg ); ?></span>
					</div>
				</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="boot-clients-section">
		<div class="boot-clients-inner">
			<p class="boot-clients-label"><?php echo esc_html( slingshot_pm('boot_clients_label', "Teams We've Trained" ) ); ?></p>
			<div class="home-logos-strip-wrapper">
				<div class="home-logos-strip">
					<?php
					$blogos = slingshot_lp_bootcamp_clients();
					foreach ( array_merge( $blogos, $blogos ) as $row ) :
						$name = (string) ( $row['name'] ?? '' );
						$img  = ! empty( $row['image'] ) ? slingshot_lp_attachment_url( $row['image'], '', 'large' ) : '';
						if ( ! $img ) {
							$img = slingshot_client_logo_url( $name );
						}
						?>
					<span class="logo-item">
						<?php if ( $img ) : ?>
							<img src="<?php echo esc_url( $img ); ?>" alt="<?php echo esc_attr( $name ? $name : 'Client logo' ); ?>" loading="lazy">
						<?php else : ?>
							<?php echo esc_html( $name ); ?>
						<?php endif; ?>
					</span>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>

	<section class="home-blog-section boot-blog-section">
		<div class="home-blog-inner">
			<div class="home-blog-header">
				<h2 class="home-blog-title"><?php echo nl2br( esc_html( slingshot_pm('boot_blog_title', "AI Insights for\nModern Teams" ) ) ); ?></h2>
				<div class="home-blog-meta">
					<p class="home-blog-desc"><?php echo esc_html( slingshot_pm('boot_blog_desc', 'Practical thinking on AI adoption, team enablement, and what it really takes to build AI capabilities inside an organization.' ) ); ?></p>
					<a href="<?php echo slingshot_lp_h_attr( slingshot_pm('boot_blog_cta_url', '/blog' ) ); ?>" class="home-section-link"><?php echo esc_html( slingshot_pm('boot_blog_cta_text', 'All Insights →' ) ); ?></a>
				</div>
			</div>
			<div class="home-blog-cards">
				<?php if ( $blog_query->have_posts() ) : ?>
					<?php
					while ( $blog_query->have_posts() ) :
						$blog_query->the_post();
						?>
						<a href="<?php the_permalink(); ?>" class="blog-card">
							<div class="blog-card-image">
								<?php if ( has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail( 'medium_large', array( 'loading' => 'lazy' ) ); ?>
								<?php endif; ?>
							</div>
							<div class="blog-card-body">
								<div class="blog-card-tags">
									<?php
									$cats = get_the_category();
									if ( $cats ) :
										foreach ( array_slice( $cats, 0, 2 ) as $cat ) :
											?>
										<span class="blog-card-tag"><?php echo esc_html( $cat->name ); ?></span>
											<?php
										endforeach;
endif;
									?>
								</div>
								<h3 class="blog-card-title"><?php the_title(); ?></h3>
								<p class="blog-card-desc"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 20, '...' ) ); ?></p>
							</div>
						</a>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php else : ?>
					<a href="#" class="blog-card">
						<div class="blog-card-image"></div>
						<div class="blog-card-body">
							<span class="blog-card-tag">AI</span>
							<h3 class="blog-card-title">What It Actually Takes to Make Your Team AI-Ready</h3>
						</div>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<section class="boot-cta-section">
		<div class="boot-cta-inner">
			<div class="home-cta-mascot">
				<?php
				// 1. Try the image from the settings page
				// 2. Fall back to the file in /img
				// 3. Fall back to the inline SVG placeholder
				$mascot_from_settings = $cta_mascot;
				$mascot_file_path     = get_stylesheet_directory() . '/img/cta-mascot.png';
				$mascot_file_url      = get_stylesheet_directory_uri() . '/img/cta-mascot.png';

				if ( $mascot_from_settings ) : ?>
					<img src="<?php echo esc_url( $mascot_from_settings ); ?>" alt="Slingshot mascot">
				<?php elseif ( file_exists( $mascot_file_path ) ) : ?>
					<img src="<?php echo esc_url( $mascot_file_url ); ?>" alt="Slingshot mascot">
				<?php else : ?>
				<!-- TODO: Export mascot from Figma (node 8930-23258) and save to img/cta-mascot.png or upload via Home Page settings -->
				<svg class="home-cta-mascot-svg" viewBox="0 0 280 320" fill="none" xmlns="http://www.w3.org/2000/svg">
					<ellipse cx="140" cy="290" rx="55" ry="16" fill="rgba(75,35,176,.12)"/>
					<path d="M120 260 C115 275 125 285 140 290 C155 285 165 275 160 260 C150 268 130 268 120 260Z" fill="#FF8C42"/>
					<path d="M128 262 C124 272 132 280 140 283 C148 280 156 272 152 262 C146 268 134 268 128 262Z" fill="#FFD166"/>
					<rect x="108" y="140" width="64" height="120" rx="32" fill="#4B23B0"/>
					<ellipse cx="140" cy="140" rx="32" ry="32" fill="#6D44B7"/>
					<path d="M108 168 C108 140 172 140 172 168" fill="#6D44B7"/>
					<circle cx="140" cy="165" r="18" fill="#fff" opacity=".15"/>
					<circle cx="140" cy="165" r="12" fill="#fff" opacity=".25"/>
					<circle cx="133" cy="142" r="5" fill="#fff"/>
					<circle cx="147" cy="142" r="5" fill="#fff"/>
					<circle cx="134" cy="143" r="2.5" fill="#1B1060"/>
					<circle cx="148" cy="143" r="2.5" fill="#1B1060"/>
					<path d="M108 155 C96 140 90 130 100 122 C108 130 108 145 108 155Z" fill="#5D2DBF"/>
					<path d="M172 155 C184 140 190 130 180 122 C172 130 172 145 172 155Z" fill="#5D2DBF"/>
					<path d="M108 220 C90 210 76 220 80 236 C88 232 100 228 108 230Z" fill="#23B7B4"/>
					<path d="M172 220 C190 210 204 220 200 236 C192 232 180 228 172 230Z" fill="#23B7B4"/>
				</svg>
				<?php endif; ?>
			</div>
			<div class="boot-cta-card">
				<h2 class="boot-cta-title"><?php echo nl2br( esc_html( slingshot_pm('boot_cta_title', "Bring a Bootcamp\nto Your Org" ) ) ); ?></h2>
				<p class="boot-cta-desc"><?php echo esc_html( slingshot_pm('boot_cta_desc', "Want to upskill your team in AI, fast? We offer private sessions tailored to your company's goals and team mix." ) ); ?></p>
				<div class="boot-cta-actions">
					<a href="<?php echo slingshot_lp_h_attr( slingshot_pm('boot_cta_primary_url', '/contact/?looking=Bootcamp' ) ); ?>" class="boot-cta-btn-primary"><?php echo esc_html( $clean_boot_label( slingshot_pm('boot_cta_primary_text', 'Request a Private Bootcamp' ), 'Request a Private Bootcamp' ) ); ?> <span>&#8594;</span></a>
					<a href="<?php echo slingshot_lp_h_attr( slingshot_pm('boot_cta_secondary_url', '/contact/?looking=Bootcamp+Custom' ) ); ?>" class="boot-cta-btn-ghost"><?php echo esc_html( slingshot_pm('boot_cta_secondary_text', 'Talk to Us First' ) ); ?></a>
				</div>
			</div>
		</div>
	</section>

</div>

<?php get_footer(); ?>
