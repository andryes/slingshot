<?php
/*
 * Home Page – custom template (front-page.php)
 * Content is managed from Appearance → Home Page (Meta Box settings page).
 */

wp_enqueue_style(
	'hp-jakarta',
	'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap',
	array(), null
);
wp_enqueue_style(
	'hp-style',
	get_stylesheet_directory_uri() . '/css/home.css',
	array(), '1.1'
);
wp_enqueue_script(
	'hp-script',
	get_stylesheet_directory_uri() . '/js/home.js',
	array('jquery'), '1.1', true
);

get_header();

/* ── Helpers ─────────────────────────────────────── */

/**
 * Read a single field from the Home Page settings.
 *
 * @param string $field    Field ID.
 * @param mixed  $default  Returned when the field is empty or Meta Box isn't active.
 * @return mixed
 */
function hp_setting( $field, $default = '' ) {
	if ( ! function_exists( 'rwmb_meta' ) ) {
		return $default;
	}
	$val = rwmb_meta( $field, [ 'object_type' => 'setting' ], 'slingshot_home' );
	return ( $val !== '' && $val !== null && $val !== false ) ? $val : $default;
}

/**
 * Return the URL of a single_image field stored in the Home Page settings.
 *
 * @param string $field    Field ID.
 * @param string $default  Fallback URL.
 * @param string $size     Image size slug.
 * @return string
 */
