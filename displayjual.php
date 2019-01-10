<?php
	include "koneksi_ip.php";
	$fn  = $_POST['fn'];
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
								 <th><i class="icon_cogs"></i> Action</th>
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
		<td align='right'>$bayar</td>
		
		<td>
		    <div class='btn-group'>
                <button type='button' class='btn btn-success' data-toggle='modal' data-target='#Modal$id_jual'>
					View Details
				</button>
            </div>
        </td>
		
        </tr>";
	     } ?>
		</tbody>
                        </table>
                      </section>
                  </div>
              </div>
		
		<?php 
		
			$sql = mysqli_query ($conn,$query);
		 	while ($hasil = mysqli_fetch_array ($sql)) {
				$id_jual = $hasil['id_jual'];
				$nama = stripslashes ($hasil['nama']);
				$user = stripslashes ($hasil['user_id']);
				$total = $hasil['total'];
				$bayar = $hasil['bayar'];
				
				echo '<div class="modal fade" id="Modal'.$id_jual.'" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="ModalLabel">Detail Transaksi</h5>
						      </div>
						      <div class="modal-body">
						        <p><span class="forjual">ID Transaksi</span>: '.$id_jual.'</p>
						        <p><span class="forjual">Nama Gerai</span>: '.$nama.'</p>
						        <p><span class="forjual">Nama Pelanggan</span>: '.$user.'</p>
						        <p><span class="forjual">Pembelian</span>: </p>';
						        
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
    			
						        $query1 = "SELECT
											list_jual.kd_brg, barang.nm_brg, barang.harga_jual
										FROM
											list_jual
										INNER JOIN
											barang ON list_jual.kd_brg = barang.kd_brg
										WHERE
											list_jual.id_jual = '".$id_jual."'";
								$sql1 = mysqli_query ($conn,$query1);
								while ($hasil1 = mysqli_fetch_array ($sql1)) {
									$nm_brg = $hasil1['nm_brg'];
									$harga_jual = $hasil1['harga_jual'];
									
									echo '<p><span class="forjual"></span> '.$nm_brg.'  -  Rp '.$harga_jual.',00</p>';
								}
							
						        echo '<p><span class="forjual">Total</span>: Rp '.$total.',00</p>
						        <p><span class="forjual">Bayar</span>: Rp '.$bayar.',00</p>
						        <p><span class="forjual">Kembalian</span>: Rp '.($bayar-$total).',00</p>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						      </div>
						    </div>
						  </div>
						</div>';
		 	}
		?>
</BODY>
</HTML>
