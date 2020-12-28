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
                                        <th>Produk</th>
                                        <th>Status Pengiriman</th>
                                        <th>Keterangan Pengiriman</th>
                                        <th>Qty</th>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach($cetak_laporan as $row){ ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row["produk"]; ?></td>
                                            <td><?php echo $row["status"]; ?></td>
                                            <td><?php echo $row["username"]; ?></td>
                                           
                                        </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                window.open();
            </script>
