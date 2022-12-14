<!-- Page header -->
<?php
require_once 'modelos/articulosModelo.php';
error_reporting(0);

?>
<div class="full-box page-header">
                <h3 class="text-left">
                    <i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR ARTICULO
                </h3>
            </div>

            <div class="container-fluid">
                <ul class="full-box list-unstyled page-nav-tabs">
                    <li>
                        <a href="<?php echo SERVERURL; ?>articulo-nuevo/"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR ARTICULO</a>
                    </li>
                    <li>
                        <a href="<?php echo SERVERURL; ?>articulo-lista/?pagina=1"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE ARTICULOS</a>
                    </li>
                    <li>
                        <a class="active" href="<?php echo SERVERURL; ?>articulo-buscar/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR ARTICULOS</a>
                    </li>
                </ul>
            </div>
            
            <?php

$busquedaarticulos=strtolower($_REQUEST['busqueda-articulos']);
if(empty($busquedaarticulos)){
  header("location:../articulo-lista/?pagina=1");
}

?>

            <!--CONTENT-->
            <div class="container-fluid">
                <form class="form-neon" action="" method="POST">
                    <div class="container-fluid">
                        <div class="row justify-content-md-center">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="inputSearch" class="bmd-label-floating">¿Qué articulo estas buscando?</label>
                                    <input type="number" class="form-control" name="busqueda-articulos" value="<?php echo $busquedaarticulos;?>" id="inputSearch" maxlength="30">
                                </div>
                            </div>
                            <div class="col-12">
                                <p class="text-center" style="margin-top: 40px;">
                                    <button type="submit" name="" class="btn btn-raised btn-info"><i class="fas fa-search"></i> &nbsp; BUSCAR</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="container-fluid">
                <form action="">
                    <input type="hidden" name="eliminar-busqueda" value="eliminar">
                    <div class="container-fluid">
                        <div class="row justify-content-md-center">
                            <div class="col-12 col-md-6">
                                <p class="text-center" style="font-size: 20px;">
                                    Resultados de la busqueda <strong>"<?php echo $busquedaarticulos; ?>"</strong>
                                </p>
                            </div>
                            <div class="col-12">
                                <p class="text-center" style="margin-top: 20px;">
						&nbsp; &nbsp;
                                    <button type="submit" class="btn btn-raised btn-danger"><i class="far fa-trash-alt"></i> &nbsp; ELIMINAR BÚSQUEDA</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <?php
if ($busquedaarticulos == true) {
    $Objbuscararticulos = new producto();
	$Datos = $Objbuscararticulos->buscararticulos($busquedaarticulos);

foreach ($Datos as $key) {
?>
            <div class="container-fluid">
				<div class="table-responsive">
					<table class="table table-dark table-sm">
                        <thead>
                            <tr class="text-center roboto-medium">
                                <th>#</th>
                                <th>CÓDIGO</th>
                                <th>NOMBRE</th>
                                <th>STOCK</th>
                                <th>DETALLE</th>
                                <th>ACTUALIZAR</th>
                                <th>ELIMINAR</th>
                            </tr>
                        </thead>
                        <tbody>
                        
							<tr class="text-center" >
                            <td><?php echo $key["art_id"]?></td>
							<td><?php echo $key["art_codigo"]?></td>
							<td><?php echo $key["art_nombre"]?></td>
							<td><?php echo $key["art_stock"]?></td>
							<td><?php echo $key["art_detalle"]?></td>
							<td>
								<a href="<?php echo SERVERURL; ?>usuario-actualizar/" class="btn btn-success">
	  								<i class="fas fa-sync-alt"></i>	
								</a>
							</td>
							<td>
								<button type="button" class="btn btn-warning">
									<a href="../controladores/eliminarArtControlador.php?id=<?php echo $key['art_codigo'] ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
								</button>	
							</td>
							</tr>
							<?php } } ?>
                        </tbody>
                    </table>
				</div>
				
			</div>