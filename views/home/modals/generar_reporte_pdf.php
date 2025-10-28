<?php
require_once('c:/xampp/htdocs/iboss/tcpdf/tcpdf.php');
require_once("c://xampp/htdocs/iboss/controllers/graficosController.php");

// Capturar tipo de reporte
$tipo = $_GET['tipo'] ?? 'stock';

// Crear instancia del controlador
$controller = new graficosController();

// Crear instancia del PDF
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('iBoss');
$pdf->SetTitle('Reporte de ' . ucfirst($tipo));
$pdf->SetHeaderData('', 0, 'Reporte generado desde iBoss', '');
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', 10));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', 8));
$pdf->SetMargins(10, 20, 10);
$pdf->SetHeaderMargin(10);
$pdf->SetFooterMargin(10);
$pdf->SetAutoPageBreak(TRUE, 10);
$pdf->SetFont('dejavusans', 'B', 10);
$pdf->AddPage();
//mostrar la fecha de generación del reporte
$pdf->Cell(0, 10, 'Fecha de generación: ' . date('d/m/Y H:i:s'), 0, 1, 'C');

//diseño de los encabezados de las tablas en el PDF
$html = '';

switch ($tipo) {
    case 'stock':
        $html .= '<h1>Reporte de Stock</h1>';
        $html .= generarTablaStock($controller);
        break;
    case 'ventas':
        $html .= '<h1>Ventas por Producto</h1>';
        $html .= generarTablaVentasProducto($controller);
        break;
    case 'categoria':
        $html .= '<h1>Ventas por Categoría</h1>';
        $html .= generarTablaCategoria($controller);
        break;
    case 'diario':
        $html .= '<h1>Ventas por Día</h1>';
        $html .= generarTablaDiaria($controller);
        break;
    case 'completo':
        $html .= '<h1><strong>REPORTE COMPLETO</strong></h1>';
        $html .= generarTablaStock($controller);
        $html .= '<br><br><br>' . generarTablaVentasProducto($controller);
        $html .= '<br><br><br>' . generarTablaCategoria($controller);
        $html .= '<br><br><br>' . generarTablaDiaria($controller);
        break;
    default:
        $html .= '<h2>Tipo de reporte no válido</h2>';
        break;
}

$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('reporte_' . $tipo . '.pdf', 'I');

// Funciones para generar las tablas en los pdfs
function generarTablaStock($controller) {
    $datos = $controller->stockPorProducto();
    $html = '<h2>Stock Actual por Producto</h2>
            <table border="1" cellpadding="5" cellspacing="0" width="100%">
                <tr style="background-color:#343a40; color:#ffffff; font-weight:bold;">
                    <th width="70%">Producto</th>
                    <th width="30%">Cantidad en Stock</th>
                </tr>';
    for ($i = 0; $i < count($datos['labels']); $i++) {
        $html .= '<tr>
                    <td>' . $datos['labels'][$i] . '</td>
                    <td align="center">' . $datos['data'][$i] . '</td>
                  </tr>';
    }
    $html .= '</table>';
    return $html;
}


function generarTablaVentasProducto($controller) {
    $datos = $controller->ventasPorProducto();
    $html = '<h2>Ventas realizadas por Producto</h2>
            <table border="1" cellpadding="5" cellspacing="0" width="100%">
                <tr style="background-color:#343a40; color:#ffffff; font-weight:bold;">
                    <th width="70%">Producto</th>
                    <th width="30%">Cantidad Vendida</th>
                </tr>';

    for ($i = 0; $i < count($datos['labels']); $i++) {
        $html .= '<tr><td>' . $datos['labels'][$i] . '</td><td>' . $datos['data'][$i] . '</td></tr>';
    }
    $html .= '</table>';
    return $html;
}

function generarTablaCategoria($controller) {
    $datos = $controller->ventasPorCategoria();
    
    $html = '<h2>Total de ventas por Categoría</h2>
            <table border="1" cellpadding="5" cellspacing="0" width="100%">
                <tr style="background-color:#343a40; color:#ffffff; font-weight:bold;">
                    <th width="70%">Categoría</th>
                    <th width="30%">Total Vendido</th>
                </tr>';
    for ($i = 0; $i < count($datos['labels']); $i++) {
        $html .= '<tr><td>' . $datos['labels'][$i] . '</td><td>' . $datos['data'][$i] . '</td></tr>';
    }
    $html .= '</table>';
    return $html;
}

function generarTablaDiaria($controller) {
    $datos = $controller->ventasPorDia();
    $html = '<h2>Total de Ventas realizadas por Día</h2>
            <table border="1" cellpadding="5" cellspacing="0" width="100%">
                <tr style="background-color:#343a40; color:#ffffff; font-weight:bold;">
                    <th width="70%">Fecha</th>
                    <th width="30%">Total Vendido</th>
                </tr>';
    for ($i = 0; $i < count($datos['labels']); $i++) {
        $html .= '<tr><td>' . $datos['labels'][$i] . '</td><td>' . $datos['data'][$i] . '</td></tr>';
    }
    $html .= '</table>';
    return $html;
}
?>
