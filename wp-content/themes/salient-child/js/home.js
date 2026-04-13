
(function($) {
    'use strict';

    // Home custom header
    var $header = $('#homeSiteHeader');
    var $menuToggle = $('#homeMenuToggle');
    var $mobileMenu = $('#homeMobileMenu');

    function updateHeaderState() {
        if (!$header.length) return;
        $header.toggleClass('is-scrolled', $(window).scrollTop() > 24);
    }

    $menuToggle.on('click', function() {
        var isOpen = $mobileMenu.hasClass('is-open');
        $mobileMenu.toggleClass('is-open', !isOpen);
        $header.toggleClass('is-menu-open', !isOpen);
        $menuToggle.attr('aria-expanded', (!isOpen).toString());
    });

    $mobileMenu.on('click', 'a', function() {
        $mobileMenu.removeClass('is-open');
        $header.removeClass('is-menu-open');
        $menuToggle.attr('aria-expanded', 'false');
    });

    $(window).on('resize', function() {
        if ($(window).width() > 1100 && $mobileMenu.hasClass('is-open')) {
            $mobileMenu.removeClass('is-open');
            $header.removeClass('is-menu-open');
            $menuToggle.attr('aria-expanded', 'false');
        }
    });

    $(window).on('scroll', updateHeaderState);
    updateHeaderState();

    function cardsVisible() {
        var w = $(window).width();
        if (w < 768) return 1;
        if (w < 1100) return 2;
        return 2;
    }

    function setupCarousel(trackSelector, cardSelector, prevSelector, nextSelector, progressSelector) {
        var index = 0;
        var $track = $(trackSelector);
        if (!$track.length) return null;

        function update() {
            var vis = cardsVisible();
            var cards = $track.find(cardSelector);
            var total = cards.length;
            var max = Math.max(0, total - vis);
            if (index > max) index = max;

            if (!total) return;
            var cardWidth = cards.first().outerWidth(true);
            $track.css('transform', 'translateX(-' + (index * cardWidth) + 'px)');

            $(prevSelector).prop('disabled', index === 0).toggleClass('disabled', index === 0);
            $(nextSelector).prop('disabled', index >= max).toggleClass('disabled', index >= max);

            if (progressSelector) {
                var progress = total <= vis ? 1 : (index / max);
                var width = 35 + (progress * 65);
                $(progressSelector).css('width', width + '%');
            }
        }

        $(nextSelector).on('click', function() {
            var vis = cardsVisible();
            var total = $track.find(cardSelector).length;
            if (index < total - vis) {
                index++;
                update();
            }
        });

        $(prevSelector).on('click', function() {
            if (index > 0) {
                index--;
                update();
            }
        });

        return {
            reset: function() {
                index = 0;
                update();
            },
            update: update
        };
    }

    var workCarousel = setupCarousel('#workTrack', '.work-card', '#workPrev', '#workNext', '#workProgress');
    var eventsCarousel = setupCarousel('#eventsTrack', '.event-card', '#eventsPrev', '#eventsNext', '#eventsProgress');
    var blogCarousel = setupCarousel('#blogTrack', '.blog-card', '#blogPrev', '#blogNext', '#blogProgress');

    $(window).on('resize', function() {
        if (workCarousel) workCarousel.reset();
        if (eventsCarousel) eventsCarousel.reset();
        if (blogCarousel) blogCarousel.reset();
    });

    if (workCarousel) workCarousel.update();
    if (eventsCarousel) eventsCarousel.update();
    if (blogCarousel) blogCarousel.update();

})(jQuery);
