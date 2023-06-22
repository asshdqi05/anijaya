<input type="hidden" id="id_pel" value="<?= $id_pelanggan ?>">
<table class="table table-bordered">
    <tr>
        <th width=10>No</th>
        <th>Nama Barang</th>
        <th>Harga</th>
        <th>QTY</th>
        <th>Sub Total</th>
        <th width=100>Aksi</th>
    </tr>
    <?php
    $db   = \Config\Database::connect();
    $no = 0;
    $total = 0;
    $data = $db->table('temp_pesan')->getWhere(['id_pelanggan' => $id_pelanggan])->getResult();
    foreach ($data as $d) {
        $no++;
        $sub = $d->harga * $d->qty;
        $total = $total + $sub;
    ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $d->nama_barang ?></td>
            <td><?= $d->harga ?></td>
            <td><?= $d->qty ?></td>
            <td><?= "Rp " . number_format($d->harga * $d->qty) ?></td>
            <td><button type="button" class="btn btn-danger btn-sm" id="<?= $d->id ?>" name="hapus_temp" value="<?= $d->id  ?>"> <i class="fas fa-trash"></i></button></td>
        </tr>
        <script>
            $('#<?= $d->id  ?>').click(function() {
                // var base_url = '<?= base_url() ?>';
                var id = $("#<?= $d->id  ?>").val();
                var id_pelanggan = $("#id_pel").val();
                $.ajax({
                    url: "delete_temp",
                    type: 'POST',
                    data: {
                        id: id,
                        id_pelanggan: id_pelanggan
                    },
                    dataType: 'html',
                    success: function(responsed) {
                        $('#data_temp_pesan').html(responsed);
                        $('#id_barang').val("");
                        $('#nama_barang').val("");
                        $('#harga').val("");
                        $('#stok').val("");
                        $('#qty').val("");
                        load_barang();
                    },
                })
            });
        </script>
    <?php } ?>
    <tr>
        <th colspan="4">Total</th>
        <th colspan="2"><?= "Rp " . number_format($total) ?></th>
    </tr>

</table>