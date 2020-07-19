<?php 
	if ($_GET[menu]=='home'){
		include "home.php";
	}
	elseif ($_GET[menu] == 'makanan'){
		include "menu/tabel makanan/makanan.php";
	}
	elseif ($_GET[menu] == 'pesanan'){
		include "menu/tabel pesanan/pesanan.php";
	}
	elseif ($_GET[menu] == 'pengguna'){
		include "menu/tabel admin/user_admin.php";
	}
	elseif ($_GET[menu] == 'kategori'){
		include "menu/tabel kategori/kategori.php";
	}
	elseif ($_GET[menu] == 'jenis'){
		include "menu/tabel jenis/jenis.php";
	}
	elseif ($_GET[menu] == 'transaksi'){
		include "menu/tabel transaksi/transaksi.php";
	}
	elseif ($_GET[menu] == 'sudahdibayar'){
		include "menu/laporan/data_terjual.php";
	}
	elseif ($_GET[menu] == 'grafikproduk'){
		include "menu/laporan/grafikproduk.php";
	}	
	elseif ($_GET[menu] == 'grafikgaris'){
		include "menu/laporan/grafik-garis.php";
	}	
	elseif ($_GET[menu] == 'laporan'){
		include "menu/laporan/laporan.php";
	}
	elseif ($_GET[menu] == 'range-produk'){
		include "menu/laporan/laporan_banyak_terjual.php";
	}
	else{
		echo "<div class='well'>
				<div class='box round first grid'>
					<h2>Halaman Tidak Ditemukan</h2>
					<div class='block'>
						<p><b> Menu belum ada atau <a href='?menu=home' style='color:blue'>Klik Disini</a></p>
					</div>
				</div>
			</div>
	";
	}
?>