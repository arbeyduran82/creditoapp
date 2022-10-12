<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fas fa-sync-alt fa-fw"></i> &nbsp; ACTUALIZAR PAGO
				</h3>
			</div>
			
			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a href="<?php echo SERVERURL; ?>pago-nuevo/"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO PAGO</a>
					</li>
					<li>
						<a href="<?php echo SERVERURL; ?>pago-lista/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE PAGOS</a>
					</li>
					<li>
						<a href="<?php echo SERVERURL; ?>pago-buscar/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR PAGO</a>
					</li>
				</ul>	
			</div>
			<?php
    require_once "modelos/pagosModelo.php";
    $id = $_GET['id'];
    $pagomodelo = new pago();
    $Pago = $pagomodelo->Obtenerpago($id);

	foreach($Pago as $key){
?>
			<!-- Content -->
			<div class="container-fluid">
				<form action="../controladores/actualizarPagControlador.php" method="POST" class="form-neon" autocomplete="off">
					<fieldset>
						<legend><i class="far fa-address-card"></i> &nbsp; Información del pago</legend>
						<div class="container-fluid">
							<div class="row">
							<div class="col-12 col-md-4">
									<div class="form-group">
										<label>Id de pago</label>
										<input type="number" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" name="txtidpago_act" id="usuario_apellido" value="<?php echo $key["pag_id"] ?>" maxlength="35">
									</div>
								</div>
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label class="bmd-label-floating">Pago total</label>
										<input type="number" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" name="txtpagototal_act" value="<?php echo $key["pag_total"] ?>" maxlength="35">
									</div>
								</div>
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label>Fecha de pago</label>
										<input type="date" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" name="txtfechapago_act" id="usuario_apellido" value="<?php echo $key["pag_fecha"] ?>" maxlength="35">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">Codigo del credito</label>
										<input type="number" pattern="[0-9()+]{8,20}" class="form-control" name="txtcodcredito_act" value="<?php echo $key["cre_codigo"] ?>" maxlength="20">
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					<br><br><br>
					<p class="text-center" style="margin-top: 40px;">
						<button type="submit" class="btn btn-raised btn-success btn-sm" name="btn_actualizar_pago"><i class="fas fa-sync-alt"></i> &nbsp; ACTUALIZAR</button>
					</p>
				</form>
<?php  } ?>
			</div>