<?php
/*
Template Name: Teams — Staff Augmentation
 * Content: Edit Page (Meta Box fields on this template).
 */

wp_enqueue_style(
	'teams-jakarta',
	'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap',
	array(), null
);
wp_enqueue_style( 'home-style', get_stylesheet_directory_uri() . '/css/home.css', array(), '1.18' );
wp_enqueue_style( 'teams-style', get_stylesheet_directory_uri() . '/css/teams.css', array(), '1.3' );
wp_enqueue_style( 'teams-figma-skin', get_stylesheet_directory_uri() . '/css/teams-figma-skin.css', array( 'teams-style' ), '1.3' );
wp_enqueue_script( 'teams-script', get_stylesheet_directory_uri() . '/js/teams.js', array( 'jquery' ), '1.0', true );
wp_enqueue_script( 'hp-script', get_stylesheet_directory_uri() . '/js/home.js', array( 'jquery' ), '1.6', true );

get_header();

$img_dir = get_stylesheet_directory_uri() . '/img';

$offer_cards  = slingshot_pm( 'staug_offer_cards', [] );
$offer_cards  = is_array( $offer_cards ) ? $offer_cards : [];

$why_points   = slingshot_pm( 'staug_why_points', [] );
$why_points   = is_array( $why_points ) ? $why_points : [];

$roles        = slingshot_pm( 'staug_roles_items', [] );
$roles        = is_array( $roles ) ? $roles : [];

$test_items   = slingshot_pm( 'staug_test_items', [] );
$test_items   = is_array( $test_items ) ? $test_items : [];

$staug_icon_svg = static function ( $key ) {
	$icons = array(
		'bolt-box' => '<svg viewBox="0 0 42 42" fill="none" aria-hidden="true"><rect x="7" y="7" width="28" height="28" rx="7" stroke="currentColor" stroke-width="2"/><path d="M22 12l-6 10h6l-2 8 7-12h-6l1-6Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>',
		'bolt'     => '<svg viewBox="0 0 42 42" fill="none" aria-hidden="true"><path d="M22 6l-9 16h9l-3 14 11-20h-9l1-10Z" stroke="currentColor" stroke-width="2.2" stroke-linejoin="round"/><path d="M5 18h7M8 25h5" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/></svg>',
		'bag'      => '<svg viewBox="0 0 42 42" fill="none" aria-hidden="true"><path d="M15 17v-3a6 6 0 0 1 12 0v3" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><rect x="8" y="17" width="26" height="17" rx="5" stroke="currentColor" stroke-width="2"/><path d="M27 28l2 2 5-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
		'people'   => '<svg viewBox="0 0 42 42" fill="none" aria-hidden="true"><circle cx="21" cy="12" r="4" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="24" r="4" stroke="currentColor" stroke-width="2"/><circle cx="30" cy="24" r="4" stroke="currentColor" stroke-width="2"/><path d="M7 35c1.3-4 3.7-6 7-6s5.7 2 7 6M21 35c1.3-4 3.7-6 7-6s5.7 2 7 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>',
		'dollar'   => '<svg viewBox="0 0 42 42" fill="none" aria-hidden="true"><circle cx="21" cy="21" r="13" stroke="currentColor" stroke-width="2"/><path d="M21 12v18M25 16c-1.1-1.2-2.6-1.8-4.5-1.6-2.1.2-3.6 1.4-3.6 3.2 0 4.8 8.5 2.4 8.5 7.1 0 1.9-1.6 3.2-4 3.4-2.2.2-4-.5-5.2-1.9" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>',
		'clock'    => '<svg viewBox="0 0 42 42" fill="none" aria-hidden="true"><circle cx="21" cy="22" r="11" stroke="currentColor" stroke-width="2"/><path d="M21 16v7l5 3M12 10l-4 4M30 10l4 4M5 22h5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>',
		'person'   => '<svg viewBox="0 0 42 42" fill="none" aria-hidden="true"><circle cx="21" cy="13" r="5" stroke="currentColor" stroke-width="2"/><path d="M10 34c1.7-7 5.4-10.5 11-10.5S30.3 27 32 34" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M21 20v9" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>',
		'globe'    => '<svg viewBox="0 0 42 42" fill="none" aria-hidden="true"><circle cx="21" cy="21" r="13" stroke="currentColor" stroke-width="2"/><path d="M8 21h26M21 8c4 4 6 8.4 6 13s-2 9-6 13M21 8c-4 4-6 8.4-6 13s2 9 6 13" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>',
	);
	return isset( $icons[ $key ] ) ? $icons[ $key ] : $icons['bolt'];
};

