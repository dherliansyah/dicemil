
	<div class="container">

				<!------------------------------- Start Lokasi Dicemil ---------------------------------->

	  			
					<div class="col-xs-12 ss">
				  		<span class="glyphicon glyphicon-map-marker" aria-hidden="true"><h2> Dicemil </h2></span>
				  			<div class="p-right"><p>Restaurant hours. Local menus. Catering options.<br> Find burgers, chicken sandwiches, milkshakes and more.</p></div>
				  			<div class="button-right"><button type="button" class="btn btn2 btn-default btn-lg" data-toggle="modal" data-target="#myModal">
			  					Find Lokasi
								</button>
				 			</div>
				 	</div>
				

				<!------------------------------- End Lokasi Dicemil ---------------------------------->

				<!------------------------------- Start Menu Dicemil ---------------------------------->
			
				<?php if(count($content_producttt)>0){ ?>
					<?php foreach($content_producttt as $rows){ ?>
						<div class="col-xs-12 col-md-6">
  							<div class="menu_l">
  								<img src="<?php echo base_url(); ?>image/<?php echo $rows["gambar_product"]; ?>">
								<p><strong><?php echo $rows["nama_product"]; ?></strong><br><br><?php echo $rows["description_product"]; ?></p>
								<?php 
									$disc=0;
									if(isset($_SESSION["username"])){ 
								 	foreach($laporan_diskon as $menu){ 
								?>
							
							
								<?php
                            		if($menu['status'] == 1 && $menu['kategori_diskon'] == $get_user->gender ){
                            			$disc+=($menu["diskon"]/100)*$rows["harga_product"];
										echo '<span class="rupiah" style="text-decoration: line-through red; color: #fff; ">IDR '.number_format($rows["harga_product"],0,',','.'),'</span>&nbsp;&nbsp;';
										echo '<span style="font-weight:bold; color:red; border-style:solid;">Disc ',$menu['diskon'],'%','</span>';

								?><?php } elseif ($menu['status'] == 1 && date('Y-m-d') == $get_user->tanggal_lahir ){
										$disc+=($menu["diskon"]/100)*$rows["harga_product"];
										echo '<span class="rupiah" style="text-decoration: line-through red; color: #fff; ">IDR '.number_format($rows["harga_product"],0,',','.'),'</span>&nbsp;&nbsp;';
										echo '<span style="font-weight:bold; color:red; border-style:solid;">Disc ',$menu['diskon'],'%','</span>';
								}
									// }
								
									$disc+=0*$rows["harga_product"];
								}
								
									
							?><br>
							<?php $hargadisc = number_format(($rows["harga_product"]-$disc),0,",","."); ?>
										
								<div class="btn-group btn-order">
									<button type="button" class="btn btn4 btn-default"><?php echo 'IDR  '.$hargadisc.',-'; ?></button>
									<button type="button" class="btn btn4 btn-default" data-toggle="modal" data-target="#myModal1<?php echo $rows['id_product']; ?>">
								  	ORDER NOW
									</button>
								</div>
							<?php }else{ ?>
									<?php 
										$disc=0*$rows["harga_product"];
										$hargadisc = number_format(($rows["harga_product"]-$disc),0,",",".");
									?>
									<div class="btn-group btn-order">
										<button type="button" class="btn btn4 btn-default"><?php echo 'IDR '.number_format($rows["harga_product"],0,',','.'); ?></button>
										<button type="button" class="btn btn4 btn-default" data-toggle="modal" data-target="#myModal1<?php echo $rows['id_product']; ?>">
								  		ORDER NOW
										</button>
									</div>
							<?php } ?>

							
							</div>
  						</div>
  				<?php } } ?>
  	</div>

  			<!------------------------------- End Menu Dicemil ---------------------------------->