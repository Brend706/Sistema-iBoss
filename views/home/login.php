<?php
require_once("c:/xampp/htdocs/iboss/views/head/head.php");
?>

<div class="fondo-login">
<div class="card col-3 login">
    <div class="card-header text-center">
        <div class="mb-3">
            <a href="/iboss/index.php">
                <i class="fa-solid fa-desktop Iboss"></i>
            </a>
        </div>
        <div>
            ¡Bienvenido a Iboss!...<br>¿Quien eres? 
        </div>
    </div>
    <div class="card-body">
        <form action="verificar.php" method="POST" autocomplete="off">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
                <input type="email" name="correo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">   
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                <input type="password" name="contrasena" class="form-control" id="exampleInputPassword1">
            </div>
            <?php if (!empty($_GET['error']) || !empty($_GET['ok'])):?>
                <div id="alertError" style="margin: auto;" class="alert <?= !empty($_GET['error'])? 'alert-danger' : 'alert-success' ?> alert-dismissible fade show mb-2" role="alert">
                    <?= !empty($_GET['error'])? $_GET['error'] : $_GET['ok'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif;?>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary boton-Login">Iniciar Sesion</button>
            </div>            
        </form>
    </div>
</div>
</div>