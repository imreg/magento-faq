/**
 * Help and Support 
 * jQuery frontend controll functions
 *  
 */
(function($) {
	$.fn.Support = function() {
		function _feedback() {
			$('button').click(function(event) {
				var target = event.target;
				var name = target.id;
				id = name.replace(/\w+_/g,'');
				id_name = name.replace(/_\w+/g,'');
				if(typeof(id_name) != 'undefined' && typeof(id) != 'undefined') {
					_report(id, id_name);
				}
			});
		}
		
		function _report(id, id_name) {
			var url = '/support/ajax';
			var data = {'id':id, 
						'method':id_name};
						
			$.ajax({
				'url' : url,
				'type' : 'POST',
				'data' : data,
				'dataType' : 'json',
				'success' : function(response) {
					if(typeof(response.result) != 'undefined') { 
						if(response.result == 'OK') {
							_message(id, response.message,'successful');
						} else {
							_message(id, response.message,'error');
						}
					}
				},
				'error' : function(response) {
					_message(id,'Error at Feedback','error');
				}
			});
		}
		
		function _message(id, msg, type) {
			$('div.message').remove();
			$('#feedback_'+id).after('<div class="message '+type+'"><p>'+msg+'</p></div>');
		}
		
		
		var pub = {};
		pub.Accordion = function() {
			$("#accordion > li").click(function() {		
				if(false == $(this).next().is(':visible')) {
					$('#accordion > ul').slideUp('slow');
				}
				$(this).next().slideToggle('slow');
			});
		};
		pub.FeedBack = function() {			
			_feedback();
		};
		return pub;
	};
})(jQuery);
