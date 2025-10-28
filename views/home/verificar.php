<?php
require_once("c:/xampp/htdocs/iboss/controllers/homeController.php");
session_start();
$objHC = new homeController();
$correo = $objHC->limpiarCorreo($_POST['correo']);
$contraseña = $objHC->limpiarCadena($_POST['contrasena']);
$bandera = $objHC->verificarUsuario($correo, $contraseña);

if($bandera){
    //si la bandera es verdadera, significa que el usuario existe
    //y obtenemos el nombre del usuario a travez del correo
    $nombre_usuario = $objHC->obtenerUsuario($correo);
    //creamos una variable de sesion para el nombre del usuario
    $_SESSION['usuario'] = $nombre_usuario;

    //OBTENEMOS EL ROL DEL USUARIO
    $rol = $objHC->obtenerRol($correo);
    //creamos una variable de sesion para almacenar el id_rol del usuario
    $_SESSION['rol'] = $rol;
    if($rol == 3){ //rol 3 es el de JEFE
        header("Location: panel_control_jefe.php");
    }else{ //rol 2 es un encargado de tienda*(vendedor, cajero, encargado de inventario, etc)
        header("Location: panel_control.php");    
    }
}else{
    $error = "Correo o contraseña incorrectos";
    header("Location: login.php?error=".$error);
}