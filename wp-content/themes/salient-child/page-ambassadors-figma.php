<?php
/*
Template Name: Ambassadors Figma
 * Content: Edit Page meta fields (Meta Box).
 */

wp_enqueue_style( 'pages-figma-jakarta',  'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap', array(), null );
wp_enqueue_style( 'home-style',           get_stylesheet_directory_uri() . '/css/home.css',          array(), '1.18' );
wp_enqueue_style( 'service-figma-style',  get_stylesheet_directory_uri() . '/css/service-figma.css', array(), '1.6' );
wp_enqueue_style( 'pages-figma-style',    get_stylesheet_directory_uri() . '/css/pages-figma.css',   array(), '1.0' );
wp_enqueue_style( 'pages-figma-2-style',  get_stylesheet_directory_uri() . '/css/pages-figma-2.css', array(), '1.6' );
wp_enqueue_script( 'hp-script',           get_stylesheet_directory_uri() . '/js/home.js',            array( 'jquery' ), '1.6', true );

get_header();

$img_dir     = get_stylesheet_directory_uri() . '/img';
$mascot_path = get_stylesheet_directory() . '/img/cta-mascot.png';
$mascot_url  = $img_dir . '/cta-mascot.png';

// ── Hero ──────────────────────────────────────────────────────
$hero_label    = slingshot_pm( 'amb_hero_label',    'SLINGSHOT AMBASSADORS' );
$hero_heading  = slingshot_pm( 'amb_hero_heading',  "Be the Voice of What's Next" );
$hero_desc     = slingshot_pm( 'amb_hero_desc',     'Slingshot Ambassadors are innovation champions, leaders, founders, product owners, and bold thinkers helping shape the future of tech, strategy, and business outcomes.' );
$hero_btn_text = slingshot_pm( 'amb_hero_btn_text', 'Join the Ambassador Circle' );
$hero_btn_url  = slingshot_pm( 'amb_hero_btn_url',  '#ambassador-form' );
$hero_img      = slingshot_pm_image( 'amb_hero_img', '' );
$hero_img_b    = slingshot_pm_image( 'amb_hero_img_b', '' );
if ( ! $hero_img ) {
	$hero_img = $img_dir . '/ambassadors-hero-a.png';
}
if ( ! $hero_img_b ) {
	$hero_img_b = $img_dir . '/ambassadors-hero-b.png';
}

// ── Benefits ──────────────────────────────────────────────────
$ben_heading = slingshot_pm( 'amb_ben_heading', "You've Helped Build What's Next—Now Help Amplify It" );
$ben_desc    = slingshot_pm( 'amb_ben_desc',    "As a Slingshot Ambassador, you've seen firsthand what's possible when vision meets capability. Now, you can amplify that momentum, helping more people bring big ideas to life.\n\nThis isn't about being a fan. It's about being part of a forward-looking group of product-minded, change-focused professionals who want to influence what innovation looks like across industries.\n\nWhether you're a CEO, a product leader, or a strategic partner, you belong here." );
$ben_cards   = slingshot_pm( 'amb_ben_cards', [] );
$ben_cards   = is_array( $ben_cards ) ? $ben_cards : [];
if ( empty( $ben_cards ) ) {
	$ben_cards = [
		[
			'icon_svg' => '<svg width="44" height="44" viewBox="0 0 44 44" fill="none"><circle cx="22" cy="13" r="3" stroke="#23B7B4" stroke-width="2"/><circle cx="13" cy="29" r="3" stroke="#23B7B4" stroke-width="2"/><circle cx="31" cy="29" r="3" stroke="#23B7B4" stroke-width="2"/><path d="M20.5 15.8 14.6 26M23.5 15.8 29.4 26M16 29h12" stroke="#23B7B4" stroke-width="2" stroke-linecap="round"/></svg>',
			'heading'  => 'Early Access to Innovation',
			'desc'     => 'Be first to explore new Slingshot tech pilots, design tools, and product launches',
		],
		[
			'icon_svg' => '<svg width="44" height="44" viewBox="0 0 44 44" fill="none"><circle cx="22" cy="22" r="14" stroke="#7A4FEB" stroke-width="2"/><path d="M22 14v16M18 18.5c0-1.9 1.7-3 4.1-3 2.1 0 3.8.8 4.5 2.2M17.8 26.5c.9 1.5 2.6 2.3 4.8 2.3 2.5 0 4.2-1.1 4.2-3 0-1.6-1.3-2.6-4.2-3.1-2.9-.6-4.5-1.6-4.5-3.3" stroke="#7A4FEB" stroke-width="2" stroke-linecap="round"/></svg>',
			'heading'  => '$1K Referral Bonus + Public Recognition',
			'desc'     => 'Your intros matter—and when they lead to partnerships, we celebrate them (and you)',
		],
		[
			'icon_svg' => '<svg width="44" height="44" viewBox="0 0 44 44" fill="none"><path d="M15 27c-2.3-2.2-3.4-4.7-3.4-7.6 0-5.6 4.5-10.1 10.1-10.1 4.5 0 8.3 2.8 9.6 6.8" stroke="#EF6D63" stroke-width="2" stroke-linecap="round"/><path d="M28.5 22.5l2 1.1 2.1-1.1 1.3 2-1.8 1.6.2 2.4-2.3.5-1-2.1-2.4-.2-.5-2.3 2.1-1 .3-2.4z" stroke="#EF6D63" stroke-width="1.8" stroke-linejoin="round"/><path d="M17 31c1.1-2.6 2.8-3.9 5-3.9 1.4 0 2.6.5 3.6 1.5" stroke="#EF6D63" stroke-width="2" stroke-linecap="round"/></svg>',
			'heading'  => 'Innovation Peer Circle',
			'desc'     => 'Connect with a network of visionaries across industries, roles, and disciplines',
		],
		[
			'icon_svg' => '<svg width="44" height="44" viewBox="0 0 44 44" fill="none"><path d="M11 31c1.5-4.2 4.1-6.4 7.8-6.4M18.8 22.4a4.6 4.6 0 1 0 0-9.2 4.6 4.6 0 0 0 0 9.2zM27 31V16h7v15M24 31h13M30.5 16v-5" stroke="#4D86D9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
			'heading'  => 'Direct Access to Slingshot Leaders',
			'desc'     => 'Influence our direction through strategic feedback and idea exchanges',
		],
	];
}

