// JavaScript Document

$(function() {
	$('.tex').hide();
 //$('.container').resizable(); 
 $('.datarow').hover(
	 function () {
		 $(this).css({"background":"#FFFFAA"});
	},
	function () {
    	$(this).css({"background":"#FFFFFF"});
  	});
	
	
	$('.datarow').click(function () {
		 var currel = $(this).attr('rel');
		 $('.tex').hide();
		 $('#'+currel).show();
	});

});

