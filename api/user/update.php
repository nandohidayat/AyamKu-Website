<?php 
 
$conn = mysqli_connect("localhost","nandohidayat", "", "penjualan"); 
 
$puser=$_GET['username']; $ppass=$_GET['password']; $pname=$_GET['name'];

if($ppass == "") {
    $query = "update user set user_id='".$puser."', name='".$pname."' where user_id='".$puser."'"; 
} else {
    $ppass = MD5($ppass);
    $query = "update user set user_id='".$puser."', name='".$pname."', password='".$ppass."' where user_id='".$puser."'"; 
}
 
if(mysqli_query($conn, $query)) {      echo "success"; } else {      echo "failed"; } 
 
mysqli_close($conn); 
 
?>