<!-- Page header -->
<?php
require_once 'modelos/clienteModelo.php';

?>
<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE CLIENTES
				</h3>
			</div>

			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a href="<?php echo SERVERURL; ?>cliente-nuevo/"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR CLIENTE</a>
					</li>
					<li>
						<a class="active" href="<?php echo SERVERURL; ?>cliente-lista/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE CLIENTES</a>
					</li>
					<li>
						<a href="<?php echo SERVERURL; ?>cliente-buscar/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR CLIENTE</a>
					</li>
				</ul>	
			</div>
			
			<!-- Content here-->
			<div class="container-fluid">
				<div class="table-responsive">
					<table class="table table-dark table-sm">
						<thead>
							<tr class="text-center roboto-medium">
								<th>#</th>
								<th>CEDULA</th>
								<th>NOMBRE</th>
								<th>APELLIDO</th>
								<th>TELEFONO</th>
								<th>DIRECCIÓN</th>
								<th>ACTUALIZAR</th>
								<th>ELIMINAR</th>
							</tr>
						</thead>
						<tbody>
<?php
					
                        $obj1=new Clientes();
                        $datos=$obj1->listarcliente();
						error_reporting(0);
                        foreach($datos as $key){?>
                        <tr class="text-center" >
                            <td><?php echo $key["cli_id"]?></td>
                            <td><?php echo $key["cli_documento"]?></td>
                            <td><?php echo $key["cli_nombre"]?></td>
                            <td><?php echo $key["cli_apellido"]?></td>
                            <td><?php echo $key["cli_telefono"]?></td>
                            <td><?php echo $key["cli_direccion"]?></td>
							<td><a type="submit"  class="btn btn-success" data-toggle="modal" data-target="#actualizar" data-idCliente="<?php echo $key["cli_id"]?>"><i class="fas fa-sync-alt"></i>Actualizar</a></td>
				            <td><button type="submit" class="btn btn-warning"><a href="../controladores/eliminarClientesControlador.php?id=<?php echo $key['cli_documento'] ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a></button></td>
						</tr>
                    <?php } ?>
							
						</tbody>
					</table>
				</div>

				<nav aria-label="Page navigation example">
					<ul class="pagination justify-content-center">
						<li class="page-item disabled">
							<a class="page-link" href="#" tabindex="-1">Previous</a>
						</li>
						<li class="page-item"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item">
							<a class="page-link" href="#">Next</a>
						</li>
					</ul>
				</nav>
			</div>
<!-- para que la pantalla quede gris-->
<div id="actualizar" class="modal fade" role ="dialog">
<div class="modal-dialog">
    <div class= "modal-content"> 
    </div>
</div>
</div>


<script>
$('#actualizar').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget); // Button that triggered the modal
	var idClient = button[0].attributes["data-idcliente"].value; // Extract info from data-* attributes

	fetch('../cliente-actualizar/' + idClient)
	.then(response => response.text())
	.then(htmlContent =>{
		var modal = $(this);
		var formUpdate = modal.find('.modal-content').append(htmlContent);
	});
});
</script>