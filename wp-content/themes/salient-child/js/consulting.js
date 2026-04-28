/* consulting.js – How Can We Help? accordion */
(function($) {
    'use strict';

    $(document).on('click', '.con-help-item', function() {
        var $item = $(this);

        if ($item.hasClass('active')) {
            return;
        }

        $('.con-help-item').removeClass('active');
        $item.addClass('active');
    });

})(jQuery);
