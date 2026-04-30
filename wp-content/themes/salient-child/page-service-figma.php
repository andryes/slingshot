<?php
/*
Template Name: Service Figma
 * Content: Edit Page meta fields (Meta Box).
 */

wp_enqueue_style(
	'svc-figma-jakarta',
	'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap',
	array(), null
);
wp_enqueue_style( 'home-style', get_stylesheet_directory_uri() . '/css/home.css', array(), '1.18' );
wp_enqueue_style( 'service-figma-style', get_stylesheet_directory_uri() . '/css/service-figma.css', array(), '2.0' );
wp_enqueue_script( 'hp-script', get_stylesheet_directory_uri() . '/js/home.js', array( 'jquery' ), '1.6', true );

get_header();

$img_dir = get_stylesheet_directory_uri() . '/img';
$svc_page_id   = get_queried_object_id();
$svc_page_slug = get_post_field( 'post_name', $svc_page_id );
$svc_theme     = slingshot_pm( 'svc_theme', '' );

if ( ! $svc_theme ) {
	$svc_theme_map = array(
		'product' => 'product',
		'web'     => 'web',
		'design'  => 'design',
		'mobile'  => 'mobile',
	);
	$svc_theme = isset( $svc_theme_map[ $svc_page_slug ] ) ? $svc_theme_map[ $svc_page_slug ] : 'product';
}

$svc_lines = static function ( $value ) {
	return nl2br( esc_html( str_replace( '\n', "\n", (string) $value ) ) );
};

$svc_icon_svg = static function ( $key ) {
	$key = sanitize_key( (string) $key );
	$icons = array(
		'web'       => '<svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="3" fill="none" stroke="currentColor" stroke-width="1.7"/><path d="M3 9.5h18M8 16h8" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>',
		'mobile'    => '<svg viewBox="0 0 24 24" aria-hidden="true"><rect x="7" y="3" width="10" height="18" rx="2.8" fill="none" stroke="currentColor" stroke-width="1.7"/><path d="M10 6h4M11.2 18h1.6" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>',
		'design'    => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 14.5 14.5 4a2.1 2.1 0 0 1 3 3L7 17.5 3.5 20l.5-5.5Z" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="m13 5.5 5.5 5.5" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>',
		'strategy'  => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 18V6h14v12H5Z" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="M8 15h3l2-4 2 2h2M8 9h4" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>',
		'prototype' => '<svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="4" width="7" height="7" rx="2" fill="none" stroke="currentColor" stroke-width="1.7"/><rect x="13" y="4" width="7" height="7" rx="2" fill="none" stroke="currentColor" stroke-width="1.7"/><rect x="4" y="13" width="7" height="7" rx="2" fill="none" stroke="currentColor" stroke-width="1.7"/><path d="M15 17h4M17 15v4" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>',
		'systems'   => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 4v5M12 15v5M6.5 7.5l3.5 2M14 14l3.5 2M17.5 7.5 14 9.5M10 14l-3.5 2" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/><circle cx="12" cy="12" r="3.2" fill="none" stroke="currentColor" stroke-width="1.7"/></svg>',
		'planning'  => '<svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="5" width="16" height="15" rx="3" fill="none" stroke="currentColor" stroke-width="1.7"/><path d="M8 3v4M16 3v4M4 10h16M8 14h2.5M8 17h6.5" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>',
		'rocket'    => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 14 9 11c1.2-3.5 4-6.2 8.3-7.3.7-.2 1.3.4 1.1 1.1C17.3 9.1 14.6 11.8 12 14Z" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="M9 11H5.8L4 12.8l4 1.2M12 14l1.2 4 1.8-1.8V13M7 17l-3 3" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>',
		'support'   => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12a7 7 0 0 1 14 0v3a2 2 0 0 1-2 2h-2v-6h4M5 12v3a2 2 0 0 0 2 2h2v-6H5M10 20h4" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>',
		'ai'        => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3l1.6 4.1L18 8.7l-4.4 1.6L12 14.5l-1.6-4.2L6 8.7l4.4-1.6L12 3ZM6.2 14.2l.8 2.1 2.1.8-2.1.8-.8 2.1-.8-2.1-2.1-.8 2.1-.8.8-2.1ZM18.2 15l.7 1.8 1.8.7-1.8.7-.7 1.8-.7-1.8-1.8-.7 1.8-.7.7-1.8Z" fill="none" stroke="currentColor" stroke-width="1.55" stroke-linejoin="round"/></svg>',
		'cart'      => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 5h2l2 10h9.5l2-7.2H7.2M9.5 19.5a1.2 1.2 0 1 0 0-2.4 1.2 1.2 0 0 0 0 2.4ZM17 19.5a1.2 1.2 0 1 0 0-2.4 1.2 1.2 0 0 0 0 2.4Z" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>',
		'dashboard' => '<svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="5" width="16" height="14" rx="3" fill="none" stroke="currentColor" stroke-width="1.7"/><path d="M8 15v-3M12 15V9M16 15v-5M8 18h8" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>',
		'human'     => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M8.5 11.5a3.5 3.5 0 1 1 7 0v1a3.5 3.5 0 1 1-7 0v-1ZM5 20c.8-2.9 3.2-4.4 7-4.4s6.2 1.5 7 4.4" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>',
		'integration' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M8 7H5a2 2 0 0 0-2 2v1M16 7h3a2 2 0 0 1 2 2v1M8 17H5a2 2 0 0 1-2-2v-1M16 17h3a2 2 0 0 0 2-2v-1M9 12h6M12 9v6" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>',
		'workflow'  => '<svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="5" width="16" height="14" rx="3" fill="none" stroke="currentColor" stroke-width="1.7"/><path d="M8 9h5M8 13h8M8 17h4" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>',
		'security'  => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3.8 18 6v5.2c0 3.8-2.4 7.2-6 8.8-3.6-1.6-6-5-6-8.8V6l6-2.2Z" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="m9.2 12.2 1.8 1.8 4-4" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>',
	);
	return isset( $icons[ $key ] ) ? $icons[ $key ] : $icons['strategy'];
};

