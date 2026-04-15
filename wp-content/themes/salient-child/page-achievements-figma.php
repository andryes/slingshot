<?php
/*
Template Name: Achievements Figma
 * Content: Edit Page meta fields (Meta Box).
 */

wp_enqueue_style( 'pages-figma-jakarta',  'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap', array(), null );
wp_enqueue_style( 'home-style',           get_stylesheet_directory_uri() . '/css/home.css',          array(), '1.18' );
wp_enqueue_style( 'service-figma-style',  get_stylesheet_directory_uri() . '/css/service-figma.css', array(), '1.6' );
wp_enqueue_style( 'pages-figma-style',    get_stylesheet_directory_uri() . '/css/pages-figma.css',   array(), '1.0' );
wp_enqueue_style( 'pages-figma-2-style',  get_stylesheet_directory_uri() . '/css/pages-figma-2.css', array(), '1.0' );
wp_enqueue_script( 'hp-script',           get_stylesheet_directory_uri() . '/js/home.js',            array( 'jquery' ), '1.6', true );

get_header();

$img_dir     = get_stylesheet_directory_uri() . '/img';
$mascot_path = get_stylesheet_directory() . '/img/cta-mascot.png';
$mascot_url  = $img_dir . '/cta-mascot.png';

// ── Hero ──────────────────────────────────────────────────────
$hero_heading  = slingshot_pm( 'achv_hero_heading',  'Achievements & Impact' );
$hero_desc     = slingshot_pm( 'achv_hero_desc',     'Recognized across the industry for security, quality, and solutions that move businesses forward.' );
$hero_btn_text = slingshot_pm( 'achv_hero_btn_text', 'See Our Work' );
$hero_btn_url  = slingshot_pm( 'achv_hero_btn_url',  '/work/' );
$hero_img_a    = slingshot_pm_image( 'achv_hero_img_a', '' );
$hero_img_b    = slingshot_pm_image( 'achv_hero_img_b', '' );

// ── Why ───────────────────────────────────────────────────────
$why_heading = slingshot_pm( 'achv_why_heading', 'Why Top Companies Choose Slingshot' );
$why_cards   = slingshot_pm( 'achv_why_cards', [] );
$why_cards   = is_array( $why_cards ) ? $why_cards : [];
if ( empty( $why_cards ) ) {
	$why_cards = [
		[
			'icon_svg' => '<svg width="36" height="36" viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="10" fill="#6D44B7" fill-opacity=".12"/><path d="M18 8l2.4 7.4H28l-6.3 4.6 2.4 7.4L18 23l-6.1 4.4 2.4-7.4L8 15.4h7.6z" stroke="#6D44B7" stroke-width="1.8" stroke-linejoin="round"/></svg>',
			'heading'  => 'Recognized Across the Industry',
			'desc'     => 'INC 5000, AWS Select Tier Partner, top-rated on Clutch — we\'ve earned recognition from the platforms and publications that matter most.',
		],
		[
			'icon_svg' => '<svg width="36" height="36" viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="10" fill="#23B7B4" fill-opacity=".12"/><path d="M18 9l2 5h5l-4 3 2 5-5-3-5 3 2-5-4-3h5z" stroke="#23B7B4" stroke-width="1.8" stroke-linejoin="round"/><path d="M10 27h16" stroke="#23B7B4" stroke-width="1.5" stroke-linecap="round"/></svg>',
			'heading'  => 'Committed to Security',
			'desc'     => 'SOC 2 Type II certified and U.S. Federal Contractor registered — our clients trust us with their most sensitive systems and data.',
		],
		[
			'icon_svg' => '<svg width="36" height="36" viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="10" fill="#6D44B7" fill-opacity=".12"/><circle cx="18" cy="16" r="6" stroke="#6D44B7" stroke-width="1.8"/><path d="M10 28c0-4.418 3.582-8 8-8s8 3.582 8 8" stroke="#6D44B7" stroke-width="1.8" stroke-linecap="round"/></svg>',
			'heading'  => 'Authentically Solutions-Focused',
			'desc'     => 'We don\'t sell services — we solve problems. Our approach is honest, practical, and built around what actually works for your business.',
		],
	];
}

