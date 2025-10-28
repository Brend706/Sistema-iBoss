<div class="modal fade" id="deleteModal<?php echo $e['id_existencia']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?php echo $e['id_existencia']; ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel<?php echo $e['id_existencia']; ?>">Eliminar existencias</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Está seguro que desea eliminar las existencias del producto <strong><?php echo $e['producto']; ?></strong>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="./modals/deleteExistencias.php" method="POST">
                    <input type="hidden" name="id_existencia" value="<?php echo $e['id_existencia']; ?>">
                    <button type="submit" name="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>