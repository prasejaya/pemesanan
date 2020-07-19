<div class="row-fluid">
	<div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left"><b class="a">Laporan</b></div>
        </div>
		<div class="block-content collapse in">	
            <div class="span12">
				<a href="?menu=laporan&ke=laporandetail" class="btn btn-primary">Laporan Periode</a>
				<a href="menu/laporan/laporan_produk.php" target="new1" class="btn btn-primary">Laporan Produk Detail</a>
				<a href="menu/laporan/laporan_produk2.php" target="new2" class="btn btn-primary">Laporan Produk Ringkas</a>
				<a href="menu/laporan/laporan_total.php" target="ke" class="btn btn-primary">Laporan Total</a>
				<a href="?menu=grafikproduk" class="btn btn-success">Grafik Penjualan</a>
  			</div>
		</div>
<?php
	$ke=$_GET['ke'];
	switch ($ke){
		case 'laporandetail':
?>
	<div class="row-fluid">
        <div class="block-content collapse in">
            <form method="POST" class="form-inline" target="BARU" action="menu/laporan/laporan_detail.php">
				<div class="form-group">
					<a href="?menu=laporan" class="btn btn-success">Tutup</a>
					<label>Tanggal Awal</label>
					<select style="width:6%" name="tgl" id="tgl">
						<option>	Tgl	</option>
						<option>	01	</option>
						<option>	02	</option>
						<option>	03	</option>
						<option>	04	</option>
						<option>	05	</option>
						<option>	06	</option>
						<option>	07	</option>
						<option>	08	</option>
						<option>	09	</option>
						<option>	10	</option>
						<option>	11	</option>
						<option>	12	</option>
						<option>	13	</option>
						<option>	14	</option>
						<option>	15	</option>
						<option>	16	</option>
						<option>	17	</option>
						<option>	18	</option>
						<option>	19	</option>
						<option>	20	</option>
						<option>	21	</option>
						<option>	22	</option>
						<option>	23	</option>
						<option>	24	</option>
						<option>	25	</option>
						<option>	26	</option>
						<option>	27	</option>
						<option>	28	</option>
						<option>	29	</option>
						<option>	30	</option>
						<option>	31	</option>
					</select>
					<select style="width:10%" name="bln" id="bln">
						<option>	Bulan	</option>
						<option	value="01"	>	Januari	</option>
						<option	value="02"	>	Februari	</option>
						<option	value="03"	>	Maret	</option>
						<option	value="04"	>	April	</option>
						<option	value="05"	>	Mei	</option>
						<option	value="06"	>	Juni	</option>
						<option	value="07"	>	Juli	</option>
						<option	value="08"	>	Agustus	</option>
						<option	value="09"	>	September	</option>
						<option	value="10"	>	Oktober	</option>
						<option	value="11"	>	Nopember	</option>
						<option	value="12"	>	Desember	</option>
					</select>
					<select style="width:8%" name="thn" id="select">
						<option>	Tahun	</option>
						<?php for($i=2016;$i<=date("Y");$i++){ ?>
						<option><?php echo $i?></option>
						<?php } ?>
					</select>
				
					<label>Tanggal Akhir</label>
					<select style="width:6%" name="tgl1" id="tgl1">
						<option>	Tgl	</option>
						<option>	01	</option>
						<option>	02	</option>
						<option>	03	</option>
						<option>	04	</option>
						<option>	05	</option>
						<option>	06	</option>
						<option>	07	</option>
						<option>	08	</option>
						<option>	09	</option>
						<option>	10	</option>
						<option>	11	</option>
						<option>	12	</option>
						<option>	13	</option>
						<option>	14	</option>
						<option>	15	</option>
						<option>	16	</option>
						<option>	17	</option>
						<option>	18	</option>
						<option>	19	</option>
						<option>	20	</option>
						<option>	21	</option>
						<option>	22	</option>
						<option>	23	</option>
						<option>	24	</option>
						<option>	25	</option>
						<option>	26	</option>
						<option>	27	</option>
						<option>	28	</option>
						<option>	29	</option>
						<option>	30	</option>
						<option>	31	</option>
					</select>
					<select style="width:10%" name="bln1" id="bln1">
						<option>	Bulan	</option>
						<option	value="01"	>	Januari	</option>
						<option	value="02"	>	Februari	</option>
						<option	value="03"	>	Maret	</option>
						<option	value="04"	>	April	</option>
						<option	value="05"	>	Mei	</option>
						<option	value="06"	>	Juni	</option>
						<option	value="07"	>	Juli	</option>
						<option	value="08"	>	Agustus	</option>
						<option	value="09"	>	September	</option>
						<option	value="10"	>	Oktober	</option>
						<option	value="11"	>	Nopember	</option>
						<option	value="12"	>	Desember	</option>
					</select>
					<select style="width:8%" name="thn1" id="select1">
						<option>	Tahun	</option>
						<?php for($i=2016;$i<=date("Y");$i++){ ?>
						<option><?php echo $i?></option>
						<?php } ?>
					</select>
					<input type='submit' class='btn btn-primary' value='Cetak'>
				</div>
			</form>
		</div>
	</div>
<?php
	break;
	}
?>

	</div>
</div>