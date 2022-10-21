<!-- Page header -->
<?php
require_once 'modelos/clienteModelo.php';
error_reporting(0);
$Clientes_x_pagina =3;
	error_reporting(0);	

    $Objcliente = new Clientes();
    $Contador = $Objcliente-> contarfilasart1();

    //Redondeado arriba
    $Paginas = ceil($Contador / $Clientes_x_pagina);

	$iniciar = 0;
	if (isset($_GET["pagina"]))
	{
		$pagina = $_GET["pagina"];
		$iniciar = ($pagina -1) * $Clientes_x_pagina;
	}

	$Datos = $Objcliente-> listarcliente($iniciar, $Clientes_x_pagina);
?>
<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR CLIENTE
				</h3>
			</div>

			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a href="<?php echo SERVERURL; ?>cliente-nuevo/"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR CLIENTE</a>
					</li>
					<li>
						<a href="<?php echo SERVERURL; ?>cliente-lista"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE CLIENTES</a>
					</li>
					<li>
						<a  href="<?php echo SERVERURL; ?>cliente-buscar/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR CLIENTE</a>
					</li>
					<li>
						<a class="active" href="<?php echo SERVERURL; ?>cliente-inactivos"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE CLIENTES INACTIVOS</a>
					</li>
				</ul>	
			</div>

            <?php
			$busquedacliente=strtolower($_REQUEST['busqueda-clientes']);
if(empty($busquedacliente)){
  header("location:../cliente-lista/");
}
?>
			<!-- Content here-->
			<div class="container-fluid">
			<form action="" method="POST">
					<div class="container-fluid">
						<div class="row justify-content-md-center">
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="inputSearch" class="bmd-label-floating">ingrese el numero del documento del cliente</label>
									
									<input type="number" name="busqueda-clientes"  maxlength="30"value="<?php echo 	$busquedacliente;?>" class="form-control" >
								</div>
								
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
									Resultados de la busqueda <strong>“<?php echo $busquedacliente; ?>”</strong>
								</p>
							</div>
							<div class="col-12">
								<p class="text-center" style="margin-top: 20px;">
									<button type="submit" class="btn btn-raised btn-danger"><i class="far fa-trash-alt"></i> &nbsp; ELIMINAR BÚSQUEDA</button>
								</p>
							</div>
						</div>
					</div>
				</form>
			</div>

			<div class="container-fluid">
				<div class="table-responsive">
					<table class="table table-dark table-sm">
						<thead>
							<tr class="text-center roboto-medium">
								<th>CEDULA</th>
								<th>NOMBRE</th>
								<th>APELLIDO</th>
								<th>TELEFONO</th>
								<th>DIRECCIÓN</th>
								<th>ACTIVAR</th>
								
								</tr>
						</thead>
						<tbody>
	<?php
                    $Objcliente = new Clientes ();
					$Datos = $Objcliente->clienteinactivo($busquedacliente,$iniciar, $Clientes_x_pagina);
					foreach ($Datos as $key) {
					?>
                            <tr class="text-center" >
                            <td><?php echo $key["cli_id"]?></td>
                            <td><?php echo $key["cli_nombre"]?></td>
                            <td><?php echo $key["cli_apellido"]?></td>
                            <td><?php echo $key["cli_telefono"]?></td>
                            <td><?php echo $key["cli_direccion"]?></td>
				            <td><button type="submit" class="btn btn-warning"><a href="<?php echo SERVERURL; ?>controladores/activarClienteControlador.php?id=<?php echo $key['cli_id'] ?>" class="btn btn-success"><i class="fas fa-check"></i></a></button></td>
						</tr>
							<?php } ?>
							
						</tbody>
					</table>
				</div>

					<!-- Inicio Paginador -->
		<div class="container my-5">
			<div class="row">
				<div class="col-md-12">
					<nav aria-label="Page navigation example">
						<ul class="pagination justify-content-center">
						
							<li class="page-item
							<?php echo (!isset($_GET["pagina"]) || (isset($_GET["pagina"]) && $_GET['pagina'] <= 1) ) ? 'disabled' : '' ?>
							">
								<a class="page-link" href="?pagina=<?php echo $_GET['pagina'] - 1 ?>" tabindex="-1">
									Anterior
								</a>
							</li>
							
							<?php for ($i = 0; $i < $Paginas; $i++) : ?>
								<li class="page-item
									<?php echo ((!isset($_GET["pagina"]) && $i == 0) || ( isset($_GET["pagina"]) && $_GET['pagina'] == ($i + 1))) ? 'active' : '' ?>">

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