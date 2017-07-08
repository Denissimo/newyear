<?
//ech($_SESSION['rules']);

$proc->mod['filter'] = 'temptype = "alert"';
//$proc->mod['index'] = 1;
$proc->fetch('sys_temps');
$templs = array_colum($proc->tabdata['sys_temps'], 'temp');
//ech($templs);
$mess['message'] = '+++';
//$alert = $cont->load_cont($mess, $templs['bootdanger']);
//$alert = $cont->load_cont($msg, $templs['blueflame']);

//echo $alert;

//echo '$("body").append(\''.$alert.');';
if($_SESSION['rules']){
	echo 'var errflag=0;';
	foreach($_SESSION['rules'] as $key=>$val){
		//echo 'console.log("'.$key.'");';
		if($val->validateStr){
			$msg['message'] = $val->message;
			$alert = $cont->load_cont($msg, $templs['bootdanger']);
			$script = '$("#'.$key.'").change(function () {
				$(".alert").alert("close");
				var val = $(this).val();
				var tpl = /'.$val->validateStr.'/;
				var msg = \''.$alert.'\';
				var mat = val.match(tpl);
				//console.log('.mat.');
				if(!mat){
					//console.log(msg);
					//alert(msg);
					$("body").append(msg);
					$(".alert").hide(0).delay(10).show(0).delay(1500).hide(\'puff\',200);
					//$(this).css("border", "1px solid #F00");
					$(this).addClass("errinput");
				}else{
					//console.log("'.$key.'");
					$(this).removeClass("errinput");
					$(this).css("border", "1px solid #ccc");
				}
			});';
			echo $script;
		}
		//echo 'console.log("'.$val->id.'");';
	}
}
unset($_SESSION['rules']);
//unset($_SESSION['backlab']);

$msg_sendsoap['message'] = 'Не все поля заполнены';
$alert_sendsoap = $cont->load_cont($msg_sendsoap, $templs['bootdanger']);
echo '
$("#sendsoap").click(function (event) {
	var allfilled = 1;
	
	$(".paysoap").each(function () {
		if(!$(this).val() || $(this).hasClass("errinput")){
			allfilled = 0;
		}
	});
	if(!allfilled){
		event.preventDefault();
		var msg_sendsoap = \''.$alert_sendsoap.'\';
		//$("body").delay(3000).append(msg_sendsoap);
		$("body").append(msg_sendsoap);
		//$(".alert").hide(\'fade\',500);
		$(".alert").hide(0).delay(10).show(0).delay(1500).hide(\'puff\',200);
		//$(".alert").delay(1000).hide();
		//$(".alert").delay(1000).hide();
	}
		
});
';
?>


	