// ── Credentials ───────────────────────────────────────────────
$creds_heading = slingshot_pm( 'achv_creds_heading', 'Key Credentials & Recognitions' );
$creds_items   = slingshot_pm( 'achv_creds_items', [] );
$creds_items   = is_array( $creds_items ) ? $creds_items : [];
if ( empty( $creds_items ) ) {
	$creds_items = [
		[
			'badge_img' => '',
			'badge_svg' => '<svg viewBox="0 0 80 80" fill="none" style="width:70px;height:70px"><rect width="80" height="80" rx="8" fill="#f7f6fd"/><text x="40" y="30" text-anchor="middle" font-size="9" font-weight="800" fill="#4B23B0" font-family="sans-serif">INC.</text><text x="40" y="48" text-anchor="middle" font-size="18" font-weight="900" fill="#4B23B0" font-family="sans-serif">5000</text><text x="40" y="62" text-anchor="middle" font-size="7" fill="#888" font-family="sans-serif">FASTEST GROWING</text></svg>',
			'heading'   => 'INC 5000',
			'desc'      => 'Recognized as one of America\'s fastest-growing private companies — a testament to the trust our clients place in us and the outcomes we deliver.',
		],
		[
			'badge_img' => '',
			'badge_svg' => '<svg viewBox="0 0 80 80" fill="none" style="width:70px;height:70px"><rect width="80" height="80" rx="8" fill="#f7f6fd"/><text x="40" y="32" text-anchor="middle" font-size="8" font-weight="700" fill="#FF9900" font-family="sans-serif">AWS</text><text x="40" y="48" text-anchor="middle" font-size="7" font-weight="600" fill="#555" font-family="sans-serif">SELECT TIER</text><text x="40" y="60" text-anchor="middle" font-size="7" fill="#888" font-family="sans-serif">PARTNER</text></svg>',
			'heading'   => 'AWS Select Tier Partner',
			'desc'      => 'Certified by Amazon Web Services as a Select Tier partner, demonstrating validated expertise in cloud architecture, migration, and managed services.',
		],
		[
			'badge_img' => '',
			'badge_svg' => '<svg viewBox="0 0 80 80" fill="none" style="width:70px;height:70px"><rect width="80" height="80" rx="8" fill="#f7f6fd"/><text x="40" y="34" text-anchor="middle" font-size="10" font-weight="800" fill="#4B23B0" font-family="sans-serif">SOC 2</text><text x="40" y="50" text-anchor="middle" font-size="7" fill="#555" font-family="sans-serif">TYPE II CERTIFIED</text></svg>',
			'heading'   => 'SOC 2 Type II Certified',
			'desc'      => 'Our systems, processes, and controls have been independently audited and certified for security, availability, and confidentiality.',
		],
		[
			'badge_img' => '',
			'badge_svg' => '<svg viewBox="0 0 80 80" fill="none" style="width:70px;height:70px"><rect width="80" height="80" rx="8" fill="#f7f6fd"/><text x="40" y="38" text-anchor="middle" font-size="10" font-weight="800" fill="#FF6B35" font-family="sans-serif">CLUTCH</text><text x="40" y="54" text-anchor="middle" font-size="7" fill="#888" font-family="sans-serif">TOP RATED</text></svg>',
			'heading'   => 'Top-Rated on Clutch',
			'desc'      => 'Consistently rated among the top development agencies on Clutch, based on verified client reviews and real project outcomes.',
		],
		[
			'badge_img' => '',
			'badge_svg' => '<svg viewBox="0 0 80 80" fill="none" style="width:70px;height:70px"><rect width="80" height="80" rx="8" fill="#f7f6fd"/><text x="40" y="36" text-anchor="middle" font-size="8" font-weight="800" fill="#222" font-family="sans-serif">WEBBY</text><text x="40" y="50" text-anchor="middle" font-size="7" fill="#555" font-family="sans-serif">EXCELLENCE</text><text x="40" y="62" text-anchor="middle" font-size="7" fill="#888" font-family="sans-serif">AWARDS</text></svg>',
			'heading'   => 'Webby Excellence Awards',
			'desc'      => 'Honored for digital excellence by the Webby Awards — recognized for craftsmanship, impact, and innovation in our client work.',
		],
		[
			'badge_img' => '',
			'badge_svg' => '<svg viewBox="0 0 80 80" fill="none" style="width:70px;height:70px"><rect width="80" height="80" rx="8" fill="#f7f6fd"/><text x="40" y="36" text-anchor="middle" font-size="8" font-weight="800" fill="#4B23B0" font-family="sans-serif">USFCR</text><text x="40" y="50" text-anchor="middle" font-size="6" fill="#555" font-family="sans-serif">U.S. FEDERAL</text><text x="40" y="62" text-anchor="middle" font-size="6" fill="#888" font-family="sans-serif">CONTRACTOR</text></svg>',
			'heading'   => 'USFCR (U.S. Federal Contractor Registration)',
			'desc'      => 'Registered as a certified U.S. Federal Contractor, enabling us to partner with government agencies and federal programs.',
		],
	];
}

