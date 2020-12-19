<div id="content" class="bg-grey w-100">
	<section class="bg-mix py-3">
		<div class="container">
			<div class="card rounded-0">
				<div class="card-body">
					<div class="row">
						<div class="col-md-7">
							<center><div class="mx-auto">
								<h4 class="font-weight-bold">PROCESO DE VENTA</h4>
								<h5 class="text-muted">Buscar producto por nombre o por codigo:</h5>
								<h6 class="text-success"><i class="icon ion-md-arrow-dropup-circle"></i> Si desea ver la lista completa de los productos, da clic en buscar.</h6>
							</div></center>
						</div>
						<div class="col-md-5">
							<div class="mx-auto">
								<form>
									<div class="col-md-12">
										<input type="hidden" name="view" value="sell">
										<input type="text" name="product" class="form-control">
										<br>
										<center><button type="submit" class="btn btn-primary align-self-center"><i class="icon ion-md-arrow-dropup-circle"></i> Buscar</button></center>
									</div>

								</form>
							</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</section>


		<div class="card-body">
			<?php if(isset($_GET["product"])):?>
				<?php
				$products = ProductData::getLike($_GET["product"]);
				if(count($products)>0){
					?>
					<h3>Resultados de la Busqueda</h3>
					<table class="table table-bordered table-hover">
						<thead>
							<th>Codigo</th>
							<th>Nombre</th>
							<th>Unidad</th>
							<th>Precio unitario</th>
							<th>En inventario</th>
							<th>Cantidad</th>
							<th style="width:100px;"></th>
						</thead>
						<?php
						$products_in_cero=0;
						foreach($products as $product):
							$q= OperationData::getQYesF($product->id);
							?>
							<?php 
							if($q>0):?>

								<form method="post" action="index.php?view=addtocart">
									<tr class="<?php if($q<=$product->inventary_min){ echo "danger"; }?>">
										<td><?php echo $product->id; ?></td>
										<td><?php echo $product->name; ?></td>
										<td><?php echo $product->unit; ?></td>
										<td><b>$<?php echo $product->price_out; ?></b></td>
										<td>
											<?php echo $q; ?>
										</td>
										<td>
											<input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
											<input type="" class="form-control" required name="q" placeholder="Cantidad de producto ..."></td>
											<td style="width:183px;">
												<button type="submit" class="btn btn-primary"><i class="icon ion-md-cart">Agregar</i> </button>
											</td>
										</tr>
									</form>
									<?php else:$products_in_cero++;
										?>
									<?php  endif; ?>
								<?php endforeach;?>
							</table>
							<?php if($products_in_cero>0){ echo "<p class='alert alert-warning'>Se omitieron <b>$products_in_cero productos</b> que no tienen existencias en el inventario. <a href='index.php?module=inventary'>Ir al Inventario</a>"; }?>

							<?php
						}
						?>
						<br><hr>
						<hr><br>
					<?php else:
						?>

					<?php endif; ?>

					<?php if(isset($_SESSION["errors"])):?>
						<h2>Errores</h2>
						<p></p>
						<table class="table table-bordered table-hover">
							<tr class="danger">
								<th>Codigo</th>
								<th>Producto</th>
								<th>Mensaje</th>
							</tr>
							<?php foreach ($_SESSION["errors"]  as $error):
								$product = ProductData::getById($error["product_id"]);
								?>
								<tr class="danger">
									<td><?php echo $product->id; ?></td>
									<td><?php echo $product->name; ?></td>
									<td><b><?php echo $error["message"]; ?></b></td>
								</tr>

							<?php endforeach; ?>
						</table>
						<?php
						unset($_SESSION["errors"]);
					endif; ?>


					<!--- Carrito de compras :) -->
					<?php if(isset($_SESSION["cart"])):
						$total = 0;
						?>
						<h5>Lista de venta</h5>
						<table class="table table-striped">
							<thead>
								<th style="width:30px;">Codigo</th>
								<th style="width:30px;">Cantidad</th>
								<th style="width:30px;">Unidad</th>
								<th style="width: 30px">Producto</th>
								<th style="width:30px;">Precio Unitario</th>
								<th style="width:30px;">Precio Total</th>
								<th ></th>
							</thead>
							<?php foreach($_SESSION["cart"] as $p):
								$product = ProductData::getById($p["product_id"]);
								?>
								<tr >
									<td><?php echo $product->id; ?></td>
									<td ><?php echo $p["q"]; ?></td>
									<td><?php echo $product->unit; ?></td>
									<td><?php echo $product->name; ?></td>
									<td><b>$ <?php echo number_format($product->price_out); ?></b></td>
									<td><b>$ <?php  $pt = $product->price_out*$p["q"]; $total +=$pt; echo number_format($pt); ?></b></td>
									<td style="width:30px;"><a href="index.php?view=clearcart&product_id=<?php echo $product->id; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Cancelar</a></td>
								</tr>

							<?php endforeach; ?>
						</table>

						<form method="post" class="form-horizontal" id="processsell" action="index.php?view=processsell">
							<h2>Resumen</h2>

							<section class="bg-light py-3">
								<div class="container">
									<div class="row">
										<div class="col-lg-6 col-md-8">

											<div class="form-group">
												<label for="inputEmail1" class="col-lg-2 control-label">Cliente</label>
												<div class="col-lg-10">
													<?php 
													$clients = PersonData::getClients();
													?>
													<select name="client_id" class="form-control">
														<option value="">-- NINGUNO --</option>
														<?php foreach($clients as $client):?>
															<option value="<?php echo $client->id;?>"><?php echo $client->name." ".$client->lastname;?></option>
														<?php endforeach;?>
													</select>
												</div>

												<div class="form-group">
													<label for="inputEmail1" class="col-lg-2 control-label">Efectivo</label>
													<div class="col-lg-10">
														<input type="text" name="money" required class="form-control" id="money" placeholder="Efectivo">
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-3 col-md-4 ">
											<table class="table table-bordered">
												<tr>
													<td><p>Subtotal</p></td>
													<td><p><b>$ <?php echo number_format($total*.84); ?></b></p></td>
												</tr>
												<tr>
													<td><p>IVA</p></td>
													<td><p><b>$ <?php echo number_format($total*.16); ?></b></p></td>
												</tr>
												<tr>
													<td><p>Total</p></td>
													<td><p><b>$ <?php echo number_format($total); ?></b></p></td>
												</tr>

											</table>
										</div>
										<div class="col-lg-6 col-md-8">
										<div class="form-group">
											<div class="col-lg-offset-2 col-lg-10">
												<div class="checkbox">
													<label>
														<a href="index.php?view=clearcart" class="btn btn-lg btn-danger"><i class="glyphicon glyphicon-remove"></i> Cancelar</a>
														<button class="btn btn-lg btn-primary"><i class="glyphicon glyphicon-usd"></i><i class="glyphicon glyphicon-usd"></i> Finalizar Venta</button>
													</label>
												</div>
											</div>
										</div>
									</div>
									</div>
								</div>
							</section>


					
								<script>
									$("#processsell").submit(function(e){
										money = $("#money").val();
										if(money<<?php echo $total;?>){
											alert("No se puede efectuar la operacion");
											e.preventDefault();
										}else{
											go = confirm("Cambio: $"+(money-<?php echo $total;?>));
											if(go){}
												else{e.preventDefault();}
										}
									});
								</script>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>