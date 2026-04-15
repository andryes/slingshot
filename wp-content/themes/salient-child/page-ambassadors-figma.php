<?php
/*
Template Name: Ambassadors Figma
 * Content: Edit Page meta fields (Meta Box).
 */

wp_enqueue_style( 'pages-figma-jakarta',  'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap', array(), null );
wp_enqueue_style( 'home-style',           get_stylesheet_directory_uri() . '/css/home.css',          array(), '1.18' );
wp_enqueue_style( 'service-figma-style',  get_stylesheet_directory_uri() . '/css/service-figma.css', array(), '1.6' );
wp_enqueue_style( 'pages-figma-style',    get_stylesheet_directory_uri() . '/css/pages-figma.css',   array(), '1.0' );
wp_enqueue_style( 'pages-figma-2-style',  get_stylesheet_directory_uri() . '/css/pages-figma-2.css', array(), '1.0' );
wp_enqueue_script( 'hp-script',           get_stylesheet_directory_uri() . '/js/home.js',            array( 'jquery' ), '1.6', true );

get_header();

$img_dir     = get_stylesheet_directory_uri() . '/img';
$mascot_path = get_stylesheet_directory() . '/img/cta-mascot.png';
$mascot_url  = $img_dir . '/cta-mascot.png';

// ── Hero ──────────────────────────────────────────────────────
$hero_label    = slingshot_pm( 'amb_hero_label',    'SLINGSHOT AMBASSADORS' );
$hero_heading  = slingshot_pm( 'amb_hero_heading',  "Be the Voice of What's Next" );
$hero_desc     = slingshot_pm( 'amb_hero_desc',     "Slingshot Ambassadors are innovators, champions, and connectors shaping the future of tech strategy, startup thinking, and driving the next generation of digital leaders." );
$hero_btn_text = slingshot_pm( 'amb_hero_btn_text', 'Become an Ambassador' );
$hero_btn_url  = slingshot_pm( 'amb_hero_btn_url',  '#ambassador-form' );
$hero_img      = slingshot_pm_image( 'amb_hero_img', '' );

// ── Benefits ──────────────────────────────────────────────────
$ben_heading = slingshot_pm( 'amb_ben_heading', "You've Helped Build What's Next — Now Help Amplify It" );
$ben_desc    = slingshot_pm( 'amb_ben_desc',    "As a Slingshot Ambassador, you'll become a strategic partner, thought leader, and key connector in a network that's shaping the next generation of digital leaders." );
$ben_cards   = slingshot_pm( 'amb_ben_cards', [] );
$ben_cards   = is_array( $ben_cards ) ? $ben_cards : [];
if ( empty( $ben_cards ) ) {
	$ben_cards = [
		[
			'icon_svg' => '<svg width="44" height="44" viewBox="0 0 44 44" fill="none"><rect width="44" height="44" rx="12" fill="#6D44B7" fill-opacity=".1"/><path d="M22 12v20M12 22h20" stroke="#6D44B7" stroke-width="2" stroke-linecap="round"/></svg>',
			'heading'  => 'Early Access to Innovation',
			'desc'     => "Be the first to preview Slingshot's new capabilities, AI tools, and strategic frameworks before they're publicly available.",
		],
		[
			'icon_svg' => '<svg width="44" height="44" viewBox="0 0 44 44" fill="none"><rect width="44" height="44" rx="12" fill="#23B7B4" fill-opacity=".1"/><path d="M15 22l5 5 9-10" stroke="#23B7B4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
			'heading'  => 'EU Referral Bonus + Public Recognition',
			'desc'     => 'Earn meaningful referral bonuses when you introduce companies to Slingshot — and get recognized publicly for your impact.',
		],
		[
			'icon_svg' => '<svg width="44" height="44" viewBox="0 0 44 44" fill="none"><rect width="44" height="44" rx="12" fill="#6D44B7" fill-opacity=".1"/><circle cx="22" cy="19" r="5" stroke="#6D44B7" stroke-width="2"/><path d="M12 34c0-5.523 4.477-10 10-10s10 4.477 10 10" stroke="#6D44B7" stroke-width="2" stroke-linecap="round"/></svg>',
			'heading'  => 'Innovation Peer Circle',
			'desc'     => 'Connect with a curated group of forward-thinking leaders across industries — share ideas, solve problems together, and stay ahead.',
		],
		[
			'icon_svg' => '<svg width="44" height="44" viewBox="0 0 44 44" fill="none"><rect width="44" height="44" rx="12" fill="#23B7B4" fill-opacity=".1"/><path d="M22 14l3 9h9l-7 5 3 9-8-6-8 6 3-9-7-5h9z" stroke="#23B7B4" stroke-width="1.8" stroke-linejoin="round"/></svg>',
			'heading'  => 'Direct Access to Slingshot Leaders',
			'desc'     => "Get direct access to Slingshot's leadership team for strategic conversations, mentorship, and collaboration opportunities.",
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
			'icon_svg' => '<svg width="40" height="40" viewBox="0 0 40 40" fill="none"><rect width="40" height="40" rx="10" fill="#f0eeff"/><path d="M12 20l5 5 11-11" stroke="#6D44B7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
			'heading'  => 'Introduce Forward-Thinking Leaders',
			'desc'     => 'Connect us with executives, founders, and innovators in your network who could benefit from what Slingshot builds.',
		],
		[
			'icon_svg' => '<svg width="40" height="40" viewBox="0 0 40 40" fill="none"><rect width="40" height="40" rx="10" fill="#f0eeff"/><path d="M14 20h12M20 14v12" stroke="#6D44B7" stroke-width="2" stroke-linecap="round"/></svg>',
			'heading'  => 'Share What Works',
			'desc'     => 'Share Slingshot insights, frameworks, and thinking with your audience — across talks, posts, podcasts, or conversations.',
		],
		[
			'icon_svg' => '<svg width="40" height="40" viewBox="0 0 40 40" fill="none"><rect width="40" height="40" rx="10" fill="#f0eeff"/><path d="M20 10v20M10 20h20" stroke="#6D44B7" stroke-width="2" stroke-linecap="round"/></svg>',
			'heading'  => "Shape What's Next",
			'desc'     => "Offer feedback on Slingshot's direction, products, and strategy — your voice directly influences how we build and grow.",
		],
		[
			'icon_svg' => '<svg width="40" height="40" viewBox="0 0 40 40" fill="none"><rect width="40" height="40" rx="10" fill="#f0eeff"/><path d="M20 12l2 6h6l-5 4 2 6-5-4-5 4 2-6-5-4h6z" stroke="#6D44B7" stroke-width="1.8" stroke-linejoin="round"/></svg>',
			'heading'  => 'Champion Innovation in Your Space',
			'desc'     => 'Represent a culture of bold thinking, continuous learning, and real-world impact in every room you walk into.',
		],
	];
}
$con_img = slingshot_pm_image( 'amb_con_img', '' );

