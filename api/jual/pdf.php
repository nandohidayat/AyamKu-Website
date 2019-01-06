<?php
    require('../../fpdf/fpdf.php');
    include "../../koneksi_ip.php";
    
    $gerai=$_GET['gerai'];
    $user=$_GET['username']; 
    $total=$_GET['total']; 
    $bayar=$_GET['bayar'];
    $id_jual=$_GET['id_jual'];
    $items=$_GET['items'];
    $height = 115;
    
    $query = "SELECT
                nama
            FROM
                gerai
            WHERE
                kd_gerai='".$gerai."'";
    
    $sql = mysqli_query($conn, $query);
    while($hasil = mysqli_fetch_assoc ($sql))
            $namagerai[] = $hasil;
    
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
    $pdf->Ln(9);
    $pdf->SetFont('Arial', 'B', '12');
    $pdf->Cell(0,0,''.$namagerai[0]['nama'].'',0,0,'L');
    $pdf->Cell(0,0,''.$id_jual.'',0,1,'R');
    $pdf->Ln(10);
    
    $pdf->SetFont('Arial', '', '11');
    $pdf->Cell(0,0,'Nama Pelanggan:',0,1);
    $pdf->Cell(0,0,$user,0,1,'R');
    $pdf->Ln(10);
    
    $pdf->Cell(0,0,'Pembelian:',0,1);
    $pdf->Ln(10);
    
    for($i = 0; $i < sizeof($output); $i++) {
        $pdf->Cell(0,0,'  '.$output[$i]['nm_brg'],0,0,'L');
        $pdf->Cell(0,0,'Rp '.$output[$i]['harga_jual'],0,1,'R');
        $pdf->Ln(6);
    } 
    
    $pdf->Ln(4);
    
    $pdf->Cell(0,0,'Total Pembelian:',0,1);
    $pdf->Cell(0,0,'Rp '.$total,0,1,'R');
    $pdf->Ln(10);
    
    $pdf->Cell(0,0,'Bayar:',0,1);
    $pdf->Cell(0,0,'Rp '.$bayar,0,1,'R');
    $pdf->Ln(10);
    
    $pdf->Cell(60,0,'',1,1,'C');
    $pdf->Ln(10);
    
    $pdf->Cell(0,0,'Kembalian:',0,1);
    $pdf->Cell(0,0,'Rp '.($bayar - $total),0,1,'R');
    
    $pdf->Output('','Nota Pembelian '.$id_jual.'');
?>