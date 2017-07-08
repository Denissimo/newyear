<?

function loadtab($tab){
	global $my;
	
	$quer=mysql_query("SET NAMES utf8;", $my);
	$quer=mysql_query("SET CHARACTER SET utf8;", $my);
	
	$fields=loadfield($tab);

	$req="SELECT * FROM ".$tab;
	//echo "<br>reqflo: ".$reqflo;
	$quer=mysql_query($req, $my);
	//echo "<br>querflo: ".$querflo;
	$num=mysql_num_rows($quer);
	//echo "<br>Numbuk: ".$numbuk;
	
	for ($i=0; $i<$num; $i++){
		$current=mysql_result($quer, $i, keyfield);
		$res[$current]["num"]=$i;
		$j=0;
		while($fields[$j]){
		$res[$current][$fields[$j]]=mysql_result($quer, $i, $fields[$j]);
		//$res[$current][$fields[$j]]=$fields[$j];
		$j++;
		//echo "<br>".$current;
		}
	}
	return $res;
}
?>