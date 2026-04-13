<?php
/*
Template Name: Teams — Dedicated
 * Content: Edit Page (Meta Box fields on this template).
 */

wp_enqueue_style(
	'teams-jakarta',
	'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap',
	array(), null
);
wp_enqueue_style( 'home-style', get_stylesheet_directory_uri() . '/css/home.css', array(), '1.18' );
wp_enqueue_style( 'teams-style', get_stylesheet_directory_uri() . '/css/teams.css', array(), '1.0' );
wp_enqueue_style( 'teams-figma-skin', get_stylesheet_directory_uri() . '/css/teams-figma-skin.css', array( 'teams-style' ), '1.0' );
wp_enqueue_script( 'teams-script', get_stylesheet_directory_uri() . '/js/teams.js', array( 'jquery' ), '1.0', true );
wp_enqueue_script( 'hp-script', get_stylesheet_directory_uri() . '/js/home.js', array( 'jquery' ), '1.6', true );

get_header();

$img_dir = get_stylesheet_directory_uri() . '/img';

$blog_n = (int) slingshot_pm( 'ded_blog_posts', 3 );
$blog_n = max( 1, min( 12, $blog_n ) );

$blog_query = new WP_Query( array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => $blog_n,
	'orderby'        => 'date',
	'order'          => 'DESC',
) );

$why_cards    = slingshot_pm( 'ded_why_cards', [] );
$why_cards    = is_array( $why_cards ) ? $why_cards : [];

$test_items   = slingshot_pm( 'ded_test_items', [] );
$test_items   = is_array( $test_items ) ? $test_items : [];

$map_logos    = slingshot_pm( 'ded_map_logos', [] );
$map_logos    = is_array( $map_logos ) ? $map_logos : [];

$skills_cats  = slingshot_pm( 'ded_skills_categories', [] );
$skills_cats  = is_array( $skills_cats ) ? $skills_cats : [];

$clients_logos = slingshot_pm( 'ded_clients_logos', [] );
$clients_logos = is_array( $clients_logos ) ? $clients_logos : [];
?>

<style id="dynamic-css-inline-css" type="text/css">
	body{overflow:visible}.no-rgba #header-space{display:none;}@media only screen and (max-width:999px){body #header-space[data-header-mobile-fixed="1"]{display:none;}#header-outer[data-mobile-fixed="false"]{position:absolute;}}@media only screen and (min-width:1000px){#header-space{display:none;}.nectar-slider-wrap.first-section,.parallax_slider_outer.first-section,.full-width-content.first-section{margin-top:0!important;}body #page-header-bg,body #page-header-wrap{height:142px;}body #search-outer{z-index:100000;}}
	body.page-template-page-teams-dedicated #header-outer,
	body.page-template-page-teams-dedicated #header-space { display:none !important; }
</style>

