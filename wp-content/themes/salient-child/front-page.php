<?php
/*
 * Home Page – custom template (front-page.php)
 * Content is managed from the WordPress post editor for page ID 2.
 */

wp_enqueue_style(
	'hp-jakarta',
	'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap',
	array(), null
);
wp_enqueue_style(
	'hp-style',
	get_stylesheet_directory_uri() . '/css/home.css',
	array(), '1.18'
);
wp_enqueue_script(
	'hp-script',
	get_stylesheet_directory_uri() . '/js/home.js',
	array('jquery'), '1.6', true
);

get_header();

/* ── Helpers ─────────────────────────────────────── */

/**
 * Read a single field from the Home Page post meta.
 *
 * @param string $field    Field ID.
 * @param mixed  $default  Returned when the field is empty or Meta Box isn't active.
 * @return mixed
 */
function hp_setting( $field, $default = '' ) {
	return slingshot_pm( $field, $default );
}

/**
 * Return the URL of a single_image field stored in the Home Page post meta.
 *
 * @param string $field    Field ID.
 * @param string $default  Fallback URL.
 * @param string $size     Image size slug.
 * @return string
 */
function hp_image_url( $field, $default = '', $size = 'large' ) {
	return slingshot_pm_image( $field, $default, $size );
}

/* ── Queries ─────────────────────────────────────── */
$blog_query = new WP_Query( array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => 3,
	'orderby'        => 'date',
	'order'          => 'DESC',
) );

$work_query = new WP_Query( array(
	'post_type'      => 'salient_portfolio',
	'post_status'    => 'publish',
	'posts_per_page' => 6,
	'orderby'        => 'date',
	'order'          => 'DESC',
) );

$img_dir = get_stylesheet_directory_uri() . '/img';

/* ── Settings values ─────────────────────────────── */

// Header
$header_logo = hp_image_url( 'home_header_logo', '' );
$header_logo_alt = hp_setting( 'home_header_logo_alt', 'Slingshot' );
$header_cta_text = hp_setting( 'home_header_cta_text', "Let's talk" );
$header_cta_url  = hp_setting( 'home_header_cta_url', '/contact' );
$header_mobile_menu_label = hp_setting( 'home_header_mobile_menu_label', 'Menu' );
$home_logo_url = $header_logo;
if ( ! $home_logo_url && function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
	$logo_id = get_theme_mod( 'custom_logo' );
	$home_logo_url = $logo_id ? wp_get_attachment_image_url( $logo_id, 'full' ) : '';
}
if ( ! $home_logo_url ) {
	$home_logo_url = '/wp-content/uploads/2020/05/logo-light1x.png';
}
$home_menu_location = has_nav_menu( 'top_nav' ) ? 'top_nav' : ( has_nav_menu( 'main-menu' ) ? 'main-menu' : '' );

// Hero
$hero_title      = hp_setting( 'home_hero_title',     'For Big Kids &amp; Daredevils' );
$hero_subtitle   = hp_setting( 'home_hero_subtitle',  'A Tech Consultancy &amp; Creation Studio' );
$hero_cta_text   = hp_setting( 'home_hero_cta_text',  'Book a call' );
$hero_cta_url    = hp_setting( 'home_hero_cta_url',   '/contact' );
$hero_card_img   = hp_image_url( 'home_hero_card_image', $img_dir . '/hero-person-1.jpg' );
$hero_card_text  = hp_setting( 'home_hero_card_text', '20 Years of Software &amp; Tech Expertise, at Your Service' );

// Logos
$logos_raw = hp_setting( 'home_logos', [] );
$logos     = is_array( $logos_raw ) ? $logos_raw : [];
if ( empty( $logos ) ) {
	$logos = array_map( fn( $t ) => [ 'text' => $t ], [
		'Connected Caregiver', 'Churchill Downs', 'HealthRev', 'Paysign',
		'ProjectTeam', 'Schneider Electric', 'Zoeller', 'Univ. of Louisville',
	] );
}

