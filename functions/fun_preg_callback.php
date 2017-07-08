<?
function poster01($matches){
		global $proc;
		//echo "<br />111: ".$matches[1].' D:'.$proc->tabdata["sys_content"][$matches[1]]["content"];
		return $proc->tabdata["sys_content"][$matches[1]]["content"];
		//return "kjhfkf";
}

function content($object01){
	global $proc;
	
	$res01=preg_replace_callback("/\[>([a-zA-Z0-9_\-]+)<\]/", "poster01", $object01);
	return $res01;
}
function poster03($matches){
		
		//echo "<br />".$matches[1].' '.$_SESSION["refill"][$matches[1]];
		if($_SESSION["refill"][$matches[1]]){
			$ret = $_SESSION["refill"][$matches[1]];
		}elseif($_POST[$matches[1]]){
			$ret = $_POST[$matches[1]];
		}
		return $_SESSION["refill"][$matches[1]];
		
	}
	
function refill($object01){
	
	//ech($proc->tabdata["sys_content"]); 
	
	$res01=preg_replace_callback("/\[>(.*)<\]/", "poster03", $object01);
	//unset($_SESSION["refill"]);
	return $res01;
}

function links($object01){
	global $proc;
	/*
	echo "<pre>";
	print_r($proc->tabdata["sys_content"]); 
	echo "</pre>";
	*/
	function poster02($matches){
		global $proc;
		//echo "<br />".$matches[1];
		return $proc->tabdata["sys_content"][$matches[1]]["content"];
		//return "kjhfkf";
	}
	$res01=preg_replace_callback("/\|>(.*)<\|/", "poster01", $object02);
	return $res01;
}

?>