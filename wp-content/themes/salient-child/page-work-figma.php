<?php
/*
Template Name: Work Figma
 * Content: Edit Page meta fields (Meta Box).
 */

wp_enqueue_style(
	'pages-figma-jakarta',
	'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap',
	array(), null
);
wp_enqueue_style( 'home-style',          get_stylesheet_directory_uri() . '/css/home.css',          array(), '1.18' );
wp_enqueue_style( 'service-figma-style', get_stylesheet_directory_uri() . '/css/service-figma.css', array(), '1.6' );
wp_enqueue_style( 'pages-figma-style',   get_stylesheet_directory_uri() . '/css/pages-figma.css',   array(), '1.0' );
wp_enqueue_script( 'hp-script',          get_stylesheet_directory_uri() . '/js/home.js',             array( 'jquery' ), '1.6', true );

get_header();

$img_dir = get_stylesheet_directory_uri() . '/img';
$mascot_path = get_stylesheet_directory() . '/img/cta-mascot.png';
$mascot_url  = $img_dir . '/cta-mascot.png';

// Meta
$projects = slingshot_pm( 'wrk_projects', array() );
if ( ! is_array( $projects ) ) { $projects = array(); }

$filter_raw  = slingshot_pm( 'wrk_filter_tabs', "All\nMobile\nWeb\nDesign\nAI" );
$filter_tabs = array_values( array_filter( array_map( 'trim', explode( "\n", $filter_raw ) ) ) );

// How many to show initially before "Load More"
$initial_visible = max( 6, (int) slingshot_pm( 'wrk_initial_visible', 9 ) );
?>
<style>
	body.page-template-page-work-figma #header-outer,
	body.page-template-page-work-figma #header-space { display:none !important; }
</style>

<?php slingshot_render_redesign_header( array( 'variant' => 'light' ) ); ?>

<div class="wrk-page-wrapper">

	<!-- ── HERO ──────────────────────────────────────────── -->
	<section class="wrk-hero">
		<div class="wrk-hero-blob wrk-hero-blob-1"></div>
		<div class="wrk-hero-blob wrk-hero-blob-2"></div>

		<div class="wrk-hero-inner">
			<div class="wrk-hero-content">
				<?php $eyebrow = slingshot_pm( 'wrk_hero_eyebrow', '' ); ?>
				<?php if ( $eyebrow ) : ?>
				<div class="wrk-hero-eyebrow"><?php echo esc_html( $eyebrow ); ?></div>
				<?php endif; ?>
				<h1 class="wrk-hero-heading"><?php echo esc_html( slingshot_pm( 'wrk_hero_heading', 'Explore Our Work' ) ); ?></h1>
				<?php $desc = slingshot_pm( 'wrk_hero_desc', 'From mobile apps to enterprise platforms — real products built for ambitious clients.' ); ?>
				<?php if ( $desc ) : ?><p class="wrk-hero-desc"><?php echo esc_html( $desc ); ?></p><?php endif; ?>
			</div>

			<?php
			$img_a = slingshot_pm_image( 'wrk_hero_img_a', '' );
			$img_b = slingshot_pm_image( 'wrk_hero_img_b', $img_dir . '/hero-person-2.jpg' );
			?>
			<div class="wrk-hero-photos">
				<?php if ( $img_a ) : ?>
				<div class="wrk-hero-photo wrk-hero-photo-a">
					<img src="<?php echo esc_url( $img_a ); ?>" alt="Slingshot work">
				</div>
				<?php endif; ?>
				<?php if ( $img_b ) : ?>
				<div class="wrk-hero-photo wrk-hero-photo-b">
					<img src="<?php echo esc_url( $img_b ); ?>" alt="Slingshot project">
				</div>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<!-- ── FILTERS + GRID ────────────────────────────────── -->
	<div class="wrk-main-section">

		<?php if ( count( $filter_tabs ) > 1 ) : ?>
		<div class="wrk-filters-bar" role="tablist" aria-label="Project filter">
			<?php foreach ( $filter_tabs as $i => $tab ) : ?>
			<button
				class="wrk-filter-btn<?php echo ( 0 === $i ) ? ' is-active' : ''; ?>"
				data-filter="<?php echo esc_attr( strtolower( $tab ) ); ?>"
				role="tab"
				aria-selected="<?php echo ( 0 === $i ) ? 'true' : 'false'; ?>"
			><?php echo esc_html( $tab ); ?></button>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>

		<?php if ( ! empty( $projects ) ) : ?>
		<div class="wrk-grid" id="wrkGrid">
			<?php foreach ( $projects as $idx => $proj ) :
				$proj_img  = ! empty( $proj['image'] ) ? slingshot_lp_attachment_url( $proj['image'], '', 'large' ) : '';
				$proj_title = $proj['title'] ?? 'Project';
				$proj_tags_raw = $proj['tags'] ?? '';
				$proj_cats_raw = $proj['categories'] ?? '';
				$proj_url  = ! empty( $proj['link_url'] ) ? $proj['link_url'] : '#';
				$tags      = array_filter( array_map( 'trim', explode( ',', $proj_tags_raw ) ) );
				// categories for filter: space-separated slugs
				$cats_arr  = array_filter( array_map( 'trim', explode( ',', $proj_cats_raw ) ) );
				$cats_str  = implode( ' ', array_map( 'strtolower', $cats_arr ) );
				$is_hidden = ( $idx >= $initial_visible ) ? ' is-hidden' : '';
			?>
			<a href="<?php echo slingshot_lp_h_attr( $proj_url ); ?>"
			   class="wrk-card<?php echo esc_attr( $is_hidden ); ?>"
			   data-cats="<?php echo esc_attr( $cats_str ?: 'all' ); ?>"
			   data-idx="<?php echo (int) $idx; ?>"
			>
				<div class="wrk-card-img">
					<?php if ( $proj_img ) : ?>
					<img src="<?php echo esc_url( $proj_img ); ?>" alt="<?php echo esc_attr( $proj_title ); ?>" loading="lazy">
					<?php endif; ?>
				</div>
				<div class="wrk-card-body">
					<?php if ( $tags ) : ?>
					<div class="wrk-card-tags">
						<?php foreach ( $tags as $tag ) : ?>
						<span class="wrk-card-tag"><?php echo esc_html( $tag ); ?></span>
						<?php endforeach; ?>
					</div>
					<?php endif; ?>
					<h3 class="wrk-card-title"><?php echo esc_html( $proj_title ); ?></h3>
					<?php if ( ! empty( $proj['subtitle'] ) ) : ?>
					<p class="wrk-card-subtitle"><?php echo esc_html( $proj['subtitle'] ); ?></p>
					<?php endif; ?>
				</div>
			</a>
			<?php endforeach; ?>
		</div>

		<?php if ( count( $projects ) > $initial_visible ) : ?>
		<div class="wrk-load-more-wrap">
			<button class="wrk-load-more-btn" id="wrkLoadMore">
				Load more &#8595;
			</button>
		</div>
		<?php endif; ?>

		<?php else : ?>
		<p style="text-align:center;color:#999;padding:60px 0;">No projects yet. Add them via Edit Page → Work · Projects.</p>
		<?php endif; ?>

	</div><!-- .wrk-main-section -->

	<!-- ── BOTTOM CTA ────────────────────────────────────── -->
	<section class="wrk-cta-section">
		<div class="wrk-cta-blob wrk-cta-blob-1"></div>
		<div class="wrk-cta-mascot">
			<?php if ( file_exists( $mascot_path ) ) : ?>
			<img src="<?php echo esc_url( $mascot_url ); ?>" alt="Slingshot mascot">
			<?php endif; ?>
		</div>
		<div class="wrk-cta-body">
			<h2 class="wrk-cta-heading"><?php echo esc_html( slingshot_pm( 'wrk_cta_heading', 'Ready to Launch Something Bold?' ) ); ?></h2>
			<?php $cta_desc = slingshot_pm( 'wrk_cta_desc', "We partner with ambitious companies to design and build products people love. Let's talk." ); ?>
			<?php if ( $cta_desc ) : ?>
			<p class="wrk-cta-desc"><?php echo esc_html( $cta_desc ); ?></p>
			<?php endif; ?>
			<a href="<?php echo slingshot_lp_h_attr( slingshot_pm( 'wrk_cta_btn_url', '/contact/' ) ); ?>" class="wrk-cta-btn">
				<?php echo esc_html( slingshot_pm( 'wrk_cta_btn_text', "Let's Talk" ) ); ?> &rarr;
			</a>
		</div>
	</section>

