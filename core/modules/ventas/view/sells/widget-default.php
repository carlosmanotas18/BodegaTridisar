<div id="content">
	<section class="bg-mix py-3">
		<div class="container">
			<div class="card rounded-0">
				<div class="card-body">
						<div class="mx-auto">
							<div class="row">
								
									<h1><i class='glyphicon glyphicon-shopping-cart'></i> Lista de Ventas</h1>
									<div class="clearfix"></div>
									<?php

									$products = SellData::getSells();

									if(count($products)>0){

										?>
										<br>
										<table class="table table-bordered">
											<thead>
												<th style="width: 50px">Ver detalles</th>
												<th>Codigo</th>
												<th>Total</th>
												<th>Fecha</th>
												<th></th>
											</thead>
											<?php foreach($products as $sell):?>

												<tr>
													<td>
														<a href="index.php?view=onesell&id=<?php echo $sell->id; ?>" class="btn btn-xs btn-default"><i class="iconify" data-icon="ion:eye"></i></a></td>

														<td>

															<?php
															$operations = OperationData::getAllProductsBySellId($sell->id);
															echo $sell->id;

															?>
															<td>


																<?php
																$total=0;
																foreach($operations as $operation){

																	$product  = $operation->getProduct();
																	$total += $operation->q*$product->price_out;
																}
																echo "<b>$ ".number_format($total)."</b>";

																?>			

															</td>
															<td><?php echo $sell->created_at; ?></td>
															<td style="width:30px;"><a href="index.php?view=delsell&id=<?php echo $sell->id; ?>" class="btn btn-xs btn-danger"><i class="iconify" data-icon="ion:trash-outline"></i></a></td>
														</tr>

													<?php endforeach; ?>

												</table>

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
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
			
			</section>
		</div>

