<?php
/*
 * Home Page – custom template (front-page.php)
 * Content is managed from the WordPress post editor for page ID 2.
 */

wp_enqueue_style(
	'hp-jakarta',
	'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap',
	array(), null
);
wp_enqueue_style(
	'hp-style',
	get_stylesheet_directory_uri() . '/css/home.css',
	array(), '1.26'
);
wp_enqueue_script(
	'hp-script',
	get_stylesheet_directory_uri() . '/js/home.js',
	array('jquery'), '1.7', true
);

get_header();

/* ── Helpers ─────────────────────────────────────── */

/**
 * Read a single field from the Home Page post meta.
 *
 * @param string $field    Field ID.
 * @param mixed  $default  Returned when the field is empty or Meta Box isn't active.
 * @return mixed
 */
function hp_setting( $field, $default = '' ) {
	return slingshot_pm( $field, $default );
}

/**
 * Return the URL of a single_image field stored in the Home Page post meta.
 *
 * @param string $field    Field ID.
 * @param string $default  Fallback URL.
 * @param string $size     Image size slug.
 * @return string
 */
function hp_image_url( $field, $default = '', $size = 'large' ) {
	return slingshot_pm_image( $field, $default, $size );
}

/**
 * Meta Box clone fields can save one empty row after the editor is opened.
 * Keep rows that contain meaningful content and let the template fall back otherwise.
 *
 * @param mixed $rows Cloned rows value.
 * @return array<int,array<string,mixed>>
 */
function hp_clean_rows( $rows ) {
	if ( ! is_array( $rows ) ) {
		return [];
	}

	return array_values( array_filter( $rows, function( $row ) {
		if ( ! is_array( $row ) ) {
			return false;
		}
		foreach ( $row as $value ) {
			if ( is_array( $value ) ) {
				if ( ! empty( array_filter( $value ) ) ) {
					return true;
				}
				continue;
			}
			if ( '' !== trim( (string) $value ) && '0' !== (string) $value ) {
				return true;
			}
		}
		return false;
	} ) );
}

/**
 * Normalize a Meta Box post field into a list of integer IDs.
 *
 * @param string $field Field ID.
 * @return array<int>
 */
function hp_post_ids_setting( $field ) {
	$value = hp_setting( $field, [] );
	if ( empty( $value ) ) {
		return [];
	}
	if ( ! is_array( $value ) ) {
		$value = [ $value ];
	}
	return array_values( array_filter( array_map( 'absint', $value ) ) );
}

/**
 * Restrict free-form logos markup to the tags needed for the strip.
 *
 * @return array<string,array<string,bool>>
 */
function hp_allowed_logos_html() {
	return [
		'span' => [
			'class'       => true,
			'style'       => true,
			'aria-label'  => true,
			'aria-hidden' => true,
			'role'        => true,
		],
		'img'  => [
			'src'           => true,
			'alt'           => true,
			'class'         => true,
			'width'         => true,
			'height'        => true,
			'loading'       => true,
			'decoding'      => true,
			'srcset'        => true,
			'sizes'         => true,
			'style'         => true,
			'fetchpriority' => true,
		],
		'a'    => [
			'href'        => true,
			'class'       => true,
			'style'       => true,
			'aria-label'  => true,
			'target'      => true,
			'rel'         => true,
		],
	];
}

/**
 * Homepage-specific white client logos matched to the Figma hero strip.
 *
 * @param string $name Client display name from the editable logo rows.
 * @return string
 */
function hp_client_logo_url( $name ) {
	$logos = [
		'connected caregiver'       => '/wp-content/uploads/2024/06/White-Logos_CCG.png',
		'churchill downs'           => '/wp-content/uploads/2024/06/white-logo-v2_Churchill-Downs.png',
		'healthrev'                 => '/wp-content/uploads/2024/06/white-logo-v2_HealthRev.png',
		'healthrey'                 => '/wp-content/uploads/2024/06/white-logo-v2_HealthRev.png',
		'paysign'                   => '/wp-content/uploads/2024/06/White-Logos_Paysign.png',
		'projectteam'               => '/wp-content/uploads/2024/06/White-Logos_Project-Team.png',
		'project team'              => '/wp-content/uploads/2024/06/White-Logos_Project-Team.png',
		'schneider electric'        => '/wp-content/uploads/2024/06/White-Logos_Schenedier-Electric.png',
		'zoeller'                   => '/wp-content/uploads/2024/06/zoeller-just-pump-company-white.png',
		'zoeller group'             => '/wp-content/uploads/2024/06/zoeller-just-pump-company-white.png',
		'univ. of louisville'       => '/wp-content/uploads/2022/09/uofl.svg',
		'university of louisville'  => '/wp-content/uploads/2022/09/uofl.svg',
	];
	$key   = strtolower( trim( wp_strip_all_tags( $name ) ) );
	return $logos[ $key ] ?? slingshot_client_logo_url( $name );
}

/**
 * Render the editable client logo strip once so it can be duplicated into a
 * seamless marquee without changing the admin data model.
 *
 * @param string $logos_html Optional free-form logos markup.
 * @param array<int,array<string,mixed>> $logos Meta Box logo rows.
 * @return string
 */
function hp_logo_items_html( $logos_html, $logos ) {
	if ( $logos_html ) {
		return wp_kses( $logos_html, hp_allowed_logos_html() );
	}

	ob_start();
	foreach ( $logos as $logo ) {
		$logo_text   = (string) ( $logo['text'] ?? '' );
		$logo_img_id = ! empty( $logo['image'] ) ? (int) $logo['image'] : 0;
		$logo_img_url = $logo_img_id ? wp_get_attachment_image_url( $logo_img_id, 'full' ) : '';
		if ( ! $logo_img_url ) {
			$logo_img_url = hp_client_logo_url( $logo_text );
		}
		$logo_class = $logo_text ? sanitize_html_class( sanitize_title( $logo_text ) ) : 'client-logo';
		?>
		<span class="logo-item home-logo--<?php echo esc_attr( $logo_class ); ?>">
			<?php if ( $logo_img_url ) : ?>
				<img src="<?php echo esc_url( $logo_img_url ); ?>" alt="<?php echo esc_attr( $logo_text ? $logo_text : 'Client logo' ); ?>" loading="lazy">
			<?php else : ?>
				<?php echo esc_html( $logo_text ); ?>
			<?php endif; ?>
		</span>
		<?php
	}
	return (string) ob_get_clean();
}

/**
 * Get visible topic chips for a blog card from real WordPress tags first.
 * Categories remain only as a fallback for older posts that have not been
 * tagged yet.
 *
 * @param int $post_id Post ID.
 * @return array<int,string>
 */
