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
	$this->Cell(30,10,'LAPORAN TOTAL',0,0,'C');
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
$pdf->Cell(10);
$pdf->Cell(14,7,'No',1,0,'C',true);
$pdf->Cell(30,7,'No Meja',1,0,'C',true);
$pdf->Cell(50,7,'Nama Pemesan',1,0,'C',true);
$pdf->Cell(40,7,'Pelayan',1,0,'C',true);
$pdf->Cell(35,7,'Subtotal',1,0,'C',true);
$pdf->ln();

$pdf->SetFont('Arial','',10);
$i=0;
$sql = mysql_query("select * from pembelian inner join user using (kode) where ket='Lunas' order by id_beli desc");
	while($dt=mysql_fetch_array($sql)){
		$subtotal = $dt['bayar'];
		$total += $subtotal;
		$harga = format_rupiah($dt[harga]);
		$jm_harga = format_rupiah($subtotal);
		$tot_rp = format_rupiah($total);
		
	$i++;
	$pdf->Cell(10);
	$pdf->Cell(14,7,$i,1,0,'C');
	$pdf->Cell(30,7,$dt['no_meja'],1,0,'C');
	$pdf->Cell(50,7,$dt['nama'],1,0);
	$pdf->Cell(40,7,$dt['nama_user'],1,0);
	$pdf->Cell(35,7,$jm_harga,1,0,'R');
	$pdf->ln();
	}
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(10);
	$pdf->Cell(134,7,'Total ',1,0,'R',true);
	$pdf->Cell(35,7,$tot_rp,1,0,'R',true);
	$pdf->ln(15);
$pdf->Output('I','Laporan Total');
?>