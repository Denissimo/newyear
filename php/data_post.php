<?
//header("Content-Type: text/plain; charset=utf-8");
function getmicrotime() 
{ 
    list($usec, $sec) = explode(" ", microtime()); 
    return ((float)$usec + (float)$sec); 
} 
//echo 'pasot';
//ech($_POST);
/*
// Перенесено в начало index.php
$form->formdata['POST'] = $_POST;
$form->formdata['GET'] = $_GET;
$form->formdata['SESSION'] = $_SESSION['formdata'];
*/

//прикрутить таблицу sys_joinlabs

$timestart = getmicrotime();
/*
$par_addr = $proc->url_parse($_SERVER['HTTP_REFERER']);
$par_flip = array_flip($proc->chpu_par[address]);
$ref_label = $par_flip[$par_addr['path']];
*/
//echo "proc->sys['url'] "; ech($proc->sys['url']);
//echo "par_addr['list'] "; ech($par_addr); 
//$proc->testmode = TRUE;
$proc->sys['url'] = $proc->url_parse($_SERVER['HTTP_REFERER']);
//echo "proc->sys['url'] "; ech($proc->sys['url']);
$ref_label = $proc->url_identify($proc->sys['url']['list']);
//echo '<br />test_res';
//ech($test_res);
//echo '<br />/test_res';

//ech($par_flip);
//$lpar = $proc->load_parents('label', 'parent');
//ech($lpar['bread']);
//ech($par_addr['list']);
$urr = $proc->address($_SERVER['HTTP_REFERER']);
//$proc->mod['filter']='val="'.$proc->cur_label.'" OR val="0"';
//$proc->mod['filter']='val="'.$ref_label.'" OR val="" OR val IS NULL';
$proc->mod['filter']='val="'.$ref_label.'" OR val="" OR val IS NULL';
//echo 'filter: '.$proc->mod['filter'].'<br />';
$proc->fetch('sys_forms');
//ech($proc->tabdata['sys_content']); 
//ech($proc->tabdata['sys_forms']); 

//перенести в класс (примерно  строка 662) ??
//if($this->ok_form==FALSE or (count($_POST)==0 and count($_GET)==0)){ - ELSE
//ech($form->formdata);
if(is_array($form->formdata)){
	foreach($form->formdata as $akey => $aval){
		if(is_array($aval)){
			foreach($aval as $key => $val){
				//$form->formdata[$akey][$key] = htmlspecialchars($form->formdata[$akey][$key]);
				
				//$form->formdata[$akey][$key] = $proc->db->escape_string($form->formdata[$akey][$key]);
				//echo 'formdata akey: '.$form->formdata[$akey][$key].' key: <b>'.$key.'</b> proc->tabdata: '.$proc->tabdata['sys_forms'][$key]['nam'].'val: '.$val.'<br />';
				if($proc->tabdata['sys_forms'][$key]['nam']==$key and $val){
					$keylabel = $key;
					//echo '<br />+++++++++++++<br />';
	
					//echo 'BINGO!!! '.$key.' => '.$proc->tabdata['sys_forms'][$key]['nam'].'<br />'; ech($proc->tabdata['sys_forms'][$key]);
					$form->check_form = $proc->tabdata['sys_forms'][$key];
					
					
					$proc->mod['filter']='formname="'.$form->check_form['nam'].'"';
					$proc->mod['index'] = 1;
					//echo $proc->mod['filter'].'<br />';
					$proc->proc->mod['order'] = 'row_id';
					$proc->fetch('sys_actions');
					//ech($proc->mysql);
	
					//ech($proc->tabdata['sys_actions']); echo $keylabel;
					if($proc->tabdata['sys_actions'][$keylabel]['source']=='1' or $proc->tabdata['sys_actions'][0]['source']=='1'){
						//$proc->source[$proc->tabdata['sys_actions'][$keylabel]['tab']] = 'amazon';
						$proc->source[$proc->tabdata['sys_actions'][0]['tab']] = 'amazon';
						//echo '<br />+++: '.$keylabel;
						//ech($proc-source);
					}
					
					//ech($proc->tabdata['sys_actions']);
	
					//ech($form->message);		
					//тут был конец обоих циклов ( if и	foreach) -перенесен ниже
					//echo "<br />--".$proc->source[$proc->tabdata['sys_forms'][$keylabel]['tab']]."<br />"; // Проверка на source - amazon
					//ech($proc->source);
					//echo '<br />Дальше идёт data_check';
					$resform = $form->data_check();
					//ech($_SESSION);
					//echo '<br />После data_check';
					//ech(json_decode($resform));
					//ech($proc->source);
					// если форма обработана без ошибок, то обнуляем содержимое
					//ech($form->formdata);
					/*
					foreach($form->formdata as $bkey => $bval){
						if(is_array($bval)){
							foreach($bval as $key => $val){
								//echo '<br />okform:'.$form->ok_form.' key: '.$key.' >> '.$val;
								if($form->ok_form){
									unset($_SESSION[$bkey][$key]);
									//echo '<br />'.$key.' UNSET '.$val;
								}else{
									$_SESSION['sys_tmp'][$bkey][$key] = $val;
									//echo '<br />'.$key.' SET '.$val;
								}
							}
						}
					}
					*/
					$_SESSION['sys_tmp']['message'] = $form->message;
					$_SESSION['sys_tmp']['message_class'] = $form->tplmsg;
					$_SESSION['sys_tmp']['formresult'] = $resform;
					$_SESSION['ok_form'] = $form->ok_form;
					$_SESSION['insert_id'] = $mysql->insert_id();
					
					break;
			
				// 2 скобки ниже - перенесены сверху (конец обоих циклов)	
				}elseif($proc->tabdata['sys_forms'][$key]['nam']==$key and !$val){
					$_SESSION['sys_tmp']['message'] = "Wrong form!";
					$_SESSION['sys_tmp']['message_class'] = "alert-danger";
				}
			}
		}
	}
}
//ech($proc->tabdata['sys_forms'][$keylabel]);

