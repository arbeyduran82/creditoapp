<?php
require_once 'modelos/reporteModelo.php';

?>
<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fas fa-dollar-sign"></i> &nbsp; REPORTE HISTORIAL DE PAGO
				</h3>
				<br>
				<a>PARA GENERAR EL HISTORIAL DE PAGO DEL CLIENTE INGRESE EL NUMERO DE CEDULA CORRESPONDIENTE A ESTE</a>
</div>
<?php
error_reporting(0);
$busquedacedula=strtolower($_REQUEST['busqueda-cedula-historial']);
?>
			
			<!-- Content here-->
			<div class="container-fluid">
				<form action="../controladores/controladorRephistorial.php" method="POST" class="form-neon" autocomplete="off">
					<fieldset>
						<legend><i class="fas fa-user"></i> &nbsp; Consultar historial</legend>
						<div class="container-fluid">
							<form class="form-neon" action="" method="POST">
								<div class="container-fluid">
									<div class="row justify-content-md-center">
										<div class="col-12 col-md-6">
											<div class="form-group">
												<label class="bmd-label-floating">Ingrese numero de cedula!</label>
												<input type="text" class="form-control" name="busqueda-cedula-historial" maxlength="30" required>
											</div>
										</div>
							</div>
						</div>
					</fieldset>
					<p class="text-center" style="margin-top: 40px;">
						<button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; LIMPIAR</button>
						&nbsp; &nbsp;
						<button type="submit" class="btn btn-raised btn-info btn-sm"><i class="fas fa-search-dollar fa-fw"></i> &nbsp; GENERAR REPORTE</button>
					</p>
				</form>
			</div>	

						
		