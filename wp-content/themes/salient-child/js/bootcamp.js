/* ============================================================
   BOOTCAMP PAGE – bootcamp.js
   ============================================================ */

(function ($) {
    'use strict';

    $(document).ready(function () {

        /* ── Curriculum tab switcher ─────────────────────────── */
        $(document).on('click', '.boot-tab', function () {
            var $tab = $(this);
            var tabId = $tab.data('tab');

            // Update tab buttons
            $('.boot-tab').removeClass('active');
            $tab.addClass('active');

            // Update panels
            $('.boot-tab-panel').removeClass('active');
            $('#boot-tab-' + tabId).addClass('active');
        });

    });

}(jQuery));
