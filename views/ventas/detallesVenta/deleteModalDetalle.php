<?php
//obtener el id_venta de la url
$id_venta = $_GET['id_venta']
?>

<div class="modal fade" id="deleteModalDetalle<?php echo $pv['id_detalle']; ?>" tabindex="-1" aria-labelledby="deleteModalDetalleLabel<?php echo $pv['id_detalle']; ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel<?php echo $pv['id_detalle']; ?>">Eliminar Detalle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Está seguro que desea eliminar este <strong>detalle de la venta</strong> #<?php echo $id_venta; ?>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="./detallesVenta/deleteDetalle.php" method="POST">
                    <input type="hidden" name="id_venta" value="<?php echo $id_venta; ?>">
                    <input type="hidden" name="id_detalle" value="<?php echo $pv['id_detalle']; ?>">
                    <button type="submit" name="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div> 
    </div>
</div>