<?php
/*
Template Name: Achievements Figma
 * Content: Edit Page meta fields (Meta Box).
 */

wp_enqueue_style( 'pages-figma-jakarta', 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap', array(), null );
wp_enqueue_style( 'home-style', get_stylesheet_directory_uri() . '/css/home.css', array(), '1.18' );
wp_enqueue_style( 'service-figma-style', get_stylesheet_directory_uri() . '/css/service-figma.css', array(), '1.6' );
wp_enqueue_style( 'pages-figma-style', get_stylesheet_directory_uri() . '/css/pages-figma.css', array(), '1.0' );
wp_enqueue_style( 'pages-figma-2-style', get_stylesheet_directory_uri() . '/css/pages-figma-2.css', array(), '1.7' );
wp_enqueue_script( 'hp-script', get_stylesheet_directory_uri() . '/js/home.js', array( 'jquery' ), '1.6', true );

get_header();

$img_dir     = get_stylesheet_directory_uri() . '/img';
$mascot_path = get_stylesheet_directory() . '/img/cta-mascot.png';
$mascot_url  = $img_dir . '/cta-mascot.png';

if ( ! function_exists( 'slingshot_achv_parse_records' ) ) {
	function slingshot_achv_parse_records( $raw, $keys ) {
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

if ( ! function_exists( 'slingshot_achv_img_url' ) ) {
	function slingshot_achv_img_url( $value, $size = 'medium' ) {
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

$default_awards_raw = <<<'TXT'
Tech Reviewer|Top Development Companies in the US|454023|https://techreviewer.co/us/top-web-development-companies
Clutch|Top 1000 B2B Service Provider Globally|453517|https://clutch.co/press-releases/clutch-1000-fall-2023
INC. 5000|INC. 5000 2024 Company|453379|https://www.inc.com/profile/y-slingshot
Design Rush|Top App Development and Healthcare Software Company|12828|https://www.designrush.com/agency/profile/slingshot
Clutch|Top Mobile App Developer in Kentucky and Tennessee|454430|https://clutch.co/app-developers/kentucky
Partners in Philanthropy|Louisville Business First Innovative Partnership Award|12791|https://www.bizjournals.com/louisville/news/2019/09/06/innovative-partnership-software-developer-is.html
Innovation in Business|Best Custom Healthcare Software Development Firm 2024, USA|453854|https://www.innovationinbusiness.com/winners/slingshot/
Clutch|Top Software Developer in Kentucky and Tennessee|454427|https://clutch.co/developers/tennessee
Innovation in Business|UX Design Team of the Year 2024, USA|453855|https://www.innovationinbusiness.com/winners/slingshot/
Clutch|Top Artificial Intelligence Company in Kentucky and Tennessee|454429|https://clutch.co/press-releases/awards-kentucky-2022?utm_campaign=Awards%20Notifications&utm_medium=email&_hsmi=221555460&_hsenc=p2ANqtz-8Y3zDBfrxxQYx60dgzGGYxnQqU5AUosMOj09LDj_p-DwbaP3st4V9H8MnDKWq1JfAzrjTnYr1bFx3KUV6CkqxJxfIFvw&utm_content=221555460&utm_source=hs_email
Goodfirms|Top Mobile App Development Company - Louisville|12811|https://www.goodfirms.co/company/slingshot-1
Clutch|Top UX/UI Design Agency in Kentucky and Tennessee|454426|https://clutch.co/agencies/ui-ux/kentucky
Tech Reviewer|Top Web Design Companies in the United States|346058|https://techreviewer.co/top-web-design-companies/united-states?page=8
Web Excellence Awards|Five Time App and Mobile Design Winner|13983|https://we-awards.com/winner/c2-keep/
AIGA Louisville|Best of UX Design Winner|13986|https://www.facebook.com/reel/447909751009600
Horizon Interactive Awards|Two-time Best in Category Champion|33130|https://www.horizoninteractiveawards.com/2021/winners/winners_list_s
Upcity|Top Mobile App Developer - Louisville|23445|https://upcity.com/mobile-app-development/louisville-ky
CSS Design Awards|Best Innovation|22651|https://www.cssdesignawards.com/sites/p3-advantage/39745
The Manifest|Chicago's Top Recommended Software, UX, and Mobile Firm|31917|https://themanifest.com/press-releases/manifest-features-chicago-illinois-most-recommended-b2b-providers-2022
KY Inno|Inno Under 25 Honoree|361042|https://www.bizjournals.com/louisville/inno/stories/awards/2023/09/15/ky-inno-under-25-savannah-thieneman-cherry-2023.html
Louisville Business First|Louisville's Largest Software Developers List|128844|https://www.bizjournals.com/louisville/subscriber-only/2022/07/22/louisvilles-largest-software-developers.html
Upcity|Top Software Developer - Louisville|23444|https://upcity.com/software-development/louisville-ky
Upcity|Local Excellence Award Winner|12824|https://upcity.com/profiles/slingshot
CSS Design Awards|Best UX Award|22649|https://www.cssdesignawards.com/sites/p3-advantage/39745
Corporate Vision|Best Software & App Development Company For Businesses in Kentucky|12802|https://www.corporatevision-news.com/winners/slingshot/
Upcity|Best of Kentucky Award Winner|195113|https://upcity.com/best-of#year=2022&type=Best%20of%20region&region=Kentucky&list_sort_order=desc&spotlight_profile=profiles/slingshot/louisville
Selected Firms|Top iOS App Development Companies in USA|12837|https://selectedfirms.co/companies/ios-app-development/usa
The Silicon Review|30 Innovative Brands of the Year|12775|https://thesiliconreview.com/magazine/profile/30-innovative-brands-of-the-year-2021-listing
Aspioneer|The 20 Hottest Franchises|12840|https://aspioneer.com/the-20-hottest-companies-in-2020/
The Manifest|Nashville's Top Recommended Design Company|33129|https://themanifest.com/press-releases/awards-manifest-nashville-2022
Software World|Top Rated App Development Company|13982|https://www.softwareworld.co/top-mobile-app-development-companies-in-usa/
CSS Design Awards|Best UI Design|22650|https://www.cssdesignawards.com/sites/p3-advantage/39745
Inc.|Verified Profile|13790|https://www.inc.com/profile/Y-Slingshot
Louisville Business First|Fast 50 Winner 2023|373929|https://www.bizjournals.com/louisville/news/2023/09/06/announcing-fast-50-2023.html
Community Foundation of Louisville|23rd Vogt Awards Winner|373930|https://www.cflouisville.org/community-foundation-of-louisville-announces-the-23rd-vogt-awards-cohort/
UofL|Featured AI Forum Speaker|254543|https://www.youtube.com/watch?v=eR21Z82VNqA&ab_channel=UofLBiz
TXT;

$default_featured_raw = <<<'TXT'
Tech Republic|12874|https://www.techrepublic.com/article/how-slingshot-created-an-open-floor-plan-environment-that-makes-employees-actually-want-to-be-in-the/
Biz First|12876|https://www.bizjournals.com/louisville/news/2020/09/15/louisville-tech-company-launches-startup-arm.html
WDRB|163901|https://www.wdrb.com/news/education/bullitt-county-public-schools-combats-bullying-with-ai-app-for-students/article_15dc5655-d8b9-45a6-a4f5-c6be918a4366.html
Courier Journal|454870|https://www.courier-journal.com/story/news/education/2025/10/08/kentucky-school-district-turns-to-ai-chatbot-to-help-struggling-kids/86061931007/
Wave 3|274013|https://www.wave3.com/2023/04/05/new-mobile-app-helps-identify-child-abuse/
Spectrum News|454871|https://spectrumnews1.com/ky/louisville/news/2025/09/24/bcps-to-release-to-ai-app
UofL CoB|254543|https://business.louisville.edu/slingshot-emerges/
WLKY|454872|https://www.wlky.com/article/bullitt-county-students-design-anti-bullying-app/67953481
Tech First|12866|https://twitter.com/TechFirst_LOU/status/1321154492990136322
RockIT|454869|https://rockitwomen.com/2025sponsors
Medium|27686|https://medium.com/authority-magazine/david-galownia-of-slingshot-5-ways-that-businesses-can-help-promote-the-mental-wellness-of-their-daf1bebfabb0
Indy Chamber|254517|https://indychamber.com/member-listings/slingshot/
Wave 3|12867|https://www.youtube.com/watch?v=T_rYLzJ_yK8
KET|302471|https://ket.org/program/kentucky-edition/may-22-2023/
CIO Today|31919|https://theciotoday.com/most-high-impact-leaders-making-a-difference/
Venture Connectors|302473|https://members.ventureconnectors.org/eventcalendar/Details/june-lunch-the-human-element-of-entrepreneurship-874112
NICHD|302472|https://www.nichd.nih.gov/newsroom/news/060823-LCAST
iHeart Radio|274010|https://www.iheart.com/podcast/269-the-founders-fable-76710435/
TXT;

$default_awards   = slingshot_achv_parse_records( $default_awards_raw, array( 'heading', 'desc', 'badge_img', 'url' ) );
$default_featured = slingshot_achv_parse_records( $default_featured_raw, array( 'name', 'image', 'url' ) );

// Hero.
$hero_heading  = slingshot_pm( 'achv_hero_heading', 'Achievements' );
$hero_desc     = slingshot_pm( 'achv_hero_desc', "Our team's hard work and passion pays off. We're proud of the awards, recognition, and media moments they've earned." );
$hero_btn_text = slingshot_pm( 'achv_hero_btn_text', 'See Our Work' );
$hero_btn_url  = slingshot_pm( 'achv_hero_btn_url', '/work/' );
$hero_img_a    = slingshot_pm_image( 'achv_hero_img_a', '' );
$hero_img_b    = slingshot_pm_image( 'achv_hero_img_b', '' );

// Why.
$why_heading = slingshot_pm( 'achv_why_heading', 'Recognition Built on Real Outcomes' );
$why_cards   = slingshot_pm( 'achv_why_cards', array() );
$why_cards   = is_array( $why_cards ) ? $why_cards : array();
if ( empty( $why_cards ) ) {
	$why_cards = array(
		array(
			'icon_svg' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><rect width="42" height="42" rx="12" fill="#F2EEFF"/><path d="M21 10l3 7.5 8 .6-6.1 5.1 1.9 7.8-6.8-4.2-6.8 4.2 1.9-7.8L10 18.1l8-.6L21 10z" stroke="#7A4FEB" stroke-width="2" stroke-linejoin="round"/></svg>',
			'heading'  => 'Award-Winning Product Work',
			'desc'     => 'Independent organizations continue to recognize the quality, usability, and impact of the digital products we build.',
		),
		array(
			'icon_svg' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><rect width="42" height="42" rx="12" fill="#EAF8F8"/><path d="M13 21l5 5 11-12" stroke="#23B7B4" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M10 31h22" stroke="#23B7B4" stroke-width="2" stroke-linecap="round"/></svg>',
			'heading'  => 'Trusted by Review Platforms',
			'desc'     => 'From Clutch to Tech Reviewer and DesignRush, our reputation is backed by verified client work and market visibility.',
		),
		array(
			'icon_svg' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><rect width="42" height="42" rx="12" fill="#FFF3EE"/><path d="M12 28c2.3-4.4 5.3-6.6 9-6.6s6.7 2.2 9 6.6" stroke="#EF6D63" stroke-width="2" stroke-linecap="round"/><circle cx="21" cy="16" r="5" stroke="#EF6D63" stroke-width="2"/></svg>',
			'heading'  => 'Recognized in the Community',
			'desc'     => 'Our team, partnerships, and leadership have been featured across regional and national business communities.',
		),
	);
}

// Awards and featured logos.
$creds_heading = slingshot_pm( 'achv_creds_heading', 'Awards & Recognition' );
$creds_items   = slingshot_pm( 'achv_creds_items', array() );
$creds_items   = is_array( $creds_items ) && $creds_items ? $creds_items : $default_awards;

$featured_heading = slingshot_pm( 'achv_featured_heading', 'Featured On' );
$featured_logos   = slingshot_pm( 'achv_featured_logos', array() );
$featured_logos   = is_array( $featured_logos ) && $featured_logos ? $featured_logos : $default_featured;

// CTA.
$cta_heading  = slingshot_pm( 'achv_cta_heading', 'Want to Build Something Worth Recognizing?' );
$cta_desc     = slingshot_pm( 'achv_cta_desc', "Let's talk about the product, platform, or team you want to bring to life next." );
$cta_btn_text = slingshot_pm( 'achv_cta_btn_text', "Let's Talk" );
$cta_btn_url  = slingshot_pm( 'achv_cta_btn_url', '/contact/' );

$hero_badges = array_slice( $creds_items, 0, 9 );
?>
<style>
body.page-template-page-achievements-figma #header-outer,
body.page-template-page-achievements-figma #header-space { display:none !important; }
</style>

<?php slingshot_render_redesign_header( array( 'variant' => 'light' ) ); ?>

<div class="achv-page-wrapper">
	<section class="fig-hero achv-hero">
		<div class="fig-hero-blob fig-hero-blob-1"></div>
		<div class="fig-hero-blob fig-hero-blob-2"></div>

		<div class="achv-hero-inner">
			<div class="achv-hero-content">
				<h1 class="achv-hero-heading"><?php echo esc_html( $hero_heading ); ?></h1>
				<?php if ( $hero_desc ) : ?>
				<p class="achv-hero-desc"><?php echo esc_html( $hero_desc ); ?></p>
				<?php endif; ?>
				<?php if ( $hero_btn_text && $hero_btn_url ) : ?>
				<a href="<?php echo slingshot_lp_h_attr( $hero_btn_url ); ?>" class="achv-hero-btn">
					<?php echo esc_html( $hero_btn_text ); ?> &rarr;
				</a>
				<?php endif; ?>
			</div>

			<?php if ( $hero_img_a || $hero_img_b ) : ?>
			<div class="achv-hero-photos">
				<?php if ( $hero_img_a ) : ?>
				<div class="achv-hero-photo achv-hero-photo-a">
					<img src="<?php echo esc_url( $hero_img_a ); ?>" alt="">
				</div>
				<?php endif; ?>
				<?php if ( $hero_img_b ) : ?>
				<div class="achv-hero-photo achv-hero-photo-b">
					<img src="<?php echo esc_url( $hero_img_b ); ?>" alt="">
				</div>
				<?php endif; ?>
			</div>
			<?php elseif ( $hero_badges ) : ?>
			<div class="achv-hero-showcase" aria-hidden="true">
				<?php foreach ( $hero_badges as $badge ) :
					$badge_img = slingshot_achv_img_url( $badge['badge_img'] ?? '', 'medium' );
					?>
				<div class="achv-hero-badge">
					<?php if ( $badge_img ) : ?>
					<img src="<?php echo esc_url( $badge_img ); ?>" alt="">
					<?php else : ?>
					<span><?php echo esc_html( $badge['heading'] ?? '' ); ?></span>
					<?php endif; ?>
				</div>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
		</div>
	</section>

	<section class="achv-why-section">
		<div class="achv-section-head">
			<h2 class="fig-section-heading"><?php echo esc_html( $why_heading ); ?></h2>
		</div>
		<div class="achv-why-grid">
			<?php foreach ( $why_cards as $card ) : ?>
			<div class="achv-why-card">
				<?php if ( ! empty( $card['icon_svg'] ) ) : ?>
				<div class="achv-why-icon"><?php echo $card['icon_svg']; ?></div>
				<?php endif; ?>
				<h3 class="achv-why-heading"><?php echo esc_html( $card['heading'] ?? '' ); ?></h3>
				<p class="achv-why-desc"><?php echo esc_html( $card['desc'] ?? '' ); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
	</section>

	<section class="achv-creds-section">
		<div class="achv-section-head achv-section-head--split">
			<h2 class="fig-section-heading"><?php echo esc_html( $creds_heading ); ?></h2>
			<p>Explore the organizations, publications, and review platforms that have recognized Slingshot's work.</p>
		</div>
		<div class="achv-awards-grid">
			<?php foreach ( $creds_items as $cred ) :
				$badge_img = slingshot_achv_img_url( $cred['badge_img'] ?? '', 'medium' );
				$badge_svg = $cred['badge_svg'] ?? '';
				$award_url = trim( (string) ( $cred['url'] ?? '' ) );
				$tag       = $award_url ? 'a' : 'div';
				?>
			<<?php echo esc_html( $tag ); ?> class="achv-award-card"<?php if ( $award_url ) : ?> href="<?php echo slingshot_lp_h_attr( $award_url ); ?>" target="_blank" rel="noopener"<?php endif; ?>>
				<div class="achv-award-media">
					<?php if ( $badge_img ) : ?>
					<img src="<?php echo esc_url( $badge_img ); ?>" alt="<?php echo esc_attr( $cred['heading'] ?? '' ); ?>" loading="lazy">
					<?php elseif ( $badge_svg ) : ?>
					<?php echo $badge_svg; ?>
					<?php else : ?>
					<span><?php echo esc_html( substr( (string) ( $cred['heading'] ?? '' ), 0, 1 ) ); ?></span>
					<?php endif; ?>
				</div>
				<div class="achv-award-copy">
					<h3 class="achv-cred-heading"><?php echo esc_html( $cred['heading'] ?? '' ); ?></h3>
					<?php if ( ! empty( $cred['desc'] ) ) : ?>
					<p class="achv-cred-desc"><?php echo esc_html( $cred['desc'] ); ?></p>
					<?php endif; ?>
				</div>
			</<?php echo esc_html( $tag ); ?>>
			<?php endforeach; ?>
		</div>
	</section>

	<?php if ( ! empty( $featured_logos ) ) : ?>
	<section class="achv-featured-section">
		<div class="achv-section-head achv-section-head--split">
			<div class="fig-eyebrow"><?php echo esc_html( $featured_heading ); ?></div>
			<p>Media, podcasts, business publications, and community organizations that have featured Slingshot or our team.</p>
		</div>
		<div class="achv-featured-logos">
			<?php foreach ( $featured_logos as $logo ) :
				$logo_img = slingshot_achv_img_url( $logo['image'] ?? '', 'medium' );
				$logo_url = trim( (string) ( $logo['url'] ?? '' ) );
				if ( ! $logo_img ) {
					continue;
				}
				?>
				<?php if ( $logo_url ) : ?>
				<a href="<?php echo slingshot_lp_h_attr( $logo_url ); ?>" class="achv-featured-logo-link" target="_blank" rel="noopener">
					<img src="<?php echo esc_url( $logo_img ); ?>" alt="<?php echo esc_attr( $logo['name'] ?? '' ); ?>" class="achv-featured-logo" loading="lazy">
				</a>
				<?php else : ?>
				<div class="achv-featured-logo-link">
					<img src="<?php echo esc_url( $logo_img ); ?>" alt="<?php echo esc_attr( $logo['name'] ?? '' ); ?>" class="achv-featured-logo" loading="lazy">
				</div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</section>
	<?php endif; ?>

	<section class="fig-cta achv-cta">
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
