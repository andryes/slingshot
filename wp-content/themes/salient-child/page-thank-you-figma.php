<?php
/*
Template Name: Thank You Figma
 * Content: Edit Page meta fields (Meta Box).
 */

wp_enqueue_style(
	'pages-figma-jakarta',
	'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap',
	array(),
	null
);
wp_enqueue_style( 'home-style',          get_stylesheet_directory_uri() . '/css/home.css',          array(), '1.18' );
wp_enqueue_style( 'service-figma-style', get_stylesheet_directory_uri() . '/css/service-figma.css', array(), '1.6' );
wp_enqueue_style( 'pages-figma-style',   get_stylesheet_directory_uri() . '/css/pages-figma.css',   array(), '1.9' );
wp_enqueue_style( 'pages-figma-2-style', get_stylesheet_directory_uri() . '/css/pages-figma-2.css', array(), '2.1' );
wp_enqueue_script( 'hp-script',          get_stylesheet_directory_uri() . '/js/home.js',            array( 'jquery' ), '1.6', true );

get_header();

$img_dir = get_stylesheet_directory_uri() . '/img';

$hero_label      = slingshot_pm( 'ty_hero_label', 'MESSAGE SENT' );
$hero_heading    = slingshot_pm( 'ty_hero_heading', 'Thank You!' );
$hero_desc       = slingshot_pm( 'ty_hero_desc', 'Your message landed with our team. We will review it and get back to you soon.' );
$primary_text    = slingshot_pm( 'ty_primary_text', 'Back to Home' );
$primary_url     = slingshot_pm( 'ty_primary_url', '/' );
$secondary_text  = slingshot_pm( 'ty_secondary_text', 'Explore Our Work' );
$secondary_url   = slingshot_pm( 'ty_secondary_url', '/our-work/' );

$card_eyebrow = slingshot_pm( 'ty_card_eyebrow', 'Ready, aimed, fired' );
$card_heading = slingshot_pm( 'ty_card_heading', 'Your question is ready, aimed, and fired our way.' );
$card_desc    = slingshot_pm( 'ty_card_desc', "We'll get back to you soon." );
$mascot_img   = slingshot_pm_image( 'ty_mascot_img', $img_dir . '/cta-mascot.png' );

$next_heading = slingshot_pm( 'ty_next_heading', 'What Happens Next' );
$next_items   = slingshot_pm( 'ty_next_items', array() );
$next_items   = is_array( $next_items ) ? $next_items : array();
if ( empty( $next_items ) ) {
	$next_items = array(
		array(
			'icon_svg' => '<svg viewBox="0 0 44 44" fill="none" aria-hidden="true"><rect width="44" height="44" rx="14" fill="#F1EEFF"/><path d="M14 17h16M14 22h12M14 27h9" stroke="#6D44B7" stroke-width="2" stroke-linecap="round"/></svg>',
			'title'    => 'We review the details',
			'desc'     => 'A Slingshot team member looks over your message and routes it to the right person.',
		),
		array(
			'icon_svg' => '<svg viewBox="0 0 44 44" fill="none" aria-hidden="true"><rect width="44" height="44" rx="14" fill="#EAF8F8"/><path d="M14 28c2.4-4 5.1-6 8-6s5.6 2 8 6M18 17a4 4 0 1 0 8 0 4 4 0 0 0-8 0Z" stroke="#23B7B4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
			'title'    => 'We follow up',
			'desc'     => 'You will hear from us with next steps, answers, or a time to talk through your project.',
		),
		array(
			'icon_svg' => '<svg viewBox="0 0 44 44" fill="none" aria-hidden="true"><rect width="44" height="44" rx="14" fill="#F5F7FF"/><path d="M15 28l6-13 4 8 2-4 3 9H15Z" stroke="#4D86D9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
			'title'    => 'You keep moving',
			'desc'     => 'Explore our work and services while we get the right context together.',
		),
	);
}

