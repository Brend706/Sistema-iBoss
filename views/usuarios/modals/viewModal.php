<div class="modal fade" id="viewModal<?php echo $u['id_usuario']; ?>" tabindex="-1" aria-labelledby="viewModalLabel<?php echo $u['id_usuario']; ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel<?php echo $u['id_usuario']; ?>">Ver Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>ID: <?php echo $u['id_usuario']; ?></p>
                <p>Nombre: <?php echo $u['nombre_user']; ?></p>
                <p>Correo: <?php echo $u['correo']; ?></p>
                <p>Contraseña: <?php echo $u['contrasena']; ?></p>
                <p>Rol: <?php echo $u['nombre_rol']; ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
