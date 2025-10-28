<?php
class productosModel{//clase para el modelo de productos

    private $db;

    public function __construct(){//constructor
        require_once("c:/xampp/htdocs/iboss/config/db.php"); //llamado a la base de datos
        $objdb = new db();//instanciamos la clase db
        $this->db = $objdb->conexion();//almacenamos la conexion en la variable db
    }

    public function obtenerProductos(){//funcion para obtener los productos
        $statement = $this->db->prepare("
            SELECT p.*, c.nombre_cat AS NombreCategoria
            FROM productos p
            JOIN categorias c ON p.id_categoria = c.id_categoria
            ORDER BY p.id_producto ASC
        ");//preparamos la consulta
        return ($statement->execute()) ? $statement->fetchAll(PDO::FETCH_ASSOC) : false;//ejecutamos la consulta
    }

    public function agregarProducto($nombre, $precio, $id_categoria) {
        $statement = $this->db->prepare("
            INSERT INTO productos (nombre, precio, id_categoria) 
            VALUES (:nombre, :precio, :id_categoria)
        ");
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':precio', $precio);
        $statement->bindParam(':id_categoria', $id_categoria);
        try {
            $statement->execute();
            return true;
        } catch (Exception $e) {
            return false; 
        }
    }

    public function obtenerCategorias() {
        $statement = $this->db->prepare("SELECT * FROM categorias");
        return ($statement->execute()) ? $statement->fetchAll(PDO::FETCH_ASSOC) : false;
    }

    public function actualizarProducto($id_producto,$nombre, $precio, $id_categoria) {
        $statement = $this->db->prepare("
            UPDATE productos
            SET nombre = :nombre, precio = :precio, id_categoria = :id_categoria
            WHERE id_producto = :id_producto
        ");
        $statement->bindParam(':id_producto', $id_producto);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':precio', $precio);
        $statement->bindParam(':id_categoria', $id_categoria);
        try {
            $statement->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function eliminarProducto($id_producto) { //funcion para eliminar un producto
        $statement = $this->db->prepare("
            DELETE FROM productos
            WHERE id_producto = :id_producto
        ");// preparamos la consulta o query
        $statement->bindParam(':id_producto', $id_producto); // pasamos los parametros
        try {
            $statement->execute();//ejecutamos la consulta
            return true;//retornamos verdadero
        } catch (Exception $e) {
            return false;//retornamos falso
        }
    }

    //funcion para buscar un producto
    public function buscarProducto($texto) {
        $statement = $this->db->prepare("
            SELECT p.*, c.nombre_cat AS NombreCategoria
            FROM productos p
            JOIN categorias c ON p.id_categoria = c.id_categoria
            WHERE p.nombre LIKE :search OR c.nombre_cat LIKE :search or p.id_producto LIKE :search
        ");
        $texto = "%$texto%";
        $statement->bindParam(':search', $texto);
        return ($statement->execute()) ? $statement->fetchAll(PDO::FETCH_ASSOC) : false;
    }

    public function ObtenerUltimoIdProducto() {
        $statement = $this->db->prepare("SELECT MAX(id_producto) AS id_producto FROM productos");
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC)['id_producto'];
    }
}
?>