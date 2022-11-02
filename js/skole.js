/*global jQuery*/
(function ($) {
    "use strict";
    $(document).ready(function () {

        /*
        $('.search-action').click(function() {
            $(this).toggleClass('open');
            $('.pop-search').toggleClass('active');
        });
        */

        $('.search-action').click(function() {
            $(this).toggleClass('open');
            $('.slide-search').slideToggle();
        });

        $('.phone-action').click(function() {
            $(this).toggleClass('open');
            $('.slide-phone').slideToggle();
        });

        $('.mail-action').click(function() {
            $(this).toggleClass('open');
            $('.slide-mail').slideToggle();
        });

});

}(jQuery));