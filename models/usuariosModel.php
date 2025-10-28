<?php
class usuariosModel {
    private $db;

    public function __construct() {
        require_once("c:/xampp/htdocs/iboss/config/db.php"); // Ajustá esta ruta si tu proyecto está en otra carpeta
        $objdb = new db();
        $this->db = $objdb->conexion();
    }

    // Obtener todos los usuarios
    public function obtenerUsuarios() {
        $statement = $this->db->prepare("Select u.id_usuario, u.nombre_user, u.correo, u.contrasena, r.nombre_rol from usuarios u inner JOIN roles r on u.id_rol = r.id_rol;");
        return ($statement->execute()) ? $statement->fetchAll(PDO::FETCH_ASSOC) : false;
    }

    // Agregar un nuevo usuario
    public function agregarUsuario($nombre_user, $correo, $contrasena, $id_rol) {
        $statement = $this->db->prepare("
            INSERT INTO usuarios (nombre_user, correo, contrasena, id_rol) 
            VALUES (:nombre_user, :correo, :contrasena, :id_rol)
        ");
        $statement->bindParam(':nombre_user', $nombre_user);
        $statement->bindParam(':correo', $correo);
        $statement->bindParam(':contrasena', $contrasena);
        $statement->bindParam(':id_rol', $id_rol);
        try {
            return $statement->execute();
        } catch (Exception $e) {
            return false;
        }
    }

    // Actualizar un usuario
    public function actualizarUsuario($id_usuario, $nombre_user, $correo, $contrasena) {
        $statement = $this->db->prepare("
            UPDATE usuarios
            SET nombre_user = :nombre_user, correo = :correo, contrasena = :contrasena
            WHERE id_usuario = :id_usuario
        ");
        $statement->bindParam(':id_usuario', $id_usuario);
        $statement->bindParam(':nombre_user', $nombre_user);
        $statement->bindParam(':correo', $correo);
        $statement->bindParam(':contrasena', $contrasena);
        try {
            $statement->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    // Eliminar un usuario
    public function eliminarUsuario($id_usuario) {
        $statement = $this->db->prepare("
            DELETE FROM usuarios
            WHERE id_usuario = :id_usuario
        ");
        $statement->bindParam(':id_usuario', $id_usuario);
        try {
            $statement->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    // Obtener un solo usuario por ID (útil para editar)
    public function obtenerUsuarioPorId($id_usuario) {
        $statement = $this->db->prepare("SELECT * FROM usuarios WHERE id_usuario = :id_usuario");
        $statement->bindParam(':id_usuario', $id_usuario);
        return ($statement->execute()) ? $statement->fetch(PDO::FETCH_ASSOC) : false;
    }

    public function ObtenerRoles()
    {
        
        $statement = $this->db->prepare("select * from roles");
        return ($statement->execute()) ? $statement->fetchAll(PDO::FETCH_ASSOC) : false;
    }
}
?>
