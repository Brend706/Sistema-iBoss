<?php
require_once("c://xampp/htdocs/iboss/controllers/productosController.php");
$controller = new productosController();
$categorias = $controller->obtenerCategorias();
?>
<div class="modal fade" id="editModal<?php echo $p['id_producto']; ?>" tabindex="-1" aria-labelledby="editModalLabel<?php echo $p['id_producto']; ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel<?php echo $p['id_producto']; ?>">Editar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulario de edición -->
                <form action="./modals/modificarProducto.php" method="POST">
                    <input type="hidden" name="id_producto" value="<?php echo $p['id_producto']; ?>">
                    <div class="mb-3">
                        <label for="nombre<?php echo $p['id_producto']; ?>" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre<?php echo $p['id_producto']; ?>" name="nombre" value="<?php echo $p['nombre']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="precio<?php echo $p['id_producto']; ?>" class="form-label">Precio</label>
                        <input type="text" class="form-control" id="precio<?php echo $p['id_producto']; ?>" name="precio" value="<?php echo $p['precio']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="id_categoria" class="form-label">Categoría</label>
                        <select class="form-control" id="id_categoria" name="id_categoria" required>
                        <?php
                            foreach ($categorias as $c) {
                                echo "<option value='{$c['id_categoria']}'>{$c['nombre_cat']}</option>";
                            }
                        ?>
                        </select>
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
