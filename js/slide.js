// JavaScript Document

$(document).ready(function(){

	//$("#adv1").hide();
	//$("#adv2").hide();
	//$("#adv3").hide();
	//$("#adv3").show();
	
var animation_duration = 2500;

/*$("#adv2").stop().animate({left: "-50px", top: "200px"}, {easing: 'easeOutBack', duration: 5000});*/

//document.write('123456');	
//Это следит за текущем положением слайдшоу
var current_panel = 1;
//Контролируем продолжительность анимации

	$.timer(3000, function (timer) {
		//Determine the current location, and transition to next panel
		switch(current_panel){
			case 1:
				/*$("#adv1").stop().animate({left: "-50px", top: "10px"}, {easing: 'easeOutBack', duration: animation_duration});*/
		$("#adv2").hide("slow");
		$("#adv3").hide("slow");
		$("#adv1").show("slow");
				current_panel = 2;
			break;
			case 2:
				/*$("#adv1").stop().animate({left: "50px", top: "-10px"}, {easing: 'easeOutBack', duration: animation_duration});*/
		$("#adv1").hide("slow");
		$("#adv3").hide("slow");
		$("#adv2").show("slow");
				current_panel = 3;
			break;
			case 3:
				/*$("#adv1").stop().animate({left: "-50px", top: "-10px"}, {easing: 'easeOutBack', duration: animation_duration});*/
		$("#adv1").hide("slow");
		$("#adv2").hide("slow");
		$("#adv3").show("slow");
				current_panel = 1;
			break;

	  		timer.reset(12000);
		}
	});


});