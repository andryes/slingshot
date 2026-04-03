
(function($) {
    'use strict';

    // Work carousel
    var workIndex = 0;

    function workVisible() {
        var w = $(window).width();
        if (w < 768) return 1;
        if (w < 1100) return 2;
        return 3;
    }

    function updateTrack() {
        var vis = workVisible();
        var cards = $('#workTrack .work-card');
        var total = cards.length;
        var max = Math.max(0, total - vis);
        if (workIndex > max) workIndex = max;

        var cardWidth = cards.first().outerWidth(true);
        $('#workTrack').css('transform', 'translateX(-' + (workIndex * cardWidth) + 'px)');

        $('#workPrev').prop('disabled', workIndex === 0).toggleClass('disabled', workIndex === 0);
        $('#workNext').prop('disabled', workIndex >= max).toggleClass('disabled', workIndex >= max);
    }

    $('#workNext').on('click', function() {
        var vis = workVisible();
        var total = $('#workTrack .work-card').length;
        if (workIndex < total - vis) {
            workIndex++;
            updateTrack();
        }
    });

    $('#workPrev').on('click', function() {
        if (workIndex > 0) {
            workIndex--;
            updateTrack();
        }
    });

    $(window).on('resize', function() {
        workIndex = 0;
        updateTrack();
    });

    // Set track transition
    $('#workTrack').css({ transition: 'transform .4s ease', display: 'flex', gap: '24px', overflow: 'visible' });

    updateTrack();

})(jQuery);
