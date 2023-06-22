<html>

<head>
    <meta charset="UTF-8">
    <title>Nota Penjualan</title>
</head>

<body onload="window.print();">
    <div align="center">
        <table style="border-collapse: collapse; width: 96%" border="1">
            <tr>
                <td align="center">
                    <table style="border-collapse: collapse; width: 90%;" border="0">
                        <tr>
                            <td style="width:30px">
                                <img src="<?= base_url('assets') ?>/dist/img/logo.jpg" width="70">
                            </td>
                            <td style="text-align: center; width: 40px;">
                                <span style="font-size: 27pt; font-weight: bold; color: black;">Toko Ani Jaya</span><br>
                                <span style="font-size: 18pt; font-weight: bold; color: black;">Nota Penjualan</span><br>
                                <span style="font-size: 12pt; font-weight: bold; font-style: italic;">
                                </span>
                            </td>
                            <td style="width:30px">
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td align="">
                    <table>
                        <tr>
                            <td>Tanggal</td>
                            <td>:</td>
                            <td><?= date('d F Y', strtotime($penjualan->tanggal)) ?></td>
                        </tr>
                        <tr>
                            <td>No Faktur</td>
                            <td>:</td>
                            <td><?= $penjualan->no_faktur ?></td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td align="center">
                    <br>
                    <table style="border-collapse: collapse; width: 90%;" border="1">
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
                            foreach ($detail as $d) :
                                $no++;
                                $sub = $d->harga_barang * $d->qty;
                                $total = $total + $sub;
                            ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $d->nama_barang ?></td>
                                    <td><?= "Rp " . number_format($d->harga_barang) ?></td>
                                    <td><?= $d->qty ?></td>
                                    <td><?= "Rp " . number_format($d->harga_barang * $d->qty) ?></td>
                                </tr>
                            <?php endforeach ?>
                            <tr>
                                <th colspan="4">Total</th>
                                <th colspan="2"><?= "Rp " . number_format($total) ?></th>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>