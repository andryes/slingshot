<?php
/**
 * Figma-managed portfolio case study template.
 *
 * Falls back to the parent Salient single template for portfolio items that have
 * not been migrated to the redesign.
 */

$portfolio_id = (int) get_queried_object_id();
$portfolio_slug = $portfolio_id ? (string) get_post_field( 'post_name', $portfolio_id ) : '';
$figma_enabled = $portfolio_id ? (bool) get_post_meta( $portfolio_id, 'cs_figma_enabled', true ) : false;

if ( ! $figma_enabled && 'connected-caregiver' !== $portfolio_slug ) {
	include get_template_directory() . '/single.php';
	return;
}

if ( ! function_exists( 'slingshot_csi_image_url' ) ) {
	/**
	 * @param string $image_field Meta Box single_image field.
	 * @param string $url_field   Text URL fallback field.
	 * @param string $default     Default URL.
	 * @return string
	 */
	function slingshot_csi_image_url( $image_field, $url_field, $default = '' ) {
		$url = slingshot_pm_image( $image_field, '', 'full' );
		if ( ! $url && $url_field ) {
			$url = (string) slingshot_pm( $url_field, '' );
		}
		if ( ! $url ) {
			$url = $default;
		}
		return $url ? slingshot_lp_link_href( $url ) : '';
	}
}

if ( ! function_exists( 'slingshot_csi_split_tags' ) ) {
	/**
	 * @param mixed $raw String or array.
	 * @return string[]
	 */
	function slingshot_csi_split_tags( $raw ) {
		if ( is_array( $raw ) ) {
			$items = $raw;
		} else {
			$items = preg_split( '/[\r\n,]+/', (string) $raw );
		}
		return array_values(
			array_filter(
				array_map(
					static function ( $item ) {
						return trim( (string) $item );
					},
					$items ? $items : array()
				)
			)
		);
	}
}

if ( ! function_exists( 'slingshot_csi_split_lines' ) ) {
	/**
	 * @param mixed $raw String or array.
	 * @return string[]
	 */
	function slingshot_csi_split_lines( $raw ) {
		if ( is_array( $raw ) ) {
			$items = $raw;
		} else {
			$items = preg_split( '/\r\n|\r|\n/', (string) $raw );
		}
		return array_values(
			array_filter(
				array_map(
					static function ( $item ) {
						return trim( (string) $item );
					},
					$items ? $items : array()
				)
			)
		);
	}
}

if ( ! function_exists( 'slingshot_csi_render_paragraphs' ) ) {
	/**
	 * @param string $text Editable text.
	 * @return void
	 */
	function slingshot_csi_render_paragraphs( $text ) {
		echo wp_kses_post( wpautop( (string) $text ) );
	}
}

wp_enqueue_style(
	'pages-figma-jakarta',
	'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap',
	array(),
	null
);
wp_enqueue_style( 'home-style', get_stylesheet_directory_uri() . '/css/home.css', array(), '1.18' );
wp_enqueue_style( 'pages-figma-style', get_stylesheet_directory_uri() . '/css/pages-figma.css', array(), '1.4' );
wp_enqueue_script( 'hp-script', get_stylesheet_directory_uri() . '/js/home.js', array( 'jquery' ), '1.6', true );

get_header();

$img_dir = get_stylesheet_directory_uri() . '/img';

$title       = slingshot_pm( 'cs_hero_title', get_the_title( $portfolio_id ) );
$client      = slingshot_pm( 'cs_hero_client', $title );
$hero_desc   = slingshot_pm( 'cs_hero_desc', '' );
$hero_visual = slingshot_csi_image_url( 'cs_hero_img', 'cs_hero_img_url', $img_dir . '/case-southeast-hero-visual.png' );

$intro_heading = slingshot_pm( 'cs_intro_heading', '' );
$intro_text    = slingshot_pm( 'cs_intro_text', '' );
$services      = slingshot_csi_split_tags( slingshot_pm( 'cs_services', '' ) );
$technology    = slingshot_csi_split_tags( slingshot_pm( 'cs_technology', '' ) );

$media_top    = slingshot_csi_image_url( 'cs_media_top_img', 'cs_media_top_img_url', $img_dir . '/case-southeast-media-top.png' );
$media_middle = slingshot_csi_image_url( 'cs_media_middle_img', 'cs_media_middle_img_url', $img_dir . '/case-southeast-media-middle.png' );
$media_bottom = slingshot_csi_image_url( 'cs_media_bottom_img', 'cs_media_bottom_img_url', $img_dir . '/case-southeast-media-bottom.png' );

