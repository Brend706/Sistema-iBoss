<?php
require_once("c://xampp/htdocs/iboss/controllers/categoriaController.php"); // llamado al controlador
$objHC = new categoriaController();

// Validación previa con htmlspecialchars para evitar ataques XSS
$nombre = isset($_POST['categoria']) ? trim($_POST['categoria']) : '';
$error = "";
$ok = "";

if (empty($nombre)) {
    $error .= "Debes llenar todos los campos";
    header("Location:addModal.php?error=" . urlencode($error) . "&nombre=" . urlencode($nombre));
    exit();
} else {
    try {
        if ($objHC->agregarNuevaCategoria($nombre)) {
            $ok .= "Registro agregado con éxito.";
            header("Location:../index.php?ok=" . urlencode($ok));
            exit();
        } else {
            throw new Exception("Error al guardar la categoría.");
        }
    } catch (Exception $e) {
        error_log("Error en agregarCategoria.php: " . $e->getMessage());
        $error .= "Error al guardar la categoría, intenta de nuevo.";
        header("Location:addModal.php?error=" . urlencode($error) . "&nombre=" . urlencode($nombre));
        exit();
    }
}
?>