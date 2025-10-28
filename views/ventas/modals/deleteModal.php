<?php 
//este modal se utiliza en la vista de listarVentas.php y en la de detallesVentas.php

//verificamos si existe el id_venta en la url, en caso de haberlo seleccionado desde la vista de detallesVentas.php
if (isset($_GET['id_venta'])) { 
    $id_venta = $_GET['id_venta']; //obtenemos el id de la venta
}//si no existe el id_venta en la url, lo obtenemos del array de ventas en el foreach en la vista listarVentas.php 
else { 
    $id_venta = $v['id_venta']; //obtenemos el id de la venta
} 
?>

<div class="modal fade" id="deleteModal<?php echo $id_venta; ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?php echo $id_venta; ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel<?php echo $id_venta; ?>">Eliminar Venta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Está seguro que desea eliminar definitivamente la venta <strong>#<?php echo $id_venta; ?></strong>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="./modals/deleteVenta.php" method="POST">
                    <input type="hidden" name="id_venta" value="<?php echo $id_venta; ?>">
                    <button type="submit" name="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>