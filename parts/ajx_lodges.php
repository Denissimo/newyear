<?
//echo 'ajx';
//echo $proc->sys['url']['list'][1];
$proc->mod['index'] = 1;
$proc->mod['filter'] = 'namevent = "'.$proc->sys['url']['list'][1].'"';
$proc->fetch('events');
$idevent = $proc->tabdata['events'][0]['row_id'];
//echo $idevent;
$proc->request = 'SELECT li.id_lodge AS lodge, li.floors AS floors, lo.numb AS numb, 
lo.guests AS guests, lo.notice as notice, lo.x AS x, lo.y AS y, lo.w AS w, lo.h AS h, 
ty.typelodge AS typelodge, ty.infantry AS infantry, pl.pricekop, od.payd
FROM link_event_lodge AS li
LEFT JOIN lodges AS lo ON li.id_lodge = lo.row_id
LEFT JOIN typelodges AS ty ON lo.typelodge = ty.row_id
LEFT OUTER JOIN pricelodges AS pl ON (lo.typelodge = pl.typelodge AND pl.event = "'.$idevent.'")
LEFT OUTER JOIN orders AS od ON (od.lodgenum = lo.row_id AND od.event = li.id_event)
WHERE li.id_event = "'.$idevent.'"';
$proc->mod['index'] = 1;
$proc->fetch('link_event_lodge');
$enc_res = json_encode($proc->tabdata['link_event_lodge']);
echo $enc_res;

//ech($proc->tabdata['link_event_lodge']);
?>