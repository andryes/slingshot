<?php
/*
Template Name: Case Study Figma
 * Content: Edit Page meta fields (Meta Box).
 */

wp_enqueue_style(
	'pages-figma-jakarta',
	'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap',
	array(), null
);
wp_enqueue_style( 'home-style',          get_stylesheet_directory_uri() . '/css/home.css',          array(), '1.18' );
wp_enqueue_style( 'service-figma-style', get_stylesheet_directory_uri() . '/css/service-figma.css', array(), '1.6' );
wp_enqueue_style( 'pages-figma-style',   get_stylesheet_directory_uri() . '/css/pages-figma.css',   array(), '1.0' );
wp_enqueue_script( 'hp-script',          get_stylesheet_directory_uri() . '/js/home.js',             array( 'jquery' ), '1.6', true );

get_header();

$img_dir     = get_stylesheet_directory_uri() . '/img';
$mascot_path = get_stylesheet_directory() . '/img/cta-mascot.png';
$mascot_url  = $img_dir . '/cta-mascot.png';

// Meta
$client  = slingshot_pm( 'cs_hero_client',  '' );
$title   = slingshot_pm( 'cs_hero_title',   get_the_title() );
$tags_raw = slingshot_pm( 'cs_hero_tags',   '' );
$tags    = $tags_raw ? array_filter( array_map( 'trim', explode( ',', $tags_raw ) ) ) : array();
$hero_img = slingshot_pm_image( 'cs_hero_img', '' );

$challenge_label   = slingshot_pm( 'cs_challenge_label',   'Challenge' );
$challenge_heading = slingshot_pm( 'cs_challenge_heading', '' );
$challenge_text    = slingshot_pm( 'cs_challenge_text',    '' );

$sections = slingshot_pm( 'cs_sections', array() );
if ( ! is_array( $sections ) ) { $sections = array(); }

$cta_heading  = slingshot_pm( 'cs_cta_heading',  'Ready to Launch Something Bold?' );
$cta_desc     = slingshot_pm( 'cs_cta_desc',     "We partner with ambitious companies to design and build products people love. Let's talk." );
$cta_btn_text = slingshot_pm( 'cs_cta_btn_text', "Let's Talk" );
$cta_btn_url  = slingshot_pm( 'cs_cta_btn_url',  '/contact/' );
?>
<style>
	body.page-template-page-case-study-figma #header-outer,
	body.page-template-page-case-study-figma #header-space { display:none !important; }
</style>

<?php slingshot_render_redesign_header( array( 'variant' => 'light' ) ); ?>

