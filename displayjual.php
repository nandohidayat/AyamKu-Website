<?php
	include "koneksi_ip.php"
?>
<HTML>
<HEAD>
<TITLE>Menampilkan Daftar Barang</TITLE>

<script language="javascript">
function tanya() {
if (confirm ("Apakah Anda yakin akan menghapus barang ini ?")) {
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
                                 <th><i class="icon_profile"></i> ID</th>
                                 <th><i class="icon_mail_alt"></i> Nama Gerai</th>
                                 <th><i class="icon_mobile"></i> User</th>
								 <th><i class="icon_mobile"></i> Total</th>
								 <th><i class="icon_calendar"></i> Bayar</th>
                              </tr>



<?php
	$gerai = $_GET['gerai'];
	
	if(!$gerai) {
		$query = "SELECT 
    			jual.*, gerai.nama 
    		FROM 
    			jual
    		INNER JOIN
    			gerai ON jual.kd_gerai = gerai.kd_gerai
    		ORDER BY 
    			jual.id_jual";	
	} else {
		$query = "SELECT 
    			jual.*, gerai.nama 
    		FROM 
    			jual
    		INNER JOIN
    			gerai ON jual.kd_gerai = gerai.kd_gerai
    		WHERE
    			jual.kd_gerai = '".$gerai."'
    		ORDER BY 
    			jual.id_jual";
	}
  $sql = mysqli_query ($conn,$query);
  //echo "<a href='tambahbarang.php'>Add</a>";
 	while ($hasil = mysqli_fetch_array ($sql)) {
		$id_jual = $hasil['id_jual'];
		$nama = stripslashes ($hasil['nama']);
		$user = stripslashes ($hasil['user_id']);
		$total = $hasil['total'];
		$bayar = $hasil['bayar'];
	//tampilkan barang
		echo "<tr>
		<td align='center'>$id_jual</td>
		<td align='left' >$nama</td>
		<td align='left'>$user</td>
		<td align='right'>$total</td>
		<td align='right'>$bayar</td>";
		?>
		
                              </tr>
	        <?php } ?>
		</tbody>
                        </table>
                      </section>
                  </div>
              </div>
		
		
</BODY>
</HTML>