$contact_heading = slingshot_pm( 'ty_contact_heading', 'Need something urgent?' );
$contact_desc    = slingshot_pm( 'ty_contact_desc', 'You can reach us directly while your message is making its way through our team.' );
$contact_phone   = slingshot_pm( 'ty_contact_phone', '502.254.6150' );
$contact_email   = slingshot_pm( 'ty_contact_email', 'hello@yslingshot.com' );
?>
<style>
	body.page-template-page-thank-you-figma #header-outer,
	body.page-template-page-thank-you-figma #header-space { display:none !important; }
</style>

<?php slingshot_render_redesign_header( array( 'variant' => 'light' ) ); ?>

<div class="ty-page-wrapper">
	<section class="ty-hero">
		<div class="ty-hero-inner">
			<div class="ty-hero-copy">
				<?php if ( $hero_label ) : ?>
				<div class="ty-eyebrow"><?php echo esc_html( $hero_label ); ?></div>
				<?php endif; ?>
				<h1 class="ty-hero-heading"><?php echo esc_html( $hero_heading ); ?></h1>
				<?php if ( $hero_desc ) : ?>
				<p class="ty-hero-desc"><?php echo esc_html( $hero_desc ); ?></p>
				<?php endif; ?>
				<div class="ty-actions">
					<?php if ( $primary_text && $primary_url ) : ?>
					<a class="ty-btn ty-btn--primary" href="<?php echo slingshot_lp_h_attr( $primary_url ); ?>"><?php echo esc_html( $primary_text ); ?> <span aria-hidden="true">&rarr;</span></a>
					<?php endif; ?>
					<?php if ( $secondary_text && $secondary_url ) : ?>
					<a class="ty-btn ty-btn--secondary" href="<?php echo slingshot_lp_h_attr( $secondary_url ); ?>"><?php echo esc_html( $secondary_text ); ?></a>
					<?php endif; ?>
				</div>
			</div>

			<div class="ty-confirm-card">
				<?php if ( $mascot_img ) : ?>
				<img class="ty-mascot" src="<?php echo esc_url( $mascot_img ); ?>" alt="" loading="lazy">
				<?php endif; ?>
				<?php if ( $card_eyebrow ) : ?>
				<div class="ty-card-eyebrow"><?php echo esc_html( $card_eyebrow ); ?></div>
				<?php endif; ?>
				<h2 class="ty-card-heading"><?php echo esc_html( $card_heading ); ?></h2>
				<?php if ( $card_desc ) : ?>
				<p class="ty-card-desc"><?php echo esc_html( $card_desc ); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<section class="ty-next-section">
		<div class="ty-section-head">
			<h2><?php echo esc_html( $next_heading ); ?></h2>
		</div>
		<div class="ty-next-grid">
			<?php foreach ( $next_items as $item ) : ?>
			<div class="ty-next-card">
				<?php if ( ! empty( $item['icon_svg'] ) ) : ?>
				<div class="ty-next-icon"><?php echo $item['icon_svg']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
				<?php endif; ?>
				<h3><?php echo esc_html( $item['title'] ?? '' ); ?></h3>
				<?php if ( ! empty( $item['desc'] ) ) : ?>
				<p><?php echo esc_html( $item['desc'] ); ?></p>
				<?php endif; ?>
			</div>
			<?php endforeach; ?>
		</div>
	</section>

	<?php if ( $contact_heading || $contact_desc || $contact_phone || $contact_email ) : ?>
	<section class="ty-contact-section">
		<div>
			<h2><?php echo esc_html( $contact_heading ); ?></h2>
			<?php if ( $contact_desc ) : ?>
			<p><?php echo esc_html( $contact_desc ); ?></p>
			<?php endif; ?>
		</div>
		<div class="ty-contact-links">
			<?php if ( $contact_phone ) : ?>
			<a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $contact_phone ) ); ?>"><?php echo esc_html( $contact_phone ); ?></a>
			<?php endif; ?>
			<?php if ( $contact_email ) : ?>
			<a href="mailto:<?php echo esc_attr( strtolower( $contact_email ) ); ?>"><?php echo esc_html( $contact_email ); ?></a>
			<?php endif; ?>
		</div>
	</section>
	<?php endif; ?>
</div>

<?php get_footer(); ?>
