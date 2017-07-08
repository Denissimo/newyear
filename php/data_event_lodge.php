<?
$proc->mod['filter'] = 'namevent = "'.$proc->url[2].'"';
$proc->fetch('events');
$ev_id = $proc->tabdata['events'][$proc->url[2]]['row_id'];
//ech($proc->tabdata['events']);
$proc->request = 'SELECT flonum FROM lodges GROUP by flonum';
$proc->mod['index'] = 1;
$proc->fetch('lodges');
//ech($proc->tabdata['lodges']);
$floor_tab = '<table border="1" class="evetlist">';
for($i=0; $i<$proc->tab['lodges']['qty'];$i++){
	$form_floor_add = '<form action="[{post_addlodges}]" method="post"><input type="hidden" name="act" value="put">
	<input type="hidden" name="id_event" value="'.$ev_id.'">
	<input type="hidden" name="floors" value="'.$proc->tabdata['lodges'][$i]['flonum'].'">
	<input type="image" name="lodflo_add" src="/i/add.png" class="formicon"></form>';
	$form_floor_del = '<form action="[{post}]" method="post"><input type="hidden" name="act" value="del">
	<input type="hidden" name="id_event" value="'.$ev_id.'">
	<input type="hidden" name="floors" value="'.$proc->tabdata['lodges'][$i]['flonum'].'">
	<input type="image" name="lodflo_del" src="/i/cancel.png" class="formicon"></form>';
	$floor_tab.='<tr><td>Этаж '.$proc->tabdata['lodges'][$i]['flonum'].'</td><td>'.$form_floor_add.'</td><td>'.$form_floor_del.'</td></tr>';
}
$form_floor_add = '<form action="[{post_addlodges}]" method="post"><input type="hidden" name="act" value="put">
	<input type="hidden" name="id_event" value="'.$ev_id.'">
	<input type="image" name="lodflo_add" src="/i/add.png" class="formicon"></form>';
$form_floor_del = '<form action="[{post}]" method="post"><input type="hidden" name="act" value="del">
	<input type="hidden" name="id_event" value="'.$ev_id.'">
	<input type="image" name="lodflo_del" src="/i/cancel.png" class="formicon"></form>';
	$floor_tab.='<tr><td>Все ложи '.$proc->tabdata['lodges'][$i]['flonum'].'</td><td>'.$form_floor_add.'</td><td>'.$form_floor_del.'</td></tr>';
	
$floor_tab.='</table>';




//echo 'event<br />'.$ev_id;
//ech($proc->tabdata['events']);
$proc->request = 'SELECT k.row_id AS id_row, l.row_id, numb, flonum, t.typelodge, guests, notice, id_event, id_lodge, k.pricekop AS pricekop, l.defprice AS defprice
FROM
  lodges AS l
JOIN typelodges AS t
ON l.typelodge = t.row_id
LEFT OUTER JOIN (SELECT  *
                 FROM
                   link_event_lodge
                 WHERE
                   id_event = "'.$ev_id.'") AS k
ON l.row_id = k.id_lodge ORDER BY
  l.row_id';

//echo '<br />'.$proc->request.'<br />';
$proc->mod['index'] = 1;
//$proc->mod['join'] = 'typelodges typelodge row_id';
$proc->fetch('lodges');



//$proc->mod['filter'] = '';
//ech($proc->tabdata['lodges']);

$tab='<table border="1" class="evetlist">';
for($i=0; $i<$proc->tab['lodges']['qty'];$i++){
if($proc->tabdata['lodges'][$i]['id_lodge']){
	$formbut = '<form action="[{post}]" method="post" class="butt"><input type="hidden" name="act" value="del"><input type="hidden" name="row_id" value="'.$proc->tabdata['lodges'][$i]['id_row'].'"><label>'.$proc->tabdata['lodges'][$i]['pricekop'].'</label><input type="image" name="lodev_del" src="/i/cancel.png" class="formicon"></form>';
}else{
	$formbut = '<form action="[{post}]" method="post" class="butt"><input type="text" name="pricekop" value="'.$proc->tabdata['lodges'][$i]['defprice'].'" class="pricekop"><input type="hidden" name="act" value="add"><input type="hidden" name="id_event" value="'.$ev_id.'"><input type="hidden" name="id_lodge" value="'.$proc->tabdata['lodges'][$i]['row_id'].'">
	<input type="hidden" name="floors" value="'.$proc->tabdata['lodges'][$i]['flonum'].'">
	<input type="image" name="lodev_add" src="/i/add.png" class="formicon"></form>';
}

//<td>'.$proc->tabdata['lodges'][$i]['row_id'].'</td><td>'.$proc->tabdata['lodges'][$i]['id_row'].'</td>
//<td>'.$proc->tabdata['lodges'][$i]['id_lodge'].'</td>
$tab.='<tr>

<td>Номер ложи: '.$proc->tabdata['lodges'][$i]['numb'].'</td><td>Этаж: '.$proc->tabdata['lodges'][$i]['flonum'].'</td><td>Гостей: '.$proc->tabdata['lodges'][$i]['guests'].'</td><td>'.$proc->tabdata['lodges'][$i]['typelodge'].'</td>

<td>'.$formbut.'</td></tr>';
}

$tab.='</table>';

echo $tab;
echo '<br />';
echo $floor_tab;
//ech($proc->tabdata['sys_urls'])

echo $_SESSION['sys_tmp']['message'];
//dropsess(droplist);
?>
