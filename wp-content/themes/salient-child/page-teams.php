<?php
/*
Template Name: Teams — Generic
 * Content: Edit Page (Meta Box fields on this template).
 */

wp_enqueue_style(
	'teams-jakarta',
	'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap',
	array(), null
);
wp_enqueue_style( 'home-style', get_stylesheet_directory_uri() . '/css/home.css', array(), '1.18' );
wp_enqueue_style( 'teams-style', get_stylesheet_directory_uri() . '/css/teams.css', array(), '1.3' );
wp_enqueue_style( 'teams-figma-skin', get_stylesheet_directory_uri() . '/css/teams-figma-skin.css', array( 'teams-style' ), '1.3' );
wp_enqueue_script( 'teams-script', get_stylesheet_directory_uri() . '/js/teams.js', array( 'jquery' ), '1.0', true );
wp_enqueue_script( 'hp-script', get_stylesheet_directory_uri() . '/js/home.js', array( 'jquery' ), '1.6', true );

get_header();

$img_dir = get_stylesheet_directory_uri() . '/img';

$blog_n = (int) slingshot_pm( 'teams_blog_posts', 3 );
$blog_n = max( 1, min( 12, $blog_n ) );

$blog_query = new WP_Query( array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => $blog_n,
	'orderby'        => 'date',
	'order'          => 'DESC',
) );

$skills_raw = slingshot_pm( 'teams_skills_categories', [] );
$skills_raw = is_array( $skills_raw ) ? $skills_raw : [];

$map_logos_raw = slingshot_pm( 'teams_map_logos', [] );
$map_logos_raw = is_array( $map_logos_raw ) ? $map_logos_raw : [];

$clients_raw = slingshot_pm( 'teams_clients_logos', [] );
$clients_raw = is_array( $clients_raw ) ? $clients_raw : [];

$teams_blog_fallbacks = array(
	$img_dir . '/ai-insight-david.png',
	$img_dir . '/ai-insight-hackathon.png',
	$img_dir . '/ai-insight-product.png',
	$img_dir . '/main-block-article.png',
);

$teams_icon_svg = static function ( $key ) {
	$icons = array(
		'people' => '<svg viewBox="0 0 40 40" fill="none" aria-hidden="true"><path d="M15.5 20.5a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11Z" stroke="currentColor" stroke-width="2"/><path d="M5.5 31.5c1.8-5.7 5.1-8.5 10-8.5s8.2 2.8 10 8.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M25.5 21a4.5 4.5 0 1 0 0-9" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M27.5 24c3.5.7 5.8 3.1 7 7.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>',
		'globe'  => '<svg viewBox="0 0 40 40" fill="none" aria-hidden="true"><circle cx="20" cy="20" r="14" stroke="currentColor" stroke-width="2"/><path d="M6 20h28M20 6c4 4.2 6 8.8 6 14s-2 9.8-6 14M20 6c-4 4.2-6 8.8-6 14s2 9.8 6 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>',
		'spark'  => '<svg viewBox="0 0 40 40" fill="none" aria-hidden="true"><path d="M18 5l2.7 8.6L29 16l-8.3 2.4L18 27l-2.7-8.6L7 16l8.3-2.4L18 5Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="M29 24l1.3 4.1L34 29l-3.7 1.1L29 34l-1.3-3.9L24 29l3.7-.9L29 24Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>',
		'cloud'  => '<svg viewBox="0 0 40 40" fill="none" aria-hidden="true"><path d="M14.5 29H28a6 6 0 0 0 .6-12 9 9 0 0 0-17.2-2.5A7.5 7.5 0 0 0 14.5 29Z" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M20 20v7M16.5 23.5H23.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>',
		'device' => '<svg viewBox="0 0 40 40" fill="none" aria-hidden="true"><rect x="10" y="8" width="20" height="24" rx="4" stroke="currentColor" stroke-width="2"/><path d="M17 27h6M15 13h10" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>',
		'data'   => '<svg viewBox="0 0 40 40" fill="none" aria-hidden="true"><path d="M10 13c0-3.3 20-3.3 20 0v14c0 3.3-20 3.3-20 0V13Z" stroke="currentColor" stroke-width="2"/><path d="M10 13c0 3.3 20 3.3 20 0M10 20c0 3.3 20 3.3 20 0" stroke="currentColor" stroke-width="2"/></svg>',
		'pen'    => '<svg viewBox="0 0 40 40" fill="none" aria-hidden="true"><path d="M11 28.5l2-7.5L26.5 7.5a4 4 0 0 1 5.7 5.7L18.8 26.7 11 28.5Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="M24 10l6 6M10 33h20" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>',
	);
	return isset( $icons[ $key ] ) ? $icons[ $key ] : $icons['spark'];
};

