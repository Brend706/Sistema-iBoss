<?php
require_once("c://xampp/htdocs/iboss/controllers/detallesVentaController.php");
$controller = new detallesVentaController();
$id_venta = $_GET['id_venta'];
?>

<div class="modal fade" id="editModalDetalle<?php echo $pv['id_detalle']; ?>" tabindex="-1" aria-labelledby="editModalLabel<?php echo $pv['id_detalle']; ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalDetalleLabel<?php echo $pv['id_detalle']; ?>">Editar Cantidad Vendida</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"> 
                <!-- Formulario de edición -->
                <form action="./detallesVenta/editDetalle.php" method="POST">
                    <input type="hidden" name="id_venta" value="<?php echo $id_venta; ?>">
                    <input type="hidden" name="id_detalle" value="<?php echo $pv['id_detalle']; ?>">
                        <div class="mb-3">
                            <label for="cantidad<?php echo $pv['id_detalle']; ?>" class="form-label">Ingrese la cantidad de productos vendidos</label>
                            <input type="number" class="form-control" id="cantidad<?php echo $pv['id_detalle']; ?>" min="1" name="cantidad" value="<?php echo $pv['cantidad']; ?>" required>
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