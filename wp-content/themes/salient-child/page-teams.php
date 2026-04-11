<?php
/*
Template Name: Teams — Generic
 * Content: Appearance → Teams — Generic (Meta Box).
 */

wp_enqueue_style(
	'teams-jakarta',
	'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap',
	array(), null
);
wp_enqueue_style( 'home-style', get_stylesheet_directory_uri() . '/css/home.css', array(), '1.18' );
wp_enqueue_style( 'teams-style', get_stylesheet_directory_uri() . '/css/teams.css', array(), '1.0' );
wp_enqueue_script( 'teams-script', get_stylesheet_directory_uri() . '/js/teams.js', array( 'jquery' ), '1.0', true );
wp_enqueue_script( 'hp-script', get_stylesheet_directory_uri() . '/js/home.js', array( 'jquery' ), '1.6', true );

get_header();

$opt     = SLINGSHOT_OPT_TEAMS;
$img_dir = get_stylesheet_directory_uri() . '/img';

$blog_n = (int) slingshot_lp_setting( $opt, 'teams_blog_posts', 3 );
$blog_n = max( 1, min( 12, $blog_n ) );

$blog_query = new WP_Query( array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => $blog_n,
	'orderby'        => 'date',
	'order'          => 'DESC',
) );

$skills_raw = slingshot_lp_setting( $opt, 'teams_skills_categories', [] );
$skills_raw = is_array( $skills_raw ) ? $skills_raw : [];

$map_logos_raw = slingshot_lp_setting( $opt, 'teams_map_logos', [] );
$map_logos_raw = is_array( $map_logos_raw ) ? $map_logos_raw : [];

$clients_raw = slingshot_lp_setting( $opt, 'teams_clients_logos', [] );
$clients_raw = is_array( $clients_raw ) ? $clients_raw : [];
?>

<style id="dynamic-css-inline-css" type="text/css">
	body{overflow:visible}.no-rgba #header-space{display:none;}@media only screen and (max-width:999px){body #header-space[data-header-mobile-fixed="1"]{display:none;}#header-outer[data-mobile-fixed="false"]{position:absolute;}}@media only screen and (min-width:1000px){#header-space{display:none;}.nectar-slider-wrap.first-section,.parallax_slider_outer.first-section,.full-width-content.first-section{margin-top:0!important;}body #page-header-bg,body #page-header-wrap{height:142px;}body #search-outer{z-index:100000;}}
	body.page-template-page-teams #header-outer,
	body.page-template-page-teams #header-space { display:none !important; }
</style>

