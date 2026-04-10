<?php
/*
Template Name: Bootcamp
 * Content: Appearance → Bootcamp Page (Meta Box).
 */

wp_enqueue_style(
	'bootcamp-jakarta',
	'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap',
	array(), null
);
wp_enqueue_style( 'home-style', get_stylesheet_directory_uri() . '/css/home.css', array(), '1.18' );
wp_enqueue_style( 'bootcamp-style', get_stylesheet_directory_uri() . '/css/bootcamp.css', array(), '1.0' );
wp_enqueue_script( 'bootcamp-script', get_stylesheet_directory_uri() . '/js/bootcamp.js', array( 'jquery' ), '1.0', true );

get_header();

$opt     = SLINGSHOT_OPT_BOOTCAMP;
$img_dir = get_stylesheet_directory_uri() . '/img';

$blog_n = (int) slingshot_lp_setting( $opt, 'boot_blog_posts', 3 );
$blog_n = max( 1, min( 12, $blog_n ) );

$blog_query = new WP_Query(
	array(
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'posts_per_page' => $blog_n,
		'orderby'        => 'date',
		'order'          => 'DESC',
	)
);

$curriculum = slingshot_lp_bootcamp_curriculum();
?>

<style id="dynamic-css-inline-css" type="text/css">
    body{overflow:visible}.no-rgba #header-space{display:none;}@media only screen and (max-width:999px){body #header-space[data-header-mobile-fixed="1"]{display:none;}#header-outer[data-mobile-fixed="false"]{position:absolute;}}@media only screen and (min-width:1000px){#header-space{display:none;}.nectar-slider-wrap.first-section,.parallax_slider_outer.first-section,.full-width-content.first-section{margin-top:0!important;}body #page-header-bg,body #page-header-wrap{height:142px;}body #search-outer{z-index:100000;}}
</style>

