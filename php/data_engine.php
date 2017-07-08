<?

switch($proc->sys['url']['qty']){
	case 1:
	$proc->mod['order'] = 'row_id';
	$proc->mod['index'] = 1;
	$proc->fetch('sys_urls');
	
	$proc->mod['filter'] = 'scriptype = "html"';
	$proc->fetch('sys_scripts');
	
	//ech($proc->tabdata['sys_scripts']);
	//ech($proc->tabdata['sys_urls']);
	//$proc->lab=1;
	//ech($proc->chpu_par['address']);
	//ech(array_colum($proc->chpu_tab['indep'], 'address'));
	
	$tab00 = '<table class="table">';
	for($i=0; $i<$proc->tab['sys_urls']['qty']; $i++){
		/*$formdel = '<form action="[{post}]" method="post"><input type="hidden" name="row_id" value="'.$proc->tabdata['sys_urls'][$i]['row_id'].'"><button name="chpu_del" type="submit" value="1" class="btn btn-micro btn-danger mar0"><span class="icon-remove icon-white"></span></button></form>';*/
		$scr_lab = $proc->tabdata['sys_scripts'][$proc->tabdata['sys_urls'][$i]['scrip']]['label'];
		if($scr_lab){
			$ck_ico = '<a href="[{wysiwyg}]/'.$proc->tabdata['sys_urls'][$i]['scrip'].'/"><span class="glyphicon glyphicon-edit"></span></a>';
			$ty_ico = '<a href="[{tinymce}]/'.$proc->tabdata['sys_urls'][$i]['scrip'].'/"><span class="glyphicon glyphicon-edit"></span></a>';
		}else{
			$ck_ico = '&nbsp;';
			$ty_ico = '&nbsp;';
		}
		$formdel .= '<div id="enginedel'.$proc->tabdata['sys_urls'][$i]['row_id'].'" class="lightbox" align="center"><div class="lightdiv">'.sure.'<form action="[{post}]" method="post"><input type="hidden" name="row_id" value="'.$proc->tabdata['sys_urls'][$i]['row_id'].'"><button name="chpu_del" type="submit" value="1" class="btn btn-micro btn-danger mar0"><i class="icon-remove icon-white"></i>да</button></form></div></div>';
		$linkdel = '<a href="#" rel="enginedel'.$proc->tabdata['sys_urls'][$i]['row_id'].'" class="lightbut"><button name="chpu_del" type="submit" value="1" class="btn btn-link redcol"><span class="glyphicon glyphicon-remove"></span></button></a>';
		$formedit = '<a href="[{engine}]/'.$proc->tabdata['sys_urls'][$i]['label'].'/"><button name="chpu_ed" class="btn btn-link"><span class="glyphicon glyphicon-wrench"></span></button></a>';
		//btn btn-micro btn-info mar0
		//<td><a href="'.$proc->tabdata['sys_urls'][$i]['address'].'">'.$proc->tabdata['sys_urls'][$i]['address'].'</a></td>

		$tab00.='<tr>
		<td>'.$formedit.'</td>
		<td>'.$i.'</td>
		<td>'.$proc->tabdata['sys_urls'][$i]['label'].'</td>
		<td><a href="[{'.$proc->tabdata['sys_urls'][$i]['label'].'}]">:'.$proc->tabdata['sys_urls'][$i]['address'].'</a></td>
		<td>'.$proc->tabdata['sys_urls'][$i]['phpfile'].'</td>
		<td><a href="[{scriptedit}]/'.$proc->tabdata['sys_urls'][$i]['scrip'].'/">'.$proc->tabdata['sys_urls'][$i]['scrip'].'</a></td>
		<td>'.$ck_ico.'</td>
		<td>'.$ty_ico.'</td>
		<td>'.$proc->tabdata['sys_urls'][$i]['template'].'</td>
		<td>'.$proc->tabdata['sys_urls'][$i]['access'].'</td>
		<td>'.$proc->tabdata['sys_urls'][$i]['level'].'</td>
		<td>'.$proc->tabdata['sys_urls'][$i]['header'].'</td>
		<td>'.$linkdel.'</td>
		</tr>';
	}
	$tab00.='</table>';
	
	echo '<a href="[{chpuadd}]">Добавить раздел</a> | <a href="[{scriptadd}]">Добавить скрипт</a><br />';
	echo $formdel.$tab00;
	break;
	
	case 2:
	$curlab = str_replace(' ', '_', $proc->sys['url']['list'][1]);
	//echo '<br />'.$curlab.'<br />';
	$proc->mod['index'] = 1;
	$proc->mod['filter'] = 'label = "'.$curlab.'"';
	$proc->mod['limit'] = 1;
	$proc->fetch('sys_urls');
	
	//ech($proc->tabdata['sys_urls'][0]);
	/*
	foreach($proc->tabdata['sys_urls'][0] as $key=>$value){
		$proc->tabdata["sys_content"][$key]["content"] = $value;
	}
	*/
	$_SESSION['sys_tmp']['POST'] = $proc->tabdata['sys_urls'][0];
	//ech($_SESSION['sys_tmp']['POST']);
	$proc->mod['index'] = 1;
	$proc->fetch('sys_scripts');
	$scrip = '<select name="scrip" class="form-control col-md12"><option value=" ">None</option>';
	for($i=0; $i<$proc->tab['sys_scripts']['qty']; $i++){
		if($proc->tabdata['sys_scripts'][$i]['label']==$proc->tabdata['sys_urls'][0]['scrip']){
			$sel = ' selected="selected"';
		}else{
			$sel = '';
		}
		$scrip.= '<option value="'.$proc->tabdata['sys_scripts'][$i]['label'].'"'.$sel.'>'.$proc->tabdata['sys_scripts'][$i]['label'].'</option>';
	}
	$scrip.='</select>';
	
	
	$proc->mod['index'] = 1;
	$proc->mod['filter'] = 'temptype="page"';
	//$proc->mod['filter'] = 'temptype, label"';
	$proc->fetch('sys_temps');
	//ech($proc->tabdata['sys_temps'][9]['label']);
	$temps = '<select name="template" class="form-control col-md12">';
	for($i=0; $i<$proc->tab['sys_temps']['qty']; $i++){
		if($proc->tabdata['sys_temps'][$i]['label']==$proc->tabdata['sys_urls'][0]['template']){
			$sel = ' selected="selected"';
		}else{
			$sel = '';
		}
		$temps.= '<option value="'.$proc->tabdata['sys_temps'][$i]['label'].'"'.$sel.'>'.$proc->tabdata['sys_temps'][$i]['label'].'</option>';
	}
	$temps.='</select>';
	
	unset($accs);
	if($proc->tabdata['sys_urls'][0]['access']){
		$accs[$proc->tabdata['sys_urls'][0]['access']] = ' selected = "selected"';
	}

	unset($levl);
	if($proc->tabdata['sys_urls'][0]['level']){
		$levl[$proc->tabdata['sys_urls'][0]['level']] = ' selected = "selected"';
	}
	//echo $proc->tabdata['sys_urls'][0]['level'];
	unset($indx);
	if($proc->tabdata['sys_urls'][0]['noindex']){
		$indx[$proc->tabdata['sys_urls'][0]['noindex']] = ' selected = "selected"';
	}
	
	unset($comm);
	if($proc->tabdata['sys_urls'][0]['comments']){
		$comm[$proc->tabdata['sys_urls'][0]['comments']] = ' selected = "selected"';
	}
	//ech($proc->sys['config']['maxlevels']['val']);
	for($icom=2; $icom<=$proc->sys['config']['maxlevels']['val']; $icom++){
		$comopt.='<option value="'.$icom.'"'.$comm[$icom].'>Link to level '.$icom.'</option>
	';
	}
	//ech($indx);
	//<input name="header" type="text" value="[>header<]" size="32" maxlength="64" class="span5">
	$form00 = '<div align="center"><form action="[{post}]" method="post" name="chpuedit"> 
	<table class="col-md12" border="0">
	<tr><td class="col-md6" style="width:480px;">
	
	<label>Address</label><input name="address" type="text" value="[<address>]" maxlength="75" class="form-control col-md12" > 
	<label>Label</label><input name="label" type="text" value="[<label>]" size="32" maxlength="75" class="form-control col-md12"> <br />
	<label>PHP File</label><input name="phpfile" type="text" value="[<phpfile>]" size="32" maxlength="75" class="form-control col-md12"> <br />
	<label>h1</label><input name="h1" type="text" value="[<h1>]" size="32" maxlength="255" class="form-control col-md12"> <br />
	<label>Header</label><textarea name="header" rows="6" class="form-control col-md12">[<header>]</textarea><br />
	
	</td><td style="width:50px;">
	</td><td class="col-md6" style="width:480px;">
	
	<label>Script</label>'.$scrip.'<br />
	<label>Template</label>'.$temps.'<br />
	<label>Address Extension</label><select name="level" class="form-control col-md12">
	<option value="1"'.$levl[1].'>Disabled</option>
	<option value="2"'.$levl[2].'>Enabled</option>
	</select><br />
	
	<label>Accessibility</label><select name="access" class="form-control col-md12">
	<option value="0"'.$accs[0].'>No access</option>
	<option value="1"'.$accs[1].'>Publuc access</option>
	<option value="2"'.$accs[2].'>Special access</option>
	</select><br />
	
	<label>Do not index</label><select name="noindex" class="form-control col-md12">
	<option value="0"'.$indx[0].'>False</option>
	<option value="1"'.$indx[1].'>True</option>
	
	</select><br />
	
	<label>Comments</label><select name="comments" class="form-control col-md12">
	<option value="0"'.$comm[0].'>Disabled</option>
	<option value="1"'.$comm[1].'>Link to whole section</option>
	'.$comopt.'
	</select><br />
	
	</td></tr>
	<tr><td colspan="3" align="center">
	
	
	<label>Title</label><textarea name="title" rows="4" class="form-control col-md10">'.$proc->tabdata['sys_urls'][0]['title'].'</textarea><br />
	<label>Keywords</label><textarea name="keywords" rows="4" class="form-control col-md10">'.$proc->tabdata['sys_urls'][0]['keywords'].'</textarea><br />
	<label>Description</label><textarea name="description" rows="4" class="form-control col-md10">'.$proc->tabdata['sys_urls'][0]['description'].'</textarea><br />
	<input name="row_id" type="hidden" value="'.$proc->tabdata['sys_urls'][0]['row_id'].'">
	<div class="row" align="center">
	<button name="chpu_edit" type="submit" value="1" class="btn btn-primary col-md10"><span class="icon-heart icon-white"></span> OK</button>
	</div>
	
	

	
	
	</td></tr>
	
	</table>
	
	
	</form>
	

	
	
	
	
	
	</div>';
	echo $form00;
	
	break;
}


//ech($proc->tabdata);
//ech($proc->sys);


//echo $_SESSION['sys_tmp']['message'];

//echo $proc->tabdata['sys_forms']['addevent']['forms'];
//dropsess(droplist);
?>
<div align="center">
	
	
	 <!-- Button trigger modal -->
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
          Launch demo modal
        </button>
        
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
              </div>
              <div class="modal-body">
                ...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
	
	


</div>