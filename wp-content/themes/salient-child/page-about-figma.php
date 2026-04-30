<?php
/*
Template Name: About Us Figma
 * Content: Edit Page meta fields (Meta Box).
 */

wp_enqueue_style( 'pages-figma-jakarta', 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap', array(), null );
wp_enqueue_style( 'home-style', get_stylesheet_directory_uri() . '/css/home.css', array(), '1.18' );
wp_enqueue_style( 'service-figma-style', get_stylesheet_directory_uri() . '/css/service-figma.css', array(), '1.6' );
wp_enqueue_style( 'pages-figma-style', get_stylesheet_directory_uri() . '/css/pages-figma.css', array(), '1.0' );
wp_enqueue_style( 'pages-figma-2-style', get_stylesheet_directory_uri() . '/css/pages-figma-2.css', array(), '1.8' );
wp_enqueue_script( 'hp-script', get_stylesheet_directory_uri() . '/js/home.js', array( 'jquery' ), '1.6', true );

get_header();

$img_dir     = get_stylesheet_directory_uri() . '/img';
$mascot_path = get_stylesheet_directory() . '/img/cta-mascot.png';
$mascot_url  = $img_dir . '/cta-mascot.png';

if ( ! function_exists( 'slingshot_abt_parse_records' ) ) {
	function slingshot_abt_parse_records( $raw, $keys ) {
		$records = array();
		foreach ( preg_split( '/\R+/', (string) $raw ) as $line ) {
			$line = trim( $line );
			if ( '' === $line ) {
				continue;
			}
			$parts  = array_map( 'trim', explode( '|', $line ) );
			$record = array();
			foreach ( $keys as $index => $key ) {
				$record[ $key ] = $parts[ $index ] ?? '';
			}
			$records[] = $record;
		}
		return $records;
	}
}

if ( ! function_exists( 'slingshot_abt_img_url' ) ) {
	function slingshot_abt_img_url( $value, $size = 'medium_large' ) {
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

if ( ! function_exists( 'slingshot_abt_paragraphs' ) ) {
	function slingshot_abt_paragraphs( $text ) {
		return array_filter( array_map( 'trim', preg_split( '/\R{2,}/', (string) $text ) ) );
	}
}

$default_team_raw = <<<'TXT'
David Galownia|CEO & President|34280
Chris Howard|CIO & Chief Product Lead|34274
Rachel Foster|Principal Product Designer|34257
Mike Hurd|Principal Developer|34259
Doug Compton|Principal AI Developer|34267
Steve Anderson|Principal Developer & AWS Architect|34276
Dan Murphy|Executive Director of Slingshot Ventures|34268
Maria Poole|Director of Operations|34261
Nathan Thomas|Senior Developer|34258
Michael Thornberry|Senior Developer|34277
Savannah Cherry|Director of Marketing and New Business|34253
Tim Samasiuk|Senior UX/UI Designer|34278
Dan Harrigan|Principal Developer|34269
Sarah Bhatia|Director of AI Product Innovation|34275
Jem Holbrook|Associate Product Lead|34265
Joe Calvert|Principal Developer|34264
Michael Upton|Product Lead|34260
Andrew Meyer|Principal Senior Developer|34271
Iryna Doroshenko|Senior Mobile Developer|34266
Whitney Powell|Sales and Marketing Coordinator|364185
Geoff Ritter|Lead Sales Representative|454887
Brad Green|Senior Developer|454897
Alicja Kempa|Senior Developer|454025
Artem Shynkarenko|Ukraine Delivery Manager|46639
Yulia Shchyhel|Principal QA Analyst|46664
Bohdan Skyba|Principal QA Analyst|46640
Petro Chemerys|QA Engineer|46652
Lyubomyr Krupey|Senior Mobile Developer|46641
Andrii Hlova|Principal Full Stack Developer|46634
Ihor Havrylov|QA Engineer|252491
Oksana Kalitovska|QA Engineer|252493
Orest Pashkevych|Senior Software Engineer|252495
Yurii Marshal|Senior Frontend Developer|46671
Andriy Smetyukh|Principal Full Stack Developer|252488
Oleksandr Lovas|Principal Full Stack Developer|46647
Ivan Shelemba|Full Stack Developer|252492
Andrii Vakhula|Software Engineer|252489
Andriy Maherovskyi|Principal Mobile Developer|452268
Volodymyr Buryi|Senior Software Engineer|252497
Oleh Kachmar|Full Stack Developer|46644
Taras Yarchak|Frontend Developer|252496
TXT;

$default_values = array(
	array(
		'icon_svg' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><rect width="42" height="42" rx="12" fill="#F2EEFF"/><path d="M21 10v4M21 28v4M13.2 13.2l2.8 2.8M26 26l2.8 2.8M10 21h4M28 21h4M13.2 28.8l2.8-2.8M26 16l2.8-2.8" stroke="#7A4FEB" stroke-width="2" stroke-linecap="round"/><circle cx="21" cy="21" r="4.5" stroke="#7A4FEB" stroke-width="2"/></svg>',
		'heading'  => 'Ingenuity',
		'desc'     => 'The ability to be clever, original, and inventive. Creative, innovative, and imaginative.',
	),
	array(
		'icon_svg' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><rect width="42" height="42" rx="12" fill="#EAF8F8"/><path d="M13 22l5 5 11-12" stroke="#23B7B4" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 31h18" stroke="#23B7B4" stroke-width="2" stroke-linecap="round"/></svg>',
		'heading'  => 'Integrity',
		'desc'     => 'Free from pretense, deceit, or hypocrisy. Honest and having strong moral principles.',
	),
	array(
		'icon_svg' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><rect width="42" height="42" rx="12" fill="#FFF3EE"/><path d="M13 29l5-16 11 11-16 5z" stroke="#EF6D63" stroke-width="2" stroke-linejoin="round"/><path d="M18 13l11 11" stroke="#EF6D63" stroke-width="2" stroke-linecap="round"/></svg>',
		'heading'  => 'Adventure',
		'desc'     => 'Having the courage to take risks. Be bold, daring, enterprising, and gutsy.',
	),
	array(
		'icon_svg' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><rect width="42" height="42" rx="12" fill="#F1F6FF"/><path d="M14 20c2-5 12-5 14 0M16 25c2.5 3 7.5 3 10 0" stroke="#4D86D9" stroke-width="2" stroke-linecap="round"/><circle cx="17" cy="20" r="1.5" fill="#4D86D9"/><circle cx="25" cy="20" r="1.5" fill="#4D86D9"/></svg>',
		'heading'  => 'Childlike Spirit',
		'desc'     => 'Curious, spontaneous, fun-loving, inquisitive, and full of energy.',
	),
);

// Hero.
$hero_label    = slingshot_pm( 'abt_hero_label', 'ABOUT US' );
$hero_heading  = slingshot_pm( 'abt_hero_heading', 'For Big Kids & Daredevils' );
$hero_desc     = slingshot_pm( 'abt_hero_desc', 'Embrace the big kid and daredevil inside. Release your curiosity, take the leap, and build software with people who care about impact.' );
$hero_btn_text = slingshot_pm( 'abt_hero_btn_text', 'Meet the Team' );
$hero_btn_url  = slingshot_pm( 'abt_hero_btn_url', '#team' );
$hero_img_a    = slingshot_pm_image( 'abt_hero_img_a', '' );
$hero_img_b    = slingshot_pm_image( 'abt_hero_img_b', '' );
if ( ! $hero_img_a ) {
	$hero_img_a = slingshot_abt_img_url( '384527', 'large' );
}
if ( ! $hero_img_b ) {
	$hero_img_b = slingshot_abt_img_url( '396611', 'large' );
}

// Stats.
$stats_heading = slingshot_pm( 'abt_stats_heading', '20 Years of Software & Tech Expertise' );
$stats_desc    = slingshot_pm( 'abt_stats_desc', "Two decades of helping ambitious companies move faster, build smarter, and grow stronger. Here's what that looks like in numbers." );
$stats_items   = slingshot_pm( 'abt_stats_items', array() );
$stats_items   = is_array( $stats_items ) ? $stats_items : array();
if ( empty( $stats_items ) ) {
	$stats_items = array(
		array( 'number' => '2005', 'label' => 'Founded in Louisville' ),
		array( 'number' => '20+', 'label' => 'Years of expertise' ),
		array( 'number' => '40+', 'label' => 'Team members' ),
		array( 'number' => '100+', 'label' => 'Products and platforms launched' ),
	);
}

// Story.
$story_heading = slingshot_pm( 'abt_story_heading', 'The Story' );
$story_text    = slingshot_pm( 'abt_story_text', "In 2005, a big kid with big dreams founded the company he wanted to work for. He built Slingshot on the idea that creating impactful software comes from being intensely inquisitive while remaining adventurous.\n\nToday, that dream thrives in Slingshot's culture of creativity, curiosity, fun, and exploration. With age comes wisdom, but the spirit of adventure is still alive. Most importantly, Slingshot still defines success as building software that has a profound impact for clients." );
$story_img_a   = slingshot_pm_image( 'abt_story_img_a', '' );
$story_img_b   = slingshot_pm_image( 'abt_story_img_b', '' );
$story_img_c   = slingshot_pm_image( 'abt_story_img_c', '' );
if ( ! $story_img_a ) {
	$story_img_a = slingshot_abt_img_url( '451086', 'large' );
}
if ( ! $story_img_b ) {
	$story_img_b = slingshot_abt_img_url( '391757', 'large' );
}
if ( ! $story_img_c ) {
	$story_img_c = slingshot_abt_img_url( '455325', 'large' );
}

// Values.
$values_heading = slingshot_pm( 'abt_values_heading', 'The Values That Keep Us Moving' );
$values_desc    = slingshot_pm( 'abt_values_desc', 'We keep the work grounded in curiosity, honesty, courage, and a little bit of play.' );
$values_items   = slingshot_pm( 'abt_values_items', array() );
$values_items   = is_array( $values_items ) && $values_items ? $values_items : $default_values;

// Team.
$team_heading = slingshot_pm( 'abt_team_heading', 'Meet the Team That Makes it Happen' );
$team_desc    = slingshot_pm( 'abt_team_desc', 'Product thinkers, designers, engineers, strategists, and operators working together across the U.S. and Europe.' );
$team_members = slingshot_pm( 'abt_team_members', array() );
$team_members = is_array( $team_members ) && $team_members ? $team_members : slingshot_abt_parse_records( $default_team_raw, array( 'name', 'role', 'photo' ) );

// Testimonials.
$test_heading = slingshot_pm( 'abt_test_heading', 'Our Clients Are the Best Stories' );
$test_items   = slingshot_pm( 'abt_test_items', array() );
$test_items   = is_array( $test_items ) ? $test_items : array();
if ( empty( $test_items ) ) {
	$test_items = array(
		array(
			'quote'   => "Slingshot understood our unique vision; it was clear they had a high level of expertise. They came up with a solution that fit our needs, and we felt involved during the entire process. We plan on working with Slingshot again, and see them as partners rather than another software vendor.",
			'name'    => 'Mary Clyde Pierce, MD',
			'company' => "Professor of Pediatrics | Ann & Robert H. Lurie Children's Hospital of Chicago",
			'avatar'  => '7027',
		),
	);
}

// CTA.
$cta_heading  = slingshot_pm( 'abt_cta_heading', 'Ready to Launch Something Bold?' );
$cta_desc     = slingshot_pm( 'abt_cta_desc', "We partner with ambitious companies to design and build products people love. Let's talk." );
$cta_btn_text = slingshot_pm( 'abt_cta_btn_text', "Let's Talk" );
$cta_btn_url  = slingshot_pm( 'abt_cta_btn_url', '/contact/' );
?>
<style>
body.page-template-page-about-figma #header-outer,
body.page-template-page-about-figma #header-space { display:none !important; }
</style>

<?php slingshot_render_redesign_header( array( 'variant' => 'light' ) ); ?>

<div class="abt-page-wrapper">
	<section class="fig-hero abt-hero">
		<div class="fig-hero-blob fig-hero-blob-1"></div>
		<div class="fig-hero-blob fig-hero-blob-2"></div>

		<div class="abt-hero-inner">
			<div class="abt-hero-content">
				<?php if ( $hero_label ) : ?>
				<div class="abt-hero-label"><?php echo esc_html( $hero_label ); ?></div>
				<?php endif; ?>
				<h1 class="abt-hero-heading"><?php echo esc_html( $hero_heading ); ?></h1>
				<?php if ( $hero_desc ) : ?>
				<p class="abt-hero-desc"><?php echo esc_html( $hero_desc ); ?></p>
				<?php endif; ?>
				<?php if ( $hero_btn_text && $hero_btn_url ) : ?>
				<a href="<?php echo slingshot_lp_h_attr( $hero_btn_url ); ?>" class="abt-hero-btn">
					<?php echo esc_html( $hero_btn_text ); ?> &rarr;
				</a>
				<?php endif; ?>
			</div>

			<?php if ( $hero_img_a || $hero_img_b ) : ?>
			<div class="abt-hero-photos">
				<?php if ( $hero_img_a ) : ?>
				<div class="abt-hero-photo abt-hero-photo-a">
					<img src="<?php echo esc_url( $hero_img_a ); ?>" alt="">
				</div>
				<?php endif; ?>
				<?php if ( $hero_img_b ) : ?>
				<div class="abt-hero-photo abt-hero-photo-b">
					<img src="<?php echo esc_url( $hero_img_b ); ?>" alt="">
				</div>
				<?php endif; ?>
			</div>
			<?php endif; ?>
		</div>
	</section>

	<section class="abt-stats-section">
		<div class="abt-section-head abt-section-head--split">
			<div>
				<div class="fig-eyebrow">By the numbers</div>
				<h2 class="fig-section-heading"><?php echo esc_html( $stats_heading ); ?></h2>
			</div>
			<?php if ( $stats_desc ) : ?>
			<p><?php echo esc_html( $stats_desc ); ?></p>
			<?php endif; ?>
		</div>
		<div class="abt-stats-grid">
			<?php foreach ( $stats_items as $stat ) : ?>
			<div class="abt-stat">
				<div class="abt-stat-number"><?php echo esc_html( $stat['number'] ?? '' ); ?></div>
				<div class="abt-stat-label"><?php echo esc_html( $stat['label'] ?? '' ); ?></div>
			</div>
			<?php endforeach; ?>
		</div>
	</section>

	<section class="abt-story-section">
		<div class="abt-story-copy">
			<?php if ( $story_heading ) : ?>
			<h2 class="fig-section-heading"><?php echo esc_html( $story_heading ); ?></h2>
			<?php endif; ?>
			<?php foreach ( slingshot_abt_paragraphs( $story_text ) as $para ) : ?>
			<p><?php echo esc_html( $para ); ?></p>
			<?php endforeach; ?>
		</div>
		<?php if ( $story_img_a ) : ?>
		<div class="abt-story-imgs">
			<div class="abt-story-img abt-story-img--a">
				<img src="<?php echo esc_url( $story_img_a ); ?>" alt="" loading="lazy">
			</div>
			<?php if ( $story_img_b ) : ?>
			<div class="abt-story-img abt-story-img--b">
				<img src="<?php echo esc_url( $story_img_b ); ?>" alt="" loading="lazy">
			</div>
			<?php endif; ?>
			<?php if ( $story_img_c ) : ?>
			<div class="abt-story-img abt-story-img--c">
				<img src="<?php echo esc_url( $story_img_c ); ?>" alt="" loading="lazy">
			</div>
			<?php endif; ?>
		</div>
		<?php endif; ?>
	</section>

	<section class="abt-values-section">
		<div class="abt-section-head abt-section-head--split">
			<div>
				<div class="fig-eyebrow">How we work</div>
				<h2 class="fig-section-heading"><?php echo esc_html( $values_heading ); ?></h2>
			</div>
			<?php if ( $values_desc ) : ?>
			<p><?php echo esc_html( $values_desc ); ?></p>
			<?php endif; ?>
		</div>
		<div class="abt-values-grid">
			<?php foreach ( $values_items as $item ) : ?>
			<div class="abt-value-card">
				<?php if ( ! empty( $item['icon_svg'] ) ) : ?>
				<div class="abt-value-icon"><?php echo $item['icon_svg']; ?></div>
				<?php endif; ?>
				<h3><?php echo esc_html( $item['heading'] ?? '' ); ?></h3>
				<p><?php echo esc_html( $item['desc'] ?? '' ); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
	</section>

	<?php if ( ! empty( $team_members ) ) : ?>
	<section class="abt-team-section" id="team">
		<div class="abt-section-head abt-section-head--split">
			<div>
				<div class="fig-eyebrow">Our People</div>
				<h2 class="fig-section-heading"><?php echo esc_html( $team_heading ); ?></h2>
			</div>
			<?php if ( $team_desc ) : ?>
			<p><?php echo esc_html( $team_desc ); ?></p>
			<?php endif; ?>
		</div>
		<div class="abt-team-grid">
			<?php foreach ( $team_members as $member ) :
				$photo = ! empty( $member['photo'] ) ? slingshot_abt_img_url( $member['photo'], 'medium' ) : '';
				$name  = $member['name'] ?? '';
				$role  = $member['role'] ?? '';
				?>
			<div class="abt-team-card">
				<div class="abt-team-photo">
					<?php if ( $photo ) : ?>
					<img src="<?php echo esc_url( $photo ); ?>" alt="<?php echo esc_attr( $name ); ?>" loading="lazy">
					<?php endif; ?>
				</div>
				<?php if ( $name ) : ?><div class="abt-team-name"><?php echo esc_html( $name ); ?></div><?php endif; ?>
				<?php if ( $role ) : ?><div class="abt-team-role"><?php echo esc_html( $role ); ?></div><?php endif; ?>
			</div>
			<?php endforeach; ?>
		</div>
	</section>
	<?php endif; ?>

	<section class="abt-testimonial-section">
		<div class="abt-section-head">
			<div class="fig-eyebrow">Client Stories</div>
			<h2 class="fig-section-heading"><?php echo esc_html( $test_heading ); ?></h2>
		</div>
		<div class="abt-testimonials-grid">
			<?php foreach ( $test_items as $item ) :
				$avatar = ! empty( $item['avatar'] ) ? slingshot_abt_img_url( $item['avatar'], 'thumbnail' ) : '';
				?>
			<div class="abt-testimonial-card">
				<p class="abt-testimonial-quote"><?php echo esc_html( $item['quote'] ?? '' ); ?></p>
				<div class="abt-testimonial-person">
					<div class="abt-testimonial-avatar">
						<?php if ( $avatar ) : ?>
						<img src="<?php echo esc_url( $avatar ); ?>" alt="<?php echo esc_attr( $item['name'] ?? '' ); ?>">
						<?php endif; ?>
					</div>
					<div>
						<div class="abt-testimonial-name"><?php echo esc_html( $item['name'] ?? '' ); ?></div>
						<div class="abt-testimonial-company"><?php echo esc_html( $item['company'] ?? '' ); ?></div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</section>

	<section class="fig-cta abt-cta">
		<div class="fig-cta-blob"></div>
		<div class="fig-cta-mascot">
			<?php if ( file_exists( $mascot_path ) ) : ?>
			<img src="<?php echo esc_url( $mascot_url ); ?>" alt="Slingshot mascot">
			<?php endif; ?>
		</div>
		<div class="fig-cta-body">
			<h2 class="fig-cta-heading"><?php echo esc_html( $cta_heading ); ?></h2>
			<?php if ( $cta_desc ) : ?>
			<p class="fig-cta-desc"><?php echo esc_html( $cta_desc ); ?></p>
			<?php endif; ?>
			<a href="<?php echo slingshot_lp_h_attr( $cta_btn_url ); ?>" class="fig-cta-btn" data-sl-modal="contact">
				<?php echo esc_html( $cta_btn_text ); ?> &rarr;
			</a>
		</div>
	</section>
</div>

<?php get_footer(); ?>
