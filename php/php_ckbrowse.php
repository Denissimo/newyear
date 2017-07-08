<?
/*
ech($proc->sys['url']);
echo '<a href="/ckbrowse/?folder=images&type=Images&CKEditor=editor1&CKEditorFuncNum=3&langCode=ru">images</a><br />';
echo '<a href="/ckbrowse/?folder=Щачло&type=Images&CKEditor=editor1&CKEditorFuncNum=3&langCode=ru">rus</a><br />';
*/
$bro = new filebro($proc);
//$bro->cur_folder = 'images';
$res_files = $bro->scanfold();
		/*
		echo '<br />cur_folder: '.$bro->cur_folder;
		echo '<br />fullpath: '.$bro->fullpath;	
		echo '<br />cur_path: '.$bro->cur_path;	
		echo '<br />pict_path: '.$bro->pict_path;	
		echo '<br />local_path: '.$bro->local_path;
		echo '<br />up_path: '.$bro->up_path;	
		*/
/*
echo '<table class="browtab"><tr>
<td>'.$res_files['folder_table'].'<td>
<td>'.$res_files['pictures'].'<td>
</tr>
</table>
';
*/
//
echo '<div class="row">
<div class="span2 bootleft">'.$res_files['folder_table'].'</div>
<div class="span7 bootright">'.$res_files['pictures'].'</div>
</div>';

//ech($res_files['pictures']);

?>

<script language="javascript">
<?
//echo 'var full_path = "'.$bro->fullpath.'"';
?>
//alert('+++++++++++++++');
//$(this).dialog();
$('img.browthumb').css('height','100px');
$('img.browthumb').click(function(){
	//var pic_src;
	//browser.returnFile($(this));
	//pic_src = $(this).attr('src');
	var funcNum = getUrlParam( 'CKEditorFuncNum' );
	var fileUrl = $(this).attr('src');
	//alert(funcNum+' => '+ fileUrl);
	window.opener.CKEDITOR.tools.callFunction( funcNum, fileUrl );
	//$('#txt1').html(fileUrl);
	window.close();
});


function getUrlParam( paramName ) {
    var reParam = new RegExp( '(?:[\?&]|&)' + paramName + '=([^&]+)', 'i' ) ;
    var match = window.location.search.match(reParam) ;
    return ( match && match.length > 1 ) ? match[ 1 ] : null ;
}
//var funcNum = getUrlParam( 'CKEditorFuncNum' );
//var fileUrl = '/images/1369045287_0_d27a3_a7c8a824_orig.jpg';
//window.opener.CKEDITOR.tools.callFunction( funcNum, fileUrl );

</script>