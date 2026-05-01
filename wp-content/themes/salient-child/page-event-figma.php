<?php
/*
Template Name: Event Figma
 * Content: Edit Page meta fields (Meta Box). For individual recurring event series (e.g. Louisville AI Exchange).
 */

wp_enqueue_style( 'pages-figma-jakarta',  'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap', array(), null );
wp_enqueue_style( 'home-style',           get_stylesheet_directory_uri() . '/css/home.css',          array(), '1.18' );
wp_enqueue_style( 'service-figma-style',  get_stylesheet_directory_uri() . '/css/service-figma.css', array(), '1.6' );
wp_enqueue_style( 'pages-figma-style',    get_stylesheet_directory_uri() . '/css/pages-figma.css',   array(), '1.0' );
wp_enqueue_style( 'pages-figma-2-style',  get_stylesheet_directory_uri() . '/css/pages-figma-2.css', array(), '2.0' );
wp_enqueue_script( 'hp-script',           get_stylesheet_directory_uri() . '/js/home.js',            array( 'jquery' ), '1.6', true );

get_header();

$img_dir = get_stylesheet_directory_uri() . '/img';

if ( ! function_exists( 'slingshot_evt_img_url' ) ) {
	function slingshot_evt_img_url( $value, $size = 'medium_large' ) {
		if ( is_array( $value ) ) {
			$value = $value['ID'] ?? $value['id'] ?? reset( $value );
		}
		$value = trim( (string) $value );
		if ( '' === $value ) {
			return '';
		}
		if ( ctype_digit( $value ) ) {
			return slingshot_lp_attachment_url( (int) $value, '', $size );
		}
		return $value;
	}
}

if ( ! function_exists( 'slingshot_evt_filter_rows' ) ) {
	function slingshot_evt_filter_rows( $rows, $content_keys ) {
		if ( ! is_array( $rows ) ) {
			return array();
		}
		return array_values(
			array_filter(
				$rows,
				static function ( $row ) use ( $content_keys ) {
					if ( ! is_array( $row ) ) {
						return false;
					}
					foreach ( $content_keys as $key ) {
						if ( ! isset( $row[ $key ] ) ) {
							continue;
						}
						$value = $row[ $key ];
						if ( is_array( $value ) ) {
							$value = $value['ID'] ?? $value['id'] ?? reset( $value );
						}
						$value = trim( (string) $value );
						if ( '' !== $value && '0' !== $value ) {
							return true;
						}
					}
					return false;
				}
			)
		);
	}
}

if ( ! function_exists( 'slingshot_evt_next_event' ) ) {
	function slingshot_evt_next_event() {
		$events = get_posts(
			array(
				'post_type'      => 'tribe_events',
				'post_status'    => 'publish',
				'posts_per_page' => 1,
				'meta_key'       => '_EventStartDate',
				'orderby'        => 'meta_value',
				'order'          => 'ASC',
				'meta_type'      => 'DATETIME',
				'meta_query'     => array(
					array(
						'key'     => '_EventStartDate',
						'value'   => current_time( 'mysql' ),
						'compare' => '>=',
						'type'    => 'DATETIME',
					),
				),
			)
		);
		if ( empty( $events ) ) {
			return array();
		}

		$event_id = (int) $events[0]->ID;
		$start    = get_post_meta( $event_id, '_EventStartDate', true );
		$end      = get_post_meta( $event_id, '_EventEndDate', true );
		$tz_name  = get_post_meta( $event_id, '_EventTimezone', true ) ?: wp_timezone_string();
		$date     = get_the_date( 'F j, Y', $event_id );
		$time     = '';
		if ( $start ) {
			try {
				$tz       = new DateTimeZone( $tz_name );
				$start_dt = DateTimeImmutable::createFromFormat( 'Y-m-d H:i:s', $start, $tz );
				$end_dt   = $end ? DateTimeImmutable::createFromFormat( 'Y-m-d H:i:s', $end, $tz ) : false;
				if ( $start_dt instanceof DateTimeImmutable ) {
					$date = $start_dt->format( 'F j, Y' );
					$time = $start_dt->format( 'g:i A' );
					if ( $end_dt instanceof DateTimeImmutable ) {
						$time .= ' - ' . $end_dt->format( 'g:i A T' );
					}
				}
			} catch ( Exception $e ) {
				$date = wp_date( 'F j, Y', strtotime( $start ) );
				$time = wp_date( 'g:i A', strtotime( $start ) );
				if ( $end ) {
					$time .= ' - ' . wp_date( 'g:i A T', strtotime( $end ) );
				}
			}
		}

		return array(
			'date'  => trim( $date . ( $time ? ' · ' . $time : '' ) ),
			'title' => get_the_title( $event_id ),
			'desc'  => wp_strip_all_tags( get_the_excerpt( $event_id ) ),
			'url'   => get_permalink( $event_id ),
		);
	}
}

