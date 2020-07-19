<?php
	$tgll = date("Y-m-d");
	$tanggalsekarang = format_tanggallengkap($tgll);
?>
<?php
$ke=$_GET['ke'];
switch($ke){
	default:
?>
					<div class="row-fluid">
						<div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><b class="a">Daftar Sudah Dibayar</b></div>
                            </div>
                            <div class="block-content collapse in">
								
                                <div class="span12">
									<div id="example_wrapper" class="dataTables_wrapper form-inline" role="grid">
									<div class="row"></div>
										<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" id="example" aria-describedby="example_info">
											<thead>
												<tr>
													<th style="text-align:center">No</th>
													<th style="text-align:center">No Transaksi</th>
													<th>Tgl Transaksi</th>
													<th style="text-align:center">No Meja</th>
													<th>Nama</th>
												</tr>
											</thead>
											<tbody>
											 <?php 
												$i=0;
												$sql = mysql_query("select * from detail_beli inner join produk using (id_produk) inner join pembelian using (id_beli) inner join user using (kode) where ket='Lunas' group by id_beli order by id_beli desc");
												while($dt=mysql_fetch_array($sql)){
													$no=$dt[id_beli];
													$tg = $dt[tgl_beli];
													$hasil = explode("-", $tg, 4);
													$h1=$hasil[0];
													$h2=$hasil[1];
													$tgl_trx = format_tanggallengkap($dt[tgl_beli]);
													$harga = format_rupiah($dt[harga]);
													$ttl = $dt[harga] * $dt[jumlah];
													$total = format_rupiah($ttl);
													$totalharga+=$ttl;
													$th = format_rupiah($totalharga);
													$i++;
												echo "
												<tr>
													<td style='text-align:center'>$i</td>
													<td style='text-align:center'>RRH$h1$h2-$no</td>
													<td>$tgl_trx</td>
													<td style='text-align:center'>$dt[no_meja]</td>
													<td>$dt[nama]</td>
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
}
?>