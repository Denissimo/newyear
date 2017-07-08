<?
$proc->mod['index'] = 1;
$proc->fetch('sys_scripts');
$scrip = '<select name="scrip" class="span5"><option value="">None</option>';
for($i=0; $i<$proc->tab['sys_scripts']['qty']; $i++){
	$scrip.= '<option value="'.$proc->tabdata['sys_scripts'][$i]['label'].'">'.$proc->tabdata['sys_scripts'][$i]['label'].'</option>';
}
$scrip.='</select>';


$proc->mod['index'] = 1;
$proc->mod['filter'] = 'temptype="page"';
$proc->fetch('sys_temps');
$temps = '<select name="template" class="span5">';
for($i=0; $i<$proc->tab['sys_temps']['qty']; $i++){
	$temps.= '<option value="'.$proc->tabdata['sys_temps'][$i]['label'].'">'.$proc->tabdata['sys_temps'][$i]['label'].'</option>';
}
$temps.='</select>';

$form00 = '<div align="center"><form action="[{post}]" method="post" name="chpuadd"> 
<table class="span10" border="0">
<tr><td class="span5">

<label>Address</label><input name="address" type="text" value="[P<address>]" maxlength="75" class="span5"> 
<label>Label</label><input name="label" type="text" value="[<label>]" size="32" maxlength="75" class="span5"> <br />
<label>PHP File</label><input name="phpfile" type="text" value="[<phpfile>]" size="32" maxlength="75" class="span5"> <br />
<label>h1</label><input name="h1" type="text" value="[<h1>]" size="32" maxlength="255" class="span5"> <br />
<label>Header</label><textarea name="header" rows="2" class="span5">[<header>]</textarea><br />

</td><td class="span5">

<label>Script</label>'.$scrip.'<br />
<label>Template</label>'.$temps.'<br />
<label>Address Extension</label><select name="level" class="span5">
<option value="">Disabled</option>
<option value="1">Enabled</option>
</select><br />

<label>Accessibility</label><select name="access" class="span5">
<option value="0">No access</option>
<option value="1" selected="selected">Publuc access</option>
<option value="2">Special access</option>
</select><br />

<label>Do not index</label><select name="index" class="span5">
<option value="0" selected="selected">False</option>
<option value="1">True</option>

</select><br />
</td></tr>
<tr><td colspan="2" align="center">


<label>Title</label><textarea name="title" rows="4" class="span10">[P<title>]</textarea><br />
<label>Keywords</label><textarea name="keywords" rows="4" class="span10">[<keywords>]</textarea><br />
<label>Description</label><textarea name="description" rows="4" class="span10">[<description>]</textarea><br />
<input name="typeuser" type="hidden" value="1">
<div class="row" align="center">
<button name="chpu_add" type="submit" value="1" class="btn btn-primary span10"><i class="icon-heart icon-white"></i> OK</button>
</div>

</td></tr>

</table>


</form></div>';


echo $form00;


//echo $_SESSION['sys_tmp']['message'];
//echo $proc->tabdata['sys_forms']['addevent']['forms'];
//dropsess(droplist);
?>