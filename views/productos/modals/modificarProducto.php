<?php
require_once("c://xampp/htdocs/iboss/controllers/productosController.php"); // llamado al controlador
$objHC = new productosController();
$id_producto = $_POST['id_producto'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$id_categoria = $_POST['id_categoria'];
$error = "";
$ok = "";

if (empty($nombre) || empty($precio)) {
    $error .= "Debes llenar todos los campos";
    header("Location:editModal.php?error=" . urlencode($error) . "&nombre=" . urlencode($nombre) . "&precio=" . urlencode($precio));
    exit();
} else {
    if ($objHC->actualizarProducto($id_producto,$nombre, $precio, $id_categoria)) {
        $ok .= "Registro modificado con éxito.";
        header("Location:../index.php?ok=" . urlencode($ok));//redireccionamos a la lista de productos
        exit();//salimos
    } else {
        $error .= "Error al modificar el producto, intenta de nuevo";
        header("Location:editModal.php?error=" . urlencode($error) . "&nombre=" . urlencode($nombre) . "&precio=" . urlencode($precio));
        exit();
    }
}
?>