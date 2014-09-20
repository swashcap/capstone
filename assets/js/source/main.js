(function ($) {
    'use strict';

    /**
     * Prevent navigation toggler from jumping to `#navigation`.
     */
    var $navbarToggle = $('.navbar-toggle');

    $navbarToggle.click(function (e) {
        e.preventDefault();
    });

    /**
     * Fastclick.
     *
     * @link https://github.com/ftlabs/fastclick
     */
    FastClick.attach(document.body);

    // $($navbarToggle.data('target')).on('show.bs.collapse', function () {
    //     $(this).addClass('is-open');
    // });
    // $($navbarToggle.data('target')).on('hide.bs.collapse', function () {
    //     $(this).removeClass('is-open');
    // });

}(jQuery));
