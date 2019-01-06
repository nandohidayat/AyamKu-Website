<?php
	include "../koneksi_ip.php";
	$query = "SELECT * FROM gerai order by kd_gerai";
    $sql = mysqli_query ($conn,$query);
    while ($hasil = mysqli_fetch_assoc ($sql))
        $output[] = $hasil;
    print(json_encode($output));
    print("\n");
    mysqli_close($conn);
    
?>

