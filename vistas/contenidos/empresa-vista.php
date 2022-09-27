            <!-- Page header -->
            <div class="full-box page-header">
                <h3 class="text-left">
                    <i class="fas fa-building fa-fw"></i> &nbsp; INFORMACÓN DE LA EMPRESA
                </h3>
            </div>

            <!--CONTENT-->
            <div class="container-fluid">
                <form action="controladores/nuevaEmpControlador.php" class="form-neon" autocomplete="off" method="POST">
                    <fieldset>
                        <legend><i class="far fa-building"></i> &nbsp; Información de la empresa</legend>
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
        