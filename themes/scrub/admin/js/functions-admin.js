(function($){

	'use strict';

	$(function(){


	// CHECK FOR INPUT TYPE DATE SUPPORT /////////////////////////////////////////////////


		if ( !Modernizr.inputtypes.date ) {
			$('input[type="date"]').datepicker({
				dateFormat: 'yy-mm-dd'
			});
		}


	});

})(jQuery);