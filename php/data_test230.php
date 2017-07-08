<?
/*
define("my_host", "localhost");
define("my_user", "root");
define("my_password", "");
define("my_db", "promo");

include '/classes/cls_mysql.php';
include '/classes/cls_process.php';
$mysql  = new mysql();
$pro = new process($mysql);


$pro->mod['index'] = 1;
$pro->mod['filter'] = 'label="phpinfo"';
$pro->fetch('sys_scripts');

$scrip_need = $pro->tabdata['sys_scripts'][0]['scrip'];

echo '<pre>';
print_r($scrip_need);
echo '</pre>';
*/
	  ob_start();
	  
	  if(!$cont1){
		  //echo '"';
		  if($url_need){
			  include $url_need;
		  }
		  $scrip_need='echo chr(231);';
		  if($scrip_need){
			//echo '<br />SCRIP '.$scrip_need;
			//echo '<br />SCRIPtype '.$scrip_type;
			
			$scrip_type = 'php';
			
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
	  //$cont1 = 'фывапрол '.$cont1;
	  //$cont2 =  iconv("CP1251", "utf-8", $cont1);
	  $asd = array(
	  "q" => chr(230), 
	  "w" => chr(231),
	  "e" => chr(232)
	  );
	  print_r($asd);
	  $qwe = mb_detect_encoding($asd);
	  print_r($qwe);
	  echo mb_detect_encoding($cont1);
	  echo '<br />';
	  $cont2 =  mb_convert_encoding($cont1, "utf-8", "CP1251");
	  echo $cont2;
	  



?>