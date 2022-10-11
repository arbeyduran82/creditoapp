<?php
require_once 'modelos/clienteModelo.php';

$clienteModelo = new Clientes();
$id = $clienteModelo->ObtenerCliente($id);
?>
<!-- Page header -->
<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fas fa-sync-alt fa-fw"></i> &nbsp; ACTUALIZAR CLIENTE</h3>
</div>
<!-- Content -->
<div class="container-fluid">
		
	<legend><i class="far fa-address-card"></i> &nbsp; Información personal</legend>
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="form-group">
						<form action="../Control/EditarControladorM.php?id=id<?php echo $_GET['id'];?>" method="POST" >
					         <label for="cliente_cedula" class="bmd-label-floating">Cedula</label>
					         <input type="number"  class="form-control"  name="txtcedulacla"  maxlength="27"name="txtcedulacla" value="<?php echo $id; ?>">
				    </div>
			    </div>
			    <div class="col-12 col-md-12">
					<div class="form-group">
					    <label for="cliente_nombre" class="bmd-label-floating">Nombre</label>
					     <input type="text" class="form-control" name="txtnombrecla" maxlength="40"value="<?php echo $ver[1]; ?>">
				</div>
			</div>
			<div class="col-12 col-md-12">
									<div class="form-group">
					<label for="cliente_apellido" class="bmd-label-floating">Apellido</label>
					<input type="text" class="form-control" name="txtapellidocla"  maxlength="40"value="<?php echo $ver[2]; ?>">
				</div>
			</div>
			<div class="col-12 col-md-12">
									<div class="form-group">
					<label for="cliente_telefono" class="bmd-label-floating">Teléfono</label>
					<input type="number"  class="form-control" name= "txtcelularcla"  maxlength="20"value="<?php echo $ver[3]; ?>">
				</div>
			</div>
		<div class="col-12 col-md-12">
									<div class="form-group">
					<label for="cliente_direccion" class="bmd-label-floating">Dirección</label>
					<input type="text" class="form-control" name="txtadireccioncla" maxlength="150"value="<?php echo $ver[4]; ?>">
				</div>
			</div>
			<br>
			<br>
			<div class="col-12 col-md-12">
									<div class="form-group">
                   <center> <button class="btn btn-success"  name="actualizarCliente" type="submit"class="btn btn-success">  <i class="fas fa-sync-alt"></i> Actualizar</button></center>
                </div>
            </div>
        </div>  
        
</div>	