// ── Form ──────────────────────────────────────────────────────
$form_heading     = slingshot_pm( 'amb_form_heading',     "Become Part of a Circle That's Building Bold" );
$form_desc        = slingshot_pm( 'amb_form_desc',        "We're looking for innovators, leaders, and connectors who are passionate about helping others build something bold for the future." );
$form_who_label   = slingshot_pm( 'amb_form_who_label',   'Who Should Join?' );
$form_who_bullets = slingshot_pm( 'amb_form_who_bullets', "Technology executives and thought leaders\nFounders and startup ecosystem connectors\nInvestors and advisors passionate about tech\nCommunity builders and conference speakers\nPast Slingshot clients who love what we built" );
$form_card_heading = slingshot_pm( 'amb_form_card_heading', 'Request a Speaker' );
$form_gf_id        = (int) slingshot_pm( 'amb_form_gf_id', 0 );

$who_bullets = array_filter( array_map( 'trim', explode( "\n", $form_who_bullets ) ) );
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

			<?php if ( $hero_img ) : ?>
			<div class="amb-hero-img">
				<img src="<?php echo esc_url( $hero_img ); ?>" alt="">
			</div>
			<?php endif; ?>
		</div>
	</section>

	<!-- ── BENEFITS ──────────────────────────────────────── -->
	<section class="amb-benefits-section">
		<h2 class="fig-section-heading"><?php echo esc_html( $ben_heading ); ?></h2>
		<?php if ( $ben_desc ) : ?>
		<p class="fig-section-desc"><?php echo esc_html( $ben_desc ); ?></p>
		<?php endif; ?>
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
			<form class="fig-form" method="post" action="#">
				<div class="fig-form-row">
					<input type="text" class="fig-form-input" placeholder="First Name*" required>
					<input type="text" class="fig-form-input" placeholder="Last Name*" required>
				</div>
				<input type="email" class="fig-form-input" placeholder="Email*" required>
				<input type="text" class="fig-form-input" placeholder="Organization">
				<textarea class="fig-form-textarea" rows="3" placeholder="Tell us about yourself and why you'd like to join..."></textarea>
				<button type="submit" class="fig-form-submit">Submit Request &rarr;</button>
			</form>
			<?php endif; ?>
		</div>
	</section>

</div><!-- .amb-page-wrapper -->

<?php get_footer(); ?>
