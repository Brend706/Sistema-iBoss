<?php
/*
*
*/
class graficosController {

    private $model;

    public function __construct() {
        require_once("c://xampp/htdocs/iboss/models/graficosModel.php");
        $this->model = new graficosModel(); // Instanciamos el modelo
    }

    // Método para obtener datos de ventas por categoría
    public function ventasPorCategoria() {
        $datos = $this->model->ventasPorCategoria();
        return $datos;
    }

    // Método para obtener datos de ventas por producto
    public function ventasPorProducto() {
        $datos = $this->model->ventasPorProducto();
        return $datos;
    }

    // Método para obtener stock actual por producto
    public function stockPorProducto() {
        $datos = $this->model->stockPorProducto();
        return $datos;
    }

    // Método para obtener ventas totales por día
    public function ventasPorDia() {
        $datos = $this->model->ventasPorDia();
        return $datos;
    }
}
