<?php
/*
Template Name: Register Figma
*/

wp_enqueue_style( 'pages-figma-jakarta', 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap', array(), null );
wp_enqueue_style( 'home-style', get_stylesheet_directory_uri() . '/css/home.css', array(), '1.18' );
wp_enqueue_style( 'service-figma-style', get_stylesheet_directory_uri() . '/css/service-figma.css', array(), '1.6' );
wp_enqueue_style( 'pages-figma-style', get_stylesheet_directory_uri() . '/css/pages-figma.css', array(), '1.0' );
wp_enqueue_style( 'pages-figma-2-style', get_stylesheet_directory_uri() . '/css/pages-figma-2.css', array(), '1.0' );
wp_enqueue_style( 'internal-figma-style', get_stylesheet_directory_uri() . '/css/internal-figma.css', array(), '1.0' );
wp_enqueue_script( 'hp-script', get_stylesheet_directory_uri() . '/js/home.js', array( 'jquery' ), '1.6', true );

get_header();

$label       = slingshot_pm( 'reg_label', 'EVENT REGISTRATION' );
$heading     = slingshot_pm( 'reg_heading', 'Register' );
$desc        = slingshot_pm( 'reg_desc', '' );
$hero_img    = slingshot_pm_image( 'reg_hero_img', '' );
$form_h      = slingshot_pm( 'reg_form_heading', 'Complete Your Registration' );
$form_id     = (int) slingshot_pm( 'reg_form_gf_id', 0 );
$submit_text = slingshot_pm( 'reg_submit_text', 'Register →' );
$event_title = slingshot_pm( 'reg_event_title', 'Louisville AI Exchange - January 2025' );
$event_meta  = slingshot_pm( 'reg_event_meta', 'Thursday, January 15 · 4 - 6pm EST' );
$ticket_title = slingshot_pm( 'reg_ticket_title', 'General Admission' );
$ticket_price = slingshot_pm( 'reg_ticket_price', 'Free' );
$ticket_note = slingshot_pm( 'reg_ticket_note', 'Sales end on Jan 15, 2026' );
$order_title = slingshot_pm( 'reg_order_title', 'Order summary' );
$order_line = slingshot_pm( 'reg_order_line', '1 x General Admission' );
$order_total = slingshot_pm( 'reg_order_total', '$0.00' );
$side_img = slingshot_pm_image( 'reg_side_img', '' );
?>
<style>
body.page-template-page-register-figma #header-outer,
body.page-template-page-register-figma #header-space { display:none !important; }
</style>

<?php slingshot_render_redesign_header( array( 'variant' => 'light' ) ); ?>

<div class="blg-page-wrapper">
	<div class="ifg-wrap">
		<section class="fig-hero">
			<div class="fig-hero-blob fig-hero-blob-1"></div>
			<div class="fig-hero-blob fig-hero-blob-2"></div>
			<div class="blg-hero-inner">
				<div class="blg-hero-content">
					<div class="blg-hero-label"><?php echo esc_html( $label ); ?></div>
					<h1 class="blg-hero-heading"><?php echo esc_html( $heading ); ?></h1>
					<?php if ( $desc ) : ?><p class="blg-hero-desc"><?php echo esc_html( $desc ); ?></p><?php endif; ?>
				</div>
				<?php if ( $hero_img ) : ?>
				<div class="blg-hero-photos">
					<div class="blg-hero-photo blg-hero-photo-a"><img src="<?php echo esc_url( $hero_img ); ?>" alt="<?php echo esc_attr( $heading ); ?>"></div>
				</div>
				<?php endif; ?>
			</div>
		</section>
	</div>

	<div class="reg-overlay">
		<div class="reg-modal">
			<button class="reg-close" type="button" aria-label="Close register modal">&times;</button>
			<div class="reg-head">
				<p class="reg-event-title"><?php echo esc_html( $event_title ); ?></p>
				<p class="reg-event-meta"><?php echo esc_html( $event_meta ); ?></p>
			</div>
			<div class="reg-grid">
				<div>
					<div class="reg-ticket">
						<div class="reg-ticket-top">
							<span><?php echo esc_html( $ticket_title ); ?></span>
							<span class="reg-counter"><button type="button" aria-label="Decrease">-</button><span>1</span><button type="button" aria-label="Increase">+</button></span>
						</div>
						<p class="reg-price"><?php echo esc_html( $ticket_price ); ?></p>
						<p class="reg-note"><?php echo esc_html( $ticket_note ); ?></p>
					</div>
					<div class="reg-form-shell">
						<h2 class="cnt-form-heading"><?php echo esc_html( $form_h ); ?></h2>
						<div class="cnt-form-divider"></div>
						<?php if ( $form_id > 0 && function_exists( 'gravity_form' ) ) : ?>
							<?php gravity_form( $form_id, false, false, false, null, true, 1 ); ?>
						<?php else : ?>
							<form class="sl-modal-form" method="post" action="#">
								<div class="sl-modal-row">
									<div class="sl-modal-field"><input type="text" class="sl-modal-input" placeholder="First Name*" required></div>
									<div class="sl-modal-field"><input type="text" class="sl-modal-input" placeholder="Last Name*" required></div>
								</div>
								<div class="sl-modal-field"><input type="email" class="sl-modal-input" placeholder="Email*" required></div>
								<div><button type="submit" class="sl-modal-submit"><?php echo esc_html( $submit_text ); ?></button></div>
							</form>
						<?php endif; ?>
					</div>
				</div>
				<aside class="reg-side">
					<?php if ( $side_img ) : ?><img src="<?php echo esc_url( $side_img ); ?>" alt="<?php echo esc_attr( $event_title ); ?>"><?php endif; ?>
					<h3 class="reg-summary-title"><?php echo esc_html( $order_title ); ?></h3>
					<div class="reg-summary-row"><span><?php echo esc_html( $order_line ); ?></span><strong><?php echo esc_html( $order_total ); ?></strong></div>
					<div class="reg-summary-total"><span>Total</span><span><?php echo esc_html( $order_total ); ?></span></div>
				</aside>
			</div>
		</div>
	</div>
</div>

<script>
(function(){
	var closeBtn = document.querySelector('.reg-close');
	if (!closeBtn) return;
	closeBtn.addEventListener('click', function(){
		if (window.history.length > 1) {
			window.history.back();
			return;
		}
		window.location.href = <?php echo wp_json_encode( home_url( '/events/' ) ); ?>;
	});
})();
</script>

<?php get_footer(); ?>
