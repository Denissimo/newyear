// JavaScript Document

$(document).ready(function(){
	
/*
	
$(function(){
$("li").toggle(
function () {
$(this).css({"list-style-type":"disc", "color":"red"});
},
function () {
$(this).css({"list-style-type":"disc", "color":"green"});
},
function () {
$(this).css({"list-style-type":"disc", "color":"blue"});
},
function () {
$(this).css({"list-style-type":"", "color":""});
}
);
});

*/

	
	//$(".vid").draggable();
	//$(".vid").resizable();
	$(".vid").corner('round 20px');
	
	//$(".header").datepicker({ showButtonPanel: false, firstDay: 1, showWeek: true, weekHeader: 'Неделя'});
	$(".header").datepicker();
	//$("#d03 > .ui-datepicker").css('font-size', '20px');
	/*
	var flag01=-1;
	function go_left(){
		if(flag01==1){
			$("#d03").animate({height: "600px", width: "900px"}, 1000, "easeInQuad");

		}else{
			$("#d03").animate({height: "150px", width: "300px"}, 1000, "easeInElastic");
		}
		
		
	}	
	$("#d03").click(function(){
		flag01=-flag01;
		go_left();		
	});
	
	
	$("#d04").click(function(){
		$("#d04").animate({ backgroundColor: "red" }, 0, function(){
		$("#d04").animate({ backgroundColor: "#F0F0C0" }, 1500);
		
		});
	});
	
	*/
	
	$("#d02").click(function(){
		//$("#d02").animate({ backgroundColor: "green" }, 100, function(){
			$(this).effect("explode", {}, 1000, function(){
				$(this).insertAfter("#d00");
				$(this).css({'width':'100px', 'height':'70px', 'float':'left'});
				$(this).show();
				$(this).animate({height: "500px", width: "800px"}, 300, "easeInQuad");
				
		//});
		
		//$("#d02").animate({ backgroundColor: "#F0F0C0" }, 1000);
		
		});
	});
	
	$("#d06").click(function(){
		$("#d06").css({ 'background': 'blue' });
		$("#d02").html('<a href="www.1c-tsp.ru">сайт</a>');
		//$("#d04").parent("#d03");
	});
	
	//$("img").easyTooltip();
	//$("#poster").tooltip({txt: '<img src="images/im3.jpg"/>'});
	//$("#d04").tooltip({txt: '<img src="images/im.jpg"/>'});
	
	$("div").hover(function(){
		var t = $(this).css("background-color");
		var tx= $(this).attr("id");
		//var t = tx.css("background-color");
		$("#my01").css({"background-color":t});	
		$("#my01").text(tx);		
	});
	
	$(document).mousemove(function(e) {
          var x = e.pageX;
          var y = e.pageY;
		  /*var t = $(this).css("background-color");*/
		  $("#my01").css({'margin-top':(y+10), 'margin-left':(x+10)});
	});
	
	
});


