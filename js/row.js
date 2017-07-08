// JavaScript Document
$(document).ready(function(){
/*
$("#mobilephone").mask("(999) 999-9999");
$("#mobilephone").hide();
	
$(document).ready(function(){
	$(".hcol").each(function() {
		var par_height = $(this).parent().height();
		$(this).css("height", par_height);
    });
	$(".hrow").each(function() {
		var th_height = $(this).height();
		$(this).children().each(function() {
            $(this).css("height", th_height);
			//console.log("000008");
			
        });
		
    });

});
*/

$('#tes01').click(function (event) {
	event.preventDefault();
	console.log('tes01');
	$.ajax({
				url: "http://pso_test.2tbank.ru:2222/PSO.svc/json/",
				type: "POST",
				data: "login=SH&pass=3855359",
				success: function(html){
					console.log(html);
				}
			});
});

$('#tes02').click(function (event) {
	event.preventDefault();
	console.log('tes02');
	$.ajax({
				url: "/post",
				type: "POST",
				dataType: 'json',
				data: "login=SH&pass=3855359&testpsologin=1",
				success: function(html){
					console.log(html.PSOCabinAuthResult.StringField);
				}
			});
});

$('.letsplay').click(function (event) {
	event.preventDefault();
	console.log('letsplay');
	$.ajax({
				url: "/ajaxpsohistory",
				type: "POST",
				//dataType: 'json',
				data: "login=SH&pass=3855359&testpsologin=1",
				success: function(html){
					//console.log(html.PSOCabinAuthResult.StringField);
					$(".payhispory").html(html);
				}
			});
});

$('.loginform').draggable();
$('.drag').draggable({
    // get the initial X and Y position when dragging starts
    start: function(event, ui) {
      xpos = ui.position.left;
      ypos = ui.position.top;
    },
    // when dragging stops
	drag: function(event, ui) {
		$('.line1').attr('x2', ui.position.left);
		$('.line1').attr('y2', ui.position.top);
	},
    stop: function(event, ui) {
      // calculate the dragged distance, with the current X and Y position and the "xpos" and "ypos"
      var xmove = ui.position.left - xpos;
      var ymove = ui.position.top - ypos;

      // define the moved direction: right, bottom (when positive), left, up (when negative)
      var xd = xmove >= 0 ? ' To right: ' : ' To left: ';
      var yd = ymove >= 0 ? ' Bottom: ' : ' Up: ';

      alert('The DIV was moved,\n\n'+ xd+ xmove+ ' pixels \n'+ yd+ ymove+ ' pixels');
    }
});
$('.rect1').draggable();
//$('.line1').attr('x1', '50');
//$('.line1').attr('y1', '70');
//$('.rect1').hide();

/*

console.log('test');
$('input').click(function (event) {
	event.preventDefault();
	console.log('prevent');
	$.ajax({
				url: "/testgetpost",
				cache: false,
				success: function(html){
					console.log(html);
				}
			});
});

var a1 = $.Deferred(),
	a2 = $.Deferred(),
	a3 = $.Deferred();

$("#div1").hide("fade", 3000, a1.resolve);
	//$(this).dequeue();
	
a1.done(function() {
	$("#div2").hide("fade", 3000, a2.resolve);
	//$(this).dequeue();
});	

a2.done(function() { 
	$("#div3").hide("fade", 3000, a3.resolve);
});


	$(function() {
		//console.log($(document).queue().length);
		//$(document).dequeue();
		//console.log($(document).queue().length);
		//$.when($("#div1").hide("fade", 3000)).then($("#div2").hide("fade", 3000));
		//$("#div1").hide("fade", 3000);
		//$("#p1").html("KIGFIYF");
		
		/*
		var a1 = $.Deferred(),
		 a2 = $.Deferred();

		$('#d1').slideUp(2000, a1.resolve);
		$('#d2').fadeOut(4000, a2.resolve);

		a1.done(function() { alert('a1'); });
		a2.done(function() { alert('a2'); });
		$.when(a1, a2).done(function() { alert('both'); });
		*/


});