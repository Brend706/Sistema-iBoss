<?php
require_once("c://xampp/htdocs/iboss/controllers/detallesVentaController.php"); // llamado al controlador
$objHC = new detallesVentaController();
$id_venta = $_POST['id_venta'];
$id_detalle = $_POST['id_detalle'];
$cantidad = $_POST['cantidad'];
$error = "";
$ok = "";

if (empty($cantidad)) {
    $error .= "Debes llenar todos los campos";
    header("Location:editModalDetalle.php?error=" . urlencode($error) . "&cantidad=" . urlencode($total));
    exit();
} else {
    if ($objHC->actualizarDetalle($id_detalle, $cantidad)) {
        $ok .= "Registro modificado con éxito.";
        //header("Location:../index.php?ok=" . urlencode($ok));
        header("Location: ../detallesVenta.php?ok=" . urlencode($ok) . "&id_venta=" . urlencode($id_venta)  ); // Redirigir a la página de detalles de venta con el mensaje de éxito
        exit();//salimos
    } else {
        $error .= "Error al modificar el Detalle de la Venta, intenta de nuevo";
        header("Location:editModalDetalle.php?error=" . urlencode($error) . "&cantidad=" . urlencode($total));
        exit();
    }
}
?>