</div><!-- .wrk-page-wrapper -->

<script>
(function(){
	/* ── Filter tabs ───────────────────────────────────── */
	var btns   = document.querySelectorAll('.wrk-filter-btn');
	var cards  = document.querySelectorAll('.wrk-card');
	var loadBtn = document.getElementById('wrkLoadMore');
	var initial = <?php echo (int) $initial_visible; ?>;
	var currentFilter = 'all';

	function applyFilter( filter ) {
		currentFilter = filter;
		var visible = 0;
		cards.forEach(function(card){
			var cats = (card.getAttribute('data-cats') || '').toLowerCase();
			var match = (filter === 'all') || cats.split(' ').indexOf(filter) !== -1;
			if ( match ) {
				card.classList.remove('is-hidden');
				visible++;
			} else {
				card.classList.add('is-hidden');
			}
		});
		// update load-more visibility
		if ( loadBtn ) {
			loadBtn.classList.add('is-hidden');
		}
	}

	btns.forEach(function(btn){
		btn.addEventListener('click', function(){
			btns.forEach(function(b){ b.classList.remove('is-active'); b.setAttribute('aria-selected','false'); });
			btn.classList.add('is-active');
			btn.setAttribute('aria-selected','true');
			applyFilter( btn.getAttribute('data-filter') );
		});
	});

	/* ── Load More ─────────────────────────────────────── */
	if ( loadBtn ) {
		loadBtn.addEventListener('click', function(){
			var hidden = document.querySelectorAll('.wrk-card.is-hidden');
			var count  = 0;
			hidden.forEach(function(card){
				if ( count < initial ) {
					card.classList.remove('is-hidden');
					count++;
				}
			});
			// hide button if none left
			if ( document.querySelectorAll('.wrk-card.is-hidden').length === 0 ) {
				loadBtn.classList.add('is-hidden');
			}
		});
	}
})();
</script>

<?php get_footer(); ?>
