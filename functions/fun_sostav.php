<?
function sostav($sostav){
	global $proc;
	$sost=explode(":", $sostav);
	$i=0;
	//$res["simple"]='<table class="flolist">';
	$res["admin"]='<table width="200" border="1">
  <tr>
    <th scope="col">Flower</th>
    <th scope="col">Qty</th>
    <th scope="col">Price</th>
	<th scope="col">Summ</th>
  </tr>';

	while($sost[$i]){
		$sost[$i]=explode("x", $sost[$i]);
		$res[$i]["flower"]=$sost[$i][0];
		$res[$i]["qty"]=$sost[$i][1];
		$res[$i]["price"]=$proc->tabdata["flowers"][$res[$i]["flower"]]["price"];
		$res[$i]["namerus"]=$proc->tabdata["flowers"][$res[$i]["flower"]]["namerus"];
		$res[$i]["summ"]=$res[$i]["price"]*$res[$i]["qty"];
		//$res[$i]["namerus"]
		$spec=explode("-", $res[$i]["flower"]);
		if($spec[0]!=99){
			$res["consist"].=$res[$i]["namerus"]."<br />";
		}
		$res["admin"].='<tr><td>'.$res[$i]["namerus"].'</td><td>'.$res[$i]["qty"].'</td><td>'.$res[$i]["price"].'</td><td>'.$res[$i]["summ"].'</td></tr>';
		$res["total"]+=$res[$i]["summ"];
		$i++;
		}
	$res["admin"].='</table>';
	return $res;
	
}
?>