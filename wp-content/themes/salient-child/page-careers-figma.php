<?php
/*
Template Name: Careers Figma
 * Content: Edit Page meta fields (Meta Box).
 */

wp_enqueue_style(
	'svc-figma-jakarta',
	'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap',
	array(), null
);
wp_enqueue_style( 'home-style', get_stylesheet_directory_uri() . '/css/home.css', array(), '1.18' );
wp_enqueue_style( 'service-figma-style', get_stylesheet_directory_uri() . '/css/service-figma.css', array(), '2.1' );
wp_enqueue_script( 'hp-script', get_stylesheet_directory_uri() . '/js/home.js', array( 'jquery' ), '1.6', true );

get_header();

$img_dir = get_stylesheet_directory_uri() . '/img';

// slingshot_pm() reads current post meta.
$careers_lines = static function ( $value ) {
	return nl2br( esc_html( str_replace( '\n', "\n", (string) $value ) ) );
};

$careers_paragraphs = static function ( $text ) {
	$parts = preg_split( '/\R{2,}/', (string) $text );
	if ( ! is_array( $parts ) ) {
		return;
	}
	foreach ( $parts as $part ) {
		$part = trim( $part );
		if ( '' !== $part ) {
			echo '<p>' . esc_html( $part ) . '</p>';
		}
	}
};

$careers_icon_svg = static function ( $key ) {
	$key = sanitize_key( (string) $key );
	$icons = array(
		'globe'     => '<svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8"/><path d="M3 12h18M12 3c2.4 2.5 3.6 5.5 3.6 9S14.4 18.5 12 21M12 3C9.6 5.5 8.4 8.5 8.4 12S9.6 18.5 12 21" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>',
		'briefcase' => '<svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M8 7V5.8C8 4.8 8.8 4 9.8 4h4.4c1 0 1.8.8 1.8 1.8V7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/><rect x="4" y="7" width="16" height="13" rx="3" stroke="currentColor" stroke-width="1.8"/><path d="M4 12h16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>',
		'health'    => '<svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 20s-7-4.6-7-10.2A4.8 4.8 0 0 1 12 5.6 4.8 4.8 0 0 1 19 9.8C19 15.4 12 20 12 20z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M12 8v5M9.5 10.5h5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>',
		'savings'   => '<svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="5" y="6" width="14" height="14" rx="3" stroke="currentColor" stroke-width="1.8"/><path d="M9 6V4.8C9 3.8 9.8 3 10.8 3h2.4C14.2 3 15 3.8 15 4.8V6M12 9v8M9.8 11.2c0-1 1-1.8 2.2-1.8 1.3 0 2.2.7 2.2 1.7 0 2.3-4.4 1.1-4.4 3.4 0 1.1 1 1.8 2.2 1.8 1.4 0 2.4-.8 2.4-1.9" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>',
		'clock'     => '<svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><circle cx="10" cy="10" r="7.2" stroke="currentColor" stroke-width="1.7"/><path d="M10 6.2v4.2l2.8 1.7" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>',
		'pin'       => '<svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M10 17s5.2-4.8 5.2-9.1A5.2 5.2 0 0 0 4.8 7.9C4.8 12.2 10 17 10 17z" stroke="currentColor" stroke-width="1.6"/><circle cx="10" cy="8.4" r="1.8" stroke="currentColor" stroke-width="1.6"/></svg>',
	);
	return $icons[ $key ] ?? '';
};
?>
<style>
	body.page-template-page-careers-figma #header-outer,
	body.page-template-page-careers-figma #header-space { display:none !important; }
</style>

<?php
slingshot_render_redesign_header(
	array(
		'variant'  => 'light',
		'cta_text' => slingshot_pm( 'car_header_cta_text', "Let's talk" ),
		'cta_url'  => slingshot_lp_h_attr( slingshot_pm( 'car_header_cta_url', '/contact/' ) ),
	)
);
?>

