<?php
require_once("c://xampp/htdocs/iboss/views/head/header.php"); //llamado al encabezado
require_once("c://xampp/htdocs/iboss/controllers/ventasController.php");//llamado al controlador

$controlador = new ventasController();//instanciamos el controlador

if(empty($_SESSION['usuario'])){ //si la sesion no esta iniciada
    header("Location: /iboss/views/home/login.php");//redirigimos al login
}
$controlador->index();//mostramos la vista
?>

<?php
require_once("c://xampp/htdocs/iboss/views/head/footer.php"); //llamado al pie de pagina
?>