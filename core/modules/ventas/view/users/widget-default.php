<div id="content">
	<section class="bg-mix py-3">
		<div class="container">
			<div class="card rounded-0">
				<div class="card-body">
					<div class="row">
						<div class="mx-auto">
							
							<h1>Lista de Usuarios</h1>
						</div>
						<div>
						<a href="index.php?view=newuser" class="btn btn-primary"><i class='glyphicon glyphicon-user'></i> Nuevo Usuario</a>
						</div>
						<?php
		/*
		$u = new UserData();
		print_r($u);
		$u->name = "Agustin";
		$u->lastname = "Ramos";
		$u->email = "evilnapsis@gmail.com";
		$u->password = sha1(md5("l00lapal00za"));
		$u->add();


		$f = $u->createForm();
		print_r($f);
		echo $f->label("name")." ".$f->render("name");
		*/
		?>
		<?php

		$users = UserData::getAll();
		if(count($users)>0){
			// si hay usuarios
			?>
			<table class="table table-bordered table-hover">
				<thead>
					<th>Nombre completo</th>
					<th>Nick</th>
					<th>Email</th>
					<th>Activo</th>
					<th>Admin</th>
					<th>Accion</th>
				</thead>
				<?php
				foreach($users as $user){
					?>
					<tr>
						<td><?php echo $user->name." ".$user->lastname; ?></td>
						<td><?php echo $user->email; ?></td>
						<td><?php echo $user->username; ?></td>
						<td>
							<?php if($user->is_active):?>
								<i class="iconify" data-icon="ion:checkmark-sharp"></i>
							<?php endif; ?>
						</td>
						<td>
							<?php if($user->is_admin):?>
								<i class="iconify" data-icon="ion:checkmark-sharp"></i>
							<?php endif; ?>
						</td>
						<td style="width:30px;"><a href="index.php?view=edituser&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs"><i class="iconify" data-icon="ion:pencil-outline"></i></a></td>
					</tr>
					<?php

				}



			}else{
			// no hay usuarios
			}


			?>
		</div>
	</table>
</div>
</div>
</div>
</div>
</section>
</div>