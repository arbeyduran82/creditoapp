<?php
require_once "modelos/empresaModelo.php";
$emp_id = $_GET['id'];
$objempresaModelo = new empresa();
$Datos = $objempresaModelo->consultabasica($emp_id);

foreach ($Datos as $key) {
	?>

<form action="../controladores/actualizarEmpControlador.php" method="POST">

	<div class="container-fluid">
		<div class="row">
			<div class="col-12 col-md-4">
				<div class="form-group">
					<label for="item_codigo" class="bmd-label-floating">Código</label>
					<input type="text" pattern="[a-zA-Z0-9-]{1,45}" class="form-control" name="txtemp_id" value="<?php echo $key["emp_id"] ?>" maxlength="11">
				</div>
			</div>

			<div class="col-12 col-md-4">
				<div class="form-group">
					<label for="item_nombre" class="bmd-label-floating">Nombre Empresa</label>
					<input type="text" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,140}" class="form-control" name="txtemp_nombre" value="<?php echo $key["emp_nombre"]; ?>" maxlength="140">
				</div>
			</div>
			<div class="col-12 col-md-4">
				<div class="form-group">
					<label for="item_stock" class="bmd-label-floating">Correo Electronico</label>
					<input type="email" pattern="[a-zA-Z0-9]{1,35,@}" class="form-control" name="txtemp_email" value="<?php echo $key["emp_email"] ?>" maxlength="50">
				</div>
			</div>

			<div class="col-12 col-md-4">
				<div class="form-group">
					<label for="item_stock" class="bmd-label-floating">Telefono</label>
					<input type="number" pattern="[0-9]{1,9}" class="form-control" name="txtemp_telefono" value="<?php echo $key["emp_telefono"] ?>" maxlength="15">
				</div>
			</div>

			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="item_detalle" class="bmd-label-floating">Direccion</label>
					<input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,190}" class="form-control" name="txtemp_direccion" value="<?php echo $key["emp_direccion"] ?>" maxlength="190">
				</div>
			</div>
		</div>
	</div>
	</fieldset>
	<br><br><br>
	<p class="text-center" style="margin-top: 40px;">
		<button type="submit" class="btn btn-raised btn-success btn-sm" name="btn_actualizar_empresa"><i class="fas fa-sync-alt"></i> &nbsp; ACTUALIZAR</button>
	</p>
</form>
<?php } ?>
</div>