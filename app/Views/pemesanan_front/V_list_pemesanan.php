<?= $this->extend('template_pelanggan/V_header') ?>

<?= $this->section('content') ?>


<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary btn-flat" href="<?= site_url('C_pemesanan_front/add') ?>">
                    <span class="fas fa-plus"></span>
                    Tambah Data
                </a>

            </div>

            <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <th class="text-center">No</th>
                        <th>Tanggal</th>
                        <th>No Faktur</th>
                        <th>Pelanggan</th>
                        <th>Tipe Pemesanan</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </thead>

                    <tbody>
                        <?php $no = 1;
                        foreach ($data as $d) {
                            if ($d->tipe == 1) {
                                $tipe = "Di Tempat";
                            } else if ($d->tipe == 2) {
                                $tipe = "Online";
                            }

                            if ($d->status == 1) {
                                $status = "Belum Bayar";
                            } else if ($d->status == 2) {
                                $status = "Menunggu Konfirmasi";
                            } else if ($d->status == 3) {
                                $status = "Di konfirmasi";
                            } else if ($d->status == 4) {
                                $status = "Batal";
                            }

                        ?>
                            <tr>
                                <td width="50px" class="text-center"><?php echo $no . '.'; ?></td>
                                <td><?= date('d F Y', strtotime($d->tanggal)) ?></td>
                                <td><?= $d->no_faktur ?></td>
                                <td><?= $d->nama_pelanggan ?></td>
                                <td><?= $tipe ?></td>
                                <td><?= $status ?></td>
                                <td class="text-center" width="100px">
                                    <?php if ($d->status == 1) { ?>
                                        <a class="btn btn-xs btn-info" href="<?= site_url('C_pemesanan_front/pembayaran/') . $d->id_pemesanan ?>">
                                            <i class="fas fa-money-bill"> Pembayaran</i>
                                        </a>
                                        <a class="btn btn-xs btn-danger" href="javascript:void(0)" onclick="hapus('<?= $d->id_pemesanan ?>','<?= $d->no_faktur ?>')">
                                            <i class="fas fa-times-circle"> Pembatalan</i>
                                        </a>
                                    <?php  } else if ($d->status == 2) { ?>
                                        <a class="btn btn-xs btn-success" href="<?= site_url('C_pemesanan_front/cetak_nota/') . $d->no_faktur ?>" target="_blank">
                                            <i class="fas fa-receipt"> Bukti Pemasanan</i>
                                        </a>
                                    <?php  } else if ($d->status == 3) { ?>
                                        <a class="btn btn-xs btn-success" href="<?= site_url('C_pemesanan_front/cetak_nota/') . $d->no_faktur ?>" target="_blank">
                                            <i class="fas fa-receipt"> Bukti Pemasanan</i>
                                        </a>
                                    <?php  } else if ($d->status == 4) { ?>
                                        <p>---</p>
                                    <?php  } ?>

                                </td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<script>
    function hapus(id, nama) {
        $('#hid').val(id);
        $('#hnama').html(nama);
        $('#hapus_data').modal('show');
    }
</script>

<div class="modal fade" id="hapus_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pembatalan Pesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <form method="POST" action="<?php echo site_url('C_pemesanan_front/pembatalan') ?>">
                <div class="modal-body">
                    <input type="hidden" name="id" id="hid">
                    Anda yakin Membatalkan Pesanan <strong><span id="hnama"></span></strong> ?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Iya</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Tidak</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>