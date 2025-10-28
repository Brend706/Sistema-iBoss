<?php
require_once("c://xampp/htdocs/iboss/controllers/usuariosController.php");
$controller = new usuariosController();
$ok = isset($_GET['ok']) ? $_GET['ok'] : '';
$nombre_user = isset($_GET['nombre_user']) ? $_GET['nombre_user'] : '';
$correo = isset($_GET['correo']) ? $_GET['correo'] : '';
$contrasena = isset($_GET['contrasena']) ? $_GET['contrasena'] : '';
$id_rol = isset($_GET['id_rol']) ? $_GET['id_rol'] : '';
$roles = $controller->ObtenerRoles();
?>
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Agregar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="./modals/agregarUsuario.php" method="POST">
                    <div class="mb-3">
                        <label for="nombre_user" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre_user" name="nombre_user" value="<?php echo htmlspecialchars($nombre_user); ?>" required>
                    </div>
                     <div class="mb-3">
                        <label for="id_rol" class="form-label">Rol</label>
                       <select class="form-control w-100" id="id_rol" name="id_rol" required>
                        <?php
                        foreach($roles as $r)
                        {
                        echo "<option value='{$r['id_rol']}'>{$r['nombre_rol']}</option>";
                        }
                        ?>
                         </select>
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo</label>
                        <input type="email" class="form-control" id="correo" name="correo" value="<?php echo htmlspecialchars($correo); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="contrasena" class="form-label">Contraseña</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="contrasena" name="contrasena" value="<?php echo htmlspecialchars($contrasena); ?>" required>
                            <button class="btn btn-outline-secondary" type="button" onclick="togglePassword()">
                                <i class="fas fa-eye" id="iconoOjo"></i>
                            </button>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function togglePassword() {
    const passwordInput = document.getElementById("contrasena");
    const icon = document.getElementById("iconoOjo");
    
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        passwordInput.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}
</script>
