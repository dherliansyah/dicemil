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
                                        <th>Pembeli</th>
                                        <th>No. Invoice</th>
                                        <th>Produk</th>
                                        <th>Pilihan</th>
                                        <th>Keterangan</th>
                                        <th>Jam</th>
                                        <th>Status</th>
                                        <th>Detail</th>
                                        
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach($laporan_penjualan as $rows){ ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $rows["customer_username"]; ?></td>
                                            <td><?php echo $rows["nomor_invoice"]; ?></td>
                                            <td><?php echo $rows["produk"]; ?></td>
                                            <td><?php echo $rows["status_pengiriman"]; ?></td>
                                            <td><?php echo $rows["keterangan_pengiriman"]; ?></td>
                                            <td><?php echo $rows["jam_pengiriman"]; ?></td>
                                            <td><?php echo $rows["status"]; ?></td>
                                            <td><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#penjualan<?php echo $rows['order_id']; ?>">
                                                Detail
                                            </button>
                                            </td>
                                           
                                        </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#laporan">
                    Laporan Penjualan
                </button>
                <br><br>
                <button class="btn btn-primary btn-lg" onclick="takeSnapshot()">Ambil Gambar</button>
                <br><br>
                <div>
                    <video autoplay="true" id="video-webcam">
                        Browsermu tidak mendukung bro, upgrade donk!
                    </video>
                </div>
            </div>


            <!-- START MODAL DETAIL LAPORAN PENJUALAN -->

            <?php foreach($laporan_penjualan as $rows){ ?>
            <div class="modal fade" id="penjualan<?php echo $rows['order_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Detail Laporan</h4>
                        </div>
                        <div class="modal-body">
                            <table class="table">
                                <thead>
                                    <th>Quantity</th>   
                                    <th>Jumlah Harga</th>
                                    <th>Ongkos Kirim</th>
                                    <th>Total Harga</th>
                                    <th>Kecamatan</th>
                                    <th>Kelurahan</th>
                                    <th>Alamat</th>
                                    <th>Bukti Bayar</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $rows["qty"]; ?></td>
                                        <td><?php echo $rows["jumlah_harga"]; ?></td>
                                        <td><?php echo $rows["ongkos_kirim"]; ?></td>
                                        <td><?php echo $rows["total"]; ?></td>
                                        <td><?php echo $rows["kecamatan"]; ?></td>
                                        <td><?php echo $rows["kelurahan"]; ?></td>
                                        <td><?php echo $rows["alamat"]; ?></td>
                                        <td><a href="<?php echo base_url(); ?>image/struk_pembayaran/<?php echo $rows["gambar_transfer"]; ?>" target="_blank"><img width="50" src="<?php echo base_url(); ?>image/struk_pembayaran/<?php echo $rows["gambar_transfer"]; ?>"></a></td>
                                    </tr>
                                </tbody>
                            </table>
                            
                                       
                                           
                        </div>
                        <div class="modal-footer">
                            <form action="<?php echo base_url(); ?>Penjualan/konfirmasi_pembayaran" method="post">
                                <input type="hidden" value="<?php echo $rows['order_id']; ?>" name="order_id">
                            <button type="submit" class="btn btn-primary">Konfirmasi Pembayaran</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>

            <!-- END MODAL DETAIL LAPORAN PENJUALAN -->

            <!-- START LAPORAN PENJUALAN -->

            <div class="modal fade" id="laporan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Detail Laporan</h4>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url(); ?>Penjualan/laporan_cetak" method="post">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Produk</label>
                                    <input type="text" name="namaproduk" class="form-control" id="exampleInputEmail1" placeholder="Nama Produk">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Dari Tanggal</label>
                                    <input type="date" name="daritgl" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Sampai Tanggal</label>
                                    <input type="date" name="sampaitgl" class="form-control" id="exampleInputPassword1">
                                </div>
                                <button type="submit" class="btn btn-primary" target="_BLANK">Cetak Laporan</button>
                            </form>                
                        </div>
                    </div>
                </div>
            </div>

            <!-- START LAPORAN PENJUALAN -->

            <script type="text/javascript">
                // seleksi elemen video
                var video = document.querySelector("#video-webcam");

                // minta izin user
                navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;

                // jika user memberikan izin
                if (navigator.getUserMedia) {
                    // jalankan fungsi handleVideo, dan videoError jika izin ditolak
                    navigator.getUserMedia({ video: true }, handleVideo, videoError);
                }

                // fungsi ini akan dieksekusi jika  izin telah diberikan
                function handleVideo(stream) {
                    video.srcObject = stream;
                }

                // fungsi ini akan dieksekusi kalau user menolak izin
                function videoError(e) {
                    // do something
                    alert("Izinkan menggunakan webcam untuk demo!")
                }

                function takeSnapshot() {
                // buat elemen img
                var img = document.createElement('img');
                var context;

                // ambil ukuran video
                var width = video.offsetWidth
                        , height = video.offsetHeight;

                // buat elemen canvas
                canvas = document.createElement('canvas');
                canvas.width = width;
                canvas.height = height;

                // ambil gambar dari video dan masukan 
                // ke dalam canvas
                context = canvas.getContext('2d');
                context.drawImage(video, 0, 0, width, height);

                // render hasil dari canvas ke elemen img
                img.src = canvas.toDataURL('image/png');
                document.body.appendChild(img);
                }
            </script>