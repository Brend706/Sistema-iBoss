<?php
require_once("c://xampp/htdocs/iboss/views/head/header.php"); // Encabezado
require_once("c://xampp/htdocs/iboss/controllers/usuariosController.php"); // Controlador de usuarios

$controlador = new usuariosController(); // Instancia del controlador

if (empty($_SESSION['usuario'])) {
    header("Location: login.php"); // Redirige si no hay sesión
}

// Verifica que el usuario sea Administrador
if ($_SESSION['rol'] != 1) {
    header("Location: ../home/panel_control.php"); // Redirige si no es Administrador
}

$controlador->index(); // Muestra el listado de usuarios
?>

<?php
require_once("c://xampp/htdocs/iboss/views/head/footer.php"); // Pie de página
?>
