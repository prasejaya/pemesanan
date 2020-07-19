<?php
	$tampil=mysql_query("select count(*) as banyak_pesanan from pembelian where ket='Pesanan Baru'");
	$data=mysql_fetch_array($tampil);
	$bnykpesanan=$data['banyak_pesanan'];
	
	$tgll = date("Y-m-d");
	$tanggalsekarang = format_tanggallengkap($tgll);
?>
<?php
$di=$_GET['di'];
switch($di){
	default:
?>
<meta http-equiv="refresh" content="10">
<div class="row-fluid">
						<div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><b class="a">Daftar Pesanan - <?php echo "$tanggalsekarang"; ?></b></div>
                                <div class="pull-right">
								<span class="badge badge-warning"><?php echo "$bnykpesanan"; ?></span>
                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    
  									<div id="example_wrapper" class="dataTables_wrapper form-inline" role="grid">
									<div class="row"></div>
										<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" id="example" aria-describedby="example_info">
											<thead>
												<tr>
													<th>No</th>
													<th>No Meja</th>
													<th>Nama</th>
													<th style="text-align:center">Aksi</th>
												</tr>
											</thead>
											<tbody>
											  <?php 
												$i=0;
												$sql = mysql_query("select * from detail_beli inner join produk using (id_produk) inner join pembelian using (id_beli) inner join user using (kode) WHERE ket='Pesanan Baru' group by id_beli order by id_beli asc");
												while($dt=mysql_fetch_array($sql)){
													$harga = format_rupiah($dt[harga]);
													$ttl = $dt[harga] * $dt[jumlah];
													$total = format_rupiah($ttl);
													$totalharga+=$ttl;
													$th = format_rupiah($totalharga);
													$i++;
												echo "
												<tr>
													<td>$i</td>
													<td>$dt[no_meja]</td>
													<td>$dt[nama]</td>
													<td style='text-align:center' rowspan='$banyak'>
														<a href='#my_$dt[id_beli]' data-toggle='modal' class='btn'>Detail</a>
														<a href='?menu=pesanan&di=bayar&id_beli=$dt[id_beli]' class='btn btn-success'><i class='icon-ok'></i></a>
													</td>
												</tr>
												
												<div id='my_$dt[id_beli]' class='modal hide'>
												<div class='modal-header'>
													<button data-dismiss='modal' class='close' type='button'>&times;</button>
													<h4>Pesanan Atas Nama : $dt[nama]</h4>
												</div>
												<div class='modal-body'>
													<fieldset>
														<label style='width:210px'>Nama Pelayan : $dt[nama_user]</label><br><br> 
														<label style='width:210px'>Daftar Pesanan</label>
														<label style='width:60px'>Qty</label><br>";
													$prd=mysql_query("select * from detail_beli full join produk using (id_produk) where id_beli='$dt[id_beli]'");
													while($xx=mysql_fetch_array($prd)){
													$subt=$xx[jumlah]*$xx[harga];
													$hrg=format_rupiah($xx[harga]);
													$subt_rp=format_rupiah($subt);
														echo"
														<input style='width:200px' value='$xx[nama_produk]' readonly>
														<input style='width:40px;text-align:center'value='$xx[jumlah]' readonly><br>";
													}
												echo"
												</div>
												<div class='modal-footer'>
													</fieldset>
														<a data-dismiss='modal' class='btn'>Tutup</a>
													</div>
												</div>";
												}
												?>
											</tbody>
									</table>
                                </div>
                            </div>
                        </div>
                    </div>
<?php
	break;
	case 'bayar':
	mysql_query("UPDATE pembelian SET ket = 'Belum Dibayar' WHERE id_beli='$_GET[id_beli]'");
	echo "<meta content='0; url=?menu=pesanan' http-equiv='refresh'/>";
	break;
}
?>