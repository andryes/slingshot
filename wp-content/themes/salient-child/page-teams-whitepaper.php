<?php
/*
Template Name: Teams — Offshoring Whitepaper
 * Content: Edit Page (Meta Box fields on this template).
 */

wp_enqueue_style(
	'teams-jakarta',
	'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap',
	array(), null
);
wp_enqueue_style( 'home-style', get_stylesheet_directory_uri() . '/css/home.css', array(), '1.18' );
wp_enqueue_style( 'teams-style', get_stylesheet_directory_uri() . '/css/teams.css', array(), '1.3' );
wp_enqueue_style( 'teams-figma-skin', get_stylesheet_directory_uri() . '/css/teams-figma-skin.css', array( 'teams-style' ), '1.3' );
wp_enqueue_script( 'teams-script', get_stylesheet_directory_uri() . '/js/teams.js', array( 'jquery' ), '1.0', true );
wp_enqueue_script( 'hp-script', get_stylesheet_directory_uri() . '/js/home.js', array( 'jquery' ), '1.6', true );

get_header();

$img_dir = get_stylesheet_directory_uri() . '/img';

$sections = slingshot_pm( 'wp_sections_items', [] );
$sections = is_array( $sections ) ? $sections : [];

$gf_id = (int) slingshot_pm( 'wp_dl_gravity_form_id', 0 );
$cover_img = slingshot_pm_image( 'wp_dl_cover_img', '' );

$wp_icon_svg = static function ( $key ) {
	$icons = array(
		'globe'  => '<svg viewBox="0 0 42 42" fill="none" aria-hidden="true"><circle cx="21" cy="21" r="13" stroke="currentColor" stroke-width="2"/><path d="M8 21h26M21 8c4 4 6 8.4 6 13s-2 9-6 13M21 8c-4 4-6 8.4-6 13s2 9 6 13" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>',
		'search' => '<svg viewBox="0 0 42 42" fill="none" aria-hidden="true"><circle cx="18" cy="18" r="10" stroke="currentColor" stroke-width="2"/><path d="M25 25l9 9M30 17c2.4.4 4.3 2.4 4.7 4.8" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>',
		'check'  => '<svg viewBox="0 0 42 42" fill="none" aria-hidden="true"><circle cx="21" cy="21" r="13" stroke="currentColor" stroke-width="2"/><path d="M15 21l4 4 8-9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
		'shield' => '<svg viewBox="0 0 42 42" fill="none" aria-hidden="true"><path d="M21 6l13 5v9c0 8-5.3 13.5-13 16-7.7-2.5-13-8-13-16v-9l13-5Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="M15 21l4 4 8-9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
	);
	return isset( $icons[ $key ] ) ? $icons[ $key ] : $icons['globe'];
};

$wp_has_rows = static function ( $rows ) {
	if ( ! is_array( $rows ) || empty( $rows ) ) {
		return false;
	}
	foreach ( $rows as $row ) {
		if ( ! is_array( $row ) ) {
			continue;
		}
		foreach ( $row as $value ) {
			if ( ! is_array( $value ) && trim( (string) $value ) !== '' ) {
				return true;
			}
		}
	}
	return false;
};

if ( ! $wp_has_rows( $sections ) ) {
	$sections = array(
		array( 'icon_key' => 'globe', 'title' => "Introduction\nto Offshoring", 'desc' => 'Understand the growing challenges of finding quality developers in the US and how offshoring can provide a cost-effective solution.' ),
		array( 'icon_key' => 'search', 'title' => 'Regional Analysis', 'desc' => 'Dive into detailed profiles of four popular offshoring regions: Eastern Europe, Latin America, Ukraine, and India.' ),
		array( 'icon_key' => 'check', 'title' => 'Pros and Cons', 'desc' => 'Each region has advantages and challenges. Our whitepaper provides a clear comparison to find the best fit for you.' ),
		array( 'icon_key' => 'shield', 'title' => "Expert\nRecommendations", 'desc' => 'Benefit from our decades of experience in global development as we share best practices and tips for successful offshoring.' ),
	);
}
?>

<style id="dynamic-css-inline-css" type="text/css">
	body{overflow:visible}.no-rgba #header-space{display:none;}@media only screen and (max-width:999px){body #header-space[data-header-mobile-fixed="1"]{display:none;}#header-outer[data-mobile-fixed="false"]{position:absolute;}}@media only screen and (min-width:1000px){#header-space{display:none;}.nectar-slider-wrap.first-section,.parallax_slider_outer.first-section,.full-width-content.first-section{margin-top:0!important;}body #page-header-bg,body #page-header-wrap{height:142px;}body #search-outer{z-index:100000;}}
	body.page-template-page-teams-whitepaper #header-outer,
	body.page-template-page-teams-whitepaper #header-space { display:none !important; }
</style>

