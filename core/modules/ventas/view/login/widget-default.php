<?php

if(Session::getUID()!=""){
	print "<script>window.location='index.php?view=home';</script>";
}

?>
<br><br>

<div class="wrapper fadeInDown">
	<div id="formContent">
		<!-- Tabs Titles -->

		<!-- Icon -->
		<div class="fadeIn first">
			<br>
			<h5 class="underlineHover">SISTEMA DE BODEGA TRIDISAR</h5>
			<hr>
			<img src="assets/img/logo.png" width="60%" alt="User Icon" />
			<br>
			
		</div>

		<!-- Login Form -->
		<form role="form" class="form" action="index.php?view=processlogin" method="post">
			<input type="text" class="fadeIn second" name="mail" id="username" required placeholder="Usuario">
			<input type="password" class="fadeIn third" name="password" id="password" required placeholder="Contraseña">
			<input type="submit" name="submit" value="Entrar" class="fadeIn fourth bg-primary">
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

		<!-- Remind Passowrd -->
		<div id="formFooter">
			<a class="underlineHover" target="blank" href="https://samgos18.github.io/WebLine/">SISTEMA REALIZADO POR LINEWEB UFPS- 2020</a>
		</div>

	</div>
</div>

