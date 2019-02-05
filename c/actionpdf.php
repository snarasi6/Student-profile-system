<?php
 session_start();
require('WriteHTML.php');
$en= $_SESSION["login_id"];                 

$pdf=new PDF_HTML();

$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 15);

$pdf->AddPage();
$pdf->Image('../img/'.$en.'.jpg',150,13,30);
$pdf->SetFont('Arial','B',14);

$pdf->SetFont('Arial','B',7); 
$htmlTable='<br><br><br><br><TABLE>
<TR>
<TD>Name:</TD>
<TD>'.$_POST['name'].'</TD>
</TR>
<TR>
<TD>Email:</TD>
<TD>'.$_POST['email'].'</TD>
</TR>
<TR>
<TD>Message:</TD>
<TD>'.$_POST['url'].'</TD>
</TR>
<TR>
<TD>Comment:</TD>
<TD>'.$_POST['comment'].'</TD>
</TR>
</TABLE>';
$pdf->WriteHTML2("<br><br><br>$htmlTable");
$pdf->SetFont('Arial','B',6);
$pdf->Output(); 
?>