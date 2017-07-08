<?
$proc->mod['filter'] = 'scriptype="html" and label="'.$proc->sys['url']['last'].'"';
//echo $proc->mod['filter'];
$proc->mod['index'] = 1;
$proc->fetch('sys_scripts');

$_SESSION['KCFINDER'] = array();
$_SESSION['KCFINDER']['disabled'] = false;
$_SESSION['KCFINDER']['uploadURL'] = "/images";
/*
$_SESSION['KCFINDER']['uploadDir'] = "";
$_SESSION['KCFINDER']['types'] = array();
$_SESSION['KCFINDER']['types']['images'] = '';
*/
echo '<br />
<form method="post" action="[{post}]">
<input type="hidden" name="wysiwyg" value="9yf890g80g08g7">
<input type="hidden" name="label" value="'.$proc->sys['url']['last'].'">
<input type="hidden" name="row_id" value="'.$proc->tabdata['sys_scripts'][0]['row_id'].'">
<textarea id="editor1" name="scrip">'.$proc->tabdata['sys_scripts'][0]['scrip'].'</textarea>
</form>

<script type="text/javascript">
	CKEDITOR.replace( \'editor1\',
    {
		filebrowserBrowseUrl : \'/ckbrowse/\',
		filebrowserImageBrowseUrl : \'/ckbrowse/?type=Images\',
        filebrowserUploadUrl : \'/ckupload/\',
        filebrowserImageUploadUrl : \'/ckupload/?type=Images\'
    });
	
	
</script>

';
?>
<!--
filebrowserBrowseUrl : \'/kcfinder/browse.php\',
filebrowserImageBrowseUrl : \'/kcfinder/browse.php?type=Images\',
filebrowserBrowseUrl : \'/filebrowser\',
filebrowserImageBrowseUrl : \'/filebrowser/?type=Images\',
filebrowserBrowseUrl : \'/ckbrowse/\',
filebrowserImageBrowseUrl : \'/ckbrowse/?type=Images\',
filebrowserUploadUrl : \'/uploader/upload.php\',
filebrowserImageUploadUrl : \'/uploader/upload.php?type=Images\'
<input type="submit" name="asd123" value="976r8f88f9" class="btn btn-info">
-->