<?php 
	$sql1=mysql_query("select * from pembelian where ket='Pesanan Baru' group by id_beli");
	$dt=mysql_fetch_array($sql1);
	$bnykpesanan=mysql_num_rows($sql1);
	
	$sql2=mysql_query("select * from pembelian where ket='Belum Dibayar' group by id_beli");
	$dt1=mysql_fetch_array($sql2);
	$belumbayar=mysql_num_rows($sql2);
	
	$sql3=mysql_query("select * from pembelian where ket='Lunas' group by id_beli");
	$dt2=mysql_fetch_array($sql3);
	$dibayar=mysql_num_rows($sql3);
?>
						<div class="row-fluid" style="margin-top:40px">
							<div class="span12" >
                                <div class="span4" >
                                    <div class="chart" data-percent="<?php echo $bnykpesanan;?>"><?php echo $bnykpesanan;?></div>
                                    <div class="chart-bottom-heading">
										<a href="?menu=pesanan"><span class="label label-info">Banyak Pesanan</span></a>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="chart" data-percent="<?php echo $belumbayar;?>"><?php echo $belumbayar;?></div>
                                    <div class="chart-bottom-heading">
										<a href="?menu=transaksi"><span class="label label-info">Banyak Belum Dibayar</span></a>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="chart" data-percent="<?php echo $dibayar;?>"><?php echo $dibayar;?></div>
                                    <div class="chart-bottom-heading">
										<a href="?menu=sudahdibayar"><span class="label label-info">Banyak Sudah Dibayar</span></a>
                                    </div>
                                </div>
							</div>
						</div>


<div class="row-fluid" style="margin-top:40px">
<div class="span12" >
	<div class="span2">
		<p><a href="?menu=pesanan"><img src="../gambar/pesanan.png" width="150"></a></p>
		<h5 align="center"><a href="?menu=pesanan"><b>Daftar Pesanan</b></a></h5>
	</div>
	<div class="span2">
		<p><a href="?menu=transaksi"><img src="../gambar/belum dibayar.png" width="150"></a></p>
		<h5 align="center"><a href="?menu=transaksi"><b>Data Belum Dibayar</b></a></h5>
	</div>
	<div class="span2">
		<p><a href="?menu=sudahdibayar"><img src="../gambar/sudah dibayar.png" width="150"></a></p>
		<h5 align="center"><a href="?menu=sudahdibayar"><b>Data Sudah Dibayar</b></a></h5>
	</div>
	<?php
		if ($_SESSION['level']=="Admin"){
	?>
	<div class="span2">
		<p><a href="?menu=makanan"><img src="../gambar/daftar Produk.png" width="150"></a></p>
		<h5 align="center"><a href="?menu=makanan"><b>Daftar Menu</b></a></h5>
	</div>
	<div class="span2">
		<p><a href="?menu=kategori"><img src="../gambar/kategori.png" width="150"></a></p>
		<h5 align="center"><a href="?menu=kategori"><b>Kategori</b></a></h5>
	</div>
	<div class="span2">
		<p><a href="?menu=pengguna"><img src="../gambar/pengguna.png" width="150"></a></p>
		<h5 align="center"><a href="?menu=pengguna"><b>Pengguna</b></a></h5>
	</div>
	<?php
		}
		else{}
	?>
</div>
</div>
	