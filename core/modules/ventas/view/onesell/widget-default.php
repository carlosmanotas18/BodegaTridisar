<div id="content">
	<section class="bg-mix py-3">
		<div class="container">
			<div class="card rounded-0">
				<div class="card-body">
					<h1>Resumen de Venta</h1>
					<?php if(isset($_GET["id"]) && $_GET["id"]!=""):?>
						<?php
						$sell = SellData::getById($_GET["id"]);
						$operations = OperationData::getAllProductsBySellId($_GET["id"]);
						$total = 0;
						?>
						<?php
						if(isset($_COOKIE["selled"])){
							foreach ($operations as $operation) {
//		print_r($operation);
								$qx = OperationData::getQYesF($operation->product_id);
		// print "qx=$qx";
								$p = $operation->getProduct();
								if($qx==0){
									echo "<p class='alert alert-danger'>El producto <b style='text-transform:uppercase;'> $p->name</b> no tiene existencias en inventario.</p>";			
								}else if($qx<=$p->inventary_min/2){
									echo "<p class='alert alert-danger'>El producto <b style='text-transform:uppercase;'> $p->name</b> tiene muy pocas existencias en inventario.</p>";
								}else if($qx<=$p->inventary_min){
									echo "<p class='alert alert-warning'>El producto <b style='text-transform:uppercase;'> $p->name</b> tiene pocas existencias en inventario.</p>";
								}
							}
							setcookie("selled","",time()-18600);
						}

						?>
						<table class="table table-bordered">
							<?php if($sell->person_id!=""):
								$client = $sell->getPerson();
								?>
								<tr>
									<td style="width:150px;">Cliente</td>
									<td><?php echo $client->name." ".$client->lastname;?></td>
								</tr>

							<?php endif; ?>
							<?php if($sell->user_id!=""):
								$user = $sell->getUser();
								?>
								<tr>
									<td>Atendido por</td>
									<td><?php echo $user->name." ".$user->lastname;?></td>
								</tr>
							<?php endif; ?>
						</table>
						<br><table class="table table-bordered table-hover">
							<thead>
								<th>Codigo</th>
								<th>Cantidad</th>
								<th>Nombre del Producto</th>
								<th>Precio Unitario</th>
								<th>Total</th>

							</thead>
							<?php
							foreach($operations as $operation){
								$product  = $operation->getProduct();
								?>
								<tr>
									<td><?php echo $product->id ;?></td>
									<td><?php echo $operation->q ;?></td>
									<td><?php echo $product->name ;?></td>
									<td>$ <?php echo number_format($product->price_out,2,".",",") ;?></td>
									<td><b>$ <?php echo number_format($operation->q*$product->price_out,2,".",",");$total+=$operation->q*$product->price_out;?></b></td>
								</tr>
								<?php
							}
							?>
						</table>
						<br><br><h1>Total: $ <?php echo number_format($total,2,'.',','); ?></h1>
						<center><a href="javascript:history.back(-1);" class="btn btn-primary ">Volver <i class="fa fa-arrow-right"></i></a></center>
						<?php

						?>	
						<?php else:?>
							501 Internal Error
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
	</div>

