define([
    'jquery',
    'uiComponent',
    'ko',
    'Magento_Customer/js/model/customer',
    'Magento_Customer/js/action/check-email-availability',
    'Magento_Customer/js/customer-data',
    'Magento_Captcha/js/action/refresh',
    'Magento_Customer/js/action/login',
    'Magento_Checkout/js/model/quote',
    'Magento_Checkout/js/checkout-data',
    'Magento_Checkout/js/model/full-screen-loader',
    'mage/validation'
], function ($, Component, ko, customer, checkEmailAvailability, customerData, refresh, loginAction, quote, checkoutData, fullScreenLoader) {
 'use strict';

 var mixin = {

     /**
      *
      * @param {Column} elem
      */
     login: function (loginForm) {
        var loginData = {},
            formDataArray = $(loginForm).serializeArray();

        formDataArray.forEach(function (entry) {
            loginData[entry.name] = entry.value;
        });

        if (this.isPasswordVisible() && $(loginForm).validation() && $(loginForm).validation('isValid')) {
            fullScreenLoader.startLoader();
            loginAction(loginData).always(function () {
                fullScreenLoader.stopLoader();
                setTimeout(function(){
                    var section = ['captcha'];
                    // captchaload.refresh();
                    $('.captcha-reload').trigger('click');
                    customerData.invalidate(section);
                    customerData.reload(section);
                }, 500);
            });
        }
    },
 };

 return function (target) { // target == Result that Magento_Ui/.../columns returns.
     return target.extend(mixin); // new result that all other modules receive
 };
});