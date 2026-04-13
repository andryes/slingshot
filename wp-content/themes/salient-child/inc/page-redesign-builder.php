<?php
/**
 * "Redesign — WPBakery" page template: main layout from the page builder + shared redesign header.
 */

/**
 * @return bool
 */
function slingshot_is_redesign_builder_template( $post_id = null ) {
	if ( ! $post_id ) {
		$post_id = get_queried_object_id();
	}
	if ( ! $post_id ) {
		return false;
	}
	$slug = get_page_template_slug( $post_id );
	return $slug === 'page-redesign-builder.php';
}

/**
 * @param string $skin Raw skin slug.
 * @return string
 */
function slingshot_redesign_normalize_skin( $skin ) {
	$skin  = (string) $skin;
	$allowed = array(
		'home',
		'consulting',
		'bootcamp',
		'ai',
		'teams',
		'teams-dedicated',
		'teams-staffaug',
		'teams-whitepaper',
	);
	return in_array( $skin, $allowed, true ) ? $skin : 'home';
}

/**
 * @return string
 */
function slingshot_redesign_builder_skin( $post_id = null ) {
	if ( isset( $GLOBALS['slingshot_redesign_forced_skin'] ) && (string) $GLOBALS['slingshot_redesign_forced_skin'] !== '' ) {
		return slingshot_redesign_normalize_skin( (string) $GLOBALS['slingshot_redesign_forced_skin'] );
	}
	if ( ! $post_id ) {
		$post_id = get_queried_object_id();
	}
	$skin = '';
	if ( function_exists( 'rwmb_meta' ) ) {
		$skin = (string) rwmb_meta( 'slingshot_rb_skin', [], $post_id );
	}
	if ( $skin === '' ) {
		$skin = (string) get_post_meta( $post_id, 'slingshot_rb_skin', true );
	}
	return slingshot_redesign_normalize_skin( $skin );
}

/**
 * Front page uses front-page.php by default; swap when the static page is assigned this template.
 */
add_filter(
	'template_include',
	static function ( $template ) {
		if ( ! is_front_page() ) {
			return $template;
		}
		$pid = (int) get_option( 'page_on_front' );
		if ( ! $pid || get_page_template_slug( $pid ) !== 'page-redesign-builder.php' ) {
			return $template;
		}
		$t = locate_template( array( 'page-redesign-builder.php' ) );
		return $t ? $t : $template;
	},
	99
);

add_filter(
	'body_class',
	static function ( $classes ) {
		if ( slingshot_is_redesign_builder_template() || ! empty( $GLOBALS['slingshot_redesign_wpb_shell'] ) ) {
			$classes[] = 'sl-redesign-builder-page';
			$classes[] = 'sl-redesign-skin--' . sanitize_html_class( str_replace( '_', '-', slingshot_redesign_builder_skin() ) );
			return $classes;
		}

		$legacy_team_templates = array(
			'page-teams.php'            => 'teams',
			'page-teams-dedicated.php'  => 'teams-dedicated',
			'page-teams-staffaug.php'   => 'teams-staffaug',
			'page-teams-whitepaper.php' => 'teams-whitepaper',
		);
		foreach ( $legacy_team_templates as $file => $skin ) {
			if ( is_page_template( $file ) ) {
				$classes[] = 'sl-redesign-skin--' . sanitize_html_class( $skin );
				break;
			}
		}

		return $classes;
	}
);

add_filter(
	'rwmb_meta_boxes',
	static function ( $meta_boxes ) {
		$sp = array(
			'post_types' => array( 'page' ),
			'show'       => array( 'template' => array( 'page-redesign-builder.php' ) ),
		);

		$meta_boxes[] = $sp + array(
			'title'  => 'Redesign · Assets & header',
			'id'     => 'slingshot_rb_settings',
			'fields' => array(
				array(
					'id'      => 'slingshot_rb_skin',
					'name'    => 'Page style (CSS/JS bundle)',
					'type'    => 'select',
					'options' => array(
						'home'                 => 'Home',
						'consulting'           => 'Consulting',
						'bootcamp'             => 'Bootcamp',
						'ai'                   => 'Artificial Intelligence',
						'teams'                => 'Teams (hub)',
						'teams-dedicated'      => 'Teams — Dedicated',
						'teams-staffaug'       => 'Teams — Staff augmentation',
						'teams-whitepaper'     => 'Teams — Offshoring whitepaper',
					),
					'std'     => 'home',
				),
				array(
					'id'      => 'slingshot_rb_header_variant',
					'name'    => 'Header bar (redesign)',
					'type'    => 'select',
					'options' => array(
						'light' => 'Light (dark logo, for light hero backgrounds)',
						'dark'  => 'Dark (light logo)',
					),
					'std'     => 'light',
				),
				array(
					'id'   => 'slingshot_rb_header_cta_text',
					'name' => 'Header CTA label',
					'type' => 'text',
					'std'  => "Let's talk",
				),
				array(
					'id'   => 'slingshot_rb_header_cta_url',
					'name' => 'Header CTA URL',
					'type' => 'url',
					'std'  => '/contact',
				),
				array(
					'id'   => 'slingshot_rb_hide_redesign_header',
					'name' => 'Hide redesign header (if you add your own in WPBakery)',
					'type' => 'checkbox',
				),
			),
		);

		return $meta_boxes;
	}
);

