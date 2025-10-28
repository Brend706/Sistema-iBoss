<?php
class homeModel{
    private $db;
    public function __construct(){
        require_once("c:/xampp/htdocs/iboss/config/db.php");
        $objdb = new db();
        $this->db = $objdb->conexion();
    }
    
    public function obtenerClave($correo){
        $statement = $this->db->prepare("SELECT contrasena FROM usuarios Where correo= :correo");
        $statement->bindParam(":correo", $correo);
        return ($statement->execute()) ? $statement->fetch() ['contrasena']: false;
    }

    public function obtenerUsuario($correo){
        $statement = $this->db->prepare("SELECT nombre_user FROM usuarios Where correo= :correo");
        $statement->bindParam(":correo", $correo);
        return ($statement->execute()) ? $statement->fetch() ['nombre_user']: false;
    }	

    //obtener el rol del usuario
    public function obtenerRol($correo){
        $statement = $this->db->prepare("SELECT id_rol FROM usuarios Where correo= :correo");
        $statement->bindParam(":correo", $correo);
        return ($statement->execute()) ? $statement->fetch() ['id_rol']: false;
    }
    
}