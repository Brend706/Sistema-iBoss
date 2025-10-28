<?php
require_once("c://xampp/htdocs/iboss/controllers/inventarioController.php");
$controller = new inventarioController();
?>
<div class="modal fade" id="editModal<?php echo $e['id_existencia']; ?>" tabindex="-1" aria-labelledby="editModalLabel<?php echo $e['id_existencia']; ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel<?php echo $e['id_existencia']; ?>">Editar Existencia</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulario de edición -->
                <form action="./modals/modificarExistencia.php" method="POST">
                    <input type="hidden" name="id_existencia" value="<?php echo $e['id_existencia']; ?>">
                    <div class="mb-3">
                        <label for="producto<?php echo $e['id_existencia']; ?>" class="form-label">Producto</label>
                        <label><?php echo $e['producto'] ?></label>
                    </div>
                    <div class="mb-3">
                        <label for="existencia<?php echo $e['id_existencia']; ?>" class="form-label">Existencia</label>
                        <input type="number" min="0" class="form-control" id="existencia<?php echo $e['id_existencia']; ?>" name="existencia" value="<?php echo $e['existencia']; ?>">
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