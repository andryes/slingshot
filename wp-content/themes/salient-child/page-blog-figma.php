<?php
/*
Template Name: Blog Figma
 * Content: Edit Page meta fields (Meta Box).
 */

wp_enqueue_style( 'pages-figma-jakarta', 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap', array(), null );
wp_enqueue_style( 'home-style',          get_stylesheet_directory_uri() . '/css/home.css',           array(), '1.18' );
wp_enqueue_style( 'service-figma-style', get_stylesheet_directory_uri() . '/css/service-figma.css',  array(), '1.6' );
wp_enqueue_style( 'pages-figma-style',   get_stylesheet_directory_uri() . '/css/pages-figma.css',    array(), '1.0' );
wp_enqueue_style( 'pages-figma-2-style', get_stylesheet_directory_uri() . '/css/pages-figma-2.css',  array(), '1.0' );
wp_enqueue_script( 'hp-script',          get_stylesheet_directory_uri() . '/js/home.js',              array( 'jquery' ), '1.6', true );

get_header();

$img_dir     = get_stylesheet_directory_uri() . '/img';
$mascot_path = get_stylesheet_directory() . '/img/cta-mascot.png';
$mascot_url  = $img_dir . '/cta-mascot.png';

$filter_raw  = slingshot_pm( 'blg_filter_tabs', "All\nAI\nProduct\nEngineering\nDesign\nBusiness" );
$filter_tabs = array_values( array_filter( array_map( 'trim', explode( "\n", $filter_raw ) ) ) );
$posts_per_page = max( 6, (int) slingshot_pm( 'blg_posts_per_page', 12 ) );

// Query all posts
$paged  = max( 1, get_query_var( 'paged' ) );
$blog_q = new WP_Query( array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => -1,
	'orderby'        => 'date',
	'order'          => 'DESC',
) );

if ( ! function_exists( 'slingshot_blg_filter_tokens' ) ) {
	function slingshot_blg_filter_tokens( $terms ) {
		$tokens = array();
		foreach ( (array) $terms as $term ) {
			if ( ! $term instanceof WP_Term ) {
				continue;
			}
			$name = strtolower( trim( $term->name ) );
			$slug = strtolower( trim( $term->slug ) );
			if ( $slug ) {
				$tokens[] = $slug;
			}
			if ( $name ) {
				$tokens[] = sanitize_title( $name );
				$words = preg_split( '/\\s+/', $name );
				if ( is_array( $words ) && count( $words ) > 1 ) {
					$initials = implode( '', array_map( static function ( $word ) {
						return substr( $word, 0, 1 );
					}, array_filter( $words ) ) );
					if ( $initials ) {
						$tokens[] = $initials;
					}
				}
			}
		}
		return implode( ' ', array_values( array_unique( array_filter( $tokens ) ) ) );
	}
}
?>
<style>
html { overflow-x:hidden !important; overflow-y:auto !important; height:auto !important; }
body.page-template-page-blog-figma,
body.page-template-page-blog-figma #ajax-content-wrap { overflow:visible !important; height:auto !important; min-height:100%; }
body.page-template-page-blog-figma #header-outer,
body.page-template-page-blog-figma #header-space { display:none !important; }
</style>

<?php slingshot_render_redesign_header( array( 'variant' => 'light' ) ); ?>

