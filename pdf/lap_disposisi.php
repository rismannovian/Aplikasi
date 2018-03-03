<?php 
require('fpdf.php');
$db = new PDO('mysql:host=localhost;dbname=db_surat_masuk_keluar','root','');
class myPDF extends FPDF{
	function header(){
		$this->Image('tutorial/logo.png',9,6);
		$this->SetFont('Arial','B','14');
		$this->Cell(276,14,'DOCUMENT REPORT ',0 ,0 ,'C');
		$this->Ln();
		$this->SetFont('Times', 'B', '12');
		$this->Cell(275,7,'LAPORAN DATA DISPOSISI',0,0,'C');		
		$this->Ln(10);
	}
	function footer(){
		$this->SetY(-15);
		$this->SetFont('Arial', '', 8);
		$this->Cell(0,10,$this->PageNo(),0,0,'R');
	}
	function headertable(){
		$this->SetFont('Times','B',12);
		$this->SetFillColor(200,220,255);
		$this->Cell(35,10,'No Disposisi',1,0,'C');
		$this->Cell(35,10,'No Agenda',1,0,'C',true);
		$this->Cell(35,10,'No Surat',1,0,'C');
		$this->Cell(35,10,'Kepada',1,0,'C',true);
		$this->Cell(45,10,'Keterangan',1,0,'C');
		$this->Cell(40,10,'Status Surat',1,0,'C',true);
		$this->Cell(50,10,'Tanggapana',1,0,'C');
		$this->Ln();
	}
	function viewtable($db){
		$this->SetFont('Times','',12);
		 $this->SetFillColor(200,220,255);
		$stmt= $db->query('SELECT * from disposisi');
		while ($data = $stmt->fetch(PDO::FETCH_OBJ)) {
			$this->Cell(35,10, $data->no_disposisi,1,0,'C',true);
			$this->Cell(35,10,$data->no_agenda,1,0,'C');
			$this->Cell(35,10,$data->no_surat,1,0,'C',true);
			$this->Cell(35,10,$data->kepada,1,0,'C');
			$this->Cell(45,10,$data->keterangan,1,0,'C',true);
			$this->Cell(40,10,$data->jenis_surat,1,0,'C');
			$this->Cell(50,10,$data->tanggapan,1,0,'C',true);
			$this->Ln();
		}

	}
}
$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4','0');
$pdf->headertable();
$pdf->viewtable($db);
$pdf->Output();


 ?>