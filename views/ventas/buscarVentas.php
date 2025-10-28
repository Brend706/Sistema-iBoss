<?php
//incluir el encabezado
require_once("c:/xampp/htdocs/iboss/views/head/header.php");


//BUSQUEDA DE vVENTAS POR FECHA
require_once("c:/xampp/htdocs/iboss/controllers/ventasController.php");
$controller = new ventasController();
$fecha = $_GET['fecha'];

$fechaFormateada = date('Y-m-d', strtotime($fecha));

$ventas = $controller->buscarVentasPorFecha($fechaFormateada);

//cargar los resultados en la tabla de listarProductos
//incluir el pie de pagina
require_once("c:/xampp/htdocs/iboss/views/head/footer.php");
