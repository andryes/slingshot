<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) { exit; }

$child_uri = get_stylesheet_directory_uri();
wp_enqueue_style( 'slingshot-footer',      $child_uri . '/css/footer.css',        [], '1.3' );
wp_enqueue_style( 'slingshot-pages-figma', $child_uri . '/css/pages-figma.css',  [], '1.0' );
wp_enqueue_style( 'slingshot-pages-figma-2', $child_uri . '/css/pages-figma-2.css', [], '1.0' );

$sl_page_meta = static function ( $key, $default = '' ) {
    if ( function_exists( 'slingshot_pm' ) ) {
        $val = slingshot_pm( $key, null );
        if ( $val !== null && $val !== '' && $val !== false ) {
            return $val;
        }
    }
    return $default;
};
$sl_modal_heading = (string) $sl_page_meta( 'sl_contact_modal_heading', 'Hit us up' );
$sl_modal_options_raw = (string) $sl_page_meta( 'sl_contact_modal_looking_options', "General Inquiry\nProduct Development\nMobile App Development\nWeb Development\nDesign\nAI / Machine Learning\nTeam Augmentation\nConsulting" );
$sl_modal_options = array_values( array_filter( array_map( 'trim', explode( "\n", $sl_modal_options_raw ) ) ) );
$sl_modal_submit = (string) $sl_page_meta( 'sl_contact_modal_submit', "Let's Talk →" );
$sl_subscribe_heading = (string) $sl_page_meta( 'sl_subscribe_modal_heading', 'Get the latest news from Slingshot with our bi-weekly newsletter.' );
$sl_subscribe_submit = (string) $sl_page_meta( 'sl_subscribe_modal_submit', 'Subscribe →' );
$sl_default_video_url = (string) $sl_page_meta( 'sl_video_modal_url', '' );
?>

