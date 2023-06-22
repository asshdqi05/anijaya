<?= $this->extend('template_pelanggan/V_header') ?>

<?= $this->section('content') ?>

<div class="col-md-12">
    <div class="card card-teal card-outline">
        <div class="card-header">
            <a href="<?= site_url('C_pemesanan_front') ?>" class="btn btn-primary btn-flat">
                <span class="fas fa-arrow-circle-left"></span>
                Kembali
            </a>
        </div>

        <div class="invoice col-sm-12 p-3 mb-3">
            <!-- title row -->
            <div id="div1">

                <!-- info row -->
                <div class="row">
                    <div class="col-sm-2">
                        <div class="col-sm">
                            <p>Tanggal </p>
                            <p>Nama Pelanggan </p>
                            <p>No Telepon</p>
                            <p>Alamat</p>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="col-sm">
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="col-sm">
                            <strong>
                                <p><?= date('d F Y', strtotime($data_pemesanan->tanggal)) ?></p>
                                <p><?= $data_pemesanan->nama_pelanggan ?></p>
                                <p><?= $data_pemesanan->nohp ?></p>
                                <p><?= $data_pemesanan->alamat ?></p>
                            </strong>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th width=10>No</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>QTY</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                $total = 0;
                                foreach ($detail_pemesanan as $d) :
                                    $no++;
                                    $sub = $d->harga * $d->qty;
                                    $total = $total + $sub;
                                ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $d->nama_barang ?></td>
                                        <td><?= "Rp " . number_format($d->harga) ?></td>
                                        <td><?= $d->qty ?></td>
                                        <td><?= "Rp " . number_format($d->harga * $d->qty) ?></td>
                                    </tr>
                                <?php endforeach ?>
                                <tr>
                                    <th colspan="4">Total</th>
                                    <th colspan="2"><?= "Rp " . number_format($total) ?></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>

            </div>


            <div class="row no-print">
                <div class="col-sm-12">
                    <div class="alert alert-info alert-dismissible">
                        <h5><i class="icon fas fa-info"></i> Informasi Pembayaran</h5>
                        Silahkan Lakukan Pembayaran DP Dengan transfer ke:
                        <br>
                        BRI : 0889XXXX
                        <br>
                        Atas nama : Ani Jaya

                    </div>
                    <form method="POST" enctype="multipart/form-data" action="<?= site_url('C_pemesanan_front/konfirmasi_pembayaran') ?>">
                        <div class="form-group">
                            <label>Upload Bukti Pembayaran</label>
                            <input type="hidden" class="form-control" name="id_pemesanan" value="<?= $data_pemesanan->id_pemesanan ?>" required>
                            <input type="file" class="form-control" name="bukti" required>
                        </div>
                        <button type="submit" class="btn btn-primary float-right"><i class="fa fa-money-bill"></i> Konfirmasi Pembayaran</button>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>



<?= $this->endSection() ?>