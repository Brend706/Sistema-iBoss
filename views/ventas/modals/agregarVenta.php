<?php
require_once("c://xampp/htdocs/iboss/controllers/ventasController.php");
$controller = new ventasController();
$productos = $controller->obtenerProductos(); //obtenemos los productos
if(empty($_SESSION['usuario'])){ //si la sesion no esta iniciada
    header("Location: /iboss/views/home/login.php");//redirigimos al login
}

/*creamos una venta en la bd para poder usar ese id para agregar los detalles de esa venta
esto es para que al momento de agregar los detalles, automaticamente tengamos un id_venta 
ya que se usaria el ultimo ID de venta que se acaba de crear*/
$controller->agregarNuevaVenta();
/**obtenemos el id_venta de la venta que acabamos de crear para poder usarlo**/
$id_venta = $controller->obtenerUltimoIdVenta();

//$id_venta = 14; //esto es solo para pruebas, para no estar creando ventas a cada rato xddd

//redigir a la vista de detalles de la venta
header("Location: /iboss/views/ventas/detallesVenta.php?id_venta=$id_venta");

?>
