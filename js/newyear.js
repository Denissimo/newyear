// JavaScript Document
$(document).ready(function(){
	var wh = $(window).height();
	$('.backframe').css('height', wh+'px');
	$('.additional').css('margin-top', wh+15+'px');
	
	console.log(wh);
	var backi=0;
	var backgrnd;
	var backgr = new Array();
	backgr[0] = 'christmas0.jpg';
	backgr[1] = 'christmas1.jpg';
	backgr[2] = 'christmas2.jpg';
	backgr[3] = 'christmas3.jpg';
	backgrnd = "#FFFFFF url('/imag/newyear/back/"+backgr[0]+"') scroll top left no-repeat";
	//backgrnd1 = "#FFFFFF url('/imag/newyear/back/"+backgr[1]+"') fixed top left no-repeat";
	//backgrnd = "#FFFFFF url('/imag/newyear/back/"+backgr[0]+"') 0% 0% / 100% auto no-repeat fixed";
	
	$('#frm1').css({
			background: backgrnd, 
			'-o-background-size': '100% 100%;',
			'-webkit-background-size':'100% 100%',
			'-moz-background-size':'100% 100%', 
			'-khtml-background-size':'100% 100%',
			'background-size': '100% 100%',
			'behavior': 'url(\'/pie/PIE.htc\')'
		});
		
	backgr.forEach(function(entry) {
		//console.log(entry);
	});
/*
	$('#frm1').css({
			background: backgrnd, 
			'-o-background-size': '100% 100%;',
			'-webkit-background-size':'100% 100%',
			'-moz-background-size':'100% 100%', 
			'-khtml-background-size':'100% 100%',
			'background-size': '100% 100%',
			'behavior': 'url(\'/pie/PIE.htc\')'
		});
	$('body').css({
			background: backgrnd1, 
			'-o-background-size': '100% 100%;',
			'-webkit-background-size':'100% 100%',
			'-moz-background-size':'100% 100%', 
			'-khtml-background-size':'100% 100%',
			'background-size': '100% 100%',
			'behavior': 'url(\'/pie/PIE.htc\')'
		});
	$('#frm1').animate({opacity: "0.0"}, 2000);
*/	
	
	
	console.log(backgr.length);
	
	$("body").everyTime(3000, function(i) {
		//$(this).text(i);
		//console.log('Loop');
		//console.log($('#frm1').width());
		$('#frm1').css({
			background: backgrnd, 
			'-o-background-size': '100% 100%;',
			'-webkit-background-size':'100% 100%',
			'-moz-background-size':'100% 100%', 
			'-khtml-background-size':'100% 100%',
			'background-size': '100% 100%',
			'behavior': 'url(\'/pie/PIE.htc\')'
		});
		$('#frm1').animate({opacity: "1.0"}, 0);
		backi++;
		if(backi>(backgr.length-1)){backi=0;}
		backgrnd = "#FFFFFF url('/imag/newyear/back/"+backgr[backi]+"') scroll top left no-repeat";
		console.log($(this).width());
		$('#frm2').css({
			background: backgrnd, 
			'-o-background-size': '100% 100%;',
			'-webkit-background-size':'100% 100%',
			'-moz-background-size':'100% 100%', 
			'-khtml-background-size':'100% 100%',
			'background-size': '100% 100%',
			'behavior': 'url(\'/pie/PIE.htc\')'
		});
		$('#frm1').animate({opacity: "0.0"}, 1000);
		//$('#frm1').css({background: backgrnd});
		//$('.container-fluid').css({background: backgrnd});
		
		//$('.container-fluid').animate({	"background":"rgba(128, 128, 128, 0.3)", "-ms-background":"rgba(128, 128, 128, 0.3)", "-pie-background":"rgba(128,128, 128, 0.3)", "behavior": "url('/pie/PIE.htc')"}, 1000);
		//$(this).css({background: backgrnd, '-moz-transition': 'all 1s ease', '-webkit-transition':'all 1s ease', '-o-transition':'all 1s ease', 'transition':'all 1s ease', 'behavior': "url('/pie/PIE.htc')"});

	});
	
	
	//$( "#datepicker" ).html('Ура');

	//$('.datpic').datepicker($.datepicker.regional["ru"]);

	$.datepicker.regional['ru'] = {
			closeText: 'Закрыть',
			prevText: '&#x3c;Пред',
			nextText: 'След&#x3e;',
			currentText: 'Сегодня',
			monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь',
			'Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
			monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн',
			'Июл','Авг','Сен','Окт','Ноя','Дек'],
			dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
			dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
			dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
			weekHeader: 'Не',
			dateFormat: 'dd.mm.yy',
			//dateFormat: 'yy-mm-dd',
			firstDay: 1,
			isRTL: false,
			showMonthAfterYear: false,
			yearSuffix: ''};

	$.datepicker.setDefaults($.datepicker.regional['ru']);
//$.datepicker.setDefaults( $.datepicker.regional[ "ru" ] );
	$( "#datepicker" ).datepicker({
      showButtonPanel: true
    });
	
});