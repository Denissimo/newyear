// JavaScript Document

$(document).ready(function(){
	
	//$("#footer").text(("#" + $.cookie('shown_subm')));
	
	$(".submenu").hide();
	//$("#subm01").hide();
	if($.cookie('shown_subm')){
		$("#"+$.cookie('shown_subm')).show();
	}
	//$.cookie('test', "123fgh", { expires: 1 });
	
	//$("#footer").text($.cookie('shown_subm'));
	//$("#footer").text($("#mm01").next("ul").attr("id"));

	$(".sidm").click(function(){
		
		$.cookie('shown_subm', '', { expires: -1 });
		
		$(this).next("ul").toggle();
		if($(this).next("ul").css("display")!="none"){
			//$.cookie('shown_subm', '', { expires: -1 });
			$.cookie('shown_subm', $(this).next("ul").attr("id"), { expires: 7 });
		}else{
			$.cookie('shown_subm', '', { expires: -1 });
		}
		

		//$("#ales").text("112");
	});
});
