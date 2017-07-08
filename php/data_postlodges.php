<?
$idevent = $_POST['id_event'];
function make_arr($elem){
	global $idevent;
	$newone['id_event'] = $idevent;
	$newone['id_lodge'] = $elem['row_id'];
	$newone['floors'] = $elem['flonum'];
	$newone['pricekop'] = $elem['defprice'];
	return $newone;
}

//$urr = $proc->address($_SERVER['HTTP_REFERER']);

if($_POST['floors']){
	$proc->mod['filter'] = 'flonum = "'.$_POST['floors'].'"';
	//$proc->request = 'DELETE FROM link_event_lodge WHERE id_event = "'.$_POST['id_event'].'" AND floors = "'.$_POST['floors'].'"';
	$proc->request = 'SELECT lo.row_id, lo.flonum, lo.defprice FROM lodges AS lo LEFT JOIN link_event_lodge AS li ON (lo.row_id = li.id_lodge AND li.id_event = "'.$_POST['id_event'].'") WHERE (li.id_lodge IS NULL AND lo.flonum = "'.$_POST['floors'].'")';
}else{
	//$proc->mod['filter'] = 'id_event = "'.$_POST['id_event'].'"';
	//$proc->request = 'DELETE FROM link_event_lodge WHERE id_event = "'.$_POST['id_event'].'"';
	$proc->request = 'SELECT lo.row_id, lo.flonum, lo.defprice FROM lodges AS lo LEFT JOIN link_event_lodge AS li ON (lo.row_id = li.id_lodge AND li.id_event = "'.$_POST['id_event'].'") WHERE li.id_lodge IS NULL';
}

echo $proc->request;
//$proc->go_req();
$proc->mod['index'] = 1;
$proc->fetch('lodges');

//ech($proc->tabdata['lodges']);

$mas = array_map('make_arr', $proc->tabdata['lodges']);
unset($mas['qty']);
unset($mas['keyfield']);
$proc->put_array($mas, 'link_event_lodge');

header("Location: ".$_SERVER['HTTP_REFERER']);
//ech($_POST);
//ech($proc->tabdata['lodges']);
//ech($mas);


?>