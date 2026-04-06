<?php
/*
Template Name: Consulting
*/

wp_enqueue_style(
    'consulting-jakarta',
    'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap',
    array(), null
);
wp_enqueue_style( 'home-style',        get_stylesheet_directory_uri() . '/css/home.css',        array(), '1.1' );
wp_enqueue_style( 'consulting-style',  get_stylesheet_directory_uri() . '/css/consulting.css',  array(), '1.0' );
wp_enqueue_script( 'consulting-script', get_stylesheet_directory_uri() . '/js/consulting.js', array('jquery'), '1.0', true );

get_header();

$img_dir = get_stylesheet_directory_uri() . '/img';

/* — Blog posts — */
$blog_query = new WP_Query( array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => 3,
    'orderby'        => 'date',
    'order'          => 'DESC',
) );
?>

<style id="dynamic-css-inline-css" type="text/css">
    body{overflow:visible}.no-rgba #header-space{display:none;}@media only screen and (max-width:999px){body #header-space[data-header-mobile-fixed="1"]{display:none;}#header-outer[data-mobile-fixed="false"]{position:absolute;}}@media only screen and (min-width:1000px){#header-space{display:none;}.nectar-slider-wrap.first-section,.parallax_slider_outer.first-section,.full-width-content.first-section{margin-top:0!important;}body #page-header-bg,body #page-header-wrap{height:142px;}body #search-outer{z-index:100000;}}
</style>