// Services
$services_label    = hp_setting( 'home_services_label',    'What We Do' );
$services_title    = hp_setting( 'home_services_title',    'We help companies move faster, think bigger, and build smarter with modern solutions that drive real business momentum.' );
$services_cta_text = hp_setting( 'home_services_cta_text', 'Our Services' );
$services_cta_url  = hp_setting( 'home_services_cta_url',  '/services' );
$services_raw      = hp_setting( 'home_services', [] );
$services          = is_array( $services_raw ) ? $services_raw : [];

// Default fallback service cards (used when no data saved yet)
$default_services = [
	[
		'title' => 'Consulting',
		'desc'  => 'Cut through complexity and turn insight into impact—fast.',
		'url'   => '/consulting',
		'style' => 'featured',
		'icon_svg' => '<svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="6" y="8" width="28" height="20" rx="3" stroke="#4B23B0" stroke-width="2"/><path d="M14 28L12 32M26 28L28 32M10 32H30" stroke="#4B23B0" stroke-width="2" stroke-linecap="round"/><circle cx="20" cy="18" r="5" stroke="#4B23B0" stroke-width="2"/></svg>',
	],
	[
		'title' => 'Artificial<br>Intelligence',
		'desc'  => 'Embed intelligence into your products and workflows before your competitors do.',
		'url'   => '/ai',
		'style' => 'dark',
		'icon_svg' => '<svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="20" cy="20" r="7" stroke="rgba(255,255,255,.85)" stroke-width="2"/><path d="M20 6V11M20 29V34M6 20H11M29 20H34M9.4 9.4l3.5 3.5M27.1 27.1l3.5 3.5M30.6 9.4l-3.5 3.5M12.9 27.1l-3.5 3.5" stroke="rgba(255,255,255,.85)" stroke-width="2" stroke-linecap="round"/></svg>',
	],
	[
		'title' => 'Teams',
		'desc'  => 'Senior engineers and product leaders embedded in your team—no ramp-up, just results.',
		'url'   => '/teams',
		'style' => 'dark',
		'icon_svg' => '<svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="15" cy="13" r="5" stroke="rgba(255,255,255,.85)" stroke-width="2"/><circle cx="27" cy="13" r="5" stroke="rgba(255,255,255,.85)" stroke-width="2"/><path d="M6 33c0-5.523 4.477-10 10-10h8c5.523 0 10 4.477 10 10" stroke="rgba(255,255,255,.85)" stroke-width="2" stroke-linecap="round"/></svg>',
	],
	[
		'title' => 'Product',
		'desc'  => 'From zero to launch—strategy, design, and engineering for founders who move fast.',
		'url'   => '/product',
		'style' => 'dark',
		'icon_svg' => '<svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="8" y="8" width="24" height="24" rx="4" stroke="rgba(255,255,255,.85)" stroke-width="2"/><path d="M14 20h12M14 14h12M14 26h6" stroke="rgba(255,255,255,.85)" stroke-width="2" stroke-linecap="round"/></svg>',
	],
];
if ( empty( $services ) ) {
	$services = $default_services;
}

// About
$about_img      = hp_image_url( 'home_about_image',    $img_dir . '/hero-person-2.jpg' );
$about_title    = hp_setting( 'home_about_title',    'Built for Real-World Delivery' );
$about_desc     = hp_setting( 'home_about_desc',     'Slingshot was built by a collective of strategists, creatives, and data scientists who care deeply about outcomes.' );
$about_btn_text = hp_setting( 'home_about_btn_text', 'Get in Touch' );
$about_btn_url  = hp_setting( 'home_about_btn_url',  '/contact' );
$about_tagline  = hp_setting( 'home_about_tagline',  'Slingshot helps organizations launch smarter products, modernize systems, and solve real-world challenges faster.' );

// Stats
$stats_raw = hp_setting( 'home_stats', [] );
$stats     = is_array( $stats_raw ) ? $stats_raw : [];
if ( empty( $stats ) ) {
	$stats = [
		[ 'number' => '15+',  'label' => 'Industries served' ],
		[ 'number' => '250+', 'label' => 'Successful projects' ],
		[ 'number' => '20',   'label' => 'Years in business' ],
		[ 'number' => '40+',  'label' => 'Industry awards' ],
	];
}

