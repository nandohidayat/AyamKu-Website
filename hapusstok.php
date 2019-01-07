<?php
include "koneksi_ip.php";
if (isset($_GET['id1'])) {
$kd_gerai = $_GET['id1'];
$kd_brg = $_GET['id2'];
} else {
die ("Error. NO Id Selected! ");
}
?>
<html>
<head><title>Delete Barang</title>
</head>
<body>

<?php
//proses delete barang
if (!empty($kd_gerai) && $kd_gerai != "") {
    
    $query = "DELETE FROM stok WHERE kd_brg='$kd_brg' AND kd_gerai='$kd_gerai'";
    $sql = mysqli_query ($conn,$query);
    
    if ($sql) {
        echo "<h2><font color=blue>Stok telah berhasil dihapus</font></h2>";
    } else {
        echo "<h2><font color=red>Stok gagal dihapus</font></h2>";
    }
    echo "Klik <a href='index_admin.php?page=displaystok'>di sini</a> untuk kembali ke halaman display stok";
} else {
    die ("Access Denied");
}
?>
</body>
</html>