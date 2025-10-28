<?php
session_start();
require_once("c://xampp/htdocs/iboss/controllers/inventarioController.php"); // llamado al controlador
$objHC = new inventarioController();
$existencia = $_POST['existencia'];
$idProducto = $_POST['producto'];
$error = "";
$ok = "Producto agregado en inventario";

if (empty($existencia) || empty($idProducto)) {
    $_SESSION['titulo'] = "Error datos nulos";
    $_SESSION['mensaje'] = "Por favor, complete todos los campos.";
    $_SESSION['alerta'] = "error";
    header("Location: ../index.php");
    exit();
} else if($objHC->agregarExistencia($idProducto, $existencia)){
    $_SESSION['titulo'] = "Exito";
    $_SESSION['mensaje'] = $ok;
    $_SESSION['alerta'] = "success";
    header("Location: ../index.php");
    exit();
} else {
    $_SESSION['titulo'] = "Error al agregar stock";
    $_SESSION['mensaje'] = "El producto ya se encuentra en el inventario. Debe actualizar las existencias desde la tabla de inventario.";
    $_SESSION['alerta'] = "warning";
    header("Location: ../index.php");
    exit();
}

?>
