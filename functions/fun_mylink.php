<?
function mylink(){
	global $proc;
	
$arg_list = func_get_args();
$ids=explode("-", $arg_list[0]);
//print_r($arg_list);

$project="tsp";

$req_max='SELECT MAX(level) FROM mylinks WHERE project="'.$project.'"';
$res_max=$proc->go_req($req_max);
$max=mysql_result($res_max, 0, "MAX(level)");

$req_min='SELECT MIN(level) FROM mylinks WHERE project="'.$project.'"';
$res_min=$proc->go_req($req_min);
$min=mysql_result($res_min, 0, "MIN(level)");

$req_lev='SELECT * FROM mylinks WHERE project="'.$project.'" AND level='.'1';
$res_lev=$proc->go_req($req_lev);
$lev_num=mysql_num_rows($res_lev);
$id=mt_rand(0, $lev_num);
//echo $max."<br />".$min."<br />".$lev_num."<br />".$id."<br />";
//$proc->go_test();
$case_my="а";
//unset($url);

if($arg_list[0]){
	$k=0;
	while($ids[$k]){
		$i=$k+1;
		$req_rnd='SELECT * FROM mylinks WHERE row_id='.$ids[$k];
		$res_rnd=$proc->go_req($req_rnd);
		$resul[$i]["row_id"]=mysql_result($res_rnd, 0, "row_id");
		$resul[$i]["phrase"]=mysql_result($res_rnd, 0, "phrase");
		//echo $i."	".$resul[$i]["phrase"]."<br />";
		$resul[$i]["url"]=mysql_result($res_rnd, 0, "url");
		if($resul["url"]=="" and strlen($resul[$i]["url"])>0){
			//echo "Jump: ".strlen($resul[$i]["url"])."<br />";
			$resul["url"]=$resul[$i]["url"];
		}
		$resul["code"]=$arg_list[0];
		
		if($i==2){
			$resul["final"].=(" ||a_href||".$resul[$i]["phrase"]);
			$resul["text"].=(" ".$resul[$i]["phrase"]);
		}elseif($i==5){
			$resul["final"].=("</a> ".$resul[$i]["phrase"]);
			$resul["text"].=(" ".$resul[$i]["phrase"]);
		}else{
			$resul["final"].=(" ".$resul[$i]["phrase"]);
			$resul["text"].=(" ".$resul[$i]["phrase"]);
		}
	
		$k++;
	}
}else{
	
for($i=$min; $i<=$max; $i++){
	$req_rnd='SELECT * FROM mylinks WHERE project="'.$project.'" AND level='.$i.' AND (case_my="'.$case_my.'" OR case_my="а")';
	$res_rnd=$proc->go_req($req_rnd);
	$lev_rnd=mysql_num_rows($res_rnd);
	$id_rnd=mt_rand(0, $lev_rnd-1);

	$resul[$i]["row_id"]=mysql_result($res_rnd, $id_rnd, "row_id");
	$resul[$i]["phrase"]=mysql_result($res_rnd, $id_rnd, "phrase");
	$resul[$i]["case_my"]=mysql_result($res_rnd, $id_rnd, "case_my");
	$resul[$i]["case_to"]=mysql_result($res_rnd, $id_rnd, "case_to");
	$resul[$i]["url"]=mysql_result($res_rnd, $id_rnd, "url");
	if($resul["url"]=="" and strlen($resul[$i]["url"])>0){
		//echo "Jump: ".strlen($resul[$i]["url"])."<br />";
		$resul["url"]=$resul[$i]["url"];
	}
	$resul["code"].=$resul[$i]["row_id"]."-";
	
	$resul[$i]["case_to"]=mysql_result($res_rnd, $id_rnd, "case_to");
	$case_my=$resul[$i]["case_to"];
	
	if($i==2){
		$resul["final"].=(" ||a_href||".$resul[$i]["phrase"]);
		$resul["text"].=(" ".$resul[$i]["phrase"]);
	}elseif($i==5){
		$resul["final"].=("</a> ".$resul[$i]["phrase"]);
		$resul["text"].=(" ".$resul[$i]["phrase"]);
	}else{
		$resul["final"].=(" ".$resul[$i]["phrase"]);
		$resul["text"].=(" ".$resul[$i]["phrase"]);
	}
}

$codelen=strlen($resul["code"]);
$resul["code"][$codelen-1]='';

}

if($resul["url"]==""){
	$resul["url"]="/";
}

$resul["link"]='<a href="http://'.my_site.$resul["url"].'">';

$resul["final"]=str_replace("||a_href||", $resul["link"], $resul["final"]);

$resul["final"].=". ";

//echo "<br /><br />".$resul["final"]."<br />".my_site."<br />".$resul["url"]."<br />";
return $resul;
}

?>