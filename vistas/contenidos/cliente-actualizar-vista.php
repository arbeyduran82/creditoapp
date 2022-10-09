<?php
    require_once "modelos/clienteModelo.php";
    $id = $_SESSION['IdClient'];
    $clienteModelo = new Clientes();
    $Cliente = $clienteModelo->ObtenerCliente($id);
?>

<form id="updateClientForm" action="../controladores/cliente-actualizar.php?id=<?php echo $id ?>" method="POST" >
    <div class="modal-header">
       <div class="col-12 col-md-12">
         <h3>Actualizar Cliente</h3>  
          <button type ="button" class="close" data-dismiss="modal" >&times;</button> 
        </div>  
    </div>
<div class="modal-body">       
        <!-- <code><?php print_r ($_SESSION['IdClient']); ?></code> -->
     
        <div class="container-fluid">
			<div class="col-12 col-md-12">
				<div class="form-group">
					<label for="cliente_cedula" class="bmd-label-floating">Cedula</label>
					<input type="number"  class="form-control"  name="txtcedulacla"  maxlength="27"name="txtcedulacla" value="<?php echo $Cliente["cli_documento"] ?>">
				</div>
			</div>
			<div class="form-group">
                <div class="col-12 col-md-12">
					<label for="cliente_nombre" class="bmd-label-floating">Nombre</label>
					<input type="text" class="form-control" name="txtnombrecla" maxlength="40"value="<?php echo $Cliente["cli_nombre"]; ?>">
				</div>
			</div>
			<div class="col-12 col-md-12">
				<div class="form-group">
					<label for="cliente_apellido" class="bmd-label-floating">Apellido</label>
					<input type="text" class="form-control" name="txtapellidocla"  maxlength="40" value="<?php echo $Cliente["cli_apellido"] ?>">	
				</div>
			</div>
			<div class="col-12 col-md-12">
				<div class="form-group">
					<label for="cliente_telefono" class="bmd-label-floating">Teléfono</label>
					<input type="number"  class="form-control" name= "txtcelularcla"  maxlength="20"value="<?php echo $Cliente["cli_telefono"] ?>">
				</div>
			</div>
			<div class="col-12 col-md-12">
				<div class="form-group">
					<label for="cliente_direccion" class="bmd-label-floating">Dirección</label>
					<input type="text" class="form-control" name="txtadireccioncla" maxlength="150"value="<?php echo $Cliente["cli_direccion"] ?>">
				</div>
			</div>
            <div class="modal-footer">
                <div class="col-12 col-md-12">
								
                    <button class="btn btn-success"  name="actualizarCliente" type="submit"class="btn btn-success">  <i class="fas fa-sync-alt"></i> Actualizar</button>
                </div>
            </div>
        </div>  
        
</div>