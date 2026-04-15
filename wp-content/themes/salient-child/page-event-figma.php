<?php
/*
Template Name: Event Figma
 * Content: Edit Page meta fields (Meta Box). For individual recurring event series (e.g. Louisville AI Exchange).
 */

wp_enqueue_style( 'pages-figma-jakarta',  'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap', array(), null );
wp_enqueue_style( 'home-style',           get_stylesheet_directory_uri() . '/css/home.css',          array(), '1.18' );
wp_enqueue_style( 'service-figma-style',  get_stylesheet_directory_uri() . '/css/service-figma.css', array(), '1.6' );
wp_enqueue_style( 'pages-figma-style',    get_stylesheet_directory_uri() . '/css/pages-figma.css',   array(), '1.0' );
wp_enqueue_style( 'pages-figma-2-style',  get_stylesheet_directory_uri() . '/css/pages-figma-2.css', array(), '1.0' );
wp_enqueue_script( 'hp-script',           get_stylesheet_directory_uri() . '/js/home.js',            array( 'jquery' ), '1.6', true );

get_header();

$img_dir = get_stylesheet_directory_uri() . '/img';

// ── Hero ──────────────────────────────────────────────────────
$hero_label    = slingshot_pm( 'evt_hero_label',    'EVENTS / LOUISVILLE' );
$hero_heading  = slingshot_pm( 'evt_hero_heading',  get_the_title() );
$hero_desc     = slingshot_pm( 'evt_hero_desc',     "A monthly gathering where Louisville's tech community explores real-world AI in action — candid conversations, expert insights, and a room full of people building what's next." );
$hero_btn_text = slingshot_pm( 'evt_hero_btn_text', 'Register Now' );
$hero_btn_url  = slingshot_pm( 'evt_hero_btn_url',  '#next-meetup' );
$hero_img      = slingshot_pm_image( 'evt_hero_img', '' );

