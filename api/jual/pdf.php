<?php
    require('../../fpdf/fpdf.php');
    
    $user=$_GET['username']; 
    $total=$_GET['total']; 
    $bayar=$_GET['bayar'];
    
    $pdf = new FPDF('P', 'mm', array(80, 115));
    $pdf->SetTitle('Nota Pembelian');
    $pdf->AddPage();
    
    $pdf->SetFont('Arial', 'B', '15');
    $pdf->Cell(15);
    $pdf->Cell(30,10,'AyamKu',1,1,'C');
    $pdf->Ln(9);
    
    $pdf->SetFont('Arial', '', '12');
    $pdf->Cell(0,0,'Nama Pelanggan:',0,1);
    $pdf->Ln(8);
    $pdf->Cell(0,0,$user,0,1,'R');
    $pdf->Ln(8);
    
    $pdf->Cell(0,0,'Total Pembelian:',0,1);
    $pdf->Ln(8);
    $pdf->Cell(0,0,$total,0,1,'R');
    $pdf->Ln(8);
    
    $pdf->Cell(0,0,'Bayar:',0,1);
    $pdf->Ln(8);
    $pdf->Cell(0,0,$bayar,0,1,'R');
    $pdf->Ln(8);
    
    $pdf->Cell(60,0,'',1,1,'C');
    $pdf->Ln(8);
    
    $pdf->Cell(0,0,'Kembalian:',0,1);
    $pdf->Ln(8);
    $pdf->Cell(0,0,$bayar - $total,0,1,'R');
    
    $pdf->Output('','Nota Pembelian '.$user.'');
?>