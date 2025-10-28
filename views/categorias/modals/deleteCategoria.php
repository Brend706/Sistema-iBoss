<?php
require_once("c://xampp/htdocs/iboss/controllers/categoriaController.php"); // llamado al controlador

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location:../index.php?error=" . urlencode("Método no permitido"));
    exit();
}

$objHC = new categoriaController();
$id_categoria = isset($_POST['id_categoria']) ? intval($_POST['id_categoria']) : null;
$error = "";
$ok = "";

if ($id_categoria === null || $id_categoria <= 0) {
    $error .= "ID de categoría inválido.";
    header("Location:../index.php?error=" . urlencode($error));
    exit();
}

if ($objHC->eliminarCategoria($id_categoria)) {
    $ok .= "Categoría eliminada con éxito.";
    header("Location:../index.php?ok=" . urlencode($ok)); // Redireccionamos al index
    exit();
} else {
    $error .= "Error al eliminar categoría, intenta de nuevo.";
    header("Location:../index.php?error=" . urlencode($error));
    exit();
}
?>