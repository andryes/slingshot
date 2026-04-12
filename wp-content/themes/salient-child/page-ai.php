<?php
/*
Template Name: Artificial Intelligence
 * Content: WordPress post editor.
 */

wp_enqueue_style(
	'ai-jakarta',
	'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap',
	array(),
	null
);
wp_enqueue_style( 'ai-style', get_stylesheet_directory_uri() . '/css/updated.css', array(), '1.1' );
wp_enqueue_style( 'home-style', get_stylesheet_directory_uri() . '/css/home.css', array(), '1.18' );
wp_enqueue_script( 'ai-script', get_stylesheet_directory_uri() . '/js/updated.js', array( 'jquery' ), '1.1', true );
wp_enqueue_script( 'hp-script', get_stylesheet_directory_uri() . '/js/home.js', array( 'jquery' ), '1.6', true );

get_header();

$img_dir = get_stylesheet_directory_uri() . '/img';

$cat_slug = trim( (string) slingshot_pm( 'ai_blog_category', 'artificial-intelligence' ) );
if ( $cat_slug === '' ) {
	$cat_slug = 'artificial-intelligence';
}
$blog_n = (int) slingshot_pm( 'ai_blog_posts', 10 );
$blog_n   = max( 1, min( 24, $blog_n ) );

$blog_news = new WP_Query(
	array(
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'posts_per_page' => $blog_n,
		'order'          => 'desc',
		'orderby'        => 'date',
		'category_name'  => sanitize_title_for_query( $cat_slug ),
	)
);

$ai_steps = slingshot_lp_ai_steps();
$ai_caps  = slingshot_lp_ai_capabilities();

$tools_raw = slingshot_pm( 'ai_tools_logos', [] );
$tools     = is_array( $tools_raw ) ? slingshot_lp_filter_group(
	$tools_raw,
	static function ( $row ) {
		return ! empty( $row['image'] );
	}
) : [];
?>

<style id="dynamic-css-inline-css" type="text/css">
    body{overflow:visible}.no-rgba #header-space{display:none;}@media only screen and (max-width:999px){body #header-space[data-header-mobile-fixed="1"]{display:none;}#header-outer[data-mobile-fixed="false"]{position:absolute;}}@media only screen and (min-width:1000px){#header-space{display:none;}.nectar-slider-wrap.first-section,.parallax_slider_outer.first-section,.full-width-content.first-section{margin-top:0!important;}body #page-header-bg,body #page-header-wrap{height:142px;}body #search-outer{z-index:100000;}}
    body.page-template-page-ai #header-outer,
    body.page-template-page-ai #header-space { display:none !important; }
