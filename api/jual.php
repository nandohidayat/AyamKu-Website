<?php 
 
$conn = mysqli_connect("localhost","nandohidayat", "", "penjualan"); 
 
$puser = $_GET['username']; $ptotal = $_GET['total']; $pbayar = $_GET['bayar']; 
 
$query = "insert into jual (user_id, total, bayar) values ('".$puser."',".$ptotal.",".$pbayar.")"; 
 
if(mysqli_query($conn, $query)) {      echo "success"; } else {      echo "failed"; } 
 
mysqli_close($conn); 
 
?> 