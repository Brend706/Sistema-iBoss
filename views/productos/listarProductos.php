<?php
$ok = isset($_GET['ok']) ? $_GET['ok'] : '';
if ($ok): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong><?php echo $ok; ?></strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>
<h1 class="text-center">Gestionar Productos</h1>

<div class="d-flex justify-content-between align-items-center mb-3 mx-auto" style="max-width: 1000px;">
    <!-- Formulario de búsqueda -->
    <form method="get" action="buscarProducto.php" class="input-group w-75">
        <input type="text" class="form-control" id="busqueda" name="busqueda" placeholder="Buscar producto...">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
            <i class="fas fa-search"></i>
        </button>
    </form>
    <!-- Botón Agregar Producto -->
    <button class="btn ms-3" style="background-color: #3D396F; color: white;" data-bs-toggle="modal" data-bs-target="#addModal">
        <i class="fas fa-plus"></i> Agregar Producto
    </button>
</div>

<div class="card card-body p-5">
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>PRECIO</th>
            <th>CATEGORIA</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        <?php foreach($productos as $p): ?>
            <tr>
                <td><?php echo $p['id_producto']; ?></td>
                <td><?php echo $p['nombre']; ?></td>
                <td>$<?php echo $p['precio']; ?></td>
                <td><?php echo $p['NombreCategoria']; ?></td>
                <td>
                    <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#viewModal<?php echo $p['id_producto']; ?>">
                        <i class="fas fa-eye"></i>
                    </button>
                    <button class="btn" style="background-color: #3D396F; color: white;" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $p['id_producto']; ?>">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $p['id_producto']; ?>">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
            <?php include 'modals/viewModal.php'; ?>
            <?php include 'modals/editModal.php'; ?>
            <?php include 'modals/deleteModal.php'; ?>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
<?php include 'modals/addModal.php'; ?>