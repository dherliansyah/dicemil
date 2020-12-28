
	<div class="container">

		<div class="col-xs-12 col-sm-8">
			<h1 class="page-title" style="margin-top:95px; float:left; font-weight: bold;"> My Transaksi </h1>
		</div>

		<!------------------------------ Start Riwayat Transaksi  ------------------------------->

		<div class="col-xs-12 col-sm-12">
			<div class="table-responsive">
				<table class="table table-condensed">
					<thead>
				    	<tr>
				    		<th>NO. TRANSAKSI</th>
				    		<th>TOTAL</th>
				    		<th>STATUS</th>
				    		<th>CETAK</th>
				    	</tr>
			    	</thead>
			    	<tbody>
			    		<?php foreach($data_pembayaran as $rows){ ?>
				    	<tr>
				    		<td align="center">DICEMIL/<?php echo $rows->order_id;  ?></td>
				    		<td align="center">Rp.<?php echo $rows->total; ?></td>
				    		<td align="center"><?php echo $rows->status; ?></td>
				    		<td align="center"><p><a class="btn btn7" href="<?php echo base_url(); ?>Shopping_cart/cetak_invoice/<?php echo $rows->order_id; ?>" role="button" target="_BLANK">CETAKINVOICE</a></p><br>
				    			<p><a class="btn btn7" data-toggle="modal" data-target="#uploadstruk<?php echo $rows->order_id;  ?>" role="button">UPLOAD STRUK</a></p></td>
				    	</tr>
				    <?php } ?>
			    	</tbody>
				</table>
			</div>
		</div>

		<!------------------------------ End Riwayat Transaksi  ------------------------------->

	</div>

			
		


