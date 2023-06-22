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