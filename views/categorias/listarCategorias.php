<?php
$ok = isset($_GET['ok']) ? $_GET['ok'] : '';
if ($ok): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong><?php echo $ok; ?></strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<div class="card card-body border-0 shadow-sm" style="max-width: 1000px; margin: auto;">
    <div class="d-flex justify-content-between align-items-center mb-4 p-3">
        <h1 class="mb-0">Gestionar categorías</h1>
        <button class="btn" style="background-color: #3D396F; color: white;" data-bs-toggle="modal" data-bs-target="#addModal">
            <i class="fas fa-plus"></i> Agregar categoría
        </button>
    </div>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>N. CATEGORIA</th>
            <th>CATEGORIA</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        <?php foreach($categorias as $c): ?>
            <tr>
                <td><?php echo $c['id_categoria']; ?></td>
                <td><?php echo $c['categoria']; ?></td>
                <td>
                   
                    <button class="btn" style="background-color: #3D396F; color: white;" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $c['id_categoria']; ?>">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $c['id_categoria']; ?>">
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