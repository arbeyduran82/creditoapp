<?php
require_once 'modelos/clienteModelo.php';
$cli_id = $_GET['id'];
$clienteModelo = new Clientes();
$id = $clienteModelo->consultabasica($cli_id);
foreach ($id as $key) {
?>

<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fas fa-sync-alt fa-fw"></i> &nbsp; ACTUALIZAR CLIENTE</h3>
</div>

<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a href="<?php echo SERVERURL; ?>cliente-nuevo/"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR CLIENTE</a>
					</li>
				
					<li>
						<a href="<?php echo SERVERURL; ?>cliente-buscar/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR CLIENTE</a>
					</li>
					
				</ul>	
			</div>
 <form action="../controladores/actualizarCliControlador.php"class="form-neon" autocomplete="off" method="POST">

	<div class="container-fluid">
		<div class="row">
			<div class="col-12 col-md-4">
				<div class="form-group">
					<label for="item_codigo" class="bmd-label-floating">Cedula</label>
					<input type="text" pattern="[a-zA-Z0-9-]{1,45}" class="form-control"  name="txtcedulacla" value="<?php echo $key["cli_id"]?>" maxlength="11">
				</div>
			</div>

			<div class="col-12 col-md-4">
				<div class="form-group">
					<label for="item_nombre" class="bmd-label-floating">Nombres</label>
					<input type="text" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,140}" class="form-control" name="txtnombrecla" value="<?php echo $key["cli_nombre"]; ?>" maxlength="140">
				</div>
			</div>
			<div class="col-12 col-md-4">
				<div class="form-group">
					<label for="item_stock" class="bmd-label-floating">Apellidos</label>
					<input type="text" pattern="[a-zA-Z0-9]{1,35,@}" class="form-control" name="txtapellidocla"  value="<?php echo $key["cli_apellido"] ?>" maxlength="50">
				</div>
			</div>

			<div class="col-12 col-md-4">
				<div class="form-group">
					<label for="item_stock" class="bmd-label-floating">Telefono</label>
					<input type="number" pattern="[0-9]{1,9}" class="form-control" name="txtcelularcla" value="<?php echo $key["cli_telefono"] ?>" maxlength="15">
				</div>
			</div>

			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="item_detalle" class="bmd-label-floating">Direccion</label>
					<input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,190}" class="form-control" name="txtadireccioncla" value="<?php echo $key["cli_direccion"] ?>" maxlength="190">
				</div>
			</div>
		</div>
	</div>
	</fieldset>
	<br><br><br>
	<p class="text-center" style="margin-top: 40px;">
		<button type="submit" class="btn btn-raised btn-success btn-sm" name="actualizarCliente"><i class="fas fa-sync-alt"></i> &nbsp; ACTUALIZAR</button>
	</p>
</form>
<?php } ?>
</div>

			