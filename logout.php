<?php
include "config/koneksi.php";
session_start();
$sid = session_id();
$sql1=mysql_query("select count(*) as jml from keranjang where id_session='$sid'");
	$dt=mysql_fetch_array($sql1);
	$jml=$dt['jml'];
	
	if ($jml > 0){
		echo "<script>alert('Maaf, sebelum logout pastikan pesanan dalam keranjang sudah terkirim. Paling tidak, keranjang harus kosong.'); window.location = '../pemesanan/'</script>";
	}
	else{
	  session_start();
	  session_destroy();
	  header('location:index.php');
	}
?>