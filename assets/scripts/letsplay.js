var accs_id;
/*
jQuery.expr[':'].regex = function(elem, index, match) {
   var matchParams = match[3].split(','),
   validLabels = /^(data|css):/,
   attr = {
      method: matchParams[0].match(validLabels) ? matchParams[0].split(':')[0] : 'attr',
      property: matchParams.shift().replace(validLabels,'')
   },
   regexFlags = 'ig',
   regex = new RegExp(matchParams.join('').replace(/^\s+|\s+$/g,''), regexFlags);
   return regex.test(jQuery(elem)[attr.method](attr.property));
}
*/

$('.letsplay').click(function (event) {
	event.preventDefault();
	console.log('letsplay');
	console.log($('#date_beg').val());
	console.log($('#date_end').val());
	$.ajax({
				url: "/ajaxpsohistory",
				type: "POST",
				//dataType: 'json',
				data: "date_beg="+$('#date_beg').val()+"%2000:00:00&date_end="+$('#date_end').val()+"%2000:00:00&acc_id=12375",
				success: function(html){
					//console.log(html.PSOCabinAuthResult.StringField);
					$(".payhistory").html(html);
				}
			});
});


$(window).load(function() {
	var accid = $(location).attr('href').split("#")[1];
	if(accid){
		$.ajax({
			url: "/ajaxpsohistory/",
			type: "POST",
			//dataType: 'json',
			data: "date_beg="+$('#date_beg').val()+"%2000:00:00&date_end="+$('#date_end').val()+"%2000:00:00&acc_id="+accid,
			success: function(html){
				//console.log(html.PSOCabinAuthResult.StringField);
				$(".payhistory").html(html);
			}
		});
	}
});


$('.accstd').click(function () {
	//console.log($(this).attr('rel'));
	$('.accstd').removeClass('label-success');
	$('.accstd').addClass('label-warning');
	$(this).removeClass('label-warning');
	$(this).addClass('label-success');
	$.ajax({
		url: "/ajaxpsohistory/",
		type: "POST",
		//dataType: 'json',
		data: "date_beg="+$('#date_beg').val()+"%2000:00:00&date_end="+$('#date_end').val()+"%2000:00:00&acc_id="+$(this).attr('rel'),
		success: function(html){
			//console.log(html.PSOCabinAuthResult.StringField);
			$(".payhistory").html(html);
		}
	});
	


});

$('#phonenum').change(function () {
	console.log('begin');
	var phone = $('#phonecode').val() + $('#phonenum').val().substring(0,3) + $('#phonenum').val().substring(4, 6) + $('#phonenum').val().substring(7,9);
	$.ajax({
		url: "/ajaxcelloper/",
		type: "POST",
		dataType: "json",
		data: "phone="+phone,
		success: function(html){
			console.log(html.return.image);
			$('.b-transfer__operator').css('background-image','url("/img/logotype-merchant/'+html.return.image+'"');
			//console.log("xxx");
			//$(".payhistory").html(html);
		},
		error: function(){
			console.log("zzz");
		}
	});
	//console.log(phone);
	
});



/*
$("input").keypress(function (e) {
  //$('.alert').alert('close');
  //console.log(e);

});
*/

$('input').focus(function () {
	console.log($(this).attr('class'));
});

$('.errinput').focus(function () {
	console.log('err');
});
/*
$('.b-header__logo').hover(function () {
	//console.log('Pocus');
	$('.alert').alert('close');
});
*/

function getnum(){
	var phonenum = $('#phonecode').val() + $('#phonenum').val().substring(0,3) + $('#phonenum').val().substring(4, 6) + $('#phonenum').val().substring(7,9);
}



var accname = new Array();
var accnum;
var accrol;
var new_val = new Array();

$('.b-bank__name').click(function() {
	//accnum = $(this).parent().attr('snum'); 
	accnum = $(this).attr('snum'); 
	//console.log(accnum);
	var text=$(this).text();
	//console.log(text);
	if(!accname[accnum]){
		accname[accnum]=$(this).find('span').text();
	}
	//console.log(accname);
	if($(window).width()>=740) {
		$(this).attr('data-text',text).html('<input type="text" class="new_name" style="width:250px;" value="'+accname[accnum]+'"/>').find('input').focus();
		//console.log(accname);
	}
	else {
		$('.b-right-menu').fadeIn(450);
	}
});

$('body').on('blur', '.new_name', function(e) {
	var editnow = 0;
	
	accnum = $(this).parent().attr('snum');
	new_val[accnum]=$(this).val();// || $(this).parent().attr('data-text');
	//console.log(accnum);
	//console.log(new_val);
	$(this).parent().html('<span>'+new_val[accnum]+'</span>');
	accname = new_val;
	accrol = 'Тест';
	
	$.ajax({
		url: "/post/",
		type: "POST",
		//dataType: "json",
		data: "accnames=1&acc_id="+accnum+"&acc_nam="+new_val[accnum]+"&acc_role="+accrol,
		success: function(html){
			//console.log(html.return.image);
			//$('.b-transfer__operator').css('background-image','url("/img/logotype-merchant/'+html.return.image+'"');
			console.log(html);
			//$(".payhistory").html(html);
		},
		error: function(){
			console.log("zzz");
		}
	});
	
	
});
	
//var str = 'Груз прибудет через [>12<] суток';
//var pat  = /\[>([a-zA-Z0-9_\-]*)<\]/;

//console.dir(str.match(pat));
//r priceRegex = /[(0-9)+.?(0-9)*]+/igm;
 
//console.log(priceRegex.test(price));
//console.log(price.match(priceRegex));
//console.dir(priceRegex.exec(price));
