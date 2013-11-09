$(function() {	
	var url = $("#baseurl").val();	
	if(url){
		$.ajax({
			type: "GET",
			url: url+"donate/schedule.html",			
			cache: false,
			async: false,
			success: function(html){
				//do nothing
			}
		});
	}	
	return false;		
});