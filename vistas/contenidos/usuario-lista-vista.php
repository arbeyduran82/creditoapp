<!-- Page header -->
<?php
require_once 'modelos/usuarioModelo.php';

?>
<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE USUARIOS
				</h3>
			</div>
			
			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a href="<?php echo SERVERURL; ?>usuario-nuevo/"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO USUARIO</a>
					</li>
					<li>
						<a class="active" href="<?php echo SERVERURL; ?>usuario-lista/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE USUARIOS</a>
					</li>
					<li>
						<a href="<?php echo SERVERURL; ?>usuario-buscar/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR USUARIO</a>
					</li>
				</ul>	
			</div>
			
			<!-- Content -->
			<div class="container-fluid">
				<div class="table-responsive">
					<table class="table table-dark table-sm">
						<thead>
							<tr class="text-center roboto-medium">
								<th>#</th>
								<th>CEDULA</th>
								<th>NOMBRE</th>
								<th>APELLIDO</th>
								<th>TELÉFONO</th>
								<th>DIRECCION</th>
								<th>EMAIL</th>
								<th>USUARIO</th>
								<th>PRIVILEGIO</th>
								<th>ACTUALIZAR</th>
								<th>ELIMINAR</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$Objlistarusuarios = new usuario();
						$Datos = $Objlistarusuarios->listarusuarios();

						foreach ($Datos as $key) {
						?>
							<tr class="text-center" >
							<td><?php echo $key["usu_id"]?></td>
							<td><?php echo $key["usu_cedula"]?></td>
							<td><?php echo $key["usu_nombre"]?></td>
							<td><?php echo $key["usu_apellido"]?></td>
							<td><?php echo $key["usu_telefono"]?></td>
							<td><?php echo $key["usu_direccion"]?></td>
							<td><?php echo $key["usu_email"]?></td>
							<td><?php echo $key["usu_usuario"]?></td>
							<td><?php echo $key["usu_privilegio"]?></td>
							<td>
								<a href="<?php echo SERVERURL; ?>usuario-actualizar/" class="btn btn-success">
	  								<i class="fas fa-sync-alt"></i>	
								</a>
							</td>
							<td>
								<button type="button" class="btn btn-warning">
									<a href="controladores/eliminarUsuControlador.php?id=<?php echo $key['usu_id'] ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
								</button>	
							</td>
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