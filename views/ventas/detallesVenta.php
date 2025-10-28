<?php

require_once("c://xampp/htdocs/iboss/views/head/header.php"); //llamado al encabezado
require_once("c://xampp/htdocs/iboss/controllers/ventasController.php");
require_once("c://xampp/htdocs/iboss/controllers/detallesVentaController.php"); //llamado al controlador de detalles de venta

if(empty($_SESSION['usuario'])){ //si la sesion no esta iniciada
  header("Location: /iboss/views/home/login.php");//redirigimos al login
}

$controller = new ventasController();
$productos = $controller->obtenerProductos(); //obtenemos todos los productos en la bd
$id_venta = $_GET['id_venta']; //obtenemos el id_venta de la url

$total = $controller->obtenerTotalDeVenta($id_venta); //obtenemos el total de la venta seleccionada o agregada
$venta = $controller->obtenerVentaPorId($id_venta); 
$descuento = $venta['descuento']; //obtenemos el descuento de la venta seleccionada o agregada
$totalConDesc = $venta['total_con_desc']; //obtenemos el total con descuento de la venta seleccionada o agregada

$detallesController = new detallesVentaController();
//p_vendidos = productos vendidos
$p_vendidos = $detallesController->obtenerDetallesVenta($id_venta); //obtenemos los detalles de los productos de la venta
    
?>
<!-- Mensaje de éxito al editar un producto en la venta -->
<?php
$ok = isset($_GET['ok']) ? $_GET['ok'] : '';
if ($ok): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong><?php echo $ok; ?></strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<!-- FORMULARIO PARA AGREGAR PRODUCTOS A LA VENTA EN DETALLES VENTA -->
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1 class="fw-bold">Venta #<?php echo $id_venta ?></h1>
            <div class="d-flex justify-content-between align-items-center">
              <p class="text-muted mb-0">Agregue los productos y la cantidad que se han vendido</p>
              <div class="d-flex gap-2">
                  <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $id_venta; ?>">
                      <i class="bi bi-currency-dollar me-1"></i> Aplicar descuento
                  </button>
                  <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $id_venta; ?>">
                      <i class="fas fa-trash"></i> Eliminar venta
                  </button>
              </div>
          </div><hr>
            <form action="detallesVenta/agregarDetalles.php" method="POST" class="row g-2 align-items-end">
                <input type="hidden" name="id_venta" id="id_venta" value="<?php echo $id_venta ?>">	
                <div class="col-md-5">
                    <label for="id_producto" class="form-label">Selecciona un producto</label>
                    <select class="form-control" id="id_producto" name="id_producto" required>
                        <?php
                            foreach ($productos as $p) {
                                echo "<option value='{$p['id_producto']}' selected>{$p['producto']}</option>";
                            }
                        ?>
                        </select>
                </div>
                <div class="col-md-3">
                    <label for="cantidad" class="form-label">Cantidad vendida</label>
                    <input type="number" min="1" class="form-control" id="cantidad" name="cantidad" required>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-secondary w-100">Agregar producto</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include 'modals/editModal.php'; ?>
<?php include 'modals/deleteModal.php'; ?>
<br><hr><br>

<!-- Tabla con los detalles de la venta -->
 <h3 class="fw-bold">Detalles de la venta</h3>
<table class="table table-striped table-hover text-center table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Producto</th>
      <th scope="col">Precio Unitario</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Subtotal</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <!-- Se recorre el arreglo de productos vendidos y se imprimen en la tabla sino esta vacio el array de p_vendidos-->
    <?php $contador = 1; //contador para que el numero de fila se vea mas ordenado y no mostrar directamente el id_detalle
    if(!empty($p_vendidos)): ?>
    
      <?php foreach ($p_vendidos as $pv) : ?>
      <tr>
        <th scope="row"><?= $contador++ ?></th>
        <td><?= $pv['nombre'] ?></td>
        <td>$<?= $pv['precio'] ?></td>
        <td><?= $pv['cantidad'] ?></td>
        <td>$<?= $pv['subtotal'] ?></td>
        <td>
          <button class="btn" style="background-color: #3D396F; color: white;" data-bs-toggle="modal" data-bs-target="#editModalDetalle<?php echo $pv['id_detalle']; ?>">
              <i class="fas fa-edit"></i>
          </button>
          <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModalDetalle<?php echo $pv['id_detalle']; ?>">
              <i class="fas fa-trash"></i>
          </button>
        </td>
      </tr>
        <?php include 'detallesVenta/editModalDetalle.php'; ?>
        <?php include 'detallesVenta/deleteModalDetalle.php'; ?>
      <?php endforeach; ?>
      <tr>
        <td colspan="4" class="text-end fw-bold">Total de la venta</td>
        <td class="fw-bold">$<?= $total ?></td>
        <td></td>
      </tr>
      <tr>
        <td colspan="4" class="text-end fw-bold">Descuento aplicado</td>
        <td class="fw-bold">- $<?= $descuento ?></td>
        <td></td>
      </tr>
      <tr>
        <td colspan="4" class="text-end fw-bold">Total a pagar</td>
        <td class="fw-bold">$<?= $totalConDesc ?></td> 
        <td></td>
      </tr>

    <?php else: ?>
      <tr>
        <td colspan="8">No hay productos registrados en esta venta</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>



<?php
require_once("c://xampp/htdocs/iboss/views/head/footer.php"); //llamado al pie de pagina
?>

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