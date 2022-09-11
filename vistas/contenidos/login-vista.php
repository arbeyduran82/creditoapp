<div class="login-container">
		<div class="login-content">
			<p class="text-center">
				<i class="fas fa-user-circle fa-5x"></i>
			</p>
			<p class="text-center">
				No dudamos  que eres tú! <br> pero es mejor confirmarlo :)
			</p>
			<form action="" method="POST" autocomplete="off" >
				<div class="form-group">
					<label for="UserName" class="bmd-label-floating"><i class="fas fa-user"></i> &nbsp; Usuario</label>
					<input type="text" class="form-control" id="UserName" name="txtusuario" pattern="[a-zA-Z0-9]{1,35}" maxlength="35" required="" >
				</div>
				<div class="form-group">
					<label for="UserPassword" class="bmd-label-floating"><i class="fas fa-key"></i> &nbsp; Contraseña</label>
					<input type="password" class="form-control" id="UserPassword" name="txtclave" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required="" >
				</div>
				<button type="submit" class="btn-login text-center">Entra</button>
			</form>
		</div>
	</div>