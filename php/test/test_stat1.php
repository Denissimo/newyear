<?	

	echo($form->forms['imgload']);

	$a[0] = '-+++++++';
	$a[1] = '*********';
	$b = (array)$a;
	ech($b);
	$proc->probe++;
	echo $proc->probe;
	echo '<br /><a href="[{stat2}]">stat2</a>';
	$t = $cont->load_templ('li_paginator');
	//ech($proc->paginator);
	ech($proc->config['uploaddir']);
	ech(key($_FILES));
	$curfile = current($_FILES);
	ech($curfile);
	ech(gettype($curfile['size']));
	$size = getimagesize($curfile['tmp_name']);
	ech($size);

?>

 <h2><p><b> Форма для загрузки файлов </b></p></h2>
      <form action="/ckupload" method="post" enctype="multipart/form-data">
      <input type="file" name="upload"><br> 
      <input type="submit" value="Загрузить"><br>
      </form>
	  
	  <!-- Тип кодирования данных, enctype, ДОЛЖЕН БЫТЬ указан ИМЕННО так -->
<form enctype="multipart/form-data" action="/stat1" method="POST">
    <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    <!-- Название элемента input определяет имя в массиве $_FILES -->
    Отправить этот файл: <input name="userfile" type="file" value="Куку" class="btn btn-primary"/>
    <input type="submit" value="Send File" />
</form>

<form action="/stat1" method="post" enctype="multipart/form-data">
  Файлы:<br />
  <input name="userfile[]" type="file" /><br />
  <input name="userfile[]" type="file" /><br />
  <input type="submit" value="Отправить" />
</form>