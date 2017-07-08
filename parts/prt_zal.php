<?
$proc->mod["index"]=1;
$proc->mod["order"]="numb";
$proc->fetch("lodges");

unset($proc->mod["index"]);
unset($proc->mod["order"]);

for($i=0; $i<$proc->tab["lodges"]["qty"]; $i++){
	$lodge_numb=$proc->tabdata["lodges"][$i]["numb"];
	$w=$proc->tabdata["lodges"][$i]["w"];
	$h=$proc->tabdata["lodges"][$i]["h"];
	$x=$proc->tabdata["lodges"][$i]["x"];
	$y=$proc->tabdata["lodges"][$i]["y"];
	$len=strlen($lodge_numb);
	$nd=3-$len;
	$lodge_id=lodge.str_repeat('0', $nd).$lodge_numb;
	//echo "<br />".$lodge_id;
	$lodge_div='<div class="frm02" id="'.$lodge_id.'" style="width:'.$w.'px; height:'.$h.'px; left:'.$x.'px; top:'.$y.'px;"><br /></div>
';
	$lodge_full.=$lodge_div;
}

/*
echo "<pre>";
print_r($proc->tabdata["lodges"]);
echo "<pre>";
*/
?>

<div class="frm01" id="zal">
	<!--<div class="frm02" id="lodge001"><br></div>-->
    <? echo $lodge_full; ?>
<div id="mon"></div>

</div>
<div id="mon2"></div>

