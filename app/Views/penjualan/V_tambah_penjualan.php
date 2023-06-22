<?= $this->extend('template/V_header') ?>
<?= $this->section('content') ?>

<div class="card">
    <div class="card-header bg-dark">
        <a class="btn btn-primary btn-flat" href="<?= site_url('C_penjualan') ?>">
            <span><i class="fas fa-chevron-circle-left"></i></span>
            Kembali
        </a>
    </div>
    <form action="<?= site_url('C_penjualan/save') ?>" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="text" class="form-control" name="tanggal" value="<?= date('d F Y') ?>" readonly required>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label>No Faktur</label>
                        <input type="text" readonly class="form-control" id="no_faktur" name="no_faktur" value="<?= $no_faktur ?>" required>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="hidden" readonly class="form-control" id="id_barang" name="id_barang">
                        <div class="input-group">
                            <span class="input-group-append">
                                <button type="button" data-toggle="modal" data-target="#cari_barang" class="btn btn-info">Cari <i class="fas fa-search"></i></button>
                            </span>
                            <input type="text" readonly class="form-control" id="nama_barang" name="barang">
                        </div>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <label>stok</label>
                        <input type="text" readonly class="form-control" id="stok" name="stok">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" readonly class="form-control" id="harga" name="harga">
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label>QTY</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="qty" name="qty">
                            <span class="input-group-append">
                                <button type="button" id="tambah" class="btn btn-info"><i class="fas fa-plus-square"></i></button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div id="data_temp">

            </div>

            <!-- /.card-body -->
        </div>
        <div class="card-footer">
            <button type="button" id="tombol_simpan" class="btn btn-success">Simpan <i class="fas fa-save"></i></button>
        </div>

    </form>
</div>


<script src="<?= base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>
<script>
    function pilih_barang(id, nama, harga, stok) {
        $('#id_barang').val(id);
        $('#nama_barang').val(nama);
        $('#harga').val(harga);
        $('#stok').val(stok);
        $('#cari_barang').modal('hide');
    }

    $('#tambah').on('click', function() {
        var id_barang = $('#id_barang').val();
        var nama_barang = $('#nama_barang').val();
        var harga = $('#harga').val();
        var stok = $('#stok').val();
        var qty = $('#qty').val();
        if (id_barang != "" && stok != "") {
            if (eval(stok) < qty) {
                alert('Stok Tidak Mencukupi!');
            } else {
                $.ajax({
                    url: "save_temp",
                    type: "POST",
                    data: {
                        id_barang: id_barang,
                        nama_barang: nama_barang,
                        harga: harga,
                        stok: stok,
                        qty: qty
                    },
                    dataType: 'html',
                    success: function(response) {
                        $('#id_barang').val("");
                        $('#nama_barang').val("");
                        $('#harga').val("");
                        $('#stok').val("");
                        $('#qty').val("");
                        $('#data_temp').html(response);
                    },
                })
            }
        } else {
            alert('Anda harus mengisi data dengan lengkap !');
        }
        return false;
    });


    $('#tombol_simpan').click(function() {
        var no_faktur = $('#no_faktur').val();

        $.ajax({
            url: "save",
            type: "POST",
            data: {
                no_faktur: no_faktur
            },
            dataType: 'html',
            success: function(response) {
                cetakfaktur();
                window.location.reload();
                $('#data_temp').html(response);
            },
        })

        // cetakfaktur();
        // window.location.reload();
    });

    var newwindow;

    function cetakfaktur() {
        var faktur = $('input[name="no_faktur"]').val();
        newwindow = window.open('<?php echo site_url('C_penjualan/cetak_nota/') ?>' + faktur, 'name', 'height=600,width=600,scrollbars=yes');
        if (window.focus) {
            newwindow.focus();
        }
        return false;
    }
</script>


<div class="modal fade" id="cari_barang">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                <table id="example4" class="table table-bordered table-striped">
                    <thead>
                        <th class="text-center">No</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Foto</th>
                        <th class="text-center">Aksi</th>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($barang as $d) :
                            $no++; ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?= $d->nama_barang ?></td>
                                <td><?= $d->harga_barang ?></td>
                                <td><?= $d->stok ?></td>
                                <td><img src="<?= base_url('file/gambar_barang/' . $d->foto); ?>" height="150" width="100"></td>
                                <td>
                                    <button type="button" class="btn btn-primary" onclick="return pilih_barang('<?= $d->id ?>','<?= $d->nama_barang ?>','<?= $d->harga_barang ?>','<?= $d->stok ?>')">
                                        Pilih
                                    </button>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>