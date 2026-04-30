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
wp_enqueue_style( 'service-figma-style', get_stylesheet_directory_uri() . '/css/service-figma.css', array(), '2.3' );
wp_enqueue_style( 'pages-figma-style',   get_stylesheet_directory_uri() . '/css/pages-figma.css',   array(), '1.2' );
wp_enqueue_script( 'hp-script',          get_stylesheet_directory_uri() . '/js/home.js',             array( 'jquery' ), '1.6', true );

get_header();

$page_title   = slingshot_pm( 'leg_title', get_the_title() );
$last_updated = slingshot_pm( 'leg_last_updated', '' );
$legal_clock_icon = '<svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><circle cx="10" cy="10" r="7.2" stroke="currentColor" stroke-width="1.7"/><path d="M10 6.2v4.2l2.8 1.7" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>';
?>
<style>
	body.page-template-page-legal-figma #header-outer,
	body.page-template-page-legal-figma #header-space { display:none !important; }
</style>

<?php
slingshot_render_redesign_header(
	array(
		'variant'  => 'light',
		'cta_text' => slingshot_pm( 'leg_header_cta_text', "Let's talk" ),
		'cta_url'  => slingshot_lp_h_attr( slingshot_pm( 'leg_header_cta_url', '/contact/' ) ),
	)
);
?>

<div class="leg-page-wrapper">

	<!-- ── HERO ──────────────────────────────────────────── -->
	<section class="leg-hero">
		<div class="leg-hero-inner">
			<h1 class="leg-hero-title"><?php echo esc_html( $page_title ); ?></h1>
			<?php if ( $last_updated ) : ?>
			<p class="leg-hero-updated">
				<?php echo $legal_clock_icon; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				Last updated <?php echo esc_html( $last_updated ); ?>
			</p>
			<?php endif; ?>
		</div>
	</section>

	<!-- ── CONTENT ───────────────────────────────────────── -->
	<div class="leg-content-wrap">
		<div class="leg-content">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					if ( '' !== trim( get_the_content() ) ) {
						the_content();
					} elseif ( function_exists( 'slingshot_lp_default_legal_content' ) ) {
						echo wp_kses_post( slingshot_lp_default_legal_content() );
					}
				endwhile;
			endif;
			?>
		</div>
	</div>

</div><!-- .leg-page-wrapper -->

<?php get_footer(); ?>
