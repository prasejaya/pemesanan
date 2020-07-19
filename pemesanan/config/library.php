<?php
class Paging2{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){


    
if(empty($_GET['hal'])){
$posisi=0;
$_GET['hal']=1;
}
else{
$posisi = ($_GET['hal']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
$prev = $halaman_aktif-1;
$link_halaman .= " <div class='pagination pagination-centered'><ul>   <li class='disabled'><a href='#'>Halaman :</a></li><li ><a href='$_SERVER[PHP_SELF]?module=$_GET[module]&hal=1' class='nextprev'><< Pertama</a></li>
                  <li ><a href='$_SERVER[PHP_SELF]?module=$_GET[module]&hal=$prev' class='nextprev'>< Sebelumnya</a><li>";
}
else{
$link_halaman .= "<div class='pagination pagination-centered'><ul><li class='disabled'><a href='#'>Halaman :</a></li><li><span class='nextprev'><< Pertama</span></li><li><span class='nextprev'>< Sebelumnya </span><li> ";
}

// Link halaman 1,2,3, …
$angka = ($halaman_aktif > 3 ? "<li><span class='nextprev'>...</span></li>" : " ");
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
if ($i < 1)
continue;
$angka .= "<li><a href='$_SERVER[PHP_SELF]?module=$_GET[module]&hal=$i'>$i</a></li>  ";
}
$angka .= " <li><span class='current'><b>$halaman_aktif</b></span></li>";

for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
if($i > $jmlhalaman)
break;
$angka .= "<li><a href='$_SERVER[PHP_SELF]?module=$_GET[module]&hal=$i'>$i</a></li>  ";
}
$angka .= ($halaman_aktif+2<$jmlhalaman ? "<li><span class='nextprev'>...</span><a href='$_SERVER[PHP_SELF]?module=$_GET[module]&hal=$jmlhalaman'>$jmlhalaman</a></li> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last)
if($halaman_aktif < $jmlhalaman){
$next = $halaman_aktif+1;
$link_halaman .= "<li > <a href='$_SERVER[PHP_SELF]?module=$_GET[module]&hal=$next' class='nextprev'>Berikutnya ></a></li>
<li> <a href='$_SERVER[PHP_SELF]?module=$_GET[module]&hal=$jmlhalaman' class='nextprev'>Terakhir >></a></li></ul></div> ";
}
else{
$link_halaman .= " <li><span class='nextprev'>Berikutnya ></span> </li><li><span class='nextprev'> Terakhir >></li></ul></div></span>";
}
return $link_halaman;
}
}

function format_rupiah($angka){
  $rupiah=number_format($angka,0,',','.');
  return "Rp. ". $rupiah;
}




function format_tanggallengkap($tgl){
$seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");


		
			$tanggal = substr($tgl,8,2);
			$bulan = getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			$tgl1 = date('w',strtotime($tgl));
			$hari = $seminggu[$tgl1];
			return $hari.', ' .$tanggal.' '.$bulan.' '.$tahun;		 
	}	

	function getBulan($bln){
				switch ($bln){
					case 1: 
						return "Januari";
						break;
					case 2:
						return "Februari";
						break;
					case 3:
						return "Maret";
						break;
					case 4:
						return "April";
						break;
					case 5:
						return "Mei";
						break;
					case 6:
						return "Juni";
						break;
					case 7:
						return "Juli";
						break;
					case 8:
						return "Agustus";
						break;
					case 9:
						return "September";
						break;
					case 10:
						return "Oktober";
						break;
					case 11:
						return "November";
						break;
					case 12:
						return "Desember";
						break;
				}
			} 

function format_hari($tgl){
$seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");

			$tgl1 = date('w',strtotime($tgl));
			$hari = $seminggu[$tgl1];
			return $hari;
				 
	}	
// Fungsi untuk menampilkan tanggal saja
function format_tanggal($tgl){
			$tanggal = substr($tgl,8,2);
			return $tanggal;		 
	}	
// Fungsi untuk menampilkan bulan huruf saja
function format_bulanhuruf($tgl){
			$bulan = getBulan(substr($tgl,5,2));
			return $bulan;		 
	}	
// Fungsi untuk menampilkan bulan saja
function format_bulan($tgl){
			$bulan = substr($tgl,5,2);
			return $bulan;		 
	}	
// Fungsi untuk menampilkan tahun saja
function format_tahun($tgl){
			$tahun = substr($tgl,0,4);
			return $tahun;		 
	}	

function f_bulan($bln){
				switch ($bln){
					case 1: 
						return "Januari";
						break;
					case 2:
						return "Februari";
						break;
					case 3:
						return "Maret";
						break;
					case 4:
						return "April";
						break;
					case 5:
						return "Mei";
						break;
					case 6:
						return "Juni";
						break;
					case 7:
						return "Juli";
						break;
					case 8:
						return "Agustus";
						break;
					case 9:
						return "September";
						break;
					case 10:
						return "Oktober";
						break;
					case 11:
						return "November";
						break;
					case 12:
						return "Desember";
						break;
				}
			}

$sekarang=format_tanggallengkap(date('Y-m-d')); 

?>


