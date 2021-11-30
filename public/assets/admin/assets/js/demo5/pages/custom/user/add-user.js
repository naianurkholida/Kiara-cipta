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

// Class definition
var KTUserAdd2 = function () {
    // Base elements
    var avatar;
     
    var initUserForm = function() {
        avatar = new KTAvatar('kt_user_add_avatar_two');
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
    KTUserAdd2.init();
});