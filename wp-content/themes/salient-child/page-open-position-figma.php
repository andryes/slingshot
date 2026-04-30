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
wp_enqueue_style( 'service-figma-style', get_stylesheet_directory_uri() . '/css/service-figma.css', array(), '2.3' );
wp_enqueue_script( 'hp-script', get_stylesheet_directory_uri() . '/js/home.js', array( 'jquery' ), '1.6', true );

get_header();

$open_pos_icon_svg = static function ( $key ) {
	$key = sanitize_key( (string) $key );
	$icons = array(
		'clock' => '<svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><circle cx="10" cy="10" r="7.2" stroke="currentColor" stroke-width="1.7"/><path d="M10 6.2v4.2l2.8 1.7" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>',
		'pin'   => '<svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M10 17s5.2-4.8 5.2-9.1A5.2 5.2 0 0 0 4.8 7.9C4.8 12.2 10 17 10 17z" stroke="currentColor" stroke-width="1.6"/><circle cx="10" cy="8.4" r="1.8" stroke="currentColor" stroke-width="1.6"/></svg>',
	);
	return $icons[ $key ] ?? '';
};

$open_pos_paragraphs = static function ( $text ) {
	$parts = preg_split( '/\R{2,}/', (string) $text );
	if ( ! is_array( $parts ) ) {
		return;
	}
	foreach ( $parts as $part ) {
		$part = trim( $part );
		if ( '' !== $part ) {
			echo '<p>' . esc_html( $part ) . '</p>';
		}
	}
};
?>
<style>
	body.page-template-page-open-position-figma #header-outer,
	body.page-template-page-open-position-figma #header-space { display:none !important; }
</style>

<?php
slingshot_render_redesign_header(
	array(
		'variant'  => 'light',
		'cta_text' => slingshot_pm( 'op_header_cta_text', "Let's talk" ),
		'cta_url'  => slingshot_lp_h_attr( slingshot_pm( 'op_header_cta_url', '/contact/' ) ),
	)
);
?>

<div class="open-pos-page-wrapper">

	<!-- ── HERO ─────────────────────────────────────────────── -->
	<?php
	$job_title  = slingshot_pm( 'op_job_title', get_the_title() );
	$job_tags   = slingshot_pm( 'op_job_tags', 'On-site, Louisville KY, Full-time' );
	$job_type   = slingshot_pm( 'op_job_type', '' );
	$job_location = slingshot_pm( 'op_job_location', '' );
	$bc_parent  = slingshot_pm( 'op_bc_parent', 'Careers' );
	$bc_parent_url = slingshot_pm( 'op_bc_parent_url', '/careers/' );
	$tags_arr   = array_filter( array_map( 'trim', explode( ',', $job_tags ) ) );
	if ( '' === $job_type ) {
		$job_type = $tags_arr[2] ?? $tags_arr[0] ?? 'Full-time';
	}
	if ( '' === $job_location ) {
		$job_location = $tags_arr[1] ?? 'Louisville, KY';
	}
	?>
	<section class="open-pos-hero">
		<div class="open-pos-hero-blob-1"></div>
		<a class="open-pos-back-pill" href="<?php echo slingshot_lp_h_attr( $bc_parent_url ); ?>">
			<span>&lsaquo;</span> <?php echo esc_html( $bc_parent ); ?>
		</a>
		<h1 class="open-pos-job-title"><?php echo esc_html( $job_title ); ?></h1>
		<div class="open-pos-meta">
			<?php if ( $job_type ) : ?>
			<span class="open-pos-meta-item">
				<?php echo $open_pos_icon_svg( 'clock' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				<?php echo esc_html( $job_type ); ?>
			</span>
			<?php endif; ?>
			<?php if ( $job_location ) : ?>
			<span class="open-pos-meta-item">
				<?php echo $open_pos_icon_svg( 'pin' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				<?php echo esc_html( $job_location ); ?>
			</span>
			<?php endif; ?>
		</div>
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
				<?php $open_pos_paragraphs( $sec_body ); ?>
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
	$form_subtext = slingshot_pm( 'op_form_subtext', '' );
	$form_id      = (int) slingshot_pm( 'op_form_gf_id', 0 );
	?>
	<section class="open-pos-form-section">
		<div class="open-pos-form-inner">
			<h2 class="open-pos-form-heading"><?php echo esc_html( $form_heading ); ?></h2>
			<?php if ( $form_subtext ) : ?>
			<p class="open-pos-form-subtext"><?php echo esc_html( $form_subtext ); ?></p>
			<?php endif; ?>
			<div class="open-pos-form-body">
				<?php if ( $form_id && function_exists( 'gravity_form' ) ) :
					gravity_form( $form_id, false, false, false, null, true, 1 );
				else : ?>
				<form class="open-pos-form-html" method="post" action="#">
					<div class="open-pos-form-slider">
						<label class="open-pos-form-label">Which Are You More?</label>
						<div class="open-pos-form-slider-track"><span>&lsaquo; &rsaquo;</span></div>
						<div class="open-pos-form-slider-labels"><span>Big kid</span><span>Daredevil</span></div>
					</div>
					<div class="open-pos-form-row">
						<div class="open-pos-form-field">
							<label class="open-pos-form-label">First Name<span>*</span></label>
							<input type="text" class="open-pos-form-input">
						</div>
						<div class="open-pos-form-field">
							<label class="open-pos-form-label">Last Name<span>*</span></label>
							<input type="text" class="open-pos-form-input">
						</div>
					</div>
					<div class="open-pos-form-row">
						<div class="open-pos-form-field">
							<label class="open-pos-form-label">Email<span>*</span></label>
							<input type="email" class="open-pos-form-input">
						</div>
						<div class="open-pos-form-field">
							<label class="open-pos-form-label">Phone<span>*</span></label>
							<input type="tel" class="open-pos-form-input">
						</div>
					</div>
					<div class="open-pos-form-row" style="grid-template-columns:1fr;">
						<div class="open-pos-form-field full-width">
							<label class="open-pos-form-label">Portfolio Link</label>
							<input type="url" class="open-pos-form-input">
						</div>
					</div>
					<div class="open-pos-form-row" style="grid-template-columns:1fr;">
						<div class="open-pos-form-field full-width">
							<label class="open-pos-form-label">Which job are you applying for?</label>
							<select class="open-pos-form-select"><option><?php echo esc_html( $job_title ); ?></option><option>Other</option></select>
						</div>
					</div>
					<div class="open-pos-form-upload">
						<span class="open-pos-form-upload-icon">⌕</span>
						<span><strong>Resume, cover letter or portfolio</strong><small>Max. file size: 128 MB, Max. files: 3.</small></span>
					</div>
					<button type="submit" class="open-pos-form-submit">Apply now &#8594;</button>
				</form>
				<?php endif; ?>
			</div>
		</div>
	</section>

</div><!-- .open-pos-page-wrapper -->

<?php get_footer(); ?>
