<?php
/*
Template Name: Modal Preview Figma
 * Content: Edit Page meta fields (Meta Box).
 */

wp_enqueue_style( 'pages-figma-jakarta', 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap', array(), null );
wp_enqueue_style( 'home-style', get_stylesheet_directory_uri() . '/css/home.css', array(), '1.18' );
wp_enqueue_style( 'pages-figma-style', get_stylesheet_directory_uri() . '/css/pages-figma.css', array(), '1.0' );
wp_enqueue_style( 'pages-figma-2-style', get_stylesheet_directory_uri() . '/css/pages-figma-2.css', array(), '1.8' );
wp_enqueue_script( 'hp-script', get_stylesheet_directory_uri() . '/js/home.js', array( 'jquery' ), '1.6', true );

get_header();

$slug = get_post_field( 'post_name', get_the_ID() );
$type = slingshot_pm( 'mp_type', '' );
if ( ! $type ) {
	$type = 'contact-form-modal' === $slug ? 'contact' : ( 'video-modal' === $slug ? 'video' : 'subscribe' );
}

$defaults = array(
	'subscribe' => array(
		'label'  => 'NEWSLETTER MODAL',
		'title'  => 'Subscribe',
		'desc'   => 'A live preview of the newsletter modal. Edit the modal copy, fields, submit label, or Gravity Form ID from this page in the admin.',
		'button' => 'Open Subscribe Modal',
	),
	'contact'   => array(
		'label'  => 'CONTACT MODAL',
		'title'  => 'Contact Form',
		'desc'   => 'A live preview of the contact modal. Edit the heading, field labels, dropdown options, submit label, or Gravity Form ID from this page in the admin.',
		'button' => 'Open Contact Modal',
	),
	'video'     => array(
		'label'  => 'VIDEO MODAL',
		'title'  => 'Video Player',
		'desc'   => 'A live preview of the video modal. Set the YouTube, Vimeo, or file URL in the Video modal URL field.',
		'button' => 'Open Video Modal',
	),
);

$cfg = isset( $defaults[ $type ] ) ? $defaults[ $type ] : $defaults['subscribe'];

$label       = slingshot_pm( 'mp_label', $cfg['label'] );
$heading     = slingshot_pm( 'mp_heading', $cfg['title'] );
$desc        = slingshot_pm( 'mp_desc', $cfg['desc'] );
$button_text = slingshot_pm( 'mp_button_text', $cfg['button'] );
$auto_open   = (bool) slingshot_pm( 'mp_auto_open', 1 );
$video_url   = slingshot_pm( 'sl_video_modal_url', '' );
?>

<?php slingshot_render_redesign_header( array( 'variant' => 'light' ) ); ?>

<div class="mp-page-wrapper mp-page-wrapper--<?php echo esc_attr( $type ); ?>">
	<section class="mp-preview-shell">
		<div class="mp-preview-blob mp-preview-blob--one"></div>
		<div class="mp-preview-blob mp-preview-blob--two"></div>
		<div class="mp-preview-card">
			<div class="mp-preview-label"><?php echo esc_html( $label ); ?></div>
			<h1 class="mp-preview-heading"><?php echo esc_html( $heading ); ?></h1>
			<?php if ( $desc ) : ?>
				<p class="mp-preview-desc"><?php echo esc_html( $desc ); ?></p>
			<?php endif; ?>

			<?php if ( 'contact' === $type ) : ?>
				<a class="mp-preview-btn" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" data-sl-modal="contact" data-modal-preview-trigger><?php echo esc_html( $button_text ); ?></a>
			<?php elseif ( 'video' === $type ) : ?>
				<a class="mp-preview-btn" href="<?php echo esc_url( $video_url ? $video_url : '#' ); ?>" data-sl-video="<?php echo esc_attr( $video_url ); ?>" data-modal-preview-trigger><?php echo esc_html( $button_text ); ?></a>
				<?php if ( ! $video_url ) : ?>
					<p class="mp-preview-note">Add a Video modal URL in the admin to enable the player.</p>
				<?php endif; ?>
			<?php else : ?>
				<a class="mp-preview-btn" href="#" data-sl-modal="subscribe" data-modal-preview-trigger><?php echo esc_html( $button_text ); ?></a>
			<?php endif; ?>
		</div>
	</section>
</div>

<?php if ( $auto_open ) : ?>
<script>
(function(){
	window.addEventListener('load', function(){
		window.setTimeout(function(){
			var trigger = document.querySelector('[data-modal-preview-trigger]');
			if (trigger) trigger.click();
		}, 350);
	});
})();
</script>
<?php endif; ?>

<?php get_footer(); ?>
