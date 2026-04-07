<?php
/*
Template Name: Bootcamp
*/

wp_enqueue_style(
    'bootcamp-jakarta',
    'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap',
    array(), null
);
wp_enqueue_style( 'home-style',       get_stylesheet_directory_uri() . '/css/home.css',       array(), '1.1' );
wp_enqueue_style( 'bootcamp-style',   get_stylesheet_directory_uri() . '/css/bootcamp.css',   array(), '1.0' );
wp_enqueue_script( 'bootcamp-script', get_stylesheet_directory_uri() . '/js/bootcamp.js', array('jquery'), '1.0', true );

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

<div class="bootcamp-page-wrapper">

    <!-- ════════════════════════════════════
         1. HERO
    ════════════════════════════════════ -->
    <section class="boot-hero">
        <div class="boot-hero-blob boot-hero-blob-1"></div>
        <div class="boot-hero-blob boot-hero-blob-2"></div>
        <div class="boot-hero-blob boot-hero-blob-3"></div>

        <div class="boot-hero-inner">
            <div class="boot-hero-content">
                <div class="boot-hero-breadcrumb">
                    <span>SERVICES</span>
                    <span class="boot-hero-sep">/</span>
                    <span>BOOTCAMP</span>
                </div>
                <h1 class="boot-hero-heading">AI Bootcamp<br>for Teams</h1>
                <p class="boot-hero-subtext">Hands-on, practitioner-led training that turns your team into confident AI builders — in days, not months.</p>
                <div class="boot-hero-actions">
                    <a href="/contact/?looking=Bootcamp" class="boot-hero-btn boot-hero-btn-primary">Book a Bootcamp <span>&#8594;</span></a>
                    <a href="#boot-curriculum" class="boot-hero-btn boot-hero-btn-ghost">See the Curriculum</a>
                </div>
            </div>

            <div class="boot-hero-visual">
                <div class="boot-hero-card-stack">
                    <div class="boot-hero-card boot-hero-card-1">
                        <div class="boot-hero-card-icon">
                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none"><circle cx="14" cy="14" r="14" fill="rgba(255,255,255,0.12)"/><path d="M9 14l3.5 3.5L19 10" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </div>
                        <div>
                            <div class="boot-hero-card-title">Led by AI Practitioners</div>
                            <div class="boot-hero-card-sub">Real projects, real experience</div>
                        </div>
                    </div>
                    <div class="boot-hero-card boot-hero-card-2">
                        <div class="boot-hero-card-icon">
                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none"><circle cx="14" cy="14" r="14" fill="rgba(255,255,255,0.12)"/><path d="M8 18V12l6-4 6 4v6" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><rect x="11" y="14" width="6" height="4" rx="1" stroke="#fff" stroke-width="2"/></svg>
                        </div>
                        <div>
                            <div class="boot-hero-card-title">Leave with Results</div>
                            <div class="boot-hero-card-sub">Working prototypes from day one</div>
                        </div>
                    </div>
                    <div class="boot-hero-card boot-hero-card-3">
                        <div class="boot-hero-card-icon">
                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none"><circle cx="14" cy="14" r="14" fill="rgba(255,255,255,0.12)"/><circle cx="10" cy="11" r="3" stroke="#fff" stroke-width="2"/><circle cx="18" cy="11" r="3" stroke="#fff" stroke-width="2"/><path d="M5 20c0-2.761 2.239-5 5-5h8c2.761 0 5 2.239 5 5" stroke="#fff" stroke-width="2" stroke-linecap="round"/></svg>
                        </div>
                        <div>
                            <div class="boot-hero-card-title">Cross-functional Impact</div>
                            <div class="boot-hero-card-sub">Built for whole teams, not just devs</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ════════════════════════════════════
         2. WHY TEAMS CHOOSE
    ════════════════════════════════════ -->
    <section class="boot-why-section">
        <div class="boot-why-inner">
            <div class="boot-why-header">
                <p class="boot-why-eyebrow">Why It Works</p>
                <h2 class="boot-why-heading">Why Teams Choose<br>Slingshot's AI Bootcamps</h2>
                <p class="boot-why-desc">Most AI training stays theoretical. Ours doesn't. Every bootcamp is built around your team's real goals — with outcomes you can ship.</p>
            </div>

            <div class="boot-why-cards">
                <div class="boot-why-card">
                    <div class="boot-why-card-icon boot-why-card-icon-purple">
                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="10" fill="#6D44B7" fill-opacity=".12"/><path d="M12 24V18l6-4 6 4v6" stroke="#6D44B7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><rect x="15" y="18" width="6" height="6" rx="1" stroke="#6D44B7" stroke-width="2"/><circle cx="18" cy="12" r="2" stroke="#6D44B7" stroke-width="2"/></svg>
                    </div>
                    <h3 class="boot-why-card-title">Led by AI Practitioners</h3>
                    <p class="boot-why-card-text">Our instructors aren't academics — they're engineers and product leads who've shipped AI in production. Every lesson draws from real-world experience.</p>
                </div>

                <div class="boot-why-card boot-why-card-featured">
                    <div class="boot-why-card-icon boot-why-card-icon-teal">
                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="10" fill="#23B7B4" fill-opacity=".12"/><path d="M10 26l4-8 4 4 4-10 4 8" stroke="#23B7B4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </div>
                    <h3 class="boot-why-card-title">Leave with Results</h3>
                    <p class="boot-why-card-text">Participants don't just learn concepts — they build working AI prototypes during the program, so your team leaves with something tangible on day one.</p>
                    <div class="boot-why-card-badge">Most Popular</div>
                </div>

                <div class="boot-why-card">
                    <div class="boot-why-card-icon boot-why-card-icon-purple">
                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="10" fill="#6D44B7" fill-opacity=".12"/><circle cx="14" cy="14" r="4" stroke="#6D44B7" stroke-width="2"/><circle cx="22" cy="14" r="4" stroke="#6D44B7" stroke-width="2"/><path d="M8 28c0-3.314 2.686-6 6-6h8c3.314 0 6 2.686 6 6" stroke="#6D44B7" stroke-width="2" stroke-linecap="round"/></svg>
                    </div>
                    <h3 class="boot-why-card-title">Cross-functional Impact</h3>
                    <p class="boot-why-card-text">Designed for mixed teams — engineers, PMs, designers, and business leads — so AI adoption becomes an organization-wide capability, not just a dev skill.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ════════════════════════════════════
         3. STATS / OUTCOMES
    ════════════════════════════════════ -->
    <section class="boot-stats-section">
        <div class="boot-stats-inner">
            <div class="boot-stats-content">
                <h2 class="boot-stats-heading">Training That<br>Moves the Needle</h2>
                <p class="boot-stats-desc">Slingshot has helped companies across industries build real AI capabilities. Our bootcamps are the fastest path from curiosity to production-ready results.</p>
                <a href="/work/" class="boot-stats-cta">See Our Work <span>&#8594;</span></a>
            </div>
            <div class="boot-stats-grid">
                <div class="boot-stat">
                    <span class="boot-stat-num">500+</span>
                    <span class="boot-stat-label">Professionals trained</span>
                </div>
                <div class="boot-stat">
                    <span class="boot-stat-num">40+</span>
                    <span class="boot-stat-label">Enterprise clients</span>
                </div>
                <div class="boot-stat">
                    <span class="boot-stat-num">15+</span>
                    <span class="boot-stat-label">Industries served</span>
                </div>
                <div class="boot-stat">
                    <span class="boot-stat-num">92%</span>
                    <span class="boot-stat-label">Satisfaction rate</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ════════════════════════════════════
         4. CURRICULUM
    ════════════════════════════════════ -->
    <section class="boot-curriculum-section" id="boot-curriculum">
        <div class="boot-curriculum-inner">
            <div class="boot-curriculum-header">
                <p class="boot-curriculum-eyebrow">What You'll Cover</p>
                <h2 class="boot-curriculum-heading">A Curriculum Built<br>for Real-World AI</h2>
                <p class="boot-curriculum-desc">Choose the track that fits your team's goals — or let us build a custom program around your specific use cases.</p>
            </div>

            <div class="boot-curriculum-body">
                <!-- Tab nav -->
                <div class="boot-tabs">
                    <button class="boot-tab active" data-tab="foundations">AI Foundations</button>
                    <button class="boot-tab" data-tab="product">AI for Product Teams</button>
                    <button class="boot-tab" data-tab="engineering">AI Engineering</button>
                    <button class="boot-tab" data-tab="custom">Custom Program</button>
                </div>

                <!-- Tab panels -->
                <div class="boot-tab-panels">
                    <div class="boot-tab-panel active" id="boot-tab-foundations">
                        <div class="boot-tab-panel-grid">
                            <div class="boot-tab-info">
                                <div class="boot-tab-badge">2 Days · On-site or Remote</div>
                                <h3>AI Foundations</h3>
                                <p>The starting point for any team new to AI. Learn the core concepts, tools, and thinking frameworks needed to work confidently in an AI-enabled world.</p>
                                <ul>
                                    <li>How large language models work (no PhD required)</li>
                                    <li>Prompt engineering & AI communication patterns</li>
                                    <li>Evaluating AI tools for your business context</li>
                                    <li>Ethics, bias, and responsible AI use</li>
                                    <li>Hands-on exercises with real AI platforms</li>
                                </ul>
                                <a href="/contact/?looking=AI+Bootcamp+Foundations" class="boot-tab-cta">Book This Track <span>&#8594;</span></a>
                            </div>
                            <div class="boot-tab-visual">
                                <div class="boot-module-cards">
                                    <div class="boot-module">
                                        <span class="boot-module-day">Day 1</span>
                                        <span class="boot-module-name">Understanding AI &amp; LLMs</span>
                                    </div>
                                    <div class="boot-module">
                                        <span class="boot-module-day">Day 1</span>
                                        <span class="boot-module-name">Prompt Engineering Workshop</span>
                                    </div>
                                    <div class="boot-module">
                                        <span class="boot-module-day">Day 2</span>
                                        <span class="boot-module-name">Tool Evaluation &amp; Selection</span>
                                    </div>
                                    <div class="boot-module">
                                        <span class="boot-module-day">Day 2</span>
                                        <span class="boot-module-name">Build Your First AI Workflow</span>
                                    </div>
                                    <div class="boot-module boot-module-capstone">
                                        <span class="boot-module-day">Capstone</span>
                                        <span class="boot-module-name">Team Prototype Presentation</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="boot-tab-panel" id="boot-tab-product">
                        <div class="boot-tab-panel-grid">
                            <div class="boot-tab-info">
                                <div class="boot-tab-badge">3 Days · On-site or Remote</div>
                                <h3>AI for Product Teams</h3>
                                <p>Built for PMs, designers, and business leads who need to identify where AI creates value and how to spec AI-powered features their engineering teams can build.</p>
                                <ul>
                                    <li>AI opportunity mapping for your product</li>
                                    <li>Writing AI feature specs and user stories</li>
                                    <li>Designing AI-augmented user experiences</li>
                                    <li>Measuring AI feature success</li>
                                    <li>Working with engineering on AI integration</li>
                                </ul>
                                <a href="/contact/?looking=AI+Bootcamp+Product" class="boot-tab-cta">Book This Track <span>&#8594;</span></a>
                            </div>
                            <div class="boot-tab-visual">
                                <div class="boot-module-cards">
                                    <div class="boot-module">
                                        <span class="boot-module-day">Day 1</span>
                                        <span class="boot-module-name">AI Product Strategy</span>
                                    </div>
                                    <div class="boot-module">
                                        <span class="boot-module-day">Day 1</span>
                                        <span class="boot-module-name">Opportunity Discovery Workshop</span>
                                    </div>
                                    <div class="boot-module">
                                        <span class="boot-module-day">Day 2</span>
                                        <span class="boot-module-name">UX &amp; Design for AI</span>
                                    </div>
                                    <div class="boot-module">
                                        <span class="boot-module-day">Day 2</span>
                                        <span class="boot-module-name">Feature Spec Writing Lab</span>
                                    </div>
                                    <div class="boot-module">
                                        <span class="boot-module-day">Day 3</span>
                                        <span class="boot-module-name">Prototype &amp; Roadmap Presentation</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="boot-tab-panel" id="boot-tab-engineering">
                        <div class="boot-tab-panel-grid">
                            <div class="boot-tab-info">
                                <div class="boot-tab-badge">3 Days · On-site or Remote</div>
                                <h3>AI Engineering</h3>
                                <p>For software engineers ready to build with AI — from integrating LLM APIs to building agents, RAG pipelines, and production-grade AI features.</p>
                                <ul>
                                    <li>LLM API integration (OpenAI, Claude, Gemini)</li>
                                    <li>RAG: retrieval-augmented generation patterns</li>
                                    <li>Building and orchestrating AI agents</li>
                                    <li>Evaluating and testing AI outputs</li>
                                    <li>Production deployment and cost management</li>
                                </ul>
                                <a href="/contact/?looking=AI+Bootcamp+Engineering" class="boot-tab-cta">Book This Track <span>&#8594;</span></a>
                            </div>
                            <div class="boot-tab-visual">
                                <div class="boot-module-cards">
                                    <div class="boot-module">
                                        <span class="boot-module-day">Day 1</span>
                                        <span class="boot-module-name">LLM APIs &amp; Prompt Engineering</span>
                                    </div>
                                    <div class="boot-module">
                                        <span class="boot-module-day">Day 1</span>
                                        <span class="boot-module-name">RAG Architecture Deep Dive</span>
                                    </div>
                                    <div class="boot-module">
                                        <span class="boot-module-day">Day 2</span>
                                        <span class="boot-module-name">Agent Design &amp; Orchestration</span>
                                    </div>
                                    <div class="boot-module">
                                        <span class="boot-module-day">Day 2</span>
                                        <span class="boot-module-name">Evals, Testing &amp; Guardrails</span>
                                    </div>
                                    <div class="boot-module boot-module-capstone">
                                        <span class="boot-module-day">Day 3</span>
                                        <span class="boot-module-name">Ship an AI Feature End-to-End</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="boot-tab-panel" id="boot-tab-custom">
                        <div class="boot-tab-panel-grid">
                            <div class="boot-tab-info">
                                <div class="boot-tab-badge">Custom Duration &amp; Format</div>
                                <h3>Custom Program</h3>
                                <p>Have a specific challenge or use case in mind? We'll design a bootcamp program around your team's exact context — your industry, your stack, your goals.</p>
                                <ul>
                                    <li>Discovery call to understand your team's needs</li>
                                    <li>Tailored curriculum and exercises</li>
                                    <li>Pre-built around your actual data and systems</li>
                                    <li>Flexible format: on-site, remote, or hybrid</li>
                                    <li>Ongoing follow-up coaching available</li>
                                </ul>
                                <a href="/contact/?looking=AI+Bootcamp+Custom" class="boot-tab-cta">Talk to Us <span>&#8594;</span></a>
                            </div>
                            <div class="boot-tab-visual boot-tab-visual-custom">
                                <div class="boot-custom-card">
                                    <div class="boot-custom-icon">
                                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none"><circle cx="24" cy="24" r="24" fill="rgba(109,68,183,0.1)"/><path d="M16 32V24l8-6 8 6v8" stroke="#6D44B7" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/><rect x="20" y="24" width="8" height="8" rx="1.5" stroke="#6D44B7" stroke-width="2.5"/><path d="M24 16v-4M18 18l-3-3M30 18l3-3" stroke="#23B7B4" stroke-width="2" stroke-linecap="round"/></svg>
                                    </div>
                                    <p class="boot-custom-text">Every industry is different. Every team is different. Let's build something that actually fits.</p>
                                    <a href="/contact/?looking=AI+Bootcamp+Custom" class="boot-custom-btn">Schedule a Discovery Call &rarr;</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ════════════════════════════════════
         5. HOW IT WORKS
    ════════════════════════════════════ -->
    <section class="boot-how-section">
        <div class="boot-how-inner">
            <div class="boot-how-header">
                <p class="boot-how-eyebrow">The Process</p>
                <h2 class="boot-how-heading">How It Works</h2>
            </div>
            <div class="boot-how-steps">
                <div class="boot-how-step">
                    <div class="boot-how-step-num">01</div>
                    <div class="boot-how-step-content">
                        <h3>Assess</h3>
                        <p>We start with a discovery call to understand your team's current AI knowledge, your tech environment, and the outcomes you're aiming for.</p>
                    </div>
                </div>
                <div class="boot-how-connector"></div>
                <div class="boot-how-step">
                    <div class="boot-how-step-num">02</div>
                    <div class="boot-how-step-content">
                        <h3>Design</h3>
                        <p>We tailor the curriculum, exercises, and real-world scenarios to match your team's role and business context — nothing generic.</p>
                    </div>
                </div>
                <div class="boot-how-connector"></div>
                <div class="boot-how-step">
                    <div class="boot-how-step-num">03</div>
                    <div class="boot-how-step-content">
                        <h3>Learn &amp; Build</h3>
                        <p>Hands-on sessions where your team learns concepts and immediately applies them — building real AI tools and workflows throughout.</p>
                    </div>
                </div>
                <div class="boot-how-connector"></div>
                <div class="boot-how-step">
                    <div class="boot-how-step-num">04</div>
                    <div class="boot-how-step-content">
                        <h3>Embed</h3>
                        <p>Participants leave with working prototypes, playbooks, and optionally access to Slingshot coaches for ongoing support as they implement.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ════════════════════════════════════
         6. UPCOMING BOOTCAMPS (Events)
    ════════════════════════════════════ -->
    <section class="home-events-section boot-events-section">
        <div class="home-events-inner">
            <div class="home-events-header">
                <h2 class="home-events-title">Upcoming Bootcamps</h2>
                <div class="home-events-meta">
                    <p class="home-events-desc">Join one of our public cohorts or bring a private bootcamp to your team. New dates added regularly.</p>
                    <a href="/events" class="home-section-link">All Events &rarr;</a>
                </div>
            </div>
            <div class="home-events-cards">
                <a href="#" class="event-card">
                    <div class="event-card-image" style="background:linear-gradient(135deg,#1B1060,#6D44B7);"></div>
                    <div class="event-card-body">
                        <div class="event-card-info">
                            <span class="event-card-tag">AI Foundations</span>
                            <h3 class="event-card-title">AI Foundations Bootcamp — Public Cohort</h3>
                            <p class="event-card-date">May 14–15, 2025 &middot; Online</p>
                        </div>
                        <span class="event-register-btn">Register &rarr;</span>
                    </div>
                </a>
                <a href="#" class="event-card">
                    <div class="event-card-image" style="background:linear-gradient(135deg,#0d6e6b,#23B7B4);"></div>
                    <div class="event-card-body">
                        <div class="event-card-info">
                            <span class="event-card-tag">AI Engineering</span>
                            <h3 class="event-card-title">AI Engineering Bootcamp — Louisville, KY</h3>
                            <p class="event-card-date">June 4–6, 2025 &middot; Louisville, KY</p>
                        </div>
                        <span class="event-register-btn">Register &rarr;</span>
                    </div>
                </a>
                <a href="#" class="event-card">
                    <div class="event-card-image" style="background:linear-gradient(135deg,#2A1878,#4B23B0);"></div>
                    <div class="event-card-body">
                        <div class="event-card-info">
                            <span class="event-card-tag">Custom</span>
                            <h3 class="event-card-title">Private Bootcamp — Bring It to Your Team</h3>
                            <p class="event-card-date">Flexible dates &middot; On-site or Remote</p>
                        </div>
                        <span class="event-register-btn">Contact Us &rarr;</span>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- ════════════════════════════════════
         7. TRUSTED CLIENTS
    ════════════════════════════════════ -->
    <section class="boot-clients-section">
        <div class="boot-clients-inner">
            <p class="boot-clients-label">Teams We've Trained</p>
            <div class="home-logos-strip-wrapper">
                <div class="home-logos-strip">
                    <span class="logo-item">Churchill Downs</span>
                    <span class="logo-item">Schneider Electric</span>
                    <span class="logo-item">MetLife</span>
                    <span class="logo-item">Univ. of Louisville</span>
                    <span class="logo-item">HealthRev</span>
                    <span class="logo-item">Paysign</span>
                    <span class="logo-item">ProjectTeam</span>
                    <span class="logo-item">Zoeller</span>
                    <span class="logo-item">Equibase</span>
                    <span class="logo-item">Connected Caregiver</span>
                    <!-- duplicate for seamless loop -->
                    <span class="logo-item">Churchill Downs</span>
                    <span class="logo-item">Schneider Electric</span>
                    <span class="logo-item">MetLife</span>
                    <span class="logo-item">Univ. of Louisville</span>
                    <span class="logo-item">HealthRev</span>
                    <span class="logo-item">Paysign</span>
                    <span class="logo-item">ProjectTeam</span>
                    <span class="logo-item">Zoeller</span>
                    <span class="logo-item">Equibase</span>
                    <span class="logo-item">Connected Caregiver</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ════════════════════════════════════
         8. INSIGHTS (Blog)
    ════════════════════════════════════ -->
    <section class="home-blog-section boot-blog-section">
        <div class="home-blog-inner">
            <div class="home-blog-header">
                <h2 class="home-blog-title">AI Insights for<br>Modern Teams</h2>
                <div class="home-blog-meta">
                    <p class="home-blog-desc">Practical thinking on AI adoption, team enablement, and what it really takes to build AI capabilities inside an organization.</p>
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
                            <span class="blog-card-tag">AI</span>
                            <h3 class="blog-card-title">What It Actually Takes to Make Your Team AI-Ready</h3>
                        </div>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- ════════════════════════════════════
         9. CTA
    ════════════════════════════════════ -->
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
                <h2 class="boot-cta-title">Ready to Train<br>Your Team?</h2>
                <p class="boot-cta-desc">Whether you want a public cohort spot or a private bootcamp built around your team — we'll make it happen fast.</p>
                <div class="boot-cta-actions">
                    <a href="/contact/?looking=Bootcamp" class="boot-cta-btn-primary">Book a Bootcamp &rarr;</a>
                    <a href="/contact/?looking=Bootcamp+Custom" class="boot-cta-btn-ghost">Talk to Us First</a>
                </div>
            </div>
        </div>
    </section>

</div><!-- .bootcamp-page-wrapper -->

<?php get_footer(); ?>
