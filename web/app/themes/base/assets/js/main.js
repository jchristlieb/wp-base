"use strict";

var base = base || {};

base.main = (function ($) {

    function init() {
        console.log('base init');
        pushFooterToBottom();
    }

    function pushFooterToBottom() {
        if ($(document).outerHeight() <= $(window).outerHeight()) {
            $('footer').addClass('push-to-bottom');
        } else {
            $('footer').removeClass('push-to-bottom');
        }
    }

    return {
        init: init
    }

})(jQuery);

jQuery(document).ready(function () {
    base.main.init()
});
