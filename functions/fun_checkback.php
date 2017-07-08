<?
function checkback($backlink){

if($par=file($backlink)){
	$pars=implode("", $par);
	$filter="/a href=(.){0,2}(http:\/\/){0,1}".my_site."/";
	$mat=preg_match($filter, $pars);
}else{
	$mat=0;
}

return $mat;
}
?>