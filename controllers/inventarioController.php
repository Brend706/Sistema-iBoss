<?php
class inventarioController{
    private $model;//variable para almacenar el modelo
    public function __construct(){//constructor
        require_once("c://xampp/htdocs/iboss/models/inventarioModel.php");//llamado al modelo
        $this->model = new inventarioModel();//instanciamos el modelo
    }
    
    public function index(){//metodo para mostrar la vista
        $existencias = $this->model->obtenerExistencias();//obtenemos las existencias
        require_once("c://xampp/htdocs/iboss/views/inventario/verInventario.php");//llamado a la vista
    }
    
    public function agregarExistencia($id_producto, $existencia) {
        $objResultado = $this->model->agregarExistencia($id_producto, $existencia);
        return $objResultado;
    }

    public function actualizarExistencia($id_existencia, $existencia) {
        $objResultado = $this->model->actualizarExistencia($id_existencia, $existencia);
        return $objResultado;
    }

    public function eliminarExistencia($id_existencia) {
        $objResultado = $this->model->eliminarExistencia($id_existencia);
        return $objResultado;
    }

    public function buscarProductoInv($texto) {
        $existencias = $this->model->buscarProductoInv($texto);
        require_once("c://xampp/htdocs/iboss/views/inventario/verInventario.php");
    }

    //obtener los productos para agregar una existencia
    public function obtenerProductos() {
        $productos = $this->model->obtenerProductos();
        return $productos;
    }

}

?>