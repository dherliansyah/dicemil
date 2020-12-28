            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Data Kategori</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table id="example" class="display" style="width:100%">
                                    <thead>
                                        <th>NO</th>
                                        <th>Gambar Kategori</th>
                                        <th>Nama Kategori</th>
                                        <th>Keterangan Kategori</th>
                                        <th>MODIFY</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach($product_data as $rows){ ?>
                                        <tr>
                                            <td><?php echo $rows["id_kategori"]; ?></td>
                                            <td><img src="<?php echo base_url(); ?>image/product/<?php echo $rows["gambar_kategori"]; ?>" width="130" height="100" /></td>
                                            <td><?php echo $rows["nama_kategori"]; ?></td>
                                            <td><?php echo $rows["keterangan_kategori"]; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModaledit<?php echo $rows["id_kategori"]; ?>">
                                                  Edit
                                                </button>
                                                <a onClick="javascript:return confirm('apakah anda yakin data ber id=<?php echo $rows["id_kategori"]; ?> ingin dihapus ?');" href="<?php echo base_url(); ?>Kategori/deleteSubmit/<?php echo $rows["id_kategori"]; ?>" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModaldelete onclick="return confirm ">Delete</a>  
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
                    <form action="<?php echo base_url(); ?>Kategori/addProduct" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Kategori</label>
                            <input type="text" name="nama_kategori" class="form-control" id="exampleInputEmail1" placeholder="Product">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Keterangan Kategori</label>
                            <textarea  class="form-control" name="keterangan_kategori" id="exampleInputPassword1" placeholder="Deskripsi"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">File Gambar</label>
                            <input type="file" name="gambar_kategori" id="exampleInputFile">
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
    <div class="modal fade" id="myModaledit<?php echo $rows["id_kategori"]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Product</h4>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url(); ?>Kategori/EditproductSubmit" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            
                            <input type="hidden" name="id_kategori" class="form-control" id="exampleInputEmail1" placeholder="Product" value="<?php echo $rows["id_kategori"]; ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Kategori</label>
                            <input type="text" name="nama_kategori" class="form-control" id="exampleInputEmail1" placeholder="Product" value="<?php echo $rows["nama_kategori"]; ?> ">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Keterangan Kategori</label>
                            <input type="text"  class="form-control" name="keterangan_kategori" id="exampleInputPassword1" placeholder="Deskripsi" value="<?php echo $rows["keterangan_kategori"]; ?>">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="gambar_old" value="<?php echo $rows["gambar_kategori"]; ?>" />
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
