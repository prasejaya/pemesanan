<?php 
session_start();	
include "config/koneksi.php";
include "config/library.php";
$sid = session_id();
$pesanan = mysql_query("select count(*) as banyak_pesanan from keranjang where id_session='$sid'");
$tampil = mysql_fetch_array($pesanan);
$banyak = $tampil['banyak_pesanan'];

if (empty($_SESSION['username']) || empty($_SESSION['password'])){
	header('location:login.php');
}
else{
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Terang Bulan Cak Wie</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<!--<link href="css/bootstrap-responsive.min.css" rel="stylesheet"><-->
    <link href="css/heroic-features.css" rel="stylesheet">
</head>

<body >
	<nav class="navbar navbar-inverse navbar-fixed-top"  role="navigation">
        <div class="container" >
			<div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a style="color:#ffffff" class="navbar-brand" href="#">Terang Bulan Cak Wie</a>
            </div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                     <li>
						<a style="color:#ffffff"> <span class="glyphicon glyphicon-user"></span> Selamat Datang <?php echo $_SESSION[nama];?></a>
					  </li>
					  <li>
						<a style="color:#ffffff" href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Keluar</a>
					  </li>
                </ul>
            </div>
        </div>
    </nav>
	<?php 
	$ke=$_GET['ke'];
	switch($ke){
		default :
	?>
    <div class="container" >
        <div class="row text-center">
		<div class=" navbar-collapse">
			<ul class="nav nav-tabs">
			  <?php
			  $qr=mysql_query("select * from jenis");
			  while($da=mysql_fetch_array($qr)){
				  echo "
				  <li><a href='#$da[jenis]' data-toggle='tab'>$da[jenis]</a></li>";
			  }
				if ($banyak == 0){
					echo "";
				}
				else{
					echo "<li><a href='?ke=lihatkeranjang'><img src='gambar/keranjang.png' width='20px'> <span class='badge badge-warning'>$banyak</span></a></li>";
				}
				?>
			</ul>
		<form action="modul/keranjang/aksi_keranjang.php" method="post">
			<div class="tab-content">
			  <?php
			  $qr1=mysql_query("select * from jenis");
			  while($da1=mysql_fetch_array($qr1)){
				  if ($da1[id_jenis]==1){
					  $a = "active";
				  }
				  else{
					  $a = "";
				  }
				  echo "
				 <div class='tab-pane $a' id='$da1[jenis]'>";
				 include "daftar.php";
				 echo "</div>";
			  }
			  ?>
			</div>
			<input type='submit' class='btn btn-primary' name='kirim' value='Simpan Ke Keranjang'>
		</form>
		</div>
		</div>
		<hr>
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; <?php echo date("Y");?> - Terang Bulan Cak Wie</p>
                </div>
            </div>
        </footer>

    </div>
	<?php
		break;
		case 'lihatkeranjang':
	?>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
			<div class="navbar-header" style="float:right">
				<?php
					$sql2 = mysql_query("SELECT * FROM keranjang, produk WHERE id_session='$sid' AND keranjang.id_produk=produk.id_produk");		  
					while($d3=mysql_fetch_array($sql2)){
					$subtotal1 = $d3['harga']* $d3['jumlah'];
					$total1 = $total1 + $subtotal1;
					$bayar1 = format_rupiah($total1);
					}
					if ($total1 == 0){
						$cetak = "";
					}
					else{
						$cetak ="<a style='color:#ffffff' class='navbar-brand'><b>Total : $bayar1</b></a>";
					}
				?>
				<?php echo $cetak;?>
			</div>
			<div class="navbar-header" >
				<?php
					$sql1=mysql_query("select count(*) as jml from keranjang where id_session='$sid'");
					$dt=mysql_fetch_array($sql1);
					$jml=$dt['jml'];
					
					if ($jml > 0){
				?>
					<a class="btn btn-success" href="../pemesanan/">Tambah <span class="glyphicon glyphicon-plus"></span></a>
				<?php 
					}
					else{
				?>
					<a class="btn btn-success" href="../pemesanan/"><span class="glyphicon glyphicon-arrow-left"></span> Kembali </a>
				<?php } ?>
			</div>
        </div>
    </nav>

    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h3>Keranjang Anda</h3>
            </div>
        </div>
		<hr>
		<?php
			$sql = mysql_query("SELECT * FROM keranjang, produk WHERE id_session='$sid' AND keranjang.id_produk=produk.id_produk");		  
			$d=mysql_fetch_array($sql);
			$jml = mysql_num_rows($sql);
			if ($jml > 0){
		?>
        <div class="row text-center">
			<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" id="example" aria-describedby="example_info">
				<tr>
					<th style="text-align:center">Nama Pesanan</th>
					<th style="text-align:right">Harga</th>
					<th style="text-align:center">Qty</th>
					<th style="text-align:right">Sub Total</th>
					<th style="text-align:center">#</th>
				</tr>
				<?php
					$sql = mysql_query("SELECT * FROM keranjang full join produk using (id_produk) WHERE id_session='$sid' order by id_belanja desc");		  
					while($d2=mysql_fetch_array($sql)){
							$subtotal = $d2['harga']* $d2['jumlah'];
							$total = $total + $subtotal;
							$harga = format_rupiah($d2[harga]);
							$jm_harga = format_rupiah($subtotal);
							$bayar = format_rupiah($total);
							echo"<tr>
									<td style='text-align:center'><b>$d2[nama_produk]</b></td>
									<form action='?ke=edit&id_belanja=$d2[id_belanja]' method='post'>
									<td style='text-align:right'>
									<b>$harga</b></td>
									<td style='text-align:center;width:20%'>
										<input type='number' class='form-control' name='jumlah' value='$d2[jumlah]'/>
									</td>
									<td style='text-align:right'>$jm_harga</td>
									<td>
										<button class='btn btn-info' type='submit'><span class='glyphicon glyphicon-refresh'></span></button>
										<a href='#hapus_$d2[id_belanja]' data-toggle='modal' data-target='#hapus_$d2[id_belanja]' class='btn btn-warning'><span class='glyphicon glyphicon-trash'></span></a>
									</td>
									</form>
								</tr>
								<div class='modal fade modal-warning' id='hapus_$d2[id_belanja]' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                            <div class='modal-dialog'>
                                                <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                                        <h4 class='modal-title' id='myModalLabel'>Peringatan</h4>
                                                    </div>
                                                    <div class='modal-body'>
														<p>Anda yakin akan menghapus pesanan $d2[nama_produk] ?</p>
                                                    </div>
                                                    <div class='modal-footer'>
                                                        <a href='?ke=hapus&id_belanja=$d2[id_belanja]' class='btn btn-warning'>Ya</a>
														<button class='btn btn-info' data-dismiss='modal'>Batal</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>";
					}
				?>
			</table>
			<form method="POST" class="form-inline" action="?ke=selesai">
			<div class="form-group">
				<input type="number" class='form-control' name="no_meja" placeholder="Nomor Meja" required>
				<input type="text" class='form-control' name="nama" placeholder="Masukkan Nama" required>
				<input type="hidden" name="kode" value="<?php echo $_SESSION[kode];?>">
			</div>
			<button type="submit" class="btn btn-primary">Kirimkan Pesanan Sekarang</button>
			</form>
        </div>
		<?php
			}
			else{
				echo "Keranjang Anda Kosong";
			}
		?>
		<hr>

        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; <?php echo date("Y");?> - Terang Bulan Cak Wie</p>
                </div>
            </div>
        </footer>

    </div>
	<?php
		break;
		case 'edit':
			$query = "UPDATE `keranjang` SET `jumlah` = '$_POST[jumlah]' WHERE `keranjang`.`id_belanja` = '$_GET[id_belanja]'";
			mysql_query($query) or die ("Gagal");
			header('location:?ke=lihatkeranjang');
		
		break;
		case 'hapus':
			$query = "DELETE from `keranjang` WHERE id_belanja='$_GET[id_belanja]'";
			mysql_query($query) or die ("Gagal");
			header('location:?ke=lihatkeranjang');
	?>
	<?php
		break;
		case 'selesai':
	?>
	<?php
		include "modul/keranjang/kirim_pesanan.php";
	?>
	<div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Informasi</h3>
            </div>
        </div>
		<hr>
        <div class="row text-center">
			<h4><?php echo $_POST['nama'];?>... Pesanan Anda sudah terkirim. Mohon Tunggu.</h4>
			<a href="../pemesanan/" class="btn btn-primary">Oke, kembali ke halaman utama</a>
		</div>
		
	</div>
	<?php
		break;
	}
	?>
  
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery-1.12.2.js"></script>
	
</body>
</html>
<?php } ?>