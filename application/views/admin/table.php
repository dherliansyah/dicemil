            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Data Seluruh Product</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table id="example" class="display table-responsive" style="width:100%">
                                    <thead>
                                        <th>NO</th>
                                    	<th>IMAGE</th>
                                    	<th>PRODUCT</th>
                                    	<th>PRICE</th>
                                    	<th>MODIFY</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach($product_data as $rows){ ?>
                                        <tr>
                                        	<td><?php echo $rows["id_product"]; ?></td>
                                        	<td><img src="<?php echo base_url(); ?>image/product/<?php echo $rows["gambar_product"]; ?>" width="130" height="100" /></td>
                                        	<td><?php echo $rows["nama_product"]; ?></td>
                                        	<td><?php echo number_format($rows["harga_product"],0,',','.') ?></td>
                                        	<td>
                                                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModaledit<?php echo $rows["id_product"]; ?>">
                                                  Edit
                                                </button>
                                                <a onClick="javascript:return confirm('apakah anda yakin data ber id=<?php echo $rows["id_product"]; ?> ingin dihapus ?');" href="<?php echo base_url(); ?>Table/deleteSubmit/<?php echo $rows["id_product"]; ?>" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModaldelete onclick="return confirm">Delete</a>  
                                                <a onClick="javascript:return confirm('apakah anda yakin data ber id=<?php echo $rows["id_product"]; ?> ingin share email ?');" href="<?php echo base_url(); ?>Table/send/<?php echo $rows["id_product"]; ?>" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalsend onclick="return confirm">Send Email</a> 
                                            </td>
                                        </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--------------------------------------- Start Button Add Product ------------------------------->

                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                  Add Product
                </button>

                <!--------------------------------------- End Button Add Product ------------------------------->
            </div>
             <!------------------------------------ Start Modal Add Product --------------------------------------->

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Product</h4>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url(); ?>Table/addProduct" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kategori</label>
                            <select name="id_kategori" class="form-control" id="exampleInputEmail1">
                                <option value="0" selected> Silahkan Pilih </option>
                                <?php foreach($product_kategori as $rows){ ?>
                                <option value="<?php echo $rows["id_kategori"]; ?>"> <?php echo $rows["nama_kategori"]; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Id Diskon</label>
                            <input type="text" name="id_diskon" class="form-control" id="exampleInputEmail1" placeholder="Product">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control" id="exampleInputEmail1" placeholder="Product">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Deskripsi</label>
                            <textarea  class="form-control" name="deskripsi_produk" id="exampleInputPassword1" placeholder="Deskripsi"></textarea>
                        </div>
                         <div class="form-group">
                            <label for="exampleInputPassword1">Harga</label>
                            <input type="text" class="form-control" name="harga_produk" id="exampleInputPassword1" placeholder="Harga">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">File Gambar</label>
                            <input type="file" name="gambar_produk" id="exampleInputFile">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!------------------------------------ End Modal Add Product --------------------------------------->

    <!------------------------------------ Start Modal Edit Product --------------------------------------->

<?php foreach($product_data as $rows){ ?>
    <div class="modal fade" id="myModaledit<?php echo $rows["id_product"]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Product</h4>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url(); ?>Table/EditproductSubmit" method="post" enctype="multipart/form-data">
                        <div class="form-group"> 
                            <input type="hidden" name="id_produk" class="form-control" id="exampleInputEmail1" placeholder="Product" value="<?php echo $rows["id_product"]; ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Diskon</label>
                            <input type="text" name="id_diskon" class="form-control" id="exampleInputEmail1" placeholder="Product" value="<?php echo $rows["id_diskon"]; ?> ">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control" id="exampleInputEmail1" placeholder="Product" value="<?php echo $rows["nama_product"]; ?> ">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama_Kategori</label>
                            <select name="id_kategori" class="form-control" id="exampleInputEmail1">
                                <?php foreach($product_kategori as $row){ ?>
                                    <?php if($rows["id_kategori"] == $row["id_kategori"] ){ ?>
                                <option value="<?php echo $row["id_kategori"]; ?> "selected> <?php echo $row["nama_kategori"]; ?> </option>
                                    <?php }else{ ?>
                                <option value="<?php echo $row["id_kategori"]; ?>"> <?php echo $row["nama_kategori"]; ?> </option>
                                <?php } ?>  

                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Deskripsi</label>
                            <textarea  class="form-control" name="deskripsi_produk" id="exampleInputPassword1" placeholder="Deskripsi"> <?php echo $rows["description_product"]; ?></textarea>
                        </div>
                         <div class="form-group">
                            <label for="exampleInputPassword1">Harga</label>
                            <input type="text" class="form-control" name="harga_produk" id="exampleInputPassword1" placeholder="Harga" value="<?php echo $rows["harga_product"]; ?>">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="gambar_old" value="<?php echo $rows["gambar_product"]; ?>" />
                            <label for="exampleInputFile">File Gambar</label>
                            <input type="file" name="gambar_produk" id="exampleInputFile">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                
                </div>

            </div>
        </div>
    </div>
<?php } ?>

    <!------------------------------------ End Modal Edit Product --------------------------------------->
