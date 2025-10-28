<?php
require_once("c://xampp/htdocs/iboss/controllers/categoriaController.php");
$controller = new categoriaController();
$ok = isset($_GET['ok']) ? $_GET['ok'] : '';
?>

<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Agregar categoría</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <form action="./modals/agregarCategoria.php" method="POST">
                    <div class="mb-3">
                        <label for="categoria" class="form-label">Nueva Categoría</label>
                        <input type="text" class="form-control" id="categoria" name="categoria" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>