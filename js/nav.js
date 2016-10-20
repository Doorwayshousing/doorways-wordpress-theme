var Doorways = Doorways || {};

Doorways.Nav = (function ($) {
    'use strict';
    var o = {};

    function init() {
        o = {
            navContainer: $('.nav-container'),
            navIcon: $('.nav-icon'),
            navIsOpenClass: 'nav-is-open',
            navIsClosedClass: 'nav-is-closed'
        };
        o.navIcon.click(handleNavClick);
    }

    function handleNavClick() {
        if (!o.navContainer.hasClass(o.navIsOpenClass)) {
            o.navContainer.addClass(o.navIsOpenClass);
            o.navContainer.find('ul').removeClass(o.navIsClosedClass);
        } else {
            o.navContainer.find('ul').delay(1000).addClass(o.navIsClosedClass);
            o.navContainer.removeClass(o.navIsOpenClass);
        }
    }

    return {
        init: init
    };

}($)); // Crockford recommends this one

$(document).ready(function() {
    Doorways.Nav.init();
});
