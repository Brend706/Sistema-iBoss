<?php
require_once("c:/xampp/htdocs/iboss/views/head/header.php");
if(empty($_SESSION['usuario'])){
    header("Location: login.php");
}

// Verificamos que el usuario sea Jefe de la tienda
if($_SESSION['rol'] != 3){
    header("Location: panel_control.php");
}
?>

<?php
require_once("c://xampp/htdocs/iboss/controllers/graficosController.php"); 

$graficosCtrl = new graficosController();

// Datos para los gráficos
$datosVentas = $graficosCtrl->ventasPorProducto();         
$datosCategorias = $graficosCtrl->ventasPorCategoria();   
$datosStock = $graficosCtrl->stockPorProducto();           
$datosDiario = $graficosCtrl->ventasPorDia();              

// Codificamos para JS
$jsNombres = json_encode($datosVentas['labels']);
$jsVentas = json_encode($datosVentas['data']);

$jsCategorias = json_encode($datosCategorias['labels']);
$jsCatTotales = json_encode($datosCategorias['data']);

$jsStockNombres = json_encode($datosStock['labels']);
$jsStockCantidad = json_encode($datosStock['data']);

$jsFechas = json_encode($datosDiario['labels']);
$jsTotalesDia = json_encode($datosDiario['data']);
?>

<div class="panel">
    <h1 class="text-center mt-4">Bienvenido, <?= $_SESSION['usuario'] ?> </h1> <hr>
    <div class="d-flex justify-content-between align-items-center mb-4 p-3" style="max-width: 1000px; margin: auto;">
    <h3 class="mb-0" style="margin-left: 20px;">¡Estos son los Reportes del Día!</h3>
    <div style="width: 230px; margin-right: 20px;"> 
        <button class="btn w-100" style="background-color: #3D396F; color: white;" data-bs-toggle="modal" data-bs-target="#reporteModal">
            Descargar Reporte en PDF
        </button>
    </div>
</div>

    <?php include 'modals/reporteModal.php'; ?>
    <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 30px; padding: 20px;">
        <div id="stock-chart" style="width: 75%;"></div>
        <div id="sales-chart" style="width: 45%;"></div>
        <div id="category-chart" style="width: 45%;"></div>
        <div id="daily-sales-chart" style="width: 90%;"></div>
    </div>

    <script>
        // Stock por Producto
        const stockLabels = <?php echo $jsStockNombres; ?>;
        const stockValues = <?php echo $jsStockCantidad; ?>;

        const stock_chart_options = {
            series: [{
                name: 'Stock Disponible',
                data: stockValues
            }],
            chart: {
                type: 'bar',
                height: 550
            },
            plotOptions: {
                bar: {
                    horizontal: true
                }
            },
            xaxis: {
                categories: stockLabels
            },
            colors: ['#198754'],
            title: {
                text: 'Stock por Producto',
                align: 'center',
                style: {        
                    fontSize: '20px',    
                    fontWeight: 'bold'   
                }
            }
        };

        const chartStock = new ApexCharts(
            document.querySelector("#stock-chart"),
            stock_chart_options
        );
        chartStock.render();

        // Ventas por Producto 
        const productNames = <?php echo $jsNombres; ?>;
        const productSales = <?php echo $jsVentas; ?>;

        const sales_chart_options = {
            series: [{
                name: 'Cantidad Vendida',
                data: productSales
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            xaxis: {
                categories: productNames
            },
            colors: ['#0d6efd'],
            title: {
                text: 'Ventas por Producto',
                align: 'center',
                style: {       
                    fontSize: '20px',    
                    fontWeight: 'bold'   
                }
            }
        };

        const chartVentas = new ApexCharts(
            document.querySelector("#sales-chart"),
            sales_chart_options
        );
        chartVentas.render();

        // Ventas por Categoría
        const catLabels = <?php echo $jsCategorias; ?>;
        const catData = <?php echo $jsCatTotales; ?>;

        const category_chart_options = {
            series: catData,
            chart: {
                type: 'pie',
                height: 550
            },
            labels: catLabels,
            title: {
                text: 'Ventas de Producto por Categorias',
                align: 'center',
                style: {     
                    fontSize: '20px',    
                    fontWeight: 'bold'   
                }
            },
            colors: ['#0d6efd', '#dc3545', '#198754', '#ffc107', '#6c757d', '#0dcaf0', '#6610f2', '#fd7e14', '#20c997', '#6f42c1'],

        };

        const chartCategoria = new ApexCharts(
            document.querySelector("#category-chart"),
            category_chart_options
        );
        chartCategoria.render();

        // Ventas por Día
        const fechas = <?php echo $jsFechas; ?>;
        const ventasPorDia = <?php echo $jsTotalesDia; ?>;

        const daily_sales_chart_options = {
            series: [{
                name: 'Total Vendido ($)',
                data: ventasPorDia
            }],
            chart: {
                type: 'line',
                height: 350
            },
            xaxis: {
                categories: fechas
            },
            colors: ['#dc3545'],
            title: {
                text: 'Ventas realizadas en el Dia',
                align: 'center',
                style: {       
                    fontSize: '20px',    
                    fontWeight: 'bold'   
                }
            }
        };

        const chartDiario = new ApexCharts(
            document.querySelector("#daily-sales-chart"),
            daily_sales_chart_options
        );
        chartDiario.render();
    </script>
</div>

<!-- Tablas invisibles solo para el PDF -->
<style>
    .oculto { display: none; }
</style>

<!-- Stock -->
<div id="stock-table" class="oculto">
    <table style="font-size: 12px; border-collapse: collapse; width: 100%;">
        <thead><tr><th>Producto</th><th>Cantidad</th></tr></thead>
        <tbody>
            <?php foreach ($datosStock['labels'] as $i => $producto): ?>
            <tr><td><?= htmlspecialchars($producto) ?></td><td><?= htmlspecialchars($datosStock['data'][$i]) ?></td></tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Ventas -->
<div id="sales-table" class="oculto">
    <table style="font-size: 12px; border-collapse: collapse; width: 100%;">
        <thead><tr><th>Producto</th><th>Cantidad Vendida</th></tr></thead>
        <tbody>
            <?php foreach ($datosVentas['labels'] as $i => $producto): ?>
            <tr><td><?= htmlspecialchars($producto) ?></td><td><?= htmlspecialchars($datosVentas['data'][$i]) ?></td></tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Categorías -->
<div id="category-table" class="oculto">
    <table style="font-size: 12px; border-collapse: collapse; width: 100%;">
        <thead><tr><th>Categoría</th><th>Total Vendido</th></tr></thead>
        <tbody>
            <?php foreach ($datosCategorias['labels'] as $i => $cat): ?>
            <tr><td><?= htmlspecialchars($cat) ?></td><td><?= htmlspecialchars($datosCategorias['data'][$i]) ?></td></tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Diario -->
<div id="daily-sales-table" class="oculto">
    <table style="font-size: 12px; border-collapse: collapse; width: 100%;">
        <thead><tr><th>Fecha</th><th>Total Vendido ($)</th></tr></thead>
        <tbody>
            <?php foreach ($datosDiario['labels'] as $i => $fecha): ?>
            <tr><td><?= htmlspecialchars($fecha) ?></td><td><?= htmlspecialchars($datosDiario['data'][$i]) ?></td></tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
require_once("c:/xampp/htdocs/iboss/views/head/footer.php");
?>