<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) { exit; }

$child_uri = get_stylesheet_directory_uri();
wp_enqueue_style( 'slingshot-footer', $child_uri . '/css/footer.css', [], '1.2' );
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
                    <a href="/newsletter" class="sl-footer-newsletter-btn">Subscribe &rarr;</a>
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

<?php
nectar_hook_before_outer_wrap_close();

get_template_part( 'includes/partials/footer/back-to-top' );

nectar_hook_after_wp_footer();
nectar_hook_before_body_close();

wp_footer();
?>
</body>
</html>
