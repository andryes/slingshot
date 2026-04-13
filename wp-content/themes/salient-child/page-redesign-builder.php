<?php
/**
 * Template Name: Redesign — WPBakery
 *
 * Page body: Edit Page → Backend Editor or WPBakery Page Builder.
 * Section styles: meta box "Redesign · Assets & header" (skin + header).
 */

$child_uri = get_stylesheet_directory_uri();
$child_dir = get_stylesheet_directory();

wp_enqueue_style(
	'slingshot-redesign-jakarta',
	'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap',
	array(),
	null
);
wp_enqueue_style( 'slingshot-redesign-builder', $child_uri . '/css/redesign-builder.css', array(), '1.0' );
wp_enqueue_script( 'hp-script', $child_uri . '/js/home.js', array( 'jquery' ), '1.6', true );

$skin = slingshot_redesign_builder_skin();

wp_enqueue_style( 'home-style', $child_uri . '/css/home.css', array(), '1.18' );

if ( 'consulting' === $skin ) {
	wp_enqueue_style( 'consulting-style', $child_uri . '/css/consulting.css', array( 'home-style' ), '1.0' );
	wp_enqueue_script( 'consulting-script', $child_uri . '/js/consulting.js', array( 'jquery' ), '1.1', true );
}

if ( 'bootcamp' === $skin ) {
	wp_enqueue_style( 'bootcamp-style', $child_uri . '/css/bootcamp.css', array( 'home-style' ), '1.0' );
	wp_enqueue_script( 'bootcamp-script', $child_uri . '/js/bootcamp.js', array( 'jquery' ), '1.0', true );
}

if ( 'ai' === $skin ) {
	wp_enqueue_style( 'ai-style', $child_uri . '/css/updated.css', array( 'home-style' ), '1.1' );
	wp_enqueue_script( 'ai-script', $child_uri . '/js/updated.js', array( 'jquery' ), '1.1', true );
}

if ( in_array( $skin, array( 'teams', 'teams-dedicated', 'teams-staffaug', 'teams-whitepaper' ), true ) ) {
	wp_enqueue_style( 'teams-style', $child_uri . '/css/teams.css', array( 'home-style' ), '1.0' );
	wp_enqueue_script( 'teams-script', $child_uri . '/js/teams.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_style( 'teams-figma-skin', $child_uri . '/css/teams-figma-skin.css', array( 'teams-style' ), '1.0' );
}

get_header();

$hide_header = function_exists( 'rwmb_meta' ) ? rwmb_meta( 'slingshot_rb_hide_redesign_header', array(), get_the_ID() ) : get_post_meta( get_the_ID(), 'slingshot_rb_hide_redesign_header', true );
$hide_header = ! empty( $hide_header );

$header_variant = function_exists( 'rwmb_meta' ) ? (string) rwmb_meta( 'slingshot_rb_header_variant', array(), get_the_ID() ) : (string) get_post_meta( get_the_ID(), 'slingshot_rb_header_variant', true );
if ( $header_variant !== 'dark' ) {
	$header_variant = 'light';
}

$cta_url = function_exists( 'rwmb_meta' ) ? (string) rwmb_meta( 'slingshot_rb_header_cta_url', array(), get_the_ID() ) : (string) get_post_meta( get_the_ID(), 'slingshot_rb_header_cta_url', true );
if ( $cta_url === '' ) {
	$cta_url = '/contact';
}
$cta_text = function_exists( 'rwmb_meta' ) ? (string) rwmb_meta( 'slingshot_rb_header_cta_text', array(), get_the_ID() ) : (string) get_post_meta( get_the_ID(), 'slingshot_rb_header_cta_text', true );
if ( $cta_text === '' ) {
	$cta_text = "Let's talk";
}

$cta_href = function_exists( 'slingshot_lp_h_attr' ) ? slingshot_lp_h_attr( $cta_url ) : esc_url( $cta_url );
?>

<style id="sl-redesign-builder-inline" type="text/css">
	body{overflow:visible}.no-rgba #header-space{display:none;}@media only screen and (max-width:999px){body #header-space[data-header-mobile-fixed="1"]{display:none;}#header-outer[data-mobile-fixed="false"]{position:absolute;}}@media only screen and (min-width:1000px){#header-space{display:none;}.nectar-slider-wrap.first-section,.parallax_slider_outer.first-section,.full-width-content.first-section{margin-top:0!important;}body #page-header-bg,body #page-header-wrap{height:142px;}body #search-outer{z-index:100000;}}
	body.sl-redesign-builder-page #header-outer,
	body.sl-redesign-builder-page #header-space { display:none !important; }
</style>

<?php if ( ! $hide_header ) : ?>
	<?php
	slingshot_render_redesign_header(
		array(
			'variant'  => $header_variant,
			'cta_url'  => $cta_href,
			'cta_text' => $cta_text,
		)
	);
	?>
<?php endif; ?>

<div class="sl-redesign-main">
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			the_content();
		endwhile;
	endif;
	?>
</div>

<?php
get_footer();
