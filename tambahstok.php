<?php
include "koneksi_ip.php";

//proses input barang
if (isset($_POST['Edit'])) {
	$kd_brg = $_POST['barang'];
	$kd_gerai = $_POST['gerai'];
	$stok = $_POST['stok'];
	
	//insert barang
	$query = "INSERT INTO stok values('$kd_gerai','$kd_brg','$stok')";
	$sql = mysqli_query ($conn,$query);
	
	if ($sql) {
		echo "<h2><font color=blue>stok telah berhasil ditambahkan</font></h2>";
	} else {
		echo "<h2><font color=red>stok gagal ditambahkan</font></h2>";
	}
	echo "<meta http-equiv='refresh' content='0;URL=index_admin.php?page=displaystok'>";
}
if (isset($_POST['Reset'])) {
echo "<meta http-equiv='refresh' content='0;URL=index_admin.php?page=displaystok'>";
}
?>
<html>
<head><title>Tambah Stok</title>
</head>
<body>
<FORM ACTION="" METHOD="POST" NAME="input" enctype="multipart/form-data">
<table cellpadding="0" cellspacing="0" border="0" width="700">
<tr>
<td align="center" colspan="2"><h2>Input Stok</h2></td>
</tr>
<tr>
<td width="200">Gerai</td>
<td>:
<select name="gerai">
<?php
	$query = "SELECT
				kd_gerai, nama
			FROM
				gerai";
	
	$sql = $sql = mysqli_query ($conn,$query);
 	while ($hasil = mysqli_fetch_array ($sql)) {
 		echo "<option value='".$hasil['kd_gerai']."'>".$hasil['nama']."</option>";	
 	}
?>
</select>
</td>
</tr>
<tr>
<td>Barang</td>
<td>: 
<select name="barang">
<?php
	$query = "SELECT
				kd_brg, nm_brg
			FROM
				barang";
	
	$sql = $sql = mysqli_query ($conn,$query);
 	while ($hasil = mysqli_fetch_array ($sql)) {
 		echo "<option value='".$hasil['kd_brg']."'>".$hasil['nm_brg']."</option>";	
 	}
?>
</select>
</td>
</tr>
<tr>
<td>Stok</td>
<td>: <input type="text" name="stok" size="10" value=""></td>
</tr>
<td>&nbsp;</td>
<td>&nbsp;&nbsp;

<input type="submit" name="Edit" value="Tambah Stok">&nbsp;
<input type="submit" name="Reset" value="Cancel"></td>
</tr>
</table>
</FORM>
</body>
</html>