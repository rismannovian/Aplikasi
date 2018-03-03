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
		$this->Cell(275,7,'LAPORAN DATA SURAT MASUK',1,0,'C');		
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
		$this->Cell(30,10,'No Agenda',1,0,'C',true);
		$this->Cell(20,10,'ID',1,0,'C');
		$this->Cell(45,10,'Jenis Surat',1,0,'C',true);
		$this->Cell(40,10,'Tanggal Kirim',1,0,'C');
		$this->Cell(40,10,'Tanggal Terima',1,0,'C',true);
		$this->Cell(30,10,'No Surat',1,0,'C');
		$this->Cell(35,10,'Pengirim',1,0,'C',true);
		$this->Cell(35,10,'Penerima',1,0,'C');
		$this->Ln();
	}

	
	function viewtable($db){
		$this->SetFont('Times','',12);
		 $this->SetFillColor(200,220,255);
		$stmt= $db->query('SELECT * from surat_masuk');
		while ($data = $stmt->fetch(PDO::FETCH_OBJ)) {
			$this->Cell(30,10, $data->no_agenda,1,0,'C',true);
			$this->Cell(20,10,$data->id,1,0,'C');
			$this->Cell(45,10,$data->jenis_surat,1,0,'C',true);
			$this->Cell(40,10,$data->tanggal_kirim,1,0,'C');
			$this->Cell(40,10,$data->tanggal_terima,1,0,'C',true);
			$this->Cell(30,10,$data->no_surat,1,0,'C');
			$this->Cell(35,10,$data->pengirim,1,0,'C',true);
			$this->Cell(35,10,$data->penerima,1,0,'C');
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