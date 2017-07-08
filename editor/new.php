<?
//ech($_SESSION['POST']);
$proc->mod['index']=1;
$proc->mod['limit']=1;
$proc->mod['filter'] = 'label = "'.$proc->sys['url']['list'][1].'"';
//echo '<br>'.$proc->mod['filter'].'<br>';
$proc->fetch('sys_scripts');

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
	,toolbar: "search, go_to_line, |, undo, redo, |, syntax_selection, |, select_font, |, change_smooth_selection, highlight, reset_highlight, |, help"
});
</script>

<div align="center">
<form action="[{post}]" method="post">
Метка:<input type="text" name="label" value="[<label>]" class="span10"><br />Содержимое скрипта:<br />

<textarea id="textarea_1" name="scrip" rows="25" class="span11">[<scrip>]</textarea>
<select name="scriptype">
	<option value="html">HTML/Javasctipt</option>
	<option selected value="php">PHP</option>
</select><br />
<button name="script_add" value="1" type="submit" class="btn btn-danger">Save</button>
</form></div>';



?>