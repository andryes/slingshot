/**
 * Teams Pages — Interactivity
 * Covers: Generic Teams, Dedicated Teams, Staff Aug, Whitepaper
 */

(function ($) {
    'use strict';

    /* ── On DOM ready ─────────────────────────────────────── */
    $(function () {
        teamsAnimateOnScroll();
        teamsHeroParallax();
        teamsRecordSpin();
        teamsRolesCarousel();
    });

    /* ── Intersection Observer: fade-in sections ────────────── */
    function teamsAnimateOnScroll() {
        var animatables = [
            '.teams-feature-card',
            '.teams-model-card',
            '.teams-offer-card',
            '.teams-testimonial-card',
            '.teams-role-card',
            '.teams-wp-section-card',
            '.teams-skill-category',
            '.teams-why-point',
        ].join(',');

        if (!('IntersectionObserver' in window)) return;

        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('teams-anim-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

        document.querySelectorAll(animatables).forEach(function (el, i) {
            el.classList.add('teams-anim-hidden');
            el.style.transitionDelay = Math.min(i % 4 * 80, 280) + 'ms';
            observer.observe(el);
        });

        // Inject minimal CSS for animation
        var style = document.createElement('style');
        style.textContent = [
            '.teams-anim-hidden{opacity:0;transform:translateY(24px);transition:opacity .5s ease,transform .5s ease;}',
            '.teams-anim-visible{opacity:1;transform:translateY(0);}'
        ].join('');
        document.head.appendChild(style);
    }

    /* ── Subtle hero parallax on mouse move ─────────────────── */
    function teamsHeroParallax() {
        var hero = document.querySelector('.teams-hero');
        if (!hero) return;

        var blobs = hero.querySelectorAll('.teams-hero-blob');
        hero.addEventListener('mousemove', function (e) {
            var rect   = hero.getBoundingClientRect();
            var cx     = rect.width  / 2;
            var cy     = rect.height / 2;
            var dx     = (e.clientX - rect.left - cx) / cx;
            var dy     = (e.clientY - rect.top  - cy) / cy;

            blobs.forEach(function (blob, i) {
                var factor = (i + 1) * 8;
                blob.style.transform = 'translate(' + (dx * factor) + 'px,' + (dy * factor) + 'px)';
            });
        });
        hero.addEventListener('mouseleave', function () {
            blobs.forEach(function (blob) {
                blob.style.transform = '';
            });
        });
    }

    /* ── Whitepaper vinyl record hover pause ─────────────────── */
    function teamsRecordSpin() {
        var record = document.querySelector('.teams-wp-record');
        if (!record) return;
        record.addEventListener('mouseenter', function () {
            record.style.animationPlayState = 'paused';
        });
        record.addEventListener('mouseleave', function () {
            record.style.animationPlayState = 'running';
        });
    }

    /* ── Roles carousel on mobile (swipe) ──────────────────── */
    function teamsRolesCarousel() {
        var grid = document.querySelector('.teams-roles-grid');
        if (!grid) return;

        var startX    = 0;
        var isDragging = false;
        var scrollLeft = 0;

        grid.addEventListener('touchstart', function (e) {
            startX    = e.touches[0].clientX;
            scrollLeft = grid.scrollLeft;
            isDragging = true;
        }, { passive: true });

        grid.addEventListener('touchmove', function (e) {
            if (!isDragging) return;
            var dx = startX - e.touches[0].clientX;
            grid.scrollLeft = scrollLeft + dx;
        }, { passive: true });

        grid.addEventListener('touchend', function () { isDragging = false; });
    }

})(jQuery);