$staug_has_rows = static function ( $rows ) {
	if ( ! is_array( $rows ) || empty( $rows ) ) {
		return false;
	}
	foreach ( $rows as $row ) {
		if ( ! is_array( $row ) ) {
			continue;
		}
		foreach ( $row as $value ) {
			if ( is_array( $value ) && ! empty( $value ) ) {
				return true;
			}
			if ( ! is_array( $value ) && trim( (string) $value ) !== '' ) {
				return true;
			}
		}
	}
	return false;
};

if ( ! $staug_has_rows( $offer_cards ) ) {
	$offer_cards = array(
		array( 'icon_key' => 'bolt-box', 'title' => 'Tech Expertise', 'desc' => 'Deep experience across modern stacks and platforms' ),
		array( 'icon_key' => 'bolt', 'title' => 'Hassle-Free Hiring', 'desc' => 'We source, vet, and onboard talent that aligns with your delivery needs' ),
		array( 'icon_key' => 'bag', 'title' => 'Results That Scale', 'desc' => 'Improve delivery velocity, reduce dev backlog, and unblock stalled initiatives' ),
	);
}

if ( ! $staug_has_rows( $why_points ) ) {
	$why_points = array(
		array( 'icon_key' => 'people', 'title' => 'Broad Talent Pool', 'desc' => 'Access a diverse range of skill sets from a mature tech market ready to scale with you' ),
		array( 'icon_key' => 'dollar', 'title' => 'Cost Optimization', 'desc' => 'Reduce hiring costs by up to 40 percent without sacrificing quality or experience' ),
		array( 'icon_key' => 'clock', 'title' => 'Speed and Flexibility', 'desc' => 'Ramp up full teams or individual contributors in days, not months' ),
		array( 'icon_key' => 'person', 'title' => 'Cultural Fit', 'desc' => 'Our engineers ask the right questions, push for better outcomes.' ),
	);
}

$region_cards = slingshot_pm( 'staug_region_cards', [] );
$region_cards = is_array( $region_cards ) ? $region_cards : [];
if ( ! $staug_has_rows( $region_cards ) ) {
	$region_cards = array(
		array( 'title' => 'Eastern Europe', 'body' => "Ideal for complex, innovation-driven products\nTalent known for autonomy, deep developer ability, and proactive problem solving\nBest fit for teams with strong product direction", 'featured' => 1 ),
		array( 'title' => 'Latin America', 'body' => '', 'featured' => 0 ),
	);
}

if ( ! $staug_has_rows( $roles ) ) {
	$roles = array(
		array( 'name' => 'Andrew Meyer', 'role' => 'Principal Senior Developer', 'category' => 'Development', 'experience' => 'Eastern Europe, 10+ years experience', 'story' => 'Helped Schneider Electric streamline onboarding by reducing manual entry across departments' ),
		array( 'name' => 'Joe Calvert', 'role' => 'Principal Developer', 'category' => 'Development', 'experience' => 'Latin America, 7+ years experience', 'story' => 'Embedded with a global non-profit to redesign a multilingual mobile app serving 10,000+ users' ),
		array( 'name' => 'Doug Compton', 'role' => 'Principal AI Developer', 'category' => 'Development', 'experience' => 'Eastern Europe, 10+ years experience', 'story' => 'Helped Schneider Electric streamline onboarding by reducing manual entry across departments' ),
		array( 'name' => 'Mike Hurd', 'role' => 'Principal Developer', 'category' => 'Development', 'experience' => 'Eastern Europe, 10+ years experience', 'story' => 'Helped Schneider Electric streamline onboarding by reducing manual entry across departments' ),
		array( 'name' => 'Microsoft Consultant', 'role' => 'QA Specialist', 'category' => 'QA', 'experience' => 'Latin America, 6+ years experience', 'story' => 'Supported a high-volume enterprise release cycle with automation and regression coverage' ),
	);
}

