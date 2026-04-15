<?php
/*
Template Name: Security Checklist Figma
 * Content: Edit Page meta fields (Meta Box).
 */

wp_enqueue_style( 'pages-figma-jakarta',  'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap', array(), null );
wp_enqueue_style( 'home-style',           get_stylesheet_directory_uri() . '/css/home.css',          array(), '1.18' );
wp_enqueue_style( 'service-figma-style',  get_stylesheet_directory_uri() . '/css/service-figma.css', array(), '1.6' );
wp_enqueue_style( 'pages-figma-style',    get_stylesheet_directory_uri() . '/css/pages-figma.css',   array(), '1.0' );
wp_enqueue_style( 'pages-figma-2-style',  get_stylesheet_directory_uri() . '/css/pages-figma-2.css', array(), '1.0' );
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

// ── Expect ────────────────────────────────────────────────────
$expect_heading = slingshot_pm( 'ldmg_expect_heading', 'What to Expect in This Checklist' );
$expect_cards   = slingshot_pm( 'ldmg_expect_cards', [] );
$expect_cards   = is_array( $expect_cards ) ? $expect_cards : [];
if ( empty( $expect_cards ) ) {
	$expect_cards = [
		[
			'icon_svg' => '<svg width="44" height="44" viewBox="0 0 44 44" fill="none"><rect width="44" height="44" rx="12" fill="#6D44B7" fill-opacity=".1"/><rect x="12" y="14" width="20" height="16" rx="3" stroke="#6D44B7" stroke-width="1.8"/><path d="M16 20h12M16 24h8" stroke="#6D44B7" stroke-width="1.5" stroke-linecap="round"/></svg>',
			'heading'  => 'Six Focus Areas',
			'desc'     => 'Including secure coding practices, authentication and authorization, data protection, compliance frameworks, security testing, and monitoring.',
		],
		[
			'icon_svg' => '<svg width="44" height="44" viewBox="0 0 44 44" fill="none"><rect width="44" height="44" rx="12" fill="#23B7B4" fill-opacity=".1"/><path d="M22 12l7 4v7l-7 4-7-4v-7z" stroke="#23B7B4" stroke-width="1.8" stroke-linejoin="round"/><path d="M22 20v7M15 16l7 4 7-4" stroke="#23B7B4" stroke-width="1.5" stroke-linecap="round"/></svg>',
			'heading'  => 'Security Quiz',
			'desc'     => 'Complete the security checklist to see how your company compares: are you a Malware Magnet or a Cybersecurity Champion?',
		],
		[
			'icon_svg' => '<svg width="44" height="44" viewBox="0 0 44 44" fill="none"><rect width="44" height="44" rx="12" fill="#6D44B7" fill-opacity=".1"/><path d="M22 11l7 3v7c0 4-3 7.5-7 9-4-1.5-7-5-7-9v-7z" stroke="#6D44B7" stroke-width="1.8" stroke-linejoin="round"/><path d="M18 22l2.5 2.5L26 19" stroke="#6D44B7" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>',
			'heading'  => 'Safety Rating',
			'desc'     => "Learn the security best practices you should use to improve your security, allowing you to focus on what's important.",
		],
	];
}

// ── Form ──────────────────────────────────────────────────────
$form_heading = slingshot_pm( 'ldmg_form_heading', 'Download The Checklist' );
$form_gf_id   = (int) slingshot_pm( 'ldmg_form_gf_id', 0 );
$form_dl_url  = slingshot_pm( 'ldmg_form_dl_url', '' ); // direct PDF download URL after submit
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
					<?php echo esc_html( $hero_btn_text ); ?> &darr;
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
		<h2 class="ldmg-form-heading"><?php echo esc_html( $form_heading ); ?></h2>
		<?php if ( $form_gf_id && function_exists( 'gravity_form' ) ) :
			gravity_form( $form_gf_id, false, false, false, null, true, 1 );
		else : ?>
		<form class="ldmg-form" method="post" action="#">
			<div class="ldmg-form-divider"></div>
			<div class="ldmg-form-row">
				<input type="text" class="ldmg-form-input" placeholder="Name*" required>
				<input type="email" class="ldmg-form-input" placeholder="Email*" required>
			</div>
			<input type="text" class="ldmg-form-input" placeholder="Company">
			<button type="submit" class="ldmg-form-submit">
				<?php echo esc_html( $hero_btn_text ); ?>
			</button>
		</form>
		<?php endif; ?>
	</section>

</div><!-- .ldmg-page-wrapper -->

<?php get_footer(); ?>
