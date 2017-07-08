<?
//session_start();
//include "/include/inc_includes.php";

	  ob_start();
	  
	  if(!$cont1){
		  if($url_need){
			  include $url_need;
		  }
		  $scrip_need='echo chr(230);';
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
	  //echo 'фывапрол '.iconv('utf8', 'win1251', $cont1);
	  echo 'фывапрол '.$cont1;

?>