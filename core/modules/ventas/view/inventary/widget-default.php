<div id="content">
	<section class="bg-mix py-3">
		<div class="container">
			<div class="card rounded-0">
				<div class="card-body">
					<div class="row">
					
							<h1><i class="glyphicon glyphicon-stats">
							</i> Inventario de Productos</h1>
						</div>
							<div class="clearfix"></div>


							<?php
							$page = 1;
							if(isset($_GET["page"])){
								$page=$_GET["page"];
							}
							$limit=10;
							if(isset($_GET["limit"]) && $_GET["limit"]!="" && $_GET["limit"]!=$limit){
								$limit=$_GET["limit"];
							}
							$products = ProductData::getAll();
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

								<h6>Pagina <?php echo $page." de ".$npaginas; ?></h6>
								<div class="btn-group pull-right">
									<?php
									$px=$page-1;
									if($px>0):
										?>
										<a class="btn btn-sm btn-default" href="<?php echo "index.php?view=inventary&limit=$limit&page=".($px); ?>"><i class="glyphicon glyphicon-chevron-left"></i> Atras </a>
									<?php endif; ?>

									<?php 
									$px=$page+1;
									if($px<=$npaginas):
										?>
										<a class="btn btn-sm btn-default" href="<?php echo "index.php?view=inventary&limit=$limit&page=".($px); ?>">Adelante <i class="glyphicon glyphicon-chevron-right"></i></a>
									<?php endif; ?>
								</div>
								<div class="clearfix"></div>
								<table class="table table-bordered table-hover">
									<thead>
										<th>Codigo</th>
										<th>Nombre</th>
										<th>Disponible</th>
										<th></th>
									</thead>
									<?php foreach($curr_products as $product):
										$q=OperationData::getQYesF($product->id);
										?>
										<tr class="<?php if($q<=$product->inventary_min/2){ echo "danger";}else if($q<=$product->inventary_min){ echo "warning";}?>">
											<td><?php echo $product->id; ?></td>
											<td><?php echo $product->name; ?></td>
											<td>

												<?php echo $q; ?>

											</td>
											<td style="width:93px;">
												<!--		<a href="index.php?view=input&product_id=<?php echo $product->id; ?>" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-circle-arrow-up"></i> Alta</a>-->
												<a href="index.php?view=history&product_id=<?php echo $product->id; ?>" class="btn btn-s btn-success"><i class="glyphicon glyphicon-time"></i> Historial</a>
											</td>
										</tr>
									<?php endforeach;?>
								</table>
								<div class="btn-group pull-right">
									<?php

									for($i=0;$i<$npaginas;$i++){
										echo "<a href='index.php?view=inventary&limit=$limit&page=".($i+1)."' class='btn btn-default btn-sm'>".($i+1)."</a> ";
									}
									?>
								</div>
								<form class="form-inline">
									<label for="limit">Limite</label>
									<input type="hidden" name="view" value="inventary">
									<input type="number" value=<?php echo $limit?> name="limit" style="width:60px;" class="form-control">
								</form>

								<div class="clearfix"></div>

								<?php
							}else{
								?>
								<div class="jumbotron">
									<h2>No hay productos</h2>
									<p>No se han agregado productos a la base de datos, puedes agregar uno dando click en el boton <b>"Agregar Producto"</b>.</p>
								</div>
								<?php
							}

							?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
