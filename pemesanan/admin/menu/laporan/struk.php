<?PHP
session_start();
include "../../../config/koneksi.php";
include "../../../config/library.php";

mysql_query("UPDATE pembelian SET bayar = '$_POST[bayar]', kd_kasa = '$_SESSION[kode]', ket = 'Lunas' WHERE id_beli='$_GET[id_beli]'");
$tg=date("Y-m-d");
$tg2=format_tanggallengkap($tg);
$sql1 = mysql_query("SELECT * FROM detail_beli full join pembelian using (id_beli) WHERE id_beli='$_GET[id_beli]'");		  
$d1=mysql_fetch_array($sql1);
$i=0;
$i++;
$no=$d1[id_beli];
?>
<head>
	<title>Struk Pembayaran</title>
	<style>
		.tabel{
			font-size:8pt
		}
		.table{
			font-size:7pt
		}
		body{
			font-family:monospace;
			width:100%;
			margin:auto;
			margin-left:none;
			margin-right:none;
			margin-top:none;
			margin-bottom:none;
		}
	</style>
</head>
<body onLoad="window.print()">
	<div class="row text-center">
			<table cellpadding="-10px" class="tabel" style="width:100%">
				<tr>
					<th style="text-align:center" colspan="4"><img src="../../../gambar/logo.png" width="80px"></th>
				</tr>
				<tr>
					<th style="text-align:center" colspan="4">RESTORAN RUMPUT HIJAU</th>
				</tr>
				<tr>
					<th style="text-align:center" colspan="4">Struk Pembayaran <br> RRH<?php echo date("ym");?>-<?php echo $no;?></th>
				</tr>
				<tr>
					<th style="text-align:center" colspan="4"><?php echo $tg2;?><br><hr></th>
				</tr>
				<tr>
					<td class="table">Kode Kasir : <?php echo $_SESSION['kode'];?></td>
				</tr>
				<tr>
					<td class="table">Nama Pemesan : <?php echo $d1['nama'];?></td>
				</tr>
				<tr>
					<td class="table">Nomor Meja : <?php echo $d1['no_meja'];?></td>
				</tr>
			</table>
			<hr>
			<table class="table" style="width:100%">
				<tr>
					<th style="text-align:left;width:30%">Produk</th>
					<th style="text-align:right;width:50%">Hrg(Rp)</th>
					<th style="text-align:center;width:20%">Q</th>
					<th style="text-align:right;width:50%">Ttl(Rp)</th>
				</tr>
				<?php
					$sql = mysql_query("SELECT * FROM detail_beli full join produk using (id_produk) WHERE id_beli='$_GET[id_beli]'");		  
					while($d=mysql_fetch_array($sql)){
							$subtotal = $d['harga']* $d['jumlah'];
							$total = $total + $subtotal;
							$harga = format_rupiah($d[harga]);
							$jm_harga = format_rupiah($subtotal);
							$bayar = format_rupiah($total);
							$byr=$_POST['harga'];
							$byr_rp=format_rupiah($byr);
							$kembali=$byr-$total;
							$kembali_rp=format_rupiah($kembali);
							echo"<tr>
								<td style='width:30%'>$d[nama_produk]</td>
								<td style='text-align:right;width:20%'>$d[harga]</td>
								<td style='text-align:center;width:20%'>$d[jumlah]</td>
								<td style='text-align:right'><b>$subtotal</b></td>
								</tr>";
					}
				?>
			</table>
			<table class="table" cellpadding="-10px" style="width:100%">
				<tr><td colspan="4" align="right">-------------------------</td></tr>
				<tr>
					<td colspan="4" align="right"> Total Bayar(Rp) : <b><?php echo $total;?></b></td>
				</tr>
				<tr>
					<td colspan="4" align="right"> Bayar(Rp) : <b><?php echo $byr;?></b></td>
				</tr>
				<tr><td colspan="4" align="right">-------------------------</td></tr>
				<tr>
					<td colspan="4" align="right"> Kembali(Rp) : <b><?php echo $kembali;?></b></td>
				</tr>
				<tr>
					<td colspan="4" align="center"> <br>Terimakasih <br> Atas Kunjungan Anda<br></td>
				</tr>
			</table>
			<hr>
        </div>
</body>