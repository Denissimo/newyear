<?
session_start();
//header('Content-Type:text/plain'); 
//$_SESSION['ulle'] = 1233;
//echo "phpfile";
//ech($cont);
/*
echo '<form action= "http://88.198.1.66:5555/api/auth/" method="POST">
<input type="text" name="username" value="LOGINSKY">
<input type="text" name="pswd" value="PASSWORD">
<input type="submit" name="sub" value="Авторизация">
</form>

<form action= "http://88.198.1.66:5555/api/auth/info/" method="POST">
<input type="submit" name="sub" value="Инфо по авторизации">
</form>

<form action= "http://88.198.1.66:5555/api/transactions/accounts/" method="POST">
<input type="submit" name="sub" value="Список счетов">
</form>';

ech($_SESSION);
*/
if($cuu = curl_init()) {
/**/
	curl_setopt($cuu, CURLOPT_URL, 'http://88.198.1.66:5555/api/auth/');
    curl_setopt($cuu, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($cuu, CURLOPT_POST, true);
    curl_setopt($cuu, CURLOPT_POSTFIELDS, "username=".$_GET['dd_lgn']."&pswd=".$_GET['dd_psw']);
	curl_setopt($cuu, CURLOPT_USERAGENT,"Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.103 Safari/537.36"); 
	//curl_setopt($cuu, CURLOPT_COOKIE, "session=".$_GET['sess']);
	//curl_setopt($cuu, CURLOPT_REFERER,"http://localhost:8080/2twallet/auth.html"); 
	$out = curl_exec($cuu);
	$dec = json_decode($out);
	$res['login'] = $dec;
	//echo $out;
	//echo '<br />';

    curl_setopt($cuu, CURLOPT_URL, 'http://88.198.1.66:5555/api/transactions/accounts/');
    curl_setopt($cuu, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($cuu, CURLOPT_POST, true);
    curl_setopt($cuu, CURLOPT_POSTFIELDS, "sub=list");
	curl_setopt($cuu, CURLOPT_USERAGENT,"Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.103 Safari/537.36"); 
	curl_setopt($cuu, CURLOPT_COOKIE, "session=".session_id());
	//curl_setopt($cuu, CURLOPT_REFERER,"http://localhost:8080/2twallet/auth.html"); 
    $out = curl_exec($cuu);
	$dec = json_decode($out);
	$res['acc'] = $dec ;
	//$info = curl_getinfo($cuu);
	$acc_id = $dec->data[0]->Account_id;//['Account_id'];
	//ech($dec->data[0]);

    //echo $acc_id;
	//echo '<br />';
	/*
	ech($info);
	echo '<br />';
	*/

    curl_setopt($cuu, CURLOPT_URL, 'http://88.198.1.66:5555/api/auth/info/');
    curl_setopt($cuu, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($cuu, CURLOPT_POST, true);
    curl_setopt($cuu, CURLOPT_POSTFIELDS, "sub=list");
	curl_setopt($cuu, CURLOPT_USERAGENT,"Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.103 Safari/537.36"); 
	curl_setopt($cuu, CURLOPT_COOKIE, "session=".session_id());
	//curl_setopt($cuu, CURLOPT_REFERER,"http://localhost:8080/2twallet/auth.html"); 
    $out = curl_exec($cuu);
	//$oo = json_decode($out);
    //echo $out;
	$dec = json_decode($out);
	$res['info'] = $dec ;
	//$dec = json_decode($out);
	//ech($dec);
	//echo '<br />';
	
	/*
	curl_setopt($cuu, CURLOPT_URL, 'http://88.198.1.66:5555/api/transactions/');
    curl_setopt($cuu, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($cuu, CURLOPT_POST, true);
	//curl_setopt($cuu, CURLOPT_HEADER, true);
    curl_setopt($cuu, CURLOPT_POSTFIELDS, 'uaccount_id='.$acc_id.'&date_from=01.01.1995&date_to=15.09.2014');
	curl_setopt($cuu, CURLOPT_USERAGENT,"Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.103 Safari/537.36"); 
	
	$out = curl_exec($cuu);
    echo $out;
	echo '<br />';
	*/
    curl_close($cuu);
	$json_res = json_encode($res);
	echo $json_res;
	
 }
 

 

 //$_SESSION['ququ']='tesst';
//$proc->tabdata['sys_content']['testlabel']['content'] = 'Аллилуйя!';
//ech($proc->tabdata['sys_content']);

?>