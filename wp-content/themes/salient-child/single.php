<?php
/**
 * New-look single blog post template.
 */

wp_enqueue_style( 'pages-figma-jakarta', 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap', array(), null );
wp_enqueue_style( 'home-style', get_stylesheet_directory_uri() . '/css/home.css', array(), '1.18' );
wp_enqueue_style( 'service-figma-style', get_stylesheet_directory_uri() . '/css/service-figma.css', array(), '1.6' );
wp_enqueue_style( 'pages-figma-style', get_stylesheet_directory_uri() . '/css/pages-figma.css', array(), '1.0' );
wp_enqueue_style( 'pages-figma-2-style', get_stylesheet_directory_uri() . '/css/pages-figma-2.css', array(), '1.7' );
wp_enqueue_script( 'hp-script', get_stylesheet_directory_uri() . '/js/home.js', array( 'jquery' ), '1.6', true );

if ( ! function_exists( 'slingshot_single_estimated_read_time' ) ) {
	/**
	 * Estimate read time when Yoast/meta does not provide one.
	 *
	 * @param string $content Raw post content.
	 * @return string
	 */
	function slingshot_single_estimated_read_time( $content ) {
		$word_count = str_word_count( wp_strip_all_tags( strip_shortcodes( (string) $content ) ) );
		$minutes    = max( 1, (int) ceil( $word_count / 220 ) );
		return sprintf( _n( '%s min read', '%s min read', $minutes, 'salient-child' ), number_format_i18n( $minutes ) );
	}
}

if ( ! function_exists( 'slingshot_single_author_avatar_url' ) ) {
	/**
	 * Prefer the locally managed WP User Avatar attachment when available.
	 *
	 * @param int $user_id Author user ID.
	 * @return string
	 */
	function slingshot_single_author_avatar_url( $user_id ) {
		$avatar_id = (int) get_user_meta( $user_id, 'wp_user_avatar', true );
		if ( $avatar_id ) {
			$avatar_url = wp_get_attachment_image_url( $avatar_id, 'thumbnail' );
			if ( $avatar_url ) {
				return $avatar_url;
			}
		}

		return get_avatar_url( $user_id, array( 'size' => 96 ) );
	}
}

if ( ! function_exists( 'slingshot_single_has_local_thumbnail' ) ) {
	/**
	 * Avoid printing broken related-post thumbnails when the DB references
	 * uploads that are not present in the local Docker volume.
	 *
	 * @param int $post_id Post ID.
	 * @return bool
	 */
	function slingshot_single_has_local_thumbnail( $post_id ) {
		$thumb_id = (int) get_post_thumbnail_id( $post_id );
		if ( ! $thumb_id ) {
			return false;
		}

		$file = get_attached_file( $thumb_id );
		if ( $file && file_exists( $file ) ) {
			return true;
		}

		$url = wp_get_attachment_image_url( $thumb_id, 'medium_large' );
		return $url && 0 !== strpos( $url, home_url( '/wp-content/uploads/' ) );
	}
}

if ( ! function_exists( 'slingshot_single_topic_filter_url' ) ) {
	/**
	 * Send topic chips back to the redesigned blog index with a matching filter.
	 *
	 * @param WP_Term $term Category or tag term.
	 * @return string
	 */
	function slingshot_single_topic_filter_url( $term ) {
		if ( ! $term instanceof WP_Term ) {
			return home_url( '/blog/' );
		}

		$arg = 'post_tag' === $term->taxonomy ? 'tag' : 'topic';
		return add_query_arg( $arg, strtolower( (string) $term->slug ), home_url( '/blog/' ) );
	}
}

get_header();

while ( have_posts() ) :
	the_post();

	$post_id       = get_the_ID();
	$author_id     = (int) get_post_field( 'post_author', $post_id );
	$author_name   = (string) slingshot_pm( 'ibl_author', get_the_author_meta( 'display_name', $author_id ) );
	$author_bio    = trim( (string) get_the_author_meta( 'description', $author_id ) );
	$author_avatar = slingshot_single_author_avatar_url( $author_id );
	$categories    = get_the_category( $post_id );
	$post_tags     = get_the_tags( $post_id );
	$post_tags     = is_array( $post_tags ) ? $post_tags : array();
	$topic_terms   = array_merge( $categories, $post_tags );
	$category_ids  = array_map( static function ( $cat ) {
		return (int) $cat->term_id;
	}, $categories );

	$label     = (string) slingshot_pm( 'ibl_label', 'INSIGHTS' );
	$title     = (string) slingshot_pm( 'ibl_title', get_the_title() );
	$date      = (string) slingshot_pm( 'ibl_date', get_the_date( 'F j, Y' ) );
	$read_time = (string) slingshot_pm( 'ibl_read_time', '' );
	if ( '' === $read_time ) {
		$yoast_minutes = (int) get_post_meta( $post_id, '_yoast_wpseo_estimated-reading-time-minutes', true );
		$read_time     = $yoast_minutes > 0 ? sprintf( _n( '%s min read', '%s min read', $yoast_minutes, 'salient-child' ), number_format_i18n( $yoast_minutes ) ) : slingshot_single_estimated_read_time( get_the_content( null, false, $post_id ) );
	}

	$hero_img = slingshot_pm_image( 'ibl_hero_img', '', 'full' );
	if ( ! $hero_img ) {
		$hero_img = (string) get_post_meta( $post_id, '_nectar_header_bg', true );
	}
	if ( ! $hero_img && has_post_thumbnail( $post_id ) ) {
		$hero_img = get_the_post_thumbnail_url( $post_id, 'full' );
	}

	$intro_bullets_raw = (string) slingshot_pm( 'ibl_intro_bullets', '' );
	$intro_bullets     = slingshot_lp_bullet_lines( $intro_bullets_raw );
	$subscribe_heading = (string) slingshot_pm( 'sl_subscribe_modal_heading', 'Get the latest news from Slingshot with our bi-weekly newsletter.' );
	$subscribe_desc    = (string) slingshot_pm( 'ibl_intro_subscribe_desc', 'Actionable software, AI, and product thinking from the Slingshot team.' );
	$subscribe_btn     = (string) slingshot_pm( 'sl_subscribe_modal_submit', 'Subscribe' );

	$cta_h = (string) slingshot_pm( 'ibl_cta_heading', 'Ready to Launch Something Bold?' );
	$cta_d = (string) slingshot_pm( 'ibl_cta_desc', "We partner with ambitious companies to design and build products people love. Let's talk." );
	$cta_t = (string) slingshot_pm( 'ibl_cta_btn_text', "Let's Talk" );
	$cta_u = (string) slingshot_pm( 'ibl_cta_btn_url', '/contact/' );

	$related_args = array(
		'post_type'           => 'post',
		'post_status'         => 'publish',
		'posts_per_page'      => 3,
		'post__not_in'        => array( $post_id ),
		'ignore_sticky_posts' => true,
	);
	if ( ! empty( $category_ids ) ) {
		$related_args['category__in'] = $category_ids;
	}
	$related_q = new WP_Query( $related_args );
	?>

	<?php slingshot_render_redesign_header( array( 'variant' => 'light' ) ); ?>

	<div class="sgl-page-wrapper">
		<section class="sgl-hero">
			<div class="sgl-hero-blob sgl-hero-blob-1"></div>
			<div class="sgl-hero-inner">
				<div class="sgl-hero-cats">
					<span class="sgl-hero-cat"><?php echo esc_html( $label ); ?></span>
					<?php foreach ( array_slice( $topic_terms, 0, 3 ) as $topic ) : ?>
						<a class="sgl-hero-cat" href="<?php echo esc_url( slingshot_single_topic_filter_url( $topic ) ); ?>"><?php echo esc_html( $topic->name ); ?></a>
					<?php endforeach; ?>
				</div>
				<h1 class="sgl-hero-title"><?php echo esc_html( $title ); ?></h1>
				<div class="sgl-hero-meta">
					<?php if ( $author_name ) : ?>
						<span class="sgl-hero-author">
							<?php if ( $author_avatar ) : ?>
								<span class="sgl-hero-avatar"><img src="<?php echo esc_url( $author_avatar ); ?>" alt="<?php echo esc_attr( $author_name ); ?>"></span>
							<?php endif; ?>
							<?php echo esc_html( $author_name ); ?>
						</span>
					<?php endif; ?>
					<?php if ( $date ) : ?><span><?php echo esc_html( $date ); ?></span><?php endif; ?>
					<?php if ( $read_time ) : ?><span><?php echo esc_html( $read_time ); ?></span><?php endif; ?>
				</div>
			</div>
		</section>

		<div class="sgl-body">
			<article class="sgl-content-wrap">
				<?php if ( $hero_img ) : ?>
					<div class="sgl-featured-img">
						<img src="<?php echo esc_url( $hero_img ); ?>" alt="<?php echo esc_attr( $title ); ?>" loading="eager">
					</div>
				<?php endif; ?>
				<div class="sgl-content">
					<?php if ( ! empty( $intro_bullets ) ) : ?>
						<div class="sgl-takeaways">
							<h2><?php esc_html_e( 'Key Takeaways', 'salient-child' ); ?></h2>
							<ul>
								<?php foreach ( $intro_bullets as $bullet ) : ?>
									<li><?php echo esc_html( $bullet ); ?></li>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php endif; ?>

					<?php the_content(); ?>
				</div>
			</article>

			<aside class="sgl-sidebar" aria-label="<?php esc_attr_e( 'Article sidebar', 'salient-child' ); ?>">
				<?php if ( $author_name ) : ?>
					<div class="sgl-sidebar-card sgl-author-card">
						<?php if ( $author_avatar ) : ?>
							<img class="sgl-author-avatar" src="<?php echo esc_url( $author_avatar ); ?>" alt="<?php echo esc_attr( $author_name ); ?>">
						<?php endif; ?>
						<h2 class="sgl-sidebar-heading"><?php esc_html_e( 'Written By', 'salient-child' ); ?></h2>
						<div class="sgl-author-name"><?php echo esc_html( $author_name ); ?></div>
						<?php if ( $author_bio ) : ?>
							<p class="sgl-author-bio"><?php echo esc_html( wp_trim_words( $author_bio, 38, '...' ) ); ?></p>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php if ( ! empty( $topic_terms ) ) : ?>
					<div class="sgl-sidebar-card">
						<h2 class="sgl-sidebar-heading"><?php esc_html_e( 'Topics', 'salient-child' ); ?></h2>
						<div class="sgl-topic-list">
							<?php foreach ( $topic_terms as $topic ) : ?>
								<a class="sgl-topic-link" href="<?php echo esc_url( slingshot_single_topic_filter_url( $topic ) ); ?>"><?php echo esc_html( $topic->name ); ?></a>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>

				<div class="sgl-newsletter">
					<div class="sgl-newsletter-blob"></div>
					<h2 class="sgl-newsletter-heading"><?php echo esc_html( $subscribe_heading ); ?></h2>
					<?php if ( $subscribe_desc ) : ?>
						<p class="sgl-newsletter-desc"><?php echo esc_html( $subscribe_desc ); ?></p>
					<?php endif; ?>
					<a class="sgl-newsletter-btn" href="#" data-sl-modal="subscribe"><?php echo esc_html( $subscribe_btn ); ?></a>
				</div>
			</aside>
		</div>

		<?php if ( $related_q->have_posts() ) : ?>
			<section class="sgl-related">
				<h2 class="sgl-related-heading"><?php esc_html_e( 'Keep Reading', 'salient-child' ); ?></h2>
				<div class="sgl-related-grid">
					<?php
					while ( $related_q->have_posts() ) :
						$related_q->the_post();
						$related_cats = get_the_category();
						?>
						<a href="<?php the_permalink(); ?>" class="blg-card">
							<div class="blg-card-img">
								<?php if ( slingshot_single_has_local_thumbnail( get_the_ID() ) ) : ?>
									<?php the_post_thumbnail( 'medium_large', array( 'loading' => 'lazy' ) ); ?>
								<?php endif; ?>
							</div>
							<div class="blg-card-body">
								<?php if ( $related_cats ) : ?>
									<div class="blg-card-tags">
										<?php foreach ( array_slice( $related_cats, 0, 2 ) as $related_cat ) : ?>
											<span class="blg-card-tag"><?php echo esc_html( $related_cat->name ); ?></span>
										<?php endforeach; ?>
									</div>
								<?php endif; ?>
								<h3 class="blg-card-title"><?php the_title(); ?></h3>
								<div class="blg-card-meta"><span><?php echo esc_html( get_the_date() ); ?></span></div>
								<p class="blg-card-excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 18, '...' ) ); ?></p>
							</div>
						</a>
					<?php endwhile; ?>
				</div>
			</section>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>

		<section class="fig-cta">
			<div class="fig-cta-blob"></div>
			<?php
			$mascot_path = get_stylesheet_directory() . '/img/cta-mascot.png';
			$mascot_url  = get_stylesheet_directory_uri() . '/img/cta-mascot.png';
			if ( file_exists( $mascot_path ) ) :
				?>
				<div class="fig-cta-mascot">
					<img src="<?php echo esc_url( $mascot_url ); ?>" alt="Slingshot">
				</div>
			<?php endif; ?>
			<div class="fig-cta-body">
				<h2 class="fig-cta-heading"><?php echo esc_html( $cta_h ); ?></h2>
				<p class="fig-cta-desc"><?php echo esc_html( $cta_d ); ?></p>
				<a href="<?php echo slingshot_lp_h_attr( $cta_u ); ?>" class="fig-cta-btn"><?php echo esc_html( $cta_t ); ?></a>
			</div>
		</section>
	</div>

	<?php
endwhile;

get_footer();
