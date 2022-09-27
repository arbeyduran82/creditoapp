<!-- Page header -->
<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO USUARIO
				</h3>
			</div>
			
			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a class="active" href="<?php echo SERVERURL; ?>usuario-nuevo/"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO USUARIO</a>
					</li>
					<li>
						<a href="<?php echo SERVERURL; ?>usuario-lista/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE USUARIOS</a>
					</li>
					<li>
						<a href="usuario-buscar/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR USUARIO</a>
					</li>
				</ul>	
			</div>
			
			<!-- Content -->
			<div class="container-fluid">
				<form action="../controladores/nuevoUsuControlador.php" class="form-neon" autocomplete="off" method="POST">
					<fieldset>
						<legend><i class="far fa-address-card"></i> &nbsp; Información personal</legend>
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label  class="bmd-label-floating">No Cedula</label>
										<input type="text" pattern="[0-9-]{1,20}" class="form-control" name="txtcedulau"  maxlength="20">
									</div>
								</div>
								
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label class="bmd-label-floating">Nombres</label>
										<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" name="txtnombreu" maxlength="35">
									</div>
								</div>
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label class="bmd-label-floating">Apellidos</label>
										<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" name="txtapellidou" id="usuario_apellido" maxlength="35">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">Teléfono</label>
										<input type="text" pattern="[0-9()+]{8,20}" class="form-control" name="txttelefonou" maxlength="20">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">Dirección</label>
										<input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,190}" class="form-control" name="txtdireccionu"  maxlength="190">
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					<br><br><br>
					<fieldset>
						<legend><i class="fas fa-user-lock"></i> &nbsp; Información de la cuenta</legend>
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">Nombre de usuario</label>
										<input type="text" pattern="[a-zA-Z0-9]{1,35}" class="form-control" name="txtnicku" maxlength="35">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">Email</label>
										<input type="email" class="form-control" name="txtemailu" maxlength="70">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">Contraseña</label>
										<input type="password" class="form-control" name="txtclaveu" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required="" >
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">Repetir contraseña</label>
										<input type="password" class="form-control" name="txtclaveu" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required="" >
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					<br><br><br>
					<fieldset>
						<legend><i class="fas fa-medal"></i> &nbsp; Nivel de privilegio</legend>
						<div class="container-fluid">
							<div class="row">
								<div class="col-12">
									<p><span class="badge badge-info">Administrador</span> Permisos para registrar, actualizar y eliminar</p>
									<p><span class="badge badge-success">Analista</span> Permisos para registrar y actualizar</p>
									<p><span class="badge badge-dark">Cliente</span> Solo permisos para visualizar</p>
									<div class="form-group">
										<select class="form-control" name="selrol">
											<option value="" selected="" disabled="">Seleccione una opción</option>
											<option value="admin">Administrador</option>
											<option value="analista">Analista</option>
											<option value="cliente">Cliente</option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					<p class="text-center" style="margin-top: 40px;">
						<button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; LIMPIAR</button>
						&nbsp; &nbsp;
						<button type="submit" name="btn_newusuario" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; GUARDAR</button>
					</p>
				</form>
			</div>