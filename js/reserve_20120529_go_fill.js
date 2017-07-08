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
	
	
//	$('input[type="text"]').keypress(function (event) {
	$('input').keypress(function (event) {
	        if (event.which == '13') {
				event.preventDefault();
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
					if(curid!=('#'+$(this).attr('id'))){
						
						if($(curid).attr('value')==$(this).attr('value')){
							errstat = 1;
							//mess+=('#'+$(this).attr('id'))+' = '+$(this).attr('value')+' => '+curid+' = '+$(curid).attr('value')+'mess:'+errstat+'\n';
							mess = 'Повторная регистрация браслета';
							$(this).css('color', 'red')
							
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
				
				//$('#tex_1').attr('value', curmas[curval]);
				var as;
				as = '#'+$(this).next().next().attr("id");
				$(as).focus();
	        }
			
			//$('#'+as).focus();
			//$(this).attr("value",$(this).attr("id"));
			$('#mon01').text(as);
			//$(this).next().attr("id");
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

