

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
            $('#createdat-' + selectedValue).removeClass("invi");
            $('#createdat-' + selectedValue).siblings().addClass("invi");
            $('#updatedat-' + selectedValue).removeClass("invi");
            $('#updatedat-' + selectedValue).siblings().addClass("invi");
            $('p').removeClass("invi");

        });


    });
});

