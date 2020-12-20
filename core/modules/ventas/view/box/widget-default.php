<div id="content">
	<section class="bg-mix py-3">
		<div class="container">
			<div class="card rounded-0">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-9 col-md-8">
							<h1 class="font-weight-bold mb-0">SECCION DE CAJA</h1>
						</div>
						<div class="col-lg-2 col-md-4 ">
							<a href="index.php?view=boxhistory" class="btn btn-primary">Historial de caja</a>
							</div



							<div class="clearfix"></div>
							<br>
							<center><h4>Historial de las ultimas ventas realizadas </h4></center>
							<?php
							$products = SellData::getSellsUnBoxed();
							if(count($products)>0){
								$total_total = 0;
								?>
								<br>
								<table class="table table-bordered table-hover	">
									<thead>
										<th></th>
										<th>Producto</th>
										<th>Total</th>
										<th>Fecha</th>
									</thead>
									<?php foreach($products as $sell):?>
										
										<tr>
											<td style="width:30px;">

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
															$total += $operation->q*$product->price_out;
														}
														$total_total += $total;
														echo "<b>$ ".number_format($total,2,".",",")."</b>";

														?>			

													</td>
													<td><?php echo $sell->created_at; ?></td>
												</tr>

											<?php endforeach; ?>

										</table>
										<br>


										<center><h3>Total: <?php echo "$ ".number_format($total_total,2,".",","); ?></h3>
											<a href="./index.php?view=processbox" class="btn btn-primary ">Procesar Ventas <i class="fa fa-arrow-right"></i></a></center>

											<?php
										}else {

											?>
											<div class="jumbotron">
												<h1>No hay ventas</h1>
												<br>
												<p>Porfavor, realiza las ventas para el respectivo corte.</p>
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
