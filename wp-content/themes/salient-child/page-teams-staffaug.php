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
wp_enqueue_style( 'teams-style', get_stylesheet_directory_uri() . '/css/teams.css', array(), '1.0' );
wp_enqueue_style( 'teams-figma-skin', get_stylesheet_directory_uri() . '/css/teams-figma-skin.css', array( 'teams-style' ), '1.0' );
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
?>

<style id="dynamic-css-inline-css" type="text/css">
	body{overflow:visible}.no-rgba #header-space{display:none;}@media only screen and (max-width:999px){body #header-space[data-header-mobile-fixed="1"]{display:none;}#header-outer[data-mobile-fixed="false"]{position:absolute;}}@media only screen and (min-width:1000px){#header-space{display:none;}.nectar-slider-wrap.first-section,.parallax_slider_outer.first-section,.full-width-content.first-section{margin-top:0!important;}body #page-header-bg,body #page-header-wrap{height:142px;}body #search-outer{z-index:100000;}}
	body.page-template-page-teams-staffaug #header-outer,
	body.page-template-page-teams-staffaug #header-space { display:none !important; }
</style>

<?php
slingshot_render_redesign_header( array(
	'variant' => 'light',
	'cta_url' => slingshot_lp_h_attr( slingshot_pm( 'staug_hero_cta_url', '/contact/?looking=Staff+Aug' ) ),
	'cta_text' => slingshot_pm( 'staug_hero_cta_text', 'Scale Your Team' ),
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
					<span><?php echo esc_html( slingshot_pm( 'staug_hero_bc_parent', 'TEAMS' ) ); ?></span>
					<span class="teams-hero-sep">/</span>
					<span><?php echo esc_html( slingshot_pm( 'staug_hero_bc_leaf', 'STAFF AUGMENTATION' ) ); ?></span>
				</div>
				<h1 class="teams-hero-heading"><?php echo esc_html( slingshot_pm( 'staug_hero_heading', 'Scale Smarter with Global Talent' ) ); ?></h1>
				<p class="teams-hero-subtext"><?php echo esc_html( slingshot_pm( 'staug_hero_subtext', 'Plug senior engineers and specialists into your team in days. No long recruitment cycles, no quality compromise.' ) ); ?></p>
				<a href="<?php echo slingshot_lp_h_attr( slingshot_pm( 'staug_hero_cta_url', '/contact/?looking=Staff+Aug' ) ); ?>" class="teams-hero-btn">
					<?php echo esc_html( slingshot_pm( 'staug_hero_cta_text', 'Scale Your Team' ) ); ?> <span>&#8594;</span>
				</a>
			</div>

			<div class="teams-hero-photos">
				<div class="teams-hero-photo-grid">
					<div class="teams-hero-photo teams-hero-photo-a">
						<img src="<?php echo esc_url( slingshot_pm_image( 'staug_hero_img_a', $img_dir . '/hero-person-1.jpg' ) ); ?>" alt="Global talent">
					</div>
					<div class="teams-hero-photo teams-hero-photo-b">
						<img src="<?php echo esc_url( slingshot_pm_image( 'staug_hero_img_b', $img_dir . '/hero-person-2.jpg' ) ); ?>" alt="Remote engineer">
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
					<?php if ( ! empty( $card['icon_svg'] ) ) : ?>
					<div class="teams-offer-card-icon"><?php echo $card['icon_svg']; // phpcs:ignore ?></div>
					<?php endif; ?>
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

				<?php if ( ! empty( $why_points ) ) : ?>
				<ul class="teams-why-points">
					<?php foreach ( $why_points as $pt ) : ?>
					<li class="teams-why-point">
						<div class="teams-why-point-icon">
							<svg width="18" height="18" viewBox="0 0 18 18" fill="none"><circle cx="9" cy="9" r="9" fill="#23B7B4" fill-opacity="0.15"/><path d="M5 9l3 3 5-5" stroke="#23B7B4" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
						</div>
						<div>
							<strong class="teams-why-point-title"><?php echo esc_html( (string) ( $pt['title'] ?? '' ) ); ?></strong>
							<?php if ( ! empty( $pt['desc'] ) ) : ?>
							<p class="teams-why-point-desc"><?php echo esc_html( (string) $pt['desc'] ); ?></p>
							<?php endif; ?>
						</div>
					</li>
					<?php endforeach; ?>
				</ul>
				<?php endif; ?>
			</div>

			<div class="teams-why-deliver-image">
				<?php $why_img = slingshot_pm_image( 'staug_why_img', '' ); ?>
				<?php if ( $why_img ) : ?>
					<img src="<?php echo esc_url( $why_img ); ?>" alt="Global team" loading="lazy">
				<?php else : ?>
					<div class="teams-why-deliver-visual">
						<!-- World map placeholder graphic -->
						<svg viewBox="0 0 480 320" fill="none" xmlns="http://www.w3.org/2000/svg" width="100%">
							<rect width="480" height="320" rx="20" fill="linear-gradient(135deg,#0d0630,#1d0d58)"/>
							<ellipse cx="240" cy="160" rx="160" ry="130" fill="rgba(75,35,176,0.1)" stroke="rgba(75,35,176,0.2)" stroke-width="1"/>
							<ellipse cx="240" cy="160" rx="110" ry="130" fill="none" stroke="rgba(75,35,176,0.12)" stroke-width="1"/>
							<circle cx="160" cy="130" r="6" fill="#23B7B4"/>
							<circle cx="160" cy="130" r="12" fill="rgba(35,183,180,0.2)"/>
							<circle cx="310" cy="120" r="6" fill="#23B7B4"/>
							<circle cx="310" cy="120" r="12" fill="rgba(35,183,180,0.2)"/>
							<circle cx="200" cy="200" r="5" fill="#4B23B0"/>
							<circle cx="200" cy="200" r="10" fill="rgba(75,35,176,0.25)"/>
							<line x1="160" y1="130" x2="310" y2="120" stroke="rgba(35,183,180,0.3)" stroke-width="1" stroke-dasharray="4 4"/>
							<line x1="160" y1="130" x2="200" y2="200" stroke="rgba(75,35,176,0.3)" stroke-width="1" stroke-dasharray="4 4"/>
						</svg>
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
				$vall_url  = slingshot_pm( 'staug_roles_view_all_url', '' );
				$vall_text = slingshot_pm( 'staug_roles_view_all_text', 'View All' );
				if ( $vall_url ) : ?>
				<a href="<?php echo slingshot_lp_h_attr( $vall_url ); ?>" class="teams-roles-view-all"><?php echo esc_html( $vall_text ); ?></a>
				<?php endif; ?>
			</div>

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
				</div>
				<?php endforeach; ?>
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
				$mascot_file_path = get_stylesheet_directory() . '/img/cta-mascot.png';
				$mascot_file_url  = get_stylesheet_directory_uri() . '/img/cta-mascot.png';
				if ( file_exists( $mascot_file_path ) ) : ?>
					<img src="<?php echo esc_url( $mascot_file_url ); ?>" alt="Slingshot mascot">
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
				<p class="teams-cta-desc"><?php echo esc_html( slingshot_pm( 'staug_cta_desc', "Tell us the roles you need and we'll have qualified candidates in front of you within 48 hours." ) ); ?></p>
				<a href="<?php echo slingshot_lp_h_attr( slingshot_pm( 'staug_cta_btn_url', '/contact/?looking=Staff+Aug' ) ); ?>" class="teams-cta-btn"><?php echo esc_html( slingshot_pm( 'staug_cta_btn_text', 'Start the Conversation →' ) ); ?></a>
			</div>
		</div>
	</section>

</div><!-- .teams-page-wrapper -->

<?php get_footer(); ?>