// ── Hero ──────────────────────────────────────────────────────
$hero_label    = slingshot_pm( 'evt_hero_label',    'EVENTS / LOUISVILLE' );
$hero_heading  = slingshot_pm( 'evt_hero_heading',  get_the_title() );
$hero_desc     = slingshot_pm( 'evt_hero_desc',     "A monthly gathering where Louisville's tech community explores real-world AI in action — candid conversations, expert insights, and a room full of people building what's next." );
$hero_btn_text = slingshot_pm( 'evt_hero_btn_text', 'Register Now' );
$hero_btn_url  = slingshot_pm( 'evt_hero_btn_url',  '#next-meetup' );
$hero_img      = slingshot_pm_image( 'evt_hero_img', '' );
if ( ! $hero_img ) {
	$hero_img = slingshot_evt_img_url( '455176', 'large' );
}

// ── What It Is ────────────────────────────────────────────────
$what_heading = slingshot_pm( 'evt_what_heading', 'Explore Real-World AI in Action' );
$what_desc    = slingshot_pm( 'evt_what_desc',    "The Louisville AI Exchange is a monthly gathering where the tech community comes together, explores real-world AI in action — candid conversations, expert insights, and a room full of people building what's next. Whether you're just starting out or have deployed AI in production, this is the place for you." );
$what_cards   = slingshot_pm( 'evt_what_cards', [] );
$what_cards   = slingshot_evt_filter_rows( $what_cards, array( 'icon_svg', 'heading', 'desc' ) );
if ( empty( $what_cards ) ) {
	$what_cards = [
		[
			'icon_svg' => '<svg width="44" height="44" viewBox="0 0 44 44" fill="none"><rect width="44" height="44" rx="12" fill="#6D44B7" fill-opacity=".1"/><path d="M15 22l4 4 10-10" stroke="#6D44B7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
			'heading'  => 'Strategic AI',
			'desc'     => 'Where executives and leaders discuss how AI changes the game at the strategy and organizational level.',
		],
		[
			'icon_svg' => '<svg width="44" height="44" viewBox="0 0 44 44" fill="none"><rect width="44" height="44" rx="12" fill="#23B7B4" fill-opacity=".1"/><path d="M22 12v20M12 22h20" stroke="#23B7B4" stroke-width="2" stroke-linecap="round"/></svg>',
			'heading'  => 'AI at Scale',
			'desc'     => 'Real stories of scaling AI beyond pilots - what works in production and what does not.',
		],
		[
			'icon_svg' => '<svg width="44" height="44" viewBox="0 0 44 44" fill="none"><rect width="44" height="44" rx="12" fill="#6D44B7" fill-opacity=".1"/><rect x="13" y="14" width="18" height="16" rx="4" stroke="#6D44B7" stroke-width="1.8"/><path d="M18 22h8M22 18v8" stroke="#6D44B7" stroke-width="1.5" stroke-linecap="round"/></svg>',
			'heading'  => 'Building with AI Search Intelligence',
			'desc'     => 'Technical deep-dives on RAG, embeddings, and using AI to transform how people find and use information.',
		],
		[
			'icon_svg' => '<svg width="44" height="44" viewBox="0 0 44 44" fill="none"><rect width="44" height="44" rx="12" fill="#23B7B4" fill-opacity=".1"/><path d="M14 30l7-16 7 16" stroke="#23B7B4" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><path d="M16.5 25h11" stroke="#23B7B4" stroke-width="1.5" stroke-linecap="round"/></svg>',
			'heading'  => 'AI in Practice',
			'desc'     => 'Practitioners share what they have actually built, including the messy, real version of AI projects.',
		],
		[
			'icon_svg' => '<svg width="44" height="44" viewBox="0 0 44 44" fill="none"><rect width="44" height="44" rx="12" fill="#6D44B7" fill-opacity=".1"/><circle cx="22" cy="18" r="5" stroke="#6D44B7" stroke-width="1.8"/><path d="M13 32c0-4.97 4.03-9 9-9s9 4.03 9 9" stroke="#6D44B7" stroke-width="1.8" stroke-linecap="round"/></svg>',
			'heading'  => 'AI & Society',
			'desc'     => 'Exploring the broader implications of AI: workforce, ethics, education, and community impact.',
		],
		[
			'icon_svg' => '<svg width="44" height="44" viewBox="0 0 44 44" fill="none"><rect width="44" height="44" rx="12" fill="#23B7B4" fill-opacity=".1"/><path d="M18 14h8M16 19h12M14 24h16M12 29h20" stroke="#23B7B4" stroke-width="1.8" stroke-linecap="round"/></svg>',
			'heading'  => 'Starting With AI',
			'desc'     => 'For those just beginning, how to think about AI for your business and where to start without getting overwhelmed.',
		],
	];
}

