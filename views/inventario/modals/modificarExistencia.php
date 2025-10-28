<?php

require_once("c://xampp/htdocs/iboss/controllers/inventarioController.php");//llamado al controlador
$controller = new inventarioController();//instanciamos el controlador
$existencias = $_POST['existencia']; //obtenemos las existencias
$id = $_POST['id_existencia'];//obtenemos el id de la existencia
$controller->actualizarExistencia($id, $existencias);//actualizamos la existencia
header("Location: ../index.php");//redirigimos a la vista de inventario
?>