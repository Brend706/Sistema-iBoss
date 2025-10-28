<?php
$ok = isset($_GET['ok']) ? $_GET['ok'] : '';
if ($ok): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong><?php echo $ok; ?></strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<h1 class="text-center fw-bold">Gestion de ventas</h1><hr>
<div class="container" style="max-width: 1000px;">
  <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">
    <!-- Formulario con label e input en línea -->
    <form method="get" action="buscarVentas.php" class="d-flex align-items-center gap-2 flex-wrap">
      <label for="fecha" class="mb-0" style="white-space: nowrap;">Buscar ventas por fecha:</label>
      <input type="date" class="form-control w-auto" id="fecha" name="fecha" style="min-width: 180px;">
      <button class="btn btn-outline-secondary" type="submit">
        <i class="fas fa-search"></i> Buscar
      </button>
    </form>
    <!-- Botón registrar venta -->
    <a href="modals/agregarVenta.php" class="btn mt-3 mt-md-0" style="background-color: #3D396F; color: white;">
      <i class="fas fa-plus"></i> Registrar una Venta
    </a>
  </div>
</div>

<div class="table-responsive mb-5 p-3"> 
<table class="table table-hover text-center table-bordered">
    <thead class="table-dark">
        <tr>
            <th>No Venta</th>
            <th>Cant Productos</th>
            <th>Total de Venta</th>
            <th>Descuento</th>
            <th>Total con descuento</th>
            <th>Fecha Realizada</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        <?php if(!empty($ventas)): ?>
        <?php foreach($ventas as $v): ?> 
            <tr>
                <td><?php echo $v['id_venta']; ?></td>
                <td><?php echo $v['cant_productos']; ?></td> 
                <td>$<?php echo $v['total']; ?></td>
                <td>
                    <?php if ($v['descuento'] > 0): ?>
                        $<?php echo $v['descuento']; ?>
                    <?php else: ?>
                        <span class="text-secondary"><em>Sin descuento</em></span>
                    <?php endif; ?>
                </td>
                <td>$<?php echo $v['total_con_desc']; ?></td>
                <td><?php echo $v['fecha']; ?></td>
                <td>
                    <a href="detallesVenta.php?id_venta=<?php echo $v['id_venta']?>" class="btn" style="background-color: #3D396F; color: white;">
                        <i class="fas fa-table-list"></i>
                    </a>
                    <button class="btn" style="background-color: #3D396F; color: white;" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $v['id_venta']; ?>">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $v['id_venta']; ?>">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
            <?php include 'modals/editModal.php'; ?>
            <?php include 'modals/deleteModal.php'; ?>
        <?php endforeach; ?>
        <?php else: ?>
      <tr>
        <td colspan="8">No hay ventas registradas en esa fecha</td>
      </tr>
    <?php endif; ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="7" class="text-center">
                <a href="index.php" class="btn btn-secondary">Ver todas las ventas</a>
            </td>
        </tr>
    </tfoot>
</table>
</div>

<?php if (isset($_SESSION['mensaje'])): ?>
<script>
    Swal.fire({
        position: "top-end",
        icon: '<?php echo $_SESSION['alerta']; ?>',
        title: '<?php echo $_SESSION['titulo']; ?>',
        text: '<?php echo $_SESSION['mensaje']; ?>'
    });
</script>
<?php
    unset($_SESSION['mensaje']);
    unset($_SESSION['alerta']);
endif;
?>