// ── Next Meetup ───────────────────────────────────────────────
$next_label        = slingshot_pm( 'evt_next_label',        'NEXT MEETUP' );
$next_date         = slingshot_pm( 'evt_next_date',         '' );
$next_heading      = slingshot_pm( 'evt_next_heading',      '' );
$next_desc         = slingshot_pm( 'evt_next_desc',         '' );
$next_btn_text     = slingshot_pm( 'evt_next_btn_text',     'Register Now' );
$next_btn_url      = slingshot_pm( 'evt_next_btn_url',      '#' );
$next_speaker_img  = slingshot_pm_image( 'evt_next_speaker_img', '' );
$next_speaker_name = slingshot_pm( 'evt_next_speaker_name', '' );
$next_speaker_role = slingshot_pm( 'evt_next_speaker_role', '' );
$next_event        = slingshot_evt_next_event();
if ( ! $next_date && ! empty( $next_event['date'] ) ) {
	$next_date = $next_event['date'];
}
if ( ! $next_heading && ! empty( $next_event['title'] ) ) {
	$next_heading = $next_event['title'];
}
if ( ! $next_desc && ! empty( $next_event['desc'] ) ) {
	$next_desc = $next_event['desc'];
}
if ( '#' === $next_btn_url && ! empty( $next_event['url'] ) ) {
	$next_btn_url = $next_event['url'];
}
if ( ! $next_speaker_img ) {
	$next_speaker_img = slingshot_evt_img_url( '455236', 'large' );
}
if ( ! $next_speaker_name ) {
	$next_speaker_name = 'Louisville AI Exchange';
}
if ( ! $next_speaker_role ) {
	$next_speaker_role = 'Monthly AI meetup';
}

// ── Past Topics ───────────────────────────────────────────────
$topics_heading = slingshot_pm( 'evt_topics_heading', 'Past Topics' );
$topics_items   = slingshot_pm( 'evt_topics_items', [] );
$topics_items   = slingshot_evt_filter_rows( $topics_items, array( 'image', 'date', 'title', 'desc', 'url' ) );
if ( empty( $topics_items ) ) {
	$topics_items = array(
		array( 'image' => '455236', 'date' => 'April 2026', 'title' => 'AI Builders Session: Build and Learn, Together', 'desc' => 'A practical meetup for teams experimenting with real AI projects and sharing what they are learning.', 'url' => '#next-meetup' ),
		array( 'image' => '455177', 'date' => 'March 2026', 'title' => 'Finding Balance in the Power, Possibility, and Peril of AI', 'desc' => 'A community conversation about responsible AI adoption and the tradeoffs leaders should not ignore.', 'url' => '#next-meetup' ),
		array( 'image' => '455088', 'date' => 'February 2026', 'title' => 'AI in Product and Operations', 'desc' => 'Real-world examples from operators turning AI curiosity into useful workflow improvements.', 'url' => '#next-meetup' ),
		array( 'image' => '454983', 'date' => 'January 2026', 'title' => 'From Experiment to Execution', 'desc' => 'Lessons for teams moving beyond demos and into production-minded AI work.', 'url' => '#next-meetup' ),
	);
}

