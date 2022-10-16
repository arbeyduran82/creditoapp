<!-- Page header -->
<?php
require_once 'controladores/paginadorUsuControler.php';

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
		<!--<li>
						<a href="<?php echo SERVERURL; ?>usuario-buscar/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR USUARIO</a>
					</li> -->
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
				foreach ($Datos as $key) {
				?>
					<tr class="text-center">
						<td><?php echo $key["usu_id"] ?></td>
						<td><?php echo $key["usu_cedula"] ?></td>
						<td><?php echo $key["usu_nombre"] ?></td>
						<td><?php echo $key["usu_apellido"] ?></td>
						<td><?php echo $key["usu_telefono"] ?></td>
						<td><?php echo $key["usu_direccion"] ?></td>
						<td><?php echo $key["usu_email"] ?></td>
						<td><?php echo $key["usu_usuario"] ?></td>
						<td><?php echo $key["usu_privilegio"] ?></td>
						<td>
							<a href="<?php echo SERVERURL; ?>usuario-actualizar/?id=<?php echo $key['usu_id'] ?>" class="btn btn-success">
								<i class="fas fa-sync-alt"></i>
							</a>
						</td>
						<td>
							<button type="button" class="btn btn-warning">
								<a href="<?php echo SERVERURL; ?>controladores/eliminarUsuControlador.php?id=<?php echo $key['usu_id'] ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
							</button>
						</td>
					</tr>
				<?php } ?>

			</tbody>
		</table>
	</div>
</div>

<!-- Inicio Paginador -->
<div class="container my-5">
	<div class="row">
		<div class="col-md-12">
			<nav aria-label="Page navigation example">
				<ul class="pagination justify-content-center">
					<li class="page-item
                    <?php echo $_GET['pagina'] <= 1 ? 'disabled' : '' ?>
                    ">
						<a class="page-link" href="?pagina=<?php echo $_GET['pagina'] - 1 ?>" tabindex="-1">
							Anterior
						</a>
					</li>
					<?php for ($i = 0; $i < $Paginas; $i++) : ?>
						<li class="page-item
                            <?php echo $_GET['pagina'] == $i + 1 ? 'active' : '' ?>">
							<a class="page-link" href="?pagina=<?php echo $i + 1 ?>">
								<?php echo $i + 1 ?>
							</a>
						</li>
					<?php endfor ?>
					<li class="page-item
                    <?php echo $_GET['pagina'] >= $Paginas ? 'disabled' : '' ?>
                    ">
						<a class="page-link" href="?pagina=<?php echo $_GET['pagina'] + 1 ?>">Siguiente</a>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</div>

<!-- fin Paginador -->