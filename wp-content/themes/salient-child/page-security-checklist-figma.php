<?php
/*
Template Name: Security Checklist Figma
 * Content: Edit Page meta fields (Meta Box).
 */

wp_enqueue_style( 'pages-figma-jakarta',  'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap', array(), null );
wp_enqueue_style( 'home-style',           get_stylesheet_directory_uri() . '/css/home.css',          array(), '1.18' );
wp_enqueue_style( 'service-figma-style',  get_stylesheet_directory_uri() . '/css/service-figma.css', array(), '1.6' );
wp_enqueue_style( 'pages-figma-style',    get_stylesheet_directory_uri() . '/css/pages-figma.css',   array(), '1.0' );
wp_enqueue_style( 'pages-figma-2-style',  get_stylesheet_directory_uri() . '/css/pages-figma-2.css', array(), '1.4' );
wp_enqueue_script( 'hp-script',           get_stylesheet_directory_uri() . '/js/home.js',            array( 'jquery' ), '1.6', true );

get_header();

$img_dir = get_stylesheet_directory_uri() . '/img';

// ── Hero ──────────────────────────────────────────────────────
$hero_label    = slingshot_pm( 'ldmg_hero_label',    'RESOURCES / SECURITY' );
$hero_heading  = slingshot_pm( 'ldmg_hero_heading',  'The Security Checklist' );
$hero_desc     = slingshot_pm( 'ldmg_hero_desc',     'Your checklist to comprehensive software security, from secure coding practices to incident response and continuous improvement.' );
$hero_btn_text = slingshot_pm( 'ldmg_hero_btn_text', 'Download Now' );
$hero_img_a    = slingshot_pm_image( 'ldmg_hero_img_a', '' );
$hero_img_b    = slingshot_pm_image( 'ldmg_hero_img_b', '' );
if ( ! $hero_img_a ) {
	$hero_img_a = $img_dir . '/security-checklist-hero-a.png';
}
if ( ! $hero_img_b ) {
	$hero_img_b = $img_dir . '/security-checklist-hero-b.png';
}

// ── Expect ────────────────────────────────────────────────────
$expect_heading = slingshot_pm( 'ldmg_expect_heading', 'What to Expect in This Checklist' );
$expect_cards   = slingshot_pm( 'ldmg_expect_cards', [] );
$expect_cards   = is_array( $expect_cards ) ? $expect_cards : [];
if ( empty( $expect_cards ) ) {
	$expect_cards = [
		[
			'icon_svg' => '<svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.5 14.5v-3h3M30.5 14.5v-3h-3M13.5 29.5v3h3M30.5 29.5v3h-3" stroke="#8B52F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><circle cx="22" cy="22" r="8" stroke="#8B52F6" stroke-width="2"/></svg>',
			'heading'  => 'Six Focus Areas',
			'desc'     => 'including secure coding practices, authentication and authorization, data protection, security testing, infrastructure security, and incident response and monitoring.',
		],
		[
			'icon_svg' => '<svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="22" cy="22" r="19" stroke="#F04A6B" stroke-width="2"/><rect x="14.5" y="20" width="15" height="11" rx="3" stroke="#F04A6B" stroke-width="2"/><path d="M18 20v-4a4 4 0 0 1 8 0v4" stroke="#F04A6B" stroke-width="2" stroke-linecap="round"/></svg>',
			'heading'  => 'Security Quiz',
			'desc'     => 'Complete the security rating to see how you compare: are you a Malware Magnet or a Cybersecurity Champion?',
		],
		[
			'icon_svg' => '<svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M26.5 3.5C36.5 8.5 39 21 32 31.5C25.2 41.7 12.5 39.5 7.8 29.5C3.3 20 7.6 9.2 17.5 5.2" stroke="#2D7DFF" stroke-width="2" stroke-linecap="round"/><path d="M15.5 23.5l4.5 4.5 9-13" stroke="#2D7DFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
			'heading'  => 'Safety Rating',
			'desc'     => "Learn the security best practices you should use to improve your security, allowing you to focus on what's important.",
		],
	];
}

// ── Form ──────────────────────────────────────────────────────
$form_heading = slingshot_pm( 'ldmg_form_heading', 'Download The Checklist' );
$form_gf_id   = (int) slingshot_pm( 'ldmg_form_gf_id', 0 );
$form_dl_url  = slingshot_pm( 'ldmg_form_dl_url', '' ); // direct PDF download URL after submit
$form_name_placeholder    = slingshot_pm( 'ldmg_form_name_placeholder', 'Name*' );
$form_email_placeholder   = slingshot_pm( 'ldmg_form_email_placeholder', 'Email*' );
$form_company_placeholder = slingshot_pm( 'ldmg_form_company_placeholder', 'Company' );
$form_submit              = slingshot_pm( 'ldmg_form_submit', $hero_btn_text );
$ldmg_field_label = static function ( $label ) {
	$label = trim( (string) $label );
	if ( substr( $label, -1 ) === '*' ) {
		return esc_html( trim( substr( $label, 0, -1 ) ) ) . '<span class="ldmg-required" aria-hidden="true">*</span>';
	}
	return esc_html( $label );
};
?>
<style>
body.page-template-page-security-checklist-figma #header-outer,
body.page-template-page-security-checklist-figma #header-space { display:none !important; }
</style>