$teams_has_rows = static function ( $rows ) {
	if ( ! is_array( $rows ) || empty( $rows ) ) {
		return false;
	}
	foreach ( $rows as $row ) {
		if ( ! is_array( $row ) ) {
			continue;
		}
		foreach ( $row as $value ) {
			if ( is_array( $value ) && ! empty( $value ) ) {
				return true;
			}
			if ( ! is_array( $value ) && trim( (string) $value ) !== '' ) {
				return true;
			}
		}
	}
	return false;
};

$teams_model_ded_bullets = slingshot_lp_bullet_lines( slingshot_pm( 'teams_model_ded_bullets', "Self-managed teams embedded into your roadmap\nSlingshot-led delivery for autonomy and predictability\nHybrid model for cost-efficiency and 24-hour momentum\nSeamless integration with your tech stack, tools, and culture" ) );
$teams_model_aug_bullets = slingshot_lp_bullet_lines( slingshot_pm( 'teams_model_aug_bullets', "Nearshore (LATAM) or offshore (Eastern Europe)\nScale faster without long-term headcount\nAligns with your tools, workflows, and team culture\nIdeal for gap-filling or short-term acceleration" ) );

$teams_map_regions = slingshot_pm( 'teams_map_regions', [] );
if ( ! $teams_has_rows( $teams_map_regions ) ) {
	$teams_map_regions = array(
		array( 'name' => 'United States', 'desc' => '', 'featured' => '' ),
		array( 'name' => 'Eastern Europe', 'desc' => 'Creative, autonomous developers with deep technical fluency; ideal for innovation-led projects needing minimal oversight.', 'featured' => '1' ),
		array( 'name' => 'Latin America', 'desc' => '', 'featured' => '' ),
	);
}

$teams_skills = $skills_raw;
if ( ! $teams_has_rows( $teams_skills ) ) {
	$teams_skills = array(
		array( 'icon_key' => 'spark', 'category_name' => 'AI & Intelligent Systems', 'desc' => 'AI/ML, predictive modeling, and automation.' ),
		array( 'icon_key' => 'cloud', 'category_name' => 'Cloud-Native Engineering', 'desc' => 'AWS/Azure architectures, DevOps, QA automation, and CI/CD.' ),
		array( 'icon_key' => 'device', 'category_name' => 'Front-End & Mobile', 'desc' => 'React, Flutter, Swift, and Kotlin.' ),
		array( 'icon_key' => 'cloud', 'category_name' => 'Back-End & Integrations', 'desc' => 'Node.js, .NET, and integrations with Salesforce, Dynamics 365, and custom systems.' ),
		array( 'icon_key' => 'data', 'category_name' => 'Data Engineering', 'desc' => 'Pipelines, processing, and platform support for scalable products.' ),
		array( 'icon_key' => 'pen', 'category_name' => 'Product & Experience', 'desc' => 'UX/UI design and product management.' ),
	);
}

$teams_client_cards = slingshot_pm( 'teams_client_cards', [] );
if ( ! $teams_has_rows( $teams_client_cards ) ) {
	$teams_client_cards = array(
		array( 'company_name' => 'Connected Caregiver', 'quote' => "Slingshot's dedicated team model gave us a level of focus and continuity we couldn't find elsewhere. They integrated seamlessly with our internal staff, accelerated delivery, and felt like they were part of our own organization.", 'name' => 'John Doe', 'title' => 'Director of marketing and new business' ),
		array( 'company_name' => 'HealthRev', 'quote' => "Slingshot's dedicated team model gave us a level of focus and continuity we couldn't find elsewhere. They integrated seamlessly with our internal staff, accelerated delivery, and felt like they were part of our own organization.", 'name' => 'John Doe', 'title' => 'Director of marketing and new business' ),
		array( 'company_name' => 'MetLife', 'quote' => "Slingshot's dedicated team model gave us a level of focus and continuity we couldn't find elsewhere. They integrated seamlessly with our internal staff, accelerated delivery, and felt like they were part of our own organization.", 'name' => 'John Doe', 'title' => 'Director of marketing and new business' ),
		array( 'company_name' => 'ProjectTeam', 'quote' => "Slingshot's dedicated team model gave us a level of focus and continuity we couldn't find elsewhere. They integrated seamlessly with our internal staff, accelerated delivery, and felt like they were part of our own organization.", 'name' => 'John Doe', 'title' => 'Director of marketing and new business' ),
	);
}
?>

