<?php
    $user_id = $_GET["username"];
    $total = $_GET["total"];
    $bayar = $_GET["bayar"];
?>
<html>
    <head>
        <title>Nota Penjualan</title>
        <style>
            body {
                background:white;
                width:200px;
                border:1px solid black;
                padding:6px;
            }
            
            h2 {
                text-align:center;
            }
            
            .value {
                text-align:right;
            }
        </style>
    </head>
    <body>
        <h2>AyamKu</h2>
        <hr>
        <h4>Nama pelanggan : </h4>
        <h4 class="value"><?php echo $user_id ?></h4>
        <h4>Total belanja : </h4>
        <h4 class="value"><?php echo $total ?></h4>
        <h4>Bayar : </h4>
        <h4 class="value"><?php echo $bayar ?></h4>
        <hr>
        <h4>Kembalian : </h4>
        <h4 class="value"><?php echo $bayar-$total ?></h4>
    </body>
</html>