<?php
slingshot_render_redesign_header( array(
	'variant' => 'light',
	'cta_url' => slingshot_lp_h_attr( slingshot_pm( 'wp_header_cta_url', '/contact/?looking=Whitepaper' ) ),
	'cta_text' => slingshot_pm( 'wp_header_cta_text', "Let's talk" ),
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
					<span><?php echo esc_html( slingshot_pm( 'wp_hero_bc_parent', 'SERVICES / TEAMS' ) ); ?></span>
					<span class="teams-hero-sep">/</span>
					<span><?php echo esc_html( slingshot_pm( 'wp_hero_bc_leaf', 'WHITEPAPER' ) ); ?></span>
				</div>
				<h1 class="teams-hero-heading"><?php echo nl2br( esc_html( slingshot_pm( 'wp_hero_heading', "A Complete Guide\nto Selecting An\nOffshoring Region" ) ) ); ?></h1>
				<p class="teams-hero-subtext"><?php echo esc_html( slingshot_pm( 'wp_hero_subtext', 'Unlock the secrets to finding the perfect offshoring destination for your business with our in-depth whitepaper.' ) ); ?></p>
				<a href="<?php echo slingshot_lp_h_attr( slingshot_pm( 'wp_hero_cta_url', '#wp-download' ) ); ?>" class="teams-hero-btn">
					<?php echo esc_html( slingshot_pm( 'wp_hero_cta_text', 'Download Now' ) ); ?> <span>&#8594;</span>
				</a>
			</div>

			<div class="teams-hero-photos">
				<div class="teams-hero-photo-grid">
					<div class="teams-hero-photo teams-hero-photo-a">
						<?php $img_a = slingshot_pm_image( 'wp_hero_img_a', $img_dir . '/teams-hero-a.png' ); ?>
						<img src="<?php echo esc_url( $img_a ); ?>" alt="Offshoring guide">
					</div>
					<div class="teams-hero-photo teams-hero-photo-b">
						<?php $img_b = slingshot_pm_image( 'wp_hero_img_b', $img_dir . '/teams-hero-b.png' ); ?>
						<img src="<?php echo esc_url( $img_b ); ?>" alt="Global teams">
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ═══ WHAT TO EXPECT ══════════════════════════════════════ -->
	<section class="teams-wp-sections-section">
		<div class="teams-wp-sections-inner">
			<h2 class="teams-wp-sections-heading"><?php echo esc_html( slingshot_pm( 'wp_sections_heading', 'What to Expect in This Whitepaper' ) ); ?></h2>

			<?php if ( ! empty( $sections ) ) : ?>
			<div class="teams-wp-sections-grid">
				<?php foreach ( $sections as $sec ) : ?>
				<div class="teams-wp-section-card">
					<?php $icon_svg = ! empty( $sec['icon_svg'] ) ? (string) $sec['icon_svg'] : $wp_icon_svg( (string) ( $sec['icon_key'] ?? 'globe' ) ); ?>
					<div class="teams-wp-section-icon"><?php echo $icon_svg; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
					<h3 class="teams-wp-section-title"><?php echo nl2br( esc_html( (string) ( $sec['title'] ?? '' ) ) ); ?></h3>
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
				<h2 class="teams-wp-download-heading"><?php echo esc_html( slingshot_pm( 'wp_dl_heading', 'Download The Paper' ) ); ?></h2>
				<?php $download_desc = slingshot_pm( 'wp_dl_desc', '' ); if ( $download_desc ) : ?>
				<p class="teams-wp-download-desc"><?php echo esc_html( $download_desc ); ?></p>
				<?php endif; ?>

				<?php if ( $gf_id > 0 && function_exists( 'gravity_form' ) ) : ?>
					<?php gravity_form( $gf_id, false, false, false, null, true ); ?>
				<?php else :
					$file_url = slingshot_pm( 'wp_dl_file_url', '' );
					$btn_text = slingshot_pm( 'wp_dl_btn_text', 'Download Now' );
					if ( $file_url ) : ?>
						<a href="<?php echo esc_url( $file_url ); ?>" class="teams-btn-primary teams-wp-download-btn" target="_blank" rel="noopener">
							<svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M9 2v10m0 0-3-3m3 3 3-3M2 14h14" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
							<?php echo esc_html( $btn_text ); ?>
						</a>
					<?php else : ?>
						<!-- No form / URL set yet — show placeholder form -->
						<form class="teams-wp-simple-form" onsubmit="return false;">
							<div class="teams-wp-form-group">
								<label for="wp-name"><?php echo esc_html( slingshot_pm( 'wp_dl_name_label', 'Name' ) ); ?><span>*</span></label>
								<input type="text" id="wp-name">
							</div>
							<div class="teams-wp-form-group">
								<label for="wp-email"><?php echo esc_html( slingshot_pm( 'wp_dl_email_label', 'Email' ) ); ?><span>*</span></label>
								<input type="email" id="wp-email">
							</div>
							<div class="teams-wp-form-group teams-wp-form-group--full">
								<label for="wp-company"><?php echo esc_html( slingshot_pm( 'wp_dl_company_label', 'Company' ) ); ?></label>
								<input type="text" id="wp-company">
							</div>
							<button type="submit" class="teams-btn-primary teams-wp-download-btn">
								<?php echo esc_html( slingshot_pm( 'wp_dl_btn_text', 'Download Now' ) ); ?>
							</button>
						</form>
					<?php endif; ?>
				<?php endif; ?>
			</div>

		</div>
	</section>

</div><!-- .teams-page-wrapper -->

<?php get_footer(); ?>
