<?php
session_start(); //iniciamos la sesion
//agregar el controller de ventas
require_once("c://xampp/htdocs/iboss/controllers/ventasController.php");
$venta = new ventasController(); 

//agregar el controller de detallesVenta
require_once("c://xampp/htdocs/iboss/controllers/detallesVentaController.php");
$controller = new detallesVentaController();

//obtenemos los datos del formulario en la vista detallesVenta.php
$id_venta = $_POST['id_venta'];
$id_producto = $_POST['id_producto'];
$cantidad = $_POST['cantidad'];
$precio = $controller->obtenerPrecioProducto($id_producto); //obtenemos el precio del producto
$subtotal = $precio * $cantidad; //calculamos el subtotal

//agregamos el detalle de la venta
//colocamos un if para validar si la instruccion se ejecuto correctamente
if($controller->agregarDetalles($id_venta, $id_producto, $cantidad, $subtotal)){
   //si se ejecuto correctamente, redirigimos a la vista de detalles de la venta
    header("Location: /iboss/views/ventas/detallesVenta.php?id_venta=$id_venta&ok=Productos agregados correctamente");

    //una vez agregado el detalle de la venta, actualizamos el total de la venta
    $venta->actualizarTotalVenta($id_venta);
    exit();
}else{
    //si no se ejecuto correctamente, redirigimos a la vista de detalles de la venta
    //con un mensaje de error con sweetalert
    $_SESSION['titulo'] = "Error al agregar el producto";
    $_SESSION['mensaje'] = "El producto ya fue agregado a la venta, puede editarlo desde la tabla de detalles de la venta";
    $_SESSION['alerta'] = "warning";
    header("Location: /iboss/views/ventas/detallesVenta.php?id_venta=$id_venta");
    exit();
}
    
?>

