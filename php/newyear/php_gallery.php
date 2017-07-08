<?
//ech($proc->sys['url']['list'][1]);
$prg = preg_match('/[А-Яа-яA-Za-z0-9\-\s]+/u', $proc->sys['url']['list'][1], $matches);
//ech($matches);

$proc->request = 'SELECT * FROM ny_gallery g LEFT JOIN ny_categs c ON g.cat_id = c.c_id WHERE c.category="'.$matches[0].'"';
//$proc->request = 'SELECT * FROM ny_gallery g WHERE g.cat_id=2';
$proc->mod['index'] = '1';
//ech($proc->request);
$gal = $proc->fetch('ny_gallery');
if($proc->tab['ny_gallery']['qty']>0){
	//ech($gal);
	$gal[0]['classactive'] = 'class="active"';
	$gal[0]['active'] = ' active';
	//$cont->test = 'gallery';
	$galer = $cont->load_cont($gal, 'nygalunit');
	//$cont->test = 'gallery2';
	$galiind = $cont->load_cont($gal, 'nyindicat'); //индикаторы
	$gallery = '<div id="carousel-example-generic" class="carousel slide text-center" data-ride="carousel">
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
		'.$galiind.'
	  </ol>

	  <!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
		'.$galer.'
		</div>

	  <!-- Controls -->
	  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	  </a>
	  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	  </a>
	</div>';
	echo $gallery;
}else{
	echo 'Нет данных';
}
?>