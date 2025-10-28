<!-- Modal para seleccionar el reporte -->
<div class="modal fade" id="reporteModal" tabindex="-1" aria-labelledby="reporteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="reporteModalLabel">Selecciona el reporte que deseas generar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body text-center">
        <div class="d-grid gap-2">

          <a class="btn w-100" style="background-color: #3D396F; color: white;" href="modals/generar_reporte_pdf.php?tipo=stock" target="_blank">
            Reporte de Stock
          </a>

          <a class="btn w-100" style="background-color: #3D396F; color: white;" href="modals/generar_reporte_pdf.php?tipo=ventas" target="_blank">
            Reporte de Ventas
          </a>

          <a class="btn w-100" style="background-color: #3D396F; color: white;" href="modals/generar_reporte_pdf.php?tipo=categoria" target="_blank">
            Reporte por Categoría
          </a>

          <a class="btn w-100" style="background-color: #3D396F; color: white;" href="modals/generar_reporte_pdf.php?tipo=diario" target="_blank">
            Reporte Diario
          </a>

          <a class="btn w-100" style="background-color:rgb(40, 37, 75); color: white;" href="modals/generar_reporte_pdf.php?tipo=completo" target="_blank">
            Reporte Completo
          </a>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
