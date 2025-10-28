<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    // Redirigir para evitar reenvío y limpiar el formulario
    header("Location: SoporteTecnico.php" );
    exit();
}