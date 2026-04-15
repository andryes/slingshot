<?php
/**
 * Shared WPBakery / post_content layout shell (CSS, header chrome, the_content).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * True when the page stores WPBakery markup in post_content.
 *
 * @param int|null $post_id Page ID; defaults to current singular page.
 */
function slingshot_page_uses_wpbakery_output( $post_id = null ) {
	$post_id = $post_id ? (int) $post_id : get_queried_object_id();
	if ( ! $post_id ) {
		return false;
	}
	$post = get_post( $post_id );
	if ( ! $post || 'page' !== $post->post_type ) {
		return false;
	}
	return strpos( (string) $post->post_content, '[vc_' ) !== false;
}

/**
 * Explicit switch for using WPBakery shell on legacy redesign templates.
 *
 * Default is OFF to protect template-driven redesign pages from old VC content.
 * Enable per-page with custom field: slingshot_use_wpb_shell = 1
 *
 * @param int|null $post_id Page ID; defaults to current queried object.
 * @return bool
 */
function slingshot_use_wpb_shell_enabled( $post_id = null ) {
	$post_id = $post_id ? (int) $post_id : get_queried_object_id();
	if ( ! $post_id ) {
		return false;
	}

	$enabled = get_post_meta( $post_id, 'slingshot_use_wpb_shell', true );
	return ! empty( $enabled );
}

/**
 * Enqueue redesign assets for a given skin (same bundles as page-redesign-builder.php).
 *
 * @param string $skin Normalized skin slug.
 */
