<?php
require_once 'modelos/creditosModelo.php';
error_reporting(0);

?>
<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO CREDITO
    </h3>
</div>

<!--CONTENT-->
<div class="container-fluid">
    <form class="form-neon" action="" method="POST">
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Ingrese numero de cedula!</label>
                        <input type="text" class="form-control" name="txtbusquedac" maxlength="30" required>
                    </div>
                </div>
                <div class="col-12">
                    <p class="text-center" style="margin-top: 40px;">
                        <button type="submit" class="btn btn-raised btn-info"><i class="fas fa-search"></i> &nbsp; BUSCAR</button>
                    </p>
                </div>
            </div>
        </div>
    </form>
</div>

<?php
$busquedaclientes = strtolower($_POST['txtbusquedac']);
/*if (empty($busquedaclientes)) {
    header("location:solicitar-lista/");
}*/
?>
<?php
if ($busquedaclientes == true) {
    $Objbuscarcliente = new creditos();
    $Datos = $Objbuscarcliente->buscarcliente($busquedaclientes);

foreach ($Datos as $key) {
?>
    <div class="container-fluid">
        <form class="form-neon" action="controladores/nuevoCreControlador.php" method="POST">
            <div class="row">
                    
                    <div class="form-group col-md-4">
                        <label class="bmd-label-floating">Documento</label>
                        <input type="text" class="form-control" name="txtdocumentoc" value="<?php echo $key["cli_id"] ?>" maxlength="30" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="bmd-label-floating">Codigo credito</label>
                        <input type="text" class="form-control" name="txtcrecodigo" maxlength="30" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="bmd-label-floating">Fecha</label>
                        <input type="date" class="form-control" name="txtcrefecha" maxlength="30" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="bmd-label-floating">Monto credito</label>
                        <input type="number" class="form-control" name="txtcrevalor" maxlength="30" required>
                    </div>

                    <div class="form-group col-md-3">
                        <label class="bmd-label-floating">Cantidad cuotas</label>
                        <input type="number" class="form-control" name="txtcrecuotas" maxlength="30" required>
                    </div>
                    
                    <div class="form-group col-md-3 content-select">
                    <select style="padding: top 20px;" name="seltasa" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option selected>&nbsp; Tasa de interes &nbsp;</option>
                        <option value="1">1%</option>
                        <option value="2">2%</option>
                        <option value="3">3%</option>
                    </select>
                    </div>

                    <div class="form-group col-md-2 content-select">
                    <select style="padding: top 20px;" name="selestado" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option selected>&nbsp; Estado &nbsp;</option>
                        <option value="aldia">aldia</option>
                        <option value="mora30">Mora 30 dias</option>
                        <option value="mora60">Mora 60 dias</option>
                    </select>
                    </div>

                    <div class="form-group col-md-12">
                        <label class="bmd-label-floating">Observaciones</label>
                        <textarea name="txtobserva" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="form-group col-md-12 content-select">
                    <select style="padding: top 20px;" name="selanalista" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option selected>&nbsp; Seleccionar Analista &nbsp;</option>
                    <?php
                    $Objlistaranalista = new creditos();
                    $Datos1 = $Objlistaranalista->consultasbasicas();
                    foreach ($Datos1 as $key) {
                    ?>  
                    
                        <option value="<?php echo $key["usu_id"] ?>"><?php echo $key["usu_nombre"] ?></option>
                       
                    
                    <?php } ?>
                    </select>
                    </div>
                    
                <div class="col-12">
                        <p class="text-center" style="margin-top: 40px;">
                            <button type="submit" name="btn_newcredito" class="btn btn-raised btn-info"><i class="fas fa-donate"></i> &nbsp; CREAR</button>
                        </p>
                </div>
            </div>
        </form>
    </div>
</div>
<?php } 
} 
?>

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