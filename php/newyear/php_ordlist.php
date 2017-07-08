<?
	$proc->mod['order'] = 'row_id DESC';
	$ordlist = $cont->load_cont('ny_orders', 'ordertable');
	echo '<table class="table table-striped">
	<tr><th>Номер</th><th>Фамилия</th><th>Имя</th><th>Дата</th><th>Телефон</th><th>Емайл</th><th>Размещено</th><th>Прочее</th></tr>
	'.$ordlist.'
	</table>';
?>
<!--
<table class="table table-striped">
<tr><th>Номер</th><th>Фамилия</th><th>Имя</th><th>Дата</th><th>Телефон</th><th>Емайл</th><th>Размещено</th><th>Прочее</th></tr>
<tr><td>[>row_id<]</td><td>[>surname<]</td><td>[>firstname<]</td><td>[>orderdate<]</td><td>[>phone<]</td><td><a href="mailto:[>email<]">[>email<]</a></td><td>[>datetime<]</td><td>[>other<]</td></tr>
<tr><td>row_id</td><td>surname</td><td>firstname</td><td>orderdate</td><td>phone</td><td><a href="mailto:email">email</a></td><td>datetime</td><td>other</td></tr>
<tr><td>row_id</td><td>surname</td><td>firstname</td><td>orderdate</td><td>phone</td><td><a href="mailto:email">email</a></td><td>datetime</td><td>other</td></tr>
<tr><td>row_id</td><td>surname</td><td>firstname</td><td>orderdate</td><td>phone</td><td><a href="mailto:email">email</a></td><td>datetime</td><td>other</td></tr>
<tr><td>row_id</td><td>surname</td><td>firstname</td><td>orderdate</td><td>phone</td><td><a href="mailto:email">email</a></td><td>datetime</td><td>other</td></tr>

</table>
-->