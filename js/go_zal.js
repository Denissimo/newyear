// JavaScript Document

$(document).ready(function(){
	$("#mon").corner('round 8px');
	$("#mon").css({"opacity":0.8});
	$("#mon").css({"display":"none"});
	var prefix = "ложа ";
	var zal_off=$('#zal').offset();
	var zal_x=zal_off.left;
	var zal_y=zal_off.top;
	var qty;
	
	/*
	function str_repeat ( input, multiplier ) {
	    var buf = '';
	    for (i=0; i < multiplier; i++){
	        buf += input;
	    }
	    return buf;
	}
	*/
	var ress;
	
	
	$.ajax({
			url: "/ajax001/",
			type: "POST",
			async: false,
			dataType: "json",
			success: function(data3){
			//alert( "Прибыли данные: " + data );
			//nnot=data3[0].notice;
			ress=data3;
			//$("#mon2").html(ress.length);
			//return data3;
			}
			
	});
	
	//$("#mon2").html(ress[1].guests);
	//$("#mon2").html("+++");

	$(".frm02").hover(function(){
		
		//$("#mon2").html(ress[1].guests);
		
		var ths=$(this).attr("id");
		var lod=parseInt($(this).attr("id").substr(5,3));
		//var dd="/ajax001/" + lod;
		//$("#mon2").html(lod);
		
		$("#mon").css({"display":"block"});
		var coords= "-"+ress[lod-1].x+"px "+"-"+ress[lod-1].y+"px";
		$(this).css({"background-image":"url(../imag/hall/hall_b.gif)",	"background-position":coords});
		messag="Ложа: "+ths+"<br />Этаж: "+ress[lod-1]["flonum"]+"<br />Гостей: "+ress[lod-1]["guests"]+"<br />Примечание: "+ress[lod-1]["notice"];
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
