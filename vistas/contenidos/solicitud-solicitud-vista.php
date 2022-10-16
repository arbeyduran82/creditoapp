<?php
    require_once 'controladores/paginadorCreControler.php';

    $urlGet = $_GET['pagina'];
    echo $urlGet;
    if ($urlGet = false) {
        header('Location:solicitud-solicitud?pagina=1');
    }
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