<?php
	include "koneksi_ip.php"
?>
<HTML>
<HEAD>
<TITLE>Menampilkan Daftar Barang</TITLE>

<script language="javascript">
function tanya() {
if (confirm ("Apakah Anda yakin akan menghapus gerai ini ?")) {
	return true;
} else {
	return false;
}
}
</script>
</HEAD>
<BODY>
<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Masters</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index_admin.php">Home</a></li>
						<li><i class="fa fa-laptop"></i>Barang</li>						  	
					</ol>
				</div>
			</div>              
			  <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Daftar Barang
                          </header>
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th><i class="icon_profile"></i> Kode</th>
                                 <th><i class="icon_mail_alt"></i> Nama Gerai</th>
                                 <th><i class="icon_mobile"></i> Phone</th>
								 <th><i class="icon_mobile"></i> SMS</th>
								 <th><i class="icon_calendar"></i> Latitude</th>
								 <th><i class="icon_calendar"></i> Longitude</th>
                                 <th><i class="icon_cogs"></i> Action</th>
                              </tr>



<?php

    $query = "SELECT 
    			* 
    		FROM 
    			gerai 
    		ORDER BY 
    			kd_gerai";
  $sql = mysqli_query ($conn,$query);
  //echo "<a href='tambahbarang.php'>Add</a>";
 	while ($hasil = mysqli_fetch_array ($sql)) {
		$kode = $hasil['kd_gerai'];
		$nama = stripslashes ($hasil['nama']);
		$phone = stripslashes ($hasil['phone']);
		$sms = stripslashes ($hasil['sms']);
		$latitude = $hasil['latitude'];
		$longitude = $hasil['longitude'];
	//tampilkan barang
		echo "<tr>
		<td align='center'>$kode</td>
		<td align='left' >$nama</td>
		<td align='right'>$phone</td>
		<td align='right'>$sms</td>
		<td align='right'>$latitude</td>
		<td align='right'>$longitude</td>";
		?>
		<td>
		                          <div class="btn-group">
                                      <a class="btn btn-primary" href="<?php echo "index_admin.php?page=tambahgerai"?>"><i class="icon_plus_alt2"></i></a>
                                      <a class="btn btn-success" href="<?php echo "index_admin.php?page=editgerai&id=$kode"?>"><i class="icon_check_alt2"></i></a>
                                      <a class="btn btn-danger" onClick='return tanya()' href="<?php echo "index_admin.php?page=hapusgerai&id=$kode"?>"><i class="icon_close_alt2"></i></a>
                                  </div>
                                  </td>
                              </tr>
	        <?php } ?>
		</tbody>
                        </table>
                      </section>
                  </div>
              </div>
		
		
</BODY>
</HTML>
