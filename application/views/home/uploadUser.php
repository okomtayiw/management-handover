<?php
require('fpdf.php');
include "../config.php";

function mb_wordwrap($string, $limit)
{
    $string = strip_tags($string); //Strip HTML tags off the text
    $string = html_entity_decode($string); //Convert HTML special chars into normal text
    $string = str_replace(array("\r", "\n"), "", $string); //Also cut line breaks
    if(mb_strlen($string, "UTF-8") <= $limit) return $string; //If input string's length is no more than cut length, return untouched
    $last_space = mb_strrpos(mb_substr($string, 0, $limit, "UTF-8"), " ", 0, "UTF-8"); //Find the last space symbol position

    return mb_substr($string, 0, $last_space, "UTF-8").' ...'; //Return the string's length substracted till the last space and add three points
}


$report  = $_GET['id'];
$idUser  = $_GET['idUser'];

$res = $connect->query("select a.*,COUNT(e.id_issues) as issues,e.item_component, b.name_project,c.name_siteproject,d.username, e.location 
FROM report a
LEFT OUTER JOIN project b ON a.id_project = b.id_project 
LEFT OUTER JOIN site_project c ON a.id_siteproject = c.id_siteproject
LEFT OUTER JOIN issues e ON a.numberReport = e.id_report
LEFT OUTER JOIN users d ON a.created_by = d.user_id WHERE d.username = 'Sherly'
GROUP BY a.id_report  ORDER BY a.id_report DESC");

$row_issues = $res->fetch_array(MYSQLI_ASSOC);
$nameProject = $row_issues['name_project'];
$nameSiteProject = $row_issues['name_siteproject'];
$nameReport = $row_issues['name_report'];
$floor = $row_issues['floor'];
$zone = $row_issues['zone'];

	


$pdf = new FPDF('L','mm','letter');
$pdf->AddPage('L', 'letter');
$pdf->SetFont('Arial','B',16);
$pdf->Ln(1);
$pdf->SetFont('Arial', 'B', 20, 'C');
$pdf->Cell(250, 8, utf8_decode ('Report Project'), 10,8, 'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(10, 5, $nameProject , 0,1, 'L');
$pdf->Ln(1);
$pdf->SetFillColor(2,157,116);
$pdf->SetTextColor(3, 3, 3); 
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(10, 5, utf8_decode ('No.'), 1,0,'C','R');
$pdf->Cell(160, 5, utf8_decode ('Name Report'), 1,0,'C','R');
$pdf->Cell(30, 5, utf8_decode ('Site Project'), 1,0,'C','R');
$pdf->Cell(30, 5, utf8_decode ('Site Project'), 1,0,'C','R');
$pdf->Cell(20, 5, utf8_decode ('Username'), 1,0,'C','R');
$pdf->Cell(10, 5, utf8_decode ('Tot'), 1,0,'C','R');
$pdf->Ln(5);
$pdf->SetFont('Arial', '', 9);

$result = $connect->query("select a.*,COUNT(e.id_issues) as issues,e.item_component, b.name_project,c.name_siteproject,d.username, e.location 
FROM report a
LEFT OUTER JOIN project b ON a.id_project = b.id_project 
LEFT OUTER JOIN site_project c ON a.id_siteproject = c.id_siteproject
LEFT OUTER JOIN issues e ON a.numberReport = e.id_report
LEFT OUTER JOIN users d ON a.created_by = d.user_id WHERE d.username = 'Sherly'
GROUP BY a.id_report  ORDER BY a.id_report DESC");


$i=1;
while ($row = $result->fetch_array()) {


$pdf->Cell(10, 8, $i, 1,0,'C');
$text = $row['name_report'] ;
$pdf->Cell(160, 8,mb_wordwrap($text, 100), 1,0,'L');                 
$pdf->Cell(30, 8,$row['name_siteproject'], 1,0,'C');  
$pdf->Cell(30, 8,$row['location'], 1,0,'C');   
$pdf->Cell(10, 8,$row['username'], 1,0,'C');  
$pdf->Cell(10, 8,$row['issues'], 1,0,'C');   
$pdf->Ln();
$i++; 

}



$pdf->SetY(10);

$pdf->AliasNbPages();


$pdf->Ln(8);

$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(114,8,'',0);
for($i=1;$i<=40;$i++)
$pdf->Output($nameReport, 'I');
?>