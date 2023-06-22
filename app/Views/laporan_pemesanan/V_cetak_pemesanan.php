<html>

<head>
    <meta charset="UTF-8">
    <title>Laporan Pemesanan</title>
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
                                <span style="font-size: 18pt; font-weight: bold; color: black;">Laporan Pemesanan</span><br>
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
                                <th rowspan="2" width=10>No</th>
                                <th rowspan="2">Tanggal</th>
                                <th rowspan="2">No Faktur</th>
                                <th rowspan="2">Pelanggan</th>
                                <th rowspan="2">Tipe Pemesanan</th>
                                <th colspan="4">Barang</th>
                                <th rowspan="2">Total</th>
                            </tr>
                            <tr>
                                <th>Nama Barang</th>
                                <th>QTY</th>
                                <th>Harga</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $tot = 0;
                            $total = 0;
                            foreach ($data as $d) :
                                $no++;

                                $db   = \Config\Database::connect();
                                $detail = $db->table('detail_pemesanan')->getWhere(['id_pemesanan' => $d->id_pemesanan])->getResult();
                                foreach ($detail as $a) {
                                    $sumtot = $db->table('detail_pemesanan')->select('sum(harga * qty) as tot')->where('id_pemesanan', $d->id_pemesanan)->get()->getRow();
                                    // $sub = $a->harga_barang * $a->qty;
                                    $tot = $sumtot->tot;
                                }
                                if ($d->tipe == 1) {
                                    $tipe = "Di Tempat";
                                } else if ($d->tipe == 2) {
                                    $tipe = "Online";
                                }

                                $total = $total + $tot;
                            ?>
                                <tr>
                                    <td align=left valign=top><?= $no ?></td>
                                    <td align=left valign=top><?= date('d F Y', strtotime($d->tanggal)) ?> </td>
                                    <td align=left valign=top><?= $d->no_faktur ?></td>
                                    <td align=left valign=top><?= $d->nama_pelanggan ?></td>
                                    <td align=left valign=top><?= $tipe ?></td>
                                    <td align=left>
                                        <table style="border: 0px; width: 100%;" border="">
                                            <?php foreach ($detail as $b) : ?>
                                                <tr>
                                                    <td class="list-group-item"><?= $b->nama_barang ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    </td>
                                    <td>
                                        <table style="border: 0px; width: 100%;" border="">
                                            <?php foreach ($detail as $b) : ?>
                                                <tr>
                                                    <td style="text-align:center ;"><?= $b->qty ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    </td>
                                    <td>
                                        <table style="border: 0px; width: 100%;" border="">
                                            <?php foreach ($detail as $b) : ?>
                                                <tr>
                                                    <td><?= "Rp " . number_format($b->harga) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    </td>
                                    <td>
                                        <table style="border: 0px; width: 100%;" border="">
                                            <?php foreach ($detail as $b) : ?>
                                                <tr>
                                                    <td><?= "Rp " . number_format($b->harga * $b->qty) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    </td>
                                    <td align=left valign=top><?= "Rp " . number_format($tot) ?></td>

                                </tr>
                            <?php endforeach ?>
                            <tr>
                                <th colspan="9">Total</th>
                                <th colspan="1"><?= "Rp " . number_format($total) ?></th>
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