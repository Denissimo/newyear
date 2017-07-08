<?
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://95.85.40.115:3000/site/client_info?telephone=9035634034');
curl_setopt($ch, CURLOPT_FAILONERROR, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); // указываем, что результат запроса следует передать в переменную, а не вывести на экран
curl_setopt($ch, CURLOPT_TIMEOUT, 60); // таймаут соединения
print_r($ch); 
$res001 = json_decode(curl_exec($ch));
curl_close($ch); // завершаем сессию
echo '<br>++++<br>';
echo '>>>'.is_object($res001);
echo '<br>++++<br>';
echo '<pre>';
print_r($res001);
echo '</pre>';


echo "Главная страница процессинговой системы+++";
 
echo '<br /><a href="#" class="lightbut" rel="test001">гриб</a><br /><br /><br />
 
<div id="test001" class="lightbox"><p>
<img src="/imag/coca.gif" width="235" height="320"/><br />
<a href="#" class="lightclose" rel="test001">x</a></p>
</div>
 
<br /><a href="#" class="lightbut" rel="test001">паук</a><br /><br /><br />
 
';
 
echo ($proc->fill_url('//'));
 
 
//echo $_SESSION['message'];
//dropsess(droplist);
 
ech($_POST);
 
echo '<form action="/" method="post">
<input type="hidden" name="var1" value="toad">
<button type="submit" name="var007" value="asdf" class="btn btn-link">
<i class="icon-fire icon-garden"></i></button>
</form>';
 
echo '
<div class="btn-toolbar">
  <div class="btn-group">
    <button class="btn btn-info">1</button>
    <button class="btn btn-info">2</button>
    <button class="btn btn-info disabled">3</button>
    <button class="btn btn-info">4</button>
  </div>
</div>
 
<div class="pagination pagination-mini">
  <ul>
    <li><a href="/%D0%90%D0%B4%D0%BC%D0%B8%D0%BD%D0%B8%D1%81%D1%82%D1%80%D0%B0%D1%82%D0%BE%D1%80">Prev</a></li>
    <li><a href="/%D0%90%D0%B4%D0%BC%D0%B8%D0%BD%D0%B8%D1%81%D1%82%D1%80%D0%B0%D1%82%D0%BE%D1%80">1</a></li>
    <li><a href="/%D0%90%D0%B4%D0%BC%D0%B8%D0%BD%D0%B8%D1%81%D1%82%D1%80%D0%B0%D1%82%D0%BE%D1%80">2</a></li>
    <li class="disabled"><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li><a href="#">Next</a></li>
  </ul>
</div>
';
 
echo '
<a href="/%D0%90%D0%B4%D0%BC%D0%B8%D0%BD%D0%B8%D1%81%D1%82%D1%80%D0%B0%D1%82%D0%BE%D1%80"><button class="btn btn-warning">next</button></a>
 
';
//ech($proc->sys);
$proc->mod["range"]='45:60';
$proc->fetch('sys_users');
//ech($proc->tabdata['sys_users']);
//ech($proc->tabdata['sys_content']);
$tag = 'DSBL';
$tag = str_replace('DSBL', 'class="disabled"', $tag);
//echo $tag;
echo '[>pagination<]';
?>