<div class="bootcamp-page-wrapper">

    <section class="boot-hero">
        <div class="boot-hero-blob boot-hero-blob-1"></div>
        <div class="boot-hero-blob boot-hero-blob-2"></div>
        <div class="boot-hero-blob boot-hero-blob-3"></div>

        <div class="boot-hero-inner">
            <div class="boot-hero-content">
                <div class="boot-hero-breadcrumb">
                    <span><?php echo esc_html( slingshot_lp_setting( $opt, 'boot_hero_bc_parent', 'SERVICES' ) ); ?></span>
                    <span class="boot-hero-sep">/</span>
                    <span><?php echo esc_html( slingshot_lp_setting( $opt, 'boot_hero_bc_leaf', 'BOOTCAMP' ) ); ?></span>
                </div>
                <h1 class="boot-hero-heading"><?php echo nl2br( esc_html( slingshot_lp_setting( $opt, 'boot_hero_heading', "AI Bootcamp\nfor Teams" ) ) ); ?></h1>
                <p class="boot-hero-subtext"><?php echo esc_html( slingshot_lp_setting( $opt, 'boot_hero_subtext', 'Hands-on, practitioner-led training that turns your team into confident AI builders — in days, not months.' ) ); ?></p>
                <div class="boot-hero-actions">
                    <a href="<?php echo slingshot_lp_h_attr( slingshot_lp_setting( $opt, 'boot_hero_primary_url', '/contact/?looking=Bootcamp' ) ); ?>" class="boot-hero-btn boot-hero-btn-primary"><?php echo esc_html( slingshot_lp_setting( $opt, 'boot_hero_primary_text', 'Book a Bootcamp' ) ); ?> <span>&#8594;</span></a>
                    <a href="<?php echo slingshot_lp_h_attr( slingshot_lp_setting( $opt, 'boot_hero_secondary_url', '#boot-curriculum' ) ); ?>" class="boot-hero-btn boot-hero-btn-ghost"><?php echo esc_html( slingshot_lp_setting( $opt, 'boot_hero_secondary_text', 'See the Curriculum' ) ); ?></a>
                </div>
            </div>

            <div class="boot-hero-visual">
                <div class="boot-hero-card-stack">
                    <?php foreach ( slingshot_lp_bootcamp_hero_cards() as $hci => $hc ) : ?>
                    <div class="boot-hero-card boot-hero-card-<?php echo esc_attr( (string) ( $hci + 1 ) ); ?>">
                        <div class="boot-hero-card-icon"><?php echo $hc['icon_svg']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
                        <div>
                            <div class="boot-hero-card-title"><?php echo esc_html( $hc['title'] ); ?></div>
                            <div class="boot-hero-card-sub"><?php echo esc_html( $hc['subtitle'] ); ?></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="boot-why-section">
        <div class="boot-why-inner">
            <div class="boot-why-header">
                <p class="boot-why-eyebrow"><?php echo esc_html( slingshot_lp_setting( $opt, 'boot_why_eyebrow', 'Why It Works' ) ); ?></p>
                <h2 class="boot-why-heading"><?php echo nl2br( esc_html( slingshot_lp_setting( $opt, 'boot_why_heading', "Why Teams Choose\nSlingshot's AI Bootcamps" ) ) ); ?></h2>
                <p class="boot-why-desc"><?php echo esc_html( slingshot_lp_setting( $opt, 'boot_why_desc', "Most AI training stays theoretical. Ours doesn't. Every bootcamp is built around your team's real goals — with outcomes you can ship." ) ); ?></p>
            </div>

            <div class="boot-why-cards">
                <?php foreach ( slingshot_lp_bootcamp_why_cards() as $wc ) : ?>
                <div class="boot-why-card<?php echo ( isset( $wc['style'] ) && 'featured' === $wc['style'] ) ? ' boot-why-card-featured' : ''; ?>">
                    <div class="boot-why-card-icon <?php echo ( isset( $wc['style'] ) && 'featured' === $wc['style'] ) ? 'boot-why-card-icon-teal' : 'boot-why-card-icon-purple'; ?>">
                        <?php echo $wc['icon_svg']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    </div>
                    <h3 class="boot-why-card-title"><?php echo esc_html( $wc['title'] ); ?></h3>
                    <p class="boot-why-card-text"><?php echo esc_html( $wc['text'] ); ?></p>
                    <?php if ( ! empty( $wc['badge'] ) && isset( $wc['style'] ) && 'featured' === $wc['style'] ) : ?>
                    <div class="boot-why-card-badge"><?php echo esc_html( $wc['badge'] ); ?></div>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="boot-stats-section">
        <div class="boot-stats-inner">
            <div class="boot-stats-content">
                <h2 class="boot-stats-heading"><?php echo nl2br( esc_html( slingshot_lp_setting( $opt, 'boot_stats_heading', "Training That\nMoves the Needle" ) ) ); ?></h2>
                <p class="boot-stats-desc"><?php echo esc_html( slingshot_lp_setting( $opt, 'boot_stats_desc', 'Slingshot has helped companies across industries build real AI capabilities. Our bootcamps are the fastest path from curiosity to production-ready results.' ) ); ?></p>
                <a href="<?php echo slingshot_lp_h_attr( slingshot_lp_setting( $opt, 'boot_stats_cta_url', '/work/' ) ); ?>" class="boot-stats-cta"><?php echo esc_html( slingshot_lp_setting( $opt, 'boot_stats_cta_text', 'See Our Work' ) ); ?> <span>&#8594;</span></a>
            </div>
            <div class="boot-stats-grid">
                <?php foreach ( slingshot_lp_bootcamp_stats() as $st ) : ?>
                <div class="boot-stat">
                    <span class="boot-stat-num"><?php echo esc_html( $st['number'] ); ?></span>
                    <span class="boot-stat-label"><?php echo esc_html( $st['label'] ); ?></span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="boot-curriculum-section" id="boot-curriculum">
        <div class="boot-curriculum-inner">
            <div class="boot-curriculum-header">
                <p class="boot-curriculum-eyebrow"><?php echo esc_html( slingshot_lp_setting( $opt, 'boot_curriculum_eyebrow', "What You'll Cover" ) ); ?></p>
                <h2 class="boot-curriculum-heading"><?php echo nl2br( esc_html( slingshot_lp_setting( $opt, 'boot_curriculum_heading', "A Curriculum Built\nfor Real-World AI" ) ) ); ?></h2>
                <p class="boot-curriculum-desc"><?php echo esc_html( slingshot_lp_setting( $opt, 'boot_curriculum_desc', "Choose the track that fits your team's goals — or let us build a custom program around your specific use cases." ) ); ?></p>
            </div>

            <div class="boot-curriculum-body">
                <div class="boot-tabs">
                    <?php foreach ( $curriculum as $ti => $tab ) : ?>
                    <button type="button" class="boot-tab<?php echo 0 === $ti ? ' active' : ''; ?>" data-tab="<?php echo esc_attr( $tab['tab_id'] ); ?>"><?php echo esc_html( $tab['tab_label'] ); ?></button>
                    <?php endforeach; ?>
                </div>

                <div class="boot-tab-panels">
                    <?php foreach ( $curriculum as $ti => $tab ) : ?>
                    <?php
                    $layout = isset( $tab['panel_layout'] ) ? $tab['panel_layout'] : 'modules';
                    $mods   = isset( $tab['modules'] ) && is_array( $tab['modules'] ) ? $tab['modules'] : [];
                    ?>
                    <div class="boot-tab-panel<?php echo 0 === $ti ? ' active' : ''; ?>" id="boot-tab-<?php echo esc_attr( $tab['tab_id'] ); ?>">
                        <div class="boot-tab-panel-grid">
                            <div class="boot-tab-info">
                                <div class="boot-tab-badge"><?php echo esc_html( $tab['badge'] ); ?></div>
                                <h3><?php echo esc_html( $tab['title'] ); ?></h3>
                                <p><?php echo esc_html( $tab['intro'] ); ?></p>
                                <ul>
                                    <?php foreach ( slingshot_lp_bullet_lines( $tab['bullets'] ?? '' ) as $li ) : ?>
                                    <li><?php echo esc_html( $li ); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <a href="<?php echo slingshot_lp_h_attr( $tab['cta_url'] ?? '#' ); ?>" class="boot-tab-cta"><?php echo esc_html( $tab['cta_text'] ?? '' ); ?> <span>&#8594;</span></a>
                            </div>
                            <div class="boot-tab-visual<?php echo 'custom' === $layout ? ' boot-tab-visual-custom' : ''; ?>">
                                <?php if ( 'custom' === $layout ) : ?>
                                <div class="boot-custom-card">
                                    <div class="boot-custom-icon">
                                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none"><circle cx="24" cy="24" r="24" fill="rgba(109,68,183,0.1)"/><path d="M16 32V24l8-6 8 6v8" stroke="#6D44B7" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/><rect x="20" y="24" width="8" height="8" rx="1.5" stroke="#6D44B7" stroke-width="2.5"/><path d="M24 16v-4M18 18l-3-3M30 18l3-3" stroke="#23B7B4" stroke-width="2" stroke-linecap="round"/></svg>
                                    </div>
                                    <p class="boot-custom-text"><?php echo esc_html( $tab['custom_text'] ?? '' ); ?></p>
                                    <a href="<?php echo slingshot_lp_h_attr( $tab['custom_url'] ?? '#' ); ?>" class="boot-custom-btn"><?php echo wp_kses_post( $tab['custom_btn'] ?? '' ); ?></a>
                                </div>
                                <?php else : ?>
                                <div class="boot-module-cards">
                                    <?php foreach ( $mods as $mi => $mod ) : ?>
                                        <?php
                                        if ( empty( $mod['day'] ) && empty( $mod['name'] ) ) {
                                            continue;
                                        }
                                        $cap_class = '';
                                        $day_s     = (string) ( $mod['day'] ?? '' );
                                        $name_s    = (string) ( $mod['name'] ?? '' );
                                        if ( stripos( $day_s, 'capstone' ) !== false || stripos( $name_s, 'End-to-End' ) !== false ) {
                                            $cap_class = ' boot-module-capstone';
                                        }
                                        ?>
                                    <div class="boot-module<?php echo esc_attr( $cap_class ); ?>">
                                        <span class="boot-module-day"><?php echo esc_html( $mod['day'] ?? '' ); ?></span>
                                        <span class="boot-module-name"><?php echo esc_html( $mod['name'] ?? '' ); ?></span>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="boot-how-section">
        <div class="boot-how-inner">
            <div class="boot-how-header">
                <p class="boot-how-eyebrow"><?php echo esc_html( slingshot_lp_setting( $opt, 'boot_how_eyebrow', 'The Process' ) ); ?></p>
                <h2 class="boot-how-heading"><?php echo esc_html( slingshot_lp_setting( $opt, 'boot_how_heading', 'How It Works' ) ); ?></h2>
            </div>
            <div class="boot-how-steps">
                <?php foreach ( slingshot_lp_bootcamp_how_steps() as $si => $step ) : ?>
                    <?php if ( $si > 0 ) : ?>
                <div class="boot-how-connector"></div>
                    <?php endif; ?>
                <div class="boot-how-step">
                    <div class="boot-how-step-num"><?php echo esc_html( $step['num'] ?? '' ); ?></div>
                    <div class="boot-how-step-content">
                        <h3><?php echo esc_html( $step['title'] ?? '' ); ?></h3>
                        <p><?php echo esc_html( $step['text'] ?? '' ); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="home-events-section boot-events-section">
        <div class="home-events-inner">
            <div class="home-events-header">
                <h2 class="home-events-title"><?php echo esc_html( slingshot_lp_setting( $opt, 'boot_events_title', 'Upcoming Bootcamps' ) ); ?></h2>
                <div class="home-events-meta">
                    <p class="home-events-desc"><?php echo esc_html( slingshot_lp_setting( $opt, 'boot_events_desc', 'Join one of our public cohorts or bring a private bootcamp to your team. New dates added regularly.' ) ); ?></p>
                    <a href="<?php echo slingshot_lp_h_attr( slingshot_lp_setting( $opt, 'boot_events_all_url', '/events' ) ); ?>" class="home-section-link"><?php echo esc_html( slingshot_lp_setting( $opt, 'boot_events_all_text', 'All Events →' ) ); ?></a>
                </div>
            </div>
            <div class="home-events-cards">
                <?php foreach ( slingshot_lp_bootcamp_events_cards() as $ev ) : ?>
                    <?php
                    $ev_url = ! empty( $ev['url'] ) ? $ev['url'] : '#';
                    $img_u  = ! empty( $ev['image'] ) ? slingshot_lp_attachment_url( $ev['image'], '', 'large' ) : '';
                    $reg    = ! empty( $ev['register_label'] ) ? $ev['register_label'] : 'Register →';
                    ?>
                <a href="<?php echo slingshot_lp_h_attr( $ev_url ); ?>" class="event-card">
                    <div class="event-card-image"<?php echo ! empty( $ev['image_bg_css'] ) ? ' style="background:' . esc_attr( $ev['image_bg_css'] ) . ';"' : ''; ?>>
                        <?php if ( $img_u && empty( $ev['image_bg_css'] ) ) : ?>
                        <img src="<?php echo esc_url( $img_u ); ?>" alt="<?php echo esc_attr( $ev['title'] ?? '' ); ?>" loading="lazy">
                        <?php endif; ?>
                    </div>
                    <div class="event-card-body">
                        <div class="event-card-info">
                            <span class="event-card-tag"><?php echo esc_html( $ev['tag'] ?? '' ); ?></span>
                            <h3 class="event-card-title"><?php echo esc_html( $ev['title'] ?? '' ); ?></h3>
                            <p class="event-card-date"><?php echo esc_html( $ev['date_location'] ?? '' ); ?></p>
                        </div>
                        <span class="event-register-btn"><?php echo esc_html( $reg ); ?></span>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="boot-clients-section">
        <div class="boot-clients-inner">
            <p class="boot-clients-label"><?php echo esc_html( slingshot_lp_setting( $opt, 'boot_clients_label', "Teams We've Trained" ) ); ?></p>
            <div class="home-logos-strip-wrapper">
                <div class="home-logos-strip">
                    <?php
                    $blogos = slingshot_lp_bootcamp_clients();
                    foreach ( array_merge( $blogos, $blogos ) as $row ) :
                        ?>
                    <span class="logo-item"><?php echo esc_html( $row['name'] ); ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="home-blog-section boot-blog-section">
        <div class="home-blog-inner">
            <div class="home-blog-header">
                <h2 class="home-blog-title"><?php echo nl2br( esc_html( slingshot_lp_setting( $opt, 'boot_blog_title', "AI Insights for\nModern Teams" ) ) ); ?></h2>
                <div class="home-blog-meta">
                    <p class="home-blog-desc"><?php echo esc_html( slingshot_lp_setting( $opt, 'boot_blog_desc', 'Practical thinking on AI adoption, team enablement, and what it really takes to build AI capabilities inside an organization.' ) ); ?></p>
                    <a href="<?php echo slingshot_lp_h_attr( slingshot_lp_setting( $opt, 'boot_blog_cta_url', '/blog' ) ); ?>" class="home-section-link"><?php echo esc_html( slingshot_lp_setting( $opt, 'boot_blog_cta_text', 'All Insights →' ) ); ?></a>
                </div>
            </div>
            <div class="home-blog-cards">
                <?php if ( $blog_query->have_posts() ) : ?>
                    <?php
                    while ( $blog_query->have_posts() ) :
                        $blog_query->the_post();
                        ?>
                        <a href="<?php the_permalink(); ?>" class="blog-card">
                            <div class="blog-card-image">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail( 'medium_large', array( 'loading' => 'lazy' ) ); ?>
                                <?php endif; ?>
                            </div>
                            <div class="blog-card-body">
                                <div class="blog-card-tags">
                                    <?php
                                    $cats = get_the_category();
                                    if ( $cats ) :
                                        foreach ( array_slice( $cats, 0, 2 ) as $cat ) :
                                            ?>
                                        <span class="blog-card-tag"><?php echo esc_html( $cat->name ); ?></span>
                                            <?php
                                        endforeach;
