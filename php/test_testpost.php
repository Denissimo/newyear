<?
$asdf = 'as';
$$asdf = 'рпа';
echo '<br />as: '.$as;
echo '<br />>as: '.$$as;
echo '<br />asdf: '.$asdf;
echo '<br />';
/*
include '/excel/Classes/PHPExcel.php';
include '/excel/Classes/PHPExcel/Writer/Excel2007.php';
echo date('H:i:s') . "<br />Create new PHPExcel object\n";
$objPHPExcel = new PHPExcel();
$se = session_id();
echo '<br />seSS: '.$se.'<br />';

// Set properties
echo date('H:i:s') . "<br />Set properties\n";
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw");
$objPHPExcel->getProperties()->setLastModifiedBy("Maarten Balliauw");
$objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
$objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
$objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.");
// Add some data
echo date('H:i:s') . "<br />Add some data\n";
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Hello');
$objPHPExcel->getActiveSheet()->SetCellValue('B2', 'world!');
$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Hello');
$objPHPExcel->getActiveSheet()->SetCellValue('D2', 'world!');
$objPHPExcel->getActiveSheet()->SetCellValue('E1', 1);
$objPHPExcel->getActiveSheet()->SetCellValue('E2', '=E1+1');
// Rename sheet
echo date('H:i:s') . "<br />Rename sheet\n";
$objPHPExcel->getActiveSheet()->setTitle('Simple');
// Save Excel 2007 file
echo date('H:i:s') . "<br />Write to Excel2007 format\n";
$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
//$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
$objWriter->save('hello.xlsx');
// Echo done
echo date('H:i:s') . "<br /> Done writing file.\r\n";

*/
//phpinfo();
//$range = $proc->pageread('page ', 9, 1);
//echo $range;

//ech($proc->sys['url']['list']);
//$proc->mod['range'] = $range;
//$proc->fetch('sys_users');
//ech($proc->tabdata['sys_users']);

//$cont->proc->mod['limit'] = 3;
$proc->mod['filter'] = 'row_id>111';
$testpl = 'RFID: [>rfid<], Firstname:[>firstname<]<br>';

$tmp = $cont->load_cont('sys_urls', 'adrtab');
echo '<table border="1">';
echo $tmp;
echo '</table>';

echo '
<form action="[{post}]" role="form" method="post">
<input type="text" name="testedit" value="[<testedit>]">
<input type="hidden" name="testhid" value="321">
<br /><input name="testpost" type="submit" value="OK" class="btn btn-info">

</form><br />
[>pagination<]

';

?>