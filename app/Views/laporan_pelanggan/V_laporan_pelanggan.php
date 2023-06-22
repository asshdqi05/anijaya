<html>

<head>
    <meta charset="UTF-8">
    <title>Laporan Pelanggan</title>
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
                                <span style="font-size: 18pt; font-weight: bold; color: black;">Laporan Pelanggan</span><br>
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
                <td align="center">
                    <br>
                    <table style="border-collapse: collapse; width: 90%;" border="1">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Nama Pelanggan</th>
                                <th>Alamat</th>
                                <th>No Hp</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($data as $d) :
                                $no++;


                            ?>
                                <tr>
                                    <td width="50px" class="text-center"><?php echo $no . '.'; ?></td>
                                    <td><?= $d->nama_pelanggan ?></td>
                                    <td><?= $d->alamat ?></td>
                                    <td><?= $d->nohp ?></td>
                                    <td><?= $d->email ?></td>


                                </tr>
                            <?php endforeach ?>

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