function hp_blog_card_tag_labels( $post_id ) {
	$labels = array();
	$terms  = get_the_tags( $post_id );

	if ( is_array( $terms ) && ! empty( $terms ) ) {
		foreach ( $terms as $term ) {
			if ( $term instanceof WP_Term ) {
				$labels[] = $term->name;
			}
		}
	} else {
		$cats = get_the_category( $post_id );
		if ( is_array( $cats ) && ! empty( $cats ) ) {
			foreach ( array_slice( $cats, 0, 3 ) as $cat ) {
				$labels[] = $cat->name;
			}
		}
	}

	$labels = array_values( array_unique( array_filter( array_map( 'trim', $labels ) ) ) );
	$preferred_order = array(
		'ai'      => 0,
		'product' => 1,
		'mobile'  => 2,
	);
	usort(
		$labels,
		static function ( $a, $b ) use ( $preferred_order ) {
			$a_key = sanitize_title( $a );
			$b_key = sanitize_title( $b );
			$a_pos = $preferred_order[ $a_key ] ?? 100;
			$b_pos = $preferred_order[ $b_key ] ?? 100;
			if ( $a_pos === $b_pos ) {
				return strcasecmp( $a, $b );
			}
			return $a_pos <=> $b_pos;
		}
	);

	return array_slice( $labels, 0, 3 );
}

/**
 * Resolve ordered post IDs by slug for stable design-friendly defaults.
 *
 * @param string        $post_type Post type.
 * @param array<string> $slugs     Post slugs.
 * @return array<int>
 */
function hp_ids_by_slugs( $post_type, $slugs ) {
	$posts = get_posts( [
		'post_type'      => $post_type,
		'post_status'    => 'publish',
		'posts_per_page' => count( $slugs ),
		'post_name__in'  => $slugs,
		'orderby'        => 'post_name__in',
		'fields'         => 'ids',
	] );

	return array_values( array_map( 'absint', $posts ) );
}

/**
 * Fill a hand-picked list with recent published posts from the same CPT.
 *
 * @param string $post_type Post type.
 * @param array<int> $ids Preferred IDs.
 * @param int $limit Number of IDs to return.
 * @return array<int>
 */
function hp_fill_post_ids( $post_type, $ids, $limit = 6 ) {
	$ids = array_values( array_unique( array_filter( array_map( 'absint', (array) $ids ) ) ) );
	if ( count( $ids ) >= $limit ) {
		return array_slice( $ids, 0, $limit );
	}

	$more = get_posts( [
		'post_type'      => $post_type,
		'post_status'    => 'publish',
		'posts_per_page' => $limit - count( $ids ),
		'post__not_in'   => $ids,
		'orderby'        => 'date',
		'order'          => 'DESC',
		'fields'         => 'ids',
	] );

	return array_slice( array_merge( $ids, array_map( 'absint', $more ) ), 0, $limit );
}

/**
 * Return the best image URL for a portfolio card.
 *
 * @param int $post_id Portfolio post ID.
 * @return string
 */
function hp_portfolio_image_url( $post_id ) {
	$image_id = absint( get_post_meta( $post_id, '_nectar_portfolio_custom_thumbnail', true ) );
	if ( ! $image_id ) {
		$image_id = absint( get_post_thumbnail_id( $post_id ) );
	}
	if ( ! $image_id ) {
		$image_id = absint( get_post_meta( $post_id, 'portfolio_image', true ) );
	}
	return $image_id ? wp_get_attachment_image_url( $image_id, 'medium_large' ) : '';
}

/**
 * Return a clean portfolio card excerpt.
 *
 * @param int $post_id Portfolio post ID.
 * @return string
 */
function hp_portfolio_excerpt( $post_id ) {
	$excerpt = trim( (string) get_post_meta( $post_id, '_nectar_project_excerpt', true ) );
	if ( ! $excerpt ) {
		$excerpt = get_the_excerpt( $post_id );
	}
	if ( ! trim( wp_strip_all_tags( $excerpt ) ) ) {
		$excerpt = 'Developed a mobile app that simplifies insurance, enabling easy claims and reducing paperwork.';
	}
	return wp_trim_words( wp_strip_all_tags( $excerpt ), 18, '...' );
}

/**
 * Return the Event Calendar date/location line used on home cards.
 *
 * @param int $post_id Event post ID.
 * @return string
 */
function hp_event_date_location( $post_id ) {
	$start = get_post_meta( $post_id, '_EventStartDate', true );
	$line  = $start ? wp_date( 'F j, Y', strtotime( $start ) ) : get_the_date( 'F j, Y', $post_id );

	$venue_id = absint( get_post_meta( $post_id, '_EventVenueID', true ) );
	$parts    = [];
	if ( $venue_id ) {
		$city  = trim( (string) get_post_meta( $venue_id, '_VenueCity', true ) );
		$state = trim( (string) get_post_meta( $venue_id, '_VenueState', true ) );
		if ( $city ) {
			$parts[] = $city;
		}
		if ( $state ) {
			$parts[] = $state;
		}
	}

	return $parts ? $line . ' · ' . implode( ', ', $parts ) : $line;
}

/**
 * Return the first event category name or a design-friendly default.
 *
 * @param int $post_id Event post ID.
 * @return string
 */
function hp_event_tag( $post_id ) {
	$terms = get_the_terms( $post_id, 'tribe_events_cat' );
	if ( $terms && ! is_wp_error( $terms ) ) {
		return $terms[0]->name;
	}
	return 'Conference';
}

$img_dir = get_stylesheet_directory_uri() . '/img';

/* ── Settings values ─────────────────────────────── */

// Header
$header_logo = hp_image_url( 'home_header_logo', '' );
$header_logo_alt = hp_setting( 'home_header_logo_alt', 'Slingshot' );
$header_cta_text = hp_setting( 'home_header_cta_text', "Let's talk" );
$header_cta_url  = hp_setting( 'home_header_cta_url', '/contact' );
$header_mobile_menu_label = hp_setting( 'home_header_mobile_menu_label', 'Menu' );
$home_logo_url = $header_logo;
if ( ! $home_logo_url && function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
	$logo_id = get_theme_mod( 'custom_logo' );
	$home_logo_url = $logo_id ? wp_get_attachment_image_url( $logo_id, 'full' ) : '';
}
if ( ! $home_logo_url ) {
	$home_logo_url = '/wp-content/uploads/2020/05/logo-light1x.png';
}
$home_menu_location = has_nav_menu( 'top_nav' ) ? 'top_nav' : ( has_nav_menu( 'main-menu' ) ? 'main-menu' : '' );

