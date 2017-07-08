<?
$proc->tabdata['sys_content']['button02']['content'] = '<img src="/imag/buttons/glass90blue.gif" width="45" height="45" />';
$proc->tabdata['sys_content']['button03']['content'] = '<img src="/imag/buttons/glass90green.gif" width="45" height="45" />';
$lab = $proc->label;
switch($lab){
	case 'cashier':
	$link01 = '<a href="[{sale}]">Продажа</a><br />';
	break;
	
	case 'sale':
	$link01 = '<a href="[{cashier}]">Выдача меток</a><br />';
	break;
}


echo $link01;
//echo $proc->url['qty'];
switch($proc->url['qty']){
case 2:
	
	echo '<script src="/js/go_bar.js"></script>';
	//echo "<br>Кассир<br>";
	if($lab=='sale'){
		include 'parts/prt_cashier_list.php';
		echo $tab;
	}else{
		
		$proc->request = 'SELECT od.row_id, od.dateorder, od.guests, od.payment, od.payd, od.barcode, od.dopcode,
  od.userid, li.user_id, cl.rfid, ev.namevent, lo.numb, lo.flonum
  FROM orders AS od 
  LEFT JOIN lodges AS lo ON od.lodgenum = lo.row_id
  LEFT JOIN events AS ev ON od.event = ev.row_id
  LEFT JOIN link_user_ord AS li ON li.order_id = od.row_id
  LEFT JOIN sys_users AS cl ON cl.row_id = li.user_id
  WHERE cl.rfid IS NULL AND od.userid = "'.$_SESSION['user_id'].'"
  GROUP BY od.row_id';
		$proc->mod['index'] = 1;
		$proc->fetch('orders');
		echo '<br />'.$proc->make_url($proc->tabdata['orders'][$i]['namevent']).'<br />';
		//ech($proc->tabdata['orders']);
		if($proc->tab['orders']['qty']>0){
			$ttab='<div align="center"><p class="alert">Вы не выдали браслеты по заказам:</p><table class="evetlist">
			<tr><td>Мероприятие</td><td>Ложа</td><td>Этаж</td><td>Удал</td></tr>';
			unset($formdel);
			for($i=0; $i<$proc->tab['orders']['qty'];$i++){
				$urrl = '/'.$proc->make_url($proc->url[1]).'/'.$proc->make_url($proc->tabdata['orders'][$i]['namevent']).'/'.$proc->make_url(zakaz).'_'.$proc->tabdata['orders'][$i]['row_id'];
				//echo $urrl.'<br />';
				$linkdel = '<a href="#" rel="orderdel'.$proc->tabdata['orders'][$i]['row_id'].'" class="lightbut"><img src="/i/del.png"></a>';
				$formdel.='<div id="orderdel'.$proc->tabdata['orders'][$i]['row_id'].'" class="lightbox" align="center"><div class="lightdiv">'.sure.'<form action="[{post}]" method="post">
				<input type="hidden" name="row_id" value="'.$proc->tabdata['orders'][$i]['row_id'].'">
				<input type="image" name="ordel" src="/i/del.png">
				</form></div></div>';
				$ttab.='<tr><td><a href="'.$urrl.'">'.$proc->tabdata['orders'][$i]['namevent'].'</a></td><td>'.$proc->tabdata['orders'][$i]['numb'].'</td><td>'.$proc->tabdata['orders'][$i]['flonum'].'</td><td>'.$linkdel.'</td></tr>';
			}		
			$ttab.='</table><br />'.$formdel.'</div>';
			echo $ttab;
		}
		
		echo '<br /><div align="center">Отсканируйте штрихкод талона в окошко<br /><br />
		<input name="bar" type="text" id="bar"/></div>';
	}
	
break;

case 3:
	//echo '3+++<br />';
	$proc->mod['filter'] = 'namevent = "'.$proc->url[2].'"';
	$proc->mod['index'] = 1;
	$proc->fetch('events');
	//ech($proc->tabdata['events']);
	$event_id = $proc->tabdata['events'][0]['row_id'];
	$guestparty = $proc->tabdata['events'][0]['guests'];
	//echo $event_id;
	if($lab=='cashier'){
		$proc->request = 'SELECT od.row_id AS row_id, li.id_lodge AS lodge, li.floors AS floors, lo.numb AS numb, lo.guests AS guests, lo.notice as notice, lo.row_id AS id, 
  lo.x AS x, lo.y AS y, lo.w AS w, lo.h AS h, ty.typelodge AS typelodge, ty.infantry AS infantry,
  li.pricekop, od.payd
FROM link_event_lodge AS li
LEFT JOIN lodges AS lo ON li.id_lodge = lo.row_id
LEFT JOIN typelodges AS ty ON lo.typelodge = ty.row_id
LEFT OUTER JOIN orders AS od ON (od.lodgenum = lo.row_id AND od.event = li.id_event)
WHERE li.id_event = "'.$event_id.'" ORDER BY id';

/*
$proc->request = 'SELECT od.row_id AS row_id, li.id_lodge AS lodge, li.floors AS floors, lo.numb AS numb, lo.guests AS guests, lo.notice as notice, lo.row_id AS id, COUNT(od.row_id) AS sold,
  lo.x AS x, lo.y AS y, lo.w AS w, lo.h AS h, ty.typelodge AS typelodge, ty.infantry AS infantry,
  li.pricekop, od.payd
FROM link_event_lodge AS li
LEFT JOIN lodges AS lo ON li.id_lodge = lo.row_id
LEFT JOIN typelodges AS ty ON lo.typelodge = ty.row_id
LEFT OUTER JOIN orders AS od ON (od.lodgenum = lo.row_id AND od.event = li.id_event)
WHERE li.id_event = "'.$event_id.'" GROUP BY id ORDER BY id';
*/

		$paydlabel = "оплачено";
	}else{
		/*
		$proc->request = 'SELECT od.row_id AS row_id, li.id_lodge AS lodge, li.floors AS floors, lo.row_id AS lod_id, lo.numb AS numb, lo.guests AS guests, lo.notice as notice, lo.row_id AS id, 
  lo.x AS x, lo.y AS y, lo.w AS w, lo.h AS h, ty.typelodge AS typelodge, ty.infantry AS infantry,
  li.pricekop, od.payd
FROM link_event_lodge AS li
LEFT JOIN lodges AS lo ON li.id_lodge = lo.row_id
LEFT JOIN typelodges AS ty ON lo.typelodge = ty.row_id
LEFT OUTER JOIN orders AS od ON (od.lodgenum = lo.row_id AND od.event = li.id_event)
WHERE li.id_event = "'.$event_id.'" AND (od.payd=0 OR od.payd IS NULL OR numb="0") ORDER BY id';	
*/
$proc->request = 'SELECT od.row_id AS row_id, li.id_lodge AS lodge, li.floors AS floors, lo.row_id AS lod_id, lo.numb AS numb, lo.guests AS guests, lo.notice as notice, lo.row_id AS id, COUNT(od.row_id) AS sold,
  lo.x AS x, lo.y AS y, lo.w AS w, lo.h AS h, ty.typelodge AS typelodge, ty.infantry AS infantry,
  li.pricekop, od.payd
FROM link_event_lodge AS li
LEFT JOIN lodges AS lo ON li.id_lodge = lo.row_id
LEFT JOIN typelodges AS ty ON lo.typelodge = ty.row_id
LEFT OUTER JOIN orders AS od ON (od.lodgenum = lo.row_id AND od.event = li.id_event)
WHERE li.id_event = "'.$event_id.'" AND (od.payd=0 OR od.payd IS NULL OR numb="0") GROUP BY id ORDER BY id';	


		$paydlabel = "";
	}
	
	//echo $proc->request;
	$proc->mod['index'] = 1;
	$proc->fetch('link_event_lodge');
	
	if($proc->tab['link_event_lodge']['qty']>0){
		$tab =  '<table border="1" class="evetlist">
		<tr><td><b>Этаж</b></td><td><b>Номер ложи</b></td><td><b>Гостей</b></td><td><b>Тип ложи</b></td><td><b>Оплачено</b></td><td><b>Цена</b></td><td><b>Примечание к ложе</b></td></tr>';
		
		
		//ech($proc->tabdata['link_event_lodge']);
		
		for($i=0; $i<$proc->tab['link_event_lodge']['qty'];$i++){
			//если ложа ноль, то кол-во гостей берём не из табл. лож, а из мероприятий
			$sold = $proc->tabdata['link_event_lodge'][$i]['sold'];
			$infantry = $proc->tabdata['link_event_lodge'][$i]['infantry'];
			if($proc->tabdata['link_event_lodge'][$i]['infantry']>0){
				//$gue = $sold.'/'.$guestparty;
				$gue = $guestparty;
				$free = $guestparty - $sold;
				if($infantry and $lab!='cashier'){
					unset($proc->tabdata['link_event_lodge'][$i]['payd']);
				}
			}else{
				$gue = $proc->tabdata['link_event_lodge'][$i]['guests'];
			}
			
			
			if($lab=='cashier'){
				$a01 = '<a href ="'.$proc->req_uri.'/'.urlencode(zakaz).'_'.$proc->tabdata['link_event_lodge'][$i]['row_id'].'">';			
				$a02 = '</a>';
				$a03 = '';
				$a04 = '';
			}else{
				//ech($proc->tabdata['link_event_lodge'][$i]);
				$a01 = '';
				$a02 = '';
				$a03 = '<a href ="'.$proc->req_uri.'/'.urlencode(lodge).'_'.$proc->tabdata['link_event_lodge'][$i]['numb'].'">';			
				$a04 = '</a>';
				
			}
				$prc = $proc->tabdata['link_event_lodge'][$i]['pricekop']/100;
	
				if($proc->tabdata['link_event_lodge'][$i]['payd']){
					$payd = "оплачено";
					$tab.='<tr><td>'.$proc->tabdata['link_event_lodge'][$i]['floors'].'</td><td>'.$a01.lodge.' '.$proc->tabdata['link_event_lodge'][$i]['numb'].$a02.'</td><td>'.$gue.'</td><td>'.$proc->tabdata['link_event_lodge'][$i]['typelodge'].'</td><td>'.$payd.'</td><td>'.$prc.' руб.</td><td>'.$proc->tabdata['link_event_lodge'][$i]['notice'].'	'.$proc->tabdata['link_event_lodge'][$i]['payd'].'</td></tr>';
				}else{
					$payd = "";
					$tab.='<tr><td>'.$proc->tabdata['link_event_lodge'][$i]['floors'].'</td><td>'.$a03.lodge.' '.$proc->tabdata['link_event_lodge'][$i]['numb'].$a04.'</td><td>'.$gue.'</td><td>'.$proc->tabdata['link_event_lodge'][$i]['typelodge'].'</td><td>'.$payd.'</td><td>'.$prc.' руб.</td><td>'.$proc->tabdata['link_event_lodge'][$i]['notice'].'	'.$proc->tabdata['link_event_lodge'][$i]['payd'].'</td></tr>';
				}
			
			
		}
		$tab.='</table>';	
	}else{
		$tab = 'Нет прикреплённых лож';
	}
	echo $tab;
	/*
	echo '<br />'.$_SERVER['REQUEST_URI'];
	echo '<br />'.$proc->req_uri;
	*/
	
break;

case 4:	

	$proc->mod['filter'] = 'namevent = "'.$proc->url[2].'"';
	$proc->mod['index'] = 1;
	$proc->mod['limit'] = 1;
	$proc->fetch('events');
	
switch($lab){
		
	case 'cashier':
	

		$lod = explode(' ', $proc->url[3]);
		$lod = array_reverse($lod);
		$lod_id = $lod[0];
		
			
		$proc->mod['filter'] = 'row_id = "'.$lod_id.'"';
		$proc->mod['index'] = 1;
		$proc->mod['limit'] = 1;
		$proc->fetch('orders');
		
		if($proc->tabdata['orders'][0]['payd']>0){
			$order_id = $proc->tabdata['orders'][0]['row_id'];
			
			$status_paym = '<p class="normal">Оплачено</p>';
			$proc->mod['filter'] = 'lodges.row_id = "'.$proc->tabdata['orders'][0]['lodgenum'].'"';
			$proc->mod['join'] = 'typelodges typelodge row_id';
			$proc->mod['index'] = 1;
			$proc->mod['limit'] = 1;
			$proc->fetch('lodges');
			
			//ech($proc->tabdata['lodges']);
			$guests = $proc->tabdata['lodges'][0]['guests'];
			/*
			if(!$proc->tabdata['lodges'][0]['infantry']){
				$guests = $proc->tabdata['lodges'][0]['guests'];
			}else{
				$guests = $proc->tabdata['events'][0]['guests'];
			}
			*/
			$proc->request = 'SELECT * 
		  FROM link_user_ord AS li LEFT JOIN sys_users AS cl 
		  ON  li.user_id = cl.row_id WHERE li.order_id = "'.$order_id.'"';
			//$proc->mod['filter'] = 'order_id = "'.$proc->tabdata['orders'][0]['row_id'].'"';
			$proc->mod['index'] = 1;
			$proc->fetch('link_user_ord');
			
			ech($proc->tabdata['']);
			/*
			if($proc->tabdata['link_event_lodge'][$i]['infantry']>0){
				$gue = $sold.'/'.$guestparty;
				$free = $guestparty - $sold;
				if($free>0 and $lab!='cashier'){
					unset($proc->tabdata['link_event_lodge'][$i]['payd']);
				}
			}else{
				$gue = $proc->tabdata['link_event_lodge'][$i]['guests'];
			}
			*/
			
			$ready = $proc->tab['link_user_ord']['qty'];
			
			$lefts = $guests - $ready;
			$form01 = '<form action="[{post_addrfid}]" method="post" name="addrfid"><input name="order_id" type="hidden" value="'.$order_id.'" /><div id="formflow">';
			for($i=0; $i<$ready; $i++){
				$form02.=$proc->tabdata['link_user_ord'][$i]['account'].'<br />
		';
			}
			for($i=0; $i<$lefts; $i++){
				if(!$_SESSION['err_ids']['tex_'.$i]){
					$css_class = 'normal';
				}else{
					$css_class = 'alert';
				}
				$form03.='<input name="tex_'.$i.'" type="text" size="19" maxlength="19" class="'.$css_class.'" id="tex_'.$i.'" value="[>tex_'.$i.'<]"/><br />
		';
			}
			$form04.='</div><input name="sub01" type="submit" value="Готово" id="sub_rfid"/>
			
			<input name="clean" type="button" value="Очистить" class="lightbut" rel="test001"/>
			
			</form>';
			
			/*
			<input name="clean" type="button" value="Очистить" id="clean" onclick="javascript:window.location=\'#test001\'"/>
			<input name="clean" type="button" value="Очистить" id="clean" onclick="javascript:$(\'#test001\').css({\'display\':\'block\'});"/>
			*/
			if($lefts>0){
				$form00 = $form01.$form02.$form03.$form04;
			}else{
				$form00 = $form02;
			}
		echo '<script language="javascript">var lefts='.$lefts.' </script>';
		echo '<script src="/js/go_fill.js"></script>';
			//echo 'ready: '.$ready.' guests: '.$guests.'<br />';
			echo '<div align="center">Выданы браслеты:<br />'.$form00.'</div>';
		/*	
		}elseif($lab=='sale'){
			$status_paym = '<p class="normal">Продажа</p>';
		*/	
		}else{
			$status_paym = '<p class="alert">Не оплачено</p>';
		}
	break;
	
	case 'sale':
		$rew01 = $proc->by_label('cashier');
		$rew_url = '/'.$rew01['url'].'/'.$proc->make_url($proc->url[2]).'/'.urlencode(zakaz.'_'.$_SESSION['insert_id']);
		//echo $rew_url;
		if($_SESSION['insert_id']){
			header("Location: ".$rew_url);
		}

		if($_SESSION['ok_form']){
			echo 'ID: '.$_SESSION['insert_id'];
		}
		
		//echo '<br />продажа ложи<br />';

		//ech($proc->tabdata['events']);
		$event_id = $proc->tabdata['events'][0]['row_id'];
		$datevent = $proc->tabdata['events'][0]['datevent'];
		$guests = $proc->tabdata['events'][0]['guests'];
	
		$lod = explode(' ', $proc->url[3]);
		$lod = array_reverse($lod);
		$lod_num = $lod[0];
		$proc->mod['filter'] = 'numb = "'.$lod_num.'"';
		$proc->mod['index'] = 1;
		$proc->mod['limit'] = 1;
		$proc->fetch('lodges');
		$lod_id = $proc->tabdata['lodges'][0]['row_id'];
		$typelodge = $proc->tabdata['lodges'][0]['typelodge'];
		
		$proc->mod['filter'] = 'lodgenum = "'.$lod_id.'" AND event = "'.$event_id.'"';
		//echo $proc->mod['filter'].'<br />';
		$proc->mod['index'] = 1;
		$proc->mod['limit'] = 1;
		$proc->fetch('orders');
		$ordered_lod = $proc->tab['orders']['qty'];
		
		$proc->mod['filter'] = 'id_lodge = "'.$lod_id.'" AND id_event = "'.$event_id.'"';
		//echo $proc->mod['filter'].'<br />';
		$proc->mod['index'] = 1;
		//$proc->mod['limit'] = 1;
		$proc->fetch('link_event_lodge');
		//ech($proc->tabdata['link_event_lodge']);
		$link_id = $proc->tabdata['link_event_lodge'][0]['row_id'];
		$pricekop = $proc->tabdata['link_event_lodge'][0]['pricekop'];
		//$ordered_lod = $proc->tab['orders']['qty'];
		//ech($proc->tabdata['link_event_lodge']);
		
		$form00 = '<form action="[{post}]" method="post" name="sold">
		'.($pricekop/100).' рублей.
		<input name="event" type="hidden" value="'.$event_id.'" />
		<input name="userid" type="hidden" value="'.$_SESSION['user_id'].'" />
		<input name="lodgenum" type="hidden" value="'.$lod_id.'" />
		<input name="linklodge" type="hidden" value="'.$link_id.'" />
		<input name="pricelodge" type="hidden" value="'.$pricekop.'" />
		<input name="dateorder" type="hidden" value="'.$datevent.'" />
		<input name="guests" type="hidden" value="'.$guests.'" />
		<input name="typelodge" type="hidden" value="'.$typelodge.'" />
		<input name="payd" type="hidden" value="'.date(YmdHis).'" />
		<input name="payment" type="hidden" value="1" />
		<input name="user" type="hidden" value="0" />
		<input name="salecash" type="submit" value="Продать" /></form>';
		
		echo $form00;
		//echo '<br />sess OK: '.$_SESSION['ok_form'].'<br />';
	break;
}

//ech($proc->tabdata['orders']);
//echo 'Ложа: '.$lod_id.'<br />'.$status_paym;
//echo '<div id="mon01">000</div>';
break;
}
echo '<div id="test001" class="lightbox" align="center"><div class="lightdiv">
<input name="reset" type="button" value="Очистить" id="reset"/>
<input name="cancel" type="button" value="Отмена" id="cancel"/>
</div>
</div>';

//echo '3: '.$proc->url['qty'];
echo $_SESSION['sys_tmp']['message'];
//dropsess(droplist);
?>
