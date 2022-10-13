<?php
require_once 'modelos/creditosModelo.php';
?>

<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="far fa-calendar-alt fa-fw"></i> &nbsp; LISTADO DE CREDITOS
    </h3>
</div>

<div class="container-fluid">
	<ul class="full-box list-unstyled page-nav-tabs">
		<li>
			<a href="<?php echo SERVERURL; ?>solicitar-nuevo/"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO CREDITO</a>
		</li>
		
		<li>
			<a href="<?php echo SERVERURL; ?>solicitar-buscar/"><i class="fas fa-search-dollar fa-fw"></i> &nbsp; BUSCAR POR FECHA</a>
		</li>
	</ul>
</div>

<div class="container-fluid">
    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table table-dark table-sm">
                <thead>
                    <tr class="text-center roboto-medium">
                        <th>CEDULA CLIENTE</th>
                        <th>CODIGO</th>
                        <th>FECHA</th>
                        <th>MONTO</th>
                        <th>TASA INTERES</th>
                        <th>CUOTAS</th>
                        <th>TOTAL ADEUDADO</th>
                        <th>TOTAL PAGADO</th>
                        <th>ESTADO</th>
                        <th>OBSERVACIONES</th>
                        <th>ANALISTA</th>
                        <th>ACTULIZAR</th>
                        <th>ELIMINAR</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $Objlistarempresa = new creditos();
                    $Datos = $Objlistarempresa->listarcreditos();

                    foreach ($Datos as $key) {
                    ?>
                        <tr class="text-center">
                            <td><?php echo $key["cli_id"] ?></td>
                            <td><?php echo $key["cre_codigo"] ?></td>
                            <td><?php echo $key["cre_fecha"] ?></td>
                            <td>$<?php echo $key["cre_monto"] ?></td>
                            <td><?php echo $key["cre_tasa"] ?>%</td>
                            <td><?php echo $key["cre_cuotas"] ?></td>
                            <td>$<?php echo $key["cre_total"] ?></td>
                            <td>$<?php echo $key["cre_pagado"] ?></td>
                            <td><?php echo $key["cre_estado"] ?></td>
                            <td><?php echo $key["cre_observacion"] ?></td>
                            <td><?php echo $key["usu_id"] ?></td>
                           
                        <td>
                            <a href="<?php echo SERVERURL; ?>solicitar-actualizar/?id=<?php echo $key['cre_id'] ?>" class="btn btn-success">
                                <i class="fas fa-sync-alt"></i>
                            </a>
                        </td>
                       <td>
                            <button type="button" class="btn btn-warning">
                                <a href="<?php echo SERVERURL; ?>controladores/eliminarCreControlador.php?id=<?php echo $key['cre_id'] ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                            </button>
                        </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>

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