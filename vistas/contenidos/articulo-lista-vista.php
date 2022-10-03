<!-- Page header -->
<?php
require_once 'modelos/articulosModelo.php';

?>
<div class="full-box page-header">
                <h3 class="text-left">
                    <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE ARTICULOS
                </h3>
            </div>

            <div class="container-fluid">
                <ul class="full-box list-unstyled page-nav-tabs">
                    <li>
                        <a href="<?php echo SERVERURL; ?>articulo-nuevo/"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR ARTICULO</a>
                    </li>
                    <li>
                        <a class="active" href="articulo-lista/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE ARTICULOS</a>
                    </li>
                    <li>
                        <a href="<?php echo SERVERURL; ?>articulo-buscar/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR ARTICULO</a>
                    </li>
                </ul>
            </div>
            
            <!--CONTENT-->
            <div class="container-fluid">
				<div class="table-responsive">
					<table class="table table-dark table-sm">
						<thead>
							<tr class="text-center roboto-medium">
								<th>CÓDIGO</th>
								<th>NOMBRE</th>
								<th>STOCK</th>
                                <th>DETALLE</th>
								<th>ACTUALIZAR</th>
								<th>ELIMINAR</th>
							</tr>
						</thead>
						<tbody>
                        <?php
						$Objlistararticulos = new producto();
						$Datos = $Objlistararticulos->listararticulos();

						foreach ($Datos as $key) {
						?>
							<tr class="text-center" >
							<td><?php echo $key["art_codigo"]?></td>
							<td><?php echo $key["art_nombre"]?></td>
							<td><?php echo $key["art_stock"]?></td>
							<td><?php echo $key["art_detalle"]?></td>
							<td>
								<a href="<?php echo SERVERURL; ?>usuario-actualizar/" class="btn btn-success">
	  								<i class="fas fa-sync-alt"></i>	
								</a>
							</td>
							<td>
								<button type="button" class="btn btn-warning">
									<a href="../controladores/eliminarArtControlador.php?id=<?php echo $key['art_codigo'] ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
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