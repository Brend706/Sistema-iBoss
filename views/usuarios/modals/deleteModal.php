<div class="modal fade" id="deleteModal<?php echo $u['id_usuario']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?php echo $u['id_usuario']; ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel<?php echo $u['id_usuario']; ?>">Eliminar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Está seguro que desea eliminar al usuario <strong><?php echo $u['nombre_user']; ?></strong>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="./modals/deleteUsuario.php" method="POST">
                    <input type="hidden" name="id_usuario" value="<?php echo $u['id_usuario']; ?>">
                    <button type="submit" name="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

