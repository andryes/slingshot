<?php
/**
 * Shared WPBakery / post_content layout shell (CSS, header chrome, the_content).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * True when the page stores WPBakery markup in post_content.
 *
 * @param int|null $post_id Page ID; defaults to current singular page.
 */
function slingshot_page_uses_wpbakery_output( $post_id = null ) {
	$post_id = $post_id ? (int) $post_id : get_queried_object_id();
	if ( ! $post_id ) {
		return false;
	}
	$post = get_post( $post_id );
	if ( ! $post || 'page' !== $post->post_type ) {
		return false;
	}
	return strpos( (string) $post->post_content, '[vc_' ) !== false;
}

/**
 * Explicit switch for using WPBakery shell on legacy redesign templates.
 *
 * Default is OFF to protect template-driven redesign pages from old VC content.
 * Enable per-page with custom field: slingshot_use_wpb_shell = 1
 *
 * @param int|null $post_id Page ID; defaults to current queried object.
 * @return bool
 */
function slingshot_use_wpb_shell_enabled( $post_id = null ) {
	$post_id = $post_id ? (int) $post_id : get_queried_object_id();
	if ( ! $post_id ) {
		return false;
	}

	$enabled = get_post_meta( $post_id, 'slingshot_use_wpb_shell', true );
	return ! empty( $enabled );
}

/**
 * Enqueue redesign assets for a given skin (same bundles as page-redesign-builder.php).
 *
 * @param string $skin Normalized skin slug.
 */
function slingshot_redesign_enqueue_for_skin( $skin ) {
	$skin      = slingshot_redesign_normalize_skin( $skin );
	$child_uri = get_stylesheet_directory_uri();

	wp_enqueue_style(
		'slingshot-redesign-jakarta',
		'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap',
		array(),
		null
	);
	wp_enqueue_style( 'slingshot-redesign-builder', $child_uri . '/css/redesign-builder.css', array(), '1.0' );
	wp_enqueue_script( 'hp-script', $child_uri . '/js/home.js', array( 'jquery' ), '1.6', true );
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
}

/**
 * Inline CSS shared with page-redesign-builder.php.
 */
function slingshot_redesign_print_builder_layout_styles() {
	?>
<style id="sl-redesign-builder-inline" type="text/css">
	body{overflow:visible}.no-rgba #header-space{display:none;}@media only screen and (max-width:999px){body #header-space[data-header-mobile-fixed="1"]{display:none;}#header-outer[data-mobile-fixed="false"]{position:absolute;}}@media only screen and (min-width:1000px){#header-space{display:none;}.nectar-slider-wrap.first-section,.parallax_slider_outer.first-section,.full-width-content.first-section{margin-top:0!important;}body #page-header-bg,body #page-header-wrap{height:142px;}body #search-outer{z-index:100000;}}
	body.sl-redesign-builder-page #header-outer,
	body.sl-redesign-builder-page #header-space { display:none !important; }
</style>
	<?php
}

/**
 * Redesign header + main column (WPBakery output).
 *
 * @param int $post_id Page ID for meta (header options).
 */
function slingshot_redesign_print_builder_chrome_and_content( $post_id ) {
	$hide_header = function_exists( 'rwmb_meta' ) ? rwmb_meta( 'slingshot_rb_hide_redesign_header', array(), $post_id ) : get_post_meta( $post_id, 'slingshot_rb_hide_redesign_header', true );
	$hide_header = ! empty( $hide_header );

	$header_variant = function_exists( 'rwmb_meta' ) ? (string) rwmb_meta( 'slingshot_rb_header_variant', array(), $post_id ) : (string) get_post_meta( $post_id, 'slingshot_rb_header_variant', true );
	if ( 'dark' !== $header_variant ) {
		$header_variant = 'light';
	}

	$cta_url = function_exists( 'rwmb_meta' ) ? (string) rwmb_meta( 'slingshot_rb_header_cta_url', array(), $post_id ) : (string) get_post_meta( $post_id, 'slingshot_rb_header_cta_url', true );
	if ( '' === $cta_url ) {
		$cta_url = '/contact';
	}
	$cta_text = function_exists( 'rwmb_meta' ) ? (string) rwmb_meta( 'slingshot_rb_header_cta_text', array(), $post_id ) : (string) get_post_meta( $post_id, 'slingshot_rb_header_cta_text', true );
	if ( '' === $cta_text ) {
		$cta_text = "Let's talk";
	}

	$cta_href = function_exists( 'slingshot_lp_h_attr' ) ? slingshot_lp_h_attr( $cta_url ) : esc_url( $cta_url );

	slingshot_redesign_print_builder_layout_styles();

	if ( ! $hide_header ) {
		slingshot_render_redesign_header(
			array(
				'variant'  => $header_variant,
				'cta_url'  => $cta_href,
				'cta_text' => $cta_text,
			)
		);
	}
	?>
<div class="sl-redesign-main">
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			$content = trim( (string) get_the_content() );
			if ( $content !== '' ) {
				the_content();
				continue;
			}

			$mockup_url = (string) get_post_meta( $post_id, 'sl_figma_mockup_url', true );
			$mockup_url = slingshot_lp_h_attr( $mockup_url );
			if ( $mockup_url !== '' ) :
				?>
				<section class="sl-redesign-figma-fallback">
					<div class="sl-redesign-figma-fallback__inner">
						<img src="<?php echo esc_url( $mockup_url ); ?>" alt="<?php echo esc_attr( get_the_title( $post_id ) ); ?>" loading="lazy">
					</div>
				</section>
				<?php
			endif;
		endwhile;
	endif;
	?>
</div>
	<?php
}

/**
 * When a legacy PHP template page has WPBakery in the editor, render the redesign shell instead.
 *
 * @param string $skin Skin key matching "Redesign · Assets & header" options.
 * @return bool True if the shell was rendered (caller should return from template).
 */
function slingshot_redesign_maybe_output_shell_from_legacy( $skin ) {
	$post_id = get_queried_object_id();
	if ( ! $post_id || ! slingshot_use_wpb_shell_enabled( $post_id ) || ! slingshot_page_uses_wpbakery_output( $post_id ) ) {
		return false;
	}

	$skin = slingshot_redesign_normalize_skin( $skin );
	$GLOBALS['slingshot_redesign_forced_skin'] = $skin;
	$GLOBALS['slingshot_redesign_wpb_shell']   = true;

	slingshot_redesign_enqueue_for_skin( $skin );
	get_header();
	slingshot_redesign_print_builder_chrome_and_content( $post_id );
	get_footer();

	unset( $GLOBALS['slingshot_redesign_forced_skin'], $GLOBALS['slingshot_redesign_wpb_shell'] );
	return true;
}
