<?php
require_once('Producto.php');
require_once('Cesta.php');
require_once('./../libs/fpdf181/fpdf.php');


session_start();
$cesta = new Cesta();
$cesta->carga_cesta();
$coste = $cesta->get_coste();
$usuario = $_SESSION['usuario'];
$productos = $_SESSION['cesta'];
$cantidad = $_SESSION['cantidad'];

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->SetTitle("Factura");

$pdf->setX(60);
$pdf->Cell(40, 20, "Factura correspondiente a $usuario");

$pdf->SetFont('Arial','', 8);

$header = array('Codigo', 'Nombre', 'Precio', 'Cantidad');
$datos = [];

foreach ($productos as $producto){
    $dato[0] = $producto->getCodigo();
    $dato[1] = $producto->getNombre_corto();
    $dato[2] = $producto->getPVP();
    $dato[3] = $cantidad[$producto->getCodigo()];
    $datos[] = $dato;
}

$pdf->setY(55);
$pdf->setX(25);
$pdf->SetFillColor(255,0,0);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(128,0,0);
$pdf->SetLineWidth(.3);
$pdf->SetFont('','B');
// Cabecera
$w = array(30, 85, 25, 20);
for($i=0;$i<count($header);$i++){
    $pdf->Cell($w[$i],7,$header[$i],1,0,'C',true);
}
$pdf->Ln();
// Restauración de colores y fuentes
$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$pdf->SetFont('');
// Datos
$fill = false;

foreach($datos as $row){
    $pdf->setX(25);
    $pdf->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
    $pdf->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
    $pdf->Cell($w[2],6,$row[2],'LR',0,'R',$fill);
    $pdf->Cell($w[3],6,$row[3],'LR',0,'R',$fill);
    $pdf->Ln();
    $fill = !$fill;
}
// Línea de cierre
$pdf->setX(25);
$pdf->Cell(array_sum($w),0,'','T');


$pdf->setX(100);

$pdf->Cell(0,10,'Coste: '.round(($coste*0.79),2),0,0,'C');
$pdf->setX(100);
$pdf->Cell(0,20,'I.V.A.(21%): '.round(($coste*0.21),2),0,0,'C');
$pdf->setX(100);
$pdf->Cell(0,30,'Total: '.$coste,0,0,'C');

$pdf->Output();

?>
