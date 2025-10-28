<?php
//incluir el encabezado
require_once("c:/xampp/htdocs/iboss/views/head/header.php");


//BUSQUEDA DE PRODUCTOS
require_once("c:/xampp/htdocs/iboss/controllers/inventarioController.php");
$controller = new inventarioController();
$busqueda = $_GET['busqueda'];
$existencias = $controller->buscarProductoInv($busqueda);

//cargar los resultados en la tabla de listarProductos
//incluir el pie de pagina
require_once("c:/xampp/htdocs/iboss/views/head/footer.php");
