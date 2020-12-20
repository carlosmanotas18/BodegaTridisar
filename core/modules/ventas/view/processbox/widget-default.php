<div id="content" class="bg-grey w-100">
	<section class="bg-mix py-3">
		<div class="container">
			<div class="card rounded-0">
				<div class="card-body">
					<div class="row">
						<?php
						$sells = SellData::getSellsUnBoxed();

						if(count($sells)){
							$box = new BoxData();
							$b = $box->add();
							foreach($sells as $sell){
								$sell->box_id = $b[1];
								$sell->update_box();
							}
							Core::redir("./index.php?view=b&id=".$b[1]);
						}

						?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
