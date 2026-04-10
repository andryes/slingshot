/* consulting.js – How Can We Help? accordion */
(function($) {
    'use strict';

    $(document).on('click', '.con-help-item', function() {
        var $item   = $(this);
        var service = $item.data('service');

        $('.con-help-item').removeClass('active');
        $item.addClass('active');

        var tag = $item.data('featuredTag');
        if (tag) {
            $('#con-featured-card .con-featured-tag').text(tag);
        }

        var fText = $item.data('featuredText');
        if (typeof fText === 'string') {
            $('#con-featured-card .con-featured-text').text(fText);
        }

        var fCta = $item.data('featuredCtaText');
        var fUrl = $item.data('featuredCtaUrl');
        var $fA  = $('#con-featured-card .con-featured-cta');
        if (fCta) {
            $fA.find('.con-featured-cta-label').text(fCta);
        }
        if (fUrl) {
            $fA.attr('href', fUrl);
        }

        $('.con-service-detail').addClass('hidden');
        $('#con-service-' + service).removeClass('hidden');
    });

})(jQuery);
