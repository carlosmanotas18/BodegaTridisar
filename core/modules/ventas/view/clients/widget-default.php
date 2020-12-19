<div id="content">
	<section class="bg-mix py-3">
		<div class="container">
			<div class="card rounded-0">
				<div class="card-body">
					<div class="row">
						<div class="mx-auto">
							<h1>Directorio de Clientes</h1>
							
						</div>
						<div>
							<a href="index.php?view=newclient" class="btn btn-primary">Nuevo Cliente<i class='fa fa-smile-o'></i></a>
						</div>
					</div>
					<?php

					$users = PersonData::getClients();
					if(count($users)>0){
			// si hay usuarios
						?>
						<div class="mx-auto">
							<table class="table table-striped">
								<thead>
									<th>Nombre completo</th>
									<th>Direccion</th>
									<th>Email</th>
									<th>Telefono</th>

									<th>Acción</th>
								</thead>
								<?php
								foreach($users as $user){
									?>
									<tr>
										<td><?php echo $user->name." ".$user->lastname; ?></td>
										<td><?php echo $user->address1; ?></td>
										<td><?php echo $user->email1; ?></td>
										<td><?php echo $user->phone1; ?></td>
										<td>
											<a href="index.php?view=editclient&id=<?php echo $user->id;?>" class="btn btn-warning"><i class="iconify" data-icon="ion:pencil-outline"></i></a>
											<a href="index.php?view=delclient&id=<?php echo $user->id;?>" class="btn btn-danger"><i class="iconify" data-icon="ion:trash-outline"></i></a>
			
										</td>
									</tr>
									<?php

								}



							}else{
								echo "<p class='alert alert-danger'>No hay clientes</p>";
							}


							?>
						</div>

					</div>
				</div>
			</div>
		</div>

	</div>
</div>