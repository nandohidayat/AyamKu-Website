<?php
include "koneksi_ip.php";

//proses input barang
if (isset($_POST['Edit'])) {
	$kode = $_POST['kode'];
	$nama = addslashes (strip_tags ($_POST['nama']));
	$phone = $_POST['phone'];
	$sms = $_POST['sms'];
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];
	
	//insert barang
	$query = "INSERT INTO gerai values('$kode','$nama','$phone','$sms','$latitude','$longitude')";
	$sql = mysqli_query ($conn,$query);
	
	if ($sql) {
		echo "<h2><font color=blue>gerai telah berhasil ditambahkan</font></h2>";
	} else {
		echo "<h2><font color=red>gerai gagal ditambahkan</font></h2>";
	}
	echo "<meta http-equiv='refresh' content='0;URL=index_admin.php?page=displaygerai'>";
}
if (isset($_POST['Reset'])) {
echo "<meta http-equiv='refresh' content='0;URL=index_admin.php?page=displaygerai'>";
}
?>
<html>
<head><title>Tambah Gerai</title>
</head>
<body>
<FORM ACTION="" METHOD="POST" NAME="input" enctype="multipart/form-data">
<table cellpadding="0" cellspacing="0" border="0" width="700">
<tr>
<td align="center" colspan="2"><h2>Input Gerai</h2></td>
</tr>
<tr>
<td width="200">Kode Gerai</td>
<td>: <input type="text" name="kode" size="6" value=""></td>
</tr>
<tr>
<td>Nama Gerai</td>
<td>: <input type="text" name="nama" size="30" value=""></td>
</tr>
<tr>
<td>Phone</td>
<td>: <input type="text" name="phone" size="10" value=""></td>
</tr>
<tr>
<td>SMS</td>
<td>: <input type="text" name="sms" size="10" value=""></td>
</tr>
<tr>
<td>Latitude</td>
<td>: <input type="text" name="latitude" size="10" value=""></td>
</tr>
<!--<tr>-->
<!--<td>Stok</td>-->
<!--<td>: <input type="text" name="stok" size="10" value=""></td>-->
<!--</tr>-->
<tr>
<td>Longitude</td>
<td>: <input type="text" name="longitude" size="10" value=""></td>
</tr>
<td>&nbsp;</td>
<td>&nbsp;&nbsp;

<input type="submit" name="Edit" value="Tambah Gerai">&nbsp;
<input type="submit" name="Reset" value="Cancel"></td>
</tr>
</table>
</FORM>
</body>
</html>