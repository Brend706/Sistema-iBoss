<?php
$ok = isset($_GET['ok']) ? $_GET['ok'] : '';
if ($ok): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong><?php echo $ok; ?></strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<h1 class="text-center">Gestionar Usuarios</h1>

<div class="d-flex justify-content mb-4 p-3">
    <button class="btn" style="background-color: #3D396F; color: white;" data-bs-toggle="modal" data-bs-target="#addModal">
        <i class="fas fa-plus"></i> Agregar Usuario
    </button>
</div>

<div class="card card-body p-5">
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>CORREO</th>
            <th>CONTRASEÑA</th>
               <th>ROL</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        <?php foreach($usuarios as $u): ?>
            <tr>
                <td><?php echo $u['id_usuario']; ?></td>
                <td><?php echo $u['nombre_user']; ?></td>
                <td><?php echo $u['correo']; ?></td>
                   
                <!-- repite el caracter '*' 8 veces, para simular la contraseña. --> 
                <td><?php echo str_repeat('*', 8); ?></td> 
                <td><?php echo $u['nombre_rol']; ?></td> 

                <td>
                    <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#viewModal<?php echo $u['id_usuario']; ?>">
                        <i class="fas fa-eye"></i>
                    </button>
                    <button class="btn" style="background-color: #3D396F; color: white;" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $u['id_usuario']; ?>">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $u['id_usuario']; ?>">
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

<?php include 'modals/addModal.php';?>
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