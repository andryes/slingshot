<?php
/*
Template Name: Contact Figma
 * Content: Edit Page meta fields (Meta Box).
 */

wp_enqueue_style(
	'pages-figma-jakarta',
	'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap',
	array(), null
);
wp_enqueue_style( 'home-style',        get_stylesheet_directory_uri() . '/css/home.css',        array(), '1.18' );
wp_enqueue_style( 'service-figma-style', get_stylesheet_directory_uri() . '/css/service-figma.css', array(), '1.6' );
wp_enqueue_style( 'pages-figma-style', get_stylesheet_directory_uri() . '/css/pages-figma.css', array(), '1.9' );
wp_enqueue_script( 'hp-script',        get_stylesheet_directory_uri() . '/js/home.js',           array( 'jquery' ), '1.6', true );

get_header();
?>
<style>
	body.page-template-page-contact-figma #header-outer,
	body.page-template-page-contact-figma #header-space { display:none !important; }
	@media (min-width: 1101px) {
		body.page-template-page-contact-figma .cnt-hero-form-card select.cnt-form-select {
			-webkit-appearance: none !important;
			appearance: none !important;
			border-width: 0 0 1px !important;
			border-style: solid !important;
			border-color: #d8d8d8 !important;
			border-radius: 0 !important;
			background: transparent !important;
			box-shadow: none !important;
		}
		body.page-template-page-contact-figma .cnt-hero-form-card select.cnt-form-select[hidden] {
			display: none !important;
		}
		body.page-template-page-contact-figma .cnt-form-select-wrap .fancy-select-wrap,
		body.page-template-page-contact-figma .cnt-form-select-wrap .select2 {
			display: none !important;
		}
	}
</style>

<?php slingshot_render_redesign_header( array( 'variant' => 'light' ) ); ?>

<div class="cnt-page-wrapper">

	<!-- ── HERO ──────────────────────────────────────────── -->
	<section class="cnt-hero">
		<div class="cnt-hero-blob cnt-hero-blob-1"></div>
		<div class="cnt-hero-blob cnt-hero-blob-2"></div>
		<div class="cnt-hero-blob cnt-hero-blob-3"></div>

		<div class="cnt-hero-inner">

			<!-- Left: contact info -->
			<div class="cnt-hero-left">
				<div>
					<h1 class="cnt-hero-heading"><?php echo esc_html( slingshot_pm( 'cnt_heading', 'Ready To Get Started?' ) ); ?></h1>
					<?php $desc = slingshot_pm( 'cnt_desc', 'Have questions about pricing, projects, or Slingshot? Fill out the form below and a Slingshot representative will be in touch shortly.' ); ?>
					<?php if ( $desc ) : ?>
					<p class="cnt-hero-desc" style="margin-top:16px;"><?php echo esc_html( $desc ); ?></p>
					<?php endif; ?>
				</div>

				<div class="cnt-hero-contact-row">
					<div class="cnt-hero-contact-item">
						<div class="cnt-hero-contact-label">Call us</div>
						<?php $phone = slingshot_pm( 'cnt_phone', '502.254.6150' ); ?>
						<a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>" class="cnt-hero-contact-value">
							<?php echo esc_html( $phone ); ?>
						</a>
					</div>
					<div class="cnt-hero-contact-item">
						<div class="cnt-hero-contact-label">Drop us a line</div>
						<?php $email = slingshot_pm( 'cnt_email', 'hello@Yslingshot.com' ); ?>
						<a href="mailto:<?php echo esc_attr( strtolower( $email ) ); ?>" class="cnt-hero-contact-value">
							<?php echo esc_html( $email ); ?>
						</a>
					</div>
				</div>

				<?php
				$offices = slingshot_pm( 'cnt_offices', array() );
				if ( ! is_array( $offices ) ) { $offices = array(); }
				if ( empty( $offices ) ) {
					$offices = array(
						array( 'label' => 'Louisville', 'address_1' => '700 N Hurstbourne Pkwy #120', 'city_state_zip' => 'Louisville, KY 40222' ),
						array( 'label' => 'Chicago',    'address_1' => '111 North Wabash Ave #3106',  'city_state_zip' => 'Chicago, IL 60602' ),
						array( 'label' => 'Nashville',  'address_1' => '6339 CharlottePike #781',    'city_state_zip' => 'Nashville, TN 37209' ),
					);
				}
				?>
				<div>
					<div class="cnt-offices-label">Our offices</div>
					<div class="cnt-offices-grid">
						<?php foreach ( $offices as $office ) : ?>
						<div class="cnt-office">
							<div class="cnt-office-name"><?php echo esc_html( $office['label'] ?? '' ); ?></div>
							<div class="cnt-office-addr">
								<?php echo esc_html( $office['address_1'] ?? '' ); ?>
								<?php if ( ! empty( $office['address_2'] ) ) : ?><br><?php echo esc_html( $office['address_2'] ); ?><?php endif; ?>
								<br><?php echo esc_html( $office['city_state_zip'] ?? '' ); ?>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>

			<!-- Right: form card -->
			<div class="cnt-hero-form-card">
				<h2 class="cnt-form-heading"><?php echo esc_html( slingshot_pm( 'cnt_form_heading', 'Hit us up' ) ); ?></h2>
				<div class="cnt-form-divider"></div>

				<?php
				$gf_id = (int) slingshot_pm( 'cnt_form_gf_id', 0 );
				if ( $gf_id && function_exists( 'gravity_form' ) ) :
					gravity_form( $gf_id, false, false, false, null, true, 1 );
				else :
					$looking_raw = slingshot_pm( 'cnt_looking_options', "General Inquiry\nProduct Development\nMobile App\nWeb Development\nDesign\nAI / Machine Learning\nTeam Augmentation\nConsulting" );
					$looking_opts = array_filter( array_map( 'trim', explode( "\n", $looking_raw ) ) );
				?>
				<form class="cnt-form" method="post" action="#">
					<div class="cnt-form-select-wrap">
						<span class="cnt-form-select-text">What are you looking for?</span>
						<select class="cnt-form-select" hidden aria-hidden="true" tabindex="-1">
							<option value="" disabled selected>What are you looking for?</option>
							<?php foreach ( $looking_opts as $opt ) : ?>
							<option value="<?php echo esc_attr( $opt ); ?>"><?php echo esc_html( $opt ); ?></option>
							<?php endforeach; ?>
						</select>
						<span class="cnt-form-select-arrow">&#8964;</span>
					</div>

					<div class="cnt-form-row">
						<div class="cnt-form-field">
							<input type="text" class="cnt-form-input" placeholder="First Name*" required>
						</div>
						<div class="cnt-form-field">
							<input type="text" class="cnt-form-input" placeholder="Last Name*" required>
						</div>
					</div>

					<div class="cnt-form-field">
						<input type="text" class="cnt-form-input" placeholder="Company">
					</div>

					<div class="cnt-form-row">
						<div class="cnt-form-field">
							<input type="email" class="cnt-form-input" placeholder="Email*" required>
						</div>
						<div class="cnt-form-field">
							<input type="tel" class="cnt-form-input" placeholder="Phone*">
						</div>
					</div>

					<div class="cnt-form-field">
						<textarea class="cnt-form-textarea" placeholder="How can we help? Tell us a little bit about what you have going on"></textarea>
					</div>

					<div>
						<button type="submit" class="cnt-form-submit">Let's Talk &rarr;</button>
					</div>
				</form>
				<?php endif; ?>
			</div>
		</div>
	</section>

</div><!-- .cnt-page-wrapper -->

<?php get_footer(); ?>