<footer class="sl-footer">
<div class="sl-footer-card">

    <!-- ── Main Footer ──────────────────────────── -->
    <div class="sl-footer-main">
        <div class="sl-footer-inner">

            <!-- Col 1: Contact -->
            <div class="sl-footer-col sl-footer-brand">
                <div class="sl-footer-contact">
                    <a href="mailto:hello@yslingshot.com" class="sl-footer-contact-link sl-contact-email">hello@Yslingshot.com</a>
                    <a href="tel:+15022546150" class="sl-footer-contact-link sl-contact-phone">502.254.6150</a>
                    <span class="sl-footer-contact-link sl-footer-address">118 E Main St, Suite 600<br>Louisville, KY 40202</span>
                </div>

                <!-- Social Icons -->
                <div class="sl-footer-social">
                    <a href="https://www.linkedin.com/company/slingshot-io/" class="sl-footer-social-link" target="_blank" rel="noopener" aria-label="LinkedIn">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
                    </a>
                    <a href="https://www.youtube.com/@slingshotio" class="sl-footer-social-link" target="_blank" rel="noopener" aria-label="YouTube">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46A2.78 2.78 0 0 0 1.46 6.42 29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58A2.78 2.78 0 0 0 3.41 19.6C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 0 0 1.95-1.95A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z"/><polygon points="9.75,15.02 15.5,12 9.75,8.98 9.75,15.02" fill="#282828"/></svg>
                    </a>
                    <a href="https://www.facebook.com/slingshotio" class="sl-footer-social-link" target="_blank" rel="noopener" aria-label="Facebook">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                    </a>
                </div>

                <!-- SOC 2 Badge -->
                <div class="sl-footer-badge">
                    <svg class="sl-footer-soc2-icon" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" width="56" height="56">
                        <circle cx="35" cy="35" r="33" stroke="rgba(255,255,255,.3)" stroke-width="1.5"/>
                        <text x="35" y="24" text-anchor="middle" font-size="7" font-weight="700" fill="rgba(255,255,255,.55)" font-family="sans-serif" letter-spacing="1">AICPA</text>
                        <text x="35" y="37" text-anchor="middle" font-size="11" font-weight="800" fill="rgba(255,255,255,.85)" font-family="sans-serif">SOC 2</text>
                        <text x="35" y="49" text-anchor="middle" font-size="6" fill="rgba(255,255,255,.5)" font-family="sans-serif" letter-spacing="1">CERTIFIED</text>
                    </svg>
                    <div class="sl-footer-soc2-text">
                        <span>WE ARE A SOC2</span>
                        <span>COMPLIANT COMPANY</span>
                    </div>
                </div>
            </div>

            <!-- Col 2: Services (2 sub-columns) -->
            <div class="sl-footer-col">
                <h4 class="sl-footer-col-heading">Services</h4>
                <div class="sl-footer-links-grid">
                    <ul class="sl-footer-links">
                        <li><a href="/consulting">Consulting</a></li>
                        <li><a href="/artificial-intelligence">AI</a></li>
                        <li><a href="/teams">Teams</a></li>
                        <li><a href="/product">Product</a></li>
                        <li><a href="/cloud-development">Cloud Development</a></li>
                        <li><a href="/enterprise-software">Enterprise Software<br>Development</a></li>
                        <li><a href="/staff-augmentation">Eastern Europe Staff<br>Augmentation</a></li>
                    </ul>
                    <ul class="sl-footer-links">
                        <li><a href="/healthcare-solutions">Healthcare<br>Solutions</a></li>
                        <li><a href="/ideation-ux">Ideation &amp; UX<br>Design</a></li>
                        <li><a href="/mobile-app-development">Mobile App<br>Development</a></li>
                        <li><a href="/startup-development">Startup<br>Development</a></li>
                        <li><a href="/technologies">Technologies</a></li>
                        <li><a href="/web-development">Web Development</a></li>
                    </ul>
                </div>
            </div>

            <!-- Col 3: Resources (2 sub-columns) -->
            <div class="sl-footer-col">
                <h4 class="sl-footer-col-heading">Resources</h4>
                <div class="sl-footer-links-grid">
                    <ul class="sl-footer-links">
                        <li><a href="/">Home</a></li>
                        <li><a href="/services">Services</a></li>
                        <li><a href="/work">Work</a></li>
                        <li><a href="/about">About</a></li>
                        <li><a href="/blog">Blog</a></li>
                        <li><a href="/contact">Contact</a></li>
                        <li><a href="/process">Process</a></li>
                    </ul>
                    <ul class="sl-footer-links">
                        <li><a href="/events">Events</a></li>
                        <li><a href="/careers">Careers</a></li>
                        <li><a href="/achievements">Achievements</a></li>
                        <li><a href="/locations-served">Locations Served</a></li>
                    </ul>
                </div>
            </div>

            <!-- Col 4: Newsletter -->
            <div class="sl-footer-col sl-footer-newsletter-col">
                <div class="sl-footer-newsletter-card">
                    <p class="sl-footer-newsletter-desc">Get the latest news from Slingshot with our bi-weekly newsletter.</p>
                    <button type="button" class="sl-footer-newsletter-btn" data-sl-modal="subscribe">Subscribe &rarr;</button>
                </div>
            </div>

        </div>
    </div>

    <!-- ── Copyright Bar ────────────────────────── -->
    <div class="sl-footer-bar">
        <div class="sl-footer-bar-inner">
            <span>&copy; <?php echo date('Y'); ?> Slingshot - Software &amp; App Development. All Rights Reserved.</span>
            <nav class="sl-footer-legal" aria-label="Legal">
                <a href="/privacy-policy">Privacy Policy</a>
                <span class="sl-footer-divider">|</span>
                <a href="/terms-and-conditions">Terms and Conditions</a>
            </nav>
        </div>
    </div>

</div><!-- .sl-footer-card -->
</footer>

</div><!--/ajax-content-wrap-->

