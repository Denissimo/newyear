// JavaScript Document

$(document).ready(function(){
	
	//$(".submenu").hide();
	/*$("#subm01").hide();
	if($.cookie('shown_subm')){
		$($.cookie('shown_subm')).show();
	}*/
	//$.cookie('test', "123fgh", { expires: 1 });
	
	//$("#footer").text($.cookie('shown_subm'));
	//$("#footer").text($("#mm01").next("ul").attr("id"));

	$(".sidm").click(function(){
		
		$(this).next("ul").toggle();
		
	});
});
