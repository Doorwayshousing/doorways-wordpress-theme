    PayJS(['jquery', 'PayJS/Core', 'PayJS/Request', 'PayJS/Response', 'PayJS/Formatting', 'PayJS/Validation'],
    function($, $CORE, $REQUEST, $RESPONSE, $FORMATTING, $VALIDATION) {
        $("#paymentButton").prop('disabled', true);
        console.log('function under PayJS.');
        console.log($CORE);
        var isValidCC = false,
            isValidExp = false,
            isValidCVV = false;

        // when using REQUEST library, initialize via CORE instead of UI
        console.log('console.log before CORE.Initialize');
        $CORE.Initialize({
            apiKey: "<?php echo $developer['ID']; ?>",
            environment: "<?php echo $request['environment']; ?>",
            postbackUrl: "<?php echo $request['postbackUrl']; ?>",
            merchantId: "<?php echo $merchant['ID']; ?>",
            authKey: "<?php echo $authKey; ?>",
            nonce: "<?php echo $nonces['salt']; ?>",
            requestType: "<?php echo $requestType; ?>",
            requestId: "<?php echo $requestId; ?>",
            amount: "<?php echo $request['amount']; ?>",
        });
        console.log('console.log after CORE.Initialize');
        console.log($CORE);

        $("#paymentButton").click(function() {
            console.log('paymentButton click.');
            $(this).prop('disabled', true).removeClass("not-disabled");
            $("#myCustomForm :input").prop('disabled', true);

            // we'll add on the billing data that we collected
            $CORE.setBilling({
                name: $("#billing_name").val(),
                address: $("#billing_street").val(),
                city: $("#billing_city").val(),
                state: $("#billing_state").val(),
                postalCode: $("#billing_zip").val()
            });
            var cc = $("#cc_number").val();
            console.log("cc_number: " + cc);
            var exp = $("#cc_expiration").val();
            console.log("cc_expiration: " + exp);
            var cvv = $("#cc_cvv").val();
            console.log("CVV: " + cvv);

            // run the payment
            $REQUEST.doPayment(cc, exp, cvv, function(resp) {
                // console.log('REQUEST.doPayment');
                // if you want to use the RESPONSE module with REQUEST, run the ajax response through tryParse...
                $RESPONSE.tryParse(resp);
                // ... which will initialize the RESPONSE module's getters
                console.log('$RESPONSE.getResponse: ' + $RESPONSE.getResponse());
                $("#paymentResponse").text(
                    $RESPONSE.getTransactionSuccess() ? "APPROVED" : "DECLINED"
                );
                // $("#customFormWrapper").hide();
                // $("#paymentResponse").fadeTo(1000, 1);
            });
        });

        $(".billing .form-control").blur(function(){
            console.log('billing form-control blur');
            toggleClasses($(this).val().length > 0, $(this).parent());
            checkForCompleteAndValidForm();
        });

        $("#cc_number").blur(function() {
            console.log('cc_number blur');
            var cc = $("#cc_number").val();
            // we'll format the credit card number with dashes
            cc = $FORMATTING.formatCardNumberInput(cc, '-');
            $("#cc_number").val(cc);
            // and then check it for validity
            isValidCC = $VALIDATION.isValidCreditCard(cc);
            toggleClasses(isValidCC, $("#cc-group"));
            checkForCompleteAndValidForm();
        });

        $("#cc_expiration").blur(function() {
            console.log('cc expiration blur');
            var exp = $("#cc_expiration").val();
            exp = $FORMATTING.formatExpirationDateInput(exp, '/');
            $("#cc_expiration").val(exp);
            isValidExp = $VALIDATION.isValidExpirationDate(exp);
            toggleClasses(isValidExp, $("#exp-group"));
            checkForCompleteAndValidForm();
        });

        $("#cc_cvv").blur(function() {
            console.log('cc cvv blur');
            var cvv = $("#cc_cvv").val();
            cvv = cvv.replace(/\D/g,'');
            $("#cc_cvv").val(cvv);
            isValidCVV = $VALIDATION.isValidCvv(cvv, $("#cc_number").val()[0]);
            toggleClasses(isValidCVV, $("#cvv-group"));
            checkForCompleteAndValidForm();
        });

        function toggleClasses(isValid, obj) {
            console.log('toggleClasses');
            if (isValid) {
                obj.addClass("has-success").removeClass("has-error");
                obj.children(".help-block").text("Valid");
            } else {
                obj.removeClass("has-success").addClass("has-error");
                obj.children(".help-block").text("Invalid");
            }
        }

        function checkForCompleteAndValidForm() {
            console.log('checkForCompleteAndValidForm');
            var isValidBilling = true;
            $.each($(".billing"), function(){ isValidBilling = isValidBilling && $(this).hasClass("has-success"); });
            // assuming most people fill out the form from top-to-bottom,
            // checking it from bottom-to-top takes advantage of short-circuiting
            if (isValidCVV && isValidExp && isValidCC && isValidBilling) {
                $("#paymentButton").prop('disabled', false).addClass("not-disabled");
                console.log('form is now valid.');
            } else {
                console.log('form is not yet valid.');
            }
        }
    });

    function createDonutCharts() {
        console.log('createDonutCharts');
        $("<style type='text/css' id='dynamic' />").appendTo("head");
        $("div[chart-type*=donut]").each(function () {
            var d = $(this);
            var id = $(this).attr('id');
            var max = $(this).data('chart-max');
            var text = '',
                caption = '',
                rotate = 0;
            if ($(this).data('chart-text')) {
                text = $(this).data('chart-text');
            }
            if ($(this).data('chart-caption')) {
                caption = $(this).data('chart-caption');
            }
            if ($(this).data('chart-initial-rotate')) {
                rotate = $(this).data('chart-initial-rotate');
            }
            var segments = $(this).data('chart-segments');

            for (var i = 0; i < Object.keys(segments).length; i++) {
                var s = segments[i];
                var start = ((s[0] / max) * 360) + rotate;
                var deg = ((s[1] / max) * 360);
                if (s[1] >= (max / 2)) {
                    d.append('<div class="large donut-bite" data-segment-index="' + i + '"> ');
                } else {
                    d.append('<div class="donut-bite" data-segment-index="' + i + '"> ');
                }
                var style = $("#dynamic").text() + "#" + id + " .donut-bite[data-segment-index=\"" + i + "\"]{-moz-transform:rotate(" + start + "deg);-ms-transform:rotate(" + start + "deg);-webkit-transform:rotate(" + start + "deg);-o-transform:rotate(" + start + "deg);transform:rotate(" + start + "deg);}#" + id + " .donut-bite[data-segment-index=\"" + i + "\"]:BEFORE{-moz-transform:rotate(" + deg + "deg);-ms-transform:rotate(" + deg + "deg);-webkit-transform:rotate(" + deg + "deg);-o-transform:rotate(" + deg + "deg);transform:rotate(" + deg + "deg); background-color: " + s[2] + ";}#" + id + " .donut-bite[data-segment-index=\"" + i + "\"]:BEFORE{ background-color: " + s[2] + ";}#" + id + " .donut-bite[data-segment-index=\"" + i + "\"].large:AFTER{ background-color: " + s[2] + ";}";
                $("#dynamic").text(style);
            }

            d.children().first().before("<div class='donut-hole'><span class='donut-filling'>" + text + "</span></div>");
            d.append("<div class='donut-caption-wrapper'><span class='donut-caption'>" + caption + "</span></div>");
        });
    }

