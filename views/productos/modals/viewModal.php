<div class="modal fade" id="viewModal<?php echo $p['id_producto']; ?>" tabindex="-1" aria-labelledby="viewModalLabel<?php echo $p['id_producto']; ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel<?php echo $p['id_producto']; ?>">Ver Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>ID: <?php echo $p['id_producto']; ?></p>
                <p>Nombre: <?php echo $p['nombre']; ?></p>
                <p>Precio: <?php echo $p['precio']; ?></p>
                <p>Categoria: <?php echo $p['NombreCategoria']; ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
