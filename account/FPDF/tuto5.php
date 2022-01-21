<?php
require('../connection.php');
require('mysql_table.php');
$user = $_GET['encryption_id'];
class PDF extends PDF_MySQL_Table
{
function Header()
{
    $this->SetFont('Arial','B',28);
    $this->Cell(0,6,'Athena | Article Repository Management System',0,90,'C');
    $this->SetFont('Arial','',23);
    $this->Cell(0,20,'Visitors Report',0,8,'C');
    $user = $_GET['encryption_id'];
    $this->SetFont('Arial','I',14);
    $this->Cell(0,1,'This report is generated for '.$user.'. Please do not do any misuse.',0,8,'C');
    $this->SetFont('Arial','I',10);
    date_default_timezone_set("Asia/Kolkata");
    $this->Cell(0,12,'Request to generate the report was received at '.date("Y-m-d H:i:s").'.',0,8,'C');
    $this->Ln(10);
    parent::Header();
}
}
$link = $con;
$pdf = new PDF('L','mm',array(490,270));
$pdf->SetTitle('[AUTHENTICATED] Athena | Visitors Analysis');
$pdf->AddPage();
$pdf->AddCol('ip_address',50,'IP Address','C');
$pdf->AddCol('mac_address',250,'MAC Address','C');
$pdf->AddCol('link',90,'Visited Page','L');
$pdf->AddCol('time_created_at',50,'Time','R');
$prop = array('HeaderColor'=>array(255,150,100),
            'color1'=>array(225,223,223),
            'color2'=>array(255,255,255),
            'padding'=>2);
$pdf->Table($link,'select * from visitors order by time_created_at DESC',$prop);
$pdf->Output('D', 'athena-visitors-'.$user.'.pdf');