// Events
$events_title   = hp_setting( 'home_events_title',   'Join the Conversation' );
$events_desc    = hp_setting( 'home_events_desc',    "We don't just build, we share. Explore upcoming events for leaders building in AI, product, and tech strategy." );
$events_cta_text = hp_setting( 'home_events_cta_text', 'All Events' );
$events_cta_url = hp_setting( 'home_events_cta_url', '/events' );
$events_register_text = hp_setting( 'home_events_register_text', 'Register' );
$events_raw     = hp_setting( 'home_events', [] );
$events         = is_array( $events_raw ) ? $events_raw : [];
$events_fallback_raw = hp_setting( 'home_events_fallback', [] );
$events_fallback     = is_array( $events_fallback_raw ) ? $events_fallback_raw : [];
if ( empty( $events_fallback ) ) {
	$events_fallback = [
		[
			'image_url'      => $img_dir . '/hero-person-1.jpg',
			'tag'            => 'Conference',
			'title'          => 'Louisville IA Exchange and TechFest',
			'date_location'  => 'October 21, 2025 · Louisville, KY',
			'url'            => '#',
		],
		[
			'image_url'      => $img_dir . '/hero-person-2.jpg',
			'tag'            => 'Conference',
			'title'          => 'Louisville IA Exchange and TechFest',
			'date_location'  => 'October 21, 2025 · Louisville, KY',
			'url'            => '#',
		],
		[
			'bg_style'       => 'background:linear-gradient(135deg,#2A1878,#4B23B0);',
			'tag'            => 'Workshop',
			'title'          => 'AI Product Development Bootcamp',
			'date_location'  => 'November 14, 2025 · Online',
			'url'            => '#',
		],
	];
}

// Blog
$blog_title    = hp_setting( 'home_blog_title', 'Insights That Move Business Forward' );
$blog_desc     = hp_setting( 'home_blog_desc',  'Get actionable ideas on software strategy, AI adoption, and scaling product delivery—straight from the minds of our team.' );
$blog_cta_text = hp_setting( 'home_blog_cta_text', 'All Insights' );
$blog_cta_url  = hp_setting( 'home_blog_cta_url', '/blog' );
$blog_fallback_raw = hp_setting( 'home_blog_fallback', [] );
$blog_fallback     = is_array( $blog_fallback_raw ) ? $blog_fallback_raw : [];
if ( empty( $blog_fallback ) ) {
	$blog_fallback = [
		[
			'url'        => '#',
			'badge_text' => 'VIDEO',
			'tag'        => 'AI',
			'title'      => '"AI is enterprise-ready and simplifies development"',
			'desc'       => 'Davis Galeana (CEO & President of Slingshot) shares how AI is transforming enterprise software development.',
		],
		[
			'url'      => '#',
			'bg_style' => 'background:linear-gradient(135deg,#1a3560,#2d5080);',
			'tag'      => 'Innovation',
			'title'    => 'How AI has rewired the hackathon',
			'desc'     => 'Exploring how artificial intelligence is transforming the way teams approach hackathons and rapid prototyping.',
		],
		[
			'url'      => '#',
			'bg_style' => 'background:linear-gradient(135deg,#1a4530,#2d6045);',
			'tag'      => 'Product',
			'title'    => '4 Ways to Jumpstart real AI product development',
			'desc'     => 'Practical strategies to move from AI ideation to a working product faster than you think.',
		],
	];
}

// Work
$work_title        = hp_setting( 'home_work_title', 'From Solution<br>to Success Stories' );
$work_cta_text     = hp_setting( 'home_work_cta_text', 'All Work' );
$work_cta_url      = hp_setting( 'home_work_cta_url', '/work' );
$work_empty_notice = hp_setting( 'home_work_empty_notice', '' );

// CTA
$cta_mascot   = hp_image_url( 'home_cta_mascot', '' );
$cta_title    = hp_setting( 'home_cta_title',    'Ready to Launch Something Bold?' );
$cta_desc     = hp_setting( 'home_cta_desc',     "Let's talk about how we help teams like yours bring new products to life—and make them work in the real world." );
$cta_btn_text = hp_setting( 'home_cta_btn_text', "Let's talk" );
$cta_btn_url  = hp_setting( 'home_cta_btn_url',  '/contact' );
?>

