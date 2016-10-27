    PayJS(['jquery', 'PayJS/Core', 'PayJS/Request', 'PayJS/Response', 'PayJS/Formatting', 'PayJS/Validation'],
    function($, $CORE, $REQUEST, $RESPONSE, $FORMATTING, $VALIDATION) {
        $("#paymentButton").prop('disabled', true);
        var isValidCC = false,
            isValidExp = false,
            isValidCVV = false;

        // when using REQUEST library, initialize via CORE instead of UI
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
        $("#paymentButton").click(function() {
            $(this).prop('disabled', true).removeClass("not-disabled");
            $("#myCustomForm :input").prop('disabled', true);

            $("#customFormWrapper").addClass("animated").removeClass("static");
            $("#customFormWrapper").fadeTo(2000, 0.1);

            // we'll add on the billing data that we collected
            $CORE.setBilling({
                name: $("#billing_name").val(),
                address: $("#billing_street").val(),
                city: $("#billing_city").val(),
                state: $("#billing_state").val(),
                postalCode: $("#billing_zip").val()
            });
            var cc = $("#cc_number").val();
            var exp = $("#cc_expiration").val();
            var cvv = $("#cc_cvv").val();

            // run the payment
            $REQUEST.doPayment(cc, exp, cvv, function(resp) {
                // if you want to use the RESPONSE module with REQUEST, run the ajax response through tryParse...
                $RESPONSE.tryParse(resp);
                // ... which will initialize the RESPONSE module's getters
                console.log($RESPONSE.getResponse());
                $("#paymentResponse").text(
                    $RESPONSE.getTransactionSuccess() ? "APPROVED" : "DECLINED"
                );
                $("#customFormWrapper").hide();
                $("#paymentResponse").fadeTo(1000, 1);

            });
        });

        $(".billing .form-control").blur(function(){
            toggleClasses($(this).val().length > 0, $(this).parent());
            checkForCompleteAndValidForm();
        });
        $("#cc_number").blur(function() {
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
            var exp = $("#cc_expiration").val();
            exp = $FORMATTING.formatExpirationDateInput(exp, '/');
            $("#cc_expiration").val(exp);
            isValidExp = $VALIDATION.isValidExpirationDate(exp);
            toggleClasses(isValidExp, $("#exp-group"));
            checkForCompleteAndValidForm();
        });
        $("#cc_cvv").blur(function() {
            var cvv = $("#cc_cvv").val();
            cvv = cvv.replace(/\D/g,'');
            $("#cc_cvv").val(cvv);
            isValidCVV = $VALIDATION.isValidCvv(cvv, $("#cc_number").val()[0]);
            toggleClasses(isValidCVV, $("#cvv-group"));
            checkForCompleteAndValidForm();
        });
        function toggleClasses(isValid, obj) {
            if (isValid) {
                obj.addClass("has-success").removeClass("has-error");
                obj.children(".help-block").text("Valid");
            } else {
                obj.removeClass("has-success").addClass("has-error");
                obj.children(".help-block").text("Invalid");
            }
        }
        function checkForCompleteAndValidForm() {
            var isValidBilling = true;
            $.each($(".billing"), function(){ isValidBilling = isValidBilling && $(this).hasClass("has-success"); });
            // assuming most people fill out the form from top-to-bottom,
            // checking it from bottom-to-top takes advantage of short-circuiting
            if (isValidCVV && isValidExp && isValidCC && isValidBilling) {
                $("#paymentButton").prop('disabled', false).addClass("not-disabled");
            }
        }
    });



    function createDonutCharts() {
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
