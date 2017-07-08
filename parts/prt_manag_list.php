<?
$proc->mod['index'] = 1;
$proc->mod['join'] = 'typevents typevent id_tev';
$proc->mod['order'] = "row_id DESC";
$proc->fetch('events');
$proc->mod['index'] = 1;
$proc->request = 'SELECT ev.row_id, ev.namevent, ev.guests, lo.typelodge AS typlo, lo.numb AS numb, ty.typelodge, count(lo.typelodge), count(od.typelodge)
FROM events AS ev
LEFT JOIN link_event_lodge AS li ON ev.row_id = li.id_event
LEFT JOIN lodges AS lo ON li.id_lodge = lo.row_id
LEFT JOIN typelodges AS ty ON lo.typelodge = ty.row_id
LEFT OUTER JOIN orders AS od ON (od.lodgenum = lo.row_id AND od.event = li.id_event)

GROUP BY ev.row_id, lo.typelodge';
$proc->fetch('link_event_lodge');
//ech($proc->tabdata['link_event_lodge']);
$mas['types'] = 0;
for($i=0;$i<$proc->tab['link_event_lodge']['qty'];$i++){
	if($proc->tabdata['link_event_lodge'][$i]['typlo']>$mas['types']){
		$mas['types'] = $proc->tabdata['link_event_lodge'][$i]['typlo'];
	}
	if($proc->tabdata['link_event_lodge'][$i]['numb']>0){
		$mas[$proc->tabdata['link_event_lodge'][$i]['namevent']][$proc->tabdata['link_event_lodge'][$i]['typlo']]['assigned'] = $proc->tabdata['link_event_lodge'][$i]['count(lo.typelodge)'];
	}else{
		$mas[$proc->tabdata['link_event_lodge'][$i]['namevent']][$proc->tabdata['link_event_lodge'][$i]['typlo']]['assigned'] = $proc->tabdata['link_event_lodge'][$i]['guests'];
	}
	
	$mas[$proc->tabdata['link_event_lodge'][$i]['namevent']][$proc->tabdata['link_event_lodge'][$i]['typlo']]['typelodge'] = $proc->tabdata['link_event_lodge'][$i]['typelodge'];
	$mas[$proc->tabdata['link_event_lodge'][$i]['namevent']][$proc->tabdata['link_event_lodge'][$i]['typlo']]['sold'] = $proc->tabdata['link_event_lodge'][$i]['count(od.typelodge)'];
}
//$proc->fetch('typelodges');
//$proc->fetch('orders');

//ech($proc->tabdata['link_event_lodge']);
//ech($mas);
//unset($proc->mod);
$url_event0 = $proc->by_label('event');
//print_r($url_event0);

$proc->mod['index'] = 1;
$proc->fetch('typelodges');
//ech($proc->tabdata['typelodges']);
for($k=1;$k<=$mas['types'];$k++){
	$newek = '<td>'.$proc->tabdata['typelodges'][$k-1]['typelodge'].'</td>';
	$typk.=$newek;
}

$tab='<table border="1" class="evetlist">
<tr>
<td>Редакт.</td>
<td>ID</td><td>Наименование</td><td>Дата</td><td>Время</td><td>Длит.</td><td>Формат</td>'.$typk.'<td>Удал.</td>
</tr>
';
unset($formdel);
for($i=0; $i<$proc->tab['events']['qty'];$i++){
	
	$datfin = $proc->tabdata['events'][$i]['timefin'];
	if(date("Y-m-d G:i:s")>$datfin){
		$past = 'OLD';
	}else{
		$past = 'NEW';
		unset($typs);
	for($j=1;$j<=$mas['types'];$j++){
		$newel = '<td>'.$mas[$proc->tabdata['events'][$i]['namevent']][$j]['assigned'].' / '.$mas[$proc->tabdata['events'][$i]['namevent']][$j]['sold'].'</td>';
		if($newel=='<td> / </td>'){
			$newel = '<td></td>';
		}
		$typs.=$newel;
	}
	$formedit = '<form action="[{manevedit}]" method="post">
	<input type="hidden" name="row_id" value="'.$proc->tabdata['events'][$i]['row_id'].'">
	<input type="hidden" name="namevent" value="'.$proc->tabdata['events'][$i]['namevent'].'">
	<input type="hidden" name="typevent" value="'.$proc->tabdata['events'][$i]['typevent'].'">
	<input type="hidden" name="datevent" value="'.$proc->tabdata['events'][$i]['datevent'].'">
	<input type="hidden" name="timevent" value="'.$proc->tabdata['events'][$i]['timevent'].'">
	<input type="hidden" name="duration" value="'.$proc->tabdata['events'][$i]['duration'].'">
	<input type="hidden" name="guests" value="'.$proc->tabdata['events'][$i]['guests'].'">
	<input type="hidden" name="notice" value="'.$proc->tabdata['events'][$i]['notice'].'">
	<input type="image"  name="edit_event_but" src="/i/ar_right.jpg" class="arrowbut">
	</form>';
	$formdel .= '<div id="managdel'.$proc->tabdata['events'][$i]['row_id'].'" class="lightbox" align="center"><div class="lightdiv">'.sure.'<form  action="[{post}]" method="post"><input type="hidden" name="act" value="del"><input type="hidden" name="row_id" value="'.$proc->tabdata['events'][$i]['row_id'].'"><input type="image" name="delbut" src="/i/del.png" class="formicon"></form></div></div>';
	$linkdel = '<a href="#" rel="managdel'.$proc->tabdata['events'][$i]['row_id'].'" class="lightbut"><img src="/i/del.png"></a>';
	
	$url_event1 = '/'.$proc->make_url($url_event0['address'].'/'.$proc->tabdata['events'][$i]['namevent']);
	//echo $url_event1.'<br />';
	$datev = explode(' ', $proc->tabdata['events'][$i]['datevent']);

	$tab.='<tr><td>'.$formedit.'</td><td>'.$proc->tabdata['events'][$i]['row_id'].'</td><td><a href="'.$url_event1.'">'.$proc->tabdata['events'][$i]['namevent'].'</a></td><td>'.$datev[0].'</td><td>'.$proc->tabdata['events'][$i]['timevent'].'</td><td>'.$proc->tabdata['events'][$i]['duration'].'</td><td>'.$proc->tabdata['events'][$i]['typevent'].'</td>'.$typs.'<td>'.$linkdel.'</td></tr>';
	}
	
	// name="editevent" 

}
$tab.='</table><br />'.$formdel;



/*
echo '<pre>';
print_r($proc->tabdata['events']);
echo '</pre>';
*/

?>