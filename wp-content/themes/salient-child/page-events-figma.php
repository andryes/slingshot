<?php
/*
Template Name: Events Figma
 * Content: Edit Page meta fields (Meta Box).
 */

wp_enqueue_style( 'pages-figma-jakarta',  'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap', array(), null );
wp_enqueue_style( 'home-style',           get_stylesheet_directory_uri() . '/css/home.css',          array(), '1.18' );
wp_enqueue_style( 'service-figma-style',  get_stylesheet_directory_uri() . '/css/service-figma.css', array(), '1.6' );
wp_enqueue_style( 'pages-figma-style',    get_stylesheet_directory_uri() . '/css/pages-figma.css',   array(), '1.0' );
wp_enqueue_style( 'pages-figma-2-style',  get_stylesheet_directory_uri() . '/css/pages-figma-2.css', array(), '1.0' );
wp_enqueue_script( 'hp-script',           get_stylesheet_directory_uri() . '/js/home.js',            array( 'jquery' ), '1.6', true );

get_header();

$img_dir     = get_stylesheet_directory_uri() . '/img';
$mascot_path = get_stylesheet_directory() . '/img/cta-mascot.png';
$mascot_url  = $img_dir . '/cta-mascot.png';

// ── Hero ──────────────────────────────────────────────────────
$hero_heading  = slingshot_pm( 'evts_hero_heading',  'Bring Slingshot to Your Stage' );
$hero_desc     = slingshot_pm( 'evts_hero_desc',     "We speak at conferences, lead workshops, and host events that bring clarity to leaders navigating technology, AI, and building great teams. Let's show up where it matters." );
$hero_btn_text = slingshot_pm( 'evts_hero_btn_text', 'Request a Speaker' );
$hero_btn_url  = slingshot_pm( 'evts_hero_btn_url',  '#request-speaker' );
$hero_img_a    = slingshot_pm_image( 'evts_hero_img_a', '' );
$hero_img_b    = slingshot_pm_image( 'evts_hero_img_b', '' );

// ── Upcoming ──────────────────────────────────────────────────
$upcoming_heading = slingshot_pm( 'evts_upcoming_heading', 'Upcoming Speaking Engagements' );
$upcoming_cards   = slingshot_pm( 'evts_upcoming_cards', [] );
$upcoming_cards   = is_array( $upcoming_cards ) ? $upcoming_cards : [];
if ( empty( $upcoming_cards ) ) {
	$upcoming_cards = [
		[
			'image'    => '',
			'img_bg'   => 'linear-gradient(135deg,#2A1878,#6D44B7)',
			'date'     => 'OCTOBER 21, 2025 · LOUISVILLE, KY',
			'title'    => 'Louisville AI Exchange and TechFest',
			'location' => 'Louisville, KY',
			'url'      => '/events/louisville-ai-exchange',
			'cta'      => 'Register →',
		],
		[
			'image'    => '',
			'img_bg'   => 'linear-gradient(135deg,#0d6e6b,#23B7B4)',
			'date'     => 'NOVEMBER 5, 2025 · NASHVILLE, TN',
			'title'    => 'SouthEast TechSummit',
			'location' => 'Nashville, TN',
			'url'      => '#',
			'cta'      => 'Register →',
		],
		[
			'image'    => '',
			'img_bg'   => 'linear-gradient(135deg,#1B1060,#4B23B0)',
			'date'     => 'FEBRUARY 12, 2026 · ONLINE',
			'title'    => 'AI Product Leadership Summit',
			'location' => 'Online',
			'url'      => '#',
			'cta'      => 'Register →',
		],
	];
}

// ── Past events ───────────────────────────────────────────────
$past_heading = slingshot_pm( 'evts_past_heading', "Where We've Shared Our Expertise" );
$past_tabs    = slingshot_pm( 'evts_past_tabs',    "All\nConferences\nWorkshops\nMeetups" );
$past_cards   = slingshot_pm( 'evts_past_cards', [] );
$past_cards   = is_array( $past_cards ) ? $past_cards : [];
if ( empty( $past_cards ) ) {
	$past_cards = [
		[ 'image' => '', 'img_bg' => 'linear-gradient(135deg,#2A1878,#6D44B7)', 'title' => 'Louisville AI Exchange and TechFest', 'date_location' => 'October 2024 · Louisville, KY', 'url' => '#', 'category' => 'Conferences' ],
		[ 'image' => '', 'img_bg' => 'linear-gradient(135deg,#0d6e6b,#23B7B4)', 'title' => 'Louisville AI Exchange and TechFest', 'date_location' => 'September 2024 · Louisville, KY', 'url' => '#', 'category' => 'Conferences' ],
		[ 'image' => '', 'img_bg' => 'linear-gradient(135deg,#2A1878,#4B23B0)', 'title' => 'Louisville AI Exchange and TechFest', 'date_location' => 'May 2024 · Louisville, KY', 'url' => '#', 'category' => 'Meetups' ],
		[ 'image' => '', 'img_bg' => 'linear-gradient(135deg,#1a0945,#3a1278)', 'title' => 'Louisville AI Exchange and TechFest', 'date_location' => 'March 2024 · Louisville, KY', 'url' => '#', 'category' => 'Workshops' ],
		[ 'image' => '', 'img_bg' => 'linear-gradient(135deg,#0d6e6b,#23B7B4)', 'title' => 'Louisville AI Exchange and TechFest', 'date_location' => 'January 2024 · Louisville, KY', 'url' => '#', 'category' => 'Meetups' ],
		[ 'image' => '', 'img_bg' => 'linear-gradient(135deg,#2A1878,#6D44B7)', 'title' => 'Louisville AI Exchange and TechFest', 'date_location' => 'October 2023 · Louisville, KY', 'url' => '#', 'category' => 'Conferences' ],
	];
}