// Hero
$hero_title      = hp_setting( 'home_hero_title',     'For Big Kids &amp; Daredevils' );
if ( 'For Big Kids & Daredevils' === wp_strip_all_tags( html_entity_decode( (string) $hero_title ) ) ) {
	$hero_title = 'For Big Kids<br>&amp; Daredevils';
}
$hero_subtitle   = hp_setting( 'home_hero_subtitle',  'A Tech Consultancy &amp; Creation Studio' );
$hero_cta_text   = hp_setting( 'home_hero_cta_text',  'Book a call' );
$hero_cta_url    = hp_setting( 'home_hero_cta_url',   '/contact' );
$hero_card_img   = hp_image_url( 'home_hero_card_image', '' );
if ( ! $hero_card_img ) {
	$hero_card_img = $img_dir . '/ai-insight-david.png';
}
$hero_card_text  = hp_setting( 'home_hero_card_text', '20 Years of Software &amp; Tech Expertise, at Your Service' );
$hero_video_url  = (string) hp_setting( 'sl_video_modal_url', '/wp-content/uploads/2019/12/Slingshot-1.mp4' );
if ( '' === trim( $hero_video_url ) ) {
	$hero_video_url = '/wp-content/uploads/2019/12/Slingshot-1.mp4';
}

// Logos
$logos_html = trim( (string) hp_setting( 'home_logos_html', '' ) );
$logos_raw = hp_setting( 'home_logos', [] );
$logos     = hp_clean_rows( $logos_raw );
if ( empty( $logos ) ) {
	$logos = array_map( fn( $t ) => [ 'text' => $t ], [
		'Connected Caregiver', 'Churchill Downs', 'HealthRev', 'Paysign',
		'ProjectTeam', 'Schneider Electric', 'Zoeller', 'Univ. of Louisville',
	] );
}
$logos_items_html = hp_logo_items_html( $logos_html, $logos );

// Services
$services_label    = hp_setting( 'home_services_label',    'What We Do' );
$services_title    = hp_setting( 'home_services_title',    'We help companies move faster, think bigger, and build smarter with modern solutions that drive real business momentum.' );
if ( 'We help companies move faster, think bigger, and build smarter with modern solutions that drive real business momentum.' === wp_strip_all_tags( html_entity_decode( (string) $services_title ) ) ) {
	$services_title = 'We help companies <br>move faster, think bigger, <br>and build smarter with <br>modern solutions that drive <br>real business momentum.';
}
$services_cta_text = hp_setting( 'home_services_cta_text', 'Our Services' );
$services_cta_url  = hp_setting( 'home_services_cta_url',  '/services' );
$services_raw      = hp_setting( 'home_services', [] );
$services          = hp_clean_rows( $services_raw );
// Strip rows without a title (auto-created when admin opens but doesn't save real data).
$services          = array_values( array_filter( $services, fn( $c ) => ! empty( $c['title'] ) ) );

// Default fallback service cards (used when no data saved yet)
$default_services = [
	[
		'title' => 'Consulting',
		'desc'  => 'Cut through complexity and turn insight into impact—fast.',
		'url'   => '/consulting',
		'style' => 'featured',
		'icon_svg' => '<svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="15" cy="15" r="5" stroke="#4B23B0" stroke-width="2"/><circle cx="25" cy="15" r="5" stroke="#4B23B0" stroke-width="2"/><path d="M8 32c0-5 4-9 9-9h6c5 0 9 4 9 9" stroke="#4B23B0" stroke-width="2" stroke-linecap="round"/></svg>',
	],
	[
		'title' => 'Artificial<br>Intelligence',
		'desc'  => 'Embed intelligence into your products and workflows before your competitors do.',
		'url'   => '/ai',
		'style' => 'dark',
		'icon_svg' => '<svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M21 7l2.1 6.1L29 15.2l-5.9 2.1L21 24l-2.1-6.7L13 15.2l5.9-2.1L21 7z" stroke="rgba(255,255,255,.9)" stroke-width="2" stroke-linejoin="round"/><path d="M12 23l1.2 3.4L16.5 28l-3.3 1.2L12 33l-1.2-3.8L7.5 28l3.3-1.6L12 23z" stroke="rgba(255,255,255,.9)" stroke-width="2" stroke-linejoin="round"/></svg>',
	],
	[
		'title' => 'Teams',
		'desc'  => 'Senior engineers and product leaders embedded in your team—no ramp-up, just results.',
		'url'   => '/teams',
		'style' => 'dark',
		'icon_svg' => '<svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="15" cy="13" r="5" stroke="rgba(255,255,255,.85)" stroke-width="2"/><circle cx="27" cy="13" r="5" stroke="rgba(255,255,255,.85)" stroke-width="2"/><path d="M6 33c0-5.523 4.477-10 10-10h8c5.523 0 10 4.477 10 10" stroke="rgba(255,255,255,.85)" stroke-width="2" stroke-linecap="round"/></svg>',
	],
	[
		'title' => 'Product',
		'desc'  => 'From zero to launch—strategy, design, and engineering for founders who move fast.',
		'url'   => '/product',
		'style' => 'dark',
		'icon_svg' => '<svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="8" y="9" width="24" height="18" rx="3" stroke="rgba(255,255,255,.85)" stroke-width="2"/><path d="M16 31h8M20 27v4" stroke="rgba(255,255,255,.85)" stroke-width="2" stroke-linecap="round"/></svg>',
	],
];
if ( empty( $services ) ) {
	$services = $default_services;
}

// About
$about_img      = hp_image_url( 'home_about_image',    $img_dir . '/bg-first-block.png' );
$about_title    = hp_setting( 'home_about_title',    'Built for Real-World Delivery' );
$about_desc     = hp_setting( 'home_about_desc',     'Slingshot was built by a collective of strategists, creatives, and data scientists who care deeply about outcomes.' );
$about_btn_text = hp_setting( 'home_about_btn_text', 'Get in Touch' );
$about_btn_url  = hp_setting( 'home_about_btn_url',  '/contact' );
$about_tagline  = hp_setting( 'home_about_tagline',  'Slingshot helps organizations launch smarter products, modernize systems, and solve real-world challenges faster.' );

// Stats
$stats_raw = hp_setting( 'home_stats', [] );
$stats     = hp_clean_rows( $stats_raw );
if ( empty( $stats ) ) {
	$stats = [
		[ 'number' => '15+',  'label' => 'Industries served' ],
		[ 'number' => '250+', 'label' => 'Successful projects' ],
		[ 'number' => '20',   'label' => 'Years in business' ],
		[ 'number' => '40+',  'label' => 'Industry awards' ],
	];
}

