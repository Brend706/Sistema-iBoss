<?php
$ok = isset($_GET['ok']) ? $_GET['ok'] : '';
if ($ok): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong><?php echo $ok; ?></strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<!--titulo de la pagina en negrita-->

<h2 class="text-center mb-4"><strong>- Inventario -</strong></h2>

<div class="d-flex justify-content-between align-items-center mb-3 mx-auto" style="max-width: 1000px;">
    <!-- Barra de búsqueda -->
    <form method="get" action="buscarProductoInv.php" class="input-group w-75">
        <input type="text" class="form-control" id="busqueda" name="busqueda" placeholder="Buscar producto...">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
            <i class="fas fa-search"></i>
        </button>
    </form>
    <!-- Botón Agregar Producto -->
    <button class="btn ms-3" style="background-color: #3D396F; color: white;" data-bs-toggle="modal" data-bs-target="#addModal">
        <i class="fas fa-plus"></i> Agregar Stock
    </button>
</div>

<div class="card card-body  border-0 shadow-sm" style="max-width: 1100px; margin: auto;">
    <p class="card-text">Aquí puedes ver y gestionar las existencias de los productos.</p>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>EXISTENCIAS</th>
            <th>FECHA DE ACTUALIZACIÓN</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        <?php foreach($existencias as $e): ?>
            <tr>
                <td><?php echo $e['id_existencia']; ?></td>
                <td><?php echo $e['producto']; ?></td>
                <td><?php echo $e['existencia']; ?></td>
                <td><?php echo $e['actualizacion']; ?></td>
                <td>
                    <button class="btn" style="background-color: #3D396F; color: white;" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $e['id_existencia']; ?>">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $e['id_existencia']; ?>">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
            <?php include 'modals/editModal.php'; ?>
            <?php include 'modals/deleteModal.php'; ?>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
<?php include 'modals/addModal.php'; ?>

<!-- alerta con sweeralert -->
 <?php if (isset($_SESSION['mensaje'])): ?>
<script>
    Swal.fire({
        position: "center",
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