$past_tab_list = array_values( array_filter( array_map( 'trim', explode( "\n", $past_tabs ) ) ) );

// ── Speakers ──────────────────────────────────────────────────
$speak_heading  = slingshot_pm( 'evts_speak_heading', 'Speaker Spotlights' );
$speak_featured = slingshot_pm( 'evts_speak_featured', [] );
$speak_featured = is_array( $speak_featured ) ? $speak_featured : [];
$speak_rows     = slingshot_pm( 'evts_speak_rows', [] );
$speak_rows     = is_array( $speak_rows ) ? $speak_rows : [];

// ── Form ──────────────────────────────────────────────────────
$form_heading      = slingshot_pm( 'evts_form_heading', 'Bring Slingshot to Your Audience' );
$form_desc         = slingshot_pm( 'evts_form_desc', "We're looking for speaking opportunities that bring real value — panels, keynotes, workshops, and podcasts where ideas meet execution. Tell us what you have in mind." );
$form_card_heading = slingshot_pm( 'evts_form_card_heading', 'Request a Speaker' );
$form_gf_id        = (int) slingshot_pm( 'evts_form_gf_id', 0 );
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
				$img   = ! empty( $card['image'] ) ? slingshot_lp_attachment_url( $card['image'], '', 'medium_large' ) : '';
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
					<?php if ( ! empty( $card['location'] ) ) : ?>
					<div class="evts-upcoming-location"><?php echo esc_html( $card['location'] ); ?></div>
					<?php endif; ?>
					<span class="evts-upcoming-cta"><?php echo esc_html( $card['cta'] ?? 'Register →' ); ?></span>
				</div>
			</a>
			<?php endforeach; ?>
		</div>
	</section>
	<?php endif; ?>

	<!-- ── PAST EVENTS ───────────────────────────────────── -->
	<?php if ( ! empty( $past_cards ) ) : ?>
	<section class="evts-past-section">
		<div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:16px;">
			<h2 class="fig-section-heading" style="margin:0;"><?php echo esc_html( $past_heading ); ?></h2>
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
				$img = ! empty( $card['image'] ) ? slingshot_lp_attachment_url( $card['image'], '', 'medium_large' ) : '';
				$bg  = $card['img_bg'] ?? 'linear-gradient(135deg,#1a0945,#3a1278)';
				$cat = $card['category'] ?? 'All';
				$url = slingshot_lp_h_attr( $card['url'] ?? '#' );
			?>
			<a href="<?php echo $url; ?>" class="evts-past-card" data-evts-cat="<?php echo esc_attr( $cat ); ?>">
				<div class="evts-past-img" style="<?php echo $img ? '' : 'background:' . esc_attr( $bg ); ?>">
					<?php if ( $img ) : ?>
					<img src="<?php echo esc_url( $img ); ?>" alt="" loading="lazy">
					<?php endif; ?>
				</div>
				<div class="evts-past-body">
					<div class="evts-past-title"><?php echo esc_html( $card['title'] ?? '' ); ?></div>
					<?php if ( ! empty( $card['date_location'] ) ) : ?>
					<div class="evts-past-meta"><?php echo esc_html( $card['date_location'] ); ?></div>
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
				$avatar = ! empty( $sp['avatar'] ) ? slingshot_lp_attachment_url( $sp['avatar'], '', 'medium' ) : '';
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
				$avatar = ! empty( $sp['avatar'] ) ? slingshot_lp_attachment_url( $sp['avatar'], '', 'thumbnail' ) : '';
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
			<form class="fig-form" method="post" action="#">
				<div class="fig-form-row">
					<input type="text" class="fig-form-input" placeholder="First Name*" required>
					<input type="text" class="fig-form-input" placeholder="Last Name*" required>
				</div>
				<input type="email" class="fig-form-input" placeholder="Email*" required>
				<input type="text" class="fig-form-input" placeholder="Organization">
				<textarea class="fig-form-textarea" rows="3" placeholder="Tell us about your event and what you're looking for..."></textarea>
				<button type="submit" class="fig-form-submit">Request a Speaker &rarr;</button>
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
