// JavaScript Document
$(function() {
	var i, curmas, curval, curid='', errstat, fillnum, mess='';
	//$('#tex_1').attr('value', lefts);
	$('#sub_rfid').prop("disabled", true); 
	//$('input').hide();
	$('#reset').click(function(){
		$('input[type="text"]').attr("value", ""); 
		//$('.lightbox').css({'display':'none'});
		//$('.lightbox').css({'float':'right', 'display':'inline-block'});
		//$(this).hide();
	});
	
	
	$('input[type="text"]').focus(function(){
		//$('#sub_rfid').prop("disabled", true); 
		
	});	
	function checking(x){
				errstat = 0;
				curid='';
				mess='';
				$('.normal').css('color', '#000080')
				for(i=0; i<lefts; i++){
					curid = '#tex_'+i;
					curval = $(curid).attr('value');
					if(!$(curid).attr('value')){
						errstat = 1;
					}
					if(curid!=('#'+$(x).attr('id'))){
						
						if($(curid).attr('value')==$(x).attr('value')){
							errstat = 1;
							//mess+=('#'+$(this).attr('id'))+' = '+$(this).attr('value')+' => '+curid+' = '+$(curid).attr('value')+'mess:'+errstat+'\n';
							mess = 'Повторная регистрация браслета';
							$(x).css('color', 'red')
							
						}
					}
				}
				if(errstat==0){
					$('#sub_rfid').prop("disabled", false); 
				}else{
					$('#sub_rfid').prop("disabled", true);
					if(mess){
						alert(mess);
					}
					
				}
				

		
	}

	
	function checkall(){
		var mess;
		//var mess2='<table border="1">';
		var filled = 1;
		var errstat=0;
		$('input.normal').css({'color':'#0000A0'});
		for(i=0; i<lefts; i++){
			curid = '#tex_'+i;
			curval = $(curid).attr('value');
			
			if(curval){
				for(j=0; j<lefts; j++){
					curid2 = '#tex_'+j;
					curval2 = $(curid2).attr('value');
					//mess2=mess2+('<tr><td>'+curval+'|</td><td>'+curval2+'|</td><td>'+i+'|</td><td>'+j+':</td>');
					if(curval2 && i!=j){
						if(curval==curval2){
							errstat = 1;
							mess = 'Повторная регистрация браслета';// i:'+i+' j:'+j+' cur1:'+curval+' cur2:'+curval2;
							$(curid2).css('color', 'red');
							//mess2=mess2+('<td>Error</td></tr>');
						}else{
							//mess2=mess2+('<td>Normal</td></tr>');
						}
					}else{
						//mess2=mess2+('<td>???</td></tr>');
					}
				}
			}else{
				filled = 0;
			}
		}
		
		if(errstat==0 && filled==1){
			$('#sub_rfid').prop("disabled", false); 
		}else{
			$('#sub_rfid').prop("disabled", true);
			if(mess){
				alert(mess);
			}
		}
		//mess2=mess2+'</table>';
		//$('.footer').html(mess2);
	}

	
//	$('input[type="text"]').keypress(function (event) {
	$('input').keypress(function (event) {
	        if (event.which == '13') {
				event.preventDefault();
				//checking(this);
				//try{
				checkall();
				/*} catch(e) {
					alert(e.name)
				}*/
				
				var as;
				as = '#'+$(this).next().next().attr("id");
				$(as).focus();
	        }

    });
	

	/*
	$('input').change(function(){
		//$('#sub_rfid').attr("disabled","disabled"); 
	$('#sub_rfid').prop("disabled", true); 
	//$(this).hide(3000);	 
	//$(this).next.focus();
	//$(this).parent().next().hide(1500);
	//
	});
	*/
	
	
	
});