$svc_item_icon = static function ( $item, $fallback = 'strategy' ) use ( $svc_icon_svg ) {
	if ( ! empty( $item['icon_svg'] ) ) {
		return $item['icon_svg'];
	}
	return $svc_icon_svg( ! empty( $item['icon_key'] ) ? $item['icon_key'] : $fallback );
};

$svc_product_built_defaults = array(
	array( 'icon_key' => 'web', 'title' => 'Web Platforms', 'desc' => 'Create modern, responsive web apps engineered for scale, security, and conversion.', 'cta_text' => 'Web Solutions', 'cta_url' => '/web/' ),
	array( 'icon_key' => 'mobile', 'title' => 'Mobile Apps', 'desc' => 'Launch polished iOS, Android, and cross-platform experiences that users keep coming back to.', 'cta_text' => 'Mobile Solutions', 'cta_url' => '/mobile/' ),
	array( 'icon_key' => 'design', 'title' => 'Design', 'desc' => 'Turn product ideas into intuitive interfaces, validated flows, and design systems ready for delivery.', 'cta_text' => 'Design Solutions', 'cta_url' => '/design/' ),
);

$svc_product_card_defaults = array(
	array( 'icon_key' => 'strategy', 'title' => 'Product Strategy', 'desc' => 'Define the vision, roadmap, and priorities that keep teams aligned from kickoff through launch.' ),
	array( 'icon_key' => 'prototype', 'title' => 'Rapid Prototyping', 'desc' => 'Validate concepts quickly with clickable prototypes, user feedback, and technical feasibility checks.' ),
	array( 'icon_key' => 'systems', 'title' => 'Full-Stack Engineering', 'desc' => 'Build reliable frontends, APIs, integrations, and cloud architecture around real product goals.' ),
	array( 'icon_key' => 'planning', 'title' => 'Roadmapping', 'desc' => 'Translate business objectives into measurable releases, milestones, and delivery plans.' ),
	array( 'icon_key' => 'rocket', 'title' => 'Launch Support', 'desc' => 'Move from beta to production with performance, QA, analytics, and release management covered.' ),
	array( 'icon_key' => 'support', 'title' => 'Continuous Iteration', 'desc' => 'Improve the product after launch with backlog refinement, optimization, and feature delivery.' ),
);

