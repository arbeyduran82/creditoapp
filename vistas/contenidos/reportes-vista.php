<?php
    require_once 'modelos/empresaModelo.php';
?>

<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-chart-line"></i> &nbsp; REPORTES
    </h3>
</div>

<!--CONTENT-->
<div class="full-box tile-container">
				<a href="<?php echo SERVERURL; ?>reporte-historial/" class="tile">
					<div class="tile-tittle">Historial Pagos</div>
					<div class="tile-icon">
                    <i class="fas fa-dollar-sign"></i>
					</div>
				</a>
				
				<a href="<?php echo SERVERURL; ?>reporte-estado/" class="tile">
					<div class="tile-tittle">Estado Credito</div>
					<div class="tile-icon">
                    <i class="fas fa-file-invoice-dollar"></i>
					</div>
				</a>

				<a href="<?php echo SERVERURL; ?>reporte-solicitudes?pagina=1" class="tile">
					<div class="tile-tittle">Solicitudes</div>
					<div class="tile-icon">
                    <i class="fas fa-tasks"></i>
					</div>
				</a>

				<a href="<?php echo SERVERURL; ?>reporte-creditos-aprobados?pagina=1" class="tile">
					<div class="tile-tittle">Creditos Aprobados</div>
					<div class="tile-icon">
						<i class="fas fa-hand-holding-usd fa-fw"></i>
					</div>
				</a>

				<a href="<?php echo SERVERURL; ?>reporte-finalizados?pagina=1" class="tile">
					<div class="tile-tittle">Creditos Finalizados</div>
					<div class="tile-icon">
                    <i class="fas fa-check"></i>
					</div>
				</a>

				<a href="<?php echo SERVERURL; ?>reporte-clientes-financieros?pagina=1" class="tile">
					<div class="tile-tittle">Clientes Financieros</div>
					<div class="tile-icon">
						<i class="fas fa-users"></i>
					</div>
				</a>

				<a href="<?php echo SERVERURL; ?>reporte-pazysalvo/" class="tile">
					<div class="tile-tittle">Paz y Salvo</div>
					<div class="tile-icon">
                    <i class="far fa-handshake"></i>
					</div>
				</a>
			</div>
