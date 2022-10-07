<?php
    require_once "modelos/pagosModelo.php";
    $id = $_SESSION['IdClient'];
    $clienteModelo = new pago();
    $Cliente = $clienteModelo->Obtenerpago($id);
?>

<form id="updateClientForm" action="../controladores/actualizarPagControlador.php?id=<?php echo $id ?>" method="POST" >
    <div class="modal-header">
       <div class="col-12 col-md-12">
         <h3>Actualizar Pago</h3>  
          <button type ="button" class="close" data-dismiss="modal" >&times;</button> 
        </div>  
    </div>
<div class="modal-body">       
        <!-- <code><?php print_r ($_SESSION['IdClient']); ?></code> -->
						<div class="container-fluid">
							<div class="row">
							<div class="col-12 col-md-4">
									<div class="form-group">
										<label>Id de pago</label>
										<input type="number" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" name="txtidpago_act" id="usuario_apellido" value="<?php echo $Cliente["pag_id"] ?>" maxlength="35">
									</div>
								</div>
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label class="bmd-label-floating">Pago total</label>
										<input type="number" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" name="txtpagototal_act" value="<?php echo $Cliente["pag_total"] ?>" maxlength="35">
									</div>
								</div>
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label>Fecha de pago</label>
										<input type="date" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" name="txtfechapago_act" id="usuario_apellido" value="<?php echo $Cliente["pag_fecha"] ?>" maxlength="35">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">Codigo del credito</label>
										<input type="number" pattern="[0-9()+]{8,20}" class="form-control" name="txtcodcredito_act" value="<?php echo $Cliente["cre_codigo"] ?>" maxlength="20">
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

			</div>