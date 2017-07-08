<?
	session_start();
	unset($_SESSION["cap"]);
	if(!$_SESSION["cap"]){
	$_SESSION["cap"]=rand (10000, 99999);
}
$rand_num=rand (10000, 99999);
	echo '<img class="captcha" src="/parts/prt_unit_captcha.php?id='.$rand_num.'" />';
	//echo '<img class="captcha" src="/parts/prt_unit_captcha.php" /><img class="butt" id="refresh" src="/i/refresh.png" />;
	//echo '<br />cap: '.$_SESSION["cap"];
	//echo '<br />dig: '.$rnd_dig;

?>