<div class="blg-page-wrapper">

	<!-- ── HERO ──────────────────────────────────────────── -->
	<section class="fig-hero">
		<div class="fig-hero-blob fig-hero-blob-1"></div>
		<div class="fig-hero-blob fig-hero-blob-2"></div>
		<div class="blg-hero-inner">
			<div class="blg-hero-content">
				<div class="blg-hero-label"><?php echo esc_html( slingshot_pm( 'blg_hero_label', 'INSIGHTS' ) ); ?></div>
				<h1 class="blg-hero-heading"><?php echo esc_html( slingshot_pm( 'blg_hero_heading', 'Daredevil Diaries' ) ); ?></h1>
				<p class="blg-hero-desc"><?php echo esc_html( slingshot_pm( 'blg_hero_desc', 'Actionable thinking on software strategy, AI adoption, and how high-performing teams build and scale.' ) ); ?></p>
				<?php $cta_url = slingshot_pm( 'blg_hero_cta_url', '' ); if ( $cta_url ) : ?>
				<a href="<?php echo slingshot_lp_h_attr( $cta_url ); ?>" class="blg-hero-btn">
					<?php echo esc_html( slingshot_pm( 'blg_hero_cta_text', 'Read More' ) ); ?> &rarr;
				</a>
				<?php endif; ?>
			</div>
			<?php
			$img_a = slingshot_pm_image( 'blg_hero_img_a', '' );
			$img_b = slingshot_pm_image( 'blg_hero_img_b', '' );
			if ( $img_a || $img_b ) :
			?>
			<div class="blg-hero-photos">
				<?php if ( $img_a ) : ?><div class="blg-hero-photo blg-hero-photo-a"><img src="<?php echo esc_url( $img_a ); ?>" alt="Blog hero"></div><?php endif; ?>
				<?php if ( $img_b ) : ?><div class="blg-hero-photo blg-hero-photo-b"><img src="<?php echo esc_url( $img_b ); ?>" alt="Blog hero"></div><?php endif; ?>
			</div>
			<?php endif; ?>
		</div>
	</section>

	<!-- ── FILTERS + POSTS ───────────────────────────────── -->
	<div class="blg-main">
		<?php if ( count( $filter_tabs ) > 1 ) : ?>
		<div class="blg-filters-bar" role="tablist">
			<?php foreach ( $filter_tabs as $i => $tab ) : ?>
			<button class="blg-filter-btn<?php echo 0 === $i ? ' is-active' : ''; ?>" data-filter="<?php echo esc_attr( strtolower( $tab ) ); ?>" role="tab" aria-selected="<?php echo 0 === $i ? 'true' : 'false'; ?>">
				<?php echo esc_html( $tab ); ?>
			</button>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>

		<div class="blg-grid" id="blgGrid">
			<?php
			$initial = (int) slingshot_pm( 'blg_initial_visible', 12 );
			$idx = 0;
			if ( $blog_q->have_posts() ) :
				while ( $blog_q->have_posts() ) :
					$blog_q->the_post();
					$cats     = get_the_category();
					$tags     = get_the_tags();
					$tags     = is_array( $tags ) ? $tags : array();
					$cat_str  = slingshot_blg_filter_tokens( array_merge( $cats, $tags ) );
					$hidden   = $idx >= $initial ? ' is-hidden' : '';
					?>
					<a href="<?php the_permalink(); ?>" class="blg-card<?php echo esc_attr( $hidden ); ?>" data-cats="<?php echo esc_attr( $cat_str ?: 'all' ); ?>">
						<div class="blg-card-img">
							<?php if ( has_post_thumbnail() ) the_post_thumbnail( 'medium_large', array( 'loading' => 'lazy' ) ); ?>
						</div>
						<div class="blg-card-body">
							<?php if ( $cats ) : ?>
							<div class="blg-card-tags">
								<?php foreach ( array_slice( $cats, 0, 2 ) as $cat ) : ?>
								<span class="blg-card-tag"><?php echo esc_html( $cat->name ); ?></span>
								<?php endforeach; ?>
							</div>
							<?php endif; ?>
							<h3 class="blg-card-title"><?php the_title(); ?></h3>
							<div class="blg-card-meta">
								<span><?php echo get_the_date(); ?></span>
							</div>
							<p class="blg-card-excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 18, '...' ) ); ?></p>
						</div>
					</a>
					<?php
					$idx++;
				endwhile;
				wp_reset_postdata();
			endif;
			?>
		</div>

		<?php if ( $blog_q->post_count > $initial ) : ?>
		<div class="blg-load-more-wrap">
			<button class="blg-load-more-btn" id="blgLoadMore">Load more &#8595;</button>
		</div>
		<?php endif; ?>
	</div>

	<!-- ── PODCAST SECTION ───────────────────────────────── -->
	<?php if ( slingshot_pm( 'blg_podcast_show', 1 ) ) :
		$pod_heading = slingshot_pm( 'blg_podcast_heading', "The Founders' Fable Podcast" );
		$pod_desc    = slingshot_pm( 'blg_podcast_desc', 'Real talk with founders and product leaders building the next generation of software companies.' );
		$pod_links   = slingshot_pm( 'blg_podcast_links', array() );
		$pod_img     = slingshot_pm_image( 'blg_podcast_img', '' );
		if ( ! is_array( $pod_links ) ) $pod_links = array();
	?>
	<div class="blg-podcast">
		<div class="blg-podcast-blob"></div>
		<div class="blg-podcast-content">
			<div class="blg-podcast-label">PODCAST</div>
			<h2 class="blg-podcast-heading"><?php echo esc_html( $pod_heading ); ?></h2>
			<p class="blg-podcast-desc"><?php echo esc_html( $pod_desc ); ?></p>
			<?php if ( $pod_links ) : ?>
			<div class="blg-podcast-links">
				<?php foreach ( $pod_links as $link ) : ?>
				<a href="<?php echo slingshot_lp_h_attr( $link['url'] ?? '#' ); ?>" class="blg-podcast-link" target="_blank" rel="noopener">
					<?php echo esc_html( $link['label'] ?? 'Listen' ); ?>
				</a>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
		</div>
		<?php if ( $pod_img ) : ?>
		<div class="blg-podcast-img"><img src="<?php echo esc_url( $pod_img ); ?>" alt="<?php echo esc_attr( $pod_heading ); ?>" loading="lazy"></div>
		<?php endif; ?>
	</div>
	<?php endif; ?>

	<!-- ── CTA ───────────────────────────────────────────── -->
	<section class="fig-cta">
		<div class="fig-cta-blob"></div>
		<div class="fig-cta-mascot"><?php if ( file_exists( $mascot_path ) ) : ?><img src="<?php echo esc_url( $mascot_url ); ?>" alt="Slingshot mascot"><?php endif; ?></div>
		<div class="fig-cta-body">
			<h2 class="fig-cta-heading"><?php echo esc_html( slingshot_pm( 'blg_cta_heading', 'Ready to Launch Something Bold?' ) ); ?></h2>
			<p class="fig-cta-desc"><?php echo esc_html( slingshot_pm( 'blg_cta_desc', "We partner with ambitious companies to design and build products people love. Let's talk." ) ); ?></p>
			<a href="<?php echo slingshot_lp_h_attr( slingshot_pm( 'blg_cta_btn_url', '/contact/' ) ); ?>" class="fig-cta-btn">
				<?php echo esc_html( slingshot_pm( 'blg_cta_btn_text', "Let's Talk" ) ); ?> &rarr;
			</a>
		</div>
	</section>

