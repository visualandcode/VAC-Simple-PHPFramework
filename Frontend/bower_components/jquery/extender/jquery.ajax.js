(function () {

jQuery.fn.extend({
	ajaxhtml : function ( ajaxurl , returncontent ) {
		ajaxurl = $.baseurl + "/" + ajaxurl;
		var thiselm = this;
		var param = {
			url : ajaxurl , 
			type : "POST" , 
			headers: {
				'X-Requested-With': 'XMLHttpRequest'
			} ,
			contentType : "html" , 
			success : function (datas) {
				$(thiselm).append(datas);
			}
		};

		if ( typeof(returncontent) == 'function' ) {
			var returnajaxcontent = $.ajax( param );
			returncontent(returnajaxcontent);
			return returnajaxcontent;
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
			var returnajaxcontent = $.ajax( param );
			returncontent(returnajaxcontent);
			return returnajaxcontent;
		} else {
			return $.ajax( param );
		}
	}

});


})();