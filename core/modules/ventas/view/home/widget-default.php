
<?php
$found=false;
$products = ProductData::getAll();
foreach($products as $product){
	$q=OperationData::getQYesF($product->id);	
	if($q<$product->inventary_min){
		$found=true;
		break;

	}
}
?>


<!-- Page Content -->
<div id="content" class="bg-grey w-100">
	<?php if(Session::getUID()!=""):?>
		<?php 
		$u=null;
		if(Session::getUID()!=""){
			$u = UserData::getById(Session::getUID());
			$user = $u->name." ".$u->lastname;

		}?>
		<?php else:?>
		<?php endif; ?>
		<section class="bg-light py-3">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-md-8">
						<h1 class="font-weight-bold mb-0">Bienvenido <?php echo $user ?></h1>
						<p class="lead text-muted">Este espacio es informativo</p>
					</div>
					<div class="col-lg-3 col-md-4 ">
						<a href="index.php?view=inventary" class="btn btn-primary">Ver el inventario</a>
					</div>
				</div>
			</div>
		</section>

		<section class="bg-mix py-3">
			<div class="container">
				<div class="card rounded-0">
					<div class="card-body">
						<div class="row">
							<div class="col-lg-3 col-md-6 d-flex stat my-3">
								<div class="mx-auto">
									<h6 class="text-muted">Ingresos mensuales</h6>
									<h3 class="font-weight-bold">$50000</h3>
									<h6 class="text-success"><i class="icon ion-md-arrow-dropup-circle"></i> 50.50%</h6>
								</div>
							</div>
							<div class="col-lg-3 col-md-6 d-flex stat my-3">
								<div class="mx-auto">
									<h6 class="text-muted">Productos activos</h6>
									<h3 class="font-weight-bold">100</h3>
									<h6 class="text-success"><i class="icon ion-md-arrow-dropup-circle"></i> 25.50%</h6>
								</div>
							</div>
							<div class="col-lg-3 col-md-6 d-flex stat my-3">
								<div class="mx-auto">
									<h6 class="text-muted">No. de usuarios</h6>
									<h3 class="font-weight-bold">2500</h3>
									<h6 class="text-success"><i class="icon ion-md-arrow-dropup-circle"></i> 75.50%</h6>
								</div>
							</div>
							<div class="col-lg-3 col-md-6 d-flex my-3">
								<div class="mx-auto">
									<h6 class="text-muted">Usuarios nuevos</h6>
									<h3 class="font-weight-bold">500</h3>
									<h6 class="text-success"><i class="icon ion-md-arrow-dropup-circle"></i> 15.50%</h6>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<div class="col-lg-9 col-md-3" >

			
		</div>
		<section class="bg-mix py-3">			
			<div class="container">
				<div class="card rounded-0">
					<div class="card-header bg-light">
						<h5 class="font-weight-bold mb-0">PRODUCTOS CON POCO INVENTARIO</h5>
					</div>
					<div class="card-body">
						<div class="row">
							<?php
							$page = 1;
							if(isset($_GET["page"])){
								$page=$_GET["page"];
							}
							$limit=10;
							if(isset($_GET["limit"]) && $_GET["limit"]!="" && $_GET["limit"]!=$limit){
								$limit=$_GET["limit"];
							}
							if(count($products)>0){

								if($page==1){
									$curr_products = ProductData::getAllByPage($products[0]->id,$limit);
								}else{
									$curr_products = ProductData::getAllByPage($products[($page-1)*$limit]->id,$limit);

								}
								$npaginas = floor(count($products)/$limit);
								$spaginas = count($products)%$limit;

								if($spaginas>0){ $npaginas++;}

								?>

								<div class="dropdown-menu-left">
									<?php
									$px=$page-1;
									if($px>0):
										?>

										<a class="btn btn-sm btn-default" href="<?php echo "index.php?view=home&limit=$limit&page=".($px); ?>"><i class="glyphicon glyphicon-chevron-left"></i> Atras </a>
									<?php endif; ?>

									<?php 
									$px=$page+1;
									if($px<=$npaginas):
										?>
										<a class="btn btn-sm btn-default" href="<?php echo "index.php?view=home&limit=$limit&page=".($px); ?>">Adelante <i class="glyphicon glyphicon-chevron-right"></i></a>
									<?php endif; ?>
								</div>

								<?php
								foreach($curr_products as $product):

									$q=OperationData::getQYesF($product->id);
									?>

									<?php if($q<$product->inventary_min):?>

										<div class="col-lg-3 col-md-6 d-flex stat my-3">
											<div class="mx-auto">
												<h6 class="text-muted">Código</h6>
												<h6 class="font-weight-bold"><?php echo $product->id; ?></h6>

											</div>
										</div>
										<div class="col-lg-3 col-md-6 d-flex stat my-3">
											<div class="mx-auto">
												<h6 class="text-muted">Nombres</h6>
												<h6 class="font-weight-bold"><?php echo $product->name; ?></h6>

											</div>
										</div>
										<div class="col-lg-3 col-md-6 d-flex stat my-3">
											<div class="mx-auto">
												<h6 class="text-muted">Cantidad</h6>
												<h6 class="font-weight-bold"><?php echo $q ?></h6>

											</div>
										</div>
										<div class="col-lg-3 col-md-6 d-flex my-3">
											<div class="mx-auto">
												<h6 class="text-muted">Alerta</h6>
												<h6>
													<?php if($q==0){ echo "<span class='alert-danger'>No hay existencias.</span>";}else if($q<=$product->inventary_min/2){ echo "<span class='alert-warning'>Quedan muy pocas existencias.</span>";} else if($q<=$product->inventary_min){ echo "<span class='alert-info'>Quedan pocas existencias.</span>";} ?>
												</h6>

											</div>
										</div>

									<?php endif;?>

									<?php
								endforeach;
								?>
								<div class="btn-group pull-right">
									<?php

									for($i=0;$i<$npaginas;$i++){
										
									}
									?>
								</div>


								<div class="clearfix"></div>

								<?php
							}else{
								?>

								<?php
							}

							?>
						</div>
					</div>
				</section>


				<section>
					<div class="container">
						<div class="row">
							<div class="col-lg-8 my-3">
								<div class="card rounded-0">
									<div class="card-header bg-light">
										<h6 class="font-weight-bold mb-0">Crecimiento de la empresa</h6>
									</div>
									<div class="card-body">
										<canvas id="myChart" width="300" height="150"></canvas>
									</div>
								</div>
							</div>

							
							<?php

							$products = SellData::getLastSells();

							if(count($products)>0){

								?>
								<br>

								<div class="col-lg-4 my-3">
									<div class="card rounded-0">
										<div class="card-header bg-light">
											<h6 class="font-weight-bold mb-0">Ventas recientes</h6>
										</div>
										<div class="card-body pt-2">

											<div class="d-flex border-bottom py-2">
												<?php foreach($products as $sell):?>
													
													<div class="align-self-center">
														
														<?php
														$operations = OperationData::getAllProductsBySellId($sell->id);

														?>
														<td>


															<?php
															$total=0;
															foreach($operations as $operation){

																$product  = $operation->getProduct();
																$total += $operation->q*$product->price_out;
															}

															?>	

															<i class="icon ion-md-pricetag"></i><h5 class="d-inline-block mb-0"><?php echo $total; ?></h5>

															<span class="badge badge-success ml-2"><?php echo 
															$operation->q ; ?> unidades</span>

															<h5 class="d-block text-success"><?php echo $product->name ; ?> </h5>
															
															
															<br>
														<?php endforeach; ?>

													</div>
												</div>


											</div>
										</div>

									</div>

									<div class="clearfix"></div>

									<?php
								}else{
									?>
									<div class="jumbotron">
										<h2>No hay ventas</h2>
										<p>No se ha realizado ninguna venta.</p>
									</div>
									<?php
								}

								?>


								<a href="index.php?view=sells" class="btn btn-primary">Ver todas las ventas</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

	</div>




