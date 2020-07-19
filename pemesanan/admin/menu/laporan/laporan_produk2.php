<?php
require("../../fpdf/fpdf.php");
include "../../../config/koneksi.php";
include "../../../config/library.php";

class PDF extends FPDF
{
// Page header
function Header()
{
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
	$this->Cell(30,10,'LAPORAN RINGKAS PENJUALAN PRODUK',0,0,'C');
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
$pdf->SetFillColor(204,204,204,1);
$pdf->SetFont('Arial','B',12);


$pdf->SetFont('Arial','',10);
$pdf->Cell(17);
$pdf->Cell(14,7,'No',1,0,'C',true);
$pdf->Cell(50,7,'Tanggal',1,0,'C',true);
$pdf->Cell(40,7,'Jumlah Terjual',1,0,'C',true);
$pdf->Cell(52,7,'Banyak Terjual',1,0,'C',true);
$pdf->ln();
$i=0;
$sql1 = mysql_query("select tgl_beli from pembelian group by tgl_beli order by tgl_beli desc");
	while($dt1=mysql_fetch_array($sql1)){
	$i++;
	$tgl=format_tanggallengkap($dt1['tgl_beli']);
	$pdf->Cell(17);
	$pdf->Cell(14,7,$i,1,0,'C');
	$pdf->Cell(50,7,$tgl,1,0);
	$sql2 = mysql_query("select jumlah, sum(jumlah) as banyak from detail_beli inner join pembelian using (id_beli) where tgl_beli='$dt1[tgl_beli]' and ket='Lunas'");
	$dt2=mysql_fetch_array($sql2);
	$pdf->Cell(40,7,$dt2['banyak'].' Porsi',1,0,'C');
	$sql3 = mysql_query("select * from detail_beli inner join produk using (id_produk) inner join pembelian using (id_beli) where tgl_beli='$dt1[tgl_beli]' and ket='Lunas' order by jumlah desc");
	$dt3=mysql_fetch_array($sql3);
	$pdf->Cell(52,7,$dt3['nama_produk'],1,0);
	$pdf->ln();
	}
$pdf->Output('I','Laporan Total');
?>