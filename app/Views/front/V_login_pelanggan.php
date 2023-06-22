<?= $this->extend('front/V_base') ?>

<?= $this->section('content') ?>

<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">
        <div class="login-box col-sm-4 offset-4">
            <!-- /.login-logo -->
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <img src="<?= base_url('assets') ?>/dist/img/logo.jpg" width="200">
                    <!-- <a href="../../index2.html" class="h1"><b>ANI</b>JAYA</a> -->
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Silahkan Login Terlebih Dahulu</p>
                    <div class="container-fluid">
                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger alert-dismissible">
                                <?= session()->getFlashdata('error') ?>
                            </div>
                        <?php elseif (session()->getFlashdata('sukses')) :  ?>
                            <div class="alert alert-success alert-dismissible">
                                <?= session()->getFlashdata('sukses') ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <form action="<?= site_url('C_login_pelanggan/login') ?>" method="post">
                        <div class="input-group mb-3">
                            <input type="text" name="username" class="form-control" placeholder="Username">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="bi bi-person"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="bi bi-key"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit">Login</button>
                                    <a href="<?= site_url('C_front/registrasi') ?>" class="btn btn-warning">Registrasi</a>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>


                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.login-box -->
    </div>
</section>

<?= $this->endSection() ?>