$side_avatar = slingshot_csi_image_url( 'cs_side_avatar', 'cs_side_avatar_url', $img_dir . '/case-southeast-avatar-savannah.png' );
$side_name   = slingshot_pm( 'cs_side_name', 'Savannah Cherry' );
$side_role   = slingshot_pm( 'cs_side_role', 'Director of marketing and new business' );
$side_title  = slingshot_pm( 'cs_side_title', 'Ready to discuss your project with us?' );
$side_text   = slingshot_pm( 'cs_side_text', 'Let us talk about how we can craft a user experience that not only looks great but drives real growth for you.' );
$side_button = slingshot_pm( 'cs_side_btn_text', 'Request a quote' );
$side_url    = slingshot_pm( 'cs_side_btn_url', '/contact/' );

$solution_heading = slingshot_pm( 'cs_solution_heading', '' );
$solution_text    = slingshot_pm( 'cs_solution_text', '' );
$challenges       = slingshot_csi_split_lines( slingshot_pm( 'cs_challenges', '' ) );
$solutions        = slingshot_csi_split_lines( slingshot_pm( 'cs_solutions', '' ) );

$gallery = slingshot_pm( 'cs_gallery', array() );
if ( ! is_array( $gallery ) || empty( $gallery ) ) {
	$gallery = array(
		array( 'image_url' => $img_dir . '/case-southeast-gallery-a.png', 'alt' => 'HelloCity resource screens' ),
		array( 'image_url' => $img_dir . '/case-southeast-gallery-b.png', 'alt' => 'HelloCity chat screen' ),
	);
}

$onboarding_img = slingshot_csi_image_url( 'cs_onboarding_img', 'cs_onboarding_img_url', $img_dir . '/case-southeast-onboarding.png' );
$admin_heading  = slingshot_pm( 'cs_admin_heading', '' );
$admin_text     = slingshot_pm( 'cs_admin_text', '' );
$admin_img      = slingshot_csi_image_url( 'cs_admin_img', 'cs_admin_img_url', $img_dir . '/case-southeast-admin-panel.png' );
$design_img     = slingshot_csi_image_url( 'cs_design_system_img', 'cs_design_system_img_url', $img_dir . '/case-southeast-design-system.png' );

$review_label  = slingshot_pm( 'cs_review_label', 'Client Review' );
$review_quote  = slingshot_pm( 'cs_review_quote', '' );
$review_stars  = max( 0, min( 5, (int) slingshot_pm( 'cs_review_stars', 5 ) ) );
$review_text   = slingshot_pm( 'cs_review_text', '' );
$review_name   = slingshot_pm( 'cs_review_name', '' );
$review_role   = slingshot_pm( 'cs_review_role', '' );
$review_avatar = slingshot_csi_image_url( 'cs_review_avatar', 'cs_review_avatar_url', $img_dir . '/case-southeast-avatar-maria.png' );
$review_image  = slingshot_csi_image_url( 'cs_review_img', 'cs_review_img_url', $img_dir . '/case-southeast-review-visual.png' );

$cta_heading  = slingshot_pm( 'cs_cta_heading', 'Ready to Launch Something Bold?' );
$cta_desc     = slingshot_pm( 'cs_cta_desc', "Let's talk about how we help teams like yours bring new products to life and make them work in the real world." );
$cta_btn_text = slingshot_pm( 'cs_cta_btn_text', "Let's Talk" );
$cta_btn_url  = slingshot_pm( 'cs_cta_btn_url', '/contact/' );
$cta_mascot   = slingshot_csi_image_url( 'cs_cta_mascot', 'cs_cta_mascot_url', $img_dir . '/cta-mascot.png' );
?>

<style>
	body.single-portfolio #header-outer,
	body.single-portfolio #header-space,
	body.single-portfolio #footer-outer { display:none !important; }
</style>

<?php slingshot_render_redesign_header( array( 'variant' => 'light' ) ); ?>

