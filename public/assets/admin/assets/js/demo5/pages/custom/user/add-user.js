"use strict";

// Class definition
var KTUserAdd = function () {
    // Base elements
    var avatar;
     
    var initUserForm = function() {
        avatar = new KTAvatar('kt_user_add_avatar');
    }   

    return {
        // public functions
        init: function() {
            initUserForm(); 
        }
    };
}();

jQuery(document).ready(function() { 
    KTUserAdd.init();
});