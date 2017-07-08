// JavaScript Document

$(function() {
	function fintime(){
		if($('#datepicker').attr('value')){
			//var stdate = new Date();
			//var stdate = Date.parse($('#datepicker').attr('value'));
			var ddat = $('#datepicker').attr('value').split("-");
			var stdate = Date.parse(ddat[1]+', '+ddat[2]+', '+ddat[0]+' 00:00');
			var sthour = $('#timestart').attr('value').substr(0,2)*60*60*1000;
			var dura = $('#duration').attr('value')*60*60*1000;
			//var findate = new Date();
			var findat = new Date(stdate+sthour+dura);
			var finyear = findat.getFullYear();
			var finmonth = findat.getMonth()+1; 
			if(finmonth<10){
				finmonth = '0'+finmonth;
			}
			var finday = findat.getDate();
			var finhour = findat.getHours(); 
			if(finhour<10){
				finhour = '0'+finhour;
			}
			var finmin = findat.getMinutes();
			if(finmin<10){
				finmin = '0'+finmin;
			}
			//finyear = formatDate(finyear);

			//var dtim = $('#timestart').attr('value').split(":");
			$('#fintimep').html('Окончание мероприятия: '+finday+'.'+finmonth+'.'+finyear+'г. '+finhour+':'+finmin);
		}
		
		//$('#eventform input').hide(3000);
	}
	
	fintime();
	
	//$('#eventform input').hide(3000);
	$('#eventform').change(function(){
			fintime();
	});

});


