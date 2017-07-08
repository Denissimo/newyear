// JavaScript Document

$(document).ready(function(){
	$("#mon").corner('round 8px');
	$("#mon2").corner('round 8px');
	$("#mon").css({"opacity":0.8});
	//$("#mon2").css({"opacity":0.8});
	$("#mon").css({"display":"none"});
	
	$("#mon2").text("try");
	
	var zal_off=$('#zal').offset();
	var zal_x=zal_off.left;
	var zal_y=zal_off.top;
	//$("#mon").text(zal_x);
	
	var ths=$(this).attr("id");
	var lod=$(this).attr("id").substr(6,3);
	//var dd="/ajax001/" + lod;
	i=0;
	//while(lodd[i][0]){
	
	//dd="/ajax001/" + lod;	
	dd="/ajax001/";	
	$.ajax({
			url: "/ajax001/001/",
			type: "POST",
			async: false,
			dataType: "json",
			success: function(data){
			$("#mon2").text("qwer");
			/*
			xx=data.x;
			yy=data.y;
			n_not=data.notice;
			n_flo=data.flonum;
			n_gue=data.guests;
			coord= "-"+xx+"px "+"-"+yy+"px";
			*/
			},
			error: function(){
				$("#mon2").text("fail");
			}
		});
	

	$(".frm02").hover(function(){
		
		
		var ths=$(this).attr("id");
		var lod=$(this).attr("id").substr(6,3);
		var dd="/ajax001/" + lod;
		$.ajax({
			url: dd,
			type: "POST",
			async: false,
			dataType: "json",
			success: function(data){
			//alert( "Прибыли данные: " + data );
			xx=data.x;
			yy=data.y;
			n_not=data.notice;
			n_flo=data.flonum;
			n_gue=data.guests;
			coord= "-"+xx+"px "+"-"+yy+"px";
			
			}
		});
		
		//
		//var coord= data.x;
				
		//$(this).css({"background-image":"url(../imag/hall/hall_b.gif)",	"background-position":"-285px -64px"});
		$("#mon").css({"display":"block"});
		$(this).css({"background-image":"url(../imag/hall/hall_b.gif)",	"background-position":coord});
		messag="Ложа: "+ths+"<br />Этаж: "+n_flo+"<br />Гостей: "+n_gue+"<br />Примечание: "+n_not;
		$("#mon").html(messag);

	},function(){
		$("#mon").css({"display":"none"});
		$(this).css({"background-image":"none"});
		$("#mon").text("");
	});
	
	$(".frm02").click(function(){
		var lod=$(this).attr("id").substr(6,3);
		var dd="/ajax001/" + lod;
		$.ajax({
			url: dd,
			type: "POST",
			dataType: "json",
			success: function(data){
			//alert( "Прибыли данные: " + data );
			//$("#mon").text(zal_x);
			}
		});

		//$("#mon").text(dd);
	});
	
	
	$(document).mousemove(function(e) {
          var mx = e.pageX;
          var my = e.pageY;
		  /*var t = $(this).css("background-color");*/
		  $("#mon").css({'margin-top':(my-zal_y+30), 'margin-left':(mx-zal_x+30)});
	});

});