<?php
slingshot_render_redesign_header( array(
	'variant' => 'light',
	'cta_url' => slingshot_lp_h_attr( slingshot_pm( 'ded_hero_cta_url', '/contact/?looking=Dedicated+Teams' ) ),
	'cta_text' => slingshot_pm( 'ded_hero_cta_text', 'Build Your Team' ),
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
					<span><?php echo esc_html( slingshot_pm( 'ded_hero_bc_parent', 'TEAMS' ) ); ?></span>
					<span class="teams-hero-sep">/</span>
					<span><?php echo esc_html( slingshot_pm( 'ded_hero_bc_leaf', 'DEDICATED TEAMS' ) ); ?></span>
				</div>
				<h1 class="teams-hero-heading"><?php echo esc_html( slingshot_pm( 'ded_hero_heading', 'Dedicated Teams That Deliver' ) ); ?></h1>
				<p class="teams-hero-subtext"><?php echo esc_html( slingshot_pm( 'ded_hero_subtext', 'A fully managed, embedded squad — engineers, a tech lead, and a PM — built around your product.' ) ); ?></p>
				<a href="<?php echo slingshot_lp_h_attr( slingshot_pm( 'ded_hero_cta_url', '/contact/?looking=Dedicated+Teams' ) ); ?>" class="teams-hero-btn">
					<?php echo esc_html( slingshot_pm( 'ded_hero_cta_text', 'Build Your Team' ) ); ?> <span>&#8594;</span>
				</a>
			</div>

			<div class="teams-hero-photos">
				<div class="teams-hero-photo-grid">
					<div class="teams-hero-photo teams-hero-photo-a">
						<img src="<?php echo esc_url( slingshot_pm_image( 'ded_hero_img_a', $img_dir . '/hero-person-1.jpg' ) ); ?>" alt="Dedicated team">
					</div>
					<div class="teams-hero-photo teams-hero-photo-b">
						<img src="<?php echo esc_url( slingshot_pm_image( 'ded_hero_img_b', $img_dir . '/hero-person-2.jpg' ) ); ?>" alt="Dedicated team member">
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ═══ WHY CHOOSE ══════════════════════════════════════════ -->
	<section class="teams-why-section">
		<div class="teams-why-inner">
			<?php $why_eyebrow = slingshot_pm( 'ded_why_eyebrow', 'Why Us' ); if ( $why_eyebrow ) : ?>
			<span class="teams-section-eyebrow"><?php echo esc_html( $why_eyebrow ); ?></span>
			<?php endif; ?>
			<h2 class="teams-why-heading"><?php echo esc_html( slingshot_pm( 'ded_why_heading', 'Why Companies Choose Slingshot Teams' ) ); ?></h2>
			<?php $why_desc = slingshot_pm( 'ded_why_desc', '' ); if ( $why_desc ) : ?>
			<p class="teams-why-desc"><?php echo esc_html( $why_desc ); ?></p>
			<?php endif; ?>

			<?php if ( ! empty( $why_cards ) ) : ?>
			<div class="teams-feature-cards">
				<?php foreach ( $why_cards as $card ) : ?>
				<div class="teams-feature-card">
					<?php if ( ! empty( $card['icon_svg'] ) ) : ?>
					<div class="teams-feature-card-icon"><?php echo $card['icon_svg']; // phpcs:ignore ?></div>
					<?php endif; ?>
					<h3 class="teams-feature-card-title"><?php echo esc_html( (string) ( $card['title'] ?? '' ) ); ?></h3>
					<p class="teams-feature-card-desc"><?php echo esc_html( (string) ( $card['desc'] ?? '' ) ); ?></p>
				</div>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
		</div>
	</section>

	<!-- ═══ WHAT YOU GET ════════════════════════════════════════ -->
	<section class="teams-get-section">
		<div class="teams-get-inner">
			<div class="teams-get-content">
				<h2 class="teams-get-heading"><?php echo esc_html( slingshot_pm( 'ded_get_heading', 'What You Get' ) ); ?></h2>
				<p class="teams-get-desc"><?php echo esc_html( slingshot_pm( 'ded_get_desc', 'A cross-functional, dedicated squad that slots into your workflow and starts shipping in weeks, not months.' ) ); ?></p>
				<a href="<?php echo slingshot_lp_h_attr( slingshot_pm( 'ded_get_cta_url', '/contact/?looking=Dedicated+Teams' ) ); ?>" class="teams-btn-primary">
					<?php echo esc_html( slingshot_pm( 'ded_get_cta_text', 'Build Your Team' ) ); ?> &#8594;
				</a>
			</div>

			<?php $team_img = slingshot_pm_image( 'ded_get_team_img', '' ); ?>
			<div class="teams-get-photo<?php echo $team_img ? '' : ' teams-get-photo--placeholder'; ?>">
				<?php if ( $team_img ) : ?>
					<img src="<?php echo esc_url( $team_img ); ?>" alt="Dedicated team" loading="lazy">
				<?php else : ?>
					<div class="teams-get-photo-placeholder">
						<svg viewBox="0 0 480 320" fill="none" xmlns="http://www.w3.org/2000/svg" width="100%">
							<rect width="480" height="320" rx="16" fill="#E8E6F4"/>
							<circle cx="120" cy="140" r="50" fill="#C5C0E0"/>
							<circle cx="240" cy="120" r="60" fill="#B0A8D8"/>
							<circle cx="360" cy="140" r="50" fill="#C5C0E0"/>
							<rect x="60" y="180" width="120" height="100" rx="12" fill="#C5C0E0"/>
							<rect x="180" y="168" width="120" height="112" rx="12" fill="#B0A8D8"/>
							<rect x="300" y="180" width="120" height="100" rx="12" fill="#C5C0E0"/>
						</svg>
					</div>
				<?php endif; ?>
			</div>
		</div>

		<!-- Cross-sell Staff Aug -->
		<div class="teams-crosssell-strip">
			<div class="teams-crosssell-inner">
				<div class="teams-crosssell-card">
					<span class="teams-crosssell-tag"><?php echo esc_html( slingshot_pm( 'ded_crosssell_tag', 'Staff Augmentation' ) ); ?></span>
					<div class="teams-crosssell-body">
						<h3 class="teams-crosssell-heading"><?php echo esc_html( slingshot_pm( 'ded_crosssell_heading', 'Need individual contributors instead?' ) ); ?></h3>
						<p class="teams-crosssell-desc"><?php echo esc_html( slingshot_pm( 'ded_crosssell_desc', 'If you have an existing team and just need to fill specific skill gaps, our Staff Augmentation model lets you add senior talent in days.' ) ); ?></p>
					</div>
					<a href="<?php echo slingshot_lp_h_attr( slingshot_pm( 'ded_crosssell_cta_url', '/teams/staff-augmentation/' ) ); ?>" class="teams-crosssell-cta">
						<?php echo esc_html( slingshot_pm( 'ded_crosssell_cta_text', 'Learn More →' ) ); ?>
					</a>
				</div>
			</div>
		</div>
	</section>

	<!-- ═══ MAP / WHERE WE WORK ════════════════════════════════ -->
	<section class="teams-map-section">
		<div class="teams-map-inner">
			<div class="teams-map-content">
				<h2 class="teams-map-heading"><?php echo esc_html( slingshot_pm( 'ded_map_heading', 'Where Our Teams Work' ) ); ?></h2>

				<?php if ( ! empty( $map_logos ) ) : ?>
				<div class="teams-map-logos">
					<?php foreach ( $map_logos as $logo ) :
						$logo_img  = ! empty( $logo['logo'] ) ? slingshot_lp_attachment_url( $logo['logo'], '', 'medium' ) : '';
						$logo_name = (string) ( $logo['name'] ?? '' );
						if ( ! $logo_img ) $logo_img = slingshot_client_logo_url( $logo_name );
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
				<?php $map_img = slingshot_pm_image( 'ded_map_img', '' ); ?>
				<?php if ( $map_img ) : ?>
					<img src="<?php echo esc_url( $map_img ); ?>" alt="Global team map" loading="lazy">
				<?php else : ?>
					<div class="teams-map-globe-placeholder">
						<svg viewBox="0 0 400 300" fill="none" xmlns="http://www.w3.org/2000/svg">
							<ellipse cx="200" cy="150" rx="130" ry="130" fill="rgba(75,35,176,0.08)" stroke="rgba(75,35,176,0.15)" stroke-width="1"/>
							<ellipse cx="200" cy="150" rx="90" ry="130" fill="none" stroke="rgba(75,35,176,0.1)" stroke-width="1"/>
							<line x1="70" y1="150" x2="330" y2="150" stroke="rgba(75,35,176,0.1)" stroke-width="1"/>
							<ellipse cx="200" cy="150" rx="130" ry="40" fill="none" stroke="rgba(75,35,176,0.08)" stroke-width="1"/>
							<circle cx="155" cy="120" r="5" fill="#23B7B4"/>
							<circle cx="155" cy="120" r="9" fill="rgba(35,183,180,0.2)"/>
							<circle cx="270" cy="130" r="5" fill="#4B23B0"/>
							<circle cx="270" cy="130" r="9" fill="rgba(75,35,176,0.2)"/>
						</svg>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<!-- ═══ CLIENT TESTIMONIALS ════════════════════════════════ -->
	<?php if ( ! empty( $test_items ) ) : ?>
	<section class="teams-testimonials-section">
		<div class="teams-testimonials-inner">
			<h2 class="teams-testimonials-heading"><?php echo esc_html( slingshot_pm( 'ded_test_heading', 'Client Testimonials' ) ); ?></h2>
			<div class="teams-testimonials-grid">
				<?php foreach ( $test_items as $t ) :
					$photo = ! empty( $t['photo'] ) ? slingshot_lp_attachment_url( $t['photo'], '', 'thumbnail' ) : '';
					$logo  = ! empty( $t['company_logo'] ) ? slingshot_lp_attachment_url( $t['company_logo'], '', 'medium' ) : '';
					?>
				<div class="teams-testimonial-card">
					<div class="teams-testimonial-logo-row">
						<?php if ( $logo ) : ?>
							<img class="teams-testimonial-company-logo" src="<?php echo esc_url( $logo ); ?>" alt="">
						<?php endif; ?>
					</div>
					<p class="teams-testimonial-quote">&ldquo;<?php echo esc_html( (string) ( $t['quote'] ?? '' ) ); ?>&rdquo;</p>
					<div class="teams-testimonial-author">
						<?php if ( $photo ) : ?>
							<img class="teams-testimonial-photo" src="<?php echo esc_url( $photo ); ?>" alt="<?php echo esc_attr( (string) ( $t['name'] ?? '' ) ); ?>">
						<?php else : ?>
							<div class="teams-testimonial-photo-placeholder"><?php echo esc_html( mb_substr( (string) ( $t['name'] ?? 'A' ), 0, 1 ) ); ?></div>
						<?php endif; ?>
						<div>
							<strong class="teams-testimonial-name"><?php echo esc_html( (string) ( $t['name'] ?? '' ) ); ?></strong>
							<span class="teams-testimonial-title"><?php echo esc_html( (string) ( $t['title'] ?? '' ) ); ?></span>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<!-- ═══ SKILLS & CAPABILITIES ══════════════════════════════ -->
	<?php if ( ! empty( $skills_cats ) ) : ?>
	<section class="teams-skills-section">
		<div class="teams-skills-inner">
			<div class="teams-skills-header">
				<h2 class="teams-skills-heading"><?php echo esc_html( slingshot_pm( 'ded_skills_heading', 'Strategic Skills & Capabilities' ) ); ?></h2>
			</div>
			<div class="teams-skills-grid">
				<?php foreach ( $skills_cats as $cat ) :
					$cat_name   = (string) ( $cat['category_name'] ?? '' );
					$cat_skills = is_array( $cat['skills'] ?? null ) ? $cat['skills'] : [];
					?>
				<div class="teams-skill-category">
					<h3 class="teams-skill-category-name"><?php echo esc_html( $cat_name ); ?></h3>
					<ul class="teams-skill-list">
						<?php foreach ( $cat_skills as $sk ) : ?>
						<li><?php echo esc_html( (string) ( $sk['skill_name'] ?? '' ) ); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<!-- ═══ CLIENT INSIGHTS STRIP ══════════════════════════════ -->
	<?php if ( ! empty( $clients_logos ) ) : ?>
	<section class="teams-clients-section">
		<div class="teams-clients-inner">
			<p class="teams-clients-label"><?php echo esc_html( slingshot_pm( 'ded_clients_label', 'Teams & Staffing Client Insights' ) ); ?></p>
			<div class="home-logos-strip-wrapper">
				<div class="home-logos-strip">
					<?php foreach ( array_merge( $clients_logos, $clients_logos ) as $row ) :
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
		</div>
	</section>
	<?php endif; ?>

	<!-- ═══ BLOG / INSIGHTS ════════════════════════════════════ -->
	<section class="home-blog-section teams-blog-section">
		<div class="home-blog-inner">
			<div class="home-blog-header">
				<h2 class="home-blog-title"><?php echo nl2br( esc_html( slingshot_pm( 'ded_blog_title', "Insights That Move\nBusiness Forward" ) ) ); ?></h2>
				<div class="home-blog-meta">
					<p class="home-blog-desc"><?php echo esc_html( slingshot_pm( 'ded_blog_desc', 'Actionable thinking on building high-performing distributed teams.' ) ); ?></p>
					<a href="<?php echo slingshot_lp_h_attr( slingshot_pm( 'ded_blog_cta_url', '/blog' ) ); ?>" class="home-section-link"><?php echo esc_html( slingshot_pm( 'ded_blog_cta_text', 'All Insights →' ) ); ?></a>
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
					<path d="M108 220 C90 210 76 220 80 236 C88 232 100 228 108 230Z" fill="#23B7B4"/>
					<path d="M172 220 C190 210 204 220 200 236 C192 232 180 228 172 230Z" fill="#23B7B4"/>
				</svg>
				<?php endif; ?>
			</div>
			<div class="teams-cta-card">
				<h2 class="teams-cta-title"><?php echo esc_html( slingshot_pm( 'ded_cta_title', 'Ready to Build?' ) ); ?></h2>
				<p class="teams-cta-desc"><?php echo esc_html( slingshot_pm( 'ded_cta_desc', "Tell us what you're building and we'll put together the right team—fast." ) ); ?></p>
				<a href="<?php echo slingshot_lp_h_attr( slingshot_pm( 'ded_cta_btn_url', '/contact/?looking=Dedicated+Teams' ) ); ?>" class="teams-cta-btn"><?php echo esc_html( slingshot_pm( 'ded_cta_btn_text', 'Start the Conversation →' ) ); ?></a>
			</div>
		</div>
	</section>

</div><!-- .teams-page-wrapper -->

<?php get_footer(); ?>
