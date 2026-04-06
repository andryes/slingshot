/* consulting.js – How Can We Help? accordion */
(function($) {
    'use strict';

    var serviceData = {
        'ai-adoption':            { title: 'AI Adoption',            tag: 'AI Adoption' },
        'digital-transformation': { title: 'Digital Transformation', tag: 'Digital Transformation' },
        'legacy-modernization':   { title: 'Legacy System Modernization', tag: 'Legacy Modernization' },
        'team-scaling':           { title: 'Team Scaling',           tag: 'Team Scaling' },
        'new-product':            { title: 'New Product Launches',   tag: 'New Product Launches' },
        'ux-optimization':        { title: 'UX Optimization',        tag: 'UX Optimization' },
    };

    $(document).on('click', '.con-help-item', function() {
        var $item    = $(this);
        var service  = $item.data('service');

        // Update accordion state
        $('.con-help-item').removeClass('active');
        $item.addClass('active');

        // Update featured card tag
        if (serviceData[service]) {
            $('#con-featured-card .con-featured-tag').text(serviceData[service].tag);
        }

        // Show the matching service detail
        $('.con-service-detail').addClass('hidden');
        $('#con-service-' + service).removeClass('hidden');
    });

})(jQuery);
