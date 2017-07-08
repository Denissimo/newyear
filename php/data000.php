<?

/*
foreach($_SESSION as $key => $val){
		echo 'SESSION: '.$key.' = > '.$val.'<br />';
	}
	*/
echo "Главная страница процессинговой системы";

echo '<br /><a href="#" class="lightbut" rel="test001">гриб</a><br /><br /><br />

<div id="test001" class="lightbox"><p>
<img src="/imag/coca.gif" width="235" height="320"/><br />
<a href="#" class="lightclose" rel="test001">x</a></p>
</div>

<br /><a href="#" class="lightbut" rel="test001">гриб</a><br /><br /><br />

<br /><a href="#" class="lightbut" rel="test001">гриб</a><br /><br /><br />
';



ech($_SESSION);

echo $_SESSION['sys_tmp']['message'];
//dropsess(droplist);
?>
