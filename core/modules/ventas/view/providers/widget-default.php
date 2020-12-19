<div id="content">
	<section class="bg-mix py-3">
		<div class="container">
			<div class="card rounded-0">
				<div class="card-body">
					<div class="row">
							<div class="mx-auto">
							<h1>Lista de proveedores</h1>
							<br>
						</div>
						<div>
							<a href="index.php?view=newprovider" class="btn btn-primary">Nuevo proveedor<i class='fa fa-smile-o'></i></a>
						</div>
							<br>
							<?php

							$users = PersonData::getProviders();
							if(count($users)>0){
			// si hay usuarios
								?>

								<table class="table table-bordered table-hover">
									<thead>
										<th>Nombre completo</th>
										<th>Direccion</th>
										<th>Email</th>
										<th>Telefono</th>
										<th></th>
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
												

												<a href="index.php?view=editprovider&id=<?php echo $user->id;?>" class="btn btn-warning"><i class="iconify" data-icon="ion:pencil-outline"></i></a>
											<a href="index.php?view=delprovider&id=<?php echo $user->id;?>" class="btn btn-danger"><i class="iconify" data-icon="ion:trash-outline"></i></a>

											</td>
										</tr>
										<?php

									}



								}else{
									echo "<p class='alert alert-danger'>No hay proveedores</p>";
								}


								?>


							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

