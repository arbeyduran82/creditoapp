<?php
require_once 'modelos/creditosModelo.php';
?>
<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-sync-alt fa-fw"></i> &nbsp; ACTUALIZAR CR&Eacute;DITO
    </h3>
</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a href="<?php echo SERVERURL; ?>solicitar-nuevo/"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO CR&Eacute;DITO</a>
        </li>

        <li>
            <a href="<?php echo SERVERURL; ?>solicitar-buscar/"><i class="fas fa-search-dollar fa-fw"></i> &nbsp; BUSCAR POR FECHA</a>
        </li>
    </ul>
</div>

<div class="container-fluid">

    <!--CONTENT-->
<?php

$Objseleccionarcredito = new creditos();
$Datos = $Objseleccionarcredito->consultasbasicascreditos();

foreach ($Datos as $key) {
?>
    <div class="container-fluid">
        <form class="form-neon" action="../controladores/actualizarCreControlador.php" method="POST">
            <div class="row">
                     
            <div class="form-group col-md-4">
                        <label class="bmd-label-floating">Id</label>
                        <input type="text" class="form-control" name="txtcre_id" value="<?php echo $key["cre_id"] ?>" maxlength="30" required readonly>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="bmd-label-floating">Documento Cliente</label>
                        <input type="text" class="form-control" name="txtcli_id" value="<?php echo $key["cli_id"] ?>" maxlength="30" required readonly>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="bmd-label-floating">Codigo Cr&eacute;dito</label>
                        <input type="text" class="form-control" name="txtcre_codigo" value="<?php echo $key["cre_codigo"] ?>" maxlength="30" required readonly>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="bmd-label-floating">Fecha</label>
                        <input type="text" class="form-control" name="txtcre_fecha" value="<?php echo $key["cre_fecha"] ?>" maxlength="30" required readonly>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="bmd-label-floating">Monto credito</label>
                        <input type="number" class="form-control" name="txtcre_monto" value="<?php echo $key["cre_monto"] ?>" maxlength="30" required readonly>
                    </div>

                    <div class="form-group col-md-3">
                        <label class="bmd-label-floating">Cantidad cuotas</label>
                        <input type="number" class="form-control" name="txtcre_cuotas" value="<?php echo $key["cre_cuotas"] ?>" maxlength="30" required>
                    </div>

                    <div class="form-group col-md-3">
                        <label class="bmd-label-floating">Total Credito</label>
                        <input type="number" class="form-control" name="txtcre_total" value="<?php echo $key["cre_total"] ?>" maxlength="30" required readonly>
                    </div>

                    <div class="form-group col-md-3">
                        <label class="bmd-label-floating">Total Pagado</label>
                        <input type="number" class="form-control" name="txtcre_pagado" value="<?php echo $key["cre_pagado"] ?>" maxlength="30" required readonly>
                    </div>
                    
                    <div class="form-group col-md-3 content-select">
                    <select style="padding: top 20px;" name="seltasa" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option selected>&nbsp; Tasa de interes &nbsp;</option>
                        <option value="">Interes actual <?php echo $key["cre_tasa"] ?>%</option>
                        <option value="1">1%</option>
                        <option value="2">2%</option>
                        <option value="3">3%</option>
                    </select>
                    </div>

                    <div class="form-group col-md-3 content-select">
                    <select style="padding: top 20px;" name="selestado" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option selected>&nbsp; Estado actual  &nbsp; <?php echo $key["cre_estado"] ?></option>
                        <option value="estudio">En estudio</option>
                        <option value="aprobado">Aprobado</option>
                        <option value="rechazado">Rechazado</option>
                        <option value="aldia">al dia</option>
                        <option value="mora30">Mora 30 dias</option>
                        <option value="mora60">Mora 60 dias</option>
                        <option value="mora90">Mora 90 dias</option>
                        <option value="mora120">Mora 120 dias</option>
                    </select>
                    </div>

                    <div class="form-group col-md-12">
                        <label class="bmd-label-floating">Observaciones</label>
                        <input name="txtobserva" value="<?php echo $key["cre_observacion"] ?>" class="form-control" rows="3"></input>
                    </div>

                    <div class="form-group col-md-3">
                        <label class="bmd-label-floating">Codigo Analista</label>
                        <input type="number" class="form-control" name="txtusu_id" value="<?php echo $key["usu_id"] ?>" maxlength="30" required readonly>
                    </div>
                    
                <div class="col-12">
                    <p class="text-center" style="margin-top: 40px;">
						<button type="submit" class="btn btn-raised btn-success btn-sm" name="btn_actualizar_credito"><i class="fas fa-sync-alt"></i> &nbsp; ACTUALIZAR</button>
					</p>
                </div>
            </div>
        </form>
    </div>
</div>
<?php } 
?>

    <!-- MODAL PAGOS -->
    <div class="modal fade" id="ModalPago" tabindex="-1" role="dialog" aria-labelledby="ModalPago" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalPago">Agregar pago</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-sm">
                            <thead>
                                <tr class="text-center bg-dark">
                                    <th>FECHA</th>
                                    <th>MONTO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td>Fecha</td>
                                    <td>Monto</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="container-fluid">
                        <input type="hidden" name="pago_codigo_reg">
                        <div class="form-group">
                            <label for="pago_monto_reg" class="bmd-label-floating">Monto en $</label>
                            <input type="text" pattern="[0-9.]{1,10}" class="form-control" name="pago_monto_reg" id="pago_monto_reg" maxlength="10" required="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-raised btn-info btn-sm">Agregar pago</button> &nbsp;&nbsp;
                    <button type="button" class="btn btn-raised btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>