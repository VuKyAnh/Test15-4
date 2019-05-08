require(
    [
        'Magento_Ui/js/lib/validation/validator',
        'jquery',
        'mage/translate'
    ], function(validator, $){

        validator.addRule(
            'custom-validation',
            function (value) {
                if(value.length==10){
                    return true;
                }
            }
            ,$.mage.__('Number Phone must have 10 nums')
        );
    });