<div class="careers-page-wrapper">

	<!-- ── HERO ─────────────────────────────────────────────── -->
	<section class="careers-hero">
		<div class="careers-hero-blob careers-hero-blob-1"></div>
		<div class="careers-hero-blob careers-hero-blob-2"></div>
		<div class="careers-hero-blob careers-hero-blob-3"></div>

		<div class="careers-hero-inner">
			<div class="careers-hero-content">
				<?php
				$bc_parent = trim( (string) slingshot_pm( 'car_hero_bc_parent', '' ) );
				$bc_leaf   = trim( (string) slingshot_pm( 'car_hero_bc_leaf', '' ) );
				?>
				<?php if ( $bc_parent || $bc_leaf ) : ?>
				<div class="careers-hero-breadcrumb">
					<?php if ( $bc_parent ) : ?><span><?php echo esc_html( $bc_parent ); ?></span><?php endif; ?>
					<?php if ( $bc_parent && $bc_leaf ) : ?><span class="svc-hero-sep">/</span><?php endif; ?>
					<?php if ( $bc_leaf ) : ?><span><?php echo esc_html( $bc_leaf ); ?></span><?php endif; ?>
				</div>
				<?php endif; ?>
				<h1 class="careers-hero-heading"><?php echo $careers_lines( slingshot_pm( 'car_hero_heading', "Built for Big Kids\n& Daredevils" ) ); ?></h1>
				<p class="careers-hero-subtext"><?php echo esc_html( slingshot_pm( 'car_hero_subtext', 'The curious. The bold. The ones who care deeply about building great software.' ) ); ?></p>
				<a href="<?php echo slingshot_lp_h_attr( slingshot_pm( 'car_hero_cta_url', '#open-roles' ) ); ?>" class="careers-hero-btn">
					<?php echo esc_html( slingshot_pm( 'car_hero_cta_text', 'Open Roles' ) ); ?> <span>&#8594;</span>
				</a>
			</div>

			<div class="careers-hero-photos">
				<?php
				$legacy_hero_img = slingshot_pm_image( 'car_hero_img', $img_dir . '/teams-hero-a.png' );
				$hero_img_a      = slingshot_pm_image( 'car_hero_img_a', $legacy_hero_img );
				$hero_img_b      = slingshot_pm_image( 'car_hero_img_b', $img_dir . '/teams-hero-b.png' );
				$hero_alt_a      = esc_attr( slingshot_pm( 'car_hero_img_a_alt', slingshot_pm( 'car_hero_img_alt', 'Slingshot team collaborating' ) ) );
				$hero_alt_b      = esc_attr( slingshot_pm( 'car_hero_img_b_alt', 'Slingshot team member at work' ) );
				?>
				<?php if ( $hero_img_a ) : ?>
				<div class="careers-hero-photo careers-hero-photo-a">
					<img src="<?php echo esc_url( $hero_img_a ); ?>" alt="<?php echo $hero_alt_a; ?>">
				</div>
				<?php endif; ?>
				<?php if ( $hero_img_b ) : ?>
				<div class="careers-hero-photo careers-hero-photo-b">
					<img src="<?php echo esc_url( $hero_img_b ); ?>" alt="<?php echo $hero_alt_b; ?>">
				</div>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<!-- ── WHAT IT'S LIKE ───────────────────────────────────── -->
	<?php
	$wtl_heading = slingshot_pm( 'car_wtl_heading', "What It's Like to Work Here" );
	$wtl_text    = slingshot_pm( 'car_wtl_text', "At Slingshot, you'll work alongside talented engineers, designers, and product thinkers on real problems for real clients. We value ownership, craft, and honesty — and we believe the best work happens when people have the autonomy to do it their way.\n\nWe offer flexible hybrid culture, competitive benefits, and a team that genuinely cares about your growth. Whether you're a senior engineer or just starting out, there's a place for ambitious people who want to make things happen." );
	$wtl_img     = slingshot_pm_image( 'car_wtl_img', '' );
	$wtl_alt     = esc_attr( slingshot_pm( 'car_wtl_img_alt', 'Slingshot team at work' ) );
	?>
	<section class="careers-wtl-section">
		<div class="careers-wtl-content">
			<h2 class="careers-wtl-heading"><?php echo esc_html( $wtl_heading ); ?></h2>
			<div class="careers-wtl-text">
				<?php $careers_paragraphs( $wtl_text ); ?>
			</div>
		</div>
		<?php if ( $wtl_img ) : ?>
		<div class="careers-wtl-photo">
			<img src="<?php echo esc_url( $wtl_img ); ?>" alt="<?php echo $wtl_alt; ?>" loading="lazy">
		</div>
		<?php endif; ?>
	</section>

	<!-- ── PERKS & BENEFITS ─────────────────────────────────── -->
	<?php
	$perks_heading = slingshot_pm( 'car_perks_heading', 'Perks & Benefits' );
	$perks_items   = slingshot_pm( 'car_perks_items', array() );
	$perks_img     = slingshot_pm_image( 'car_perks_img', $img_dir . '/teams-dedicated-team-photo.png' );
	$perks_alt     = esc_attr( slingshot_pm( 'car_perks_img_alt', 'Slingshot team' ) );
	if ( ! is_array( $perks_items ) ) { $perks_items = array(); }
	?>
	<?php if ( ! empty( $perks_items ) ) : ?>
	<section class="careers-perks-section">
		<div class="careers-perks-content">
			<h2 class="careers-perks-heading"><?php echo esc_html( $perks_heading ); ?></h2>
			<div class="careers-perks-grid">
				<?php foreach ( $perks_items as $perk ) : ?>
				<div class="careers-perk">
					<?php
					$perk_icon = ! empty( $perk['icon_svg'] ) ? $perk['icon_svg'] : $careers_icon_svg( $perk['icon_key'] ?? '' );
					?>
					<?php if ( $perk_icon ) : ?>
					<div class="careers-perk-icon">
						<?php echo $perk_icon; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</div>
					<?php endif; ?>
					<div class="careers-perk-title"><?php echo esc_html( $perk['title'] ?? '' ); ?></div>
					<?php if ( ! empty( $perk['desc'] ) ) : ?>
					<p class="careers-perk-desc"><?php echo esc_html( $perk['desc'] ); ?></p>
					<?php endif; ?>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<?php if ( $perks_img ) : ?>
		<div class="careers-perks-photo">
			<img src="<?php echo esc_url( $perks_img ); ?>" alt="<?php echo $perks_alt; ?>" loading="lazy">
		</div>
		<?php endif; ?>
	</section>
	<?php endif; ?>

	<!-- ── OPEN ROLES ───────────────────────────────────────── -->
	<?php
	$roles_heading = slingshot_pm( 'car_roles_heading', 'Open Roles' );
	$roles_items   = slingshot_pm( 'car_roles_items', array() );
	if ( ! is_array( $roles_items ) ) { $roles_items = array(); }
	?>
	<section class="careers-roles-section" id="open-roles">
		<h2 class="careers-roles-heading"><?php echo esc_html( $roles_heading ); ?></h2>
		<?php if ( ! empty( $roles_items ) ) : ?>
			<?php foreach ( $roles_items as $role ) :
				$role_url = ! empty( $role['link_url'] ) ? $role['link_url'] : '#';
				$tags     = ! empty( $role['tags'] ) ? array_filter( array_map( 'trim', explode( ',', $role['tags'] ) ) ) : array();
				$role_type = ! empty( $role['type'] ) ? $role['type'] : ( $tags[1] ?? $tags[0] ?? 'Full-time' );
				$role_location = ! empty( $role['location'] ) ? $role['location'] : 'Louisville, KY';
				$link_text = ! empty( $role['link_text'] ) ? $role['link_text'] : 'Details';
			?>
			<a href="<?php echo slingshot_lp_h_attr( $role_url ); ?>" class="careers-role-item">
				<div class="careers-role-left">
					<span class="careers-role-title"><?php echo esc_html( $role['title'] ?? '' ); ?></span>
					<div class="careers-role-meta">
						<?php if ( $role_type ) : ?>
						<span class="careers-role-meta-item careers-role-type">
							<?php echo $careers_icon_svg( 'clock' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							<?php echo esc_html( $role_type ); ?>
						</span>
						<?php endif; ?>
						<?php if ( $role_location ) : ?>
						<span class="careers-role-meta-item careers-role-location">
							<?php echo $careers_icon_svg( 'pin' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							<?php echo esc_html( $role_location ); ?>
						</span>
						<?php endif; ?>
					</div>
				</div>
				<span class="careers-role-arrow"><?php echo esc_html( $link_text ); ?> <span>&#8594;</span></span>
			</a>
			<?php endforeach; ?>
		<?php else : ?>
			<p style="color:#6B6B8A;font-size:16px;">No open positions at the moment — check back soon!</p>
		<?php endif; ?>
	</section>

	<!-- ── HIT US UP / CONTACT FORM ─────────────────────────── -->
	<?php
	$form_heading = slingshot_pm( 'car_form_heading', 'Hit us up' );
	$form_subtext = slingshot_pm( 'car_form_subtext', "Even if you don't see a role that fits, we'd love to hear from you." );
	$form_id      = (int) slingshot_pm( 'car_form_gf_id', 0 ); // Gravity Forms form ID
	?>
	<section class="careers-form-section">
		<div class="careers-form-blob careers-form-blob-1"></div>
		<div class="careers-form-blob careers-form-blob-2"></div>
		<div class="careers-form-inner">
			<h2 class="careers-form-heading"><?php echo esc_html( $form_heading ); ?></h2>
			<?php if ( $form_subtext ) : ?>
			<p class="careers-form-subtext"><?php echo esc_html( $form_subtext ); ?></p>
			<?php endif; ?>
			<div class="careers-form-body">
				<?php if ( $form_id && function_exists( 'gravity_form' ) ) :
					gravity_form( $form_id, false, false, false, null, true, 1 );
				else : ?>
				<form class="careers-form-html" method="post" action="#">
					<div class="careers-form-slider">
						<label class="careers-form-label">Which Are You More?</label>
						<div class="careers-form-slider-track"><span>&lsaquo; &rsaquo;</span></div>
						<div class="careers-form-slider-labels"><span>Big kid</span><span>Daredevil</span></div>
					</div>
					<div class="careers-form-row">
						<div class="careers-form-field">
							<label class="careers-form-label">First Name<span>*</span></label>
							<input type="text" class="careers-form-input">
						</div>
						<div class="careers-form-field">
							<label class="careers-form-label">Last Name<span>*</span></label>
							<input type="text" class="careers-form-input">
						</div>
					</div>
					<div class="careers-form-row">
						<div class="careers-form-field">
							<label class="careers-form-label">Email<span>*</span></label>
							<input type="email" class="careers-form-input">
						</div>
						<div class="careers-form-field">
							<label class="careers-form-label">Phone<span>*</span></label>
							<input type="tel" class="careers-form-input">
						</div>
					</div>
					<div class="careers-form-row" style="grid-template-columns:1fr;">
						<div class="careers-form-field full-width">
							<label class="careers-form-label">Portfolio Link</label>
							<input type="url" class="careers-form-input">
						</div>
					</div>
					<div class="careers-form-row" style="grid-template-columns:1fr;">
						<div class="careers-form-field full-width">
							<label class="careers-form-label">Which job are you applying for?</label>
							<select class="careers-form-select">
								<option></option>
								<?php foreach ( $roles_items as $role ) : ?>
								<option><?php echo esc_html( $role['title'] ?? '' ); ?></option>
								<?php endforeach; ?>
								<option>Other</option>
							</select>
						</div>
					</div>
					<div class="careers-form-upload">
						<span class="careers-form-upload-icon">⌕</span>
						<span><strong>Resume, cover letter or portfolio</strong><small>Max. file size: 128 MB, Max. files: 3.</small></span>
					</div>
					<button type="submit" class="careers-form-submit">Apply now &#8594;</button>
				</form>
				<?php endif; ?>
			</div>
		</div>
	</section>

</div><!-- .careers-page-wrapper -->

<?php get_footer(); ?>
