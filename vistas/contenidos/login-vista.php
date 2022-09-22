<div class="login-container">
	<div class="login-content">
		<p class="text-center">
			<i class="fas fa-user-lock fa-5x"></i>
		</p>
		<p class="text-center">
			No dudamos que eres tú! <br> pero es mejor confirmarlo :)
		</p>
		<form action="<?php echo SERVERURL?>controladores/usuarioControlador.php" method="POST">
			<div class="form-group">
				<label for="UserName" class="bmd-label-floating"><i class="fas fa-user"></i> &nbsp; Usuario</label>
				<input type="text" class="form-control" name="txtusuario" pattern="[a-zA-Z0-9]{1,35,@}" maxlength="50" required="">
			</div>
			<div class="form-group ">
				<label for="UserPassword" class="bmd-label-floating"><i class="fas fa-key"></i> &nbsp; Contraseña</label>
				<input type="password" class="form-control" name="txtpassword" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required="">
			</div>

			<div class="form-group">
				<label class="bmd-label-floating"><i class="fas fa-sort"></i> &nbsp; Seleccionar perfil</label>
				<div class="row justify-content-center">
					<div class="col-md-10">
						<select class="form-control fadeIn third" name="txtrol" required>
							<option value="" select="selected">Opciones</option>
							<option value="admin">Administrador</option>
							<option value="auxiliar">Analista</option>
							<!--<option value="medico">Cliente</option> -->
						</select>
					</div>
				</div>

				<button type="submit" class="btn-login text-center" name="ingresar">Entra</button>
		</form>
	</div>
</div>