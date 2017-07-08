<?
session_start();

include "include/inc_includes.php";

$sqlite = new sqlite();
$mysql = new mysql();
//$mysqli = new mysqli();
$proc = new process($mysql, $sqlite);
$form = new form($proc);
$xml = new xml();
$tree = new tree();

//ech($_SESSION);

//ech($proc->tabdata["sys_urls"]);
//ech($proc->chpu);

//$data = new data($mysql);
//$urls = new url($data);
//ech($_SESSION['sys_tmp']);
include "include/inc_defaults.php";
include "include/inc_cookies.php"; // перенесено сюда из mod_includes.php, так как требует инициализации сласса connectiion.
$def_pattern = '/\[>([a-zA-Z0-9_\-]*)<\]/';
if($_SESSION['uid']){
	$proc->mod['filter'] = 'row_id = "'.$_SESSION['uid'].'"';
	$proc->mod['limit'] = 1;
	$proc->mod['index'] = 1;
	$proc->fetch('sys_users');
	$userparam = $proc->tabdata['sys_users'][0];
	//ech($userparam);
	$proc->mod['index'] = 1;
	$proc->mod['filter'] = 'user_id = "'.$_SESSION['user_id'].'"';
	$proc->mod['order'] = 'acl_datetime DESC';
	$proc->fetch('sys_acc_cli');
	//$_SESSION['test'] = $this->proc->tabdata['sys_acc_cli'][0];
	//unset($proc->mod);
	$_SESSION['access_granted']=$proc->tabdata['sys_acc_cli'][0]['granted'];
	$_SESSION['rank']=$proc->tabdata['sys_acc_cli'][0]['acclabs'];
	

	$proc->fetch('sys_accrank');
							
	if($_SESSION['access_granted']>0){
		$_SESSION['rankrus']=$proc->tabdata['sys_accrank'][$_SESSION['rank']]['accname'];
	}else{
		$_SESSION['rankrus']='<strike>'.$proc->tabdata['sys_accrank'][$_SESSION['rank']]['accname'].'</strike>';
	}
	
}


//ech($proc->sys['label']);

$proc->mod['filter'] = 'chpulab =  "'.$proc->sys['label'].'"';
//$proc->mod['index'] = 1;
$proc->fetch('sys_temps');
$temps = $proc->tabdata['sys_temps'];
/*
$proc->fetch('sys_iniset');
foreach($proc->tabdata['sys_iniset'] as $key => $value){
	ini_set($proc->tabdata['sys_iniset'][$key]['parameter'], $proc->tabdata['sys_iniset'][$key]['value']);
}
*/

//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 1); 

//$url_old=get_url();
$url = $proc->sys['url'];
//ech($proc->sys['label']);
$proc->mod['filter']='val = "" or val IS NULL or val="'.$proc->label.'"';
//$proc->fetch('sys_forms');
//unset($proc->mod['filter']);


//ech($proc->sys);
//Перенесено из data_post.php
//formdata пренесено в cls_form

//$form->formdata['all'] = array_merge((array)$_POST, (array)$_GET, (array)$_SESSION['formdata']);
//ech($_SESSION);
if($_SESSION['logged']>0){
	$loginout = $proc->tabdata['sys_forms']['logout']['forms'];
}else{
	$loginout = $proc->tabdata['sys_forms']['loging']['forms'];
}


//echo $proc->tabdata['sys_forms']['login']['forms'];
/*
$proc->mod['filter']="val='".$proc->label."'";
$proc->fetch('sys_forms');
unset($proc->mod['filter']);
*/

if($proc->sys['label']){
	$fil01 = 'label="'.$proc->sys['label'].'" OR ';
}

$proc->mod['filter'] = $fil01.'url="'.$proc->sys['url']['full'].'"';
//echo $proc->mod['filter'];
$proc->mod['limit'] = 1;
$proc->mod['index'] = 1;
$proc->fetch("sys_redirect");

