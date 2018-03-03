<?php
require('fpdf.php');
   include "../koneksi.php";
 
  
$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,5,'CV. FAWAIQ JAYA MOBIL','0','1','C',false);
$pdf->SetFont('Arial','i',8);
$pdf->Cell(0,5, 'Alamat : Jl. Koja II No. 26 jatiasih Bekasi','0','1','C',false);
$pdf->Cell(0,5, 'Code by http://rianpraditya.blogspot.com','0','1','C',false);
$pdf->Ln(3);
$pdf->Cell(190,0,6,'','0','1','L', true);
$pdf->Ln(5);

$pdf->SetFont('Arial','B',9);
$pdf->Cell(50,5,'Laporan Data Masuk','0','1','L',false);
$pdf->Ln(3);

$pdf->SetFont('Arial','B',7);
$pdf->Cell(8,6,'No',1,0,'C');
$pdf->Cell(35,6,'No Agenda',1,0,'C');
$pdf->Cell(20,6,'ID',1,0,'C');
$pdf->Cell(35,6,'Jenis Surat',1,0,'C');
$pdf->Cell(35,6,'Tanggal Kirim',1,0,'C');
$pdf->Cell(35,6,'No Surat',1,0,'C');
$pdf->Cell(35,6,'Pengirim',1,0,'C');
$pdf->Cell(35,6,'Perihal',1,0,'C');
$pdf->Ln(2);
$no = 0;
$sql = mysql_query("SELECT * from surat_keluar order by no_agenda asc ");
while ($data = mysql_fetch_array($sql)) {
    $no++;
$pdf->Ln(4);
$pdf->SetFont('Arial','',7);
$pdf->Cell(8,4,$no,1,0,'C');
$pdf->Cell(35,4,$data['no_agenda'],1,0,'L');
$pdf->Cell(20,4,$data['id'],1,0,'L');
$pdf->Cell(35,4,$data['jenis_surat'],1,0,'L');
$pdf->Cell(35,4,$data['tanggal_kirim'],1,0,'L');
$pdf->Cell(35,4,$data['no_surat'],1,0,'L');
$pdf->Cell(35,4,$data['pengirim'],1,0,'L');
$pdf->Cell(35,4,$data['perihal'],1,0,'L');

}

$pdf->Output();
?>