// ── Featured On ───────────────────────────────────────────────
$featured_heading = slingshot_pm( 'achv_featured_heading', 'Featured On' );
$featured_logos   = slingshot_pm( 'achv_featured_logos', [] );
$featured_logos   = is_array( $featured_logos ) ? $featured_logos : [];

// ── CTA ───────────────────────────────────────────────────────
$cta_heading  = slingshot_pm( 'achv_cta_heading',  'Ready to Launch Something Bold?' );
$cta_desc     = slingshot_pm( 'achv_cta_desc',     "We partner with ambitious companies to design and build products people love. Let's talk." );
$cta_btn_text = slingshot_pm( 'achv_cta_btn_text', "Let's Talk" );
$cta_btn_url  = slingshot_pm( 'achv_cta_btn_url',  '/contact/' );
?>
<style>
body.page-template-page-achievements-figma #header-outer,
body.page-template-page-achievements-figma #header-space { display:none !important; }
</style>

<?php slingshot_render_redesign_header( array( 'variant' => 'light' ) ); ?>

<div class="achv-page-wrapper">

	<!-- ── HERO ──────────────────────────────────────────── -->
	<section class="fig-hero">
		<div class="fig-hero-blob fig-hero-blob-1"></div>
		<div class="fig-hero-blob fig-hero-blob-2"></div>

		<div class="achv-hero-inner">
			<div class="achv-hero-content">
				<h1 class="achv-hero-heading"><?php echo esc_html( $hero_heading ); ?></h1>
				<?php if ( $hero_desc ) : ?>
				<p class="achv-hero-desc"><?php echo esc_html( $hero_desc ); ?></p>
				<?php endif; ?>
				<?php if ( $hero_btn_text && $hero_btn_url ) : ?>
				<a href="<?php echo slingshot_lp_h_attr( $hero_btn_url ); ?>" class="achv-hero-btn">
					<?php echo esc_html( $hero_btn_text ); ?> &rarr;
				</a>
				<?php endif; ?>
			</div>

			<?php if ( $hero_img_a || $hero_img_b ) : ?>
			<div class="achv-hero-photos">
				<?php if ( $hero_img_a ) : ?>
				<div class="achv-hero-photo achv-hero-photo-a">
					<img src="<?php echo esc_url( $hero_img_a ); ?>" alt="">
				</div>
				<?php endif; ?>
				<?php if ( $hero_img_b ) : ?>
				<div class="achv-hero-photo achv-hero-photo-b">
					<img src="<?php echo esc_url( $hero_img_b ); ?>" alt="">
				</div>
				<?php endif; ?>
			</div>
			<?php endif; ?>
		</div>
	</section>

	<!-- ── WHY ───────────────────────────────────────────── -->
	<section class="achv-why-section">
		<h2 class="fig-section-heading"><?php echo esc_html( $why_heading ); ?></h2>
		<div class="achv-why-grid">
			<?php foreach ( $why_cards as $card ) : ?>
			<div class="achv-why-card">
				<?php if ( ! empty( $card['icon_svg'] ) ) : ?>
				<div class="achv-why-icon"><?php echo $card['icon_svg']; // already escaped SVG ?></div>
				<?php endif; ?>
				<h3 class="achv-why-heading"><?php echo esc_html( $card['heading'] ?? '' ); ?></h3>
				<p class="achv-why-desc"><?php echo esc_html( $card['desc'] ?? '' ); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
	</section>

	<!-- ── CREDENTIALS ───────────────────────────────────── -->
	<section class="achv-creds-section">
		<h2 class="fig-section-heading"><?php echo esc_html( $creds_heading ); ?></h2>
		<div class="achv-creds-list">
			<?php foreach ( $creds_items as $cred ) :
				$badge_img = ! empty( $cred['badge_img'] ) ? slingshot_lp_attachment_url( $cred['badge_img'], '', 'medium' ) : '';
				$badge_svg = $cred['badge_svg'] ?? '';
			?>
			<div class="achv-cred-item">
				<div class="achv-cred-badge">
					<?php if ( $badge_img ) : ?>
					<img src="<?php echo esc_url( $badge_img ); ?>" alt="<?php echo esc_attr( $cred['heading'] ?? '' ); ?>">
					<?php elseif ( $badge_svg ) : ?>
					<?php echo $badge_svg; // inline SVG ?>
					<?php endif; ?>
				</div>
				<div>
					<h3 class="achv-cred-heading"><?php echo esc_html( $cred['heading'] ?? '' ); ?></h3>
					<p class="achv-cred-desc"><?php echo esc_html( $cred['desc'] ?? '' ); ?></p>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</section>

	<!-- ── FEATURED ON ───────────────────────────────────── -->
	<?php if ( ! empty( $featured_logos ) ) : ?>
	<section class="achv-featured-section">
		<div class="fig-eyebrow"><?php echo esc_html( $featured_heading ); ?></div>
		<div class="achv-featured-logos">
			<?php foreach ( $featured_logos as $logo ) :
				$logo_img = ! empty( $logo['image'] ) ? slingshot_lp_attachment_url( $logo['image'], '', 'medium' ) : '';
				if ( ! $logo_img ) continue;
			?>
			<img src="<?php echo esc_url( $logo_img ); ?>" alt="<?php echo esc_attr( $logo['name'] ?? '' ); ?>" class="achv-featured-logo">
			<?php endforeach; ?>
		</div>
	</section>
	<?php endif; ?>

	<!-- ── CTA ───────────────────────────────────────────── -->
	<section class="fig-cta">
		<div class="fig-cta-blob"></div>
		<div class="fig-cta-mascot">
			<?php if ( file_exists( $mascot_path ) ) : ?>
			<img src="<?php echo esc_url( $mascot_url ); ?>" alt="Slingshot mascot">
			<?php endif; ?>
		</div>
		<div class="fig-cta-body">
			<h2 class="fig-cta-heading"><?php echo esc_html( $cta_heading ); ?></h2>
			<?php if ( $cta_desc ) : ?>
			<p class="fig-cta-desc"><?php echo esc_html( $cta_desc ); ?></p>
			<?php endif; ?>
			<a href="<?php echo slingshot_lp_h_attr( $cta_btn_url ); ?>" class="fig-cta-btn" data-sl-modal="contact">
				<?php echo esc_html( $cta_btn_text ); ?> &rarr;
			</a>
		</div>
	</section>

</div><!-- .achv-page-wrapper -->

<?php get_footer(); ?>
