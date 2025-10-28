<?php

class categoriaController { // Clase para el controlador de categorías

    private $model; // Variable para almacenar el modelo

    public function __construct() {
        require_once("c://xampp/htdocs/iboss/models/categoriasModel.php");
        $this->model = new categoriasModel(); // Instanciamos el modelo
    }

    public function index() { // Método para mostrar la vista principal
        $categorias = $this->model->obtenerCategorias(); // Obtenemos todas las categorías
        if (empty($categorias)) {
            $categorias = []; // Manejo de caso vacío
        }
        require_once("c://xampp/htdocs/iboss/views/categorias/listarCategorias.php"); // Llamado a la vista
    }

    public function agregarNuevaCategoria($nombre) { // Eliminamos $id_categoria si no es necesario
        $objResultado = $this->model->agregarCategoria($nombre);
        return $objResultado;
    }

    public function actualizarCategoria($id_categoria, $nombre) { 
        $objResultado = $this->model->actualizarCategoria($id_categoria, $nombre);
        return $objResultado;
    }

    public function eliminarCategoria($id_categoria) { // Función para eliminar una categoría
        $objResultado = $this->model->eliminarCategoria($id_categoria); // Llamamos al modelo
        return $objResultado; // Retornamos el resultado
    }

    public function obtenerCategorias() {
        return $this->model->obtenerCategorias();
    }
}
?>