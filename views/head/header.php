<?php
require_once ("c:/xampp/htdocs/iboss/views/head/head.php");
if(empty($_SESSION['usuario'])){
    header("Location: login.php");
}
?>


<div class="menu-lateral">
    <img src="/iboss/asset/img/iconoPanel.svg" style="height: 70px; margin: 10px" alt="">
    <!--Vistas-->
    <!--Nombre de usuario-->
    <h3 class="text-center"><?= $_SESSION['usuario'] ?></h3>
    <?php if($_SESSION['rol'] == 2): ?><!--Para encargados de tienda-->	
        <a href="../ventas/index.php" class="boton"><i class="fa-solid fa-dollar-sign"></i> Ventas</a>
        <a href="../productos/index.php" class="boton"><i class="fas fa-box"></i> Productos</a>
        <a href="../categorias/index.php" class="boton"><i class="fa-solid fa-list"></i> Categorias</a>
        <a href="../inventario/index.php" class="boton"><i class="fa-solid fa-box-archive"></i> Inventario</a>
    <?php elseif($_SESSION['rol'] == 3): ?><!--Si es jefe de ventas-->
        <a href="../home/panel_control_jefe.php" class="boton"><i class="fas fa-file-alt"></i> Reportes</a>
        <a href="../ventas/index.php" class="boton"><i class="fa-solid fa-dollar-sign"></i> Ventas</a>
        <a href="../productos/index.php" class="boton"><i class="fas fa-box"></i> Productos</a>
        <a href="../categorias/index.php" class="boton"><i class="fa-solid fa-list"></i> Categorias</a>
        <a href="../inventario/index.php" class="boton"><i class="fa-solid fa-box-archive"></i> Inventario</a>
    <?php else: ?><!--Si es admin-->
        <a href="../usuarios/index.php" class="boton"><i class="fa-solid fa-users"></i> Usuarios</a>
        <a href="../ventas/index.php" class="boton"><i class="fa-solid fa-dollar-sign"></i> Ventas</a>
        <a href="../productos/index.php" class="boton"><i class="fas fa-box"></i> Productos</a>
        <a href="../categorias/index.php" class="boton"><i class="fa-solid fa-list"></i> Categorias</a>
        <a href="../inventario/index.php" class="boton"><i class="fa-solid fa-box-archive"></i> Inventario</a>
    <?php endif; ?>

    <!--Area Final-->
    <div class="area-final">
        <a href="../home/SoporteTecnico.php" class="boton-final"><i class="fa-solid fa-headset"></i> Soporte Técnico</a>
        <a href="../home/TerminosCondiciones.php" class="boton-final"><i class="fa-solid fa-file-signature"></i> Términos & Condiciones</a>
    </div>

    <!--Cerrar Sesion-->
    <a href="/iboss/views/home/logout.php" class="boton">Cerrar Sesion</a>
    <hr class="linea">
</div>

<div class="contenedor">
    <div class="contenido">