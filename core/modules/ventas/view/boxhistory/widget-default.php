<div id="content">
	<section class="bg-mix py-3">
		<div class="container">
			<div class="card rounded-0">
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<!-- Single button -->
							<center><h1><i class='text bg-primary'></i> Historial de Caja</h1></center>
							<div class="clearfix"></div>


							<?php
							$boxes = BoxData::getAll();
							$products = SellData::getSellsUnBoxed();
							if(count($boxes)>0){
								$total_total = 0;
								?>
								<br>
								<table class="table table-bordered table-hover	">
									<thead>
										<th></th>
										<th>Total</th>
										<th>Fecha</th>
									</thead>
									<?php foreach($boxes as $box):
										$sells = SellData::getByBoxId($box->id);

										?>

										<tr>
											<td style="width:30px;">
												<a href="./index.php?view=b&id=<?php echo $box->id; ?>" class="btn btn-default btn-xs"><i class="iconify" data-icon="ion:eye"></i></a>			
											</td>
											<td>

												<?php
												$total=0;
												foreach($sells as $sell){
													$operations = OperationData::getAllProductsBySellId($sell->id);
													foreach($operations as $operation){
														$product  = $operation->getProduct();
														$total += $operation->q*$product->price_out;
													}
												}
												$total_total += $total;
												echo "<b>$ ".number_format($total,2,".",",")."</b>";

												?>			

											</td>
											<td><?php echo $box->created_at; ?></td>
										</tr>

									<?php endforeach; ?>

								</table>
								<center><h3>Total: <?php echo "$ ".number_format($total_total,2,".",","); ?></h3>
								<a href="index.php?view=box" class="btn btn-lg btn-danger"><i class="glyphicon glyphicon-remove"></i> Volver</a></center>
								<?php
							}else {

								?>
								<div class="jumbotron">
									<h2>No hay ventas</h2>
									<p>No se ha realizado ninguna venta.</p>
								</div>

							<?php } ?>
							<br><br><br><br><br><br><br><br><br><br>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

