<?
$proc->mod['index']=1;
$proc->mod['limit']=1;
$proc->mod['filter'] = 'label = "'.$proc->sys['url']['list'][1].'"';
//echo '<br>'.$proc->mod['filter'].'<br>';
$proc->fetch('sys_scripts');
?>
<script type="text/javascript" charset="utf-8">
     $().ready(function() {
        var opts = {
            lang         : 'ru',   // set your language
            styleWithCSS : false,
            height       : 400,
            toolbar      : 'maxi'
        };
        // create editor
        $('#textarea_1').elrte(opts);
 
         // or this way
         // var editor = new elRTE(document.getElementById('our-element'), opts);
     });
</script>


<div align="center">
<form action="/post" method="post">
<input type="hidden" name="row_id" value="<? echo $proc->tabdata['sys_scripts'][0]['row_id']; ?>">
<textarea id="textarea_1" name="scrip" rows="25" class="span11">
<?
echo $proc->tabdata['sys_scripts'][0]['scrip'];
?>

</textarea>
<button name="elrte" value="1" type="submit" class="btn btn-info">Поехали</button>
</form></div>


