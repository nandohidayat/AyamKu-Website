<?php 
 
$conn = mysqli_connect("localhost","nandohidayat", "", "penjualan"); 
 
$puser = $_GET['username']; $ppass = $_GET['password']; $pname = $_GET['name']; 
 
$ppass = MD5($ppass);
 
$query = "insert into user (user_id, name, password, hak_akses) values ('".$puser."','".$pname."','".$ppass."',0)"; 
 
if(mysqli_query($conn, $query)) {      echo "success"; } else {      echo "failed"; } 
 
mysqli_close($conn); 
 
?> 