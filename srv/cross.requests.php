<?php
	session_start();
	ob_start();
	function curl($url,$data){
		$resp="";
		try{
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HEADER, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
			curl_setopt($ch, CURLOPT_POST,true);
			/*
			curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL,true);
			curl_setopt($ch, CURLOPT_PROXY,"10.0.1.46");
			curl_setopt($ch, CURLOPT_PROXYPORT,8080);
			curl_setopt($ch, CURLOPT_PROXYTYPE,CURLPROXY_HTTP);
			*/
			curl_setopt($ch, CURLOPT_USERAGENT,"Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.103 Safari/537.36"); 
			curl_setopt($ch, CURLOPT_REFERER,"http://localhost:8080/2twallet/auth.html"); 
			curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
			$resp = curl_exec($ch);
			curl_close($ch);
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
        return $resp;
    }
	$_internalParams=array("url","session");
	$_result="";
	if(isset($_REQUEST["url"])){
		$url = $_REQUEST["url"];
		$session = isset($_REQUEST["session"])?$_REQUEST["session"]:"";
		$url=urldecode($url);
		$data = array();
		foreach($_REQUEST as $param=>$value){
			if(!in_array($param,$_internalParams))$data[$param]=$value;
		}
		// use key 'http' even if you send the request to https://...
		
		$options = array('http' => array('header'  => "Content-type: application/x-www-form-urlencoded\r\n".(strlen($session)?"Cookie: session={$session}\r\n":""),'method'  => 'POST','content' => http_build_query($data)
		//,'proxy' => 'tcp://10.0.1.46:8080'
		//,'request_fulluri' => true
		));
		$context  = stream_context_create($options);
		$_result = file_get_contents($url, false, $context);
		$cookies = array();
		if(is_array($http_response_header)){
			foreach ($http_response_header as $hdr) {
				if (preg_match('/^Set-Cookie:\s*([^;]+)/', $hdr, $matches)) {
					parse_str($matches[1], $tmp);
					$cookies += $tmp;
				}
			}
		}
		if(isset($cookies["session"])){
			$rj=json_decode($_result);
			$rj->session=$cookies["session"];
			$_result=json_encode($rj);
		}
		
		//$_result=curl($url,$data);
		////$_result=curl("http://88.198.1.66:5555/api/auth/",array("username"=>"LOGIN","pswd"=>"PASSWORD"));
		//if(preg_match('/\r\n:\s*(.*)NULL/mi', $_result, $m)){
		//	var_dump($m);
		//}
		//if(preg_match('/^Set-Cookie:\s*([^;]*)/mi', $_result, $m)===true){
		//	parse_str($m[1], $cookies);
		//	$rj=json_decode($_result);
		//	$rj["session"]=$cookies["session"];
		//	$_result=json_encode($rj);
		//}
	}
	unset($_SESSION['sess']);
	$_SESSION['sess'] = $session;
	//file_put_contents("out.log",ob_get_clean()."\n",FILE_APPEND);
	file_put_contents("out.log", $_SESSION['sess']."
",FILE_APPEND);
	
	echo $_result;
?>