<?php
class productosController{//clase para el controlador de productos
    private $model;//variable para almacenar el modelo
    public function __construct(){//constructor
        require_once("c://xampp/htdocs/iboss/models/productosModel.php");//llamado al modelo
        $this->model = new productosModel();//instanciamos el modelo
    } 
    
    public function index(){//metodo para mostrar la vista
        $productos = $this->model->obtenerProductos();//obtenemos los productos
        require_once("c://xampp/htdocs/iboss/views/productos/listarProductos.php");//llamado a la vista
    }
    
    public function agregarNuevoProducto($nombre, $precio, $id_categoria) {
        
        $objResultado = $this->model->agregarProducto($nombre, $precio, $id_categoria);
        return $objResultado;
    }

    public function obtenerCategorias() {
        $categorias =$this->model->obtenerCategorias();
        return $categorias;
    }
    public function actualizarProducto($id_producto,$nombre, $precio, $id_categoria) {
        
        $objResultado = $this->model->actualizarProducto($id_producto,$nombre, $precio, $id_categoria);
        return $objResultado;
    }
    public function eliminarProducto($id_producto) {
        $objResultado =$this->model->eliminarProducto($id_producto);
        return $objResultado;
    }

    public function buscarProducto($texto) {
        $productos = $this->model->buscarProducto($texto);
        // Cargar los resultados en la tabla de listarProductos
        require_once("c://xampp/htdocs/iboss/views/productos/listarProductos.php");
    }

    //obtener id del ultimo producto
    public function obtenerUltimoIdProducto() {
        $id_producto = $this->model->obtenerUltimoIdProducto();
        return $id_producto;
    }
}
?>