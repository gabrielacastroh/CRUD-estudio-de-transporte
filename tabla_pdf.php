<?php

require('fpdf/fpdf.php');

class PDF extends FPDF
{
	// Cabecera de página
	function Header()
	{
		// Logo
		$this->Image('img/logo.jpg', 10, 8, 33);
		// Arial bold 15
		$this->SetFont('Arial', 'B', 18);
		// Movernos a la derecha
		$this->Cell(40);
		// Título
		$this->MultiCell(0, 15, 'REPORTE TABLA DE VEHICULOS', 0, 'C');
		// Salto de línea
		$this->Ln(20);

		$this->SetFont('Arial', 'B', 10);

		$this->Cell(8, 10, 'ID',1, 0, 'C', 0);
		$this->Cell(45, 10, 'Nombre Cliente', 1, 0, 'C', 0);
		$this->Cell(28, 10, 'Placa', 1, 0, 'C', 0);
		$this->Cell(15, 10, 'Modelo', 1, 0, 'C', 0);
		$this->Cell(30, 10, 'Marca', 1, 0, 'C', 0);
		$this->Cell(20, 10, 'Capacidad', 1, 0, 'C', 0);
		$this->Cell(45, 10, 'Nombre Conductor', 1, 1, 'C', 0);

		$this->SetLineWidth(.5);
		$this->line(10, 35, 200, 35);
		$this->SetLineWidth(.2);
	}

	// Pie de página
	function Footer()
	{
		// Posición: a 1,5 cm del final
		$this->SetY(-15);
		$y = $this->GetY();
		// Arial italic 8
		$this->SetFont('Arial', 'I', 7);
		$this->SetLineWidth(.5);
		$this->line(10, $y, 200, $y);
		$this->SetLineWidth(.2);
		// Número de página
		$this->Text(15, $y + 3, "VEHICULOS    Fecha:  " . date("d/m/Y"));
		$this->Text(170, $y + 3, "Pagina: ". $this->PageNo() . '/{nb}', 0, 0, 'C');
	}
}

include('connection.php');
$query = "SELECT `ve`.*, `cli`.`nombre` AS `nomb_cli`, `con`.`nombre` AS `nomb_con` FROM `vehiculos` AS `ve` LEFT JOIN `clientes` AS `cli` ON `ve`.`clientes_id` = `cli`.`id` LEFT JOIN `conductores` AS `con` ON `ve`.`conductores_id` = `con`.`id`;";
$result = mysqli_query($conn, $query);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);

while ($row = mysqli_fetch_assoc($result))
{
	$pdf->Cell(8, 10, $row['id'], 1, 0, 'C', 0);
	$pdf-> Cell(45,10, $row['nomb_cli'], 1, 0,'C',0);
	$pdf-> Cell(28,10, $row['placa'], 1, 0,'C',0);
	$pdf-> Cell(15,10, $row['modelo'], 1, 0,'C',0);
	$pdf-> Cell(30,10, $row['marca'], 1, 0,'C',0);
	$pdf-> Cell(20,10, $row['capacidad'], 1, 0,'C',0);
	$pdf->Cell(45, 10, $row['nomb_con'], 1, 1, 'C', 0);
}

$pdf->Output();
?>