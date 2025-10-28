<?php
require_once("c://xampp/htdocs/iboss/views/head/header.php"); //llamado al encabezado
require_once("c://xampp/htdocs/iboss/controllers/productosController.php");//llamado al controlador

$controlador = new productosController();//instanciamos el controlador

if(empty($_SESSION['usuario'])){ //si la sesion no esta iniciada
    header("Location: login.php");//redirigimos al login
}
$controlador->index();//mostramos la vista
?>

<?php
require_once("c://xampp/htdocs/iboss/views/head/footer.php"); //llamado al pie de pagina
?>