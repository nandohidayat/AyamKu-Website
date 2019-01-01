<?php 
 
$conn = mysqli_connect("localhost","nandohidayat", "", "penjualan"); 
 
$puser=$_GET['username']; $ppass=$_GET['password'];

$ppass = str_replace('"','',$ppass);

$records = mysqli_query($conn,"select * from user where user_id='".$puser."'"); 
 
$data = array(); 
 
while($row = mysqli_fetch_assoc($records)) { $data[] = $row; } 

$status = array();

if($data[0]['password'] == MD5($ppass)) {
    $data[0]['hak_akses'] = 1;
} else {
    $data[0]['hak_akses'] = 0;
}

echo json_encode($data); 
 
mysqli_close($conn); 
 
?> 