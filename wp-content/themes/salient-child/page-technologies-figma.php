<?php
/*
Template Name: Technologies Figma
 * Content: Edit Page meta fields (Meta Box).
 */

wp_enqueue_style( 'pages-figma-jakarta', 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap', array(), null );
wp_enqueue_style( 'home-style', get_stylesheet_directory_uri() . '/css/home.css', array(), '1.18' );
wp_enqueue_style( 'tech-figma-style', get_stylesheet_directory_uri() . '/css/technologies-figma.css', array(), '1.0' );
wp_enqueue_script( 'hp-script', get_stylesheet_directory_uri() . '/js/home.js', array( 'jquery' ), '1.6', true );

get_header();

if ( ! function_exists( 'slingshot_tech_logo_url' ) ) {
	function slingshot_tech_logo_url( $value ) {
		$value = trim( (string) $value );
		if ( '' === $value ) {
			return '';
		}
		if ( ctype_digit( $value ) ) {
			$url = wp_get_attachment_image_url( (int) $value, 'full' );
			return $url ? $url : '';
		}
		return $value;
	}
}

if ( ! function_exists( 'slingshot_tech_parse_items' ) ) {
	function slingshot_tech_parse_items( $raw ) {
		$items = [];
		foreach ( preg_split( '/\R+/', (string) $raw ) as $line ) {
			$line = trim( $line );
			if ( '' === $line ) {
				continue;
			}
			$parts = array_map( 'trim', explode( '|', $line ) );
			$name  = $parts[0] ?? '';
			if ( '' === $name ) {
				continue;
			}
			$items[] = [
				'name' => $name,
				'logo' => slingshot_tech_logo_url( $parts[1] ?? '' ),
				'note' => $parts[2] ?? '',
			];
		}
		return $items;
	}
}

$tech_default_categories = [
	[
		'kicker' => '01',
		'title'  => 'Mobile',
		'desc'   => 'Cross-platform and native mobile technologies for iOS, Android, and shared-code product teams.',
		'items'  => "Apple|5223\nAndroid|5219\n.NET MAUI|453947\nFlutter|453956\nReact Native|453940\nXamarin|5253\nSwift|453937\nObjective-C|453946\nJava|453953\nKotlin|453952",
	],
	[
		'kicker' => '02',
		'title'  => 'Web',
		'desc'   => 'Modern frontend and backend frameworks for products, portals, platforms, and operational systems.',
		'items'  => ".NET Core|453950\nReact|453981\nAngular|453962\nNode.js|453945\nPHP|453943\nC#|453960\nVue.js|453934\nPython|453941\nDjango|453930",
	],
	[
		'kicker' => '03',
		'title'  => 'Cloud',
		'desc'   => 'Cloud services and infrastructure patterns that help products scale, integrate, and stay resilient.',
		'items'  => "AWS|453965\nAzure AI|453961",
	],
	[
		'kicker' => '04',
		'title'  => 'Database',
		'desc'   => 'Relational, document, and cloud-native data stores selected around product needs and operating models.',
		'items'  => "DynamoDB|453957\nMicrosoft SQL Server|453951\nAmazon DocumentDB|453963\nMySQL|453949\nMongoDB|453948\nPostgreSQL|453942",
	],
	[
		'kicker' => '05',
		'title'  => 'Content Management Systems',
		'desc'   => 'Flexible CMS platforms for marketing sites, content operations, and structured digital experiences.',
		'items'  => "WordPress|453931\nWebflow|453933\nSanity.io|453938",
	],
	[
		'kicker' => '06',
		'title'  => 'Artificial Intelligence',
		'desc'   => 'AI platforms, model providers, and tooling for practical automation, insight, and product intelligence.',
		'items'  => "OpenAI|453944\nAzure AI|453958\nTensorFlow|453936\nGemini|453955\nAmazon Bedrock|453964\nLlama|454017",
	],
	[
		'kicker' => '07',
		'title'  => 'DevOps',
		'desc'   => 'Deployment, automation, and infrastructure tools that make software delivery more reliable.',
		'items'  => "Docker|453932\nTerraform|453935\nGitHub Actions|453954",
	],
];

$hero_label          = slingshot_pm( 'tech_hero_label', 'TECHNOLOGIES' );
$hero_heading        = slingshot_pm( 'tech_hero_heading', 'Technologies We Use' );
$hero_desc           = slingshot_pm( 'tech_hero_desc', 'We provide full-stack development services across web, mobile, and desktop, utilizing an expansive set of technologies.' );
$hero_btn_text       = slingshot_pm( 'tech_hero_btn_text', 'Talk Tech With Us' );
$hero_btn_url        = slingshot_pm( 'tech_hero_btn_url', '/contact/?looking=Technology' );
$hero_secondary_text = slingshot_pm( 'tech_hero_secondary_text', 'See Our Work' );
$hero_secondary_url  = slingshot_pm( 'tech_hero_secondary_url', '/work/' );
$intro_heading       = slingshot_pm( 'tech_intro_heading', 'The Right Stack for the Job' );
$intro_desc          = slingshot_pm( 'tech_intro_desc', "We are tool-agnostic and outcome-focused. The stack is chosen around your product, team, data, scale, and long-term maintainability, not around what's fashionable this week." );
$categories          = slingshot_pm( 'tech_categories', [] );
$categories          = is_array( $categories ) && $categories ? $categories : $tech_default_categories;
$cta_heading         = slingshot_pm( 'tech_cta_heading', 'Want to See Our Work?' );
$cta_desc            = slingshot_pm( 'tech_cta_desc', 'Explore case studies showing how strategy, design, engineering, and modern platforms come together.' );
$cta_btn_text        = slingshot_pm( 'tech_cta_btn_text', "Let's Go!" );
$cta_btn_url         = slingshot_pm( 'tech_cta_btn_url', '/work/' );

$hero_items = [];
foreach ( $categories as $cat ) {
	foreach ( slingshot_tech_parse_items( $cat['items'] ?? '' ) as $item ) {
		$hero_items[] = $item;
		if ( count( $hero_items ) >= 9 ) {
			break 2;
		}
	}
}
?>
<style>
body.page-template-page-technologies-figma #header-outer,
body.page-template-page-technologies-figma #header-space { display:none !important; }
</style>

<?php slingshot_render_redesign_header( array( 'variant' => 'light' ) ); ?>

<div class="tech-page-wrapper">
	<section class="tech-hero">
		<div class="tech-hero-rings" aria-hidden="true"></div>
		<div class="tech-hero-content">
			<?php if ( $hero_label ) : ?>
			<div class="tech-hero-label"><?php echo esc_html( $hero_label ); ?></div>
			<?php endif; ?>
			<h1 class="tech-hero-heading"><?php echo esc_html( $hero_heading ); ?></h1>
			<?php if ( $hero_desc ) : ?>
			<p class="tech-hero-desc"><?php echo esc_html( $hero_desc ); ?></p>
			<?php endif; ?>
			<div class="tech-hero-actions">
				<a class="tech-hero-btn" href="<?php echo slingshot_lp_h_attr( $hero_btn_url ); ?>"><?php echo esc_html( $hero_btn_text ); ?> &rarr;</a>
				<a class="tech-hero-link" href="<?php echo slingshot_lp_h_attr( $hero_secondary_url ); ?>"><?php echo esc_html( $hero_secondary_text ); ?></a>
			</div>
		</div>

		<?php if ( $hero_items ) : ?>
		<div class="tech-hero-cloud" aria-hidden="true">
			<?php foreach ( $hero_items as $item ) : ?>
			<div class="tech-hero-logo">
				<?php if ( ! empty( $item['logo'] ) ) : ?>
				<img src="<?php echo esc_url( $item['logo'] ); ?>" alt="">
				<?php else : ?>
				<span><?php echo esc_html( $item['name'] ); ?></span>
				<?php endif; ?>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</section>

	<section class="tech-intro">
		<h2><?php echo esc_html( $intro_heading ); ?></h2>
		<p><?php echo esc_html( $intro_desc ); ?></p>
	</section>

	<section class="tech-stack">
		<?php foreach ( $categories as $cat ) :
			$items = slingshot_tech_parse_items( $cat['items'] ?? '' );
			if ( ! $items ) {
				continue;
			}
			?>
		<article class="tech-category">
			<div class="tech-category-copy">
				<div class="tech-category-kicker"><?php echo esc_html( $cat['kicker'] ?? '' ); ?></div>
				<h2><?php echo esc_html( $cat['title'] ?? '' ); ?></h2>
				<?php if ( ! empty( $cat['desc'] ) ) : ?>
				<p><?php echo esc_html( $cat['desc'] ); ?></p>
				<?php endif; ?>
			</div>
			<div class="tech-logo-grid">
				<?php foreach ( $items as $item ) : ?>
				<div class="tech-logo-card">
					<div class="tech-logo-mark">
						<?php if ( ! empty( $item['logo'] ) ) : ?>
						<img src="<?php echo esc_url( $item['logo'] ); ?>" alt="<?php echo esc_attr( $item['name'] ); ?>" loading="lazy">
						<?php else : ?>
						<span><?php echo esc_html( substr( $item['name'], 0, 1 ) ); ?></span>
						<?php endif; ?>
					</div>
					<div>
						<h3><?php echo esc_html( $item['name'] ); ?></h3>
						<?php if ( ! empty( $item['note'] ) ) : ?>
						<p><?php echo esc_html( $item['note'] ); ?></p>
						<?php endif; ?>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</article>
		<?php endforeach; ?>
	</section>

	<section class="tech-cta">
		<div>
			<h2><?php echo esc_html( $cta_heading ); ?></h2>
			<p><?php echo esc_html( $cta_desc ); ?></p>
		</div>
		<a class="tech-cta-btn" href="<?php echo slingshot_lp_h_attr( $cta_btn_url ); ?>"><?php echo esc_html( $cta_btn_text ); ?> &rarr;</a>
	</section>
</div>

<?php get_footer(); ?>
