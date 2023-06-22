<?= $this->extend('template/V_header') ?>

<?= $this->section('content') ?>

<div class="col-md-6">
    <form method="POST" action="<?php echo site_url('C_laporan/cetak_laporan_penjualan') ?>" target="_blank">
        <table>
            <tr>
                <div class="col-md">
                    <div class="card card-solid">
                        <div class="card-header bg-indigo">
                            <div class="card-title">Laporan Penjualan Perperiode</div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tanggal Awal</label>
                                <input type="date" name="tgl_awal" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Akhir</label>
                                <input type="date" name="tgl_akhir" class="form-control" required>
                            </div>
                            <div class="col-xs">
                                <button type="submit" class="btn btn-block bg-indigo"><i class="fa fa-print"></i> Cetak</button>
                            </div>
                        </div>
                    </div>
                </div>
            </tr>
        </table>
    </form>
</div>

<?= $this->endSection() ?>