// ── What It Is ────────────────────────────────────────────────
$what_heading = slingshot_pm( 'evt_what_heading', 'Explore Real-World AI in Action' );
$what_desc    = slingshot_pm( 'evt_what_desc',    "The Louisville AI Exchange is a monthly gathering where the tech community comes together, explores real-world AI in action — candid conversations, expert insights, and a room full of people building what's next. Whether you're just starting out or have deployed AI in production, this is the place for you." );
$what_cards   = slingshot_pm( 'evt_what_cards', [] );
$what_cards   = is_array( $what_cards ) ? $what_cards : [];
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
			'desc'     => 'Real stories of scaling AI beyond pilots — what works in production and what doesn\'t.',
		],
		[
			'icon_svg' => '<svg width="44" height="44" viewBox="0 0 44 44" fill="none"><rect width="44" height="44" rx="12" fill="#6D44B7" fill-opacity=".1"/><rect x="13" y="14" width="18" height="16" rx="4" stroke="#6D44B7" stroke-width="1.8"/><path d="M18 22h8M22 18v8" stroke="#6D44B7" stroke-width="1.5" stroke-linecap="round"/></svg>',
			'heading'  => 'Building with AI Search Intelligence',
			'desc'     => 'Technical deep-dives on RAG, embeddings, and using AI to transform how people find and use information.',
		],
		[
			'icon_svg' => '<svg width="44" height="44" viewBox="0 0 44 44" fill="none"><rect width="44" height="44" rx="12" fill="#23B7B4" fill-opacity=".1"/><path d="M14 30l7-16 7 16" stroke="#23B7B4" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><path d="M16.5 25h11" stroke="#23B7B4" stroke-width="1.5" stroke-linecap="round"/></svg>',
			'heading'  => 'AI in Practice',
			'desc'     => 'Practitioners share what they\'ve actually built — the messy, real version of AI projects.',
		],
		[
			'icon_svg' => '<svg width="44" height="44" viewBox="0 0 44 44" fill="none"><rect width="44" height="44" rx="12" fill="#6D44B7" fill-opacity=".1"/><circle cx="22" cy="18" r="5" stroke="#6D44B7" stroke-width="1.8"/><path d="M13 32c0-4.97 4.03-9 9-9s9 4.03 9 9" stroke="#6D44B7" stroke-width="1.8" stroke-linecap="round"/></svg>',
			'heading'  => 'AI & Society',
			'desc'     => 'Exploring the broader implications of AI — workforce, ethics, education, and community impact.',
		],
		[
			'icon_svg' => '<svg width="44" height="44" viewBox="0 0 44 44" fill="none"><rect width="44" height="44" rx="12" fill="#23B7B4" fill-opacity=".1"/><path d="M18 14h8M16 19h12M14 24h16M12 29h20" stroke="#23B7B4" stroke-width="1.8" stroke-linecap="round"/></svg>',
			'heading'  => 'Starting with AI',
			'desc'     => 'For those just beginning — how to think about AI for your business and where to start without getting overwhelmed.',
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

// ── Past Topics ───────────────────────────────────────────────
$topics_heading = slingshot_pm( 'evt_topics_heading', 'Past Topics' );
$topics_items   = slingshot_pm( 'evt_topics_items', [] );
$topics_items   = is_array( $topics_items ) ? $topics_items : [];

// ── Partner / Sponsor ─────────────────────────────────────────
$partner_heading  = slingshot_pm( 'evt_partner_heading',  'Partner With Us' );
$partner_desc     = slingshot_pm( 'evt_partner_desc',     "We're looking for businesses and organizations to join us in building Louisville's thriving tech ecosystem. Interested in sponsoring or becoming a community partner? Let's connect." );
$partner_form_heading = slingshot_pm( 'evt_partner_form_heading', 'Request a Speaker' );
$partner_gf_id    = (int) slingshot_pm( 'evt_partner_gf_id', 0 );

$sponsor_label  = slingshot_pm( 'evt_sponsor_label', 'Sponsored By' );
$sponsor_logos  = slingshot_pm( 'evt_sponsor_logos', [] );
$sponsor_logos  = is_array( $sponsor_logos ) ? $sponsor_logos : [];
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
		<div style="display:grid;grid-template-columns:1fr 1fr;gap:40px;align-items:start;margin-bottom:32px;">
			<div>
				<h2 class="fig-section-heading" style="margin:0 0 12px;"><?php echo esc_html( $what_heading ); ?></h2>
			</div>
			<?php if ( $what_desc ) : ?>
			<p style="font-size:15px;line-height:1.7;color:#4A4A6A;margin:0;"><?php echo esc_html( $what_desc ); ?></p>
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
				$t_img = ! empty( $topic['image'] ) ? slingshot_lp_attachment_url( $topic['image'], '', 'medium' ) : '';
				$t_url = slingshot_lp_h_attr( $topic['url'] ?? '#' );
			?>
			<a href="<?php echo $t_url; ?>" class="evt-topic">
				<div class="evt-topic-img" style="<?php echo $t_img ? '' : 'background:linear-gradient(135deg,#2A1878,#6D44B7)'; ?>">
					<?php if ( $t_img ) : ?>
					<img src="<?php echo esc_url( $t_img ); ?>" alt="" loading="lazy">
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
			<div class="fig-eyebrow">Get Involved</div>
			<h2 class="fig-section-heading"><?php echo esc_html( $partner_heading ); ?></h2>
			<?php if ( $partner_desc ) : ?>
			<p style="font-size:15px;line-height:1.7;color:#4A4A6A;margin:0;"><?php echo esc_html( $partner_desc ); ?></p>
			<?php endif; ?>
		</div>
		<div class="evt-partner-form">
			<h3 class="fig-section-heading" style="font-size:20px;margin:0 0 20px;"><?php echo esc_html( $partner_form_heading ); ?></h3>
			<?php if ( $partner_gf_id && function_exists( 'gravity_form' ) ) :
				gravity_form( $partner_gf_id, false, false, false, null, true, 1 );
			else : ?>
			<form class="fig-form" method="post" action="#">
				<div class="fig-form-row">
					<input type="text" class="fig-form-input" placeholder="First Name*" required>
					<input type="text" class="fig-form-input" placeholder="Last Name*" required>
				</div>
				<input type="email" class="fig-form-input" placeholder="Email*" required>
				<input type="text" class="fig-form-input" placeholder="Organization">
				<textarea class="fig-form-textarea" rows="3" placeholder="How would you like to get involved?"></textarea>
				<button type="submit" class="fig-form-submit">Send Message &rarr;</button>
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
				$logo_img = ! empty( $logo['image'] ) ? slingshot_lp_attachment_url( $logo['image'], '', 'medium' ) : '';
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
