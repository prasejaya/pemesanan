<div class="row">
    <div class="col-lg-12">
	<div class='thumbnail col-md-12' style='background:#5CB85C'>
	<?php
		$filter = mysql_query("select * from kategori");
		while($ff=mysql_fetch_array($filter)){
			echo "
			<br><p style='color:#ffffff'><b>$ff[kategori]</b></p>
			<table class='table table-striped table-bordered dataTable' style='background:#ffffff'>";
			$i=0;
			$r=mysql_query("SELECT * FROM produk where id_kategori='$ff[id_kategori]' and id_jenis='$da1[id_jenis]'");
			while($d=mysql_fetch_array($r)){
			$harga = format_rupiah($d[harga]);
			echo"
						<tr>
							<td style='text-align:left;width:50%'><a href='#' data-toggle='modal' data-target='#my_$d[id_produk]'><b>$d[nama_produk]</b></a></td>
							<td style='text-align:right'>
							$harga
							</td>
							<td width='25%' style='text-align:left'>
							<input class='form-control' type='number' name='jumlah[]' placeholder='QTY'>
								<input class='form-control' type='hidden' name='id_produk[]' value='$d[id_produk]'>
							</td>
						</tr>
										<div class='modal fade modal-success' id='my_$d[id_produk]' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                            <div class='modal-dialog'>
                                                <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                                        <h4 class='modal-title' id='myModalLabel'>$d[nama_produk]</h4>
                                                    </div>
                                                    <div class='modal-body'>
														<div class='caption'>";
														if (empty($d[gambar])){
															echo "
															<img src='gambar/img.png' style='width:50%' alt=''>";
														}
														else{
															echo "
															<img src='gambar/$d[gambar]' style='width:50%' alt=''>";
														}
														echo"
															<h3>$d[nama_produk]</h3>
															<p><b>$harga</b></p>
															$d[deskripsi]
														</div>
                                                    </div>
                                                    <div class='modal-footer'>
                                                        <button type='button' class='btn btn-default' data-dismiss='modal'>Tutup</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>";
			}
			echo "</table>";
		}
		?>
		</div>
	</div>
</div>	