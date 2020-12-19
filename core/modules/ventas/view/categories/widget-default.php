<div id="content">
	<section class="bg-mix py-3">
		<div class="container">
			<div class="card rounded-0">
				<div class="card-body">
					<div class="row">
						<div class="mx-auto">
							<h1>Categorias</h1>
							
						</div>
						<div>
							<a href="index.php?view=newcategory" class="btn btn-primary">Nueva categoria<i class='fa fa-smile-o'></i></a>
						</div>
					</div>

					<div class="card rounded-0">
						<div class="card-body">
							<div class="mx-auto">
								<?php

								$users = CategoryData::getAll();
								if(count($users)>0){
			// si hay usuarios
									?>
									<table class="table table-bordered">

										<thead>
											<th>ID</th>
											<th>Nombre</th>
											<th>Accion</th>
										</thead>
										<?php
										foreach($users as $user){
											?>
											<tr>
												<td><?php echo $user->id; ?> </td>
												<td><h6><?php echo $user->name." ".$user->lastname; ?></h6></td>
												<td>

													<a href="index.php?view=editcategory&id=<?php echo $user->id;?>" class="btn btn-warning"><i class="iconify" data-icon="ion:pencil-outline"></i></a>
													<a href="index.php?view=delcategory&id=<?php echo $user->id;?>" class="btn btn-danger"><i class="iconify" data-icon="ion:trash-outline"></i></a>
												</td>
											</tr>
											<?php

										}



									}else{
										echo "<p class='alert alert-danger'>No hay Categorias</p>";
									}


									?>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
</div>
