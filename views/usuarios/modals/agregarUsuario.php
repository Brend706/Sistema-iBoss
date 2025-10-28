<?php
session_start();
require_once("c://xampp/htdocs/iboss/controllers/usuariosController.php"); // llamado al controlador
$objHC = new usuariosController();

$nombre_user = $_POST['nombre_user'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$id_rol = $_POST['id_rol'];

$error = "";
$ok = "";

// para validar que los campos no estén vacíos
if (empty($nombre_user) || empty($correo) || empty($contrasena)) {
    $error .= "Debes llenar todos los campos.";
    header("Location:addModal.php?error=" . urlencode($error) . "&nombre_user=" . urlencode($nombre_user) . "&correo=" . urlencode($correo));
    exit();
} else {
    // llamar al controlador para agregar el nuevo usuario
    if ($objHC->agregarNuevoUsuario($nombre_user, $correo, $contrasena, $id_rol)) {
        //$ok .= "Usuario agregado con éxito.";
        //header("Location:../index.php?ok=" . urlencode($ok)); // redireccionamos a la lista de usuarios
        $_SESSION['titulo'] = "Registro de usuario exitoso";
        $_SESSION['mensaje'] = "El usuario ha sido creado";
        $_SESSION['alerta'] = "success";
        header("Location:../index.php");
        exit();
    } else {
        $_SESSION['titulo'] = "Error al agregar el usuario";
        $_SESSION['mensaje'] = "Este correo ya esta en uso por otro usuario, debe ingresar un correo distinto";
        $_SESSION['alerta'] = "warning";
        header("Location:../index.php");
        exit();
    }
}
?>