$role_filters = slingshot_lp_bullet_lines( slingshot_pm( 'staug_roles_filters', "All Roles\nDevelopment\nProject Manager\nDesigners\nQA" ) );
?>

<style id="dynamic-css-inline-css" type="text/css">
	body{overflow:visible}.no-rgba #header-space{display:none;}@media only screen and (max-width:999px){body #header-space[data-header-mobile-fixed="1"]{display:none;}#header-outer[data-mobile-fixed="false"]{position:absolute;}}@media only screen and (min-width:1000px){#header-space{display:none;}.nectar-slider-wrap.first-section,.parallax_slider_outer.first-section,.full-width-content.first-section{margin-top:0!important;}body #page-header-bg,body #page-header-wrap{height:142px;}body #search-outer{z-index:100000;}}
	body.page-template-page-teams-staffaug #header-outer,
	body.page-template-page-teams-staffaug #header-space { display:none !important; }
</style>

<?php
slingshot_render_redesign_header( array(
	'variant' => 'light',
	'cta_url' => slingshot_lp_h_attr( slingshot_pm( 'staug_header_cta_url', '/contact/?looking=Staff+Aug' ) ),
	'cta_text' => slingshot_pm( 'staug_header_cta_text', "Let's talk" ),
) );
?>

<div class="teams-page-wrapper">

	<!-- ═══ HERO ═══════════════════════════════════════════════ -->
	<section class="teams-hero">
		<div class="teams-hero-blob teams-hero-blob-1"></div>
		<div class="teams-hero-blob teams-hero-blob-2"></div>
		<div class="teams-hero-blob teams-hero-blob-3"></div>

		<div class="teams-hero-inner">
			<div class="teams-hero-content">
				<div class="teams-hero-breadcrumb">
					<span><?php echo esc_html( slingshot_pm( 'staug_hero_bc_parent', 'SERVICES / TEAMS' ) ); ?></span>
					<span class="teams-hero-sep">/</span>
					<span><?php echo esc_html( slingshot_pm( 'staug_hero_bc_leaf', 'STAFF AUG' ) ); ?></span>
				</div>
				<h1 class="teams-hero-heading"><?php echo nl2br( esc_html( slingshot_pm( 'staug_hero_heading', "Scale Smarter\nwith Global Talent" ) ) ); ?></h1>
				<p class="teams-hero-subtext"><?php echo esc_html( slingshot_pm( 'staug_hero_subtext', 'Augment your team with vetted, high-performing developers who integrate fast and deliver from day one.' ) ); ?></p>
				<a href="<?php echo slingshot_lp_h_attr( slingshot_pm( 'staug_hero_cta_url', '/contact/?looking=Staff+Aug' ) ); ?>" class="teams-hero-btn">
					<?php echo esc_html( slingshot_pm( 'staug_hero_cta_text', 'Start Building Your Team' ) ); ?> <span>&#8594;</span>
				</a>
			</div>

			<div class="teams-hero-photos">
				<div class="teams-hero-photo-grid">
					<div class="teams-hero-photo teams-hero-photo-a">
						<img src="<?php echo esc_url( slingshot_pm_image( 'staug_hero_img_a', $img_dir . '/teams-hero-a.png' ) ); ?>" alt="Global talent">
					</div>
					<div class="teams-hero-photo teams-hero-photo-b">
						<img src="<?php echo esc_url( slingshot_pm_image( 'staug_hero_img_b', $img_dir . '/teams-hero-b.png' ) ); ?>" alt="Remote engineer">
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ═══ WHAT WE OFFER ══════════════════════════════════════ -->
	<section class="teams-offer-section">
		<div class="teams-offer-inner">
			<h2 class="teams-offer-heading"><?php echo esc_html( slingshot_pm( 'staug_offer_heading', 'What We Offer' ) ); ?></h2>

			<?php if ( ! empty( $offer_cards ) ) : ?>
				<div class="teams-offer-cards">
				<?php foreach ( $offer_cards as $card ) : ?>
				<div class="teams-offer-card">
					<?php $icon_svg = ! empty( $card['icon_svg'] ) ? (string) $card['icon_svg'] : $staug_icon_svg( (string) ( $card['icon_key'] ?? 'bolt' ) ); ?>
					<div class="teams-offer-card-icon"><?php echo $icon_svg; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
					<h3 class="teams-offer-card-title"><?php echo esc_html( (string) ( $card['title'] ?? '' ) ); ?></h3>
					<p class="teams-offer-card-desc"><?php echo esc_html( (string) ( $card['desc'] ?? '' ) ); ?></p>
				</div>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
		</div>
	</section>

	<!-- ═══ WHY SLINGSHOT DELIVERS ═════════════════════════════ -->
	<section class="teams-why-deliver-section">
		<div class="teams-why-deliver-inner">
			<div class="teams-why-deliver-content">
				<h2 class="teams-why-deliver-heading"><?php echo esc_html( slingshot_pm( 'staug_why_heading', 'Why Slingshot Global Talent Delivers' ) ); ?></h2>
				<p class="teams-why-deliver-desc"><?php echo esc_html( slingshot_pm( 'staug_why_desc', 'Our talent network spans Latin America and Eastern Europe — time-zone-aligned, culturally compatible senior engineers.' ) ); ?></p>

				<?php $why_kicker = slingshot_pm( 'staug_why_kicker', 'Why Slingshot Global Talent Delivers' ); if ( $why_kicker ) : ?>
				<p class="teams-why-deliver-kicker"><?php echo esc_html( $why_kicker ); ?></p>
				<?php endif; ?>

				<?php if ( ! empty( $why_points ) ) : ?>
				<div class="teams-why-points">
					<?php foreach ( $why_points as $pt ) :
						$icon_svg = ! empty( $pt['icon_svg'] ) ? (string) $pt['icon_svg'] : $staug_icon_svg( (string) ( $pt['icon_key'] ?? 'globe' ) );
						?>
					<div class="teams-why-point">
						<div class="teams-why-point-icon"><?php echo $icon_svg; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
						<strong class="teams-why-point-title"><?php echo esc_html( (string) ( $pt['title'] ?? '' ) ); ?></strong>
						<?php if ( ! empty( $pt['desc'] ) ) : ?>
						<p class="teams-why-point-desc"><?php echo esc_html( (string) $pt['desc'] ); ?></p>
						<?php endif; ?>
					</div>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>

			<div class="teams-why-deliver-image teams-staug-map-wrap">
				<?php $why_img = slingshot_pm_image( 'staug_why_img', '' ); ?>
				<?php if ( $why_img ) : ?>
					<img src="<?php echo esc_url( $why_img ); ?>" alt="Global team" loading="lazy">
				<?php else : ?>
					<div class="teams-staug-map" aria-hidden="true">
						<div class="teams-staug-map-dots"></div>
						<?php foreach ( array_values( $region_cards ) as $idx => $region ) :
							$is_featured = ! empty( $region['featured'] );
							$lines       = slingshot_lp_bullet_lines( (string) ( $region['body'] ?? '' ) );
							?>
						<div class="teams-staug-region-card teams-staug-region-card-<?php echo esc_attr( (string) ( $idx + 1 ) ); ?><?php echo $is_featured ? ' teams-staug-region-card--featured' : ''; ?>">
							<div class="teams-staug-region-head">
								<strong><?php echo esc_html( (string) ( $region['title'] ?? '' ) ); ?></strong>
								<span><?php echo $is_featured ? '&#8722;' : '+'; ?></span>
							</div>
							<div class="teams-staug-region-avatars">
								<i></i><i></i><i></i><i></i><i></i>
							</div>
							<?php if ( ! empty( $lines ) ) : ?>
							<ul>
								<?php foreach ( $lines as $line ) : ?>
								<li><?php echo esc_html( $line ); ?></li>
								<?php endforeach; ?>
							</ul>
							<?php endif; ?>
						</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<!-- ═══ ROLES WE HAVE STAFFED ══════════════════════════════ -->
	<?php if ( ! empty( $roles ) ) : ?>
	<section class="teams-roles-section">
		<div class="teams-roles-inner">
			<div class="teams-roles-header">
				<h2 class="teams-roles-heading"><?php echo esc_html( slingshot_pm( 'staug_roles_heading', 'Roles We Have Staffed' ) ); ?></h2>
				<?php
				$vall_url  = slingshot_pm( 'staug_roles_view_all_url', slingshot_pm( 'staug_why_cta_url', '/contact/?looking=Staff+Aug' ) );
				$vall_text = slingshot_pm( 'staug_roles_view_all_text', 'Start Hiring Now' );
				if ( $vall_url ) : ?>
				<a href="<?php echo slingshot_lp_h_attr( $vall_url ); ?>" class="teams-roles-view-all"><?php echo esc_html( $vall_text ); ?></a>
				<?php endif; ?>
			</div>

			<?php if ( ! empty( $role_filters ) ) : ?>
			<div class="teams-roles-filters" aria-label="Role filters">
				<?php foreach ( $role_filters as $idx => $filter ) : ?>
				<button type="button" class="teams-role-filter<?php echo 0 === $idx ? ' is-active' : ''; ?>"><?php echo esc_html( $filter ); ?></button>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>

			<div class="teams-roles-grid">
				<?php foreach ( $roles as $role ) :
					$photo = ! empty( $role['photo'] ) ? slingshot_lp_attachment_url( $role['photo'], '', 'thumbnail' ) : '';
					?>
				<div class="teams-role-card">
					<div class="teams-role-photo-wrap">
						<?php if ( $photo ) : ?>
							<img class="teams-role-photo" src="<?php echo esc_url( $photo ); ?>" alt="<?php echo esc_attr( (string) ( $role['name'] ?? '' ) ); ?>">
						<?php else : ?>
							<div class="teams-role-photo teams-role-photo--placeholder"><?php echo esc_html( mb_substr( (string) ( $role['name'] ?? 'T' ), 0, 1 ) ); ?></div>
						<?php endif; ?>
					</div>
					<div class="teams-role-info">
						<strong class="teams-role-name"><?php echo esc_html( (string) ( $role['name'] ?? '' ) ); ?></strong>
						<span class="teams-role-title"><?php echo esc_html( (string) ( $role['role'] ?? '' ) ); ?></span>
						<?php if ( ! empty( $role['location'] ) ) : ?>
						<span class="teams-role-location">
							<svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M6 1a3.5 3.5 0 0 1 3.5 3.5C9.5 7.5 6 11 6 11S2.5 7.5 2.5 4.5A3.5 3.5 0 0 1 6 1z" stroke="#6B7280" stroke-width="1" fill="none"/><circle cx="6" cy="4.5" r="1.25" fill="#6B7280"/></svg>
							<?php echo esc_html( (string) $role['location'] ); ?>
						</span>
						<?php endif; ?>
					</div>
					<?php if ( ! empty( $role['experience'] ) || ! empty( $role['story'] ) ) : ?>
					<div class="teams-role-card-details">
						<?php if ( ! empty( $role['experience'] ) ) : ?><p class="teams-role-experience"><?php echo esc_html( (string) $role['experience'] ); ?></p><?php endif; ?>
						<?php if ( ! empty( $role['story'] ) ) : ?><p class="teams-role-story"><?php echo esc_html( (string) $role['story'] ); ?></p><?php endif; ?>
					</div>
					<?php endif; ?>
				</div>
				<?php endforeach; ?>
			</div>
			<div class="home-carousel-footer teams-carousel-footer">
				<div class="home-carousel-progress"><span></span></div>
				<div class="carousel-nav">
					<button class="carousel-nav-btn" type="button" aria-label="Previous">&#8249;</button>
					<button class="carousel-nav-btn" type="button" aria-label="Next">&#8250;</button>
				</div>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<!-- ═══ TESTIMONIALS ═══════════════════════════════════════ -->
	<?php if ( ! empty( $test_items ) ) : ?>
	<section class="teams-testimonials-section">
		<div class="teams-testimonials-inner">
			<h2 class="teams-testimonials-heading"><?php echo esc_html( slingshot_pm( 'staug_test_heading', 'Client Testimonials' ) ); ?></h2>
			<div class="teams-testimonials-grid">
				<?php foreach ( $test_items as $t ) :
					$photo = ! empty( $t['photo'] ) ? slingshot_lp_attachment_url( $t['photo'], '', 'thumbnail' ) : '';
					$logo  = ! empty( $t['company_logo'] ) ? slingshot_lp_attachment_url( $t['company_logo'], '', 'medium' ) : '';
					?>
				<div class="teams-testimonial-card">
					<div class="teams-testimonial-logo-row">
						<?php if ( $logo ) : ?><img class="teams-testimonial-company-logo" src="<?php echo esc_url( $logo ); ?>" alt=""><?php endif; ?>
					</div>
					<p class="teams-testimonial-quote">&ldquo;<?php echo esc_html( (string) ( $t['quote'] ?? '' ) ); ?>&rdquo;</p>
					<div class="teams-testimonial-author">
						<?php if ( $photo ) : ?>
							<img class="teams-testimonial-photo" src="<?php echo esc_url( $photo ); ?>" alt="<?php echo esc_attr( (string) ( $t['name'] ?? '' ) ); ?>">
						<?php else : ?>
							<div class="teams-testimonial-photo-placeholder"><?php echo esc_html( mb_substr( (string) ( $t['name'] ?? 'A' ), 0, 1 ) ); ?></div>
						<?php endif; ?>
						<div>
							<strong class="teams-testimonial-name"><?php echo esc_html( (string) ( $t['name'] ?? '' ) ); ?></strong>
							<span class="teams-testimonial-title"><?php echo esc_html( (string) ( $t['title'] ?? '' ) ); ?></span>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<!-- ═══ BOTTOM CTA ═════════════════════════════════════════ -->
	<section class="teams-cta-section">
		<div class="teams-cta-inner">
			<div class="home-cta-mascot">
				<?php
				$cta_visual_file_path = get_stylesheet_directory() . '/img/teams-cta-visual.png';
				$cta_visual_file_url  = get_stylesheet_directory_uri() . '/img/teams-cta-visual.png';
				$mascot_file_url      = slingshot_pm_image( 'staug_cta_visual', file_exists( $cta_visual_file_path ) ? $cta_visual_file_url : get_stylesheet_directory_uri() . '/img/cta-mascot.png' );
				if ( $mascot_file_url ) : ?>
					<img src="<?php echo esc_url( $mascot_file_url ); ?>" alt="Slingshot team call">
				<?php else : ?>
				<svg class="home-cta-mascot-svg" viewBox="0 0 280 320" fill="none" xmlns="http://www.w3.org/2000/svg">
					<ellipse cx="140" cy="290" rx="55" ry="16" fill="rgba(75,35,176,.12)"/>
					<rect x="108" y="140" width="64" height="120" rx="32" fill="#4B23B0"/>
					<ellipse cx="140" cy="140" rx="32" ry="32" fill="#6D44B7"/>
					<circle cx="133" cy="142" r="5" fill="#fff"/>
					<circle cx="147" cy="142" r="5" fill="#fff"/>
					<path d="M108 220 C90 210 76 220 80 236 C88 232 100 228 108 230Z" fill="#23B7B4"/>
					<path d="M172 220 C190 210 204 220 200 236 C192 232 180 228 172 230Z" fill="#23B7B4"/>
				</svg>
				<?php endif; ?>
			</div>
			<div class="teams-cta-card">
				<h2 class="teams-cta-title"><?php echo esc_html( slingshot_pm( 'staug_cta_title', 'Ready to Move Faster?' ) ); ?></h2>
				<p class="teams-cta-desc"><?php echo esc_html( slingshot_pm( 'staug_cta_desc', "Let's build the right team to hit your next milestone, without slowing down or hiring full-time." ) ); ?></p>
				<a href="<?php echo slingshot_lp_h_attr( slingshot_pm( 'staug_cta_btn_url', '/contact/?looking=Staff+Aug' ) ); ?>" class="teams-cta-btn"><?php echo esc_html( slingshot_pm( 'staug_cta_btn_text', 'Start Your Team →' ) ); ?></a>
			</div>
		</div>
	</section>

</div><!-- .teams-page-wrapper -->

<?php get_footer(); ?>
