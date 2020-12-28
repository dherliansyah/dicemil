            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Data Diskon</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table id="example" class="display" style="width:100%">
                                    <thead>
                                        <th>NO</th>
                                    	<th>Keterangan</th>
                                    	<th>Kategori</th>
                                        <th>Diskon</th>
                                        <th>Modify</th>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach($laporan_diskon as $row){ ?>
                                        <tr>
                                        	<td><?php echo $no++; ?></td>
                                        	<td><?php echo $row["keterangan_diskon"] ?></td>
                                        	<td><?php echo $row["kategori_diskon"]; ?></td>
                                            <td><?php echo $row['diskon']; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModaledit<?php echo $row["id_diskon"]; ?>" style="margin-bottom:5px;">
                                                  Edit
                                                </button>
                                            
                                            <?php if($row['status'] == 0   ){ ?>
                                                <form action="<?php echo base_url(); ?>Diskon/get_diskon" method="post">
                                                    <input type="hidden" value="<?php echo $row['id_diskon']; ?>" name="id_diskon">
                                                    <button type="submit" class="btn btn-primary">Aktifkan</button>
                                                </form>
                                            <?php }else{ ?>
                                                    <form action="<?php echo base_url(); ?>Diskon/get_diskon_non" method="post">
                                                    <input type="hidden" value="<?php echo $row['id_diskon']; ?>" name="id_diskon">
                                                    <button type="submit" class="btn btn-primary">Non Aktif</button>
                                                </form>
                                                <?php }  ?>
                                            </td>
                                        	
                                        </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--------------------------------------- Start Button Add Diskon ------------------------------->

                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                  Add Product
                </button>

                <!--------------------------------------- End Button Add Diskon ------------------------------->
            </div>
             <!------------------------------------ Start Modal Add Diskon --------------------------------------->

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Product</h4>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url(); ?>Diskon/addProduct" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Keterangan</label>
                            <input type="text" name="keterangan_diskon" class="form-control" id="exampleInputEmail1" placeholder="Product">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Kategori</label>
                            <textarea  class="form-control" name="kategori_diskon" id="exampleInputPassword1" placeholder="Deskripsi"></textarea>
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

    <!------------------------------------ End Modal Add Diskon --------------------------------------->

    <!------------------------------------ Start Modal Edit Diskon --------------------------------------->

<?php foreach($laporan_diskon as $rows){ ?>
    <div class="modal fade" id="myModaledit<?php echo $rows["id_diskon"]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Diskon</h4>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url(); ?>Diskon/EditproductSubmit" method="post" enctype="multipart/form-data">
                        <div class="form-group"> 
                            <input type="hidden" name="id_diskon" class="form-control" id="exampleInputEmail1" placeholder="Product" value="<?php echo $rows["id_diskon"]; ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Keterangan</label>
                            <input type="text" name="keterangan_diskon" class="form-control" id="exampleInputEmail1" placeholder="Product" value="<?php echo $rows['keterangan_diskon']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Kategori</label>
                            <input type="text" name="kategori_diskon" class="form-control" id="exampleInputEmail1" placeholder="Product" value="<?php echo $rows['kategori_diskon']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Diskon</label>
                            <input type="text" name="diskon" class="form-control" id="exampleInputEmail1" placeholder="Diskon">
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

    <!------------------------------------ End Modal Edit Diskon --------------------------------------->

