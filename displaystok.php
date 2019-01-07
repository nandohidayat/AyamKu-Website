<?php
	include "koneksi_ip.php"
?>
<HTML>
<HEAD>
<TITLE>Menampilkan Daftar Barang</TITLE>

<script language="javascript">
function tanya() {
if (confirm ("Apakah Anda yakin akan menghapus stok ini ?")) {
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
                              Daftar Stok
                          </header>
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th><i class="icon_mail_alt"></i> Nama Gerai</th>
								 <th><i class="icon_mobile"></i> Nama Barang</th>
								 <th><i class="icon_calendar"></i> Stok</th>
                                 <th><i class="icon_cogs"></i> Action</th>
                              </tr>



<?php
    $query = "SELECT 
    			stok.*, gerai.nama, barang.nm_brg 
    		FROM
    			stok
    		INNER JOIN
    			gerai ON stok.kd_gerai = gerai.kd_gerai
    		INNER JOIN
    			barang ON stok.kd_brg = barang.kd_brg
    		ORDER BY 
    			nama";
  $sql = mysqli_query ($conn,$query);
  //echo "<a href='tambahbarang.php'>Add</a>";
 	while ($hasil = mysqli_fetch_array ($sql)) {
		$kd_gerai = stripslashes ($hasil['kd_gerai']);
		$kd_barang = stripslashes ($hasil['kd_brg']);
		$nm_gerai = stripslashes ($hasil['nama']);
		$nm_brg = stripslashes ($hasil['nm_brg']);
		$stok = stripslashes ($hasil['stok']);
		
	//tampilkan barang
		echo "<tr>
		<td align='left'>$nm_gerai</td>
		<td align='left'>$nm_brg</td>
		<td align='left'>$stok</td>";
		?>
		<td>
		                          <div class="btn-group">
                                      <a class="btn btn-primary" href="<?php echo "index_admin.php?page=tambahstok"?>"><i class="icon_plus_alt2"></i></a>
                                      <a class="btn btn-success" href="<?php echo "index_admin.php?page=editstok&kd_brg=$kd_barang&kd_gerai=$kd_gerai"?>"><i class="icon_check_alt2"></i></a>
                                      <a class="btn btn-danger" onClick='return tanya()' href="<?php echo "index_admin.php?page=hapusstok&id1=$kd_gerai&id2=$kd_barang"?>"><i class="icon_close_alt2"></i></a>
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