function slingshot_redesign_enqueue_for_skin( $skin ) {
	$skin      = slingshot_redesign_normalize_skin( $skin );
	$child_uri = get_stylesheet_directory_uri();

	wp_enqueue_style(
		'slingshot-redesign-jakarta',
		'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap',
		array(),
		null
	);
	wp_enqueue_style( 'slingshot-redesign-builder', $child_uri . '/css/redesign-builder.css', array(), '1.0' );
	wp_enqueue_script( 'hp-script', $child_uri . '/js/home.js', array( 'jquery' ), '1.6', true );
	wp_enqueue_style( 'home-style', $child_uri . '/css/home.css', array(), '1.18' );

	if ( 'consulting' === $skin ) {
		wp_enqueue_style( 'consulting-style', $child_uri . '/css/consulting.css', array( 'home-style' ), '1.0' );
		wp_enqueue_script( 'consulting-script', $child_uri . '/js/consulting.js', array( 'jquery' ), '1.1', true );
	}

	if ( 'bootcamp' === $skin ) {
		wp_enqueue_style( 'bootcamp-style', $child_uri . '/css/bootcamp.css', array( 'home-style' ), '1.0' );
		wp_enqueue_script( 'bootcamp-script', $child_uri . '/js/bootcamp.js', array( 'jquery' ), '1.0', true );
	}

	if ( 'ai' === $skin ) {
		wp_enqueue_style( 'ai-style', $child_uri . '/css/updated.css', array( 'home-style' ), '1.1' );
		wp_enqueue_script( 'ai-script', $child_uri . '/js/updated.js', array( 'jquery' ), '1.1', true );
	}

	if ( in_array( $skin, array( 'teams', 'teams-dedicated', 'teams-staffaug', 'teams-whitepaper' ), true ) ) {
		wp_enqueue_style( 'teams-style', $child_uri . '/css/teams.css', array( 'home-style' ), '1.0' );
		wp_enqueue_script( 'teams-script', $child_uri . '/js/teams.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_style( 'teams-figma-skin', $child_uri . '/css/teams-figma-skin.css', array( 'teams-style' ), '1.0' );
	}
}

/**
 * Inline CSS shared with page-redesign-builder.php.
 */
function slingshot_redesign_print_builder_layout_styles() {
	?>
<style id="sl-redesign-builder-inline" type="text/css">
	body{overflow:visible}.no-rgba #header-space{display:none;}@media only screen and (max-width:999px){body #header-space[data-header-mobile-fixed="1"]{display:none;}#header-outer[data-mobile-fixed="false"]{position:absolute;}}@media only screen and (min-width:1000px){#header-space{display:none;}.nectar-slider-wrap.first-section,.parallax_slider_outer.first-section,.full-width-content.first-section{margin-top:0!important;}body #page-header-bg,body #page-header-wrap{height:142px;}body #search-outer{z-index:100000;}}
	body.sl-redesign-builder-page #header-outer,
	body.sl-redesign-builder-page #header-space { display:none !important; }
</style>
	<?php
}

/**
 * Render working blog index for the redesign shell.
 *
 * @param int $post_id Page ID used for editable headings/meta.
 */
function slingshot_redesign_render_blog_index( $post_id ) {
	$paged = max( 1, (int) get_query_var( 'paged' ), (int) get_query_var( 'page' ) );
	$ppp   = (int) get_option( 'posts_per_page', 10 );
	if ( $ppp < 2 ) {
		$ppp = 10;
	}

	$active_topic = isset( $_GET['topic'] ) ? sanitize_title( wp_unslash( $_GET['topic'] ) ) : '';
	$active_search = isset( $_GET['s'] ) ? sanitize_text_field( wp_unslash( $_GET['s'] ) ) : '';

	$query = new WP_Query(
		array(
			'post_type'           => 'post',
			'post_status'         => 'publish',
			'posts_per_page'      => $ppp,
			'paged'               => $paged,
			'ignore_sticky_posts' => true,
			'orderby'             => 'date',
			'order'               => 'DESC',
			'category_name'       => $active_topic,
			's'                   => $active_search,
		)
	);

	$title = (string) get_post_meta( $post_id, 'sl_blog_heading', true );
	if ( $title === '' ) {
		$title = get_the_title( $post_id );
	}
	if ( $title === '' ) {
		$title = 'Blog';
	}

	$desc = (string) get_post_meta( $post_id, 'sl_blog_subheading', true );
	if ( $desc === '' ) {
		$desc = "We'd love to learn more about you and what we can design and build together.";
	}

	$hero_img_left  = '';
	$hero_img_right = '';
	$hero_posts = get_posts(
		array(
			'post_type'           => 'post',
			'post_status'         => 'publish',
			'posts_per_page'      => 3,
			'ignore_sticky_posts' => true,
			'orderby'             => 'date',
			'order'               => 'DESC',
		)
	);
	if ( ! empty( $hero_posts ) ) {
		$hero_img_left = get_the_post_thumbnail_url( (int) $hero_posts[0]->ID, 'large' );
	}
	if ( count( $hero_posts ) > 1 ) {
		$hero_img_right = get_the_post_thumbnail_url( (int) $hero_posts[1]->ID, 'large' );
	}

	$chip_terms = get_categories(
		array(
			'taxonomy'   => 'category',
			'hide_empty' => true,
			'number'     => 8,
			'orderby'    => 'count',
			'order'      => 'DESC',
		)
	);
	?>
	<section class="sl-blog-index">
		<div class="sl-blog-hero">
			<div class="sl-blog-hero__content">
				<h1 class="sl-blog-hero__title"><?php echo esc_html( $title ); ?></h1>
				<p class="sl-blog-hero__desc"><?php echo esc_html( $desc ); ?></p>
				<a href="<?php echo esc_url( home_url( '/subscribe/' ) ); ?>" class="sl-blog-hero__subscribe">Subscribe <span>&rarr;</span></a>
			</div>
			<div class="sl-blog-hero__images">
				<div class="sl-blog-hero__image sl-blog-hero__image--left">
					<?php if ( $hero_img_left ) : ?>
						<img src="<?php echo esc_url( $hero_img_left ); ?>" alt="" loading="lazy">
					<?php endif; ?>
				</div>
				<div class="sl-blog-hero__image sl-blog-hero__image--right">
					<?php if ( $hero_img_right ) : ?>
						<img src="<?php echo esc_url( $hero_img_right ); ?>" alt="" loading="lazy">
					<?php endif; ?>
				</div>
			</div>
		</div>

		<div class="sl-blog-filters">
			<a class="sl-blog-chip <?php echo $active_topic === '' ? 'is-active' : ''; ?>" href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">All</a>
			<?php foreach ( $chip_terms as $term ) : ?>
				<a
					class="sl-blog-chip <?php echo $active_topic === $term->slug ? 'is-active' : ''; ?>"
					href="<?php echo esc_url( add_query_arg( 'topic', $term->slug, home_url( '/blog/' ) ) ); ?>"
				><?php echo esc_html( $term->name ); ?></a>
			<?php endforeach; ?>
			<form class="sl-blog-search" method="get" action="<?php echo esc_url( home_url( '/blog/' ) ); ?>">
				<?php if ( $active_topic !== '' ) : ?>
					<input type="hidden" name="topic" value="<?php echo esc_attr( $active_topic ); ?>">
				<?php endif; ?>
				<input type="search" name="s" value="<?php echo esc_attr( $active_search ); ?>" placeholder="Search">
			</form>
		</div>

		<?php if ( $query->have_posts() ) : ?>
			<div class="sl-blog-grid">
				<?php $item_index = 0; ?>
				<?php while ( $query->have_posts() ) : ?>
					<?php
					$query->the_post();
					$item_index++;
					?>
					<article class="sl-blog-card">
						<a href="<?php the_permalink(); ?>" class="sl-blog-card__media">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'medium_large', array( 'loading' => 'lazy' ) ); ?>
							<?php else : ?>
								<span class="sl-blog-card__media-empty"></span>
							<?php endif; ?>
						</a>
						<div class="sl-blog-card__body">
							<div class="sl-blog-card__meta"><?php echo esc_html( get_the_date( 'F j, Y' ) ); ?></div>
							<h3 class="sl-blog-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p class="sl-blog-card__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 18, '...' ) ); ?></p>
						</div>
					</article>
				<?php endwhile; ?>
			</div>

			<?php
			$links = paginate_links(
				array(
					'total'     => max( 1, (int) $query->max_num_pages ),
					'current'   => $paged,
					'type'      => 'array',
					'prev_text' => '&larr;',
					'next_text' => '&rarr;',
				)
			);
			if ( ! empty( $links ) ) :
				?>
				<nav class="sl-blog-pagination" aria-label="Blog pagination">
					<?php foreach ( $links as $link ) : ?>
						<?php echo wp_kses_post( $link ); ?>
					<?php endforeach; ?>
				</nav>
			<?php endif; ?>
		<?php else : ?>
			<p class="sl-blog-empty">No posts yet.</p>
		<?php endif; ?>
	</section>
	<?php
	wp_reset_postdata();
}

