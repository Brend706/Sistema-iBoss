<?php
require_once("c://xampp/htdocs/iboss/controllers/productosController.php");
require_once("c://xampp/htdocs/iboss/controllers/inventarioController.php");

$objHC = new productosController();
$objInv = new inventarioController();

$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$id_categoria = $_POST['id_categoria'];
$error = "";
$ok = "";

if (empty($nombre) || empty($precio)) {
    $error .= "Debes llenar todos los campos";
    header("Location:addModal.php?error=" . urlencode($error) . "&nombre=" . urlencode($nombre) . "&precio=" . urlencode($precio));
    exit();
} else {
    if ($objHC->agregarNuevoProducto($nombre, $precio, $id_categoria)) {
        $ok .= "Producto agregado con éxito.\nActualice las existencias del producto en el inventario.";

        //registrar el inventario del ultimo producto creado, inicializando en 0
        $id_producto = $objHC->obtenerUltimoIdProducto();
        $objInv->agregarExistencia($id_producto, 0,);

        header("Location:../index.php?ok=" . urlencode($ok));//redireccionamos a la lista de productos
        exit();//salimos
    } else {
        $error .= "Error al guardar el producto, intenta de nuevo";
        header("Location:addModal.php?error=" . urlencode($error) . "&nombre=" . urlencode($nombre) . "&precio=" . urlencode($precio));
        exit();
    }
}
?>
