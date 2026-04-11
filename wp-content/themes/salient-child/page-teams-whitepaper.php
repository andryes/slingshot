<?php
/*
Template Name: Teams — Offshoring Whitepaper
 * Content: Appearance → Teams — Whitepaper (Meta Box).
 */

wp_enqueue_style(
	'teams-jakarta',
	'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap',
	array(), null
);
wp_enqueue_style( 'home-style', get_stylesheet_directory_uri() . '/css/home.css', array(), '1.18' );
wp_enqueue_style( 'teams-style', get_stylesheet_directory_uri() . '/css/teams.css', array(), '1.0' );
wp_enqueue_script( 'teams-script', get_stylesheet_directory_uri() . '/js/teams.js', array( 'jquery' ), '1.0', true );
wp_enqueue_script( 'hp-script', get_stylesheet_directory_uri() . '/js/home.js', array( 'jquery' ), '1.6', true );

get_header();

$opt = SLINGSHOT_OPT_TEAMS_WHITEPAPER;

$sections = slingshot_lp_setting( $opt, 'wp_sections_items', [] );
$sections = is_array( $sections ) ? $sections : [];

$gf_id = (int) slingshot_lp_setting( $opt, 'wp_dl_gravity_form_id', 0 );
$cover_img = slingshot_lp_image_url( $opt, 'wp_dl_cover_img', '' );
?>

<style id="dynamic-css-inline-css" type="text/css">
	body{overflow:visible}.no-rgba #header-space{display:none;}@media only screen and (max-width:999px){body #header-space[data-header-mobile-fixed="1"]{display:none;}#header-outer[data-mobile-fixed="false"]{position:absolute;}}@media only screen and (min-width:1000px){#header-space{display:none;}.nectar-slider-wrap.first-section,.parallax_slider_outer.first-section,.full-width-content.first-section{margin-top:0!important;}body #page-header-bg,body #page-header-wrap{height:142px;}body #search-outer{z-index:100000;}}
	body.page-template-page-teams-whitepaper #header-outer,
	body.page-template-page-teams-whitepaper #header-space { display:none !important; }
</style>

<?php
slingshot_render_redesign_header( array(
	'variant' => 'light',
	'cta_url' => '#wp-download',
	'cta_text' => 'Download Now',
) );
?>

