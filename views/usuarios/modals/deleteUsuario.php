<?php
require_once("c://xampp/htdocs/iboss/controllers/usuariosController.php"); // llamado al controlador
$objHC = new usuariosController();
$id_usuario = $_POST['id_usuario'];
$error = "";
$ok = "";

if (isset($_POST['submit'])) { // si se presionó el botón de submit
    if ($objHC->eliminarUsuario($id_usuario)) {
        $ok .= "Usuario eliminado con éxito.";
        header("Location:../index.php?ok=" . urlencode($ok)); // redireccionamos al index
        exit(); // salimos
    } else {
        $error .= "Error al eliminar el usuario, intenta de nuevo";
        header("Location:../index.php?error=" . urlencode($error));
        exit();
    }
}
?>
