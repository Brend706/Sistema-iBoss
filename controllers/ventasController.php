<?php


class ventasController{//clase para el controlador de ventas

    private $model;//variable para almacenar el modelo

    public function __construct(){
        require_once("c://xampp/htdocs/iboss/models/ventasModel.php");
        $this->model = new ventasModel();//instanciamos el modelo
    }
    
    public function index(){//metodo para mostrar la vista principal
        $ventas = $this->model->obtenerVentas();//obtenemos todas las ventas
        require_once("c://xampp/htdocs/iboss/views/ventas/listarVentas.php");// y llamado a la vista
    }

    public function agregarNuevaVenta() {
        
        $objResultado = $this->model->agregarVenta();
        return $objResultado;
    }

    public function actualizarVenta($id_venta, $descuento, $totalConDesc) { 
        //se agregara o no un descuento a la venta
        $objResultado = $this->model->actualizarVenta($id_venta, $descuento, $totalConDesc);
        return $objResultado;
    }
    
    public function eliminarVenta($id_venta) { //funcion para eliminar una venta
        $objResultado = $this->model->eliminarVentas($id_venta); //llamamos al modelo
        return $objResultado; //retornamos el resultado
    }

    //busqueda de ventas por fecha
    public function buscarVentasPorFecha($fecha) {
        $ventas = $this->model->buscarVentas($fecha); 
        //return $objResultado; 
        require_once("c://xampp/htdocs/iboss/views/ventas/listarVentas.php");
    }

    /**
     * Funciones que sirven para la vista de detalles de ventas (detallesVentas.php)
     * 
     */

    //funcion para actualizar el total de la venta cuando se agregue, edite o elimine un producto del detalle de la venta
    public function actualizarTotalVenta($id) {
        $objResultado = $this->model->actualizarTotalVentas($id); 
        return $objResultado;
    }

    public function obtenerProductos() {
        $objResultado = $this->model->obtenerProductos();
        return $objResultado; 
    }

    //funcion para obtener el id de la venta que se acaba de crear y agregarle detalles con ese id
    public function obtenerUltimoIdVenta() {
        $objResultado = $this->model->obtenerUltimoIdVenta(); 
        return $objResultado; 
    }

    //funciona solo para mostrar el total de la venta en la vista detallesVenta.php
    public function obtenerTotalDeVenta($id){
        $objResultado = $this->model->obtenerTotalVenta($id); 
        return $objResultado; 
    }

    //funcion para obtener los detalles de la venta por id
    public function obtenerVentaPorId($id_venta) {
        $objResultado = $this->model->obtenerVentaPorId($id_venta); 
        return $objResultado; 
    }

}
?>