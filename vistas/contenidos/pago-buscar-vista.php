<!-- Page header -->
<?php
require_once 'modelos/pagosModelo.php';
error_reporting(0);
?>
<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR PAGO
				</h3>
			</div>
			
			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a href="<?php echo SERVERURL; ?>pago-nuevo/"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO PAGO</a>
					</li>
					<li>
						<a href="<?php echo SERVERURL; ?>pago-lista/?pagina=1"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE PAGOS</a>
					</li>
					<li>
						<a class="active" href="<?php echo SERVERURL; ?>pago-buscar/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR PAGO</a>
					</li>
				</ul>	
			</div>
			
			<?php
$busquedapago=strtolower($_REQUEST['busqueda-pagos']);
if(empty($busquedapago)){
  header("location:../pago-lista/?pagina=1");
}

?>

			<!-- Content -->
			<div class="container-fluid">
				<form class="form-neon" action="" method="POST">
					<div class="container-fluid">
						<div class="row justify-content-md-center">
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="inputSearch" class="bmd-label-floating">¿Qué pago estas buscando?</label>
									<input type="text" class="form-control" name="busqueda-pagos" id="inputSearch" maxlength="30">
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
			
			<div class="container-fluid">
				<form action="">
					<input type="hidden" name="eliminar-busqueda" value="eliminar">
					<div class="container-fluid">
						<div class="row justify-content-md-center">
							<div class="col-12 col-md-6">
								<p class="text-center" style="font-size: 20px;">
									Resultados de la busqueda <strong>"<?php echo $busquedapago; ?>"</strong>
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
if ($busquedapago == true) {
    $Objbuscarpagos = new pago();
	$Datos = $Objbuscarpagos->buscarpagos($busquedapago);

foreach ($Datos as $key) {
?>
			<div class="container-fluid">
				<div class="table-responsive">
					<table class="table table-dark table-sm">
						<thead>
							<tr class="text-center roboto-medium">
								<th>#</th>
								<th>TOTAL PAGO</th>
								<th>FECHA PAGO</th>
								<th>CODIGO CREDITO</th>
								<th>ACTUALIZAR</th>
								<th>ELIMINAR</th>
							</tr>
						</thead>
						<tbody>
						
							<tr class="text-center" >
							<td><?php echo $key["pag_id"]?></td>
							<td><?php echo $key["pag_total"]?></td>
							<td><?php echo $key["pag_fecha"]?></td>
							<td><?php echo $key["cre_codigo"]?></td>
							<td>
								<a href="<?php echo SERVERURL; ?>usuario-actualizar/" class="btn btn-success">
	  								<i class="fas fa-sync-alt"></i>	
								</a>
							</td>
							<td>
								<button type="button" class="btn btn-warning">
									<a href="../controladores/eliminarPagControlador.php?id=<?php echo $key['pag_id'] ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
								</button>	
							</td>
							</tr>
							<?php } } ?>
							
						</tbody>
					</table>
				</div>

			</div>