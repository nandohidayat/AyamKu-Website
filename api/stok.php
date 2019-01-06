<?php
	include "../koneksi_ip.php";
	
	$kd_gerai = $_GET['kd_gerai'];
	
	$query =  "SELECT 
	                stok.kd_gerai, stok.kd_brg, barang.nm_brg, barang.harga_jual, barang.desc, barang.image 
	           FROM 
	                stok 
	           INNER JOIN 
	                barang ON stok.kd_brg = barang.kd_brg
	           WHERE
	                kd_gerai='".$kd_gerai."'
	           ORDER BY
	                kd_brg";
    $sql = mysqli_query ($conn,$query);
   
    while ($hasil = mysqli_fetch_assoc ($sql))
        $output[] = $hasil;
    
    print(json_encode($output));
    
    mysqli_close($conn);
?>

