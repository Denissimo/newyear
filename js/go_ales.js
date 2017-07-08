// JavaScript Document

$(function() {
var x, sizex;
 //$('.parts').corner('Round 8px'); 

 //$('input[type="text"]').corner('Round 6px');
 //$('textarea').corner('Round 6px');
 //$('select').corner('Round 6px');
 $("#datepicker").datepicker();
 //$('#ales').delay(2800).hide(300);
 
 //$('#testbut').slideUp(500).delay(1800).fadeIn(400); 
 x = $('#test01').width();
 sizex = Math.round(x/10) + 'px';
 $('#testbut').fadeIn().delay(1500).hide('explode', 800);  
 //$('#test01').corner(sizex); 
 $('#test01').resizable(); 
 /*
 $('#test01').css('box-shadow','10px 10px 25px #CCC');
 $('#test01').css('background-image','radial-gradient(175px 75px 45deg, circle , #ffffff 0%, #F56991 50%, #8A2624 100%)');
 $('#test01').css('background-image','-moz-radial-gradient(175px 75px 45deg, circle , #ffffff 0%, #F56991 50%, #8A2624 100%)');
 $('#test01').css('background-image','-webkit-gradient(radial, 175 75, 15, center center, 250, color-stop(0%, #ffffff), color-stop(50%, #F56991), color-stop(100%, #8A2624)');
*/
});