<main class="csi-page-wrapper">
	<section class="csi-hero">
		<?php if ( $hero_visual ) : ?>
			<div class="csi-hero-visual" aria-hidden="true">
				<img src="<?php echo esc_url( $hero_visual ); ?>" alt="">
			</div>
		<?php endif; ?>
		<div class="csi-hero-content">
			<?php if ( $client ) : ?>
				<div class="csi-hero-kicker">Work / <?php echo esc_html( strtoupper( $client ) ); ?></div>
			<?php endif; ?>
			<h1 class="csi-hero-title"><?php echo esc_html( $title ); ?></h1>
			<?php if ( $hero_desc ) : ?>
				<p class="csi-hero-desc"><?php echo esc_html( $hero_desc ); ?></p>
			<?php endif; ?>
		</div>
	</section>

	<section class="csi-intro">
		<div class="csi-intro-copy">
			<?php if ( $intro_heading ) : ?>
				<h2><?php echo esc_html( $intro_heading ); ?></h2>
			<?php endif; ?>
			<?php if ( $intro_text ) : ?>
				<div class="csi-intro-text"><?php slingshot_csi_render_paragraphs( $intro_text ); ?></div>
			<?php endif; ?>
		</div>
		<div class="csi-intro-tags">
			<?php if ( $services ) : ?>
				<div class="csi-tag-group">
					<h3>Services</h3>
					<div class="csi-tags">
						<?php foreach ( $services as $tag ) : ?>
							<span><?php echo esc_html( $tag ); ?></span>
						<?php endforeach; ?>
					</div>
				</div>
			<?php endif; ?>
			<?php if ( $technology ) : ?>
				<div class="csi-tag-group">
					<h3>Technology</h3>
					<div class="csi-tags">
						<?php foreach ( $technology as $tag ) : ?>
							<span><?php echo esc_html( $tag ); ?></span>
						<?php endforeach; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</section>

	<?php if ( $media_top ) : ?>
		<section class="csi-media-bleed">
			<img src="<?php echo esc_url( $media_top ); ?>" alt="<?php echo esc_attr( $title ); ?> interface overview" loading="eager">
		</section>
	<?php endif; ?>

	<section class="csi-case-grid">
		<div class="csi-main-column">
			<section class="csi-copy-card">
				<?php if ( $solution_heading ) : ?>
					<h2><?php echo esc_html( $solution_heading ); ?></h2>
				<?php endif; ?>
				<?php if ( $solution_text ) : ?>
					<div class="csi-copy-card-text"><?php slingshot_csi_render_paragraphs( $solution_text ); ?></div>
				<?php endif; ?>
			</section>

			<?php if ( $challenges || $solutions ) : ?>
				<section class="csi-compare">
					<div class="csi-compare-col">
						<h3>Challenges</h3>
						<?php foreach ( $challenges as $item ) : ?>
							<p><?php echo esc_html( $item ); ?></p>
						<?php endforeach; ?>
					</div>
					<div class="csi-compare-col csi-compare-col--white">
						<h3>Solutions</h3>
						<?php foreach ( $solutions as $item ) : ?>
							<p><?php echo esc_html( $item ); ?></p>
						<?php endforeach; ?>
					</div>
				</section>
			<?php endif; ?>

			<div class="csi-gallery">
				<?php foreach ( $gallery as $index => $item ) :
					$item_img = '';
					if ( ! empty( $item['image'] ) ) {
						$item_img = slingshot_lp_attachment_url( $item['image'], '', 'full' );
					}
					if ( ! $item_img && ! empty( $item['image_url'] ) ) {
						$item_img = slingshot_lp_link_href( $item['image_url'] );
					}
					$item_alt = ! empty( $item['alt'] ) ? $item['alt'] : $title;
					if ( ! $item_img ) {
						continue;
					}
					?>
					<div class="csi-gallery-item">
						<img src="<?php echo esc_url( $item_img ); ?>" alt="<?php echo esc_attr( $item_alt ); ?>" loading="eager">
					</div>
				<?php endforeach; ?>
			</div>

			<?php if ( $onboarding_img ) : ?>
				<section class="csi-framed-media">
					<img src="<?php echo esc_url( $onboarding_img ); ?>" alt="<?php echo esc_attr( $title ); ?> onboarding screens" loading="eager">
				</section>
			<?php endif; ?>
		</div>

		<aside class="csi-side-card">
			<div class="csi-side-person">
				<?php if ( $side_avatar ) : ?>
					<img src="<?php echo esc_url( $side_avatar ); ?>" alt="<?php echo esc_attr( $side_name ); ?>">
				<?php endif; ?>
				<div>
					<strong><?php echo esc_html( $side_name ); ?></strong>
					<span><?php echo esc_html( $side_role ); ?></span>
				</div>
			</div>
			<div class="csi-side-rule"></div>
			<h2><?php echo esc_html( $side_title ); ?></h2>
			<?php if ( $side_text ) : ?>
				<p><?php echo esc_html( $side_text ); ?></p>
			<?php endif; ?>
			<a href="<?php echo slingshot_lp_h_attr( $side_url ); ?>" data-sl-modal="contact"><?php echo esc_html( $side_button ); ?> <span>&rarr;</span></a>
		</aside>
	</section>

	<?php if ( $media_middle ) : ?>
		<section class="csi-media-bleed csi-media-bleed--middle">
			<img src="<?php echo esc_url( $media_middle ); ?>" alt="<?php echo esc_attr( $title ); ?> admin queue" loading="eager">
		</section>
	<?php endif; ?>

	<section class="csi-case-grid csi-case-grid--second">
		<div class="csi-main-column">
			<section class="csi-copy-card">
				<?php if ( $admin_heading ) : ?>
					<h2><?php echo esc_html( $admin_heading ); ?></h2>
				<?php endif; ?>
				<?php if ( $admin_text ) : ?>
					<div class="csi-copy-card-text"><?php slingshot_csi_render_paragraphs( $admin_text ); ?></div>
				<?php endif; ?>
			</section>
			<?php if ( $admin_img ) : ?>
				<section class="csi-framed-media csi-framed-media--admin">
					<img src="<?php echo esc_url( $admin_img ); ?>" alt="<?php echo esc_attr( $title ); ?> admin tools" loading="eager">
				</section>
			<?php endif; ?>
			<?php if ( $design_img ) : ?>
				<section class="csi-design-media">
					<img src="<?php echo esc_url( $design_img ); ?>" alt="<?php echo esc_attr( $title ); ?> design system" loading="eager">
				</section>
			<?php endif; ?>
		</div>

		<aside class="csi-side-card">
			<div class="csi-side-person">
				<?php if ( $side_avatar ) : ?>
					<img src="<?php echo esc_url( $side_avatar ); ?>" alt="<?php echo esc_attr( $side_name ); ?>">
				<?php endif; ?>
				<div>
					<strong><?php echo esc_html( $side_name ); ?></strong>
					<span><?php echo esc_html( $side_role ); ?></span>
				</div>
			</div>
			<div class="csi-side-rule"></div>
			<h2><?php echo esc_html( $side_title ); ?></h2>
			<?php if ( $side_text ) : ?>
				<p><?php echo esc_html( $side_text ); ?></p>
			<?php endif; ?>
			<a href="<?php echo slingshot_lp_h_attr( $side_url ); ?>" data-sl-modal="contact"><?php echo esc_html( $side_button ); ?> <span>&rarr;</span></a>
		</aside>
	</section>

	<?php if ( $media_bottom ) : ?>
		<section class="csi-media-bleed csi-media-bleed--bottom">
			<img src="<?php echo esc_url( $media_bottom ); ?>" alt="<?php echo esc_attr( $title ); ?> chat queue closeup" loading="eager">
		</section>
	<?php endif; ?>

	<section class="csi-review">
		<div class="csi-review-copy">
			<?php if ( $review_label ) : ?>
				<div class="csi-review-label"><?php echo esc_html( $review_label ); ?></div>
			<?php endif; ?>
			<?php if ( $review_quote ) : ?>
				<h2><?php echo esc_html( $review_quote ); ?></h2>
			<?php endif; ?>
			<?php if ( $review_stars ) : ?>
				<div class="csi-review-stars" aria-label="<?php echo esc_attr( $review_stars ); ?> star review">
					<?php echo str_repeat( '&#9733;', $review_stars ); ?>
				</div>
			<?php endif; ?>
			<?php if ( $review_text ) : ?>
				<div class="csi-review-text"><?php slingshot_csi_render_paragraphs( $review_text ); ?></div>
			<?php endif; ?>
			<div class="csi-review-person">
				<?php if ( $review_avatar ) : ?>
					<img src="<?php echo esc_url( $review_avatar ); ?>" alt="<?php echo esc_attr( $review_name ); ?>">
				<?php endif; ?>
				<div>
					<strong><?php echo esc_html( $review_name ); ?></strong>
					<span><?php echo esc_html( $review_role ); ?></span>
				</div>
			</div>
		</div>
		<?php if ( $review_image ) : ?>
			<div class="csi-review-image">
				<img src="<?php echo esc_url( $review_image ); ?>" alt="<?php echo esc_attr( $title ); ?> review visual" loading="eager">
			</div>
		<?php endif; ?>
	</section>

	<section class="csi-bottom-cta">
		<div class="csi-bottom-mascot">
			<?php if ( $cta_mascot ) : ?>
				<img src="<?php echo esc_url( $cta_mascot ); ?>" alt="Slingshot mascot" loading="eager">
			<?php endif; ?>
		</div>
		<div class="csi-bottom-card">
			<h2><?php echo esc_html( $cta_heading ); ?></h2>
			<?php if ( $cta_desc ) : ?>
				<p><?php echo esc_html( $cta_desc ); ?></p>
			<?php endif; ?>
			<a href="<?php echo slingshot_lp_h_attr( $cta_btn_url ); ?>" data-sl-modal="contact"><?php echo esc_html( $cta_btn_text ); ?> <span>&rarr;</span></a>
		</div>
	</section>
</main>

<?php
get_footer();
