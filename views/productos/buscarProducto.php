<?php
//incluir el encabezado
require_once("c:/xampp/htdocs/iboss/views/head/header.php");


//BUSQUEDA DE PRODUCTOS
require_once("c:/xampp/htdocs/iboss/controllers/productosController.php");
$controller = new productosController();
$busqueda = $_GET['busqueda'];
$productos = $controller->buscarProducto($busqueda);

//cargar los resultados en la tabla de listarProductos
//incluir el pie de pagina
require_once("c:/xampp/htdocs/iboss/views/head/footer.php");