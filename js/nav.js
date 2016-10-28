var Doorways = Doorways || {};

Doorways.Nav = (function ($) {
    'use strict';
    var o = {};

    function init() {
        o = {
            navContainer: $('.nav-container'),
            navIcon: $('.nav-icon'),
            searchIcon: $('.search-icon'),
            searchContainer: $('.search-container'),
            searchForm: $('.search-form'),
            searchIsOpenClass: 'search-is-open',
            searchIsClosedClass: 'search-is-closed',
            navIsOpenClass: 'nav-is-open',
            navIsClosedClass: 'nav-is-closed',
            menu: $('.side-menu')
        };
        o.navIcon.click(handleNavClick);
        o.searchIcon.click(handleSearchClick);
    }

    function handleNavClick() {
        o.searchContainer.removeClass(o.searchIsOpenClass);
        if (!o.navContainer.hasClass(o.navIsOpenClass)) {
            o.searchForm.hide();
            o.menu.show();
            o.navContainer.addClass(o.navIsOpenClass);
            o.navContainer.find('ul').removeClass(o.navIsClosedClass);
        } else {
            o.navContainer.find('ul').delay(1000).addClass(o.navIsClosedClass);
            o.navContainer.removeClass(o.navIsOpenClass);
            o.menu.hide();
        }
    }

    function handleSearchClick() {
        o.navContainer.removeClass(o.navIsOpenClass);
        if (!o.searchContainer.hasClass(o.searchIsOpenClass)) {
            o.menu.hide();
            o.searchForm.show();
            o.searchContainer.addClass(o.searchIsOpenClass);
            o.searchContainer.find('form').removeClass(o.searchIsClosedClass);
        } else {
            o.searchContainer.find('form').delay(1000).addClass(o.searchIsClosedClass);
            o.searchContainer.removeClass(o.searchIsOpenClass);
            o.searchForm.hide();
        }
    }

    return {
        init: init
    };

}($)); // Crockford recommends this one

$(document).ready(function() {
    Doorways.Nav.init();
});
