<?php
require_once("c://xampp/htdocs/iboss/controllers/inventarioController.php"); // llamado al controlador
$objHC = new inventarioController();
$id = $_POST['id_existencia'];
$error = "";
$ok = "";

if (isset($_POST['submit'])) { // si se presiono el boton de submit
    if ($objHC->eliminarExistencia($id)) {
        $ok .= "Registro eliminado con éxito.";
        header("Location:../index.php?ok=" . urlencode($ok));//redireccionamos al index
        exit();//salimos
    } else {
        $error .= "Error al eliminar el producto, intenta de nuevo";
        header("Location:../index.php?error=" . urlencode($error));
        exit();
    }
}