// ── Contribute ────────────────────────────────────────────────
$con_heading = slingshot_pm( 'amb_con_heading', 'How You Contribute' );
$con_cards   = slingshot_pm( 'amb_con_cards', [] );
$con_cards   = is_array( $con_cards ) ? $con_cards : [];
if ( empty( $con_cards ) ) {
	$con_cards = [
		[
			'icon_svg' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><rect width="42" height="42" rx="12" fill="#fff"/><circle cx="16" cy="17" r="4" stroke="#7A4FEB" stroke-width="2"/><circle cx="28" cy="16" r="3" stroke="#26B4B0" stroke-width="2"/><path d="M9 31c1.5-4.2 3.9-6.3 7-6.3s5.5 2.1 7 6.3M24 29c1.1-2.6 2.5-3.9 4.2-3.9 1.8 0 3.3 1.3 4.4 3.9" stroke="#282828" stroke-width="2" stroke-linecap="round"/></svg>',
			'heading'  => 'Introduce Forward - Thinking Leaders',
			'desc'     => 'Connect your network to a partner who can deliver on big ideas',
		],
		[
			'icon_svg' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><rect width="42" height="42" rx="12" fill="#fff"/><path d="M13 15h16M13 21h16M13 27h10" stroke="#7A4FEB" stroke-width="2" stroke-linecap="round"/><path d="M29 27l3 3 5-6" stroke="#26B4B0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
			'heading'  => 'Share What Works',
			'desc'     => "Your wins help others see what's possible—and how to get there faster",
		],
		[
			'icon_svg' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><rect width="42" height="42" rx="12" fill="#fff"/><path d="M21 11v20M11 21h20" stroke="#7A4FEB" stroke-width="2" stroke-linecap="round"/><circle cx="21" cy="21" r="12" stroke="#26B4B0" stroke-width="2"/></svg>',
			'heading'  => "Shape What's Next",
			'desc'     => 'Help guide future services and priorities through honest, strategic feedback',
		],
		[
			'icon_svg' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><rect width="42" height="42" rx="12" fill="#fff"/><path d="M21 12l2.8 7.1 7.6.5-5.9 4.8 1.9 7.4-6.4-4.1-6.4 4.1 1.9-7.4-5.9-4.8 7.6-.5L21 12z" stroke="#7A4FEB" stroke-width="2" stroke-linejoin="round"/></svg>',
			'heading'  => 'Champion Innovation in Your Space',
			'desc'     => "Whether it's in healthcare, fintech, logistics, or SaaS—your voice matters",
		],
	];
}
$con_img = slingshot_pm_image( 'amb_con_img', '' );
if ( ! $con_img ) {
	$con_img = $img_dir . '/ambassadors-contribute.png';
}

