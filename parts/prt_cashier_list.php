<?
$proc->mod['index'] = 1;
$proc->mod['join'] = 'typevents typevent id_tev';
$proc->mod['order'] = "datetime DESC";
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

<td>ID</td><td>Наименование</td><td>Дата</td><td>Формат</td>'.$typk.'
</tr>
';
for($i=0; $i<$proc->tab['events']['qty'];$i++){
	// name="editevent" 
	unset($typs);
	for($j=1;$j<=$mas['types'];$j++){
		$newel = '<td>'.$mas[$proc->tabdata['events'][$i]['namevent']][$j]['assigned'].' / '.$mas[$proc->tabdata['events'][$i]['namevent']][$j]['sold'].'</td>';
		if($newel=='<td> / </td>'){
			$newel = '<td></td>';
		}
		$typs.=$newel;
	}

	
	$url_event1 = '[{'.$lab.'}]/'.$proc->make_url($proc->tabdata['events'][$i]['namevent']);
	//echo $url_event1.'<br />';
	$tab.='<tr><td>'.$proc->tabdata['events'][$i]['row_id'].'</td><td><a href="'.$url_event1.'">'.$proc->tabdata['events'][$i]['namevent'].'</a></td><td>'.$proc->tabdata['events'][$i]['datevent'].'</td><td>'.$proc->tabdata['events'][$i]['typevent'].'</td>'.$typs.'</tr>';
}
$tab.='</table>';

//echo '+++<br />';
//ech($my);
?>