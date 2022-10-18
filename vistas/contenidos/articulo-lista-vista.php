<!-- Page header -->
<?php
    require_once 'controladores/paginadorArtControlador.php';

    $urlGet = $_GET['pagina'];
	echo $urlGet;
    if ($urlGet== null) {
        header('?pagina=1');
    }
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
						foreach ($Datos as $key) {
						?>
							<tr class="text-center" >
							<td><?php echo $key["art_codigo"]?></td>
							<td><?php echo $key["art_nombre"]?></td>
							<td><?php echo $key["art_stock"]?></td>
							<td><?php echo $key["art_detalle"]?></td>
							<td>
								<button type="button" class="btn btn-success">
									<a href="<?php echo SERVERURL; ?>articulo-actualizar/?id=<?php echo $key['art_codigo']?>" class="btn btn-success"><i class="fas fa-sync-alt"></i></a>
								</button>	
							</td>
							<td>
								<button type="button" class="btn btn-warning">
									<a href="<?php echo SERVERURL; ?>controladores/eliminarArtControlador.php?id=<?php echo $key['art_codigo'] ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
								</button>	
							</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
						
			 </div>
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
						

