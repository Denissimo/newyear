// JavaScript Document
jQuery.fn.extend({
	rowheight: function () {
		//$(this).css('display', 'none');
		var $blocks = $(this),
        //примем за максимальную высоту - высоту первого блока в выборке и запишем ее в переменную maxH
        maxH    = $blocks.eq(0).height();
        //делаем сравнение высоты каждого блока с максимальной
        $blocks.each(function(){
        maxH = ( $(this).height() > maxH ) ? $(this).height() : maxH;
        /*
        Этот блок можно записать так:
        if ( $(this).height() > maxH ) {
            maxH = $(this).height();
        }
        */
        });
        //устанавливаем найденное максимальное значение высоты для каждого блока jQuery выборки
        $blocks.height(maxH);
	}
});

$(document).ready(function(){
	$('.login-out-form').hide();
	$('.pointer').click(function(){
		$(this).next().toggle();
	});
	var ord_url = '%D0%97%D0%B0%D0%BA%D0%B0%D0%B7%D0%B0%D1%82%D1%8C';
	//$("#inputphone").mask("(999) 999-9999");
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
	$( "#lock" ).click(function(){
		console.log('click');
		$('.login-out-form').toggle('explode');
		//$('.login-out-form').focus();
		return false;
	});
	$( '.login-out-form' ).draggable();
	$( '.login-out-form' ).blur(function(){
		//console.log('click');
		$('.login-out-form').hide('explode');
	});
	$( "#datepick" ).focus(function(){
		//console.log('focus');
		$('#datepicker').popover('show');
		$('.popover').effect('highlight', {color: '#0000FF'}, 200);
		//$('.ui-datepicker-calendar').effect('highlight', {color: '#0000FF'}, 200);
	});
	$( "#datepick" ).blur(function(){
		$('#datepicker').popover('hide');
		//console.log('blur');
	});
	$( "#datepicker" ).datepicker({
		showButtonPanel: true,
		format: "DD.MM.YYYY",
		onSelect: function (dateText, inst) {
        //$(this).html(dateText);
		var cur_url = window.location.pathname.split('/');
		
		if(cur_url[1]!=ord_url){
			window.location.href = '/'+ord_url+'/'+dateText;
			//console.log(cur_url[1]);
			//console.log(ord_url);
		}else{
			console.log('norm');
		}
		$('#datepick').val(dateText);
		$('#datepick').effect('highlight', {color: '#0000FF'}, 200);
		//$('#datepick').effect('bounce');
		
		
		}
    });
	
	console.log("??><");
	/*
	$( "#datepick" ).datepicker({
      showButtonPanel: true
    });
	*/
	//$('.sideblock').rowheight();
	
});