// Events
$events_title   = hp_setting( 'home_events_title',   'Join the Conversation' );
$events_desc    = hp_setting( 'home_events_desc',    "We don't just build, we share. Explore upcoming events for leaders building in AI, product, and tech strategy." );
$events_cta_text = hp_setting( 'home_events_cta_text', 'All Events' );
$events_cta_url = hp_setting( 'home_events_cta_url', '/events' );
$events_register_text = hp_setting( 'home_events_register_text', 'Register' );
$events_raw     = hp_setting( 'home_events', [] );
$events         = hp_clean_rows( $events_raw );
$events_fallback_raw = hp_setting( 'home_events_fallback', [] );
$events_fallback     = hp_clean_rows( $events_fallback_raw );
if ( empty( $events_fallback ) ) {
	$events_fallback = [
		[
			'image_url'      => $img_dir . '/ai-experience-louisville.png',
			'tag'            => 'Conference',
			'title'          => 'Louisville IA Exchange and TechFest',
			'date_location'  => 'October 21, 2025 · Louisville, KY',
			'url'            => '#',
		],
		[
			'image_url'      => $img_dir . '/ai-experience-bootcamps.png',
			'tag'            => 'Conference',
			'title'          => 'Louisville IA Exchange and TechFest',
			'date_location'  => 'October 21, 2025 · Louisville, KY',
			'url'            => '#',
		],
		[
			'bg_style'       => 'background:linear-gradient(135deg,#2A1878,#4B23B0);',
			'tag'            => 'Workshop',
			'title'          => 'AI Product Development Bootcamp',
			'date_location'  => 'November 14, 2025 · Online',
			'url'            => '#',
		],
	];
}
$event_default_images = [
	$img_dir . '/ai-experience-louisville.png',
	$img_dir . '/ai-experience-bootcamps.png',
	$img_dir . '/ai-insight-hackathon.png',
];

// Blog
$blog_title    = hp_setting( 'home_blog_title', 'Insights That Move Business Forward' );
$blog_desc     = hp_setting( 'home_blog_desc',  'Get actionable ideas on software strategy, AI adoption, and scaling product delivery—straight from the minds of our team.' );
$blog_cta_text = hp_setting( 'home_blog_cta_text', 'All Insights' );
$blog_cta_url  = hp_setting( 'home_blog_cta_url', '/blog' );
$blog_fallback_raw = hp_setting( 'home_blog_fallback', [] );
$blog_fallback     = hp_clean_rows( $blog_fallback_raw );
if ( empty( $blog_fallback ) ) {
	$blog_fallback = [
		[
			'url'        => '#',
			'badge_text' => 'VIDEO',
			'tag'        => 'AI',
			'title'      => '"AI is enterprise-ready and simplifies development"',
			'desc'       => 'Davis Galeana (CEO & President of Slingshot) shares how AI is transforming enterprise software development.',
		],
		[
			'url'      => '#',
			'bg_style' => 'background:linear-gradient(135deg,#1a3560,#2d5080);',
			'tag'      => 'Innovation',
			'title'    => 'How AI has rewired the hackathon',
			'desc'     => 'Exploring how artificial intelligence is transforming the way teams approach hackathons and rapid prototyping.',
		],
		[
			'url'      => '#',
			'bg_style' => 'background:linear-gradient(135deg,#1a4530,#2d6045);',
			'tag'      => 'Product',
			'title'    => '4 Ways to Jumpstart real AI product development',
			'desc'     => 'Practical strategies to move from AI ideation to a working product faster than you think.',
		],
	];
}

// Work
$work_title        = hp_setting( 'home_work_title', 'From Solution<br>to Success Stories' );
// Sanitize_text_field strips <br> so "Solution<br>to" becomes "Solutionto" – auto-repair:
$work_title        = str_replace( 'Solutionto', 'Solution<br>to', $work_title );
if ( empty( trim( $work_title ) ) ) { $work_title = 'From Solution<br>to Success Stories'; }
$work_cta_text     = hp_setting( 'home_work_cta_text', 'All Work' );
$work_cta_url      = hp_setting( 'home_work_cta_url', '/work' );
$work_empty_notice = hp_setting( 'home_work_empty_notice', '' );

// Work fallback cards (shown when no salient_portfolio CPT posts exist)
$work_fallback_raw = hp_setting( 'home_work_fallback', [] );
$work_fallback     = array_filter( hp_clean_rows( $work_fallback_raw ), fn( $c ) => ! empty( $c['title'] ) );

// CTA
$cta_mascot   = hp_image_url( 'home_cta_mascot', '' );
$cta_title    = hp_setting( 'home_cta_title',    'Ready to Launch Something Bold?' );
$cta_desc     = hp_setting( 'home_cta_desc',     "Let's talk about how we help teams like yours bring new products to life—and make them work in the real world." );
$cta_btn_text = hp_setting( 'home_cta_btn_text', "Let's talk" );
$cta_btn_url  = hp_setting( 'home_cta_btn_url',  '/contact' );

/* ── Queries ─────────────────────────────────────── */
$work_ids = hp_post_ids_setting( 'home_work_posts' );
$work_design_cards = [
	'horizon'  => [
		'title' => 'Horizon Engage',
		'image' => $img_dir . '/ai-work-horizon.png',
		'desc'  => 'Developed a mobile app that simplifies insurance, enabling easy claims and reducing paperwork.',
		'tags'  => [ 'AI', 'Product', 'Mobile' ],
	],
	'southeast' => [
		'title' => 'Southeast Christian Church',
		'image' => $img_dir . '/ai-work-southeast.png',
		'desc'  => 'Developed a mobile app that simplifies insurance, enabling easy claims and reducing paperwork.',
		'tags'  => [ 'AI', 'Product', 'Mobile' ],
	],
	'hide-ccg' => [
		'title' => 'Connected Caregiver',
		'image' => $img_dir . '/ai-work-caregiver.png',
		'desc'  => 'Developed a mobile app that simplifies insurance, enabling easy claims and reducing paperwork.',
		'tags'  => [ 'AI', 'Product', 'Mobile' ],
	],
];
$work_query_args = [
	'post_type'      => 'portfolio',
	'post_status'    => 'publish',
	'posts_per_page' => 6,
	'orderby'        => 'date',
	'order'          => 'DESC',
];
if ( ! empty( $work_ids ) ) {
	$work_query_args['post__in']       = $work_ids;
	$work_query_args['orderby']        = 'post__in';
	$work_query_args['posts_per_page'] = count( $work_ids );
}
$work_query = new WP_Query( $work_query_args );

$blog_ids = hp_post_ids_setting( 'home_blog_posts' );
$blog_design_cards = [
	'replaced-by-ai-video' => [
		'image' => $img_dir . '/ai-insight-david.png',
	],
	'ai-hackathon' => [
		'image' => $img_dir . '/ai-insight-hackathon.png',
	],
	'jumpstart-ai-product-development' => [
		'image' => $img_dir . '/ai-insight-product.png',
	],
];
$blog_query_args = [
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => 6,
	'orderby'        => 'date',
	'order'          => 'DESC',
];
if ( ! empty( $blog_ids ) ) {
	$blog_query_args['post__in']       = $blog_ids;
	$blog_query_args['orderby']        = 'post__in';
	$blog_query_args['posts_per_page'] = count( $blog_ids );
}
$blog_query = new WP_Query( $blog_query_args );

