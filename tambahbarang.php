<?php
include "koneksi_ip.php";

//proses input barang
if (isset($_POST['Edit'])) {
	$kode = $_POST['kode'];
	$nama = addslashes (strip_tags ($_POST['nama']));
	$satuan = $_POST['satuan'];
	$harga = $_POST['harga'];
	$hargabeli = $_POST['hargabeli'];
	$stok = $_POST['stok'];
	$stok_min = $_POST['stok_min'];
	$desc = $_POST['desc'];
	$fileName = $_FILES["image"]["name"];
	
	//insert barang
	$query = "INSERT INTO barang values('$kode','$nama','$satuan','$harga','$hargabeli','$stok','$stok_min','$desc','$fileName')";
	$sql = mysqli_query ($conn,$query);
	
	$targetDir = "img/uploads/";
	$fileName = basename($_FILES["image"]["name"]);
	$targetFilePath = $targetDir . $fileName;
	$imageFileType = strtolower(pathinfo($targetFilePath,PATHINFO_EXTENSION));
	
	if(!empty($_FILES["image"]["name"])){
	    // Allow certain file formats
	    $allowTypes = array('jpg','png','jpeg','gif','pdf');
	    if(in_array($imageFileType, $allowTypes)){
	        // Upload file to server
	        if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
	        	$statusMsg = "The file ".$fileName. " has been uploaded successfully."; 
	        }else{
	            $statusMsg = "Sorry, there was an error uploading your file.";
	        }
	    }else{
	        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
	    }
	}else{
	    $statusMsg = 'Please select a file to upload.';
	}
	
	if ($sql) {
		echo "<h2><font color=blue>barang telah berhasil ditambahkan</font></h2>";
	} else {
		echo "<h2><font color=red>barang gagal ditambahkan</font></h2>";
	}
	echo "<meta http-equiv='refresh' content='0;URL=index_admin.php?page=displaybarang'>";
}
if (isset($_POST['Reset'])) {
echo "<meta http-equiv='refresh' content='0;URL=index_admin.php?page=displaybarang'>";
}
?>
<html>
<head><title>Tambah Barang</title>
</head>
<body>
<FORM ACTION="" METHOD="POST" NAME="input" enctype="multipart/form-data">
<table cellpadding="0" cellspacing="0" border="0" width="700">
<tr>
<td align="center" colspan="2"><h2>Input barang</h2></td>
</tr>
<tr>
<td width="200">Kode Barang</td>
<td>: <input type="text" name="kode" size="6" value=""></td>
</tr>
<tr>
<td>Nama barang</td>
<td>: <input type="text" name="nama" size="30" value=""></td>
</tr>
<tr>
<td>Satuan</td>
<td>: <input type="text" name="satuan" size="10" value=""></td>
</tr>
<tr>
<td>Harga Jual</td>
<td>: <input type="text" name="harga" size="10" value=""></td>
</tr>
<tr>
<td>Harga Beli</td>
<td>: <input type="text" name="hargabeli" size="10" value=""></td>
</tr>
<tr>
<td>Stok</td>
<td>: <input type="text" name="stok" size="10" value=""></td>
</tr>
<tr>
<td>Stok Minimal</td>
<td>: <input type="text" name="stok_min" size="10" value=""></td>
</tr>
<tr>
<td>Description</td>
<td>: <textarea name="desc">Write here...</textarea></td>
</tr>
<tr>
<td>Gambar</td>
<td>: <input type="file" name="image" size="10"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;&nbsp;

<input type="submit" name="Edit" value="Tambah Barang">&nbsp;
<input type="submit" name="Reset" value="Cancel"></td>
</tr>
</table>
</FORM>
</body>
</html>