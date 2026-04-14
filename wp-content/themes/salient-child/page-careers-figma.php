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
wp_enqueue_style( 'service-figma-style', get_stylesheet_directory_uri() . '/css/service-figma.css', array(), '1.4' );
wp_enqueue_script( 'hp-script', get_stylesheet_directory_uri() . '/js/home.js', array( 'jquery' ), '1.6', true );

get_header();

$img_dir = get_stylesheet_directory_uri() . '/img';

// slingshot_pm() reads current post meta
?>
<style>
	body.page-template-page-careers-figma #header-outer,
	body.page-template-page-careers-figma #header-space { display:none !important; }
</style>

<?php slingshot_render_redesign_header( array( 'variant' => 'light', 'cta_url' => slingshot_lp_h_attr( slingshot_pm( 'car_hero_cta_url', '/contact/' ) ) ) ); ?>

<div class="careers-page-wrapper">

	<!-- ── HERO ─────────────────────────────────────────────── -->
	<section class="careers-hero">
		<div class="careers-hero-blob careers-hero-blob-1"></div>
		<div class="careers-hero-blob careers-hero-blob-2"></div>
		<div class="careers-hero-blob careers-hero-blob-3"></div>

		<div class="careers-hero-inner">
			<div class="careers-hero-content">
				<div class="careers-hero-breadcrumb">
					<span><?php echo esc_html( slingshot_pm( 'car_hero_bc_parent', 'COMPANY' ) ); ?></span>
					<span class="svc-hero-sep">/</span>
					<span><?php echo esc_html( slingshot_pm( 'car_hero_bc_leaf', 'CAREERS' ) ); ?></span>
				</div>
				<h1 class="careers-hero-heading"><?php echo nl2br( esc_html( slingshot_pm( 'car_hero_heading', "Built for Big Kids\n& Daredevils" ) ) ); ?></h1>
				<p class="careers-hero-subtext"><?php echo esc_html( slingshot_pm( 'car_hero_subtext', "We're looking for curious, driven people who love building things that matter. No bureaucracy, no red tape — just great work and great people." ) ); ?></p>
				<a href="<?php echo slingshot_lp_h_attr( slingshot_pm( 'car_hero_cta_url', '#open-roles' ) ); ?>" class="careers-hero-btn">
					<?php echo esc_html( slingshot_pm( 'car_hero_cta_text', 'See Open Roles' ) ); ?> <span>&#8594;</span>
				</a>
			</div>

			<?php
			$hero_img = slingshot_pm_image( 'car_hero_img', '' );
			$hero_alt = esc_attr( slingshot_pm( 'car_hero_img_alt', 'Slingshot team' ) );
			?>
			<?php if ( $hero_img ) : ?>
			<div class="careers-hero-photo">
				<img src="<?php echo esc_url( $hero_img ); ?>" alt="<?php echo $hero_alt; ?>">
			</div>
			<?php else : ?>
			<div class="careers-hero-photo">
				<img src="<?php echo esc_url( $img_dir ); ?>/hero-person-1.jpg" alt="Slingshot team">
			</div>
			<?php endif; ?>
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
				<?php
				$paras = array_filter( array_map( 'trim', explode( "\n", $wtl_text ) ) );
				foreach ( $paras as $para ) {
					echo '<p>' . esc_html( $para ) . '</p>';
				}
				?>
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
	$perks_img     = slingshot_pm_image( 'car_perks_img', '' );
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
					<?php if ( ! empty( $perk['icon_svg'] ) ) : ?>
					<div class="careers-perk-icon">
						<?php echo $perk['icon_svg']; // phpcs:ignore ?>
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
			?>
			<a href="<?php echo slingshot_lp_h_attr( $role_url ); ?>" class="careers-role-item">
				<div class="careers-role-left">
					<span class="careers-role-title"><?php echo esc_html( $role['title'] ?? '' ); ?></span>
					<?php if ( ! empty( $tags ) ) : ?>
					<div class="careers-role-tags">
						<?php foreach ( $tags as $tag ) : ?>
						<span class="careers-role-tag"><?php echo esc_html( $tag ); ?></span>
						<?php endforeach; ?>
					</div>
					<?php endif; ?>
				</div>
				<span class="careers-role-arrow">&#8594;</span>
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
			<p class="careers-form-subtext"><?php echo esc_html( $form_subtext ); ?></p>
			<div class="careers-form-body">
				<?php if ( $form_id && function_exists( 'gravity_form' ) ) :
					gravity_form( $form_id, false, false, false, null, true, 1 );
				else : ?>
				<form class="careers-form-html" method="post" action="#">
					<div class="careers-form-row">
						<div class="careers-form-field">
							<label class="careers-form-label">First name</label>
							<input type="text" class="careers-form-input" placeholder="First name">
						</div>
						<div class="careers-form-field">
							<label class="careers-form-label">Last name</label>
							<input type="text" class="careers-form-input" placeholder="Last name">
						</div>
					</div>
					<div class="careers-form-row">
						<div class="careers-form-field">
							<label class="careers-form-label">Email</label>
							<input type="email" class="careers-form-input" placeholder="your@email.com">
						</div>
						<div class="careers-form-field">
							<label class="careers-form-label">Phone</label>
							<input type="tel" class="careers-form-input" placeholder="+1 (000) 000-0000">
						</div>
					</div>
					<div class="careers-form-row" style="grid-template-columns:1fr;">
						<div class="careers-form-field full-width">
							<label class="careers-form-label">Role you're interested in</label>
							<input type="text" class="careers-form-input" placeholder="e.g. Senior .NET Developer">
						</div>
					</div>
					<div class="careers-form-row" style="grid-template-columns:1fr;">
						<div class="careers-form-field full-width">
							<label class="careers-form-label">Tell us about yourself</label>
							<textarea class="careers-form-textarea" placeholder="Share your background, links to work, or anything else that helps us get to know you."></textarea>
						</div>
					</div>
					<div class="careers-form-checkbox">
						<input type="checkbox" id="careers-consent">
						<label for="careers-consent">I agree to the <a href="/privacy-policy/">Privacy Policy</a> and consent to being contacted.</label>
					</div>
					<button type="submit" class="careers-form-submit">Send it &#8594;</button>
				</form>
				<?php endif; ?>
			</div>
		</div>
	</section>

</div><!-- .careers-page-wrapper -->

<?php get_footer(); ?>
