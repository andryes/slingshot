<?php
/*
Template Name: Consulting
 * Content: Appearance → Consulting Page (Meta Box).
 */

wp_enqueue_style(
	'consulting-jakarta',
	'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap',
	array(), null
);
wp_enqueue_style( 'home-style', get_stylesheet_directory_uri() . '/css/home.css', array(), '1.18' );
wp_enqueue_style( 'consulting-style', get_stylesheet_directory_uri() . '/css/consulting.css', array(), '1.0' );
wp_enqueue_script( 'consulting-script', get_stylesheet_directory_uri() . '/js/consulting.js', array( 'jquery' ), '1.1', true );
wp_enqueue_script( 'hp-script', get_stylesheet_directory_uri() . '/js/home.js', array( 'jquery' ), '1.6', true );

get_header();

$opt     = SLINGSHOT_OPT_CONSULTING;
$img_dir = get_stylesheet_directory_uri() . '/img';

$services = slingshot_lp_consulting_help_services();
$first    = $services[0];

$blog_n = (int) slingshot_lp_setting( $opt, 'con_blog_posts', 3 );
$blog_n = max( 1, min( 12, $blog_n ) );

$blog_query = new WP_Query(
	array(
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'posts_per_page' => $blog_n,
		'orderby'        => 'date',
		'order'          => 'DESC',
	)
);
?>

<style id="dynamic-css-inline-css" type="text/css">
	body{overflow:visible}.no-rgba #header-space{display:none;}@media only screen and (max-width:999px){body #header-space[data-header-mobile-fixed="1"]{display:none;}#header-outer[data-mobile-fixed="false"]{position:absolute;}}@media only screen and (min-width:1000px){#header-space{display:none;}.nectar-slider-wrap.first-section,.parallax_slider_outer.first-section,.full-width-content.first-section{margin-top:0!important;}body #page-header-bg,body #page-header-wrap{height:142px;}body #search-outer{z-index:100000;}}
	body.page-template-page-consulting #header-outer,
	body.page-template-page-consulting #header-space { display:none !important; }
</style>

<?php
slingshot_render_redesign_header(
	array(
		'variant' => 'light',
		'cta_url' => slingshot_lp_h_attr( slingshot_lp_setting( $opt, 'con_hero_cta_url', '/contact/?looking=Consulting' ) ),
	)
);
?>

