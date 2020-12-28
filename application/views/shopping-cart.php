	
		<!------------------------------ Start Add Order --------------------------------->
	<div class="container">
		<div class="col-xs-12 col-sm-8">
			<h1 class="page-title" style="margin-top:95px; float:left; font-weight: bold;"> My Order </h1>
			<span class="page-title1" style="margin-top:100px; float:left; font-weight: bold; background-color:#daa520; margin-left:20px;">Take Away</span>
		</div>
		<div class="col-xs-12 col-sm-8">
			<a href="<?php echo base_url(); ?>Menu" ><button type="button" class="btn btn6 btn-default" data-dismiss="modal">ADD ORDER</button></a>
		</div>


		<!------------------------------ End Add Order --------------------------------->

		<!------------------------------ Start Tabel Shopping Cart --------------------------------->

		<div class="col-xs-12 col-sm-12">
			<div class="table-responsive">
				<form action="<?php echo base_url(); ?>Menu/ubah_cart" method="post" name="frmShopping" id="frmShopping" class="form-horizontal" enctype="multipart/form-data">
				<?php 

				if($cart = $this->cart->contents()){

				?>
				<table class="table table-condensed">
					<thead>
				    	<tr>
				    		<th>NOMOR</th>
				    		<th>PRODUCT</th>
				    		<th>DESCRIPTION</th>
				    		<th>UNIT PRICE</th>
				    		<th>QUANTITY</th>
				    		<th>TOTAL</th>
				    		<th>STATUS</th>
				    		<th>KETERANGAN</th>
				    		<th>JAM</th>
				    		<th>REMOVE</th>
				    	</tr>
			    	</thead>
			    	<tbody>
			    		<?php

			    			$total=0;
			    			$jumlahqty=0;
			    			$jumlah=1;

			    			foreach($cart as $item){
			    				$total = $total + $item['subtotal'];
			    				$jumlahqty = $jumlahqty + $item['qty'];	
			    		?>

			    		<input type="hidden" name="cart[<?php echo $item['id']; ?>][id]" value="<?php echo $item['id']; ?>">
			    		<input type="hidden" name="cart[<?php echo $item['id']; ?>][rowid]" value="<?php echo $item['rowid']; ?>">
			    		<input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
			    		<!-- <input type="hidden" name="cart[<?php //echo $item['id']; ?>][price]" value="<?php //echo $item['price']; ?>"> -->
			    		<input type="hidden" name="cart[<?php echo $item['id']; ?>][name]" value="<?php echo $item['name']; ?>">

			    		<!-- <input type="hidden" name="cart[<?php //echo $item['id']; ?>][img]" value="<?php //echo $item['img']; ?>"> -->
			    		<input type="hidden" name="cart[<?php echo $item['id']; ?>][status]" value="<?php echo $item['status'] ?>">
			    		<input type="text" name="cart[<?php echo $item['id']; ?>][diskon]" value="<?php echo $item['diskon'] ?>">
			    		<input type="hidden" name="cart[<?php echo $item['id']; ?>][keterangan]" value="<?php echo $item['keterangan']; ?>">
			    		<input type="hidden" name="cart[<?php echo $item['id']; ?>][jam]" value="<?php echo $item['jam']; ?>">
			    		<!-- <input type="hidden" name="cart[<?php echo $item['id']; ?>][alamat]" value="<?php echo $item['alamat']; ?>"> -->
 
				    	<tr>
				    		<td><?php echo $jumlah++ ?></td>
				    		<td align="center"><img src="<?php echo base_url() . 'image/product/'.$item["img"]; ?>" class="img-responsive" alt="Responsive image"></td>
				    		<td align="center"><?php echo $item['name']; ?></td>
				    		<td align="center">Rp <?php echo number_format($item['price'],0,",","."); ?></td>
				    		<td align="center" style="width:50px;">
				    			<div class="quantity1">
				    				<input type="number" min="1" max="10" class="form-control " name="cart[<?php echo $item['id']; ?>][qty]" value="<?php echo $item['qty']; ?>" />	
				    			</div>
				    		</td>
				    		<td align="center">Rp. <?php echo number_format($item['subtotal'],0,",","."); ?></td>
				    		<td align="center"><?php echo $item['status']; ?></td>
				    		<td align="center"><?php echo $item['keterangan']; ?></td>
				    	<?php if(isset($item['jam'])){ ?>
				    		<td align="center"><?php echo $item['jam']; ?></td>
				    	<?php }else{ ?>
				    		<td align="center"><strong> - </strong></td>
				    	<?php } ?>
				    		<td align="center"><a href="<?php echo base_url(); ?>Menu/hapus/<?php echo $item['rowid']; ?>" class="btn btn4 "><i class="glyphicon glyphicon-remove"></i></a></td>
				    	</tr>
				    	<?php } ?>
			    	</tbody>
				</table>
			</div>
		</div>
	


		<!------------------------------ End Tabel Shopping Cart --------------------------------->

		<!------------------------------ Start Shopping Cart Total --------------------------------->

	<div class="container">
		<div class="col-sm-6">
			<h2 style="color:#daa520;"> Cart Total </h2>
				<table class="table table-condensed">
					<tr>
			    		<td class="td1">Jumlah Order</td>
			    		<td class="td2">:</td>
			    		<td class="td3"><?php echo $jumlahqty; ?></td>
			    	</tr>
					<tr>
			    		<td class="td1">Cart Subtotal</td>
			    		<td class="td2">:</td>
			    		<td class="td3">Rp <?php echo number_format($total,0,",","."); ?></td>
			    		<input type="hidden" value="<?php echo $total; ?>" class="total_hidden" >
			    	</tr>
			    	<?php if($item['status']=='delivery'){ ?>
			    	<tr>
			    		<td class="td1">Shipping</td>
			    		<td class="td2">:</td>
			    		<td class="td3 ongkir"></td>
			    	</tr>
			    	<tr>
			    		<td class="td1">Total</td>
			    		<td class="td2">:</td>
			    		<td class="td3 total_cart"></td>
			    	</tr>
			    	<?php } ?>
				</table>
		</div>
					<?php 
				}else{
					echo "<div class='alert alert-info'>
              <strong> Info! </strong> Data Keranjang Masih Kosong </div> ";
				} 
				?>
		<div class="col-sm-6 jarak-button" style="margin-top: 3% !important;">
	            <button class='btn btn6 btn-default'  type="submit">Update Cart</button>
				<a class="btn btn6 btn-default" data-toggle="modal" data-target=".bs-example-modal-sm" class ='btn btn-sm btn-danger'>Kosongkan Cart</a>
		</div>
	</div>
	</form>
		<!------------------------------ End Shopping Cart Total --------------------------------->
		<!------------------------------ Start Model Kosongkan Belanja --------------------------------->
         <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
              <div class="modal-dialog modal-lg" role="document">
                <!-- Modal content-->
                <div class="modal-content">
                  <form method="post" action="<?php echo base_url()?>Menu/hapus/all">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Konfirmasi</h4>
                  </div>
                  <div class="modal-body">
                    <h4>Anda yakin mau mengosongkan Shopping Cart?</h4>
                      
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-sm btn-default">Ya</button>
                  </div>
                  
                  </form>
                </div>
                
              </div>
        </div>
		<!------------------------------- End Modal Kosongkan Belanja -------------------------------------------------> 

		<div class="container">

		<!----------------------------- Start Alamat Pengiriman -------------------------------->

		<div class="col-xs-12 col-sm-6">
			<h1 class="page-title" style=" font-weight: bold;"> Alamat Tujuan Pengiriman </h1>
			<form action="<?php echo base_url(); ?>Shopping_cart/simpan_pesanan" method="post">
				<?php

			    		$total=0;

			    	foreach($cart as $item){
			    		$total = $total + $item['subtotal'];
			    ?>
					<input type="hidden" name="total" value="<?php echo $total ?>" class="total_form">
				<?php } ?>
				<?php if(!$this->session->has_userdata('username')){ ?>
					<div class="form-group form-nama">
				    	<label for="exampleInputEmail1">Nama Penerima :</label>
				    	<input type="text" name="nama_penerima" class="form-control" id="exampleInputEmail1" placeholder="Nama Penerima" required>
				  	</div>
			  	<?php }else{ ?>
				  	<div class="form-group form-nama">
				    	<label for="exampleInputEmail1">Nama Penerima :</label>
				    	<input type="text" class="form-control" id="exampleInputEmail1" disabled="" placeholder="Nama Penerima" required value="<?php echo $this->session->userdata('username'); ?>">
				  	</div>
			  	<?php } ?>

			  	<div class="form-group">
			    	<label for="exampleInputPassword1">No. Handphone :</label>
			    	<input type="text" name="no_telp" class="form-control" id="exampleInputPassword1" placeholder="No. Handphone" required >
			  	</div>

			  	<?php if($item['status']=='delivery'){ ?>

			  	<div class="form-group">
			    	<label for="exampleInputPassword1">Kecamatan :</label>
			    	<select class="form-control kecamatan" onChange="get_kecamatan()" id="kecamatan" name="kecamatan">
			    		<option value="" selected>--PILIH--</option>
			    	<?php foreach($content_kecamatan as $rows){ ?>
			    		<option class="tebet" name="kecamatan" value="<?php echo $rows['kecamatan']; ?>"><?php echo $rows['kecamatan']; ?></option>
			    	<?php } ?>
			    	</select>	
			  	</div>
			  	<div class="form-group">
			    	<label for="exampleInputPassword1">Kelurahan :</label>
			    	<select onChange="get_ongkir()" id="kelurahan_tujuan" name="kelurahan" class="form-control kelurahan" >
			    		<option value="" selected>--PILIH--</option>
			    	<?php foreach($content_kelurahan as $rows){ ?>
			    		<option class="kelurahan_a" name="kelurahan" value="<?php echo $rows['kelurahan']; ?>"><?php echo $rows['kelurahan']; ?></option>
			    	<?php } ?>
			    	</select>	
			  	</div>
			  	<div class="form-group">
			    	<label for="exampleInputPassword1">Alamat :</label>
			    	<textarea type="text" name="alamat" class="form-control" id="exampleInputPassword1" placeholder="Masukan Alamat Penerima" required ></textarea>
			  	</div>
			  	<div class="form-group">
			    	<label for="exampleInputPassword1">Ongkos Kirim  :</label>
			    	<input type="text" name="ongkos_kirim" class="form-control"  id="harga_ongkir">
			  	</div>
			  	<?php } ?>
			  	
			  	<?php

			    		$total=0;

			    	foreach($cart as $item){
			    		$total = $total + $item['subtotal'];
			    ?>

			  	<input type="hidden" name="total_harga" value="<?php echo $total; ?>">
			  <?php } ?>
			  	<div class="checkbox">
			    	<label>
			      		<input class="check1" type="checkbox"> Check me out
			    	</label>
			 	</div>
			 	<button type="submit" class="btn btn7 btn-default">PESAN</button>
		</div>

		<!----------------------------- End Alamat Pengiriman -------------------------------->

		<!----------------------------- Start Metode Pembayaran -------------------------------->

		<div class="col-xs-12 col-md-6">

			<h1 class="page-title" style="font-weight: bold;"> Metode Pembayaran </h1>
			<div class="col-md-6">
				<div class="radio radio1">
					<label>
					<input type="radio" name="optionsRadios" id="optionsRadios1" value="111111111111111">
					<img src="<?php echo base_url(); ?>image/mandiri.png" class="img-responsive" alt="Responsive image">
				  	</label>
				</div><br>
				<div class="radio radio2">
					<label>
				    <input type="radio" name="optionsRadios" id="optionsRadios1" value="222222222222222">
				    <img src="<?php echo base_url(); ?>image/bni.png" class="img-responsive" alt="Responsive image">
				  	</label>
				</div><br>
				<div class="radio radio3">
					<label>
				    <input type="radio" name="optionsRadios" id="optionsRadios1" value="333333333333333">
				    <img src="<?php echo base_url(); ?>image/bca.png" class="img-responsive" alt="Responsive image">
				  	</label>
				</div>
			</div>
			<div class="col-md-6 page-no-rek">
					<h3 class="no-rekening" style="display: none;"> 111111111111111 </h3>
					<h3 class="no-rekening1" style="display: none;"> 222222222222222 </h3>
					<h3 class="no-rekening2" style="display: none;"> 333333333333333 </h3>
			</div>
			</form>
		</div>


		<!----------------------------- End Metode Pembayaran -------------------------------->

	</div>

		

		