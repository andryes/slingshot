<?php
/*
Template Name: Open Position Figma
 * Content: Edit Page meta fields (Meta Box) + WPBakery body content.
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
?>
<style>
	body.page-template-page-open-position-figma #header-outer,
	body.page-template-page-open-position-figma #header-space { display:none !important; }
</style>

<?php slingshot_render_redesign_header( array( 'variant' => 'light', 'cta_url' => '/contact/' ) ); ?>

<div class="open-pos-page-wrapper">

	<!-- ── HERO ─────────────────────────────────────────────── -->
	<?php
	$job_title  = slingshot_pm( 'op_job_title', get_the_title() );
	$job_tags   = slingshot_pm( 'op_job_tags', 'On-site, Louisville KY, Full-time' );
	$bc_parent  = slingshot_pm( 'op_bc_parent', 'Careers' );
	$bc_parent_url = slingshot_pm( 'op_bc_parent_url', '/careers/' );
	$tags_arr   = array_filter( array_map( 'trim', explode( ',', $job_tags ) ) );
	?>
	<section class="open-pos-hero">
		<div class="open-pos-hero-blob-1"></div>
		<div class="open-pos-breadcrumb">
			<a href="<?php echo slingshot_lp_h_attr( $bc_parent_url ); ?>"><?php echo esc_html( $bc_parent ); ?></a>
			<span class="open-pos-bc-sep">/</span>
			<span><?php echo esc_html( $job_title ); ?></span>
		</div>
		<h1 class="open-pos-job-title"><?php echo esc_html( $job_title ); ?></h1>
		<?php if ( ! empty( $tags_arr ) ) : ?>
		<div class="open-pos-tags">
			<?php foreach ( $tags_arr as $tag ) : ?>
			<span class="open-pos-tag"><?php echo esc_html( $tag ); ?></span>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</section>

	<!-- ── BODY CONTENT ─────────────────────────────────────── -->
	<?php
	// Check for Meta Box structured content first; fall back to WPBakery the_content()
	$op_sections = slingshot_pm( 'op_sections', array() );
	if ( ! is_array( $op_sections ) ) { $op_sections = array(); }

	$has_structured = ! empty( $op_sections );
	$has_wp_content = false;
	if ( have_posts() ) {
		while ( have_posts() ) { the_post(); }
		$has_wp_content = '' !== trim( get_the_content() );
		rewind_posts();
	}
	?>

	<div class="open-pos-content">
		<?php if ( $has_structured ) : ?>
		<div class="open-pos-body">
			<?php foreach ( $op_sections as $sec ) :
				$sec_type  = $sec['section_type'] ?? 'text'; // 'text' or 'list'
				$sec_title = $sec['title'] ?? '';
				$sec_body  = $sec['body'] ?? '';
			?>
			<?php if ( $sec_title ) : ?>
			<h2 class="open-pos-section-title"><?php echo esc_html( $sec_title ); ?></h2>
			<?php endif; ?>

			<?php if ( 'list' === $sec_type ) : ?>
			<ul class="open-pos-list">
				<?php foreach ( slingshot_lp_bullet_lines( $sec_body ) as $li ) : ?>
				<li><?php echo esc_html( $li ); ?></li>
				<?php endforeach; ?>
			</ul>
			<?php else : ?>
			<div class="open-pos-text">
				<?php foreach ( array_filter( array_map( 'trim', explode( "\n", $sec_body ) ) ) as $para ) : ?>
				<p><?php echo esc_html( $para ); ?></p>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
			<?php endforeach; ?>
		</div>

		<?php elseif ( $has_wp_content ) : ?>
		<div class="open-pos-body open-pos-wp-content">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; endif; ?>
		</div>

		<?php else : ?>
		<div class="open-pos-body">
			<h2 class="open-pos-section-title">About this Role</h2>
			<div class="open-pos-text">
				<p>Details about this role will be posted here soon.</p>
			</div>
		</div>
		<?php endif; ?>
	</div>

	<!-- ── HIT US UP / CONTACT FORM ─────────────────────────── -->
	<?php
	$form_heading = slingshot_pm( 'op_form_heading', 'Hit us up' );
	$form_subtext = slingshot_pm( 'op_form_subtext', 'Think this could be a good fit? Tell us a bit about yourself.' );
	$form_id      = (int) slingshot_pm( 'op_form_gf_id', 0 );
	?>
	<section class="svc-form-section">
		<div class="svc-form-blob svc-form-blob-1"></div>
		<div class="svc-form-blob svc-form-blob-2"></div>
		<div class="svc-form-inner">
			<h2 class="svc-form-heading"><?php echo esc_html( $form_heading ); ?></h2>
			<p class="svc-form-subtext"><?php echo esc_html( $form_subtext ); ?></p>
			<div class="svc-form-body">
				<?php if ( $form_id && function_exists( 'gravity_form' ) ) :
					gravity_form( $form_id, false, false, false, null, true, 1 );
				else : ?>
				<form class="svc-form-html" method="post" action="#">
					<div class="svc-form-row">
						<div class="svc-form-field">
							<label class="svc-form-label">First name</label>
							<input type="text" class="svc-form-input" placeholder="First name">
						</div>
						<div class="svc-form-field">
							<label class="svc-form-label">Last name</label>
							<input type="text" class="svc-form-input" placeholder="Last name">
						</div>
					</div>
					<div class="svc-form-row">
						<div class="svc-form-field">
							<label class="svc-form-label">Email</label>
							<input type="email" class="svc-form-input" placeholder="your@email.com">
						</div>
						<div class="svc-form-field">
							<label class="svc-form-label">Phone</label>
							<input type="tel" class="svc-form-input" placeholder="+1 (000) 000-0000">
						</div>
					</div>
					<div class="svc-form-row" style="grid-template-columns:1fr;">
						<div class="svc-form-field full-width">
							<label class="svc-form-label">Cover letter / message</label>
							<textarea class="svc-form-textarea" placeholder="Tell us why you'd be a great fit..."></textarea>
						</div>
					</div>
					<div class="svc-form-checkbox">
						<input type="checkbox" id="op-consent">
						<label for="op-consent">I agree to the <a href="/privacy-policy/">Privacy Policy</a> and consent to being contacted.</label>
					</div>
					<button type="submit" class="svc-form-submit">Send Application &#8594;</button>
				</form>
				<?php endif; ?>
			</div>
		</div>
	</section>

</div><!-- .open-pos-page-wrapper -->

<?php get_footer(); ?>
