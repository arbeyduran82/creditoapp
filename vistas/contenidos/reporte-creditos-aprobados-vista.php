<!-- Page header -->
<?php
require_once 'modelos/reporteModelo.php';

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
			            <a  href="<?php echo SERVERURL; ?>reporte-solicitudes/"><i class="far fa-calendar-alt"></i> &nbsp; SOLICITUDES</a>
			        </li>
                    <li>
                        <a class="active" href="<?php echo SERVERURL; ?>reporte-creditos-aprobados/"><i class="fas fa-hand-holding-usd fa-fw"></i> &nbsp; APROBADOS</a>
                    </li>
			        <li>
			            <a  href="<?php echo SERVERURL; ?>reporte-finalizados/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; FINALIZADOS</a>
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
						$Obj = new Reportes();
						$Datos = $Obj->reporteaprobados();

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

					<form action="../controladores/controladorRepaprobados.php/">
						<center><button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; GENERAR REPORTE</button></center>
				    </form>


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
