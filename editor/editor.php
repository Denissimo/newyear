<?
$proc->mod['index']=1;
$proc->mod['limit']=1;
$proc->mod['filter'] = 'label = "'.$proc->sys['url']['list'][1].'"';
//echo '<br>'.$proc->mod['filter'].'<br>';
$proc->fetch('sys_scripts');
$scriptype = $proc->tabdata['sys_scripts'][0]['scriptype'];
$$scriptype = 'selected';
$content = $proc->tabdata['sys_scripts'][0]['scrip'];
$content = str_replace('[', '&#91;', $content);
$content = str_replace(']', '&#93;', $content);
echo '
<script language="javascript" type="text/javascript" src="/editor/edit_area/edit_area_full.js"></script>
<script language="javascript" type="text/javascript">
editAreaLoader.init({
	id : "textarea_1"		// textarea id
	,syntax: "css"			// syntax to be uses for highgliting
	,start_highlight: true		// to display with highlight mode on start-up
	,allow_resize: "both"
	,allow_toggle: true
	,word_wrap: true
	,language: "en"
	,syntax: "php"	
	,toolbar: "charmap, |, search, go_to_line, |, undo, redo, |, syntax_selection, |, select_font, |, change_smooth_selection, highlight, reset_highlight, |, help"
});
</script>

<div align="center">
<form action="[{post}]" method="post">
<input type="hidden" name="row_id" value="'.$proc->tabdata['sys_scripts'][0]['row_id'].'">
<input type="hidden" name="label" value="'.$proc->tabdata['sys_scripts'][0]['label'].'">
<textarea id="textarea_1" name="scrip" rows="25" class="span11">'.$content.'
</textarea>
<select name="scriptype">
	<option '.$html.' value="html">HTML/Javasctipt</option>
	<option '.$php.' value="php">PHP</option>
</select><br />
<button name="script_edit" value="1" type="submit" class="btn btn-info">Save</button>
</form></div>';
