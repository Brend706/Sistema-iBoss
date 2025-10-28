<?php
require_once("c://xampp/htdocs/iboss/controllers/ventasController.php"); // llamado al controlador
$objHC = new ventasController();
$id_venta = $_POST['id_venta'];
$error = "";
$ok = "";

if (isset($_POST['submit'])) { // si se presiono el boton de submit
    if ($objHC->eliminarVenta($id_venta)) {
        $ok .= "Venta #$id_venta eliminada correctamente";
        header("Location:../index.php?ok=" . urlencode($ok));//redireccionamos al index
        exit();//salimos
    } else {
        $error .= "Error al eliminar la venta, intenta de nuevo";
        header("Location:../index.php?error=" . urlencode($error));
        exit();
    }
}

