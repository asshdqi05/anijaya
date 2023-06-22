<html>

<head>
    <meta charset="UTF-8">
    <title>Laporan Pengeluaran</title>
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
                                <span style="font-size: 18pt; font-weight: bold; color: black;">Laporan Pengeluaran</span><br>
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
                            <td><?= date('d F Y', strtotime($tgl_awal)) ?> S/D <?= date('d F Y', strtotime($tgl_akhir)) ?></td>
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
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Jumlah</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $tot = 0;
                            $total = 0;
                            foreach ($data as $d) :
                                $no++;



                                $total = $total + $d->jumlah;
                            ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= date('d F Y', strtotime($d->tanggal)) ?></td>
                                    <td><?= $d->keterangan ?></td>
                                    <td><?= "Rp " . number_format($d->jumlah) ?></td>

                                </tr>
                            <?php endforeach ?>
                            <tr>
                                <th colspan="3">Total</th>
                                <th colspan="2"><?= "Rp " . number_format($total) ?></th>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                </td>
            </tr>
            <tr>
                <td style="padding-left:700px" align=center>
                    <br>
                    <br>
                    <p>Jakarta, <?= date('d F Y') ?></p>
                    <p>Pimpinan</p>
                    <br>
                    <br>
                    <br>
                    <p>(....................)</p>
                    <br>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>