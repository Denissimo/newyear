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
	
	
	function str_repeat ( input, multiplier ) {
	    var buf = '';
	    for (i=0; i < multiplier; i++){
	        buf += input;
	    }
	    return buf;
	}
	
	$.ajax({
			url: "/ajax001/",
			type: "POST",
			async: false,
			dataType: "json",
			success: function(data3){
			//alert( "Прибыли данные: " + data );
			qty=data3.qty;
			$("#mon2").html(qty);
			}
	});


	function lodges(){
	var lod = new Array();
	//$("#mon").text(zal_x);
	var lenn;
	var ext;
	var i=1;
	for(i=0; i<=qty; i++){
		lenn=i.toString().length;
		ext = str_repeat("0", 3-lenn)+i.toString();
		lodge_pref = prefix+ext;
	$.ajax({
			url: "/ajax001/"+ext,
			type: "POST",
			async: false,
			dataType: "json",
			success: function(data2){
			//alert( "Прибыли данные: " + data );
			lod[lodge_pref] = new Array();
			lod[lodge_pref]["numb"]=data2.numb;
			
			lod[lodge_pref]["x"]=data2.x;
			lod[lodge_pref]["y"]=data2.y;
			lod[lodge_pref]["notice"]=data2.notice;
			lod[lodge_pref]["flonum"]=data2.flonum;
			lod[lodge_pref]["guests"]=data2.guests;
			lod[lodge_pref]["coord"]= "-"+data2.x+"px "+"-"+data2.y+"px";
			
			//$("#mon2").html(lod[lodge_pref]["notice"]);
			var aa=123;
			//$("#mon2").html(aa.toString().length);
			
			}
		});
		//i++;
		}
		return lod;
	}
	
	var lodd=lodges();

	$(".frm02").hover(function(){
		
		var ths=$(this).attr("id");
		var lod=$(this).attr("id").substr(6,3);
		var dd="/ajax001/" + lod;
		$("#mon2").html(lodd[ths]["notice"]);
		/*
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
		*/
		//
		//var coord= data.x;
				
		//$(this).css({"background-image":"url(../imag/hall/hall_b.gif)",	"background-position":"-285px -64px"});
		$("#mon").css({"display":"block"});
		$(this).css({"background-image":"url(../imag/hall/hall_b.gif)",	"background-position":lodd[ths]["coord"]});
		messag="Ложа: "+ths+"<br />Этаж: "+lodd[ths]["flonum"]+"<br />Гостей: "+lodd[ths]["guests"]+"<br />Примечание: "+lodd[ths]["notice"];
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
