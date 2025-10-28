<?php
require_once("c:/xampp/htdocs/iboss/views/head/header.php");
if(empty($_SESSION['usuario'])){
    header("Location: login.php");
}
?>
<div class="container mt-5">
  <h1 class="text-center">Soporte Técnico</h1>

  <form action="GuardarFormulario.php" method="POST" enctype="multipart/form-data" class="mb-4">

    <div class="mb-3">
      <label for="asunto" class="form-label">Asunto</label>
      <input type="text" name="asunto" id="asunto" class="form-control" placeholder="Ej. Error en el módulo de ventas" required>
    </div>

    <div class="mb-3">
      <label for="descripcion" class="form-label">Descripción del problema</label>
      <textarea name="descripcion" id="descripcion" rows="4" class="form-control" placeholder="Desribe detalladamente el problema..." required></textarea>
    </div>

    <div class="mb-3">
      <label for="categoria" class="form-label">Categoría</label>
      <select name="categoria" id="categoria" class="form-select" required>
        <option value="">Seleccione una categoría</option>
        <option value="Inventario">Inventario</option>
        <option value="Ventas">Ventas</option>
        <option value="Accesos">Accesos</option>
        <option value="Reportes">Reportes</option>
        <option value="Otro">Otro</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="prioridad" class="form-label">Prioridad</label>
      <select name="prioridad" id="prioridad" class="form-select" required>
        <option value="Alta">Alta</option>
        <option value="Media">Media</option>
        <option value="Baja">Baja</option>
      </select>
    </div>

    <button  type="submit" class="btn btn-primary">Enviar  <i class="fas fa-paper-plane"></i>
</button>
  </form>
</div>

<?php
require_once("c:/xampp/htdocs/iboss/views/head/footer.php");
?>