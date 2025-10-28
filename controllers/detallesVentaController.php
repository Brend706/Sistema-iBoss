<?php

//controller para el modelo de detallesVentas
class detallesVentaController{

    private $model;
    public function __construct(){
        require_once("c:/xampp/htdocs/iboss/models/detallesVentasModel.php"); 
        $this->model = new detallesVentasModel();
    }

    public function agregarDetalles($id_venta, $id_producto, $cantidad, $subtotal){ //funcion para agregar un detalle de venta
        $objResultado = $this->model->agregarDetallesVenta($id_venta, $id_producto, $cantidad, $subtotal); 
        return $objResultado; 
    }

    public function obtenerDetallesVenta($id_venta){ //funcion para obtener los detalles de una venta
        $detalles = $this->model->obtenerDetallesVentas($id_venta);
        return $detalles; 
    }

    //obtiene el precio de un producto para calcular el subtotal de la venta
    public function obtenerPrecioProducto($id_producto){
        $precio = $this->model->consultarPrecioProducto($id_producto); 
        return $precio; 

    }

    public function actualizarDetalle($id_detalle, $cantidad){ //funcion para editar un detalle de venta
        $objResultado = $this->model->actualizarDetallesVenta($id_detalle, $cantidad); 
        return $objResultado; 
    }

    public function eliminarDetalle($id_detalle){ //funcion para eliminar un detalle de venta
        $objResultado = $this->model->eliminarDetallesVenta($id_detalle); 
        return $objResultado; 
    }
}