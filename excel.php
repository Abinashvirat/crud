<?php
require_once 'PHPExcel-v7.4-master/PHPExcel.php';

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set properties
$objPHPExcel->getProperties()->setCreator("Your Name")
                                ->setLastModifiedBy("Your Name")
                                ->setTitle("Excel Template")
                                ->setSubject("Excel Template")
                                ->setDescription("Excel Template for Data Input")
                                ->setKeywords("excel template")
                                ->setCategory("Template");

// Add main worksheet for data input
$sheet = $objPHPExcel->getActiveSheet();

// Set column headers
$headers = ['name','email', 'phone','address','gender','dob','hobby','country', 'state'];
$columnIndex = 0;
foreach ($headers as $header) {
    $sheet->setCellValueByColumnAndRow($columnIndex++, 1, $header);
}


$referenceSheet=$objPHPExcel->createSheet(1);
$referenceSheet->setTitle('References');
$referenceSheet->setCellValue('A1','gender');
$referenceSheet->setCellValue('A2','male');
$referenceSheet->setCellValue('A3','female');
$referenceSheet->setCellValue('A4','other');
$referenceSheet->setCellValue('B1','hobby');
$referenceSheet->setCellValue('B2','reading');
$referenceSheet->setCellValue('B3','sports');
$referenceSheet->setCellValue('C1','country');
$referenceSheet->setCellValue('C2','India');
$referenceSheet->setCellValue('C3','Australia');
$referenceSheet->setCellValue('C4','England');
$referenceSheet->setCellValue('D1','country_id');
$referenceSheet->setCellValue('D2','1');
$referenceSheet->setCellValue('D3','2');
$referenceSheet->setCellValue('D4','3');
$referenceSheet->setCellValue('E1','state');
$referenceSheet->setCellValue('E2','Odisha');
$referenceSheet->setCellValue('E3','Maharastra');
$referenceSheet->setCellValue('E4','UP');
$referenceSheet->setCellValue('E5','New South Wales');
$referenceSheet->setCellValue('E6','Queensland');
$referenceSheet->setCellValue('E7','Victoria');
$referenceSheet->setCellValue('E8','London');
$referenceSheet->setCellValue('E9','Manchester');
$referenceSheet->setCellValue('E10','Birmingham');
$referenceSheet->setCellValue('F1','state_id');
$referenceSheet->setCellValue('F2','1');
$referenceSheet->setCellValue('F3','2');
$referenceSheet->setCellValue('F4','3');
$referenceSheet->setCellValue('F5','4');
$referenceSheet->setCellValue('F6','5');
$referenceSheet->setCellValue('F7','6');
$referenceSheet->setCellValue('F8','7');
$referenceSheet->setCellValue('F9','8');
$referenceSheet->setCellValue('F10','9');




// Save Excel file
$filename = 'excel_template_with_references.xlsx';
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save($filename);

// Download Excel file
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Content-Length: ' . filesize($filename));
readfile($filename);
exit;
?>

