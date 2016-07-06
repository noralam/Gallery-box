(function ($) {
	"use strict";

    $(document).ready(function(){
		jQuery.ajax({
     type: 'post',
     url: ajaxurl,
     data: {action : 'cat_list'},
     success: function(data){
        console.log(data);
        // use var data
     }
});
        });
}(jQuery));	