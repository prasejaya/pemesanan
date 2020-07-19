<?php
	$tgll = date("Y-m-d");
	$tanggalsekarang = format_tanggallengkap($tgll);
?>
<?php
$ke=$_GET['ke'];
switch($ke){
	default:
?>
<meta http-equiv="refresh" content="10">
					<div class="row-fluid">
						<div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><b class="a">Daftar Belum Dibayar</b></div>
                            </div>
                            <div class="block-content collapse in">
								
                                <div class="span12">
								<div id="example_wrapper" class="dataTables_wrapper form-inline" role="grid">
									<div class="row"></div>
										<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" id="example" aria-describedby="example_info">
											<thead>
												<tr>
													<th style="text-align:center">ID Pembelian</th>
													<th>Pelayan</th>
													<th style="text-align:center">No Meja</th>
													<th>Nama</th>
													<th style="text-align:center">Aksi</th>
												</tr>
											</thead>
											<tbody>
											 <?php 
												$sql = mysql_query("select * from detail_beli inner join produk using (id_produk) inner join pembelian using (id_beli) inner join user using (kode) where ket='Belum Dibayar' group by id_beli order by id_beli desc");
												while($dt=mysql_fetch_array($sql)){
													$tgl_trx = format_tanggallengkap($dt[tanggal]);
													$harga = format_rupiah($dt[harga]);
													$ttl = $dt[harga] * $dt[jumlah];
													$total = format_rupiah($ttl);
													$totalharga+=$ttl;
													$th = format_rupiah($totalharga);
												echo "
												<tr>
													<td style='text-align:center'>$dt[id_beli]</td>
													<td>$dt[nama_user]</td>
													<td style='text-align:center'>$dt[no_meja]</td>
													<td>$dt[nama]</td>
													<td style='text-align:center'><a href='?menu=transaksi&ke=bayar&id_beli=$dt[id_beli]&no_meja=$dt[no_meja]' data-toggle='modal' class='btn'>Bayar</a>
													</td>
												</tr>";
												}
											?>
											</tbody>
									</table>
									<?php 
									if ($bnykpesanan == 0){
										echo "";
									}
									else{
									?>
									<div class="muted pull-right"><b><h3>Total Keseluruhan : <?php echo $th;?></h3></b></div>
									<?php } ?>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
<?php
	break;
	case'bayar':
?>
											<?php 
												$sql = mysql_query("select * from detail_beli inner join produk using (id_produk) inner join pembelian using (id_beli) where id_beli='$_GET[id_beli]'");
												$dt=mysql_fetch_array($sql);
													$ttl = $dt[harga]*$dt[jumlah];
													$tot= $tot + $ttl;
												?>
								<div class="span12">
                                    <form class="form-horizontal" action="menu/laporan/struk.php?id_beli=<?php echo $dt[id_beli];?>" method="POST" target="new" enctype="multipart/form-data">
                                      <fieldset>
                                        <legend>Transaksi Pembayaran</legend>
										<div class="control-group">
                                          <label class="control-label" for="focusedInput">Nomor Meja</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" id="focusedInput" name="no_meja" type="text" value="<?php echo $dt[no_meja];?>" readonly>
                                          </div>
                                        </div>
										<div class="control-group">
                                          <label class="control-label" for="focusedInput">Atas Nama</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" id="focusedInput" name="nama" type="text" value="<?php echo $dt[nama];?>" readonly>
                                          </div>
                                        </div>
										<div class="control-group">
                                          <label class="control-label" for="focusedInput">Daftar Pesanan</label>
                                          <div class="controls">
											<table border="0" cellpadding="2px" width="400px">
											<tr>
												<th style="text-align:left">Nama Pesanan</th>
												<th style="text-align:right">Harga</th>
												<th style="text-align:center">Qty</th>
												<th style="text-align:right">Sub Total</th>
											</tr>
											<?php
												$sql = mysql_query("SELECT * FROM detail_beli full join produk using (id_produk) WHERE id_beli='$_GET[id_beli]'");		  
												while($d=mysql_fetch_array($sql)){
														$subtotal = $d['harga']* $d['jumlah'];
														$total = $total + $subtotal;
														$harga = format_rupiah($d[harga]);
														$jm_harga = format_rupiah($subtotal);
														$bayar = format_rupiah($total);
														$byr=$_POST['bayar'];
														$kembali=$byr-$bayar;
														echo"<tr>
															<td>$d[nama_produk]</td>
															<td style='text-align:right'>$harga</td>
															<td style='text-align:center'>$d[jumlah]</td>
															<td style='text-align:right'><b>$jm_harga</b></td>
															</tr>";
												}
											?>
											</table>
										   </div>
										</div>
										<div class="control-group">
                                          <label class="control-label" for="focusedInput">Total Harga</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" id="focusedInput" style="text-align:right" name="bayar" type="text" value="<?php echo $total;?>">
                                          </div>
                                        </div>
										<div class="control-group">
                                          <label class="control-label" for="focusedInput">Bayar</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" id="focusedInput" style="text-align:right" name="harga" type="text" required>
                                          </div>
                                        </div>
                                        <div class="form-actions">
                                          <button type="submit" class="btn btn-primary">OK</button>
                                          <button type="reset" class="btn">Batal</button>
                                    </form>
										  <a href="?menu=transaksi" class="btn btn-success">Kembali</a>
                                        </div>
                                      </fieldset>
								</div>
<?php
	break;
}
?>