// ── Partner / Sponsor ─────────────────────────────────────────
$partner_eyebrow  = slingshot_pm( 'evt_partner_eyebrow', 'Get Involved' );
$partner_heading  = slingshot_pm( 'evt_partner_heading',  'Partner With Us' );
$partner_desc     = slingshot_pm( 'evt_partner_desc',     "We're looking for businesses and organizations to join us in building Louisville's thriving tech ecosystem. Interested in sponsoring or becoming a community partner? Let's connect." );
$partner_form_heading = slingshot_pm( 'evt_partner_form_heading', 'Request a Speaker' );
$partner_gf_id    = (int) slingshot_pm( 'evt_partner_gf_id', 0 );
$partner_form_action_url = slingshot_pm( 'evt_partner_form_action_url', '#' );
$partner_first_ph        = slingshot_pm( 'evt_partner_first_placeholder', 'First Name*' );
$partner_last_ph         = slingshot_pm( 'evt_partner_last_placeholder', 'Last Name*' );
$partner_email_ph        = slingshot_pm( 'evt_partner_email_placeholder', 'Email*' );
$partner_org_ph          = slingshot_pm( 'evt_partner_org_placeholder', 'Organization' );
$partner_message_ph      = slingshot_pm( 'evt_partner_message_placeholder', 'How would you like to get involved?' );
$partner_submit_text     = slingshot_pm( 'evt_partner_submit_text', 'Send Message' );

$sponsor_label  = slingshot_pm( 'evt_sponsor_label', 'Sponsored By' );
$sponsor_logos  = slingshot_pm( 'evt_sponsor_logos', [] );
$sponsor_logos  = slingshot_evt_filter_rows( $sponsor_logos, array( 'image', 'name', 'url' ) );
if ( empty( $sponsor_logos ) ) {
	$sponsor_logos = array(
		array( 'image' => '/wp-content/uploads/2020/02/logo-dark.svg', 'name' => 'Slingshot', 'url' => '/' ),
		array( 'image' => '4288', 'name' => 'University of Louisville', 'url' => 'https://louisville.edu/' ),
	);
}
?>
<style>
body.page-template-page-event-figma #header-outer,
body.page-template-page-event-figma #header-space { display:none !important; }
</style>

<?php slingshot_render_redesign_header( array( 'variant' => 'light' ) ); ?>