$event_ids = hp_post_ids_setting( 'home_events_posts' );
$events_query_args = [
	'post_type'      => 'tribe_events',
	'post_status'    => 'publish',
	'posts_per_page' => 6,
	'meta_key'       => '_EventStartDate',
	'orderby'        => 'meta_value',
	'order'          => 'ASC',
];
if ( ! empty( $event_ids ) ) {
	$events_query_args['post__in']       = $event_ids;
	$events_query_args['orderby']        = 'post__in';
	$events_query_args['posts_per_page'] = count( $event_ids );
}
$events_query = new WP_Query( $events_query_args );
?>

<style>
/* Hide theme header on home, custom header is rendered below */
body.home #header-outer,
body.home #header-space {
	display: none !important;
}
</style>

<div class="home-page-wrapper">
	<header class="home-site-header" id="homeSiteHeader">
		<div class="home-site-header-inner">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="home-site-logo" aria-label="Home">
				<?php if ( $home_logo_url ) : ?>
					<img src="<?php echo esc_url( $home_logo_url ); ?>" alt="<?php echo esc_attr( $header_logo_alt ); ?>">
				<?php else : ?>
					<span class="home-site-logo-text"><?php echo esc_html( strtolower( get_bloginfo( 'name' ) ) ); ?></span>
				<?php endif; ?>
			</a>

			<nav class="home-site-nav" aria-label="Primary">
				<?php
				if ( $home_menu_location ) {
					wp_nav_menu( [
						'theme_location' => $home_menu_location,
						'container'      => false,
						'menu_class'     => 'home-site-menu',
						'fallback_cb'    => false,
					] );
				}
				?>
			</nav>

			<a href="<?php echo esc_url( $header_cta_url ); ?>" class="home-site-header-cta">
				<?php echo esc_html( $header_cta_text ); ?> &rarr;
			</a>

			<button class="home-site-menu-toggle" id="homeMenuToggle" aria-expanded="false" aria-controls="homeMobileMenu">
				<span><?php echo esc_html( $header_mobile_menu_label ); ?></span>
			</button>
		</div>
		<div class="home-mobile-menu" id="homeMobileMenu">
			<?php
			if ( $home_menu_location ) {
				wp_nav_menu( [
					'theme_location' => $home_menu_location,
					'container'      => false,
					'menu_class'     => 'home-mobile-menu-list',
					'fallback_cb'    => false,
				] );
			}
			?>
			<a href="<?php echo esc_url( $header_cta_url ); ?>" class="home-mobile-menu-cta">
				<?php echo esc_html( $header_cta_text ); ?> &rarr;
			</a>
		</div>
	</header>

	<!-- ── Hero ─────────────────────────────────── -->
	<section class="home-hero-section">
		<div class="hp-blob hp-blob-1"></div>
		<div class="hp-blob hp-blob-2"></div>
		<div class="hp-blob hp-blob-3"></div>
		<div class="hp-blob hp-blob-4"></div>

		<div class="home-hero-inner">

			<!-- Left -->
			<div class="home-hero-content">
				<h1 class="home-hero-title"><?php echo wp_kses_post( $hero_title ); ?></h1>
				<p class="home-hero-subtitle"><?php echo esc_html( $hero_subtitle ); ?></p>
				<a href="<?php echo esc_url( $hero_cta_url ); ?>" class="home-hero-cta"><?php echo esc_html( $hero_cta_text ); ?> &rarr;</a>
			</div>

			<!-- Right – video card -->
			<div>
				<div class="home-hero-card">
					<img
						src="<?php echo esc_url( $hero_card_img ); ?>"
						alt="<?php echo esc_attr( wp_strip_all_tags( $hero_card_text ) ); ?>"
						loading="eager"
					>
					<div class="home-hero-card-overlay">
						<p class="home-hero-card-text"><?php echo wp_kses_post( $hero_card_text ); ?></p>
						<button class="home-hero-play-btn" aria-label="Play video" data-sl-video="<?php echo esc_url( $hero_video_url ); ?>">
							<svg width="16" height="18" viewBox="0 0 16 18" fill="none">
								<path d="M1 1L15 9L1 17V1Z" fill="#1B1060"/>
							</svg>
						</button>
					</div>
				</div>
			</div>

		</div><!-- .home-hero-inner -->

			<!-- Logos strip -->
			<div class="home-logos-strip-wrapper">
				<div class="home-logos-strip" aria-label="<?php esc_attr_e( 'Client logos', 'salient-child' ); ?>">
					<div class="home-logos-marquee">
						<div class="home-logos-track"><?php echo $logos_items_html; ?></div>
						<div class="home-logos-track" aria-hidden="true"><?php echo $logos_items_html; ?></div>
					</div>
				</div>
			</div>

	</section><!-- .home-hero-section -->

	<!-- ── What We Do ────────────────────────────── -->
	<section class="home-services-section">
		<div class="home-services-inner">

			<!-- Left text -->
			<div class="home-services-left">
				<span class="home-services-label"><?php echo esc_html( $services_label ); ?></span>
				<h2 class="home-services-title"><?php echo wp_kses_post( $services_title ); ?></h2>
				<a href="<?php echo esc_url( $services_cta_url ); ?>" class="home-services-cta"><?php echo esc_html( $services_cta_text ); ?> &rarr;</a>
			</div>

			<!-- Right service cards -->
			<div class="home-services-grid">
				<?php foreach ( $services as $card ) :
					$card_style = esc_attr( $card['style'] ?? '' );
					$card_url   = esc_url( $card['url'] ?? '#' );
					$card_title = $card['title'] ?? '';
					$card_desc  = $card['desc'] ?? '';
					$card_svg   = $card['icon_svg'] ?? '';
					$card_class = 'service-card' . ( $card_style ? ' ' . $card_style : '' );
				?>
				<a href="<?php echo $card_url; ?>" class="<?php echo $card_class; ?>">
					<div>
						<?php if ( $card_svg ) : ?>
							<div class="service-card-icon">
								<?php echo wp_kses( $card_svg, array_merge(
									wp_kses_allowed_html( 'post' ),
									[ 'svg' => [ 'viewbox' => true, 'fill' => true, 'xmlns' => true, 'width' => true, 'height' => true, 'class' => true ],
									  'path' => [ 'd' => true, 'stroke' => true, 'stroke-width' => true, 'stroke-linecap' => true, 'stroke-linejoin' => true, 'fill' => true, 'opacity' => true ],
									  'circle' => [ 'cx' => true, 'cy' => true, 'r' => true, 'stroke' => true, 'stroke-width' => true, 'fill' => true, 'opacity' => true ],
									  'rect' => [ 'x' => true, 'y' => true, 'width' => true, 'height' => true, 'rx' => true, 'stroke' => true, 'stroke-width' => true, 'fill' => true ],
									  'ellipse' => [ 'cx' => true, 'cy' => true, 'rx' => true, 'ry' => true, 'fill' => true ],
									]
								) ); ?>
							</div>
						<?php endif; ?>
						<h3 class="service-card-title"><?php echo wp_kses_post( $card_title ); ?></h3>
						<?php if ( $card_desc ) : ?>
							<p class="service-card-desc"><?php echo esc_html( $card_desc ); ?></p>
						<?php endif; ?>
					</div>
					<div class="service-card-arrow">
						<svg width="14" height="14" viewBox="0 0 14 14" fill="none">
							<path d="M1 13L13 1M13 1H5M13 1V9" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</div>
				</a>
				<?php endforeach; ?>
			</div><!-- .home-services-grid -->
		</div>
	</section>

	<!-- ── Work Portfolio ────────────────────────── -->
	<section class="home-work-section">
		<div class="home-work-inner">

			<div class="home-section-header">
				<h2 class="home-section-title"><?php echo wp_kses_post( $work_title ); ?></h2>
				<a href="<?php echo esc_url( $work_cta_url ); ?>" class="home-section-link"><?php echo esc_html( $work_cta_text ); ?> &rarr;</a>
			</div>

			<div class="home-work-carousel">
				<div class="home-work-track" id="workTrack">

					<?php if ( $work_query->have_posts() ) : ?>
						<?php while ( $work_query->have_posts() ) : $work_query->the_post(); ?>
							<?php
							$work_slug     = get_post_field( 'post_name', get_the_ID() );
							$work_override = isset( $work_design_cards[ $work_slug ] ) ? $work_design_cards[ $work_slug ] : [];
							$work_img_url  = ! empty( $work_override['image'] ) ? $work_override['image'] : hp_portfolio_image_url( get_the_ID() );
							$work_card_title = ! empty( $work_override['title'] ) ? $work_override['title'] : get_the_title();
							$work_card_desc  = ! empty( $work_override['desc'] ) ? $work_override['desc'] : hp_portfolio_excerpt( get_the_ID() );
							$work_card_tags  = ! empty( $work_override['tags'] ) ? $work_override['tags'] : [];
							if ( empty( $work_card_tags ) ) {
								$terms = get_the_terms( get_the_ID(), 'project-type' );
								if ( $terms && ! is_wp_error( $terms ) ) {
									$work_card_tags = array_map( fn( $t ) => $t->name, array_slice( $terms, 0, 3 ) );
								}
							}
							?>
							<a href="<?php the_permalink(); ?>" class="work-card">
								<div class="work-card-image">
									<?php if ( $work_img_url ) : ?>
										<img src="<?php echo esc_url( $work_img_url ); ?>" alt="<?php echo esc_attr( $work_card_title ); ?>" loading="lazy">
									<?php endif; ?>
								</div>
								<div class="work-card-body">
									<h3 class="work-card-title"><?php echo esc_html( $work_card_title ); ?></h3>
									<p class="work-card-desc"><?php echo esc_html( $work_card_desc ); ?></p>
									<div class="work-card-tags">
										<?php foreach ( $work_card_tags as $tag ) : ?>
											<span class="work-card-tag"><?php echo esc_html( $tag ); ?></span>
										<?php endforeach; ?>
									</div>
								</div>
							</a>
						<?php endwhile; wp_reset_postdata(); ?>

					<?php elseif ( ! empty( $work_fallback ) ) : ?>
						<?php foreach ( $work_fallback as $wf ) :
							$wf_url   = ! empty( $wf['url'] ) ? $wf['url'] : '#';
							$wf_img   = ! empty( $wf['image'] ) ? slingshot_lp_attachment_url( $wf['image'], '', 'medium_large' ) : '';
							$wf_title = $wf['title'] ?? '';
							$wf_sub   = $wf['subtitle'] ?? '';
							$wf_tags  = ! empty( $wf['tags'] ) ? array_filter( array_map( 'trim', explode( ',', $wf['tags'] ) ) ) : [];
						?>
						<a href="<?php echo slingshot_lp_h_attr( $wf_url ); ?>" class="work-card">
							<div class="work-card-image">
								<?php if ( $wf_img ) : ?>
									<img src="<?php echo esc_url( $wf_img ); ?>" alt="<?php echo esc_attr( $wf_title ); ?>" loading="lazy">
								<?php endif; ?>
							</div>
							<div class="work-card-body">
								<h3 class="work-card-title"><?php echo esc_html( $wf_title ); ?></h3>
								<?php if ( $wf_sub ) : ?>
									<p class="work-card-desc"><?php echo esc_html( $wf_sub ); ?></p>
								<?php endif; ?>
								<?php if ( $wf_tags ) : ?>
								<div class="work-card-tags">
									<?php foreach ( $wf_tags as $tag ) : ?>
										<span class="work-card-tag"><?php echo esc_html( $tag ); ?></span>
									<?php endforeach; ?>
								</div>
								<?php endif; ?>
							</div>
						</a>
						<?php endforeach; ?>

					<?php else : ?>
						<?php
						$work_default = [
							[
								'title'    => 'Connected Caregiver',
								'subtitle' => 'A mobile platform connecting home-care teams and families in real time.',
								'tags'     => 'Healthcare, Mobile',
								'bg'       => 'background:linear-gradient(135deg,#1B4F72,#2980B9);',
							],
							[
								'title'    => 'Churchill Downs',
								'subtitle' => 'Enterprise platform modernization for one of America\'s most iconic venues.',
								'tags'     => 'Enterprise, Web',
								'bg'       => 'background:linear-gradient(135deg,#1A3C34,#2E7D52);',
							],
							[
								'title'    => 'HealthRev',
								'subtitle' => 'AI-powered revenue cycle management platform for healthcare providers.',
								'tags'     => 'Healthcare, AI',
								'bg'       => 'background:linear-gradient(135deg,#4A1060,#7B2FBE);',
							],
							[
								'title'    => 'Paysign',
								'subtitle' => 'Scalable prepaid card and payment processing platform for fintech.',
								'tags'     => 'Fintech, Mobile',
								'bg'       => 'background:linear-gradient(135deg,#1A265E,#2A4090);',
							],
							[
								'title'    => 'ProjectTeam',
								'subtitle' => 'Construction project management software built for the field.',
								'tags'     => 'Construction, SaaS',
								'bg'       => 'background:linear-gradient(135deg,#5C3D11,#A0692A);',
							],
							[
								'title'    => 'Zoeller Group',
								'subtitle' => 'Digital transformation and IoT dashboard for industrial pump systems.',
								'tags'     => 'Industrial, IoT',
								'bg'       => 'background:linear-gradient(135deg,#1A1A2E,#16213E);',
							],
						];
						foreach ( $work_default as $wd ) :
							$wd_tags = array_map( 'trim', explode( ',', $wd['tags'] ) );
						?>
						<a href="#" class="work-card">
							<div class="work-card-image" style="<?php echo esc_attr( $wd['bg'] ); ?>"></div>
							<div class="work-card-body">
								<h3 class="work-card-title"><?php echo esc_html( $wd['title'] ); ?></h3>
								<p class="work-card-desc"><?php echo esc_html( $wd['subtitle'] ); ?></p>
								<div class="work-card-tags">
									<?php foreach ( $wd_tags as $tag ) : ?>
										<span class="work-card-tag"><?php echo esc_html( $tag ); ?></span>
									<?php endforeach; ?>
								</div>
							</div>
						</a>
						<?php endforeach; ?>
						<?php if ( $work_empty_notice ) : ?>
							<p class="home-work-empty-notice"><?php echo esc_html( $work_empty_notice ); ?></p>
						<?php endif; ?>
					<?php endif; ?>

				</div><!-- #workTrack -->

				<div class="home-carousel-footer">
					<div class="home-carousel-progress"><span id="workProgress"></span></div>
					<div class="home-work-nav">
						<button class="carousel-nav-btn" id="workPrev" aria-label="Previous">
							<svg width="18" height="18" viewBox="0 0 18 18" fill="none">
								<path d="M11 4L6 9L11 14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</button>
						<button class="carousel-nav-btn" id="workNext" aria-label="Next">
							<svg width="18" height="18" viewBox="0 0 18 18" fill="none">
								<path d="M7 4L12 9L7 14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</button>
					</div>
				</div>
			</div><!-- .home-work-carousel -->

		</div>
	</section>

	<!-- ── About / Stats ─────────────────────────── -->
	<section class="home-about-section">
		<div class="home-about-inner">

			<div class="home-about-left">
				<img
					src="<?php echo esc_url( $about_img ); ?>"
					alt="<?php echo esc_attr( $about_title ); ?>"
					loading="lazy"
				>
				<div class="home-about-left-content">
					<h2 class="home-about-title"><?php echo esc_html( $about_title ); ?></h2>
					<p class="home-about-desc"><?php echo esc_html( $about_desc ); ?></p>
					<a href="<?php echo esc_url( $about_btn_url ); ?>" class="home-about-btn"><?php echo esc_html( $about_btn_text ); ?> &rarr;</a>
				</div>
			</div>

			<div class="home-about-right">
				<p class="home-about-tagline"><?php echo esc_html( $about_tagline ); ?></p>
				<div class="home-stats-grid">
					<?php foreach ( $stats as $stat ) : ?>
					<div class="home-stat">
						<div class="home-stat-number"><?php echo esc_html( $stat['number'] ?? '' ); ?></div>
						<div class="home-stat-label"><?php echo esc_html( $stat['label'] ?? '' ); ?></div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>

		</div>
	</section>

	<!-- ── Join the Conversation (Events) ────────── -->
	<section class="home-events-section">
		<div class="home-events-inner">

			<div class="home-events-header">
				<h2 class="home-events-title"><?php echo esc_html( $events_title ); ?></h2>
				<div class="home-events-meta">
					<p class="home-events-desc"><?php echo esc_html( $events_desc ); ?></p>
					<a href="<?php echo esc_url( $events_cta_url ); ?>" class="home-section-link"><?php echo esc_html( $events_cta_text ); ?> &rarr;</a>
				</div>
			</div>

			<div class="home-events-carousel">
				<div class="home-events-cards" id="eventsTrack">
					<?php if ( $events_query->have_posts() ) : ?>
						<?php $event_index = 0; ?>
						<?php while ( $events_query->have_posts() ) : $events_query->the_post(); ?>
							<?php
							$event_id      = get_the_ID();
							$ev_url        = get_permalink( $event_id );
							$ev_tag        = hp_event_tag( $event_id );
							$ev_title      = get_the_title( $event_id );
							$ev_date       = hp_event_date_location( $event_id );
							$ev_img_url    = get_the_post_thumbnail_url( $event_id, 'large' );
							if ( ! $ev_img_url && ! empty( $event_default_images ) ) {
								$ev_img_url = $event_default_images[ $event_index % count( $event_default_images ) ];
							}
							$event_index++;
							?>
							<a href="<?php echo esc_url( $ev_url ); ?>" class="event-card">
								<div class="event-card-image">
									<?php if ( $ev_img_url ) : ?>
										<img src="<?php echo esc_url( $ev_img_url ); ?>" alt="<?php echo esc_attr( $ev_title ); ?>" loading="lazy">
									<?php endif; ?>
								</div>
								<div class="event-card-body">
									<div class="event-card-info">
										<?php if ( $ev_tag ) : ?><span class="event-card-tag"><?php echo esc_html( $ev_tag ); ?></span><?php endif; ?>
										<h3 class="event-card-title"><?php echo esc_html( $ev_title ); ?></h3>
										<?php if ( $ev_date ) : ?><p class="event-card-date"><?php echo esc_html( $ev_date ); ?></p><?php endif; ?>
									</div>
									<span class="event-register-btn"><?php echo esc_html( $events_register_text ); ?> &rarr;</span>
								</div>
							</a>
						<?php endwhile; wp_reset_postdata(); ?>
					<?php elseif ( ! empty( $events ) ) : ?>
						<?php foreach ( $events as $ev ) :
							$ev_url   = esc_url( $ev['url'] ?? '#' );
							$ev_tag   = esc_html( $ev['tag'] ?? '' );
							$ev_title = esc_html( $ev['title'] ?? '' );
							$ev_date  = esc_html( $ev['date_location'] ?? '' );
							$ev_img_id = $ev['image'] ?? '';
							$ev_img_url = $ev_img_id ? wp_get_attachment_image_url( $ev_img_id, 'medium_large' ) : '';
						?>
						<a href="<?php echo $ev_url; ?>" class="event-card">
							<div class="event-card-image">
								<?php if ( $ev_img_url ) : ?>
									<img src="<?php echo esc_url( $ev_img_url ); ?>" alt="<?php echo $ev_title; ?>" loading="lazy">
								<?php endif; ?>
							</div>
							<div class="event-card-body">
								<div class="event-card-info">
									<?php if ( $ev_tag ) : ?><span class="event-card-tag"><?php echo $ev_tag; ?></span><?php endif; ?>
									<h3 class="event-card-title"><?php echo $ev_title; ?></h3>
									<?php if ( $ev_date ) : ?><p class="event-card-date"><?php echo $ev_date; ?></p><?php endif; ?>
								</div>
								<span class="event-register-btn"><?php echo esc_html( $events_register_text ); ?> &rarr;</span>
							</div>
						</a>
						<?php endforeach; ?>
					<?php else : ?>
						<?php foreach ( $events_fallback as $ev ) :
							$ev_url = esc_url( $ev['url'] ?? '#' );
							$ev_tag = esc_html( $ev['tag'] ?? '' );
							$ev_title = esc_html( $ev['title'] ?? '' );
							$ev_date = esc_html( $ev['date_location'] ?? '' );
							$ev_img_id = $ev['image'] ?? '';
							$ev_img_url = $ev_img_id ? wp_get_attachment_image_url( $ev_img_id, 'medium_large' ) : ( $ev['image_url'] ?? '' );
							$ev_bg_style = esc_attr( $ev['bg_style'] ?? '' );
						?>
						<a href="<?php echo $ev_url; ?>" class="event-card">
							<div class="event-card-image"<?php echo $ev_bg_style ? ' style="' . $ev_bg_style . '"' : ''; ?>>
								<?php if ( $ev_img_url ) : ?>
									<img src="<?php echo esc_url( $ev_img_url ); ?>" alt="<?php echo esc_attr( $ev_title ); ?>" loading="lazy">
								<?php endif; ?>
							</div>
							<div class="event-card-body">
								<div class="event-card-info">
									<?php if ( $ev_tag ) : ?><span class="event-card-tag"><?php echo $ev_tag; ?></span><?php endif; ?>
									<h3 class="event-card-title"><?php echo $ev_title; ?></h3>
									<?php if ( $ev_date ) : ?><p class="event-card-date"><?php echo $ev_date; ?></p><?php endif; ?>
								</div>
								<span class="event-register-btn"><?php echo esc_html( $events_register_text ); ?> &rarr;</span>
							</div>
						</a>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
				<div class="home-carousel-footer">
					<div class="home-carousel-progress"><span id="eventsProgress"></span></div>
					<div class="home-work-nav">
						<button class="carousel-nav-btn" id="eventsPrev" aria-label="Previous">
							<svg width="18" height="18" viewBox="0 0 18 18" fill="none">
								<path d="M11 4L6 9L11 14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</button>
						<button class="carousel-nav-btn" id="eventsNext" aria-label="Next">
							<svg width="18" height="18" viewBox="0 0 18 18" fill="none">
								<path d="M7 4L12 9L7 14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</button>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ── Insights (Blog) ───────────────────────── -->
	<section class="home-blog-section">
		<div class="home-blog-inner">

			<div class="home-blog-header">
				<h2 class="home-blog-title"><?php echo wp_kses_post( nl2br( esc_html( $blog_title ) ) ); ?></h2>
				<div class="home-blog-meta">
					<p class="home-blog-desc"><?php echo esc_html( $blog_desc ); ?></p>
					<a href="<?php echo esc_url( $blog_cta_url ); ?>" class="home-section-link"><?php echo esc_html( $blog_cta_text ); ?> &rarr;</a>
				</div>
			</div>

			<div class="home-blog-carousel">
				<div class="home-blog-cards" id="blogTrack">
					<?php if ( $blog_query->have_posts() ) : ?>
						<?php while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>
							<?php
							$blog_slug     = get_post_field( 'post_name', get_the_ID() );
							$blog_override = isset( $blog_design_cards[ $blog_slug ] ) ? $blog_design_cards[ $blog_slug ] : [];
							$blog_img_url  = ! empty( $blog_override['image'] ) ? $blog_override['image'] : get_the_post_thumbnail_url( get_the_ID(), 'medium_large' );
							$blog_card_tags = hp_blog_card_tag_labels( get_the_ID() );
							?>
							<a href="<?php the_permalink(); ?>" class="blog-card">
								<div class="blog-card-image">
									<?php if ( $blog_img_url ) : ?>
										<img src="<?php echo esc_url( $blog_img_url ); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
									<?php endif; ?>
									<?php if ( get_post_format() === 'video' ) : ?>
										<span class="blog-card-badge">VIDEO</span>
									<?php endif; ?>
								</div>
								<div class="blog-card-body">
									<h3 class="blog-card-title"><?php the_title(); ?></h3>
									<p class="blog-card-desc"><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
									<div class="blog-card-tags">
										<?php foreach ( $blog_card_tags as $tag ) : ?>
											<span class="blog-card-tag"><?php echo esc_html( $tag ); ?></span>
										<?php endforeach; ?>
									</div>
								</div>
							</a>
						<?php endwhile; wp_reset_postdata(); ?>
					<?php else : ?>
						<?php foreach ( $blog_fallback as $item ) :
							$item_url = esc_url( $item['url'] ?? '#' );
							$item_tag = esc_html( $item['tag'] ?? '' );
							$item_title = esc_html( $item['title'] ?? '' );
							$item_desc = esc_html( $item['desc'] ?? '' );
							$item_badge = esc_html( $item['badge_text'] ?? '' );
							$item_img_id = $item['image'] ?? '';
							$item_img_url = $item_img_id ? wp_get_attachment_image_url( $item_img_id, 'medium_large' ) : '';
							$item_bg_style = esc_attr( $item['bg_style'] ?? '' );
						?>
						<a href="<?php echo $item_url; ?>" class="blog-card">
							<div class="blog-card-image"<?php echo $item_bg_style ? ' style="' . $item_bg_style . '"' : ''; ?>>
								<?php if ( $item_img_url ) : ?>
									<img src="<?php echo esc_url( $item_img_url ); ?>" alt="<?php echo esc_attr( $item_title ); ?>" loading="lazy">
								<?php endif; ?>
								<?php if ( $item_badge ) : ?>
									<span class="blog-card-badge"><?php echo $item_badge; ?></span>
								<?php endif; ?>
							</div>
							<div class="blog-card-body">
								<h3 class="blog-card-title"><?php echo $item_title; ?></h3>
								<p class="blog-card-desc"><?php echo $item_desc; ?></p>
								<div class="blog-card-tags"><?php if ( $item_tag ) : ?><span class="blog-card-tag"><?php echo $item_tag; ?></span><?php endif; ?></div>
							</div>
						</a>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
				<div class="home-carousel-footer">
					<div class="home-carousel-progress"><span id="blogProgress"></span></div>
					<div class="home-work-nav">
						<button class="carousel-nav-btn" id="blogPrev" aria-label="Previous">
							<svg width="18" height="18" viewBox="0 0 18 18" fill="none">
								<path d="M11 4L6 9L11 14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</button>
						<button class="carousel-nav-btn" id="blogNext" aria-label="Next">
							<svg width="18" height="18" viewBox="0 0 18 18" fill="none">
								<path d="M7 4L12 9L7 14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</button>
					</div>
				</div>
			</div>

		</div>
	</section>

	<!-- ── CTA ───────────────────────────────────── -->
	<section class="home-cta-section">
		<div class="home-cta-inner">

			<!-- Mascot illustration -->
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

			<div class="home-cta-card">
				<h2 class="home-cta-title"><?php echo esc_html( $cta_title ); ?></h2>
				<p class="home-cta-desc"><?php echo esc_html( $cta_desc ); ?></p>
				<a href="<?php echo esc_url( $cta_btn_url ); ?>" class="home-cta-btn"><?php echo esc_html( $cta_btn_text ); ?> &rarr;</a>
			</div>

		</div>
	</section>

</div><!-- .home-page-wrapper -->

<?php get_footer(); ?>
