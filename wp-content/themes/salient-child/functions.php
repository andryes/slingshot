<?php
/* Write your awesome functions below */

require_once get_stylesheet_directory() . '/inc/home-settings.php';
require_once get_stylesheet_directory() . '/inc/landing-pages-helpers.php';
require_once get_stylesheet_directory() . '/inc/landing-pages-settings.php';
require_once get_stylesheet_directory() . '/inc/landing-pages-seed.php';
require_once get_stylesheet_directory() . '/inc/page-redesign-builder.php';
require_once get_stylesheet_directory() . '/inc/redesign-wpbakery-shell.php';

/**
 * Render unified redesign header used across landing pages.
 *
 * @param array<string,string> $args Header options.
 */
function slingshot_render_redesign_header( $args = array() ) {
	$defaults = array(
		'variant'          => 'dark',
		'logo_url'         => '',
		'logo_alt'         => 'Slingshot',
		'cta_text'         => "Let's talk",
		'cta_url'          => '/contact',
		'mobile_menu_text' => 'Menu',
	);
	$args = wp_parse_args( $args, $defaults );

	$menu_location = has_nav_menu( 'top_nav' ) ? 'top_nav' : ( has_nav_menu( 'main-menu' ) ? 'main-menu' : '' );
	$logo_url      = $args['logo_url'];

	if ( ! $logo_url && function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
		$logo_id  = get_theme_mod( 'custom_logo' );
		$logo_url = $logo_id ? wp_get_attachment_image_url( $logo_id, 'full' ) : '';
	}
	if ( ! $logo_url ) {
		$logo_url = ( 'light' === $args['variant'] ) ? '/wp-content/uploads/2020/02/logo-dark.svg' : '/wp-content/uploads/2020/02/logo-light.svg';
	}
	?>
	<header class="home-site-header <?php echo ( 'light' === $args['variant'] ) ? 'home-site-header--light' : ''; ?>" id="homeSiteHeader">
		<div class="home-site-header-inner">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="home-site-logo" aria-label="Home">
				<img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( $args['logo_alt'] ); ?>">
			</a>

			<nav class="home-site-nav" aria-label="Primary">
				<?php
				if ( $menu_location ) {
					wp_nav_menu(
						array(
							'theme_location' => $menu_location,
							'container'      => false,
							'menu_class'     => 'home-site-menu',
							'fallback_cb'    => false,
						)
					);
				}
				?>
			</nav>

			<a href="<?php echo esc_url( $args['cta_url'] ); ?>" class="home-site-header-cta">
				<?php echo esc_html( $args['cta_text'] ); ?> &rarr;
			</a>

			<button class="home-site-menu-toggle" id="homeMenuToggle" aria-expanded="false" aria-controls="homeMobileMenu">
				<span><?php echo esc_html( $args['mobile_menu_text'] ); ?></span>
			</button>
		</div>
		<div class="home-mobile-menu" id="homeMobileMenu">
			<?php
			if ( $menu_location ) {
				wp_nav_menu(
					array(
						'theme_location' => $menu_location,
						'container'      => false,
						'menu_class'     => 'home-mobile-menu-list',
						'fallback_cb'    => false,
					)
				);
			}
			?>
			<a href="<?php echo esc_url( $args['cta_url'] ); ?>" class="home-mobile-menu-cta">
				<?php echo esc_html( $args['cta_text'] ); ?> &rarr;
			</a>
		</div>
	</header>
	<?php
}

/**
 * Best-effort mapping for known client logo SVGs in uploads.
 *
 * @param string $name Client name.
 * @return string
 */
function slingshot_client_logo_url( $name ) {
	$key = strtolower( trim( (string) $name ) );
	$map = array(
		'churchill downs'         => '/wp-content/uploads/2022/09/churchilldowns.svg',
		'schneider electric'      => '/wp-content/uploads/2022/09/schneider-electric.svg',
		'univ. of louisville'     => '/wp-content/uploads/2022/09/uofl.svg',
		'university of louisville'=> '/wp-content/uploads/2022/09/uofl.svg',
		'metlife'                 => '/wp-content/uploads/2022/09/metlife.svg',
	);

	if ( isset( $map[ $key ] ) ) {
		return $map[ $key ];
	}
	return '';
}
