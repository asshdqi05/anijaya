<?= $this->extend('template/V_header') ?>

<?= $this->section('content') ?>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <form method="POST" action="<?php echo site_url('C_laporan/cetak_laporan_pemesanan') ?>" target="_blank">
                    <table>
                        <tr>
                            <div class="col-md">
                                <div class="card card-solid">
                                    <div class="card-header bg-indigo">
                                        <div class="card-title">Laporan Semua Pemesanan Perperiode</div>
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

            <div class="col-md-4">
                <form method="POST" action="<?php echo site_url('C_laporan/cetak_laporan_pemesanan_online') ?>" target="_blank">
                    <table>
                        <tr>
                            <div class="col-md">
                                <div class="card card-solid">
                                    <div class="card-header bg-indigo">
                                        <div class="card-title">Laporan Pemesanan Online Perperiode</div>
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

            <div class="col-md-4">
                <form method="POST" action="<?php echo site_url('C_laporan/cetak_laporan_pemesanan_ditempat') ?>" target="_blank">
                    <table>
                        <tr>
                            <div class="col-md">
                                <div class="card card-solid">
                                    <div class="card-header bg-indigo">
                                        <div class="card-title">Laporan Pemesanan Ditempat Perperiode</div>
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
        </div>
    </div>

</div>


<?= $this->endSection() ?>