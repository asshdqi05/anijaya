<?php $session = session();
if ($session->get('level') == 1) {
    $level = "Admin";
} else if ($session->get('level') == 2) {
    $level = "Kasir";
} else if ($session->get('level') == 3) {
    $level = "Pimpinan";
} ?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('assets') ?>/index3.html" class="brand-link">
        <img src="<?= base_url('assets') ?>/dist/img/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">ANI JAYA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets') ?>/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $session->get('nama_user'); ?> - <?= $level; ?></a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="<?= site_url('C_home') ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>

                <?php if ($session->get('level') == 1) { ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Master
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= site_url('C_satuan') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Satuan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('C_barang') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Barang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('C_pelanggan') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pelanggan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('C_user') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>User</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-comments-dollar"></i>
                            <p>
                                Transaksi
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= site_url('C_penjualan') ?>" class="nav-link">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p>Penjualan</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= site_url('C_pemesanan') ?>" class="nav-link">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p>Pemesanan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('C_konfirmasi_pemesanan') ?>" class="nav-link">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p>Konfirmasi Pemesanan Online</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="<?= site_url('C_pengeluaran') ?>" class="nav-link">
                            <i class="nav-icon fas fa-money-bill-wave"></i>
                            <p>
                                Pengeluaran
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Laporan
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= site_url('C_laporan/laporan_penjualan') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>Laporan Penjualan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('C_laporan/laporan_pemesanan') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>Laporan pemesanan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('C_laporan/cetak_laporan_barang') ?>" class="nav-link" target="_blank">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>Laporan Barang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('C_laporan/cetak_laporan_pelanggan') ?>" class="nav-link" target="_blank">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>Laporan Pelanggan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('C_laporan/laporan_pengeluaran') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>Laporan Pengeluaran</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } else if ($session->get('level') == 2) { ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-comments-dollar"></i>
                            <p>
                                Transaksi
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= site_url('C_penjualan') ?>" class="nav-link">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p>Penjualan</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= site_url('C_pemesanan') ?>" class="nav-link">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p>Pemesanan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('C_konfirmasi_pemesanan') ?>" class="nav-link">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p>Konfirmasi Pemesanan Online</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="<?= site_url('C_pengeluaran') ?>" class="nav-link">
                            <i class="nav-icon fas fa-money-bill-wave"></i>
                            <p>
                                Pengeluaran
                            </p>
                        </a>
                    </li>

                <?php } else if ($session->get('level') == 3) { ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Laporan
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= site_url('C_laporan/laporan_penjualan') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>Laporan Penjualan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('C_laporan/laporan_pemesanan') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>Laporan pemesanan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('C_laporan/cetak_laporan_barang') ?>" class="nav-link" target="_blank">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>Laporan Barang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('C_laporan/cetak_laporan_pelanggan') ?>" class="nav-link" target="_blank">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>Laporan Pelanggan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('C_laporan/laporan_pengeluaran') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>Laporan Pengeluaran</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>