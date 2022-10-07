<!-- Page header -->
<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO PAGO
				</h3>
			</div>
			
			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a class="active" href="<?php echo SERVERURL; ?>pago-nuevo/"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO PAGO</a>
					</li>
					<li>
						<a href="<?php echo SERVERURL; ?>pago-lista/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE PAGOS</a>
					</li>
					<li>
						<a href="pago-buscar/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR PAGO</a>
					</li>
				</ul>	
			</div>
			
			<!-- Content -->
			<div class="container-fluid">
				<form action="../controladores/nuevoPagControlador.php" class="form-neon" autocomplete="off" method="POST">
					<fieldset>
						<legend><i class="far fa-address-card"></i> &nbsp; Información del pago</legend>
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label class="bmd-label-floating">Pago total</label>
										<input type="number" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" name="txtpagototal" maxlength="35">
									</div>
								</div>
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label>Fecha de pago</label>
										<input type="date" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" name="txtfechapago" id="usuario_apellido" maxlength="35">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">Codigo del credito</label>
										<input type="number" pattern="[0-9()+]{8,20}" class="form-control" name="txtcodcredito" maxlength="20">
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					<br><br><br>
					<p class="text-center" style="margin-top: 40px;">
						<button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; LIMPIAR</button>
						&nbsp; &nbsp;
						<button type="submit" name="btn_nuevopago" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; GUARDAR</button>
					</p>
				</form>
			</div>