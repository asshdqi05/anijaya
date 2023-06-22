<?= $this->extend('template/V_header') ?>

<?= $this->section('content') ?>


<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">

            </div>

            <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <th class="text-center">No</th>
                        <th>Tanggal</th>
                        <th>No Faktur</th>
                        <th>Pelanggan</th>
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
                                <td><?= $status ?></td>
                                <td class="text-center" width="100px">
                                    <a href="<?= site_url('C_konfirmasi_pemesanan/detail/' . $d->no_faktur) ?>" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
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


<?= $this->endSection() ?>