if($_SESSION['sys_tmp']['data_error']){
	//echo 'ОШИБКА!';
	$form->ok_form = FALSE;
	$form->message = $_SESSION['sys_tmp']['data_error'];
	$_SESSION['sys_tmp']['message'] = $_SESSION['sys_tmp']['data_error'];
	unset($_SESSION['sys_tmp']['data_error']);
}

if($proc->tabdata['sys_forms'][$keylabel]['comeback'] and $form->ok_form){

	if(!$proc->tabdata['sys_forms'][$keylabel]['sesslab']){
		//echo '<br />no sesslab';
		$comeback = $proc->chpu_par['address'][$proc->tabdata['sys_forms'][$keylabel]['comeback']];
	}else{
		$comeback = $proc->make_url($_SESSION['backurl'][$proc->tabdata['sys_forms'][$keylabel]['comeback']]);
		//echo '<br />sesslab: '.$_SESSION['backurl'][$proc->tabdata['sys_forms'][$keylabel]['comeback']];
	}
}else{
	$comeback = $_SERVER['HTTP_REFERER'];
}
//ech($form->formdata);
//ech($_SESSION['sys_tmp']);
//echo $form->ok_form.'<br />';
//echo $form->message.'<br />';

if($proc->tabdata['sys_forms'][$keylabel]['anchor'] and $form->ok_form){
	if(!$form->formdata['POST']['anchor']){
		$anchor = '#'.$proc->db->insert_id();
	}else{
		$anchor = '#'.$form->formdata['POST']['anchor'];
	}
	//echo 'anchor: '.$anchor;
}

$comeback.=$anchor;



$timefin = getmicrotime();

$_SESSION['timer'] = $timefin-$timestart;
//echo '<script language="javascript">console.log("XMLHttpRequest");</script>';
//echo $_SERVER['HTTP_X_REQUESTED_WITH'];
//echo $form->check_form;
//if(($_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest' or $_GET['XMLHttpRequest'] or $_POST['XMLHttpRequest']) and $form->check_form){
if($_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest' and $form->check_form){
	echo($_SESSION['sys_tmp']['message']);
	unset($_SESSION['sys_tmp']['message']);
	//echo $_SERVER['HTTP_X_REQUESTED_WITH'];
}elseif($_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){
	echo 'ФОрма не отработала';
}else{
	header("Location: ".$comeback);
	//ech($_POST);
	//echo $comeback;
	//ech($proc->chpu_par['address']);
	//ech($_SESSION);
	//ech(json_encode($_SESSION['sys_tmp']['formresult']));
	//ech(json_decode($form->formdata['CURL']));
	//$res = $form->formxml($form->formdata['POST']);
	//ech($res);
	//ech($form->formdata['POST']);
}

//ech($form->formvars);
//ech($form->formdata);
//ech($_FILES);

//ech($_SESSION);



//echo '<br />okform: '.$form->ok_form.'<br />ok?';
//echo 'ref: '.$_SERVER['HTTP_REFERER'].'<br />';

$iss = strpos($form->formdata['POST']['timefin'], 'DATE_ADD');

//echo '<br />'.$_POST['timefin'].'	'.isset($iss);
//ech($_SESSION);

//ech($form->formdata['POST']);
//echo $form->proc->cur_label;
//echo 'ID: '.$idd;

unset($proc->source);
?>