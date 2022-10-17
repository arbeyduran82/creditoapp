<?php 
require_once 'modelos/empresaModelo.php';
require_once 'modelos/usuarioModelo.php';
require_once 'modelos/creditosModelo.php';

?>
<!-- Page header -->
<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fab fa-dashcube fa-fw"></i> &nbsp; Inicio
				</h3>
			</div>
			
			<!-- Content -->
			<div class="full-box tile-container">
				<a href="<?php echo SERVERURL; ?>cliente-nuevo/" class="tile">
					<div class="tile-tittle">Clientes</div>
					<div class="tile-icon">
						<i class="fas fa-users"></i>
						<p>5 Registrados</p>
					</div>
				</a>
				
				<a href="<?php echo SERVERURL; ?>articulo-lista/?pagina=1" class="tile">
					<div class="tile-tittle">Articulos</div>
					<div class="tile-icon">
						<i class="fas fa-boxes"></i>
						<p>9 Registrados</p>
					</div>
				</a>

				<a href="<?php echo SERVERURL; ?>solicitud-solicitud?pagina=1" class="tile">
					<div class="tile-tittle">Solicitudes</div>
					<div class="tile-icon">
						<i class="far fa-calendar-alt fa-fw"></i>
						<p>
						<?php
							$objContarfilas = new creditos();
							$Datos = $objContarfilas->contarfilas();
							echo $Datos. " Registros";
						?>
						</p>
					</div>
				</a>

				<a href="<?php echo SERVERURL; ?>solicitud-solicitud?pagina=1" class="tile">
					<div class="tile-tittle">Creditos</div>
					<div class="tile-icon">
						<i class="fas fa-hand-holding-usd fa-fw"></i>
						<p>
						<?php
							$objContarfilas = new creditos();
							$Datos = $objContarfilas->contarfilas();
							echo $Datos. " Registros";
						?>
						</p>
					</div>
				</a>

				<a href="<?php echo SERVERURL; ?>pago-nuevo/" class="tile">
					<div class="tile-tittle">Pagos</div>
					<div class="tile-icon">
					<i class="fas fa-wallet"></i>
						<p>200 Registrados</p>
					</div>
				</a>

				<a href="<?php echo SERVERURL; ?>usuario-lista?pagina=1" class="tile">
					<div class="tile-tittle">Usuarios</div>
					<div class="tile-icon">
						<i class="fas fa-user-secret fa-fw"></i>
						<p>
						<?php
							$objContarfilas = new usuario();
							$Datos = $objContarfilas->contarfilas();
							echo $Datos. " Registros";
						?>
						</p>
					</div>
				</a>

				<a href="<?php echo SERVERURL; ?>empresa/" class="tile">
					<div class="tile-tittle">Empresa</div>
					<div class="tile-icon">
						<i class="fas fa-store-alt fa-fw"></i>
						<p>
							<?php
							$objContarfilas = new empresa();
							$Datos = $objContarfilas->contarfilas();
							echo $Datos. " Registros";
							?>
						</p>
					</div>
				</a>
			</div>