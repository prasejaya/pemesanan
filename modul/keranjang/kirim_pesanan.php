<?php
	session_start();
	include "../../config/koneksi.php";
	$sid = session_id();
	
	function isi_keranjang(){
		$isikeranjang = array();
		$sid = session_id();
		$sql = mysql_query("SELECT * FROM keranjang WHERE id_session='$sid'");
		
		while ($r=mysql_fetch_array($sql)) {
			$isikeranjang[] = $r;
		}
		return $isikeranjang;
	}  

	$isikeranjang = isi_keranjang();
	$jml          = count($isikeranjang);

	$nama = $_POST['nama'];
	$meja = $_POST['no_meja'];
	$kode = $_POST['kode']; 
	mysql_query("INSERT INTO pembelian(id_beli, tgl_beli, nama, no_meja, kode, ket) VALUES ('', curdate(), '$nama', '$meja', '$kode', 'Pesanan Baru')");
	$id_orders=mysql_insert_id();
	
	for ($i = 0; $i < $jml; $i++){
	  mysql_query("INSERT INTO detail_beli(id_beli, id_produk, jumlah) VALUES('$id_orders', {$isikeranjang[$i]['id_produk']}, {$isikeranjang[$i]['jumlah']})");
	}
	for ($i = 0; $i < $jml; $i++) { 
	  mysql_query("DELETE FROM keranjang WHERE id_belanja = {$isikeranjang[$i]['id_belanja']}");
	}

?>