<?php
require_once("c://xampp/htdocs/iboss/controllers/usuariosController.php"); // llamado al controlador
$objHC = new usuariosController();
$id_usuario = $_POST['id_usuario'];
$nombre_user = $_POST['nombre_user'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$id_rol = $_POST['id_rol'];
$error = "";
$ok = "";

if (empty($nombre_user) || empty($correo) || empty($contrasena)) {
    $error .= "Debes llenar todos los campos.";
    header("Location:../index.php?error=" . urlencode($error) . "&nombre_user=" . urlencode($nombre_user) . "&correo=" . urlencode($correo) . "&id_rol=" . urlencode($id_rol));
    exit();
} else {
    if ($objHC->actualizarUsuario($id_usuario, $nombre_user, $correo, $contrasena)) {
        $ok .= "Usuario modificado con éxito.";
        header("Location:../index.php?ok=" . urlencode($ok));
        exit(); 
    } else {
        $error .= "Error al modificar el usuario, intenta de nuevo.";
        header("Location:../index.php?error=" . urlencode($error) . "&nombre_user=" . urlencode($nombre_user) . "&correo=" . urlencode($correo)  . urlencode($correo) . "&id_rol=" . urlencode($id_rol));
        exit();
    }
    
}
?>


