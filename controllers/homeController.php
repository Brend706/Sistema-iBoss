<?php
class homeController{
    private $model;
    public function __construct(){
        require_once("c:/xampp/htdocs/iboss/models/homeModel.php");
        $this->model = new homeModel();
    }
    
    public function limpiarCadena($campo){
        $campo = strip_tags($campo);
        $campo = filter_var($campo, FILTER_UNSAFE_RAW);
        $campo = htmlspecialchars($campo);
        return $campo;
    }
    public function limpiarCorreo($campo){
        $campo = strip_tags($campo);
        $campo = filter_var($campo, FILTER_SANITIZE_EMAIL);
        $campo = htmlspecialchars($campo);
        return $campo;
    }
    
    public function verificarUsuario($correo, $contraseña){
        $keydb = $this->model->obtenerClave($correo);
        return ($contraseña == $keydb) ? true : false;
    }

    public function obtenerUsuario($correo){
        return $this->model->obtenerUsuario($correo);
    }

    //obtener el rol del usuario
    public function obtenerRol($correo){
        return $this->model->obtenerRol($correo);
    }
}