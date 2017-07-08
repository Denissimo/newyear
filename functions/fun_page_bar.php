<?
function page_bar($real, $pager){
global $endpag, $begpag, $pages, $depag;

	//$linkurl=$_SERVER['PHP_SELF'];

	
	$linkurl="/%D0%94%D0%BE%D1%81%D1%82%D0%B0%D0%B2%D0%BA%D0%B0_%D1%86%D0%B2%D0%B5%D1%82%D0%BE%D0%B2";
	
	$pages=ceil($real/$pager);
	
	if($depag){
		$_SESSION['current_page']=$depag;
	}
	if($_SESSION['current_page']>$pages){
	$_SESSION['current_page']=$pages;
	}
	
	if(!$_SESSION['current_page']){
	$_SESSION['current_page']=1;
	}

	$endpag=$_SESSION['current_page']*$pager;
	$begpag=$endpag-$pager;
	if($endpag>$real){
	$endpag=$real;
	}

	if($_SESSION['current_page']==1){
		$a3='<<<<';
		$firstpag='(нач.)&nbsp;[1]';
	}else{
		
		
		$a3='<a href="'.$linkurl.'/%D0%B1%D1%83%D0%BA%D0%B5%D1%82%D1%8B_'.($_SESSION['current_page']-1).'/"  class="menugreen"><<<<</a>';
		$firstpag='<a href="'.$linkurl.'/%D0%B1%D1%83%D0%BA%D0%B5%D1%82%D1%8B_1/" class="menugreen">(нач.)&nbsp;[1]</a>';
	}
	if($_SESSION['current_page']>=$pages){
		$a4='>>>>';
		$lastpag='['.$pages.']&nbsp;(кон.)';
	}else{
		$a4='<a href="'.$linkurl.'/%D0%B1%D1%83%D0%BA%D0%B5%D1%82%D1%8B_'.($_SESSION['current_page']+1).'/" class="menugreen">>>>></a>';
		$lastpag='<a href="'.$linkurl.'/%D0%B1%D1%83%D0%BA%D0%B5%D1%82%D1%8B_'.$pages.'/" class="menugreen">['.$pages.']&nbsp;(кон.)</a>';
	}
	$bar_show ='<center>'.$firstpag.'&nbsp;&nbsp;&nbsp;'.$a3;
	$pk=15;
	if($_SESSION['current_page']>$pk){
	$startpage=$_SESSION['current_page']-$pk;
	}else{
	$startpage=1;
	}
	if($_SESSION['current_page']+$pk>$pages){
	$endpage=$pages;
	}else{
	$endpage=$_SESSION['current_page']+$pk;
	}
	
	for($pag=$startpage;$pag<=$endpage;$pag++){
		if($_SESSION['current_page']==$pag){
			$a2='&nbsp;&nbsp;'.$pag;
		}
		else{
			$a2='&nbsp;&nbsp;<a href="'.$linkurl.'/%D0%B1%D1%83%D0%BA%D0%B5%D1%82%D1%8B_'.$pag.'/" class="menugreen">'.$pag.'</a>';
			}
		$bar_show.=$a2;
	}
	$bar_show.='&nbsp;&nbsp;'.$a4.'&nbsp;&nbsp;&nbsp;'.$lastpag.'</center>';

	
	return $bar_show;
}

?>