<div class="cs-page-wrapper">

	<!-- ── HERO ──────────────────────────────────────────── -->
	<section class="cs-hero">
		<div class="cs-hero-blob cs-hero-blob-1"></div>
		<div class="cs-hero-blob cs-hero-blob-2"></div>

		<div class="cs-hero-inner">
			<?php if ( $client ) : ?>
			<div class="cs-hero-breadcrumb">
				<span>WORK</span>
				<span class="cs-hero-sep">/</span>
				<span><?php echo esc_html( strtoupper( $client ) ); ?></span>
			</div>
			<?php endif; ?>

			<?php if ( $tags ) : ?>
			<div class="cs-hero-tags">
				<?php foreach ( $tags as $tag ) : ?>
				<span class="cs-hero-tag"><?php echo esc_html( $tag ); ?></span>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>

			<h1 class="cs-hero-heading"><?php echo esc_html( $title ); ?></h1>

			<?php if ( $client ) : ?>
			<div class="cs-hero-client"><?php echo esc_html( $client ); ?></div>
			<?php endif; ?>

			<?php if ( $hero_img ) : ?>
			<div class="cs-hero-img-wrap">
				<img src="<?php echo esc_url( $hero_img ); ?>" alt="<?php echo esc_attr( $title ); ?>">
			</div>
			<?php endif; ?>
		</div>
	</section>

	<!-- ── CHALLENGE ─────────────────────────────────────── -->
	<?php if ( $challenge_text || $challenge_heading ) : ?>
	<section class="cs-challenge-section">
		<?php if ( $challenge_label ) : ?>
		<div class="cs-challenge-label"><?php echo esc_html( $challenge_label ); ?></div>
		<?php endif; ?>
		<?php if ( $challenge_heading ) : ?>
		<h2 class="cs-challenge-heading"><?php echo esc_html( $challenge_heading ); ?></h2>
		<?php endif; ?>
		<?php if ( $challenge_text ) : ?>
		<div class="cs-challenge-text">
			<?php foreach ( explode( "\n\n", $challenge_text ) as $para ) :
				$para = trim( $para );
				if ( $para ) : ?>
			<p><?php echo esc_html( $para ); ?></p>
			<?php endif; endforeach; ?>
		</div>
		<?php endif; ?>
	</section>
	<?php endif; ?>

	<!-- ── FEATURE SECTIONS ──────────────────────────────── -->
	<?php foreach ( $sections as $idx => $sec ) :
		$sec_heading = $sec['heading'] ?? '';
		$sec_label   = $sec['label']   ?? '';
		$sec_desc    = $sec['desc']    ?? '';
		$sec_img_id  = $sec['image']   ?? '';
		$sec_img     = $sec_img_id ? slingshot_lp_attachment_url( $sec_img_id, '', 'large' ) : '';
		$sec_side    = $sec['image_side'] ?? 'right'; // 'left' or 'right'
		$sec_bullets_raw = $sec['bullets'] ?? '';
		$sec_bullets = $sec_bullets_raw ? array_filter( array_map( 'trim', explode( "\n", $sec_bullets_raw ) ) ) : array();
		$sec_dark    = ! empty( $sec['dark_bg'] );
		$reversed    = ( 'left' === $sec_side ) ? ' cs-section--reversed' : '';
		$dark_cls    = $sec_dark ? ' cs-section--dark' : '';
	?>
	<section class="cs-section<?php echo esc_attr( $dark_cls ); ?>">
		<div class="cs-section-inner<?php echo esc_attr( $reversed ); ?>">
			<?php if ( $sec_img ) : ?>
			<div class="cs-section-img">
				<img src="<?php echo esc_url( $sec_img ); ?>" alt="<?php echo esc_attr( $sec_heading ); ?>" loading="lazy">
			</div>
			<?php endif; ?>

			<div class="cs-section-text-body">
				<?php if ( $sec_label ) : ?>
				<div class="cs-section-label"><?php echo esc_html( $sec_label ); ?></div>
				<?php endif; ?>
				<?php if ( $sec_heading ) : ?>
				<h2 class="cs-section-heading"><?php echo esc_html( $sec_heading ); ?></h2>
				<?php endif; ?>
				<?php if ( $sec_desc ) : ?>
				<p class="cs-section-desc"><?php echo nl2br( esc_html( $sec_desc ) ); ?></p>
				<?php endif; ?>
				<?php if ( $sec_bullets ) : ?>
				<ul class="cs-section-bullets">
					<?php foreach ( $sec_bullets as $bullet ) : ?>
					<li class="cs-section-bullet"><?php echo esc_html( $bullet ); ?></li>
					<?php endforeach; ?>
				</ul>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<?php endforeach; ?>

	<!-- ── WP EDITOR CONTENT (optional extra content) ────── -->
	<?php
	$content = get_the_content();
	if ( $content ) :
	?>
	<div class="cs-challenge-section" style="margin-top:20px;">
		<div class="leg-content">
			<?php the_content(); ?>
		</div>
	</div>
	<?php endif; ?>

	<!-- ── BOTTOM CTA ────────────────────────────────────── -->
	<section class="cs-cta-section">
		<div class="cs-cta-blob"></div>
		<div class="cs-cta-mascot">
			<?php if ( file_exists( $mascot_path ) ) : ?>
			<img src="<?php echo esc_url( $mascot_url ); ?>" alt="Slingshot mascot">
			<?php endif; ?>
		</div>
		<div class="cs-cta-body">
			<h2 class="cs-cta-heading"><?php echo esc_html( $cta_heading ); ?></h2>
			<?php if ( $cta_desc ) : ?>
			<p class="cs-cta-desc"><?php echo esc_html( $cta_desc ); ?></p>
			<?php endif; ?>
			<a href="<?php echo slingshot_lp_h_attr( $cta_btn_url ); ?>" class="cs-cta-btn">
				<?php echo esc_html( $cta_btn_text ); ?> &rarr;
			</a>
		</div>
	</section>

</div><!-- .cs-page-wrapper -->

<?php get_footer(); ?>
