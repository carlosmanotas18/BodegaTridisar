<div id="content">
	<section class="bg-mix py-3">
		<div class="container">
			<div class="card rounded-0">
				<div class="card-body">
					<div class="row">
						<div class="mx-auto">
							
							<h1>Reabastecimientos</h1>
							<center><a href="index.php?view=re" class="btn btn-primary">Reabastecer</a></center>
						</div>

					</div>

					<div>


						<div class="clearfix"></div>


						<?php
						$products = SellData::getRes();

						if(count($products)>0){
							?>
							<br>
							<table class="table table-bordered table-hover	">
								<thead>
									<th>Ver</th>
									<th>Código</th>
									<th>Total</th>
									<th>Fecha</th>
									<th>Acción</th>
								</thead>
								<?php foreach($products as $sell):?>

									<tr>
										<td style="width:30px;"><a href="index.php?view=onere&id=<?php echo $sell->id; ?>" class="btn btn-xs btn-default"><i class="iconify" data-icon="ion:eye"></i></a></td>

										<td>

											<?php
											$operations = OperationData::getAllProductsBySellId($sell->id);
											echo ($sell->id);
											?>
											<td>

												<?php
												$total=0;
												foreach($operations as $operation){
													$product  = $operation->getProduct();
													$total += $operation->q*$product->price_in;
												}
												echo "<b>$ ".number_format($total)."</b>";

												?>			

											</td>
											<td><?php echo $sell->created_at; ?></td>
											<td style="width:30px;"><a href="index.php?view=delre&id=<?php echo $sell->id; ?>" class="btn btn-xs btn-danger"><i class="iconify" data-icon="ion:trash-outline"></i></a></td>
										</tr>

									<?php endforeach; ?>

								</table>


								<?php
							}else{
								?>
								<div class="jumbotron">
									<h2>No hay datos</h2>
									<p>No se ha realizado ninguna operacion.</p>
								</div>
								<?php
							}

							?>
							<br><br><br><br><br><br><br><br><br><br>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
</div>


<div class="row">
	<div class="col-md-12">
		<h1><i class='glyphicon glyphicon-shopping-cart'></i> Reabastecimientos</h1>
		<div class="clearfix"></div>


		<?php
		$products = SellData::getRes();

		if(count($products)>0){
			?>
			<br>
			<table class="table table-bordered table-hover	">
				<thead>
					<th></th>
					<th>Producto</th>
					<th>Total</th>
					<th>Fecha</th>
					<th></th>
				</thead>
				<?php foreach($products as $sell):?>

					<tr>
						<td style="width:30px;"><a href="index.php?view=onere&id=<?php echo $sell->id; ?>" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-eye-open"></i></a></td>

						<td>

							<?php
							$operations = OperationData::getAllProductsBySellId($sell->id);
							echo count($operations);
							?>
							<td>

								<?php
								$total=0;
								foreach($operations as $operation){
									$product  = $operation->getProduct();
									$total += $operation->q*$product->price_in;
								}
								echo "<b>$ ".number_format($total)."</b>";

								?>			

							</td>
							<td><?php echo $sell->created_at; ?></td>
							<td style="width:30px;"><a href="index.php?view=delre&id=<?php echo $sell->id; ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a></td>
						</tr>

					<?php endforeach; ?>

				</table>


				<?php
			}else{
				?>
				<div class="jumbotron">
					<h2>No hay datos</h2>
					<p>No se ha realizado ninguna operacion.</p>
				</div>
				<?php
			}

			?>
			<br><br><br><br><br><br><br><br><br><br>
		</div>
	</div>