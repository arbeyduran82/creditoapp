<!-- Page header -->
<?php
    require_once 'controladores/controladorpaginadorRepaprobado.php';

    $urlGet = $_GET['pagina'];
    echo $urlGet;
    if ($urlGet== null) {
        header('?pagina=1');
    }
?>

<div class="full-box page-header">
			    <h3 class="text-left">
			        <i class="fas fa-hand-holding-usd fa-fw"></i> &nbsp;CREDITOS APROBADOS
			    </h3>
			</div>

			<div class="container-fluid">
			    <ul class="full-box list-unstyled page-nav-tabs">
                    <li>
			            <a  href="<?php echo SERVERURL; ?>solicitar-nuevo/"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO CREDITO</a>
			        </li>
			        <li>
			            <a  href="<?php echo SERVERURL; ?>reporte-solicitudes/?pagina=1"><i class="far fa-calendar-alt"></i> &nbsp; SOLICITUDES</a>
			        </li>
                    <li>
                        <a class="active" href="<?php echo SERVERURL; ?>reporte-creditos-aprobados/?pagina=1"><i class="fas fa-hand-holding-usd fa-fw"></i> &nbsp; APROBADOS</a>
                    </li>
			        <li>
			            <a  href="<?php echo SERVERURL; ?>reporte-finalizados/?pagina=1"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; FINALIZADOS</a>
			        </li>
                    <li>
			            <a  href="<?php echo SERVERURL; ?>reporte-pazysalvo/"><i class="far fa-handshake"></i> &nbsp; PAZ Y SALVO</a>
			        </li>
			        <li>
			            <a href="<?php echo SERVERURL; ?>reporte-buscar-fecha/"><i class="fas fa-search-dollar fa-fw"></i> &nbsp; BUSCAR POR FECHA</a>
			        </li>
			    </ul>
			</div>

            <div class="container-fluid">
				<div class="table-responsive">
					<table class="table table-dark table-sm">
						<thead>
							<tr class="text-center roboto-medium">
								<th>#</th>
								<th>CLIENTE</th>
								<th>FECHA DE ENTREGA</th>
								<th>ESTADO</th>
								<th>MONTO</th>
								</tr>
						</thead>
						<tbody>
						<?php
						error_reporting(0);

						foreach ($Datos as $key) {
						?>
							<tr class="text-center" >
                            <td><?php echo $key["cre_id"]?></td>
							<td><?php echo $key["cli_id"]?></td>
							<td><?php echo $key["cre_fecha"]?></td>
							<td><?php echo $key["cre_estado"]?></td>
							<td><?php echo $key["cre_monto"]?></td>
                                
                                
                    
                            </tr>
                        	<?php } ?>
                        </tbody>
                    </table>

					<form action="<?php echo SERVERURL; ?>controladores/controladorRepaprobados.php/">
						<center><button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; GENERAR REPORTE</button></center>
				    </form>


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