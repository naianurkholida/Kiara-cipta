"use strict";

// Class definition
var KTAvatarDemo = function () {
	// Private functions
	var initDemos = function () {
		for(var i = 0; i <= 10; i++) {
			var avatar = new KTAvatar('kt_user_avatar_'+i);
		}
	}

	return {
		// public functions
		init: function() {
			initDemos();
		}
	};
}();

KTUtil.ready(function() {
	KTAvatarDemo.init();
});
