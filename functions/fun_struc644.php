<?
function struc644($struc){
$ind=array(
0 => array('field' => 'len644', 'size' => 2, 'ind' => 'size'), 
1 => array('field' => 'card_deleted', 'size' => 1, 'ind' => 'wasDeleted'), 
2 => array('field' => 'card_removed', 'size' => 1, 'ind' => 'needToSeize'), 
3 => array('field' => 'card_expired', 'size' => 1, 'ind' => 'isExpired'), 
4 => array('field' => 'card_invalid', 'size' => 1, 'ind' => 'isInactive'), 
5 => array('field' => 'card_confirm', 'size' => 1, 'ind' => 'needConfirmation'), 
6 => array('field' => 'discount_number', 'size' => 2, 'ind' => 'discountLevel'), 
7 => array('field' => 'kopeek', 'size' => 8, 'ind' => 'cash'), 
8 => array('field' => 'fullname', 'size' => 40, 'ind' => 'holder'), 
9 => array('field' => 'bonus_number', 'size' => 2, 'ind' => 'bonus'), 
10 => array('field' => 'card_blocked', 'size' => 1, 'ind' => 'isBlocked'), 
11 => array('field' => 'why_blocked', 'size' => 256, 'ind' => 'blockingReason'), 
12 => array('field' => 'discount_lim', 'size' => 8, 'ind' => 'discountLimit'), 
13 => array('field' => 'defaulter', 'size' => 4, 'ind' => 'defaulter'), 
14 => array('field' => 'info', 'size' => 256, 'ind' => 'information'), 
15 => array('field' => '0', 'size' => 8, 'ind' => 'cash2'), 
16 => array('field' => '0', 'size' => 8, 'ind' => 'cash3'), 
17 => array('field' => '0', 'size' => 8, 'ind' => 'cash4'), 
18 => array('field' => '0', 'size' => 8, 'ind' => 'cash5'), 
19 => array('field' => 'account', 'size' => 4, 'ind' => 'account'), 
20 => array('field' => '0', 'size' => 8, 'ind' => 'cash6'), 
21 => array('field' => '0', 'size' => 8, 'ind' => 'cash7'), 
22 => array('field' => '0', 'size' => 8, 'ind' => 'cash8'),  
);

$key = $struc['keyfield'][0];
$struc[$key]['len644'] = 644;
$struc[$key][0] = 0;
$struc[$key]['kopeek'] = $struc[$key]['balance'];
$struc[$key]['fullname'] = $struc[$key]['surname']." ".$struc[$key]['firstname']; //." ".$struc[$key]['middlename']
	
	if($key>0){
		$res['rez'] = "0";
	}else{
		$res['rez'] = "1";
	}
	
	/*
	echo '+++<pre>';
	print_r($ind);
	echo '</pre>';
	*/
for($i=0; $i<=22; $i++){
	
	$elem = $struc[$key][$ind[$i]['field']];
	/*
	if(!$elem){
		$elem="0";
	}
	*/
	//echo $elem."<br />";
	$res["Card"][$ind[$i]['ind']] = $elem;
	
}

	
	//return $i;
	return $res;
}
?>