<!-- ── Global "Hit us up" Contact Modal ────────────────────────────────── -->
<div class="sl-modal-overlay" id="slContactModal" role="dialog" aria-modal="true" aria-label="Contact form">
    <div class="sl-modal">
        <button class="sl-modal-close" id="slModalClose" aria-label="Close">&times;</button>
        <div class="sl-modal-inner">
            <h2 class="sl-modal-heading"><?php echo esc_html( $sl_modal_heading ); ?></h2>
            <div class="sl-modal-divider"></div>
            <?php
            // Use Gravity Form if a global form ID is set via option, else static HTML
            $sl_modal_gf_id = (int) get_option( 'slingshot_contact_modal_gf_id', 0 );
            if ( $sl_modal_gf_id && function_exists( 'gravity_form' ) ) :
                gravity_form( $sl_modal_gf_id, false, false, false, null, true, 1 );
            else : ?>
            <form class="sl-modal-form" method="post" action="#">
                <div class="sl-modal-select-wrap">
                    <select class="sl-modal-select">
                        <option value="" disabled selected>What are you looking for?</option>
                        <?php foreach ( $sl_modal_options as $opt ) : ?>
                            <option><?php echo esc_html( $opt ); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <span class="sl-modal-select-arrow">&#8964;</span>
                </div>
                <div class="sl-modal-row">
                    <div class="sl-modal-field">
                        <input type="text" class="sl-modal-input" placeholder="First Name*" required>
                    </div>
                    <div class="sl-modal-field">
                        <input type="text" class="sl-modal-input" placeholder="Last Name*" required>
                    </div>
                </div>
                <div class="sl-modal-field">
                    <input type="text" class="sl-modal-input" placeholder="Company">
                </div>
                <div class="sl-modal-row">
                    <div class="sl-modal-field">
                        <input type="email" class="sl-modal-input" placeholder="Email*" required>
                    </div>
                    <div class="sl-modal-field">
                        <input type="tel" class="sl-modal-input" placeholder="Phone*">
                    </div>
                </div>
                <div class="sl-modal-field">
                    <textarea class="sl-modal-textarea" placeholder="How can we help? Tell us a little bit about what you have going on"></textarea>
                </div>
                <div>
                    <button type="submit" class="sl-modal-submit"><?php echo esc_html( $sl_modal_submit ); ?></button>
                </div>
            </form>
            <?php endif; ?>
        </div>
    </div>
</div>
<script>
(function(){
    var overlay = document.getElementById('slContactModal');
    var closeBtn = document.getElementById('slModalClose');
    if ( ! overlay ) return;

    function openModal() {
        overlay.classList.add('is-open');
        document.body.style.overflow = 'hidden';
    }
    function closeModal() {
        overlay.classList.remove('is-open');
        document.body.style.overflow = '';
    }

    // Open: any [data-sl-modal="contact"] element
    document.addEventListener('click', function(e){
        var trigger = e.target.closest('[data-sl-modal="contact"]');
        if ( trigger ) {
            e.preventDefault();
            openModal();
        }
    });

    // Close: X button
    if ( closeBtn ) closeBtn.addEventListener('click', closeModal);

    // Close: click outside modal
    overlay.addEventListener('click', function(e){
        if ( e.target === overlay ) closeModal();
    });

    // Close: Escape key
    document.addEventListener('keydown', function(e){
        if ( e.key === 'Escape' && overlay.classList.contains('is-open') ) closeModal();
    });
})();
</script>

<!-- ── Subscribe Newsletter Modal ──────────────────────────────────────── -->
<div class="sl-subscribe-overlay" id="slSubscribeModal" role="dialog" aria-modal="true" aria-label="Subscribe to newsletter">
    <div class="sl-subscribe-modal">
        <button class="sl-subscribe-close" id="slSubscribeClose" aria-label="Close">&times;</button>
        <h2 class="sl-subscribe-heading"><?php echo esc_html( $sl_subscribe_heading ); ?></h2>
        <div class="sl-subscribe-divider"></div>
        <?php
        $sl_subscribe_gf_id = (int) get_option( 'slingshot_subscribe_modal_gf_id', 0 );
        if ( $sl_subscribe_gf_id && function_exists( 'gravity_form' ) ) :
            gravity_form( $sl_subscribe_gf_id, false, false, false, null, true, 1 );
        else : ?>
        <form class="sl-subscribe-form" method="post" action="#">
            <div class="sl-subscribe-row">
                <input type="text" class="sl-subscribe-input" placeholder="First Name*" required>
                <input type="text" class="sl-subscribe-input" placeholder="Last Name*" required>
            </div>
            <input type="email" class="sl-subscribe-input" placeholder="Email*" required>
            <button type="submit" class="sl-subscribe-submit"><?php echo esc_html( $sl_subscribe_submit ); ?></button>
        </form>
        <?php endif; ?>
    </div>
