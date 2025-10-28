<?php
require_once("c://xampp/htdocs/iboss/controllers/productosController.php");
$controller = new productosController();
$categorias = $controller->obtenerCategorias();//
$ok = isset($_GET['ok']) ? $_GET['ok'] : '';
$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
$precio = isset($_GET['precio']) ? $_GET['precio'] : '';
?>
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Agregar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="./modals/agregarProducto.php" method="POST">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="number" min="0" size="0.1" class="form-control" id="precio" name="precio" value="<?php echo htmlspecialchars($precio); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="id_categoria" class="form-label">Categoría</label>
                        <select class="form-control w-100" id="id_categoria" name="id_categoria" required>
                        <?php
                            foreach ($categorias as $c) {
                                echo "<option value='{$c['id_categoria']}'>{$c['nombre_cat']}</option>";
                            }
                        ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

