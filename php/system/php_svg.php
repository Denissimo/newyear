<?

echo '
<div class="container-fluid">
	<svg class="col-md-12 svgdown h600">
	<line class="line1" x1="0" y1="0" x2="200" y2="200" stroke-width="1" stroke="rgb(0,80,0)"/>
	<rect class="rect1" x="203" y="50" width="200" height="200" style="fill:slategrey; stroke:black; stroke-width:3; -webkit-transform: rotate(45deg);"/>
	</svg>
	<div class="svgup col-md-12 h600"><div class="red w200 h150 drag">&nbsp;</div></div>
</div>
';
//echo '';
$enter = '$calc = 3+12*(4-2)/2; echo $calc;';
$exit = eval($enter);
echo $exit;
?>