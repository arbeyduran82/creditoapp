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
				<a href="<?php echo SERVERURL; ?>cliente-nuevo/" class="tile">
					<div class="tile-tittle">Historial Pagos</div>
					<div class="tile-icon">
                    <i class="fas fa-dollar-sign"></i>
					</div>
				</a>
				
				<a href="<?php echo SERVERURL; ?>articulo-lista/" class="tile">
					<div class="tile-tittle">Estado Credito</div>
					<div class="tile-icon">
                    <i class="fas fa-file-invoice-dollar"></i>
					</div>
				</a>

				<a href="<?php echo SERVERURL; ?>solicitud-solicitud/" class="tile">
					<div class="tile-tittle">Solicitudes</div>
					<div class="tile-icon">
                    <i class="fas fa-tasks"></i>
					</div>
				</a>

				<a href="<?php echo SERVERURL; ?>solicitar-pendiente/" class="tile">
					<div class="tile-tittle">Creditos Aprobados</div>
					<div class="tile-icon">
						<i class="fas fa-hand-holding-usd fa-fw"></i>
					</div>
				</a>

				<a href="<?php echo SERVERURL; ?>solicitar-lista/" class="tile">
					<div class="tile-tittle">Creditos Finalizados</div>
					<div class="tile-icon">
                    <i class="fas fa-check"></i>
					</div>
				</a>

				<a href="<?php echo SERVERURL; ?>usuario-lista/" class="tile">
					<div class="tile-tittle">Clientes Financieros</div>
					<div class="tile-icon">
						<i class="fas fa-users"></i>
					</div>
				</a>

				<a href="<?php echo SERVERURL; ?>empresa/" class="tile">
					<div class="tile-tittle">Paz y Salvo</div>
					<div class="tile-icon">
                    <i class="far fa-handshake"></i>
					</div>
				</a>
			</div>
