<?php
class usuariosController {
    private $model;

    public function __construct() {
        require_once("c://xampp/htdocs/iboss/models/usuariosModel.php"); // Ruta al modelo de usuarios
        $this->model = new usuariosModel(); // Instanciamos el modelo
    }

    // Método para mostrar la vista con todos los usuarios
    public function index() {
        $usuarios = $this->model->obtenerUsuarios(); // Obtener todos los usuarios
        require_once("c://xampp/htdocs/iboss/views/usuarios/listarUsuarios.php"); // Llamar a la vista
    }

    // Agregar nuevo usuario
    public function agregarNuevoUsuario($nombre_user, $correo, $contrasena, $id_rol) {
        $resultado = $this->model->agregarUsuario($nombre_user, $correo, $contrasena, $id_rol);
        return $resultado;
    }

    // Obtener usuario por ID (para editar)
    public function obtenerUsuarioPorId($id_usuario) {
        $usuario = $this->model->obtenerUsuarioPorId($id_usuario);
        return $usuario;
    }

    // Actualizar usuario
    public function actualizarUsuario($id_usuario, $nombre_user, $correo, $contrasena) {
        $resultado = $this->model->actualizarUsuario($id_usuario, $nombre_user, $correo, $contrasena);
        return $resultado;
    }

    // Eliminar usuario
    public function eliminarUsuario($id_usuario) {
        $resultado = $this->model->eliminarUsuario($id_usuario);
        return $resultado;
    }

    public function ObtenerRoles()
    {
        $roles =$this->model->ObtenerRoles();
        return $roles;
    }
}
?>
