"use strict";

// Class definition
var KTUserEdit = function () {
	// Base elements
	var avatar;
	 
	var initUserForm = function() {
		avatar = new KTAvatar('kt_user_edit_avatar');
	}	

	return {
		// public functions
		init: function() {
			initUserForm(); 
		}
	};
}();

// Class definition
var KTUserEdit2 = function () {
    // Base elements
    var avatar;
     
    var initUserForm = function() {
        avatar = new KTAvatar('kt_user_edit_avatar_two');
    }   

    return {
        // public functions
        init: function() {
            initUserForm(); 
        }
    };
}();

jQuery(document).ready(function() {	
	KTUserEdit.init();
	KTUserEdit2.init();
});