<div class="teams-page-wrapper teams-wp-page-wrapper">

	<!-- ═══ HERO ═══════════════════════════════════════════════ -->
	<section class="teams-hero teams-wp-hero">
		<div class="teams-hero-blob teams-hero-blob-1"></div>
		<div class="teams-hero-blob teams-hero-blob-2"></div>
		<div class="teams-hero-blob teams-hero-blob-3"></div>

		<div class="teams-hero-inner">
			<div class="teams-hero-content">
				<div class="teams-hero-breadcrumb">
					<span><?php echo esc_html( slingshot_lp_setting( $opt, 'wp_hero_bc_parent', 'TEAMS' ) ); ?></span>
					<span class="teams-hero-sep">/</span>
					<span><?php echo esc_html( slingshot_lp_setting( $opt, 'wp_hero_bc_leaf', 'WHITEPAPER' ) ); ?></span>
				</div>
				<h1 class="teams-hero-heading"><?php echo esc_html( slingshot_lp_setting( $opt, 'wp_hero_heading', 'A Complete Guide to Selecting An Offshoring Region' ) ); ?></h1>
				<p class="teams-hero-subtext"><?php echo esc_html( slingshot_lp_setting( $opt, 'wp_hero_subtext', 'Everything you need to know before choosing where to build your global team.' ) ); ?></p>
				<a href="<?php echo slingshot_lp_h_attr( slingshot_lp_setting( $opt, 'wp_hero_cta_url', '#wp-download' ) ); ?>" class="teams-hero-btn">
					<?php echo esc_html( slingshot_lp_setting( $opt, 'wp_hero_cta_text', 'Download Now' ) ); ?> <span>&#8594;</span>
				</a>
			</div>

			<div class="teams-hero-photos">
				<div class="teams-hero-photo-grid">
					<div class="teams-hero-photo teams-hero-photo-a">
						<?php $img_a = slingshot_lp_image_url( $opt, 'wp_hero_img_a', get_stylesheet_directory_uri() . '/img/hero-person-1.jpg' ); ?>
						<img src="<?php echo esc_url( $img_a ); ?>" alt="Offshoring guide">
					</div>
					<div class="teams-hero-photo teams-hero-photo-b">
						<?php $img_b = slingshot_lp_image_url( $opt, 'wp_hero_img_b', get_stylesheet_directory_uri() . '/img/hero-person-2.jpg' ); ?>
						<img src="<?php echo esc_url( $img_b ); ?>" alt="Global teams">
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ═══ WHAT TO EXPECT ══════════════════════════════════════ -->
	<section class="teams-wp-sections-section">
		<div class="teams-wp-sections-inner">
			<h2 class="teams-wp-sections-heading"><?php echo esc_html( slingshot_lp_setting( $opt, 'wp_sections_heading', 'What to Expect in This Whitepaper' ) ); ?></h2>

			<?php if ( ! empty( $sections ) ) : ?>
			<div class="teams-wp-sections-grid">
				<?php foreach ( $sections as $sec ) : ?>
				<div class="teams-wp-section-card">
					<?php if ( ! empty( $sec['icon_svg'] ) ) : ?>
					<div class="teams-wp-section-icon"><?php echo $sec['icon_svg']; // phpcs:ignore ?></div>
					<?php endif; ?>
					<h3 class="teams-wp-section-title"><?php echo esc_html( (string) ( $sec['title'] ?? '' ) ); ?></h3>
					<?php if ( ! empty( $sec['desc'] ) ) : ?>
					<p class="teams-wp-section-desc"><?php echo esc_html( (string) $sec['desc'] ); ?></p>
					<?php endif; ?>
				</div>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
		</div>
	</section>

	<!-- ═══ DOWNLOAD BLOCK ══════════════════════════════════════ -->
	<section class="teams-wp-download-section" id="wp-download">
		<div class="teams-wp-download-inner">

			<div class="teams-wp-download-visual">
				<?php if ( $cover_img ) : ?>
					<img class="teams-wp-cover-img" src="<?php echo esc_url( $cover_img ); ?>" alt="Whitepaper cover" loading="lazy">
				<?php else : ?>
					<!-- Vinyl record placeholder matching Figma design -->
					<div class="teams-wp-record-wrap">
						<div class="teams-wp-record">
							<div class="teams-wp-record-disc">
								<div class="teams-wp-record-label">
									<span class="teams-wp-record-letter">S</span>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>

			<div class="teams-wp-download-form">
				<h2 class="teams-wp-download-heading"><?php echo esc_html( slingshot_lp_setting( $opt, 'wp_dl_heading', 'Download The Whitepaper' ) ); ?></h2>
				<p class="teams-wp-download-desc"><?php echo esc_html( slingshot_lp_setting( $opt, 'wp_dl_desc', 'Get instant access to our complete guide — no fluff, just the research and frameworks you need.' ) ); ?></p>

				<?php if ( $gf_id > 0 && function_exists( 'gravity_form' ) ) : ?>
					<?php gravity_form( $gf_id, false, false, false, null, true ); ?>
				<?php else :
					$file_url = slingshot_lp_setting( $opt, 'wp_dl_file_url', '' );
					$btn_text = slingshot_lp_setting( $opt, 'wp_dl_btn_text', 'Download Free Guide' );
					if ( $file_url ) : ?>
						<a href="<?php echo esc_url( $file_url ); ?>" class="teams-btn-primary teams-wp-download-btn" target="_blank" rel="noopener">
							<svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M9 2v10m0 0-3-3m3 3 3-3M2 14h14" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
							<?php echo esc_html( $btn_text ); ?>
						</a>
					<?php else : ?>
						<!-- No form / URL set yet — show placeholder form -->
						<form class="teams-wp-simple-form" onsubmit="return false;">
							<div class="teams-wp-form-group">
								<label for="wp-fname">First Name</label>
								<input type="text" id="wp-fname" placeholder="Jane">
							</div>
							<div class="teams-wp-form-group">
								<label for="wp-lname">Last Name</label>
								<input type="text" id="wp-lname" placeholder="Smith">
							</div>
							<div class="teams-wp-form-group teams-wp-form-group--full">
								<label for="wp-email">Work Email</label>
								<input type="email" id="wp-email" placeholder="jane@company.com">
							</div>
							<div class="teams-wp-form-group teams-wp-form-group--full">
								<label for="wp-company">Company</label>
								<input type="text" id="wp-company" placeholder="Your company">
							</div>
							<button type="submit" class="teams-btn-primary teams-wp-download-btn">
								<svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M9 2v10m0 0-3-3m3 3 3-3M2 14h14" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
								<?php echo esc_html( $btn_text ); ?>
							</button>
						</form>
					<?php endif; ?>
				<?php endif; ?>
			</div>

		</div>
	</section>

</div><!-- .teams-page-wrapper -->

<?php get_footer(); ?>