<style>
/* Hide theme header on home, custom header is rendered below */
body.home #header-outer,
body.home #header-space {
	display: none !important;
}
</style>

<div class="home-page-wrapper">
	<header class="home-site-header" id="homeSiteHeader">
		<div class="home-site-header-inner">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="home-site-logo" aria-label="Home">
				<?php if ( $home_logo_url ) : ?>
					<img src="<?php echo esc_url( $home_logo_url ); ?>" alt="<?php echo esc_attr( $header_logo_alt ); ?>">
				<?php else : ?>
					<span class="home-site-logo-text"><?php echo esc_html( strtolower( get_bloginfo( 'name' ) ) ); ?></span>
				<?php endif; ?>
			</a>

			<nav class="home-site-nav" aria-label="Primary">
				<?php
				if ( $home_menu_location ) {
					wp_nav_menu( [
						'theme_location' => $home_menu_location,
						'container'      => false,
						'menu_class'     => 'home-site-menu',
						'fallback_cb'    => false,
					] );
				}
				?>
			</nav>

			<a href="<?php echo esc_url( $header_cta_url ); ?>" class="home-site-header-cta">
				<?php echo esc_html( $header_cta_text ); ?> &rarr;
			</a>

			<button class="home-site-menu-toggle" id="homeMenuToggle" aria-expanded="false" aria-controls="homeMobileMenu">
				<span><?php echo esc_html( $header_mobile_menu_label ); ?></span>
			</button>
		</div>
		<div class="home-mobile-menu" id="homeMobileMenu">
			<?php
			if ( $home_menu_location ) {
				wp_nav_menu( [
					'theme_location' => $home_menu_location,
					'container'      => false,
					'menu_class'     => 'home-mobile-menu-list',
					'fallback_cb'    => false,
				] );
			}
			?>
			<a href="<?php echo esc_url( $header_cta_url ); ?>" class="home-mobile-menu-cta">
				<?php echo esc_html( $header_cta_text ); ?> &rarr;
			</a>
		</div>
	</header>

	<!-- ── Hero ─────────────────────────────────── -->
	<section class="home-hero-section">
		<div class="hp-blob hp-blob-1"></div>
		<div class="hp-blob hp-blob-2"></div>
		<div class="hp-blob hp-blob-3"></div>
		<div class="hp-blob hp-blob-4"></div>

		<div class="home-hero-inner">

			<!-- Left -->
			<div class="home-hero-content">
				<h1 class="home-hero-title"><?php echo wp_kses_post( $hero_title ); ?></h1>
				<p class="home-hero-subtitle"><?php echo esc_html( $hero_subtitle ); ?></p>
				<a href="<?php echo esc_url( $hero_cta_url ); ?>" class="home-hero-cta"><?php echo esc_html( $hero_cta_text ); ?> &rarr;</a>
			</div>

			<!-- Right – video card -->
			<div>
				<div class="home-hero-card">
					<img
						src="<?php echo esc_url( $hero_card_img ); ?>"
						alt="<?php echo esc_attr( wp_strip_all_tags( $hero_card_text ) ); ?>"
						loading="eager"
					>
					<div class="home-hero-card-overlay">
						<p class="home-hero-card-text"><?php echo wp_kses_post( $hero_card_text ); ?></p>
						<button class="home-hero-play-btn" aria-label="Play video">
							<svg width="16" height="18" viewBox="0 0 16 18" fill="none">
								<path d="M1 1L15 9L1 17V1Z" fill="#1B1060"/>
							</svg>
						</button>
					</div>
				</div>
			</div>

		</div><!-- .home-hero-inner -->

		<!-- Logos strip -->
		<div class="home-logos-strip-wrapper">
			<div class="home-logos-strip">
				<?php foreach ( $logos as $logo ) : ?>
					<?php
					$logo_text = (string) ( $logo['text'] ?? '' );
					$logo_img_id = ! empty( $logo['image'] ) ? (int) $logo['image'] : 0;
					$logo_img_url = $logo_img_id ? wp_get_attachment_image_url( $logo_img_id, 'full' ) : '';
					if ( ! $logo_img_url ) {
						$logo_img_url = slingshot_client_logo_url( $logo_text );
					}
					?>
					<span class="logo-item">
						<?php if ( $logo_img_url ) : ?>
							<img src="<?php echo esc_url( $logo_img_url ); ?>" alt="<?php echo esc_attr( $logo_text ? $logo_text : 'Client logo' ); ?>" loading="lazy">
						<?php else : ?>
							<?php echo esc_html( $logo_text ); ?>
						<?php endif; ?>
					</span>
				<?php endforeach; ?>
			</div>
		</div>

	</section><!-- .home-hero-section -->

	<!-- ── What We Do ────────────────────────────── -->
	<section class="home-services-section">
		<div class="home-services-inner">

			<!-- Left text -->
			<div class="home-services-left">
				<span class="home-services-label"><?php echo esc_html( $services_label ); ?></span>
				<h2 class="home-services-title"><?php echo esc_html( $services_title ); ?></h2>
				<a href="<?php echo esc_url( $services_cta_url ); ?>" class="home-services-cta"><?php echo esc_html( $services_cta_text ); ?> &rarr;</a>
			</div>

			<!-- Right service cards -->
			<div class="home-services-grid">
				<?php foreach ( $services as $card ) :
					$card_style = esc_attr( $card['style'] ?? '' );
					$card_url   = esc_url( $card['url'] ?? '#' );
					$card_title = $card['title'] ?? '';
					$card_desc  = $card['desc'] ?? '';
					$card_svg   = $card['icon_svg'] ?? '';
					$card_class = 'service-card' . ( $card_style ? ' ' . $card_style : '' );
				?>
				<a href="<?php echo $card_url; ?>" class="<?php echo $card_class; ?>">
					<div>
						<?php if ( $card_svg ) : ?>
							<div class="service-card-icon">
								<?php echo wp_kses( $card_svg, array_merge(
									wp_kses_allowed_html( 'post' ),
									[ 'svg' => [ 'viewbox' => true, 'fill' => true, 'xmlns' => true, 'width' => true, 'height' => true, 'class' => true ],
									  'path' => [ 'd' => true, 'stroke' => true, 'stroke-width' => true, 'stroke-linecap' => true, 'stroke-linejoin' => true, 'fill' => true, 'opacity' => true ],
									  'circle' => [ 'cx' => true, 'cy' => true, 'r' => true, 'stroke' => true, 'stroke-width' => true, 'fill' => true, 'opacity' => true ],
									  'rect' => [ 'x' => true, 'y' => true, 'width' => true, 'height' => true, 'rx' => true, 'stroke' => true, 'stroke-width' => true, 'fill' => true ],
									  'ellipse' => [ 'cx' => true, 'cy' => true, 'rx' => true, 'ry' => true, 'fill' => true ],
									]
								) ); ?>
							</div>
						<?php endif; ?>
						<h3 class="service-card-title"><?php echo wp_kses_post( $card_title ); ?></h3>
						<?php if ( $card_desc ) : ?>
							<p class="service-card-desc"><?php echo esc_html( $card_desc ); ?></p>
						<?php endif; ?>
					</div>
					<?php if ( $card_style === 'featured' ) : ?>
					<div class="service-card-arrow">
						<svg width="14" height="14" viewBox="0 0 14 14" fill="none">
							<path d="M1 13L13 1M13 1H5M13 1V9" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</div>
					<?php endif; ?>
				</a>
				<?php endforeach; ?>
			</div><!-- .home-services-grid -->
		</div>
	</section>

	<!-- ── Work Portfolio ────────────────────────── -->
	<section class="home-work-section">
		<div class="home-work-inner">

			<div class="home-section-header">
				<h2 class="home-section-title"><?php echo wp_kses_post( $work_title ); ?></h2>
				<a href="<?php echo esc_url( $work_cta_url ); ?>" class="home-section-link"><?php echo esc_html( $work_cta_text ); ?> &rarr;</a>
			</div>

			<div class="home-work-carousel">
				<div class="home-work-track" id="workTrack">

					<?php if ( $work_query->have_posts() ) : ?>
						<?php while ( $work_query->have_posts() ) : $work_query->the_post(); ?>
							<a href="<?php the_permalink(); ?>" class="work-card">
								<div class="work-card-image">
									<?php if ( has_post_thumbnail() ) : ?>
										<?php the_post_thumbnail( 'medium_large', array( 'loading' => 'lazy' ) ); ?>
									<?php endif; ?>
								</div>
								<div class="work-card-body">
									<div class="work-card-tags">
										<?php
										$terms = get_the_terms( get_the_ID(), 'portfolio_category' );
										if ( $terms && ! is_wp_error( $terms ) ) :
											foreach ( array_slice( $terms, 0, 3 ) as $t ) :
										?>
											<span class="work-card-tag"><?php echo esc_html( $t->name ); ?></span>
										<?php endforeach; endif; ?>
									</div>
									<h3 class="work-card-title"><?php the_title(); ?></h3>
									<p class="work-card-desc"><?php echo wp_trim_words( get_the_excerpt(), 18, '...' ); ?></p>
								</div>
							</a>
						<?php endwhile; wp_reset_postdata(); ?>

					<?php else : ?>
						<?php if ( $work_empty_notice ) : ?>
							<p class="home-work-empty-notice"><?php echo esc_html( $work_empty_notice ); ?></p>
						<?php endif; ?>
					<?php endif; ?>

				</div><!-- #workTrack -->

				<div class="home-carousel-footer">
					<div class="home-carousel-progress"><span id="workProgress"></span></div>
					<div class="home-work-nav">
						<button class="carousel-nav-btn" id="workPrev" aria-label="Previous">
							<svg width="18" height="18" viewBox="0 0 18 18" fill="none">
								<path d="M11 4L6 9L11 14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</button>
						<button class="carousel-nav-btn" id="workNext" aria-label="Next">
							<svg width="18" height="18" viewBox="0 0 18 18" fill="none">
								<path d="M7 4L12 9L7 14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</button>
					</div>
				</div>
			</div><!-- .home-work-carousel -->

		</div>
	</section>

	<!-- ── About / Stats ─────────────────────────── -->
	<section class="home-about-section">
		<div class="home-about-inner">

			<div class="home-about-left">
				<img
					src="<?php echo esc_url( $about_img ); ?>"
					alt="<?php echo esc_attr( $about_title ); ?>"
					loading="lazy"
				>
				<div class="home-about-left-content">
					<h2 class="home-about-title"><?php echo esc_html( $about_title ); ?></h2>
					<p class="home-about-desc"><?php echo esc_html( $about_desc ); ?></p>
					<a href="<?php echo esc_url( $about_btn_url ); ?>" class="home-about-btn"><?php echo esc_html( $about_btn_text ); ?> &rarr;</a>
				</div>
			</div>

			<div class="home-about-right">
				<p class="home-about-tagline"><?php echo esc_html( $about_tagline ); ?></p>
				<div class="home-stats-grid">
					<?php foreach ( $stats as $stat ) : ?>
					<div class="home-stat">
						<div class="home-stat-number"><?php echo esc_html( $stat['number'] ?? '' ); ?></div>
						<div class="home-stat-label"><?php echo esc_html( $stat['label'] ?? '' ); ?></div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>

		</div>
	</section>

	<!-- ── Join the Conversation (Events) ────────── -->
	<section class="home-events-section">
		<div class="home-events-inner">

			<div class="home-events-header">
				<h2 class="home-events-title"><?php echo esc_html( $events_title ); ?></h2>
				<div class="home-events-meta">
					<p class="home-events-desc"><?php echo esc_html( $events_desc ); ?></p>
					<a href="<?php echo esc_url( $events_cta_url ); ?>" class="home-section-link"><?php echo esc_html( $events_cta_text ); ?> &rarr;</a>
				</div>
			</div>

			<div class="home-events-carousel">
				<div class="home-events-cards" id="eventsTrack">
					<?php if ( ! empty( $events ) ) : ?>
						<?php foreach ( $events as $ev ) :
							$ev_url   = esc_url( $ev['url'] ?? '#' );
							$ev_tag   = esc_html( $ev['tag'] ?? '' );
							$ev_title = esc_html( $ev['title'] ?? '' );
							$ev_date  = esc_html( $ev['date_location'] ?? '' );
							$ev_img_id = $ev['image'] ?? '';
							$ev_img_url = $ev_img_id ? wp_get_attachment_image_url( $ev_img_id, 'medium_large' ) : '';
						?>
						<a href="<?php echo $ev_url; ?>" class="event-card">
							<div class="event-card-image">
								<?php if ( $ev_img_url ) : ?>
									<img src="<?php echo esc_url( $ev_img_url ); ?>" alt="<?php echo $ev_title; ?>" loading="lazy">
								<?php endif; ?>
							</div>
							<div class="event-card-body">
								<div class="event-card-info">
									<?php if ( $ev_tag ) : ?><span class="event-card-tag"><?php echo $ev_tag; ?></span><?php endif; ?>
									<h3 class="event-card-title"><?php echo $ev_title; ?></h3>
									<?php if ( $ev_date ) : ?><p class="event-card-date"><?php echo $ev_date; ?></p><?php endif; ?>
								</div>
								<span class="event-register-btn"><?php echo esc_html( $events_register_text ); ?> &rarr;</span>
							</div>
						</a>
						<?php endforeach; ?>
					<?php else : ?>
						<?php foreach ( $events_fallback as $ev ) :
							$ev_url = esc_url( $ev['url'] ?? '#' );
							$ev_tag = esc_html( $ev['tag'] ?? '' );
							$ev_title = esc_html( $ev['title'] ?? '' );
							$ev_date = esc_html( $ev['date_location'] ?? '' );
							$ev_img_id = $ev['image'] ?? '';
							$ev_img_url = $ev_img_id ? wp_get_attachment_image_url( $ev_img_id, 'medium_large' ) : ( $ev['image_url'] ?? '' );
							$ev_bg_style = esc_attr( $ev['bg_style'] ?? '' );
						?>
						<a href="<?php echo $ev_url; ?>" class="event-card">
							<div class="event-card-image"<?php echo $ev_bg_style ? ' style="' . $ev_bg_style . '"' : ''; ?>>
								<?php if ( $ev_img_url ) : ?>
									<img src="<?php echo esc_url( $ev_img_url ); ?>" alt="<?php echo esc_attr( $ev_title ); ?>" loading="lazy">
								<?php endif; ?>
							</div>
							<div class="event-card-body">
								<div class="event-card-info">
									<?php if ( $ev_tag ) : ?><span class="event-card-tag"><?php echo $ev_tag; ?></span><?php endif; ?>
									<h3 class="event-card-title"><?php echo $ev_title; ?></h3>
									<?php if ( $ev_date ) : ?><p class="event-card-date"><?php echo $ev_date; ?></p><?php endif; ?>
								</div>
								<span class="event-register-btn"><?php echo esc_html( $events_register_text ); ?> &rarr;</span>
							</div>
						</a>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
				<div class="home-carousel-footer">
					<div class="home-carousel-progress"><span id="eventsProgress"></span></div>
					<div class="home-work-nav">
						<button class="carousel-nav-btn" id="eventsPrev" aria-label="Previous">
							<svg width="18" height="18" viewBox="0 0 18 18" fill="none">
								<path d="M11 4L6 9L11 14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</button>
						<button class="carousel-nav-btn" id="eventsNext" aria-label="Next">
							<svg width="18" height="18" viewBox="0 0 18 18" fill="none">
								<path d="M7 4L12 9L7 14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</button>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ── Insights (Blog) ───────────────────────── -->
	<section class="home-blog-section">
		<div class="home-blog-inner">

			<div class="home-blog-header">
				<h2 class="home-blog-title"><?php echo wp_kses_post( nl2br( esc_html( $blog_title ) ) ); ?></h2>
				<div class="home-blog-meta">
					<p class="home-blog-desc"><?php echo esc_html( $blog_desc ); ?></p>
					<a href="<?php echo esc_url( $blog_cta_url ); ?>" class="home-section-link"><?php echo esc_html( $blog_cta_text ); ?> &rarr;</a>
				</div>
			</div>

			<div class="home-blog-carousel">
				<div class="home-blog-cards" id="blogTrack">
					<?php if ( $blog_query->have_posts() ) : ?>
						<?php while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>
							<a href="<?php the_permalink(); ?>" class="blog-card">
								<div class="blog-card-image">
									<?php if ( has_post_thumbnail() ) : ?>
										<?php the_post_thumbnail( 'medium_large', array( 'loading' => 'lazy' ) ); ?>
									<?php endif; ?>
									<?php if ( get_post_format() === 'video' ) : ?>
										<span class="blog-card-badge">VIDEO</span>
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
										<?php endforeach; endif; ?>
									</div>
									<h3 class="blog-card-title"><?php the_title(); ?></h3>
									<p class="blog-card-desc"><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
								</div>
							</a>
						<?php endwhile; wp_reset_postdata(); ?>
					<?php else : ?>
						<?php foreach ( $blog_fallback as $item ) :
							$item_url = esc_url( $item['url'] ?? '#' );
							$item_tag = esc_html( $item['tag'] ?? '' );
							$item_title = esc_html( $item['title'] ?? '' );
							$item_desc = esc_html( $item['desc'] ?? '' );
							$item_badge = esc_html( $item['badge_text'] ?? '' );
							$item_img_id = $item['image'] ?? '';
							$item_img_url = $item_img_id ? wp_get_attachment_image_url( $item_img_id, 'medium_large' ) : '';
							$item_bg_style = esc_attr( $item['bg_style'] ?? '' );
						?>
						<a href="<?php echo $item_url; ?>" class="blog-card">
							<div class="blog-card-image"<?php echo $item_bg_style ? ' style="' . $item_bg_style . '"' : ''; ?>>
								<?php if ( $item_img_url ) : ?>
									<img src="<?php echo esc_url( $item_img_url ); ?>" alt="<?php echo esc_attr( $item_title ); ?>" loading="lazy">
								<?php endif; ?>
								<?php if ( $item_badge ) : ?>
									<span class="blog-card-badge"><?php echo $item_badge; ?></span>
								<?php endif; ?>
							</div>
							<div class="blog-card-body">
								<div class="blog-card-tags"><?php if ( $item_tag ) : ?><span class="blog-card-tag"><?php echo $item_tag; ?></span><?php endif; ?></div>
								<h3 class="blog-card-title"><?php echo $item_title; ?></h3>
								<p class="blog-card-desc"><?php echo $item_desc; ?></p>
							</div>
						</a>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
				<div class="home-carousel-footer">
					<div class="home-carousel-progress"><span id="blogProgress"></span></div>
					<div class="home-work-nav">
						<button class="carousel-nav-btn" id="blogPrev" aria-label="Previous">
							<svg width="18" height="18" viewBox="0 0 18 18" fill="none">
								<path d="M11 4L6 9L11 14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</button>
						<button class="carousel-nav-btn" id="blogNext" aria-label="Next">
							<svg width="18" height="18" viewBox="0 0 18 18" fill="none">
								<path d="M7 4L12 9L7 14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</button>
					</div>
				</div>
			</div>

		</div>
	</section>

	<!-- ── CTA ───────────────────────────────────── -->
	<section class="home-cta-section">
		<div class="home-cta-inner">

			<!-- Mascot illustration -->
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

			<div class="home-cta-card">
				<h2 class="home-cta-title"><?php echo esc_html( $cta_title ); ?></h2>
				<p class="home-cta-desc"><?php echo esc_html( $cta_desc ); ?></p>
				<a href="<?php echo esc_url( $cta_btn_url ); ?>" class="home-cta-btn"><?php echo esc_html( $cta_btn_text ); ?> &rarr;</a>
			</div>

		</div>
	</section>

</div><!-- .home-page-wrapper -->

<?php get_footer(); ?>
