$(function() {
    "use strict";

    $('.sub-nav-toggle').on('click', function(e) {
        e.preventDefault();
        var $subNav = $(this).next('.sub-nav');
        var $othernav = $(this).parents().find('.sub-nav');
        if ($subNav.hasClass('hidden')) {
            $othernav.slideUp(420, function() {
                $(this).addClass('hidden');
            });
            $subNav.hide().removeClass('hidden').stop().slideDown(420);
        } else {
            $subNav.stop().slideUp(420, function() {
                $(this).addClass('hidden');
            });
        }
    });
    $('#menu-button, #menu-close-button').on('click touchend', function(e) {
        e.preventDefault();

        $('body').toggleClass('pushed-left');
        $('#menu-button').toggleClass('open');

    });
    $('#content, #background-color, #logo').on('click touchend', function(e) {
        var $body = $('body');
        var $target = $(e.target);
        if (($body.hasClass('pushed-left-alt') || $body.hasClass('pushed-left')) && $target.closest('#main-nav').length === 0 && $target.closest('#menu-button').length === 0) {
            e.preventDefault();
            $body.removeClass('pushed-left-alt').removeClass('pushed-left');
            $('#menu-button').removeClass('open');
        }
    });


    $(window).on('scroll resize').trigger('scroll');

});