if($proc->tab['sys_redirect']['qty']>0){
	$new_url="Location: /".make_url($proc->tabdata["sys_redirect"][0]["location"]);

	header("HTTP/1.1 301 Moved Permanently");
	header($new_url);
}else{ //end of else is in the end of the page


//ech($proc->sys);
//echo strlen($a).' >>>>>>>> ';//.$a;
if($proc->chpu[0]["header"]){
	$img_header = mb_strpos($proc->chpu["header"], 'image');
	/*
	if(mb_detect_encoding($a, 'UTF-8', TRUE)){
		$img_header = FALSE;
	}else{
		$img_header = TRUE;
	}
	*/
	//$img_header =  mb_detect_encoding(0, 'UTF-8', TRUE);
	//echo $img_header.'<>';
	$headers = $proc->chpu["header"];
	if(strpos($headers, chr(10))){
		$headers = explode(chr(10), $headers);
		foreach($headers as $key => $value){
			//echo 'key: '.$key.' val: '.$value;
			header($value);
		}
	}else{
		//echo $headers;
		header($headers);
	}
}

$cont = new mcontent($proc);

	$proc->post['qty']=0;


$proc->mod['filter']='val="0"';
$proc->fetch('sys_content');


$arr_col = array_colum($proc->tabdata['sys_content'], 'content');
if(is_array($cont->replace)){
	$cont->replace = array_merge($arr_col, $cont->replace);
}else{
	$cont->replace = $arr_col;
}
//ech($proc->tabdata["sys_urls"]);

//Если адресная строка есть в БД?? 
//if($proc->chpu["template"]){ 
if($proc->label){ 
//echo 'Если адресная строка есть в БД<br />';
//ech($proc->chpu);
//echo $proc->url_label;
	
	$ind = $proc->url_label;
	$cont->replace['title'] = $proc->chpu['title'];
	$cont->replace['keywords'] = $proc->chpu['keywords'];
	$cont->replace['description'] = $proc->chpu['description'];
	$cont->replace['h1'] = $proc->chpu['h1'];
	$comfield = $proc->chpu['comments']; //ech($proc->chpu);//echo $comfield.'++++++++<br />';
	$comlab = $proc->label;
	
	//ech($cont->replace);
	switch($proc->chpu["noindex"]){
		case '0':
		//echo 'NOINDEX 000';
		$cont->replace['noindex']='';
		break;
		
		case '1':
		//echo 'NOINDEX 001';
		$cont->replace['noindex']='<meta name="robots" content="noindex, nofollow"/>';
		break;
	}

	//echo $template;
	$proc->mod['filter']='val="'.$proc->chpu["label"].'" OR val = "0"';
	$proc->fetch('sys_content');
	/*
	$proc->arr_in = $proc->tabdata['sys_content'];
	$proc->arr_lab = 'content';
	$proc->rearray();
	*/
	$arr_col = array_colum($proc->tabdata['sys_content'], 'content');
	//ech($cont->replace);
	$cont->replace = array_merge($arr_col, $cont->replace);
	
	
	// Все элементы POST вносятся в массив контента с удалением тегов

	
	//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	//Прцедура access + obj перенесена вниз Z2++
	//Прцедура access + obj Z2++
	//тут было заполнение контента; перенёс в конец Z1++
	//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	
	/*
	if($proc->tabdata["sys_urls"][0]["noindex"]==2){
		$meta_noname='<meta name="robots" content="noindex, nofollow"/>
';
	unset($meta_noname);
	}
	*/
	$tmp_repl = $cont->replace;
	unset($cont->replace);	
	
}else{
	
	//это если адресной строки нет в базе даннных
	//echo 'это если адресной строки нет в базе даннных';
	//ech($cont->replace);
	$proc->mod['filter'] = 'level = "'.($proc->sys['url']['qty']).'" or level=0 or level is null';
	//$proc->mod['limit'] = 1;
	$proc->mod['index'] = 1;
	$proc->fetch('sys_catalog');
	
	for($k=0; $k<$proc->tab['sys_catalog']['qty']; $k++){
		$sys_label = $proc->tabdata['sys_catalog'][$k]['label'];
		$proc->mod['filter'] = 'label = "'.$sys_label.'"';
		$sys_tab = $proc->tabdata['sys_catalog'][$k]['tab'];	
	
		$proc->mod['limit'] = 1;
		$proc->mod['index'] = 1;
		$proc->fetch('sys_urls');
		$ind = 0;
		//echo $proc->tab['sys_catalog']['qty']; 
		
		if(isset($proc->tabdata['sys_catalog'][$k]['req'])){ //если есть запрос
			//$cont = new content();
			$cont->pattern = "/\[([0-9]+)\]/";
			$cont->str = $proc->tabdata['sys_catalog'][$k]['req'];
			$replace_tmp = $cont->replace;
			$cont->replace = $proc->sys['url']['list']; $proc->debug = 'index: 247';
			$req = $cont->do_content($cont->pattern, $cont->replace, $cont->restr($cont->replace, $cont->str));
			$cont->replace = $replace_tmp;
			//echo $req;
			if(isset($req)){
				$proc->request = $req;
				$proc->mod['limit'] = 1;
				$proc->mod['index'] = 1;
				$proc->fetch($sys_tab);
				if($proc->tab[$sys_tab]['qty']>0){
					$suc = TRUE;
					$row_label=$k;
					break;
				}
			}
		}elseif(isset($proc->tabdata['sys_catalog'][$k]['mask'])){ // если есть маска
			$sys_mask = $proc->tabdata['sys_catalog'][$k]['mask'];
			$sys_mask = explode('/', ('/'.$sys_mask));
			$num_mask = count($sys_mask)-1;
			$j=0;
			unset($cat_filter);
			if($num_mask>0){
				for($i=1;$i<=$num_mask;$i++){
					//echo '<br />'.$i.'+++++<br />';
					if($sys_mask[$i]!=''){
						$j++;
						//echo $i.'	'.$sys_mask[$i].'<br />';
						$unit_filter[$j]=$sys_mask[$i].'="'.$proc->sys['url']['list'][$i-1].'"';
					}
				}
			}
			
			$cat_filter = implode(' and ', $unit_filter);
			//echo $cat_filter;
			//ech($proc->tabdata['sys_catalog']);
			//echo 'Подгрузка из каталога';
			$proc->mod['filter'] = $cat_filter;
			$proc->mod['index'] = 1;
			$proc->mod['limit'] = 1;
			$proc->fetch($sys_tab);
			
			if($proc->tab[$sys_tab]['qty']>0){
				//echo $proc->tabdata[$sys_tab];
				$suc = TRUE;
				$row_label=$k;
				break;
			}
			
		$tmp_repl = $cont->replace;
		unset($cont->replace);	
		//ech($cont->replace);
		}
	}
	if(!$suc){
		$err = '404';
	}

}

	
//!!!!!!!!!!!!!!!!!!!!!!!!!! Z1++
//начало перенесённого блока 
//!!!!!!!!!!!!!!!!!!!!!!!!!!

//ech($cont->replace);

//echo '<br />++++++++++++<br />'.$proc->sys['url']['qty'];
//Подгрузка данных второого (или больше) уровня (ВМЕСТО РЕЗУЛЬТАТОВ ИСПОЛНЕНИЯ СКРИПТА)
if($proc->sys['url']['qty']>1 and $proc->sys['label']){
	//echo '<br />address extention (вики или скрипт-эдитор)';
	
	$proc->mod['filter']='label="'.$proc->sys['label'].'" and level="'.($proc->sys['url']['qty']-$proc->url_lvl).'"';
	//echo $proc->mod['filter'];
	$proc->mod['limit'] = 1;
	$proc->mod['index'] = 1;
	$proc->fetch('sys_joincont');
	//ech($proc->tabdata['sys_joincont']);
	//ech($proc->sys['url']);
	//ech($proc->tabdata['sys_joincont'][0]['level']);
	if($proc->tab['sys_joincont']['qty']>0){
		$proc->mod['filter']=$proc->tabdata['sys_joincont'][0]['joinfield'].'="'.$proc->sys['url']['list'][$proc->url_lvl+$proc->tabdata['sys_joincont'][0]['level']-1].'"';
		//echo $proc->url_lvl.'>>>>'.$proc->tabdata['sys_joincont'][0]['level'].'>>>'.$proc->mod['filter'].'	'.$proc->tabdata['sys_joincont'][0]['tab'];
		$proc->mod['index'] = 1;
		$proc->mod['limit'] = 1;
		$jointab = $proc->tabdata['sys_joincont'][0]['tab'];
		$proc->fetch($jointab);
		if($proc->tab[$proc->tabdata['sys_joincont'][0]['tab']]['qty']>0) {
			
			$contfield = $proc->tabdata['sys_joincont'][0]['contfield']; 
			$titlefield = $proc->tabdata['sys_joincont'][0]['titlefield'];
			$keyfield = $proc->tabdata['sys_joincont'][0]['keyfield'];
			$descfield = $proc->tabdata['sys_joincont'][0]['descfield'];
			//ech($proc->tabdata['sys_joincont']);
			
			$cont1 = $proc->tabdata[$jointab][0][$contfield];
			
			if($proc->tabdata[$jointab][0][$titlefield]){
				$title = $proc->tabdata[$jointab][0][$titlefield];
			}
			if($proc->tabdata[$jointab][0][$keyfield]){
				$kewords = $proc->tabdata[$jointab][0][$keyfield];
			}
			if($proc->tabdata[$jointab][0][$descfield]){
				$description = $proc->tabdata[$jointab][0][$descfield];
			}

			//ech($proc->tabdata[$proc->tabdata['sys_joincont'][0]['tab']]);
			//ech($proc->tabdata['sys_content']);
			//echo $cont;
		}
	}
	
	
}elseif(!$proc->sys['label'] and !$err){
//echo 'нет метки - присоединённый контент (каталог)';
//ech($proc->sys);
	$contfield = $proc->tabdata['sys_catalog'][$row_label]['contfield']; 
	$titlefield = $proc->tabdata['sys_catalog'][$row_label]['titlefield'];
	$keyfield = $proc->tabdata['sys_catalog'][$row_label]['keyfield'];
	$descfield = $proc->tabdata['sys_catalog'][$row_label]['descfield'];
	$h1field = $proc->tabdata['sys_catalog'][$row_label]['h1field'];
	$phpcode = $proc->tabdata['sys_catalog'][$row_label]['phpcode'];
	$comfield = $proc->tabdata['sys_catalog'][$row_label]['comments'];
	$comlab = $proc->tabdata['sys_catalog'][$row_label]['label'];
	/*
	if($proc->tabdata['sys_catalog'][$row_label]['phpcode']){
		eval($proc->tabdata['sys_catalog'][$row_label]['phpcode']);
	}
	*/
	$cont1 = $proc->tabdata[$sys_tab][0][$contfield];
	$cont->replace['title']= $proc->tabdata[$sys_tab][0][$titlefield];//echo $proc->tabdata[$sys_tab][0][$contfield];
	$cont->replace['keywords']= $proc->tabdata[$sys_tab][0][$keyfield];
	$cont->replace['description']= $proc->tabdata[$sys_tab][0][$descfield];
	$cont->replace['h1']= $proc->tabdata[$sys_tab][0][$h1field];
	
	$tmp_repl = $cont->replace;
	unset($cont->replace);	
	  
}elseif($err=='404'){ //ERROR  404
	header("HTTP/1.0 404 Not Found");
	//echo '404';
	$cont->replace['title'] = 'нет такой страницы';
	$cont->replace['kewords'] = 'нет такой страницы';
	$cont->replace['description'] = 'нет такой страницы';
	$cont->replace['noindex'] = '<meta name="robots" content="noindex, nofollow"/>';
	
	$cont1 = '<div align="center"><br />'.$proc->req_uri.'<br />404<br />нет такой страницы</div>';
	$title= 'нет такой страницы';
	$kewords= 'нет такой страницы';
	$description= 'нет такой страницы';
	$noindex='<meta name="robots" content="noindex, nofollow"/>';
	
	$tmp_repl = $cont->replace;
	unset($cont->replace);	
	
}
$proc->mod['filter'] = 'temptype="alert" AND label="'.$_SESSION['sys_tmp']['message_class'].'"';
$proc->mod['index'] = 1;
$proc->mod['limit'] = 1;
$proc->fetch('sys_temps');
$tplmsg = $proc->tabdata['sys_temps'][0]['temp'];

/*
if($_SESSION['sys_tmp']['message']){
	//echo 'mess: '.$_SESSION['sys_tmp']['message'].' class: '.$_SESSION['sys_tmp']['message_class'];
	$msg1 = $cont->load_cont(array('message'=>$_SESSION['sys_tmp']['message']), $_SESSION['sys_tmp']['message_class'], 'alert');
}else{
	$msg1 = ''; 
	//echo '<br />ZERO<br />';
}
*/

//ech($proc->tabdata['sys_temps'][0]['temp']);
/*
if($_SESSION['sys_tmp']['message'] and $_SESSION['ok_form']){
	//<div align="center" class="messcont">
	$msg1 = '<div align="center" class="alert alert-success messbox"><a class="close" data-dismiss="alert" href="#">&times;</a><p><b>'.$_SESSION['sys_tmp']['message'].'</b></p></div>';
	  //echo '<br />NORMAL<br />';
}elseif($_SESSION['sys_tmp']['message']){
	$msg1 = '<div align="center" class="alert alert-danger messbox"><a class="close" data-dismiss="alert" href="#">&times;</a><p><b>'.$_SESSION['sys_tmp']['message'].'</b></p></div>';
	//echo '<br />ALERT<br />';
}else{
	$msg1 = ''; 
	//echo '<br />ZERO<br />';
}
*/

//$_SESSION['sys_tmp']['message'] = $p1;
//$proc->tabdata['sys_content']['message']['content'] = $p1;

//ech($proc->tabdata["sys_urls"]);

$url_need = $proc->chpu["phpfile"];
$tmp_need =$proc->chpu["template"];
$scrip_name = $proc->chpu["scrip"];
$url_level = $proc->chpu["level"];
$accfield = $proc->chpu["access"];
$comfield = $proc->chpu["comments"];


//!!!!!!!!!!!!!!!!!!!
// comments load block were here
//!!!!!!!!!!!!!!!!!!!


$proc->mod['filter']='label="'.$scrip_name.'"';
$proc->mod['limit'] = 1;
$proc->fetch('sys_scripts');
//$scrip_need = html_entity_decode($proc->tabdata['sys_scripts'][$scrip_name]['scrip']);
$scrip_need = $proc->tabdata['sys_scripts'][$scrip_name]['scrip'];
$scrip_type = $proc->tabdata['sys_scripts'][$scrip_name]["scriptype"];
//ech($proc->tabdata['sys_scripts']);
$proc->mod['filter']='label="'.$tmp_need.'" and temptype="page"';
$proc->fetch('sys_temps');
//$proc->mod['filter']='val="'.$proc->tabdata["sys_urls"][0]["label"].'" OR val = "0"';
//$proc->fetch('sys_content');
unset($proc->mod['filter']);
$template=$proc->tabdata["sys_temps"][$tmp_need]["temp"];
$is_subtemp = preg_match($cont->subtemp, $template);
if($is_subtemp){
	$proc->mod['filter']='temptype!="page"';
	$proc->fetch('sys_temps');
	$subtemps=$proc->tabdata["sys_temps"];
	//ech($subtemps);
}
$activeclass=$proc->tabdata["sys_temps"][$tmp_need]["activeclass"];

if($accfield>1){
	$proc->mod['filter']='acclab="'.$_SESSION['rank'].'"';
	//echo $proc->mod['filter'].'<br />';
	$proc->fetch('sys_acclabels');
	if($proc->tabdata['sys_acclabels'][$proc->label]['chpulab'] and $_SESSION['access_granted']>0){
		$access = TRUE;
	}else{
		$access = FALSE;
	}
}elseif($accfield==1){
	if($_SESSION['logged']>0){
		$access = TRUE;
	}else{
		$access = FALSE;
		$_SESSION['sys_tmp']['message'] = 'Раздел доступен только для зарегистрированных пользователей.';
		$_SESSION['sys_tmp']['message_class'] = 'bootinfo';
	}
}else{
	$access = TRUE;
}

//ech($_SESSION['test']);
if($_SESSION['rank']==admname and $_SESSION['access_granted']>0){
	$access = TRUE;
}


if($_SESSION['sys_tmp']['message']){
	//echo 'mess: '.$_SESSION['sys_tmp']['message'].' class: '.$_SESSION['sys_tmp']['message_class'];
	//$cont->test = '$_SESSION[sys_tmp]';
	$msg1 = $cont->load_cont(array('message'=>$_SESSION['sys_tmp']['message']), $_SESSION['sys_tmp']['message_class'], 'alert');
}else{
	$msg1 = ''; 
	//echo '<br />ZERO<br />';
}

//ech($proc->sys);
/*
$commentform='<form action="[{post}]" method="post" class="comments">
<input name="author" type="hidden" value="[>user_id<]"> 
<input name="parent_id" type="hidden" value="[>parent_id<]">
<input name="param" type="hidden" value="[>param<]">
<input name="upic" type="hidden" value="[>upic<]">
<input name="test" type="text" value="[<test>]"><br />
<textarea name="comment" rows="4" cols="60">[<comment>]</textarea><br />
<input name="putcom" type="submit" value="Готово" class="btn btn-info"/></form>';
*/
//$tmp_repl['comments'] = $commentform;


//$tmp_repl['comments'] = $comments_all;
//$tmp_repl['selectupic'] = $opts;
// перенесено после ob_get_clean



//default userpick

$proc->mod['index'] = 1;
$proc->mod['filter'] = 'user_id = "0" or user_id IS NULL';
$proc->fetch('sys_userpics');
$def_upic = $proc->tabdata['sys_userpics'][0];
unset($proc->tabdata['sys_userpics']);

//ech($def_upic);

if($access){
	  ob_start();
	  
	  if(!$cont1){
		  if($url_need){
			  include $url_need;
		  }
		  if($scrip_need){
			//echo '<br />SCRIP '.$scrip_need;
			//echo '<br />SCRIPtype '.$scrip_type;

			switch($scrip_type){
				case 'php':
				eval($scrip_need);  
				break;
				
				case 'html':
				echo $scrip_need;  
				//echo ord($scrip_need);
				break;					
			}
		  }
	  }else{
		  echo $cont1;
	  }
	  
	  if($phpcode){
		  eval($phpcode);
	  }

	  $cont1 = ob_get_clean();
	  
	  //$cont1.='<br />++<br />[>commentform<]';

}elseif($proc->label!='main'){
	$is_redirect = TRUE;
	//header("Location: ".def_url);
	header("Location: /");
}

//!!!!!!!!!!!!!!!!!!!
//comments load block
//!!!!!!!!!!!!!!!!!!!


if($comfield>0){
	if($comfield>1){
		//echo $comfield.'---<br />';
		$comment_param = $proc->sys['url']['list'][$comfield-1];
		$filtercom = ' AND c.params="'.$comment_param.'"';
	}else{
		$filtercom = '';
	}
	//ech($proc->sys['config']['twiggy']);
	$proc->request = 'SELECT 
	c.row_id, c.cur_label, c.parent_id, c.params, c.author, c.upic AS userpic, c.status, c.comment AS commentext, c.headmes, c.datetime AS mesdate,
	p.row_id AS pic_id, p.user_id, p.label AS piclab, p.url AS upic,
	u.row_id AS user, u.login AS userinfo, u.login AS username, u.nick, u.surname, u.firstname, u.datetime, u.company
	FROM sys_comments c LEFT JOIN sys_userpics p ON p.row_id = c.upic LEFT JOIN sys_users u ON c.author = u.row_id WHERE c.cur_label = "'.$comlab.'"'.$filtercom;
	
	//ech($proc->request);
	//if($proc->sys['config']['twiggy']){
	$proc->mod['parent']="parent_id->row_id";
	//}
	//echo $proc->request;
	$proc->fetch('sys_comments');
	$comments = $proc->tabdata['sys_comments'];
	//ech($comments);
	$com_lvls = $proc->tablevel['sys_comments'];
	//ech($com_lvls);
	$proc->request = 'SELECT c.author, COUNT(c.author) AS mesqty FROM sys_comments c GROUP BY c.author';
	$proc->mod['index'] = 1;
	$proc->fetch('sys_comments');
	$mesqty = $proc->tabdata['sys_comments'];
	if(is_array($mesqty)){
	foreach($mesqty as $key=> $val){
		$ind = $val['author'];
		$mesqty[$ind] = $val['mesqty'];
		unset($mesqty[$key]);
	}
	}
	//ech($mesqty);
	
	$proc->mod['filter']='temptype="comment" and label="main"';
	$proc->mod['index'] = 1;
	$proc->mod['limit'] = 1;
	$proc->fetch('sys_temps');
	
	$proc->mod['index'] = 1;
	$proc->mod['filter'] = 'user_id = "'.$_SESSION['user_id'].'"';
	$proc->fetch('sys_userpics');
	unset($opts);
	// Доделать!!
	for($i=0; $i<$proc->tab['sys_userpics']['qty']; $i++){
		$opts.='<option value="'.$proc->tabdata['sys_userpics'][$i]['row_id'].'">'.$proc->tabdata['sys_userpics'][$i]['label'].'</option>';
	}
	
	$comentmaxlevel = $proc->sys['config']['commentmaxlevel']['val'];
	//ech($commaxlevel);
	$comtemp = $proc->tabdata['sys_temps'][0]['temp'];
	unset($cont->replace);
	//ech($proc->sys['config']['twiggy']['val']);
	if(!$proc->sys['config']['twiggy']['val'] and is_array($com_lvls)){
		ksort($com_lvls);
	}
	//ech($com_lvls);
	if(is_array($com_lvls)){
		foreach($com_lvls as $key=>$value){
			$cont->pattern = '/\[>([a-zA-Z0-9_\-]*)<\]/';
			$cont->str = $comtemp;
			//echo '<br />*** '.$comtemp;
			if(!$comments[$key]['upic']){
				$comments[$key]['upic'] = $def_upic['url'];
			}
			$comments[$key]['mesqty'] = $mesqty[$comments[$key]['author']];
			$cont->replace = $comments[$key];
			if($value>$comentmaxlevel){
				$cont->replace['lvl'] = $comentmaxlevel;
			}else{
				$cont->replace['lvl'] = $value;
			}
			//ech($cont->replace['commentext']);
			//echo strpos($cont->replace['commentext'], chr(10)).' ++<br />';
			$cont->replace['mesdate'] = substr($cont->replace['mesdate'], 0, 10);
			$cont->replace['commentext'] = str_replace(chr(10), '</p><p>', $cont->replace['commentext']);
			$cont->replace['commentext'] = '<p>'.$cont->replace['commentext'].'<p>';
			$cont->replace['curtopic'] = $cont->que['curtopic'];
			
			$cont->replace['id'] = $key; $proc->debug = 'index: 665';
			//ech($cont->restr());
			$nextcom = $cont->do_content($cont->pattern, $cont->replace, $cont->restr($cont->replace, $cont->str));
			//echo '<br />++++ '; ech($cont->replace);
			$comments_all.= $nextcom;
		}
	}
	$comments_all.= $form->forms['putcom'];
	//echo $proc->keymark;
	//ech($proc->tabdata['sys_comments']);
	//foreach ($proc->tabdata['comments'] as $key=>$value){
	/*
	foreach ($proc->tablevel['comments'] as $key=>$value){
		$comments[$key][]
	}
	*/
}


$tmp_repl['comments'] = $comments_all;
$cont->marker = 'active';
//$cont->debug = 1;
$cont->test = 'index';
//$cont->debug = 1;
$tmp_repl['pagination'] = '<ul class="pagination">'.$cont->load_cont($cont->proc->paginator['list'], $cont->proc->config['paginator']).'</ul>';
unset($cont->test);
//unset($cont->debug);
//echo htmlspecialchars($tmp_repl['pagination']);
$tmp_repl['selectupic'] = $opts;

//$utf8 =  mb_detect_encoding($cont1, 'CP-1251', TRUE);
//echo $utf8.' >>>>>>>'.$cont1;

//echo $loginout;
//ech($cont->que);
$tmp_repl['loginout'] = $loginout;
$tmp_repl['username'] = $_SESSION['username'];
$tmp_repl['rankrus'] = $_SESSION['rankrus'];
$tmp_repl['user_id'] = $_SESSION['user_id'];
if(is_array($cont->que)){
	$tmp_repl = array_merge($tmp_repl, $cont->que);
}
//ech($tmp_repl);

//ech($tmp_repl);
//include 'include/inc_loginrev.php';

//$cont->income = $cont1;

$cont1 = $cont->make_content($cont1);
//$cont1 = $cont->income;
//echo $cont1;

$cont->pattern = '/\[>([a-zA-Z0-9_\-]*)<\]/';
$cont->str = $cont1;
/*
$proc->arr_in = $proc->tabdata['sys_content'];
$proc->arr_lab = 'content';
$proc->rearray();
*/
$arr_col = array_colum($proc->tabdata['sys_content'], 'content');
$arr_col['params'] = $comment_param;

//ech($arr_col);
//$proc->arr_out['commentform'] = $commentform;
//$cont->replace = array_merge($cont->replace, $proc->arr_out);

$cont->replace = array_merge($tmp_repl, $arr_col);

//echo $cont1;
//$cont->lab = 1;

$proc->debug = 'index: 739';
//!!!!!!!!!!!!!
$cont->replace[content] = $cont->do_content($cont->pattern, $cont->replace, $cont->restr($cont->replace, $cont->str));
$tmp_repl = $cont->replace; unset($cont->replace);
//!!!!!!!!!!!!!!!

//echo $cont->replace[content]; //IMG выводится норм.
//include 'include/inc_loginrev.php';

$cont->str = $template; 
//echo htmlspecialchars($cont->str);

//$cont->replace = $cont->do_subtemp();
//$cont->pattern = $cont->subtemp; $proc->debug = 'index: 750';
//$cont->str = $cont->do_content($cont->pattern, $cont->replace, $cont->restr($cont->replace, $cont->str));
//ech($cont->subtemp);
//$cont->str = $cont->res_subtemp($cont->subtemp, $cont->replace, $cont->str);
//$cont->str = $cont->res_subtemp($cont->subtemp, $cont->replace, $template);
$cont->str = $cont->res_subtemp($cont->subtemp, $template);


$rplc = $tmp_repl;
unset($cont->pattern); // чтобы выбрался шаблон по умолчанию
//ech($subtemps);
//ech($template);
//$cont->lab=1;
//$cont->sub=1; 
$proc->debug = 'index: 757';
$do_res0 = $cont->do_content($cont->pattern, $rplc, $cont->restr($rplc, $cont->str));


$do_res0 = str_replace('</body>', ($msg1.'</body>'), $do_res0);

// повторное заполнение контента для замены контентных меток в уже сформированной странице с контентом
$rplc['rankrus'] = $_SESSION['rankrus'];
$rplc['username'] = $_SESSION['username'];
$cont->str =$do_res0; $proc->debug = 'index: 766';
$do_res0 = $cont->do_content($cont->pattern, $rplc, $cont->restr($cont->replace, $cont->str));	

//echo $do_res0;
//$replact[$proc->label] = $proc->sys['config']['menuactive']['val'];
//echo $activeclass;
$replact[$proc->label] = $activeclass;
//$cont->replace = $replact;
//ech($replact);
$cont->pattern = '/\[#([a-zA-Z0-9_\-]+)#\]/'; $proc->debug = 'index: 775';
$do_res1 = $cont->do_content('/\[#([a-zA-Z0-9_\-]+)#\]/', $replact, $do_res0);	

$proc->debug = 'index: 780';//ech($def_pattern);
$res = $cont->do_content($def_pattern, $replact, $do_res1);	
//echo '+++++++++++'.$res.'+++++++++++';
//ech($_SESSION);
//$cont->income = $res;
$res = $cont->make_content($res);
//echo $cont->income;
//$res = $cont->income;

//$proc->lab=1;

if(!$img_header){
	if(mb_detect_encoding($res, 'UTF-8', TRUE)){
		$encod = TRUE;
	}
}

if($encod){
	$res = $proc->fill_url($res); 
}
//echo $res;

$ckeditor = '<script type="text/javascript">
	CKEDITOR.replace( \'textcomment\',
    {
		filebrowserBrowseUrl : \'/ckbrowse/\',
		filebrowserImageBrowseUrl : \'/ckbrowse/?type=Images\',
        filebrowserUploadUrl : \'/ckupload/\',
        filebrowserImageUploadUrl : \'/ckupload/?type=Images\'

    });
</script>';

//$res = str_replace('</body>', ($proc->label.$msg1.'</body>'), $res);
//$res = str_replace('</body>', ($msg1.'</body>'), $res);

//$res = str_replace('</body>', ($ckeditor.'</body>'), $res);

echo $res;
//echo '++++++++++';
//ech ($proc->tabdata['sys_content']['message']);
//ech($proc->sys);

$exceptlab = explode(' ', droplabels);
$exceptlab = array_flip($exceptlab);
	
if(!$exceptlab[$proc->sys['label']] and !$is_redirect){
	dropsess(droplist);
}

//!!!!!!!!!!!!!!!!!!!!!!!!!!
//конец перенесённого блока
//!!!!!!!!!!!!!!!!!!!!!!!!!

} //END of else of the REDIRECT
//ech($proc->db->keyfield);
//ech($proc->keyfield);
//ech($proc->sys);
$proc->db->close();
//dropsess(droplist);
//echo 'label: '.$proc->label;
//ech($proc);

?>