/**
 * Redesign header + main column (WPBakery output).
 *
 * @param int $post_id Page ID for meta (header options).
 */
function slingshot_redesign_print_builder_chrome_and_content( $post_id ) {
	$hide_header = function_exists( 'rwmb_meta' ) ? rwmb_meta( 'slingshot_rb_hide_redesign_header', array(), $post_id ) : get_post_meta( $post_id, 'slingshot_rb_hide_redesign_header', true );
	$hide_header = ! empty( $hide_header );

	$header_variant = function_exists( 'rwmb_meta' ) ? (string) rwmb_meta( 'slingshot_rb_header_variant', array(), $post_id ) : (string) get_post_meta( $post_id, 'slingshot_rb_header_variant', true );
	if ( 'dark' !== $header_variant ) {
		$header_variant = 'light';
	}

	$cta_url = function_exists( 'rwmb_meta' ) ? (string) rwmb_meta( 'slingshot_rb_header_cta_url', array(), $post_id ) : (string) get_post_meta( $post_id, 'slingshot_rb_header_cta_url', true );
	if ( '' === $cta_url ) {
		$cta_url = '/contact';
	}
	$cta_text = function_exists( 'rwmb_meta' ) ? (string) rwmb_meta( 'slingshot_rb_header_cta_text', array(), $post_id ) : (string) get_post_meta( $post_id, 'slingshot_rb_header_cta_text', true );
	if ( '' === $cta_text ) {
		$cta_text = "Let's talk";
	}

	$cta_href = function_exists( 'slingshot_lp_h_attr' ) ? slingshot_lp_h_attr( $cta_url ) : esc_url( $cta_url );

	slingshot_redesign_print_builder_layout_styles();

	if ( ! $hide_header ) {
		slingshot_render_redesign_header(
			array(
				'variant'  => $header_variant,
				'cta_url'  => $cta_href,
				'cta_text' => $cta_text,
			)
		);
	}
	?>
<div class="sl-redesign-main">
	<?php
	if ( is_home() || is_page( 'blog' ) ) {
		slingshot_redesign_render_blog_index( $post_id );
		?>
	</div>
		<?php
		return;
	}

	$post_obj = $post_id ? get_post( $post_id ) : null;
	if ( $post_obj instanceof WP_Post ) {
		$raw_content = trim( (string) $post_obj->post_content );
		$looks_like_broken_wpb = (
			$raw_content !== '' &&
			strpos( $raw_content, 'vc_row' ) !== false &&
			strpos( $raw_content, '[vc_' ) === false
		);

		if ( $raw_content !== '' && ! $looks_like_broken_wpb ) {
			global $post;
			$prev_post = $post;
			$post      = $post_obj;
			setup_postdata( $post_obj );
			echo apply_filters( 'the_content', $post_obj->post_content ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			wp_reset_postdata();
			$post = $prev_post;
		} else {
			$mockup_url = (string) get_post_meta( $post_id, 'sl_figma_mockup_url', true );
			$mockup_url = slingshot_lp_h_attr( $mockup_url );
			if ( $mockup_url !== '' ) :
				?>
				<section class="sl-redesign-figma-fallback">
					<div class="sl-redesign-figma-fallback__inner">
						<img src="<?php echo esc_url( $mockup_url ); ?>" alt="<?php echo esc_attr( get_the_title( $post_id ) ); ?>" loading="lazy">
					</div>
				</section>
				<?php
			endif;
		}
	}
	?>
</div>
	<?php
}

/**
 * When a legacy PHP template page has WPBakery in the editor, render the redesign shell instead.
 *
 * @param string $skin Skin key matching "Redesign · Assets & header" options.
 * @return bool True if the shell was rendered (caller should return from template).
 */
function slingshot_redesign_maybe_output_shell_from_legacy( $skin ) {
	$post_id = get_queried_object_id();
	if ( ! $post_id || ! slingshot_use_wpb_shell_enabled( $post_id ) || ! slingshot_page_uses_wpbakery_output( $post_id ) ) {
		return false;
	}

	$skin = slingshot_redesign_normalize_skin( $skin );
	$GLOBALS['slingshot_redesign_forced_skin'] = $skin;
	$GLOBALS['slingshot_redesign_wpb_shell']   = true;

	slingshot_redesign_enqueue_for_skin( $skin );
	get_header();
	slingshot_redesign_print_builder_chrome_and_content( $post_id );
	get_footer();

	unset( $GLOBALS['slingshot_redesign_forced_skin'], $GLOBALS['slingshot_redesign_wpb_shell'] );
	return true;
}
