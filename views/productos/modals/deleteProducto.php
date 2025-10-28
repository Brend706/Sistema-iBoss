<?php
require_once("c://xampp/htdocs/iboss/controllers/productosController.php"); // llamado al controlador
$objHC = new productosController();
$id_producto = $_POST['id_producto'];
$error = "";
$ok = "";

if (isset($_POST['submit'])) { // si se presiono el boton de submit
    if ($objHC->eliminarProducto($id_producto)) {
        $ok .= "Registro eliminado con éxito.";
        header("Location:../index.php?ok=" . urlencode($ok));//redireccionamos al index
        exit();//salimos
    } else {
        $error .= "Error al eliminar el producto, intenta de nuevo";
        header("Location:../index.php?error=" . urlencode($error));
        exit();
    }
}
