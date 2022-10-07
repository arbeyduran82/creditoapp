<?php
    require_once "modelos/articulosModelo.php";
    $id = $_SESSION['IdClient'];
    $clienteModelo = new producto();
    $Cliente = $clienteModelo->ObtenerArticulo($id);
?>

<form id="updateClientForm" action="../controladores/actualizarArtControlador.php?id=<?php echo $id ?>" method="POST" >
    <div class="modal-header">
       <div class="col-12 col-md-12">
         <h3>Actualizar Articulo</h3>  
          <button type ="button" class="close" data-dismiss="modal" >&times;</button> 
        </div>  
    </div>
<div class="modal-body">       
        <!-- <code><?php print_r ($_SESSION['IdClient']); ?></code> -->

						<div class="container-fluid">
							<div class="row">
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="item_codigo" class="bmd-label-floating">Código</label>
										<input type="text" pattern="[a-zA-Z0-9-]{1,45}" class="form-control" name="item_codigo_up" id="item_codigo" value="<?php echo $Cliente["art_codigo"] ?>" maxlength="45">
									</div>
								</div>
								
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="item_nombre" class="bmd-label-floating">Nombre</label>
										<input type="text" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,140}" class="form-control" name="item_nombre_up" id="item_nombre" value="<?php echo $Cliente["art_nombre"]; ?>" maxlength="140">
									</div>
								</div>
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="item_stock" class="bmd-label-floating">Stock</label>
										<input type="num" pattern="[0-9]{1,9}" class="form-control" name="item_stock_up" id="item_stock" value="<?php echo $Cliente["art_stock"] ?>" maxlength="9">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="item_estado" class="bmd-label-floating">Estado</label>
										<select class="form-control" name="item_estado_up" id="item_estado" value="<?php echo $Cliente["art_estado"] ?>">
											<option value="" selected="" disabled="">Seleccione una opción</option>
											<option value="Habilitado">Habilitado</option>
											<option value="Deshabilitado">Deshabilitado</option>
										</select>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="item_detalle" class="bmd-label-floating">Detalle</label>
										<input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,190}" class="form-control" name="item_detalle_up" id="item_detalle" value="<?php echo $Cliente["art_detalle"] ?>" maxlength="190">
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					<br><br><br>
					<p class="text-center" style="margin-top: 40px;">
						<button type="submit" class="btn btn-raised btn-success btn-sm" name="btn_actualizar_articulo"><i class="fas fa-sync-alt"></i> &nbsp; ACTUALIZAR</button>
					</p>
				</form>

			</div>