</style>
<?php
slingshot_render_redesign_header(
	array(
		'variant' => 'light',
		'cta_url' => slingshot_lp_h_attr( slingshot_pm('ai_hero_cta_url', '/contact/' ) ),
	)
);
?>
        <div class="bg-color-stripe"></div>
		<div id="ajax-content-wrap">

			<div class="ai-hero-section">
				<div class="ai-hero-blob ai-hero-blob-1"></div>
				<div class="ai-hero-blob ai-hero-blob-2"></div>
				<div class="ai-hero-blob ai-hero-blob-3"></div>

				<div class="ai-hero-inner">
					<div class="ai-hero-content">
						<div class="ai-hero-breadcrumb">
							<span><?php echo esc_html( slingshot_pm('ai_hero_bc_parent', 'SERVICES' ) ); ?></span>
							<span class="ai-hero-breadcrumb-sep">/</span>
							<span><?php echo esc_html( slingshot_pm('ai_hero_bc_leaf', 'AI' ) ); ?></span>
						</div>
						<h1 class="ai-hero-heading"><?php echo esc_html( slingshot_pm('ai_hero_heading', 'AI is Reshaping Business. Be the One Who Leads.' ) ); ?></h1>
						<p class="ai-hero-subtext"><?php echo esc_html( slingshot_pm('ai_hero_subtext', 'Slingshot helps forward-thinking teams adopt AI that drives real business impact — from strategy and use cases to prototypes and deployed solutions.' ) ); ?></p>
						<a href="<?php echo slingshot_lp_h_attr( slingshot_pm('ai_hero_cta_url', '/contact/' ) ); ?>" class="ai-hero-cta-btn"><?php echo esc_html( slingshot_pm('ai_hero_cta_text', 'Book a call' ) ); ?> <span class="ai-hero-cta-arrow">&#8594;</span></a>
					</div>

					<div class="ai-hero-photos-wrap">
						<div class="ai-hero-photo-grid">
							<div class="ai-hero-photo ai-hero-photo-left">
								<img src="<?php echo esc_url( slingshot_pm_image('ai_hero_img_left', $img_dir . '/hero-person-1.jpg' ) ); ?>" alt="<?php echo esc_attr( slingshot_pm('ai_hero_img_left_alt', 'Slingshot team collaborating on AI' ) ); ?>"/>
							</div>
							<div class="ai-hero-photo ai-hero-photo-right">
								<img src="<?php echo esc_url( slingshot_pm_image('ai_hero_img_right', $img_dir . '/hero-person-2.jpg' ) ); ?>" alt="<?php echo esc_attr( slingshot_pm('ai_hero_img_right_alt', 'Slingshot engineer working on AI solution' ) ); ?>"/>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="hero-block">
				<div class="hero-block-bg row-bg-wrap" data-bg-animation="none" data-bg-animation-delay="" data-bg-overlay="false"></div>
				<div class="hero-block-bg-bottom row-bg-wrap" data-bg-animation="none" data-bg-animation-delay="" data-bg-overlay="false"></div>
				<div class="hero-block-step">
					<div class="main-block-step">
						<img src="<?php echo esc_url( slingshot_pm_image('ai_impact_image', $img_dir . '/main-block-article.png' ) ); ?>" alt="<?php echo esc_attr( slingshot_pm('ai_impact_image_alt', '' ) ); ?>"/>
						<div class="main-block-step-content">
							<h2><?php echo nl2br( esc_html( slingshot_pm('ai_impact_heading', "Where AI makes \n an impact" ) ) ); ?></h2>
							<span><?php echo esc_html( slingshot_pm('ai_impact_text', 'Harness the power of artificial intelligence to revolutionize your business, elevate your team, and drive bold, measurable impact.' ) ); ?></span>
							<a href="<?php echo slingshot_lp_h_attr( slingshot_pm('ai_impact_cta_url', '/contact/?looking=Artificial+Intelligence' ) ); ?>"><?php echo esc_html( slingshot_pm('ai_impact_cta_text', 'Get Started Now' ) ); ?> <i class="icon-button-arrow see-more"></i></a>
						</div>
					</div>
					<div class="block-steps">
						<?php
						$si = 0;
						foreach ( $ai_steps as $step ) :
							$si++;
							$show_price = ! empty( $step['show_price_row'] );
							$badge_src  = ! empty( $step['step_badge_img'] )
								? slingshot_lp_attachment_url( $step['step_badge_img'], '', 'medium' )
								: $img_dir . '/step-' . $si . '.png';
							?>
						<div class="block-step">
							<div class="block-step-title">
								<img src="<?php echo esc_url( $badge_src ); ?>" alt="<?php echo esc_attr( (string) $si ); ?>"/>
								<div class="block-step-content">
									<h4><?php echo esc_html( $step['title'] ?? '' ); ?></h4>
									<?php if ( $show_price ) : ?>
									<div class="block-step-price">
										<img src="<?php echo esc_url( $img_dir . '/coin.png' ); ?>" alt="coin"/>
										<p><?php echo esc_html( $step['price'] ?? '' ); ?></p>
										<span class="separator"></span>
										<img src="<?php echo esc_url( $img_dir . '/time.png' ); ?>" alt="time"/>
										<p><?php echo esc_html( $step['duration'] ?? '' ); ?></p>
									</div>
									<?php endif; ?>
								</div>
							</div>
							<div class="block-step-text">
								<span><?php echo esc_html( $step['intro'] ?? '' ); ?></span>
								<div class="">
									<strong>What you get:</strong>
									<ul>
										<?php foreach ( slingshot_lp_bullet_lines( $step['bullets'] ?? '' ) as $li ) : ?>
										<li><?php echo esc_html( $li ); ?></li>
										<?php endforeach; ?>
									</ul>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<div class="capabilities-block-bg">
				<div class="capabilities-block">
					<div class="capabilities-title">
						<h2><?php echo esc_html( slingshot_pm('ai_cap_title', 'AI Capabilities' ) ); ?></h2>
					</div>
					<div class="capabilities-content">
						<?php
						$ci = 0;
						foreach ( $ai_caps as $cap ) :
							$ci++;
							$icon = ! empty( $cap['image'] )
								? slingshot_lp_attachment_url( $cap['image'], '', 'medium' )
								: $img_dir . '/capabilities-' . $ci . '.png';
							?>
						<div class="capabilitie-item">
							<img src="<?php echo esc_url( $icon ); ?>" alt="<?php echo esc_attr( (string) $ci ); ?>">
							<h4><?php echo nl2br( esc_html( $cap['title'] ?? '' ) ); ?></h4>
							<p><?php echo esc_html( $cap['desc'] ?? '' ); ?></p>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<div class="tools-block-bg">
				<div class="tools-block">
					<div class="tools-title">
						<h2><?php echo esc_html( slingshot_pm('ai_tools_title', 'Trusted Platforms We Build With' ) ); ?></h2>
					</div>
				</div>
				<div class="tools-content marquee">
						<?php if ( $tools ) : ?>
							<?php foreach ( $tools as $tl ) : ?>
					<div class="tools-item">
							<img src="<?php echo esc_url( slingshot_lp_attachment_url( $tl['image'], '', 'medium' ) ); ?>" alt="<?php echo esc_attr( $tl['alt'] ?? 'logo' ); ?>">
						</div>
							<?php endforeach; ?>
						<?php else : ?>
							<?php for ( $ti = 1; $ti <= 11; $ti++ ) : ?>
					<div class="tools-item">
							<img src="<?php echo esc_url( $img_dir . '/tools-' . $ti . '.png' ); ?>" alt="logo">
						</div>
							<?php endfor; ?>
						<?php endif; ?>
				</div>
			</div>
			<div class="innovations-block-bg">
				<div class="innovations-block">
					<div class="innovations-title">
						<h2><?php echo esc_html( slingshot_pm('ai_blog_title', 'Insights That Move Business Forward' ) ); ?></h2>
						<a class="contact-block-button" role="button" href="<?php echo slingshot_lp_h_attr( slingshot_pm('ai_blog_cta_url', '/blog/' ) ); ?>" data-color-override="false" data-hover-color-override="false" data-hover-text-color-override="#fff">
							<?php echo esc_html( slingshot_pm('ai_blog_cta_text', 'See more' ) ); ?>
							<i class="icon-button-arrow see-more"></i>
						</a>
					</div>
					<div class="innovations-content">
						<?php if ( $blog_news->have_posts() ) : ?>
							<?php
							while ( $blog_news->have_posts() ) :
								$blog_news->the_post();
								$excerpt = get_the_excerpt();
								if ( empty( $excerpt ) ) {
									$excerpt = wp_strip_all_tags( get_the_content() );
								}
								?>
							<a href="<?php the_permalink(); ?>">
								<div class="innovations-item">
									<img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'medium' ) ); ?>" alt="<?php the_title_attribute(); ?>"/>
									<div class="innovation-content">
										<h4><?php the_title(); ?></h4>
										<span><?php echo esc_html( wp_trim_words( $excerpt, 20, '...' ) ); ?></span>
									</div>
								</div>
							</a>
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
						<?php endif; ?>
					</div>
					<div class="slider-arrows">
						<button type="button" class="prev">‹</button>
						<button type="button" class="next">›</button>
					</div>
					<a class="contact-block-button-mobile" role="button" href="<?php echo slingshot_lp_h_attr( slingshot_pm('ai_blog_cta_url', '/blog/' ) ); ?>" data-color-override="false" data-hover-color-override="false" data-hover-text-color-override="#fff">
						<?php echo esc_html( slingshot_pm('ai_blog_cta_text', 'See more' ) ); ?>
						<i class="icon-button-arrow see-more"></i>
					</a>
				</div>

			</div>
			<div class="answers-block-bg">
				<div class="answers-block">
					<div class="answers-title">
					<h2><?php echo nl2br( esc_html( slingshot_pm('ai_faq_title', "Still wondering\nif AI is right for you?" ) ) ); ?></h2>
				</div>
					<div class="answers-content">
					<?php foreach ( slingshot_lp_ai_faq_items() as $faq ) : ?>
					<div class="item-answer">
						<div class="row">
							<h3><?php echo esc_html( $faq['question'] ?? '' ); ?></h3>
							<div class="circle-plus"></div>
						</div>
						<div class="answer-text">
							<?php echo wp_kses_post( $faq['answer'] ?? '' ); ?>
						</div>

					</div>
					<?php endforeach; ?>
				</div>
				</div>
			</div>


			<section class="ai-cta-section">
				<div class="ai-cta-inner">
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
					<div class="ai-cta-card">
						<h2 class="ai-cta-title"><?php echo nl2br( esc_html( slingshot_pm('ai_cta_title', "Start Smart. Move Fast.\nBuild What Matters" ) ) ); ?></h2>
						<p class="ai-cta-desc"><?php echo esc_html( slingshot_pm('ai_cta_desc', "Let's turn AI into something real, valuable, and aligned to your business." ) ); ?></p>
						<a href="<?php echo slingshot_lp_h_attr( slingshot_pm('ai_cta_btn_url', '/contact/' ) ); ?>" class="ai-cta-btn"><?php echo esc_html( slingshot_pm('ai_cta_btn_text', 'Book a Free AI Discussion →' ) ); ?></a>
					</div>
				</div>
			</section>
		</div>

<?php get_footer(); ?>
