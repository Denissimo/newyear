<?
function get_url(){
	
	$full_url=parse_url($proc->req_uri);
	$folder["len"]=strlen($full_url['path']);
	
	$par=parse_url($_SERVER['HTTP_REFERER']);
	$folder["ref"]=$par["path"];
	if($par["path"] and $_SERVER['HTTP_HOST']==$par["host"]){
		$folder["back"]='<a href="'.$par["path"].'"><b>Назад</b></a>';
	}
	$end_url5=$full_url['path'][$folder["len"]-5].$full_url['path'][$folder["len"]-4].$full_url['path'][$folder["len"]-3].$full_url['path'][$folder["len"]-2].$full_url['path'][$folder["len"]-1];

//	echo $end_url5."<br />";
	/*
	if($full_url['path'][$folder["len"]-1]!="/" and $end_url5!=".html"){
		$despaced=$full_url['path']."/";
		header("HTTP/1.1 301 Moved Permanently");
		$new_url="Location: $despaced";
		header($new_url);
	}
	*/

	if(strpos($full_url['path'],"%20")){
		$despaced=str_replace("%20", "_", $full_url);
		header("HTTP/1.1 301 Moved Permanently");
		$new_url="Location: $despaced";
		header($new_url);
	}

	
	$fpar=parse_url($proc->req_uri);
	$uri=explode("/", $full_url['path']) ;
	$i=1;
	$folder["full"]=str_replace("_", " ", urldecode($uri[1]));
	while ($uri[$i]){
		$folder[$i]=str_replace("_", " ", urldecode($uri[$i]));
		if($i>1){
			$folder["full"].="/".$folder[$i];
		}
		$i++;
	}
	$folder["qty"]=$i;
	return $folder;	
}
	//echo "<br />".$full_url;
	//echo "<br />".$url["len"];
	//echo "<br />".$full_url[$url["len"]-1];

function make_url($addr){
	$url=urlencode(str_replace(" ", "_", $addr));
	$url = str_replace("%2F", "/", $url);
	return($url);	
}

function ref_url(){
	$m_req_ref=$_SERVER['HTTP_REFERER'];
	$m_par_ref=parse_url($m_req_ref);
	$m_final_ref['scheme']=$m_par_ref['scheme'];
	$m_final_ref['host']=$m_par_ref['host'];
	$m_final_ref['path']=$m_par_ref['path'];
	$m_clean_ref=preg_replace('/\/*/', '', $m_par_ref['path']); //удаление слешей
	$m_decod_ref= urldecode($m_clean_ref);
	$m_final_ref['fin']=str_replace('_', ' ', $m_decod_ref); //удаление нижней черты
	
	
	return $m_final_ref;
}
?>