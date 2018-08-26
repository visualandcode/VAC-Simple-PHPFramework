(function () {


jQuery.fn.extend({

	ajaxhtml : function ( ajaxurl , returncontent ) {
		ajaxurl = $.baseurl + "/" + ajaxurl;
		var param = {
			url : ajaxurl , 
			type : "POST" , 
			headers: {
				'X-Requested-With': 'XMLHttpRequest'
			} ,
			contentType : "html" 
		};

		if ( typeof(returncontent) == 'function' ) {
			return returncontent($.ajax( param ));
		} else {
			return $.ajax( param );
		}

	} , 

	ajaxjson : function ( ajaxurl , returncontent ) {
		ajaxurl = $.baseurl + "/" + ajaxurl;
		var param = {
			url : ajaxurl , 
			type : "POST" , 
			headers: {
				'X-Requested-With': 'XMLHttpRequest'
			} ,
			contentType : "json" 
		};

		if ( typeof(returncontent) == 'function' ) {
			return returncontent($.ajax( param ));
		} else {
			return $.ajax( param );
		}
	}

});

var getdata = $("#vue-content").ajaxjson( "api/" , function (e) {
	console.log("from ajax return callback => " , e);
});




})();