<?php
    require_once 'modelos/empresaModelo.php';
?>

<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-building fa-fw"></i> &nbsp; INFORMACÓN DE LA EMPRESA
    </h3>
</div>

<!--CONTENT-->
<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-dark table-sm">
            <thead>
                <tr class="text-center roboto-medium">
                    <th>#</th>
                    <th>NOMBRE EMPRESA</th>
                    <th>EMAIL</th>
                    <th>TELÉFONO</th>
                    <th>DIRECCION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $Objlistarempresa = new empresa();
                $Datos = $Objlistarempresa->listarempresa();

                foreach ($Datos as $key) {
                ?>
                    <tr class="text-center">
                        <td><?php echo $key["emp_id"] ?></td>
                        <td><?php echo $key["emp_nombre"] ?></td>
                        <td><?php echo $key["emp_email"] ?></td>
                        <td><?php echo $key["emp_telefono"] ?></td>
                        <td><?php echo $key["emp_direccion"] ?></td>
                        <!--
                        <td>
                            <a href="<?php echo SERVERURL; ?>usuario-actualizar/" class="btn btn-success">
                                <i class="fas fa-sync-alt"></i>
                            </a>
                        </td>
                       <td>
                            <button type="button" class="btn btn-warning">
                                <a href="controladores/eliminarUsuControlador.php?id=<?php echo $key['usu_id'] ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                            </button>
                        </td> -->
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>

</div>

<div class="container-fluid">
    <form action="controladores/nuevaEmpControlador.php" class="form-neon" autocomplete="off" method="POST">
        <fieldset>
            <legend><i class="far fa-building"></i> &nbsp; Registrar Nueva Sede</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Nombre de la empresa</label>
                            <input type="text" pattern="[a-zA-z0-9áéíóúÁÉÍÓÚñÑ. ]{1,70}" class="form-control" name="txtnombree" maxlength="70">
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Correo</label>
                            <input type="email" class="form-control" name="txtemaile" maxlength="70">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Telefono</label>
                            <input type="text" pattern="[0-9()+]{8,20}" class="form-control" name="txttelefonoe" maxlength="20">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Dirección</label>
                            <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,190}" class="form-control" name="txtdireccione" maxlength="190">
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <br><br><br>
        <p class="text-center" style="margin-top: 40px;">
            <button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; LIMPIAR</button>
            &nbsp; &nbsp;
            <button type="submit" name="btn_newempresa" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; GUARDAR</button>
        </p>
    </form>
</div>

<div class="container-fluid">
    <form action="" class="form-neon" autocomplete="off">
        <fieldset>
            <legend><i class="far fa-building"></i> &nbsp;Actualizar Información de la empresa</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Nombre de la empresa</label>
                            <input type="text" pattern="[a-zA-z0-9áéíóúÁÉÍÓÚñÑ. ]{1,70}" class="form-control" name="txtnombree_up" maxlength="70">
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Correo</label>
                            <input type="email" class="form-control" name="txtemaile_up" maxlength="70">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Telefono</label>
                            <input type="text" pattern="[0-9()+]{8,20}" class="form-control" name="txttelefonoe_up" maxlength="20">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Dirección</label>
                            <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,190}" class="form-control" name="txtdireccione_up" maxlength="190">
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <br><br><br>
        <p class="text-center" style="margin-top: 40px;">
            <button type="submit" class="btn btn-raised btn-success btn-sm"><i class="fas fa-sync-alt"></i> &nbsp; ACTUALIZAR</button>
        </p>
    </form>
</div>