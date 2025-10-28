<?php
class categoriasModel {
    private $db; // Variable para almacenar la conexión a la base de datos

    public function __construct() {
        require_once("c:/xampp/htdocs/iboss/config/db.php");
        $objdb = new db();
        $this->db = $objdb->conexion();
    }

    public function obtenerCategorias() { 
        $statement = $this->db->prepare("SELECT id_categoria, nombre_cat as categoria FROM categorias");
        return ($statement->execute()) ? $statement->fetchAll(PDO::FETCH_ASSOC) : false;
    }

    public function agregarCategoria($nombre) {
        $statement = $this->db->prepare("
            INSERT INTO categorias(nombre_cat)
            VALUES (:nombre)
        ");

        try {
            $statement->bindValue(':nombre', $nombre, PDO::PARAM_STR); // Mejor uso de bindValue
            $statement->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function actualizarCategoria($id_categoria, $nombre) {
        $statement = $this->db->prepare("
            UPDATE categorias
            SET nombre_cat = :nombre_cat
            WHERE id_categoria = :id_categoria
        ");
        $statement->bindParam(':nombre_cat', $nombre, PDO::PARAM_STR);
        $statement->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT); // Corrección para seguridad

        try {
            $statement->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function eliminarCategoria($id_categoria) { 
        $statement = $this->db->prepare("
            DELETE FROM categorias
            WHERE id_categoria = :id_categoria
        ");
        $statement->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT); // Seguridad mejorada

        try {
            $statement->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
?>