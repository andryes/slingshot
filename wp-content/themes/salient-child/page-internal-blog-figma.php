<?php
/*
Template Name: Internal Blog Figma
*/

wp_enqueue_style( 'pages-figma-jakarta', 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap', array(), null );
wp_enqueue_style( 'home-style', get_stylesheet_directory_uri() . '/css/home.css', array(), '1.18' );
wp_enqueue_style( 'service-figma-style', get_stylesheet_directory_uri() . '/css/service-figma.css', array(), '1.6' );
wp_enqueue_style( 'pages-figma-style', get_stylesheet_directory_uri() . '/css/pages-figma.css', array(), '1.0' );
wp_enqueue_style( 'pages-figma-2-style', get_stylesheet_directory_uri() . '/css/pages-figma-2.css', array(), '1.0' );
wp_enqueue_style( 'internal-figma-style', get_stylesheet_directory_uri() . '/css/internal-figma.css', array(), '1.0' );
wp_enqueue_script( 'hp-script', get_stylesheet_directory_uri() . '/js/home.js', array( 'jquery' ), '1.6', true );

get_header();

$label     = slingshot_pm( 'ibl_label', 'INSIGHTS' );
$title     = slingshot_pm( 'ibl_title', get_the_title() );
$author    = slingshot_pm( 'ibl_author', '' );
$date      = slingshot_pm( 'ibl_date', '' );
$read_time = slingshot_pm( 'ibl_read_time', '5 min read' );
$hero_img  = slingshot_pm_image( 'ibl_hero_img', '' );
$subscribe_heading = slingshot_pm( 'sl_subscribe_modal_heading', 'Ready to Launch Something Bold?' );
$subscribe_btn = slingshot_pm( 'sl_subscribe_modal_submit', 'Subscribe →' );
$cta_h     = slingshot_pm( 'ibl_cta_heading', 'Ready to Launch Something Bold?' );
$cta_d     = slingshot_pm( 'ibl_cta_desc', "We partner with ambitious companies to design and build products people love. Let's talk." );
$cta_t     = slingshot_pm( 'ibl_cta_btn_text', "Let's Talk" );
$cta_u     = slingshot_pm( 'ibl_cta_btn_url', '/contact/' );
?>
<style>
body.page-template-page-internal-blog-figma #header-outer,
body.page-template-page-internal-blog-figma #header-space { display:none !important; }
</style>

<?php slingshot_render_redesign_header( array( 'variant' => 'light' ) ); ?>

<div class="blg-page-wrapper">
	<div class="ifg-wrap">
		<section class="ifg-hero">
			<?php if ( $hero_img ) : ?><img src="<?php echo esc_url( $hero_img ); ?>" alt="<?php echo esc_attr( $title ); ?>"><?php endif; ?>
			<div class="ifg-hero-content">
				<div class="ifg-label"><?php echo esc_html( $label ); ?></div>
				<h1 class="ifg-title"><?php echo esc_html( $title ); ?></h1>
				<p class="ifg-desc"><?php $meta = array_filter( array( $author, $date, $read_time ) ); echo esc_html( implode( ' · ', $meta ) ); ?></p>
			</div>
		</section>

		<div class="ifg-blog-intro">
			<div class="ifg-card">
				<ul class="ifg-bullets">
					<li>Technology decisions with measurable business outcomes.</li>
					<li>Practical guidance for product, design, and engineering teams.</li>
					<li>Proven frameworks you can apply immediately.</li>
				</ul>
			</div>
			<div class="ifg-subscribe">
				<h3><?php echo esc_html( $subscribe_heading ); ?></h3>
				<p>Get practical updates from the Slingshot team.</p>
				<a class="btn" href="#" data-sl-modal="subscribe"><?php echo esc_html( $subscribe_btn ); ?></a>
			</div>
		</div>

		<div class="leg-content-wrap ifg-content">
			<div class="leg-content">
			<?php the_content(); ?>
			</div>
		</div>

		<section class="fig-cta">
		<div class="fig-cta-blob"></div>
		<div class="fig-cta-body">
			<h2 class="fig-cta-heading"><?php echo esc_html( $cta_h ); ?></h2>
			<p class="fig-cta-desc"><?php echo esc_html( $cta_d ); ?></p>
			<a href="<?php echo slingshot_lp_h_attr( $cta_u ); ?>" class="fig-cta-btn"><?php echo esc_html( $cta_t ); ?></a>
		</div>
		</section>
	</div>
</div>

<?php get_footer(); ?>
