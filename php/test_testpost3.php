<?
include '/excel/Classes/PHPExcel.php';
//include '/excel/Classes/PHPExcel/Writer/Excel2007.php';
$objPHPExcel = new PHPExcel();

//$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Name');
$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Qty');
$objPHPExcel->getActiveSheet()->SetCellValue('A2', 'Nick');
$objPHPExcel->getActiveSheet()->SetCellValue('A3', 'Berny');
$objPHPExcel->getActiveSheet()->SetCellValue('A4', 'Olga');
$objPHPExcel->getActiveSheet()->SetCellValue('B2', '120');
$objPHPExcel->getActiveSheet()->SetCellValue('B3', '15');
$objPHPExcel->getActiveSheet()->SetCellValue('B4', '62');

$sheet = $objPHPExcel->getActiveSheet();

$dataseriesLabels1 = array(
	new PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$A$1', NULL, 1),	
);

$xAxisTickValues1 = array(
	new PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$A$2:$A$4', NULL, 3),	
);
//ech($xAxisTickValues1);

$dataSeriesValues1 = array(
	new PHPExcel_Chart_DataSeriesValues('Number', 'Worksheet!$B$2:$B$4', NULL, 3),
);

$series1 = new PHPExcel_Chart_DataSeries(
	PHPExcel_Chart_DataSeries::TYPE_PIECHART_3D,				// plotType
	NULL,
	//PHPExcel_Chart_DataSeries::GROUPING_STANDARD,			// plotGrouping
	range(0, count($dataSeriesValues1)-1),					// plotOrder
	$dataseriesLabels1,										// plotLabel
	$xAxisTickValues1,										// plotCategory
	$dataSeriesValues1,										// plotValues
	PHPExcel_Chart_DataSeries::STYLE_MARKER					// plotStyle
);

/*
$series1 = new PHPExcel_Chart_DataSeries(
	PHPExcel_Chart_DataSeries::TYPE_RADARCHART,				// plotType
	NULL,													// plotGrouping
	range(0, count($dataSeriesValues1)-1),					// plotOrder
	$dataseriesLabels1,										// plotLabel
	$xAxisTickValues1,										// plotCategory
	$dataSeriesValues1,										// plotValues
	NULL,													// smooth line
	PHPExcel_Chart_DataSeries::STYLE_MARKER					// plotStyle
);
*/
$layout1 = new PHPExcel_Chart_Layout();
$layout1->setShowVal(TRUE);
$layout1->setShowPercent(FALSE);

$lay_title = new PHPExcel_Chart_Layout();
$lay_title->setHeight(400);
$lay_title->setXPosition(-100);

$plotarea1 = new PHPExcel_Chart_PlotArea($layout1, array($series1));
$legend1 = new PHPExcel_Chart_Legend(PHPExcel_Chart_Legend::POSITION_RIGHT, NULL, false);
$title1 = new PHPExcel_Chart_Title('Заголовок', $lay_title);
ech($title1);


$chart1 = new PHPExcel_Chart(
'chart1',		// name
$title1,		// title
$legend1,			// legend
$plotarea1,		// plotArea
true,			// plotVisibleOnly
0,				// displayBlanksAs
NULL,			// xAxisLabel
NULL			// yAxisLabel		- Pie charts don't have a Y-Axis
);

$chart1->setTopLeftPosition('D3');
$chart1->setBottomRightPosition('P25');

$objPHPExcel->getActiveSheet()->addChart($chart1);
	
$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
$objWriter->setIncludeCharts(TRUE);
$objWriter->save('diagr.xlsx');
?>