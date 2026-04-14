<?php
/*
Template Name: Service Figma
 * Content: Edit Page meta fields (Meta Box).
 */

wp_enqueue_style(
	'svc-figma-jakarta',
	'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap',
	array(), null
);
wp_enqueue_style( 'home-style', get_stylesheet_directory_uri() . '/css/home.css', array(), '1.18' );
wp_enqueue_style( 'service-figma-style', get_stylesheet_directory_uri() . '/css/service-figma.css', array(), '1.6' );
wp_enqueue_script( 'hp-script', get_stylesheet_directory_uri() . '/js/home.js', array( 'jquery' ), '1.6', true );

get_header();

$img_dir = get_stylesheet_directory_uri() . '/img';

// ── Helpers ──────────────────────────────────────────────────
// slingshot_pm() and slingshot_pm_image() read from current post meta (landing-pages-helpers.php)

$blog_n = max( 1, min( 12, (int) slingshot_pm( 'svc_blog_posts', 3 ) ) );
$blog_q = new WP_Query( array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => $blog_n,
	'orderby'        => 'date',
	'order'          => 'DESC',
) );
?>
<style>
	body.page-template-page-service-figma #header-outer,
	body.page-template-page-service-figma #header-space { display:none !important; }
</style>

<?php slingshot_render_redesign_header( array( 'variant' => 'light', 'cta_url' => slingshot_lp_h_attr( slingshot_pm( 'svc_hero_cta_url', '/contact/' ) ) ) ); ?>

