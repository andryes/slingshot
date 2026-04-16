<?php
/*
Template Name: Internal Figma
*/

wp_enqueue_style( 'pages-figma-jakarta', 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap', array(), null );
wp_enqueue_style( 'home-style', get_stylesheet_directory_uri() . '/css/home.css', array(), '1.18' );
wp_enqueue_style( 'service-figma-style', get_stylesheet_directory_uri() . '/css/service-figma.css', array(), '1.6' );
wp_enqueue_style( 'pages-figma-style', get_stylesheet_directory_uri() . '/css/pages-figma.css', array(), '1.0' );
wp_enqueue_style( 'pages-figma-2-style', get_stylesheet_directory_uri() . '/css/pages-figma-2.css', array(), '1.0' );
wp_enqueue_style( 'internal-figma-style', get_stylesheet_directory_uri() . '/css/internal-figma.css', array(), '1.0' );
wp_enqueue_script( 'hp-script', get_stylesheet_directory_uri() . '/js/home.js', array( 'jquery' ), '1.6', true );

get_header();

$label    = slingshot_pm( 'int_label', 'INTERNAL' );
$heading  = slingshot_pm( 'int_heading', 'Inside Slingshot' );
$desc     = slingshot_pm( 'int_desc', '' );
$btn_text = slingshot_pm( 'int_btn_text', 'Get in Touch' );
$btn_url  = slingshot_pm( 'int_btn_url', '/contact/' );
$hero_img = slingshot_pm_image( 'int_hero_img', '' );
?>
<style>
body.page-template-page-internal-figma #header-outer,
body.page-template-page-internal-figma #header-space { display:none !important; }
</style>

<?php slingshot_render_redesign_header( array( 'variant' => 'light' ) ); ?>

<div class="blg-page-wrapper">
	<div class="ifg-wrap">
		<section class="ifg-hero">
			<?php if ( $hero_img ) : ?><img src="<?php echo esc_url( $hero_img ); ?>" alt="<?php echo esc_attr( $heading ); ?>"><?php endif; ?>
			<div class="ifg-hero-content">
				<div class="ifg-label"><?php echo esc_html( $label ); ?></div>
				<h1 class="ifg-title"><?php echo esc_html( $heading ); ?></h1>
				<?php if ( $desc ) : ?><p class="ifg-desc"><?php echo esc_html( $desc ); ?></p><?php endif; ?>
				<a href="<?php echo slingshot_lp_h_attr( $btn_url ); ?>" class="blg-hero-btn" style="margin-top:18px;"><?php echo esc_html( $btn_text ); ?></a>
			</div>
		</section>
		<div class="leg-content-wrap ifg-content">
			<div class="leg-content">
			<?php the_content(); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
