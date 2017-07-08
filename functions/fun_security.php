<? 
function security($input){
	$input=strip_tags($input);	
}

function normal_code($code){
	$code=str_replace("[","<",$code);
	$code=str_replace("]",">",$code);	
	return $code;
}

?>