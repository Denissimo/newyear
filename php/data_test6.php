<?

include "/classes/cls_content.php";
$cont = new mcontent();

ob_start();
echo '&copy;';
$stri2 =  ob_get_clean();

//echo $resul;
echo '<br />';
echo $stri2;

//echo 'ж'.chr(230);
?>