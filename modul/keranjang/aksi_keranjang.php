<?php 
session_start();
include "../../config/koneksi.php";
$sid = session_id();
$banyak=count($_POST['id_produk']);

for ($i=0;$i<$banyak;$i++){
	$id=$_POST['id_produk'][$i];
	$jumlah=mysql_real_escape_string($_POST['jumlah'][$i]);
	
	if ($id<>"" and $jumlah<>""){
	
	
	$tampil=mysql_query("select * from keranjang where id_session='$sid' and id_produk='$id'");
	$data=mysql_fetch_array($tampil);
	$jumlahasal=$data[jumlah];
	$jumlahsekarang=$jumlahasal+$jumlah;
	$jum=mysql_num_rows($tampil);
	
	
	if ($jum>0){
		
		mysql_query("UPDATE `keranjang` SET `jumlah` = '$jumlahsekarang' WHERE `id_produk` = '$id';");
		
	}else{		mysql_query("INSERT INTO `keranjang` (`id_belanja`, `id_produk`, `id_session`, `jumlah`) VALUES (NULL, '$id', '$sid', '$jumlah');");
	}
	
	}
}
	header('Location:../../?ke=lihatkeranjang');
?>