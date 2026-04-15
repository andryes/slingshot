<?php
/*
Template Name: About Us Figma
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
$hero_label    = slingshot_pm( 'abt_hero_label',    'ABOUT US' );
$hero_heading  = slingshot_pm( 'abt_hero_heading',  'For Big Kids & Daredevils' );
$hero_desc     = slingshot_pm( 'abt_hero_desc',     "A Tech Consultancy & Creative Studio. We've helped companies move faster, build smarter with modern solutions that drive your business momentum." );
$hero_btn_text = slingshot_pm( 'abt_hero_btn_text', 'Meet the Team' );
$hero_btn_url  = slingshot_pm( 'abt_hero_btn_url',  '#team' );
$hero_img_a    = slingshot_pm_image( 'abt_hero_img_a', '' );
$hero_img_b    = slingshot_pm_image( 'abt_hero_img_b', '' );

// ── Stats ─────────────────────────────────────────────────────
$stats_heading = slingshot_pm( 'abt_stats_heading', '20 Years of Software & Tech Expertise' );
$stats_desc    = slingshot_pm( 'abt_stats_desc',    "Two decades of helping ambitious companies move faster, build smarter, and grow stronger. Here's what that looks like in numbers." );
$stats_items   = slingshot_pm( 'abt_stats_items', [] );
$stats_items   = is_array( $stats_items ) ? $stats_items : [];
if ( empty( $stats_items ) ) {
	$stats_items = [
		[ 'number' => '65+',  'label' => 'Companies served' ],
		[ 'number' => '20+',  'label' => 'Years of expertise' ],
		[ 'number' => '100+', 'label' => 'Team members' ],
		[ 'number' => '15+',  'label' => 'Industries' ],
	];
}

// ── Story ─────────────────────────────────────────────────────
$story_heading = slingshot_pm( 'abt_story_heading', '20 Years of Software & Tech Expertise' );
$story_text    = slingshot_pm( 'abt_story_text',    "We started as a small team with a big idea: that great software doesn't require a big company — just the right people, driven by craft and honesty.\n\nOver 20 years later, we've built products for startups, enterprises, and everyone in between. Our team of engineers, designers, and strategists bring the kind of experience you can't manufacture — earned project by project, client by client." );
$story_img_a   = slingshot_pm_image( 'abt_story_img_a', '' );
$story_img_b   = slingshot_pm_image( 'abt_story_img_b', '' );
$story_img_c   = slingshot_pm_image( 'abt_story_img_c', '' );

// ── Team ─────────────────────────────────────────────────────
$team_heading = slingshot_pm( 'abt_team_heading', 'Meet the Team That Makes it Happen' );
$team_desc    = slingshot_pm( 'abt_team_desc',    '' );
$team_members = slingshot_pm( 'abt_team_members', [] );
$team_members = is_array( $team_members ) ? $team_members : [];

// ── Testimonials ──────────────────────────────────────────────
$test_heading = slingshot_pm( 'abt_test_heading', 'Our Clients Are the Best Stories' );
$test_items   = slingshot_pm( 'abt_test_items', [] );
$test_items   = is_array( $test_items ) ? $test_items : [];
if ( empty( $test_items ) ) {
	$test_items = [
		[
			'quote'   => '"Slingshot understood our vision better than we did. They helped us turn a concept into a product our customers love."',
			'name'    => 'CEO',
			'company' => 'Healthcare startup',
			'avatar'  => '',
		],
		[
			'quote'   => '"The team moved fast without cutting corners. We launched on time, under budget, and the quality was exceptional."',
			'name'    => 'CTO',
			'company' => 'Fintech company',
			'avatar'  => '',
		],
	];
}

// ── CTA ───────────────────────────────────────────────────────
$cta_heading  = slingshot_pm( 'abt_cta_heading',  'Ready to Launch Something Bold?' );
$cta_desc     = slingshot_pm( 'abt_cta_desc',     "We partner with ambitious companies to design and build products people love. Let's talk." );
$cta_btn_text = slingshot_pm( 'abt_cta_btn_text', "Let's Talk" );
$cta_btn_url  = slingshot_pm( 'abt_cta_btn_url',  '/contact/' );
?>
<style>
body.page-template-page-about-figma #header-outer,
body.page-template-page-about-figma #header-space { display:none !important; }
</style>

<?php slingshot_render_redesign_header( array( 'variant' => 'light' ) ); ?>

<div class="abt-page-wrapper">

	<!-- ── HERO ──────────────────────────────────────────── -->
	<section class="fig-hero">
		<div class="fig-hero-blob fig-hero-blob-1"></div>
		<div class="fig-hero-blob fig-hero-blob-2"></div>

		<div class="abt-hero-inner">
			<div class="abt-hero-content">
				<?php if ( $hero_label ) : ?>
				<div class="abt-hero-label"><?php echo esc_html( $hero_label ); ?></div>
				<?php endif; ?>
				<h1 class="abt-hero-heading"><?php echo esc_html( $hero_heading ); ?></h1>
				<?php if ( $hero_desc ) : ?>
				<p class="abt-hero-desc"><?php echo esc_html( $hero_desc ); ?></p>
				<?php endif; ?>
				<?php if ( $hero_btn_text && $hero_btn_url ) : ?>
				<a href="<?php echo slingshot_lp_h_attr( $hero_btn_url ); ?>" class="abt-hero-btn">
					<?php echo esc_html( $hero_btn_text ); ?> &rarr;
				</a>
				<?php endif; ?>
			</div>

			<?php if ( $hero_img_a || $hero_img_b ) : ?>
			<div class="abt-hero-photos">
				<?php if ( $hero_img_a ) : ?>
				<div class="abt-hero-photo-a">
					<img src="<?php echo esc_url( $hero_img_a ); ?>" alt="">
				</div>
				<?php endif; ?>
				<?php if ( $hero_img_b ) : ?>
				<div class="abt-hero-photo-b">
					<img src="<?php echo esc_url( $hero_img_b ); ?>" alt="">
				</div>
				<?php endif; ?>
			</div>
			<?php endif; ?>
		</div>
	</section>

	<!-- ── STATS ─────────────────────────────────────────── -->
	<section class="abt-stats-section">
		<?php if ( $stats_heading ) : ?>
		<div class="fig-eyebrow">By the numbers</div>
		<h2 class="fig-section-heading"><?php echo esc_html( $stats_heading ); ?></h2>
		<?php endif; ?>
		<?php if ( $stats_desc ) : ?>
		<p class="fig-section-desc"><?php echo esc_html( $stats_desc ); ?></p>
		<?php endif; ?>
		<div class="abt-stats-grid">
			<?php foreach ( $stats_items as $stat ) : ?>
			<div class="abt-stat">
				<div class="abt-stat-number"><?php echo esc_html( $stat['number'] ?? '' ); ?></div>
				<div class="abt-stat-label"><?php echo esc_html( $stat['label'] ?? '' ); ?></div>
			</div>
			<?php endforeach; ?>
		</div>
	</section>

	<!-- ── STORY ─────────────────────────────────────────── -->
	<?php if ( $story_text || $story_img_a ) : ?>
	<section class="abt-story-section">
		<div>
			<?php if ( $story_heading ) : ?>
			<h2 class="fig-section-heading"><?php echo esc_html( $story_heading ); ?></h2>
			<?php endif; ?>
			<?php if ( $story_text ) : ?>
			<?php foreach ( explode( "\n\n", $story_text ) as $para ) :
				$para = trim( $para );
				if ( $para ) : ?>
			<p style="font-size:16px;line-height:1.75;color:#4A4A6A;margin:0 0 18px;"><?php echo esc_html( $para ); ?></p>
			<?php endif; endforeach; ?>
			<?php endif; ?>
		</div>
		<?php if ( $story_img_a ) : ?>
		<div class="abt-story-imgs">
			<div class="abt-story-img" style="aspect-ratio:2/3;">
				<img src="<?php echo esc_url( $story_img_a ); ?>" alt="" style="height:100%;">
			</div>
			<?php if ( $story_img_b ) : ?>
			<div class="abt-story-img" style="aspect-ratio:1;">
				<img src="<?php echo esc_url( $story_img_b ); ?>" alt="">
			</div>
			<?php endif; ?>
			<?php if ( $story_img_c ) : ?>
			<div class="abt-story-img" style="aspect-ratio:1;">
				<img src="<?php echo esc_url( $story_img_c ); ?>" alt="">
			</div>
			<?php endif; ?>
		</div>
		<?php endif; ?>
	</section>
	<?php endif; ?>

	<!-- ── TEAM ──────────────────────────────────────────── -->
	<?php if ( ! empty( $team_members ) ) : ?>
	<section class="abt-team-section" id="team">
		<div class="fig-eyebrow">Our People</div>
		<h2 class="fig-section-heading"><?php echo esc_html( $team_heading ); ?></h2>
		<?php if ( $team_desc ) : ?>
		<p class="fig-section-desc"><?php echo esc_html( $team_desc ); ?></p>
		<?php endif; ?>
		<div class="abt-team-grid">
			<?php foreach ( $team_members as $member ) :
				$photo = ! empty( $member['photo'] ) ? slingshot_lp_attachment_url( $member['photo'], '', 'medium' ) : '';
				$name  = $member['name'] ?? '';
				$role  = $member['role'] ?? '';
			?>
			<div class="abt-team-card">
				<div class="abt-team-photo">
					<?php if ( $photo ) : ?>
					<img src="<?php echo esc_url( $photo ); ?>" alt="<?php echo esc_attr( $name ); ?>" loading="lazy">
					<?php endif; ?>
				</div>
				<?php if ( $name ) : ?><div class="abt-team-name"><?php echo esc_html( $name ); ?></div><?php endif; ?>
				<?php if ( $role ) : ?><div class="abt-team-role"><?php echo esc_html( $role ); ?></div><?php endif; ?>
			</div>
			<?php endforeach; ?>
		</div>
	</section>
	<?php endif; ?>

	<!-- ── TESTIMONIALS ──────────────────────────────────── -->
	<section class="abt-testimonial-section">
		<div class="fig-eyebrow">Client Stories</div>
		<h2 class="fig-section-heading"><?php echo esc_html( $test_heading ); ?></h2>
		<div class="abt-testimonials-grid">
			<?php foreach ( $test_items as $item ) :
				$avatar = ! empty( $item['avatar'] ) ? slingshot_lp_attachment_url( $item['avatar'], '', 'thumbnail' ) : '';
			?>
			<div class="abt-testimonial-card">
				<p class="abt-testimonial-quote"><?php echo esc_html( $item['quote'] ?? '' ); ?></p>
				<div class="abt-testimonial-person">
					<div class="abt-testimonial-avatar">
						<?php if ( $avatar ) : ?>
						<img src="<?php echo esc_url( $avatar ); ?>" alt="<?php echo esc_attr( $item['name'] ?? '' ); ?>">
						<?php endif; ?>
					</div>
					<div>
						<div class="abt-testimonial-name"><?php echo esc_html( $item['name'] ?? '' ); ?></div>
						<div class="abt-testimonial-company"><?php echo esc_html( $item['company'] ?? '' ); ?></div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</section>

	<!-- ── CTA ───────────────────────────────────────────── -->
	<section class="fig-cta">
		<div class="fig-cta-blob"></div>
		<div class="fig-cta-mascot">
			<?php if ( file_exists( $mascot_path ) ) : ?>
			<img src="<?php echo esc_url( $mascot_url ); ?>" alt="Slingshot mascot">
			<?php endif; ?>
		</div>
		<div class="fig-cta-body">
			<h2 class="fig-cta-heading"><?php echo esc_html( $cta_heading ); ?></h2>
			<?php if ( $cta_desc ) : ?>
			<p class="fig-cta-desc"><?php echo esc_html( $cta_desc ); ?></p>
			<?php endif; ?>
			<a href="<?php echo slingshot_lp_h_attr( $cta_btn_url ); ?>" class="fig-cta-btn" data-sl-modal="contact">
				<?php echo esc_html( $cta_btn_text ); ?> &rarr;
			</a>
		</div>
	</section>

</div><!-- .abt-page-wrapper -->

<?php get_footer(); ?>