function hp_image_url( $field, $default = '', $size = 'large' ) {
	if ( ! function_exists( 'rwmb_meta' ) ) {
		return $default;
	}
	$id = rwmb_meta( $field, [ 'object_type' => 'setting' ], 'slingshot_home' );
	if ( ! $id ) {
		return $default;
	}
	$url = wp_get_attachment_image_url( $id, $size );
	return $url ? $url : $default;
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
		'desc'  => '',
		'url'   => '/ai',
		'style' => 'dark',
		'icon_svg' => '<svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="20" cy="20" r="7" stroke="rgba(255,255,255,.85)" stroke-width="2"/><path d="M20 6V11M20 29V34M6 20H11M29 20H34M9.4 9.4l3.5 3.5M27.1 27.1l3.5 3.5M30.6 9.4l-3.5 3.5M12.9 27.1l-3.5 3.5" stroke="rgba(255,255,255,.85)" stroke-width="2" stroke-linecap="round"/></svg>',
	],
	[
		'title' => 'Teams',
		'desc'  => '',
		'url'   => '/teams',
		'style' => 'light',
		'icon_svg' => '<svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="15" cy="13" r="5" stroke="#4B23B0" stroke-width="2"/><circle cx="27" cy="13" r="5" stroke="#4B23B0" stroke-width="2"/><path d="M6 33c0-5.523 4.477-10 10-10h8c5.523 0 10 4.477 10 10" stroke="#4B23B0" stroke-width="2" stroke-linecap="round"/></svg>',
	],
	[
		'title' => 'Product',
		'desc'  => '',
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
$events_cta_url = hp_setting( 'home_events_cta_url', '/events' );
$events_raw     = hp_setting( 'home_events', [] );
$events         = is_array( $events_raw ) ? $events_raw : [];

// Blog
$blog_title = hp_setting( 'home_blog_title', 'Insights That Move Business Forward' );
$blog_desc  = hp_setting( 'home_blog_desc',  'Get actionable ideas on software strategy, AI adoption, and scaling product delivery—straight from the minds of our team.' );

// CTA
$cta_mascot   = hp_image_url( 'home_cta_mascot', '' );
$cta_title    = hp_setting( 'home_cta_title',    'Ready to Launch Something Bold?' );
$cta_desc     = hp_setting( 'home_cta_desc',     "Let's talk about how we help teams like yours bring new products to life—and make them work in the real world." );
$cta_btn_text = hp_setting( 'home_cta_btn_text', "Let's talk" );
$cta_btn_url  = hp_setting( 'home_cta_btn_url',  '/contact' );
?>

<style>
/* Push content below fixed Salient header */
@media (min-width: 1000px) {
    .home-page-wrapper { margin-top: 0; }
    body #header-space { display: none !important; }
    .home-hero-section { padding-top: 0; }
    .home-hero-inner { padding-top: 110px; }
}
</style>

<div class="home-page-wrapper">

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
                    <span class="logo-item"><?php echo esc_html( $logo['text'] ?? '' ); ?></span>
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
                <h2 class="home-section-title">From Solution<br>to Success Stories</h2>
                <a href="/work" class="home-section-link">All Work &rarr;</a>
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
                        <!-- Static fallback cards -->
                        <a href="#" class="work-card">
                            <div class="work-card-image" style="background:linear-gradient(135deg,#e8e8f5,#cccce8);"></div>
                            <div class="work-card-body">
                                <div class="work-card-tags"><span class="work-card-tag">AI</span><span class="work-card-tag">Product</span><span class="work-card-tag">Mobile</span></div>
                                <h3 class="work-card-title">Horizon Engage</h3>
                                <p class="work-card-desc">Developed a mobile app that simplifies insurance, enabling easy claims and reducing paperwork.</p>
                            </div>
                        </a>
                        <a href="#" class="work-card">
                            <div class="work-card-image" style="background:linear-gradient(135deg,#1a2560,#2d3a80);"></div>
                            <div class="work-card-body">
                                <div class="work-card-tags"><span class="work-card-tag">AI</span><span class="work-card-tag">Product</span><span class="work-card-tag">Mobile</span></div>
                                <h3 class="work-card-title">Southeast Christian Church</h3>
                                <p class="work-card-desc">Built a scalable platform to serve thousands of members with digital tools for events and community.</p>
                            </div>
                        </a>
                        <a href="#" class="work-card">
                            <div class="work-card-image" style="background:linear-gradient(135deg,#1a4560,#2d7090);"></div>
                            <div class="work-card-body">
                                <div class="work-card-tags"><span class="work-card-tag">AI</span><span class="work-card-tag">Product</span><span class="work-card-tag">Mobile</span></div>
                                <h3 class="work-card-title">Connected Caregiver</h3>
                                <p class="work-card-desc">Developed a mobile app that simplifies insurance, enabling easy claims and reducing paperwork.</p>
                            </div>
                        </a>
                        <a href="#" class="work-card">
                            <div class="work-card-image" style="background:linear-gradient(135deg,#2a1060,#4a20a0);"></div>
                            <div class="work-card-body">
                                <div class="work-card-tags"><span class="work-card-tag">Consulting</span><span class="work-card-tag">Product</span></div>
                                <h3 class="work-card-title">FormCredit Mid-America</h3>
                                <p class="work-card-desc">Modernized agricultural lending with a streamlined digital platform for loan officers and farmers.</p>
                            </div>
                        </a>
                    <?php endif; ?>

                </div><!-- #workTrack -->

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
                    <a href="<?php echo esc_url( $events_cta_url ); ?>" class="home-section-link">All Events &rarr;</a>
                </div>
            </div>

            <?php if ( ! empty( $events ) ) : ?>
            <div class="home-events-cards">
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
                        <span class="event-register-btn">Register &rarr;</span>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
            <?php else : ?>
            <!-- Static fallback when no events have been added yet -->
            <div class="home-events-cards">
                <a href="#" class="event-card">
                    <div class="event-card-image">
                        <img src="<?php echo esc_url( $img_dir ); ?>/hero-person-1.jpg" alt="Louisville IA Exchange and TechFest" loading="lazy">
                    </div>
                    <div class="event-card-body">
                        <div class="event-card-info">
                            <span class="event-card-tag">Conference</span>
                            <h3 class="event-card-title">Louisville IA Exchange and TechFest</h3>
                            <p class="event-card-date">October 21, 2025 &middot; Louisville, KY</p>
                        </div>
                        <span class="event-register-btn">Register &rarr;</span>
                    </div>
                </a>
                <a href="#" class="event-card">
                    <div class="event-card-image">
                        <img src="<?php echo esc_url( $img_dir ); ?>/hero-person-2.jpg" alt="Louisville IA Exchange and TechFest" loading="lazy">
                    </div>
                    <div class="event-card-body">
                        <div class="event-card-info">
                            <span class="event-card-tag">Conference</span>
                            <h3 class="event-card-title">Louisville IA Exchange and TechFest</h3>
                            <p class="event-card-date">October 21, 2025 &middot; Louisville, KY</p>
                        </div>
                        <span class="event-register-btn">Register &rarr;</span>
                    </div>
                </a>
                <a href="#" class="event-card">
                    <div class="event-card-image" style="background:linear-gradient(135deg,#2A1878,#4B23B0);"></div>
                    <div class="event-card-body">
                        <div class="event-card-info">
                            <span class="event-card-tag">Workshop</span>
                            <h3 class="event-card-title">AI Product Development Bootcamp</h3>
                            <p class="event-card-date">November 14, 2025 &middot; Online</p>
                        </div>
                        <span class="event-register-btn">Register &rarr;</span>
                    </div>
                </a>
            </div>
            <?php endif; ?>

        </div>
    </section>

    <!-- ── Insights (Blog) ───────────────────────── -->
    <section class="home-blog-section">
        <div class="home-blog-inner">

            <div class="home-blog-header">
                <h2 class="home-blog-title"><?php echo wp_kses_post( nl2br( esc_html( $blog_title ) ) ); ?></h2>
                <div class="home-blog-meta">
                    <p class="home-blog-desc"><?php echo esc_html( $blog_desc ); ?></p>
                    <a href="/blog" class="home-section-link">All Insights &rarr;</a>
                </div>
            </div>

            <div class="home-blog-cards">
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
                    <!-- Static fallback -->
                    <a href="#" class="blog-card">
                        <div class="blog-card-image">
                            <span class="blog-card-badge">VIDEO</span>
                        </div>
                        <div class="blog-card-body">
                            <div class="blog-card-tags"><span class="blog-card-tag">AI</span></div>
                            <h3 class="blog-card-title">"AI is enterprise-ready and simplifies development"</h3>
                            <p class="blog-card-desc">Davis Galeana (CEO &amp; President of Slingshot) shares how AI is transforming enterprise software development.</p>
                        </div>
                    </a>
                    <a href="#" class="blog-card">
                        <div class="blog-card-image" style="background:linear-gradient(135deg,#1a3560,#2d5080);"></div>
                        <div class="blog-card-body">
                            <div class="blog-card-tags"><span class="blog-card-tag">Innovation</span></div>
                            <h3 class="blog-card-title">How AI has rewired the hackathon</h3>
                            <p class="blog-card-desc">Exploring how artificial intelligence is transforming the way teams approach hackathons and rapid prototyping.</p>
                        </div>
                    </a>
                    <a href="#" class="blog-card">
                        <div class="blog-card-image" style="background:linear-gradient(135deg,#1a4530,#2d6045);"></div>
                        <div class="blog-card-body">
                            <div class="blog-card-tags"><span class="blog-card-tag">Product</span></div>
                            <h3 class="blog-card-title">4 Ways to Jumpstart real AI product development</h3>
                            <p class="blog-card-desc">Practical strategies to move from AI ideation to a working product faster than you think.</p>
                        </div>
                    </a>
                <?php endif; ?>
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