$(document).ready(function() {
    console.log('document ready');
    createDonutCharts();
});

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

/*! matchMedia() polyfill - Test a CSS media type/query in JS. Authors & copyright (c) 2012: Scott Jehl, Paul Irish, Nicholas Zakas. Dual MIT/BSD license */
/*! NOTE: If you're already including a window.matchMedia polyfill via Modernizr or otherwise, you don't need this part */
window.matchMedia=window.matchMedia||function(a){"use strict";var c,d=a.documentElement,e=d.firstElementChild||d.firstChild,f=a.createElement("body"),g=a.createElement("div");return g.id="mq-test-1",g.style.cssText="position:absolute;top:-100em",f.style.background="none",f.appendChild(g),function(a){return g.innerHTML='&shy;<style media="'+a+'"> #mq-test-1 { width: 42px; }</style>',d.insertBefore(f,e),c=42===g.offsetWidth,d.removeChild(f),{matches:c,media:a}}}(document);

/*! Respond.js v1.3.0: min/max-width media query polyfill. (c) Scott Jehl. MIT/GPLv2 Lic. j.mp/respondjs  */
(function(a){"use strict";function x(){u(!0)}var b={};if(a.respond=b,b.update=function(){},b.mediaQueriesSupported=a.matchMedia&&a.matchMedia("only all").matches,!b.mediaQueriesSupported){var q,r,t,c=a.document,d=c.documentElement,e=[],f=[],g=[],h={},i=30,j=c.getElementsByTagName("head")[0]||d,k=c.getElementsByTagName("base")[0],l=j.getElementsByTagName("link"),m=[],n=function(){for(var b=0;l.length>b;b++){var c=l[b],d=c.href,e=c.media,f=c.rel&&"stylesheet"===c.rel.toLowerCase();d&&f&&!h[d]&&(c.styleSheet&&c.styleSheet.rawCssText?(p(c.styleSheet.rawCssText,d,e),h[d]=!0):(!/^([a-zA-Z:]*\/\/)/.test(d)&&!k||d.replace(RegExp.$1,"").split("/")[0]===a.location.host)&&m.push({href:d,media:e}))}o()},o=function(){if(m.length){var b=m.shift();v(b.href,function(c){p(c,b.href,b.media),h[b.href]=!0,a.setTimeout(function(){o()},0)})}},p=function(a,b,c){var d=a.match(/@media[^\{]+\{([^\{\}]*\{[^\}\{]*\})+/gi),g=d&&d.length||0;b=b.substring(0,b.lastIndexOf("/"));var h=function(a){return a.replace(/(url\()['"]?([^\/\)'"][^:\)'"]+)['"]?(\))/g,"$1"+b+"$2$3")},i=!g&&c;b.length&&(b+="/"),i&&(g=1);for(var j=0;g>j;j++){var k,l,m,n;i?(k=c,f.push(h(a))):(k=d[j].match(/@media *([^\{]+)\{([\S\s]+?)$/)&&RegExp.$1,f.push(RegExp.$2&&h(RegExp.$2))),m=k.split(","),n=m.length;for(var o=0;n>o;o++)l=m[o],e.push({media:l.split("(")[0].match(/(only\s+)?([a-zA-Z]+)\s?/)&&RegExp.$2||"all",rules:f.length-1,hasquery:l.indexOf("(")>-1,minw:l.match(/\(\s*min\-width\s*:\s*(\s*[0-9\.]+)(px|em)\s*\)/)&&parseFloat(RegExp.$1)+(RegExp.$2||""),maxw:l.match(/\(\s*max\-width\s*:\s*(\s*[0-9\.]+)(px|em)\s*\)/)&&parseFloat(RegExp.$1)+(RegExp.$2||"")})}u()},s=function(){var a,b=c.createElement("div"),e=c.body,f=!1;return b.style.cssText="position:absolute;font-size:1em;width:1em",e||(e=f=c.createElement("body"),e.style.background="none"),e.appendChild(b),d.insertBefore(e,d.firstChild),a=b.offsetWidth,f?d.removeChild(e):e.removeChild(b),a=t=parseFloat(a)},u=function(b){var h="clientWidth",k=d[h],m="CSS1Compat"===c.compatMode&&k||c.body[h]||k,n={},o=l[l.length-1],p=(new Date).getTime();if(b&&q&&i>p-q)return a.clearTimeout(r),r=a.setTimeout(u,i),void 0;q=p;for(var v in e)if(e.hasOwnProperty(v)){var w=e[v],x=w.minw,y=w.maxw,z=null===x,A=null===y,B="em";x&&(x=parseFloat(x)*(x.indexOf(B)>-1?t||s():1)),y&&(y=parseFloat(y)*(y.indexOf(B)>-1?t||s():1)),w.hasquery&&(z&&A||!(z||m>=x)||!(A||y>=m))||(n[w.media]||(n[w.media]=[]),n[w.media].push(f[w.rules]))}for(var C in g)g.hasOwnProperty(C)&&g[C]&&g[C].parentNode===j&&j.removeChild(g[C]);for(var D in n)if(n.hasOwnProperty(D)){var E=c.createElement("style"),F=n[D].join("\n");E.type="text/css",E.media=D,j.insertBefore(E,o.nextSibling),E.styleSheet?E.styleSheet.cssText=F:E.appendChild(c.createTextNode(F)),g.push(E)}},v=function(a,b){var c=w();c&&(c.open("GET",a,!0),c.onreadystatechange=function(){4!==c.readyState||200!==c.status&&304!==c.status||b(c.responseText)},4!==c.readyState&&c.send(null))},w=function(){var b=!1;try{b=new a.XMLHttpRequest}catch(c){b=new a.ActiveXObject("Microsoft.XMLHTTP")}return function(){return b}}();n(),b.update=n,a.addEventListener?a.addEventListener("resize",x,!1):a.attachEvent&&a.attachEvent("onresize",x)}})(this);

/*global jQuery, window, Modernizr, navigator, objLayerSlider, objFlickr, objPostSlider, google, objGoogleMap*/

(function($, window, document) {

    "use strict";
    
    /* ------------------------------------------------------------------ */
    /*	Ready															  */
    /* ------------------------------------------------------------------ */

    $(function() {
       
        var listSize = $(this).find('.input-block input').length;
        for (var i = 1; i <= listSize; i++) {
            $('.input-block input:nth-child(' + i + ')').blur(function() {
                var count = 0;
                if(!this.value) {
                     $(this).next().fadeIn(300);
                }
                $(this).on('focus', function() {
                    $(this).next().fadeOut(300);
                    count++;
                    if (count > 0) {
                        $(this).next().removeClass().empty();
                    }
                });
            });
        }
    });

}(jQuery, window, document));