/**
 * Recent posts block matching redesign blog cards (for WPBakery Raw HTML or shortcode).
 *
 * Attributes:
 * - posts (int)
 * - title (heading, use | for line break)
 * - desc
 * - cta_text, cta_url
 * - category (slug, optional)
 */
add_shortcode(
	'slingshot_insights',
	static function ( $atts ) {
		$a = shortcode_atts(
			array(
				'posts'    => '3',
				'title'    => "Insights That Move\nBusiness Forward",
				'desc'     => '',
				'cta_text' => 'All Insights →',
				'cta_url'  => '/blog',
				'category' => '',
			),
			$atts,
			'slingshot_insights'
		);

		$n = max( 1, min( 12, (int) $a['posts'] ) );
		$q = array(
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'posts_per_page' => $n,
			'orderby'        => 'date',
			'order'          => 'DESC',
		);
		if ( $a['category'] !== '' ) {
			$q['category_name'] = sanitize_title( $a['category'] );
		}

		$blog_query = new WP_Query( $q );

		$title_html = nl2br( esc_html( str_replace( '|', "\n", $a['title'] ) ) );
		$cta_raw    = $a['cta_url'];
		$cta_href   = function_exists( 'slingshot_lp_h_attr' ) ? slingshot_lp_h_attr( $cta_raw ) : esc_url( $cta_raw );

		ob_start();
		?>
		<section class="home-blog-section teams-blog-section">
			<div class="home-blog-inner">
				<div class="home-blog-header">
					<h2 class="home-blog-title"><?php echo wp_kses_post( $title_html ); ?></h2>
					<div class="home-blog-meta">
						<?php if ( $a['desc'] !== '' ) : ?>
							<p class="home-blog-desc"><?php echo esc_html( $a['desc'] ); ?></p>
						<?php endif; ?>
						<a href="<?php echo $cta_href; ?>" class="home-section-link"><?php echo esc_html( $a['cta_text'] ); ?></a>
					</div>
				</div>
				<div class="home-blog-carousel">
					<div class="home-blog-cards" id="blogTrack">
						<?php
						if ( $blog_query->have_posts() ) :
							while ( $blog_query->have_posts() ) :
								$blog_query->the_post();
								?>
							<a href="<?php the_permalink(); ?>" class="blog-card">
								<div class="blog-card-image">
									<?php
									if ( has_post_thumbnail() ) {
										the_post_thumbnail( 'medium_large', array( 'loading' => 'lazy' ) );
									}
									if ( get_post_format() === 'video' ) :
										?>
										<span class="blog-card-badge">VIDEO</span>
									<?php endif; ?>
								</div>
								<div class="blog-card-body">
									<div class="blog-card-tags">
										<?php
										$cats = get_the_category();
										if ( $cats ) {
											foreach ( array_slice( $cats, 0, 2 ) as $cat ) {
												echo '<span class="blog-card-tag">' . esc_html( $cat->name ) . '</span>';
											}
										}
										?>
									</div>
									<h3 class="blog-card-title"><?php the_title(); ?></h3>
									<p class="blog-card-desc"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 20, '...' ) ); ?></p>
								</div>
							</a>
								<?php
							endwhile;
							wp_reset_postdata();
						endif;
						?>
					</div>
					<div class="home-carousel-footer">
						<div class="home-carousel-progress"><span id="blogProgress"></span></div>
						<div class="home-work-nav">
							<button class="carousel-nav-btn" type="button" id="blogPrev" aria-label="Previous">
								<svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M11 4L6 9L11 14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
							</button>
							<button class="carousel-nav-btn" type="button" id="blogNext" aria-label="Next">
								<svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M7 4L12 9L7 14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
							</button>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php
		return ob_get_clean();
	}
);
