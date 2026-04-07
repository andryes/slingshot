<?php
/*
 * Home Page – custom template (front-page.php)
 * Overrides the WordPress front page.
 */

wp_enqueue_style(
    'hp-jakarta',
    'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap',
    array(), null
);
wp_enqueue_style(
    'hp-style',
    get_stylesheet_directory_uri() . '/css/home.css',
    array(), '1.1'
);
wp_enqueue_script(
    'hp-script',
    get_stylesheet_directory_uri() . '/js/home.js',
    array('jquery'), '1.1', true
);

get_header();

/* ── Queries ─────────────────────────────────── */
$blog_query = new WP_Query( array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => 3,
    'orderby'        => 'date',
    'order'          => 'DESC',
) );

$work_query = new WP_Query( array(
    'post_type'      => 'salient_portfolio',
    'post_status'    => 'publish',
    'posts_per_page' => 6,
    'orderby'        => 'date',
    'order'          => 'DESC',
) );

$img_dir = get_stylesheet_directory_uri() . '/img';
?>

<style>
/* Push content below fixed Salient header */
@media (min-width: 1000px) {
    .home-page-wrapper { margin-top: 0; }
    body #header-space { display: none !important; }
    .home-hero-section { padding-top: 0; }
    .home-hero-inner { padding-top: 110px; }
}
</style>