</div>
<script>
(function(){
    var overlay = document.getElementById('slSubscribeModal');
    var closeBtn = document.getElementById('slSubscribeClose');
    if ( ! overlay ) return;
    function openSubscribe() { overlay.classList.add('is-open'); document.body.style.overflow = 'hidden'; }
    function closeSubscribe() { overlay.classList.remove('is-open'); document.body.style.overflow = ''; }
    document.addEventListener('click', function(e){
        if ( e.target.closest('[data-sl-modal="subscribe"]') ) { e.preventDefault(); openSubscribe(); }
    });
    if ( closeBtn ) closeBtn.addEventListener('click', closeSubscribe);
    overlay.addEventListener('click', function(e){ if ( e.target === overlay ) closeSubscribe(); });
    document.addEventListener('keydown', function(e){ if ( e.key === 'Escape' && overlay.classList.contains('is-open') ) closeSubscribe(); });
})();
</script>

<!-- ── Video Modal ──────────────────────────────────────────────────────── -->
<div class="sl-video-overlay" id="slVideoModal" role="dialog" aria-modal="true" aria-label="Video player">
    <div class="sl-video-wrap">
        <button class="sl-video-close" id="slVideoClose" aria-label="Close video">&times;</button>
        <div id="slVideoContent"></div>
    </div>
</div>
<script>
(function(){
    var overlay = document.getElementById('slVideoModal');
    var content = document.getElementById('slVideoContent');
    var closeBtn = document.getElementById('slVideoClose');
    if ( ! overlay ) return;
    function openVideo( src ) {
        content.innerHTML = '';
        if ( ! src ) return;
        var el;
        if ( /youtu\.?be/.test(src) || /vimeo\.com/.test(src) ) {
            // Normalise YouTube URLs
            src = src.replace('watch?v=', 'embed/').replace('youtu.be/', 'www.youtube.com/embed/');
            if ( /vimeo\.com\/(\d+)/.test(src) ) {
                src = 'https://player.vimeo.com/video/' + src.match(/vimeo\.com\/(\d+)/)[1] + '?autoplay=1';
            } else if ( src.indexOf('autoplay') === -1 ) {
                src += ( src.indexOf('?') > -1 ? '&' : '?' ) + 'autoplay=1';
            }
            el = document.createElement('iframe');
            el.src = src;
            el.allow = 'autoplay; fullscreen; picture-in-picture';
            el.allowFullscreen = true;
        } else {
            el = document.createElement('video');
            el.src = src;
            el.controls = true;
            el.autoplay = true;
        }
        content.appendChild(el);
        overlay.classList.add('is-open');
        document.body.style.overflow = 'hidden';
    }
    function closeVideo() {
        overlay.classList.remove('is-open');
        content.innerHTML = '';
        document.body.style.overflow = '';
    }
    document.addEventListener('click', function(e){
        var trigger = e.target.closest('[data-sl-video]');
        if ( trigger ) { e.preventDefault(); openVideo( trigger.getAttribute('data-sl-video') ); return; }
        var fallbackVideoTrigger = e.target.closest('.home-hero-play-btn');
        if ( fallbackVideoTrigger ) {
            var defaultVideoUrl = <?php echo wp_json_encode( $sl_default_video_url ); ?>;
            if ( defaultVideoUrl ) {
                e.preventDefault();
                openVideo( defaultVideoUrl );
            }
        }
    });
    if ( closeBtn ) closeBtn.addEventListener('click', closeVideo);
    overlay.addEventListener('click', function(e){ if ( e.target === overlay ) closeVideo(); });
    document.addEventListener('keydown', function(e){ if ( e.key === 'Escape' && overlay.classList.contains('is-open') ) closeVideo(); });
})();
</script>

<?php
nectar_hook_before_outer_wrap_close();

get_template_part( 'includes/partials/footer/back-to-top' );

nectar_hook_after_wp_footer();
nectar_hook_before_body_close();

wp_footer();
?>
</body>
</html>
