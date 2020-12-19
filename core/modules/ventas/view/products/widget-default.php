<div id="content">
	<section class="bg-mix py-3">
		<div class="container">
			<div class="card rounded-0">
				<div class="card-body">
					<div class="row">
						<div class="mx-auto">
							
							<h1>Lista de Productos</h1>
						</div>
						<div>
							<a href="index.php?view=newproduct" class="btn btn-primary">Nuevo producto<i class='fa fa-smile-o'></i></a>
						</div>
					</div>
					<br>
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
								<a class="btn btn-sm btn-default" href="<?php echo "index.php?view=products&limit=$limit&page=".($px); ?>"><i class="glyphicon glyphicon-chevron-left"></i> Atras </a>
							<?php endif; ?>

							<?php 
							$px=$page+1;
							if($px<=$npaginas):
								?>
								<a class="btn btn-sm btn-default" href="<?php echo "index.php?view=products&limit=$limit&page=".($px); ?>">Adelante <i class="glyphicon glyphicon-chevron-right"></i></a>
							<?php endif; ?>
						</div>
						<div class="clearfix"></div>
						<table class="table table-bordered table-hover">
							<thead>
								<th>Codigo</th>
								<th>Imagen</th>
								<th>Nombre</th>
								<th>Precio Entrada</th>
								<th>Precio Salida</th>
								<th>Categoria</th>
								<th>Minima</th>
								<th>Activo</th>
								<th>Accion</th>
							</thead>
							<?php foreach($curr_products as $product):?>
								<tr>
									<td><?php echo $product->id; ?></td>
									<td>
										<?php if($product->image!=""):?>
											<img src="storage/products/<?php echo $product->image;?>" style="width:64px;">
										<?php endif;?>
									</td>
									<td><?php echo $product->name; ?></td>
									<td>$ <?php echo number_format($product->price_in,2,'.',','); ?></td>
									<td>$ <?php echo number_format($product->price_out,2,'.',','); ?></td>
									<td><?php if($product->category_id!=null){echo $product->getCategory()->name;}else{ echo "<center>----</center>"; }  ?></td>
									<td><?php echo $product->inventary_min; ?></td>
									<td><?php if($product->is_active): ?><i class="iconify" data-icon="ion:checkmark-sharp"></i><?php endif;?></td>

									<td>

										<a href="index.php?view=editproduct&id=<?php echo $product->id; ?>" class="btn btn-warning"><i class="iconify" data-icon="ion:pencil-outline"></i></a>
										<a href="index.php?view=delproduct&id=<?php echo $product->id; ?>" class="btn btn-danger"><i class="iconify" data-icon="ion:trash-outline"></i></a>
									</td>
								</tr>
							<?php endforeach;?>
						</table>
						<div class="btn-group pull-right">
							<?php

							for($i=0;$i<$npaginas;$i++){
								echo "<a href='index.php?view=products&limit=$limit&page=".($i+1)."' class='btn btn-default btn-sm'>".($i+1)."</a> ";
							}
							?>
						</div>
						<form class="form-inline">
							<label for="limit">Limite</label>
							<input type="hidden" name="view" value="products">
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
					<br><br><br><br><br><br><br><br><br><br>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</section>
</div>


<div class="row">
	
</div>