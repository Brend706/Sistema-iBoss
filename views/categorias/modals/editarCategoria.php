<?php
require_once("c://xampp/htdocs/iboss/controllers/categoriaController.php"); // llamado al controlador
$objHC = new categoriaController();
$id_categoria = $_POST['id_categoria'];
$nombre = $_POST['categoria'];
$error = "";
$ok = "";

if (empty($nombre)) {
    $error .= "Debes llenar todos los campos";
    header("Location:editModal.php?error=" . urlencode($error) . "&nombre=" . urlencode($nombre));
    exit();
} else {
    if ($objHC->actualizarCategoria($id_categoria,$nombre)) {
        $ok .= "Categoría modificada con éxito.";
        header("Location:../index.php?ok=" . urlencode($ok));//redireccionamos a la lista de categorias
        exit();//salimos
    } else {
        $error .= "Error al modificar categoria, intenta de nuevo";
        header("Location:editModal.php?error=" . urlencode($error) . "&nombre=" . urlencode($nombre));
        exit();
    }
}
?>