$svc_product_case_defaults = array(
	array( 'image_url' => $img_dir . '/ai-work-horizon.png', 'title' => 'Horizon Engage', 'desc' => 'Developed a mobile app that simplifies insurance, enabling easy claims and reducing paperwork.', 'tags' => 'AI, Product, Mobile', 'link_url' => '/work/' ),
	array( 'image_url' => $img_dir . '/ai-insight-product.png', 'title' => 'Southeast Christian Church', 'desc' => 'Developed a mobile app that simplifies insurance, enabling easy claims and reducing paperwork.', 'tags' => 'AI, Product, Mobile', 'link_url' => '/work/' ),
	array( 'image_url' => $img_dir . '/ai-work-caregiver.png', 'title' => 'Connected Caregiver', 'desc' => 'Developed a mobile app that simplifies insurance, enabling easy claims and reducing paperwork.', 'tags' => 'AI, Product, Mobile', 'link_url' => '/work/' ),
	array( 'image_url' => $img_dir . '/ai-work-horizon.png', 'title' => 'Southwest Solutions', 'desc' => 'Built a product experience that keeps complex workflows clear for users and teams.', 'tags' => 'Product, Web', 'link_url' => '/work/' ),
);

$uploads_dir = content_url( 'uploads' );
$svc_service_card_image_defaults = array(
	'web'    => array(
		$uploads_dir . '/2022/04/Zoeller-Web-Dashboard-3x@3x-900x600.png',
		$uploads_dir . '/2022/04/home-mockup-900x600.png',
		$uploads_dir . '/2025/01/Webpg-mockup-HR-Home-1-900x600.png',
	),
	'design' => array(
		$uploads_dir . '/2025/01/Horizon-Engage-Phone-Web-900x600.png',
		$uploads_dir . '/2022/04/Dashboard-mockup-3x@3x-900x600.png',
		$uploads_dir . '/2025/01/Phone-Web-2-phones-1-web-900x600.png',
		$uploads_dir . '/2022/11/NEO-Video_Featured-Image-LN-900x600.png',
	),
	'mobile' => array(
		$uploads_dir . '/2020/09/Metlife-Top-of-page-900x600.png',
		$uploads_dir . '/2020/05/New-Roots-Screens-900x600.jpg',
		$uploads_dir . '/2025/01/Phone-Web-of-Chart-02-900x600.png',
		$uploads_dir . '/2022/11/NEO-Video_Featured-Image-LN-900x600.png',
	),
);

// ── Helpers ──────────────────────────────────────────────────
// slingshot_pm() and slingshot_pm_image() read from current post meta (landing-pages-helpers.php)

$blog_n = max( 1, min( 12, (int) slingshot_pm( 'svc_blog_posts', 3 ) ) );
$blog_q = new WP_Query( array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => $blog_n,
	'orderby'        => 'date',
	'order'          => 'DESC',
) );
?>
<style>
	body.page-template-page-service-figma #header-outer,
	body.page-template-page-service-figma #header-space { display:none !important; }
</style>

<?php
slingshot_render_redesign_header(
	array(
		'variant'  => 'light',
		'cta_text' => slingshot_pm( 'svc_header_cta_text', "Let's talk" ),
		'cta_url'  => slingshot_lp_h_attr( slingshot_pm( 'svc_header_cta_url', slingshot_pm( 'svc_hero_cta_url', '/contact/' ) ) ),
	)
);
?>

