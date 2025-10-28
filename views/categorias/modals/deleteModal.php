<div class="modal fade" id="deleteModal<?php echo isset($c['id_categoria']) ? $c['id_categoria'] : ''; ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?php echo isset($c['id_categoria']) ? $c['id_categoria'] : ''; ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel<?php echo isset($c['id_categoria']) ? $c['id_categoria'] : ''; ?>">Eliminar categoría</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <p>¿Está seguro/a que desea eliminar la categoría 
            <strong><?php echo isset($c['categoria']) ? htmlspecialchars($c['categoria'], ENT_QUOTES, 'UTF-8') : 'Categoría no encontrada'; ?></strong>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="./modals/deleteCategoria.php" method="POST">
                    <input type="hidden" name="id_categoria" value="<?php echo isset($c['id_categoria']) ? $c['id_categoria'] : ''; ?>">
                    <button type="submit" name="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>