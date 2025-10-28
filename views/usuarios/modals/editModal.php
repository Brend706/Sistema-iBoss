<?php 
require_once("c://xampp/htdocs/iboss/controllers/usuariosController.php");
$controller = new usuariosController();
?>
<div class="modal fade" id="editModal<?php echo $u['id_usuario']; ?>" tabindex="-1" aria-labelledby="editModalLabel<?php echo $u['id_usuario']; ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel<?php echo $u['id_usuario']; ?>">Editar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulario de edición -->
                <form action="./modals/modificarUsuario.php" method="POST">
                    <input type="hidden" name="id_usuario" value="<?php echo $u['id_usuario']; ?>">
                    <div class="mb-3">
                        <label for="nombre_user<?php echo $u['id_usuario']; ?>" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre_user<?php echo $u['id_usuario']; ?>" name="nombre_user" value="<?php echo $u['nombre_user']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="correo<?php echo $u['id_usuario']; ?>" class="form-label">Correo</label>
                        <input type="email" class="form-control" id="correo<?php echo $u['id_usuario']; ?>" name="correo" value="<?php echo $u['correo']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="contrasena<?php echo $u['id_usuario']; ?>" class="form-label">Contraseña</label>
                        <input  class="form-control" id="contrasena<?php echo $u['id_usuario']; ?>" name="contrasena" value="<?php echo $u['contrasena']; ?>" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
