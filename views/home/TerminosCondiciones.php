<?php
require_once("c:/xampp/htdocs/iboss/views/head/header.php");
if (empty($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>

<div class="container mt-5" > 
  <h2 class="text-center">Términos y Condiciones de Uso del Sistema iBoss</h2>
<hr>
  <ol class="mb-5">
    <li><strong>Acceso y Uso del Sistema</strong><br>
      El acceso al sistema está restringido a usuarios autorizados previamente registrados por la empresa.
      Cada usuario es responsable de mantener la confidencialidad de sus credenciales. Se prohíbe el acceso no autorizado o la suplantación de identidad.
    </li><br>

    <li><strong>Privacidad y Protección de Datos</strong><br>
      La información registrada en el sistema se utilizará exclusivamente con fines operativos. No se compartirá con terceros sin consentimiento, salvo requerimiento legal.
    </li><br>

    <li><strong>Responsabilidad del Usuario</strong><br>
      El usuario debe utilizar el sistema de forma responsable. Alterar, borrar o manipular datos sin autorización podrá derivar en sanciones y suspensión del acceso.
    </li><br>

    <li><strong>Soporte Técnico</strong><br>
      El módulo de soporte está destinado a reportar problemas relacionados con iBoss. Los técnicos responderán según la prioridad del caso reportado.
    </li><br>

    <li><strong>Propiedad Intelectual</strong><br>
      El código, diseño y funcionalidades de iBoss son propiedad exclusiva de sus desarrolladores y licenciatarios. Su reproducción o modificación está prohibida.
    </li><br>

    <li><strong>Actualizaciones y Mantenimiento</strong><br>
      El sistema puede ser actualizado para mejorar rendimiento o seguridad. Durante esos periodos, el servicio podría no estar disponible temporalmente.
    </li><br>

    <li><strong>Limitación de Responsabilidad</strong><br>
      El equipo de desarrollo no se hace responsable por mal uso del sistema o errores derivados de una configuración incorrecta por parte de los usuarios.
    </li><br>

    <li><strong>Aceptación</strong><br>
      Al utilizar iBoss, usted declara que ha leído y aceptado estos términos y condiciones.
    </li>
  </ol>

    <p>Si tiene alguna pregunta o inquietud sobre estos términos, no dude en ponerse en contacto con nuestro equipo de soporte técnico.</p>
    
    <p class="text-center"><strong>Última actualización:</strong> <?php echo date("d/m/Y"); ?></p>
</div>

<?php
require_once("c:/xampp/htdocs/iboss/views/head/footer.php");
?>