<div class="evt-page-wrapper">

	<!-- ── HERO ──────────────────────────────────────────── -->
	<section class="fig-hero">
		<div class="fig-hero-blob fig-hero-blob-1"></div>
		<div class="fig-hero-blob fig-hero-blob-2"></div>

		<div class="evt-hero-inner">
			<div class="evt-hero-content">
				<?php if ( $hero_label ) : ?>
				<div class="evt-hero-label"><?php echo esc_html( $hero_label ); ?></div>
				<?php endif; ?>
				<h1 class="evt-hero-heading"><?php echo esc_html( $hero_heading ); ?></h1>
				<?php if ( $hero_desc ) : ?>
				<p class="evt-hero-sub"><?php echo esc_html( $hero_desc ); ?></p>
				<?php endif; ?>
				<a href="<?php echo slingshot_lp_h_attr( $hero_btn_url ); ?>" class="evt-hero-btn">
					<?php echo esc_html( $hero_btn_text ); ?> &rarr;
				</a>
			</div>
			<?php if ( $hero_img ) : ?>
			<div class="evt-hero-img">
				<img src="<?php echo esc_url( $hero_img ); ?>" alt="<?php echo esc_attr( $hero_heading ); ?>">
			</div>
			<?php endif; ?>
		</div>
	</section>

	<!-- ── WHAT IT IS ────────────────────────────────────── -->
	<section class="evt-what-section">
		<div class="evt-what-head">
			<div>
				<h2 class="fig-section-heading"><?php echo esc_html( $what_heading ); ?></h2>
			</div>
			<?php if ( $what_desc ) : ?>
			<p class="evt-what-copy"><?php echo esc_html( $what_desc ); ?></p>
			<?php endif; ?>
		</div>
		<div class="evt-what-grid">
			<?php foreach ( $what_cards as $card ) : ?>
			<div class="evt-what-card">
				<?php if ( ! empty( $card['icon_svg'] ) ) : ?>
				<div class="evt-what-icon"><?php echo $card['icon_svg']; ?></div>
				<?php endif; ?>
				<h3 class="evt-what-heading"><?php echo esc_html( $card['heading'] ?? '' ); ?></h3>
				<p class="evt-what-desc"><?php echo esc_html( $card['desc'] ?? '' ); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
	</section>

	<!-- ── NEXT MEETUP ───────────────────────────────────── -->
	<?php if ( $next_heading || $next_date ) : ?>
	<section class="evt-next-section" id="next-meetup">
		<div class="evt-next-card">
			<div class="evt-next-blob"></div>
			<div class="evt-next-content">
				<?php if ( $next_label ) : ?>
				<div class="evt-next-label"><?php echo esc_html( $next_label ); ?></div>
				<?php endif; ?>
				<?php if ( $next_date ) : ?>
				<div class="evt-next-date"><?php echo esc_html( $next_date ); ?></div>
				<?php endif; ?>
				<?php if ( $next_heading ) : ?>
				<h2 class="evt-next-heading"><?php echo esc_html( $next_heading ); ?></h2>
				<?php endif; ?>
				<?php if ( $next_desc ) : ?>
				<p class="evt-next-desc"><?php echo esc_html( $next_desc ); ?></p>
				<?php endif; ?>
				<a href="<?php echo slingshot_lp_h_attr( $next_btn_url ); ?>" class="evt-next-btn" target="_blank" rel="noopener">
					<?php echo esc_html( $next_btn_text ); ?> &rarr;
				</a>
			</div>
			<?php if ( $next_speaker_img ) : ?>
			<div class="evt-next-speaker">
				<div class="evt-next-speaker-img">
					<img src="<?php echo esc_url( $next_speaker_img ); ?>" alt="<?php echo esc_attr( $next_speaker_name ); ?>">
				</div>
				<?php if ( $next_speaker_name ) : ?>
				<div class="evt-next-speaker-name"><?php echo esc_html( $next_speaker_name ); ?></div>
				<?php endif; ?>
				<?php if ( $next_speaker_role ) : ?>
				<div class="evt-next-speaker-role"><?php echo esc_html( $next_speaker_role ); ?></div>
				<?php endif; ?>
			</div>
			<?php endif; ?>
		</div>
	</section>
	<?php endif; ?>

	<!-- ── PAST TOPICS ───────────────────────────────────── -->
	<?php if ( ! empty( $topics_items ) ) : ?>
	<section class="evt-topics-section">
		<h2 class="fig-section-heading"><?php echo esc_html( $topics_heading ); ?></h2>
		<div class="evt-topics-list">
			<?php foreach ( $topics_items as $topic ) :
				$t_img = slingshot_evt_img_url( $topic['image'] ?? '', 'medium_large' );
				$t_url = slingshot_lp_h_attr( $topic['url'] ?? '#' );
			?>
			<a href="<?php echo $t_url; ?>" class="evt-topic">
				<div class="evt-topic-img" style="<?php echo $t_img ? '' : 'background:linear-gradient(135deg,#2A1878,#6D44B7)'; ?>">
					<?php if ( $t_img ) : ?>
					<img src="<?php echo esc_url( $t_img ); ?>" alt="">
					<?php endif; ?>
				</div>
				<div>
					<?php if ( ! empty( $topic['date'] ) ) : ?>
					<div class="evt-topic-date"><?php echo esc_html( $topic['date'] ); ?></div>
					<?php endif; ?>
					<h3 class="evt-topic-title"><?php echo esc_html( $topic['title'] ?? '' ); ?></h3>
					<?php if ( ! empty( $topic['desc'] ) ) : ?>
					<p class="evt-topic-desc"><?php echo esc_html( $topic['desc'] ); ?></p>
					<?php endif; ?>
				</div>
			</a>
			<?php endforeach; ?>
		</div>
	</section>
	<?php endif; ?>

	<!-- ── PARTNER + FORM ────────────────────────────────── -->
	<section class="evt-partner-section">
		<div class="evt-partner-content">
			<?php if ( $partner_eyebrow ) : ?>
			<div class="fig-eyebrow"><?php echo esc_html( $partner_eyebrow ); ?></div>
			<?php endif; ?>
			<h2 class="fig-section-heading"><?php echo esc_html( $partner_heading ); ?></h2>
			<?php if ( $partner_desc ) : ?>
			<p class="evt-partner-desc"><?php echo esc_html( $partner_desc ); ?></p>
			<?php endif; ?>
		</div>
		<div class="evt-partner-form">
			<h3 class="evt-partner-form-heading"><?php echo esc_html( $partner_form_heading ); ?></h3>
			<?php if ( $partner_gf_id && function_exists( 'gravity_form' ) ) :
				gravity_form( $partner_gf_id, false, false, false, null, true, 1 );
			else : ?>
			<form class="fig-form" method="post" action="<?php echo slingshot_lp_h_attr( $partner_form_action_url ); ?>">
				<div class="fig-form-row">
					<input type="text" name="first_name" class="fig-form-input" placeholder="<?php echo esc_attr( $partner_first_ph ); ?>" required>
					<input type="text" name="last_name" class="fig-form-input" placeholder="<?php echo esc_attr( $partner_last_ph ); ?>" required>
				</div>
				<input type="email" name="email" class="fig-form-input" placeholder="<?php echo esc_attr( $partner_email_ph ); ?>" required>
				<input type="text" name="organization" class="fig-form-input" placeholder="<?php echo esc_attr( $partner_org_ph ); ?>">
				<textarea name="message" class="fig-form-textarea" rows="3" placeholder="<?php echo esc_attr( $partner_message_ph ); ?>"></textarea>
				<button type="submit" class="fig-form-submit"><?php echo esc_html( $partner_submit_text ); ?> &rarr;</button>
			</form>
			<?php endif; ?>
		</div>
	</section>

	<!-- ── SPONSORS ──────────────────────────────────────── -->
	<?php if ( ! empty( $sponsor_logos ) ) : ?>
	<section class="evt-sponsors-section">
		<?php if ( $sponsor_label ) : ?>
		<div class="evt-sponsors-label"><?php echo esc_html( $sponsor_label ); ?></div>
		<?php endif; ?>
		<div class="evt-sponsors-logos">
			<?php foreach ( $sponsor_logos as $logo ) :
				$logo_img = slingshot_evt_img_url( $logo['image'] ?? '', 'medium' );
				if ( ! $logo_img ) continue;
				$logo_url = slingshot_lp_h_attr( $logo['url'] ?? '' );
			?>
			<?php if ( $logo_url ) : ?><a href="<?php echo $logo_url; ?>" target="_blank" rel="noopener"><?php endif; ?>
			<img src="<?php echo esc_url( $logo_img ); ?>" alt="<?php echo esc_attr( $logo['name'] ?? '' ); ?>" class="evt-sponsor-logo">
			<?php if ( $logo_url ) : ?></a><?php endif; ?>
			<?php endforeach; ?>
		</div>
	</section>
	<?php endif; ?>

</div><!-- .evt-page-wrapper -->

<?php get_footer(); ?>
