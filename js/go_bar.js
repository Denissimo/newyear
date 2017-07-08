// JavaScript Document

$(function() {
	$('#bar').focus();

	$('#bar').keypress(function (event){
		if(event.keyCode==13){
			//$(this).hide(3000);	 
			
			var ress, urrl;
			urrl = "/Ajax_bar/"+$(this).val();
			window.location.replace(urrl); 
			
		}

	
	});

});