<?php
require("../../fpdf/fpdf.php");
include "../../../config/koneksi.php";
include "../../../config/library.php";

class PDF extends FPDF
{
// Page header
function Header()
{
$tgl = $_POST['tgl'];
$bln = $_POST['bln'];
$thn = $_POST['thn'];
$awal = "$thn-$bln-$tgl";
$akhir = "$_POST[thn1]-$_POST[bln1]-$_POST[tgl1]";
$tgl_awal = format_tanggallengkap($awal);
$tgl_akhir = format_tanggallengkap($akhir);
    // Logo
    $this->Image('../../../gambar/logo.png',90,20,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Ln(25);
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'RESTAURANT RUMPUT HIJAU',0,0,'C');
    // Line break
	$this->Ln(7);
    $this->Cell(80);
	$this->Cell(30,10,'LAPORAN PERIODE',0,0,'C');
	$this->Ln(7);
    $this->Cell(80);
	$this->SetFont('Arial','B',12);
	$this->Cell(30,10,''.$tgl_awal. ' - ' .$tgl_akhir.'',0,0,'C');
    $this->Ln(20);
}
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Halaman '.$this->PageNo(),0,0,'C');
}

}

//data

// Instanciation of inherited class
$pdf = new PDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$tgl = $_POST['tgl'];
$bln = $_POST['bln'];
$thn = $_POST['thn'];
$awal = "$thn-$bln-$tgl";
$akhir = "$_POST[thn1]-$_POST[bln1]-$_POST[tgl1]";
$tgl_awal = format_tanggallengkap($awal);
$tgl_akhir = format_tanggallengkap($akhir);

$sql1 = mysql_query("select * from pembelian WHERE tgl_beli >= '$awal' and tgl_beli <= '$akhir' group by tgl_beli order by tgl_beli ASC");
	while($dt1=mysql_fetch_array($sql1)){
	$tgl=format_tanggallengkap($dt1['tgl_beli']);
	$pdf->SetFillColor(4,226,35,1);
	$pdf->SetFont('Arial','B',15);
	$pdf->Cell(23);
	$pdf->Cell(144,10,$tgl,1,0,'C',true);
	$pdf->ln();
	
	$sql2 = mysql_query("select * from detail_beli inner join pembelian using (id_beli) where tgl_beli='$dt1[tgl_beli]' and ket='Lunas' group by no_meja order by jumlah desc");
	while($dt2=mysql_fetch_array($sql2)){
	$pdf->SetFillColor(204,204,204,1);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(23);
	$pdf->Cell(27,7,'Kode Kasir',1,0,'C',true);
	$pdf->Cell(23,7,$dt2['kd_kasa'],1,0);
	$pdf->Cell(19,7,'No Meja',1,0,'C',true);
	$pdf->Cell(14,7,$dt2['no_meja'],1,0,'C');
	$pdf->Cell(25,7,'Pemesan',1,0,'C',true);
	$pdf->Cell(36,7,$dt2['nama'],1,0);
	$pdf->ln();
	
	$pdf->Cell(23);
	$pdf->Cell(14,7,'No',1,0,'C',true);
	$pdf->Cell(55,7,'Nama Produk',1,0,'C',true);
	$pdf->Cell(25,7,'Harga',1,0,'C',true);
	$pdf->Cell(20,7,'Jumlah',1,0,'C',true);
	$pdf->Cell(30,7,'Subtotal',1,0,'C',true);
	$pdf->ln();
	$i=0;
	$sql = mysql_query("select * from detail_beli inner join produk using (id_produk) inner join pembelian using (id_beli) where id_beli='$dt2[id_beli]' and ket='Lunas' order by jumlah desc");
	while($dt=mysql_fetch_array($sql)){
	$harga = format_rupiah($dt['harga']);
	$sub = $dt['harga']*$dt['jumlah'];
	$sub_rp = format_rupiah($sub);
	$tot_rp = format_rupiah($dt['bayar']);
	$i++;
	$pdf->Cell(23);
	$pdf->Cell(14,7,$i,1,0,'C');
	$pdf->Cell(55,7,$dt['nama_produk'],1,0);
	$pdf->Cell(25,7,$harga,1,0,'R');
	$pdf->Cell(20,7,$dt['jumlah'],1,0,'C');
	$pdf->Cell(30,7,$sub_rp,1,0,'R');
	$pdf->ln();
	}
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(23);
	$pdf->Cell(114,10,'Total',1,0,'R');
	$pdf->Cell(30,10,$tot_rp,1,0,'R');
	$pdf->ln();
	}
	$sql3 = mysql_query("select bayar, sum(bayar) as grand from pembelian where tgl_beli='$dt1[tgl_beli]'");
	$dt3=mysql_fetch_array($sql3);
	$grand = $dt3['grand'];
	$pendapatan += $grand;
	$grand_rp = format_rupiah($grand);
	$pdf->SetFillColor(4,226,35,1);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(23);
	$pdf->Cell(114,10,'GRAND TOTAL',1,0,'R',true);
	$pdf->Cell(30,10,$grand_rp,1,0,'R',true);
	$pdf->ln();
	$pdf->ln(10);
	}
	$pdf->SetFont('Arial','B',15);
	$pdf->Cell(23);
	$pdf->Cell(95,10,'TOTAL PENDAPATAN PERIODE',1,0,'C',true);
	$pdf->Cell(49,10,format_rupiah($pendapatan),1,0,'R',true);
	$pdf->ln();
$pdf->Output('I','Laporan Total');
?>