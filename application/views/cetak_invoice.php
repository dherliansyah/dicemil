<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<div class="banner-bootom-w3-agileits">
    
                <section class="content content_content" style="width: 70%; margin: auto;">
                    <section class="invoice">
                        <!-- title row -->
                        <?php foreach($data_pembayaran1 as $row) ?>
                        <div class="row">
                            <div class="col-xs-12">
                                <h2 class="page-header">
                                    <img src="<?php echo base_url(); ?>image/Tasty.png">
                                    <small class="pull-right">Date:<?php echo $row->order_date; ?></small>
                                </h2>
                            </div><!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-3 invoice-col">
                                From
                                <address>
                                    <strong>
                                        DICEMIL 
                                    </strong>
                                </address>
                            </div><!-- /.col -->
                            <div class="col-sm-3 invoice-col">
                                To
                                <address>
                                    <strong>
                                         <?php echo $row->customer_username; ?>                       
                                    </strong>
                                    
                                   
                            </div><!-- /.col -->
                            <div class="col-sm-3 invoice-col">
                                <b>Invoice: DICEMIL / <?php echo $row->order_id; ?></b><br>
                                
                            </div><!-- /.col --><br>
                            <div class="col-sm-3 invoice-col">
                                Status
                                <address>
                                    <strong>
                                         <?php echo $row->status; ?>                       
                                    </strong>
                                    
                                   
                            </div><!-- /.col -->
                        </div><!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-xs-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Product id</th>
                                            <th>Price</th>
                                        <?php if(isset($_SESSION['username'])){ ?>
                                            <th>Diskon</th>
                                        <?php } ?>
                                            <th>Jumlah Harga</th>

                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; ?>
                                    <?php foreach($data_pembayaran as $row){ ?>
                                        <tr>
                                            
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $row['produk']; ?></td>
                                            <td>Rp. <?php echo number_format($row['harga_product']*$row['qty'],0,",","."); ?></td>
                                    <?php if(isset($_SESSION['username'])){ ?>
                                            <td>Rp. <?php echo $row['diskon']; ?> </td>
                                    <?php } ?>
                                            <td>Rp. <?php echo $row['harga_product']-$row['diskon']; ?> </td>


                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div><!-- /.col -->
                        </div><!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            
                                             <tr>
                                                <th>Ongkos Kirim:</th>
                                                <td>Rp. <?php echo number_format($row['ongkos_kirim'],0,",","."); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Total Yang harus Dibayar:</th>
                                                <td>Rp. <?php echo number_format($row['total'],0,",","."); ?></td>
                                            </tr>
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- /.col -->
                        </div><!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-xs-12">
                                <!-- <a href="" class="btn btn-success"><i class="glyphicon glyphicon-print"></i> Print</a> -->
                               
                            </div>
                        </div>
                    </section>
                </section>

             <script>
                window.print();
              </script>