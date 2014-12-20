(function (window, $) {
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

    /**
     * Center front page sections' images.
     */
    var SCREEN_SMALL = 600;
    var $window = $(window);
    var $frontPageSections = $('.front-page__work, .front-page__about, .front-page__blog, .front-page__contact');
    var centerImage = function ($image) {
        var $parent = $image.parent();
        var parentWidth = $parent.width();
        var parentHeight = $parent.height();
        var imageWidth = $image.get(0).naturalWidth || $image.width();
        var imageHeight = $image.get(0).naturalHeight || $image.height();

        if ($window.width() >= SCREEN_SMALL) {
            if (parentWidth / parentHeight > imageWidth / imageHeight) {
                $image.css({
                    height: parentWidth * imageHeight / imageWidth,
                    left: 0,
                    position: 'relative',
                    top: -0.5 * (parentWidth * imageHeight / imageWidth - parentHeight),
                    width: parentWidth
                });
            } else {
                $image.css({
                    height: parentHeight,
                    left: -0.5 * (parentHeight * imageWidth / imageHeight - parentWidth),
                    position: 'relative',
                    top: 0,
                    width: parentHeight * imageWidth / imageHeight
                });
            }
        } else {
            $image.removeAttr('style');
        }
    };

    $.each($frontPageSections, function () {
        var $image = $(this).find('img');

        if ($image.length) {
            centerImage($image);
            $window.resize($.throttle(60, function () {
                centerImage($image);
            }));
        }
    });
})(window, jQuery);