// ── Form ──────────────────────────────────────────────────────
$form_heading     = slingshot_pm( 'amb_form_heading',     "Become Part of a Circle That's Building Bold" );
$form_desc        = slingshot_pm( 'amb_form_desc',        "We're inviting advocates, leaders, and innovators to help shape the next generation of digital impact together." );
$form_who_label   = slingshot_pm( 'amb_form_who_label',   'Who Should Join?' );
$form_who_bullets = slingshot_pm( 'amb_form_who_bullets', "You've worked with Slingshot as a client, collaborator, or strategic partner.\nYou're leading, building, or influencing technology, product, or business decisions.\nYou care about solving real problems, building smart, and sharing what works.\nYou want to help shape innovation, not just react to it." );
$form_card_heading = slingshot_pm( 'amb_form_card_heading', 'Request a Speaker' );
$form_gf_id        = (int) slingshot_pm( 'amb_form_gf_id', 0 );
$form_action_url   = slingshot_pm( 'amb_form_action_url', '#' );
$form_name_label   = slingshot_pm( 'amb_form_name_placeholder', 'Name*' );
$form_org_label    = slingshot_pm( 'amb_form_org_placeholder', 'Organization' );
$form_email_label  = slingshot_pm( 'amb_form_email_placeholder', 'Email*' );
$form_phone_label  = slingshot_pm( 'amb_form_phone_placeholder', 'Phone*' );
$form_event_label  = slingshot_pm( 'amb_form_event_placeholder', 'Event*' );
$form_msg_label    = slingshot_pm( 'amb_form_message_placeholder', 'What are you looking for?' );
$form_submit_text  = slingshot_pm( 'amb_form_submit', 'Submit Request' );

$who_bullets = array_filter( array_map( 'trim', explode( "\n", $form_who_bullets ) ) );
$ben_desc_paragraphs = array_filter( array_map( 'trim', preg_split( '/\R{2,}/', (string) $ben_desc ) ) );
$amb_field_label = static function( $label ) {
	$label = trim( (string) $label );
	if ( '' === $label ) {
		return '';
	}
	if ( '*' === substr( $label, -1 ) ) {
		return esc_html( substr( $label, 0, -1 ) ) . '<span class="amb-required">*</span>';
	}
	return esc_html( $label );
};
?>
<style>
body.page-template-page-ambassadors-figma #header-outer,
body.page-template-page-ambassadors-figma #header-space { display:none !important; }
</style>

<?php slingshot_render_redesign_header( array( 'variant' => 'light' ) ); ?>