<div class="consulting-page-wrapper">

    <!-- ════════════════════════════════════
         1. HERO
    ════════════════════════════════════ -->
    <section class="con-hero">
        <div class="con-hero-blob con-hero-blob-1"></div>
        <div class="con-hero-blob con-hero-blob-2"></div>
        <div class="con-hero-blob con-hero-blob-3"></div>

        <div class="con-hero-inner">
            <div class="con-hero-content">
                <div class="con-hero-breadcrumb">
                    <span>SERVICES</span>
                    <span class="con-hero-sep">/</span>
                    <span>CONSULTING</span>
                </div>
                <h1 class="con-hero-heading">Strategic Technology Consulting</h1>
                <p class="con-hero-subtext">We bring deep technical expertise, cross-functional teams, and product thinking to every engagement — so you get outcomes, not just output.</p>
                <a href="/contact/?looking=Consulting" class="con-hero-btn">Book a call <span>&#8594;</span></a>
            </div>

            <div class="con-hero-photos">
                <div class="con-hero-photo-grid">
                    <div class="con-hero-photo con-hero-photo-a">
                        <img src="<?php echo esc_url( $img_dir ); ?>/hero-person-1.jpg" alt="Slingshot consulting team">
                    </div>
                    <div class="con-hero-photo con-hero-photo-b">
                        <img src="<?php echo esc_url( $img_dir ); ?>/hero-person-2.jpg" alt="Slingshot strategist at work">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ════════════════════════════════════
         2. BUILT TO SOLVE, SCALE, AND SHIP
    ════════════════════════════════════ -->
    <section class="con-stats-section">
        <div class="con-stats-inner">
            <div class="con-stats-photo">
                <img src="<?php echo esc_url( $img_dir ); ?>/main-block-article.png" alt="Slingshot team collaborating">
            </div>
            <div class="con-stats-content">
                <h2 class="con-stats-heading">Built to Solve,<br>Scale, and Ship</h2>
                <p class="con-stats-desc">Harnessing deep technical expertise, cross-functional teams, and product thinking to every engagement, so you get outcomes, not just output.</p>
                <div class="con-stats-grid">
                    <div class="con-stat">
                        <span class="con-stat-num">15+</span>
                        <span class="con-stat-label">Industry focus</span>
                    </div>
                    <div class="con-stat">
                        <span class="con-stat-num">250+</span>
                        <span class="con-stat-label">Projects launched</span>
                    </div>
                    <div class="con-stat">
                        <span class="con-stat-num">20+</span>
                        <span class="con-stat-label">Team members</span>
                    </div>
                    <div class="con-stat">
                        <span class="con-stat-num">40+</span>
                        <span class="con-stat-label">Clients served</span>
                    </div>
                </div>
                <a href="/work/" class="con-stats-cta">Explore Our Work <span>&#8594;</span></a>
            </div>
        </div>
    </section>

    <!-- ════════════════════════════════════
         3. HOW CAN WE HELP?
    ════════════════════════════════════ -->
    <section class="con-help-section">
        <div class="con-help-inner">
            <h2 class="con-help-heading">How Can We Help?</h2>

            <div class="con-help-body">
                <!-- Left: accordion list + featured card -->
                <div class="con-help-left">
                    <div class="con-help-featured" id="con-featured-card">
                        <div class="con-featured-tag">AI Adoption</div>
                        <p class="con-featured-text">We help your team identify where AI fits, evaluate tools, and deploy solutions that actually work — from early pilots to full-scale rollouts.</p>
                        <a href="/contact/?looking=AI+Adoption" class="con-featured-cta">Get Started <span>&#8594;</span></a>
                    </div>

                    <div class="con-help-accordion">
                        <div class="con-help-item active" data-service="ai-adoption">
                            <div class="con-help-item-row">
                                <span class="con-help-icon">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"><rect width="20" height="20" rx="5" fill="#6D44B7" fill-opacity=".15"/><path d="M10 4v12M4 10h12" stroke="#6D44B7" stroke-width="1.8" stroke-linecap="round"/></svg>
                                </span>
                                <span class="con-help-label">AI Adoption</span>
                                <span class="con-help-toggle">+</span>
                            </div>
                        </div>
                        <div class="con-help-item" data-service="digital-transformation">
                            <div class="con-help-item-row">
                                <span class="con-help-icon">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"><rect width="20" height="20" rx="5" fill="#23B7B4" fill-opacity=".15"/><path d="M6 14l4-8 4 8" stroke="#23B7B4" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                </span>
                                <span class="con-help-label">Digital Transformation</span>
                                <span class="con-help-toggle">+</span>
                            </div>
                        </div>
                        <div class="con-help-item" data-service="legacy-modernization">
                            <div class="con-help-item-row">
                                <span class="con-help-icon">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"><rect width="20" height="20" rx="5" fill="#6D44B7" fill-opacity=".15"/><circle cx="10" cy="10" r="5" stroke="#6D44B7" stroke-width="1.8"/></svg>
                                </span>
                                <span class="con-help-label">Legacy System Modernization</span>
                                <span class="con-help-toggle">+</span>
                            </div>
                        </div>
                        <div class="con-help-item" data-service="team-scaling">
                            <div class="con-help-item-row">
                                <span class="con-help-icon">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"><rect width="20" height="20" rx="5" fill="#23B7B4" fill-opacity=".15"/><path d="M4 16c0-3.314 2.686-6 6-6s6 2.686 6 6" stroke="#23B7B4" stroke-width="1.8" stroke-linecap="round"/><circle cx="10" cy="7" r="3" stroke="#23B7B4" stroke-width="1.8"/></svg>
                                </span>
                                <span class="con-help-label">Team Scaling</span>
                                <span class="con-help-toggle">+</span>
                            </div>
                        </div>
                        <div class="con-help-item" data-service="new-product">
                            <div class="con-help-item-row">
                                <span class="con-help-icon">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"><rect width="20" height="20" rx="5" fill="#6D44B7" fill-opacity=".15"/><path d="M10 3l1.9 5.8H18l-5 3.6 1.9 5.8L10 15l-5 3.4 1.9-5.8L2 9h6.1z" stroke="#6D44B7" stroke-width="1.5" stroke-linejoin="round"/></svg>
                                </span>
                                <span class="con-help-label">New Product Launches</span>
                                <span class="con-help-toggle">+</span>
                            </div>
                        </div>
                        <div class="con-help-item" data-service="ux-optimization">
                            <div class="con-help-item-row">
                                <span class="con-help-icon">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"><rect width="20" height="20" rx="5" fill="#23B7B4" fill-opacity=".15"/><rect x="4" y="4" width="5" height="5" rx="1.5" stroke="#23B7B4" stroke-width="1.5"/><rect x="11" y="4" width="5" height="5" rx="1.5" stroke="#23B7B4" stroke-width="1.5"/><rect x="4" y="11" width="5" height="5" rx="1.5" stroke="#23B7B4" stroke-width="1.5"/><rect x="11" y="11" width="5" height="5" rx="1.5" stroke="#23B7B4" stroke-width="1.5"/></svg>
                                </span>
                                <span class="con-help-label">UX Optimization</span>
                                <span class="con-help-toggle">+</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: service detail content -->
                <div class="con-help-right">
                    <div class="con-service-detail" id="con-service-ai-adoption">
                        <h3>AI Adoption</h3>
                        <p>We help your team identify where AI fits, evaluate the right tools, and deploy solutions that actually drive business value — from early pilots to full-scale rollouts.</p>
                        <ul>
                            <li>AI opportunity mapping & prioritization</li>
                            <li>Tool selection & architecture design</li>
                            <li>Pilot development & iterative delivery</li>
                            <li>Team enablement & change management</li>
                        </ul>
                        <a href="/contact/?looking=AI+Adoption" class="con-service-link">Let's Talk AI <span>&#8594;</span></a>
                    </div>
                    <div class="con-service-detail hidden" id="con-service-digital-transformation">
                        <h3>Digital Transformation</h3>
                        <p>We modernize your business operations and technology stack so you can move faster, reduce costs, and deliver better experiences for your customers and teams.</p>
                        <ul>
                            <li>Digital strategy & roadmap development</li>
                            <li>Process automation & workflow redesign</li>
                            <li>Cloud migration & infrastructure modernization</li>
                            <li>Integration of disparate systems</li>
                        </ul>
                        <a href="/contact/?looking=Digital+Transformation" class="con-service-link">Start the Conversation <span>&#8594;</span></a>
                    </div>
                    <div class="con-service-detail hidden" id="con-service-legacy-modernization">
                        <h3>Legacy System Modernization</h3>
                        <p>We help you migrate away from brittle, expensive legacy systems without disrupting your operations — bringing you the agility and reliability of modern platforms.</p>
                        <ul>
                            <li>Legacy audit & technical debt assessment</li>
                            <li>Phased migration planning</li>
                            <li>Re-architecture & rebuild strategies</li>
                            <li>Data migration & validation</li>
                        </ul>
                        <a href="/contact/?looking=Legacy+System+Modernization" class="con-service-link">Let's Modernize <span>&#8594;</span></a>
                    </div>
                    <div class="con-service-detail hidden" id="con-service-team-scaling">
                        <h3>Team Scaling</h3>
                        <p>When you need to move fast and your current team can't keep up, we embed experienced engineers, designers, and product managers to amplify your capacity.</p>
                        <ul>
                            <li>Staff augmentation with senior talent</li>
                            <li>Rapid team ramp-up</li>
                            <li>Engineering leadership support</li>
                            <li>Cross-functional squad builds</li>
                        </ul>
                        <a href="/contact/?looking=Team+Scaling" class="con-service-link">Grow Your Team <span>&#8594;</span></a>
                    </div>
                    <div class="con-service-detail hidden" id="con-service-new-product">
                        <h3>New Product Launches</h3>
                        <p>We partner with founders and product leaders to take ideas from concept to market — with the strategy, design, and engineering to make it happen.</p>
                        <ul>
                            <li>Product discovery & market validation</li>
                            <li>UX/UI design & prototyping</li>
                            <li>MVP development & launch</li>
                            <li>Post-launch iteration & growth</li>
                        </ul>
                        <a href="/contact/?looking=New+Product+Launch" class="con-service-link">Build Your Product <span>&#8594;</span></a>
                    </div>
                    <div class="con-service-detail hidden" id="con-service-ux-optimization">
                        <h3>UX Optimization</h3>
                        <p>We audit, redesign, and improve user experiences to reduce churn, increase engagement, and make your product a joy to use.</p>
                        <ul>
                            <li>UX audits & heuristic reviews</li>
                            <li>User research & journey mapping</li>
                            <li>Interface redesign & design systems</li>
                            <li>Usability testing & iteration</li>
                        </ul>
                        <a href="/contact/?looking=UX+Optimization" class="con-service-link">Improve Your UX <span>&#8594;</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ════════════════════════════════════
         4. JOIN THE CONVERSATION (Events)
    ════════════════════════════════════ -->
    <section class="home-events-section con-events-section">
        <div class="home-events-inner">
            <div class="home-events-header">
                <h2 class="home-events-title">Join the Conversation</h2>
                <div class="home-events-meta">
                    <p class="home-events-desc">We don't just build — we share. Explore upcoming events for leaders navigating technology strategy, AI, and product development.</p>
                    <a href="/events" class="home-section-link">All Events &rarr;</a>
                </div>
            </div>
            <div class="home-events-cards">
                <a href="#" class="event-card">
                    <div class="event-card-image">
                        <img src="<?php echo esc_url( $img_dir ); ?>/hero-person-1.jpg" alt="Louisville IA Exchange and TechFest" loading="lazy">
                    </div>
                    <div class="event-card-body">
                        <div class="event-card-info">
                            <span class="event-card-tag">Conference</span>
                            <h3 class="event-card-title">Louisville IA Exchange and TechFest</h3>
                            <p class="event-card-date">October 21, 2025 &middot; Louisville, KY</p>
                        </div>
                        <span class="event-register-btn">Register &rarr;</span>
                    </div>
                </a>
                <a href="#" class="event-card">
                    <div class="event-card-image">
                        <img src="<?php echo esc_url( $img_dir ); ?>/hero-person-2.jpg" alt="Louisville IA Exchange and TechFest" loading="lazy">
                    </div>
                    <div class="event-card-body">
                        <div class="event-card-info">
                            <span class="event-card-tag">Conference</span>
                            <h3 class="event-card-title">Louisville IA Exchange and TechFest</h3>
                            <p class="event-card-date">October 21, 2025 &middot; Louisville, KY</p>
                        </div>
                        <span class="event-register-btn">Register &rarr;</span>
                    </div>
                </a>
                <a href="#" class="event-card">
                    <div class="event-card-image" style="background:linear-gradient(135deg,#2A1878,#4B23B0);"></div>
                    <div class="event-card-body">
                        <div class="event-card-info">
                            <span class="event-card-tag">Workshop</span>
                            <h3 class="event-card-title">AI Product Development Bootcamp</h3>
                            <p class="event-card-date">November 14, 2025 &middot; Online</p>
                        </div>
                        <span class="event-register-btn">Register &rarr;</span>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- ════════════════════════════════════
         5. OUR TRUSTED CLIENTS
    ════════════════════════════════════ -->
    <section class="con-clients-section">
        <div class="con-clients-inner">
            <p class="con-clients-label">Our Trusted Clients</p>
            <div class="home-logos-strip-wrapper">
                <div class="home-logos-strip">
                    <span class="logo-item">Connected Caregiver</span>
                    <span class="logo-item">Churchill Downs</span>
                    <span class="logo-item">HealthRev</span>
                    <span class="logo-item">Paysign</span>
                    <span class="logo-item">ProjectTeam</span>
                    <span class="logo-item">Schneider Electric</span>
                    <span class="logo-item">Zoeller</span>
                    <span class="logo-item">Univ. of Louisville</span>
                    <span class="logo-item">MetLife</span>
                    <span class="logo-item">Equibase</span>
                    <!-- duplicate for seamless loop -->
                    <span class="logo-item">Connected Caregiver</span>
                    <span class="logo-item">Churchill Downs</span>
                    <span class="logo-item">HealthRev</span>
                    <span class="logo-item">Paysign</span>
                    <span class="logo-item">ProjectTeam</span>
                    <span class="logo-item">Schneider Electric</span>
                    <span class="logo-item">Zoeller</span>
                    <span class="logo-item">Univ. of Louisville</span>
                    <span class="logo-item">MetLife</span>
                    <span class="logo-item">Equibase</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ════════════════════════════════════
         6. INSIGHTS (Blog)
    ════════════════════════════════════ -->
    <section class="home-blog-section con-blog-section">
        <div class="home-blog-inner">
            <div class="home-blog-header">
                <h2 class="home-blog-title">Insights That Move<br>Business Forward</h2>
                <div class="home-blog-meta">
                    <p class="home-blog-desc">Actionable thinking on software strategy, AI adoption, and how high-performing teams build and scale.</p>
                    <a href="/blog" class="home-section-link">All Insights &rarr;</a>
                </div>
            </div>
            <div class="home-blog-cards">
                <?php if ( $blog_query->have_posts() ) : ?>
                    <?php while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>
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
                                    <?php endforeach; endif; ?>
                                </div>
                                <h3 class="blog-card-title"><?php the_title(); ?></h3>
                                <p class="blog-card-desc"><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
                            </div>
                        </a>
                    <?php endwhile; wp_reset_postdata(); ?>
                <?php else : ?>
                    <a href="#" class="blog-card">
                        <div class="blog-card-image"></div>
                        <div class="blog-card-body">
                            <span class="blog-card-tag">Strategy</span>
                            <h3 class="blog-card-title">How to Align Technology with Business Goals</h3>
                        </div>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- ════════════════════════════════════
         7. LET'S BUILD WHAT'S NEXT (CTA)
    ════════════════════════════════════ -->
    <section class="con-cta-section">
        <div class="con-cta-inner">
            <div class="con-cta-mascot">
                <svg class="con-cta-mascot-svg" viewBox="0 0 280 320" fill="none" xmlns="http://www.w3.org/2000/svg">
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
            <div class="con-cta-card">
                <h2 class="con-cta-title">Let's Build What's Next</h2>
                <p class="con-cta-desc">Whether you're exploring a new direction or ready to accelerate — let's talk about how Slingshot can help you get there.</p>
                <a href="/contact/?looking=Consulting" class="con-cta-btn">Book a Strategy Call &rarr;</a>
            </div>
        </div>
    </section>

</div><!-- .consulting-page-wrapper -->

<?php get_footer(); ?>
