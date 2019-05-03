

require([
    'jquery'
], function ($) {
    'use strict';
    $(document).ready(function () {

        $('body').on('change', '#select', function () {
            var selectedValue = $(this).val();
            $('#div-body').removeClass("invi");
            $('#name-' + selectedValue).removeClass("invi");
            $('#name-' + selectedValue).siblings().addClass("invi");
            $('#address-' + selectedValue).removeClass("invi");
            $('#address-' + selectedValue).siblings().addClass("invi");
            $('#phone-' + selectedValue).removeClass("invi");
            $('#phone-' + selectedValue).siblings().addClass("invi");
            $('#contactname-' + selectedValue).removeClass("invi");
            $('#contactname-' + selectedValue).siblings().addClass("invi");
            $('p').removeClass("invi");

        });


    });
});

