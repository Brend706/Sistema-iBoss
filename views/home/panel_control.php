<?php
require_once("c:/xampp/htdocs/iboss/views/head/header.php");
if(empty($_SESSION['usuario'])){
    header("Location: login.php");
}
?>

<div class="panel">
<h1 class="text-center mt-4">Bienvenido, <?= $_SESSION['usuario'] ?> </h1> <hr>
<h2 >¿Que deseas hacer hoy?</h2>

<?php if($_SESSION['rol'] == 1): ?>
    <div class="card w-75 mb-3 " style="background-color: #3D396F; color: white;">
      <div class="card-body">
        <h5 class="card-title">Gestiona tus Usuarios</h5>
        <p class="card-text">Administra tu base de usuarios: añade, edita o elimina registros fácilmente.</p>
        <a href="../usuarios/index.php" class="btn btn-light">Gestionar Usuarios</a>
      </div>
</div>
<?php endif; ?>

<div class="card w-75 mb-3 " style="background-color: #3D396F; color: white;">
  <div class="card-body">
    <h5 class="card-title">Gestiona tus productos</h5>
    <p class="card-text">Administra tu catálogo de productos: agrega, edita o elimina fácilmente.</p>
    <a href="../productos/index.php" class="btn btn-light">Gestionar productos</a>
  </div>
</div>

<div class="card w-75 mb-3 " style="background-color: #3D396F; color: white;">
  <div class="card-body">
    <h5 class="card-title">Gestiona tus ventas</h5>
    <p class="card-text">Registra nuevas ventas, actualiza detalles o elimina transacciones.</p>
    <a href="#" class="btn btn-light">Gestionar ventas</a>
  </div>
</div>

<div class="card w-75 mb-3 " style="background-color: #3D396F; color: white;">
  <div class="card-body">
    <h5 class="card-title">Gestiona tu inventario</h5>
    <p class="card-text">Mantén tu inventario organizado: añade, modifica o elimina existencias.</p>
    <a href="#" class="btn btn-light">Gestionar inventario</a>
  </div>
</div>
</div>



<?php
require_once("c:/xampp/htdocs/iboss/views/head/footer.php");
?>