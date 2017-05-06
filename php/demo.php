
<?php
	
	require('../fpdf/fpdf.php');

	$val = utf8_decode('Martínez');
	//echo $val;
	

	$pdf = new FPDF('P','mm','Letter');
	$pdf->SetTitle('Reporté',true);
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',16);
	$pdf->Cell(0,10,$val,1,1,'C',false);
	$pdf->Cell(60,10,'Niño',1,1,'C');
	$pdf->AddPage();
	$pdf->Output('I','salida.pdf',true);
	echo '<meta charset="UTF-8">';
	

?>