<?php
slingshot_render_redesign_header( array(
	'variant' => 'light',
	'cta_url' => slingshot_lp_h_attr( slingshot_lp_setting( $opt, 'teams_hero_cta_url', '/contact/?looking=Teams' ) ),
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
					<span><?php echo esc_html( slingshot_lp_setting( $opt, 'teams_hero_bc_parent', 'SERVICES' ) ); ?></span>
					<span class="teams-hero-sep">/</span>
					<span><?php echo esc_html( slingshot_lp_setting( $opt, 'teams_hero_bc_leaf', 'TEAMS' ) ); ?></span>
				</div>
				<h1 class="teams-hero-heading"><?php echo esc_html( slingshot_lp_setting( $opt, 'teams_hero_heading', 'On-Demand Teams & Tech Talent' ) ); ?></h1>
				<p class="teams-hero-subtext"><?php echo esc_html( slingshot_lp_setting( $opt, 'teams_hero_subtext', 'Senior engineers and product leaders embedded in your team—no ramp-up, just results.' ) ); ?></p>
				<a href="<?php echo slingshot_lp_h_attr( slingshot_lp_setting( $opt, 'teams_hero_cta_url', '/contact/?looking=Teams' ) ); ?>" class="teams-hero-btn">
					<?php echo esc_html( slingshot_lp_setting( $opt, 'teams_hero_cta_text', 'Book a call' ) ); ?> <span>&#8594;</span>
				</a>
			</div>

			<div class="teams-hero-photos">
				<div class="teams-hero-photo-grid">
					<div class="teams-hero-photo teams-hero-photo-a">
						<img src="<?php echo esc_url( slingshot_lp_image_url( $opt, 'teams_hero_img_a', $img_dir . '/hero-person-1.jpg' ) ); ?>" alt="Slingshot teams">
					</div>
					<div class="teams-hero-photo teams-hero-photo-b">
						<img src="<?php echo esc_url( slingshot_lp_image_url( $opt, 'teams_hero_img_b', $img_dir . '/hero-person-2.jpg' ) ); ?>" alt="Slingshot team member">
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ═══ INTRO ══════════════════════════════════════════════ -->
	<section class="teams-intro-section">
		<div class="teams-intro-inner">
			<div class="teams-intro-content">
				<h2 class="teams-intro-heading"><?php echo esc_html( slingshot_lp_setting( $opt, 'teams_intro_heading', 'On-Demand Teams & Tech Talent, Built to Scale' ) ); ?></h2>
				<p class="teams-intro-desc"><?php echo esc_html( slingshot_lp_setting( $opt, 'teams_intro_desc', 'Whether you need a fully dedicated squad or flexible talent to fill skill gaps, Slingshot provides senior engineers, designers, and product leaders who hit the ground running.' ) ); ?></p>
				<p class="teams-intro-tagline"><?php echo esc_html( slingshot_lp_setting( $opt, 'teams_intro_tagline', 'Two Models, One Strategic Partner' ) ); ?></p>
			</div>
			<?php $intro_img = slingshot_lp_image_url( $opt, 'teams_intro_img', '' ); if ( $intro_img ) : ?>
			<div class="teams-intro-image">
				<img src="<?php echo esc_url( $intro_img ); ?>" alt="">
			</div>
			<?php endif; ?>
		</div>
	</section>

	<!-- ═══ MODEL CARDS ════════════════════════════════════════ -->
	<section class="teams-models-section">
		<div class="teams-models-inner">

			<a href="<?php echo slingshot_lp_h_attr( slingshot_lp_setting( $opt, 'teams_model_ded_cta_url', '/teams/dedicated/' ) ); ?>" class="teams-model-card teams-model-card--dedicated">
				<?php $ded_img = slingshot_lp_image_url( $opt, 'teams_model_ded_img', '' ); if ( $ded_img ) : ?>
				<div class="teams-model-card-image" style="background-image:url('<?php echo esc_url( $ded_img ); ?>')"></div>
				<?php else : ?>
				<div class="teams-model-card-image teams-model-card-image--placeholder"></div>
				<?php endif; ?>
				<div class="teams-model-card-body">
					<span class="teams-model-tag"><?php echo esc_html( slingshot_lp_setting( $opt, 'teams_model_ded_tag', 'Dedicated Teams' ) ); ?></span>
					<h3 class="teams-model-heading"><?php echo esc_html( slingshot_lp_setting( $opt, 'teams_model_ded_heading', 'A full-stack team, built for your product' ) ); ?></h3>
					<p class="teams-model-desc"><?php echo esc_html( slingshot_lp_setting( $opt, 'teams_model_ded_desc', 'A dedicated, managed team that works exclusively on your product.' ) ); ?></p>
					<span class="teams-model-cta"><?php echo esc_html( slingshot_lp_setting( $opt, 'teams_model_ded_cta_text', 'Learn more' ) ); ?> &#8594;</span>
				</div>
			</a>

			<a href="<?php echo slingshot_lp_h_attr( slingshot_lp_setting( $opt, 'teams_model_aug_cta_url', '/teams/staff-augmentation/' ) ); ?>" class="teams-model-card teams-model-card--aug">
				<?php $aug_img = slingshot_lp_image_url( $opt, 'teams_model_aug_img', '' ); if ( $aug_img ) : ?>
				<div class="teams-model-card-image" style="background-image:url('<?php echo esc_url( $aug_img ); ?>')"></div>
				<?php else : ?>
				<div class="teams-model-card-image teams-model-card-image--placeholder"></div>
				<?php endif; ?>
				<div class="teams-model-card-body">
					<span class="teams-model-tag"><?php echo esc_html( slingshot_lp_setting( $opt, 'teams_model_aug_tag', 'Staff Augmentation' ) ); ?></span>
					<h3 class="teams-model-heading"><?php echo esc_html( slingshot_lp_setting( $opt, 'teams_model_aug_heading', 'Elite talent, integrated in days' ) ); ?></h3>
					<p class="teams-model-desc"><?php echo esc_html( slingshot_lp_setting( $opt, 'teams_model_aug_desc', 'Plug senior engineers and specialists directly into your existing team.' ) ); ?></p>
					<span class="teams-model-cta"><?php echo esc_html( slingshot_lp_setting( $opt, 'teams_model_aug_cta_text', 'Learn more' ) ); ?> &#8594;</span>
				</div>
			</a>

		</div>
	</section>

	<!-- ═══ MAP / WHERE WE WORK ════════════════════════════════ -->
	<section class="teams-map-section">
		<div class="teams-map-inner">
			<div class="teams-map-content">
				<h2 class="teams-map-heading"><?php echo esc_html( slingshot_lp_setting( $opt, 'teams_map_heading', 'Where Our Teams Work' ) ); ?></h2>
				<p class="teams-map-desc"><?php echo esc_html( slingshot_lp_setting( $opt, 'teams_map_desc', 'Our talent network spans Latin America and Eastern Europe, giving you access to senior engineers in time zones that work with yours.' ) ); ?></p>

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
				<?php $map_img = slingshot_lp_image_url( $opt, 'teams_map_img', '' ); ?>
				<?php if ( $map_img ) : ?>
					<img src="<?php echo esc_url( $map_img ); ?>" alt="Global team map" loading="lazy">
				<?php else : ?>
					<div class="teams-map-globe-placeholder">
						<svg viewBox="0 0 400 300" fill="none" xmlns="http://www.w3.org/2000/svg">
							<ellipse cx="200" cy="150" rx="130" ry="130" fill="rgba(75,35,176,0.08)" stroke="rgba(75,35,176,0.15)" stroke-width="1"/>
							<ellipse cx="200" cy="150" rx="90" ry="130" fill="none" stroke="rgba(75,35,176,0.1)" stroke-width="1"/>
							<line x1="70" y1="150" x2="330" y2="150" stroke="rgba(75,35,176,0.1)" stroke-width="1"/>
							<line x1="200" y1="20" x2="200" y2="280" stroke="rgba(75,35,176,0.1)" stroke-width="1"/>
							<ellipse cx="200" cy="150" rx="130" ry="40" fill="none" stroke="rgba(75,35,176,0.08)" stroke-width="1"/>
							<ellipse cx="200" cy="150" rx="130" ry="80" fill="none" stroke="rgba(75,35,176,0.06)" stroke-width="1"/>
							<!-- Map pins -->
							<circle cx="155" cy="120" r="5" fill="#23B7B4"/>
							<circle cx="155" cy="120" r="9" fill="rgba(35,183,180,0.2)"/>
							<circle cx="230" cy="100" r="5" fill="#23B7B4"/>
							<circle cx="230" cy="100" r="9" fill="rgba(35,183,180,0.2)"/>
							<circle cx="270" cy="130" r="5" fill="#4B23B0"/>
							<circle cx="270" cy="130" r="9" fill="rgba(75,35,176,0.2)"/>
							<circle cx="180" cy="180" r="4" fill="#4B23B0"/>
							<circle cx="180" cy="180" r="8" fill="rgba(75,35,176,0.2)"/>
						</svg>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<!-- ═══ SKILLS & CAPABILITIES ══════════════════════════════ -->
	<section class="teams-skills-section">
		<div class="teams-skills-inner">
			<div class="teams-skills-header">
				<h2 class="teams-skills-heading"><?php echo esc_html( slingshot_lp_setting( $opt, 'teams_skills_heading', 'Strategic Skills & Capabilities' ) ); ?></h2>
				<?php $skills_desc = slingshot_lp_setting( $opt, 'teams_skills_desc', '' ); if ( $skills_desc ) : ?>
				<p class="teams-skills-desc"><?php echo esc_html( $skills_desc ); ?></p>
				<?php endif; ?>
			</div>

			<?php if ( ! empty( $skills_raw ) ) : ?>
			<div class="teams-skills-grid">
				<?php foreach ( $skills_raw as $cat ) :
					$cat_name = (string) ( $cat['category_name'] ?? '' );
					$cat_skills = is_array( $cat['skills'] ?? null ) ? $cat['skills'] : [];
					if ( ! $cat_name && empty( $cat_skills ) ) continue;
					?>
				<div class="teams-skill-category">
					<h3 class="teams-skill-category-name"><?php echo esc_html( $cat_name ); ?></h3>
					<?php if ( ! empty( $cat_skills ) ) : ?>
					<ul class="teams-skill-list">
						<?php foreach ( $cat_skills as $sk ) : ?>
						<li><?php echo esc_html( (string) ( $sk['skill_name'] ?? '' ) ); ?></li>
						<?php endforeach; ?>
					</ul>
					<?php endif; ?>
				</div>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
		</div>
	</section>

	<!-- ═══ CLIENT INSIGHTS STRIP ══════════════════════════════ -->
	<section class="teams-clients-section">
		<div class="teams-clients-inner">
			<p class="teams-clients-label"><?php echo esc_html( slingshot_lp_setting( $opt, 'teams_clients_label', 'Teams & Staffing Client Insights' ) ); ?></p>
			<?php if ( ! empty( $clients_raw ) ) : ?>
			<div class="home-logos-strip-wrapper">
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
				<h2 class="home-blog-title"><?php echo nl2br( esc_html( slingshot_lp_setting( $opt, 'teams_blog_title', "Insights That Move\nBusiness Forward" ) ) ); ?></h2>
				<div class="home-blog-meta">
					<p class="home-blog-desc"><?php echo esc_html( slingshot_lp_setting( $opt, 'teams_blog_desc', 'Actionable thinking on building high-performing distributed teams.' ) ); ?></p>
					<a href="<?php echo slingshot_lp_h_attr( slingshot_lp_setting( $opt, 'teams_blog_cta_url', '/blog' ) ); ?>" class="home-section-link"><?php echo esc_html( slingshot_lp_setting( $opt, 'teams_blog_cta_text', 'All Insights →' ) ); ?></a>
				</div>
			</div>
			<div class="home-blog-cards">
				<?php if ( $blog_query->have_posts() ) :
					while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>
					<a href="<?php the_permalink(); ?>" class="blog-card">
						<div class="blog-card-image">
							<?php if ( has_post_thumbnail() ) : the_post_thumbnail( 'medium_large', array( 'loading' => 'lazy' ) ); endif; ?>
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
		</div>
	</section>

	<!-- ═══ BOTTOM CTA ═════════════════════════════════════════ -->
	<section class="teams-cta-section">
		<div class="teams-cta-inner">
			<div class="home-cta-mascot">
				<?php
				$mascot_file_path = get_stylesheet_directory() . '/img/cta-mascot.png';
				$mascot_file_url  = get_stylesheet_directory_uri() . '/img/cta-mascot.png';
				if ( file_exists( $mascot_file_path ) ) : ?>
					<img src="<?php echo esc_url( $mascot_file_url ); ?>" alt="Slingshot mascot">
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
				<h2 class="teams-cta-title"><?php echo esc_html( slingshot_lp_setting( $opt, 'teams_cta_title', 'Ready to Move Faster?' ) ); ?></h2>
				<p class="teams-cta-desc"><?php echo esc_html( slingshot_lp_setting( $opt, 'teams_cta_desc', 'Whether you need a full team or a few key engineers, Slingshot will find, vet, and embed the right people—fast.' ) ); ?></p>
				<a href="<?php echo slingshot_lp_h_attr( slingshot_lp_setting( $opt, 'teams_cta_btn_url', '/contact/?looking=Teams' ) ); ?>" class="teams-cta-btn"><?php echo esc_html( slingshot_lp_setting( $opt, 'teams_cta_btn_text', 'Start the Conversation →' ) ); ?></a>
			</div>
		</div>
	</section>

</div><!-- .teams-page-wrapper -->

<?php get_footer(); ?>
