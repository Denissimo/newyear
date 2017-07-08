// JavaScript Document

$(document).ready(function(){
	

	 var gal0=$("#galerin").width();
	  //$("#mon1").text(gal0);
	 //var dif0=-(gal0-$("#mainpic").width());
	 var dif0=-(gal0-700);
	 //$("#mon1").text($("#mainpic").width());
	 
	
       $( ".selector" ).slider({ step: 1});
	   $("#sel0 a").css({"height":"6px", "margin-top":"3px"});
	   //$("#sel0 a").css({"background":"#920883", "height":"6px", "margin-top":"3px", "width":"90px", "margin-left":"0px", "margin-right":"0px"});
	   //$("#sel0 a").css({"height":"6px", "margin-top":"3px",  "width":"90px"});
	   //$("#sel0").css({"padding-right":"45px"});

	   $( ".selector" ).slider({
		   slide: function(event, ui) {
			   var val0 = $( ".selector" ).slider( "option", "value" ); 
			   var cur0 = dif0*val0/99;
			   //$("#mon1").text(gal0);
			   $("#galerin").css({"margin-left":cur0});
			   }
		});
		
		$( ".selector" ).slider({
		   change: function(event, ui) {
			   var val0 = $( ".selector" ).slider( "option", "value" ); 
			   var cur0 = dif0*val0/99;
			   //$("#mon1").text(cur0);
			   $("#galerin").css({"margin-left":cur0});
			   }
		});
		
		
		//$("#track1").draggable({containment: [0, 6, 600, 6]});


});
