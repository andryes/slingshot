<?php
/*
Template Name: Events Figma
 * Content: Edit Page meta fields (Meta Box).
 */

wp_enqueue_style( 'pages-figma-jakarta',  'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap', array(), null );
wp_enqueue_style( 'home-style',           get_stylesheet_directory_uri() . '/css/home.css',          array(), '1.18' );
wp_enqueue_style( 'service-figma-style',  get_stylesheet_directory_uri() . '/css/service-figma.css', array(), '1.6' );
wp_enqueue_style( 'pages-figma-style',    get_stylesheet_directory_uri() . '/css/pages-figma.css',   array(), '1.0' );
wp_enqueue_style( 'pages-figma-2-style',  get_stylesheet_directory_uri() . '/css/pages-figma-2.css', array(), '1.9' );
wp_enqueue_script( 'hp-script',           get_stylesheet_directory_uri() . '/js/home.js',            array( 'jquery' ), '1.6', true );

get_header();

$img_dir     = get_stylesheet_directory_uri() . '/img';
$mascot_path = get_stylesheet_directory() . '/img/cta-mascot.png';
$mascot_url  = $img_dir . '/cta-mascot.png';

if ( ! function_exists( 'slingshot_evts_img_url' ) ) {
	function slingshot_evts_img_url( $value, $size = 'medium_large' ) {
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

if ( ! function_exists( 'slingshot_evts_filter_rows' ) ) {
	function slingshot_evts_filter_rows( $rows, $content_keys ) {
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

if ( ! function_exists( 'slingshot_evts_venue_label' ) ) {
	function slingshot_evts_venue_label( $venue_id ) {
		$venue_id = absint( $venue_id );
		if ( ! $venue_id ) {
			return '';
		}
		$city  = trim( (string) get_post_meta( $venue_id, '_VenueCity', true ) );
		$state = trim( (string) get_post_meta( $venue_id, '_VenueState', true ) );
		$parts = array_filter( array( $city, $state ) );
		return $parts ? implode( ', ', $parts ) : get_the_title( $venue_id );
	}
}

if ( ! function_exists( 'slingshot_evts_event_cards' ) ) {
	function slingshot_evts_event_cards( $limit = 6 ) {
		$events = get_posts(
			array(
				'post_type'      => 'tribe_events',
				'post_status'    => 'publish',
				'posts_per_page' => $limit,
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

		$fallback_images = array( '455236', '455177', '455176', '455239', '455323', '455325' );
		$cards           = array();
		foreach ( $events as $index => $event ) {
			$event_id = (int) $event->ID;
			$start    = get_post_meta( $event_id, '_EventStartDate', true );
			$date     = $start ? wp_date( 'F j, Y', strtotime( $start ) ) : get_the_date( 'F j, Y', $event_id );
			$venue    = slingshot_evts_venue_label( get_post_meta( $event_id, '_EventVenueID', true ) );
			$image    = get_the_post_thumbnail_url( $event_id, 'large' );
			if ( ! $image && isset( $fallback_images[ $index ] ) ) {
				$image = slingshot_evts_img_url( $fallback_images[ $index ], 'large' );
			}

			$cards[] = array(
				'image_url' => $image,
				'date'      => strtoupper( $venue ? $date . ' · ' . $venue : $date ),
				'title'     => get_the_title( $event_id ),
				'desc'      => wp_strip_all_tags( get_the_excerpt( $event_id ) ),
				'location'  => $venue,
				'url'       => get_permalink( $event_id ),
				'cta'       => 'Register',
			);
		}

		return $cards;
	}
}

// ── Hero ──────────────────────────────────────────────────────
$hero_heading  = slingshot_pm( 'evts_hero_heading',  'Bring Slingshot to Your Stage' );
$hero_desc     = slingshot_pm( 'evts_hero_desc',     "We speak at conferences, lead workshops, and host events that bring clarity to leaders navigating technology, AI, and building great teams. Let's show up where it matters." );
$hero_btn_text = slingshot_pm( 'evts_hero_btn_text', 'Request a Speaker' );
$hero_btn_url  = slingshot_pm( 'evts_hero_btn_url',  '#request-speaker' );
$hero_img_a    = slingshot_pm_image( 'evts_hero_img_a', '' );
$hero_img_b    = slingshot_pm_image( 'evts_hero_img_b', '' );
if ( ! $hero_img_a ) {
	$hero_img_a = slingshot_evts_img_url( '455236', 'large' );
}
if ( ! $hero_img_b ) {
	$hero_img_b = slingshot_evts_img_url( '455177', 'large' );
}

// ── Upcoming ──────────────────────────────────────────────────
$upcoming_heading = slingshot_pm( 'evts_upcoming_heading', 'Upcoming Speaking Engagements' );
$upcoming_cards   = slingshot_pm( 'evts_upcoming_cards', [] );
$upcoming_cards   = slingshot_evts_filter_rows( $upcoming_cards, array( 'image', 'date', 'title', 'location', 'url', 'desc' ) );
if ( empty( $upcoming_cards ) ) {
	$upcoming_cards = slingshot_evts_event_cards( 6 );
}
if ( empty( $upcoming_cards ) ) {
	$upcoming_cards = [
		[
			'image'    => '455236',
			'img_bg'   => 'linear-gradient(135deg,#2A1878,#6D44B7)',
			'date'     => 'OCTOBER 21, 2026 · LOUISVILLE, KY',
			'title'    => 'Louisville AI Exchange and TechFest',
			'desc'     => 'A practical gathering for leaders building with AI, product strategy, and modern software teams.',
			'location' => 'Louisville, KY',
			'url'      => '/event/louisville-ai-exchange-techfest/',
			'cta'      => 'Register',
		],
		[
			'image'    => '455177',
			'img_bg'   => 'linear-gradient(135deg,#0d6e6b,#23B7B4)',
			'date'     => 'NOVEMBER 12, 2026 · LOUISVILLE, KY',
			'title'    => 'AI Product Strategy Roundtable',
			'desc'     => 'A focused discussion on moving AI ideas from prototype to production-ready product outcomes.',
			'location' => 'Louisville, KY',
			'url'      => '/event/ai-product-strategy-roundtable/',
			'cta'      => 'Register',
		],
		[
			'image'    => '455176',
			'img_bg'   => 'linear-gradient(135deg,#1B1060,#4B23B0)',
			'date'     => 'DECEMBER 3, 2026 · LOUISVILLE, KY',
			'title'    => 'Hands-On AI Product Workshop',
			'desc'     => 'A working session for teams that want to define, validate, and ship better AI-enabled products.',
			'location' => 'Louisville, KY',
			'url'      => '/event/hands-on-ai-product-workshop/',
			'cta'      => 'Register',
		],
	];
}

// ── Past events ───────────────────────────────────────────────
$past_heading = slingshot_pm( 'evts_past_heading', "Where We've Shared Our Expertise" );
$past_tabs    = slingshot_pm( 'evts_past_tabs',    "All\nConferences\nWorkshops\nMeetups" );
$past_cards   = slingshot_pm( 'evts_past_cards', [] );
$past_cards   = slingshot_evts_filter_rows( $past_cards, array( 'image', 'title', 'date_location', 'url', 'category', 'desc' ) );
if ( empty( $past_cards ) ) {
	$past_cards = [
		[ 'image' => '455236', 'img_bg' => 'linear-gradient(135deg,#2A1878,#6D44B7)', 'title' => 'Louisville AI Exchange: Applied AI for Product Teams', 'date_location' => 'April 2026 · Louisville, KY', 'url' => '/event/louisville-ai-exchange-techfest/', 'category' => 'Meetups', 'desc' => 'Community discussion, practical examples, and product strategy for teams building with AI.' ],
		[ 'image' => '455177', 'img_bg' => 'linear-gradient(135deg,#0d6e6b,#23B7B4)', 'title' => 'March Louisville AI Exchange', 'date_location' => 'March 2026 · Louisville, KY', 'url' => '/event/louisville-ai-exchange-techfest/', 'category' => 'Meetups', 'desc' => 'A local room of leaders and builders comparing what is actually working with AI.' ],
		[ 'image' => '455176', 'img_bg' => 'linear-gradient(135deg,#2A1878,#4B23B0)', 'title' => 'Louisville AI Exchange with Alisia McClain', 'date_location' => 'February 2026 · Louisville, KY', 'url' => '/event/louisville-ai-exchange-techfest/', 'category' => 'Conferences', 'desc' => 'A speaker-led session on turning AI curiosity into useful organizational practice.' ],
		[ 'image' => '455239', 'img_bg' => 'linear-gradient(135deg,#1a0945,#3a1278)', 'title' => 'AI Product Strategy Session', 'date_location' => 'January 2026 · Louisville, KY', 'url' => '/event/ai-product-strategy-roundtable/', 'category' => 'Workshops', 'desc' => 'A working conversation for teams prioritizing product outcomes over AI novelty.' ],
		[ 'image' => '455323', 'img_bg' => 'linear-gradient(135deg,#0d6e6b,#23B7B4)', 'title' => 'Hands-On Product Workshop', 'date_location' => 'October 2025 · Louisville, KY', 'url' => '/event/hands-on-ai-product-workshop/', 'category' => 'Workshops', 'desc' => 'A practical session for validating ideas, mapping risk, and defining the next release.' ],
		[ 'image' => '455325', 'img_bg' => 'linear-gradient(135deg,#2A1878,#6D44B7)', 'title' => 'TechFest Leadership Conversation', 'date_location' => 'September 2025 · Louisville, KY', 'url' => '/event/louisville-ai-exchange-techfest/', 'category' => 'Conferences', 'desc' => 'A clear-eyed look at software teams, product leadership, and responsible AI adoption.' ],
	];
}

$past_tab_list = array_values( array_filter( array_map( 'trim', explode( "\n", $past_tabs ) ) ) );

// ── Speakers ──────────────────────────────────────────────────
$speak_heading  = slingshot_pm( 'evts_speak_heading', 'Speaker Spotlights' );
$speak_featured = slingshot_pm( 'evts_speak_featured', [] );
$speak_featured = slingshot_evts_filter_rows( $speak_featured, array( 'avatar', 'name', 'role', 'bio' ) );
$speak_rows     = slingshot_pm( 'evts_speak_rows', [] );
$speak_rows     = slingshot_evts_filter_rows( $speak_rows, array( 'avatar', 'name', 'role', 'desc' ) );
if ( empty( $speak_featured ) ) {
	$speak_featured = array(
		array(
			'avatar' => '34280',
			'name'   => 'David Galownia',
			'role'   => 'CEO & President',
			'bio'    => 'David brings executive-level clarity to product strategy, AI adoption, and the decisions that help teams move from idea to launch.',
		),
		array(
			'avatar' => '34275',
			'name'   => 'Sarah Bhatia',
			'role'   => 'Director of AI Product Innovation',
			'bio'    => 'Sarah leads practical AI workshops and product sessions for teams that need useful outcomes, not theater.',
		),
	);
}
if ( empty( $speak_rows ) ) {
	$speak_rows = array(
		array(
			'avatar' => '34274',
			'name'   => 'Chris Howard',
			'role'   => 'CIO & Chief Product Lead',
			'desc'   => 'Product, architecture, and delivery leadership for teams building complex software.',
		),
		array(
			'avatar' => '34253',
			'name'   => 'Savannah Cherry',
			'role'   => 'Director of Marketing and New Business',
			'desc'   => 'Community, partnership, and event strategy for conversations that turn into momentum.',
		),
	);
}

// ── Form ──────────────────────────────────────────────────────
$form_heading      = slingshot_pm( 'evts_form_heading', 'Bring Slingshot to Your Audience' );
$form_desc         = slingshot_pm( 'evts_form_desc', "We're looking for speaking opportunities that bring real value - panels, keynotes, workshops, and podcasts where ideas meet execution. Tell us what you have in mind." );
$form_card_heading = slingshot_pm( 'evts_form_card_heading', 'Request a Speaker' );
$form_gf_id        = (int) slingshot_pm( 'evts_form_gf_id', 0 );
$form_action_url   = slingshot_pm( 'evts_form_action_url', '#' );
$form_first_ph     = slingshot_pm( 'evts_form_first_placeholder', 'First Name*' );
$form_last_ph      = slingshot_pm( 'evts_form_last_placeholder', 'Last Name*' );
$form_email_ph     = slingshot_pm( 'evts_form_email_placeholder', 'Email*' );
$form_org_ph       = slingshot_pm( 'evts_form_org_placeholder', 'Organization' );
$form_message_ph   = slingshot_pm( 'evts_form_message_placeholder', "Tell us about your event and what you're looking for..." );
$form_submit_text  = slingshot_pm( 'evts_form_submit_text', 'Request a Speaker' );
?>
<style>
body.page-template-page-events-figma #header-outer,
body.page-template-page-events-figma #header-space { display:none !important; }
</style>

<?php slingshot_render_redesign_header( array( 'variant' => 'light' ) ); ?>

<div class="evts-page-wrapper">

	<!-- ── HERO ──────────────────────────────────────────── -->
	<section class="fig-hero">
		<div class="fig-hero-blob fig-hero-blob-1"></div>
		<div class="fig-hero-blob fig-hero-blob-2"></div>

		<div class="evts-hero-inner">
			<div class="evts-hero-content">
				<h1 class="evts-hero-heading"><?php echo esc_html( $hero_heading ); ?></h1>
				<?php if ( $hero_desc ) : ?>
				<p class="evts-hero-desc"><?php echo esc_html( $hero_desc ); ?></p>
				<?php endif; ?>
				<a href="<?php echo slingshot_lp_h_attr( $hero_btn_url ); ?>" class="evts-hero-btn">
					<?php echo esc_html( $hero_btn_text ); ?> &rarr;
				</a>
			</div>

			<?php if ( $hero_img_a || $hero_img_b ) : ?>
			<div class="evts-hero-photo">
				<?php if ( $hero_img_a ) : ?>
				<div class="evts-hero-photo-a">
					<img src="<?php echo esc_url( $hero_img_a ); ?>" alt="">
				</div>
				<?php endif; ?>
				<?php if ( $hero_img_b ) : ?>
				<div class="evts-hero-photo-b">
					<img src="<?php echo esc_url( $hero_img_b ); ?>" alt="">
				</div>
				<?php endif; ?>
			</div>
			<?php endif; ?>
		</div>
	</section>

	<!-- ── UPCOMING ──────────────────────────────────────── -->
	<?php if ( ! empty( $upcoming_cards ) ) : ?>
	<section class="evts-upcoming-section">
		<h2 class="evts-upcoming-heading"><?php echo esc_html( $upcoming_heading ); ?></h2>
		<div class="evts-upcoming-scroll">
			<?php foreach ( $upcoming_cards as $card ) :
				$img   = ! empty( $card['image_url'] ) ? $card['image_url'] : slingshot_evts_img_url( $card['image'] ?? '', 'medium_large' );
				$bg    = $card['img_bg'] ?? 'linear-gradient(135deg,#1a0945,#3a1278)';
				$url   = slingshot_lp_h_attr( $card['url'] ?? '#' );
			?>
			<a href="<?php echo $url; ?>" class="evts-upcoming-card">
				<div class="evts-upcoming-img" style="<?php echo $img ? '' : 'background:' . esc_attr( $bg ); ?>">
					<?php if ( $img ) : ?>
					<img src="<?php echo esc_url( $img ); ?>" alt="">
					<?php endif; ?>
				</div>
				<div class="evts-upcoming-body">
					<?php if ( ! empty( $card['date'] ) ) : ?>
					<div class="evts-upcoming-date"><?php echo esc_html( $card['date'] ); ?></div>
					<?php endif; ?>
					<div class="evts-upcoming-title"><?php echo esc_html( $card['title'] ?? '' ); ?></div>
					<?php if ( ! empty( $card['desc'] ) ) : ?>
					<p class="evts-upcoming-desc"><?php echo esc_html( $card['desc'] ); ?></p>
					<?php endif; ?>
					<?php if ( ! empty( $card['location'] ) ) : ?>
					<div class="evts-upcoming-location"><?php echo esc_html( $card['location'] ); ?></div>
					<?php endif; ?>
					<span class="evts-upcoming-cta"><?php echo esc_html( $card['cta'] ?? 'Register' ); ?> &rarr;</span>
				</div>
			</a>
			<?php endforeach; ?>
		</div>
	</section>
	<?php endif; ?>

	<!-- ── PAST EVENTS ───────────────────────────────────── -->
	<?php if ( ! empty( $past_cards ) ) : ?>
	<section class="evts-past-section">
		<div class="evts-past-head">
			<h2 class="fig-section-heading"><?php echo esc_html( $past_heading ); ?></h2>
			<?php if ( count( $past_tab_list ) > 1 ) : ?>
			<div class="blg-filters-bar evts-past-filters">
				<?php foreach ( $past_tab_list as $tab ) : ?>
				<button type="button" class="blg-filter-btn evts-past-tab <?php echo $tab === 'All' ? 'is-active' : ''; ?>" data-evts-cat="<?php echo esc_attr( $tab ); ?>">
					<?php echo esc_html( $tab ); ?>
				</button>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
		</div>
		<div class="evts-past-grid" id="evts-past-grid">
			<?php foreach ( $past_cards as $card ) :
				$img = ! empty( $card['image_url'] ) ? $card['image_url'] : slingshot_evts_img_url( $card['image'] ?? '', 'medium_large' );
				$bg  = $card['img_bg'] ?? 'linear-gradient(135deg,#1a0945,#3a1278)';
				$cat = $card['category'] ?? 'All';
				$url = slingshot_lp_h_attr( $card['url'] ?? '#' );
			?>
			<a href="<?php echo $url; ?>" class="evts-past-card" data-evts-cat="<?php echo esc_attr( $cat ); ?>">
				<div class="evts-past-img" style="<?php echo $img ? '' : 'background:' . esc_attr( $bg ); ?>">
					<?php if ( $img ) : ?>
					<img src="<?php echo esc_url( $img ); ?>" alt="">
					<?php endif; ?>
				</div>
				<div class="evts-past-body">
					<div class="evts-past-title"><?php echo esc_html( $card['title'] ?? '' ); ?></div>
					<?php if ( ! empty( $card['date_location'] ) ) : ?>
					<div class="evts-past-meta"><?php echo esc_html( $card['date_location'] ); ?></div>
					<?php endif; ?>
					<?php if ( ! empty( $card['desc'] ) ) : ?>
					<p class="evts-past-desc"><?php echo esc_html( $card['desc'] ); ?></p>
					<?php endif; ?>
				</div>
			</a>
			<?php endforeach; ?>
		</div>
	</section>
	<?php endif; ?>

	<!-- ── SPEAKER SPOTLIGHTS ────────────────────────────── -->
	<?php if ( ! empty( $speak_featured ) || ! empty( $speak_rows ) ) : ?>
	<section class="evts-speakers-section">
		<h2 class="fig-section-heading"><?php echo esc_html( $speak_heading ); ?></h2>

		<?php if ( ! empty( $speak_featured ) ) : ?>
		<div class="evts-speakers-list">
			<?php foreach ( $speak_featured as $sp ) :
				$avatar = slingshot_evts_img_url( $sp['avatar'] ?? '', 'medium' );
			?>
			<div class="evts-speaker-card">
				<div class="evts-speaker-blob"></div>
				<div class="evts-speaker-avatar">
					<?php if ( $avatar ) : ?>
					<img src="<?php echo esc_url( $avatar ); ?>" alt="<?php echo esc_attr( $sp['name'] ?? '' ); ?>">
					<?php endif; ?>
				</div>
				<div class="evts-speaker-info">
					<div class="evts-speaker-name"><?php echo esc_html( $sp['name'] ?? '' ); ?></div>
					<div class="evts-speaker-role"><?php echo esc_html( $sp['role'] ?? '' ); ?></div>
					<?php if ( ! empty( $sp['bio'] ) ) : ?>
					<p class="evts-speaker-bio"><?php echo esc_html( $sp['bio'] ); ?></p>
					<?php endif; ?>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>

		<?php if ( ! empty( $speak_rows ) ) : ?>
		<div class="evts-speakers-rows">
			<?php foreach ( $speak_rows as $sp ) :
				$avatar = slingshot_evts_img_url( $sp['avatar'] ?? '', 'thumbnail' );
			?>
			<div class="evts-speaker-row">
				<div class="evts-speaker-row-avatar">
					<?php if ( $avatar ) : ?>
					<img src="<?php echo esc_url( $avatar ); ?>" alt="">
					<?php endif; ?>
				</div>
				<div>
					<div class="evts-speaker-row-name"><?php echo esc_html( $sp['name'] ?? '' ); ?></div>
					<div class="evts-speaker-row-title"><?php echo esc_html( $sp['role'] ?? '' ); ?></div>
					<?php if ( ! empty( $sp['desc'] ) ) : ?>
					<div class="evts-speaker-row-desc"><?php echo esc_html( $sp['desc'] ); ?></div>
					<?php endif; ?>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</section>
	<?php endif; ?>

	<!-- ── REQUEST SPEAKER FORM ──────────────────────────── -->
	<section class="evts-form-section" id="request-speaker">
		<div class="evts-form-blob"></div>
		<div class="evts-form-content">
			<h2 class="evts-form-heading"><?php echo esc_html( $form_heading ); ?></h2>
			<?php if ( $form_desc ) : ?>
			<p class="evts-form-desc"><?php echo esc_html( $form_desc ); ?></p>
			<?php endif; ?>
		</div>
		<div class="evts-form-card">
			<h3 class="evts-form-card-heading"><?php echo esc_html( $form_card_heading ); ?></h3>
			<?php if ( $form_gf_id && function_exists( 'gravity_form' ) ) :
				gravity_form( $form_gf_id, false, false, false, null, true, 1 );
			else : ?>
			<form class="fig-form" method="post" action="<?php echo slingshot_lp_h_attr( $form_action_url ); ?>">
				<div class="fig-form-row">
					<input type="text" name="first_name" class="fig-form-input" placeholder="<?php echo esc_attr( $form_first_ph ); ?>" required>
					<input type="text" name="last_name" class="fig-form-input" placeholder="<?php echo esc_attr( $form_last_ph ); ?>" required>
				</div>
				<input type="email" name="email" class="fig-form-input" placeholder="<?php echo esc_attr( $form_email_ph ); ?>" required>
				<input type="text" name="organization" class="fig-form-input" placeholder="<?php echo esc_attr( $form_org_ph ); ?>">
				<textarea name="message" class="fig-form-textarea" rows="3" placeholder="<?php echo esc_attr( $form_message_ph ); ?>"></textarea>
				<button type="submit" class="fig-form-submit"><?php echo esc_html( $form_submit_text ); ?> &rarr;</button>
			</form>
			<?php endif; ?>
		</div>
	</section>

</div><!-- .evts-page-wrapper -->

<script>
(function(){
	var tabs = document.querySelectorAll('.evts-past-tab');
	var cards = document.querySelectorAll('#evts-past-grid .evts-past-card');
	if ( ! tabs.length ) return;
	tabs.forEach(function(btn){
		btn.addEventListener('click', function(){
			tabs.forEach(function(b){ b.classList.remove('is-active'); });
			btn.classList.add('is-active');
			var cat = btn.getAttribute('data-evts-cat');
			cards.forEach(function(card){
				if ( cat === 'All' || card.getAttribute('data-evts-cat') === cat ) {
					card.style.display = '';
				} else {
					card.style.display = 'none';
				}
			});
		});
	});
})();
</script>

<?php get_footer(); ?>
