<?php
/*
Template Name: Legal Figma
 * Content: WordPress editor content + Meta Box for header fields.
 * Use for: Terms and Conditions, Privacy Policy, and similar legal pages.
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

$page_title   = slingshot_pm( 'leg_title', get_the_title() );
$last_updated = slingshot_pm( 'leg_last_updated', '' );
?>
<style>
	body.page-template-page-legal-figma #header-outer,
	body.page-template-page-legal-figma #header-space { display:none !important; }
</style>

<?php slingshot_render_redesign_header( array( 'variant' => 'light' ) ); ?>

<div class="leg-page-wrapper">

	<!-- ── HERO ──────────────────────────────────────────── -->
	<section class="leg-hero">
		<div class="leg-hero-blob leg-hero-blob-1"></div>
		<div class="leg-hero-inner">
			<div class="leg-hero-label">LEGAL</div>
			<h1 class="leg-hero-title"><?php echo esc_html( $page_title ); ?></h1>
			<?php if ( $last_updated ) : ?>
			<p class="leg-hero-updated">Last updated: <?php echo esc_html( $last_updated ); ?></p>
			<?php endif; ?>
		</div>
	</section>

	<!-- ── CONTENT ───────────────────────────────────────── -->
	<div class="leg-content-wrap">
		<div class="leg-content">
			<?php the_content(); ?>
		</div>
	</div>

</div><!-- .leg-page-wrapper -->

<?php get_footer(); ?>
