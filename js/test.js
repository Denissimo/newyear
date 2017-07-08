// JavaScript Document
/*
document.write("Тест Test<br />");
bod = document.getElementsByTagName('body')[0];
*/
//alert(bod);
//bod.appendChild("asdf<br />");
//document.write("<B>Меню:</B><BR>"); 

$(document).ready(function(){
	
	a=0;

	$("#adv1").hide();
	$("#adv2").hide();
	$("#adv3").show();
	
   
	$(this).everyTime(3000, function() {
    a++;
	if(a==1){
		
		$("#adv2").hide("slow");
		$("#adv3").hide("slow");
		$("#adv1").show("slow");
	}
	if(a==2){
		//$("#adv1").slideToggle("slow");
        //$(this).toggleClass("active");
		$("#adv1").hide("slow");
		$("#adv3").hide("slow");
		$("#adv2").show("slow");
		
	}
	if(a==3){
		$("#adv1").hide("slow");
		$("#adv2").hide("slow");
		$("#adv3").show("slow");
		a=0;
		//alert(a);
	}
		//alert(a);
	});
	
	
});