<?php
session_start();
require_once("c://xampp/htdocs/iboss/controllers/ventasController.php"); // llamado al controlador
$objHC = new ventasController();
$id_venta = $_POST['id_venta'];
$total = $_POST['total'];
$error = "";
$ok = "";

//aplicar descuento al total de la venta
$descuento = $_POST['descuento'];
if (!empty($descuento)) {
    $totalConDesc = $total - $descuento;
}

if ($objHC->actualizarVenta($id_venta, $descuento, $totalConDesc)) {
    header("Location: " . $_SERVER['HTTP_REFERER']); //redireccionamos a la pagina actual
    $_SESSION['titulo'] = "Descuento aplicado";
    $_SESSION['mensaje'] = "El total de la venta fue modificado correctamente";
    $_SESSION['alerta'] = "success";
    exit();//salimos
} else {
    //si no se ejecuto correctamente, redirigimos a la vista de detalles de la venta
    //con un mensaje de error con sweetalert
    $_SESSION['titulo'] = "Error al aplicar el descuento";
    $_SESSION['mensaje'] = "Error al aplicar el descuento a la venta";
    $_SESSION['alerta'] = "error";
    header("Location: " . $_SERVER['HTTP_REFERER']); //redireccionamos a la pagina actual
    exit();
}

?>