<div class="svc-page-wrapper">

	<!-- ── HERO ─────────────────────────────────────────────── -->
	<section class="svc-hero">
		<div class="svc-hero-blob svc-hero-blob-1"></div>
		<div class="svc-hero-blob svc-hero-blob-2"></div>
		<div class="svc-hero-blob svc-hero-blob-3"></div>

		<div class="svc-hero-inner">
			<div class="svc-hero-content">
				<div class="svc-hero-breadcrumb">
					<span><?php echo esc_html( slingshot_pm( 'svc_hero_bc_parent', 'SERVICES' ) ); ?></span>
					<span class="svc-hero-sep">/</span>
					<span><?php echo esc_html( slingshot_pm( 'svc_hero_bc_leaf', 'PRODUCT' ) ); ?></span>
				</div>
				<h1 class="svc-hero-heading"><?php echo esc_html( slingshot_pm( 'svc_hero_heading', 'From Vision to Velocity' ) ); ?></h1>
				<p class="svc-hero-subtext"><?php echo esc_html( slingshot_pm( 'svc_hero_subtext', 'We design and build digital products that scale — combining strategy, design, and engineering into a seamless delivery engine.' ) ); ?></p>
				<a href="<?php echo slingshot_lp_h_attr( slingshot_pm( 'svc_hero_cta_url', '/contact/' ) ); ?>" class="svc-hero-btn">
					<?php echo esc_html( slingshot_pm( 'svc_hero_cta_text', 'Book a call' ) ); ?> <span>&#8594;</span>
				</a>
			</div>

			<div class="svc-hero-photos">
				<?php
				$img_a = slingshot_pm_image( 'svc_hero_img_a', '' );
				$img_b = slingshot_pm_image( 'svc_hero_img_b', '' );
				$alt_a = esc_attr( slingshot_pm( 'svc_hero_img_a_alt', 'Slingshot team' ) );
				$alt_b = esc_attr( slingshot_pm( 'svc_hero_img_b_alt', 'Slingshot project' ) );
				if ( $img_a ) : ?>
				<div class="svc-hero-photo svc-hero-photo-a">
					<img src="<?php echo esc_url( $img_a ); ?>" alt="<?php echo $alt_a; ?>">
				</div>
				<?php endif; ?>
				<?php if ( $img_b ) : ?>
				<div class="svc-hero-photo svc-hero-photo-b">
					<img src="<?php echo esc_url( $img_b ); ?>" alt="<?php echo $alt_b; ?>">
				</div>
				<?php endif; ?>
				<?php if ( ! $img_a && ! $img_b ) : ?>
				<div class="svc-hero-photo svc-hero-photo-a">
					<img src="<?php echo esc_url( $img_dir ); ?>/hero-person-1.jpg" alt="Slingshot team">
				</div>
				<div class="svc-hero-photo svc-hero-photo-b">
					<img src="<?php echo esc_url( $img_dir ); ?>/hero-person-2.jpg" alt="Slingshot project">
				</div>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<!-- ── BUILT / FEATURES ─────────────────────────────────── -->
	<?php
	$built_items = slingshot_pm( 'svc_built_items', array() );
	$built_heading_line1 = slingshot_pm( 'svc_built_heading_1', 'Built to Scale.' );
	$built_heading_line2 = slingshot_pm( 'svc_built_heading_2', 'Designed to Win.' );
	$built_desc = slingshot_pm( 'svc_built_desc', 'Harnessing deep technical expertise, cross-functional teams, and product thinking to every engagement, so you get outcomes, not just output.' );
	if ( ! is_array( $built_items ) ) { $built_items = array(); }
	?>
	<section class="svc-built-section">
		<div class="svc-built-header">
			<h2 class="svc-built-heading">
				<?php echo esc_html( $built_heading_line1 ); ?><br>
				<?php echo esc_html( $built_heading_line2 ); ?>
			</h2>
			<p class="svc-built-desc"><?php echo esc_html( $built_desc ); ?></p>
		</div>
		<?php if ( ! empty( $built_items ) ) : ?>
		<div class="svc-built-grid">
			<?php foreach ( $built_items as $item ) : ?>
			<div class="svc-built-item">
				<?php if ( ! empty( $item['icon_svg'] ) ) : ?>
				<div class="svc-built-icon">
					<?php echo $item['icon_svg']; // phpcs:ignore WordPress.Security.EscapeOutput ?>
				</div>
				<?php endif; ?>
				<div class="svc-built-item-title"><?php echo esc_html( $item['title'] ?? '' ); ?></div>
				<?php if ( ! empty( $item['desc'] ) ) : ?>
				<p class="svc-built-item-desc"><?php echo esc_html( $item['desc'] ); ?></p>
				<?php endif; ?>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</section>

	<!-- ── WHAT WE BUILD / CARDS ────────────────────────────── -->
	<?php
	$cards_heading = slingshot_pm( 'svc_cards_heading', 'We Build High-Impact Digital Products' );
	$cards_eyebrow = slingshot_pm( 'svc_cards_eyebrow', '' );
	$cards_desc    = slingshot_pm( 'svc_cards_desc', '' );
	$cards_layout  = slingshot_pm( 'svc_cards_layout', 'grid' ); // 'grid' or 'alternating'
	$cards_items   = slingshot_pm( 'svc_cards_items', array() );
	if ( ! is_array( $cards_items ) ) { $cards_items = array(); }
	?>
	<?php if ( ! empty( $cards_items ) ) : ?>
	<section class="svc-cards-section">
		<div class="svc-cards-header">
			<?php if ( $cards_eyebrow ) : ?>
			<p class="svc-cards-eyebrow"><?php echo esc_html( $cards_eyebrow ); ?></p>
			<?php endif; ?>
			<h2 class="svc-cards-heading"><?php echo esc_html( $cards_heading ); ?></h2>
			<?php if ( $cards_desc ) : ?>
			<p class="svc-cards-desc"><?php echo esc_html( $cards_desc ); ?></p>
			<?php endif; ?>
		</div>

		<?php if ( 'alternating' === $cards_layout ) : ?>
		<div class="svc-cards-alt">
			<?php foreach ( $cards_items as $card ) :
				$card_img = ! empty( $card['image'] ) ? slingshot_lp_attachment_url( $card['image'], '', 'large' ) : '';
			?>
			<div class="svc-card-alt">
				<div class="svc-card-alt-img">
					<?php if ( $card_img ) : ?>
					<img src="<?php echo esc_url( $card_img ); ?>" alt="<?php echo esc_attr( $card['title'] ?? '' ); ?>" loading="lazy">
					<?php endif; ?>
				</div>
				<div class="svc-card-alt-body">
					<?php if ( ! empty( $card['tag'] ) ) : ?>
					<span class="svc-card-alt-tag"><?php echo esc_html( $card['tag'] ); ?></span>
					<?php endif; ?>
					<h3 class="svc-card-alt-title"><?php echo esc_html( $card['title'] ?? '' ); ?></h3>
					<?php if ( ! empty( $card['desc'] ) ) : ?>
					<p class="svc-card-alt-desc"><?php echo esc_html( $card['desc'] ); ?></p>
					<?php endif; ?>
					<?php if ( ! empty( $card['link_url'] ) ) : ?>
					<a href="<?php echo slingshot_lp_h_attr( $card['link_url'] ); ?>" class="svc-card-alt-link">Learn more &#8594;</a>
					<?php endif; ?>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php else : ?>
		<div class="svc-cards-grid">
			<?php foreach ( $cards_items as $card ) :
				$card_img = ! empty( $card['image'] ) ? slingshot_lp_attachment_url( $card['image'], '', 'large' ) : '';
			?>
			<div class="svc-card">
				<div class="svc-card-img">
					<?php if ( $card_img ) : ?>
					<img src="<?php echo esc_url( $card_img ); ?>" alt="<?php echo esc_attr( $card['title'] ?? '' ); ?>" loading="lazy">
					<?php endif; ?>
				</div>
				<div class="svc-card-body">
					<?php if ( ! empty( $card['tag'] ) ) : ?>
					<span class="svc-card-tag"><?php echo esc_html( $card['tag'] ); ?></span>
					<?php endif; ?>
					<h3 class="svc-card-title"><?php echo esc_html( $card['title'] ?? '' ); ?></h3>
					<?php if ( ! empty( $card['desc'] ) ) : ?>
					<p class="svc-card-desc"><?php echo esc_html( $card['desc'] ); ?></p>
					<?php endif; ?>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</section>
	<?php endif; ?>

	<!-- ── CASE STUDIES ─────────────────────────────────────── -->
	<?php
	$cases_heading   = slingshot_pm( 'svc_cases_heading', 'From Solution to Success Stories' );
	$cases_link_text = slingshot_pm( 'svc_cases_link_text', 'See All →' );
	$cases_link_url  = slingshot_pm( 'svc_cases_link_url', '/work/' );
	$cases_cards     = slingshot_pm( 'svc_cases_cards', array() );
	if ( ! is_array( $cases_cards ) ) { $cases_cards = array(); }
	?>
	<?php if ( ! empty( $cases_cards ) ) : ?>
	<section class="svc-cases-section">
		<div class="svc-cases-header">
			<h2 class="svc-cases-heading"><?php echo esc_html( $cases_heading ); ?></h2>
			<?php if ( $cases_link_url ) : ?>
			<a href="<?php echo slingshot_lp_h_attr( $cases_link_url ); ?>" class="svc-cases-link"><?php echo esc_html( $cases_link_text ); ?></a>
			<?php endif; ?>
		</div>
		<div class="svc-cases-scroll">
			<?php foreach ( $cases_cards as $cs ) :
				$cs_img = ! empty( $cs['image'] ) ? slingshot_lp_attachment_url( $cs['image'], '', 'large' ) : '';
				$cs_url = ! empty( $cs['link_url'] ) ? $cs['link_url'] : '#';
			?>
			<a href="<?php echo slingshot_lp_h_attr( $cs_url ); ?>" class="svc-case-card">
				<div class="svc-case-img">
					<?php if ( $cs_img ) : ?>
					<img src="<?php echo esc_url( $cs_img ); ?>" alt="<?php echo esc_attr( $cs['title'] ?? '' ); ?>" loading="lazy">
					<?php endif; ?>
				</div>
				<div class="svc-case-body">
					<?php if ( ! empty( $cs['client'] ) ) : ?>
					<span class="svc-case-client"><?php echo esc_html( $cs['client'] ); ?></span>
					<?php endif; ?>
					<div class="svc-case-title"><?php echo esc_html( $cs['title'] ?? '' ); ?></div>
					<span class="svc-case-arrow">&#8594;</span>
				</div>
			</a>
			<?php endforeach; ?>
		</div>
	</section>
	<?php endif; ?>

	<!-- ── SPOTLIGHT ───────────────────────────────────────── -->
	<?php if ( slingshot_pm( 'svc_spotlight_show', 0 ) ) :
		$sp_quote         = slingshot_pm( 'svc_spotlight_quote', '' );
		$sp_person_name   = slingshot_pm( 'svc_spotlight_person_name', '' );
		$sp_person_role   = slingshot_pm( 'svc_spotlight_person_role', '' );
		$sp_person_img    = slingshot_pm_image( 'svc_spotlight_person_img', '' );
		$sp_article_img   = slingshot_pm_image( 'svc_spotlight_article_img', '' );
		$sp_article_tag   = slingshot_pm( 'svc_spotlight_article_tag', '' );
		$sp_article_title = slingshot_pm( 'svc_spotlight_article_title', '' );
		$sp_article_desc  = slingshot_pm( 'svc_spotlight_article_desc', '' );
		$sp_article_url   = slingshot_pm( 'svc_spotlight_article_url', '#' );
	?>
	<div class="svc-spotlight-section">
		<!-- Left: dark testimonial card -->
		<div class="svc-spotlight-quote">
			<div class="svc-spotlight-quote-blob"></div>
			<div class="svc-spotlight-quote-body">
				<span class="svc-spotlight-quote-mark">&ldquo;</span>
				<?php if ( $sp_quote ) : ?>
				<p class="svc-spotlight-quote-text"><?php echo esc_html( $sp_quote ); ?></p>
				<?php endif; ?>
			</div>
			<?php if ( $sp_person_name || $sp_person_role ) : ?>
			<div class="svc-spotlight-person">
				<?php if ( $sp_person_img ) : ?>
				<div class="svc-spotlight-avatar">
					<img src="<?php echo esc_url( $sp_person_img ); ?>" alt="<?php echo esc_attr( $sp_person_name ); ?>">
				</div>
				<?php else : ?>
				<div class="svc-spotlight-avatar"></div>
				<?php endif; ?>
				<div>
					<?php if ( $sp_person_name ) : ?>
					<div class="svc-spotlight-person-name"><?php echo esc_html( $sp_person_name ); ?></div>
					<?php endif; ?>
					<?php if ( $sp_person_role ) : ?>
					<div class="svc-spotlight-person-role"><?php echo esc_html( $sp_person_role ); ?></div>
					<?php endif; ?>
				</div>
			</div>
			<?php endif; ?>
		</div>
		<!-- Right: white featured article card -->
		<a href="<?php echo slingshot_lp_h_attr( $sp_article_url ); ?>" class="svc-spotlight-article">
			<div class="svc-spotlight-article-img">
				<?php if ( $sp_article_img ) : ?>
				<img src="<?php echo esc_url( $sp_article_img ); ?>" alt="<?php echo esc_attr( $sp_article_title ); ?>" loading="lazy">
				<?php endif; ?>
			</div>
			<div class="svc-spotlight-article-body">
				<?php if ( $sp_article_tag ) : ?>
				<span class="svc-spotlight-article-eyebrow"><?php echo esc_html( $sp_article_tag ); ?></span>
				<?php endif; ?>
				<?php if ( $sp_article_title ) : ?>
				<h3 class="svc-spotlight-article-title"><?php echo esc_html( $sp_article_title ); ?></h3>
				<?php endif; ?>
				<?php if ( $sp_article_desc ) : ?>
				<p class="svc-spotlight-article-desc"><?php echo esc_html( $sp_article_desc ); ?></p>
				<?php endif; ?>
				<span class="svc-spotlight-article-link">Read article &#8594;</span>
			</div>
		</a>
	</div>
	<?php endif; ?>

	<!-- ── BLOG ─────────────────────────────────────────────── -->
	<section class="svc-blog-section">
		<div class="home-blog-inner">
			<div class="home-blog-header">
				<h2 class="home-blog-title">
					<?php echo nl2br( esc_html( slingshot_pm( 'svc_blog_title', "Insights That Move\nBusiness Forward" ) ) ); ?>
				</h2>
				<div class="home-blog-meta">
					<p class="home-blog-desc"><?php echo esc_html( slingshot_pm( 'svc_blog_desc', 'Actionable thinking on software strategy, AI adoption, and how high-performing teams build and scale.' ) ); ?></p>
					<a href="<?php echo slingshot_lp_h_attr( slingshot_pm( 'svc_blog_cta_url', '/blog/' ) ); ?>" class="home-section-link"><?php echo esc_html( slingshot_pm( 'svc_blog_cta_text', 'All Insights →' ) ); ?></a>
				</div>
			</div>
			<div class="home-blog-cards">
				<?php if ( $blog_q->have_posts() ) :
					while ( $blog_q->have_posts() ) : $blog_q->the_post(); ?>
					<a href="<?php the_permalink(); ?>" class="blog-card">
						<div class="blog-card-image">
							<?php if ( has_post_thumbnail() ) the_post_thumbnail( 'medium_large', array( 'loading' => 'lazy' ) ); ?>
						</div>
						<div class="blog-card-body">
							<div class="blog-card-tags">
								<?php foreach ( array_slice( get_the_category(), 0, 2 ) as $cat ) : ?>
								<span class="blog-card-tag"><?php echo esc_html( $cat->name ); ?></span>
								<?php endforeach; ?>
							</div>
							<h3 class="blog-card-title"><?php the_title(); ?></h3>
							<p class="blog-card-desc"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 20, '...' ) ); ?></p>
						</div>
					</a>
					<?php endwhile;
					wp_reset_postdata();
				else : ?>
					<a href="#" class="blog-card"><div class="blog-card-image"></div><div class="blog-card-body"><h3 class="blog-card-title">Coming soon</h3></div></a>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<!-- ── BOTTOM CTA ───────────────────────────────────────── -->
	<section class="svc-cta-section">
		<?php
		$mascot_path = get_stylesheet_directory() . '/img/cta-mascot.png';
		$mascot_url  = get_stylesheet_directory_uri() . '/img/cta-mascot.png';
		?>
		<div class="svc-cta-mascot">
			<?php if ( file_exists( $mascot_path ) ) : ?>
			<img src="<?php echo esc_url( $mascot_url ); ?>" alt="Slingshot mascot">
			<?php endif; ?>
		</div>
		<div class="svc-cta-card">
			<h2 class="svc-cta-title"><?php echo esc_html( slingshot_pm( 'svc_cta_title', "Let's Build What's Next" ) ); ?></h2>
			<p class="svc-cta-desc"><?php echo esc_html( slingshot_pm( 'svc_cta_desc', "Whether you need a smarter product, a faster team, or a modernized platform — Slingshot is the partner to help you move." ) ); ?></p>
			<a href="<?php echo slingshot_lp_h_attr( slingshot_pm( 'svc_cta_btn_url', '/contact/' ) ); ?>" class="svc-cta-btn">
				<?php echo esc_html( slingshot_pm( 'svc_cta_btn_text', 'Start the Conversation →' ) ); ?>
			</a>
		</div>
	</section>

</div><!-- .svc-page-wrapper -->

<?php get_footer(); ?>