endif;
                                    ?>
                                </div>
                                <h3 class="blog-card-title"><?php the_title(); ?></h3>
                                <p class="blog-card-desc"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 20, '...' ) ); ?></p>
                            </div>
                        </a>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php else : ?>
                    <a href="#" class="blog-card">
                        <div class="blog-card-image"></div>
                        <div class="blog-card-body">
                            <span class="blog-card-tag">AI</span>
                            <h3 class="blog-card-title">What It Actually Takes to Make Your Team AI-Ready</h3>
                        </div>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="boot-cta-section">
        <div class="boot-cta-inner">
            <div class="boot-cta-mascot">
                <svg class="boot-cta-mascot-svg" viewBox="0 0 280 320" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                    <circle cx="64" cy="100" r="3" fill="#FFD166" opacity=".6"/>
                    <circle cx="220" cy="80" r="2" fill="#FFD166" opacity=".5"/>
                    <circle cx="50" cy="200" r="2" fill="#fff" opacity=".4"/>
                    <circle cx="230" cy="180" r="3" fill="#23B7B4" opacity=".5"/>
                </svg>
            </div>
            <div class="boot-cta-card">
                <h2 class="boot-cta-title"><?php echo nl2br( esc_html( slingshot_lp_setting( $opt, 'boot_cta_title', "Ready to Train\nYour Team?" ) ) ); ?></h2>
                <p class="boot-cta-desc"><?php echo esc_html( slingshot_lp_setting( $opt, 'boot_cta_desc', "Whether you want a public cohort spot or a private bootcamp built around your team — we'll make it happen fast." ) ); ?></p>
                <div class="boot-cta-actions">
                    <a href="<?php echo slingshot_lp_h_attr( slingshot_lp_setting( $opt, 'boot_cta_primary_url', '/contact/?looking=Bootcamp' ) ); ?>" class="boot-cta-btn-primary"><?php echo esc_html( slingshot_lp_setting( $opt, 'boot_cta_primary_text', 'Book a Bootcamp →' ) ); ?></a>
                    <a href="<?php echo slingshot_lp_h_attr( slingshot_lp_setting( $opt, 'boot_cta_secondary_url', '/contact/?looking=Bootcamp+Custom' ) ); ?>" class="boot-cta-btn-ghost"><?php echo esc_html( slingshot_lp_setting( $opt, 'boot_cta_secondary_text', 'Talk to Us First' ) ); ?></a>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>