<style id="dynamic-css-inline-css" type="text/css">
	body{overflow:visible}.no-rgba #header-space{display:none;}@media only screen and (max-width:999px){body #header-space[data-header-mobile-fixed="1"]{display:none;}#header-outer[data-mobile-fixed="false"]{position:absolute;}}@media only screen and (min-width:1000px){#header-space{display:none;}.nectar-slider-wrap.first-section,.parallax_slider_outer.first-section,.full-width-content.first-section{margin-top:0!important;}body #page-header-bg,body #page-header-wrap{height:142px;}body #search-outer{z-index:100000;}}
	body.page-template-page-teams #header-outer,
	body.page-template-page-teams #header-space { display:none !important; }
</style>

<?php
slingshot_render_redesign_header( array(
	'variant' => 'light',
	'cta_url' => slingshot_lp_h_attr( slingshot_pm( 'teams_hero_cta_url', '/contact/?looking=Teams' ) ),
) );
?>

<div class="teams-page-wrapper">

	<!-- ═══ HERO ═══════════════════════════════════════════════ -->
	<section class="teams-hero">
		<div class="teams-hero-blob teams-hero-blob-1"></div>
		<div class="teams-hero-blob teams-hero-blob-2"></div>
		<div class="teams-hero-blob teams-hero-blob-3"></div>

		<div class="teams-hero-inner">
			<div class="teams-hero-content">
				<div class="teams-hero-breadcrumb">
					<span><?php echo esc_html( slingshot_pm( 'teams_hero_bc_parent', 'SERVICES' ) ); ?></span>
					<span class="teams-hero-sep">/</span>
					<span><?php echo esc_html( slingshot_pm( 'teams_hero_bc_leaf', 'TEAMS' ) ); ?></span>
				</div>
				<h1 class="teams-hero-heading"><?php echo nl2br( esc_html( slingshot_pm( 'teams_hero_heading', 'On-Demand Teams & Tech Talent' ) ) ); ?></h1>
				<p class="teams-hero-subtext"><?php echo esc_html( slingshot_pm( 'teams_hero_subtext', 'Senior engineers and product leaders embedded in your team—no ramp-up, just results.' ) ); ?></p>
				<a href="<?php echo slingshot_lp_h_attr( slingshot_pm( 'teams_hero_cta_url', '/contact/?looking=Teams' ) ); ?>" class="teams-hero-btn">
					<?php echo esc_html( slingshot_pm( 'teams_hero_cta_text', 'Book a call' ) ); ?> <span>&#8594;</span>
				</a>
			</div>

			<div class="teams-hero-photos">
				<div class="teams-hero-photo-grid">
					<div class="teams-hero-photo teams-hero-photo-a">
						<img src="<?php echo esc_url( slingshot_pm_image( 'teams_hero_img_a', $img_dir . '/teams-hero-a.png' ) ); ?>" alt="Slingshot teams">
					</div>
					<div class="teams-hero-photo teams-hero-photo-b">
						<img src="<?php echo esc_url( slingshot_pm_image( 'teams_hero_img_b', $img_dir . '/teams-hero-b.png' ) ); ?>" alt="Slingshot team member">
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ═══ INTRO ══════════════════════════════════════════════ -->
	<section class="teams-intro-section">
		<div class="teams-intro-inner">
			<div class="teams-intro-content">
				<h2 class="teams-intro-heading"><?php echo esc_html( slingshot_pm( 'teams_intro_heading', 'On-Demand Teams & Tech Talent, Built to Scale' ) ); ?></h2>
				<div class="teams-intro-desc"><?php echo wp_kses_post( wpautop( (string) slingshot_pm( 'teams_intro_desc', 'Whether you need a fully dedicated squad or flexible talent to fill skill gaps, Slingshot provides senior engineers, designers, and product leaders who hit the ground running.' ) ) ); ?></div>
			</div>
			<?php $intro_img = slingshot_pm_image( 'teams_intro_img', '' ); if ( $intro_img ) : ?>
			<div class="teams-intro-image">
				<img src="<?php echo esc_url( $intro_img ); ?>" alt="">
			</div>
			<?php endif; ?>
		</div>
	</section>

	<!-- ═══ MODEL CARDS ════════════════════════════════════════ -->
	<section class="teams-models-section">
		<div class="teams-models-inner">
			<h2 class="teams-models-title"><?php echo esc_html( slingshot_pm( 'teams_intro_tagline', 'Two Models. One Strategic Partner' ) ); ?></h2>

			<a href="<?php echo slingshot_lp_h_attr( slingshot_pm( 'teams_model_ded_cta_url', '/teams-dedicated/' ) ); ?>" class="teams-model-card teams-model-card--dedicated">
				<div class="teams-model-card-body">
					<div class="teams-model-card-icon">
						<?php echo slingshot_pm( 'teams_model_ded_icon_svg', $teams_icon_svg( 'people' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</div>
					<h3 class="teams-model-heading"><?php echo esc_html( slingshot_pm( 'teams_model_ded_heading', 'A full-stack team, built for your product' ) ); ?></h3>
					<p class="teams-model-desc"><?php echo esc_html( slingshot_pm( 'teams_model_ded_desc', 'A dedicated, managed team that works exclusively on your product.' ) ); ?></p>
					<?php if ( ! empty( $teams_model_ded_bullets ) ) : ?>
					<ul class="teams-model-bullets">
						<?php foreach ( $teams_model_ded_bullets as $bullet ) : ?>
						<li><?php echo esc_html( $bullet ); ?></li>
						<?php endforeach; ?>
					</ul>
					<?php endif; ?>
					<span class="teams-model-cta"><?php echo esc_html( slingshot_pm( 'teams_model_ded_cta_text', 'Explore' ) ); ?> <span aria-hidden="true">&#8594;</span></span>
				</div>
			</a>

			<a href="<?php echo slingshot_lp_h_attr( slingshot_pm( 'teams_model_aug_cta_url', '/teams-staff-augmentation/' ) ); ?>" class="teams-model-card teams-model-card--aug">
				<div class="teams-model-card-body">
					<div class="teams-model-card-icon">
						<?php echo slingshot_pm( 'teams_model_aug_icon_svg', $teams_icon_svg( 'globe' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</div>
					<h3 class="teams-model-heading"><?php echo esc_html( slingshot_pm( 'teams_model_aug_heading', 'Elite talent, integrated in days' ) ); ?></h3>
					<p class="teams-model-desc"><?php echo esc_html( slingshot_pm( 'teams_model_aug_desc', 'Plug senior engineers and specialists directly into your existing team.' ) ); ?></p>
					<?php if ( ! empty( $teams_model_aug_bullets ) ) : ?>
					<ul class="teams-model-bullets">
						<?php foreach ( $teams_model_aug_bullets as $bullet ) : ?>
						<li><?php echo esc_html( $bullet ); ?></li>
						<?php endforeach; ?>
					</ul>
					<?php endif; ?>
					<span class="teams-model-cta"><?php echo esc_html( slingshot_pm( 'teams_model_aug_cta_text', 'Explore' ) ); ?> <span aria-hidden="true">&#8594;</span></span>
				</div>
			</a>

		</div>
	</section>

	<!-- ═══ MAP / WHERE WE WORK ════════════════════════════════ -->
	<section class="teams-map-section">
		<div class="teams-map-inner">
			<div class="teams-map-content">
				<h2 class="teams-map-heading"><?php echo esc_html( slingshot_pm( 'teams_map_heading', 'Where Our Teams Work' ) ); ?></h2>
				<p class="teams-map-desc"><?php echo esc_html( slingshot_pm( 'teams_map_desc', 'Our talent network spans Latin America and Eastern Europe, giving you access to senior engineers in time zones that work with yours.' ) ); ?></p>
				<a href="<?php echo slingshot_lp_h_attr( slingshot_pm( 'teams_map_cta_url', '/contact/?looking=Teams' ) ); ?>" class="teams-outline-btn">
					<?php echo esc_html( slingshot_pm( 'teams_map_cta_text', 'Start Hiring Now' ) ); ?> <span aria-hidden="true">&#8594;</span>
				</a>

				<?php if ( ! empty( $map_logos_raw ) ) : ?>
				<div class="teams-map-logos">
					<?php foreach ( $map_logos_raw as $logo ) :
						$logo_img = ! empty( $logo['logo'] ) ? slingshot_lp_attachment_url( $logo['logo'], '', 'medium' ) : '';
						$logo_name = (string) ( $logo['name'] ?? '' );
						if ( ! $logo_img ) {
							$logo_img = slingshot_client_logo_url( $logo_name );
						}
						?>
					<span class="teams-map-logo-item">
						<?php if ( $logo_img ) : ?>
							<img src="<?php echo esc_url( $logo_img ); ?>" alt="<?php echo esc_attr( $logo_name ); ?>" loading="lazy">
						<?php else : ?>
							<?php echo esc_html( $logo_name ); ?>
						<?php endif; ?>
					</span>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>

			<div class="teams-map-visual">
				<?php $map_img = slingshot_pm_image( 'teams_map_img', '' ); ?>
				<?php if ( $map_img ) : ?>
					<img src="<?php echo esc_url( $map_img ); ?>" alt="Global team map" loading="lazy">
				<?php else : ?>
					<div class="teams-map-globe-placeholder" aria-hidden="true">
						<div class="teams-map-globe-dots"></div>
						<?php foreach ( array_values( $teams_map_regions ) as $idx => $region ) :
							$name     = (string) ( $region['name'] ?? '' );
							$desc     = (string) ( $region['desc'] ?? '' );
							$featured = ! empty( $region['featured'] );
							if ( '' === $name ) {
								continue;
							}
							?>
						<div class="teams-region-card teams-region-card-<?php echo esc_attr( (string) ( $idx + 1 ) ); ?><?php echo $featured ? ' teams-region-card--featured' : ''; ?>">
							<div class="teams-region-card-head">
								<strong><?php echo esc_html( $name ); ?></strong>
								<span><?php echo $featured ? '&minus;' : '+'; ?></span>
							</div>
							<div class="teams-region-avatars">
								<i>A</i><i>B</i><i>C</i><i>D</i><i>E</i>
							</div>
							<?php if ( $desc ) : ?>
							<p><?php echo esc_html( $desc ); ?></p>
							<?php endif; ?>
						</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<!-- ═══ SKILLS & CAPABILITIES ══════════════════════════════ -->
	<section class="teams-skills-section">
		<div class="teams-skills-inner">
			<div class="teams-skills-header">
				<h2 class="teams-skills-heading"><?php echo esc_html( slingshot_pm( 'teams_skills_heading', 'Strategic Skills & Capabilities' ) ); ?></h2>
				<?php $skills_desc = slingshot_pm( 'teams_skills_desc', '' ); if ( $skills_desc ) : ?>
				<p class="teams-skills-desc"><?php echo esc_html( $skills_desc ); ?></p>
				<?php endif; ?>
			</div>

			<div class="teams-skills-grid">
				<?php foreach ( $teams_skills as $cat ) :
					$cat_name = (string) ( $cat['category_name'] ?? '' );
					$cat_skills = is_array( $cat['skills'] ?? null ) ? $cat['skills'] : [];
					$cat_desc = (string) ( $cat['desc'] ?? '' );
					if ( ! $cat_desc && ! empty( $cat_skills ) ) {
						$skill_names = array();
						foreach ( $cat_skills as $sk ) {
							if ( ! empty( $sk['skill_name'] ) ) {
								$skill_names[] = (string) $sk['skill_name'];
							}
						}
						$cat_desc = implode( ', ', $skill_names );
					}
					if ( ! $cat_name && ! $cat_desc ) continue;
					$icon_svg = ! empty( $cat['icon_svg'] ) ? (string) $cat['icon_svg'] : $teams_icon_svg( (string) ( $cat['icon_key'] ?? 'spark' ) );
					?>
				<div class="teams-skill-category teams-skill-card">
					<div class="teams-skill-icon"><?php echo $icon_svg; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
					<h3 class="teams-skill-category-name"><?php echo esc_html( $cat_name ); ?></h3>
					<?php if ( $cat_desc ) : ?>
					<p class="teams-skill-card-desc"><?php echo esc_html( $cat_desc ); ?></p>
					<?php endif; ?>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- ═══ CLIENT INSIGHTS STRIP ══════════════════════════════ -->
	<section class="teams-clients-section">
		<div class="teams-clients-inner">
			<h2 class="teams-clients-heading"><?php echo esc_html( slingshot_pm( 'teams_clients_label', 'Teams & Staffing Client Insights' ) ); ?></h2>
			<div class="teams-client-carousel">
				<?php foreach ( $teams_client_cards as $card ) :
					$company = (string) ( $card['company_name'] ?? $card['company'] ?? '' );
					$logo    = ! empty( $card['company_logo'] ) ? slingshot_lp_attachment_url( $card['company_logo'], '', 'medium' ) : '';
					$photo   = ! empty( $card['photo'] ) ? slingshot_lp_attachment_url( $card['photo'], '', 'thumbnail' ) : '';
					if ( ! $logo ) {
						$logo = slingshot_client_logo_url( $company );
					}
					?>
				<article class="teams-client-card">
					<div class="teams-client-logo">
						<?php if ( $logo ) : ?>
							<img src="<?php echo esc_url( $logo ); ?>" alt="<?php echo esc_attr( $company ); ?>" loading="lazy">
						<?php else : ?>
							<span><?php echo esc_html( $company ); ?></span>
						<?php endif; ?>
					</div>
					<p class="teams-client-quote">&ldquo;<?php echo esc_html( (string) ( $card['quote'] ?? '' ) ); ?>&rdquo;</p>
					<div class="teams-client-author">
						<?php if ( $photo ) : ?>
						<img src="<?php echo esc_url( $photo ); ?>" alt="<?php echo esc_attr( (string) ( $card['name'] ?? '' ) ); ?>" loading="lazy">
						<?php else : ?>
						<span><?php echo esc_html( mb_substr( (string) ( $card['name'] ?? 'J' ), 0, 1 ) ); ?></span>
						<?php endif; ?>
						<div>
							<strong><?php echo esc_html( (string) ( $card['name'] ?? '' ) ); ?></strong>
							<small><?php echo esc_html( (string) ( $card['title'] ?? '' ) ); ?></small>
						</div>
					</div>
				</article>
				<?php endforeach; ?>
			</div>
			<div class="home-carousel-footer teams-carousel-footer">
				<div class="home-carousel-progress"><span></span></div>
				<div class="carousel-nav">
					<button class="carousel-nav-btn" type="button" aria-label="Previous">&#8249;</button>
					<button class="carousel-nav-btn" type="button" aria-label="Next">&#8250;</button>
				</div>
			</div>

			<?php if ( ! empty( $clients_raw ) ) : ?>
			<div class="home-logos-strip-wrapper teams-clients-logo-strip">
				<div class="home-logos-strip">
					<?php foreach ( array_merge( $clients_raw, $clients_raw ) as $row ) :
						$name = (string) ( $row['name'] ?? '' );
						$img  = slingshot_client_logo_url( $name );
						?>
					<span class="logo-item">
						<?php if ( $img ) : ?>
							<img src="<?php echo esc_url( $img ); ?>" alt="<?php echo esc_attr( $name ); ?>" loading="lazy">
						<?php else : ?>
							<?php echo esc_html( $name ); ?>
						<?php endif; ?>
					</span>
					<?php endforeach; ?>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</section>

	<!-- ═══ BLOG / INSIGHTS ════════════════════════════════════ -->
	<section class="home-blog-section teams-blog-section">
		<div class="home-blog-inner">
			<div class="home-blog-header">
				<h2 class="home-blog-title"><?php echo nl2br( esc_html( slingshot_pm( 'teams_blog_title', "Insights That Move\nBusiness Forward" ) ) ); ?></h2>
				<div class="home-blog-meta">
					<p class="home-blog-desc"><?php echo esc_html( slingshot_pm( 'teams_blog_desc', 'Actionable thinking on building high-performing distributed teams.' ) ); ?></p>
					<a href="<?php echo slingshot_lp_h_attr( slingshot_pm( 'teams_blog_cta_url', '/blog' ) ); ?>" class="home-section-link"><?php echo esc_html( slingshot_pm( 'teams_blog_cta_text', 'All Insights →' ) ); ?></a>
				</div>
			</div>
			<div class="home-blog-cards">
				<?php if ( $blog_query->have_posts() ) :
					$teams_blog_idx = 0;
					while ( $blog_query->have_posts() ) : $blog_query->the_post();
						$fallback_img = $teams_blog_fallbacks[ $teams_blog_idx % count( $teams_blog_fallbacks ) ];
						$teams_blog_idx++;
						?>
					<a href="<?php the_permalink(); ?>" class="blog-card">
						<div class="blog-card-image">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'medium_large', array( 'loading' => 'eager' ) ); ?>
							<?php else : ?>
								<img src="<?php echo esc_url( $fallback_img ); ?>" alt="" loading="eager">
							<?php endif; ?>
						</div>
						<div class="blog-card-body">
							<div class="blog-card-tags">
								<?php $cats = get_the_category();
								if ( $cats ) foreach ( array_slice( $cats, 0, 2 ) as $cat ) : ?>
									<span class="blog-card-tag"><?php echo esc_html( $cat->name ); ?></span>
								<?php endforeach; ?>
							</div>
							<h3 class="blog-card-title"><?php the_title(); ?></h3>
							<p class="blog-card-desc"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 20, '...' ) ); ?></p>
						</div>
					</a>
					<?php endwhile;
					wp_reset_postdata();
				endif; ?>
			</div>
			<div class="home-carousel-footer teams-carousel-footer">
				<div class="home-carousel-progress"><span></span></div>
				<div class="carousel-nav">
					<button class="carousel-nav-btn" type="button" aria-label="Previous">&#8249;</button>
					<button class="carousel-nav-btn" type="button" aria-label="Next">&#8250;</button>
				</div>
			</div>
		</div>
	</section>

	<!-- ═══ BOTTOM CTA ═════════════════════════════════════════ -->
	<section class="teams-cta-section">
		<div class="teams-cta-inner">
			<div class="home-cta-mascot">
				<?php
				$cta_visual_default_path = get_stylesheet_directory() . '/img/teams-cta-visual.png';
				$cta_visual_default_url  = get_stylesheet_directory_uri() . '/img/teams-cta-visual.png';
				$cta_visual_fallback     = file_exists( $cta_visual_default_path ) ? $cta_visual_default_url : get_stylesheet_directory_uri() . '/img/cta-mascot.png';
				$cta_visual_url          = slingshot_pm_image( 'teams_cta_visual', $cta_visual_fallback, 'large' );
				if ( $cta_visual_url ) : ?>
					<img src="<?php echo esc_url( $cta_visual_url ); ?>" alt="Slingshot team call">
				<?php else : ?>
				<svg class="home-cta-mascot-svg" viewBox="0 0 280 320" fill="none" xmlns="http://www.w3.org/2000/svg">
					<ellipse cx="140" cy="290" rx="55" ry="16" fill="rgba(75,35,176,.12)"/>
					<rect x="108" y="140" width="64" height="120" rx="32" fill="#4B23B0"/>
					<ellipse cx="140" cy="140" rx="32" ry="32" fill="#6D44B7"/>
					<path d="M108 168 C108 140 172 140 172 168" fill="#6D44B7"/>
					<circle cx="133" cy="142" r="5" fill="#fff"/>
					<circle cx="147" cy="142" r="5" fill="#fff"/>
					<circle cx="134" cy="143" r="2.5" fill="#1B1060"/>
					<circle cx="148" cy="143" r="2.5" fill="#1B1060"/>
					<path d="M108 220 C90 210 76 220 80 236 C88 232 100 228 108 230Z" fill="#23B7B4"/>
					<path d="M172 220 C190 210 204 220 200 236 C192 232 180 228 172 230Z" fill="#23B7B4"/>
				</svg>
				<?php endif; ?>
			</div>
			<div class="teams-cta-card">
				<h2 class="teams-cta-title"><?php echo esc_html( slingshot_pm( 'teams_cta_title', 'Ready to Move Faster?' ) ); ?></h2>
				<p class="teams-cta-desc"><?php echo esc_html( slingshot_pm( 'teams_cta_desc', 'Whether you need a full team or a few key engineers, Slingshot will find, vet, and embed the right people—fast.' ) ); ?></p>
				<a href="<?php echo slingshot_lp_h_attr( slingshot_pm( 'teams_cta_btn_url', '/contact/?looking=Teams' ) ); ?>" class="teams-cta-btn"><?php echo esc_html( slingshot_pm( 'teams_cta_btn_text', 'Start the Conversation →' ) ); ?></a>
			</div>
		</div>
	</section>

</div><!-- .teams-page-wrapper -->

<?php get_footer(); ?>
