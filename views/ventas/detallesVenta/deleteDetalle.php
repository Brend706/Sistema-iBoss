<?php
session_start();
//eliminar el detalle de la venta
require_once("c://xampp/htdocs/iboss/controllers/detallesVentaController.php");
$controller = new detallesVentaController();
$id_detalle = $_POST['id_detalle'];
$id_venta = $_POST['id_venta'];

//colocamos un if para validar si la instruccion se ejecuto correctamente
if($controller->eliminarDetalle($id_detalle)){
    //si se ejecuto correctamente, redirigimos a la vista de detalles de la venta
    header("Location: /iboss/views/ventas/detallesVenta.php?id_venta=$id_venta&ok=Producto eliminado correctamente");
    exit();
}else{
    //si no se ejecuto correctamente, redirigimos a la vista de detalles de la venta
    //con un mensaje de error con sweetalert
    $_SESSION['titulo'] = "Error al eliminar el producto de la venta";
    $_SESSION['mensaje'] = "Error al eliminar el producto de la venta";
    $_SESSION['alerta'] = "error";
    header("Location: /iboss/views/ventas/detallesVenta.php?id_venta=$id_venta");
    exit();
}