<div id="content">

	<section class="bg-mix py-3">
		<div class="container">
			<div class="card rounded-0">
				<div class="card-body">
					<?php
					if(isset($_GET["product_id"])):
						$product = ProductData::getById($_GET["product_id"]);
						$operations = OperationData::getAllByProductId($product->id);
						?>
						<div class="row">
							<div class="col-lg-9 col-md-8">

								<h1><?php echo $product->name;; ?> <small>Historial</small></h1>
							</div>
							<div class="col-lg-2 col-md-4">
								<a href="javascript:history.back(-1);" class="btn btn-primary ">Volver <i class="fa fa-arrow-right"></i></a>
								
							</div>
						</div>

						<div class="row">


							<div class="col-md-4">


								<?php
								$itotal = OperationData::GetInputQYesF($product->id);

								?>
								<div class="jumbotron">
									<center>
										<h3>Entradas</h3>
										<h1><?php echo $itotal; ?></h1>
									</center>
								</div>

								<br>
								<?php
								?>

							</div>

							<div class="col-md-4">
								<?php
								$total = OperationData::GetQYesF($product->id);


								?>
								<div class="jumbotron">
									<center>
										<h3>Disponibles</h3>
										<h1><?php echo $total; ?></h1>
									</center>
								</div>
								<div class="clearfix"></div>
								<br>
								<?php
								?>

							</div>

							<div class="col-md-4">


								<?php
								$ototal = -1*OperationData::GetOutputQYesF($product->id);

								?>
								<div class="jumbotron">
									<center>
										<h3>Salidas</h3>
										<h1><?php echo $ototal; ?></h1>
									</center>
								</div>


								<div class="clearfix"></div>
								<br>
								<?php
								?>

							</div>






						</div>
						<div class="row">
							<div class="col-md-12">
								<?php if(count($operations)>0):?>
									<table class="table table-bordered table-hover">
										<thead>
											
											<th>Cantidad</th>
											<th>Tipo</th>
											<th>Fecha</th>
											<th>Accion</th>
										</thead>
										<?php foreach($operations as $operation):?>
											<tr>
												
												<td><?php echo $operation->q; ?></td>
												<td><?php echo $operation->getOperationType()->name; ?></td>
												<td><?php echo $operation->created_at; ?></td>
												<td style="width:40px;"><a href="#" id="oper-<?php echo $operation->id; ?>" class="btn tip btn-xs btn-danger" title="Eliminar"><i class="iconify" data-icon="ion:trash-bin-outline"></i></a> </td>

												<script>
													$("#oper-"+<?php echo $operation->id; ?>).click(function(){
														x = confirm("Estas seguro que quieres eliminar esto ??");
														if(x==true){
															window.location = "index.php?view=deleteoperation&ref=history&pid=<?php echo $operation->product_id;?>&opid=<?php echo $operation->id;?>";
														}
													});

												</script>
											</tr>
										<?php endforeach; ?>
									</table>
								<?php endif; ?>
							</div>
						</div>

					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

