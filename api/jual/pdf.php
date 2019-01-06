<?php
    require('../../fpdf/fpdf.php');
    include "../../koneksi_ip.php";
    
    $user=$_GET['username']; 
    $total=$_GET['total']; 
    $bayar=$_GET['bayar'];
    $id_jual=$_GET['id_jual'];
    $items=$_GET['items'];
    $height = 108;
    
    for($i = 0; $i < sizeof($items); $i++) {
        $query = "SELECT
                    nm_brg, harga_jual
                FROM
                    barang
                WHERE
                    kd_brg='".$items[$i]."'";
        
        $sql = mysqli_query($conn, $query);
        
        while($hasil = mysqli_fetch_assoc ($sql))
            $output[] = $hasil;
        
        $height += 6;
    }
    
    $pdf = new FPDF('P', 'mm', array(80, $height));
    $pdf->SetTitle('Nota Pembelian');
    $pdf->AddPage();
    
    $pdf->SetFont('Arial', 'B', '15');
    $pdf->Cell(15);
    $pdf->Cell(30,10,'AyamKu',1,1,'C');
    $pdf->Cell(50);
    $pdf->Cell(10,10,''.$id_jual.'',0,1,'C');
    $pdf->Ln(3);
    
    $pdf->SetFont('Arial', '', '12');
    $pdf->Cell(0,0,'Nama Pelanggan:',0,1);
    $pdf->Cell(0,0,$user,0,1,'R');
    $pdf->Ln(10);
    
    $pdf->Cell(0,0,'Pembelian:',0,1);
    $pdf->Ln(10);
    
    for($i = 0; $i < sizeof($output); $i++) {
        $pdf->Cell(0,0,'  '.$output[$i]['nm_brg'],0,0,'L');
        $pdf->Cell(0,0,$output[$i]['harga_jual'],0,1,'R');
        $pdf->Ln(6);
    } 
    
    $pdf->Ln(4);
    
    $pdf->Cell(0,0,'Total Pembelian:',0,1);
    $pdf->Cell(0,0,$total,0,1,'R');
    $pdf->Ln(10);
    
    $pdf->Cell(0,0,'Bayar:',0,1);
    $pdf->Cell(0,0,$bayar,0,1,'R');
    $pdf->Ln(10);
    
    $pdf->Cell(60,0,'',1,1,'C');
    $pdf->Ln(10);
    
    $pdf->Cell(0,0,'Kembalian:',0,1);
    $pdf->Cell(0,0,$bayar - $total,0,1,'R');
    
    $pdf->Output('','Nota Pembelian '.$id_jual.'');
?>