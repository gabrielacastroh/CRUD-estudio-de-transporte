<?php

global	$idcv;

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
		$this->MultiCell(0, 15, 'REPORTE DE INFRACCIONES', 0, 'C');
		// Salto de línea
		$this->Ln(20);

		$this->SetFont('Arial', 'B', 10);
		$this->Ln(5);
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
		$this->line(10, $y, 290, $y);
		$this->SetLineWidth(.2);
		// Número de página
		$this->Text(15, $y + 3, "Infracciones    Fecha:  " . date("d/m/Y"));
		$this->Text(170, $y + 3, "Pagina: " . $this->PageNo() . '/{nb}', 0, 0, 'C');
	}
}

include('connection.php');

if (isset($_POST['generar'])) {
	$idcv = $_POST['id_infraccion'];
}
	
$pdf = new PDF('P', 'mm', 'LETTER');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 11);

$pdf->SetFillColor(189, 188, 218);
$pdf->Cell(190, 10, 'PROPIETARIO', 1, 1, 'C', 1);
$pdf->Cell(16, 10, 'ID', 1, 0, 'C', 0);
$pdf->Cell(69, 10, 'NOMBRES', 1, 0, 'C', 0);
$pdf->Cell(55, 10, 'DIRECCIÓN', 1, 0, 'C', 0);
$pdf->Cell(50, 10, 'TELÉFONO', 1, 1, 'C', 0);

$query = "SELECT `infracciones`.*, `vehiculos`.`id` AS `ve_id`, `vehiculos`.`placa` AS `ve_pla`, `vehiculos`.`modelo` AS `ve_mod`, `vehiculos`.`marca` AS `ve_mar`, `clientes`.`id` AS `cli_id`, `clientes`.`nombre` AS `cli_nom`, `clientes`.`apellido` AS `cli_ape`, `clientes`.`direccion` AS `cli_dir`, `clientes`.`telefono` AS `cli_tel` FROM `infracciones` LEFT JOIN `vehiculos` ON `infracciones`.`vehiculos_id` = `vehiculos`.`id` 
	LEFT JOIN `clientes` ON `vehiculos`.`clientes_id` = `clientes`.`id` WHERE `infracciones`.`id` = $idcv;";

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_array($result)) {

	$pdf->Cell(16, 10, $row['cli_id'], 1, 0, 'C', 0);
	$pdf->Cell(69, 10, $row['cli_nom'] . $row['cli_ape'] , 1, 0, 'C', 0);
	$pdf->Cell(55, 10, $row['cli_dir'], 1, 0, 'C', 0);
	$pdf->Cell(50, 10, $row['cli_tel'], 1, 0, 'C', 0);
}

$pdf->Ln(25);

$pdf->Cell(190, 10, 'VEHICULO', 1, 1, 'C', 1);
$pdf->Cell(16, 10, 'ID', 1, 0, 'C', 0);
$pdf->Cell(59, 10, 'PLACA', 1, 0, 'C', 0);
$pdf->Cell(55, 10, 'MODELO', 1, 0, 'C', 0);
$pdf->Cell(60, 10, 'MARCA', 1, 1, 'C', 0);

$query = "SELECT `infracciones`.*, `vehiculos`.`id` AS `ve_id`, `vehiculos`.`placa` AS `ve_pla`, `vehiculos`.`modelo` AS `ve_mod`, `vehiculos`.`marca` AS `ve_mar`, `clientes`.`id` AS `cli_id`, `clientes`.`nombre` AS `cli_nom`, `clientes`.`apellido` AS `cli_ape`, `clientes`.`direccion` AS `cli_dir`, `clientes`.`telefono` AS `cli_tel` FROM `infracciones` LEFT JOIN `vehiculos` ON `infracciones`.`vehiculos_id` = `vehiculos`.`id` 
	LEFT JOIN `clientes` ON `vehiculos`.`clientes_id` = `clientes`.`id` WHERE `infracciones`.`id` = $idcv;";

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_array($result)) {

	$pdf->Cell(16, 10, $row['ve_id'], 1, 0, 'C', 0);
	$pdf->Cell(59, 10, $row['ve_pla'], 1, 0, 'C', 0);
	$pdf->Cell(55, 10, $row['ve_mod'], 1, 0, 'C', 0);
	$pdf->Cell(60, 10, $row['ve_mar'], 1, 0, 'C', 0);
}

$pdf->Ln(25);

$pdf->Cell(190, 10, 'DETALLE DE LA INFRACCIÓN', 1, 1, 'C', 1);
$pdf->Cell(16, 10, 'ID', 1, 0, 'C', 0);
$pdf->Cell(38, 10, 'FECHA', 1, 0, 'C', 0);
$pdf->Cell(101, 10, 'DESCRIPCIÓN', 1, 0, 'C', 0);
$pdf->Cell(35, 10, 'VALOR', 1, 1, 'C', 0);


$query = "SELECT `infracciones`.*, `vehiculos`.`id` AS `ve_id`, `vehiculos`.`placa` AS `ve_pla`, `vehiculos`.`modelo` AS `ve_mod`, `vehiculos`.`marca` AS `ve_mar`, `clientes`.`id` AS `cli_id`, `clientes`.`nombre` AS `cli_nom`, `clientes`.`apellido` AS `cli_ape`, `clientes`.`direccion` AS `cli_dir`, `clientes`.`telefono` AS `cli_tel` FROM `infracciones` LEFT JOIN `vehiculos` ON `infracciones`.`vehiculos_id` = `vehiculos`.`id` 
	LEFT JOIN `clientes` ON `vehiculos`.`clientes_id` = `clientes`.`id` WHERE `infracciones`.`id` = $idcv;";

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_array($result)) {

	$pdf->Cell(16, 10, $row['id'], 1, 0, 'C', 0);
	$pdf->Cell(38, 10, $row['fecha'], 1, 0, 'C', 0);
	$pdf->Cell(101, 10, $row['descripcion'], 1, 0, 'C', 0);
	$pdf->Cell(35, 10, $row['valor'], 1, 0, 'C', 0);
}

$pdf->Output();
?>