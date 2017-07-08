<?
ech($_GET);

?>
<form action="/wysiwyg/tesst/" method="get" target="_parent">
<input name="fileUrl" type="hidden" value="images/1369045287_0_d27a3_a7c8a824_orig.jpg" />
<input name="ckbrowsub" type="submit" value="OK" />
</form>

<script language="javascript">
function getUrlParam( paramName ) {
    var reParam = new RegExp( '(?:[\?&]|&)' + paramName + '=([^&]+)', 'i' ) ;
    var match = window.location.search.match(reParam) ;

    return ( match && match.length > 1 ) ? match[ 1 ] : null ;
}
var funcNum = getUrlParam( 'CKEditorFuncNum' );
var fileUrl = '/images/1369045287_0_d27a3_a7c8a824_orig.jpg';
window.opener.CKEDITOR.tools.callFunction( funcNum, fileUrl );

</script>