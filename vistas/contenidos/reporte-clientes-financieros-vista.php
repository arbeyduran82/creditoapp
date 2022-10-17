<!-- Page header -->
<?php
    require_once 'controladores/controladorpaginadorRepclientes.php';

    $urlGet = $_GET['pagina'];
    echo $urlGet;
    if ($urlGet== null) {
        header('?pagina=1');
    }
?>
<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fas fa-clipboard-list fa-fw"></i> &nbsp; CLIENTES FINANCIEROS
				</h3>
			</div>
			
			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a href="<?php echo SERVERURL; ?>cliente-nuevo/"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO CLIENTE</a>
					</li>
					<li>
						<a class="active" href="<?php echo SERVERURL; ?>reporte-clientes-financieros/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE CLIENTES</a>
					</li>
					<li>
						<a href="<?php echo SERVERURL; ?>cliente-buscar/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR CLIENTE</a>
					</li>
					
				</ul>	
			</div>

			<div class="container-fluid">
				<div class="table-responsive">
					<table class="table table-dark table-sm">
						<thead>
							<tr class="text-center roboto-medium">
								<th>CEDULA</th>
								<th>NOMBRE</th>
								<th>APELLIDO</th>
								<th>TELÉFONO</th>
								<th>DIRECCION</th>
								
							</tr>
						</thead>
						<tbody>
						<?php
						error_reporting(0);

						foreach ($Datos as $key) {
						?>
							<tr class="text-center" >
							<td><?php echo $key["cli_id"]?></td>
							<td><?php echo $key["cli_nombre"]?></td>
							<td><?php echo $key["cli_apellido"]?></td>
							<td><?php echo $key["cli_telefono"]?></td>
							<td><?php echo $key["cli_direccion"]?></td>
							
							</tr>

							<?php } ?>
							
						</tbody>
						
					</table>
				</div>

				<form action="../controladores/controladorRepclientes.php/">
						<center><button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; GENERAR REPORTE</button></center>
				    </form>

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