<div class="consulting-page-wrapper">

	<section class="con-hero">
		<div class="con-hero-blob con-hero-blob-1"></div>
		<div class="con-hero-blob con-hero-blob-2"></div>
		<div class="con-hero-blob con-hero-blob-3"></div>

		<div class="con-hero-inner">
			<div class="con-hero-content">
				<div class="con-hero-breadcrumb">
					<span><?php echo esc_html( slingshot_lp_setting( $opt, 'con_hero_bc_parent', 'SERVICES' ) ); ?></span>
					<span class="con-hero-sep">/</span>
					<span><?php echo esc_html( slingshot_lp_setting( $opt, 'con_hero_bc_leaf', 'CONSULTING' ) ); ?></span>
				</div>
				<h1 class="con-hero-heading"><?php echo esc_html( slingshot_lp_setting( $opt, 'con_hero_heading', 'Strategic Technology Consulting' ) ); ?></h1>
				<p class="con-hero-subtext"><?php echo esc_html( slingshot_lp_setting( $opt, 'con_hero_subtext', 'Expert guidance to solve challenges, modernize systems, and align tech with your business goals.' ) ); ?></p>
				<a href="<?php echo slingshot_lp_h_attr( slingshot_lp_setting( $opt, 'con_hero_cta_url', '/contact/?looking=Consulting' ) ); ?>" class="con-hero-btn"><?php echo esc_html( slingshot_lp_setting( $opt, 'con_hero_cta_text', 'Book a call' ) ); ?> <span>&#8594;</span></a>
			</div>

			<div class="con-hero-photos">
				<div class="con-hero-photo-grid">
					<div class="con-hero-photo con-hero-photo-a">
						<img src="<?php echo esc_url( slingshot_lp_image_url( $opt, 'con_hero_img_a', $img_dir . '/hero-person-1.jpg' ) ); ?>" alt="<?php echo esc_attr( slingshot_lp_setting( $opt, 'con_hero_img_a_alt', 'Slingshot consulting team' ) ); ?>">
					</div>
					<div class="con-hero-photo con-hero-photo-b">
						<img src="<?php echo esc_url( slingshot_lp_image_url( $opt, 'con_hero_img_b', $img_dir . '/hero-person-2.jpg' ) ); ?>" alt="<?php echo esc_attr( slingshot_lp_setting( $opt, 'con_hero_img_b_alt', 'Slingshot strategist at work' ) ); ?>">
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="con-stats-section">
		<div class="con-stats-inner">
			<div class="con-stats-photo">
				<img src="<?php echo esc_url( slingshot_lp_image_url( $opt, 'con_stats_image', $img_dir . '/main-block-article.png' ) ); ?>" alt="<?php echo esc_attr( slingshot_lp_setting( $opt, 'con_stats_image_alt', 'Slingshot team collaborating' ) ); ?>">
			</div>
			<div class="con-stats-content">
				<h2 class="con-stats-heading"><?php echo nl2br( esc_html( slingshot_lp_setting( $opt, 'con_stats_heading', "Built to Solve,\nScale, and Ship" ) ) ); ?></h2>
				<p class="con-stats-desc"><?php echo esc_html( slingshot_lp_setting( $opt, 'con_stats_desc', 'Harnessing deep technical expertise, cross-functional teams, and product thinking to every engagement, so you get outcomes, not just output.' ) ); ?></p>
				<div class="con-stats-grid">
					<?php foreach ( slingshot_lp_consulting_stats() as $st ) : ?>
					<div class="con-stat">
						<span class="con-stat-num"><?php echo esc_html( $st['number'] ); ?></span>
						<span class="con-stat-label"><?php echo esc_html( $st['label'] ); ?></span>
					</div>
					<?php endforeach; ?>
				</div>
				<a href="<?php echo slingshot_lp_h_attr( slingshot_lp_setting( $opt, 'con_stats_cta_url', '/work/' ) ); ?>" class="con-stats-cta"><?php echo esc_html( slingshot_lp_setting( $opt, 'con_stats_cta_text', 'Explore Our Work' ) ); ?> <span>&#8594;</span></a>
			</div>
		</div>
	</section>

	<section class="con-help-section">
		<div class="con-help-inner">
			<h2 class="con-help-heading"><?php echo esc_html( slingshot_lp_setting( $opt, 'con_help_heading', 'How Can We Help?' ) ); ?></h2>

			<div class="con-help-body">
				<div class="con-help-left">
					<div class="con-help-featured" id="con-featured-card">
						<div class="con-featured-tag"><?php echo esc_html( $first['featured_tag'] ); ?></div>
						<p class="con-featured-text"><?php echo esc_html( $first['featured_text'] ); ?></p>
						<a href="<?php echo slingshot_lp_h_attr( $first['featured_cta_url'] ); ?>" class="con-featured-cta"><span class="con-featured-cta-label"><?php echo esc_html( $first['featured_cta_text'] ); ?></span> <span>&#8594;</span></a>
					</div>

					<div class="con-help-accordion">
						<?php foreach ( $services as $idx => $svc ) : ?>
						<div class="con-help-item<?php echo 0 === $idx ? ' active' : ''; ?>"
							data-service="<?php echo esc_attr( $svc['service_key'] ); ?>"
							data-featured-tag="<?php echo esc_attr( $svc['featured_tag'] ); ?>"
							data-featured-text="<?php echo esc_attr( $svc['featured_text'] ); ?>"
							data-featured-cta-text="<?php echo esc_attr( $svc['featured_cta_text'] ); ?>"
							data-featured-cta-url="<?php echo esc_attr( slingshot_lp_link_href( $svc['featured_cta_url'] ) ); ?>">
							<div class="con-help-item-row">
								<span class="con-help-icon"><?php echo $svc['icon_svg']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
								<span class="con-help-label"><?php echo esc_html( $svc['accordion_label'] ); ?></span>
								<span class="con-help-toggle">+</span>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>

				<div class="con-help-right">
					<?php foreach ( $services as $idx => $svc ) : ?>
					<div class="con-service-detail<?php echo 0 === $idx ? '' : ' hidden'; ?>" id="con-service-<?php echo esc_attr( $svc['service_key'] ); ?>">
						<h3><?php echo esc_html( $svc['detail_title'] ); ?></h3>
						<p><?php echo esc_html( $svc['detail_intro'] ); ?></p>
						<ul>
							<?php foreach ( slingshot_lp_bullet_lines( $svc['detail_bullets'] ) as $li ) : ?>
							<li><?php echo esc_html( $li ); ?></li>
							<?php endforeach; ?>
						</ul>
						<a href="<?php echo slingshot_lp_h_attr( $svc['detail_cta_url'] ); ?>" class="con-service-link"><?php echo esc_html( $svc['detail_cta_text'] ); ?> <span>&#8594;</span></a>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>

	<section class="home-events-section con-events-section">
		<div class="home-events-inner">
			<div class="home-events-header">
				<h2 class="home-events-title"><?php echo esc_html( slingshot_lp_setting( $opt, 'con_events_title', 'Join the Conversation' ) ); ?></h2>
				<div class="home-events-meta">
					<p class="home-events-desc"><?php echo esc_html( slingshot_lp_setting( $opt, 'con_events_desc', "We don't just build — we share. Explore upcoming events for leaders navigating technology strategy, AI, and product development." ) ); ?></p>
					<a href="<?php echo slingshot_lp_h_attr( slingshot_lp_setting( $opt, 'con_events_all_url', '/events' ) ); ?>" class="home-section-link"><?php echo esc_html( slingshot_lp_setting( $opt, 'con_events_all_text', 'All Events →' ) ); ?></a>
				</div>
			</div>
			<div class="home-events-cards">
				<?php
				$ev_i = 0;
				foreach ( slingshot_lp_consulting_events_cards() as $ev ) :
					$ev_i++;
					$ev_url = ! empty( $ev['url'] ) ? $ev['url'] : '#';
					$img_url = '';
					if ( ! empty( $ev['image'] ) ) {
						$img_url = slingshot_lp_attachment_url( $ev['image'], '', 'large' );
					}
					if ( ! $img_url && empty( $ev['image_bg_css'] ) ) {
						$img_url = ( 1 === $ev_i % 2 ) ? $img_dir . '/hero-person-1.jpg' : $img_dir . '/hero-person-2.jpg';
					}
					$reg = ! empty( $ev['register_label'] ) ? $ev['register_label'] : 'Register →';
					?>
				<a href="<?php echo slingshot_lp_h_attr( $ev_url ); ?>" class="event-card">
					<div class="event-card-image"<?php echo ! empty( $ev['image_bg_css'] ) ? ' style="background:' . esc_attr( $ev['image_bg_css'] ) . ';"' : ''; ?>>
						<?php if ( $img_url && empty( $ev['image_bg_css'] ) ) : ?>
						<img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $ev['title'] ); ?>" loading="lazy">
						<?php endif; ?>
					</div>
					<div class="event-card-body">
						<div class="event-card-info">
							<span class="event-card-tag"><?php echo esc_html( $ev['tag'] ); ?></span>
							<h3 class="event-card-title"><?php echo esc_html( $ev['title'] ); ?></h3>
							<p class="event-card-date"><?php echo esc_html( $ev['date_location'] ); ?></p>
						</div>
						<span class="event-register-btn"><?php echo esc_html( $reg ); ?></span>
					</div>
				</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="con-clients-section">
		<div class="con-clients-inner">
			<p class="con-clients-label"><?php echo esc_html( slingshot_lp_setting( $opt, 'con_clients_label', 'Our Trusted Clients' ) ); ?></p>
			<div class="home-logos-strip-wrapper">
				<div class="home-logos-strip">
					<?php
					$logos = slingshot_lp_consulting_clients();
					foreach ( array_merge( $logos, $logos ) as $row ) :
						$name = (string) ( $row['name'] ?? '' );
						$img  = ! empty( $row['image'] ) ? slingshot_lp_attachment_url( $row['image'], '', 'large' ) : '';
						if ( ! $img ) {
							$img = slingshot_client_logo_url( $name );
						}
						?>
					<span class="logo-item">
						<?php if ( $img ) : ?>
							<img src="<?php echo esc_url( $img ); ?>" alt="<?php echo esc_attr( $name ? $name : 'Client logo' ); ?>" loading="lazy">
						<?php else : ?>
							<?php echo esc_html( $name ); ?>
						<?php endif; ?>
					</span>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>

	<section class="home-blog-section con-blog-section">
		<div class="home-blog-inner">
			<div class="home-blog-header">
				<h2 class="home-blog-title"><?php echo nl2br( esc_html( slingshot_lp_setting( $opt, 'con_blog_title', "Insights That Move\nBusiness Forward" ) ) ); ?></h2>
				<div class="home-blog-meta">
					<p class="home-blog-desc"><?php echo esc_html( slingshot_lp_setting( $opt, 'con_blog_desc', 'Actionable thinking on software strategy, AI adoption, and how high-performing teams build and scale.' ) ); ?></p>
					<a href="<?php echo slingshot_lp_h_attr( slingshot_lp_setting( $opt, 'con_blog_cta_url', '/blog' ) ); ?>" class="home-section-link"><?php echo esc_html( slingshot_lp_setting( $opt, 'con_blog_cta_text', 'All Insights →' ) ); ?></a>
				</div>
			</div>
			<div class="home-blog-cards">
				<?php if ( $blog_query->have_posts() ) : ?>
					<?php
					while ( $blog_query->have_posts() ) :
						$blog_query->the_post();
						?>
						<a href="<?php the_permalink(); ?>" class="blog-card">
							<div class="blog-card-image">
								<?php if ( has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail( 'medium_large', array( 'loading' => 'lazy' ) ); ?>
								<?php endif; ?>
							</div>
							<div class="blog-card-body">
								<div class="blog-card-tags">
									<?php
									$cats = get_the_category();
									if ( $cats ) :
										foreach ( array_slice( $cats, 0, 2 ) as $cat ) :
											?>
										<span class="blog-card-tag"><?php echo esc_html( $cat->name ); ?></span>
											<?php
										endforeach;
endif;
									?>
								</div>
								<h3 class="blog-card-title"><?php the_title(); ?></h3>
								<p class="blog-card-desc"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 20, '...' ) ); ?></p>
							</div>
						</a>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php else : ?>
					<a href="#" class="blog-card">
						<div class="blog-card-image"></div>
						<div class="blog-card-body">
							<span class="blog-card-tag">Strategy</span>
							<h3 class="blog-card-title">How to Align Technology with Business Goals</h3>
						</div>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<section class="con-cta-section">
		<div class="con-cta-inner">
			<div class="home-cta-mascot">
				<?php
				// 1. Try the image from the settings page
				// 2. Fall back to the file in /img
				// 3. Fall back to the inline SVG placeholder
				$mascot_from_settings = $cta_mascot;
				$mascot_file_path     = get_stylesheet_directory() . '/img/cta-mascot.png';
				$mascot_file_url      = get_stylesheet_directory_uri() . '/img/cta-mascot.png';

				if ( $mascot_from_settings ) : ?>
					<img src="<?php echo esc_url( $mascot_from_settings ); ?>" alt="Slingshot mascot">
				<?php elseif ( file_exists( $mascot_file_path ) ) : ?>
					<img src="<?php echo esc_url( $mascot_file_url ); ?>" alt="Slingshot mascot">
				<?php else : ?>
				<!-- TODO: Export mascot from Figma (node 8930-23258) and save to img/cta-mascot.png or upload via Home Page settings -->
				<svg class="home-cta-mascot-svg" viewBox="0 0 280 320" fill="none" xmlns="http://www.w3.org/2000/svg">
					<ellipse cx="140" cy="290" rx="55" ry="16" fill="rgba(75,35,176,.12)"/>
					<path d="M120 260 C115 275 125 285 140 290 C155 285 165 275 160 260 C150 268 130 268 120 260Z" fill="#FF8C42"/>
					<path d="M128 262 C124 272 132 280 140 283 C148 280 156 272 152 262 C146 268 134 268 128 262Z" fill="#FFD166"/>
					<rect x="108" y="140" width="64" height="120" rx="32" fill="#4B23B0"/>
					<ellipse cx="140" cy="140" rx="32" ry="32" fill="#6D44B7"/>
					<path d="M108 168 C108 140 172 140 172 168" fill="#6D44B7"/>
					<circle cx="140" cy="165" r="18" fill="#fff" opacity=".15"/>
					<circle cx="140" cy="165" r="12" fill="#fff" opacity=".25"/>
					<circle cx="133" cy="142" r="5" fill="#fff"/>
					<circle cx="147" cy="142" r="5" fill="#fff"/>
					<circle cx="134" cy="143" r="2.5" fill="#1B1060"/>
					<circle cx="148" cy="143" r="2.5" fill="#1B1060"/>
					<path d="M108 155 C96 140 90 130 100 122 C108 130 108 145 108 155Z" fill="#5D2DBF"/>
					<path d="M172 155 C184 140 190 130 180 122 C172 130 172 145 172 155Z" fill="#5D2DBF"/>
					<path d="M108 220 C90 210 76 220 80 236 C88 232 100 228 108 230Z" fill="#23B7B4"/>
					<path d="M172 220 C190 210 204 220 200 236 C192 232 180 228 172 230Z" fill="#23B7B4"/>
				</svg>
				<?php endif; ?>
			</div>
			<div class="con-cta-card">
				<h2 class="con-cta-title"><?php echo esc_html( slingshot_lp_setting( $opt, 'con_cta_title', "Let's Build What's Next" ) ); ?></h2>
				<p class="con-cta-desc"><?php echo esc_html( slingshot_lp_setting( $opt, 'con_cta_desc', "Whether you're exploring a new direction or ready to accelerate — let's talk about how Slingshot can help you get there." ) ); ?></p>
				<a href="<?php echo slingshot_lp_h_attr( slingshot_lp_setting( $opt, 'con_cta_btn_url', '/contact/?looking=Consulting' ) ); ?>" class="con-cta-btn"><?php echo esc_html( slingshot_lp_setting( $opt, 'con_cta_btn_text', 'Book a Strategy Call →' ) ); ?></a>
			</div>
		</div>
	</section>

</div>

<?php get_footer(); ?>