<div class="home-page-wrapper">

    <!-- ── Hero ─────────────────────────────────── -->
    <section class="home-hero-section">
        <div class="hp-blob hp-blob-1"></div>
        <div class="hp-blob hp-blob-2"></div>
        <div class="hp-blob hp-blob-3"></div>
        <div class="hp-blob hp-blob-4"></div>

        <div class="home-hero-inner">

            <!-- Left -->
            <div class="home-hero-content">
                <h1 class="home-hero-title">For Big Kids<br>&amp; Daredevils</h1>
                <p class="home-hero-subtitle">A Tech Consultancy &amp; Creation Studio</p>
                <a href="/contact" class="home-hero-cta">Book a call &rarr;</a>
            </div>

            <!-- Right – video card -->
            <div>
                <div class="home-hero-card">
                    <img
                        src="<?php echo esc_url( $img_dir ); ?>/hero-person-1.jpg"
                        alt="20 Years of Software &amp; Tech Expertise, at Your Service"
                        loading="eager"
                    >
                    <div class="home-hero-card-overlay">
                        <p class="home-hero-card-text">20 Years of Software &amp; Tech<br>Expertise, at Your Service</p>
                        <button class="home-hero-play-btn" aria-label="Play video">
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
            <div class="home-logos-strip">
                <span class="logo-item">Connected Caregiver</span>
                <span class="logo-item">Churchill Downs</span>
                <span class="logo-item">HealthRev</span>
                <span class="logo-item">Paysign</span>
                <span class="logo-item">ProjectTeam</span>
                <span class="logo-item">Schneider Electric</span>
                <span class="logo-item">Zoeller</span>
                <span class="logo-item">Univ. of Louisville</span>
            </div>
        </div>

    </section><!-- .home-hero-section -->

    <!-- ── What We Do ────────────────────────────── -->
    <section class="home-services-section">
        <div class="home-services-inner">

            <!-- Left text -->
            <div class="home-services-left">
                <span class="home-services-label">What We Do</span>
                <h2 class="home-services-title">We help companies move faster, think bigger, and build smarter with modern solutions that drive real business momentum.</h2>
                <a href="/services" class="home-services-cta">Our Services &rarr;</a>
            </div>

            <!-- Right service cards -->
            <div class="home-services-grid">

                <!-- Consulting – featured -->
                <a href="/consulting" class="service-card featured">
                    <div>
                        <div class="service-card-icon">
                            <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="6" y="8" width="28" height="20" rx="3" stroke="#4B23B0" stroke-width="2"/>
                                <path d="M14 28L12 32M26 28L28 32M10 32H30" stroke="#4B23B0" stroke-width="2" stroke-linecap="round"/>
                                <circle cx="20" cy="18" r="5" stroke="#4B23B0" stroke-width="2"/>
                            </svg>
                        </div>
                        <h3 class="service-card-title">Consulting</h3>
                        <p class="service-card-desc">Cut through complexity and turn insight into impact—fast.</p>
                    </div>
                    <div class="service-card-arrow">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
                            <path d="M1 13L13 1M13 1H5M13 1V9" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </a>

                <!-- AI -->
                <a href="/ai" class="service-card dark">
                    <div class="service-card-icon">
                        <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="20" cy="20" r="7" stroke="rgba(255,255,255,.85)" stroke-width="2"/>
                            <path d="M20 6V11M20 29V34M6 20H11M29 20H34M9.4 9.4l3.5 3.5M27.1 27.1l3.5 3.5M30.6 9.4l-3.5 3.5M12.9 27.1l-3.5 3.5" stroke="rgba(255,255,255,.85)" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <h3 class="service-card-title">Artificial<br>Intelligence</h3>
                </a>

                <!-- Teams -->
                <a href="/teams" class="service-card light">
                    <div class="service-card-icon">
                        <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="15" cy="13" r="5" stroke="#4B23B0" stroke-width="2"/>
                            <circle cx="27" cy="13" r="5" stroke="#4B23B0" stroke-width="2"/>
                            <path d="M6 33c0-5.523 4.477-10 10-10h8c5.523 0 10 4.477 10 10" stroke="#4B23B0" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <h3 class="service-card-title">Teams</h3>
                </a>

                <!-- Product -->
                <a href="/product" class="service-card dark">
                    <div class="service-card-icon">
                        <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="8" y="8" width="24" height="24" rx="4" stroke="rgba(255,255,255,.85)" stroke-width="2"/>
                            <path d="M14 20h12M14 14h12M14 26h6" stroke="rgba(255,255,255,.85)" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <h3 class="service-card-title">Product</h3>
                </a>

            </div><!-- .home-services-grid -->
        </div>
    </section>

    <!-- ── Work Portfolio ────────────────────────── -->
    <section class="home-work-section">
        <div class="home-work-inner">

            <div class="home-section-header">
                <h2 class="home-section-title">From Solution<br>to Success Stories</h2>
                <a href="/work" class="home-section-link">All Work &rarr;</a>
            </div>

            <div class="home-work-carousel">
                <div class="home-work-track" id="workTrack">

                    <?php if ( $work_query->have_posts() ) : ?>
                        <?php while ( $work_query->have_posts() ) : $work_query->the_post(); ?>
                            <a href="<?php the_permalink(); ?>" class="work-card">
                                <div class="work-card-image">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <?php the_post_thumbnail( 'medium_large', array( 'loading' => 'lazy' ) ); ?>
                                    <?php endif; ?>
                                </div>
                                <div class="work-card-body">
                                    <div class="work-card-tags">
                                        <?php
                                        $terms = get_the_terms( get_the_ID(), 'portfolio_category' );
                                        if ( $terms && ! is_wp_error( $terms ) ) :
                                            foreach ( array_slice( $terms, 0, 3 ) as $t ) :
                                        ?>
                                            <span class="work-card-tag"><?php echo esc_html( $t->name ); ?></span>
                                        <?php endforeach; endif; ?>
                                    </div>
                                    <h3 class="work-card-title"><?php the_title(); ?></h3>
                                    <p class="work-card-desc"><?php echo wp_trim_words( get_the_excerpt(), 18, '...' ); ?></p>
                                </div>
                            </a>
                        <?php endwhile; wp_reset_postdata(); ?>

                    <?php else : ?>
                        <!-- Static fallback cards -->
                        <a href="#" class="work-card">
                            <div class="work-card-image" style="background:linear-gradient(135deg,#e8e8f5,#cccce8);"></div>
                            <div class="work-card-body">
                                <div class="work-card-tags"><span class="work-card-tag">AI</span><span class="work-card-tag">Product</span><span class="work-card-tag">Mobile</span></div>
                                <h3 class="work-card-title">Horizon Engage</h3>
                                <p class="work-card-desc">Developed a mobile app that simplifies insurance, enabling easy claims and reducing paperwork.</p>
                            </div>
                        </a>
                        <a href="#" class="work-card">
                            <div class="work-card-image" style="background:linear-gradient(135deg,#1a2560,#2d3a80);"></div>
                            <div class="work-card-body">
                                <div class="work-card-tags"><span class="work-card-tag">AI</span><span class="work-card-tag">Product</span><span class="work-card-tag">Mobile</span></div>
                                <h3 class="work-card-title">Southeast Christian Church</h3>
                                <p class="work-card-desc">Built a scalable platform to serve thousands of members with digital tools for events and community.</p>
                            </div>
                        </a>
                        <a href="#" class="work-card">
                            <div class="work-card-image" style="background:linear-gradient(135deg,#1a4560,#2d7090);"></div>
                            <div class="work-card-body">
                                <div class="work-card-tags"><span class="work-card-tag">AI</span><span class="work-card-tag">Product</span><span class="work-card-tag">Mobile</span></div>
                                <h3 class="work-card-title">Connected Caregiver</h3>
                                <p class="work-card-desc">Developed a mobile app that simplifies insurance, enabling easy claims and reducing paperwork.</p>
                            </div>
                        </a>
                        <a href="#" class="work-card">
                            <div class="work-card-image" style="background:linear-gradient(135deg,#2a1060,#4a20a0);"></div>
                            <div class="work-card-body">
                                <div class="work-card-tags"><span class="work-card-tag">Consulting</span><span class="work-card-tag">Product</span></div>
                                <h3 class="work-card-title">FormCredit Mid-America</h3>
                                <p class="work-card-desc">Modernized agricultural lending with a streamlined digital platform for loan officers and farmers.</p>
                            </div>
                        </a>
                    <?php endif; ?>

                </div><!-- #workTrack -->

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
            </div><!-- .home-work-carousel -->

        </div>
    </section>

    <!-- ── About / Stats ─────────────────────────── -->
    <section class="home-about-section">
        <div class="home-about-inner">

            <div class="home-about-left">
                <img
                    src="<?php echo esc_url( $img_dir ); ?>/hero-person-2.jpg"
                    alt="Slingshot team"
                    loading="lazy"
                >
                <div class="home-about-left-content">
                    <h2 class="home-about-title">Built for Real-World Delivery</h2>
                    <p class="home-about-desc">Slingshot was built by a collective of strategists, creatives, and data scientists who care deeply about outcomes.</p>
                    <a href="/contact" class="home-about-btn">Get in Touch &rarr;</a>
                </div>
            </div>

            <div class="home-about-right">
                <p class="home-about-tagline">Slingshot helps organizations launch smarter products, modernize systems, and solve real-world challenges faster.</p>
                <div class="home-stats-grid">
                    <div class="home-stat">
                        <div class="home-stat-number">15+</div>
                        <div class="home-stat-label">Industries served</div>
                    </div>
                    <div class="home-stat">
                        <div class="home-stat-number">250+</div>
                        <div class="home-stat-label">Successful projects</div>
                    </div>
                    <div class="home-stat">
                        <div class="home-stat-number">20</div>
                        <div class="home-stat-label">Years in business</div>
                    </div>
                    <div class="home-stat">
                        <div class="home-stat-number">40+</div>
                        <div class="home-stat-label">Industry awards</div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ── Join the Conversation (Events) ────────── -->
    <section class="home-events-section">
        <div class="home-events-inner">

            <div class="home-events-header">
                <h2 class="home-events-title">Join the Conversation</h2>
                <div class="home-events-meta">
                    <p class="home-events-desc">We don't just build, we share. Explore upcoming events for leaders building in AI, product, and tech strategy.</p>
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

    <!-- ── Insights (Blog) ───────────────────────── -->
    <section class="home-blog-section">
        <div class="home-blog-inner">

            <div class="home-blog-header">
                <h2 class="home-blog-title">Insights That Move<br>Business Forward</h2>
                <div class="home-blog-meta">
                    <p class="home-blog-desc">Get actionable ideas on software strategy, AI adoption, and scaling product delivery—straight from the minds of our team.</p>
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
                                <?php if ( get_post_format() === 'video' ) : ?>
                                    <span class="blog-card-badge">VIDEO</span>
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
                    <!-- Static fallback -->
                    <a href="#" class="blog-card">
                        <div class="blog-card-image">
                            <span class="blog-card-badge">VIDEO</span>
                        </div>
                        <div class="blog-card-body">
                            <div class="blog-card-tags"><span class="blog-card-tag">AI</span></div>
                            <h3 class="blog-card-title">"AI is enterprise-ready and simplifies development"</h3>
                            <p class="blog-card-desc">Davis Galeana (CEO &amp; President of Slingshot) shares how AI is transforming enterprise software development.</p>
                        </div>
                    </a>
                    <a href="#" class="blog-card">
                        <div class="blog-card-image" style="background:linear-gradient(135deg,#1a3560,#2d5080);"></div>
                        <div class="blog-card-body">
                            <div class="blog-card-tags"><span class="blog-card-tag">Innovation</span></div>
                            <h3 class="blog-card-title">How AI has rewired the hackathon</h3>
                            <p class="blog-card-desc">Exploring how artificial intelligence is transforming the way teams approach hackathons and rapid prototyping.</p>
                        </div>
                    </a>
                    <a href="#" class="blog-card">
                        <div class="blog-card-image" style="background:linear-gradient(135deg,#1a4530,#2d6045);"></div>
                        <div class="blog-card-body">
                            <div class="blog-card-tags"><span class="blog-card-tag">Product</span></div>
                            <h3 class="blog-card-title">4 Ways to Jumpstart real AI product development</h3>
                            <p class="blog-card-desc">Practical strategies to move from AI ideation to a working product faster than you think.</p>
                        </div>
                    </a>
                <?php endif; ?>
            </div>

        </div>
    </section>

    <!-- ── Newsletter ───────────────────────────── -->
    <section class="home-newsletter-section">
        <div class="home-newsletter-inner">
            <div class="home-newsletter-content">
                <p class="home-newsletter-label">Newsletter</p>
                <h2 class="home-newsletter-title">Stay in the Loop</h2>
                <p class="home-newsletter-desc">Get the latest news from Slingshot with our bi-weekly newsletter — AI trends, product updates, and team insights.</p>
            </div>
            <form class="home-newsletter-form" onsubmit="return false;">
                <div class="home-newsletter-input-wrap">
                    <input type="email" class="home-newsletter-input" placeholder="Enter your email address" aria-label="Email address">
                    <button type="submit" class="home-newsletter-btn">Subscribe &rarr;</button>
                </div>
                <p class="home-newsletter-fine">No spam, ever. Unsubscribe any time.</p>
            </form>
        </div>
    </section>

    <!-- ── CTA ───────────────────────────────────── -->
    <section class="home-cta-section">
        <div class="home-cta-inner">

            <!-- Mascot illustration -->
            <div class="home-cta-mascot">
                <?php
                $mascot_path = get_stylesheet_directory() . '/img/cta-mascot.png';
                $mascot_url  = get_stylesheet_directory_uri() . '/img/cta-mascot.png';
                if ( file_exists( $mascot_path ) ) : ?>
                    <img src="<?php echo esc_url( $mascot_url ); ?>" alt="Slingshot mascot" width="380" height="420">
                <?php else : ?>
                <!-- TODO: Export mascot from Figma (node 8930-23258) and save to img/cta-mascot.png -->
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
                <h2 class="home-cta-title">Ready to Launch Something Bold?</h2>
                <p class="home-cta-desc">Let's talk about how we help teams like yours bring new products to life—and make them work in the real world.</p>
                <a href="/contact" class="home-cta-btn">Let's talk &rarr;</a>
            </div>

        </div>
    </section>

</div><!-- .home-page-wrapper -->

<?php get_footer(); ?>