<div class="svc-page-wrapper svc-theme-<?php echo esc_attr( $svc_theme ); ?>">

	<!-- ── HERO ─────────────────────────────────────────────── -->
	<section class="svc-hero">
		<div class="svc-hero-blob svc-hero-blob-1"></div>
		<div class="svc-hero-blob svc-hero-blob-2"></div>
		<div class="svc-hero-blob svc-hero-blob-3"></div>

		<div class="svc-hero-inner">
			<div class="svc-hero-content">
				<div class="svc-hero-breadcrumb">
					<span><?php echo esc_html( slingshot_pm( 'svc_hero_bc_parent', 'SERVICES' ) ); ?></span>
					<span class="svc-hero-sep">/</span>
					<span><?php echo esc_html( slingshot_pm( 'svc_hero_bc_leaf', 'PRODUCT' ) ); ?></span>
					<?php if ( slingshot_pm( 'svc_hero_bc_extra', '' ) ) : ?>
					<span class="svc-hero-sep">/</span>
					<span><?php echo esc_html( slingshot_pm( 'svc_hero_bc_extra', '' ) ); ?></span>
					<?php endif; ?>
				</div>
				<h1 class="svc-hero-heading"><?php echo $svc_lines( slingshot_pm( 'svc_hero_heading', 'From Vision to Velocity' ) ); ?></h1>
				<p class="svc-hero-subtext"><?php echo esc_html( slingshot_pm( 'svc_hero_subtext', 'We design and build digital products that scale — combining strategy, design, and engineering into a seamless delivery engine.' ) ); ?></p>
				<a href="<?php echo slingshot_lp_h_attr( slingshot_pm( 'svc_hero_cta_url', '/contact/' ) ); ?>" class="svc-hero-btn">
					<?php echo esc_html( slingshot_pm( 'svc_hero_cta_text', 'Book a call' ) ); ?> <span>&#8594;</span>
				</a>
			</div>

			<div class="svc-hero-photos">
				<?php
				$img_a = slingshot_pm_image( 'svc_hero_img_a', $img_dir . '/teams-hero-a.png' );
				$img_b = slingshot_pm_image( 'svc_hero_img_b', $img_dir . '/teams-hero-b.png' );
				$alt_a = esc_attr( slingshot_pm( 'svc_hero_img_a_alt', 'Slingshot team' ) );
				$alt_b = esc_attr( slingshot_pm( 'svc_hero_img_b_alt', 'Slingshot project' ) );
				if ( $img_a ) : ?>
				<div class="svc-hero-photo svc-hero-photo-a">
					<img src="<?php echo esc_url( $img_a ); ?>" alt="<?php echo $alt_a; ?>">
				</div>
				<?php endif; ?>
				<?php if ( $img_b ) : ?>
				<div class="svc-hero-photo svc-hero-photo-b">
					<img src="<?php echo esc_url( $img_b ); ?>" alt="<?php echo $alt_b; ?>">
				</div>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<!-- ── BUILT / FEATURES ─────────────────────────────────── -->
	<?php
	$built_items = slingshot_pm( 'svc_built_items', array() );
	$built_heading_line1 = slingshot_pm( 'svc_built_heading_1', 'Built to Scale.' );
	$built_heading_line2 = slingshot_pm( 'svc_built_heading_2', 'Designed to Win.' );
	$built_desc = slingshot_pm( 'svc_built_desc', 'Harnessing deep technical expertise, cross-functional teams, and product thinking to every engagement, so you get outcomes, not just output.' );
	$built_grid_label = slingshot_pm( 'svc_built_grid_label', '' );
	if ( ! is_array( $built_items ) ) { $built_items = array(); }
	if ( 'product' === $svc_page_slug && 3 !== count( $built_items ) ) {
		$built_items = $svc_product_built_defaults;
	}
	?>
	<section class="svc-built-section">
		<div class="svc-built-header">
			<h2 class="svc-built-heading">
				<?php echo esc_html( $built_heading_line1 ); ?><br>
				<?php echo esc_html( $built_heading_line2 ); ?>
			</h2>
			<p class="svc-built-desc"><?php echo esc_html( $built_desc ); ?></p>
		</div>
		<?php if ( ! empty( $built_items ) ) : ?>
		<?php if ( $built_grid_label ) : ?>
		<h3 class="svc-built-grid-label"><?php echo esc_html( $built_grid_label ); ?></h3>
		<?php endif; ?>
		<div class="svc-built-grid">
			<?php foreach ( $built_items as $item ) :
				$built_icon = $svc_item_icon( $item, 'strategy' );
			?>
			<div class="svc-built-item">
				<div class="svc-built-icon">
					<?php echo $built_icon; // phpcs:ignore WordPress.Security.EscapeOutput ?>
				</div>
				<div class="svc-built-item-title"><?php echo esc_html( $item['title'] ?? '' ); ?></div>
				<?php if ( ! empty( $item['desc'] ) ) : ?>
				<p class="svc-built-item-desc"><?php echo esc_html( $item['desc'] ); ?></p>
				<?php endif; ?>
				<?php if ( ! empty( $item['cta_text'] ) && ! empty( $item['cta_url'] ) ) : ?>
				<a href="<?php echo slingshot_lp_h_attr( $item['cta_url'] ); ?>" class="svc-built-cta"><?php echo esc_html( $item['cta_text'] ); ?> &#8594;</a>
				<?php endif; ?>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</section>

	<!-- ── WHAT WE BUILD / CARDS ────────────────────────────── -->
	<?php
	$cards_heading = slingshot_pm( 'svc_cards_heading', 'We Build High-Impact Digital Products' );
	$cards_eyebrow = slingshot_pm( 'svc_cards_eyebrow', '' );
	$cards_desc    = slingshot_pm( 'svc_cards_desc', '' );
	$cards_layout  = slingshot_pm( 'svc_cards_layout', 'grid' ); // 'grid' or 'alternating'
	$cards_items   = slingshot_pm( 'svc_cards_items', array() );
	if ( ! is_array( $cards_items ) ) { $cards_items = array(); }
	if ( 'product' === $svc_page_slug && 'grid' === $cards_layout && count( $cards_items ) < 6 ) {
		$cards_items = $svc_product_card_defaults;
	}
	?>
	<?php if ( ! empty( $cards_items ) ) : ?>
	<section class="svc-cards-section svc-cards-section--<?php echo esc_attr( $cards_layout ); ?>">
		<div class="svc-cards-header">
			<?php if ( $cards_eyebrow ) : ?>
			<p class="svc-cards-eyebrow"><?php echo esc_html( $cards_eyebrow ); ?></p>
			<?php endif; ?>
			<h2 class="svc-cards-heading"><?php echo $svc_lines( $cards_heading ); ?></h2>
			<?php if ( $cards_desc ) : ?>
			<p class="svc-cards-desc"><?php echo esc_html( $cards_desc ); ?></p>
			<?php endif; ?>
		</div>

		<?php if ( 'alternating' === $cards_layout ) : ?>
		<div class="svc-cards-alt">
			<?php foreach ( $cards_items as $card_i => $card ) :
				$card_img = ! empty( $card['image'] ) ? slingshot_lp_attachment_url( $card['image'], '', 'large' ) : '';
				if ( ! $card_img && isset( $svc_service_card_image_defaults[ $svc_page_slug ][ $card_i ] ) ) {
					$card_img = $svc_service_card_image_defaults[ $svc_page_slug ][ $card_i ];
				}
				$card_icon = $svc_item_icon( $card, 'strategy' );
			?>
			<div class="svc-card-alt <?php echo $card_img ? 'svc-card-alt--has-image' : 'svc-card-alt--icon-only'; ?>">
				<?php if ( $card_img ) : ?>
				<div class="svc-card-alt-img">
					<img src="<?php echo esc_url( $card_img ); ?>" alt="<?php echo esc_attr( $card['title'] ?? '' ); ?>" loading="lazy">
				</div>
				<?php endif; ?>
				<div class="svc-card-alt-body">
					<div class="svc-card-icon"><?php echo $card_icon; // phpcs:ignore WordPress.Security.EscapeOutput ?></div>
					<?php if ( ! empty( $card['tag'] ) ) : ?>
					<span class="svc-card-alt-tag"><?php echo esc_html( $card['tag'] ); ?></span>
					<?php endif; ?>
					<h3 class="svc-card-alt-title"><?php echo esc_html( $card['title'] ?? '' ); ?></h3>
					<?php if ( ! empty( $card['desc'] ) ) : ?>
					<p class="svc-card-alt-desc"><?php echo esc_html( $card['desc'] ); ?></p>
					<?php endif; ?>
					<?php if ( ! empty( $card['link_url'] ) ) : ?>
					<a href="<?php echo slingshot_lp_h_attr( $card['link_url'] ); ?>" class="svc-card-alt-link">Learn more &#8594;</a>
					<?php endif; ?>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php else : ?>
		<div class="svc-cards-grid">
			<?php foreach ( $cards_items as $card ) :
				$card_img = ! empty( $card['image'] ) ? slingshot_lp_attachment_url( $card['image'], '', 'large' ) : '';
				$card_icon = $svc_item_icon( $card, 'strategy' );
			?>
			<div class="svc-card <?php echo $card_img ? 'svc-card--has-image' : 'svc-card--icon-only'; ?>">
				<?php if ( $card_img ) : ?>
				<div class="svc-card-img">
					<img src="<?php echo esc_url( $card_img ); ?>" alt="<?php echo esc_attr( $card['title'] ?? '' ); ?>" loading="lazy">
				</div>
				<?php endif; ?>
				<div class="svc-card-body">
					<?php if ( ! $card_img ) : ?>
					<div class="svc-card-icon"><?php echo $card_icon; // phpcs:ignore WordPress.Security.EscapeOutput ?></div>
					<?php endif; ?>
					<?php if ( ! empty( $card['tag'] ) ) : ?>
					<span class="svc-card-tag"><?php echo esc_html( $card['tag'] ); ?></span>
					<?php endif; ?>
					<h3 class="svc-card-title"><?php echo esc_html( $card['title'] ?? '' ); ?></h3>
					<?php if ( ! empty( $card['desc'] ) ) : ?>
					<p class="svc-card-desc"><?php echo esc_html( $card['desc'] ); ?></p>
					<?php endif; ?>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</section>
	<?php endif; ?>

	<!-- ── CASE STUDIES ─────────────────────────────────────── -->
	<?php
	$cases_heading   = slingshot_pm( 'svc_cases_heading', 'From Solution to Success Stories' );
	$cases_link_text = slingshot_pm( 'svc_cases_link_text', 'See All →' );
	$cases_link_url  = slingshot_pm( 'svc_cases_link_url', '/work/' );
	$cases_cards     = slingshot_pm( 'svc_cases_cards', array() );
	if ( ! is_array( $cases_cards ) ) { $cases_cards = array(); }
	if ( 'product' === $svc_page_slug && empty( $cases_cards ) ) {
		$cases_cards = $svc_product_case_defaults;
	}
	?>
	<?php if ( ! empty( $cases_cards ) ) : ?>
	<section class="svc-cases-section">
		<div class="svc-cases-header">
			<h2 class="svc-cases-heading"><?php echo $svc_lines( $cases_heading ); ?></h2>
			<?php if ( $cases_link_url ) : ?>
			<a href="<?php echo slingshot_lp_h_attr( $cases_link_url ); ?>" class="svc-cases-link"><?php echo esc_html( $cases_link_text ); ?></a>
			<?php endif; ?>
		</div>
		<div class="svc-cases-scroll">
			<?php foreach ( $cases_cards as $case_i => $cs ) :
				$case_default = isset( $svc_product_case_defaults[ $case_i % count( $svc_product_case_defaults ) ] ) ? $svc_product_case_defaults[ $case_i % count( $svc_product_case_defaults ) ] : array();
				$cs_img = ! empty( $cs['image'] ) ? slingshot_lp_attachment_url( $cs['image'], '', 'large' ) : '';
				if ( ! $cs_img && ! empty( $cs['image_url'] ) ) {
					$cs_img = $cs['image_url'];
				}
				if ( ! $cs_img && ! empty( $case_default['image_url'] ) ) {
					$cs_img = $case_default['image_url'];
				}
				$cs_url = ! empty( $cs['link_url'] ) ? $cs['link_url'] : '#';
			?>
			<a href="<?php echo slingshot_lp_h_attr( $cs_url ); ?>" class="svc-case-card">
				<div class="svc-case-img">
					<?php if ( $cs_img ) : ?>
					<img src="<?php echo esc_url( $cs_img ); ?>" alt="<?php echo esc_attr( $cs['title'] ?? '' ); ?>" loading="lazy">
					<?php endif; ?>
				</div>
				<div class="svc-case-body">
					<?php if ( ! empty( $cs['client'] ) ) : ?>
					<span class="svc-case-client"><?php echo esc_html( $cs['client'] ); ?></span>
					<?php endif; ?>
					<div class="svc-case-title"><?php echo esc_html( $cs['title'] ?? '' ); ?></div>
					<?php if ( ! empty( $cs['desc'] ) ) : ?>
					<p class="svc-case-desc"><?php echo esc_html( $cs['desc'] ); ?></p>
					<?php endif; ?>
					<?php if ( ! empty( $cs['tags'] ) ) :
						$case_tags = array_filter( array_map( 'trim', explode( ',', $cs['tags'] ) ) );
					?>
					<div class="svc-case-tags">
						<?php foreach ( $case_tags as $case_tag ) : ?>
						<span class="svc-case-tag"><?php echo esc_html( $case_tag ); ?></span>
						<?php endforeach; ?>
					</div>
					<?php endif; ?>
					<?php if ( empty( $cs['desc'] ) && empty( $cs['tags'] ) ) : ?>
					<span class="svc-case-arrow">&#8594;</span>
					<?php endif; ?>
				</div>
			</a>
			<?php endforeach; ?>
		</div>
	</section>
	<?php endif; ?>

	<!-- ── SPOTLIGHT ───────────────────────────────────────── -->
	<?php if ( slingshot_pm( 'svc_spotlight_show', 0 ) ) :
		$sp_quote         = slingshot_pm( 'svc_spotlight_quote', '' );
		$sp_person_name   = slingshot_pm( 'svc_spotlight_person_name', '' );
		$sp_person_role   = slingshot_pm( 'svc_spotlight_person_role', '' );
		$sp_person_img    = slingshot_pm_image( 'svc_spotlight_person_img', '' );
		$sp_quote_img     = slingshot_pm_image( 'svc_spotlight_quote_img', 'product' === $svc_page_slug ? $img_dir . '/ai-work-caregiver.png' : '' );
		$sp_article_img   = slingshot_pm_image( 'svc_spotlight_article_img', '' );
		$sp_article_tag   = slingshot_pm( 'svc_spotlight_article_tag', '' );
		$sp_article_title = slingshot_pm( 'svc_spotlight_article_title', '' );
		$sp_article_desc  = slingshot_pm( 'svc_spotlight_article_desc', '' );
		$sp_detail_left_title  = slingshot_pm( 'svc_spotlight_detail_left_title', '' );
		$sp_detail_left_items  = slingshot_lp_bullet_lines( slingshot_pm( 'svc_spotlight_detail_left_items', '' ) );
		$sp_detail_right_title = slingshot_pm( 'svc_spotlight_detail_right_title', '' );
		$sp_detail_right_items = slingshot_lp_bullet_lines( slingshot_pm( 'svc_spotlight_detail_right_items', '' ) );
		$sp_article_url   = slingshot_pm( 'svc_spotlight_article_url', '#' );
	?>
	<div class="svc-spotlight-section">
		<!-- Left: dark testimonial card -->
		<div class="svc-spotlight-quote">
			<?php if ( $sp_quote_img ) : ?>
			<img src="<?php echo esc_url( $sp_quote_img ); ?>" alt="" class="svc-spotlight-quote-bg" loading="lazy">
			<?php endif; ?>
			<div class="svc-spotlight-quote-blob"></div>
			<div class="svc-spotlight-quote-body">
				<span class="svc-spotlight-quote-mark">&ldquo;</span>
				<?php if ( $sp_quote ) : ?>
				<p class="svc-spotlight-quote-text"><?php echo esc_html( $sp_quote ); ?></p>
				<?php endif; ?>
			</div>
			<?php if ( $sp_person_name || $sp_person_role ) : ?>
			<div class="svc-spotlight-person">
				<?php if ( $sp_person_img ) : ?>
				<div class="svc-spotlight-avatar">
					<img src="<?php echo esc_url( $sp_person_img ); ?>" alt="<?php echo esc_attr( $sp_person_name ); ?>">
				</div>
				<?php else : ?>
				<div class="svc-spotlight-avatar"></div>
				<?php endif; ?>
				<div>
					<?php if ( $sp_person_name ) : ?>
					<div class="svc-spotlight-person-name"><?php echo esc_html( $sp_person_name ); ?></div>
					<?php endif; ?>
					<?php if ( $sp_person_role ) : ?>
					<div class="svc-spotlight-person-role"><?php echo esc_html( $sp_person_role ); ?></div>
					<?php endif; ?>
				</div>
			</div>
			<?php endif; ?>
		</div>
		<!-- Right: white featured article card -->
		<a href="<?php echo slingshot_lp_h_attr( $sp_article_url ); ?>" class="svc-spotlight-article <?php echo $sp_article_img ? 'svc-spotlight-article--has-image' : 'svc-spotlight-article--text-only'; ?>">
			<?php if ( $sp_article_img ) : ?>
			<div class="svc-spotlight-article-img">
				<img src="<?php echo esc_url( $sp_article_img ); ?>" alt="<?php echo esc_attr( $sp_article_title ); ?>" loading="lazy">
			</div>
			<?php endif; ?>
			<div class="svc-spotlight-article-body">
				<?php if ( $sp_article_tag ) : ?>
				<span class="svc-spotlight-article-eyebrow"><?php echo esc_html( $sp_article_tag ); ?></span>
				<?php endif; ?>
				<?php if ( $sp_article_title ) : ?>
				<h3 class="svc-spotlight-article-title"><?php echo esc_html( $sp_article_title ); ?></h3>
				<?php endif; ?>
				<?php if ( $sp_article_desc ) : ?>
				<p class="svc-spotlight-article-desc"><?php echo esc_html( $sp_article_desc ); ?></p>
				<?php endif; ?>
				<?php if ( $sp_detail_left_title || $sp_detail_right_title || ! empty( $sp_detail_left_items ) || ! empty( $sp_detail_right_items ) ) : ?>
				<div class="svc-spotlight-details">
					<div class="svc-spotlight-detail-col">
						<?php if ( $sp_detail_left_title ) : ?>
						<div class="svc-spotlight-detail-title"><?php echo esc_html( $sp_detail_left_title ); ?></div>
						<?php endif; ?>
						<?php if ( ! empty( $sp_detail_left_items ) ) : ?>
						<ul class="svc-spotlight-detail-list">
							<?php foreach ( $sp_detail_left_items as $detail_item ) : ?>
							<li><?php echo esc_html( $detail_item ); ?></li>
							<?php endforeach; ?>
						</ul>
						<?php endif; ?>
					</div>
					<div class="svc-spotlight-detail-col">
						<?php if ( $sp_detail_right_title ) : ?>
						<div class="svc-spotlight-detail-title"><?php echo esc_html( $sp_detail_right_title ); ?></div>
						<?php endif; ?>
						<?php if ( ! empty( $sp_detail_right_items ) ) : ?>
						<ul class="svc-spotlight-detail-list">
							<?php foreach ( $sp_detail_right_items as $detail_item ) : ?>
							<li><?php echo esc_html( $detail_item ); ?></li>
							<?php endforeach; ?>
						</ul>
						<?php endif; ?>
					</div>
				</div>
				<?php endif; ?>
				<span class="svc-spotlight-article-link">Read article &#8594;</span>
			</div>
		</a>
	</div>
	<?php endif; ?>

	<!-- ── BLOG ─────────────────────────────────────────────── -->
	<?php if ( slingshot_pm( 'svc_blog_show', 'product' === $svc_page_slug ? 1 : 0 ) ) : ?>
	<section class="svc-blog-section">
		<div class="home-blog-inner">
			<div class="home-blog-header">
				<h2 class="home-blog-title">
					<?php echo nl2br( esc_html( slingshot_pm( 'svc_blog_title', "Insights That Move\nBusiness Forward" ) ) ); ?>
				</h2>
				<div class="home-blog-meta">
					<p class="home-blog-desc"><?php echo esc_html( slingshot_pm( 'svc_blog_desc', 'Actionable thinking on software strategy, AI adoption, and how high-performing teams build and scale.' ) ); ?></p>
					<a href="<?php echo slingshot_lp_h_attr( slingshot_pm( 'svc_blog_cta_url', '/blog/' ) ); ?>" class="home-section-link"><?php echo esc_html( slingshot_pm( 'svc_blog_cta_text', 'All Insights →' ) ); ?></a>
				</div>
			</div>
			<div class="home-blog-cards">
				<?php if ( $blog_q->have_posts() ) :
					while ( $blog_q->have_posts() ) : $blog_q->the_post(); ?>
					<a href="<?php the_permalink(); ?>" class="blog-card">
						<div class="blog-card-image">
							<?php if ( has_post_thumbnail() ) the_post_thumbnail( 'medium_large', array( 'loading' => 'lazy' ) ); ?>
						</div>
						<div class="blog-card-body">
							<div class="blog-card-tags">
								<?php foreach ( array_slice( get_the_category(), 0, 2 ) as $cat ) : ?>
								<span class="blog-card-tag"><?php echo esc_html( $cat->name ); ?></span>
								<?php endforeach; ?>
							</div>
							<h3 class="blog-card-title"><?php the_title(); ?></h3>
							<p class="blog-card-desc"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 20, '...' ) ); ?></p>
						</div>
					</a>
					<?php endwhile;
					wp_reset_postdata();
				else : ?>
					<a href="#" class="blog-card"><div class="blog-card-image"></div><div class="blog-card-body"><h3 class="blog-card-title">Coming soon</h3></div></a>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<!-- ── BOTTOM CTA ───────────────────────────────────────── -->
	<section class="svc-cta-section">
		<?php
		$cta_visual = slingshot_pm_image( 'svc_cta_visual', $img_dir . '/cta-mascot.png' );
		?>
		<div class="svc-cta-mascot">
			<img src="<?php echo esc_url( $cta_visual ); ?>" alt="Slingshot mascot" loading="lazy">
		</div>
		<div class="svc-cta-card">
			<h2 class="svc-cta-title"><?php echo esc_html( slingshot_pm( 'svc_cta_title', "Let's Build What's Next" ) ); ?></h2>
			<p class="svc-cta-desc"><?php echo esc_html( slingshot_pm( 'svc_cta_desc', "Whether you need a smarter product, a faster team, or a modernized platform — Slingshot is the partner to help you move." ) ); ?></p>
			<a href="<?php echo slingshot_lp_h_attr( slingshot_pm( 'svc_cta_btn_url', '/contact/' ) ); ?>" class="svc-cta-btn">
				<?php echo esc_html( slingshot_pm( 'svc_cta_btn_text', 'Start the Conversation →' ) ); ?>
			</a>
		</div>
	</section>

</div><!-- .svc-page-wrapper -->

<?php get_footer(); ?>
