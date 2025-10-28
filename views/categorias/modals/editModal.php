<?php
require_once("c://xampp/htdocs/iboss/controllers/categoriaController.php");
$controller = new categoriaController();

?>
<div class="modal fade" id="editModal<?php echo $c['id_categoria']; ?>" tabindex="-1" aria-labelledby="editModalLabel<?php echo $c['id_categoria']; ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel<?php echo $c['id_categoria']; ?>">Editar Categoria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulario de edición -->
                <form action="./modals/editarCategoria.php" method="POST">
                    <input type="hidden" name="id_categoria" value="<?php echo $c['id_categoria']; ?>">
                    <div class="mb-3">
                        <label for="categoria<?php echo $c['id_categoria']; ?>" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="categoria<?php echo $c['id_categoria']; ?>" name="categoria" value="<?php echo $c['categoria']; ?>">
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
