<?php

if(Session::getUID()!=""){
	print "<script>window.location='index.php?view=home';</script>";
}

?>
<br><br>

<div id="login">
	
	<h3 class="text-center text-white pt-5">Bodega TRIDISAR</h3>
	<div class="container">
		<div id="login-row" class="row justify-content-center align-items-center">
			<div id="login-column" class="col-md-6">
				<div id="login-box" class="col-md-12">
					<form id="login-form" role="form" class="form" action="index.php?view=processlogin" method="post">
						<h3 class="text-center text-info">Inicio de sesion</h3>
						<div class="form-group">
							<label for="username" class="text-info">Usuario:</label><br>
							<input type="text" name="mail" id="username" class="form-control">
						</div>
						<div class="form-group">
							<label for="password" class="text-info">Contraseña:</label><br>
							<input type="text" name="password" id="password" class="form-control">
						</div>
						<div class="form-group">
							
							<input type="submit" name="submit" class="btn btn-info btn-md" value="Entrar">
						</div>
						
					</form>
					<div class="col">
						<?php if(isset($_COOKIE['password_updated'])):?>
							<div class="alert alert-success">
								<p><i class='glyphicon glyphicon-off'></i> Se ha cambiado la contraseña exitosamente !!</p>
								<p>Pruebe iniciar sesion con su nueva contraseña.</p>

							</div>
							<?php setcookie("password_updated","",time()-18600);
						endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
