<?php
require('fpdf.php');

class PDF extends FPDF {

	function Header(){
		global $title;
		$w = $this->GetStringWidth($title)+6;
	    $this->SetX((210-$w)/2);
		$this->SetFont('Arial','B',15);
		$this->SetLineWidth(1);
		$this->Cell($w,15,$title,0,0,'C');
    	// Line break
	    $this->Ln(20);
	}

	function LoadData($file){
    
    $lines = file($file);
    $data = array();
    foreach($lines as $line)
    $data[] = explode(';',trim($line));
    return $data;
	}
	function Chapter($num, $label){
	
		$this->SetFont('Times','B',12);
	    $this->SetFillColor(200,220,255);
	    $this->Cell(0,6,"Chapter $num : $label",0,1,'L',true);
	    $this->Ln(4);

	}

	function Mybody($file, $type, $datas){
		if ($type=='file') {

			$txt = file_get_contents($file);
			$this->SetFont('Times','',12);
		    $this->MultiCell(0,5,$txt);
		    $this->Ln();
		}
		else if($type= 'csv'){
			$w = array(40, 35, 40, 45);
		    for($i=0;$i<count($datas);$i++)
		        $this->Cell($w[$i],7,$datas[$i],1,0,'C');
		    $this->Ln();
		    foreach($file as $row)
		    {
		        $this->Cell($w[0],6,$row[0],'LR');
		        $this->Cell($w[1],6,$row[1],'LR');
		        $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
		        $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
		        $this->Ln();
		    }
		    $this->Cell(array_sum($w),0,'','T');


		}
		else{
				for($i=1;$i<=40;$i++){
		    	$pdf->Cell(0,10,'Printing line number '.$i,0,1);
		    	}
		}

	}

	function Layout($num, $label, $file, $type, $datas){
		$this->AddPage();
		$this->Chapter($num, $label);
		$this->Mybody($file, $type, $datas);
	}

	function Footer(){
	    $this->SetY(-15);
	    // Arial italic 8
	    $this->SetFont('Arial','I',8);
	    // Page number
	    $this->Cell(0,10,$this->PageNo(),0,0,'R');
	}
}

$pdf = new PDF();
$title = 'Document Report';
$pdf->SetTitle($title);
$pdf->SetAuthor('Jules Verne');
$pdf->Layout(1, 'Pendahulu', 'install.txt', 'file', '');
$pdf->Layout(2, 'Landasan Teori', 'install.txt', 'file', '');
$header = array('Country', 'Capital', 'Area (sq km)', 'Pop. (thousands)');
// Data loading
$data = $pdf->LoadData('tutorial/countries.txt');
$pdf->Layout(2, 'Perancangan', $data, 'cvs', $header);
$pdf->Output();
?>