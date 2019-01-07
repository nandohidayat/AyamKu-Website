<?php
include "koneksi_ip.php";
if (isset($_GET['id'])) {
$kode = $_GET['id'];
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
if (!empty($kode) && $kode != "") {
    
    $query = "DELETE FROM gerai WHERE kd_gerai='$kode'";
    $sql = mysqli_query ($conn,$query);
    
    if ($sql) {
        echo "<h2><font color=blue>Gerai telah berhasil dihapus</font></h2>";
    } else {
        echo "<h2><font color=red>Gerai gagal dihapus</font></h2>";
    }
    echo "Klik <a href='index_admin.php?page=displaygerai'>di sini</a> untuk kembali ke halaman display gerai";
} else {
    die ("Access Denied");
}
?>
</body>
</html>