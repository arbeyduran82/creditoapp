<!-- Page header -->
<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fas fa-file-invoice-dollar"></i> &nbsp; REPORTE ESTADO DE CREDITO
				</h3>
				<br>
				<a>PARA CONSULTAR EL ESTADO DE CREDITO DEL CLIENTE INGRESE EL NUMERO DE CEDULA CORRESPONDIENTE A ESTE</a>
</div>
<?php
error_reporting(0);
$busquedacedulaestado=strtolower($_REQUEST['busqueda-cedula-estado']);
?>
			
			<!-- Content here-->
			<div class="container-fluid">
				<form action="../controladores/controladorRepestado.php" method="POST" class="form-neon" autocomplete="off">
					<fieldset>
						<legend><i class="fas fa-user"></i> &nbsp; Consultar credito</legend>
						<div class="container-fluid">
							<form class="form-neon" action="" method="POST">
								<div class="container-fluid">
									<div class="row justify-content-md-center">
										<div class="col-12 col-md-6">
											<div class="form-group">
												<label class="bmd-label-floating">Ingrese numero de cedula!</label>
												<input type="text" class="form-control" name="busqueda-cedula-estado" maxlength="30" required>
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

					