jQuery(document).ready(function($) {
    let $window    = $(window);
    let $parallax  = $('.paralax-wrapper .elementor-widget-wrap');
    let $container = $('.who-we-are-main-wrapper');

    let initialY      = 0;
    let maxOffset     = 59.4813;
    let speedMultiplier = 2;

    function updateParallax() {

        if ($window.width() < 1025) {
            $parallax.css('background-position', 'center center');
            return;
        }

        let scrollTop      = $window.scrollTop();
        let windowHeight   = $window.height();
        let containerTop   = $container.offset().top;
        let containerHeight = $container.outerHeight();
        let containerBottom = containerTop + containerHeight;


        if (scrollTop + windowHeight < containerTop || scrollTop > containerBottom) {
            $parallax.css('background-position', 'center ' + initialY + 'px');
            return;
        }


        let activationOffset = windowHeight / 2;

        let relativeScroll = scrollTop - (containerTop - activationOffset);
        if (relativeScroll < 0) {
            relativeScroll = 0;
        }
        if (relativeScroll > containerHeight) {
            relativeScroll = containerHeight;
        }


        let factor   = maxOffset / containerHeight;
        let desiredY = initialY + relativeScroll * factor * speedMultiplier;


        if (desiredY > maxOffset) {
            desiredY = maxOffset;
        }

        $parallax.css('background-position', 'center ' + desiredY + 'px');
    }

    $window.on('scroll resize', updateParallax);
    updateParallax();


    let $link = $(".cap-wrapper .toll_free a");

    if ($link.length) {
        $link.each(function () {
            let href = $(this).attr("href");
            if (href && href.startsWith("tel:")) {
                $(this).attr("href", href.replace("tel:", ""));
            }
        });
    }

    $('.crt_mobile_menu .menu-outer a').on('click', function (e) {
        $('body').removeClass('crt_mobile_menu-visible');
    });

    jQuery(document).ready(function($) {
        function equalizeCardHeights() {
            let maxHeight = 0;
            $('.grid_box._card').css('height', 'auto');

            $('.grid_box._card').each(function() {
                var cardHeight = $(this).outerHeight();
                if (cardHeight > maxHeight) {
                    maxHeight = cardHeight;
                }
            });

            $('.grid_box._card').css('height', maxHeight);
        }

        equalizeCardHeights();

        $(window).resize(function() {
            equalizeCardHeights();
        });
    });


});
