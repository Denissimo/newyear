<?
$proc->mod['filter'] = 'scriptype="html" and label="'.$proc->sys['url']['last'].'"';
//echo $proc->mod['filter'];
$proc->mod['index'] = 1;
$proc->fetch('sys_scripts');

echo '<br />
<script src="/tinymce/js/tinymce/tinymce.min.js"></script>
<script>
        tinymce.init({
		plugins: "link, image, fullscreen, textcolor, code",
		toolbar: "newdocument bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect | cut copy paste | bullist numlist | outdent indent blockquote | undo redo | removeformat subscript superscript | link image | fullscreen | forecolor backcolor | code",
   		selector:"#editor1",
		content_css: "/css/style.css",

		
		
		
		});
</script>

<form method="post" action="[{post}]">
<input type="hidden" name="wysiwyg" value="9yf890g80g08g7">
<input type="hidden" name="label" value="'.$proc->sys['url']['last'].'">
<input type="hidden" name="row_id" value="'.$proc->tabdata['sys_scripts'][0]['row_id'].'">
<textarea id="editor1" name="scrip" rows="22">'.$proc->tabdata['sys_scripts'][0]['scrip'].'</textarea>
</form>
';
?>
