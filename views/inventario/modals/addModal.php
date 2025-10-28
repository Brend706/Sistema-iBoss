<?php
require_once("c://xampp/htdocs/iboss/controllers/inventarioController.php");
$controller = new inventarioController();
//obtener los productos
$productos = $controller->obtenerProductos();
//cantidad en stock
$existencias = isset($_GET['existencias']) ? $_GET['existencias'] : '';
?>
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Agregar Producto en Inventario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="./modals/agregarExistencia.php" method="POST">
                    <!-- Select para elegir el producto -->
                    <div class="mb-3">
                        <label for="producto" class="form-label">Producto</label>
                        <select class="form-select" id="producto" name="producto" required>
                            <option value="" disabled selected>Seleccione un producto</option>
                            <?php foreach ($productos as $producto) : ?>
                                <option value="<?php echo $producto['id_producto']; ?>"><?php echo $producto['nombre']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- Input para la cantidad -->
                    <div class="mb-3">
                        <label for="existencia" class="form-label">Cantidad</label>
                        <input type="number" class="form-control" id="existencia" name="existencia" min="0" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
