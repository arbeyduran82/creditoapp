<!-- Page header -->
<?php
require_once 'modelos/pagosModelo.php';

?>
<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE PAGOS
				</h3>
			</div>
			
			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a href="<?php echo SERVERURL; ?>pago-nuevo/"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO PAGO</a>
					</li>
					<li>
						<a class="active" href="<?php echo SERVERURL; ?>pago-lista/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE PAGOS</a>
					</li>
					<li>
						<a href="<?php echo SERVERURL; ?>pago-buscar/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR PAGO</a>
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
								<th>TOTAL PAGO</th>
								<th>FECHA PAGO</th>
								<th>CODIGO CREDITO</th>
								<th>ACTUALIZAR</th>
								<th>ELIMINAR</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$Objlistarpagos = new pago();
						$Datos = $Objlistarpagos->listarpagos();

						foreach ($Datos as $key) {
						?>
							<tr class="text-center" >
							<td><?php echo $key["pag_id"]?></td>
							<td><?php echo $key["pag_total"]?></td>
							<td><?php echo $key["pag_fecha"]?></td>
							<td><?php echo $key["cre_codigo"]?></td>
							<td>
								<a href="<?php echo SERVERURL; ?>usuario-actualizar/" class="btn btn-success">
	  								<i class="fas fa-sync-alt"></i>	
								</a>
							</td>
							<td>
								<button type="button" class="btn btn-warning">
									<a href="../controladores/eliminarPagControlador.php?id=<?php echo $key['pag_id'] ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
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