</div><!-- .blg-page-wrapper -->

<script>
(function(){
	var btns = document.querySelectorAll('.blg-filter-btn');
	var cards = document.querySelectorAll('.blg-card');
	var loadBtn = document.getElementById('blgLoadMore');
	var initial = <?php echo (int) slingshot_pm( 'blg_initial_visible', 12 ); ?>;

	function applyFilter(filter) {
		filter = (filter || 'all').toLowerCase();
		cards.forEach(function(card){
			var cats = (card.getAttribute('data-cats')||'').toLowerCase();
			var match = filter === 'all' || cats.split(' ').indexOf(filter) !== -1;
			card.classList.toggle('is-hidden', !match);
		});
		if (loadBtn) loadBtn.classList.add('is-hidden');
	}

	btns.forEach(function(btn){
		btn.addEventListener('click', function(){
			btns.forEach(function(b){ b.classList.remove('is-active'); b.setAttribute('aria-selected','false'); });
			btn.classList.add('is-active'); btn.setAttribute('aria-selected','true');
			applyFilter(btn.getAttribute('data-filter'));
		});
	});

	var params = new URLSearchParams(window.location.search);
	var requestedFilter = (params.get('filter') || params.get('topic') || params.get('tag') || '').toLowerCase();
	if (requestedFilter) {
		var matchedButton = Array.prototype.find.call(btns, function(btn){
			return (btn.getAttribute('data-filter') || '').toLowerCase() === requestedFilter;
		});
		if (matchedButton) {
			matchedButton.click();
		} else {
			btns.forEach(function(b){ b.classList.remove('is-active'); b.setAttribute('aria-selected','false'); });
			applyFilter(requestedFilter);
		}
	}

	if (loadBtn) {
		loadBtn.addEventListener('click', function(){
			var hidden = document.querySelectorAll('.blg-card.is-hidden');
			var count = 0;
			hidden.forEach(function(c){ if (count < initial){ c.classList.remove('is-hidden'); count++; } });
			if (!document.querySelectorAll('.blg-card.is-hidden').length) loadBtn.classList.add('is-hidden');
		});
	}
})();
</script>

<?php get_footer(); ?>
