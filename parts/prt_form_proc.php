<?
echo '<br />'.$proc->tabdata["sys_urls"][$url[1]]["val"].'<br />';
include "functions/fun_mylink.php";
if(!$_SESSION['extra_val']){
	$proc->makeform($proc->tabdata["sys_urls"][$url[1]]["val"]);
}else{
	$proc->makeform($_SESSION['extra_val']);
}
unset($redir);
unset($_SESSION['extra_val']);


		if($_POST["action"]){
			$_SESSION["act"]=$_POST["action"];
		}
		
		/*
		echo '<script language="javascript">alert("'.$_SESSION["act"].'");</script>';
		*/
		if($_SESSION["act"]){
			$procfile='process/'.$_SESSION["act"].'.php';
			$filech=file_exists($procfile);
			if ($filech) {
				include $procfile;
			}
		}

		echo '<div id="regform" align="center">'.$proc->form.'</div>';
?>

