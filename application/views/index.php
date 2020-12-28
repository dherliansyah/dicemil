
<!DOCTYPE html>
<html>
	<head>
		<title> DICEMIL </title>
		<link rel="shortcut icon" href="<?php echo base_url(); ?>image/Tasty.png">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>css/stylee.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>css/owl.carousel.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>css/owl-carousel-promo.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>css/owl.theme.default.min.css" rel="stylesheet">
	</head>
	<body>
		
		<!------------------------------------ Start Navbar ------------------------------------->
		<div class="header-garis"></div>
		
		<img src="<?php echo base_url(); ?>/image/Tasty.png" class="img-responsive img-index" alt="Responsive image" style="margin:auto !important;">
		
		<nav class="navbar navbar-default navbar-fixed-top" id="navbar" style="margin-top:89px;">
			<div class="container">
	 			<div class="container-fluid">
    			<!-- Brand and toggle get grouped for better mobile display -->
				    <div class="navbar-header">
				    	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      	</button> 
				    </div>
				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				    	<ul class="nav navbar-nav">
				        	<li><a href="<?php echo base_url(); ?>Home">HOME</a></li>
				        	<li class="dropdown dropdown-aa">
					        	<a href="<?php echo base_url(); ?>Menu" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">MAKANAN <span class="caret"></span></a>
					        	<ul class="dropdown-menu">
					        		<?php foreach($content_product as $rows){ ?>
					        			<?php if($rows["keterangan_kategori"] == "MAKANAN"){ ?>
					            			<li><a href="<?php echo base_url(); ?>Menu/Detail/<?php echo $rows["id_kategori"]; ?>"><?php echo $rows["nama_kategori"]; ?></a></li>
					            		<?php } ?>
					            	<?php } ?>
					          	</ul>
        					</li>
				        	<li class="dropdown dropdown-aa">
					        	<a href="<?php echo base_url(); ?>Menu" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">MINUMAN <span class="caret"></span></a>
					        	<ul class="dropdown-menu">
					        		<?php foreach($content_product as $rows){ ?>
					        			<?php if($rows["keterangan_kategori"] == "MINUMAN"){ ?>
					            			<li><a href="<?php echo base_url(); ?>Menu/Detail/<?php echo $rows['id_kategori']; ?>"><?php echo $rows["nama_kategori"]; ?></a></li>
					            		<?php } ?>
					            	<?php } ?>
					          	</ul>
				        	</li>
       						<li><a href="#">ABOUT US</a></li>
				    	</ul>
				      	<ul class="nav navbar-nav navbar-ipad navbar-left">
				      		<li><form  action="<?php echo base_url(); ?>Menu/search" method="post" class="navbar-form navbar-left">
					        		<div class="input-group">
						      			<input name="search" type="text" class="form-control" placeholder="Search for...">
						      			<span class="input-group-btn">
						        			<button class="btn btn1 btn-default" type="submit">Search!</button>
						      			</span>						      			
						    		</div>
					     		</form>
					    	</li>  	
				      	</ul>	
				      	<ul class="nav navbar-nav navbar-ipad navbar-right">
				      		<?php if(!$this->session->has_userdata('username')){ ?>
					      		<li class="logout">
						      		<button type="button" class="btn btn3 btn-lg" data-toggle="modal" data-target=".bs-example-modal-lg">Login
					     	     	</button>	
	                       		</li>
                       		<?php }else{ ?>
					      		<li style="color:#daa520; font-weight: bolder; font-size: 16px; padding-top: 15px;">	
						    		<?php echo "Selamat Datang" ?>
						    		<?php echo $this->session->userdata('username'); ?>
		                            
					     	    </li>
					     	    <li>
					     	    	<a class="logoutsubmit" href="<?php echo base_url(); ?>Home/logoutSubmit"><strong>Log Out</strong></a>
					     		</li>
				     	 	<?php } ?>
				     	     <li>
							 	<button type="button" class="btn hide-button btn3 btn-lg" data-toggle="modal" data-target=".bs-example-modal-lg1">Registrasi
				     	     	</button>
					    	</li>
				      		<li>
				      			<?php

				      			$cart = $this->cart->contents();
				      			$jumlahqty=0;
				      			foreach($cart as $item):
				      				$jumlahqty= $jumlahqty+ $item['qty'];
				      			?>
				      		<?php endforeach; ?>
				     	    	<a href= "<?php echo base_url(); ?>Menu/data_belanja"><span class="glyphicon add-cart glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
				     	    		<span style="color:red; margin-top:20px; margin-top: 17px; background-color: #daa520; color:
				     	    		#800000; font-size: 12px; width:18px; height:17px; text-align: center; position:absolute; top:-2px; border-radius: 50%;"><?php echo $jumlahqty; ?></span></a>
				     	   	</li>
				      	</ul>		
				    </div>
				</div>
 			</div>
		</nav>

		<!------------------------------------ End Navbar ------------------------------------->
		<?php if($content_page == "home"||$content_page == "menu"){ ?>

		<div class="container">

		<div class="row margin1">

			<!------------------------------- Start Slider Utama ---------------------------------->
				<div class="col-xs-12 col-md-6">
					  	<div class="owl-carousel-promo">
							<div> <img src="<?php echo base_url(); ?>image/Dec_-_Jan_Buffer.jpg"></div>
							<div> <img src="<?php echo base_url(); ?>image/LMR-Salu-Salo-2017-Website-10252017.jpg"></div>
							<div> <img src="<?php echo base_url(); ?>image/MEDI_2BAB6E0766F74E32A54B3CA2B816C075_1475638131.jpg"></div>
							<div> <img src="<?php echo base_url(); ?>image/STGILESWEMBLEYPROMO_zps4a2hwfbw.jpg"></div>
							<div> <img src="<?php echo base_url(); ?>image/dscf3691.jpg"></div>
						</div>
				</div>

			<!------------------------------- End Slider Utama ---------------------------------->

			<!------------------------------- Start Form Registrasi ---------------------------------->
				<div class="col-xs-12 col-md-6 hide-regis ">
					<form class="register regis-scroll" action="<?php echo base_url(); ?>Home/registrasi" method="post">
						<label> Nama </label>
							<input type="text" name="nama" placeholder="Masukan User Name Anda" value="<?php echo set_value('nama'); ?>" required>
							<div class="error_registrasi" style="color: red;"> <?php echo form_error('nama'); ?></div>
						<label> Email </label>
							<input type="email" name="email" placeholder="Masukan Email Anda" value="<?php echo set_value('email'); ?>" required><br>
							<div class="error_registrasi" style="color: red;"> <?php echo form_error('email'); ?></div>
						<label> No. Telepon </label>
							<input type="text" name="telepon" placeholder="Masukan Nomor Telepon Anda" value="<?php echo set_value('telepon'); ?>" required>
							<div class="error_registrasi" style="color: red;"> <?php echo form_error('telepon'); ?></div>
						<label> Alamat </label>
							<input type="text" name="alamat" placeholder="Masukan Alamat Anda" value="<?php echo set_value('alamat'); ?>"></textarea>
							<div class="error_registrasi" style="color: red;"> <?php echo form_error('alamat'); ?></div>
						<label> Gender </label>
							<input type="radio" class="radio" name="gender" value="Laki-Laki"><span style="color:#fff; margin-right:40px;">Laki-Laki</span>	
                    		<input type="radio" class="radio" name="gender" value="Perempuan"><span style="color:#fff;">Perempuan</span>
                    	<div class="clear"></div>
                    	<label> Tanggal Lahir </label>
                    		<input type="date" name="tanggal_lahir" value="<?php echo set_value('tanggal_lahir'); ?>" >
						<label> User Name </label>
							<input type="text" name="username" placeholder="Masukan User Name Anda" value="<?php echo set_value('username'); ?>" required>
							<div class="error_registrasi" style="color: red;"> <?php echo form_error('username'); ?></div>
						<label> Password </label>
							<input type="password" class="password" name="password" placeholder="Masukan Passwod Anda" <?php echo set_value('password'); ?> required>
							<input type="password" class="repassword" name="password" placeholder="Confirm Password" required>
							<p class="errorpassword"> Password Tidak Sama </p>              	
						<div class="clear"></div>
						<input type="submit" name="submit" class="regis" value="Registrasi">
					</form>
				</div>
			<!------------------------------- End Form Registrasi ---------------------------------->

			</div>
			</div>
		<?php } ?>

			<!---------------------------------- Start Content ---------------------------->
				
				
					
					<?php

						if(isset($content_page)){
							$this->load->view($content_page);
						}
					?>

				

			<!---------------------------------- End Content ---------------------------->
		

			

	<!------------------------------------ Start Footer Web ---------------------------------->
	<div class="container">
		<div class="row no-margin2">
			<div class="col-xs-4 col-md-4">
				<div class="footer1">
					<h3 style="color:#daa520;"> Opening Hours </h3>
						<table class="table1">
							<tr>
								<td>  Monday - Friday </td>
								<td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;08.00 am-10.00 pm </td>
							</tr>
						</table>
						<hr>
						<table class="table1">
							<tr>
								<td>  Saturday </td>
								<td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;08.00 am-10.00 pm </td>
							</tr>
						</table>
						<hr>
						<table class="table1">
							<tr>
								<td>  Sunday </td>
								<td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;08.00 am-10.00 pm </td>
							</tr>
						</table>
						<hr>
						
				</div>
			</div>

			<div class="col-xs-4 col-md-4">
				<div class="footer2">
					<h3 style="color:#daa520;"> Contact Us </h3><br>
					<address>
						<strong>Dicemil, Inc.</strong><br>
					 		1355 Market Street, Suite 900<br>
					  		Jakarta Selatan, Blok A No.1<br>
					  	<abbr title="Phone">P:</abbr> (123) 456-7890
					</address>

					<address>
						<strong>CAFE DICEMIL</strong><br>
						<a href="<?php echo base_url(); ?>mailto:#">dicemil@gmail.com</a>
					</address>
					<img src="<?php echo base_url(); ?>/image/facebook_square-512.png">
					<img src="<?php echo base_url(); ?>/image/Google-Button-Small.png">
					<img src="<?php echo base_url(); ?>/image/Twitter-icon.png">
				</div>
			</div>
			<div class="col-xs-4 col-md-4">
				<div class="footer3">
					<img src="<?php echo base_url(); ?>/image/Tasty.png" class="img-responsive" alt="Responsive image">
				</div>
			</div>
			<div class="footer4">
				Copyright &copy 2018 Diki Herliansyah
			</div>
		</div>
	</div>

	<!------------------------------------ End Footer Web ---------------------------------->

	<!------------------------------- Start Modal Lokasi --------------------------------->
								<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  		<div class="modal-dialog" role="document">
							    		<div class="modal-content">
						 	     			<div class="modal-header">
						 	       				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  	       					<h4 class="modal-title" id="myModalLabel"> Lokasi Kitchen</h4>
						    	 			</div>
						      				<div class="modal-body">
						        				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.027486642819!2d106.99292821431055!3d-6.260109663030569!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698dd1d4e7b2c1%3A0x96b126571a469e75!2sBekasi+Web+Center!5e0!3m2!1sid!2sid!4v1543392766046" frameborder="0" style="border:0;width:100%; height:450px" allowfullscreen></iframe>
						      				</div>
						      				<div class="modal-footer">
						        				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        				<button type="button" class="btn btn-default">Save changes</button>
						      				</div>
						    			</div>
						 	 		</div>
								</div>
			<!------------------------------- End Modal Lokasi --------------------------------->

					<!---------------------------- Start Modal Registrasi ------------------------->
			<div class="modal fade bs-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
				<div class="modal-dialog modal-regis modal-lg" role="document">
				    <div class="modal-content1">
				    	<div class="modal-body">
				        	<div class="page">
								<div class="row">
									<div class="col-xs-12 col-md-6">
										<form class="register regis-scroll" action="<?php echo base_url(); ?>Home/registrasi_mobile" method="post">
											<label> Nama </label>
												<input type="text" name="nama" placeholder="Masukan User Name Anda" value="<?php echo set_value('nama'); ?>" required>
												<div class="error_registrasi" style="color: red;"> <?php echo form_error('nama'); ?></div>
											<label> Email </label>
												<input type="email" name="email" placeholder="Masukan Email Anda" value="<?php echo set_value('email'); ?>" required><br>
												<div class="error_registrasi" style="color: red;"> <?php echo form_error('email'); ?></div>
											<label> No. Telepon </label>
												<input type="text" name="telepon" placeholder="Masukan Nomor Telepon Anda" value="<?php echo set_value('telepon'); ?>" required>
												<div class="error_registrasi" style="color: red;"> <?php echo form_error('telepon'); ?></div>
											<label> Alamat </label>
												<input type="text" name="alamat" placeholder="Masukan Alamat Anda" value="<?php echo set_value('alamat'); ?>" required></textarea>
												<div class="error_registrasi" style="color: red;"> <?php echo form_error('alamat'); ?></div>
											<label> Gender </label>
												<input type="radio" class="radio" name="gender" value="Laki-Laki"><span style="color:#fff; margin-right:40px;">Laki-Laki</span>	
					                    		<input type="radio" class="radio" name="gender" value="Perempuan"><span style="color:#fff;">Perempuan</span>
					                    	<div class="clear"></div>
					                    	<label> Tanggal Lahir </label>
					                    		<input type="date" name="tanggal_lahir" value="<?php echo set_value('tanggal_lahir'); ?>" >
											<label> User Name </label>
												<input type="text" name="username" placeholder="Masukan User Name Anda" value="<?php echo set_value('username'); ?>" required>
												<div class="error_registrasi" style="color: red;"> <?php echo form_error('username'); ?></div>
											<label> Password </label>
												<input type="password" class="password" name="password" placeholder="Masukan Passwod Anda" <?php echo set_value('username'); ?> required>
												<input type="password" class="repassword" name="password" placeholder="Confirm Password" required>
												<p class="errorpassword"> Password Tidak Sama </p>              	
											<div class="clear"></div>
											<input type="submit" name="submit" class="regis" value="Registrasi">
										</form>
									</div>	
								</div>
							</div>
				    	</div>
				    </div> 
				</div>
			</div>

			<!---------------------------- End Modal Registrasi --------------------------->


			<!---------------------------- Start Modal Login ------------------------------>

			<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
				<div class="modal-dialog modal-lg" role="document">
				    <div class="modal-content1">
				    	<div class="modal-body">
				        	<div class="page">
								<div class="row">
									<div class="col-md-12">
										<div class="container">
									  		<div class="col-md-3 col-xs-12 no-padding hide-mobile">
										    	<div class="left">
				     							 <div class="login">Login</div>
				     							 <div class="eula">By logging in you agree to the ridiculously long terms that you didn't bother to read
				     							 </div>
				   								</div>
			   								</div>
			    							<div class="col-md-5 col-xs-12 no-padding">
												<div class="right">
													<svg viewBox="0 0 320 300">
														<defs>
															<linearGradient
																inkscape:collect="always"
																id="linearGradient"
																x1="13"
																y1="193.49992"
																x2="307"
																y2="193.49992"
																gradientUnits="userSpaceOnUse">
																    <stop
																        style="stop-color:#ff00ff;"
																        offset="0"
																        id="stop876" />
																    <stop
																        style="stop-color:#ff0000;"
																        offset="1"
																        id="stop878" />
															</linearGradient>
														</defs>
												    	<path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
												    </svg>
												    <div class="form">
												    	<form action="<?php echo base_url(); ?>Home/Submit" method="post">
												        <label for="email">Username</label>
												        <input class="aa" name="username" type="text" id="email" required>
												        <label class="aa" for="password">Password</label>
												        <input class="aa" name="password" type="password" id="password" required>
												        <input class="aa" type="submit" id="submit" value="Submit"><p class="info"><?php if(isset($_GET['error2'])){ ?><?php echo 'Username Atau Password Salah'; ?><?php } ?></p>
												        
												        
												    </form>
												    </div>
												    </div>

												</div>
											    <div class="modal-footer">
											      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											    </div>
			    							</div>
									   	</div>
									</div>
								</div>
							</div>
				    	</div>
				    </div> 
				</div>
			</div>

			<!---------------------------- End Modal Login ------------------------------>

			<!------------------------------- Start Modal Upload Struk ----------------------------------->
		<?php if(isset($data_pembayaran)){ ?>
		<?php foreach($data_pembayaran as $rows){ ?>
		<div class="modal fade modal-struk" id="uploadstruk<?php echo $rows->order_id;  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  			<div class="modal-dialog" role="document">
    			<div class="modal-content">
			        <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="exampleModalLabel">Upload Struk</h4>
			        </div>

			        <div class="modal-body">
			        	<form action="<?php echo base_url(); ?>Shopping_cart/Uploadstruk" method="post" enctype="multipart/form-data" >
			        		<input type="hidden" value="<?php echo $rows->order_id; ?>" name="order_id">
			        		<div class="form-group">
					            <label for="recipient-name" class="control-label">Nama Pengirim</label>
					            <input type="text" name="nama_pengirim" class="form-control" id="recipient-name">
			          		</div>
			          		<div class="form-group">
					            <label for="message-text" class="control-label">No Invoice:</label>
					            <input type="text" name="no_invoice" class="form-control" id="recipient-name">
				            </div>
				        	<div class="form-group">
					            <label for="message-text" class="control-label">Jumlah Transfer:</label>
					            <input type="text" name="jumlah_transfer" class="form-control" id="recipient-name">
				            </div>
				            <div class="form-group">
					            <label for="message-text" class="control-label">Upload Struk:</label>
					            <input type="file" name="input_gambar" class="form-control" id="recipient-name">
				            </div>
			        	
			      	</div>
				    <div class="modal-footer">
				        <input type="submit" class="btn btn-default btn7"  name="submit" value="simpan"><br>
				        <input type="button" class="btn btn-default btn7"   data-dismiss="modal" value="tutup">
				    </div>
				    </form>
    			</div>
  			</div>
		</div>
		<?php } } ?>

		<!------------------------------- End Modal Upload Struk ----------------------------------->

		<!------------------------------- Start Modal Pesan ---------------------------------------->
		<?php if(isset($content_detail)){ ?>
		<?php foreach($content_detail as $rows){ ?>
			<div class="modal fade" id="myModal1<?php echo $rows['id_product']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header modal_header1">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h1 class="modal-title1" id="myModalLabel">MULAI PESANAN ANDA</h1>
						</div>
						<div class="modal-body1">
							<div class="col-xs-6 col-md-6">
								<ul class="menu-button">
								    <li class="menu-kiri"> 
								      	<div class="order-fun "><a href="javascript:" class="delivery-trigger"> <img class="delivery" src="<?php echo base_url(); ?>image/logo-delivery-png-1.png"></a> </span></div>
								      	<div class="posisi"> 
								      		<span class="order" > Delivery !</span><br>
								      		<span class="order1" style="color:#daa520;"> Pesanan Akan Segera Tiba<br> Dengan Rapih </span>
								      		</span>
								      	</div>
								    </li>  
								</ul>
							</div>
							<div class="col-xs-6 col-md-6">
								<ul class="menu-button">
								    <li class="menu-kiri"> 
								      	<div class="order-fun "><a href="javascript:" class="takeaway-trigger"><img class="takeaway" src="<?php echo base_url(); ?>image/logo-delivery-png-1.png"></a> </span></div>
								      	<div class="posisi"> 
								      		<span class="order"> Take Away !</span><br>
								      		<span class="order1" style="color:#daa520;"> Pesanan sudah siap dibawa saat<br> anda sampai di outlet </span>
								      		</span>
								      	</div>
								    </li>  
								</ul>
							</div>
							<div class="clear"></div>

							<div class="delivery-box" style="display: none;">
								<div class="col-md-12">
									<ul class="menu1" style="padding-left:0px;">
										<h2 class="info-pemesanan"> KIRIM PESANAN UNTUK SAYA... </h2>
										<div class="col-xs-6 col-md-6">
											<a href="javascript:" name="keterangan_pengiriman" class="info-pemesanan1 delivery-sekarang"> Sekarang </a>
										</div>
										<div class="col-xs-6 col-md-6">
											<a href="javascript:" name="keterangan_pengiriman" class="info-pemesanan1 delivery-nanti"> Nanti </a>
										</div>
									</ul>
								</div>
								<div class="clear"></div>
								<form method="post" action="<?php echo base_url(); ?>Menu/tambah" accept-charset="utf-8">
								<div class="delivery-pengiriman" style="display: none;">
									<div class="col-md-12 jam" >
											<select class="menu-jam" name="jam_pengiriman">
											  <option selected>JAM</option>
											  <option >12.00</option>
											  <option >12.30</option>
											  <option >13.00</option>
											  <option >13.30</option>
											  <option >14.00</option>
											  <option >14.30</option>
											  <option >15.00</option>
											  <option >15.30</option>
											  <option >16.00</option>
											  <option >16.30</option>
											  <option >17.00</option>
											  <option >17.30</option>
											  <option >18.00</option>
											  <option >18.30</option>
											  <option >19.00</option>
											  <option >19.30</option>
											  <option >20.00</option>
											</select>
									</div>
									<div class="clear"></div>
									<div class="col-md-12 checkout">
											
												<fieldset>
													
													<input type="hidden" name="id" value="<?php echo $rows["id_product"]; ?>">
													<input type="hidden" name="nama_product" value="<?php echo $rows["nama_product"]; ?>">
													
													<?php if(isset($_SESSION["username"])){ ?>
													<?php  	
														$disc=0;
														foreach($laporan_diskon as $menu){ 

						                            		if($menu['status'] == 1 && $menu['kategori_diskon'] == $get_user->gender ){
						                            			$disc+=($menu["diskon"]/100)*$rows["harga_product"];
														 } elseif ($menu['status'] == 1 && date('Y-m-d') == $get_user->tanggal_lahir ){
																$disc+=($menu["diskon"]/100)*$rows["harga_product"];
														}
															$disc+=0*$rows["harga_product"];

														} ?>

														<?php }else{  ?>
															<?php $disc=0; ?>
															<input type="hidden" name="harga_product" value="<?php echo $rows["harga_product"]; ?>">
														<?php } ?>




													<!-- <input type="hidden" name="gambar_product" value="<?php //echo $rows["gambar_product"]; ?>"> -->
													<input type="hidden" name="status_pengiriman" value="" class="status_pengiriman">
													<input type="hidden" name="diskon" value="<?= $disc ?>">
													<input type="hidden" name="keterangan_pengiriman" value="" class="keterangan_pengiriman">
													<input type="hidden" name="qty" value="1">
													<input type="submit" name="submit" value="Add to cart" class="button btn0 btn-default checkout-pemesanan" />
												</fieldset>
								</form>
									</div>	
								</div>
							</div>
								
							

						<div class="takeaway-box" style="display: none;">
								<div class="col-md-12">
									<ul class="menu1" style="padding-left:0px;">
										<h2 class="info-pemesanan"> KIRIM PESANAN UNTUK SAYA... </h2>
										<div class="col-xs-6 col-md-6">
											<a href="javascript:" name="keterangan_pengiriman" class="info-pemesanan1 takeaway-sekarang"> Sekarang </a>
										</div>
										<div class="col-xs-6 col-md-6">
											<a href="javascript:" name="keterangan_pengiriman" class="info-pemesanan1 takeaway-nanti"> Nanti </a>
										</div>
									</ul>
								</div>
								<div class="clear"></div>
								<form method="post" action="<?php echo base_url(); ?>Menu/tambah" accept-charset="utf-8">
								<div class="takeaway-pengiriman" style="display:none;">
									<div class="col-md-12 jam">
											<select class="menu-jam" name="jam_pengiriman">  
											  <option selected>JAM</option>
											  <option >12.00</option>
											  <option >12.30</option>
											  <option >13.00</option>
											  <option >13.30</option>
											  <option >14.00</option>
											  <option >14.30</option>
											  <option >15.00</option>
											  <option >15.30</option>
											  <option >16.00</option>
											  <option >16.30</option>
											  <option >17.00</option>
											  <option >17.30</option>
											  <option >18.00</option>
											  <option >18.30</option>
											  <option >19.00</option>
											  <option >19.30</option>
											  <option >20.00</option>
											</select>
									</div>
									<div class="clear"></div>
									<div class="col-md-12 checkout">
											
												<fieldset>	
													<input type="hidden" name="id" value="<?php echo $rows["id_product"]; ?>">
													<input type="hidden" name="nama_product" value="<?php echo $rows["nama_product"]; ?>">
													
													<?php if(isset($_SESSION["username"])){ ?>
													<?php  	
														$disc=0;
														foreach($laporan_diskon as $menu){ 

						                            		if($menu['status'] == 1 && $menu['kategori_diskon'] == $get_user->gender ){
						                            			$disc+=($menu["diskon"]/100)*$rows["harga_product"];
														 } elseif ($menu['status'] == 1 && date('Y-m-d') == $get_user->tanggal_lahir ){
																$disc+=($menu["diskon"]/100)*$rows["harga_product"];
														}
															$disc+=0*$rows["harga_product"];

														} ?>

													<?php }else{ ?>
														<?php $disc=0; ?>
														<input type="hidden" name="harga_product" value="<?php echo $rows["harga_product"]; ?>">														

													<?php } ?>


													
													<input type="hidden" name="status_pengiriman" value="" class="status_pengiriman">
													<input type="hidden" name="diskon" value="<?= $disc ?>">
													<input type="hidden" name="keterangan_pengiriman" value="" class="keterangan_pengiriman">
													<input type="hidden" name="qty" value="1">
													<input type="submit" name="submit" value="Add to cart" class="button btn0 btn-default checkout-pemesanan" />
												</fieldset>
								</form>
									</div>
								</div>
						</div>
							<div class="clear"></div>
						</div>
					</div>
				</div>
			</div>
		<?php } } ?>


			<!---------------------------- End Modal Pesan -------------------------------->

			
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="<?php echo base_url(); ?>js/jquery-3.3.1.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>js/anime.min.js"></script>
		<script src="<?php echo base_url(); ?>js/login.js"></script>

		<script>$('.carousel').carousel({
			  interval: 1800
			})
		</script>

		<script src="<?php echo base_url(); ?>js/owl.carousel.min.js"></script>

		<script> 
			$(document).ready(function(){
				<?php if(isset($_GET['error2'])){ ?> 
					$('.bs-example-modal-lg').modal('show');
				<?php } ?>


			  $(".owl-carousel").owlCarousel({
			  	items:2,
			    loop:true,
			    margin:10,
			    autoplay:true,
			    autoplayTimeout:1000,
			    autoplayHoverPause:true

			  });

			  $(".owl-carousel-promo").owlCarousel({
			  	items:1,
			    loop:true,
			    margin:10,
			    autoplay:true,
			    autoplayTimeout:2000,
			    autoplayHoverPause:true

			  });

			  $('.repassword').focusout(function(){
			  	var password=$('.password').val();
			  	var repassword=$('.repassword').val();

			  	if(password != repassword){
			  		$('.errorpassword').css('display','block');
			  		$('.repassword').val('');
			  	}else{
			  		$('.errorpassword').css('display','none');
			  	}
			  });

			  
			});
		</script>

		<script>
			window.onscroll = function() {scrollFunction()};

			function scrollFunction() {
			  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			    document.getElementById("navbar").style.top = "-60px";
			  } else {
			    document.getElementById("navbar").style.top = "0px";
			  }
			}
		</script>


		<script>
			window.onscroll = function() {scrollFunction()};

			function scrollFunction() {
			  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			    document.getElementById("navbar").style.top = "-60px";
			  } else {
			    document.getElementById("navbar").style.top = "0px";
			  }
			}

			$('.radio1').click(function(){
				$('.no-rekening').css('display','block');
				$('.no-rekening1').css('display','none');
				$('.no-rekening2').css('display','none');
			});

			$('.radio2').click(function(){
				$('.no-rekening').css('display','none');
				$('.no-rekening1').css('display','block');
				$('.no-rekening2').css('display','none');
			});

			$('.radio3').click(function(){
				$('.no-rekening').css('display','none');
				$('.no-rekening1').css('display','none');
				$('.no-rekening2').css('display','block');
			});

			$('.delivery-trigger').click(function(){
				$('.takeaway-box').css('display','none');
				$('.delivery-box').css('display','block');
				$('.delivery').css('background-color','#daa520');
				$('.takeaway').css('background-color','unset');
				$('.status_pengiriman').val('delivery');
			});

			$('.takeaway-trigger').click(function(){
				$('.delivery-box').css('display','none');
				$('.takeaway-box').css('display','block');
				$('.takeaway').css('background-color','#daa520');
				$('.delivery').css('background-color','unset');
				$('.status_pengiriman').val('take_away');
			});

			$('.delivery-sekarang').click(function(){
				$('.jam').css('display','none');
				$('.delivery-pengiriman').css('display','block');
				$('.keterangan_pengiriman').val('sekarang');
				$('.menu-jam').val('-');

			});

			$('.delivery-nanti').click(function(){
				$('.jam').css('display','block');
				$('.delivery-pengiriman').css('display','block');
				$('.keterangan_pengiriman').val('nanti');

			});

			$('.takeaway-sekarang').click(function(){
				$('.jam').css('display','none');
				$('.takeaway-pengiriman').css('display','block');
				$('.keterangan_pengiriman').val('sekarang');
				$('.menu-jam').val('-');
			});

			$('.takeaway-nanti').click(function(){
				$('.jam').css('display','block');
				$('.takeaway-pengiriman').css('display','block');
				$('.keterangan_pengiriman').val('nanti');
			});

			function get_kecamatan(){
			let id_kecamatan = $('#kecamatan').val();
			$.get("<?= site_url('Shopping_cart/get_kecamatan/') ?>"+id_kecamatan,{},(response)=>{
			let output = '<option value="" selected>--PILIH--</option>';
			let kecamatan = response;
			console.log(kecamatan);

			kecamatan.map((val,i)=>{
				output+=`<option value="${val.kelurahan}" >${val.kelurahan}</option>`;
			})

			$('#kelurahan_tujuan').html(output)
		})
	}

			function get_ongkir(){
			let id_kelurahan = $('#kelurahan_tujuan').val();
			$.get("<?= site_url('Shopping_cart/get_ongkir/') ?>"+id_kelurahan,{},(response)=>{
			let output = '';
			let kecamatan = response;
			// alert(kecamatan);
			console.log(kecamatan);

			kecamatan.map((val,i)=>{
				output+=`${val.harga_ongkir}`;
			})

			$('#harga_ongkir').val(output);
			$('.ongkir').html(output);
			var total=parseInt(output)+parseInt($('.total_hidden').val());
			$('.total_cart').html(total);
			$('.total_form').val(total);
		})
	}

		</script>
	</body>
</html>

