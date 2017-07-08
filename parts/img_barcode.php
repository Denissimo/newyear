<?
session_start();
$barcode='4601111111111';
$ean_num=13;
$base_wid=2;
$wid=110*$base_wid;
$hei=40*$base_wid;
$d_left=10*$base_wid;
$d_right=5*$base_wid;
$d_top=5*$base_wid;
$d_bottom=5*$base_wid;
$d_font=7*$base_wid;
$d_dist=7*$base_wid;
$d_tall=7*$base_wid;
$left_bar='101';
$right_bar='101';
$center_bar='01010';

$back_r=255;
$back_g=255;
$back_b=255;
$font_r=0;
$font_g=0;
$font_b=0;
$font_show=1;

/*
$codes=array(
0 => '1110010', 
1 => '1100110', 
2 => '1101100', 
3 => '1000010', 
4 => '1011100', 
5 => '1001110', 
6 => '1010000', 
7 => '1000100', 
8 => '1001000', 
9 => '1110100'
);
*/

$ean13=array(
0 => 'LLLLLL',
1 => 'LLGLGG',
2 => 'LLGGLG',
3 => 'LLGGGL',
4 => 'LGLLGG',
5 => 'LGGLLG',
6 => 'LGGGLL',
7 => 'LGLGLG',
8 => 'LGLGGL',
9 => 'LGGLGL'
);

$ean['L'][0]='0001101';	$ean['R'][0]='1110010';	$ean['G'][0]='0100111';
$ean['L'][1]='0011001';	$ean['R'][1]='1100110';	$ean['G'][1]='0110011';
$ean['L'][2]='0010011';	$ean['R'][2]='1101100';	$ean['G'][2]='0011011';
$ean['L'][3]='0111101';	$ean['R'][3]='1000010';	$ean['G'][3]='0100001';
$ean['L'][4]='0100011';	$ean['R'][4]='1011100';	$ean['G'][4]='0011101';
$ean['L'][5]='0110001';	$ean['R'][5]='1001110';	$ean['G'][5]='0111001';
$ean['L'][6]='0101111';	$ean['R'][6]='1010000';	$ean['G'][6]='0000101';
$ean['L'][7]='0111011';	$ean['R'][7]='1000100';	$ean['G'][7]='0010001';
$ean['L'][8]='0110111';	$ean['R'][8]='1001000';	$ean['G'][8]='0001001';
$ean['L'][9]='0001011';	$ean['R'][9]='1110100';	$ean['G'][9]='0010111';

$control='1313131313131';

function numcont($num){
	global $ean_num, $control, $ean13, $ean;
	$res='';
	for($i=0; $i<($ean_num-1); $i++){
		$res+=$num[$i]*$control[$i];
	}
	$res1=$res+$num[$ean_num]*$control[$ean_num];
	$res2=$res;
	$cn=$res1%10;
	if($cn!=0){
		$cn=$res2%10;
		$cn2=10-$cn;
	}else{
		$cn2=0;
	}
	return $cn2;
	//echo 66%10;
	
}

$nn=numcont($barcode);

$barcode[12]=$nn;

//echo "<br />".$barcode;

function binarcode($bc){
	global $ean_num, $control, $ean13, $ean;
	
	$fin_code[0]='';
	$fin_code[1]='';
	
	for($i=1; $i<=6; $i++){
		$res_code=$ean[$ean13[$bc[0]][$i-1]][$bc[$i]];
		$fin_code[0].= $res_code;
		//echo "<br />".$i." ".$bc[$i]." ".$res_code;
	}
	
	for($i=7; $i<=12; $i++){
		$res_code=$ean['R'][$bc[$i]];
		$fin_code[1].= $res_code;
		//echo "<br />".$i." ".$bc[$i]." ".$res_code;
	}
	
	return($fin_code);
	
}

function draw_bar($cod, $x, $y, $types){
	global $im, $background_color, $text_color,  $base_wid, $wid, $hei, $d_left, $d_right, $d_top, $d_bottom, $d_font, $d_dist, $d_tall;
	$len=strlen($cod);
	//$cod=(string)$cod;
	for($i=0; $i<$len; $i++){
		$dx1=$dx2=$x+$i*$base_wid;
				
		//$dx1=$i;
		//$dx2=$i;
		$dy1=$d_top;
		if($types==1){
			$dy2=$y+$hei-$d_bottom;
		}else{
			$dy2=$y+$hei-$d_bottom-$d_tall;
		}
		if($cod[$i]==1){
			imageline ($im, $dx1, $dy1, $dx2, $dy2, $text_color);
		}else{
			imageline ($im, $dx1, $dy1, $dx2, $dy2, $background_color);
		}
		
		//echo "<br />".$dx1, " i: ".$i." ".$cod[$i];
	}
	//echo "<br />".strlen($cod);
}
$nb=binarcode($barcode);
//draw_bar($left_bar, $d_left, 0, 1);

//echo "<br />".$left_bar[2];
//echo "<br />".$nb[0][1];
//echo "<br />".$nb[1];

header("Content-type: image/png");
$im = @imagecreate($wid, $hei)
    or die("Cannot Initialize new GD image stream");
	
imageSetThickness($im, $base_wid);
$background_color = imagecolorallocate($im, $back_r, $back_g, $back_b);
$text_color = imagecolorallocate($im, $font_r, $font_g, $font_b);

draw_bar($left_bar, $d_left, 0, 1);
draw_bar($nb[0], $d_left+$base_wid*3, 0, 0);
draw_bar($center_bar, $d_left+$base_wid*45, 0, 1);
draw_bar($nb[1], $d_left+$base_wid*50, 0, 0);
draw_bar($right_bar, $d_left+$base_wid*92, 0, 1);

//imageline ($im, 10, 10, 10, 30, $text_color);

//imagestring($im, 10, 10, 7,  $_SERVER['HTTP_HOST'], $text_color);
imagepng($im);
imagedestroy($im);

?>