<div class="amb-page-wrapper">

	<!-- ── HERO ──────────────────────────────────────────── -->
	<section class="fig-hero">
		<div class="fig-hero-blob fig-hero-blob-1"></div>
		<div class="fig-hero-blob fig-hero-blob-2"></div>

		<div class="amb-hero-inner">
			<div class="amb-hero-content">
				<?php if ( $hero_label ) : ?>
				<div class="amb-hero-label"><?php echo esc_html( $hero_label ); ?></div>
				<?php endif; ?>
				<h1 class="amb-hero-heading"><?php echo esc_html( $hero_heading ); ?></h1>
				<?php if ( $hero_desc ) : ?>
				<p class="amb-hero-desc"><?php echo esc_html( $hero_desc ); ?></p>
				<?php endif; ?>
				<a href="<?php echo slingshot_lp_h_attr( $hero_btn_url ); ?>" class="amb-hero-btn">
					<?php echo esc_html( $hero_btn_text ); ?> &rarr;
				</a>
			</div>

			<?php if ( $hero_img || $hero_img_b ) : ?>
			<div class="amb-hero-imgs">
				<?php if ( $hero_img ) : ?>
				<div class="amb-hero-img amb-hero-img--a">
					<img src="<?php echo esc_url( $hero_img ); ?>" alt="">
				</div>
				<?php endif; ?>
				<?php if ( $hero_img_b ) : ?>
				<div class="amb-hero-img amb-hero-img--b">
					<img src="<?php echo esc_url( $hero_img_b ); ?>" alt="">
				</div>
				<?php endif; ?>
			</div>
			<?php endif; ?>
		</div>
	</section>

	<!-- ── BENEFITS ──────────────────────────────────────── -->
	<section class="amb-benefits-section">
		<div class="amb-benefits-intro">
			<h2 class="fig-section-heading"><?php echo esc_html( $ben_heading ); ?></h2>
			<?php if ( $ben_desc_paragraphs ) : ?>
			<div class="amb-benefits-copy">
				<?php foreach ( $ben_desc_paragraphs as $paragraph ) : ?>
				<p><?php echo esc_html( $paragraph ); ?></p>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
		</div>
		<div class="amb-help-grid">
			<?php foreach ( $ben_cards as $card ) : ?>
			<div class="amb-help-card">
				<?php if ( ! empty( $card['icon_svg'] ) ) : ?>
				<div class="amb-help-icon"><?php echo $card['icon_svg']; ?></div>
				<?php endif; ?>
				<h3 class="amb-help-heading"><?php echo esc_html( $card['heading'] ?? '' ); ?></h3>
				<p class="amb-help-desc"><?php echo esc_html( $card['desc'] ?? '' ); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
	</section>

	<!-- ── HOW YOU CONTRIBUTE ────────────────────────────── -->
	<section class="amb-contribute-section">
		<div>
			<h2 class="fig-section-heading"><?php echo esc_html( $con_heading ); ?></h2>
			<div class="amb-contribute-grid">
				<?php foreach ( $con_cards as $card ) : ?>
				<div class="amb-contribute-card">
					<?php if ( ! empty( $card['icon_svg'] ) ) : ?>
					<div class="amb-contribute-icon"><?php echo $card['icon_svg']; ?></div>
					<?php endif; ?>
					<h3 class="amb-contribute-heading"><?php echo esc_html( $card['heading'] ?? '' ); ?></h3>
					<p class="amb-contribute-desc"><?php echo esc_html( $card['desc'] ?? '' ); ?></p>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<?php if ( $con_img ) : ?>
		<div class="amb-contribute-img">
			<img src="<?php echo esc_url( $con_img ); ?>" alt="" loading="lazy">
		</div>
		<?php endif; ?>
	</section>

	<!-- ── FORM CTA ──────────────────────────────────────── -->
	<section class="amb-form-section" id="ambassador-form">
		<div class="amb-form-blob"></div>
		<div class="amb-form-content">
			<h2 class="amb-form-heading"><?php echo esc_html( $form_heading ); ?></h2>
			<?php if ( $form_desc ) : ?>
			<p class="amb-form-desc"><?php echo esc_html( $form_desc ); ?></p>
			<?php endif; ?>
			<?php if ( $who_bullets ) : ?>
			<div class="amb-who-label"><?php echo esc_html( $form_who_label ); ?></div>
			<ul class="amb-who-bullets">
				<?php foreach ( $who_bullets as $bullet ) : ?>
				<li class="amb-who-bullet"><?php echo esc_html( $bullet ); ?></li>
				<?php endforeach; ?>
			</ul>
			<?php endif; ?>
		</div>

		<div class="amb-form-card">
			<h3 class="amb-form-card-heading"><?php echo esc_html( $form_card_heading ); ?></h3>
			<?php if ( $form_gf_id && function_exists( 'gravity_form' ) ) :
				gravity_form( $form_gf_id, false, false, false, null, true, 1 );
			else : ?>
			<form class="amb-static-form" method="post" action="<?php echo esc_url( $form_action_url ); ?>">
				<div class="amb-form-card-divider"></div>
				<div class="amb-form-row">
					<label class="amb-form-field">
						<input type="text" class="amb-form-input" placeholder=" " required>
						<span class="amb-form-label"><?php echo $amb_field_label( $form_name_label ); ?></span>
					</label>
					<label class="amb-form-field">
						<input type="text" class="amb-form-input" placeholder=" ">
						<span class="amb-form-label"><?php echo $amb_field_label( $form_org_label ); ?></span>
					</label>
				</div>
				<div class="amb-form-row">
					<label class="amb-form-field">
						<input type="email" class="amb-form-input" placeholder=" " required>
						<span class="amb-form-label"><?php echo $amb_field_label( $form_email_label ); ?></span>
					</label>
					<label class="amb-form-field">
						<input type="tel" class="amb-form-input" placeholder=" " required>
						<span class="amb-form-label"><?php echo $amb_field_label( $form_phone_label ); ?></span>
					</label>
				</div>
				<label class="amb-form-field amb-form-field--full amb-form-field--select">
					<input type="text" class="amb-form-input" placeholder=" " required>
					<span class="amb-form-label"><?php echo $amb_field_label( $form_event_label ); ?></span>
					<span class="amb-form-select-arrow" aria-hidden="true"></span>
				</label>
				<label class="amb-form-field amb-form-field--full amb-form-field--message">
					<textarea class="amb-form-input amb-form-textarea" rows="2" placeholder=" "></textarea>
					<span class="amb-form-label"><?php echo $amb_field_label( $form_msg_label ); ?></span>
				</label>
				<button type="submit" class="amb-form-submit"><?php echo esc_html( $form_submit_text ); ?> &rarr;</button>
			</form>
			<?php endif; ?>
		</div>
	</section>

</div><!-- .amb-page-wrapper -->

<?php get_footer(); ?>
