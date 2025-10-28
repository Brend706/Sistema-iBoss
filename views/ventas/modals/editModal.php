<?php 
//este modal se utiliza en la vista de listarVentas.php y en la de detallesVentas.php

//verificamos si existe el id_venta en la url, en caso de haberlo seleccionado desde la vista de detallesVentas.php
if (isset($_GET['id_venta'])) { 
    $id = $_GET['id_venta']; //obtenemos el id de la venta
    $total = $controller->obtenerTotalDeVenta($id);
    $venta = $controller->obtenerVentaPorId($id);
    //$descuento = $venta['descuento'];
    $totalConDesc = $venta['total_con_desc'];

}//si no existe el id_venta en la url, lo obtenemos del array de ventas en el foreach en la vista listarVentas.php 
else { 
    $id = $v['id_venta']; //obtenemos el id de la venta
    $total = $v['total']; //obtenemos el total de la venta
    $descuento = $v['descuento']; //obtenemos el descuento de la venta
    $totalConDesc = $v['total_con_desc']; //obtenemos el total con descuento de la venta
} 
?>

<div class="modal fade" id="editModal<?php echo $id; ?>" tabindex="-1" aria-labelledby="editModalLabel<?php echo $id; ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel<?php echo $id; ?>">Aplicar Descuento a la Venta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"> 
                <!-- Formulario de edición -->
                <!-- Aplicar descuento al total de la venta -->
                <form action="./modals/modificarVenta.php" method="POST">
                    <input type="hidden" name="id_venta" value="<?php echo $id; ?>">
                    <div class="mb-3">
                        <label for="total<?php echo $id; ?>" class="form-label">Total de la Venta</label>
                        <input type="text" class="form-control" id="total<?php echo $id; ?>" name="total" value="<?php echo $total; ?>" readonly>
                    </div>
                    <!-- Aplicar descuento al total de la venta -->
                    <div class="mb-3">
                        <label for="descuento" class="form-label">Descuento a aplicar $</label>
                        <input type="number" class="form-control" id="descuento" name="descuento" placeholder="Ingrese el monto mayor a cero..." min="0" step="0.01" max="<?php echo $totalConDesc; ?>" required>
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