<?php slingshot_render_redesign_header( array( 'variant' => 'light' ) ); ?>

<div class="ldmg-page-wrapper">

	<!-- ── HERO ──────────────────────────────────────────── -->
	<section class="fig-hero">
		<div class="fig-hero-blob fig-hero-blob-1"></div>
		<div class="fig-hero-blob fig-hero-blob-2"></div>

		<div class="ldmg-hero-inner">
			<div>
				<?php if ( $hero_label ) : ?>
				<div class="ldmg-hero-label"><?php echo esc_html( $hero_label ); ?></div>
				<?php endif; ?>
				<h1 class="ldmg-hero-heading"><?php echo esc_html( $hero_heading ); ?></h1>
				<?php if ( $hero_desc ) : ?>
				<p class="ldmg-hero-desc"><?php echo esc_html( $hero_desc ); ?></p>
				<?php endif; ?>
				<button type="button" class="ldmg-hero-btn" onclick="document.getElementById('ldmg-download-form').scrollIntoView({behavior:'smooth'})">
					<?php echo esc_html( $hero_btn_text ); ?> <span aria-hidden="true">&rarr;</span>
				</button>
			</div>

			<?php if ( $hero_img_a || $hero_img_b ) : ?>
			<div class="ldmg-hero-imgs">
				<?php if ( $hero_img_a ) : ?>
				<div class="ldmg-hero-img" style="aspect-ratio:2/3;">
					<img src="<?php echo esc_url( $hero_img_a ); ?>" alt="" style="height:100%;">
				</div>
				<?php endif; ?>
				<?php if ( $hero_img_b ) : ?>
				<div class="ldmg-hero-img" style="aspect-ratio:1;">
					<img src="<?php echo esc_url( $hero_img_b ); ?>" alt="">
				</div>
				<?php endif; ?>
			</div>
			<?php endif; ?>
		</div>
	</section>

	<!-- ── WHAT TO EXPECT ────────────────────────────────── -->
	<section class="ldmg-expect-section">
		<h2 class="fig-section-heading"><?php echo esc_html( $expect_heading ); ?></h2>
		<div class="ldmg-expect-grid">
			<?php foreach ( $expect_cards as $card ) : ?>
			<div class="ldmg-expect-card">
				<?php if ( ! empty( $card['icon_svg'] ) ) : ?>
				<div class="ldmg-expect-icon"><?php echo $card['icon_svg']; ?></div>
				<?php endif; ?>
				<h3 class="ldmg-expect-heading"><?php echo esc_html( $card['heading'] ?? '' ); ?></h3>
				<p class="ldmg-expect-desc"><?php echo esc_html( $card['desc'] ?? '' ); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
	</section>

	<!-- ── DOWNLOAD FORM ─────────────────────────────────── -->
	<section class="ldmg-form-section" id="ldmg-download-form">
		<div class="ldmg-form-card">
			<h2 class="ldmg-form-heading"><?php echo esc_html( $form_heading ); ?></h2>
			<?php if ( $form_gf_id && function_exists( 'gravity_form' ) ) :
				gravity_form( $form_gf_id, false, false, false, null, true, 1 );
			else : ?>
			<form class="ldmg-form" method="post" action="<?php echo esc_url( $form_dl_url ? $form_dl_url : '#' ); ?>"<?php echo $form_dl_url ? ' target="_blank"' : ''; ?>>
				<div class="ldmg-form-divider"></div>
				<div class="ldmg-form-row">
					<label class="ldmg-form-field">
						<input type="text" class="ldmg-form-input" placeholder=" " aria-label="<?php echo esc_attr( $form_name_placeholder ); ?>" autocomplete="name" required>
						<span class="ldmg-form-label"><?php echo $ldmg_field_label( $form_name_placeholder ); ?></span>
					</label>
					<label class="ldmg-form-field">
						<input type="email" class="ldmg-form-input" placeholder=" " aria-label="<?php echo esc_attr( $form_email_placeholder ); ?>" autocomplete="email" required>
						<span class="ldmg-form-label"><?php echo $ldmg_field_label( $form_email_placeholder ); ?></span>
					</label>
				</div>
				<label class="ldmg-form-field ldmg-form-field--company">
					<input type="text" class="ldmg-form-input" placeholder=" " aria-label="<?php echo esc_attr( $form_company_placeholder ); ?>" autocomplete="organization">
					<span class="ldmg-form-label"><?php echo $ldmg_field_label( $form_company_placeholder ); ?></span>
				</label>
				<button type="submit" class="ldmg-form-submit">
					<?php echo esc_html( $form_submit ); ?>
				</button>
			</form>
			<?php endif; ?>
		</div>
	</section>

</div><!-- .ldmg-page-wrapper -->

<?php get_footer(); ?>
