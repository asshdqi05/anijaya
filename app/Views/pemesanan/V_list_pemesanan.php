<?= $this->extend('template/V_header') ?>

<?= $this->section('content') ?>


<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary btn-flat" href="<?= site_url('C_pemesanan/add') ?>">
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

                        ?>
                            <tr>
                                <td width="50px" class="text-center"><?php echo $no . '.'; ?></td>
                                <td><?= date('d F Y', strtotime($d->tanggal)) ?></td>
                                <td><?= $d->no_faktur ?></td>
                                <td><?= $d->nama_pelanggan ?></td>
                                <td><?= $tipe ?></td>
                                <td class="text-center" width="100px">
                                    <a href="<?= site_url('C_pemesanan/cetak_nota/' . $d->no_faktur) ?>" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-receipt"></i></a>
                                    <a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="hapus('<?= $d->id_pemesanan ?>','<?= $d->no_faktur ?>')">
                                        <i class="fas fa-trash"></i>
                                    </a>
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
                <h5 class="modal-title" id="exampleModalLabel">Hapus data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <form method="POST" action="<?php echo site_url('C_pemesanan/hapus') ?>">
                <div class="modal-body">
                    <input type="hidden" name="id" id="hid">
                    Anda yakin hapus data <strong><span id="hnama"></span></strong> ?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-trash"></i> Hapus</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i>Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>